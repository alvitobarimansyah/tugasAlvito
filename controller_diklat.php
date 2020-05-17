<?php
include_once 'connect.php';
include_once 'models/Diklat.php';
$nama = $_POST['nama'];
$materi = $_POST['materi'];
$keterangan = $_POST['keterangan'];
$data = [$nama, $materi, $keterangan];
$tombol = $_POST['proses'];
$model = new Diklat();
switch ($tombol) {
    case 'simpan': $model->tambah($data); break;

    case 'ubah': 
        $data[] = $_POST['idx']; 
        $model->ubah($data); break;

    case 'hapus':
        unset($data); 
        $id = [$_POST['idx']]; 
        $model->hapus($id); break; 
          
    default: header('location:index.php?hal=diklat');
}

header('location: index.php?hal=diklat');