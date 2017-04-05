<?php 

$host = "localhost";
$user = "root";
$pass = "merdeka123";
$db   = "belajaroop";

$link = new mysqli($host, $user, $pass, $db);
if ($link->connect_error) {
	die("koneksi error".$link->connect_error);
}

 ?>