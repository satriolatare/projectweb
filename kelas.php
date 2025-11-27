<?php include 'includes/header.php'; ?>

<?php
$result = $conn->query("SELECT * FROM kelas");
?>



<br>
<h1 align="center" style="background-color: grey;  border-radius: 20px; ">Kelas</h1>
<br>



<table class="table">
    <tr align="center">
        <td>Kelas</td>
        <td>Action</td>


    </tr>
    <?php if ($result && $result->num_rows > 0): ?>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr align="center">
                <td>
                    <?= $row['nama_kelas'] ?></a>
                </td>
                <td><a href="edit.php?id=<?= $row['id_kelas'] ?>" class="btn btn-warning">Edit</a>
                    <a href="hapus.php?id=<?= $row['id_kelas'] ?>" class="btn btn-danger"
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
    <a class="btn btn-primary" href="form_kelas.php">tambah data</a>
</div>

<?php include 'includes/footer.php' ?>