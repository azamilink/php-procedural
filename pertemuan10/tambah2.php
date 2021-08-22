<?php  
// koneksi ke DBMS / MySQL
$conn = mysqli_connect("localhost","root","","phpdasar");

// cek apakah tombol submit udah ditekan atau belum
if( isset($_POST["submit"]) ) {
	// ambil data dari tiap elemen dalam form
	$nrp = $_POST["nrp"];
	$nama = $_POST["nama"];
	$email = $_POST["email"];
	$jurusan = $_POST["jurusan"];
	$gambar = $_POST["gambar"];

	// query insert data
	$query =	"INSERT INTO mahasiswa
								VALUES 
				-- masukan data sesuai urutan atau susunan field dalam tabel mahasiswa, field id dikosongkan.
							('','$nama','$nrp','$email','$jurusan','$gambar')
						";
	mysqli_query($conn, $query);

	// cek apakah data berhasil ditambahkan atau tidak
	if (mysqli_affected_rows($conn) > 0) {
		echo "berhasil";
	} else {
		echo "gagal";
		echo "<br>";
		echo mysqli_error($conn);
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
		<ul>
			<li>
				<label for="nrp">Nrp</label>
				<input type="text" name="nrp" id="nrp">
			</li>
			<li>
				<label for="nama">Nama</label>
				<input type="text" name="nama" id="nama">
			</li>
			<li>
				<label for="email">Email</label>
				<input type="text" name="email" id="email">
			</li>
			<li>
				<label for="jurusan">Jurusan</label>
				<input type="text" name="jurusan" id="jurusan">
			</li>
			<li>
				<label for="gambar">Gambar</label>
				<input type="text" name="gambar" id="gambar">
			</li>
			<li>
				<button type="submit" name="submit">Tambah Data!</button>
			</li>
		</ul>
	</form>
</body>
</html>