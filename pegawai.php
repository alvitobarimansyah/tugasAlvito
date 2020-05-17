<?php
if(isset($_SESSION['MEMBER'])) {
?>
	<?php
	$ar_judul = ['No', 'NIP', 'Nama', 'Gender', 'Jabatan', 'Divisi', 'Alamat', 'Foto', 'Action'];
	?>
	<a href="index.php?hal=form_pegawai" type="button" class="btn btn-primary"> Add Data </a>
	<br><br>
	<h3>Data Pegawai</h3>
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
			$model = new Pegawai();
			$nama = $_GET['nama'];
			$divisi = $_GET['divisi'];
			$jabatan = $_GET['jabatan'];
			if(!empty($nama)) {
				$rs = $model->cariPegawai($nama);
			} else if(!empty($divisi)) {
				$rs = $model->filterDivisi($divisi);
			} else if(!empty($jabatan)) {
				$rs = $model->filterJabatan($jabatan);
			} else {
				$rs = $model->dataPegawai();
			}
			$no = 1;
			foreach ($rs as $pegawai) {
			?>
				<tr>
					<td> <?= $no?></td>
					<td> <?= $pegawai['nip']?> </td>
					<td> <?= $pegawai['nama']?> </td>
					<td> <?= $pegawai['gender']?> </td>
					<td> <?= $pegawai['jabatan']?> </td>
					<td> <?= $pegawai['divisi']?> </td>
					<td> <?= $pegawai['alamat']?> </td>
					<td>
						<?php
						if(!empty($pegawai['foto'])) {
						?>
							<img src="image/<?= $pegawai['foto']?>" height="20%">
						<?php
						} else {
						?>
							<img src="image/nophoto.png" height="20%">
						<?php } ?>
					</td>
					<td>
						<a href="index.php?hal=detail_pegawai&id=<?= $pegawai['id'] ?>" type="button" class="btn btn-primary"> Detail </a>
						<a href="index.php?hal=form_pegawai&idedit=<?= $pegawai['id'] ?>" type="button" class="btn btn-warning"> Edit </a>
					</td>
				</tr>
			<?php $no++; } ?>
		</tbody>
	</table>
<?php } else {
	include_once 'terlarang.php';
} 
?>