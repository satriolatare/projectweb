<?php include 'includes/header.php'; ?>

<?php
$result = $conn->query("SELECT absen . *, siswa.nama_siswa, mapel.nama_mapel, kelas.nama_kelas FROM absen INNER JOIN siswa ON absen.id_siswa = siswa.id_siswa INNER JOIN mapel ON absen.id_mapel = mapel.id_mapel INNER JOIN kelas ON absen.id_kelas = kelas.id_kelas");
?>

<div class="mt-4">
	<table class="table table-bordered">
		<tr align="center" class="table-secondary">
			<th>Nama Siswa</th>
			<th>Kelas</th>
			<th>Mata Pelajaran</th>
			<th>Tanggal</th>
			<th>Status</th>
			<th>Action</th>

		</tr>
		<?php if ($result && $result->num_rows > 0): ?>
			<?php while ($row = $result->fetch_assoc()): ?>

				<tr align="center">

					<td><?= $row['nama_siswa'] ?></td>
					<td><?= $row['nama_kelas'] ?></td>
					<td><?= $row['nama_mapel'] ?></td>
					<td><?= $row['tanggal'] ?></td>
					<td><?= $row['status'] ?></td>
					<td><a href="edit_absensi.php?id=<?= $row['id_absensi'] ?>" class="btn btn-warning"> <i
								class="bi bi-pencil-square"></i></a>
						<a href="hapus_absensi.php?id=<?= $row['id_absensi'] ?>" class="btn btn-danger"
							onclick="return confirm('apakah anda yakin?')"><i class="bi bi-trash"></i></a>
					</td>
				</tr>

			<?php endwhile ?>
		<?php else: ?>
			<tr>
				<td colspan="8"> Data Belum Tersedia</td>
			</tr>
		<?php endif ?>
	</table>

	<div>
		<a class="btn btn-primary" href="form_mapel.php">
			Tambah Data <i class="bi bi-plus-lg"></i>
		</a>
	</div>
</div>

<?php include 'includes/footer.php' ?>