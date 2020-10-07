<!-- modal profie user -->
<div class="modal fade" id="profil" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id=""><i class="fa fa-user-circle"></i> Profil Anda</h4>
			</div>
			<div class="modal-body">
				<form class="" action="" method="post">
				<?php foreach ($profil as $key => $data) { ?>
					<div class="form-group">
						<label for="">Nama :</label>
						<input type="text" class="form-control" id="nama" name="nama_petugas" value="<?php echo $data['nama_petugas']; ?>">
					</div>
					<div class="form-group">
						<label for="">Username :</label>
						<input type="text" class="form-control" id="username" name="username" value="<?php echo $data['username']; ?>">
					</div>
					<div class="form-group" id="passwordbaru">
						<label for="">Password Baru:</label>
						<input type="password" class="form-control" id="txtpasswordbaru" name="txtpasswordbaru" placeholder="Password Baru">
					</div>
					<div class="form-group" id="repassword">
						<label for="">Ulangi Password:</label>
						<input type="password" class="form-control" id="txtrepassword" name="txtrepassword" placeholder="Ulangi Password">
					</div>
					<div class="form-group" id="level">
						<label for="">Level :</label>
						<input type="text" class="form-control" id="inputLevel" value="<?php echo $data['nama_level']; ?>">
					</div>
					<div class="form-group">
						<label for="">Status : <i class="fa fa-circle" style="color:#2ecc71;"></i> Sedang Aktif</label>
					</div>
				<?php $passlama = $data['password']; } ?>

			</div>
			<div class="modal-footer">
				<button type="button" onclick="valid()" id="edit" class="btn btn-success" style="float:left;"><i class="fa fa-edit"></i> Edit</button>
				<button type="button" class="btn btn-primary" onclick="validUpdateProfile()" data-toggle="modal" id="sipan"><i class="fa fa-check"></i> Simpan</button>
				<button type="button" class="btn btn-danger" onclick="userFormDisabled()" data-dismiss="modal"><i class="fa fa-close"></i> Tutup</button>
			</div>
			<?php include 'confirm-profile.php'; ?>
		</form>
		</div>
	</div>
	</div>

	<?php

		if (isset($_POST['updaterofile'])) {
			$id_petugas = $_SESSION['id_petugas'];
			$nama_profile = $konfigurasi->con->real_escape_string($_POST['nama_petugas']);
			$username = $konfigurasi->con->real_escape_string($_POST['username']);
			$passbaru = $konfigurasi->con->real_escape_string($_POST['txtpasswordbaru']);
			if ($passbaru=="") {
				$password = $passlama;
			} else {
				$password = md5($passbaru);
			}
			$updateprofile = $konfigurasi->updateProfile($username,$password,$nama_profile,$id_petugas);
			if ($updateprofile) {
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
