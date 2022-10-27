
               <?php if($this->session->flashdata('kerja_selesai')): ?>
             <script type="text/javascript">
               let timerInterval
Swal.fire({
  title: 'Pembayaran Berhasil!',
  html: 'Pembayaran berhasil, pekerjaan selesai!',
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
                    <?= $this->session->flashdata('kerja_selesai') ?>
           
        <?php endif ?>

<script type="text/javascript">
    $(document).ready(function () {
    $('#example').DataTable();
});
</script>


<div class="container">
    <h3>Pembayaran</h3>
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
               <th>Nama Orderan</th>
                <th>Nama Customer</th>
                <th>Tanggal Order</th>
                <th>Qty</th>
								<th>DP Awal</th>
                <th>Status Bayar</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($allPembayaran as $b){
            ?>
            <tr>
              <td><?= $b->nama_kerja?></td>
                <td><?= $b->nama_customer?></td>	
                <td><?=$b->tgl_order?></td>
                <td><?=$b->jumlah?></td>
								<?php if($b->dp_awal == 0) : ?>
									<td class="text-danger">Tidak DP</td>
								<?php else: ?>
									<td><?= number_format($b->dp_awal, 0,'.','.') ?></td>
								<?php endif ?>
                <td><?php
$favcolor = $b->status_bayar;

switch ($favcolor) {
  case "0":
    echo "<button class='btn btn-sm btn-danger'>Belum Lunas</button>";
    break;
    case "1":
    echo "<button class='btn btn-sm btn-success'>Sudah Lunas</button>";
    break;

  default:
    echo "Tidak";
}
?></td>
                <td>

    <a href="<?= base_url('Order/detail_order/'.$b->id_order) ?>" class="btn btn-sm btn-success">Detail Pesanan</a>      
    <a class="btn btn-sm btn-primary" href="<?= base_url('produksi/konfirmasi_bayar/'.$b->id_order)?>">Konfirmasi Pembayaran</a>
                      </td>
            </tr>

        <?php }?>
        </tbody>
       </table>
</div>

