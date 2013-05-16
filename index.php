<?php

error_reporting(5);

session_start();
include "config/fungsi.php";
koneksi();
//if(sesi_admin()) {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Adsense Tools</title>
  
<link href="images/admin.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="wrap">
	<div id="header">
	  <h3>Selamat Datang !</h3>
	</div>
	<div id="main">
		<div id="sidebar-left">
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="?mod=addpeg">Input Data Pegawai</a></li>
				<li><a href="?mod=listpeg">List Data Pegawai</a></li>
				<li><a href="?mod=listjabatan">List Jabatan</a></li>
				<li><a href="?mod=seacrh">Search</a></li>
				
			</ul>
		</div>
		<div id="sidebar-right">
			<?php
			
			//swith untuk file yang di include d index.php sesuai actionnya
				switch(@$_GET['mod']) {
					case '':
						echo"<h3>Welcome to Site Administrator	!</h3>";
					break;
					case 'addpeg':
						include "modul/actAddPegawai.php";
					break;
					case 'listpeg':
						include "modul/dspListPegawai.php";
					break;
					case 'listjabatan':
						include "modul/dspListJabatan.php";
					break;
					case 'seacrh':
						include "modul/seacrhpeg.php";
					break;
					
				}
			?>	
		</div>
		<div class="clear"></div>
	</div>
</div>
<!-- -->
</body>
</html>
<?php
/* } else {
//echo "<meta http-equiv='refresh' content='0; url=login.php'>";
header("location:login.php");
} */
?>