<?php
if(isset($_SESSION['MEMBER']) && $_SESSION['MEMBER']['role'] != 'staff') {
?>
	<?php
	$ar_judul = ['No', 'Nama Pegawai', 'Materi Pelatihan', 'Keterangan', 'Action'];
	?>
	<a href="index.php?hal=form_diklat" type="button" class="btn btn-primary"> Add Data </a>
	<br><br>
	<h3>Data Diklat</h3>
	<br>
	<table class="table table-striped">
		<thead>
			<tr class="table-success">
				<?php
				foreach($ar_judul as $jdl) {
				?>
					<th><?= $jdl ?></th>
				<?php } ?>  
			</tr>
		</thead>
		<tbody>
			<?php
			$model = new Diklat();
			$rs = $model->dataDiklat();
			$no = 1;
			foreach ($rs as $diklat) {
			?>
				<tr>
					<td> <?= $no?></td>
					<td> <?= $diklat['nama']?> </td>
					<td> <?= $diklat['materi']?> </td>
					<td> <?= $diklat['keterangan']?> </td>
					<td>
						<a href="index.php?hal=detail_diklat&id=<?= $diklat['id'] ?>" type="button" class="btn btn-primary"> Detail </a>
						<a href="index.php?hal=form_diklat&idedit=<?= $diklat['id'] ?>" type="button" class="btn btn-warning"> Edit </a>
					</td>
				</tr>
			<?php $no++; } ?>
		</tbody>
	</table>
<?php } else {
	include_once 'terlarang.php';
} 
?>