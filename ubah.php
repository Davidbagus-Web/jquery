<?php 
session_start(); 

if( !isset($_SESSION["login"]) ) { 
	header("Location: login.php");
	exit;
} 

require 'functions.php';
// ambil data di url
$id = $_GET["id"];

// query data siswa berdasarkan id
$sw = query("SELECT * FROM siswa WHERE id = $id")[0];

// cek apakah data berhasil di tambahkan atau tidak
if( isset($_POST["submit"]) ) {

// cek apakah data berhasil diubah atau tidak
	if( ubah($_POST) > 0 ) {
		echo "
		<script>
		alert('data berhasil diubah!');
		document.location.href = 'index.php';
		</script>
		";
	} else {
		echo "
		<script>
		alert('data gagal diubah!');
		document.location.href = 'index.php';
		</script>
		";
	}
 }
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Update data siswa</title>
</head>
<body>
	<h1>Update data siswa</h1>

	<form action="" method="post" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?= $sw["id"]; ?>">
		<input type="hidden" name="gambarLama" value="<?= $sw["gambar"]; ?>">
		<ul>
			<li>
				<label for="nrp">NRP : </label>
				<input type="text" name="nrp" id="nrp" required value="<?= $sw["nrp"]; ?>">
			</li>
			<li>
				<label for="nama">Nama : </label>
				<input type="text" name="nama" id="nama" value="<?= $sw["nama"]; ?>">
			</li>
			<li>
				<label for="email">Email : </label>
				<input type="text" name="email" id="email" value="<?= $sw["email"]; ?>">
			</li>
			<li>
				<label for="jurusan">Jurusan : </label>
				<input type="text" name="jurusan" id="jurusan" value="<?= $sw["jurusan"]; ?>">
			</li>
			<li>
				<label for="gambar">Gambar : </label> <br>
				<img src="img/<?= $sw['gambar']; ?>" width="70"> <br>
				<input type="file" name="gambar" id="gambar">
			</li>
			<li>
				<button type="submit" name="submit">Ubah Data</button>
			</li>
		</ul>
	</form>

</body>
</html>