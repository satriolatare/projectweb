<?php
include "config/koneksi.php";

if ($_POST) {
    $nama_siswa = $_POST["nama_siswa"];
    $nisn = $_POST["nisn"];

    $sql = "INSERT INTO siswa (nama_siswa, nisn) VALUES ('$nama_siswa','$nisn')";

    if ($conn->query($sql) === true) {
        header("location: siswa.php? success=1");
    } else {
        header("location: siswa.php? success=0");
    }
} else {
    header("location: siswa.php");
}
exit;


?>