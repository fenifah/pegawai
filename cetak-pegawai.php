


<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"><style>
body {
	font-family: Tahoma, Verdana, Arial, Trebuchet MS;
	font-size:11px;
	letter-spacing:0.5px;
	margin: 0 auto;
}
.images{
	text-decoration:none;
	font:10px tahoma;
	padding:2px;
	margin-bottom:5px;
	border-bottom:3px solid #0000CC;
}

#blockImages{
		float:left;
		margin: 0px 20px 15px 0px;
		padding-bottom:6px;
        width:260px;
		border-bottom:4px solid #dddddd;
	}
	#blockImages td {
		font-size:10px; 
		text-align:left
		}	
    #blokDetailBox {
        height:inherit;
        }
    #blokDetailBorder {
        height:inherit;
        padding:15px 55px 15px 55px;
        background:#fff;
        }
    #blockImages .blokUtamaIMG {
        margin: 0px 15px 10px 0px;
        width:250px;
        border:1px solid #ccc;
        padding:4px;
        }
    #blokDetailText {
	text-align:left;
	margin: 30px 0px 15px 0px;
	line-height:16px;
	color:#333;
        }
    #blokDetailWadah {
	margin:0 auto;
	width: 800px;
	border-bottom: 5px solid #0000CC;
	padding-top: 12px;
       }
	 #UtamaTgl {
	font-size:10px;
	color:#555;
	margin-top:0px;
	text-transform:uppercase;
	text-align: right;
	letter-spacing: normal;
                }
            #UtamaDeck {
				font-size:12px;
				color:#666666 /* 555  79aa9b*/;
				font-weight:bold;
				margin-top:12px;
                }
            #UtamaTitle {
	font-size:14px;
	color:#000099;
	font-weight:bold;
	margin:8px 0px 5px 0px;
	padding-bottom:5px;
	border-bottom:5px solid #eeeeee;
	text-transform:normal;
	letter-spacing: normal;
                }
            #UtamaLead {
                font-size:15px;
                color:#666 ;
                margin-top:10px;
                margin-bottom:20px;
                }
	#text_closed {
	font-size:10px;
	color:#7c7c7c;
	font-weight:bold;
	float:left;
	text-transform:normal;
	letter-spacing: normal;
		}
	#footerx {
	width:784px;
	margin: 0 auto;
	padding: 8px;
	font-size:11px;
	font-weight:normal;
	color:#666666;
	background:#eeeeee;
	margin-top:40px;
	border-top: 1px solid #cccccc;
		}
	#footerx a { color:#000000; text-decoration:none }
</style>
<style media="print">
.images{
	display:none;
}
</style>
<style type="text/css">
.style3 {font-size: 11px}
</style>
</head>
<body>
<div class="images">
<table border="0" cellpadding="0" cellspacing="2" width="100%">	
	<tbody><tr>
    	<td>
       	  <img src="images/print.jpeg" width="30" onClick="javascript:print()" href="javascript:void(0)" style="padding: 6px 10px;">Print Now</td>
    </tr>
</tbody></table>
</div>

<?php
	$tgl = date('Y-m-d');
	$tahun = date('Y');
?>
<div id="blokDetailWadah">
      <table width="99%" border="0" border color="#CCCCCC" class="style3" cellspacing="2" cellpadding="2">
        <tr>
        	<td colspan="2">
            <div id="UtamaTitle">
            <table width="100%" height="7%" border="0" cellpadding="0" cellspacing="0">
        	  <tr>
        	    <td width="7%" rowspan="3" valign="top" ><img src="images/logo.jpeg" width="60" height="60" alt="smk"></td>
        	    <td valign="top" ><span class="style3"><strong>SISTEM INFORMASI KEPEGAWAIAN </strong></span></td>
       	      </tr>
        	  <tr>
        	    <td valign="top" ><span class="style3"><strong>MAJU TERUS PANTANG MUNDUR</strong></span></td>
       	      </tr>
        	  <tr>
        	    <td width="93%" height="20" valign="top" class="style3">LAPORAN DATA PEGAWAI TAHUN <?php echo $tahun; ?> </td>
       	      </tr>
       	  </table>
          </div>
          </td>
        </tr>
        <tr>

          
        <td><div id="UtamaTitle">
          <table  width="100%" border="1" cellpadding="0" cellspacing="0" class="style3">
            
            <tr class="style3">
             <td width="50" align="center"><b>No</b></td>
			  <td width="150" align="left" ><b>No. Pegawai</b></td>
			  <td width="400" align="left" ><b>Nama</b></td>
			  <td width="300" align="left"><b>Jenis Kelamin</b></td>
              <td width="420" align="left"><b>Tempat, Tanggal Lahir</b></td>
			  <td width="400" align="left"><b>Alamat</b></td>
			  <td width="200" align="left"><b>Jabatan</b></td>
            </tr>
            <?php
			include "config/database.php";
			include "config/fungsi.php";
		
                $sql=mysql_query("select * from pegawai, jabatan where pegawai.id_jabatan=jabatan.id_jabatan") or die ("Data tidak ditemukan");
					$no=0;
				//$ada=mysql_num_rows($cari);
				while($data=mysql_fetch_array($sql)) {
				
    			$no++;
				$tgl_lahir=dateindo($data['tgl_lahir']);
				$tmpt_lahir=$data['tempat_lahir'];
				$ttl=$tmpt_lahir.",".$tgl_lahir;
				?>
            <tr>
              <td align="center"><?=$no?></td>
              <td align="left"><?php echo $data['nip']?></td>
			 <!-- <td align="left"></td> -->
              <td align="left"><?php echo $data['nama']?></td>
			   <td align="center">
			   <?php 
			   if ($data['jenis_kelamin']=='L')
			   {
			   echo "Pria";
			   }
			   else 
			   {echo "Wanita";}
			   ?>
			   </td>
			  <td align="left"><?php echo $ttl?></td>
			  <td align="left"><?php echo $data['alamat']?></td>
			  <td align="right"><?php echo $data['nama_jabatan']?></td>
            </tr>
			
            <?php
				}
				?>
          </table>
          <p>&nbsp;</p>
        </div></td>
        </tr>
      </table>
   

<div id="footerx"><strong>Sistem Informasi Kepegawaian</strong><br>
  PT Suka Suka<br>
  Dicetak : 
  <?php 
  echo datenotimes($tgl);
  ?>
  </div>
</div>

</body></html>