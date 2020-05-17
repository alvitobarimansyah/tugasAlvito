<?php
class Bidang {
    public $nama;
    
    public function __construct($nama) {
        $this->nama = $nama;
    }

    public function cetak() {
        echo 'Nama Bidang : '.$this->nama;
    }
}