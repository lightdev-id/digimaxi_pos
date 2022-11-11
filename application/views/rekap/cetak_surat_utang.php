<style>
	* {
		color: black;
	}

	.tbl {
		width: 100%;
		line-height: inherit;
		text-align: left;
	}

	table tr td {
		vertical-align: top;
	}

	p {
		margin-bottom: 0px;
	}

	p.tab {
		margin-left: 20px;
	}

	.lunas {
		padding: 0.25rem 0.5rem;
		font-size: 0.875rem;
		line-height: 1.5;
		border-radius: 0.2rem;
		pointer-events: none;
		width: 80%;
	}
</style>
<div class="container my-2">
	<div class="card p-4 my-3">
		<div class="row">
			<div class="col-12">

				<div class="row">
					<div class="col-6">
						<img src="<?php echo base_url('assets/img/logo_digimaxie-rbg.png') ?>" style="width: 33%; max-width: 300px;" />
					</div>
					<div class="col-6">
						<img src="<?php echo base_url('assets/qrcache/' . $orderUtang->id_order . '.png') ?>" style="width: 100%; max-width: 100px; float:right" />
					</div>
				</div>
				<div class="row">
					<div class="col-12 text-center">
						<h1><b>KARTU PIUTANG</b></h1>
					</div>
				</div>
				<div class="row">
					<div class="col-6">
						<b>Alamat</b>
						<br>PT. Edukidos Madina Creativa
						<br>Jl. Muhammad Thohir Ruko Podomoro Golf View B3 No.10 Gunung Putri, Kab. Bogor
					</div>
					<div class="col-6">
						<table>
							<tr>
								<td><u>Rinkasan Transaksi : </u></td>
							</tr>
							<tr>
								<td>Tanggal Cetak</td>
								<?php
								$originalDate = $orderUtang->tgl_cetak;
								$tanggalCetak = date("d", strtotime($originalDate));
								$bulanCetak = date("m", strtotime($originalDate));
								switch ($bulanCetak) {
									case "1":
										$bulanCetak = "Januari";
										break;
									case "2":
										$bulanCetak = "Februari";
										break;
									case "3":
										$bulanCetak = "Maret";
										break;
									case "4":
										$bulanCetak = "April";
										break;
									case "5":
										$bulanCetak = "Mei";
										break;
									case "6":
										$bulanCetak = "Juni";
										break;
									case "7":
										$bulanCetak = "Juli";
										break;
									case "8":
										$bulanCetak = "Agustus";
										break;
									case "9":
										$bulanCetak = "September";
										break;
									case "10":
										$bulanCetak = "Oktober";
										break;
									case "11":
										$bulanCetak = "November";
										break;
									case "12":
										$bulanCetak = "Desember";
										break;
								};
								$tahunCetak = date("Y", strtotime($originalDate));
								?>
								<td>: <?= $tanggalCetak . "-" . $bulanCetak . "-" . $tahunCetak ?></td>
							</tr>
							<tr>
								<td>Total Tagihan</td>
								<td>: <?= 'Rp. ' . number_format($orderUtang->harga_bahan, 0, ',', '.') ?></td>
							</tr>
							<tr>
								<td>Total Jatuh Tempo yang harus dibayar &nbsp;&nbsp;</td>
								<td>: <?= 'Rp. ' . number_format($orderUtang->harga_bahan - $orderUtang->dp_awal, 0, ',', '.') ?></td>
							</tr>
						</table>
					</div>
				</div>

				<hr class="mb-3 mt-2" style="height:4px;border:none;color:#333;background-color:#333;">

			</div>
		</div>

		<div class="row">
			<div class="col-12">
				<div class="table-responsive">
					<u>Detail - Kartu Piutang</u>
					<table>
						<tr>
							<td>Nama Customer &nbsp;&nbsp;</td>
							<td>: <?= $orderUtang->nama_customer ?></td>
						</tr>
						<tr>
							<td>Nama Pesanan </td>
							<td>: <?= $orderUtang->nama_kerja ?></td>
						</tr>
					</table>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12 mt-2">
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead style="background-color: lightgrey;">
							<tr>
								<th>NO</th>
								<th>Tanggal Invoice</th>
								<th>Tanggal Jatuh Tempo</th>
								<th>No. Invoice</th>
								<th>Jumlah/Amount</th>
								<th>Lwt Jatuh Tempo</th>
								<th>Keterangan</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>1</td>
								<?php
								$originalDateInvoice = $orderUtang->tgl_order;
								$tanggalInvoice = date("d", strtotime($originalDateInvoice));
								$bulanInvoice = date("m", strtotime($originalDateInvoice));
								switch ($bulanInvoice) {
									case "1":
										$bulanInvoice = "Januari";
										break;
									case "2":
										$bulanInvoice = "Februari";
										break;
									case "3":
										$bulanInvoice = "Maret";
										break;
									case "4":
										$bulanInvoice = "April";
										break;
									case "5":
										$bulanInvoice = "Mei";
										break;
									case "6":
										$bulanInvoice = "Juni";
										break;
									case "7":
										$bulanInvoice = "Juli";
										break;
									case "8":
										$bulanInvoice = "Agustus";
										break;
									case "9":
										$bulanInvoice = "September";
										break;
									case "10":
										$bulanInvoice = "Oktober";
										break;
									case "11":
										$bulanInvoice = "November";
										break;
									case "12":
										$bulanInvoice = "Desember";
										break;
								};
								$tahunInvoice = date("Y", strtotime($originalDateInvoice));
								?>
								<td><?= $tanggalInvoice . "-" . $bulanInvoice . "-" . $tahunInvoice ?></td>
								<?php
								$originalDateTempo = $orderUtang->tgl_jatuh_tempo;
								$tanggalTempo = date("d", strtotime($originalDateTempo));
								$bulanTempo = date("m", strtotime($originalDateTempo));
								switch ($bulanTempo) {
									case "1":
										$bulanTempo = "Januari";
										break;
									case "2":
										$bulanTempo = "Februari";
										break;
									case "3":
										$bulanTempo = "Maret";
										break;
									case "4":
										$bulanTempo = "April";
										break;
									case "5":
										$bulanTempo = "Mei";
										break;
									case "6":
										$bulanTempo = "Juni";
										break;
									case "7":
										$bulanTempo = "Juli";
										break;
									case "8":
										$bulanTempo = "Agustus";
										break;
									case "9":
										$bulanTempo = "September";
										break;
									case "10":
										$bulanTempo = "Oktober";
										break;
									case "11":
										$bulanTempo = "November";
										break;
									case "12":
										$bulanTempo = "Desember";
										break;
								};
								$tahunTempo = date("Y", strtotime($originalDateTempo));
								?>
								<td><?= $tanggalTempo . "-" . $bulanTempo . "-" . $tahunTempo ?></td>
								<?php
								$getTahun = explode("-", $orderUtang->tgl_order);
								$getBulan = explode("-", $orderUtang->tgl_order);
								$getNoInv = explode("INV-", $orderUtang->no_inv);
								switch ($bulan_romawi = $getBulan[1]) {
									case "01":
										$bulan_romawi = "I";
										break;
									case "02":
										$bulan_romawi = "II";
										break;
									case "03":
										$bulan_romawi = "III";
										break;
									case "04":
										$bulan_romawi = "IV";
										break;
									case "05":
										$bulan_romawi = "V";
										break;
									case "06":
										$bulan_romawi = "VI";
										break;
									case "07":
										$bulan_romawi = "VII";
										break;
									case "08":
										$bulan_romawi = "VIII";
										break;
									case "09":
										$bulan_romawi = "IX";
										break;
									case "10":
										$bulan_romawi = "X";
										break;
									case "11":
										$bulan_romawi = "XI";
										break;
									case "12":
										$bulan_romawi = "XII";
										break;
								}
								?>
								<td><?= $getNoInv[1] ?>/KP/<?= $bulan_romawi ?>/<?= $getTahun[0] ?></td>
								<?php $totalUtang = $orderUtang->harga_bahan - $orderUtang->dp_awal; ?>
								<td><?= 'Rp. ' . number_format($totalUtang, 0, ',', '.') ?></td>
								<?php
								$tglOrder = strtotime($orderUtang->tgl_order);
								$tglTempo = strtotime($orderUtang->tgl_jatuh_tempo);

								$beda = $tglTempo - $tglOrder;
								$sisaHari = ($beda / 24 / 60 / 60);
								?>
								<td><?= $sisaHari ?> Hari</td>
								<td><?= $orderUtang->keterangan ?></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12 text-center">
				<?php $totalUtang = $orderUtang->harga_bahan - $orderUtang->dp_awal; ?>
				<h3><b>Total &nbsp;&nbsp; : <?= 'Rp. ' . number_format($totalUtang, 0, ',', '.') ?></b></h1>
			</div>
		</div>

	</div>
</div>
