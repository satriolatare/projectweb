<?php
include 'includes/header.php';
include 'config/koneksi.php'; // hapus kalau koneksi sudah di header

// Ambil daftar semua kelas
$kelas = $conn->query("SELECT * FROM kelas ORDER BY nama_kelas ASC");

// Kelas yang sedang dipilih (dari GET)
$id_kelas_terpilih = isset($_GET['id_kelas']) ? $_GET['id_kelas'] : '';

$result = null;
$detail_kelas = null;

if ($id_kelas_terpilih != '') {
	// Ambil detail kelas terpilih (buat judul)
	$qKelas = $conn->query("SELECT * FROM kelas WHERE id_kelas = '$id_kelas_terpilih'");
	$detail_kelas = $qKelas->fetch_assoc();

	// Ambil data absensi untuk kelas tersebut
	$sql = "
        SELECT 
            absen.*,
            siswa.nama_siswa,
            kelas.nama_kelas,
            mapel.nama_mapel
        FROM absen
        INNER JOIN siswa ON absen.id_siswa = siswa.id_siswa
        INNER JOIN kelas ON siswa.id_kelas = kelas.id_kelas
        INNER JOIN mapel ON absen.id_mapel = mapel.id_mapel
        WHERE kelas.id_kelas = '$id_kelas_terpilih'
        ORDER BY tanggal DESC
    ";

	$result = $conn->query($sql);
}
?>

<div class="container mt-4">
	<h3 class="mb-3">Data Absensi</h3>

	<?php if ($id_kelas_terpilih == ''): ?>
		<!-- =========================
			MODE PILIH KELAS (KARTU)
			========================== -->
		<p class="mb-3">Silakan pilih kelas terlebih dahulu:</p>

		<div class="row">
			<?php while ($rowKelas = $kelas->fetch_assoc()): ?>
				<div class="col-md-3 mb-4">
					<div class="card text-center shadow-sm" style="border-radius: 12px;">
						<div class="card-body">
							<h5 class="card-title mb-3">
								<?= $rowKelas['nama_kelas']; ?>
							</h5>
							<a href="absensi.php?id_kelas=<?= $rowKelas['id_kelas']; ?>" class="btn btn-primary">
								Pilih Kelas
							</a>
						</div>
					</div>
				</div>
			<?php endwhile; ?>
		</div>

	<?php else: ?>
		<!-- =========================
			 MODE LIHAT ABSENSI KELAS
			 ========================== -->

		<div class="d-flex justify-content-between align-items-center mb-3">
			<div>
				<h5 class="mb-1">
					Kelas: <?= $detail_kelas ? $detail_kelas['nama_kelas'] : ''; ?>
				</h5>
				<small class="text-muted">
					Menampilkan data absensi untuk kelas ini.
				</small>
			</div>
			<div>
				<a href="absensi.php" class="btn btn-outline-secondary btn-sm">
					Kembali
				</a>
			</div>
		</div>

		<table id="tabelAbsensi" class="table table-striped table-bordered align-middle" style="width:100%">

			<thead class="table-secondary text-center">
				<tr>
					<th>Nama Siswa</th>
					<th>Kelas</th>
					<th>Mata Pelajaran</th>
					<th>Tanggal</th>
					<th>Status</th>
					<th>Action</th>
				</tr>
			</thead>

			<tbody>
				<?php if ($result && $result->num_rows > 0): ?>
					<?php while ($row = $result->fetch_assoc()): ?>
						<tr>
							<td><?= $row['nama_siswa']; ?></td>
							<td><?= $row['nama_kelas']; ?></td>
							<td><?= $row['nama_mapel']; ?></td>
							<td><?= $row['tanggal']; ?></td>
							<td><?= $row['status']; ?></td>
							<td class="text-center">
								<a href="edit_absensi.php?id=<?= $row['id_absensi']; ?>" class="btn btn-warning btn-sm">
									<i class="bi bi-pencil-square"></i>
								</a>
								<a href="hapus_absensi.php?id=<?= $row['id_absensi']; ?>" class="btn btn-danger btn-sm"
									onclick="return confirm('Yakin hapus data?')">
									<i class="bi bi-trash"></i>
								</a>
							</td>
						</tr>
					<?php endwhile; ?>
				<?php endif; ?>
			</tbody>
		</table>


		<div>
			<a class="btn btn-primary" href="form_absensi.php?id_kelas=<?= $id_kelas_terpilih; ?>">
				Input Absensi <i class="bi bi-plus-lg"></i>
			</a>
		</div>

	<?php endif; ?>
</div>

<?php include 'includes/footer.php'; ?>