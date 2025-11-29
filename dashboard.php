<?php include 'includes/header.php'; ?>

<div class="container mt-4">

    <!-- Judul Dashboard -->
    <h1 class="text-center mb-4" style="background-color: rgba(128, 128, 128, 0.3); border-radius: 20px; color: black; padding:10px;">
        Dashboard Absensi
    </h1>

    <!-- Menu Input Data (Mapel, Kelas, Siswa, Absensi) -->
    <div class="row mb-4">

        <div class="col-md-3 mb-3">
            <div class="card h-100" >
                <div class="card-body text-center">
                    <h5 class="card-title">Input Mapel</h5>
                    <a href="mapel.php" class="btn btn-primary">Input Mapel</a>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card h-100">
                <div class="card-body text-center">
                    <h5 class="card-title">Input Kelas</h5>
                    <a href="kelas.php" class="btn btn-primary">Input Kelas</a>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card h-100">
                <div class="card-body text-center">
                    <h5 class="card-title">Input Siswa</h5>
                    <a href="siswa.php" class="btn btn-primary">Input Siswa</a>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card h-100">
                <div class="card-body text-center">
                    <h5 class="card-title">Input Absensi</h5>
                    <a href="absensi.php" class="btn btn-primary">Input Absensi</a>
                </div>
            </div>
        </div>

    </div>

    

</div>

<?php include 'includes/footer.php'; ?>
