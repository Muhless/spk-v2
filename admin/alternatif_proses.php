<?php 
include 'header.php';
if (isset($_GET['proses'])) {
    if ($_GET['proses']=='proses_tambah') {
    
        $nama_alternatif=$_POST['nama_alternatif'];
        // parameter sqli harus 2 = koneksi, query !!!  
        $query = "INSERT INTO tbl_alternatif (nama_alternatif, nilai_saw, ranking) VALUES ('$nama_alternatif', '0', '0')";
        mysqli_query($koneksi, $query);
        header("location:alternatif.php");
    } elseif ($_GET['proses']=='proses_ubah') {
        $id_alternatif=$_POST['id_alternatif'];
        $nama_alternatif=$_POST['nama_alternatif'];
        $query="UPDATE tbl_alternatif set nama_alternatif='$nama_alternatif' WHERE id_alternatif='$id_alternatif'";
        mysqli_query($koneksi, $query);
        header("location:alternatif.php");
    } else if ($_GET['proses']=='proses_hapus'){
        $id_alternatif=$_GET['id_alternatif'];
        $query="DELETE FROM tbl_alternatif WHERE id_alternatif='$id_alternatif'";
        mysqli_query($koneksi, $query);
        header("location:alternatif.php");
    }
}
?>