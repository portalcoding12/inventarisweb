<?php
include 'include/session.php';
if ($isadmin) {

$selectPegawai = $konfigurasi->selectPegawai();
$selectLevel = $konfigurasi->selectLevel();

if (isset($_POST['yes'])) {
	$nama_pegawai = $konfigurasi->con->real_escape_string($_POST['nama_pegawai']);
	$nip_pegawai = $konfigurasi->con->real_escape_string($_POST['nip_pegawai']);
	$alamat_pegawai = $konfigurasi->con->real_escape_string($_POST['alamat_pegawai']);
	$insert = $konfigurasi->insertPegawai($nama_pegawai,$nip_pegawai,$alamat_pegawai);
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
				  <i class="fa fa-plus"></i> Tambah Pegawai
				</button>
				<button type="button" id="" class="btn btn-primary" onclick="printPegawai()">
				  <i class="fa fa-print"></i> Cetak Data Pegawai
				</button>
			</div>

			<div class="panel panel-success" id="formInput" style="display:none;">
			  <div class="panel-heading">
			    <h3 class="panel-title">Tambahkan Pegawai</h3>
			  </div>
			  <div class="panel-body">
			    <form class="" action="" method="post">
			    	<div class="form-group">
			    	  <label for="">Nama Pegawai :</label>
			    	  <input type="text" class="form-control" id="" name="nama_pegawai" placeholder="Nama Pegawai *">
			    	</div>
						<div class="form-group">
						  <label for="">Nip :</label>
						  <input type="number" class="form-control" id="" name="nip_pegawai" placeholder="Nip Pegawai *">
							<p class="help-block"><i>Nip harus 16 digit angka.</i></p>
						</div>
						<div class="form-group">
						  <label for="">Alamat Pegawai :</label>
						  <textarea name="alamat_pegawai" id="alamat_pegawai" rows="4" class="form-control" placeholder="Alamat Pegawai *"></textarea>
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
				if ($selectPegawai == null) {
					echo "<hr><h2 class='text-center'>Tidak ada data</h2><hr>";
				} else { ?>
					<table class="table">
						<th>Nomor</th>
					  <th>Nama Pegawai</th>
						<th>Nip</th>
						<th>Alamat Pegawai</th>
						<?php if ($isadmin): ?>
							<th>Opsi</th>
						<?php endif; ?>
				<?php foreach ($selectPegawai as $data): ?>

				<tr>
					<td><?php echo $nomor++; ?></td>
					<td><?php echo $data['nama_pegawai']; ?></td>
					<td><?php echo $data['nip']; ?></td>
					<td><?php echo $data['alamat']; ?></td>
					<?php if ($isadmin): ?>
						<td>
							<a href="detail/detail-pegawai.php?rowid=<?php echo $data['id_pegawai'] ?>"><i class="fa fa-eye"></i></a> |
							<a href="javascript:hapusData('<?php echo $data['id_pegawai']; ?>')"><i class="fa fa-trash"></i></a>
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
        window.location.href = 'hapus/hapus-pegawai.php?id=' + id;
      }
    }
		function printPegawai() {
			window.open('cetak/cetak-pegawai.php','_blank');
		}
</script>
<?php } else {
	echo "<h2>Maaf, anda tidak memiliki akses di halaman ini.</h2>";
	echo "<br>";
	echo "Silahkan kembali ke beranda. <a href='/inventaris/index.php'>Kembali</a>";
 } ?>
