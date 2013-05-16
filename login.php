<?php
session_start();
include "../config/fungsi.php";
koneksi();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Login Administrator</title>
    <link href="../images/login.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="loginadmin">
<h3>Login !</h3>
<?php
if ($_POST['login']) {
	$uname=filter($_POST['username']);
	$pass=filter($_POST['password']);
	$passhash=md5($pass);
	
	//cek user dan buat sesi
	
	$sql = "select * from admin where username='$uname' and password='$passhash'";
	$hasil = mysql_query($sql, $koneksi) or die ("GAGAL CEK USER DAN PASSWORD");
	$data = mysql_fetch_array($hasil);
	$ada = mysql_num_rows($hasil);
	
	if ($ada>=1) {
		
		session_start();
		$komunitas_admin_id=$uname;
		session_register("komunitas_admin_id");
		
		$komunitas_admin_pass=$pass;
		session_register("komunitas_admin_pass");
		
		echo "<meta http-equiv='refresh' content='0; url=index.php'>";
		
		/*header("location:index.php");
		exit;*/

	}
}
?>
<form action="" method="post" name="formlogin">
<label>Username</label><br />
<input name="username" type="text" size="28" />
<br />
<label>Password</label><br />
<input name="password" type="password" size="28" />
<br />
<input name="login" type="submit" value="Login" />&nbsp;&nbsp;&nbsp;<a href="#">&laquo; Back to Home</a>
</form>
</div>
<!--  -->
</body>
</html>