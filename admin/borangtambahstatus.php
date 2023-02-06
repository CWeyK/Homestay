<?php if(empty($_POST['tambahstatus'])) { ?>
	<form action="tambahstatus.php" method="POST" id="borangstatus">	
			<label>Kod Status:</label>
			<input type="text" name="kodstatus" value="0-9"><br><br>
			<label>Status:</label>
			<input type="text" name="status" value="contoh: Unit Rosak"><br><br>	
			<label>Catatan:</label>
			<textarea rows="4" cols="50" name="catatan" form="borangstatus"></textarea>	
			<input type="submit" name="tambahstatus" value="TAMBAH">
	</form>
<?php }else{
	//Terima data dari borang secara POST
	$kodstatus=$_POST['kodstatus'];
	$status=$_POST['status'];
	$catatan=$_POST['catatan'];
	//sambung ke Pangkalan Data
	include 'capaian.php';
	//Query panggil semua data
	$SQL="insert into status (kodstatus,status,catatan) values ('$kodstatus','$status','$catatan')";
	//Laksanakan 
	$tambah=mysqli_query($connect,$SQL);
	if($tambah){
		echo "Status Baharu Berjaya Ditambah";
	} else {
		echo "Status Baharu Gagal Ditambah";
	}
	mysqli_close($connect);
}
 ?>
 </table>



