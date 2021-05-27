<?php  
session_start();

if (!isset($_SESSION['login'])) {
	header("Location: login.php");
	exit;
}

require 'functions.php';

// Ambil id dari URL
$id = $_GET['id'];

// Query mahasiswa berdasarkan id
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Detail Mahasiswa</title>
</head>
<body>
	
	<h3>Detail Mahasiswa</h3>

	<ul>
		<li><img src="img/<?= $mhs['Gambar']; ?>" width="150"></li>
		<li>NRP : <?= $mhs['NRP']; ?></li>
		<li>Nama : <?= $mhs['Nama']; ?></li>
		<li>Email : <?= $mhs['Email']; ?></li>
		<li>Jurusan : <?= $mhs['Jurusan']; ?></li>
		<li><a href="ubah.php?id=<?= $mhs['id']; ?>">ubah</a> | <a href="hapus.php?id=<?= $mhs['id']; ?>" onclick= "return confirm('apakah anda yakin?');">hapus</a></li>
		<li><a href="index.php">Kembali ke daftar mahasiswa</a></li>
	</ul>

</body>
</html>