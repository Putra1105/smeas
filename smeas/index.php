<?php /*include('./core/cek-login.php'); */?>
<?php
session_start();

/*if(isset($_SESSION['username'])){ //session sudah didaftarkan
    header("Location: ./core/home.php"); //redirect ke halaman index
}*/

?>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="./assets/css/style.bundle.css">
</head>
<body class="loginbg">
    <div class="login">
        <h2>L O G I N</h2>
        <form action="login-proses.php" method="post">
            <div class="user">
                <input type="text" name="user" required>
                <label>Username</label>
            </div>
            <div class="user">
                <input type="password" name="pass" required>
                <label>Password</label>
            </div>
            <input type="submit" value="login">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </input>
        </form>
    </div>
</body>
