<?php
include 'config/function.php';
$konfigurasi = new konfigurasi();
$login = new Login();
session_start();
$isadmin = false;
$isoperator = false;
$ispeminjam = false;
$nomor = 1;
if (!isset($_SESSION['login'])) {
  $_SESSION['error'] = 'Anda harus login terlebih dahulu!';
  header("location:/inventaris/login.php");
}
if ($_SESSION['level'] == "administrator") {
	$isadmin = true;
} else if ($_SESSION['level'] == "operator") {
  $isoperator = true;
} else if ($_SESSION['level'] == "peminjam") {
  $ispeminjam = true;
}
$ids = $_SESSION['id_petugas'];
$profil = $konfigurasi->profie($ids);
?>
