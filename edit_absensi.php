<?php include 'includes/header.php'; ?>

<?php
$id_absensi = $_GET['id'];

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

// ❗ PERBAIKAN PENTING: ambil siswa sesuai kelas
$siswa = $conn->query("SELECT * FROM siswa WHERE id_kelas
= '{$nilai['id_kelas']}'");

$mapel = $conn->query("SELECT * FROM mapel");

if ($_POST) {

    $id_siswa = $_POST["id_siswa"];
    $id_mapel = $_POST["id_mapel"];
    $tanggal  = $_POST["tanggal"];
    $status   = $_POST["status"];

    // Ambil kelas dari siswa
    $q    = $conn->query("SELECT id_kelas FROM siswa WHERE id_siswa = '$id_siswa'");
    $data = $q->fetch_assoc();
    $id_kelas = $data["id_kelas"];
    
    $sql_update = "
        UPDATE absen SET 
            id_siswa = '$id_siswa',
            id_kelas = '$id_kelas',
            id_mapel = '$id_mapel',
            tanggal  = '$tanggal',
            status   = '$status'
        WHERE id_absensi = '$id_absensi'
    ";

    if ($conn->query($sql_update) === true) {
        header("Location: absensi.php?id_kelas=".$id_kelas."&success=1");
        exit;
    } else {
        header("Location: absensi.php?id_kelas=".$id_kelas."&success=0");
        exit;
    }
}
?>

<div class="container">
    <form action="" method="POST">
        <div class="row">

            <div class="col-md-4">
                <label>Nama Siswa</label>
                <select class="form-control" name="id_siswa" id="id_siswa" required>
                    <option value="">-- Pilih Siswa --</option>
                    <?php while ($row = $siswa->fetch_assoc()) : ?>
                        <option 
                            value="<?= $row['id_siswa']; ?>"
                            <?= ($row['id_siswa'] == $nilai['id_siswa']) ? 'selected' : ''; ?>>
                            <?= $row['nama_siswa']; ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>

            <div class="col-md-4">
                <label>Mata Pelajaran</label>
                <select class="form-control" name="id_mapel" id="id_mapel" required>
                    <?php while ($row = $mapel->fetch_assoc()) : ?>
                        <option 
                            value="<?= $row['id_mapel']; ?>"
                            <?= ($row['id_mapel'] == $nilai['id_mapel']) ? 'selected' : ''; ?>>
                            <?= $row['nama_mapel']; ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>

            <div class="col-md-4">
                <label>Tanggal</label>
                <input 
                    type="date" 
                    name="tanggal" 
                    id="tanggal" 
                    class="form-control" 
                    value="<?= $nilai['tanggal']; ?>" 
                    required>
            </div>

            <div class="col-md-4 mt-3">
                <label>Status</label>
                <select class="form-control" name="status" id="status" required>
                    <option value="Hadir" <?= ($nilai['status'] == 'Hadir') ? 'selected' : ''; ?>>Hadir</option>
                    <option value="Izin"  <?= ($nilai['status'] == 'Izin')  ? 'selected' : ''; ?>>Izin</option>
                    <option value="Sakit" <?= ($nilai['status'] == 'Sakit') ? 'selected' : ''; ?>>Sakit</option>
                    <option value="Alpa"  <?= ($nilai['status'] == 'Alpa')  ? 'selected' : ''; ?>>Alpa</option>
                </select>
            </div>

        </div>

        <div class="row mt-5">
            <button type="submit" class="btn btn-success">Simpan</button>
        </div>
    </form>
</div>

<?php include 'includes/footer.php'; ?>
