<?php
include 'header.php';
?>

<div class="container">
    <div class="row">
        <ol class="breadcrumb">
            <h4>HASIL ANALISA METODE SAW</h4>
        </ol>
    </div>
    <div class="panel panel-container">
        <div class="bootstrap-table">
            <h4>Hasil Analisa</h4>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nama Alternatif</th>
                            <th class="text-center">Nilai SAW</th>
                            <th class="text-center">Ranking</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $tabel="SELECT * FROM tbl_alternatif order by ranking";
                        $query=mysqli_query($koneksi, $tabel) or die(mysqli_error($koneksi));
                        $no=1;
                        while ($a=mysqli_fetch_array($query)) {
                        ?>
                        <tr>
                            <td class="text-center"><?php echo $no++ ?></td>
                            <td class="text-center"><?php echo $a['nama_alternatif']; ?></td>
                            <td class="text-center"><?php echo number_format($a['nilai_saw'],2); ?></td>
                            <td class="text-center"><?php echo $a['ranking']; ?></td>
                        </tr>
                        <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>