<?php include 'includes/header.php'; ?>
<?php
$id_absensi = $_GET['id'];
$kelas = $conn->query("SELECT * FROM kelas");
$siswa = $conn->query("SELECT * FROM siswa");
$mapel = $conn->query("SELECT * FROM mapel");

if (isset($id_absensi)) {
    $sql = "SELECT * FROM absen WHERE id_absensi='$id_absensi'";
    $result = $conn->query($sql);

    if ($result->num_rows == 0) {
        echo "data tidak ditemukan";
        include 'includes/footer.php';
        exit;
    }
    $nilai = $result->fetch_assoc();
}
if ($_POST) {
    $id_siswa = $_POST["id_siswa"];
    $id_mapel = $_POST["id_mapel"];
    $id_kelas = $_POST["id_kelas"];
    $tanggal = $_POST["tanggal"];
    $status = $_POST["status"];

    $sql = "UPDATE absen SET id_siswa='$id_siswa', id_kelas='$id_kelas', id_mapel='$id_mapel', tanggal='$tanggal', status='$status' WHERE id_absensi=$id_absensi";

    if ($conn->query($sql) === true) {
        header("location:absensi.php? success=1");
    } else {
        header("location:absensi.php? success=0");
    }
}
?>
<div class="container">
    <form action="" method="POST">
        <div class="row">

            <div class="col-md-4">
                <label>Nama Siswa</label>
                <select class="form-control" name="id_siswa" id="id_siswa">
                    <?php while ($row = $siswa->fetch_assoc()): ?>
                        <option value="<?= $row['id_siswa'] ?>" <?= ($row['id_siswa'] == $nilai['id_siswa']) ? 'selected' : '' ?>><?= $row['nama_siswa'] ?></option>
                    <?php endwhile ?>
                </select>
            </div>

            <div class="col-md-4">
                <label>KELAS</label>
                <select class="form-control" name="id_kelas" id="id_kelas">
                    <?php while ($row = $kelas->fetch_assoc()): ?>
                        <option value="<?= $row['id_kelas'] ?>" <?= ($row['id_kelas'] == $nilai['id_kelas']) ? 'selected' : '' ?>><?= $row['nama_kelas'] ?></option>
                    <?php endwhile ?>
                </select>
            </div>

            <div class="col-md-4">
                <label>Mata Pelajaran</label>
                <select class="form-control" name="id_mapel" id="id_mapel">
                    <?php while ($row = $mapel->fetch_assoc()): ?>
                        <option value="<?= $row['id_mapel'] ?>" <?= ($row['id_mapel'] == $nilai['id_mapel']) ? 'selected' : '' ?>><?= $row['nama_mapel'] ?></option>
                    <?php endwhile ?>
                </select>
            </div>
            <div class="col-md-4">
                <label>Tanggal</label>
                <input type="date" name="tanggal" id="tanggal" class="form-control" value="<?= $nilai['tanggal'] ?>">
            </div>
            <div class="col-md-4">
                <label>Status</label>
                <select class="form-control" name="status" id="status">
                    <option value="Hadir" <?= ($nilai['status'] == 'Hadir') ? 'selected' : '' ?>>Hadir</option>
                    <option value="Izin" <?= ($nilai['status'] == 'Izin') ? 'selected' : '' ?>>Izin</option>
                    <option value="Sakit" <?= ($nilai['status'] == 'Sakit') ? 'selected' : '' ?>>Sakit</option>
                    <option value="Alpa" <?= ($nilai['status'] == 'Alpa') ? 'selected' : '' ?>>Alpa</option>
                </select>
            </div>

        </div>
        <div class="row mt-5">
            <button type="submit" class="btn btn-success">Simpan</button>
        </div>
    </form>
</div>

<?php include 'includes/footer.php'; ?>