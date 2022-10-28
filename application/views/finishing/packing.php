<script type="text/javascript">
	$(document).ready(function() {
		$('#example').DataTable();
	});
</script>

<?php if ($this->session->flashdata('finishing_packing')) : ?>
	<script type="text/javascript">
		let timerInterval
		Swal.fire({
			title: 'Packing Selesai!',
			html: 'Segera Lakukan Pengecekan pada Pembayaran atau Surat Jalan!',
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
	<?= $this->session->flashdata('finishing_packing') ?>
<?php endif ?>

<div class="container">
	<h3>FINISHING - PACKING</h3>
	<div class="table-responsive">
		<table id="example" class="display" style="width:100%">
			<thead>
				<tr>
					<th>Status Urgensi</th>
					<th>Nama Customer</th>
					<th>Tanggal Order</th>
					<th>Qty</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach ($finishPacking as $b) {
				?>
					<tr>
						<td><?php
								$favcolor = $b->urgensi;

								switch ($favcolor) {
									case "1":
										echo "<button class='btn btn-sm btn-danger'>SEGERA DIKERJAKAN</button>";
										break;
									default:
										echo "Tidak";
								}
								?></td>
						<td><?= $b->nama_customer ?></td>
						<td><?= $b->tgl_order ?></td>
						<td><?= $b->jumlah ?></td>
						<td>
							<a class="btn btn-sm btn-primary" href="<?= base_url('Finishing/finishing_packing/' . $b->id_order) ?>">Selesaikan Packing</a>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>
