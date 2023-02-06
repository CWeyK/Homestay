<!--Bahagian Borang -->
<?php if(empty($_POST['carian'])) { ?>
<h3>Semak Tempahan Anda</h3>
<form action="cari.php" method="POST">
	<label>Masuk Email Anda:</label><br>
	<input type="email" name="email" placeholder="email@mail.com"><br>
	<label>Masuk Tarikh Tempahan:</label><br>
	<input type="date" name="masuk"> Hingga <input type="date" name="keluar">
	<input type="submit" name="carian" value="CARI">
</form>
<!--Bahagian Pemprosesan Data Carian -->
<?php } else {
	//Data dari Borang Carian
	$cari=$_POST['email'];
	$masuk=$_POST['masuk'];
	$keluar=$_POST['keluar'];
    //Sambungan Ke DBMS
	include 'capaian.php';
    // Query 
	$SQL="SELECT *,DAY(tempahan.tarikhmasuk),DAY(tempahan.tarikhkeluar) from pelanggan inner join tempahan on pelanggan.idpelanggan=tempahan.idpelanggan inner join unit on unit.kodunit=tempahan.kodunit where email='$cari' and tarikhmasuk BETWEEN '$masuk' AND '$keluar' OR tarikhkeluar BETWEEN '$masuk' AND '$keluar' ";
	$x=0;  // $x adalah pembilang
	$panggil=mysqli_query($connect,$SQL);
	while($data=mysqli_fetch_array($panggil)){
		$id=$data['idpelanggan'];
	  	$kodunit=$data['kodunit'];
	  	$namaunit=$data['namaunit'];
	  	$harga=$data['harga'];
	  	$nama=$data['nama'];
	  	$notel=$data['notelefon'];
	  	$tmasuk=$data['tarikhmasuk'];
	  	$tkeluar=$data['tarikhkeluar'];
	  	//tambah jumlah hari
	  	$jumhari=($data['DAY(tempahan.tarikhkeluar)'] - $data['DAY(tempahan.tarikhmasuk)']);
	  	$deposit=$data['deposit'];
	  	//tambah jumlah harga
	  	$jumharga=$harga*$jumhari;
	  	$baki=$jumharga-$deposit;
	  	$x++;
	
	echo "<table border='3'>";
	echo "<tr><td>Tempahan:</td><td>$x</td></tr>
		  <tr><td>Nama:</td><td>$nama - ($notel)</td></tr>
		  <tr><td>Tarikh Masuk & Keluar:</td><td>$tmasuk - $tkeluar</td></tr>
		  <tr><td>Unit Ditempah:</td><td>$kodunit ($namaunit)</td></tr>
		  <tr><td>Bil Hari Ditempah:</td><td>$jumhari</td></tr>
		  <tr><td>Harga Unit Ditempah:</td><td>RM$harga</td></tr>
		  <tr><td>Deposit:</td><td>RM$deposit</td></tr>
		  <tr><td>Baki Belum Bayar:</td><td>RM$baki</td></tr>
		 ";
	echo "</table><br>";
	}
    
	mysqli_close($connect);
  }
?>  
<br>
<button onclick="fungsiCetak()">CETAK</button> 
<button onclick="fungsiBack()">BACK</button>
<script type="text/javascript">
	function fungsiCetak(){
		window.print();
	}
	function fungsiBack(){
		window.open("cari.php");
	}
</script>	


