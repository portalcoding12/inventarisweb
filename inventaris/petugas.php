<?php
include 'include/session.php';
if ($isadmin) {

$selectPetugas = $konfigurasi->selectPetugas();
$selectLevel = $konfigurasi->selectLevel();

if (isset($_POST['yes'])) {
	$nama_petugas = $konfigurasi->con->real_escape_string($_POST['nama_petugas']);
	$username = $konfigurasi->con->real_escape_string($_POST['username_petugas']);
	$password = $konfigurasi->con->real_escape_string(md5($_POST['password_petugas']));
	$id_level = $konfigurasi->con->real_escape_string($_POST['level_petugas']);
	$insert = $konfigurasi->insertPetugas($username,$password,$nama_petugas,$id_level);
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
				  <i class="fa fa-plus"></i> Tambah Petugas
				</button>
				<button type="button" id="" class="btn btn-primary" onclick="printPetugas()">
				  <i class="fa fa-print"></i> Cetak Data Petugas
				</button>
			</div>

			<div class="panel panel-success" id="formInput" style="display:none;">
			  <div class="panel-heading">
			    <h3 class="panel-title">Tambahkan Petugas</h3>
			  </div>
			  <div class="panel-body">
			    <form class="" action="" method="post">
			    	<div class="form-group">
			    	  <label for="">Nama Petugas :</label>
			    	  <input type="text" class="form-control" id="" name="nama_petugas" placeholder="Nama Petugas *">
			    	</div>
						<div class="form-group">
						  <label for="">Username :</label>
						  <input type="text" class="form-control" id="" name="username_petugas" placeholder="Username Petugas *">
						</div>
						<div class="form-group">
						  <label for="">Password :</label>
						  <input type="password" class="form-control" id="" name="password_petugas" placeholder="Password Petugas *">
						  <p class="help-block"><i>Password minimal 8 huruf dan terdiri dari huruf dan angka.</i></p>
						</div>
						<div class="form-group">
						  <label for="">Level :</label>
						  <select class="form-control" name="level_petugas">
						  	<?php foreach ($selectLevel as $data) { ?>
						  		<option value="<?php echo $data['id_level']; ?>"><?php echo $data['nama_level']; ?></option>
						  	<?php } ?>
						  </select>
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
				if ($selectPetugas == null) {
					echo "<hr><h2 class='text-center'>Tidak ada data</h2><hr>";
				} else { ?>
					<table class="table">
						<th>Nomor</th>
					  <th>Nama Petugas</th>
						<th>username</th>
						<th>Password</th>
						<th>Level</th>
						<?php if ($isadmin): ?>
							<th>Opsi</th>
						<?php endif; ?>
				<?php foreach ($selectPetugas as $data): ?>

				<tr>
					<td><?php echo $nomor++; ?></td>
					<td><?php echo $data['nama_petugas']; ?></td>
					<td><?php echo $data['username']; ?></td>
					<td><?php echo sha1($data['password']); ?></td>
					<td><?php echo $data['nama_level'] ?></td>
					<?php if ($isadmin): ?>
						<td>
							<a href="detail/detail-petugas.php?rowid=<?php echo $data['id_petugas'] ?>"><i class="fa fa-eye"></i></a> |
							<a href="javascript:hapusData('<?php echo $data['id_petugas']; ?>')"><i class="fa fa-trash"></i></a>
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
        window.location.href = 'hapus/hapus-petugas.php?id=' + id;
      }
    }
		function printPetugas() {
			window.open('cetak/cetak-petugas.php','_blank');
		}
</script>
<?php } else {
	echo "<h2>Maaf, anda tidak memiliki akses di halaman ini.</h2>";
	echo "<br>";
	echo "Silahkan kembali ke beranda. <a href='/inventaris/index.php'>Kembali</a>";
 } ?>
