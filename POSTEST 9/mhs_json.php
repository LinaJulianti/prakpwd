<?php // mengaktifkan session php

// menghubungkan dengan file konoeksi.php atau ke database
include "koneksi.php";
//menampilkan data dari tabel mahasiswa berdasarkan nim
$sql="select * from mahasiswa order by nim";
$tampil = mysqli_query($con,$sql);
//apbabila terdapat dapat akan ditampilkan 
if (mysqli_num_rows($tampil) > 0) { 
$no=1;
$response = array();
 $response["data"] = array();
while ($r = mysqli_fetch_array($tampil)) {
    //data yang akan ditampilkan 
    $h['nim'] = $r['nim'];
    $h['nama'] = $r['nama'];
    $h['jkel'] = $r['jkel'];
    $h['alamat'] = $r['alamat'];
    $h['tgllhr'] = $r['tgllhr'];
    array_push($response["data"], $h);  //menambahkan aaray push otomatis sebanyak data yang ada
 }
 //mengubah format data menjadi json
 echo json_encode($response);
}
else {
    $response["message"]="tidak ada data";
    echo json_encode($response);
}
//mengakhiri session php 
?>
