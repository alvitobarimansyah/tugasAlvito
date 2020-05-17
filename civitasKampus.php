<?php
include_once 'models/Dosen.php';
include_once 'models/Mahasiswa.php';
$d1 = new Dosen('Alvito','L','18','Dr. M.Kom','Kaprodi SI');
$d2 = new Dosen('Afian','L','18','Dr. M.Log','Kaprodi Logistik');
$m1 = new Mahasiswa('Okta','P','18','SI');
$m2 = new Mahasiswa('Elen','P','18','Logistik');

$m1->setSemester(5);
$m2->setSemester(2);
?>
<div class="jumbotron">
	<h2>
		Civitas Kampus STT-NF
	</h2>
	<p>
		<h5> Data Dosen : </h5> 
        <?php
        $d1->cetak(); $d2->cetak();
        ?>
	</p>
    <p>
		<h5> Data Mahasiswa : </h5> 
        <?php
        $m1->cetak(); $m2->cetak();
        ?>
	</p>
	<p>
		<a class="btn btn-primary btn-large" href="home.php">
			Learn more &nbsp;
			<i class ="fas fa-arrow-right"></i>
		</a>
	</p>
</div>
