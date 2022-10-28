<script type="text/javascript">
	$(document).ready(function() {
		$('#example').DataTable();
	});
</script>

<?php if ($this->session->flashdata('finishing_cutting')) : ?>
	<script type="text/javascript">
		let timerInterval
		Swal.fire({
			title: 'Cutting Selesai!',
			html: 'Segera Lakukan Finishing Packing!',
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
	<?= $this->session->flashdata('finishing_cutting') ?>
<?php endif ?>

<div class="container">
	<h3>FINISHING - CUTTING</h3>
	<div class="table-responsive">
		<table id="example" class="display" style="width:100%">
			<thead>
				<tr>
					<th>Status Urgensi</th>
					<th>Nama Pekerjaan</th>
					<th>Nama Customer</th>
					<th>Tanggal Order</th>
					<th>Qty</th>
					<th>Status Bayar</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach ($finishCutting as $b) {
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
							?>
						</td>
						<td><?= $b->nama_kerja ?></td>
						<td><?= $b->nama_customer ?></td>
						<td><?= $b->tgl_order ?></td>
						<td><?= $b->jumlah ?></td>
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
								?>
						</td>
						<td>
							<a class="btn btn-sm btn-primary" href="<?= base_url('Finishing/finishing_cutting/' . $b->id_order) ?>">Selesaikan Cutting</a>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>
