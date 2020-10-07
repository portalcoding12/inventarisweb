<?php
require 'config/function.php';
$konek = new Login();
session_start();
$nomor = 1;
$error = false;
if (isset($_POST['login'])) {
	$user = $konek->con->real_escape_string($_POST['user']);
	$pass = $konek->con->real_escape_string(md5($_POST['pass']));
	$query = $konek->setLogin($user,$pass);
	$login = $konek->getLogin();
	if ($login) {
		echo "<script type='text/javascript'>
						window.location='index.php';
					</script>";
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
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="bootstrap/css/style.css">
		<style media="screen">
		.tengah{
			margin-top: 40px;
		}
		</style>
    
  </head>
  <body>
	<div class="wrap-form-contact tengah">
		<div class="container">
			<div class="col-md-5 col-md-offset-3">
				<div class="panel panel-info ">
				  <div class="panel-heading">
				    <h3 class="panel-title"><span><i class="fa fa-info-circle"></i></span> Silahkan login terlebih dahulu.</h3>
				  </div>
				  <div class="panel-body">
							<form class="form-group" action="" method="post">
								<div class="form-group">
								<div class="input-group">
								  <span class="input-group-addon"><i class="fa fa-user"></i></span>
								  <input type="text"  name="user" class="form-control" placeholder="username">
								</div>
							</div>
							<div class="form-group">
								<div class="input-group">
								  <span class="input-group-addon"><i class="fa fa-lock"></i></span>
								  <input type="password" name="pass" class="form-control" placeholder="password">
								</div>
							</div>
							<?php if($error) { ?>
							<div class="alert alert-danger">
								<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
								<strong>Maaf!</strong> Username / password salah.
							</div>
						<?php } ?>
						<?php if(isset($_SESSION['error'])) { ?>
						<div class="alert alert-danger">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							<strong>Maaf!</strong> <?php echo $_SESSION['error']; ?>.
						</div>
						<?php unset($_SESSION['error']); ?>
					<?php }
					if(isset($_SESSION['logout'])) { ?>
						<div class="alert alert-success">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							<?php echo $_SESSION['logout']; ?>.
						</div>
							<?php unset($_SESSION['logout']); ?>
					<?php }  ?>
							<div class="form-group">
								<div class="input-group col-md-3">
									<button type="submit" class="btn btn-primary" name="login">Login</button>
								</div>
								<br>
								<div class="input-group col-md-6">
								<p>Belum punya akun? daftar <a class="btn-alert" href="register.php">disini.</a></p>
								</div>
							</div>
							</form>
				  </div>
				</div>
			</div>
		</div>
	</div>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="bootstrap/js/jquery.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
