<?php include 'includes/header.php'; ?>

<?php
$result = $conn->query("SELECT * FROM mapel");
?>



<br>
<h3>Selamat Datang </h3>
<h1 align="center" style="background-color: grey;  border-radius: 20px; ">Mata Pelajaran</h1>
<br>



<table class="table">
    <tr align="center">
        <td>Mata Pelajaran</td>
        <td>Action</td>
    </tr>
    <?php if ($result && $result->num_rows > 0): ?>
        <?php while ($row = $result->fetch_assoc()): ?>

            <tr align="center">
                <td><?= $row['nama_mapel'] ?></td>
                <td><a href="edit_mapel.php?id=<?= $row['id_mapel'] ?>" class="btn btn-warning">Edit</a>
                    <a href="hapus_mapel.php?id=<?= $row['id_mapel'] ?>" class="btn btn-danger"
                        onclick="return confirm('apakah anda yakin?')">Hapus</a>
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
    <a class="btn btn-primary" href="form_mapel.php">tambah data</a>
</div>

<?php include 'includes/footer.php' ?>