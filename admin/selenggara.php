<!DOCTYPE html>
<html lang="en">
<head>
	<title>Homestay : Admin</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<header>
		<?php include 'header.php'; ?>
	</header>
		<nav>
			<?php include 'navadmin.php'; ?>
		</nav>
			<section>
			    <article>
			    	<h2>Panel Penyelenggaraan Data</h2>
					<table border="3" >
						<tr><th width="200">Data Status</th><th width="200">Data Unit</th></tr>
						<tr align="center">
							<td><button onclick="window.location.href = 'selenggarastatus.php';">Selenggara</button></td>
							<td><button onclick="window.location.href = 'selenggaraunit.php';">Selenggara</button></td></tr>
					</table>
				</article>
				<aside> 
					<?php include 'sidenavadmin.php'; ?>
				</aside>
			</section>
	<footer>
		<?php include 'footer.php'; ?>
	</footer>
</body>
</html>
