<?php
if(isset($_SESSION['MEMBER']) && $_SESSION['MEMBER']['role'] != 'staff') {
?>
<?php
$id = $_GET['idedit'];
if(!empty($id)) {
    $model = new Materi();
    $rs = $model->getMateri([$id]);
} else {
    $rs = [];
}
?>
<h3>Form Materi Pelatihan</h3>
<form action="controller_materi.php" method="post">
    <div class="form-group row">
        <label class="col-4 col-form-label" for="Nama"> Nama Pelatihan </label>
        <div class="col-8">
            <input id="nama" name="nama" value="<?= $rs['nama'] ?>" type="text" class="form-control">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-4 col-form-label" for="tglmulai"> Tanggal Mulai </label>
        <div class="col-8">
            <input id="tglmulai" name="tglmulai" value="<?= $rs['tgl_mulai'] ?>" type="date" class="form-control">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-4 col-form-label" for="tglselesai"> Tanggal Selesai </label>
        <div class="col-8">
            <input id="tglselesai" name="tglselesai" value="<?= $rs['tgl_akhir'] ?>" type="date" class="form-control">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-4 col-form-label" for="tempat"> Tempat </label>
        <div class="col-8">
            <input id="tempat" name="tempat" value="<?= $rs['tempat'] ?>" type="text" class="form-control">
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