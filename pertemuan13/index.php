<?php  
session_start();

if (!isset($_SESSION['login'])) {
	header("Location: login.php");
	exit;
}

require 'functions.php';
$mahasiswa = query("SELECT * FROM mahasiswa");

// ketika tombol cari diklik
if (isset($_POST['cari'])) {
	$mahasiswa = cari($_POST['keyword']);
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Daftar Mahasiswa</title>
</head>
<body>
	<a href="logout.php">Logout</a>
	<h3>Daftar Mahasiswa</h3>

	<a href="tambah.php">Tambah Data Mahasiswa</a>
  	<br><br>

  	<form action="" method="POST">
  		<input type="text" name="keyword" size="30" placeholder="masukkan keyword pencarian..." autocomplete="off" autofocus class="keyword">
  		<button type="submit" name="cari" class="tombol-cari">Cari!</button>
  	</form>
  	<br>

  	<div class="container">
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
			<td><img src="img/<?= $mhs['Gambar']; ?>" width="100"></td>
			<td><?= $mhs['Nama']; ?></td>
			<td>
				<a href="detail.php?id=<?= $mhs['id']; ?>">lihat detail</a>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
	</div>

	<script src="js/script.js"></script>
</body>
</html>