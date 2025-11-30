<?php
session_start();
include 'config/koneksi.php';

$email = $_POST['email'];
$password = $_POST['password'];

if (isset($email) && isset($password)) {
    $sql = "SELECT * FROM user WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (sha1($password) == $row['password']) {
            $_SESSION['nama'] = $row['nama'];
            $_SESSION['email'] = $row['email'];
            header("Location: dashboard.php?");
        } else {
            header('Location: login.php?error=1');
        }
    } else {
        header('Location: login.php?error=2');
    }
} else {
    header('Location: login.php?');

}