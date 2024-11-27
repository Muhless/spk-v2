<?php
include 'header.php';
if (isset($_GET['proses'])) {
    if ($_GET['proses'] == 'proses_tambah') {
        $nama_kriteria = $_POST['nama_kriteria'];
        $bobot_kriteria = $_POST['bobot_kriteria'];
        $tipe_kriteria = $_POST['tipe_kriteria'];
        // parameter sqli harus 2 = koneksi, query !!!  
        $query = "INSERT INTO tbl_kriteria (nama_kriteria, bobot_kriteria, tipe_kriteria) 
        VALUES ('$nama_kriteria', '$bobot_kriteria', '$tipe_kriteria')";
        mysqli_query($koneksi, $query);
        header("Location:admin/kriteria.php");
    } elseif ($_GET['proses'] == 'proses_ubah') {
        $id_kriteria = $_POST['id_kriteria'];
        $nama_kriteria = $_POST['nama_kriteria'];
        $bobot_kriteria = $_POST['bobot_kriteria'];
        $tipe_kriteria = $_POST['tipe_kriteria'];

        $query = "UPDATE tbl_kriteria set 
        nama_kriteria='$nama_kriteria', bobot_kriteria='$bobot_kriteria', tipe_kriteria='$tipe_kriteria' 
        WHERE id_kriteria='$id_kriteria'";
        mysqli_query($koneksi, $query);
        header("location:kriteria.php");
    } else if ($_GET['proses'] == 'proses_hapus') {
        $id_kriteria = $_GET['id_kriteria'];
        $query = "DELETE FROM tbl_kriteria WHERE id_kriteria=$id_kriteria";
        $query1 = "DELETE FROM tbl_subkriteria WHERE id_subkriteria=$id_kriteria";
        mysqli_query($koneksi, $query, $query1);
        header("location:kriteria.php");
    }
}
