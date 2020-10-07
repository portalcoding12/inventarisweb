<?php
include 'include/session.php';

$q1 = $konfigurasi->select("petugas","","");
$count1 = $q1->num_rows;
$q2 = $konfigurasi->select("pegawai","","");
$count2 = $q2->num_rows;
$q3 = $konfigurasi->select("jenis","","");
$count3 = $q3->num_rows;
$q4 = $konfigurasi->select("inventaris","","");
$count4 = $q4->num_rows;
$q5 = $konfigurasi->select("peminjaman","status_peminjaman","belum dikembalikan");
$count5 = $q5->num_rows;
$q6 = $konfigurasi->select("peminjaman","status_peminjaman","telah dikembalikan");
$count6 = $q6->num_rows;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include 'include/meta.php'; ?>

  </head>
  <body onload="userFormDisabled()">
		<div class="body">
		<?php include 'include/menu.php' ?>

			<div class="container">
				<?php include 'include/heading.php'; ?>

				<div class="panel panel-info">
				  <div class="panel-body bg-default">
						<div class="col-md-offset-0" style="margin-top:10px;">
						<h1 style="text-transform: capitalize;">selamat datang <?php echo $_SESSION['nama_petugas']; ?></h1>

						<h3>Anda login sebagai <strong class="text-capitalize"><?php echo $_SESSION['level']; ?>.</strong>
              <?php if ($_SESSION['level'] == "administrator") {
                echo "Anda memiliki akses penuh terhadap sistem.";
              } else {
                echo "Berikut data yang ada didalam sistem";
              } ?>
           </h3>
				  </div>
				</div>
      </div>
		</div>

    <div class="container">
      <div class="row">
        <div class="col-sm-4">
          <div class="panel-body bg-orange">
            <div class="col-md-offset-0">
              <div class=" col-md-offset-0" style="margin-top:0px;">
  						<h3>	<span><i class="fa fa-user-circle fa-1x"></i></span> Jumlah Petugas</h3>
                <h4><?php echo $count1; ?> Petugas</h4>
  						</div>
            </div>
        </div>
        </div>
        <div class="col-sm-4">
          <div class="panel-body bg-light-blue">
            <div class="col-md-offset-0">
              <div class=" col-md-offset-0" style="margin-top:0px;">
  						<h3>	<span><i class="fa fa-users fa-1x"></i></span> Jumlah Pegawai</h3>
                <h4><?php echo $count2; ?> Pegawai</h4>
  						</div>
            </div>
        </div>
        </div>
        <div class="col-sm-4">
          <div class="panel-body bg-red">
            <div class="col-md-offset-0">
              <div class=" col-md-offset-0" style="margin-top:0px;">
  						<h3>	<span><i class="fa fa-tasks fa-1x"></i></span> Jumlah Jenis Barang</h3>
                <h4><?php echo $count3; ?> Jenis</h4>
  						</div>
            </div>
        </div>
        </div>
      </div>
    </div><br>

    <div class="container">
      <div class="row">
        <?php if($isadmin) { ?>
        <div class="col-sm-4">
          <div class="panel-body bg-yellow">
            <div class="col-md-offset-0">
              <div class=" col-md-offset-0" style="margin-top:0px;">
  						<h3>	<span><i class="fa fa-line-chart fa-1x"></i></span> Jumlah Peminjaman</h3>
                <h4><?php echo $count5; ?> Transaksi</h4>
  						</div>
            </div>
        </div>
        </div>
      <?php } ?>
        <div class="col-sm-4">
          <div class="panel-body bg-green">
            <div class="col-md-offset-0">
              <div class=" col-md-offset-0" style="margin-top:0px;">
  						<h3>	<span><i class="fa fa-folder-open fa-1x"></i></span> Jumlah Inventaris</h3>
                <h4><?php echo $count4; ?> Inventaris</h4>
  						</div>
            </div>
        </div>
        </div>
        <?php if($isadmin) { ?>
        <div class="col-sm-4">
          <div class="panel-body bg-purple">
            <div class="col-md-offset-0">
              <div class=" col-md-offset-0" style="margin-top:0px;">
  						<h3>	<span><i class="fa fa-exchange fa-1x"></i></span> Total Jumlah Pengembalian</h3>
                <h4><?php echo $count6; ?> Pengguna</h4>
  						</div>
            </div>
        </div>
        </div>
      <?php } ?>
    </div></div><br><br>

    <!-- Footer -->
    <?php include 'include/footer.php'; ?>

    <?php include 'include/profile.php'; ?>
      <!--- modal confirm -->
      <?php include 'include/confirm-data.php'; ?>
      </form>

      <?php include 'include/confirm-logout.php'; ?>
  </body>
</html>
