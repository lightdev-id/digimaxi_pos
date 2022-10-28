<script>
	jQuery(function($) {
		var path = window.location.href;
		$().ready(function() {
			$('#navbar').find('a').each(function() {
				if ($(this).attr('href') == path) {
					$('.nav-link').removeClass('collapsed');
					$('.nav-item').removeClass('active');
					$(this).addClass('active');
					$(this).parent().addClass('active').parent().addClass('show').parent().addClass('active');
				}
			});
		});
	});
</script>

<div id="navbar">
	<!-- Page Wrapper -->
	<div id="wrapper">

		<!-- Sidebar -->
		<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

			<!-- Sidebar - Brand -->
			<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url(''); ?>">

				<div class="sidebar-brand-text mx-3"><img src="<?= base_url('assets/img/logo_digimaxie-rbg.png') ?>" alt="logo" width="70%"></div>
			</a>

			<!-- Divider -->
			<hr class="sidebar-divider my-0">

			<!-- Nav Item - Dashboard -->
			<?php if ($this->session->userdata('role') == 1) : ?>

				<li class="nav-item">
					<a class="nav-link" href="<?= base_url(''); ?>">
						<i class="fas fa-fw fa-tachometer-alt"></i>
						<span>Dashboard</span></a>
				</li>


				<li class="nav-item">
					<a class="nav-link" href="<?= site_url('Order/input_order'); ?>">
						<i class="fas fa-fw fa-plus"></i>
						<span>Input Order</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= site_url('Beranda/berita_acara'); ?>">
						<i class="fas fa-fw fa-book"></i>
						<span>Berita Acara</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= site_url('Beranda/surat_jalan'); ?>">
						<i class="fas fa-fw fa-book"></i>
						<span>Surat Jalan</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url('Beranda/pembayaran'); ?>">
						<i class="fas fa-fw fa-money-bill"></i>
						<span>Pembayaran</span></a>
				</li>
			<?php endif ?>
			<!-- Divider -->
			<?php if ($this->session->userdata('role') == 1) : ?>

				<hr class="sidebar-divider">

				<!-- Heading -->
				<div class="sidebar-heading">
					SPK
				</div>



				<!-- Nav Item - Pages Collapse Menu -->
				<li class="nav-item">
					<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
						<i class="fas fa-fw fa-box"></i>
						<span>Gudang</span>
					</a>
					<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
						<div class="bg-white py-2 collapse-inner rounded">
							<a class="collapse-item" href="<?= site_url('Beranda/stok'); ?>">Data Stok</a>
							<a class="collapse-item" href="<?= site_url('Gudang/barang_masuk'); ?>">Barang Masuk</a>
							<a class="collapse-item" href="<?= site_url('Gudang/barang_keluar'); ?>">Barang Keluar</a>
							<a class="collapse-item" href="<?= site_url('Gudang/barang_retur'); ?>">Retur Barang</a>
						</div>
					</div>
				</li>
			<?php endif ?>

			<?php if ($this->session->userdata('role') == 3) : ?>



				<!-- Nav Item - Pages Collapse Menu -->
				<li class="nav-item">
					<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
						<i class="fas fa-fw fa-box"></i>
						<span>Gudang</span>
					</a>
					<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
						<div class="bg-white py-2 collapse-inner rounded">

							<a class="collapse-item" href="<?= site_url('Beranda/stok'); ?>">Data Stok</a>
							<a class="collapse-item" href="<?= site_url('Gudang/barang_masuk'); ?>">Barang Masuk</a>
							<a class="collapse-item" href="<?= site_url('Gudang/barang_keluar'); ?>">Barang Keluar</a>
							<a class="collapse-item" href="<?= site_url('Gudang/barang_retur'); ?>">Retur Barang</a>

						</div>
					</div>
				</li>
			<?php endif ?>
			<!-- Nav Item - Utilities Collapse Menu -->
			<?php if ($this->session->userdata('role') == 2) : ?>
				<li class="nav-item">
					<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
						<i class="fas fa-fw fa-wrench"></i>
						<span>SPK</span>
					</a>
					<div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
						<div class="bg-white py-2 collapse-inner rounded">
							<a class="collapse-item" href="<?= site_url('Spk/printing'); ?>">PRINTING</a>
							<a class="collapse-item" href="<?= site_url('Spk/heating'); ?>">HEATING</a>

						</div>
					</div>
				</li>

				<li class="nav-item">
					<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#produksi" aria-expanded="true" aria-controls="produksi">
						<i class="fas fa-fw fa-pen"></i>
						<span>Produksi</span>
					</a>
					<div id="produksi" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
						<div class="bg-white py-2 collapse-inner rounded">
							<a class="collapse-item" href="<?= base_url('Produksi/printing'); ?>">PRINTING</a>
							<a class="collapse-item" href="<?= base_url('Produksi/heating'); ?>">HEATING</a>
						</div>
					</div>
				</li>
			<?php endif ?>

			<?php if ($this->session->userdata('role') == 1) : ?>
				<li class="nav-item">
					<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
						<i class="fas fa-fw fa-wrench"></i>
						<span>SPK</span>
					</a>
					<div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
						<div class="bg-white py-2 collapse-inner rounded">
							<a class="collapse-item" href="<?= site_url('Spk/printing'); ?>">PRINTING</a>
							<a class="collapse-item" href="<?= site_url('Spk/heating'); ?>">HEATING</a>
						</div>
					</div>
				</li>

				<li class="nav-item">
					<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#produksi" aria-expanded="true" aria-controls="produksi">
						<i class="fas fa-fw fa-pen"></i>
						<span>Produksi</span>
					</a>
					<div id="produksi" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
						<div class="bg-white py-2 collapse-inner rounded">
							<a class="collapse-item" href="<?= base_url('Produksi/printing'); ?>">PRINTING</a>
							<a class="collapse-item" href="<?= base_url('Produksi/heating'); ?>">HEATING</a>
						</div>
					</div>
				</li>
			<?php endif ?>

			<?php if ($this->session->userdata('role') == 5) : ?>

				<li class="nav-item">
					<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#finishing" aria-expanded="true" aria-controls="finishing">
						<i class="fas fa-fw fa-calendar"></i>
						<span>Finishing</span>
					</a>
					<div id="finishing" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
						<div class="bg-white py-2 collapse-inner rounded">
							<a class="collapse-item" href="<?= base_url('Finishing/cutting'); ?>">CUTTING</a>
							<a class="collapse-item" href="<?= base_url('Finishing/packing'); ?>">PACKING</a>
						</div>
					</div>
				</li>
			<?php endif ?>

			<?php if ($this->session->userdata('role') == 1) : ?>
				<li class="nav-item">
					<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#rekapHarian" aria-expanded="true" aria-controls="rekapHarian">
						<i class="fas fa-fw fa-calendar"></i>
						<span>Finishing</span>
					</a>
					<div id="rekapHarian" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
						<div class="bg-white py-2 collapse-inner rounded">
							<a class="collapse-item" href="<?= base_url('Finishing/cutting'); ?>">CUTTING</a>
							<a class="collapse-item" href="<?= base_url('Finishing/packing'); ?>">PACKING</a>
						</div>
					</div>
				</li>

				<li class="nav-item">
					<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#laporan" aria-expanded="true" aria-controls="laporan">
						<i class="fas fa-fw fa-chart-line"></i>
						<span>Laporan</span>
					</a>
					<div id="laporan" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
						<div class="bg-white py-2 collapse-inner rounded">
							<a class="collapse-item" href="<?= base_url('Rekap/laporan_cetak'); ?>">Laporan Cetak</a>

						</div>
					</div>
				</li>

			<?php endif ?>

			<?php if ($this->session->userdata('role') == 4) : ?>
				<li class="nav-item">
					<a class="nav-link" href="<?= site_url('Order/input_order'); ?>">
						<i class="fas fa-fw fa-plus"></i>
						<span>Input Order</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= site_url('Beranda/berita_acara'); ?>">
						<i class="fas fa-fw fa-book"></i>
						<span>Berita Acara</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= site_url('Beranda/surat_jalan'); ?>">
						<i class="fas fa-fw fa-book"></i>
						<span>Surat Jalan</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url('Beranda/pembayaran'); ?>">
						<i class="fas fa-fw fa-money-bill"></i>
						<span>Pembayaran</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
						<i class="fas fa-fw fa-bars"></i>
						<span>Master Data</span>
					</a>
					<div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
						<div class="bg-white py-2 collapse-inner rounded">
							<a class="collapse-item" href="<?= base_url('Master/data_bahan'); ?>">Data Bahan</a>
							<a class="collapse-item" href="<?= base_url('Master/rekening'); ?>">Data Rekening</a>
							<a class="collapse-item" href="<?= base_url('Master/karyawan'); ?>">Karyawan</a>
							<a class="collapse-item" href="<?= base_url('Master/konsumen'); ?>">Konsumen</a>
						</div>
					</div>
				</li>


			<?php endif ?>

			<?php if ($this->session->userdata('role') == 1) : ?>

				<!-- Divider -->
				<hr class="sidebar-divider">

				<!-- Heading -->
				<div class="sidebar-heading">
					Config
				</div>


				<!-- Nav Item - Pages Collapse Menu -->
				<li class="nav-item">
					<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
						<i class="fas fa-fw fa-bars"></i>
						<span>Master Data</span>
					</a>
					<div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
						<div class="bg-white py-2 collapse-inner rounded">
							<a class="collapse-item" href="<?= base_url('Master/data_bahan'); ?>">Data Bahan</a>
							<a class="collapse-item" href="<?= base_url('Master/rekening'); ?>">Data Rekening</a>
							<a class="collapse-item" href="<?= base_url('Master/karyawan'); ?>">Karyawan</a>
							<a class="collapse-item" href="<?= base_url('Master/konsumen'); ?>">Konsumen</a>
						</div>
					</div>
				</li>
			<?php endif ?>
			<!-- Nav Item - Charts -->


			<!-- Divider -->
			<hr class="sidebar-divider d-none d-md-block">

			<!-- Sidebar Toggler (Sidebar) -->

			<!-- Sidebar Message -->


		</ul>
		<!-- End of Sidebar -->








		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">

			<!-- Main Content -->
			<div id="content">

				<!-- Topbar -->
				<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

					<!-- Sidebar Toggle (Topbar) -->
					<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
						<i class="fa fa-bars"></i>
					</button>

					<!-- Topbar Search -->
					<form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
						<div class="input-group">
							PT. DIGIMAXIE
						</div>
					</form>

					<!-- Topbar Navbar -->
					<ul class="navbar-nav ml-auto">

						<!-- Nav Item - Search Dropdown (Visible Only XS) -->
						<li class="nav-item dropdown no-arrow d-sm-none">
							<a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fas fa-search fa-fw"></i>
							</a>
							<!-- Dropdown - Messages -->
							<div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
								<form class="form-inline mr-auto w-100 navbar-search">
									<div class="input-group">
										<input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
										<div class="input-group-append">
											<button class="btn btn-primary" type="button">
												<i class="fas fa-search fa-sm"></i>
											</button>
										</div>
									</div>
								</form>
							</div>
						</li>

						<!-- Nav Item - Alerts -->


						<!-- Nav Item - Messages -->


						<div class="topbar-divider d-none d-sm-block"></div>

						<!-- Nav Item - User Information -->
						<li class="nav-item dropdown no-arrow">
							<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<div class="btn btn-primary btn-sm">
									<span class="mr-2 d-none d-lg-inline small"><?php echo $this->session->userdata('nama'); ?></span><i class="fa-solid fa-user"></i>
								</div>
							</a>
							<!-- Dropdown - User Information -->
							<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
								<!-- <div class="dropdown-divider"></div> -->
								<a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
									<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
									Logout
								</a>
							</div>
						</li>

					</ul>

				</nav>
				<!-- End of Topbar -->
