<?php
include 'config/koneksi.php';
session_start();

if (!isset($_SESSION['email'])) {
  header('Location: login.php');
  exit();
}

$page = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Absensi Siswa</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="assets/css/style.css?v=<?php echo time(); ?>">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
  <!-- DataTables Bootstrap 5 CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap5.min.css">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
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

          <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin'): ?>
            <li class="navbar-brand fw-bold text-white">
              <a class="nav-link <?= $page == 'dashboard.php' ? 'nav-active-box text-dark' : 'text-white' ?>"
                href="dashboard.php" style="font-size: 14px;">
                <i class="bi bi-bookmark-dash-fill me-2" style="font-size: 14px;"></i> Dashboard
              </a>
            </li>
          <?php endif; ?>

          <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'siswa'): ?>
            <li class="navbar-brand fw-bold text-white">
              <a class="nav-link <?= $page == 'laporan.php' ? 'nav-active-box text-dark' : 'text-white' ?>"
                href="laporan.php" style="font-size: 14px;">
                <i class="bi bi-folder-fill me-2" style="font-size: 14px;"></i> Laporan Absensi
              </a>
            </li>
          <?php endif; ?>


          <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin'): ?>
            <li class="navbar-brand fw-bold text-white">
              <a class="nav-link <?= in_array($page, [
                'master.php',
                'mapel.php',
                'form_mapel.php',
                'edit_mapel.php',
                'kelas.php',
                'form_kelas.php',
                'edit_kelas.php',
                'siswa.php',
                'form_siswa.php',
                'edit_siswa.php',
              ]) ? 'nav-active-box text-dark' : 'text-white' ?>" href="master.php" style="font-size: 14px;">
                <i class="bi bi-database-fill me-2" style="font-size: 14px;"></i>Data Master
              </a>
            </li>
          <?php endif; ?>

          <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin'): ?>
            <li class="navbar-brand fw-bold text-white">
              <a class="nav-link <?= $page == 'absensi.php' ? 'nav-active-box text-dark' : 'text-white' ?>"
                href="absensi.php" style="font-size: 14px;">
                <i class="bi bi-file-earmark-plus-fill" style="font-size: 14px;"></i> Absensi
              </a>
            </li>
          <?php endif; ?>

        </ul>



        <ul class="navbar-nav ms-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle d-flex align-items-center fw-bold text-white" href="#" id="userDropdown"
              role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="bi bi-person-circle me-2" style="font-size: 20px;"></i>
              <span><?= isset($_SESSION['role']) ? ucfirst(htmlspecialchars($_SESSION['role'])) : 'Akun' ?></span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">

              <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin'): ?>
                <li>
                  <a class="dropdown-item" href="akun_siswa.php">
                    <i class="bi bi-people-fill me-2"></i>Akun Siswa
                  </a>
                </li>
                <li>
                  <hr class="dropdown-divider">
                </li>
              <?php endif; ?>

              <li>
                <a class="dropdown-item" href="logout.php" onclick="return confirm('Apakah Anda yakin ingin logout?')">
                  <i class="bi bi-door-open me-2"></i>Log Out
                </a>
              </li>
            </ul>
          </li>
        </ul>

      </div>
    </div>
  </nav>