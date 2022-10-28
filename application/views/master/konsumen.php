<script type="text/javascript">
	$(document).ready(function() {

		$('#example').DataTable({
			"columnDefs": [{
				"width": "2%",
				"targets": 0
			}]
		});
	});
</script>

<?php if ($this->session->flashdata('input-berhasil')) : ?>
	<script type="text/javascript">
		let timerInterval
		Swal.fire({
			title: 'Data Konsumen Ditambahkan!',
			html: ' ',
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
	<?= $this->session->flashdata('input-berhasil') ?>
<?php endif ?>

<?php if ($this->session->flashdata('update-berhasil')) : ?>
	<script type="text/javascript">
		let timerInterval
		Swal.fire({
			title: 'Data Konsumen Berhasil Update!',
			html: ' ',
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
	<?= $this->session->flashdata('update-berhasil') ?>
<?php endif ?>

<?php if ($this->session->flashdata('hapus-berhasil')) : ?>
	<script type="text/javascript">
		let timerInterval
		Swal.fire({
			title: 'Data Konsumen Berhasil di Hapus!',
			html: ' ',
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
	<?= $this->session->flashdata('hapus-berhasil') ?>
<?php endif ?>


<div class="container">
	<h3>Data Konsumen</h3>
	<a class="btn btn-sm btn-success" href="<?= base_url('Master/tambah_konsumen'); ?>">+ Tambah Konsumen</a>
	<table id="example" class="display" style="width:100%">
		<thead>
			<tr>
				<th>ID</th>
				<th>Nama</th>
				<th>Alamat</th>
				<th>No. HP</th>
				<th>Email</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
			foreach ($konsumen as $b) {
			?>
				<tr>
					<td><?php echo $b->id ?></td>
					<td><?= $b->nama_customer ?></td>
					<td><?= $b->alamat ?></td>
					<td><?= $b->no_hp ?></td>
					<td><?= $b->email ?></td>
					<td><a class="btn btn-sm btn-primary" href="<?= base_url('Master/edit_konsumen/') . $b->id; ?>">Edit</a>
						<a class="btn btn-sm btn-danger" href="<?= base_url('Master/hapus_konsumen/') . $b->id; ?>" onclick="return confirm('Anda Yakin Ingin Menghapus Data Konsumen ID : <?= $b->id ?> Ini?');">Hapus</a>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
