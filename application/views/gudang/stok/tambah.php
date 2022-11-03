<div class="container">
	<hr>
	<div class="col-12 d-flex flex-row align-items-center justify-content-between pl-0">
		<h5 class="mb-0">Tambah Stok</h5>
		<button type="button" class="btn btn-sm btn-warning float-right" data-toggle="modal" data-target="#batal">
			<i class="fa-solid fa-xmark pr-2"></i>Batal
		</button>
	</div>
	<hr>
	<form action="<?= base_url('Gudang/insert_pembelian'); ?>" method="post">
		<div class="row">

			<div class="col-md-6">
				<div class="form-group">
					<label for="last">NOMER PO</label>
					<input type="text" class="form-control" name="no_po" required>
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
					<label for="last">Bahan</label>
					<select class="form-control" name="id_bahan" id="id_bahan" required>
						<option selected disabled>-- PILIH BAHAN --</option>
						<?php foreach ($bahanBaku as $k) { ?>
							<option value="<?php echo $k['id_bahan']; ?>"><?php echo $k['nama_bahan']; ?></option>
						<?php } ?>
					</select>
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
					<label for="last">JUMLAH</label>
					<input type="number" class="form-control" name="jumlah" required>
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
					<label for="last">TANGGAL DATANG</label>
					<input type="date" class="form-control" name="tanggal" required>
				</div>
			</div>

		</div>
		<button class="btn btn-primary">Tambah Stok</button>
	</form>
</div>

<div class="modal fade" id="batal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Anda Yakin Ingin Membatalkan ?</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p>Jika anda menekan tombol "Ya" maka data yang sudah anda masukkan akan Hilang !</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
				<a href="<?= base_url('Beranda/stok') ?>" type="button" class="btn btn-primary">Ya</a>
			</div>
		</div>
	</div>
</div>
