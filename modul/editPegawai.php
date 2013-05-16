<?php
$sql=mysql_query("select * from pegawai, jabatan where pegawai.id_jabatan=jabatan.id_jabatan AND id_peg='".$_GET['id']."'",$koneksi) or die ("Data tidak ditemukan");
$data=mysql_fetch_array($sql);

?>

<form action="" method="post" name="form1" enctype="multipart/form-data">
		<label>Foto</label>
		
			<img src="img/<?php echo $data['foto']?>" width="100"  /><br /><br />
		<label></label><input name="userfile" type="file" />
		        <font face="Lucida Console" size="1" color="#009900">
*) Apabila file tidak diubah, dikosongkan saja. </font>
		<label>No. Pegawai</label> 
		<input name="nip" type="text" size="50" value="<?php echo $data['nip']?>"/><br />
			<br />
			
		<label>Nama</label>
			<input name="nama" type="text" size="50" value="<?php echo $data['nama']?>"/><br />
			
		<label>Tempat Lahir</label>
			<input name="tempat_lahir" type="text" size="50" value="<?php echo $data['tempat_lahir']?>" /><br />
			
		<label>Tanggal Lahir</label>
			<input name="tgl_lahir" type="text" size="12" value="<?php echo $data['tgl_lahir']?>" /><br />
		
		<label>Jenis Kelamin</label>  
		<?php
		$jk=$data['jenis_kelamin'];
		if ($jk=='L') {$status="checked"; $status2="";}
		else { $status2="checked"; $status=""; }
		?>
			<input name="jenis_kelamin" type="radio" value="L"<?php echo $status; ?> />Pria
		<input name="jenis_kelamin" type="radio" value="P"  <?php echo $status2; ?>/> Wanita         
		<br />
		<br />
		<label>Agama</label>
			 <select name="agama">
		<?php
		$check=$data['agama'];
		?>
         <option value="Islam" >Islam</option>
         <option value="Kristen" >Kristen</option>
         <option value="Katholik" >Katholik</option>
         <option value="Hindhu" >Hindhu</option>
         <option value="Budha" >Budha</option>
		 </select>
			<br />
			<br />
		<label>Alamat</label>
			<textarea name="alamat" cols="33" rows="5" ><?php echo $data['alamat']?></textarea><br />
			
		<label>No. Telepon</label>
			<input name="notelp" type="text" size="20" maxlength="12"  value="<?php echo $data['notelp']?>"  /> <br /><br />
			
		<label>Jabatan</label>
			<select name="jabatan">
			<?php
			$checked=$data['id_jabatan'];
			$sql=mysql_query("select * from jabatan order by id_jabatan",$koneksi) or die ("Data tidak ditemukan");
				while($datanya=mysql_fetch_array($sql)) {
				if ($checked==$data['id_jabatan']) $status="selected"; else $status="";
			?>
			 <option value="<?php echo $datanya['id_jabatan']?>" selected="<?php echo $selected; ?>"><?php echo $datanya['nama_jabatan'] ?></option>
			 <?php
			 }
			 ?>
			 </select>
			<br><br />
		<br>
	<label></label><input name="update" type="submit" value="Update" class="button" />
	</form>	

	
<?php
############action kalo d submit###############
if($_POST['update']) {
/* print_r($_POST); */

	$nip=filter($_POST['nip']);
	$nama=filter($_POST['nama']);
	$tempat_lahir=filter($_POST['tempat_lahir']);
	$tgl_lahir=filter($_POST['tgl_lahir']);
	$jenis_kelamin=filter($_POST['jenis_kelamin']);
	$agama=filter($_POST['agama']);
	$alamat=filter($_POST['alamat']);
	$notelp=filter($_POST['notelp']);
	$jabatan=filter($_POST['jabatan']);
	$fileName = $_FILES['userfile']['name'];   
	$tmpName  = $_FILES['userfile']['tmp_name']; 
		
	if(($nama=="") || ($tempat_lahir=="") || ($jabatan=="")) {
	//dan seterusnya, apa aja yang mau dicek, sesuai validasi yang dibutuhkan ntar
		echo"<div class=\"error\"><strong>Error, input tidak lengkap !</strong></div>";
		} else {
		if ($tmpName=="") //ini kalo gambarnya tidak digantio
		{ 
		$sql=mysql_query("update pegawai set nip='$nip',
				nama='$nama', tempat_lahir='$tempat_lahir', tgl_lahir='$tgl_lahir',
				jenis_kelamin='$jenis_kelamin', agama='$agama', alamat='$alamat', notelp='$notelp', id_jabatan='$jabatan'  WHERE id_peg = '$_GET[id]'",$koneksi) or die ("Gagal menambah data !");
			if ($sql){
				echo"<font face=\"Lucida Sans Unicode\" size=\"2\" color=\"#009900\">
				Data telah berhasil di update !</font>";
				echo "<meta http-equiv='refresh' content='2; url=?mod=listpeg'>";	
					 }						 
		}
		//aPABILA GAMBAR DIGANTI
		else
 
		{ 
		//copy file gambar ke server
			$fileName = $_FILES['userfile']['name'];   
			$uploaddir = 'img/'; //direktori upload	

			$uploadfile = $uploaddir . $fileName;
			// nama file temporary yang akan disimpan di server
			$tmpName  = $_FILES['userfile']['tmp_name']; 
			// ukuran file yang diupload
			$fileSize = $_FILES['userfile']['size'];
			// jenis file yang diupload
			$fileType = $_FILES['userfile']['type'];
				
				$sql=mysql_query("update pegawai set nip='$nip', 
				nama='$nama', tempat_lahir='$tempat_lahir', tgl_lahir='$tgl_lahir',
				jenis_kelamin='$jenis_kelamin', agama='$agama', alamat='$alamat', notelp='$notelp', foto='$fileName', id_jabatan='$jabatan'  WHERE id_peg = '$_GET[id]'",$koneksi) or die ("Gagal menambah data !");
			
			if (move_uploaded_file($_FILES['userfile']['tmp_name'],"img/" . $_FILES["userfile"]["name"])) 
			{	
				echo"<font face=\"Lucida Sans Unicode\" size=\"3\" color=\"#009900\">
					File telah berhasil di update !</font>";	
				echo "<meta http-equiv='refresh' content='2; url=?mod=listpeg&act=detail&id=$_GET[id]'>";	
			}
					
		
		
		}

		}
}
?>
