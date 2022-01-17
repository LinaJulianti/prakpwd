<?php

	include 'db.php';

	 if (isset($_GET['idk'])) {
	 	$delete = mysqli_query($con, "DELETE  FROM kategori WHERE id_kategori ='".$_GET['idk']."'");
	 	echo '<script>window.location="data-kategori.php"</script>';
	 }
	 if (isset($_GET['idp'])){
	 	$produk  = mysqli_query($con, "SELECT  gambar_produk FROM produk WHERE id_produk = '".$_GET['idp']."'");
	 	$p = mysqli_fetch_object($produk);

	 	unlink('./produk/'.$p->gambar_produk);

	 	$delete = mysqli_query($con, "DELETE  FROM produk WHERE id_produk ='".$_GET['idp']."'");
	 	echo '<script>window.location="data-produk.php"</script>';
	 }

?>