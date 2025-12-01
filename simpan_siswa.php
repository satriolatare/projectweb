<?php
include "config/koneksi.php";

if ($_POST) {
    $nama_siswa = $_POST["nama_siswa"];
    $nisn = $_POST["nisn"];
    $id_kelas = $_POST["id_kelas"];

    $sql = "INSERT INTO siswa (nama_siswa, nisn, id_kelas) VALUES ('$nama_siswa','$nisn','$id_kelas')";

    if ($conn->query($sql) === true) {
        header("location:siswa.php? success=1");
    } else {
        header("location:siswa.php? success=0");
    }
} else {
    header("location:siswa.php");
}
exit;


?>