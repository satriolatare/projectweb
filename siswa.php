<?php include 'includes/header.php'; ?>

<?php
$result = $conn->query("SELECT * FROM siswa");
?>



<br>

<h1 align="center" style="background-color: grey;  border-radius: 20px; ">Data Siswa</h1>
<br>



<table class="table">
    <tr align="center" class="table-secondary">
        <td>Nama</td>
        <td>NISN</td>
        <td>Action</td>

    </tr>
    <?php if ($result && $result->num_rows > 0): ?>
        <?php while ($row = $result->fetch_assoc()): ?>

            <tr align="center">

                <td><?= $row['nama_siswa'] ?></td>
                <td><?= $row['nisn'] ?></td>
                
                <td>
                    <a href="edit_siswa.php?id=<?= $row['id_siswa'] ?>" class="btn btn-warning">Edit</a>
                    <a href="hapus_siswa.php?id=<?= $row['id_siswa'] ?>" class="btn btn-danger"
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
    <a class="btn btn-primary" href="form_siswa.php">tambah data</a>
</div>

<?php include 'includes/footer.php' ?>