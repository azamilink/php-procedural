<?php 
// Array
$mahasiswa =[
	[
		"nama" => "Aliando Syarief", 
		"nrp" => "33842393",
		"email" => "Aliando@gmail.com",
		"jurusan" => "Teknik Informatika",
		"gambar" => "formal.jpg"
	],
	[
		"nama" => "Doddy", 
		"nrp" => "33842393", 
		"email" => "Doddy@gmail.com", 
		"jurusan" => "Teknik Elektro",
		"gambar" => "kemeja.jpg"
	],
	[
		"nama" => "Rini", 
		"nrp" => "33842393", 
		"email" => "Rini@gmail.com", 
		"jurusan" => "Teknik Mesin",
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
	<h1>GET</h1>

	
	<ul>
		<?php foreach( $mahasiswa as $mhs): ?>
			<li>
				<a href="latihan2.php?nama=<?= $mhs["nama"]; ?>&nrp=<?= $mhs["nrp"]; ?>&email=<?= $mhs["email"]; ?>&jurusan=<?= $mhs["jurusan"]; ?>&gambar=<?= $mhs["gambar"]; ?>"><?= $mhs["nama"]; ?></a>
			</li>
		<?php endforeach; ?>
	</ul>


</body>
</html>







