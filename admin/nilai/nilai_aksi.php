<?php
include 'header.php';
if (isset($_GET['aksi'])) {
    if ($_GET['aksi']=='tambah') { ?>
<div class="container">
    <div class="row">
        <ol class="breadcrumb">
            <h4>NILAI/TAMBAH DATA</h4>
        </ol>
    </div>
    <div class="panel panel-container">
        <div class="bootstrap-table">
            <form action="nilai_proses.php?proses=proses_tambah" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Nama Alternatif</label>
                    <select class="form-control" name="id_alternatif">
                        <option disabled selected>Pilih</option>
                        <?php
                        $b1 = mysqli_query($koneksi, "SELECT * FROM tbl_alternatif order by id_alternatif");
                        while ($b=mysqli_fetch_array($b1)) {?>
                        <option value="<?php echo $b['id_alternatif'] ?>"> <?php echo $b['id_alternatif'] ?>
                            - <?php echo $b['nama_alternatif'] ?>
                        </option>
                        <?php } ?>
                        ?>
                    </select>
                </div>
                <?php
                        $hasil=mysqli_query($koneksi, "SELECT * FROM tbl_kriteria ORDER by id_kriteria");
                        while ($baris=mysqli_fetch_array($hasil)) {
                            $idK = $baris['id_kriteria'];
                            $labelK=$baris['nama_kriteria'];

                            echo "<div class=form-group>
                            <label>".$labelK."</label>";
                            echo "<select name=".$idK." class=form-control>";
                        
                            $hasil1=mysqli_query($koneksi, "SELECT * FROM tbl_subkriteria WHERE id_kriteria='".$idK."' 
                            ORDER BY nilai_subkriteria DESC");

                            while ($baris1=mysqli_fetch_array($hasil1)) {
                                echo "<option selected value=".$baris1['id_subkriteria']."> 
                                ".$baris1['nama_subkriteria']." - (".$baris1['nilai_subkriteria'].")
                                </option>";
                            }
                        echo "</select></div>";
                        }
                        ?>


                <div class="modal-footer">
                    <a href="nilai.php" class="btn btn-primary">KEMBALI</a>
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
            <h4>NILAI/UBAH DATA</h4>
        </ol>
    </div>
    <div class="panel panel-container">
        <div class="bootstrap-table">
            <form action="nilai_proses.php?proses=proses_ubah" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Nama Alternatif</label>
                    <?php
                    $id_alternatif=$_GET['id_alternatif'];
                    $a1 = mysqli_query($koneksi, "SELECT * FROM tbl_alternatif WHERE id_alternatif='$id_alternatif'");
                    $a=mysqli_fetch_array($a1);
                    ?>
                    <select class="form-control" name="id_alternatif">
                        <option selected value="<?php echo $a['id_alternatif'] ?>"><?php echo $a['id_alternatif'] ?> -
                            <?php echo $a['nama_alternatif'] ?>
                        </option>
                        <?php
                        $b1 = mysqli_query($koneksi, "SELECT * FROM tbl_alternatif order by id_alternatif");
                        while ($b=mysqli_fetch_array($b1)) {?>
                        <option value="<?php echo $b['id_alternatif'] ?>"><?php echo $b['id_alternatif'] ?>
                            - <?php echo $b['nama_alternatif'] ?>
                        </option>
                        <?php } ?>
                    </select>
                </div>
                <?php
                        $hasil=mysqli_query($koneksi, "SELECT * FROM tbl_kriteria order by id_kriteria");
                        while ($baris=mysqli_fetch_array($hasil)) {
                            $idK = $baris['id_kriteria'];
                            $labelK=$baris['nama_kriteria'];
                            $id_alternatif=$_GET['id_alternatif'];
                            $hasil2 = mysqli_query($koneksi, "SELECT * FROM tbl_nilai WHERE id_kriteria='".$idK."' AND id_alternatif='".$id_alternatif."'");
                            $result2=mysqli_fetch_array($hasil2);
                            $sub=$result2['id_subkriteria'];

                            echo "<div class=form-group>
                            <label>".$labelK."</label>";
                            echo "<select name=".$idK." class=form-control>";
                        
                            $hasil1=mysqli_query($koneksi, "SELECT * FROM tbl_subkriteria WHERE id_kriteria='".$idK."' 
                            ORDER BY nilai_subkriteria DESC");

                            while ($baris1=mysqli_fetch_array($hasil1)) {
                                if ($baris1['id_subkriteria']==$sub) {
                                    echo "<option selected value=".$baris1['id_subkriteria']."> 
                                    ".$baris1['nama_subkriteria']." - (".$baris1['nilai_subkriteria'].")
                                    </option>";
                                } else {
                                    echo "<option selected value=".$baris1['id_subkriteria']."> 
                                    ".$baris1['nama_subkriteria']." - (".$baris1['nilai_subkriteria'].")
                                    </option>";
                                    }
                            }
                        echo "</select></div>";
                        }
                        ?>

                <div class="modal-footer">
                    <a href="nilai.php" class="btn btn-primary">KEMBALI</a>
                    <input type="submit" class="btn btn-success" value="UBAH">
                </div>
            </form>
            <?php } ?>
        </div>
    </div>
</div>

<?php } ?>