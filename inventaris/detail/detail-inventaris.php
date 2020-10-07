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
if ($_SESSION['level'] == "administrator" || $_SESSION['level'] == "operator") {
	$isadmin = true;
}
$ids = $_SESSION['id_petugas'];
$profil = $konfigurasi->profie($ids);
$id = $_GET['rowid'];
$selectRuangan = $konfigurasi->selectRuangan();
$selectJenis = $konfigurasi->selectJenis();
$detail = $konfigurasi->detailInventaris($id);

if (isset($_POST['updateyes'])) {
	$nama_inventaris = $konfigurasi->con->real_escape_string($_POST['nama_inventaris']);
	$kondisi = $konfigurasi->con->real_escape_string($_POST['kondisi']);
	$keterangan = $konfigurasi->con->real_escape_string($_POST['keterangan']);
	$jumlah = $konfigurasi->con->real_escape_string($_POST['jumlah']);
	$id_jenis = $konfigurasi->con->real_escape_string($_POST['jenis']);
	$tanggal_register = $konfigurasi->con->real_escape_string($_POST['tanggal_register']);
	$id_ruang = $konfigurasi->con->real_escape_string($_POST['ruangan']);
	$kode_inventaris = $konfigurasi->con->real_escape_string($_POST['kode_inventaris']);
	$id_petugas  = $konfigurasi->con->real_escape_string($_SESSION['id_petugas']);

	$insert = $konfigurasi->updateInventaris($nama_inventaris,$kondisi,$keterangan,$jumlah,$id_jenis,$tanggal_register,$id_ruang,$kode_inventaris,$id_petugas,$id);
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
		<?php include '../include/meta.php'; ?>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body onload="userFormDisabled(),viewInventaris()">
		<?php include '../include/menu.php' ?>
		<div class="container">
		  <?php include '../include/heading.php'; ?>

			<div class="panel panel-success">
			  <div class="panel-heading">
			    <h3 class="panel-title"><i class="fa fa-edit"></i> Update Inventaris</h3>
			  </div>
			  <div class="panel-body">
					<form class="" action="" method="post">
						<?php	if ($detail == null) {
							echo "<h2 class='text-center'>Tidak ada data.</h2>";
						} else {
							foreach ($detail as $data) { ?>
									<input type="hidden" name="id" value="<?php echo $data['id_inventaris']; ?>">
										<div class="form-group">
											<label for="">Nama :</label>
											<input type="text" class="form-control" id="nama_inventaris" value="<?php echo $data['nama']; ?>" name="nama_inventaris">
										</div>
										<div class="form-group">
											<label for="">Kondisi :</label>
											<select class="form-control" name="kondisi" id="kondisi">
												<option><?php echo $data['kondisi']; ?></option>
												<option>Sangat Baik</option>
												<option>Baik</option>
												<option>Rusak</option>
											</select>
										</div>
										<div class="form-group">
											<label for="">Ketarangan :</label>
											<textarea name="keterangan" id="keterangan" class="form-control" rows="4"><?php echo $data['keterangan_inventaris']; ?></textarea>
										</div>
										<div class="form-group">
											<label for="">Jumlah :</label>
											<input type="number" class="form-control" id="jumlah" value="<?php echo $data['jumlah']; ?>" name="jumlah">
										</div>

										<div class="form-group">
											<label for="">Jenis :</label>
											<select class="form-control" name="jenis" id="jenis">
												<option value="<?php echo $data['id_jenis']; ?>"><?php echo $data['nama_jenis']; ?></option>
												<?php foreach ($selectJenis as $datas) { ?>
													<option value="<?php echo $datas['id_jenis']; ?>"><?php echo $datas['nama_jenis']; ?></option>
												<?php } ?>
											</select>
										</div>

										<div class="form-group">
											<label for="">Tanggal Daftar :</label>
											<input type="date" class="form-control" id="tanggal_register" name="tanggal_register" value="<?php echo $data['tanggal_register']; ?>">
										</div>
										<div class="form-group">
											<label for="">Ruangan :</label>
											<select class="form-control" name="ruangan" id="ruangan">
												<option value="<?php echo $data['id_ruang']; ?>"><?php echo $data['nama_ruang']; ?></option>
											<?php foreach ($selectRuangan as $datas){ ?>
												<option value="<?php echo $datas['id_ruang']; ?>"><?php echo $datas['nama_ruang']; ?></option>
											<?php } ?>
										</select>
										</div>
										<div class="form-group">
											<label for="">Kode Inventaris :</label>
											<input type="text" class="form-control" id="kode_inventaris" value="<?php echo $data['kode_inventaris']; ?>" name="kode_inventaris">
											<p class="help-block"><i>Kode terdiri dari huruf dan angka. Contoh : A001</i></p>
										</div>
										<div class="form-group">
											<label for="">Petugas : </label>
											<input type="text" class="form-control" id="petugas" value="<?php echo $_SESSION['nama_petugas']; ?>" name="petugas" >
											<p class="help-block"><i>Nama petugas tidak boleh dirubah.</i></p>
										</div>
						<?php	} } ?>
			  </div>
			  <div class="panel-footer">
          <button type="button" id="btnedit" onclick="editInventaris()" class="btn btn-success"><i class="fa fa-edit"></i> Edit</button>
  				<button type="button" class="btn btn-primary" id="btnupdate"  style="float:left;margin-right:5px;" data-toggle="modal" data-target="#konfirmupdate"><i class="fa fa-check"></i> Simpan</button>
  					<a href="/inventaris/inventaris.php" onclick="viewInventaris()" class="btn btn-danger"><i class="fa fa-forward"></i> Kembali</a>

			  </div>
			</div>
			<?php include '../include/confirm-update.php'; ?>
		</form>

		</div>
		<!-- Footer -->
    <?php include '../include/footer.php'; ?>
		<?php include '../include/profile.php'; ?>
		<!--- modal confirm -->

		<?php include '../include/confirm-logout.php'; ?>
	</body>
</html>
