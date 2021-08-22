<?php
// menghubunkan page functions.php ke index.php
require 'functions.php';

// panggil function query();
$mahasiswa = query("SELECT * FROM mahasiswa ORDER BY id DESC"); // DESC = tampilkan mahasiswa yang terbaru

// tombol cari ditekan
if ( isset($_POST["cari"]) ) {
	// panggil function cari()
	$mahasiswa = cari($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Tampil Data Mahasiswa</title>
		<style>
			td {
				padding: 10px;
			}
		</style>
</head>

<body>
	<h1>Daftar Mahasiswa</h1>

	<a href="tambah.php">Tambah data mahasiswa</a>
	<br><br>

	<form action="" method="post">
		<input type="text" name="keyword" size="40" autofocus placeholder="masukan keyword pencarian..." autocomplete="off">
		<button type="submit" name="cari">Cari!</button>
	</form>
	<br>

	<table border="1" cellpading="10" cellspacing="1">
		<tr>
			<th>No.</th>
			<th>Gambar</th>
			<th>Nama</th>
			<th>Nrp</th>
			<th>Email</th>
			<th>Jurusan</th>
			<th>Aksi</th>
		</tr>

		<!-- pengulangan untuk no urut tabel -->
		<?php $i = 1; ?>
		<!-- lakukan pengulangan / foreach untuk setiap element pada array mahasiswa -->
		<?php foreach( $mahasiswa as $row ) : ?>
		<tr>
			<td><?= $i; ?></td>
			<td><img src="img/<?= $row["gambar"]; ?>" width="100" height="50"></td>
			<td><?= $row["nama"]; ?></td>
			<td><?= $row["nrp"]; ?></td>
			<td><?= $row["email"]; ?></td>
			<td><?= $row["jurusan"]; ?></td>
			<td>
				<a href="ubah.php?id=<?= $row["id"]; ?>">ubah</a>
				<a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Yakin?')">hapus</a>
			</td>
		</tr>
		<?php $i++; ?>
		<?php endforeach; ?>
	</table>

</body>
</html>         