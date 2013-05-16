<?php

echo"<p><img src=\"images/add.png\" alt=\"add jabatan\">&nbsp;&nbsp; <a href=\"?mod=listjabatan&act=add\">Tambah Jabatan</a></p>";

echo "
			<table width=\"660\">
				<tr>
					<th width=\"10\">No</th>
					<th width=\"436\">Nama Jabatan</th>
					<th width=\"436\">Salary</th>
					<th width=\"71\">Edit</th>
					<th width=\"71\">Hapus</th>
				</tr>";
				//mulai paging halaman, ini buat paging di tampilan list pegawainya
				
				//*******************************
				$sql=mysql_query("select * from jabatan  order by id_jabatan asc",$koneksi) or die ("Data tidak ditemukan");
				while($data=mysql_fetch_object($sql)) {
				$no++;
				if($no%2==1) { $row="row-a"; } else { $row="row-b"; }
				echo"<tr class=\"$row\">
					<td align=\"center\">$no</td>
					<td>$data->nama_jabatan</td>
					<td>".rupiah($data->salary)."</td>
					<td align=\"center\"><a href=\"?mod=listjabatan&act=edit&id=$data->id_jabatan\"><img src=\"images/edit.gif\" alt=\"edit jabatan\"></a> </td>
					<td align=\"center\"><a href=\"?mod=listjabatan&act=hapus&id=$data->id_jabatan\"><img src=\"images/close.png\" alt=\"hapus\"></a></td>
				</tr>";
			}
		echo"</table>";
?>