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
$detail = $konfigurasi->detailPetugas($id);
$selectJenis = $konfigurasi->selectLevel();

if (isset($_POST['updateyes'])) {
	$id_petugas = $konfigurasi->con->real_escape_string($_POST['id_petugas']);
	$nama_petugas = $konfigurasi->con->real_escape_string($_POST['nama_petugas']);
	$username = $konfigurasi->con->real_escape_string($_POST['username_petugas']);
	$passwordlama = $konfigurasi->con->real_escape_string($_POST['passwordlama_petugas']);
	$passwordbaru = $konfigurasi->con->real_escape_string(md5($_POST['passwordbaru_petugas']));
	$repassword = $konfigurasi->con->real_escape_string(md5($_POST['repassword_petugas']));
	$password = "";
	if ($passwordbaru == null) {
		$password = $passwordlama;
	} else {
		$password = $passwordbaru;
	}
	$id_level = $konfigurasi->con->real_escape_string($_POST['level_petugas']);
	$insert = $konfigurasi->updatePetugas($username,$password,$nama_petugas,$id_level,$id_petugas);
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
  <body onload="userFormDisabled(),viewPetugas()">
		<?php include '../include/menu.php' ?>
		<div class="container">
		  <?php include '../include/heading.php'; ?>

			<div class="panel panel-success" id="formInput">
			  <div class="panel-heading">
			    <h3 class="panel-title">Detail Petugas</h3>
			  </div>
			  <div class="panel-body">
			    <form class="" action="" method="post">
			    	<?php foreach ($detail as $data): ?>
							<div class="form-group">
				    	  <label for="">Nama Petugas :</label>
								<input type="hidden" class="form-control" id="id_petugas" name="id_petugas" value="<?php echo $data['id_petugas']; ?>">
				    	  <input type="text" class="form-control" id="nama_petugas" name="nama_petugas" value="<?php echo $data['nama_petugas']; ?>">
				    	</div>
							<div class="form-group">
							  <label for="">Username :</label>
							  <input type="text" class="form-control" id="username_petugas" name="username_petugas" value="<?php echo $data['username']; ?>">
							  <p class="help-block"><i>Kode terdiri dari huruf dan angka. Contoh : A001</i></p>
							</div>
							<div class="form-group">
							  <label for="">Password Lama :</label>
							  <input type="password" class="form-control" id="passwordlama_petugas" name="passwordlama_petugas" value="<?php echo $data['password']; ?>">
							  <p class="help-block"><i>Isi dari kolom password lama tidak boleh dirubah</i></p>
							</div>
							<div class="form-group">
							  <label for="">Password Baru :</label>
							  <input type="password" class="form-control" id="passwordbaru_petugas" name="passwordbaru_petugas" placeholder="Password Baru Anda *">
							</div>
							<div class="form-group">
							  <label for="">Ulangi Password :</label>
							  <input type="password" class="form-control" id="repassword_petugas" name="repassword_petugas" placeholder="Ulangi Password *">
							</div>
							<div class="form-group">
							  <label for="">Level Petugas :</label>
							  <select class="form-control" name="level_petugas" id="level_petugas">
									<option value="<?php echo $data['id_level'] ?>"><?php echo $data['nama_level'] ?></option>
							  	<?php foreach ($selectJenis as $datas){ ?>
							  		<option value="<?php echo $datas['id_level'] ?>"><?php echo $datas['nama_level'] ?></option>
							  	<?php } ?>
							  </select>
							</div>
			    	<?php endforeach; ?>

			  </div>
				<div class="panel-footer">
					<button type="button" id="btnedit" onclick="editPetugas()" class="btn btn-success"><i class="fa fa-edit"></i> Edit</button>
					<button type="button" class="btn btn-primary" id="btnupdate" onclick="updatePetugas()" style="float:left;margin-right:5px;" data-toggle="modal"><i class="fa fa-check"></i> Simpan</button>
						<a href="/inventaris/petugas.php" onclick="viewPetugas()" class="btn btn-danger"><i class="fa fa-forward"></i> Kembali</a>

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
