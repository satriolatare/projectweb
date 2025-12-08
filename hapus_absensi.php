<?php
include 'config/koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Ambil id_kelas sebelum data dihapus
    $q = $conn->query("SELECT id_kelas FROM absen WHERE id_absensi='$id'");
    $id_kelas = ($q && $q->num_rows > 0) ? $q->fetch_assoc()['id_kelas'] : '';

    // Hapus data absensi
    $conn->query("DELETE FROM absen WHERE id_absensi='$id'");

    // Redirect kembali ke kelas yang sama
    header("Location: absensi.php?id_kelas=$id_kelas");
    exit;
}

header("Location: absensi.php");
exit;
?>
