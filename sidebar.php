	<?php
	$obj1 = new Divisi();
	$ar_divisi = $obj1->dataDivisi();
	$obj2 = new Jabatan();
	$ar_jabatan = $obj2->dataJabatan();
	?>
	<div class="col-md-3">
		<?php
		if(isset($_SESSION['MEMBER'])){ 
		?>
		<div class="list-group">
			<a href="#" class="list-group-item list-group-item-action active">Divisi</a>
			<?php
			foreach($ar_divisi as $divisi){
			?>
				<div class="list-group-item">
					<a href="index.php?hal=pegawai&divisi=<?= $divisi['id'] ?>">
						<?= $divisi['nama'] ?>
					</a>
				</div>
			<?php } ?>
		</div>
		<br/><br/>
		<div class="list-group">
			<a href="#" class="list-group-item list-group-item-action active">Jabatan</a>
		<?php
		foreach($ar_jabatan as $jabatan){
		?>
			<div class="list-group-item">
				<a href="index.php?hal=pegawai&jabatan=<?= $jabatan['id'] ?>">
					<?= $jabatan['nama'] ?>
				</a>
			</div>
		<?php } ?>
		</div>
		<?php } else{ 
			include_once 'form_login.php';
		}		
		?>
	</div>
</div>