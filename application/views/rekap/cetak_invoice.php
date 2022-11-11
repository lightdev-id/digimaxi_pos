<style>
	* {
		color: black;
	}

	.tbl {
		width: 100%;
		line-height: inherit;
		text-align: left;
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
							<img src="<?php echo base_url('assets/img/logo_digimaxie-rbg.png') ?>" style="width: 30%; max-width: 300px; float:left" />
							<h1 class="mt-4 ml-5 pl-5"><b>INVOICE</b></h1>
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
						<td width="550px"><b>CUSTOMER</b></td>
						<td><b>Tanggal Order</b></td>
						<td><b>Invoice Number</b></td>
						<td><b>Tanggal Selesai</b></td>
					</tr>
					<tr>
						<td><?= $rekapDetail->nama_customer ?></td>
						<td><?= $rekapDetail->tgl_order ?></td>
						<td><?= $rekapDetail->no_inv ?></td>
						<td><?= $rekapDetail->tgl_kirim ?></td>
					</tr>
					<tr>
						<td><?= $rekapDetail->email ?></td>
						<td></td>
					</tr>
					<tr>
						<td><?= $rekapDetail->no_hp ?></td>
					</tr>
					<tr>
						<td><?= $rekapDetail->alamat ?></td>
					</tr>
				</table>
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
							<td><?= $rekapDetail->panjang ?> <?= $rekapDetail->satuan ?></td>
							<td><?= $rekapDetail->lebar ?> <?= $rekapDetail->satuan ?></td>
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
			<div class="col-12 mt-4">
				<table class="tbl">
					<tr>
						<td class="text-center" height="50px">KEUANGAN</td>
						<td class="text-center" height="50px">CUSTOMER</td>
					</tr>
					<tr height="130px">
						<td class="text-center">( .................................... )</td>
						<td class="text-center">( .................................... )</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>
