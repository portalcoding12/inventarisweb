<?php
session_start();
require 'config/function.php';
$konek = new konfigurasi();
// $selectLevel = $konek->selectLevel();

$nomor = 1;
$error = false;
$sukses = false;
if (isset($_POST['yes'])) {
	$name = $konek->con->real_escape_string($_POST['name']);
	$user = $konek->con->real_escape_string($_POST['user']);
	$pass = $konek->con->real_escape_string(md5($_POST['pass']));
	$level = 3;
	$register = $konek->insertPetugas($user,$pass,$name,$level);
	if ($register) {
		$sukses = true;
		echo "<meta HTTP-EQUIV='REFRESH' content='3; url=login.php'>";
	} else {
		$error = true;
	}
}
if (isset($_SESSION['login'])) {
	header("location:index.php");
}
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aplikasi Inventaris Sekolah</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="/inventaris/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<style media="screen">
			.wrap-form-contact{
				margin-top: 40px;
			}
		</style>

  </head>
  <body>
	<div class="wrap-form-contact">
		<div class="container">
			<div class="col-md-5 col-md-offset-3">
				<div class="panel panel-info ">
				  <div class="panel-heading">
				    <h3 class="panel-title"><span><i class="fa fa-users"></i></span> Registrasi Peminjaman Inventaris.</h3>
				  </div>
				  <div class="panel-body">
							<form class="form-group" action="" method="post">
                <div class="form-group">
								<div class="input-group">
								  <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
								  <input type="text" id="name" name="name" class="form-control" placeholder="Nama Anda">
								</div>
							</div>
                <div class="form-group">
								<div class="input-group">
								  <span class="input-group-addon"><i class="fa fa-user"></i></span>
								  <input type="text" id="user" name="user" class="form-control" placeholder="Username">
								</div>
							</div>
              <div class="form-group">
								<div class="input-group">
								  <span class="input-group-addon"><i class="fa fa-lock"></i></span>
								  <input type="password" id="pass" name="pass" class="form-control" placeholder="Password">
								</div>
							</div>
              <div class="form-group">
								<div class="input-group">
								  <span class="input-group-addon"><i class="fa fa-lock"></i></span>
								  <input type="password" id="repass" name="repass" class="form-control" placeholder="Ulangi Password">
								</div>
							</div>
							<?php if($error) { ?>
							<div class="alert alert-danger">
								<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
								<strong>Register gagal</strong>, silahkan coba lagi.
							</div>
						<?php } else if($sukses) { ?>
			      <div class="alert alert-success">
			        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			        <strong>Selamat!</strong> Register berhasil.
			      </div>
			    <?php } ?>

							<div class="form-group">
								<div class="input-group col-md-3">
									<button type="button" class="btn btn-primary" onclick="validRegister()" id="sipan" name="sipan" data-toggle="modal"><i class="fa fa-check"></i> Register</button>
								</div>
								<br>
								<div class="input-group col-md-6">
								<p>Sudah punya akun? daftar <a class="btn-alert" href="login.php">disini.</a></p>
								</div>
							</div>
							<?php include 'include/confirm-data.php'; ?>
							</form>
				  </div>
				</div>
			</div>
		</div>
	</div>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="/inventaris/bootstrap/js/jquery.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="/inventaris/bootstrap/js/bootstrap.min.js"></script>
	<script src="/inventaris/bootstrap/js/valid.js" charset="utf-8"></script>
  </body>
</html>
