<?php
session_start();
include_once 'connect.php';
include_once 'models/Pegawai.php';
include_once 'models/Divisi.php';
include_once 'models/Jabatan.php';
include_once 'models/Gaji.php';
include_once 'models/Login.php';
include_once 'models/Member.php';
include_once 'models/Materi.php';
include_once 'models/Diklat.php';
include_once 'header.php';
include_once 'menu.php';
echo '<br>';
include_once 'main.php';
include_once 'sidebar.php';
echo '<br>';
include_once 'footer.php';