<?php
if(isset($_SESSION['MEMBER'])) {
?>
	<?php
	$ar_judul = ['No', 'Nama Jabatan', 'Action'];
	?>
	<a href="index.php?hal=form_jabatan" type="button" class="btn btn-primary"> Add Data </a>
	<br><br>   
	<h3> Data Jabatan Pegawai </h3>
	<br>
	<table class="table">
		<thead>
			<tr>
				<?php
				foreach ($ar_judul as $judul) {
				?>
					<th> <?= $judul ?> </th>
				<?php } ?>
			</tr>
		</thead>
		<tbody>
			<?php
			$model = new Jabatan();
			$rs = $model->dataJabatan();
			$no = 1;
			foreach ($rs as $jabatan) {
			?>
				<tr>
					<td> <?= $no?> </td>
					<td> <?= $jabatan['nama']?> </td>
					<td> <a href="index.php?hal=form_jabatan&idedit=<?= $jabatan['id'] ?>" type="button" class="btn btn-warning"> Edit </a> </td>
				</tr>
			<?php $no++; } ?>
		</tbody>
	</table>
<?php } else {
	include_once 'terlarang.php';
} 
?>