<?php
if(isset($_SESSION['MEMBER'])) {
?>
    <?php
    $id = $_REQUEST['idedit'];
    $model = new Pegawai();
    if(!empty($id)) {
        $rs = $model->detailPegawai([$id]);
    } else {
        $rs = [];
    }
    $ar_gender = ['Laki-Laki'=>'L','Perempuan'=>'P'];
    $obj1 = new Jabatan();
    $obj2 = new Divisi();
    $ar_jabatan = $obj1->dataJabatan();
    $ar_divisi = $obj2->dataDivisi();
    ?>
    <h3>Form Pegawai</h3>
    <form action="controller_pegawai.php" method="post" >
        <div class="form-group row">
            <label for="nip" class="col-4 col-form-label"> NIP </label> 
            <div class="col-8">
                <input id="nip" name="nip" value="<?= $rs['nip']?> " type="text" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <label for="nama" class="col-4 col-form-label"> Nama </label> 
            <div class="col-8">
                <input id="nama" name="nama" value="<?= $rs['nama'] ?>" type="text" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-4"> Jenis Kelamin </label> 
            <div class="col-8">
                <?php
                foreach($ar_gender as $label => $jk) {
                    $cek = ($jk == $rs['gender']) ? 'checked' : '';
                ?>
                <div class="form-check form-check-inline">
                    <input name="gender" type="radio" <?= $cek ?> class="form-check-input" value="<?= $jk ?>"> 
                    <label class="form-check-label"> <?= $label ?> </label>
                </div>
                <?php } ?>  
            </div>
        </div>
        <div class="form-group row">
            <label for="jabatan" class="col-4 col-form-label"> Jabatan </label> 
            <div class="col-8">
                <select id="jabatan" name="jabatan" class="custom-select">
                    <option value=""> -- Pilih Jabatan -- </option>
                    <?php
                    foreach($ar_jabatan as $jabatan) {
                        $sel = ($jabatan['id'] == $rs['idjabatan']) ? 'selected' : '';
                    ?>
                        <option value="<?= $jabatan['id'] ?>" <?= $sel ?> > <?= $jabatan['nama'] ?> </option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="divisi" class="col-4 col-form-label">Divisi</label> 
            <div class="col-8">
                <select id="divisi" name="divisi" class="custom-select">
                    <option value=""> -- Pilih Divisi -- </option>
                    <?php
                    foreach($ar_divisi as $divisi) {
                        $sel = ($divisi['id'] == $rs['iddivisi']) ? 'selected' : '';
                    ?>
                        <option value="<?= $divisi['id'] ?>" <?= $sel ?> > <?= $divisi['nama'] ?> </option>
                    <?php } ?>  
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="alamat" class="col-4 col-form-label"> Alamat </label> 
            <div class="col-8">
                <textarea id="alamat" name="alamat" cols="40" rows="5" class="form-control"> <?= $rs['alamat'] ?> </textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="foto" class="col-4 col-form-label"> Foto </label> 
            <div class="col-8">
                <input id="foto" name="foto" value="<?= $rs['foto'] ?>" type="text" class="form-control">
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