<?php
if(isset($_SESSION['MEMBER'])) {
?>
	<?php
	$ar_judul = ['No','Nama Divisi', 'Action'];
	?>
	<a href="index.php?hal=form_divisi" type="button" class="btn btn-primary"> Add Data </a>
	<br><br>   
	<h3> Data Divisi Pegawai </h3>
	<br>
	<table class="table table-striped">
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
			$model = new Divisi();
			$rs = $model->dataDivisi();
			$no = 1;
			foreach ($rs as $divisi) {
			?>
				<tr>
					<th> <?= $no ?> </th>
					<td> <?= $divisi['nama'] ?> </td>
					<td> <a href="index.php?hal=form_divisi&idedit=<?= $divisi['id'] ?>" type="button" class="btn btn-warning"> Edit </a> </td>
				</tr>
			<?php $no++; } ?>    
		</tbody>
	</table>
<?php } else {
	include_once 'terlarang.php';
} 
?>