<?php
    session_start();

    if(isset($_SESSION['username'])){ //session sudah didaftarkan
        header("Location: ../index.php"); //redirect ke halaman index
    }

 ?>


<!DOCTYPE html>
<html>
<head>
    <title>Form Login</title>
</head>
<body>

<div class="form">
    <span class="welcome">Harap Login Terlebih Dahulu !</span>
    <form action="login-proses.php" method="post">
        <input type="text" name="username" placeholder="Username"><br>
        <input type="password" name="password" placeholder="Password">
        <input class="submit" type="submit" value="Login">
    </form>
</div>
</body>
</html>
