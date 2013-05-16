<!-- form untuk add data pegawai -->
<?php
//fungsi untuk ambil No Pegawai seacara otomatis, terserah patternya, disini contohnya P[tahunmasuk]-[nopegawai]
								   								
		$year=date('Y');
		$id=mysql_query("select nip from pegawai order by id_peg desc limit 1",$koneksi); //cari id yang terakhir
		$idnya=mysql_fetch_array($id);
		$idne=$idnya['nip'];
        //kalo data udah ada, cari yang terkahir, dipecah trus diformat biar P[tahun][no uurt]
		$pecah=explode("-",$idne);
        $angka=$pecah[1];
		//$angka=substr($idnya,6,3); //P2012-001, diambil 3 karakter dibelakang, -> 001
		//echo $angka;

		$angka_baru=$angka+1;

		$pk_n = strlen($angka_baru); //jumlah karakter
		if($pk_n=='1'){
		$angka_baru="00".$angka_baru;
		} else if ($pk_n=='2'){
		$angka_baru="0".$angka_baru;
		}
		else
		{ $angka_baru="Data Error";}
		
		
        $nip=("P".$year."-".$angka_baru);

?>
<form action="" method="post" name="form1" enctype="multipart/form-data">
		<label>No. Pegawai</label> 
		<input name="nip" type="text" size="50" readonly="true" value="<?php echo $nip; ?>"/><br />
			<br />
			
		<label>Nama</label>
			<input name="nama" type="text" size="50"/><br />
			
		<label>Tempat Lahir</label>
			<input name="tempat_lahir" type="text" size="50" /><br />
			
		<label>Tanggal Lahir</label>
			<input name="tanggal_lahir" type="text" size="10" id="datepick" /> <font face="Lucida Console" size="1" color="#009900">
*) Y-m-d </font>
			<br />
		
		<label>Jenis Kelamin</label>
		<input name="jenis_kelamin" type="radio" value="L" checked="checked" />Pria
		<input name="jenis_kelamin" type="radio" value="P"  /> Wanita                    
		<br /> <br />
		<label>Agama</label>
        <select name="agama">
		 <option value="">--Pilih Agama--</option>
         <option value="Islam">Islam</option>
         <option value="Kristen">Kristen</option>
         <option value="Katholik">Katholik</option>
         <option value="Hindhu">Hindhu</option>
         <option value="Budha">Budha</option>
		</select>
			<br /> <br />
		<label>Alamat</label>
			<textarea name="alamat" cols="33" rows="5"></textarea><br />
			
		<label>No. Telepon</label>
			<input name="notelp" type="text" size="20" maxlength="12"  /> <br />
			
		<label>Jabatan</label>
			 <select name="jabatan">
			  <option value="">--Pilih Jabatan--</option>
			<?php
			$sql=mysql_query("select * from jabatan order by id_jabatan",$koneksi) or die ("Data tidak ditemukan");
				while($data=mysql_fetch_array($sql)) {
			?>
			 <option value="<?php echo $data['id_jabatan']?>"><?php echo $data['nama_jabatan'] ?></option>
			 <?php
			 }
			 ?>
			 </select>
			<br><br />
		<label>Foto</label>
			<input name="file" type="file" id="file" /><br /><br />
			
		<label></label><input name="simpan" type="submit" value="Simpan" class="button" />
	</form>
	
<?php
############action kalo d submit###############
if($_POST['simpan']) {
/* print_r($_POST); */

	$nip=filter($_POST['nip']);
	$nama=filter($_POST['nama']);
	$tempat_lahir=filter($_POST['tempat_lahir']);
	$tgl_lahir=filter($_POST['tanggal_lahir']);
	$jenis_kelamin=filter($_POST['jenis_kelamin']);
	$agama=filter($_POST['agama']);
	$alamat=filter($_POST['alamat']);
	$notelp=filter($_POST['notelp']);
	$jabatan=filter($_POST['jabatan']);
	$fileName = $_FILES['userfile']['name'];   
		
		if(($nama=="") || ($tempat_lahir=="") || ($jabatan=="")) { //dan seterusnya, apa aja yang mau dicek, sesuai validasi yang dibutuhkan ntar
			echo"<div class=\"error\"><strong>Error, input tidak lengkap !</strong></div>";
		} else {
			//copy file gambar ke server
			$fileName = $_FILES['file']['name'];   
			$uploaddir = 'img/'; //direktori upload	

			$uploadfile = $uploaddir . $fileName;
			// nama file temporary yang akan disimpan di server
			$tmpName  = $_FILES['file']['tmp_name']; 
			// ukuran file yang diupload
			$fileSize = $_FILES['file']['size'];
			// jenis file yang diupload
			$fileType = $_FILES['file']['type'];
			
			move_uploaded_file($_FILES["file"]["tmp_name"], "img/" . $_FILES["file"]["name"]);			
			//move_uploaded_file($_FILES['file']['tmp_name'], "img/".$fileName );  //copy gambar ke server
			
				$sql=mysql_query("insert into pegawai set nip='$nip',foto='$fileName', 
				nama='$nama', tempat_lahir='$tempat_lahir', tgl_lahir='$tgl_lahir',
				jenis_kelamin='$jenis_kelamin', agama='$agama', alamat='$alamat', notelp='$notelp', id_jabatan='$jabatan'",$koneksi) or die ("Gagal menambah data !");
				if($sql) {
					echo"<div class=\"yes\"><strong>Pegawai berhasil ditambahkan !</strong></div>";
					echo "<meta http-equiv='refresh' content='2; url=?mod=listpeg'>";
				
				} else {
				echo"<div class=\"error\"><strong>Gagal tambah data pegawai! </strong></div>";
						}
		}
}
?>