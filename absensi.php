<?php include 'includes/header.php'; ?>

<!-- <?php
$result = $conn->query("SELECT nilai_mahasiswa.*, mata_kuliah.matakuliah FROM nilai_mahasiswa INNER JOIN mata_kuliah ON nilai_mahasiswa.id_mata_kuliah = mata_kuliah.id");
?> -->



<br>
<h3>Selamat Datang, <?= $_SESSION['name'] ?> </h3>
<h1 align="center" style="background-color: grey;  border-radius: 20px; ">ABSEN SISWA</h1>
<br>



<table class="table">
	<tr align="center">
		<td>Action</td>
		<td>Nama</td>
		<td>Nim</td>
		<td>Mata Kuliah</td>
		<td>Tugas</td>
		<td>UTS</td>
		<td>UAS</td>
		<td>Keterangan</td>
	</tr>
	<?php if ($result && $result->num_rows > 0): ?>
		<?php while ($row = $result->fetch_assoc()): ?>
			<?php


			$nim = $row['nim'];
			$nama = $row['nama'];
			$tugas = $row['tugas'];
			$uts = $row['uts'];
			$uas = $row['uas'];
			$nilai_akhir = (0.3 * $tugas) + (0.3 * $uts) + (0.4 * $uas);
			if ($nilai_akhir > 70) {
				$keterangan = 'LULUS';
			} else {
				$keterangan = "TIDAK LULUS";
			}
			?>

			<tr align="center">

				<td>
					<a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning">Edit</a>
					<a href="hapus.php?id=<?= $row['id'] ?>" class="btn btn-danger"
						onclick="return confirm('apakah anda yakin?')">Hapus</a>
				</td>
				<td><?= $row['nama'] ?></td>
				<td><?= $row['nim'] ?></td>
				<td><?= $row['matakuliah'] ?></td>
				<td><?= $row['tugas'] ?></td>
				<td><?= $row['uts'] ?></td>
				<td><?= $row['uas'] ?></td>
				<td><?= $keterangan ?></td>
			</tr>

		<?php endwhile ?>
	<?php else: ?>
		<tr>
			<td colspan="8"> Data Belum Tersedia</td>
		</tr>
	<?php endif ?>
</table>

<div>
	<a class="btn btn-primary" href="form.php">tambah data</a>
</div>

<?php include 'includes/footer.php' ?>