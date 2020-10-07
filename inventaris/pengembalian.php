<?php
include 'include/session.php';
if ($isadmin||$isoperator) {

$selectPeminjaman = $konfigurasi->selectPeminjaman();
$selectPegawai = $konfigurasi->selectPegawai();
$selectInventaris = $konfigurasi->selectInventaris();

if (isset($_POST['yes'])) {

	$nama_petugas = $_SESSION['id_petugas'];
	$nama_inventaris = $konfigurasi->con->real_escape_string($_POST['nama_inventaris']);
	$tanggal_pinjam = $konfigurasi->con->real_escape_string($_POST['tanggal_pinjam']);
	$tanggal_kembali = $konfigurasi->con->real_escape_string($_POST['tanggal_kembali']);
	$nama_peminjam = $konfigurasi->con->real_escape_string($_POST['nama_peminjam']);
	$banyak_pinjam = $konfigurasi->con->real_escape_string($_POST['banyak_pinjam']);

	$insert = $konfigurasi->insertPeminjaman($nama_petugas,$tanggal_pinjam,$tanggal_kembali,$nama_peminjam,$nama_inventaris,$banyak_pinjam);
	if ($insert) {
		echo "<script type='text/javascript'>
						alert('Data tersimpan ke database.');
					</script>";
		echo "<meta http-equiv='refresh' content='0'>";
	} else {
		echo "<script type='text/javascript'>
						alert('Data tidak tersimpan ke database.');
					</script>";
		echo "<meta http-equiv='refresh' content='0'>";
	}
}


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<?php include 'include/meta.php'; ?>

  </head>
  <body onload="userFormDisabled()">
		<?php include 'include/menu.php' ?>
		<div class="container">
		  <?php include 'include/heading.php'; ?>

			<div class="form-group">
				<button type="button" id="" class="btn btn-primary" onclick="printPeminjaman()">
				  <i class="fa fa-print"></i> Cetak Data Peminjaman
				</button>
			</div>

				<?php
				if ($selectPeminjaman == null) {
					echo "<hr><h2 class='text-center'>Tidak ada data</h2><hr>";
				} else { ?>
					<table class="table">
						<th>Nomor</th>
					  <th>Nama Peminjam</th>
						<th>Nama Inventaris</th>
						<th>Tanggal Pinjam</th>
						<th>Tanggal Kembali</th>
						<th>Banyak Pinjam</th>
						<th>Nama Petugas</th>
						<th>Status Peminjam</th>
						<?php if ($isadmin||$isoperator): ?>
							<th>Opsi</th>
						<?php endif; ?>
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
					<?php if ($isadmin||$isoperator): ?>
						<td>
							<?php if ($data['status_peminjaman'] == 'belum dikembalikan'){ ?>
								<a class="btn btn-primary" href="javascript:verifPengembalian('<?php echo $data['id_peminjaman']; ?>')"> Vertifikasi pengembalian</a>
							<?php } else { ?>
								<button type="button" class="btn btn-success" disabled>
								  <i class="fa fa-check"></i> Telah dikembalikan
								</button>
						<?php	} ?>
						</td>
					<?php endif; ?>
				</tr>
			<?php endforeach; ?>
			</table>
		<?php } ?>
		</div>

		<!-- Footer -->
    <?php include 'include/footer.php'; ?>
		<?php include 'include/profile.php'; ?>
		<!--- modal confirm -->
		<?php include 'include/confirm-logout.php'; ?>
	</body>
</html>
<script language="JavaScript" type="text/javascript">

		function verifPengembalian(idss){
      if (confirm("Yakin ingin kembalikan barang ?")){
        window.location.href = 'detail/verif-pengembalian.php?id=' + idss;
      }
    }

		function printPeminjaman() {
			window.open('cetak/cetak-peminjaman.php','_blank');
		}
</script>
<?php } else {
	echo "<h2>Maaf, anda tidak memiliki akses di halaman ini.</h2>";
	echo "<br>";
	echo "Silahkan kembali ke beranda. <a href='/inventaris/index.php'>Kembali</a>";
 } ?>
