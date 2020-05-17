<?php
include_once 'connect.php';
include_once 'models/Member.php';
$fname = $_POST['fname'];
$uname = $_POST['uname'];
$pass = $_POST['pass'];
$role = $_POST['role'];
$email = $_POST['email'];
$foto = $_POST['foto'];
$data = [$fname, $uname, $pass, $role, $email, $foto];
$tombol = $_POST['proses'];
$model = new Member();
switch ($tombol) {
    case 'simpan': $model->tambah($data); break;

    case 'ubah': 
        $data[] = $_POST['idx'];
        $model->ubah($data); break;

    case 'hapus': 
        unset($data);
        $id = [$_POST['idx']];
        $model->hapus($id); break;
        
    default: header('location: index.php?hal=member');
}

header('location: index.php?hal=member');