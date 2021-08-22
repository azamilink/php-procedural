<?php 
require '../functions.php';

$keyword = $_GET['keyword'];

$query = "SELECT * FROM mahasiswa
					WHERE
					-- nama = '$keyword'
					nama LIKE '%$keyword%' OR
					nrp LIKE '%$keyword%' OR
					email LIKE '%$keyword%' OR
					jurusan LIKE '%$keyword%'
				";
				
$mahasiswa = query($query);
 
 ?>

 <table border="1" cellpading="10" cellspacing="1">
		<tr>
			<th>No.</th>
			<th>Foto</th>
			<th>Nama</th>
			<th>Nrp</th>
			<th>Email</th>
			<th>Jurusan</th>
			<th>Aksi</th>
		</tr>

		<!-- pengulangan untuk no urut tabel -->
		<?php $i = 1; ?>
		<!-- lakukan pengulangan / foreach untuk setiap element pada array mahasiswa -->
		<?php foreach( $mahasiswa as $row ) : ?>
		<tr>
			<td><?= $i; ?></td>
			<td><img src="img/<?= $row["gambar"]; ?>" width="90" height="60"></td>
			<td><?= $row["nama"]; ?></td>
			<td><?= $row["nrp"]; ?></td>
			<td><?= $row["email"]; ?></td>
			<td><?= $row["jurusan"]; ?></td>
			<td>
				<a href="ubah.php?id=<?= $row["id"]; ?>" class="ubah">Ubah</a>
				<a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Yakin?')" class="hapus">Hapus</a>
			</td>
		</tr>
		<?php $i++; ?>
		<?php endforeach; ?>
	</table>