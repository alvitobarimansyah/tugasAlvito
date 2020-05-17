<?php
class Materi {
    private $koneksi;
    public function __construct() {
        global $dbh;
        $this->koneksi = $dbh;
    }

    public function dataMateri() {
        $sql = "SELECT * FROM materi";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetchAll();
        return $rs;
    }

    public function getMateri($id) {
        $sql = "SELECT * FROM materi WHERE id = ?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($id);
        $rs = $ps->fetch();
        return $rs;
    }

    public function tambah($data) {
        $sql = "INSERT INTO materi(nama, tgl_mulai, tgl_akhir, tempat) VALUES (?,?,?,?)";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }

    public function ubah($data) {
        $sql = "UPDATE materi SET nama = ?, tgl_mulai = ?, tgl_akhir = ?, tempat = ? WHERE id = ?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }

    public function hapus($id) {
        $sql = "DELETE FROM materi WHERE id = ?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($id);
    }

}