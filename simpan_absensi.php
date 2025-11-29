<?php
include "config/koneksi.php";

if ($_POST) {
    $id_siswa = $_POST["id_siswa"];
    $id_mapel = $_POST["id_mapel"];
    $id_kelas = $_POST["id_kelas"];
    $tanggal = $_POST["tanggal"];
    $status = $_POST["status"];

    $sql = "INSERT INTO absen (id_siswa, id_kelas, id_mapel, tanggal, status) VALUES ('$id_siswa','$id_kelas', '$id_mapel', '$tanggal', '$status')";

    if ($conn->query($sql) === true) {
        header("location:absensi.php? success=1");
    } else {
        header("location:absensi.php? success=0");
    }
} else {
    header("location:absensi.php");
}
exit;


?>