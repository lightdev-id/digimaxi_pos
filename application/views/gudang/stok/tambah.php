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

			<div class="col-md-4">
				<div class="form-group">
					<label for="last">NOMER PO</label>
					<input type="text" class="form-control" name="no_po">
				</div>
			</div>

			<div class="col-md-4">
				<div class="form-group">
					<label for="last">Kategori</label>
					<select class="form-control" name="kategori" id="kategori" onchange="return cariKategori();" required><?php foreach ($kategori as $i) { ?>
							<option selected disabled>-- PILIH KATEGORI --</option>
							<option value="<?php echo $i['id']; ?>"><?php echo $i['nama_kategori']; ?></option>
						<?php } ?>
					</select>
				</div>
			</div>

			<div class="col-md-4">
				<div class="form-group">
					<label for="last">Bahan Baku</label>
					<select class="form-control" id="id" name="id_barang" required>

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
					<label for="last">TANGGAL</label>
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

<script>
	function cariKategori() {
		var kategori = document.getElementById('kategori').value;
		$.ajax({
			url: "<?= base_url() ?>Order/cariBahan/" + kategori,
			data: '&kategori=' + kategori,

			success: function(result) {
				var data = JSON.parse(result);
				var i;
				var html = '';
				var $select = $("#id").selectize();
				var selectize = $select[0].selectize;
				selectize.clearOptions();
				for (i = 0; i < data.length; i++) {
					// html += '<option value="' + data[i].id_bahan + '">' + data[i].nama_bahan + '</option>';
					selectize.addOption([{
						text: data[i].nama_bahan,
						value: data[i].id_bahan
					}]);
				}
			}
		})
	}
</script>
