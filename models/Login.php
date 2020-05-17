<?php
class Login {
    private $koneksi;
    public function __construct(){
        global $dbh;
        $this->koneksi = $dbh;
    }

    public function otentikasi($data) {
        $sql = "SELECT * FROM member WHERE username = ? AND password = SHA1(?)";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
        $rs = $ps->fetch();
        return $rs;
    }
}