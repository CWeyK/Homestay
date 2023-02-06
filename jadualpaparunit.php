<!--Papar Jadual Unit Homestay -->
<h3>Jadual Harga Dan Status Unit Homestay </h3>
<table border="1"><tr><th>Bil</th><th>Kod Unit</th><th>Nama Unit</th>
		<th>Harga</th><th>Status</th><th>Catatan</th></tr>
<?php
    //Sambungan Ke DBMS
	include 'capaian.php';
    // Query Semak Unit Kosong
	$SQL="SELECT * from unit inner join status on unit.kodstatus=status.kodstatus";
	$x=0;  // $x adalah pembilang
	$panggil=mysqli_query($connect,$SQL);
	while($data=mysqli_fetch_array($panggil)){
	  	$kodunit=$data['kodunit'];
	  	$namaunit=$data['namaunit'];
	  	$harga=$data['harga'];
	  	$status=$data['status'];
	  	$catatan=$data['catatan'];
	  	$x++;
	echo "<tr><td>$x</td>
			  <td>$kodunit</td>
			  <td>$namaunit</td>
			  <td>RM$harga</td>
			  <td>$status</td>	
			  <td>$catatan</td>
		  </tr>";
	} 
	mysqli_close($connect);
?>  
	</table>
 	<br>
 	<button onclick="window.location.href = 'login.php';">Tempah di sini</button>

