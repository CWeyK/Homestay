<?php if(empty($_POST['tambah'])) { ?>
	<form action="tambahunit.php" method="POST">	
			<label>Kod Unit:</label>
			<input type="text" name="kodunit" value="A000"><br><br>
			<label>Nama Unit:</label>
			<input type="text" name="namaunit" value="contoh: Bilik Berkembar"><br><br>	
			<label>Harga:</label> RM
			<input type="text" name="harga"><br><br>	
			<label>Status:</label>
			<select name="kodstatus">
	<!-- Guna Data dari DBMS  -->
			<?php include 'capaian.php';
			$SQL="SELECT * from status";
			$panggil=mysqli_query($connect,$SQL);
			while($data=mysqli_fetch_array($panggil)){
	  			$kodstatus=$data['kodstatus'];
	  			$status=$data['status'];
	  		echo "<option value='$kodstatus'>$kodstatus - $status</option>";
			} ?>
			</select><br><br>
			<input type="submit" name="tambah" value="TAMBAH">
	</form>
<?php }else{
	//Terima data dari borang secara POST
	$kunit=$_POST['kodunit'];
	$nunit=$_POST['namaunit'];
	$hunit=$_POST['harga'];
	$kstatus=$_POST['kodstatus'];
	//sambung ke Pangkalan Data
	include 'capaian.php';
	//Query panggil semua data
	$SQL="insert into unit (kodunit,namaunit,harga,kodstatus) values ('$kunit','$nunit','$hunit','$kstatus')";
	//Laksanakan 
	$tambah=mysqli_query($connect,$SQL);
	if($tambah){
		echo "Unit Baharu Berjaya Ditambah";
	} else {
		echo "Unit Baharu Gagal Ditambah";
	}
	mysqli_close($connect);
}
 ?>
 </table>



