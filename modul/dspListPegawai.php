<?php
switch($_GET['act'])
{
	
	case '':
	include "dspDataPegawai.php";
	break;
	
	case 'detail':
	include "detailPegawai.php";
	break;
	
	case 'edit':
	include "editPegawai.php";
	break;
	
	case 'hapus':
	include "delPegawai.php";
	break;
	
	case 'cetak':
	include "cetak-pegawai.php";
	break;
	
	case 'excel':
	include "export-pegawai.php";
	break;
	
	case 'pdf':
	include "ex-pdf	.php";
	break;
	
}

?>