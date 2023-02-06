<?php if(empty($_POST['tempahan'])) { 
	  $id=$_GET['id'];
	  $nama=$_GET['nama']; 
?>
	<!--Bahagian Borang Input Pengguna -->
<h3>Borang Tempahan Homestay</h3>
<form action="tempahan.php" method="POST">
	<p>ID Anda: <?php echo $id ?> (<?php echo $nama ?>)</p>
	<input type="hidden" name="id" value="<?php echo $id ?>">
	<label>Pilih Tarikh Masuk</label> - - - 
	<label>Pilih Tarikh Keluar</label><br>
	<input type="date" name="tmsk" > - 
	<input type="date" name="tklr" ><br><br>
	<label>Unit Homestay:</label>
			<select name="unit">
			<option value="A101">A101</option>
			<option value="A102">A102</option>
			<option value="B001">B001</option>
			<option value="B002">B002</option>
			<option value="B003">B003</option>
			</select><br><br>
	<input type="submit" name="tempahan" value="MASUK">
</form>
<p>IKLAN HERE</p>
<?php }else{
	// Bahagian Proses Data
	$masuk=$_POST['tmsk'];
	$keluar=$_POST['tklr'];
	$unit=$_POST['unit'];
	// Borang Kedua
	if(!empty($unit && $keluar && $masuk)){
?>
	<form>
			<label>Deposit</label><br>
			RM<input type="text" name="deposit"><br><br>
			<input type="submit" name="submit">
	</form>
<?php }else{
			echo "Maaf, unit telah ditempah";
			echo "<br>Pilih semula.";
		}
		  //Sambungan Ke DBMS
	  $connect=mysqli_connect('localhost','root','','dbase_homestay');
		if(!$connect){
		echo "DBMS gagal dicapai.";
		}
	  // Query
	  $SQL="select * from tempahan";
	  $panggil=mysqli_query($connect,$SQL);
	  while($data=mysqli_fetch_array($panggil)){
	  	$unit=$data['kodunit'];
	  	$tarikhmasuk=$data['tarikhmasuk'];
	  	$tarikhkeluar=$data['tarikhkeluar'];
	  }
} ?>


