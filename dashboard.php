<?php

session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>Dashboard Absensi</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

    <!-- HEADER -->

    <div class="header">

        <div>

            <h2>Dashboard Absensi</h2>
            <p>Sistem Absensi Sekolah</p>

        </div>

        <div>

            <span class="admin">
                👤 <?= $_SESSION['username']; ?>
            </span>

            <a href="logout.php" class="logout">
                Logout
            </a>

        </div>

    </div>


    <!-- MENU -->

    <div class="menu">

        <a href="dashboard.php">
            📄 Input Absensi
        </a>

        <a href="data_absensi.php">
            📋 Data Absensi
        </a>

    </div>

    <!-- FITUR DETEKSI WAJAH -->

<div class="card">

    <h3>📸 Deteksi Wajah Siswa</h3>

    <div style="text-align:center;">

        <video
            id="video"
            autoplay
            muted
            playsinline
            width="100%"
            style="max-width:400px; border-radius:12px; background:#222;"
        ></video>

        <p id="statusWajah">
            Kamera belum aktif.
        </p>

        <button
            type="button"
            id="tombolKamera"
        >
            AKTIFKAN KAMERA
        </button>

    </div>

</div>


    <!-- FORM -->

    <div class="card">

        <h3>📝 Form Absensi Siswa</h3>

        <form action="simpan_absen.php" method="POST">

            <label>Nama Siswa</label>

            <input
                type="text"
                name="nama"
                placeholder="Masukkan nama siswa"
                required
            >

            <label>Nomor WhatsApp Wali Murid</label>

<input
    type="tel"
    name="no_wa"
    placeholder="Contoh: 628123456789"
    required
>


            <label>Kelas</label>

            <select name="kelas" required>

                <option value="">
                    -- Pilih Kelas --
                </option>

                <option value="X TKJ 1">
                    X TKJ 1
                </option>

                <option value="X TKJ 2">
                    X TKJ 2
                </option>

                <option value="X RPL 1">
                    X RPL 1
                </option>

                <option value="X RPL 2">
                    X RPL 2
                </option>

                <option value="XI TKJ">
                    XI TKJ
                </option>

                <option value="XI RPL">
                    XI RPL
                </option>

                <option value="XII TKJ">
                    XII TKJ
                </option>

                <option value="XII RPL">
                    XII RPL
                </option>

            </select>


            <label>Tanggal</label>

            <input
                type="date"
                name="tanggal"
                value="<?= date('Y-m-d'); ?>"
                required
            >


            <label>Status Kehadiran</label>

            <select name="status" required>

                <option value="">
                    -- Pilih Status --
                </option>

                <option value="Hadir">
                    Hadir
                </option>

                <option value="Izin">
                    Izin
                </option>

                <option value="Sakit">
                    Sakit
                </option>

                <option value="Alpa">
                    Alpa
                </option>

            </select>


            <label>Keterangan</label>

            <textarea
                name="keterangan"
                placeholder="Masukkan keterangan jika ada"
                rows="4"
            ></textarea>


            <button type="submit">
                SIMPAN ABSENSI
            </button>

        </form>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/@vladmandic/face-api@1.7.14/dist/face-api.js"></script>

<script src="face.js"></script>

</body>

</html>