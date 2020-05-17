<?php
class Person {
    public $nama;
    protected $gender;
    private $umur;
    
    public function __construct($nama,$gender,$umur) {
        $this->nama = $nama;
        $this->gender = $gender;
        $this->umur = $umur;
    }

    public function cetak() {
        echo 'Nama : '.$this->nama;
        echo '<br> Gender : '.$this->gender;
        echo '<br> Umur : '.$this->umur.' tahun';
    }
}