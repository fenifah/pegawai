
<?php
$sql=mysql_query("select * from pegawai, jabatan where pegawai.id_jabatan=jabatan.id_jabatan AND id_peg='".$_GET['id']."'",$koneksi) or die ("Data tidak ditemukan");
$data=mysql_fetch_array($sql) ;

?>
<form action="" method="post" name="form1">
		<label>Foto</label>
			<img src="img/<?php echo $data['foto']?>" width="100"  /><br /><br />

		<label>No. Pegawai</label> 
		<input name="nip" type="text" size="50" readonly="true" value="<?php echo $data['nip']?>"/><br />
			<br />
			
		<label>Nama</label>
			<input name="nama" type="text" size="50" readonly="true" value="<?php echo $data['nama']?>"/><br />
			
		<label>Tempat Lahir</label>
			<input name="tempat_lahir" type="text" size="50" readonly="true" value="<?php echo $data['tempat_lahir']?>" /><br />
			
		<label>Tanggal Lahir</label>
			<input name="tgl_lahir" type="text" size="15" readonly="true" value="<?php echo datenotimes($data['tgl_lahir'])?>" /><br />
		
		<label>Jenis Kelamin</label>  
		<?php if ($data['jenis_kelamin']=='L')
		{$status="Pria";}
		else
		{$status="Wanita";}
		?>
			<input name="tgl_lahir" type="text" size="4" readonly="true" value="<?php echo $status;?>" /><br />
		<br />
		<label>Agama</label>
			<input name="tgl_lahir" type="text" size="4" readonly="true" value="<?php echo $data['agama']?>" /><br />
			<br />
		<label>Alamat</label>
			<textarea name="alamat" cols="33" rows="5" readonly="true"><?php echo $data['alamat']?></textarea><br />
			
		<label>No. Telepon</label>
			<input name="notelp" type="text" size="20" maxlength="12" readonly="true" value="<?php echo $data['notelp']?>"  /> <br /><br />
			
		<label>Jabatan</label>
			 <input name="notelp" type="text" size="20" maxlength="12" readonly="true" value="<?php echo $data['nama_jabatan']?>"  /> <br /><br />
			
		