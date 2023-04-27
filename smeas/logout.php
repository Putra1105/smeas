<?php

    session_start();

    unset($_SESSION['username']); //unset session
    header("Location: index.php"); //redirect ke halaman login


 ?>
