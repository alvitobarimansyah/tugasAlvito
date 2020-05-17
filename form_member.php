<?php
if(isset($_SESSION['MEMBER']) && $_SESSION['MEMBER']['role'] == 'administrator') {
?>
    <?php
    $id = $_REQUEST['idedit'];
    $model = new Member();
    if(!empty($id)) {
        $rs = $model->getMember([$id]);
    } else {
        $rs = [];
    }
    $ar_role = ['administrator', 'manager', 'staff'];
    ?>
    <h3>Form User</h3>
    <form action="controller_member.php" method="post" >
        <div class="form-group row">
            <label for="fname" class="col-4 col-form-label"> Full Name </label> 
            <div class="col-8">
                <input id="fname" name="fname" value="<?= $rs['fullname'] ?>" type="text" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <label for="uname" class="col-4 col-form-label"> Username </label> 
            <div class="col-8">
                <input id="uname" name="uname" value="<?= $rs['username'] ?>" type="text" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <label for="pass" class="col-4 col-form-label"> Password </label> 
            <div class="col-8">
                <input id="pass" name="pass" value="<?= $rs['password'] ?>" type="password" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-4"> Role </label> 
            <div class="col-8">
                <?php
                foreach($ar_role as $role) {
                    $cek = ($role == $rs['role']) ? 'checked' : '';
                ?>
                <div class="form-check form-check-inline">
                    <input name="role" type="radio" <?= $cek ?> class="form-check-input" value="<?= $role ?>"> 
                    <label class="form-check-label"> <?= $role ?> </label>
                </div>
                <?php } ?>  
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-4 col-form-label"> Email </label> 
            <div class="col-8">
                <input id="email" name="email" value="<?= $rs['email'] ?>" type="email" class="form-control">
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