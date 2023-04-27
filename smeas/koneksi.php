<?php
// Koneksi MySQLi Procedural
$db['host'] = "localhost"; //host
$db['user'] = "root"; //username database
$db['pass'] = ""; //password database
$db['name'] = "smeas"; //nama database

$koneksi = mysqli_connect($db['host'], $db['user'], $db['pass'], $db['name']);
if (mysqli_connect_errno()) {
    trigger_error('Koneksi ke database gagal: '.mysqli_connect_error(), E_USER_ERROR); // Jika koneksi gagal, tampilkan pesan "Koneksi ke database gagal"
}else{
    //echo "berhasil";
}
?>