<?php
if($_GET['id']!="") {
		$cari=mysql_query("select * from pegawai where id_peg='".$_GET['id']."'",$koneksi) or die ("Data 1tidak ditemukan !");
		$ada=mysql_num_rows($cari);
		if($ada>=1) {
			$sql=mysql_query("delete from pegawai where id_peg='".$_GET['id']."'",$koneksi) or die ("Gagal menghapus data !");
			if($sql) {
				echo"<div class=\"yes\"><strong>Data pegawai berhasil dihapus !</strong></div>";
				echo "<meta http-equiv='refresh' content='2; url=?mod=listpeg'>";
			}
		} else {
			echo"<div class=\"error\"><strong>Data tidak ditemukan !</strong></div>";
		}
	} else {
		echo"<div class=\"error\"><strong>Data tidak ditemukan !</strong></div>";
	}
?>