<?php
include_once 'connect.php';
include_once 'models/Materi.php';
$nama = $_POST['nama'];
$tglmulai = $_POST['tglmulai'];
$tglselesai = $_POST['tglselesai'];
$tempat = $_POST['tempat'];
$data = [$nama, $tglmulai, $tglselesai, $tempat];
$tombol = $_POST['proses'];
$model = new Materi();
switch ($tombol) {
    case 'simpan': $model->tambah($data); break;

    case 'ubah': 
        $data[] = $_POST['idx'];
        $model->ubah($data); break;

    case 'hapus': 
        unset($data);
        $id = [$_POST['idx']];
        $model->hapus($id); break;
        
    default: header('location: index.php?hal=materi');
}

header('location: index.php?hal=materi');