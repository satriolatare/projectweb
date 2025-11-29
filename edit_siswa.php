<?php include 'includes/header.php'; ?>
<?php
$id_siswa = $_GET['id'];



if (isset($id_siswa)) {
    $sql = "SELECT * FROM siswa WHERE id_siswa='$id_siswa'";
    $result = $conn->query($sql);

    if ($result->num_rows == 0) {
        echo "data tidak ditemukan";
        include 'includes/footer.php';
        exit;
    }
    $nilai = $result->fetch_assoc();
}
if ($_POST) {

    $nama_siswa = $_POST["nama_siswa"];
    $nisn = $_POST["nisn"];
    

    $sql = "UPDATE siswa SET nama_siswa='$nama_siswa', nisn=$nisn WHERE id_siswa=$id_siswa";

    if ($conn->query($sql) === true) {
        header("location: siswa.php? success=1");
    } else {
        header("location: siswa.php? success=0");
    }
}


?>
<div class="container">
    <form action="" method="POST">
        <div class="row">

            <div class="col-md-4">
                <label>NAMA</label>
                <input type="text" name="nama_siswa" id="id_siswa" class="form-control"
                    value="<?= $nilai['nama_siswa'] ?>">
            </div>

            <div class="col-md-4">
                <label>NISN</label>
                <input type="text" name="nisn" id="nisn" class="form-control" value="<?= $nilai['nisn'] ?>">
            </div>
        

    
        </div>


        <div class="row mt-5">
            <button type="sumbit" class="btn btn-success">Simpan</button>
        </div>
    </form>
</div>




<?php include 'includes/footer.php'; ?>