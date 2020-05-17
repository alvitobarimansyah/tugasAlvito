<?php
if(isset($_SESSION['MEMBER']) && $_SESSION['MEMBER']['role'] != 'staff') {
?>
    <?php
    $id = $_REQUEST['idedit'];
    $model = new DIklat();
    if(!empty($id)) {
        $rs = $model->detailDiklat([$id]);
    } else {
        $rs = [];
    }
    $obj1 = new Pegawai();
    $obj2 = new Materi();
    $ar_pegawai = $obj1->dataPegawai();
    $ar_materi = $obj2->dataMateri();
    ?>
    <h3>Form Diklat</h3>
    <form action="controller_diklat.php" method="post" >
        <div class="form-group row">
            <label for="nama" class="col-4 col-form-label"> Nama Pegawai </label> 
            <div class="col-8">
                <select id="nama" name="nama" class="custom-select">
                    <option value=""> -- Pilih Nama Pegawai -- </option>
                    <?php
                    foreach($ar_pegawai as $pegawai) {
                        $sel = ($pegawai['id'] == $rs['idpegawai']) ? 'selected' : '';
                    ?>
                        <option value="<?= $pegawai['id'] ?>" <?= $sel ?> > <?= $pegawai['nama'] ?> </option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="materi" class="col-4 col-form-label"> Materi Pelatihan </label> 
            <div class="col-8">
                <select id="materi" name="materi" class="custom-select">
                    <option value=""> -- Pilih Materi Pelatihan -- </option>
                    <?php
                    foreach($ar_materi as $materi) {
                        $sel = ($materi['id'] == $rs['idmateri']) ? 'selected' : '';
                    ?>
                        <option value="<?= $materi['id'] ?>" <?= $sel ?> > <?= $materi['nama'] ?> </option>
                    <?php } ?>  
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-4 col-form-label" for="keterangan"> Keterangan </label>
            <div class="col-8">
                <input id="keterangan" name="keterangan" value="<?= $rs['keterangan'] ?> " type="text" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <div class="offset-4 col-8">
            <?php 
            if(empty($id)) {
            ?>
                <button name="proses" value="simpan" type="submit" class="btn btn-primary"> Add </button>
            <?php } else { ?>
                <button name="proses" value="ubah" type="submit" class="btn btn-warning"> Update </button>
                <button name="proses" value="hapus" onclick="return confirm('Yakin mau dihapus')" type="submit" class="btn btn-danger"> Delete </button>
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