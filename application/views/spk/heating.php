<script type="text/javascript">
	$(document).ready(function() {
		$('#example').DataTable();
	});
</script>

<?php if ($this->session->flashdata('heating_selesai')) : ?>
	<script type="text/javascript">
		let timerInterval
		Swal.fire({
			title: 'Heating Selesai!',
			html: 'Segera Lakukan Heating pada Produksi!',
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
	<?= $this->session->flashdata('heating_selesai') ?>
<?php endif ?>

<div class="container">
	<h3>SPK - HEATING</h3>
	<div class="table-responsive">
		<table id="example" class="display" style="width:100%">
			<thead>
				<tr>
					<th>Status Urgensi</th>
					<th>Nama Customer</th>
					<th>Nama Pekerjaan</th>
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
						<td><?php $favcolor = $b->urgensi;
								switch ($favcolor) {
									case "1":
										echo "<button class='btn btn-sm btn-danger'>SEGERA DIKERJAKAN</button>";
										break;
									default:
										echo "Tidak";
								}
								?></td>
						<td><?= $b->nama_customer ?></td>
						<td><?= $b->nama_kerja ?></td>
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
						<td><?php $favcolor = $b->status_bayar;
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
							<form action="<?= base_url('Spk/ambil_kerja_heating/') ?>" method="post">
								<input type="hidden" name="id_order" value="<?= $b->id_order; ?>">
								<input type="submit" style="margin-bottom:2%;" class="btn btn-sm btn-primary" value="Selesaikan Heating">
							</form>
							<a href="<?= base_url('Spk/download/') . $b->file; ?>" class="btn btn-sm btn-primary" value="Download Data">Download Data</a>
						</td>
					<?php } ?>
			</tbody>
		</table>
	</div>
</div>
