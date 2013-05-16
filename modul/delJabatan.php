<?php
if($_GET['id']!="") {
		$cari=mysql_query("select * from jabatan where id_jabatan='".$_GET['id']."'",$koneksi) or die ("Data tidak ditemukan !");
		$ada=mysql_num_rows($cari);
		if($ada>=1) {
			$sql=mysql_query("delete from jabatan where id_jabatan='".$_GET['id']."'",$koneksi) or die ("Gagal menghapus data !");
			if($sql) {
				echo"<div class=\"yes\"><strong>Jabatan berhasil dihapus !</strong></div>";
				echo "<meta http-equiv='refresh' content='2; url=?mod=listjabatan'>";
			}
		} else {
			echo"<div class=\"error\"><strong>Data tidak ditemukan !</strong></div>";
		}
	} else {
		echo"<div class=\"error\"><strong>Data tidak ditemukan !</strong></div>";
	}
?>