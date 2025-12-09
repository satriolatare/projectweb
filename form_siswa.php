<?php include 'includes/header.php'; ?>
<?php
$kelas = $conn->query("SELECT * FROM kelas");
?>

<div class="container">
    <form action="simpan_siswa.php" method="POST">
        <div class="row">

            <div class="col-md-4">
                <label>Nama</label>
                <input type="text" name="nama_siswa" id="nama_siswa" class="form-control">
            </div>
            <div class="col-md-4">
                <label>NISN</label>
                <input type="text" name="nisn" id="nisn" class="form-control">
            </div>
            <div class="col-md-4">
                <label>KELAS</label>
                <select class="form-control" name="id_kelas" id="id_kelas"  required>
                    <option value="">-- Pilih Kelas --</option>
                    <?php while ($row = $kelas->fetch_assoc()): ?>
                        <option value="<?= $row['id_kelas'] ?>"><?= $row['nama_kelas'] ?></option>
                    <?php endwhile ?>
                </select>
            </div>
        </div>
        <div class="row mt-5">
            <button type="submit" class="btn btn-success">Simpan</button>
        </div>
    </form>
</div>




<?php include 'includes/footer.php'; ?>