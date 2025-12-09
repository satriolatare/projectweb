<?php
include 'includes/header.php';

// batasi: cuma admin yang boleh di sini
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: dashboard_siswa.php");
    exit;
}

$jumlah_mapel = $conn->query("SELECT COUNT(*) AS total FROM mapel")->fetch_assoc()['total'];
$jumlah_kelas = $conn->query("SELECT COUNT(*) AS total FROM kelas")->fetch_assoc()['total'];
$jumlah_siswa = $conn->query("SELECT COUNT(*) AS total FROM siswa")->fetch_assoc()['total'];
?>

<div class="container mt-4">

    <h1 class="judul-title">Dashboard</h1>

    <div class="row justify-content-center">

        <div class="col-md-3 mb-3">
            <div class="card text-center shadow-lg border-0 rounded-4 card-dashboard" style="background: #308aa3ff; color: white;">
                <div class="card-body py-4">
                    <h3 class="fw-bold mb-0" style="font-size: 3rem;"><?= $jumlah_mapel; ?></h3>
                    <p class="mt-2" style="font-size: 1.1rem;">Total Mapel</p>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card text-center shadow-lg border-0 rounded-4 card-dashboard" style="background: #308aa3ff; color: white;">
                <div class="card-body py-4">
                    <h3 class="fw-bold mb-0" style="font-size: 3rem;"><?= $jumlah_kelas; ?></h3>
                    <p class="mt-2" style="font-size: 1.1rem;">Total Kelas</p>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card text-center shadow-lg border-0 rounded-4 card-dashboard" style="background: #308aa3ff; color: white;">
                <div class="card-body py-4">
                    <h3 class="fw-bold mb-0" style="font-size: 3rem;"><?= $jumlah_siswa; ?></h3>
                    <p class="mt-2" style="font-size: 1.1rem;">Total Siswa</p>
                </div>
            </div>
        </div>

    </div>

</div>

<?php include 'includes/footer.php'; ?>
