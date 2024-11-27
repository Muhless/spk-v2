<?php
include 'header.php';
if (isset($_GET['aksi'])) {
    if ($_GET['aksi']=='tambah') { ?>
<div class="container">
    <div class="row">
        <ol class="breadcrumb">
            <h4>KRITERIA/TAMBAH DATA</h4>
        </ol>
    </div>
    <div class="panel panel-container">
        <div class="bootsrap-table">
            <form action="kriteria_proses.php?proses=proses_tambah" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Nama Kriteria</label>
                    <input type="text" name="nama_kriteria" class="form-control" placeholder="nama kriteria">
                </div>
                <div class="form-group">
                    <label for="">Bobot Kriteria</label>
                    <input type="number" name="bobot_kriteria" class="form-control" placeholder="0">
                </div>
                <div class="form-group">
                    <label for="">Tipe Kriteria</label>
                    <select name="tipe_kriteria" class="form-control">
                        <option>Benefit</option>
                        <option>Cost</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <a href="kriteria.php" class="btn btn-primary">KEMBALI</a>
                    <input type="submit" class="btn btn-success" value="SIMPAN">
                </div>
            </form>
        </div>
    </div>
</div>
<?php
}elseif ($_GET['aksi']=='ubah') { ?>
<div class="container">
    <div class="row">
        <ol class="breadcrumb">
            <h4>KRITERIA/UBAH DATA</h4>
        </ol>
    </div>
    <div class="panel panel-container">
        <div class="bootsrap-table">
            <?php
                        $tabel="SELECT * FROM tbl_kriteria WHERE id_kriteria=$_GET[id_kriteria]";
                        $query=mysqli_query($koneksi, $tabel) or die(mysqli_error($koneksi));
                        while ($a=mysqli_fetch_array($query)) {
                        ?>
            <form action="kriteria_proses.php?proses=proses_ubah" method="post" enctype="multipart/form-data">

                <input type="hidden" name="id_kriteria" value="<?php echo $a['id_kriteria']; ?>">

                <div class="form-group">
                    <label for="">Nama Kriteria</label>
                    <input type="text" name="nama_kriteria" class="form-control" placeholder="nama kriteria"
                        value="<?php echo $a['nama_kriteria']; ?>">
                </div>
                <div class="form-group">
                    <label for="">Bobot Kriteria</label>
                    <input type="number" name="bobot_kriteria" class="form-control" placeholder="0"
                        value="<?php echo $a['bobot_kriteria']; ?>">
                </div>
                <div class="form-group">
                    <label for="">Tipe Kriteria</label>
                    <select name="tipe_kriteria" class="form-control">
                        <option selected><?php echo $a['tipe_kriteria'];?></option>
                        <option>Benefit</option>
                        <option>Cost</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <a href="kriteria.php" class="btn btn-primary">KEMBALI</a>
                    <input type="submit" class="btn btn-success" value="UBAH">
                </div>
            </form>
            <?php } ?>
        </div>
    </div>
</div>

<?php } } ?>