<nav class="navbar-inverse" role="navigation">
	<div class="container-fluid">
		<div class="navbar-header">

			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" style="color:#ffffff;" href="/inventaris/index.php"><span><i class="fa fa-graduation-cap"></i></span>Inventaris</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="navbar">
			<ul class="nav navbar-nav">
				<li><<div class="vl"></div></li>
				<li><a href="/inventaris/index.php"><i class="fa fa-home"></i> Beranda</a></li>
				<?php if ($isadmin): ?>
					<li><a href="/inventaris/inventaris.php"><i class="fa fa-folder-open"></i> Inventaris</a></li>
				<?php endif; ?>
				<li class="dropdown">
					<a href="/inventaris/#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-exchange"></i> Transaksi<b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="/inventaris/tambah-peminjam.php"><i class="fa fa-plus"></i>Tambah Peminjaman</a></li>
						<?php if ($isadmin || $isoperator): ?>
						<li><a href="/inventaris/peminjaman.php"><i class="fa fa-line-chart"></i> Barang Pinjam</a></li>
						<li><a href="/inventaris/pengembalian.php"><i class="fa fa-exchange"></i> Pengembalian</a></li>
						<?php endif; ?>
					</ul>
				</li>
				<?php if ($isadmin): ?>
					<li><a href="/inventaris/barang.php"><i class="fa fa-tags"></i> Jenis barang</a></li>
					<li><a href="/inventaris/ruangan.php"><i class="fa fa-users"></i> Ruangan</a></li>
					<li class="dropdown">
						<a href="/inventaris/#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-gears"></i> Pengaturan <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="/inventaris/petugas.php"><i class="fa fa-user-circle"></i> Petugas</a></li>
							<li><a href="/inventaris/pegawai.php"><i class="fa fa-users"></i> Pegawai</a></li>
						</ul>
					</li>
				<?php endif; ?>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a href="/inventaris/#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user-circle"></i> <?php echo $_SESSION['nama_petugas'] ?> <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="/inventaris/#" data-toggle="modal" data-target="#profil"><i class="fa fa-user"></i> Profil</a></li>
						<li><a href="/inventaris/#" data-toggle="modal" data-target="#logout"><i class="fa fa-power-off"></i> Logout</a></li>
					</ul>
				</li>
			</ul>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>
