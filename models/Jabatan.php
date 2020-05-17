<?php
class Jabatan {
    private $koneksi;
    public function __construct(){
        global $dbh;
        $this->koneksi = $dbh;
    }

    public function dataJabatan() {
        $sql = "SELECT * FROM jabatan";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetchAll();
        return $rs;
    }

    public function getJabatan($id) {
        $sql = "SELECT * FROM jabatan WHERE id=?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($id);
        $rs = $ps->fetch();
        return $rs;
    }

    public function tambah($data) {
        $sql = "INSERT INTO jabatan (nama) VALUES (?)";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }

    public function ubah($data) {
        $sql = "UPDATE jabatan SET nama = ? WHERE id = ?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }

    public function hapus($id) {
        $sql = "DELETE FROM jabatan WHERE id = ?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($id);
    }
}