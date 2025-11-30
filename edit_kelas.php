<?php include 'includes/header.php'; ?>
<?php
$id_kelas = $_GET['id'];
if (isset($id_kelas)) {
    $sql = "SELECT * FROM kelas WHERE id_kelas='$id_kelas'";
    $result = $conn->query($sql);

    if ($result->num_rows == 0) {
        echo "data tidak ditemukan";
        include 'includes/footer.php';
        exit;
    }
    $nilai = $result->fetch_assoc();
}
if ($_POST) {
    
    $nama_kelas = $_POST["nama_kelas"];

    $sql = "UPDATE kelas SET nama_kelas='$nama_kelas' WHERE id_kelas=$id_kelas";

    if ($conn->query($sql) === true) {
        header("location: kelas.php? success=1");
    } else {
        header("location: kelas.php? success=0");
    }
}


?>
<div class="container">
    <form action="" method="POST">
        <div class="row">

				<div class="col-md-4">
					<label>Kelas</label>
					<input type="text" name="nama_kelas" id="kelas" class="form-control" value="<?= $nilai['nama_kelas'] ?>">
				</div>

        <div class="row mt-5">
            <button type="sumbit" class="btn btn-success">Simpan</button>
        </div>
    </form>
</div>




<?php include 'includes/footer.php'; ?>