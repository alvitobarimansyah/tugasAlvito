<?php
class Member {
    private $koneksi;
    public function __construct() {
        global $dbh;
        $this->koneksi = $dbh;
    }

    public function dataMember() {
        $sql = "SELECT * FROM member";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetchAll();
        return $rs;
    }

    public function getMember($id) {
        $sql = "SELECT * FROM member WHERE id=?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($id);
        $rs = $ps->fetch();
        return $rs;
    }
    
    public function tambah($data) {
        $sql = "INSERT INTO member(fullname, username, password, role, email, foto)
                VALUES (?,?,SHA1(?),?,?,?)";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }

    public function ubah($data) {
        $sql = "UPDATE member SET fullname = ?, username = ?, password = SHA1(?), role = ?, email = ?, foto = ? WHERE id = ?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }

    public function hapus($id) {
        $sql = "DELETE FROM member WHERE id = ?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($id);
    }
}