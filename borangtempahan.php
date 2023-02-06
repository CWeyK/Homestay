<?php if(empty($_POST['tempahan'])) { 
	  $id=$_GET['id'];
	  $nama=$_GET['nama']; 
?>
<!--Bahagian Borang Pilih Tarikh -->
<h3>Borang Tempahan Homestay</h3>
<form action="tempahan.php" method="POST">
	<p>ID Anda: <?php echo $id ?> (<?php echo $nama ?>)</p>
	<input type="hidden" name="id" value="<?php echo $id ?>">
	<label>Pilih Tarikh Masuk</label> - - - 
	<label>Pilih Tarikh Keluar</label><br>
	<input type="date" name="tmsk" > - 
	<input type="date" name="tklr" ><br><br>
	<input type="submit" name="tempahan" value="MASUK">
</form>
<p>IKLAN HERE</p>
<?php }else{
	// Bahagian Proses Data Tarikh Sesuai
	$id=$_POST['id'];
	$masuk=$_POST['tmsk'];
	$keluar=$_POST['tklr'];
    //Sambungan Ke DBMS
	include 'capaian.php';
    // Query Semak Unit Kosong
	$SQL="SELECT * from tempahan where tarikhmasuk >= '$masuk' 
		  AND tarikhkeluar <='$keluar' ";
	echo "Unit Sudah Ditempah Pada Tarikh Pilihan:";
	echo "<br>-";
	$panggil=mysqli_query($connect,$SQL);
	while($data=mysqli_fetch_array($panggil)){
	  	$kodunit=$data['kodunit'];
	  	// Papar tarikh format d-m-y
	  	$tmasuk=date('d-m-Y',strtotime($data['tarikhmasuk']));
	  	$tkeluar=date('d-m-Y',strtotime($data['tarikhkeluar']));
	  	echo "<br><b style='color:red;'>$kodunit</b> ($tmasuk - $tkeluar) ";
	} 
?>
 	<!-- Tempahan Unit Kosong -->
 	<form action="prosestempahan.php" method="GET">
 		<input type="hidden" name="id" value="<?php echo $id ?>">
 		<p>Tarikh Pilihan Anda:</p>
 		<label>Tarikh Masuk: </label><?php echo $masuk ?>
 		<input type="hidden" name="tarikhmasuk" 
 		value="<?php echo $masuk ?>"><br>
 		<label>Tarikh Keluar: </label><?php echo $keluar ?>
 		<input type="hidden" name="tarikhkeluar" 
 		value="<?php echo $keluar ?>"><br>
 		<p style="color:red;">Elakkan Unit Yang Sudah Ditempah<br>
 		Rujuk senarai di atas.</p>
 		<label>Unit Homestay:</label>
			<select name="unit">
	<!-- Guna Data dari DBMS  -->
			<?php include 'capaian.php';
			$SQL="SELECT * from unit";
			$panggil=mysqli_query($connect,$SQL);
			while($data=mysqli_fetch_array($panggil)){
	  			$kodunit=$data['kodunit'];
	  			$harga=$data['harga'];
	  			$kodstatus=$data['kodstatus'];
	  			if($kodstatus !=0){
	  			echo "<option value='$kodunit'>$kodunit - Harga (RM $harga)</option>";
	  			}
			} ?>
			</select><br><br>
		<label>Deposit: </label>RM
		<input type="text" name="deposit" placeholder="Minima 50.00"><br><br>
		<input type="submit" name="prosestempah" value="PROSES">
 	</form>
 	<br>
 	<button onclick="window.location.href = 'login.php';">Tukar Tarikh Tempahan</button>
<?php 
	  mysqli_close($connect);
	}
 ?>
