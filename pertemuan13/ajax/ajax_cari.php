<?php 
require '../functions.php';
$mahasiswa = cari($_GET['keyword']);
?>

<table border="1" cellpadding="10" cellspacing="0s">
	<tr>
		<th>#</th>
		<th>Gambar</th>
		<th>Nama</th>
		<th>Aksi</th>
	</tr>

	<?php if(empty($mahasiswa)) : ?>
	<tr>
		<td colspan="4">
			<p style="color: red; font-style: italic;">data mahasiswa tidak ditemukan!</p>
		</td>
	</tr>
	<?php endif; ?>

	<?php $i = 1; 
	foreach($mahasiswa as $mhs) : ?>
	<tr>
		<td><?= $i++; ?></td>
		<td><img src="img/<?= $mhs['Gambar']; ?>" width="70"></td>
		<td><?= $mhs['Nama']; ?></td>
		<td>
			<a href="detail.php?id=<?= $mhs['id']; ?>">lihat detail</a>
		</td>
	</tr>
	<?php endforeach; ?>
</table>