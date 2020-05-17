<?php
class Diklat {
    private $koneksi;
    public function __construct(){
        global $dbh;
        $this->koneksi = $dbh;
    }

    public function dataDiklat() {
        $sql = "SELECT diklat.*, pegawai.nama, materi.nama AS materi FROM diklat
                INNER JOIN pegawai on pegawai.id = diklat.idpegawai
                INNER JOIN materi on materi.id = diklat.idmateri";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetchAll();
        return $rs;
    }

    
    public function detailDiklat($id) {
        $sql = "SELECT diklat.*, pegawai.nip, pegawai.nama, pegawai.foto, jabatan.nama AS jabatan, divisi.nama AS divisi, materi.nama AS materi, 
                materi.tgl_mulai, materi.tgl_akhir, materi.tempat
                FROM diklat 
                INNER JOIN pegawai ON pegawai.id = diklat.idpegawai
                INNER JOIN jabatan ON jabatan.id = pegawai.idjabatan
                INNER JOIN divisi ON divisi.id = pegawai.iddivisi
                INNER JOIN materi ON materi.id = diklat.idmateri
                WHERE diklat.id = ?";  
        $ps = $this->koneksi->prepare($sql); 
        $ps->execute($id); 
        $rs = $ps->fetch(); 
        return $rs;
    }

    public function tambah($data) {
        $sql = "INSERT INTO diklat(idpegawai, idmateri, keterangan) 
                VALUES (?,?,?)";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }

    public function ubah($data) {
        $sql = "UPDATE diklat SET idpegawai = ?, idmateri = ?, keterangan = ? WHERE id = ?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }

    public function hapus($id) {
        $sql = "DELETE FROM diklat WHERE id = ?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($id);
    }
}