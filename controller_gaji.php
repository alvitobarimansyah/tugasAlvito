<?php
include_once 'connect.php';
include_once 'models/Gaji.php';
$nama = $_POST['nama'];
$gapok = $_POST['gapok'];
$tunjab = $_POST['tunjab'];
$lain2 = $_POST['lain2'];
$data = [$nama, $gapok, $tunjab, $lain2];
$tombol = $_POST['proses'];
$model = new Gaji();
switch ($tombol) {
    case 'simpan': $model->tambah($data); break;

    case 'ubah': 
        $data[] = $_POST['idx']; 
        $model->ubah($data); break;

    case 'hapus':
        unset($data); 
        $id = [$_POST['idx']]; 
        $model->hapus($id); break; 
          
    default: header('location:index.php?hal=gaji');
}

header('location: index.php?hal=gaji');