<?php
include "config/koneksi.php";

if ($_POST) {
	$nama_kelas = $_POST["nama_kelas"];
	

	$sql = "INSERT INTO kelas (nama_kelas) VALUES ('$nama_kelas')";

	if ($conn->query($sql) === true) {
		header("location: kelas.php? success=1");
	} else {
		header("location: kelas.php? success=0");
	}
} else {
	header("location: kelas.php");
}
exit;


?>