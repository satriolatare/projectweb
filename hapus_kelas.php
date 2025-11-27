<?php 
include 'config/koneksi.php';

if(isset($_GET['id'])){
	$id = $_GET['id'];
	$sql = "DELETE FROM kelas WHERE id=$id";

	if ($conn->query($sql) === true){
		header ("Location:kelas.php?success=1");
	}else{
		header ("Location:kelas.php?success=0");
	}
}else{
		header ("Location:kelas.php");
}

?>
