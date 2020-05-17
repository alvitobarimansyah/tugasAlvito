<?php
if(isset($_SESSION['MEMBER']) && $_SESSION['MEMBER']['role'] != 'staff') {
?>
<?php
$ar_judul = ['No','Materi Pelatihan', 'Tanggal Mulai', 'Tanggal Selesai', 'Tempat,', 'Action'];
?>
<a href="index.php?hal=form_materi" type="button" class="btn btn-primary"> Add Data </a>
<br><br>   
<h3> Data Materi Pelatihan </h3>
<br>
<table class="table table-striped">
    <thead>
        <tr>
            <?php
            foreach ($ar_judul as $judul) {
            ?>
            <th> <?= $judul ?> </th>
            <?php } ?>  
        </tr>
    </thead>
    <tbody>
        <?php
        $model = new Materi();
        $rs = $model->dataMateri();
        $no = 1;
        foreach ($rs as $materi) {
        ?>
            <tr>
                <th> <?= $no ?> </th>
                <td> <?= $materi['nama'] ?> </td>
                <td> <?= $materi['tgl_mulai'] ?> </td>
                <td> <?= $materi['tgl_akhir'] ?> </td>
                <td> <?= $materi['tempat'] ?> </td>
                <td> <a href="index.php?hal=form_materi&idedit=<?= $materi['id'] ?>" type="button" class="btn btn-warning"> Edit </a> </td>
            </tr>
        <?php $no++; } ?>    
    </tbody>
</table>
<?php } else {
    include_once 'terlarang.php';
}
?>