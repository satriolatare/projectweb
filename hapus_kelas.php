<?php
include 'config/koneksi.php';

$id_kelas = filter_input(INPUT_GET, 'id_kelas', FILTER_VALIDATE_INT);

if ($id_kelas === null || $id_kelas === false) {
	// id_kelas tidak valid atau tidak diberikan
	header('Location: kelas.php?success=0');
	exit;
}

$stmt = $conn->prepare('DELETE FROM kelas WHERE id_kelas = ?');
if (!$stmt) {
	header('Location: kelas.php?success=0');
	exit;
}

$stmt->bind_param('i', $id_kelas);
if (!$stmt->execute()) {
	$stmt->close();
	header('Location: kelas.php?success=0');
	exit;
}

if ($stmt->affected_rows > 0) {
	header('Location: kelas.php?success=1');
} else {
	// Query berhasil tetapi tidak ada baris yang dihapus
	header('Location: kelas.php?success=0');
}

$stmt->close();
$conn->close();
exit;

?>
