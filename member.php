<?php
if(isset($_SESSION['MEMBER']) && $_SESSION['MEMBER']['role'] == 'administrator') {
?>
	<?php
	$ar_judul = ['No', 'Fullname', 'Username', 'Role', 'Email', 'Foto', 'Action']
	?>
	<a href="index.php?hal=form_member" type="button" class="btn btn-primary"> Add Data </a>
	<br><br>
	<h3> Data User </h3>
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
			$model = new Member();
			$rs = $model->dataMember();
			$no = 1;
			foreach ($rs as $member) {
			?>
				<tr>
					<th> <?= $no ?> </th>
					<td> <?= $member['fullname'] ?> </td>
					<td> <?= $member['username'] ?> </td>
					<td> <?= $member['role'] ?> </td>
					<td> <?= $member['email'] ?> </td>
					<td>
						<?php
						if(!empty($member['foto'])) {
						?>
							<img src="image/<?= $member['foto']?>" height="20%">
						<?php
						} else {
						?>
							<img src="image/nophoto.png" height="20%">
						<?php } ?>
					</td>
					<td> <a href="index.php?hal=detail_member&id=<?= $member['id'] ?>" type="button" class="btn btn-primary"> Detail </a> </td>
					<td> <a href="index.php?hal=form_member&idedit=<?= $member['id'] ?>" type="button" class="btn btn-warning"> Edit </a> </td>
				</tr>
			<?php $no++; } ?>    
		</tbody>
	</table>
<?php } else {
	include_once 'terlarang.php';
} 
?>