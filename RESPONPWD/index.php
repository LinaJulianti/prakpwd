<?php
error_reporting(0);
	include 'db.php';
	$kontak = mysqli_query($con, "SELECT admin_telp, admin_email, admin_address FROM admin WHERE  admin_id = 0 ");
	$a = mysqli_fetch_object($kontak);
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
		<h1><a href="index.php">Toko Online Perlengkapan Olahraga</a></h1>
			<ul>
				<li><a href="produk.php">Produk</a></li>
				
			</ul>
		</div>
	</header>
	<!--- searc---->
	<div class="search">
		<div class="container">
			<form accept="produk.php">
				<input type="text" name="search" placeholder="Cari Produk "value="<?php echo $_GET['search']?>">
				<input type="submit" name="cari" value="Cari Produk">
			</form>
		</div>
	</div>

	<div class="section">
		<div class="container">
			<h3>KATEGORI</h3>
			<div class="di">
				<?php

				$kategori = mysqli_query($con, "SELECT * FROM kategori ORDER BY  id_kategori DESC");

				if (mysqli_num_rows($kategori)> 0) {
					while ($k = mysqli_fetch_array($kategori)) {
						// code...
			
				?> 

				<a href="produk.php?kategori=<?php echo $k['id_kategori']?>">
				<div class="col-5">
					<img src="img/menu-bar.png" width="40px " style="margin-bottom: 5px;">
					<p><?php echo $k['nama_kategori'] ?></p>
				</div>
				</a>

			<?php }} else{ ?>
					<p>Kategori Tidak Ada</p>
			<?php } ?>
			</div>
		</div>
	</div>

	 <div class="section">
	 	<div class="container">
	 		<h3>PRODUK TERBARU</h3>
	 		<div class="di">
	 			<?php

	 			if ($_GET['search'] != '' || $_GET['kategori'] !='') {
	 				$where = "AND nama_produk LIKE '%".$_GET['search']."%' AND id_kategori LIKE '%".$_GET['kategori']."%'";	
	 		}

	 			$produk = mysqli_query($con, "SELECT * FROM produk WHERE status_produm = 1 $where ORDER BY id_produk DESC");

	 			if(mysqli_num_rows($produk) > 0 ){
	 				while ($u = mysqli_fetch_array($produk)) { 
	 		?>
	 		<a href="detailproduk.php?id=<?php echo $u['id_produk']?>">
	 		<div class="col-4">
	 			<img src="produk/<?php echo $u['gambar_produk']?>">
	 			<img src="">
	 			<p class="nama"></p><?php echo $u ['nama_produk'] ?></p>
	 			<p class="harga">Rp. <?php echo number_format($u ['harga_produk']) ?></p>
	 			</div>
	 			</a>
	 			<?php }}else{ ?>
	 				<p>Produk Tidak Ada</p>
	 			<?php } ?>
	 		</div>
	 	</div>
	 </div>

	 <div class="footer">
	 	<div class="container">
	 		<h4>Alamat</h4>
	 		<p><?php echo $a->admin_address ?></p>

	 		<h4>Email</h4>
	 		<p><?php echo $a->admin_email ?></p>

	 		<h4>No.Telp</h4>
	 		<p><?php echo $a->admin_telp ?></p>

	 		<div>2022-online shope</div>
	 	</div>
	 </div>
</body>
</html>
