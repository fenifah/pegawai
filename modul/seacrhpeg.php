<form method="post" action="">

<table align="center" width="660" border="0" cellpadding="0" cellspacing="0">

  <tr>

    <td align="center" colspan="2"><br /><b>Searching Box Pegawai</b><br /><br /></td>

  </tr>

  <tr>

    <td align="right" width="200">Whatz the keywords :&nbsp;</td>

	<td width="400"><input type="text" name="cari" size="40" /></td>

  </tr>

  <tr>

    <td align="right">Find in :&nbsp;</td>

	<td>	

	<input type="radio" name="cat" value="all_key" checked="checked" />All Fields

	<input type="radio" name="cat" value="nopeg"/>No. Pegawai
	
	<input type="radio" name="cat" value="nama"/>Nama

	<input type="radio" name="cat" value="alamat"/>Alamat


	</td>

  </tr>

  <tr>

    <td colspan="2" align="center"><input name="submit" type="submit" value="Seekin' Now!" /></td>

  </tr>

</table>

</form><br />



<?php
echo "
			<table width=\"660\">
				<tr>
					<th width=\"10\">No</th>
					<th width=\"436\">No. Pegawai</th>
					<th width=\"110\">Nama</th>
					<th width=\"110\">Tempat Lahir</th>
					<th width=\"110\">Tanggal Lahir</th>
					<th width=\"110\">Alamat</th>
					<th width=\"71\">Detail</th>
					<th width=\"71\">Edit</th>
					<th width=\"71\">Hapus</th>
				</tr>";

if($_POST['submit'])

{

	$cari=$_POST['cari'];
	
	if($_POST['cat'] == 'nopeg'){

		$where = "WHERE nip LIKE '%$cari%' ";

	}

	if($_POST['cat'] == 'nama'){

		$where = "WHERE nama LIKE '%$cari%'";

	}

	if($_POST['cat'] == 'alamat'){

		$where = "WHERE alamat LIKE '%$cari%'";

	}


	if($_POST['cat'] == 'all_key'){

		$where = "WHERE nip LIKE '%$cari%' OR nama LIKE '%$cari%' OR alamat LIKE '%$cari%'";

	}

	$sql=mysql_query("select * from pegawai $where order by id_peg",$koneksi) or die ("Data tidak ditemukan");
}



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
					<td align=\"center\"><a href=\"?mod=listpeg&act=edit&id=$data->id_peg\"><img src=\"images/edit.gif\" alt=\"edit pegawai\"></a> </td>
					<td align=\"center\"><a href=\"?mod=listpeg&act=hapus&id=$data->id_peg\"><img src=\"images/close.png\" alt=\"hapus\"></a></td>
				</tr>";
			}
		echo"</table>";
	//fungsi paging mulai ***********************************************************************

?>