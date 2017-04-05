<?php 

include "database.php";

$id = $_GET['idTest'];
$select = $link->query("SELECT * FROM datasiswa WHERE id = $id");
$result = $select->fetch_assoc();
 ?>
<!DOCTYPE html>
 <html>
     <head>
        <title>EDIT DATA</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
     </head>
    <body>
        <h2><b>Edit Data</b></h2>
 
        <a href="index.php">Beranda</a>
        <form action="" method="post">
            <table>
                <tr>
                    <td>Nama: </td>
                    <td><input type="text" name="nama" value="<?php echo $result['nama']; ?>"></td>
                </tr>
                <tr>
                    <td>Kelas: </td>
                    <td>
                        <select name="kelas">
                            <option value="pilih kelas">Pilih Kelas</option>
                            <option value="X" <?php if ($result['kelas'] == 'X') {echo 'selected';} ?>>X
                            </option>
                            <option value="XI" <?php if ($result['kelas'] == 'XI') {echo 'selected';} ?>>XI
                            </option>
                            <option value="XII" <?php if ($result['kelas'] == 'XII') {echo 'selected';} ?>>XII
                            </option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Jurusan: </td>
                    <td>
                        <select name="jurusan">
                            <option value="pilih jurusan">>Pilih Jurusan</option>
                            <option value="teknik komputer dan jaringan" <?php if ($result['jurusan'] == 'teknik komputer dan jaringan') {echo 'selected';} ?>>Teknik Komputer dan Jaringan
                            </option>
                            <option value="teknik mesin" <?php if ($result['jurusan'] == 'teknik mesin') {echo 'selected';} ?>>Teknik Mesin
                            </option>
                            <option value="kimia analisis" <?php if ($result['jurusan'] == 'kimia analisis') {echo 'selected';} ?>>Kimia Analisis
                            </option>
                            <option value="kimia industri" <?php if ($result['jurusan'] == 'kimia industri') {echo 'selected';} ?>>Kimia Industri
                            </option>
                            <option value="otomotif" <?php if ($result['jurusan'] == 'otomotif') {echo 'selected';} ?>>Otomotif</option>
                            <option value="farmasi" <?php if ($result['jurusan'] == 'farmasi') {echo 'selected';} ?>>Farmasi</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Jenis Kelamin: </td>
                    <td>
                        <select name="jenis_kelamin">
                            <option value="laki-laki" <?php if ($result['jenis_kelamin'] == 'laki-laki') {echo 'selected';} ?>>Laki-laki
                            </option>
                            <option value="perempuan" <?php if ($result['jenis_kelamin'] == 'perempuan') {echo 'selected';} ?>>Perempuan</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Alamat: </td>
                    <td><input type="text" name="alamat" value="<?php echo $result['alamat']; ?>"></td>
                </tr>
            </table>
            <button type="submit" name="submit" class="btn btn-primary" style="margin-top: 12px; margin-left: 90px;">Edit</button>
        </form>
    </body>
     <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-2.2.3.min.js"></script>
 </html>

<?php 

if (isset($_POST['submit'])) {
	if (is_numeric($_POST['nama'])) {
		echo "Maaf, Nama harus berbentuk huruf";
	} elseif(is_null($_POST['nama'])) {
		echo "Maaf, Nama tidak boleh kosong";
	} else {
		echo $nama = $_POST['nama'];
	}

	$kelas = $_POST['kelas'];
	$jurusan = $_POST['jurusan'];
	$jenisklm = $_POST['jenis_kelamin'];
	$alamat = $_POST['alamat'];
	$id = $_GET['idTest'];

	$edit = $link->query("UPDATE datasiswa SET nama = '$nama', kelas = '$kelas', jurusan = '$jurusan', jenis_kelamin = '$jenisklm', alamat = '$alamat' WHERE id = $id");
	if ($edit) {
		header("location:index.php");
	} else {
		die("Edit Error".$link->error);
	}
}

$link->close();
 ?>