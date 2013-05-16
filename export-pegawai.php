<?php
  //Send Header
  
header("Pragma: public");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");;
header("Content-Disposition: attachment;filename=Table-Pegawai.xls "); 
header("Content-Transfer-Encoding: binary");

function koneksi() {
global $koneksi;
$host="localhost"; //nama host
$username="root"; //username host
$pass=""; //password host
$db="sip"; //nama database	
	$koneksi=mysql_connect($host,$username,$pass) or die ("<h3>Koneksi Error !</h3>");
	mysql_select_db($db,$koneksi) or die ("<h3>Koneksi Database Error !</h3>");
}
    // XLS Data CellP
//echo "\<meta http-equiv="location" content="URL=http://www.w3schools.com" /> 
function xlsBOF() {
    echo pack("ssssss", 0x809, 0x8, 0x0, 0x10, 0x0, 0x0);  
    return;
}

function xlsEOF() {
    echo pack("ss", 0x0A, 0x00);
    return;
}

function xlsWriteNumber($Row, $Col, $Value) {
    echo pack("sssss", 0x203, 14, $Row, $Col, 0x0);
    echo pack("d", $Value);
    return;
}

function xlsWriteLabel($Row, $Col, $Value ) {
    $L = strlen($Value);
    echo pack("ssssss", 0x204, 8 + $L, $Row, $Col, 0x0, $L);
    echo $Value;
return;
} 


 
                xlsBOF();
                xlsWriteLabel(3,3,"DAFTAR PEGAWAI ");
                xlsWriteLabel(4,3,"PT MAJU TERUS PANTANGMUNDUR");
                xlsWriteLabel(6,0,"NO");
                xlsWriteLabel(6,1,"NO. PEGAWAI");
                xlsWriteLabel(6,2,"NAMA");
                xlsWriteLabel(6,3,"ALAMAT");
                xlsWriteLabel(6,4,"JENIS KELAMIN");
				xlsWriteLabel(6,5,"TEMPAT LAHIR");
				xlsWriteLabel(6,6,"TANGGAL LAHIR");
				xlsWriteLabel(6,7,"AGAMA");
				xlsWriteLabel(6,8,"JABATAN");
				xlsWriteLabel(6,9,"NO.TELP");
      
/* mysql_connect("localhost", "root", "");
mysql_select_db("pegawai");
 */
 koneksi();
$query = "SELECT * FROM pegawai, jabatan WHERE pegawai.id_jabatan=jabatan.id_jabatan ORDER BY id_peg";
$hasil = mysql_query("SELECT * FROM pegawai, jabatan WHERE pegawai.id_jabatan=jabatan.id_jabatan ORDER BY id_peg",$koneksi);  

$xlsRow = 7;
//$result=mysql_query("SELECT * FROM pegawai, jabatan WHERE pegawai.id_jabatan=jabatan.id_jabatan",$koneksi);
          while ($data = mysql_fetch_array($hasil))
			{

                    ++$i;
                          xlsWriteNumber($xlsRow,0,"$i");
                          xlsWriteLabel($xlsRow,1,$data['nip']);
                          xlsWriteLabel($xlsRow,2,$data['nama']);
                          xlsWriteLabel($xlsRow,3,$data['alamat']);
						  if ($data['jenis_kelamin'] == 'L') $status = "Pria";
							else $status = "Wanita";
						  xlsWriteLabel($xlsRow,4,$status);
						  xlsWriteLabel($xlsRow,5,$data['tempat_lahir']);
						  xlsWriteLabel($xlsRow,6,$data['tgl_lahir']);
						  xlsWriteLabel($xlsRow,7,$data['agama']);
						  xlsWriteLabel($xlsRow,8,$data['nama_jabatan']);
						  xlsWriteLabel($xlsRow,9,$data['notelp']);					
						 
                    $xlsRow++;
                    }				
				
                     xlsEOF();
					 header("Pragma: public");
/*header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");;
header("Content-Disposition: attachment;filename=Table-Siswa.xls "); 
header("Content-Transfer-Encoding: binary");*/
                 exit();
?>