<?php
include_once 'Bidang.php';

class PersegiPanjang extends Bidang {
    public $bentuk;
    public $panjang;
    public $lebar;
    public $luas;
    public $keliling;
    
    public function __construct($nama,$bentuk,$panjang,$lebar) {
        parent::__construct($nama);
        $this->bentuk = $bentuk;
        $this->panjang = $panjang;
        $this->lebar = $lebar;
    }

    public function luas() {
        $this->luas = $this->panjang * $this->lebar;
    }

    public function keliling() {
        $this->keliling = 2 * ($this->panjang + $this->lebar);
    }

    public function cetak() {
        parent::cetak();
        echo '<br> Bentuk : '.$this->bentuk;
        echo '<br> Panjang : '.$this->panjang;
        echo '<br> Lebar : '.$this->lebar;
        echo '<br> Luas : '.$this->luas;
        echo '<br> Keliling : '.$this->keliling;
        echo '<hr>';
    }
}