<?php
include "config/koneksi.php";

if ($_POST) {

    $id_siswa = $_POST["id_siswa"];
    $id_mapel = $_POST["id_mapel"];
    $tanggal  = $_POST["tanggal"];
    $status   = $_POST["status"];

    // AMBIL KELAS OTOMATIS BERDASARKAN SISWA
    $q    = $conn->query("SELECT id_kelas FROM siswa WHERE id_siswa = '$id_siswa'");
    $data = $q->fetch_assoc();
    $id_kelas = $data["id_kelas"];  

    // INSERT KE TABEL ABSEN (PAKAI id_kelas JUGA)
    $sql = "INSERT INTO absen (id_siswa, id_kelas, id_mapel, tanggal, status) 
            VALUES ('$id_siswa', '$id_kelas', '$id_mapel', '$tanggal', '$status')";

    if ($conn->query($sql) === true) {
        // ⬇⬇⬇ BEDANYA DI SINI: balik ke absensi.php tetapi BAWA id_kelas
        header("Location: absensi.php?id_kelas=".$id_kelas."&success=1");
    } else {
        header("Location: absensi.php?id_kelas=".$id_kelas."&success=0");
    }

} else {
    header("Location: absensi.php");
}

exit;
?>
