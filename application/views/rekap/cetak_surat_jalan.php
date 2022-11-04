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
				<table class="table mb-0">
					<tr>
						<td style="border-top: 0px; text-align: center; vertical-align: middle;">
							<img src="<?php echo base_url('assets/img/logo_digimaxie-rbg.png') ?>" style="width: 33%; max-width: 300px; float:left;" />
							<h1><b>SURAT JALAN</b></h1>
						</td>
						<td class="text-right" style="border-top: 0px;">
							<b>Alamat</b>
							<br>PT. Edukidos Madina Creativa Jl. Muhammad Thohir
							<br>Ruko Podomoro Golf View B3 No.10 Gunung Putri, Kab. Bogor
							<br>Telp. 081384434480
						</td>
						<td style="border-top: 0px;padding-left: 0px">
							<img src="<?php echo base_url('assets/qrcache/' . $rekapDetail->id_order . '.png') ?>" style="width: 100%; max-width: 100px; float:right" />
						</td>
					</tr>
				</table>

				<hr class="mb-3 mt-0" style="height:4px;border:none;color:#333;background-color:#333;">

				<table class="tbl">
					<tr>
						<td width="140px">ID Surat Jalan</td>
						<td>: <?= $rekapDetail->id_surat ?></td>
						<td class="text-right" width="180px">Depok, <?= $rekapDetail->tgl_kirim ?></td>
					</tr>
					<tr>
						<td>Kepada Yth</td>
						<td>: <?= $rekapDetail->nama_customer ?></td>
						<td class="text-right" width="180px">Kendaraan : <?= $rekapDetail->jenis_kendaraan ?></td>
					</tr>
					<tr>
						<td>Email</td>
						<td>: <?= $rekapDetail->email ?></td>
						<td class="text-right" width="180px">Plat Nomor : <?= $rekapDetail->plat_nomor ?></td>
					</tr>
					<tr>
						<td>No. HP</td>
						<td>: <?= $rekapDetail->no_hp ?></td>
					</tr>
					<tr>
						<td>Alamat Kirim</td>
						<td>: <?= $rekapDetail->alamat ?></td>
					</tr>
				</table>
			</div>
		</div>
		<div class="row">
			<div class="col-12 mt-3">
				<p class="tab">Dengan Hormat</p>
				<p class="tab">Bersama ini kami kirimkan barang-barang sebagai berikut</p>
			</div>
		</div>

		<div class="row">
			<div class="col-12 mt-3">
				<table class="table table-bordered table-sm">
					<thead style="background-color: lightgrey;">
						<tr>
							<th>Nama Pekerjaan</th>
							<th>Bahan</th>
							<th>Harga</th>
							<th>Panjang</th>
							<th>Lebar</th>
							<th>Qty</th>
							<th>Total</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><?= $rekapDetail->nama_kerja ?></td>
							<td><?= $rekapDetail->nama_bahan ?></td>
							<td><?= 'Rp. ' . number_format($rekapDetail->harga_jual, 0, ',', '.') ?></td>
							<td><?= $rekapDetail->panjang ?> cm</td>
							<td><?= $rekapDetail->lebar ?> cm</td>
							<td><?= $rekapDetail->jumlah ?></td>
							<?php
							$totalUkuran = $rekapDetail->panjang + $rekapDetail->lebar;
							$totalHargaSatuan =  $totalUkuran * $rekapDetail->harga_jual;
							$totalSemua = $totalHargaSatuan * $rekapDetail->jumlah;
							?>

							<td><?= 'Rp. ' . number_format($totalSemua, 0, ',', '.')  ?></td>
						</tr>
						<tr>
							<td>Biaya Design</td>
							<td>-</td>
							<td><?= 'Rp. ' . number_format($rekapDetail->biaya_design, 0, ',', '.') ?></td>
							<td>-</td>
							<td>-</td>
							<td>-</td>
							<td><?= 'Rp. ' . number_format($rekapDetail->biaya_design, 0, ',', '.') ?></td>
						</tr>
						<tr class="total">
							<?php if ($rekapDetail->dp_awal == 0) : ?>
								<td colspan="6" class="text-right"><b>DP Awal :</b></td>
								<td class="text-danger"><b>Tidak DP</b></td>
							<?php else : ?>
								<td colspan="6" class="text-right"><b>DP Awal :</b></td>
								<td><b><?= 'Rp. ' .  number_format($rekapDetail->dp_awal, 0, '.', '.') ?></b></td>
							<?php endif ?>
						</tr>
						<tr class="total">
							<td colspan="6" class="text-right"><b>Total :</b></td>
							<?php
							$biaya_design = $rekapDetail->biaya_design;
							$total = $totalSemua + $biaya_design;
							?>
							<td><b><?= 'Rp. ' . number_format($total, 0, ',', '.') ?></b></td>
						</tr>
						<tr class="total">
							<td colspan="6" class="text-right"><b></b></td>
							<?php
							$biaya_design = $rekapDetail->biaya_design;
							$total = $totalSemua + $biaya_design;
							?>
							<td><button class="lunas btn-success">Lunas</button></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>

		<div class="row">
			<div class="col-12">
				<p>Catatan :</p>
				<p>Barang-barang tersebut di atas diserahkan dalam jumlah cukup & baik, tidak dapat dikembalikan tanpa perjanjian terlebih dahulu.
					<br>Bila ada keluhan atas barang-barang yang dikirim ini, agar diberitahukan kepada kami selambat-lambatnya dalam waktu 2(dua) hari.
				</p>
			</div>
		</div>

		<div class="row">
			<div class="col-12 mt-4">
				<table class="tbl">
					<tr height="110px">
						<td class="text-center">PENERIMA</td>
						<td class="text-center">PENGEMUDI</td>
						<td class="text-center">PENGIRIM</td>
						<td class="text-center">PEMERIKSA</td>
					</tr>
					<tr>
						<td class="text-center">( .................................... )</td>
						<td class="text-center">( .................................... )</td>
						<td class="text-center">( .................................... )</td>
						<td class="text-center">( .................................... )</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>
