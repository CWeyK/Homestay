<h3>Senarai Unit-unit Homestay</h3>
<table border="1">
	<tr><th>Bil</th><th>Kod Unit</th><th>Nama</th><th>Harga</th><th>Status</th><th>Selenggara</th></tr>

<?php 
	//sambung ke Pangkalan Data
	include 'capaian.php';
	//Query panggil semua data
	$SQL="select * from unit inner join status on unit.kodstatus=status.kodstatus order by unit.kodunit";
	//Laksanakan 
	$panggil=mysqli_query($connect,$SQL);
	$i=0;
	while($data=mysqli_fetch_array($panggil)){

		$kodunit=$data['kodunit'];
		$namaunit=$data['namaunit'];
		$harga=$data['harga'];
		$kodstatus=$data['kodstatus'];
		$status=$data['status'];
		$i++;
		echo "<tr><td>$i</td><td>$kodunit</td><td>$namaunit</td><td>$harga</td><td>$kodstatus - $status</td><td><a href='deleteunit.php?id=".$kodunit."'>Padam</a></td></tr>";
	}
	mysqli_close($connect);
 ?>
 </table>
<p><a href="tambahunit.php">Tambah Lagi</a></p>



