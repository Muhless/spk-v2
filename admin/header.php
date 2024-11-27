<?php
session_start();
error_reporting(0);
include  '../conn/koneksi.php';
include  '../conn/cek.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PG. Pritani</title>
    <link rel="icon" type="image" href="../assets/logo.png">
    <link rel="stylesheet" href="../assets/style.css">
    <script src="https://kit.fontawesome.com/9be1b4beee.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="sidebar">
        <div class="atas">
            <a href="index.php">
                <img src="../assets/logo.png" alt="logo" class="logo">
            </a>
            <h1>Penggilingan Padi Pritani</h1>
        </div>
        <div>
            <ul>
                <li><a href="index.php"><i class="fa-solid fa-house"></i> Home</a></li>
                <li><a href="kriteria.php"><i class="fa-solid fa-list"></i> Kriteria</a></li>
                <li><a href="subkriteria.php"><i class="fa-solid fa-list"></i> Sub Kriteria</a></li>
                <li><a href="alternatif.php">Alternatif</a></li>
                <li><a href="nilai.php">Nilai</a></li>
                <li><a href="metode.php">Metode SAW</a></li>
                <li><a href="hasil.php">Hasil Analisa</a></li>
                <li><a href="logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</a></li>
            </ul>
        </div>
    </div>
    <!-- end sidebar -->

    <!-- content -->
    <div class="content">
        <h1>Selamat datang di penggilingan Padi Pritani</h1>
        <p>cihuy</p>
    </div>
    <!-- end content -->
</body>

</html>