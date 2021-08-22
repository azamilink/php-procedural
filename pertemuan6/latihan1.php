<?php 
// Array
$mahasiswa =["Sandhika Galih", "33842393", "shandikaglaih@gmail.com", "Teknik Informatika"]
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Daftar Mahasiswa</h1>

	
	<ul>
		<li>Nama: <?= $mahasiswa[0]; ?></li>
		<li>Nrp: <?= $mahasiswa[1]; ?></li>
		<li>Email: <?= $mahasiswa[2]; ?></li>
		<li>Jurusan: <?= $mahasiswa[3]; ?></li>
	</ul>

</body>
</html>







