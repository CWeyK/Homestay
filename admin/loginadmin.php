<!--Bahagian Pertama : Borang -->
<?php if(empty($_POST['loginadmin'])) { ?>
<h2>Login Admin</h2>
<p>Hanya admin dibenarkan akses dihalaman ini</p>
<form action="index.php" method="POST">
	<input type="text" name="id" placeholder="ID Admin">
	<input type="password" name="pswd" placeholder="Katalaluan">
	<input type="submit" name="loginadmin" value="LOGIN">
</form>
<p>Jika anda bukan admin klik <a href="../index.php">di sini.</a></p>
<!--Bahagian Kedua: Pemprosesan Data -->
<?php }else{
	// semakkan data yang dihantar tidak kosong
	if((!empty($_POST['id'])) and (!empty($_POST['id'])) ) {
	//pindahkan data secara POST ke sini
	$id=$_POST['id'];
	$pswd=$_POST['pswd'];
	//Sambung ke pangkalan data
	include 'capaian.php';
	//Query
	$SQL="select * from admin where idadmin='$id' AND katalaluan='$pswd' ";
	//Semak
	$semak=mysqli_query($connect,$SQL);
	$hasil=mysqli_fetch_array($semak);
	$idadmin=$hasil['idadmin'];
	$namaadmin=$hasil['nama'];
	if(!empty($idadmin)){
		echo "Salam kunjungan $namaadmin";
		echo "<br>Klik <a href='admin.php'>di sini</a> sekarang.";
	}else{
		echo "Maaf! anda bukan admin";
		echo "<br>Klik <a href='../index.php'>di sini</a> sekarang.";
	}
  } else {
  		echo "Sila Masukkan ID dan Katalaluan sebagai Admin yang tepat";
  }
  mysqli_close($connect);
} ?>