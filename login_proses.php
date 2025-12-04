<?php
session_start();
include 'config/koneksi.php';

$email    = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

if ($email == '' || $password == '') {
    header('Location: login.php?error=2');
    exit;
}

$sql = "SELECT * FROM user WHERE email='$email' LIMIT 1";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();

    if (sha1($password) == $row['password']) {

        $_SESSION['nama']     = $row['nama'];
        $_SESSION['email']    = $row['email'];
        $_SESSION['role']     = $row['role'];     // 'admin' / 'siswa'
        $_SESSION['id_siswa'] = $row['id_siswa']; // null kalau admin

        if ($row['role'] == 'admin') {
            header("Location: dashboard.php");
        } elseif ($row['role'] == 'siswa') {
            header("Location: laporan.php"); // <- pakai nama file punyamu
        } else {
            header("Location: login.php?error=3");
        }
        exit;

    } else {
        header('Location: login.php?error=1'); // password salah
        exit;
    }

} else {
    header('Location: login.php?error=2'); // email gak ketemu
    exit;
}
