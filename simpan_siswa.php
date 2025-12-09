<?php
include "config/koneksi.php";
session_start();

if (!isset($_SESSION['email']) || $_SESSION['role'] != 'admin') {
    header('Location: login.php');
    exit();
}

if ($_POST) {
    $nama_siswa = $_POST["nama_siswa"];
    $nisn = $_POST["nisn"];
    $id_kelas = $_POST["id_kelas"];

    // 1. Simpan ke tabel siswa
    $sql = "INSERT INTO siswa (nama_siswa, nisn, id_kelas) 
            VALUES ('$nama_siswa','$nisn','$id_kelas')";

    if ($conn->query($sql) === TRUE) {

        // ambil id_siswa yang baru dibuat
        $id_siswa_baru = $conn->insert_id;

        // 2. Ambil kata pertama sebagai email + password
        $nama_bersih = trim($nama_siswa);
        $kata = explode(' ', $nama_bersih);
        $nama_awal = strtolower($kata[0]); // huruf kecil

        // 3. Email & Password
        $email = $nama_awal . "@sistemabsensi.com";
        $password_plain = $nama_awal;      // contoh: "satrio"
        $password_hash = sha1($password_plain); // HASH SHA1 sesuai database kamu

        // 4. Simpan akun user
        $sql_user = "INSERT INTO user (nama, email, password, role, id_siswa) VALUES ('$nama_siswa', '$email', '$password_hash', 'siswa', $id_siswa_baru)";
        $conn->query($sql_user);

        header("Location: siswa.php?success=1");
        exit();

    } else {
        header("Location: siswa.php?success=0");
        exit();
    }

} else {
    header("Location: siswa.php");
    exit();
}
?>