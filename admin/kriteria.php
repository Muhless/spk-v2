<?php
include 'header.php';
?>

<div class="kriteria">
    <h4>Kriteria</h4>
    <div class="">
        <a href="kriteria_aksi.php?aksi=tambah" class="btn btn-primary">TAMBAH DATA</a>
        <hr>
        <div>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kriteria</th>
                        <th>Bobot</th>
                        <th>Tipe</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $tabel = "SELECT * FROM tbl_kriteria order by id_kriteria";
                    $query = mysqli_query($koneksi, $tabel) or die(mysqli_error($koneksi));
                    $no = 1;
                    while ($a = mysqli_fetch_array($query)) {
                    ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $a['nama_kriteria']; ?></td>
                            <td><?php echo $a['bobot_kriteria']; ?></td>
                            <td><?php echo $a['tipe_kriteria']; ?></td>
                            <td>
                                <a href="subkriteria.php?id_kriteria=<?php echo $a['id_kriteria']; ?>"
                                    >LIHAT</a>
                            </td>
                            <td>
                                <a href="kriteria_aksi.php?id_kriteria=<?php echo $a['id_kriteria']; ?>&aksi=ubah"
                                    >UBAH</a>
                                <a href="kriteria_proses.php?id_kriteria=<?php echo $a['id_kriteria']; ?>&proses=proses_hapus"
                                    >HAPUS</a>
                            </td>
                        </tr>
                    <?php } ?>

                </tbody>
            </table>
        </div>
    </div>
</div>