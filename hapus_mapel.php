<?php
include 'config/koneksi.php';

if (isset($_GET['id'])) {
    $id_mapel = $_GET['id'];
    $sql = "DELETE FROM mapel WHERE id_mapel=$id_mapel";

    if ($conn->query($sql) === true) {
        header("Location:mapel.php?success=1");
    } else {
        header("Location:mapel.php?success=0");
    }
} else {
    header("Location:mapel.php");
}

?>