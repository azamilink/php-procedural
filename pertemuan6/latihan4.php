<?php 
// Array
$mahasiswa =[
	[
		"Nama" => "Aliando Syarief", 
		"Nrp" => "33842393",
		"Email" => "shandikaglaih@gmail.com",
		"Jurusan" => "Teknik Informatika",
		"Nilai" => [34, 82,26],
		"gambar" => "formal.jpg"
	],
	[
		"Nama" => "Doddy", 
		"Nrp" => "33842393", 
		"Email" => "Doddy@gmail.com", 
		"Jurusan" => "Teknik Elektro",
		"Nilai" => [32, 28,62],
		"gambar" => "kemeja.jpg"
	],
	[
		"Nama" => "Rini", 
		"Nrp" => "33842393", 
		"Email" => "Erik@gmail.com", 
		"Jurusan" => "Teknik Mesin",
		"Nilai" => [30, 28,26],
		"gambar" => "hijab.jpg"
	]
];

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Daftar Mahasiswa</h1>

	<?php foreach( $mahasiswa as $mhs): ?>
	<ul>
		<li>
			<img src="img/<?= $mhs["gambar"]; ?>">
		</li>
		<li>Nama: <?= $mhs["Nama"]; ?></li>
		<li>Nrp: <?= $mhs["Nrp"]; ?></li>
		<li>Email: <?= $mhs["Email"]; ?></li>
		<li>Jurusan: <?= $mhs["Jurusan"]; ?></li>
		<li>Nilai: <?= $mhs["Nilai"][0]; ?></li>
	</ul>
<?php endforeach; ?>

</body>
</html>







