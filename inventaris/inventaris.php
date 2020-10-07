<?php
include 'include/session.php';
if ($isadmin) {
$selectRuangan = $konfigurasi->selectRuangan();
$selectJenis = $konfigurasi->selectJenis();
$selectInventaris = $konfigurasi->selectInventaris();

if (isset($_POST['yes'])) {
	$nama_inventaris = $konfigurasi->con->real_escape_string($_POST['nama_inventaris']);
	$kondisi = $konfigurasi->con->real_escape_string($_POST['kondisi']);
	$keterangan = $konfigurasi->con->real_escape_string($_POST['keterangan']);
	$jumlah = $konfigurasi->con->real_escape_string($_POST['jumlah']);
	$id_jenis = $konfigurasi->con->real_escape_string($_POST['jenis']);
	$tanggal_register = $konfigurasi->con->real_escape_string($_POST['tanggal_register']);
	$id_ruang = $konfigurasi->con->real_escape_string($_POST['ruangan']);
	$kode_inventaris = $konfigurasi->con->real_escape_string($_POST['kode_inventaris']);
	$id_petugas  = $konfigurasi->con->real_escape_string($_SESSION['id_petugas']);

	$insert = $konfigurasi->insertInventaris($nama_inventaris,$kondisi,$keterangan,$jumlah,$id_jenis,$tanggal_register,$id_ruang,$kode_inventaris,$id_petugas);
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
				<button type="button" class="btn btn-default" id="btnPlus">
				  <i class="fa fa-plus"></i> Tambah Inventaris
				</button>
				<button type="button" id="" class="btn btn-primary" onclick="printInventaris()">
				  <i class="fa fa-print"></i> Cetak Data Inventaris
				</button>
			</div>
			<div class="panel panel-success" id="formInput" hidden>
			  <div class="panel-heading">
			    <h3 class="panel-title">Inentaris SMK Negeri 1 Lahat</h3>
			  </div>
			  <div class="panel-body">
					<form class="" action="" method="post">
						<div class="form-group">
						  <label for="">Nama :</label>
						  <input type="text" class="form-control" id="nama_inventaris" placeholder="Nama *" name="nama_inventaris">
						</div>
						<div class="form-group">
						  <label for="">Kondisi :</label>
						  <select class="form-control" name="kondisi">
						  	<option>Sangat Baik</option>
								<option>Baik</option>
								<option>Rusak</option>
						  </select>
						</div>
						<div class="form-group">
						  <label for="">Ketarangan :</label>
						  <textarea name="keterangan" class="form-control" rows="4" placeholder="Kerangan Barang *"></textarea>
						</div>
						<div class="form-group">
						  <label for="">Jumlah :</label>
						  <input type="number" class="form-control" id="" placeholder="Jumlah" name="jumlah">
						</div>
						<div class="form-group">
						  <label for="">Jenis :</label>
								<?php if ($selectJenis == null) {
									echo "tidak ada data";
								} else { ?>
									<select class="form-control" name="jenis">
								<?php foreach ($selectJenis as $data): ?>
									<option value="<?php echo $data['id_jenis']; ?>"><?php echo $data['nama_jenis']; ?></option>
								<?php endforeach; } ?>
						  </select>
						</div>
						<div class="form-group">
						  <label for="">Tanggal Daftar :</label>
						  <input type="date" class="form-control" id="" name="tanggal_register" value="<?php echo DATE("Y-m-d"); ?>" readonly>

						</div>
						<div class="form-group">
						  <label for="">Ruangan :</label>
							<?php if ($selectRuangan == null) {
								echo "tidak ada data";
							} else { ?>
								<select class="form-control" name="ruangan">
							<?php foreach ($selectRuangan as $data): ?>
								<option value="<?php echo $data['id_ruang']; ?>"><?php echo $data['nama_ruang']; ?></option>
							<?php endforeach; } ?>
						</select>
						</div>
						<div class="form-group">
						  <label for="">Kode Inventaris :</label>
						  <input type="text" class="form-control" id="" placeholder="Kode Inventaris *" name="kode_inventaris">
						  <p class="help-block"><i>Kode terdiri dari huruf dan angka. Contoh : A001</i></p>
						</div>
						<div class="form-group">
						  <label for="">Petugas : </label>
						  <input type="text" class="form-control" id="" value="<?php echo $_SESSION['nama_petugas']; ?>" name="petugas" readonly>
						  <p class="help-block"><i>Nama petugas tidak boleh dirubah.</i></p>
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
			if ($selectInventaris == null) {
				echo "<hr><h2 class='text-center'>Tidak ada data</h2><hr>";
			} else { ?>
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
					<?php if ($isadmin): ?>
						<th>Opsi</th>
					<?php endif; ?>
			<?php foreach ($selectInventaris as $data): ?>

			<tr>
				<td><?php echo $nomor++; ?></td>
				<td><?php echo $data['nama']; ?></td>
				<td><?php echo $data['kondisi']; ?></td>
				<td><?php echo $data['keterangan_inventaris']; ?></td>
				<td><?php echo $data['jumlah']; ?></td>
				<td><?php echo $data['nama_jenis']; ?></td>
				<td><?php echo $data['tanggal_register']; ?></td>
				<td><?php echo $data['nama_ruang']; ?></td>
				<td><?php echo $data['kode_inventaris']; ?></td>
				<td><?php echo $data['nama_petugas']; ?></td>
				<?php if ($isadmin): ?>
					<td>
						<a href="detail/detail-inventaris.php?rowid=<?php echo $data['id_inventaris'] ?>"><i class="fa fa-eye"></i></a> |
						<a href="javascript:hapusData('<?php echo $data['id_inventaris']; ?>')"><i class="fa fa-trash"></i></a>
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
        window.location.href = 'hapus/hapus-inventaris.php?id=' + id;
      }
    }
		function printInventaris() {
			window.open('cetak/cetak-inventaris.php','_blank');
		}
</script>
<?php } else {
	echo "<h2>Maaf, anda tidak memiliki akses di halaman ini.</h2>";
	echo "<br>";
	echo "Silahkan kembali ke beranda. <a href='/inventaris/index.php'>Kembali</a>";
 } ?>
