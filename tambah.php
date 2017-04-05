<!DOCTYPE html>
<html>
	<head>
		<title>TAMBAH DATA</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	</head>
	<body>
		<h2>Tambah Data</h2>
		<a href="index.php">Beranda</a>
		<form action="" method="post">
			<table><br>
				<tr>
					<td>Nama: </td>
					<td><input type="text" name="nama" required></td>
				</tr>
				<tr>
					<td>Kelas: </td>
					<td>
						<select name="kelas">
							<option value="pilih kelas">Pilih Kelas</option>
							<option value="X">X</option>
							<option value="XI">XI</option>
							<option value="XII">XII</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Jurusan: </td>
					<td>
						<select name="jurusan">
							<option value="pilih jurusan">Pilih Jurusan</option>
							<option value="teknik komputer dan jaringan">Teknik Komputer dan Jaringan</option>
							<option value="teknik mesin">Teknik Mesin</option>
							<option value="kimia analisis">Kimia Analisis</option>
							<option value="kimia industri">Kimia Industri</option>
							<option value="otomotif">Otomotif</option>
							<option value="farmasi">Farmasi</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Jenis Kelamin: </td>
					<td>
						<select name="jenis_kelamin">
							<option value="laki-laki">Laki-laki</option>
							<option value="perempuan">Perempuan</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Alamat: </td>
					<td><textarea name="alamat" cols="20" rows="5" required></textarea></td>
				</tr>
			</table>
			 <button type="submit" name="submit" class="btn btn-primary" style="margin-top: 12px; margin-left: 90px;">Tambah</button>
		</form>
	</body>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-2.2.3.min.js"></script>
</html>

<?php 

include "database.php";

if (isset($_POST['submit'])) {
	if (is_numeric($_POST['nama'])) {
		echo "Maaf, Nama harus berbentuk huruf";
	} else {
		echo $nama = $_POST['nama'];
	}

	$kelas = $_POST['kelas'];
	$jurusan = $_POST['jurusan'];
	$jenisklm = $_POST['jenis_kelamin'];
	$alamat = $_POST['alamat'];


	$tambah ="INSERT INTO datasiswa VALUES(NULL, '$nama', '$kelas', '$jurusan', '$jenisklm', '$alamat')";


	if ($link->query($tambah)) {
		header('location:index.php');
	} else {
		die("Tambah Data error".$link->error);
	}
}

$link->close();

 ?>