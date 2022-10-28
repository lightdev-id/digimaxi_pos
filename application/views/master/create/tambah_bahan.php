<div class="container">
	<hr>
	<div class="col-12 d-flex flex-row align-items-center justify-content-between pl-0">
		<h5 class="mb-0">Tambah Data Bahan</h5>
		<button type="button" class="btn btn-sm btn-warning float-right" data-toggle="modal" data-target="#batal">
			<i class="fa-solid fa-xmark pr-2"></i>Batal
		</button>
	</div>
	<hr>
	<form action="<?= base_url('Master/bahan_save'); ?>" method="post">
		<div class="row">

			<div class="col-md-4">
				<div class="form-group">
					<label for="last">NAMA BAHAN</label>
					<input type="text" class="form-control" name="nama_bahan" required>
				</div>
			</div>

			<div class="col-md-4">
				<div class="form-group">
					<label for="last">HARGA BELI</label>
					<input type="text" class="form-control" name="harga_beli" id="rupiah" required>
				</div>
			</div>

			<div class="col-md-4">
				<div class="form-group">
					<label for="last">HARGA JUAL</label>
					<input type="text" class="form-control" name="harga_jual" id="RP" required>
				</div>
			</div>
		</div>
		<button class="btn btn-primary">Tambah Bahan</button>
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
				<a href="<?= base_url('Master/data_bahan') ?>" type="button" class="btn btn-primary">Ya</a>
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
