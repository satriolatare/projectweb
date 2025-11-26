<?php include 'config/koneksi.php';
// session_start();

// if (!isset($_SESSION['email'])) {
//     header('Location: login.php');
//     exit();
// }
// ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
    <title> </title>
</head>

<body>

    <nav class="navbar navbar-expand-lg " style="background-color: grey;">
        <div class="container-fluid">

            <img src="man.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
            <h1 class="ms-2 mb-0" style="font-size: 24px;">ABSENSI SISWA</h1>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-3 mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="absensi.php">Absensi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="mapel.php">Mata Pelajaran</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="kelas.php">Kelas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="siswa.php">Siswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-danger" href="logout.php"
                            onclick="return confirm('apakah anda yakin?')">Log Out</a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>