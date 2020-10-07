<?php
include 'include/session.php';
$selectJenis = $konfigurasi->selectJenis();

if (isset($_POST['yes'])) {
	$nama_jenis = $konfigurasi->con->real_escape_string($_POST['nama_jenis']);
	$kode_jenis = $konfigurasi->con->real_escape_string($_POST['kode_jenis']);
	$keterangan_jenis = $konfigurasi->con->real_escape_string($_POST['keterangan_jenis']);
	$insert = $konfigurasi->insertJenis($nama_jenis,$kode_jenis,$keterangan_jenis);
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
				  <i class="fa fa-plus"></i> Tambah Jenis
				</button>
			</div>

			<div class="panel panel-success" id="formInput" style="display:none;">
			  <div class="panel-heading">
			    <h3 class="panel-title">Tambahkan Jenis</h3>
			  </div>
			  <div class="panel-body">
			    <form class="" action="" method="post">
			    	<div class="form-group">
			    	  <label for="">Nama Jenis :</label>
			    	  <input type="text" class="form-control" id="" name="nama_jenis" placeholder="Nama Jenis *">
			    	</div>
						<div class="form-group">
						  <label for="">Kode Jenis :</label>
						  <input type="text" class="form-control" id="" name="kode_jenis" placeholder="Kode Jenis">
						  <p class="help-block"><i>Kode terdiri dari huruf dan angka. Contoh : A001</i></p>
						</div>
						<div class="form-group">
						  <label for="">Keterangan :</label>
						  <textarea rows="8" class="form-control" id="" name="keterangan_jenis" placeholder="Keterangan"></textarea>
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
				if ($selectJenis == null) {
					echo "<hr><h2 class='text-center'>Tidak ada data</h2><hr>";
				} else { ?>
					<table class="table">
						<th>Nomor</th>
					  <th>Jenis</th>
						<th>Kode Jenis</th>
						<th>Keterangan</th>
						<?php if ($isadmin): ?>
							<th>Opsi</th>
						<?php endif; ?>
				<?php foreach ($selectJenis as $data): ?>

				<tr>
					<td><?php echo $nomor++; ?></td>
					<td><?php echo $data['nama_jenis']; ?></td>
					<td><?php echo $data['kode_jenis']; ?></td>
					<td><?php echo $data['keterangan_jenis']; ?></td>
					<?php if ($isadmin): ?>
						<td>
							<a href="detail/detail-jenis.php?rowid=<?php echo $data['id_jenis'] ?>"><i class="fa fa-eye"></i></a> |
							<a href="javascript:hapusData('<?php echo $data['id_jenis']; ?>')"><i class="fa fa-trash"></i></a>
						</td>
					<?php endif; ?>
				</tr>
			<?php endforeach; } ?>
			</table>
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
        window.location.href = 'hapus/hapus-jenis.php?id=' + id;
      }
    }
</script>
