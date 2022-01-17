<?php

$host="localhost";  //nama host
$username="root"; //username
$password="";  //Password (isi jika menggunakan password)
$databasename="yourboba"; // database dengan nama akademik

//membuat koneksi
$con=@mysqli_connect($host,$username,$password,$databasename);

//mengecek koneksi
if (!$con) {
    echo "Error: " . mysqli_connect_error();
    exit();
}