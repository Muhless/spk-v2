<?php
include 'header.php';
if (isset($_GET['aksi'])) {
    if ($_GET['aksi'] == 'tambah') { ?>
        <div class="container">
            <div class="row">
                <ol class="breadcrumb">
                    <h4>ALTERNATIF/TAMBAH DATA</h4>
                </ol>
            </div>
            <div class="panel panel-container">
                <div class="bootstrap-table">
                    <form action="alternatif_proses.php?proses=proses_tambah" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="">Nama Alternatif</label>
                            <input type="text" name="nama_alternatif" class="form-control" placeholder="nama alternatif">
                        </div>
                        <div class="modal-footer">
                            <a href="alternatif.php" class="btn btn-primary">KEMBALI</a>
                            <input type="submit" class="btn btn-success" value="SIMPAN">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php
    } elseif ($_GET['aksi'] == 'ubah') { ?>
        <div class="container">
            <div class="row">
                <ol class="breadcrumb">
                    <h4>ALTERNATIF/UBAH DATA</h4>
                </ol>
            </div>
            <div class="panel panel-container">
                <div class="bootsrap-table">
                    <?php
                    $tabel = "SELECT * FROM tbl_alternatif WHERE id_alternatif=$_GET[id_alternatif]";
                    $query = mysqli_query($koneksi, $tabel) or die(mysqli_error($koneksi));
                    while ($a = mysqli_fetch_array($query)) {
                    ?>
                        <form action="alternatif_proses.php?proses=proses_ubah" method="post" enctype="multipart/form-data">

                            <input type="hidden" name="id_alternatif" value="<?php echo $a['id_alternatif']; ?>">

                            <div class="form-group">
                                <label for="">Nama Alternatif</label>
                                <input type="text" name="nama_alternatif" class="form-control" placeholder="nama alternatif"
                                    value="<?php echo $a['nama_alternatif']; ?>">
                            </div>
                            <div class="modal-footer">
                                <a href="alternatif.php" class="btn btn-primary">KEMBALI</a>
                                <input type="submit" class="btn btn-success" value="UBAH">
                            </div>
                        </form>
                    <?php } ?>
                </div>
            </div>
        </div>

<?php }
} ?>