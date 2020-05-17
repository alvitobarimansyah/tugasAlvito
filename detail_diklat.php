<?php
$id = $_GET['id'];
$model = new Diklat();
$diklat = $model->detailDiklat([$id]);
?>
<h3> Profile Pegawai </h3>
<br>
<div class="border border-dark"> &nbsp;
  <div class="media">
        <?php
        if(!empty($diklat['foto'])) { 
        ?> 
        <img src="image/<?= $diklat['foto'] ?>" class="mr-3 ml-3">
        <?php }else{
        ?>
        <img src="image/nophoto.png" class="mr-3 ml-3">
        <?php } ?>
        <br><br>
        <div class="media-body">
            <table class="table table-striped"> 
                <thead>
                    <tr colspan="2" class="table-info">
                        <th> <?= $diklat['nama'] ?> </th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <th> NIP </th>
                    <td> <?= $diklat['nip'] ?> </td>
                    </tr>
                    <tr>
                    <th> Jabatan </th>
                    <td> <?= $diklat['jabatan'] ?> </td>
                    </tr>
                    <tr>
                    <th> Divisi </th>
                    <td> <?= $diklat['divisi'] ?> </td>
                    </tr>
                    <tr> 
                    <th> Materi Pelatihan Yang Diikuti </th>
                    <td> <?= $diklat['materi'] ?> </td>
                    </tr>
                    <tr> 
                    <th> Tempat </th>
                    <td> <?= $diklat['tempat'] ?> </td>
                    </tr>
                    
                    <tr>
                    <th> Keterangan </th>
                    <td> <?= $diklat['keterangan'] ?> </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<br>
<a href="index.php?hal=diklat" class="btn btn-primary"> Go Back </a>  