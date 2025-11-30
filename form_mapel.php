<?php include 'includes/header.php'; ?>


<div class="container">
    <form action="simpan_mapel.php" method="POST">

        <div class="col-md-4">
				<label>Mata Pelajaran</label>
				<input type="text" name="nama_mapel" id="mapel" class="form-control">
			</div>

        <div class="row mt-5">
            <button type="sumbit" class="btn btn-success">Simpan</button>
        </div>
    </form>
</div>




<?php include 'includes/footer.php'; ?>