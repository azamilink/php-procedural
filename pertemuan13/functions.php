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

	// upload gambar
	$gambar = upload();
	if (!$gambar) {
		return false;
	}

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

// membuat function upload
function upload() {
	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];

	// cek apakah tidak ada gambar yang di upload
	if ($error == 4) {
		echo "<script>
				alert('pilih gambar terlebih dahulu');
			  </script>";
	}

	// cek yang diupload adalah gmbar
	$ekstensiValid = ['jpg','jpeg','png'];
	$pemisahNama = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($pemisahNama));

	if (!in_array($ekstensiGambar, $ekstensiValid)) {
		echo "<script>
				alert('yang anda upload bukan gambar!');
			  </script>";
		return false;
	}

	// cek jika ukurannya terlalu besar
	if ($ukuranFile > 1000000) {
		echo "<script>
				alert('ukuran gambar terlalu besar!');
			  </script>";
		return false;
	}

	// generate nama gambar baru
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;

	// lolos pengecekan, gambar siap diupload
	move_uploaded_file($tmpName, 'img/'. $namaFileBaru);

	// kembalikan nama file / nama gambar baru agar bisa dimasukan ke key ['gambar']
	return $namaFileBaru;
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
	$gambarLama = $data["gambarLama"];
	// ambil data dari tiap elemen dalam form
	$nrp = htmlspecialchars($data["nrp"]);
	$nama = htmlspecialchars($data["nama"]);
	$email = htmlspecialchars($data["email"]);
	$jurusan = htmlspecialchars($data["jurusan"]);

	// cek apakah user pilih gambar baru atau tidak
	if ( $_FILES['gambar']['error'] === 4) {
		// jika tidak gunakan gambar lama
		$gambar = $gambarLama;
	} else {
		// jika iya gunakan gambar baru
		$gambar = upload();

	}
	
	// query update data
	$query = "UPDATE mahasiswa
				SET 
				-- updatekan data mahasiswa
				nrp = '$nrp',
				nama ='$nama',
				email ='$email',
				jurusan ='$jurusan',
				gambar = '$gambar'
			WHERE id = $id
			";
	mysqli_query($conn, $query);

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
	return query($query);
}

?>