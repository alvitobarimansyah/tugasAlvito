<?php
class Gaji {
    private $koneksi;
    public function __construct(){
        global $dbh;
        $this->koneksi = $dbh;
    }

    public function dataGaji() {
        $sql = "SELECT gaji.*, pegawai.nip, pegawai.nama, jabatan.nama AS jabatan, divisi.nama AS divisi FROM gaji
                INNER JOIN pegawai on pegawai.id = gaji.idpegawai 
                INNER JOIN divisi on divisi.id = pegawai.iddivisi 
                INNER JOIN jabatan on jabatan.id = pegawai.idjabatan";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetchAll();
        return $rs;
    }
    
    public function getGaji($id) {
        $sql = "SELECT gaji.*, pegawai.nip, pegawai.nama, pegawai.foto, jabatan.nama AS jabatan, divisi.nama AS divisi FROM gaji
                INNER JOIN pegawai on pegawai.id = gaji.idpegawai 
                INNER JOIN divisi on divisi.id = pegawai.iddivisi 
                INNER JOIN jabatan on jabatan.id = pegawai.idjabatan
                WHERE gaji.id = ?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($id);
        $rs = $ps->fetch();
        return $rs;
    }

    public function detailGaji($nip) {
        $sql = "SELECT gaji.*, pegawai.nip, pegawai.nama, pegawai.foto, jabatan.nama AS jabatan, divisi.nama AS divisi FROM gaji
                INNER JOIN pegawai on pegawai.id = gaji.idpegawai 
                INNER JOIN divisi on divisi.id = pegawai.iddivisi 
                INNER JOIN jabatan on jabatan.id = pegawai.idjabatan
                WHERE pegawai.nip = ?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($nip);
        $rs = $ps->fetch();
        return $rs;
    }

    public function tambah($data) {
        $sql = "INSERT INTO gaji(idpegawai, gapok, tunjab, lain2) VALUES (?,?,?,?)";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }

    public function ubah($data) {
        $sql = "UPDATE gaji SET idpegawai = ?, gapok = ?, tunjab = ?, lain2 = ? WHERE id = ?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }

    public function hapus($id) {
        $sql = "DELETE FROM gaji WHERE id = ?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($id);
    }
    
}