<?php
include 'include/session.php';
$selectPegawai = $konfigurasi->selectPegawai();
$selectPeminjaman = $konfigurasi->selectPeminjaman();
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
						window.location='index.php';
					</script>";
		// echo "<meta http-equiv='refresh' content='0'>";
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

			<div class="panel panel-success" id="formInput">
			  <div class="panel-heading">
			    <h3 class="panel-title">Tambahkan pengembalian</h3>
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
						  <input type="date" class="form-control" name="tanggal_pinjam" value="<?php echo date('Y-m-d'); ?>" readonly>
						</div>
						<div class="form-group">
						  <label for="">Tanggal Kembali :</label>
						  <input type="date" class="form-control" name="tanggal_kembali" >
						</div>
						<div class="form-group">
						  <label for="">Banyak Pinjam:</label>
						  <input type="number" class="form-control" name="banyak_pinjam" placeholder="Bayak Barang yang dipinjam *">
						</div>
						<div class="form-group">
						  <label for="">Nama Petugas :</label>
						  <input type="text" class="form-control" name="nama_petugas" value="<?php echo $_SESSION['nama_petugas']; ?>" readonly>
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
			window.open('cetak/cetak-pengembalian.php','_blank');
		}
</script>
