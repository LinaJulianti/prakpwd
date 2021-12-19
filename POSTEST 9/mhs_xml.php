<?php // mengaktifkan session php

// menghubungkan dengan file konoeksi.php atau ke database
include "koneksi.php"; 
//Header File XML
header('Content-Type: text/xml');
//menampilkan semua data dari tabel mahasiswa
$query = "SELECT * FROM mahasiswa";
$hasil = mysqli_query($con,$query);
//Mengembalikan jumlah bidang dalam kumpulan hasil
$jumField = mysqli_num_fields($hasil);

echo "<?xml version='1.0'?>"; // XML version 1.0
//tag pembuka
echo "<data>"; 
//menampilkan data yang diambil
while ($data = mysqli_fetch_array($hasil))
{
    echo "<mahasiswa>";
    echo"<nim>",$data['nim'],"</nim>";
    echo"<nama>",$data['nama'],"</nama>";
    echo"<jkel>",$data['jkel'],"</jkel>";
    echo"<alamat>",$data['alamat'],"</alamat>";
    echo"<tgllhr>",$data['tgllhr'],"</tgllhr>";
    echo "</mahasiswa>";
}
//tag penutup
echo "</data>"; 
//mengakhiri session php 
?> 


