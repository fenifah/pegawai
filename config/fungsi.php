<?php
//menghindari akses file langsung
/* if(ereg(basename(__FILE__), $_SERVER['PHP_SELF']))
{
	header("HTTP/1.1 404 Not Found");
	exit;
} */

//koneksi database
function koneksi() {
global $koneksi;
$host="localhost"; //nama host
$username="root"; //username host
$pass=""; //password host
$db="sip"; //nama database	
	$koneksi=mysql_connect($host,$username,$pass) or die ("<h3>Koneksi Error !</h3>");
	mysql_select_db($db,$koneksi) or die ("<h3>Koneksi Database Error !</h3>");
}

//untuk identifikasi keadaan login
/* function sesi_admin() {
	if(((session_is_registered(komunitas_admin_id))&&(session_is_registered(komunitas_admin_pass)))) {
		return true;
	}
	else {
		return false;
	}
} */
//saring input form (validasi untuk menghindari script injection)
function filter($input) {
$input = trim($input);
$input = stripslashes($input);
$input = nl2br($input);
$input = addslashes($input);
$input = strip_tags($input);
$input = htmlentities($input);
return $input;
}

//konversi tanggal inggris ke indonesia
function datetimes($tgl,$jam=true){
//Contoh Format : 2007-08-15 01:27:45
$tanggal = strtotime($tgl);
$bln_array = array (
			'01'=>'Januari',
			'02'=>'Februari',
			'03'=>'Maret',
			'04'=>'April',
			'05'=>'Mei',
			'06'=>'Juni',
			'07'=>'Juli',
			'08'=>'Agustus',
			'09'=>'September',
			'10'=>'Oktober',
			'11'=>'November',
			'12'=>'Desember'
			);
$hari_arr = array (
			'0'=>'Minggu',
			'1'=>'Senin',
			'2'=>'Selasa',
			'3'=>'Rabu',
			'4'=>'Kamis',
			'5'=>'Jum`at',
			'6'=>'Sabtu'
			);
$hari = @$hari_arr[date('w',$tanggal)];
$tggl = date('j',$tanggal);
$bln = @$bln_array[date('m',$tanggal)];
$thn = date('Y',$tanggal);
$Jam = $jam ? date ('H:i:s',$tanggal) : '';
return "$hari, $tggl $bln $thn $Jam";			
}

//konversi tanggal tanpa jam
function datenotimes($tgl,$jam=true){
//Contoh Format : 2007-08-15 01:27:45
$tanggal = strtotime($tgl);
$bln_array = array (
			'01'=>'Januari',
			'02'=>'Februari',
			'03'=>'Maret',
			'04'=>'April',
			'05'=>'Mei',
			'06'=>'Juni',
			'07'=>'Juli',
			'08'=>'Agustus',
			'09'=>'September',
			'10'=>'Oktober',
			'11'=>'November',
			'12'=>'Desember'
			);
$hari_arr = array (
			'0'=>'Minggu',
			'1'=>'Senin',
			'2'=>'Selasa',
			'3'=>'Rabu',
			'4'=>'Kamis',
			'5'=>'Jum`at',
			'6'=>'Sabtu'
			);
$tggl = date('j',$tanggal);
$bln = @$bln_array[date('m',$tanggal)];
$thn = date('Y',$tanggal);
$Jam = $jam ? date ('H:i:s',$tanggal) : '';
return "$tggl $bln $thn";			
}

//konversi tanggal tanpa jam
function dateindo($tgl){
//Contoh Format : 2007-08-15 01:27:45
$tanggal = strtotime($tgl);
$bln_array = array (
			'01'=>'Januari',
			'02'=>'Februari',
			'03'=>'Maret',
			'04'=>'April',
			'05'=>'Mei',
			'06'=>'Juni',
			'07'=>'Juli',
			'08'=>'Agustus',
			'09'=>'September',
			'10'=>'Oktober',
			'11'=>'November',
			'12'=>'Desember'
			);
$hari_arr = array (
			'0'=>'Minggu',
			'1'=>'Senin',
			'2'=>'Selasa',
			'3'=>'Rabu',
			'4'=>'Kamis',
			'5'=>'Jum`at',
			'6'=>'Sabtu'
			);
$tggl = date('j',$tanggal);
$bln = @$bln_array[date('m',$tanggal)];
$thn = date('Y',$tanggal);
return "$tggl $bln $thn";			
}

//membuat angka dalam rupiah
function rupiah($angka) {
	$hasil = number_format($angka,0, ",",".");
	$hasil2 = "Rp. ".$hasil.",-";
	return $hasil2;
}
?>