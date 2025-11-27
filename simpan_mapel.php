<?php
include "config/koneksi.php";

if ($_POST) {
	$nama_mapel = $_POST["nama_mapel"];
	

	$sql = "INSERT INTO mapel (nama_mapel) VALUES ('$nama_mapel')";

	if ($conn->query($sql) === true) {
		header("location: mapel.php? success=1");
	} else {
		header("location: mapel.php? success=0");
	}
} else {
	header("location: mapel.php");
}
exit;


?>