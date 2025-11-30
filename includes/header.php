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
  <link rel="stylesheet" href="assets/css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
    crossorigin="anonymous"></script>
  <title> </title>
</head>

<body>

  <nav class="navbar navbar-expand-lg" style="background-color: grey; border-bottom-left-radius: 15px;
border-bottom-right-radius: 15px;">
    <div class="container-fluid">


      <a class="navbar-brand d-flex align-items-center fw-bold text-white" style="font-size: 28px;">

        <img src="man.png" alt="Logo" width="40" height="40" class="me-2">
        <div class="d-flex flex-column lh-1">
          <span style="font-size: 25px;">ABSENSI</span>
          <span style="font-size: 15px; margin-top:-3px;">SISWA</span>
        </div>
      </a>



      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>


      <div class="collapse navbar-collapse" id="navbarSupportedContent">


        <ul class="navbar-nav ms-3 mb-2 mb-lg-0">

          <li class="navbar-brand d-flex align-items-center fw-bold text-white">
            <a class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'dashboard.php' ? 'nav-active-box fw-bold' : 'text-white' ?>"
              href="dashboard.php">
              Dashboard <i class="bi bi-bookmark-dash"></i>
            </a>
          </li>

          <li class="navbar-brand d-flex align-items-center fw-bold text-white">
            <a class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'master.php' ? 'nav-active-box fw-bold' : 'text-white' ?>"
              href="master.php">
              Data Master <i class="bi bi-database"></i>
            </a>
          </li>

        </ul>


        <ul class="navbar-nav ms-auto">
          <li class="navbar-brand d-flex align-items-center fw-bold text-white">
            <a class="nav-link text-danger fw-bold d-flex align-items-center gap-1" href="logout.php"
              onclick="return confirm('Apakah Anda yakin ingin logout?')">
              <i class="bi bi-door-open text-dark"></i>Log out 
            </a>
          </li>
        </ul>

      </div>
    </div>
  </nav>