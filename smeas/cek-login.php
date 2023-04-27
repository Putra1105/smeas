<?php
    session_start();

    if(!isset($_SESSION['username'])){ //session belum didaftarkan
        header("Location: index.php"); //redirect ke halaman login
    }
 ?>
