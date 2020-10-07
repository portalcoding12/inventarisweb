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
			$selectInventaris = $konfigurasi->selectInventaris();
			if ($selectInventaris == null) {
				echo "<hr><h2 class='text-center'>Tidak ada data</h2><hr>";
			} else { ?>
				<div class="row text-center">
					<h1>REKAP LAPORAN DATA RUANGAN</h1>
					<h3>TAHUN <?php echo date('Y'); ?></h3>
					<h3>SMK NEGERI 1 LAHAT</h3>
					<hr>
				</div>
				<table class="table">
					<th>Nomor</th>
					<th>Nama</th>
					<th>Kondisi</th>
					<th>Keterangan</th>
					<th>Jumlah</th>
					<th>Jenis</th>
					<th>Tanggal Daftar</th>
					<th>Ruang</th>
					<th>Kode Inventaris</th>
					<th>Petugas</th>
			<?php foreach ($selectInventaris as $data): ?>

			<tr>
				<td class="text-center"><?php echo $nomor++; ?></td>
				<td><?php echo $data['nama']; ?></td>
				<td><?php echo $data['kondisi']; ?></td>
				<td><?php echo $data['keterangan_inventaris']; ?></td>
				<td><?php echo $data['jumlah']; ?></td>
				<td><?php echo $data['nama_jenis']; ?></td>
				<td><?php echo $data['tanggal_register']; ?></td>
				<td><?php echo $data['nama_ruang']; ?></td>
				<td><?php echo $data['kode_inventaris']; ?></td>
				<td><?php echo $data['nama_petugas']; ?></td>
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
