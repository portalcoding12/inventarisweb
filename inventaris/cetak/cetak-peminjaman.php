<?php
session_start();
include '../config/function.php';
$konfigurasi = new Konfigurasi();
$login = new Login();
$isadmin = false;
$nomor = 1;
if (!isset($_SESSION['login'])) {
  $_SESSION['error'] = 'Anda harus login terlebih dahulu!';
  header("location:/inventaris/login.php");
}
if ($_SESSION['level'] == "administrator") {
	$isadmin = true;
}
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<?php include '../include/meta.php'; ?>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
		<div class="container">

			<?php
			if ($isadmin) {
				$selectPeminjaman = $konfigurasi->selectPeminjaman();
			if ($selectPeminjaman == null) {
				echo "<hr><h2 class='text-center'>Tidak ada data</h2><hr>";
			} else { ?>
				<div class="row text-center">
					<h1>REKAP LAPORAN DATA PEMINJAMAN</h1>
					<h3>TAHUN <?php echo date('Y'); ?></h3>
					<h3>SMK NEGERI 1 LAHAT</h3>
					<hr>
				</div>
				<table class="table">
					<th>Nomor</th>
					<th>Nama Peminjam</th>
					<th>Nama Inventaris</th>
					<th>Tanggal Pinjam</th>
					<th>Tanggal Kembali</th>
					<th>Banyak Pinjam</th>
					<th>Nama Petugas</th>
					<th>Status Peminjam</th>

			<?php foreach ($selectPeminjaman as $data): ?>
			<tr>
				<td><?php echo $nomor++; ?></td>
				<td><?php echo $data['nama_pegawai']; ?></td>
				<td><?php echo $data['nama']; ?></td>
				<td><?php echo $data['tanggal_pinjam']; ?></td>
				<td><?php echo $data['tanggal_kembali']; ?></td>
				<td><?php echo $data['jumlah_pinjam']; ?></td>
				<td><?php echo $data['nama_petugas']; ?></td>
				<td><?php echo $data['status_peminjaman'] ?></td>
			</tr>
			<?php endforeach; ?>
			</table>
			<script type="text/javascript">
				window.print();
			</script>
			<?php } } else {
				echo "<h2>Maaf, anda tidak memiliki akses di halaman ini.</h2>";
				echo "<br>";
				echo "Silahkan kembali ke beranda. <a href='/inventaris/index.php'>Kembali</a>";
			} ?>
		</div>
</body>
</html>
