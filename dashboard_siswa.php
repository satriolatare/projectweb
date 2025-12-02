<?php
include 'includes/header.php';

// batasi: cuma siswa yang boleh buka
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'siswa') {
    // kalau admin / role lain nyasar ke sini, lempar ke dashboard admin
    header("Location: dashboard.php");
    exit;
}

$id_siswa = $_SESSION['id_siswa'];


$jumlah_mapel = $conn->query("SELECT COUNT(DISTINCT id_mapel) AS total FROM absen WHERE id_siswa = $id_siswa")->fetch_assoc()['total'];

$jumlah_hadir = $conn->query("SELECT COUNT(*) AS total FROM absen WHERE id_siswa = $id_siswa AND status = 'Hadir'")->fetch_assoc()['total'];

$jumlah_tidak_hadir = $conn->query("SELECT COUNT(*) AS total FROM absen WHERE id_siswa = $id_siswa AND status IN ('Sakit','Izin','Alpa')")->fetch_assoc()['total'];
?>

<div class="container mt-4">

    <h1 class="judul-title">Dashboard Siswa</h1>

    <div class="row justify-content-center">

        <div class="col-md-3 mb-3">
            <div class="card text-center shadow-lg border-0 rounded-4 card-dashboard"
                style="background: #308aa3ff; color: white;">
                <div class="card-body py-4">
                    <h3 class="fw-bold mb-0" style="font-size: 3rem;"><?= $jumlah_mapel; ?></h3>
                    <p class="mt-2" style="font-size: 1.1rem;">Mapel Diikuti</p>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card text-center shadow-lg border-0 rounded-4 card-dashboard"
                style="background: #308aa3ff; color: white;">
                <div class="card-body py-4">
                    <h3 class="fw-bold mb-0" style="font-size: 3rem;"><?= $jumlah_hadir; ?></h3>
                    <p class="mt-2" style="font-size: 1.1rem;">Total Hadir</p>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card text-center shadow-lg border-0 rounded-4 card-dashboard"
                style="background: #308aa3ff; color: white;">
                <div class="card-body py-4">
                    <h3 class="fw-bold mb-0" style="font-size: 3rem;"><?= $jumlah_tidak_hadir; ?></h3>
                    <p class="mt-2" style="font-size: 1.1rem;">Total Tidak Hadir</p>
                </div>
            </div>
        </div>

    </div>

</div>

<?php include 'includes/footer.php'; ?>