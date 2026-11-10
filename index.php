<?php
session_start();

if (isset($_SESSION['login'])) {
    header("Location: http://dashboard.php");
    exit;
}

header("Location: http://login.php");
exit;
?>