<?php 
// Array
$mahasiswa =[
	[
		"Nrp" => "33842393", // posisi Nrp terbalik gak masalah
		"Nama" => "Sandhika Galih", 
		"Email" => "shandikaglaih@gmail.com",
		"Jurusan" => "Teknik Informatika",
		"Nilai" => [34, 82,26]
	],
	[
		"Nama" => "Doddy", 
		"Nrp" => "33842393", 
		"Email" => "Doddy@gmail.com", 
		"Jurusan" => "Teknik Elektro",
		"Nilai" => [32, 28,62]
	],
	[
		"Nama" => "Erik", 
		"Nrp" => "33842393", 
		"Email" => "Erik@gmail.com", 
		"Jurusan" => "Teknik Mesin",
		"Nilai" => [30, 28,26]
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
		<li>Nama: <?= $mhs["Nama"]; ?></li>
		<li>Nrp: <?= $mhs["Nrp"]; ?></li>
		<li>Email: <?= $mhs["Email"]; ?></li>
		<li>Jurusan: <?= $mhs["Jurusan"]; ?></li>
		<li>Nilai: <?= $mhs["Nilai"][0]; ?></li>
	</ul>
<?php endforeach; ?>

</body>
</html>







