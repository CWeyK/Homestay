<?php if(empty($_POST['login'])) { ?>
	<!--Bahagian Borang Input Pengguna -->
<p>Sila LOGIN untuk membuat tempahan homestay</p>
<h3>Login Pelanggan</h3>
<form action="login.php" method="POST">
	<input type="email" name="email" placeholder="email@mail.com"><br><br>
	<input type="text" name="pswd" placeholder="Katalaluan"><br><br>
	<input type="submit" name="login" value="LOGIN"><br>
</form>
<p>Jika belum mendaftar klik <a href="daftar.php">di sini.</a></p>
<?php }else{
	// Bahagian Proses Data
	$email=$_POST['email'];
	$pswd=$_POST['pswd'];
	// Sambung Fail ke DBMS
	include 'capaian.php';
	if(!$connect){
		echo "DBMS gagal dicapai.";
	}
	// Query
	$query="select * from pelanggan where '$email'=email AND '$pswd'=katalaluan";
	// Laksanakan Query
	$run=mysqli_query($connect,$query);
    // Panggil Data
    $data=mysqli_fetch_array($run);
    	$id=$data['idpelanggan'];
    	$nama=$data['nama'];
    	if($id == 0){
    		echo "Maaf, ".$nama." anda gagal login";
    		echo "<br>Sila login semula <a href='login.php'>di sini</a>";
    	}else{
    		echo "Tahniah, ".$nama." berjaya login";
    		echo "<br>Sila klik <a href='tempahan.php?id=".$id."&&nama=".$nama."'>di sini</a> untuk tempahan homestay";
    	}
    mysqli_close($connect);
	}
	
?>


