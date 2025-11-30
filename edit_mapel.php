<?php include 'includes/header.php'; ?>
<?php
$id_mapel = $_GET['id'];
if (isset($id_mapel)) {
    $sql = "SELECT * FROM mapel WHERE id_mapel='$id_mapel'";
    $result = $conn->query($sql);

    if ($result->num_rows == 0) {
        echo "data tidak ditemukan";
        include 'includes/footer.php';
        exit;
    }
    $nilai = $result->fetch_assoc();
}
if ($_POST) {
    
    $nama_mapel = $_POST["nama_mapel"];

    $sql = "UPDATE mapel SET nama_mapel='$nama_mapel' WHERE id_mapel=$id_mapel";

    if ($conn->query($sql) === true) {
        header("location: mapel.php? success=1");
    } else {
        header("location: mapel.php? success=0");
    }
}


?>
<div class="container">
    <form action="" method="POST">
        <div class="row">

				<div class="col-md-4">
					<label>Mata Pelajaran</label>
					<input type="text" name="nama_mapel" id="mapel" class="form-control" value="<?= $nilai['nama_mapel'] ?>">
				</div>

        <div class="row mt-5">
            <button type="sumbit" class="btn btn-success">Simpan</button>
        </div>
    </form>
</div>




<?php include 'includes/footer.php'; ?>