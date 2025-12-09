<?php
session_start();
include 'config/koneksi.php';

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';


if ($email == '' || $password == '') {
    header('Location: login.php?error=2');
    exit;
}

// cari user berdasarkan email
$sql = "SELECT * FROM user WHERE email='$email' LIMIT 1";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {

    $user = $result->fetch_assoc();
    $password_input = sha1($password);

    // PASSWORD SALAH
    if ($password_input !== $user['password']) {
        header('Location: login.php?error=1'); // "Password Salah"
        exit;
    }

    // PASSWORD BENAR → SET SESSION
    $_SESSION['email'] = $user['email'];
    $_SESSION['nama'] = $user['nama'];
    $_SESSION['role'] = $user['role'];

    // ========= JIKA ADMIN =========
    if ($user['role'] == 'admin') {
        header("Location: dashboard.php");
        exit;
    }

    // ========= JIKA SISWA =========
    if ($user['role'] == 'siswa') {

        $id_siswa = (int) $user['id_siswa'];

        // kalau id_siswa masih 0 (user lama), coba cocokin ke tabel siswa
        if ($id_siswa == 0) {

            $nama_user = $conn->real_escape_string($user['nama']);

            $sql_siswa = "SELECT id_siswa FROM siswa WHERE nama_siswa LIKE '%$nama_user%'LIMIT 1";
            $res_siswa = $conn->query($sql_siswa);

            if ($res_siswa && $res_siswa->num_rows > 0) {
                $row_siswa = $res_siswa->fetch_assoc();
                $id_siswa = (int) $row_siswa['id_siswa'];

                // simpan ke tabel user supaya login berikutnya langsung ada
                $conn->query("UPDATE user SET id_siswa = $id_siswa WHERE email = '$email'");
            } else {
                // nama di user tidak ketemu di tabel siswa
                // dari sisi tampilan, kita anggap saja seperti "email tidak terdaftar"
                header("Location: login.php?error=2");
                exit;
            }
        }
        $_SESSION['id_siswa'] = $id_siswa;

        header("Location: laporan.php");
        exit;
    }

    // kalau role bukan admin / siswa → anggap email tidak valid
    header("Location: login.php?error=2");
    exit;

} else {
    header('Location: login.php?error=2'); 
    exit;
}
