<?php
include 'config/koneksi.php';

if (isset($_GET['id'])) {
    $id_absensi = $_GET['id'];
    $sql = "DELETE FROM absen WHERE id_absensi=$id_absensi";

    if ($conn->query($sql) === true) {
        header("Location:absensi.php?success=1");
    } else {
        header("Location:absensi.php?success=0");
    }
} else {
    header("Location:absensi.php");
}

?>