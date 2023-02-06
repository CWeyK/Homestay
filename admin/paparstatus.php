<h3>Jadual Status</h3>
<table border="1">
	<tr><th>Bil</th><th>Kod Status</th><th>Jenis Status</th><th>Catatan</th><th>Selenggara</th></tr>

<?php 
	//sambung ke Pangkalan Data
	include '../capaian.php';
	//Query panggil semua data
	$SQL="select * from status";
	//Laksanakan 
	$panggil=mysqli_query($connect,$SQL);
	$i=0;
	while($data=mysqli_fetch_array($panggil)){

		$kodstatus=$data['kodstatus'];
		$status=$data['status'];
		$catatan=$data['catatan'];
		$i++;
		echo "<tr><td>$i</td><td>$kodstatus</td><td>$status</td><td>$catatan</td>
			  <td><a href='deletestatus.php?id=".$kodstatus."'>Padam</a></td></tr>";
	}
	mysqli_close($connect);
 ?>
 </table>
 <p><a href="tambahstatus.php">Tambah Lagi</a></p>
 



