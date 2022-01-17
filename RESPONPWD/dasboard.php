<?php
	session_start();
	if ($_SESSION['Status_Login'] != true){
		echo '<script>window.location="login.php"</script>';
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PERLENGKAPAN OLAHRAGA</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet"> 
</head>
<body>
	<header>
		<div class="container">
		<h1><a href="dasboard.php">Toko Online Perlengkapan Olahraga</a></h1>
			<ul>
				<li><a href="dasboard.php">Dasboard</a></li>
				<li><a href="profil.php">Profil</a></li>
				<li><a href="data-kategori.php">Data Kategori</a></li>
				<li><a href="data-produk.php">Data Produk</a></li>
				<li><a href="logout.php">Logout</a></li>
			</ul>
		</div>
	</header>
	<div class="section">
		<div class="container">
			<h3>Dasboard</h3>
			<div class="di">
				<h4>Selamat Datang <?php echo $_SESSION['a_global']->admin_name ?> Di Toko Online Perlengkapan Olahraga </h4>
				
			</div>
		</div>
	</div>
	<footer>
		<div class="container">
			<small>2022-online shop</small>
		</div>
	</footer>
</body>
</html>
