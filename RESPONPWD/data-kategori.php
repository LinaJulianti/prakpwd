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
	<title>PERLENGKAPAN OLAHRAGA</title>
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
			<h3>Data Kategori</h3>
			<div class="di">
				<p><a href="TambahKategori.php">Tambah Data</a></p>
				<table border="1" cellspacing="0" class="table">
					<thead>
						<tr>
							<th width="50px">Nomor</th>
							<th>Kategori</th>
							<th width="150px">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$no =1;
							$kategori = mysqli_query($con, "SELECT * FROM kategori ORDER BY id_kategori DESC");
							if (mysqli_num_rows($kategori) > 0) {
							while($row =mysqli_fetch_array($kategori)){
						?>
						<tr>
							<td><?php echo $no++ ?></td>
							<td><?php echo $row['nama_kategori'] ?></td>
							<td><a href="editkategori.php ?id=<?php echo $row['id_kategori'] ?>" >Edit</a> || 
								<a href="delete.php ?idk=<?php echo $row['id_kategori'] ?>" >Delete</a></td>
						</tr>
						<?php
							}}else{ ?>

								<tr>
									<td colspan="3">data tidak ada</td>
								</tr>

						<?php }
						?>
						
					</tbody>
				</table>
				
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
