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
$detail = $konfigurasi->detailPegawai($id);

if (isset($_POST['updateyes'])) {
	$id_pegawai = $konfigurasi->con->real_escape_string($_POST['id_pegawai']);
	$nama_pegawai = $konfigurasi->con->real_escape_string($_POST['nama_pegawai']);
	$nip_pegawai = $konfigurasi->con->real_escape_string($_POST['nip_pegawai']);
	$alamat_pegawai = $konfigurasi->con->real_escape_string($_POST['alamat_pegawai']);

	$insert = $konfigurasi->updatePegawai($nama_pegawai,$nip_pegawai,$alamat_pegawai,$id_pegawai);
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
  <body onload="userFormDisabled(),viewPegawai()">
		<?php include '../include/menu.php' ?>
		<div class="container">
		  <?php include '../include/heading.php'; ?>

			<div class="panel panel-success" id="formInput">
			  <div class="panel-heading">
			    <h3 class="panel-title">Detail Pegawai</h3>
			  </div>
			  <div class="panel-body">
			    <form class="" action="" method="post">
			    	<?php foreach ($detail as $data): ?>
							<div class="form-group">
				    	  <label for="">Nama Pegawai :</label>
								<input type="hidden" class="form-control" id="id_pegawai" name="id_pegawai" value="<?php echo $data['id_pegawai']; ?>">
				    	  <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai" value="<?php echo $data['nama_pegawai']; ?>">
				    	</div>
							<div class="form-group">
							  <label for="">Nip Pegawai :</label>
							  <input type="number" class="form-control" id="nip_pegawai" name="nip_pegawai" value="<?php echo $data['nip']; ?>">
								<p class="help-block"><i>Nip harus 16 digit angka.</i></p>
							</div>
							<div class="form-group">
							  <label for="">Alamat Pegawai :</label>
							  <textarea name="alamat_pegawai" id="alamat_pegawai" rows="4" class="form-control" ><?php echo $data['alamat'] ?></textarea>
							</div>

							</div>
			    	<?php endforeach; ?>

			  </div>
				<div class="panel-footer">
					<button type="button" id="btnedit" onclick="editPegawai()" class="btn btn-success"><i class="fa fa-edit"></i> Edit</button>
					<button type="button" class="btn btn-primary" id="btnupdate" onclick="updatePegawai()" style="float:left;margin-right:5px;" data-toggle="modal"><i class="fa fa-check"></i> Simpan</button>
						<a href="/inventaris/pegawai.php" onclick="viewPegawai()" class="btn btn-danger"><i class="fa fa-forward"></i> Kembali</a>

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
