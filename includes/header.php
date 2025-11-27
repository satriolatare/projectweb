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


      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-3 mb-2 mb-lg-0">
          <nav class="navbar navbar-expand-lg">
            <div class="container">

              <a class="navbar-brand fw-bold" href="absensi.php">ABSENSI SISWA</a>

              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse" id="navbarNav">

                
                
                <li class="nav-item">
                  <a class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'mapel.php' ? 'active fw-bold text-warning' : '' ?>"
                  href="mapel.php">Mata Pelajaran</a>
                </li>
                
                <li class="nav-item">
                  <a class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'kelas.php' ? 'active fw-bold text-warning' : '' ?>"
                  href="kelas.php">Kelas</a>
                </li>
                
                <li class="nav-item">
                  <a class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'siswa.php' ? 'active fw-bold text-warning' : '' ?>"
                    href="siswa.php">Siswa</a>
                  </li>
                
                <ul class="navbar-nav ms-auto">
                  <li class="nav-item">
                    <a class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'absensi.php' ? 'active fw-bold text-warning' : '' ?>"
                      href="absensi.php">Absensi</a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link text-danger fw-bold" href="logout.php"
                      onclick="return confirm('Apakah Anda yakin ingin logout?')">Logout</a>
                  </li>
                </ul>

              </div>
            </div>
          </nav>

        </ul>

      </div>
    </div>
  </nav>