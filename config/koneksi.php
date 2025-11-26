<?php
$host = 'localhost';
// $host = '127.0.0.1';
$username = 'root';
$password = '';
$database = 'absensi';

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die('Koneksi database gagal :' . $conn->connect_error);
}

?>