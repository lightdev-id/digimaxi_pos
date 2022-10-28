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


	<?php foreach ($bahan as $u) { ?>
		<form action="<?php echo base_url() . 'Beranda/update_surat_jalan'; ?>" method="post">
			<input type="hidden" name="id_order" value="<?php echo $u->id_order ?>">
			<div class="row">
				<div class="col-md-3">
					<div class="form-group">
						<label for="last">Nama Pekerjaan</label>
						<input type="text" name="nama_bahan" value="<?= $u->nama_kerja ?>" class="form-control" readonly>
					</div>



				</div>

				<div class="col-md-3">
					<div class="form-group">
						<label for="last">Kategori</label>
						<select class="form-control" name="kategori" disabled><?php foreach ($kategori as $i) { ?>
								<option value="<?php echo $i['id']; ?>" readonly><?php echo $i['nama_kategori']; ?></option>
							<?php } ?>
						</select>
					</div>
				</div>


				<div class="col-md-3">
					<div class="form-group">
						<label for="last">Tanggal Order</label>
						<input class="form-control" type="date" name="harga_beli" value="<?php echo $u->tgl_order ?>" readonly>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label for="last">Jumlah</label>
						<input class="form-control" type="number" name="harga_jual" value="<?php echo $u->jumlah ?>" readonly>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label for="last">Nama Customer</label>
						<input class="form-control" type="text" name="harga_jual" value="<?php echo $u->nama_customer ?>" readonly>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label for="last">Bahan Baku</label>
						<input class="form-control" type="text" name="harga_jual" value="<?php echo $u->nama_bahan ?>" readonly>
					</div>
				</div>
			</div>

			<hr>
			<h5>Input Surat Jalan</h5>
			<hr>

			<div class="row">
				<div class="col-md-3">
					<div class="form-group">
						<label for="last">ID Surat</label>
						<input class="form-control" type="text" name="id_surat" value="<?php echo uniqid(); ?>" readonly>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label for="last">Tanggal Kirim</label>
						<input class="form-control" type="date" name="tgl_kirim" required>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label for="last">Plat Nomor</label>
						<input class="form-control" type="text" name="plat_nomor" required>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label for="last">Jenis Kendaraan</label>
						<input class="form-control" type="text" name="jenis_kendaraan" required>
					</div>
				</div>

			</div>




			<input class="btn btn-primary" type="submit" name="">





		</form>

		<br>

	<?php } ?>
</div>
