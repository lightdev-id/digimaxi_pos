<style>
	input::-webkit-outer-spin-button,
	input::-webkit-inner-spin-button {
		-webkit-appearance: none;
		margin: 0;
	}
</style>
<?php if ($this->session->flashdata('order_berhasil')) : ?>
	<script type="text/javascript">
		let timerInterval
		Swal.fire({
			title: 'Order Berhasil!',
			html: 'Order telah di input, silahkan konfirmasi SPK!',
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
	<?= $this->session->flashdata('order_berhasil') ?>

<?php endif ?>
<div class="container">
	<hr>
	<h5>Data Customer & Urgensi</h5>
	<hr>
	<form action="<?= base_url('Order/tambah_order'); ?>" method="post" enctype="multipart/form-data">
		<div class="row">

			<div class="col-md-3">
				<div class="form-group">
					<label for="last">ID ORDER</label>
					<input type="text" class="form-control" value="<?= uniqid(); ?>" name="id_order" readonly>
				</div>
			</div>

			<div class="col-md-3">
				<div class="form-group">
					<label for="last">TANGGAL ORDER</label>
					<input type="date" class="form-control" name="tgl_order" required>
				</div>
			</div>

			<div class="col-md-3">
				<div class="form-group mb-2">
					<label for="last">NO. PO</label>
					<input type="text" class="form-control" name="no_po" required>
				</div>
				<input type="hidden" name="urgensi" value="0">
				<input type="checkbox" name="urgensi" value="1"> URGENT
			</div>

			<div class="col-md-5">
				<div class="form-group">
					<label for="last">NAMA KONSUMEN</label>
					<select class="form-control" name="nama" required>
						<option selected disabled>-- PILIH KONSUMEN --</option>
						<?php foreach ($customer as $i) { ?>
							<option value="<?php echo $i['id']; ?>"><?php echo $i['nama_customer']; ?></option>
						<?php } ?>
					</select><a style="margin-top:6px;" class="btn btn-primary btn-sm" href="<?= base_url('Master/tambah_konsumen'); ?>">Tambah Konsumen Baru</a>

				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label for="last">NO. INVOICE</label>
					<input type="text" name="no_inv" id="no_inv" class="form-control" readonly>
				</div>
			</div>
		</div>
</div>


<div class="container">

	<hr>
	<h5>Spesifikasi & File Order</h5>
	<hr>

	<div class="row">
		<div class="col-md-3">
			<div class="form-group">
				<label for="last">Nama Pekerjaan</label>
				<input type="text" name="nama_kerja" class="form-control" required>
			</div>
		</div>

		<div class="col-md-3">
			<div class="form-group">
				<label for="last">Bahan</label>
				<select class="form-control" name="id_bahan" id="id_bahan" onchange="cekStok()" required>
					<option selected disabled>-- PILIH BAHAN --</option>
					<?php foreach ($bahanBaku as $k) { ?>
						<option value="<?php echo $k['id_bahan']; ?>"><?php echo $k['nama_bahan']; ?></option>
					<?php } ?>
				</select>
			</div>
		</div>

		<div class="col-md-3">
			<div class="form-group">
				<label for="last">File Orderan</label>
				<input class="form-control" type="file" id="berkas" name="berkas">
				<label>max. 100mb</label>
			</div>
		</div>
	</div>

	<hr>
	<h5>Ukuran</h5>
	<hr>

	<div class="row" id="hilang">

		<div class="col-md-3">
			<label for="last">Panjang</label>
			<div class="input-group mb-3">
				<input class="form-control" onchange="return autofill();" id="panjang" type="number" name="panjang" required>
				<div class="input-group-append">
					<span class="input-group-text">cm</span>
				</div>
			</div>
		</div>

		<div class="col-md-3">
			<label for="last">Lebar</label>
			<div class="input-group mb-3">
				<input class="form-control" onchange="return autofill();" id="lebar" type="number" name="lebar" required>
				<div class="input-group-append">
					<span class="input-group-text">cm</span>
				</div>
			</div>
		</div>
	</div>

	<hr>
	<h5>Total Biaya</h5>
	<hr>
	<br>

	<div class="row">
		<div class="col-md-3">
			<div class="form-group">
				<label for="last">Jumlah Order</label>
				<input class="form-control" onchange="return autofill();" onkeyup="return cekBanyakStok()" id="id_bahan" type="number" min="1" value="1" name="jumlah" required>
			</div>
		</div>
		<div class="col-md-12">
			<label for="last">Note Order</label>
			<br>
			<textarea class="form-control mb-3" name="catatan"></textarea>
		</div>
		<div class="col-md-3">
			<div class="form-group">
				<label for="last">Biaya Cetak Satuan</label>
				<input class="form-control" id="harga_jual" type="text" name="harga_bahan" readonly>
			</div>
		</div>
		<div class="col-md-3">
			<div class="form-group">
				<label for="last">Biaya Cetak</label>
				<input class="form-control" id="harga_jual_semua" type="text" name="harga_bahan" readonly>
			</div>
		</div>

		<div class="col-md-3">
			<div class="form-group">
				<label for="last">Biaya Design</label>
				<input class="form-control" type="text" name="biaya_design" id="rupiah" placeholder="Masukkan 0 apabila tidak ada" required>
			</div>
		</div>
		<div class="col-md-3">
			<div class="form-group">
				<label for="last">DP Awal</label>
				<input class="form-control" type="text" name="dp_awal" id="dengan-rupiah" placeholder="Masukkan 0 apabila bayar cash" required>
			</div>
		</div>
	</div>

	<button class="btn btn-lg btn-primary">Submit</button>
	</form>
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
	var dengan_rupiah = document.getElementById('dengan-rupiah');
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

<script>
	function cekStok() {
		$.ajax({
			url: "<?= base_url() ?>Gudang/cek_stok/" + $('#id_bahan').val(),
			data: '&id_barang=' + id_bahan,

			success: function(result) {
				var data = JSON.parse(result);
				console.log(data);
				console.log(data.length);

				if (data.length == 0) {
					Swal.fire({
						icon: 'error',
						title: 'Stok Belum di Isi!',
						text: 'Mohon di Cek dan Lakukan Pengisian Stok!',
						footer: '<a href="<?= base_url('Gudang/tambah_stok') ?>">Isi Stok</a>'
					})
				} else if (data[0].stok <= 0) {
					Swal.fire({
						icon: 'warning',
						title: 'Stok Habis!',
						text: 'Mohon di Cek dan Lakukan Pengisian Stok!',
						footer: '<a href="<?= base_url('Gudang/tambah_stok') ?>">Isi Stok</a>'
					})
				}
			}
		})
	}

	function cekBanyakStok() {
		$.ajax({
			url: "<?= base_url() ?>Gudang/cek_stok/" + $('#id_bahan').val(),
			data: '&id_barang=' + id_bahan,

			success: function(result) {
				var data = JSON.parse(result);

				if (parseInt(data[0].stok) < parseInt(document.getElementById('id_bahan').value)) {
					Swal.fire({
						icon: 'warning',
						title: 'Jumlah Order Melebihi Stok!',
						text: 'Sisa Stok : ' + data[0].stok,
						footer: '<a href="<?= base_url('Gudang/tambah_stok') ?>">Isi Stok</a>'
					})
				}
			}
		})
	}
</script>
<script>
	function autofill() {

		const formatRupiah = (money) => {
			return new Intl.NumberFormat('id-ID', {
				style: 'currency',
				currency: 'IDR',
				minimumFractionDigits: 0
			}).format(money);
		}

		var id = document.getElementById('id_bahan').value;
		$.ajax({
			url: "<?php echo base_url(); ?>/Order/cari",
			data: '&id=' + id,
			success: function(data) {
				var hasil = JSON.parse(data);


				$.each(hasil, function(key, val) {

					var panjang = parseInt(document.getElementById('panjang').value);
					var lebar = parseInt(document.getElementById('lebar').value);
					var jumlah = parseInt(document.getElementById('id_bahan').value);
					var hrgJual = parseInt(hasil[0].harga_jual);


					var totalUkuran = panjang + lebar;
					var totalHargaSatuan = totalUkuran * hrgJual;
					var totalSemua = totalHargaSatuan * jumlah;
					console.log(totalUkuran);
					console.log(totalSemua);

					document.getElementById('harga_jual').value = formatRupiah(totalHargaSatuan);
					document.getElementById('harga_jual_semua').value = formatRupiah(totalSemua);


				});
			}
		});

	}

	// $(document).ready(function () {
	// $('#kategori').on("change", function () {
	//     if ($(this).val()== 1) {
	//         $("#hilang").css("display", "none");
	//     }
	//     else{
	//         $("#hilang").css("display", "block");
	//     }
	// });
	// })
</script>

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


				console.log(data[0].harga_beli);
			}
		})
	}
</script>

<script>
	function cekInvoice() {
		$.ajax({
			url: "<?php echo base_url(); ?>/Rekap/genCode",
			success: function(data) {
				var hasil = JSON.parse(data);
				console.log(hasil);
				document.getElementById('no_inv').value = hasil;
			}
		});

	}
	cekInvoice();
</script>
