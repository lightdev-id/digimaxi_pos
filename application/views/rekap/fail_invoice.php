		<style>
			.invoice-box {
				max-width: 800px;
				margin: auto;
				padding: 30px;
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
				font-size: 16px;
				line-height: 24px;
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #555;
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(2) {
				text-align: right;
			}

			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #333;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}

			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}

			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}

			@media only screen and (max-width: 600px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}

				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}

			/** RTL **/
			.invoice-box.rtl {
				direction: rtl;
				font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
			}

			.invoice-box.rtl table {
				text-align: right;
			}

			.invoice-box.rtl table tr td:nth-child(2) {
				text-align: left;
			}
		</style>

		<div class="invoice-box mt-3">
			<table cellpadding="0" cellspacing="0">
				<tr class="top">
					<td colspan="2">
						<table>
							<tr>
								<td class="title">
									<img src="<?php echo base_url('assets/img/edukidos_logo.png') ?>" style="width: 20%; max-width: 300px; float:left" />
									<h1 class="mt-3 ml-5 pl-5"><b>INVOICE</b></h1>
								</td>

								<td>
									<b>COMPANY</b><br />
									Created: January 1, 2015<br />
									Due: February 1, 2015
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="information">
					<td colspan="2">

						<hr class="mb-3 mt-0" style="height:4px;border:none;color:#333;background-color:#333;">

						<table>
							<tr>
								<td>
									<b>CUSTOMER</b><br />
									<?= $rekapDetail->nama_customer ?><br />
									<?= $rekapDetail->alamat ?><br />
									<?= $rekapDetail->email ?><br />
								</td>

								<td style="float: right;">
									<b>Tanggal Selesai</b><br />
									<?= $rekapDetail->tgl_kirim ?><br />

								</td>

								<td style="float: right;">
									<b>Invoice Number</b><br />
									<?= $rekapDetail->no_inv ?><br />

									<br>

									<b>Nama Pekerjaan</b><br />
									<?= $rekapDetail->nama_kerja ?><br />
								</td>

								<td style="float: right;">
									<b>Tanggal Order</b><br />
									<?= $rekapDetail->tgl_order ?><br />

									<br>

									<b>Kategori</b><br />
									<?= $rekapDetail->nama_kategori ?><br />
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			<div class="table-responsive">
				<table>
					<tr class="heading">
						<td>Deskripsi</td>
						<td>Harga</td>
						<td style="text-align: center;">Panjang</td>
						<td style="text-align: center;">Lebar</td>
						<td>Qty</td>
						<td>Jumlah</td>
					</tr>

					<tr class="item">
						<td><?= $rekapDetail->nama_bahan ?></td>
						<td><?= 'Rp. ' . number_format($rekapDetail->harga_jual, 0, ',', '.') ?></td>
						<td style="text-align: center;"><?= $rekapDetail->panjang ?></td>
						<td style="text-align: center;"><?= $rekapDetail->lebar ?></td>
						<td><?= $rekapDetail->jumlah  ?></td>

						<?php
						$totalUkuran = $rekapDetail->panjang + $rekapDetail->lebar;
						$totalHargaSatuan =  $totalUkuran * $rekapDetail->harga_jual;
						$totalSemua = $totalHargaSatuan * $rekapDetail->jumlah;
						?>

						<td><?= 'Rp. ' . number_format($totalSemua, 0, ',', '.')  ?></td>
					</tr>

					<tr class="item">
						<td>Biaya Design</td>
						<td><?= 'Rp. ' . number_format($rekapDetail->biaya_design, 0, ',', '.') ?></td>
						<td style="text-align: center;">-</td>
						<td style="text-align: center;">-</td>
						<td>-</td>
						<td><?= 'Rp. ' . number_format($rekapDetail->biaya_design, 0, ',', '.') ?></td>
					</tr>


					<tr class="total">
						<td></td>
						<td></td>
						<td></td>
						<td></td>

						<td style="float: right;"><b>Total</b></td>
						<?php
						$biaya_design = $rekapDetail->biaya_design;
						$total = $totalSemua + $biaya_design;
						?>
						<td><b><?= 'Rp. ' . number_format($total, 0, ',', '.') ?></b></td>
					</tr>
				</table>
			</div>
		</div>