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
$detail = $konfigurasi->detailRuangan($id);

if (isset($_POST['updateyes'])) {
	$id_ruang = $konfigurasi->con->real_escape_string($_POST['id_ruang']);
	$nama_ruang = $konfigurasi->con->real_escape_string($_POST['nama_ruang']);
	$kode_ruang = $konfigurasi->con->real_escape_string($_POST['kode_ruang']);
	$keterangan_ruang = $konfigurasi->con->real_escape_string($_POST['keterangan_ruang']);
	$insert = $konfigurasi->updateRuangan($nama_ruang,$kode_ruang,$keterangan_ruang,$id_ruang);
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
  <body onload="userFormDisabled(),viewRuangan()">
		<?php include '../include/menu.php' ?>
		<div class="container">
		  <?php include '../include/heading.php'; ?>

			<div class="panel panel-success" id="formInput">
			  <div class="panel-heading">
			    <h3 class="panel-title">Detail Ruangan</h3>
			  </div>
			  <div class="panel-body">
			    <form class="" action="" method="post">
			    	<?php foreach ($detail as $data): ?>
							<div class="form-group">
				    	  <label for="">Nama Ruangan :</label>
								<input type="hidden" class="form-control" id="id_ruang" name="id_ruang" value="<?php echo $data['id_ruang']; ?>">
				    	  <input type="text" class="form-control" id="nama_ruang" name="nama_ruang" value="<?php echo $data['nama_ruang']; ?>">
				    	</div>
							<div class="form-group">
							  <label for="">Kode Ruangan :</label>
							  <input type="text" class="form-control" id="kode_ruang" name="kode_ruang" value="<?php echo $data['kode_ruang']; ?>">
							  <p class="help-block"><i>Kode terdiri dari huruf dan angka. Contoh : A001</i></p>
							</div>
							<div class="form-group">
							  <label for="">Keterangan :</label>
							  <textarea rows="8" class="form-control" id="keterangan_ruang" name="keterangan_ruang"><?php echo $data['keterangan_ruang']; ?></textarea>
							</div>
			    	<?php endforeach; ?>

			  </div>
				<div class="panel-footer">
					<button type="button" id="btnedit" onclick="editRuangan()" class="btn btn-success"><i class="fa fa-edit"></i> Edit</button>
					<button type="button" class="btn btn-primary" id="btnupdate"  style="float:left;margin-right:5px;" data-toggle="modal" data-target="#konfirmupdate"><i class="fa fa-check"></i> Simpan</button>
						<a href="/inventaris/ruangan.php" onclick="viewRuangan()" class="btn btn-danger"><i class="fa fa-forward"></i> Kembali</a>

			  </div>
				<?php include '../include/confirm-update.php'; ?>
				</form>
			</div>

		</div>

		<!-- Footer -->
    <?php include '../include/footer.php'; ?>
		<?php include '../include/profile.php'; ?>
		<!--- modal confirm -->
		<?php include '../include/confirm-logout.php'; ?>
	</body>
</html>
