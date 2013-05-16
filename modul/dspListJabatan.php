<?php
switch($_GET['act'])
{
	
	case '':
	include "dspJabatan.php";
	break;
	
	case 'edit':
	include "editJabatan.php";
	break;
	
	case 'add':
	include "addJabatan.php";
	break;
	
	case 'hapus':
	include "delJabatan.php";
	break;
	
}

?>