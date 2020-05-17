<?php
session_start();
include_once 'connect.php';
include_once 'models/Login.php';
$username = $_POST['username'];
$password = $_POST['password'];
$data = [$username, $password];
$model = new Login();
$rs = $model->otentikasi($data);
if(!empty($rs)) {
    $_SESSION['MEMBER'] = $rs;
    header('location: index.php?hal=pegawai');
} else {
    echo'<script>
        alert("Maaf username/password anda salah");
        history.go(-1);
    </script>';
}