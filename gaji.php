<?php
if(isset($_SESSION['MEMBER']) && $_SESSION['MEMBER']['role'] != 'staff' ) {
?>
	<?php
	$ar_judul = ['No', 'Nama', 'Gaji Pokok', 'Tunjangan Jabatan', 'BPJS','Action'];
	?>
	<a href="index.php?hal=form_gaji" type="button" class="btn btn-primary"> Add Data </a>
	<br><br>
	<h3> Data Gaji Pegawai </h3>
	<br>
	<table class="table table-striped">
		<thead>
			<tr>
			<?php
			foreach($ar_judul as $jdl) {
			?>
			<th> <?= $jdl ?> </th>
			<?php } ?>  
			</tr>
		</thead>
		<tbody>
			<?php
			$model = new Gaji();
			$rs = $model->dataGaji();
			$no = 1;
			foreach ($rs as $gaji) {
			?>
				<tr>
					<td> <?= $no?> </td>
					<td> <?= $gaji['nama']?> </td>
					<td> Rp. <?= number_format($gaji['gapok'], 0, ',', '.')?> </td>
					<td> RP. <?= number_format($gaji['tunjab'], 0, ',', '.')?> </td>
					<td> RP. <?= number_format($gaji['lain2'], 0, ',', '.')?> </td>
					<td>
						<a href="index.php?hal=detail_gaji&nip=<?= $gaji['nip'] ?>" type="button" class="btn btn-primary"> Detail </a>
						<a href="index.php?hal=form_gaji&idedit=<?= $gaji['id'] ?>" type="button" class="btn btn-warning"> Edit </a>

					</td>
				</tr>
			<?php $no++; } ?>
		</tbody>
	</table>
<?php } else {
	include_once 'terlarang.php';
} 
?>