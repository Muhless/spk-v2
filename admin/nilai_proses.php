<?php 
include 'header.php';
if (isset($_GET['proses'])) {
    if ($_GET['proses']=='proses_tambah') {
    
        $id_alternatif=$_POST['id_alternatif'];
        $hasil=mysqli_query($koneksi, "SELECT * FROM tbl_kriteria ORDER BY id_kriteria");
        while ($baris=mysqli_fetch_array($hasil)) {
            $idK=$baris['id_kriteria'];
            $idS=$_POST[$idK];

            $query="INSERT INTO tbl_nilai(id_alternatif, id_kriteria, id_subkriteria) 
            VALUES ('".$id_alternatif."', '".$idK."', '".$idS."')";
            $result=mysqli_query($koneksi, $query);
        }
        header("location:nilai.php");

    } elseif ($_GET['proses']=='proses_ubah') {
        $id_alternatif=$_POST['id_alternatif'];

        $query1="DELETE FROM tbl_nilai WHERE id_alternatif='".$_POST['id_alternatif']."'";
        $result1=mysqli_query($koneksi, $query1);

        $hasil=mysqli_query($koneksi, "SELECT * FROM tbl_kriteria ORDER BY id_kriteria");
        while ($baris=mysqli_fetch_array($hasil)) {
            $idK=$baris['id_kriteria'];
            $idS=$_POST[$idK];

            $query="INSERT INTO tbl_nilai(id_alternatif, id_kriteria, id_subkriteria) 
            VALUES ('".$id_alternatif."', '".$idK."', '".$idS."')";
            $result=mysqli_query($koneksi, $query);
        }
        header("location:nilai.php");

    } else if ($_GET['proses']=='proses_hapus'){
        $id_alternatif=$_GET['id_alternatif'];
        $query="DELETE FROM tbl_nilai WHERE id_alternatif='$id_alternatif'";
        mysqli_query($koneksi, $query);
        header("location:nilai.php");
    }
}
?>