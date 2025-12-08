<?php include 'includes/header.php'; ?>

<div class="container mt-4">
    <h1 class="judul-title" class="text-center mb-4">
        Laporan Rekap Absensi Siswa
    </h1>

    <?php
    $where = "";

    if ($_SESSION['role'] == 'siswa') {
        $id_siswa = $_SESSION['id_siswa'];
        $where = "WHERE absen.id_siswa = '$id_siswa'";
    }

    $laporan = $conn->query("
    SELECT 
        siswa.nama_siswa,
        kelas.nama_kelas,
        mapel.nama_mapel,
        MIN(absen.tanggal) AS tanggal_pertama,
        MAX(absen.tanggal) AS tanggal_terakhir,

        SUM(CASE WHEN absen.status = 'Hadir' THEN 1 ELSE 0 END) AS hadir,
        SUM(CASE WHEN absen.status = 'Izin' THEN 1 ELSE 0 END) AS izin,
        SUM(CASE WHEN absen.status = 'Sakit' THEN 1 ELSE 0 END) AS sakit,
        SUM(CASE WHEN absen.status = 'Alpa' THEN 1 ELSE 0 END) AS alpa

    FROM absen
    JOIN siswa ON siswa.id_siswa = absen.id_siswa
    JOIN kelas ON kelas.id_kelas = siswa.id_kelas
    JOIN mapel ON mapel.id_mapel = absen.id_mapel
    $where
    GROUP BY siswa.id_siswa, mapel.id_mapel
");

    ?>


    <div class="card">
        <div class="card-header">
            <strong>Data Rekap Absensi per Siswa</strong>
        </div>
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered text-center">
                    <thead class="table-secondary">
                        <tr>
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>Kelas</th>
                            <th>Mapel</th>
                            <th>Hadir</th>
                            <th>Izin</th>
                            <th>Sakit</th>
                            <th>Alpa</th>
                            <th>Tgl Pertama</th>
                            <th>Tgl Terakhir</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($laporan && $laporan->num_rows > 0) {
                            $no = 1;
                            while ($row = $laporan->fetch_assoc()) {
                                ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $row['nama_siswa']; ?></td>
                                    <td><?= $row['nama_kelas']; ?></td>
                                    <td><?= $row['nama_mapel']; ?></td>
                                    <td><?= $row['hadir']; ?></td>
                                    <td><?= $row['izin']; ?></td>
                                    <td><?= $row['sakit']; ?></td>
                                    <td><?= $row['alpa']; ?></td>
                                    <td><?= $row['tanggal_pertama']; ?></td>
                                    <td><?= $row['tanggal_terakhir']; ?></td>
                                </tr>
                                <?php
                            }
                        } else {
                            ?>
                            <tr>
                                <td colspan="10">Belum ada data absensi.</td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>