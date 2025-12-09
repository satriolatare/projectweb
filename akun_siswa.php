<?php
include 'includes/header.php';

if ($_SESSION['role'] != 'admin') {
    header("Location: dashboard_siswa.php");
    exit;
}

$sql_akun = "SELECT siswa.id_siswa, siswa.nama_siswa, user.email FROM siswa INNER JOIN user ON user.id_siswa = siswa.id_siswa WHERE user.role = 'siswa'ORDER BY siswa.nama_siswa ASC";
$result_akun = $conn->query($sql_akun);
?>

<div class="container mt-4">
    <h1 class="judul-title">Daftar Akun Login Siswa</h1>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-secondary">
                <tr>
                    <th>No</th>
                    <th>Nama Siswa</th>
                    <th>Email</th>
                    <th>Info Password Default</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result_akun && $result_akun->num_rows > 0) {
                    $no = 1;
                    while ($row = $result_akun->fetch_assoc()) {
                        $nama_siswa = $row['nama_siswa'];
                        $nama_bersih = trim($nama_siswa);
                        $kata = explode(' ', $nama_bersih);
                        $password_default = strtolower($kata[0]);
                        ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= htmlspecialchars($nama_siswa); ?></td>
                            <td><?= htmlspecialchars($row['email']); ?></td>
                            <td>
                                Password default: <b><?= htmlspecialchars($password_default); ?></b><br>
                                <small class="text-muted">(nama siswa huruf kecil tanpa spasi)</small>
                            </td>
                        </tr>
                        <?php
                    }
                } else {
                    ?>
                    <tr>
                        <td colspan="4" class="text-center">Belum ada data akun siswa.</td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php include 'includes/footer.php'; ?>