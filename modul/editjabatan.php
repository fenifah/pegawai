<?php

echo"<h3>Edit Jabatan</h3>";
	if(!$_GET['id']=="") {
		$cari=mysql_query("select * from jabatan where id_jabatan='".$_GET['id']."'",$koneksi) or die ("Data tidak ditemukan !"); //cari data jabatan
		$ada=mysql_num_rows($cari);
		if($ada>=1) {
			if($_POST['update']) { //jika d update
				$nama_jabatan=filter($_POST['nama_jabatan']); //set value nama_jabatan, filter itu fungsi cek inputan , lokasinya di config/fungsi.php
			
				if(($nama_jabatan=="")) {
					echo"<div class=\"error\"><strong>Error, input tidak lengkap !</strong></div>";
				} else {
					$sql=mysql_query("update jabatan set nama_jabatan='$nama_jabatan' where id_jabatan='".$_GET['id']."'",$koneksi) or die ("Gagal menambah data".mysql_error());
					if($sql) {
						echo"<div class=\"yes\"><strong>Jabatan berhasil diupdate !</strong></div>";
						echo "<meta http-equiv='refresh' content='2; url=?mod=listjabatan'>";
					}
				}
			}
		} else {
			echo"<div class=\"error\"><strong>Data tidak ditemukan !</strong></div>";
		}
		$data=mysql_fetch_array($cari);
	}
	?>
	<form action="" method="post" name="form1">
	<label>Nama Jabatan</label>
	<?php
	echo "<input type='text' name='nama_jabatan' value='".$data['nama_jabatan']."' />";
	?>
	<br>
	<br>
	<label></label><input name="update" type="submit" value="Update" class="button" />
	</form>
