<?php
if(isset($_SESSION['MEMBER'])) {
?>
    <?php
    $id = $_GET['idedit'];
    if(!empty($id)) {
        $model = new Divisi();
        $rs = $model->getDivisi([$id]);
    } else {
        $rs = [];
    }
    ?>
    <h3>Form Divisi Pegawai</h3>
    <form action="controller_divisi.php" method="post">
        <div class="form-group row">
            <label class="col-4 col-form-label" for="Nama"> Nama Divisi </label>
            <div class="col-8">
                <input id="nama" name="nama" value="<?= $rs['nama'] ?> " type="text" required="required" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <div class="offset-4 col-8">
                <?php
                if(empty($id)) {
                ?>
                    <button name="proses" value="simpan" type="submit" class="btn btn-primary"> Add </button>
                <?php
                } else {
                ?>
                    <button name="proses" value="ubah" type="submit" class="btn btn-warning"> Update </button>
                    <button name="proses" value="hapus" type="submit" onclick="return confirm('Yakin mau di hapus')" class="btn btn-danger"> Delete </button>
                    <input type="hidden" name="idx" value="<?= $id ?>">
                <?php } ?>
                <button name="proses" value="batal" type="submit" class="btn btn-info"> Cancel </button>
            </div>
        </div>
    </form>
<?php } else {
	include_once 'terlarang.php';
} 
?>