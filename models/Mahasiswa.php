<?php
include_once 'Person.php';

class Mahasiswa extends Person {
    public $jurusan;
    public $semester;
    
    public function __construct($nama,$gender,$umur,$jurusan) {
        parent::__construct($nama,$gender,$umur);
        $this->jurusan = $jurusan;
    }

    public function setSemester($s) {
        $this->semester = $s;
    }

    public function cetak() {
        parent::cetak();
        echo 'Jurusan : '.$this->jurusan;
        echo '<br> Semester : '.$this->semester;
        echo '<hr>';
    }
}