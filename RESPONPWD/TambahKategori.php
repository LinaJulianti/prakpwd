<?php
	session_start();
	include 'db.php';
	if ($_SESSION['Status_Login'] != true){
		echo '<script>window.location="login.php"</script>';
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ONLINE SHOPE</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet"> 
</head>
<body>
	<header>
		<div class="container">
		<h1><a href="dasboard.php">Perlengkapan Olahraga</a></h1>
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
			<h3>Tambah Data Kategori</h3>
			<div class="di">
				<form action="" method="POST">
				<input type="text" name="nama" placeholder="Nama Kategori" class="input-control" required>
				<input type="submit" name="submit" value="Submit" class="btn">
				</form>
				<?php
					if (isset($_POST['submit'])) {

						$nama =ucwords($_POST['nama']);

						$insert =mysqli_query($con, "INSERT INTO kategori VALUES ('".$id_kategori."','".$nama."')");
						if($insert){
							echo '<script>alert("tambah data berhasil")</script>';
							echo '<script>window.location="data-kategori.php</script>';
						}else{
							echo 'gagal' .mysqli_error($con);
						}
					}
				?>
				
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
