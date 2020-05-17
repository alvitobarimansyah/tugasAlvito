<?php
class Divisi {
    private $koneksi;
    public function __construct() {
        global $dbh;
        $this->koneksi = $dbh;
    }

    public function dataDivisi() {
        $sql = "SELECT * FROM divisi";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetchAll();
        return $rs;
    }

    public function getDivisi($id) {
        $sql = "SELECT * FROM divisi WHERE id=?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($id);
        $rs = $ps->fetch();
        return $rs;
    }

    public function tambah($data) {
        $sql = "INSERT INTO divisi(nama) VALUES (?)";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }

    public function ubah($data) {
        $sql = "UPDATE divisi SET nama=? WHERE id = ?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }

    public function hapus($id) {
        $sql = "DELETE FROM divisi WHERE id = ?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($id);
    }

}