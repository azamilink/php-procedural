<?php
// menghubunkan page functions.php ke index.php
require 'functions.php';

// panggil function query();
$mahasiswa = query("SELECT * FROM mahasiswa");

?>

<!DOCTYPE html>
<html lang="en">
<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Tampil Data Mahasiswa</title>
</head>

<body>
	<h1>Daftar Mahasiswa</h1>

	<table border="1" cellpading="10" cellspacing="0">
		<tr>
			<th>No.</th>
			<th>Aksi</th>
			<th>Gambar</th>
			<th>Nrp</th>
			<th>Nama</th>
			<th>Email</th>
			<th>Jurusan</th>
		</tr>

		<!-- pengulangan untuk no urut tabel -->
		<?php $i = 1; ?>
		<!-- lakukan pengulangan / foreach untuk setiap element pada array mahasiswa -->
		<?php foreach( $mahasiswa as $row ) : ?>
		<tr>
			<td><?= $i; ?></td>
			<td>
				<a href="">ubah</a>
				<a href="">hapus</a>
			</td>
			<td><img src="img/<?= $row["gambar"]; ?>" width="50"></td>
			<td><?= $row["nrp"]; ?></td>
			<td><?= $row["nama"]; ?></td>
			<td><?= $row["email"]; ?></td>
			<td><?= $row["jurusan"]; ?></td>
		</tr>
		<?php $i++; ?>
		<?php endforeach; ?>

	</table>
</body>
</html>         