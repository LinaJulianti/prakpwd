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
			<h3>Tambah Data Produk</h3>
			<div class="di">
				<form action="" method="POST" enctype="multipart/form-data">
				<select class="input-control" name="kategori" required>
					<option value="">--PILIH--</option>
					<?php
						$kategori = mysqli_query($con, "SELECT * FROM kategori ORDER BY id_kategori DESC");
						while ($p = mysqli_fetch_array($kategori)) {
					?>
					<option value="<?php  echo $p['id_kategori'] ?> "><?php echo $p['nama_kategori']?></option>
						<?php
					} 
					?>
					
				</select>
				<input type="text" name="nama" class="input-control" placeholder=" Nama Produk" required>
				<input type="text" name="harga" class="input-control" placeholder=" Harga Produk" required>
				<input type="file" name="gambar" class="input-control" required>
				<textarea class="input-control" name="deskripsi" placeholder="Deskripsi Produk"></textarea>
				<select class="input-control" name="status">
					<option value="">--Pilih--</option>
					<option value="1">Aktif</option>
					<option value="0">Tidak Aktif</option>
				</select>
				<input type="submit" name="submit" value="Submit" class="btn">
				</form>
				<?php
					if (isset($_POST['submit'])) {

						//print_r($_FILES['gambar']);
						$kategori	= $_POST['kategori'];
						$nama		= $_POST['nama'];
						$harga		= $_POST['harga'];
						$deskripsi	= $_POST['deskripsi'];
						$status 	= $_POST['status'];

						$filename	= $_FILES['gambar']['name'];
						$tmp_name	= $_FILES['gambar']['tmp_name'];

						$type1 = explode('.', $filename);
						$type2 = $type1[1];

						$newname = 'produk'.time().$type2;

						$tipe_diizinkan = array('jpg', 'jpeg', 'png');

						if (!in_array($type2, $tipe_diizinkan)) {
							 echo '<script>alert("tidak diizinkan")</script>';

						}else{
							
							move_uploaded_file($tmp_name, './produk/'.$newname );

							$insert = mysqli_query($con, "INSERT INTO produk VALUES(
										null, 
										'".$kategori."',
										'".$nama."', 
										'".$harga."', 
										'".$deskripsi."', 
										'".$newname."', 
										'".$status."', 
										null
									)");

							if($insert){
								echo 'data berhasil disimpan';
							}else{
								echo 'gagal disimpan'.mysqli_error($con);
							}
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
