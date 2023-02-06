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
					<?php include 'borangtambahstatus.php'; ?>
					<!-- Paparkan jadual bersama -->
					<?php include 'paparstatus.php'; ?>
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
