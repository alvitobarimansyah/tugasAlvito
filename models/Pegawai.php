<?php
class Pegawai {
    private $koneksi;
    public function __construct(){
        global $dbh;
        $this->koneksi = $dbh;
    }

    public function dataPegawai() {
        $sql = "SELECT pegawai.*, jabatan.nama AS jabatan, divisi.nama AS divisi FROM pegawai
                INNER JOIN divisi on divisi.id = pegawai.iddivisi
                INNER JOIN jabatan on jabatan.id = pegawai.idjabatan";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetchAll();
        return $rs;
    }

    public function detailPegawai($id) {
        $sql = "SELECT pegawai.*, jabatan.nama AS jabatan, divisi.nama AS divisi
                FROM pegawai 
                INNER JOIN jabatan ON jabatan.id = pegawai.idjabatan
                INNER JOIN divisi ON divisi.id = pegawai.iddivisi
                WHERE pegawai.id = ?";  
        $ps = $this->koneksi->prepare($sql); 
        $ps->execute($id); 
        $rs = $ps->fetch(); 
        return $rs;
    }

    public function cariPegawai($nama) {
        $sql = "SELECT pegawai.*, jabatan.nama AS jabatan, divisi.nama AS divisi
                FROM pegawai 
                INNER JOIN jabatan ON jabatan.id = pegawai.idjabatan
                INNER JOIN divisi ON divisi.id = pegawai.iddivisi
                WHERE pegawai.nama 
                LIKE '%$nama%' ";  
        $ps = $this->koneksi->prepare($sql); 
        $ps->execute(); 
        $rs = $ps->fetchAll(); 
        return $rs;
    }

    public function filterDivisi($id) {
        $sql = "SELECT pegawai.*, jabatan.nama AS jabatan, divisi.nama AS divisi
                FROM pegawai 
                INNER JOIN jabatan ON jabatan.id = pegawai.idjabatan
                INNER JOIN divisi ON divisi.id = pegawai.iddivisi
                WHERE pegawai.iddivisi = $id";  
        $ps = $this->koneksi->prepare($sql); 
        $ps->execute(); 
        $rs = $ps->fetchAll(); 
        return $rs;
    }

    public function filterJabatan($id) {
        $sql = "SELECT pegawai.*, jabatan.nama AS jabatan, divisi.nama AS divisi
                FROM pegawai 
                INNER JOIN jabatan ON jabatan.id = pegawai.idjabatan
                INNER JOIN divisi ON divisi.id = pegawai.iddivisi
                WHERE pegawai.idjabatan = $id";  
        $ps = $this->koneksi->prepare($sql); 
        $ps->execute(); 
        $rs = $ps->fetchAll(); 
        return $rs;
    }

    public function tambah($data) {
        $sql = "INSERT INTO pegawai(nip, nama, gender, idjabatan, iddivisi, alamat, foto) 
                VALUES (?,?,?,?,?,?,?)";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }

    public function ubah($data) {
        $sql = "UPDATE pegawai SET nip = ?, nama = ?, gender = ?, idjabatan = ?, iddivisi = ?, alamat = ?, foto = ? WHERE id = ?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }

    public function hapus($id) {
        $sql = "DELETE FROM pegawai WHERE id = ?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($id);
    }
}