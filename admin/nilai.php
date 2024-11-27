<?php
include 'header.php';
?>

<div class="container">
    <div class="row">
        <ol class="breadcrumb">
            <h4>Nilai</h4>
        </ol>
    </div>
    <div class="panel panel-container">
        <div class="bootstrap-table">
            <a href="nilai_aksi.php?aksi=tambah" class="btn btn-primary">TAMBAH DATA</a>
            <hr>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Alternatif</th>
                            <?php
                        $tabel="SELECT * FROM tbl_kriteria";
                        $query=mysqli_query($koneksi, $tabel) or die(mysqli_error($koneksi));
                        while ($b=mysqli_fetch_array($query)) {
                            echo "<th class='text-center'>$b[nama_kriteria]</th>";
                        }
                        ?>
                            <th class="text-center">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $data=mysqli_query($koneksi, "SELECT * FROM tbl_alternatif order by id_alternatif");
                        $no=1;
                        while ($a=mysqli_fetch_array($data)) {
                        ?>
                        <tr>
                            <?php
                            $nomor=$no++;
                            $kode=$a['id_alternatif'];
                            $nama=$a['nama_alternatif'];

                            echo "
                            <td class='text-center'>$nomor</td>
                            <td class='text-center'>$nama</td>
                            ";

                            $query1=mysqli_query($koneksi, "SELECT a.nilai_subkriteria as sub FROM tbl_subkriteria a, tbl_nilai b 
                            WHERE b.id_alternatif='".$kode."' AND a.id_subkriteria=b.id_subkriteria ORDER BY b.id_kriteria");

                            while ($result=mysqli_fetch_array($query1)) {
                            echo "<td class='text-center'>$result[sub]</td>";
                            }
                            ?>
                            <td class="text-center">
                                <a href="nilai_aksi.php?id_alternatif=<?php echo $a['id_alternatif'];?>&aksi=ubah"
                                    class="btn btn-success">UBAH</a>
                                <a href="nilai_proses.php?id_alternatif=<?php echo $a['id_alternatif'];?>&proses=proses_hapus"
                                    class="btn btn-danger">HAPUS</a>
                            </td>
                        </tr>
                        <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div> 