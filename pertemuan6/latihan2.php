<?php 
// Array
$mahasiswa =[
["Sandhika Galih", "33842393", "shandikaglaih@gmail.com", "Teknik Informatika"],
["doddy", "33842393", "doddy@gmail.com", "Teknik mesin"],
["erik", "33842393", "shandikaglaih@gmail.com", "Teknik elektro"]
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
		<li>Nama: <?= $mhs[0]; ?></li>
		<li>Nrp: <?= $mhs[1]; ?></li>
		<li>Email: <?= $mhs[2]; ?></li>
		<li>Jurusan: <?= $mhs[3]; ?></li>
	</ul>
<?php endforeach; ?>

</body>
</html>







