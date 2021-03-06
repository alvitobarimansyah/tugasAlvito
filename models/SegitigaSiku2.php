<?php
include_once 'Bidang.php';

class SegitigaSiku2 extends Bidang {
    public $bentuk;
    public $alas;
    public $tinggi;
    public $sisiMiring;
    public $luas;
    public $keliling;
    
    public function __construct($nama,$bentuk,$alas,$tinggi) {
        parent::__construct($nama);
        $this->bentuk = $bentuk;
        $this->alas = $alas;
        $this->tinggi = $tinggi;
    }

    public function sisiMiring() {
        $this->sisiMiring = ($this->alas * $this->alas) + ($this->tinggi * $this->tinggi);
    }

    public function luas() {
        $this->luas = 1/2 * $this->alas * $this->tinggi;
    }

    public function keliling() {
        $this->keliling = $this->tinggi + $this->sisiMiring + $this->alas;
    }

    public function cetak() {
        parent::cetak();
        echo '<br> Bentuk : '.$this->bentuk;
        echo '<br> Alas : '.$this->alas;
        echo '<br> Tinggi : '.$this->tinggi;
        echo '<br> Sisi Miring : '.$this->sisiMiring;
        echo '<br> Luas : '.$this->luas;
        echo '<br> Keliling : '.$this->keliling;
        echo '<hr>';
    }
}