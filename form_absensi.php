<?php include 'includes/header.php'; ?>
<?php
$kelas = $conn->query("SELECT * FROM kelas");
$siswa = $conn->query("SELECT * FROM siswa");
$mapel = $conn->query("SELECT * FROM mapel");
?>

<div class="container">
    <form action="simpan_absensi.php" method="POST">
        <div class="row">
            <div class="coll-md-4">
                <label>Nama Siswa</label>
                <select class="form-control" name="id_siswa" id="id_siswa">
                    <option value="">-- Pilih Siswa --</option>
                    <?php
                    $s = $conn->query("SELECT * FROM siswa");
                    while ($row = $s->fetch_assoc()) {
                        echo "<option value='" . $row['id_siswa'] . "'>" . $row['nama_siswa'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="coll-md-4">
                <label>Mata Pelajaran</label>
                <select class="form-control" name="id_mapel" id="id_mapel">
                    <?php while ($row = $mapel->fetch_assoc()): ?>
                        <option value="<?= $row['id_mapel'] ?>"><?= $row['nama_mapel'] ?></option>
                    <?php endwhile ?>
                </select>
            </div>
            <div class="coll-md-4">
                <label>Tanggal</label>
                <input type="date" name="tanggal" id="tanggal" class="form-control">
            </div>
            <div class="coll-md-4">
                <label>Status</label>
                <select class="form-control" name="status" id="status">
                    <option value="Hadir">Hadir</option>
                    <option value="Izin">Izin</option>
                    <option value="Sakit">Sakit</option>
                    <option value="Alpa">Alpa</option>
                </select>
            </div>
        </div>
        <div class="row mt-5">
            <button type="submit" class="btn btn-success">Simpan</button>
        </div>
    </form>
</div>




<?php include 'includes/footer.php'; ?>