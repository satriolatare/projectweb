<?php
include 'config/koneksi.php';

if (isset($_GET['id'])) {
    $id_siswa = $_GET['id'];
    $sql = "DELETE FROM siswa WHERE id_siswa=$id_siswa";

    if ($conn->query($sql) === true) {
        header("Location:siswa.php?success=1");
    } else {
        header("Location:siswa.php?success=0");
    }
} else {
    header("Location:siswa.php");
}

?>