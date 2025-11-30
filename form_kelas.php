<?php include 'includes/header.php'; ?>


<div class="container">
    <form action="simpan_kelas.php" method="POST">

        <div class="col-md-4">
				<label>Kelas</label>
				<input type="text" name="nama_kelas" id="kelas" class="form-control">
			</div>

        <div class="row mt-5">
            <button type="sumbit" class="btn btn-success">Simpan</button>
        </div>
    </form>
</div>




<?php include 'includes/footer.php'; ?>