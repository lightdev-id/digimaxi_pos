<script type="text/javascript">
	$(document).ready(function() {
		$('#example').DataTable({
			"columnDefs": [{
				"width": "18%",
				"targets": 0
			}]
		});
	});
</script>

<?php if ($this->session->flashdata('pembelian_sukses')) : ?>
	<script type="text/javascript">
		let timerInterval
		Swal.fire({
			title: 'Pembelian Stok Sukses!',
			html: 'Order telah di input, silahkan di cek!',
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
	<?= $this->session->flashdata('pembelian_sukses') ?>
<?php endif ?>

<div class="container">
	<h3>Data Stok</h3>
	<a class="btn btn-sm btn-success mb-3" href="<?= base_url('Gudang/tambah_stok'); ?>">+ Tambah Stok</a>
	<div class="table-responsive">
		<table id="example" class="display" style="width:100%">
			<thead>
				<tr>
					<th>Kategori</th>
					<th>Nama Bahan</th>
					<th>Stok</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($allPembayaran as $b) : ?>
					<tr>
						<td><?= $b->nama_kategori ?></td>
						<td><?= $b->nama_bahan ?></td>
						<?php if ($b->stok == 0) : ?>
							<td style="color: red">Stok Habis</td>
						<?php else : ?>
							<td><?= $b->stok ?></td>
						<?php endif ?>
					</tr>
				<?php endforeach; ?>
			</tbody>

		</table>
	</div>
</div>
