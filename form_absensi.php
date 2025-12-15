<?php
include 'includes/header.php';
include 'config/koneksi.php'; // hapus kalau sudah di header

// Ambil id_kelas dari URL
$id_kelas = isset($_GET['id_kelas']) ? $_GET['id_kelas'] : '';

// Kalau id_kelas kosong, balik ke absensi.php
if ($id_kelas == '') {
    header("Location: absensi.php");
    exit;
}

// Ambil data kelas (untuk ditampilkan namanya)
$detail_kelas = $conn->query("SELECT * FROM kelas WHERE id_kelas = '$id_kelas'")->fetch_assoc();

// Ambil siswa hanya dari kelas yang dipilih
$siswa = $conn->query("
    SELECT * FROM siswa 
    WHERE id_kelas = '$id_kelas' 
    ORDER BY nama_siswa ASC
");

// Ambil mapel
$mapel = $conn->query("SELECT * FROM mapel ORDER BY nama_mapel ASC");
?>

<div class="container mt-4">
    <h3 class="mb-3">
        Input Absensi - Kelas <?= $detail_kelas ? $detail_kelas['nama_kelas'] : ''; ?>
    </h3>

    <form action="simpan_absensi.php" method="POST">
        <!-- Kirim id_kelas kalau suatu saat mau dipakai -->
        <input type="hidden" name="id_kelas" value="<?= htmlspecialchars($id_kelas); ?>">

        <div class="row">
            <div class="col-md-4">
                <label>Nama Siswa</label>
                <select class="form-control" name="id_siswa" id="id_siswa" required>
                    <option value="">-- Pilih Siswa --</option>
                    <?php while ($rowSiswa = $siswa->fetch_assoc()): ?>
                        <option value="<?= $rowSiswa['id_siswa']; ?>">
                            <?= $rowSiswa['nama_siswa']; ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>

            <div class="col-md-4">
                <label>Mata Pelajaran</label>
                <select class="form-control" name="id_mapel" id="id_mapel" required>
                    <?php while ($rowMapel = $mapel->fetch_assoc()): ?>
                        <option value="<?= $rowMapel['id_mapel']; ?>">
                            <?= $rowMapel['nama_mapel']; ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>

            <div class="col-md-4">
                <label>Tanggal</label>
                <input type="date" name="tanggal" id="tanggal" class="form-control" value="<?=date('Y-m-d');?>" required>
            </div>

            <div class="col-md-4 mt-3">
                <label>Status</label>
                <select class="form-control" name="status" id="status" required>
                    <option value="Hadir">Hadir</option>
                    <option value="Izin">Izin</option>
                    <option value="Sakit">Sakit</option>
                    <option value="Alpa">Alpa</option>
                </select>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-12">
                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="absensi.php?id_kelas=<?= $id_kelas; ?>" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </form>
</div>

<?php include 'includes/footer.php'; ?>
