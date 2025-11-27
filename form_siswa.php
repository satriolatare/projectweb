<?php include 'includes/header.php'; ?>


<div class="container">
    <form action="simpan_siswa.php" method="POST">

        <div class="col-md-4">
            <label>NAMA</label>
            <input type="text" name="nama_siswa" id="nama_siswa" class="form-control">
        </div>
        <div class="col-md-4">
            <label>NISN</label>
            <input type="text" name="nisn" id="nisn" class="form-control">
        </div>
        <div class="row mt-5">
            <button type="sumbit" class="btn btn-success">Simpan</button>
        </div>
    </form>
</div>




<?php include 'includes/footer.php'; ?>