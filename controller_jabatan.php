<?php
include_once 'connect.php';
include_once 'models/Jabatan.php';
$nama = $_POST['nama'];
$data = [$nama];
$tombol = $_POST['proses'];
$model = new Jabatan();
switch ($tombol) {
    case 'simpan': $model->tambah($data); break;

    case 'ubah': 
        $data[] = $_POST['idx']; 
        $model->ubah($data); break;

    case 'hapus':
        unset($data); 
        $id = [$_POST['idx']]; 
        $model->hapus($id); break; 
          
    default: header('location:index.php?hal=jabatan');
}

header('location: index.php?hal=jabatan');