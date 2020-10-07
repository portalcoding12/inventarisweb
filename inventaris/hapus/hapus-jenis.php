<?php
include '../config/function.php';
$konfigurasi = new Konfigurasi();
$id = $_GET['id'];

$hapus = $konfigurasi->hapusJenis($id);

if ($hapus) {
	echo "<script type='text/javascript'>
					alert('Data berhasil dihapus.');
					window.location='../barang.php';
				</script>";
	// echo "<meta http-equiv='refresh' content='0'>";
}
