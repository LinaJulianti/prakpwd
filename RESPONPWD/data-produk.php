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
			<h3>Data Produk</h3>
			<div class="di">
				<p><a href="TambahProduk.php">Tambah Data</a></p>
				<table border="1" cellspacing="0" class="table">
					<thead>
						<tr>
							<th width="50px">Nomor</th>
							<th>Kategori</th>
							<th>Nama Produk</th>
							<th>Harga</th>
							<th>Deskripsi</th>
							<th>Gambar</th>
							<th>Status</th>
							<th width="150px">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$no =1;
							$produk = mysqli_query($con, "SELECT * FROM produk LEFT JOIN kategori USING (id_kategori) ORDER BY id_produk DESC");
							if (mysqli_num_rows($produk) > 0) {
								while($row =mysqli_fetch_array($produk)){
						?>
						<tr>
							<td><?php echo $no++ ?></td>
							<td><?php echo $row['nama_kategori'] ?></td>
							<td><?php echo $row['nama_produk'] ?></td>
							<td>Rp.<?php echo number_format($row['harga_produk']) ?></td>
							<td><?php echo $row['deskripsi_produk'] ?></td>
							<td> <a href="produk/<?php echo $row['gambar_produk']?>" target="_blank"><img src="produk/<?php echo $row['gambar_produk']?>" width="50px"></a></td>
							<td><?php echo ($row['status_produm'] == 0 )? 'Tidak Aktif' : 'aktif'; ?></td>

							<td><a href="editproduk.php ?id=<?php echo $row['id_produk'] ?>" >Edit</a> || 
								<a href="delete.php ?idp=<?php echo $row['id_produk'] ?>" >Delete</a></td>
						</tr>
						<?php
							}
						}else{ ?>
								<tr>
									<td colspan="8">data tidak ada</td>
								</tr>
						<?php } ?>
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
