<?php
session_start();

if (isset($_SESSION['login'])) {
    header("Location: dashboard.php");
    exit;
}

$error = "";

if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === "admin" && $password === "12345") {

        $_SESSION['login'] = true;
        $_SESSION['username'] = $username;

        header("Location: dashboard.php");
        exit;

    } else {

        $error = "Username atau password salah!";

    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - Absensi Sekolah</title>

    <link rel="stylesheet" href="style.css">
</head>

<body class="login-page">

    <div class="login-box">

        <img src="mhi.png" class="mhi.png" alt="Logo Sekolah">

        <h2>ABSENSI SEKOLAH</h2>

        <p>Silakan login untuk masuk</p>

        <?php if ($error != "") { ?>

            <div class="error">
                <p><?php echo $error; ?></p>
            </div>

        <?php } ?>

        <form method="POST">

            <label>Username</label>

            <input
                type="text"
                name="username"
                placeholder="Masukkan username"
                required
            >

            <label>Password</label>

            <input
                type="password"
                name="password"
                placeholder="Masukkan password"
                required
            >

            <button type="submit" name="login">
                LOGIN
            </button>

        </form>

        <div class="info-login">
            Username: <b>admin</b><br>
            Password: <b>12345</b>
        </div>

    </div>

</body>
</html>