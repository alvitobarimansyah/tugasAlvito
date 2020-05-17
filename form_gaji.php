<?php
if(isset($_SESSION['MEMBER']) && $_SESSION['MEMBER']['role'] != 'staff') {
?>
    <?php
    $obj = new Pegawai();
    $ar_pegawai = $obj->dataPegawai();
    $id = $_GET['idedit'];
    $model = new Gaji();
    if(!empty($id)) {
        $rs = $model->getGaji([$id]);
    } else {
        $rs = [];
    }
    ?>
    <h3> Form Gaji Pegawai </h3>
    <form action="controller_gaji.php" method="post" >
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
            <label for="gapok" class="col-4 col-form-label"> Gaji Pokok </label> 
            <div class="col-8">
                <input id="gapok" name="gapok" value="<?= $rs['gapok'] ?>" type="text" class="form-control">
            </div>
        </div> 
        <div class="form-group row">
            <label for="tunjab" class="col-4 col-form-label"> Tunjangan Jabatan </label> 
            <div class="col-8">
                <input id="tunjab" name="tunjab" value="<?= $rs['tunjab'] ?>" type="text" class="form-control">
            </div>
        </div> 
        <div class="form-group row">
            <label for="lain2" class="col-4 col-form-label"> Komisi </label> 
            <div class="col-8">
                <input id="lain2" name="lain2" value="<?= $rs['lain2'] ?> " type="text" class="form-control">
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
                <button name="proses" value="hapus" type="submit" onclick="return confirm('Yakin mau dihapus')" class="btn btn-danger"> Delete </button>
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