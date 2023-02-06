
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Homestay </title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<header>
		<?php include 'header.php'; ?>
	</header>
		<nav>
			<?php include 'nav.php'; ?>
		</nav>
			<section>
			    <article>
					<?php 
						$id=$_GET['id'];
						$kodunit=$_GET['unit'];
						$masuk=$_GET['tarikhmasuk'];
						$keluar=$_GET['tarikhkeluar'];
						$deposit=$_GET['deposit'];
						//Sambungan Ke DBMS
						include 'capaian.php';
						// Query SIMPAN Data
						$SQL="insert into tempahan (idpelanggan,kodunit,tarikhmasuk,tarikhkeluar,deposit)
							values('$id','$kodunit','$masuk','$keluar','$deposit')";		
						$simpan=mysqli_query($connect,$SQL);
						if($simpan){
							echo "Tempahan Anda Berjaya";
						}else{
							echo "Tempahan Gagal,<br>Sila Isi Semula Borang Tempahan";
						}
						mysqli_close($connect);
					 ?>
				</article>
				<aside> 
					<?php include 'sidenav.php'; ?>
				</aside>
			</section>
	<footer>
		<?php include 'footer.php'; ?>
	</footer>
</body>
</html>
