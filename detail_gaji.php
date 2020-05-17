<?php
$nip = $_REQUEST['nip'];
$model = new Gaji();
$gaji = $model->detailGaji([$nip]);
$total_gaji = $gaji['gapok'] + $gaji['tunjab'] + $gaji['lain2'];
?>
<h3> Detail Gaji Pegawai </h3>
<br>
<div class="border border-dark"> &nbsp;
  <div class="media">
    <?php
      if(!empty($gaji['foto'])){ //jika ada file foto di db
    ?> 
      <img src="image/<?= $gaji['foto'] ?>" class="mr-3 ml-3">
    <?php 
      }else{
    ?>
      <img src="image/nophoto.png" class="mr-3 ml-3">
    <?php } ?>
    <br><br>
    <div class="media-body">
      <table class="table table-striped"> 
          <thead>
              <tr colspan="2" class="table-info">
                  <th> <?= $gaji['nama'] ?> </th>
                  <th></th>
              </tr>
          </thead>
          <tbody>
              <tr>
              <th> NIP </th>
              <td> <?= $gaji['nip'] ?> </td>
              </tr>
              <tr>
              <th> Jabatan </th>
              <td> <?= $gaji['jabatan'] ?> </td>
              </tr>
              <tr>
              <th> Divisi </th>
              <td> <?= $gaji['divisi'] ?> </td>
              </tr>
              <tr> 
              <th> Gaji Pokok </th>
              <td> Rp. <?= number_format($gaji['gapok'], 0, ',', '.') ?> </td>
              </tr>
              <tr> 
              <th> Tunjangan Jabatan </th>
              <td> Rp. <?= number_format($gaji['tunjab'], 0, ',', '.') ?> </td>
              </tr>
              <tr> 
              <th> BPJS </th>
              <td> Rp. <?= number_format($gaji['lain2'], 0, ',', '.') ?> </td>
              </tr>
              <tr> 
              <th> Total Gaji </th>
              <td> Rp. <?= number_format($total_gaji, 0, ',', '.') ?> </td>
              </tr>
          </tbody>
      </table>
    </div>
  </div>
</div>
<br>
<a href="index.php?hal=gaji" class="btn btn-primary"> Go Back </a>  