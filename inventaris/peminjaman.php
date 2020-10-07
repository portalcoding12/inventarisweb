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
				<button type="button" id="btnPlus" class="btn btn-default">
				  <i class="fa fa-plus"></i> Tambah Peminjaman
				</button>
				<button type="button" id="" class="btn btn-primary" onclick="printPeminjaman()">
				  <i class="fa fa-print"></i> Cetak Data Peminjaman
				</button>
			</div>

			<div class="panel panel-success" id="formInput" style="display:none;">
			  <div class="panel-heading">
			    <h3 class="panel-title">Tambahkan Peminjaman</h3>
			  </div>
			  <div class="panel-body">
					<form class="" action="" method="post">
			    	<div class="form-group">
			    	  <label for="">Nama peminjam :</label>
			    	  	<select class="form-control" name="nama_peminjam">
									<?php foreach ($selectPegawai as $key): ?>
										<option value="<?php echo $key['id_pegawai']; ?>"><?php echo $key['nama_pegawai']; ?></option>
									<?php endforeach; ?>
			    	  	</select>
			    	</div>
						<div class="form-group">
						  <label for="">Nama Inventaris :</label>
							<select class="form-control" name="nama_inventaris">
								<?php foreach ($selectInventaris as $key): ?>
									<option value="<?php echo $key['id_inventaris']; ?>"><?php echo $key['nama']; ?></option>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="form-group">
						  <label for="">Tanggal Pinjam :</label>
						  <input type="date" class="form-control" id="" name="tanggal_pinjam" value="<?php echo date('Y-m-d'); ?>" readonly>
						</div>
						<div class="form-group">
						  <label for="">Tanggal Kembali :</label>
						  <input type="date" class="form-control" id="" name="tanggal_kembali" >
						</div>
						<div class="form-group">
						  <label for="">Banyak Pinjam:</label>
						  <input type="number" class="form-control" id="" name="banyak_pinjam" placeholder="Bayak Barang yang dipinjam *">
						</div>
						<div class="form-group">
						  <label for="">Nama Petugas :</label>
						  <input type="text" class="form-control" id="" name="nama_petugas" value="<?php echo $_SESSION['nama_petugas']; ?>" readonly>
						</div>

			  </div>
				<div class="panel-footer">
						<div class="text-right">
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#konfirm">
							  <i class="fa fa-check"></i> Simpan
							</button>
							<button type="button" class="btn btn-danger" id="btnBatal">
							  <i class="fa fa-close"></i> Batal
							</button>
						</div>
			  </div>
				<?php include 'include/confirm-data.php'; ?>
				</form>
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
						<?php if ($isadmin): ?>
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
					<?php if ($isadmin): ?>
						<td>
							<a href="detail/detail-peminjaman.php?rowid=<?php echo $data['id_detail_pinjam'] ?>"><i class="fa fa-eye"></i></a> |
							<a href="javascript:hapusData('<?php echo $data['id_detail_pinjam']; ?>')"><i class="fa fa-trash"></i></a>
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
    function hapusData(id){
      if (confirm("Apakah anda yakin akan menghapus data ini?")){
        window.location.href = 'hapus/hapus-peminjaman.php?id=' + id;
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
