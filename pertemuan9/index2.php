<?php
// koneksi ke database "phpdasar" 
$conn = mysqli_connect("localhost", "root", "", "phpdasar");

// ambil data dari tabel "mahasiswa" / query data mahasiswa
$result = mysqli_query($conn, "SELECT * FROM mahasiswa");

// ambil data (fetch) "mahasiswa" dari object result
// mysqli_fetch_row() // mengembalikan array numerik [array dengan 'index' angka dari '0']
// mysqli_fetch_assoc() // mengembalikan array associative [array dengan 'key' berupa 'nama']
// mysqli_fetch_array() // mengembalikan keduanya [array numerik dan associative]
// mysqli_fetch_object() // mengembalikan object

// while ( $mhs = mysqli_fetch_assoc($result) ) {
// 	var_dump($mhs);
// }


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

		<!-- lakukan pengulangan untuk setiap element pada array mahasiswa -->
		<?php while ($row = mysqli_fetch_assoc($result)) : ?>
		<tr>
			<td><?= $i ?></td>
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

		<?php endwhile; ?>

	</table>
</body>
</html>         