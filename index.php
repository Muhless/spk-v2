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
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/feather/feather.css">
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/vendors/typicons/typicons.css">
    <link rel="stylesheet" href="assets/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="assets/images/logo1.png" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo">
                                <img src="assets/images/logo1.png" alt="logo">
                            </div>
                            <h4>Selamat Datang,</h4>
                            <h6 class="fw-light">Silahkan login terlebih dahulu.</h6>
                            <!-- form -->
                            <form class="mt-3 pt-3" action="index.php?aksi=login" method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <input type="text" name="username" class="form-control" placeholder="username">
                                </div>
                                <div class="mb-3">
                                    <input type="password" name="password" class="form-control" placeholder="Password" aria-label="Password">
                                </div>
                                <!-- BUTTON -->
                                <div class="mt-4 d-grid gap-2">
                                    <button value="LOGIN" class="btn btn-block btn-success btn-lg fw-medium auth-form-btn">Login</button>
                                </div>
                                <div class="text-center mt-4 fw-light"><a href="#" class="text-primary">Hubungi admin</a>
                                </div>
                                <!-- END BUTTON -->
                            </form>
                            <!-- end form -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/template.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/todolist.js"></script>
</body>

</html>