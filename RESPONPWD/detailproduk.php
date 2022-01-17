<?php
	error_reporting(0);
	include 'db.php';
	$kontak = mysqli_query($con, "SELECT admin_telp, admin_email, admin_address FROM admin WHERE  admin_id = 0 ");
	$a = mysqli_fetch_object($kontak);

	$produk = mysqli_query($con, "SELECT * FROM produk WHERE id_produk = '".$_GET['id']."' ");
	$u = mysqli_fetch_object($produk);
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
				<input type="text" name="search" placeholder="Cari Produk" value="<?php echo $_GET['search']?>">
				<input type="hidden" name="kategori" value="<?php echo $_GET['kategori'] ?>">
				<input type="submit" name="cari" value="Cari Produk">
			</form>
		</div>
	</div>

	<div class="section">
		<div class="container">
			Detail Produk
			<div class="di">
				<div class="col-2">
					<img src="produk/<?php echo $u->gambar_produk ?>" width="100%">
				</div>
				<div class="col-2">
					 <h3><?php echo  $u->nama_produk ?> </h3>
					 <h4>Rp.<?php echo  number_format($u->harga_produk) ?> </h4>
					 <p>Deskripsi : <br>
					 	<?php echo $u->deskripsi_produk?>
					 </p>
					 <p><a href="https://api.whatsapp.com/send?phone=<?php echo $a->admin_telp ?>&text= saya tertarik dengan produk anda." target="_blank"> jika tertarik dengan produk kami hubungi via Whatsapps
					 	<img src="img/wa.jpg" width="50px"></a></p>
				</div>

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
