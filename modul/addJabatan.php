<?php

	if($_POST['simpan']) {
	$nama_jabatan=$_POST['nama_jabatan'];
		
		if(($nama_jabatan=="") ) //ini buat cek inputan nama jabatan tu diisi apa engga, buat validasi
		{ 
			echo"<div class=\"error\"><strong>Error, input tidak lengkap !</strong></div>";
		} else {
			$sql=mysql_query("insert into jabatan set nama_jabatan='$nama_jabatan'",$koneksi) or die ("Gagal menambah data".mysql_error());
			if($sql) {
				echo"<div class=\"yes\"><strong>Jabatan berhasil ditambahkan !</strong></div>";
				echo "<meta http-equiv='refresh' content='2; url=?mod=listjabatan'>";
			}
		}
	}
?>
	<h3> Tambah Jabatan </h3>
	<form action="" method="post" name="form1">
	<label>Nama Jabatan</label><input name="nama_jabatan" type="text" size="50" value="" /><br /></br>
	<label></label><input name="simpan" type="submit" value="Simpan" class="button" />&nbsp;&nbsp;
	<input type="reset" name="Reset" value="Reset" class="button" />
	</form>

