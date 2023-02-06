<?php if(empty($_POST['daftar'])) { ?>
	<!--Bahagian Borang Input Pengguna -->
<h3>Pendaftaran Pelanggan Baharu</h3>
<form action="daftar.php" method="POST">
	<label>Nama Pelanggan:</label>
	<input type="text" name="nama" placeholder="Nama Penuh"><br>
	<label>Email:</label>
	<input type="email" name="email" placeholder="email@mail.com"><br>
	<label>No. Telefon:</label>
	<input type="text" name="notel" placeholder="011-22334455"><br>
	<input type="submit" name="daftar" value="DAFTAR"><br>
</form>
<br> <a href="login.php">Login</a>
<?php }else{
	//Syarat melaksanakan pemprosesan - data tidak kosong
	if((!empty($_POST['nama'])) and (!empty($_POST['email'])) and (!empty($_POST['notel'])))
	{	// Bahagian Proses Data
	$nama=$_POST['nama'];
	$email=$_POST['email'];
	$notel=$_POST['notel'];
	// Sambung Fail ke DBMS
	include 'capaian.php';
	if(!$connect){
		echo "DBMS gagal dicapai.";
	}
	// Query
	$query="insert into pelanggan(nama,email,notelefon)
	values('$nama','$email','$notel');";
	// Laksanakan Query
	$run=mysqli_query($connect,$query);
	// Dialog
	if($run){
		echo "<script type='text/javascript'>
		window.alert('Tahniah!!, Pendaftaran Berjaya.');
		</script>";
		echo "Username anda: $email";
		echo "<br>Katalaluan: <b>123abc</b>";
	}else{
		echo "<script type='text/javascript'>
	window.alert('Pendaftaran Gagal. Sila daftar semula');
</script>";
		echo "Klik <a href='daftar.php'>di sini</a> untuk mendaftar.";
	}
  }else{
  	echo "Sila isikan maklumat pendaftaran anda.";
  }
  mysqli_close($connect);
} ?>

