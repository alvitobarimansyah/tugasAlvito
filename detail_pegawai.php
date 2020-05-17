<?php
$id = $_GET['id'];
$model = new Pegawai();
$pegawai = $model->detailPegawai([$id]);
?>
<h3> Profile Pegawai </h3>
<br>
<div class="border border-dark"> &nbsp;
  <div class="media">
    <?php
    if(!empty($pegawai['foto'])) { 
    ?> 
      <img src="image/<?= $pegawai['foto'] ?>" class="mr-3 ml-3">
    <?php } else {
    ?>
      <img src="image/nophoto.png" class="mr-3 ml-3">
    <?php } ?>
    <br><br>
    <div class="media-body">
      <table class="table table-striped"> 
          <thead>
              <tr colspan="2" class="table-info">
                  <th> <?= $pegawai['nama'] ?> </th>
                  <th></th>
              </tr>
          </thead>
          <tbody>
              <tr>
              <th> NIP </th>
              <td> <?= $pegawai['nip'] ?> </td>
              </tr>
              <tr>
              <th> Gender </th>
              <td> <?= $pegawai['gender'] ?> </td>
              </tr>
              <tr>
              <th> Jabatan </th>
              <td> <?= $pegawai['jabatan'] ?> </td>
              </tr>
              <tr>
              <th> Divisi </th>
              <td> <?= $pegawai['divisi'] ?> </td>
              </tr>
              <tr> 
              <th> Alamat </th>
              <td> <?= $pegawai['alamat'] ?> </td>
              </tr>
          </tbody>
      </table>
    </div>
  </div>
</div>
<br>
<a href="index.php?hal=pegawai" class="btn btn-primary"> Go Back </a>  