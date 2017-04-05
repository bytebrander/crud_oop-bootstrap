<?php 

include "database.php";

$id = $_GET['idTest'];
$result = $link->query("DELETE FROM datasiswa WHERE id = $id");
if ($result) {
	header("location:index.php");
} else {
	echo "Hapus Error";
}

 ?>