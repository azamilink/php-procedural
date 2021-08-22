<?php  
require 'functions.php';

// ambil data id di URL dengan metode GET
$id = $_GET["id"];

// query data mahasiswa berdasarkan id / gunakan function query(); yang sudah dibuat dihalaman functions.php
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];
var_dump($mhs["nama"]); 
// atau hapus index [0] diatas dan gunakan variabel dibawah ini:
// var_dump($mhs[0]["nama"]);


// cek apakah tombol submit udah ditekan / belum
if( isset($_POST["submit"]) ) {
	
	

	// cek apakah data berhasil diubah / tidak
	if ( ubah($_POST) > 0) {
			echo "
				<script>
		        	alert('data berhasil diubah');
					document.location.href = 'index.php';
				</script>
			";
		} else {
			echo "
				<script>
			        alert('data gagal diubah');
					document.location.href = 'index.php';
				</script>
				";
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tambah data mahasiswa</title>
</head>

<body>

	<h1>Tambah data mahasiswa</h1>

	<form action="" method="post">
		<input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
		<ul>
			<li>
				<label for="nrp">Nrp :</label>
				<input type="text" name="nrp" id="nrp" required value="<?= $mhs["nrp"]; ?>">
			</li>
			<li>
				<label for="nama">Nama :</label>
				<input type="text" name="nama" id="nama" required value="<?= $mhs["nama"]; ?>">
			</li>
			<li>
				<label for="email">Email :</label>
				<input type="text" name="email" id="email" required value="<?= $mhs["email"]; ?>">
			</li>
			<li>
				<label for="jurusan">Jurusan :</label>
				<input type="text" name="jurusan" id="jurusan" required value="<?= $mhs["jurusan"]; ?>">
			</li>
			<li>
				<label for="gambar">Gambar :</label>
				<input type="text" name="gambar" id="gambar" value="<?= $mhs["gambar"]; ?>">
			</li>
			<li>
				<button type="submit" name="submit">Ubah Data!</button>
			</li>
		</ul>
	</form>

</body>
</html>