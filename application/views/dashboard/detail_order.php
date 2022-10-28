<div class="container-fluid">

	<h1 class="h3 mb-4 text-gray-800">Detail Pesanan</h1>

	<div class="row">

		<div class="col-lg-12">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<div class="col-12 d-flex flex-row align-items-center justify-content-between pl-0">
						<h6 class="m-0 font-weight-bold text-primary">NO INVOICE : <?= $detailOrder->no_inv ?></h6>
						<a href="<?= base_url('Beranda/pembayaran') ?>" class="btn btn-warning btn-sm float-right"><i class="fa-sharp fa-solid fa-arrow-left pr-2"></i></i>Kembali</a>
					</div>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-12 table-responsive">
							<table class="table table-hover table-bordered">
								<tr>
									<td><strong>No. PO</strong></td>
									<td><?= $detailOrder->no_po ?></td>
								<tr>
								<tr>
									<td><strong>Nama Pekerjaan</strong></td>
									<td><?= $detailOrder->nama_kerja ?></td>
								<tr>
									<td><strong>Nama Customer</strong></td>
									<td><?= $detailOrder->nama_customer ?></td>
								</tr>
								<tr>
									<td><strong>Tanggal Order</strong></td>
									<td><?= $detailOrder->tgl_order ?></td>
								</tr>
								<tr>
									<td><strong>Email</strong></td>
									<td><?= $detailOrder->email ?></td>
								</tr>
								<tr>
									<td><strong>Bahan Baku</strong></td>
									<td><?= $detailOrder->nama_bahan ?></td>
								</tr>
								<tr>
									<td><strong>Jumlah</strong></td>
									<td><?= $detailOrder->jumlah ?></td>
								</tr>
								<tr>
									<td><strong>Panjang</strong></td>
									<td><?= $detailOrder->panjang ?> cm</td>
								</tr>
								<tr>
									<td><strong>Lebar</strong></td>
									<td><?= $detailOrder->lebar ?> cm</td>
								</tr>
								<tr>
									<td><strong>Catatan</strong></td>
									<td><?= $detailOrder->catatan ?></td>
								</tr>
								<tr>
									<td><strong>Status Bayar</strong></td>
									<td><?php $favcolor = $detailOrder->status_bayar;
											switch ($favcolor) {
												case "0":
													echo "<button class='btn btn-sm btn-danger'>Belum Lunas</button>";
													break;
												case "1":
													echo "<button class='btn btn-sm btn-success'>Sudah Lunas</button>";
													break;
												default:
													echo "Tidak";
											} ?>
									</td>
								</tr>
								<tr>
									<td><strong>Status Pekerjaan</strong></td>
									<td><?php
											$favcolor = $detailOrder->status;
											switch ($favcolor) {
												case "0":
													echo "<button class='btn btn-sm btn-danger'>Belum Dikerjakan</button>";
													break;
												case "1":
													echo "<button class='btn btn-sm btn-warning'>Sedang Dikerjakan</button>";
													break;
												case "2":
													echo "<button class='btn btn-sm btn-info'>Proses Finishing</button>";
													break;
												case "3":
													echo "<button class='btn btn-sm btn-danger'>Belum di Input</button>";
													break;
												case "4":
													echo "<button class='btn btn-sm btn-success'>Selesai</button>";
													break;

												default:
													echo "Tidak";
											}
											?></td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
