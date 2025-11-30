<?php include 'includes/header.php'; ?>

<?php
$result = $conn->query("SELECT * FROM kelas");
?>

<div class="mt-4">

    <table class="table table-bordered">
        <tr class="table-secondary text-center">
            <th>Kelas</th>
            <th>Action</th>
        </tr>
        <?php if ($result && $result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr align="center">
                    <td><?= $row['nama_kelas'] ?></td>
                    <td><a href="edit_kelas.php?id=<?= $row['id_kelas'] ?>" class="btn btn-warning"> <i
                                class="bi bi-pencil-square"></i></a>
                        <a href="hapus_kelas.php?id=<?= $row['id_kelas'] ?>" class="btn btn-danger"
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