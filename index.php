<?php
include 'conn/koneksi.php';

if (isset($_GET['aksi'])) {
    if ($_GET['aksi'] == 'login') {
        session_start();
        include 'conn/koneksi.php';
        $username = $_POST['username'];
        $password = $_POST['password'];

        $tabel = "SELECT * FROM tbl_akun WHERE username='$username' and password='$password'";
        $query = mysqli_query($koneksi, $tabel) or die(mysqli_error($koneksi));
        $cek = mysqli_num_rows($query);

        if ($cek > 0) {
            $data = mysqli_fetch_assoc($query);
            if ($data['level'] == 'Admin') {
                $_SESSION['username'] = $username;
                $_SESSION['level'] = $admin;
                header('location:admin/index.php');
            } else {
                header('location:index.php?pesan=gagal');
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PG.Pritani-Login</title>
    <link rel="shortcut icon" href="assets/logo.png" />

    <style>
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            padding: 0;
            font-family: "Manrope", sans-serif;
            background: #f4f5f7;
        }

        .login {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 500px;
            height: 550px;
            /* padding: 60px 100px; */
            background: white;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .img img {
            width: 150px;
            height: 180px;
        }

        .title {
            text-align: center;
        }

        .title h1 {
            font-size: 18px;
            font-weight: 400;
            padding: 0;
            margin: 0;
            margin-bottom: 10px;
            letter-spacing: 1px;
        }

        .title h3 {
            font-size: 15px;
            font-weight: lighter;
            padding: 0;
            margin: 0;
            margin-bottom: 30px;
        }

        .form {
            display: flex;
            flex-direction: column;
        }

        .input {
            display: flex;
            flex-direction: column;
        }

        .input input {
            width: 375px;
            height: 45px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            padding-left: 20px;
            border-radius: 5px;
        }

        .input input::placeholder {
            font-size: 15px;
            color: #ccc;
        }

        .input input:focus {
            border-color: #007BFF;
            outline: none;
        }

        .btn-login {
            display: flex;
            flex-direction: column;
        }

        .btn-login button {
            width: 400px;
            height: 45px;
            background: #34b1aa;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 15px;
            margin-bottom: 30px;
            margin-top: 10px;
        }

        .btn-login button:hover {
            background: #298d88;
            cursor: pointer;
        }

        .btn-login a {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="login">
        <div class="img">
            <img src="assets/logo.png" alt="logo">
        </div>
        <div class="title">
            <h1>Selamat Datang,</h1>
            <h3>Silahkan login terlebih dahulu.</h3>
        </div>
        <!-- form -->
        <div class="form">
            <form action="index.php?aksi=login" method="post" enctype="multipart/form-data">
                <div class="input">
                    <input type="text" name="username" class="form-control" placeholder="username">
                    <input type="password" name="password" class="form-control" placeholder="Password" aria-label="Password">
                </div>
                <div class="btn-login">
                    <button value="LOGIN">Login</button>
                    <a href="">Hubungi admin</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>