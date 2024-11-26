<?php 
include 'header.php';
if (isset($_GET['proses'])) {
    if ($_GET['proses']=='proses_tambah') {
    
        $id_kriteria=$_POST['id_kriteria'];
        $nama_subkriteria=$_POST['nama_subkriteria'];
        $nilai_subkriteria=$_POST['nilai_subkriteria'];
        // parameter sqli harus 2 = koneksi, query !!!  
        $query = "INSERT INTO tbl_subkriteria (id_kriteria, nama_subkriteria, nilai_subkriteria) 
        VALUES ('$id_kriteria', '$nama_subkriteria', '$nilai_subkriteria')";
        mysqli_query($koneksi, $query);
        header("location:subkriteria.php?id_kriteria=$_POST[id_kriteria]");

    } elseif ($_GET['proses']=='proses_ubah') {
        $id_subkriteria=$_POST['id_subkriteria'];
        $id_kriteria=$_POST['id_kriteria'];
        $nama_subkriteria=$_POST['nama_subkriteria'];
        $nilai_subkriteria=$_POST['nilai_subkriteria'];

        $query="UPDATE tbl_subkriteria set id_kriteria='$id_kriteria', 
        nama_subkriteria='$nama_subkriteria', nilai_subkriteria='$nilai_subkriteria' 
        WHERE id_subkriteria='$id_subkriteria'";
        mysqli_query($koneksi, $query);
        header("location:subkriteria.php?id_kriteria=$_POST[id_kriteria]");
    } else if ($_GET['proses']=='proses_hapus'){
        $id_subkriteria=$_GET['id_subkriteria'];
        $id_kriteria=$_GET['id_kriteria'];
        $query="DELETE FROM tbl_subkriteria WHERE id_subkriteria=$id_subkriteria";
        mysqli_query($koneksi, $query);
        header("location:subkriteria.php?id_kriteria=$_GET[id_kriteria]");
    }
}
?>