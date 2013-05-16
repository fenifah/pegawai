<?php
   
    include "config/fpdf.php";
	//include "config/fpdf.css";
	include "config/fungsi.php";
	$date=date('Y-m-d'); 
		//$this->load->helper('pdf');
		//$this->load->library('fpdf');
	
            $pdf=new FPDF('P','cm','A4');

            $pdf->Open();
            $pdf->AddPage();
	$pdf->Image('D:/xampp/htdocs/pegawai/images/logo.jpeg',2.1,1.05,4);
	$pdf->SetFont('Arial','B',15);
	$x=$pdf->GetY();
	$pdf->SetY($x+0.5);$pdf->SetX(6);
	$pdf->Cell(0,1,'SiFo KEpegawaian',0,0,'L');
	$pdf->Ln();
	$x=$pdf->GetY();
	$pdf->SetY($x+0.2);$pdf->SetX(6);
	$pdf->SetFont('Arial','B',15);
	$pdf->Cell(0,1,'Maju Terus Pantang Mundur ',0,0,'L');
	$pdf->Ln();
	//$pdf->Cell(19,1,'',0,0,'L');
	//$pdf->Ln();
	$pdf->SetX(3.2);
	$pdf->SetFont('Arial','B',14);
	$pdf->Cell(9.7,1,'Laporan Data Pegawai',0,0,'R');
	$pdf->Ln();
        $pdf->SetX(3.2);
	$pdf->SetFont('Arial','U',12);
        $pdf->Cell(10,0,'Dicetak pada :'.datenotimes($date),0,0,'R');

            $x=$pdf->GetY();
            $pdf->SetY($x+1);
            $pdf->SetFont('Arial','B',10);
            $pdf->SetFillColor(0,0,0);
            $pdf->SetTextColor(255);
            $pdf->Cell(1,1,'No',1,0,'C',1);
            $pdf->Cell(2,1,'No. Peg.',1,0,'C',1);
            $pdf->Cell(3,1,'Nama',1,0,'C',1);
           // $pdf->Cell(1.5,1,'Usia',1,0,'C',1);
            $pdf->Cell(3,1,'Tanggal Lahir',1,0,'C',1);
            $pdf->Cell(3,1,'Jenis Kelamin',1,0,'C',1);
            $pdf->Cell(3,1,'Alamat',1,0,'C',1);
            $pdf->Cell(2,1,'No. Telp',1,0,'C',1);
            $pdf->Cell(2,1,'Jabatan',1,0,'C',1);
            //$pdf->Cell(2,1,'Keterangan',1,0,'C',1);
            $pdf->Ln();

function koneksinya() {
global $koneksinya;
$host="localhost"; //nama host
$username="root"; //username host
$pass=""; //password host
$db="sip"; //nama database	
	$koneksinya=mysql_connect($host,$username,$pass) or die ("<h3>Koneksi Error !</h3>");
	mysql_select_db($db,$koneksinya) or die ("<h3>Koneksi Database Error !</h3>");
}		
 koneksinya();
 
$query = "SELECT * FROM pegawai, jabatan WHERE pegawai.id_jabatan=jabatan.id_jabatan ORDER BY id_peg";
$hasil = mysql_query("SELECT * FROM pegawai, jabatan WHERE pegawai.id_jabatan=jabatan.id_jabatan ORDER BY id_peg",$koneksinya);  


		   $i = 0;
           // $x=($bulan-1);
            //$z=$y[$x];
			$now=date('Y-m-d');
            //$cetak=date("D, d F Y");
			$cetak=datenotimes($now);
            while ($data = mysql_fetch_array($hasil))
			{
            $pdf->SetFont('Arial','',10);
            $pdf->SetFillColor(224,235,255);
            $pdf->SetTextColor(0);
            $pdf->Cell(1,1,++$i,'LR',0,'C',1);
            $pdf->Cell(2,1,$data['nip'],'LR',0,'C',0);
            $pdf->Cell(3,1,$data['nama'],'LR',0,'C',1);
            $pdf->Cell(3,1,datenotimes($data['tgl_lahir']),'LR',0,'C',1);
			 if ($data['jenis_kelamin'] == 'L') $status = "Pria";
			else $status = "Wanita";
            $pdf->Cell(3,1,$status,'LR',0,'C',0);
            $pdf->Cell(3,1,$data['alamat'],'LR',0,'C',1);
            $pdf->Cell(2,1,$data['notelp'],'LR',0,'C',0);
            $pdf->Cell(2,1,$data['nama_jabatan'],'LR',0,'C',1);
           // $pdf->Cell(2,1,$row->keterangan,'LR',0,'C',0);
            $pdf->Ln();

            }

            $pdf->Cell(14,0,'',1,0);
            $pdf->Output();
     

 
 ?>
