<?php
// koneksi ke database "phpdasar" 
$conn = mysqli_connect("localhost", "root", "", "phpdasar");

// membuat function query(); untuk menampilkan data "mahasiswa"
function query($tampil) {
	global $conn;
	$result = mysqli_query($conn, $tampil);
	$rows = [];
	while ( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}

// membuat function tambah(); untuk menambahkan data "mahasiswa"
function tambah($data) {
	global $conn;
	// ambil data dari tiap elemen dalam form
	$nrp = htmlspecialchars($data["nrp"]);
	$nama = htmlspecialchars($data["nama"]);
	$email = htmlspecialchars($data["email"]);
	$jurusan = htmlspecialchars($data["jurusan"]);
	$gambar = htmlspecialchars($data["gambar"]);

	// query insert data
	$masuk = "INSERT INTO mahasiswa
				VALUES 
				-- masukan data sesuai urutan / susunan field dalam tabel mahasiswa, field id dikosongkan.
				('','$nama','$nrp','$email','$jurusan','$gambar')
			";
	mysqli_query($conn, $masuk);

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

// membuat function ubah(); untuk meng-Update data mahasiswa
function ubah($data) {
	global $conn;
	$id = $data["id"];
	// ambil data dari tiap elemen dalam form
	$nrp = htmlspecialchars($data["nrp"]);
	$nama = htmlspecialchars($data["nama"]);
	$email = htmlspecialchars($data["email"]);
	$jurusan = htmlspecialchars($data["jurusan"]);
	$gambar = htmlspecialchars($data["gambar"]);

	// query insert data
	$update = "UPDATE mahasiswa
				SET 
				-- updatekan data mahasiswa
				nrp = '$nrp',
				nama ='$nama',
				email ='$email',
				jurusan ='$jurusan',
				gambar = '$gambar'
			WHERE id = $id
			";
	mysqli_query($conn, $update);

	// beritahu perubahan data, jika data berubah nilai int=1 / jika tidak nilai int=-1
	return mysqli_affected_rows($conn);
}

// buat function cari()
function cari($keyword) {
	$query = "SELECT * FROM mahasiswa
					WHERE
					-- nama = '$keyword'
					nama LIKE '%$keyword%' OR
					nrp LIKE '%$keyword%' OR
					email LIKE '%$keyword%' OR
					jurusan LIKE '%$keyword%'
				";
	// panggil function query() isi dengan query pencarian diatas:
	return query($query);
}

?>