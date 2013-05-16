<?php
  
/*memulai session untuk menyimpan hasil pengacakan string*/  
session_start();

/*membuat gambar berukuran 70x30 piksel*/
mt_srand((double)microtime()*1000000);
$jarak1 = mt_rand(0,10);
$jarak2 = mt_rand(0,10);
$jarak3 = mt_rand(0,10);
$jarak4 = mt_rand(0,10);
$ujung1 = mt_rand(0,60);
$ujung2 = mt_rand(0,60);
$ujung3 = mt_rand(0,60);
$ujung4 = mt_rand(0,60);
$ujung5 = mt_rand(0,60);
$ujung6 = mt_rand(0,60);
$ujung7 = mt_rand(0,60);
$ujung8 = mt_rand(0,60);
$warna1 = mt_rand(0,150);
$warna2 = mt_rand(0,150);
$warna3 = mt_rand(0,150);
$warna4 = mt_rand(0,150);
$warna5 = mt_rand(0,150);
$warna6 = mt_rand(0,150);
$width=70;
$height=30;
$im = imagecreate($width, $height);
$warna_background = imagecolorallocate($im, 255, 255, 255);
$warna_text = imagecolorallocate($im, $warna4, $warna5, $warna6);
$warna_garis = imagecolorallocate($im, $warna1, $warna2, $warna3);
   
/*string teks yang akan diacak*/
$str = '123456789';  
   
/*mengambil enam karakter saja dari hasil pengacakan string*/  
$text = substr(str_shuffle($str),0,6);

/*membuat garis acak pada background*/
imagefill($im, 0, 0, $warna_background); 
imageline($im, 0, $jarak1, $ujung1, $ujung2, $warna_garis); 
imageline($im, 0, $jarak2, $ujung3, $ujung4, $warna_garis); 
imageline($im, 60, $jarak3, $ujung5, $ujung6, $warna_garis); 
imageline($im, 60, $jarak4, $ujung7, $ujung8, $warna_garis); 

/*parameter fungsi imagestring(gambar_sumber,ukuran_font,sudut,x,y, 
warna,text_yang_akan_ditulis,warna_text)*/
imagestring($im, 30, 9, 7, $text, $warna_text);

//menghidupkan session
/*nilai variabelnya dienkripsi, bisa plain, agar lebih aman dienkripsi*/  
$_SESSION['random'] = md5($text);
   
header("Content-type:image/png");
imagepng($im);
imagedestroy($im);
?> 