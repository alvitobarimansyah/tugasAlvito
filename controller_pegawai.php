<?php
include_once 'connect.php';
include_once 'models/Pegawai.php';
$nip = $_POST['nip'];
$nama = $_POST['nama'];
$gender = $_POST['gender'];
$jabatan = $_POST['jabatan'];
$divisi = $_POST['divisi'];
$alamat = $_POST['alamat'];
$foto = $_POST['foto'];
$data = [$nip, $nama, $gender, $jabatan, $divisi, $alamat, $foto];
$tombol = $_POST['proses'];
$model = new Pegawai();
switch ($tombol) {
    case 'simpan': $model->tambah($data); break;

    case 'ubah': 
        $data[] = $_POST['idx']; 
        $model->ubah($data); break;

    case 'hapus':
        unset($data); 
        $id = [$_POST['idx']]; 
        $model->hapus($id); break; 
          
    default: header('location:index.php?hal=pegawai');
}

header('location: index.php?hal=pegawai');