<?php
$id = $_REQUEST['id'];
$model = new Member();
$member = $model->getMember([$id]);
?>
<h3> Detail Gaji Pegawai </h3>
<br>
<div class="border border-dark"> &nbsp;
  <div class="media">
    <?php
      if(!empty($member['foto'])){ //jika ada file foto di db
    ?> 
      <img src="image/<?= $member['foto'] ?>" class="mr-3 ml-3">
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
                  <th> <?= $member['fullname'] ?> </th>
                  <th></th>
              </tr>
          </thead>
          <tbody>
              <tr>
              <th> Username </th>
              <td> <?= $member['username'] ?> </td>
              </tr>
              <tr>
              <th> Role </th>
              <td> <?= $member['role'] ?> </td>
              </tr>
              <tr>
              <th> Email </th>
              <td> <?= $member['email'] ?> </td>
              </tr>
          </tbody>
      </table>
    </div>
  </div>
</div>
<br>
<a href="index.php?hal=member" class="btn btn-primary"> Go Back </a>  