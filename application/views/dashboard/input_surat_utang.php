<?php if ($this->session->flashdata('surat_berhasil')) : ?>
	<script type="text/javascript">
		let timerInterval
		Swal.fire({
			title: 'Surat Jalan Berhasil Di Input!',
			html: 'Silahkan lakukan pengiriman!',
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
	<?= $this->session->flashdata('surat_berhasil') ?>
<?php endif ?>

<div class="container">
	<hr>
	<div class="col-12 d-flex flex-row align-itemscenter justify-content-between pl-0">
		<h5 class="mb-0 mt-1">Data</h5>
		<button type="button" class="btn btn-sm btn-warning float-right" data-toggle="modal" data-target="#batal">
			<i class="fa-solid fa-xmark pr-2"></i>Batal
		</button>
	</div>
	<hr>
	<?php foreach ($bahan as $u) { ?>
		<form action="<?php echo base_url() . 'Rekap/save_surat_utang'; ?>" method="post">
			<input type="hidden" name="id_order" value="<?php echo $u->id_order ?>">
			<div class="row">

				<div class="col-md-3">
					<div class="form-group">
						<label for="last">Nama Customer</label>
						<input class="form-control" type="text" name="nama_customer" value="<?php echo $u->nama_customer ?>" readonly>
					</div>
				</div>

			</div>

			<div class="row">

				<div class="col-md-3">
					<div class="form-group">
						<label for="last">Nama Pekerjaan</label>
						<input type="text" name="nama_bahan" value="<?= $u->nama_kerja ?>" class="form-control" readonly>
					</div>
				</div>

				<div class="col-md-3">
					<div class="form-group">
						<label for="last">Tanggal Invoice</label>
						<input class="form-control" type="date" name="tgl_order" value="<?php echo $u->tgl_order ?>" readonly>
					</div>
				</div>

				<div class="col-md-3">
					<div class="form-group">
						<label for="last">Bahan Baku</label>
						<input class="form-control" type="text" name="bahan_baku" value="<?php echo $u->nama_bahan ?>" readonly>
					</div>
				</div>

				<div class="col-md-3">
					<div class="form-group">
						<label for="last">Jumlah</label>
						<input class="form-control" type="number" name="jumlah" value="<?php echo $u->jumlah ?>" readonly>
					</div>
				</div>
			</div>

			<hr>
			<h5>Input Surat Utang</h5>
			<hr>

			<div class="row">
				<div class="col-md-3">
					<div class="form-group">
						<label for="last">ID Surat Utang</label>
						<input class="form-control" type="text" name="id_utang" value="<?= uniqid(); ?>" readonly>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label for="last">Tanggal Cetak</label>
						<?php $date = date('Y-m-d') ?>
						<input class="form-control" type="date" name="tgl_cetak" value="<?= $date ?>" readonly>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label for="last">Tanggal Jatuh Tempo</label>
						<input class="form-control" type="date" name="tgl_jatuh_tempo" required>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label for="last">Total Jatuh Tempo Wajib Bayar</label>
						<?php $total = $u->harga_bahan - $u->dp_awal ?>
						<input class="form-control" type="text" name="total_jatuh_tempo" value="<?= 'Rp. ' . number_format($total, 0, '.', '.') ?>" readonly>
					</div>
				</div>

			</div>

			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label for="last">Keterangan</label>
						<textarea class="form-control" name="keterangan" cols="10" rows="2"></textarea>
					</div>
				</div>
			</div>
			<input class="btn btn-primary" type="submit" name="">
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
				<p>Jika anda menekan tombol "Ya" maka data yang sudah anda masukkan akan Hilang !</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
				<a href="<?= base_url('dashboard/pembayaran') ?>" type="button" class="btn btn-primary">Ya</a>
			</div>
		</div>
	</div>
</div>

<script>
	var rupiah = document.getElementById("rupiah");
	rupiah.addEventListener("keyup", function(e) {
		// tambahkan 'Rp.' pada saat form di ketik
		// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
		rupiah.value = formatRupiah(this.value, "Rp ");
	});

	/* Fungsi formatRupiah */
	function formatRupiah(angka, prefix) {
		var number_string = angka.replace(/[^,\d]/g, "").toString(),
			split = number_string.split(","),
			sisa = split[0].length % 3,
			rupiah = split[0].substr(0, sisa),
			ribuan = split[0].substr(sisa).match(/\d{3}/gi);

		// tambahkan titik jika yang di input sudah menjadi angka ribuan
		if (ribuan) {
			separator = sisa ? "." : "";
			rupiah += separator + ribuan.join(".");
		}

		rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
		return prefix == undefined ? rupiah : rupiah ? "Rp " + rupiah : "";
		console.log(rupiah);
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
