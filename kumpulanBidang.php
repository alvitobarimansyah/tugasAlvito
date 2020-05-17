<?php
include_once 'models/Lingkaran.php';
include_once 'models/PersegiPanjang.php';
include_once 'models/SegitigaSiku2.php';
include_once 'models/JajarGenjang.php';

$l1 = new Lingkaran('Bidang 2 Dimensi', 'Lingkaran 1', 15);
$l2 = new Lingkaran('Bidang 2 Dimensi', 'Lingkaran 2', 30);
$pp1 = new PersegiPanjang('Bidang 2 Dimensi', 'Persegi Panjang 1', 15, 30);
$pp2 = new PersegiPanjang('Bidang 2 Dimensi', 'Persegi Panjang 2', 30, 60);
$ss1 = new SegitigaSiku2('Bidang 2 Dimensi', 'Segitiga Siku - Siku 1', 15, 30);
$ss2 = new SegitigaSiku2('Bidang 2 Dimensi', 'Segitiga Siku - Siku 2', 30, 60);
$jg1 = new JajarGenjang('Bidang 2 Dimensi', 'Jajar Genjang 1', 15, 30);
$jg2 = new JajarGenjang('Bidang 2 Dimensi', 'Jajar Genjang 2', 30, 60);


$l1->luas(); $l1->keliling();
$l2->luas(); $l2->keliling();
$pp1->luas(); $pp1->keliling();
$pp2->luas(); $pp2->keliling();
$ss1->sisiMiring(); $ss1->luas(); $ss1->keliling();
$ss2->sisiMiring(); $ss2->luas(); $ss2->keliling();
$jg1->sisiMiring(); $jg1->luas(); $jg1->keliling();
$jg2->sisiMiring(); $jg2->luas(); $jg2->keliling();
?>
<div class="jumbotron">
	<h2>
		Kumpulan Bidang 2 Dimensi
	</h2>
	<p>
		<h5> Lingkaran : </h5> 
        <?php
        $l1->cetak(); $l2->cetak();
        ?>
	</p>
    <p>
		<h5> Persegi Panjang : </h5> 
        <?php
        $pp1->cetak(); $pp2->cetak();
        ?>
	</p>
    <p>
		<h5> Segitiga Siku - Siku : </h5> 
        <?php
        $ss1->cetak(); $ss2->cetak();
        ?>
	</p>
    <p>
		<h5> Jajar Genjang : </h5> 
        <?php
        $jg1->cetak(); $jg2->cetak();
        ?>
	</p>
	<p>
		<a class="btn btn-primary btn-large" href="home.php">
			Learn more &nbsp;
			<i class ="fas fa-arrow-right"></i>
		</a>
	</p>
</div>
