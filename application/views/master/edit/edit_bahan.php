<div class="container">

	<hr>
	<div class="col-12 d-flex flex-row align-items-center justify-content-between pl-0">
		<h5 class="mb-0">Spesifikasi & File Order</h5>
		<button type="button" class="btn btn-sm btn-warning float-right" data-toggle="modal" data-target="#batal">
			<i class="fa-solid fa-xmark pr-2"></i>Batal
		</button>
	</div>
	<hr>
	<?php foreach ($bahan as $u) { ?>
		<form action="<?php echo base_url() . 'Master/update_bahan'; ?>" method="post">
			<input type="hidden" name="id_bahan" value="<?php echo $u->id_bahan ?>">
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label for="last">NAMA BAHAN</label>
						<input type="text" name="nama_bahan" value="<?= $u->nama_bahan ?>" class="form-control" required>
					</div>
				</div>

				<div class="col-md-4">
					<div class="form-group">
						<label for="last">HARGA BELI</label>
						<input class="form-control" type="text" oninput="return rupiah();" id="harga_beli" name="harga_beli" value="<?= 'Rp. ' . number_format($u->harga_beli, 0, ',', '.') ?>" required>
					</div>
				</div>

				<div class="col-md-4">
					<div class="form-group">
						<label for="last">HARGA JUAL</label>
						<input type="text" class="form-control" oninput="return rupiah();" name="harga_jual" id="RP" value="<?= 'Rp. ' . number_format($u->harga_jual, 0, ',', '.') ?>" required>
					</div>
				</div>
			</div>

			<hr>
			<div class="col-12 d-flex flex-row align-items-center justify-content-between pl-0">
				<h5 class="mb-0">Masukkan Ukuran Roll</h5>
			</div>
			<hr>

			<div class="form-row align-items-center">

				<div class="col-md-3">
					<label for="panjang">PANJANG</label>
					<div class="input-group mb-2">
						<input type="text" class="form-control" name="panjang_roll" value="<?= $u->panjang_roll ?>" required>
						<div class="input-group-append">
							<span id="cmm1" class="input-group-text">m</span>
						</div>
					</div>
				</div>

				<div class="col-md-3">
					<label for="lebar">LEBAR</label>
					<div class="input-group mb-2">
						<input type="text" class="form-control" name="lebar_roll" value="<?= $u->lebar_roll ?>" required>
						<div class="input-group-append">
							<span id="cmm2" class="input-group-text">m</span>
						</div>
					</div>
				</div>

				<div class="col-md-1">
					<label for="last">Satuan</label>
					<select name="satuan" id="satuan" class="form-control" onchange="return satuanCek()">
						<option value="m" selected>m</option>
						<option value="cm">cm</option>
					</select>
				</div>
			</div>

			<input class="btn btn-primary mt-2" type="submit" name="" value="Update Bahan">

		</form>

		<br>
	<?php } ?>
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
				<p>Jika anda menekan tombol "Ya" maka data yang sudah anda ubah tidak akan Diubah !</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
				<a href="<?= base_url('Master/data_bahan') ?>" type="button" class="btn btn-primary">Ya</a>
			</div>
		</div>
	</div>
</div>

<script>
	function satuanCek() {
		let satuan = $("#satuan").val();
		console.log(satuan)
		if (satuan == "m") {
			$('#cmm1').text("m");
			$('#cmm2').text("m");
			return "m";
		} else {
			$('#cmm1').text("cm");
			$('#cmm2').text("cm");
			return "cm";
		}
	}
</script>

<script>
	function rupiah() {
		var harga_beli = document.getElementById("harga_beli");
		harga_beli.value = formatRupiah(harga_beli.value, "Rp. ");
	}

	function formatRupiah(angka, prefix) {
		var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split = number_string.split(','),
			sisa = split[0].length % 3,
			rupiah = split[0].substr(0, sisa),
			ribuan = split[0].substr(sisa).match(/\d{3}/gi);

		if (ribuan) {
			separator = sisa ? '.' : '';
			rupiah += separator + ribuan.join('.');
		}

		rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
		return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
	}
</script>

<script>
	/* Dengan Rupiah */
	var dengan_rupiah = document.getElementById('RP');
	dengan_rupiah.addEventListener('keyup', function(e) {
		dengan_rupiah.value = formatRupiah(this.value, 'Rp ');
	});

	/* Fungsi */
	function formatRupiah(angka, prefix) {
		var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split = number_string.split(','),
			sisa = split[0].length % 3,
			rupiah = split[0].substr(0, sisa),
			ribuan = split[0].substr(sisa).match(/\d{3}/gi);

		if (ribuan) {
			separator = sisa ? '.' : '';
			rupiah += separator + ribuan.join('.');
		}

		rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
		return prefix == undefined ? rupiah : (rupiah ? 'Rp ' + rupiah : '');
	}
</script>
