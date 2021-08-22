<?php
// koneksi ke database "phpdasar" 
$conn = mysqli_connect("localhost", "root", "", "phpdasar");
// membuat function query(); untuk menampilkan data "mahasiswa"
function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}

// membuat function tambah(); - query insert data
function tambah($data) {
	global $conn;
	// ambil data dari tiap elemen dalam form
	$nrp = htmlspecialchars($data["nrp"]);
	$nama = htmlspecialchars($data["nama"]);
	$email = htmlspecialchars($data["email"]);
	$jurusan = htmlspecialchars($data["jurusan"]);
	$gambar = htmlspecialchars($data["gambar"]);

	// query insert data
	$query = "INSERT INTO mahasiswa
				VALUES 
				-- masukin data sesuai urutan / susunan field dalam tabel mahasiswa, field id dikosongkan.
				('','$nama','$nrp','$email','$jurusan','$gambar')
			";
	mysqli_query($conn, $query);

	// beritahu perubahan data, jika data berubah nilai int=1 / jika tidak nilai int=-1
	return mysqli_affected_rows($conn);
}

// membuat function hapus(); untuk menghapus data mahasiswa
function hapus($id) {
	global $conn;
	// query hapus data
	mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");
	// beritahu perubahan data, jika data berubah nilai int=1 / jika tidak nilai int=-1
	return mysqli_affected_rows($conn);
}