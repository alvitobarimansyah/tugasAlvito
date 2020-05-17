<?php
include_once 'Bidang.php';

class Lingkaran extends Bidang {
    public $bentuk;
    public $jari2;
    public $luas;
    public $keliling;
    
    public function __construct($nama,$bentuk,$jari2) {
        parent::__construct($nama);
        $this->bentuk = $bentuk;
        $this->jari2 = $jari2;
    }

    public function luas() {
        $this->luas = 3.14 * $this->jari2 * $this->jari2;
    }

    public function keliling() {
        $this->keliling = 2 * 3.14 * $this->jari2;
    }

    public function cetak() {
        parent::cetak();
        echo '<br> Bentuk : '.$this->bentuk;
        echo '<br> Jari - jari : '.$this->jari2;
        echo '<br> Luas : '.$this->luas;
        echo '<br> Keliling : '.$this->keliling;
        echo '<hr>';
    }
}