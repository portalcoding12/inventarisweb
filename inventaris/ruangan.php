<?php
include 'include/session.php';
if ($isadmin) {

	$selectRuangan = $konfigurasi->selectRuangan();
if (isset($_POST['yes'])) {
	$nama_ruang = $konfigurasi->con->real_escape_string($_POST['nama_ruang']);
	$kode_ruang = $konfigurasi->con->real_escape_string($_POST['kode_ruang']);
	$keterangan_ruang = $konfigurasi->con->real_escape_string($_POST['keterangan_ruang']);
	$insert = $konfigurasi->insertRuangan($nama_ruang,$kode_ruang,$keterangan_ruang);
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
				  <i class="fa fa-plus"></i> Tambah Ruang
				</button>
				<button type="button" id="" class="btn btn-primary" onclick="printRuangan()">
				  <i class="fa fa-print"></i> Cetak Data Ruang
				</button>
			</div>

			<div class="panel panel-success" id="formInput" style="display:none;">
			  <div class="panel-heading">
			    <h3 class="panel-title">Tambahkan Ruangan</h3>
			  </div>
			  <div class="panel-body">
			    <form class="" action="" method="post">
			    	<div class="form-group">
			    	  <label for="">Nama Ruangan :</label>
			    	  <input type="text" class="form-control" id="" name="nama_ruang" placeholder="Nama Ruangan *">
			    	</div>
						<div class="form-group">
						  <label for="">Kode Ruangan :</label>
						  <input type="text" class="form-control" id="" name="kode_ruang" placeholder="Kode Ruangan">
						  <p class="help-block"><i>Kode terdiri dari huruf dan angka. Contoh : A001</i></p>
						</div>
						<div class="form-group">
						  <label for="">Keterangan :</label>
						  <textarea rows="8" class="form-control" id="" name="keterangan_ruang" placeholder="Keterangan"></textarea>
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
				if ($selectRuangan == null) {
					echo "<hr><h2 class='text-center'>Tidak ada data</h2><hr>";
				} else { ?>
					<table class="table">
						<th>Nomor</th>
					  <th>Ruangan</th>
						<th>Kode Ruang</th>
						<th>Keterangan</th>
						<?php if ($isadmin): ?>
							<th>Opsi</th>
						<?php endif; ?>
				<?php foreach ($selectRuangan as $data): ?>

				<tr>
					<td><?php echo $nomor++; ?></td>
					<td><?php echo $data['nama_ruang']; ?></td>
					<td><?php echo $data['kode_ruang']; ?></td>
					<td><?php echo $data['keterangan_ruang']; ?></td>
					<?php if ($isadmin): ?>
						<td>
							<a href="detail/detail-ruang.php?rowid=<?php echo $data['id_ruang'] ?>"><i class="fa fa-eye"></i></a> |
							<a href="javascript:hapusData('<?php echo $data['id_ruang']; ?>')"><i class="fa fa-trash"></i></a>
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
        window.location.href = 'hapus/hapus-ruangan.php?id=' + id;
      }
    }

		function printRuangan() {
			window.open('cetak/cetak-ruangan.php','_blank');
		}
</script>
<?php } else {
	echo "<h2>Maaf, anda tidak memiliki akses di halaman ini.</h2>";
	echo "<br>";
	echo "Silahkan kembali ke beranda. <a href='/inventaris/index.php'>Kembali</a>";
 } ?>
