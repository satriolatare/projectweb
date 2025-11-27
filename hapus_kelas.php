<?php
include 'config/koneksi.php';

if (isset($_GET['id'])) {
    $id_kelas = $_GET['id'];
    $sql = "DELETE FROM kelas WHERE id_kelas=$id_kelas";

    if ($conn->query($sql) === true) {
        header("Location:kelas.php?success=1");
    } else {
        header("Location:kelas.php?success=0");
    }
} else {
    header("Location:kelas.php");
}

?>