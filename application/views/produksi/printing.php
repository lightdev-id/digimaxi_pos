<script type="text/javascript">
	$(document).ready(function() {
		$('#example').DataTable();
	});
</script>

<?php if ($this->session->flashdata('printing_selesai')) : ?>
	<script type="text/javascript">
		let timerInterval
		Swal.fire({
			title: 'Printing Selesai!',
			html: 'Segera Lakukan SPK Heating!',
			icon: 'success',
			timer: 1500,

			didOpen: () => {
				Swal.showLoading()
				const b = Swal.getHtmlContainer().querySelector('b')
			},
			willClose: () => {
				clearInterval(timerInterval)
			}

		})
	</script>
	<?= $this->session->flashdata('printing_selesai') ?>
<?php endif ?>

<div class="container">
	<h3>PRODUKSI - PRINTING</h3>
	<div class="table-responsive">
		<table id="example" class="display" style="width:100%">
			<thead>
				<tr>
					<th>Status Urgensi</th>
					<th>Nama Pekerjaan</th>
					<th>Nama Customer</th>
					<th>Tanggal Order</th>
					<th>Qty</th>
					<th>Finishing</th>
					<th>Status Bayar</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach ($orderMasuk as $b) {
				?>
					<tr>
						<td>
							<?php $favcolor = $b->urgensi;
							switch ($favcolor) {
								case "1":
									echo "<button class='btn btn-sm btn-danger'>SEGERA DIKERJAKAN</button>";
									break;
								default:
									echo "Tidak";
							}
							?>
						</td>
						<td><?= $b->nama_kerja ?></td>
						<td><?= $b->nama_customer ?></td>

						<td><?= $b->tgl_order ?></td>
						<td><?= $b->jumlah ?></td>
						<td><?php $favcolor = $b->finishing;
								switch ($favcolor) {
									case "cutting":
										echo "Cutting";
										break;
									case "packing":
										echo "Packing";
										break;
									default:
										echo "Tidak";
								}
								?>
						</td>
						<td><?php
								$favcolor = $b->status_bayar;

								switch ($favcolor) {
									case "0":
										echo "<button class='btn btn-sm btn-danger'>Belum Lunas</button>";
										break;
									case "1":
										echo "<button class='btn btn-sm btn-success'>Sudah Lunas</button>";
										break;

									default:
										echo "Tidak";
								}
								?></td>

						<td>
							<a href="<?= base_url('Spk/download/') . $b->file; ?>" style="margin-bottom: 2%;" class="btn btn-sm btn-primary" value="Download Data">Download Data</a>
							<a class="btn btn-sm btn-primary" style="margin-bottom: 2%;" href="<?= base_url('Spk/cetak_spk/') . $b->id_order; ?>">Cetak SPK</a>
							<a class="btn btn-sm btn-primary" href="<?= base_url('Produksi/produksi_printing_selesai/' . $b->id_order) ?>">Selesaikan Printing</a>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>
