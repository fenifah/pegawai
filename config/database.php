<?php
$db_hostname="localhost";
$db_username="root";
$db_password="";
$db_name="sip";
mysql_connect("$db_hostname","$db_username","$db_password")
	or die ('Tidak Bisa Terkoneksi Dengan Database: '.mysql_error());
mysql_select_db("$db_name");
?>
