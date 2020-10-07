<?php
include '../config/function.php';
$konfigurasi = new Konfigurasi();
$id = $_GET['id'];

$hapus = $konfigurasi->verifPengembalian($id);

if ($hapus) {
	echo "<script type='text/javascript'>
					alert('Barang berhasil dikembalikan.');
					window.location='../pengembalian.php';
				</script>";
	// echo "<meta http-equiv='refresh' content='0'>";
}
