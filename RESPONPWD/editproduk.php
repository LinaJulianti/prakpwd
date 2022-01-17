<?php
	session_start();
	include 'db.php';
	if ($_SESSION['Status_Login'] != true){
		echo '<script>window.location="login.php"</script>';
	}
	$produk = mysqli_query($con, "SELECT * FROM produk WHERE id_produk = '".$_GET["id"]."'");
	if (mysqli_num_rows($produk) == 0) {
		echo '<script>window.location="data-produk.php"</script>';
	}
	$u = mysqli_fetch_object($produk);
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
			<h3>Edit Data Produk</h3>
			<div class="di">
				<form action="" method="POST" enctype="multipart/form-data">
				<select class="input-control" name="kategori" required>
					<option value="">--PILIH--</option>
					<?php
						$kategori = mysqli_query($con, "SELECT * FROM kategori ORDER BY id_kategori DESC");
						while ($p = mysqli_fetch_array($kategori)) {
					?>
					<option value="<?php  echo $p['id_kategori'] ?> "<?php echo ($p['id_kategori']== $u->id_kategori)? 'selected' : ''; ?>> <?php echo $p['nama_kategori']?></option>
						<?php
					} 
					?>
					
				</select>
				<input type="text" name="nama" class="input-control" placeholder=" Nama Produk" value="<?php echo $u->nama_produk ?>"required>
				<input type="text" name="harga" class="input-control" placeholder=" Harga Produk" value="<?php echo $u->harga_produk ?>" required>

				<img src="produk/<?php echo $u->gambar_produk ?>" width="100px">
				<input type="hidden" name="foto" value="<?php echo $u->gambar_produk ?>">

				<input type="file" name="gambar" class="input-control" >
				<textarea class="input-control" name="deskripsi" placeholder="Deskripsi Produk"><?php echo $u->deskripsi_produk ?></textarea>
				<select class="input-control" name="status">
					<option value="">--Pilih--</option>
					<option value="1"<?php echo ($u->status_produm == 1)? 'selected' : ''; ?>>Aktif</option>
					<option value="0" <?php echo ($u->status_produm == 0)? 'selected' : ''; ?>>Tidak Aktif</option>
				</select>
				<input type="submit" name="submit" value="Submit" class="btn">
				</form>
				<?php
					if (isset($_POST['submit'])) {
						$kategori	= $_POST['kategori'];
						$nama		= $_POST['nama'];
						$harga		= $_POST['harga'];
						$deskripsi	= $_POST['deskripsi'];
						$status 	= $_POST['status'];
						$foto	 	= $_POST['foto'];

						$filename	= $_FILES['gambar']['name'];
						$tmp_name	= $_FILES['gambar']['tmp_name'];

						$type1 = explode('.', $filename);
						$type2 = $type1[1];

						$newname = 'produk'.time().$type2;
						$tipe_diizinkan = array('jpg', 'jpeg', 'png');

						if ($filename != '') {

							if (!in_array($type2, $tipe_diizinkan)) {
							 echo '<script>alert("tidak diizinkan")</script>';

						}else{
							unlink('./produk/'.$foto);
							move_uploaded_file($tmp_name, './produk/'.$newname );
							$namagambar = $newname;
						}
							

						}else{
							$namagambar = $foto;
						}
						$update = mysqli_query($con, "UPDATE  produk SET
							id_kategori ='".$kategori."',
							nama_produk ='".$nama."',
							harga_produk ='".$harga."',
							deskripsi_produk ='".$deskripsi."',
							gambar_produk ='".$namagambar."',
							status_produm ='".$status."'
							WHERE id_produk ='".$u->id_produk."' ");


						if($update){
								echo '<script>alert("ubah data berhasil")</script>';
								echo '<script>window.location="data-kategori.php</script>';
							}else{
								echo 'gagal disimpan'.mysqli_error($con);
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
