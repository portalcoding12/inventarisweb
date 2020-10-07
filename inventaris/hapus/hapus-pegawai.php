<?php
include '../config/function.php';
$konfigurasi = new Konfigurasi();
$id = $_GET['id'];

$hapus = $konfigurasi->hapusPegawai($id);

if ($hapus) {
	echo "<script type='text/javascript'>
					alert('Data berhasil dihapus.');
					window.location='../pegawai.php';
				</script>";
	// echo "<meta http-equiv='refresh' content='0'>";
}
