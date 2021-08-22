<?php
session_start();

if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}

// menghubunkan page functions.php ke index.php
require 'functions.php';

// pagination
// konfigurasi
$dataPerhalaman = 3;
$totalData = count(query("SELECT * FROM mahasiswa"));
$jumlahHalaman = ceil($totalData / $dataPerhalaman);
$halamanAktif = (isset($_GET['halaman'])) ? $_GET['halaman'] : 1;
$awalData = ($dataPerhalaman * $halamanAktif) - $dataPerhalaman;

// panggil function query();
$mahasiswa = query("SELECT * FROM mahasiswa LIMIT $awalData, $dataPerhalaman");

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
				padding: 5px;
			}
			.tambah, .ubah, .hapus, .logout {
				display: inline-block;
				text-decoration: none;
				border: 1px solid blue;
				border-radius: 10px;
				padding: 5px;
			}
			.ubah {
				color: green;
				border-color: green;
			}
			.hapus {
				color: orange;
				border-color: orange;
			}
			.logout {
				color: grey;
				border-color: grey;
			}
			a {
				text-decoration: none;
			}
		</style>
</head>

<body>

	<a href="logout.php" class="logout">Logout</a>
	<br>

	<h1>Daftar Mahasiswa</h1>

	<a href="tambah.php" class="tambah">Tambah Data Mahasiswa</a>
	<br><br>

	<form action="" method="post">
		<input type="text" name="keyword" size="40" autofocus placeholder="masukan keyword pencarian..." autocomplete="off">
		<button type="submit" name="cari">Cari!</button>
	</form>

	<br>
	<table border="1" cellpading="10" cellspacing="1">
		<tr>
			<th>No.</th>
			<th>Foto</th>
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
			<td><img src="img/<?= $row["gambar"]; ?>" width="90" height="60"></td>
			<td><?= $row["nama"]; ?></td>
			<td><?= $row["nrp"]; ?></td>
			<td><?= $row["email"]; ?></td>
			<td><?= $row["jurusan"]; ?></td>
			<td>
				<a href="ubah.php?id=<?= $row["id"]; ?>" class="ubah">Ubah</a>
				<a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Yakin?')" class="hapus">Hapus</a>
			</td>
		</tr>
		<?php $i++; ?>
		<?php endforeach; ?>
	</table>
<br>

	<!-- navigasi -->
	<?php if($halamanAktif > 1) : ?>
		<a href="?halaman=<?= $halamanAktif - 1; ?>">&laquo;</a>
	<?php endif; ?>

<?php for($i=1; $i <= $jumlahHalaman; $i++) : ?>
	<?php if( $i == $halamanAktif ) : ?>
	<a href="?halaman=<?= $i; ?>" style="font-weight: bold; color: red;"><?= $i; ?></a>
	<?php else: ?>
	<a href="?halaman=<?= $i; ?>"><?= $i; ?></a>
	<?php endif;  ?>
<?php endfor; ?>

<?php if($halamanAktif < $jumlahHalaman) : ?>
		<a href="?halaman=<?= $halamanAktif + 1; ?>">&raquo;</a>
	<?php endif; ?>

</body>
</html>         