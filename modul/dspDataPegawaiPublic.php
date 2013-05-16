<?php
echo "
			<table width=\"660\">
				<tr>
					<th width=\"10\">No</th>
					<th width=\"436\">No. Pegawai</th>
					<th width=\"110\">Nama</th>
					<th width=\"110\">Tempat Lahir</th>
					<th width=\"200\">Tanggal Lahir</th>
					<th width=\"200\">Alamat</th>
					<th width=\"110\">Jabatan</th>
					<th width=\"71\">Detail</th>
	
				</tr>";
				//mulai paging halaman, ini buat paging di tampilan list pegawainya
				$batas=10;
				$halaman=$_GET['hal'];
				if(!($halaman)){
					$posisi = 0;
					$halaman = 1;
				}
				else{
					$posisi=($halaman-1)*$batas;
				}
				//*******************************
				$sql=mysql_query("select * from pegawai, jabatan where jabatan.id_jabatan=pegawai.id_jabatan order by id_peg asc limit $posisi,$batas",$koneksi) or die ("Data tidak ditemukan");
				while($data=mysql_fetch_object($sql)) {
				$no++;
				if($no%2==1) { $row="row-a"; } else { $row="row-b"; }
				echo"<tr class=\"$row\">
					<td align=\"center\">$no</td>
					<td>$data->nip</td>
					<td>$data->nama</td>
					<td>$data->tempat_lahir</td>
					<td>$data->tgl_lahir</td>
					<td>$data->alamat</td>
					<td align=\"center\"><a href=\"?mod=listpeg&act=detail&id=$data->id_peg\"><img src=\"images/detail.png\" alt=\"lihat detail\"></a> </td>
				
				</tr>";
			}
		echo"</table>";
	//fungsi paging mulai ***********************************************************************
   	$tampil2=mysql_query("select * from pegawai",$koneksi);
	$jml_data=mysql_num_rows($tampil2); 
	$jml_halaman=ceil($jml_data/$batas); 
	 
	echo "<p><br />Hal : ";
	if ($halaman>1) {
		$prev=$halaman-1;
		echo "<a href=\"?mod=listpeg&hal=$prev\" title=\"Sebelumnya\">&laquo;</a> | ";
	}
	for ($i=1; $i<=$jml_halaman; $i++) 
	if ($i != $halaman){ 
		echo "<a href=\"?mod=listpeg&hal=$i\" title=\"Hal $i\">$i</a> | "; 
	} 
	else{ 
		echo " <b>$i</b> | ";
	} 
	if ($halaman>=$jml_halaman) {
		echo "";
	}else {
	$next=$halaman+1;
		echo "<a href=\"?mod=listpeg&hal=$next\" title=\"Berikutnya\">&raquo;</a>";
		echo "</p>";
	}
	//************************************************************************************
?>