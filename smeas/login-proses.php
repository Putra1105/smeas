<?php

session_start();

include('koneksi.php');

$username = $_POST['user'];
$password = $_POST['pass'];

$sql = "SELECT * FROM sys_users WHERE username='$username' AND password='$password'";
$result = mysqli_query($koneksi, $sql);
$rowcount = mysqli_num_rows($result);

if($rowcount>0){
    /*$_SESSION['username'] = $username;*/
    header("Location: home.php");
} else {
    echo '<h1>Username atau Kata Sandi Salah!</h1>';
    echo '<a href="login.php">Kembali</a>';
}

?>
