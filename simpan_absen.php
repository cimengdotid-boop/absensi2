<?php

session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

// Mengambil data dari form
$nama = trim($_POST['nama']);
$kelas = trim($_POST['kelas']);
$tanggal = $_POST['tanggal'];
$status = $_POST['status'];
$keterangan = trim($_POST['keterangan']);

// Jika keterangan kosong
if ($keterangan == "") {
    $keterangan = "-";
}

// Format data
$data = $tanggal . "|" .
        $nama . "|" .
        $kelas . "|" .
        $status . "|" .
        $keterangan . PHP_EOL;

// Lokasi folder data
$folder = __DIR__ . "/data";

// Membuat folder jika belum ada
if (!is_dir($folder)) {
    mkdir($folder, 0777, true);
}

// Lokasi file absensi
$file = $folder . "/absensi.txt";

// Menyimpan data
$hasil = file_put_contents($file, $data, FILE_APPEND | LOCK_EX);

// Memeriksa hasil penyimpanan
if ($hasil !== false) {
    header("Location: data_absensi.php?success=1");
    exit;
} else {
    die("Gagal menyimpan data absensi!");
}

?>