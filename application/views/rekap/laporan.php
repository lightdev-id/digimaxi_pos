<script type="text/javascript">
   $(document).ready(function() {
      $('#example').DataTable();
   });
</script>

<div class="container">
   <h3>Laporan | Surat Jalan</h3>
   <div class="table-responsive">
      <table id="example" class="display" style="width:100%">
         <thead>
            <tr>
               <th>Nama Pekerjaan</th>
               <th>Nama Customer</th>
               <th>Bahan</th>
               <th>Tanggal Order</th>
               <th>Qty</th>
               <th>Status Bayar</th>
               <th>Nomor Kendaraan</th>
               <th>Action</th>
            </tr>
         </thead>
         <tbody>
            <?php
            foreach ($laporanCetak as $b) {
            ?>
               <tr>
                  <td><?= $b->nama_kerja ?></td>
                  <td><?= $b->nama_customer ?></td>
                  <td><?= $b->nama_bahan ?></td>
                  <td><?= $b->tgl_order ?></td>
                  <td><?= $b->jumlah ?></td>
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
                        ?>
                  </td>
                  <td><?= $b->plat_nomor ?></td>
                  <td>
                     <a href="<?= base_url('Rekap/detail/') . $b->id_order; ?>" style="margin-bottom: 2%;" class="btn btn-sm btn-info">Detail</a>
                     <a href="<?= base_url('Rekap/cetak_inv/') . $b->id_order; ?>" style="margin-bottom: 2%;" class="btn btn-sm btn-primary">Cetak Invoice</a>
                     <a href="<?= base_url('Rekap/cetak_surat_jalan/') . $b->id_order; ?>" style="margin-bottom: 2%;" class="btn btn-sm btn-primary">Cetak Surat Jalan</a>
                  </td>
               </tr>
            <?php } ?>
         </tbody>
      </table>
   </div>
</div>
