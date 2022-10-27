<script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable({
      "columnDefs": [{
        "width": "30%",
        "targets": 0
      }]
    });
  });
</script>


<div class="container">
  <h3>BARANG KELUAR</h3>
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
              <th>Tanggal Pesanan</th>
              <th>Nama Bahan</th>
              <th>Qty</th>
            </tr>
        </thead>
        <tbody>
            <?php
      foreach ($barangKeluar as $b) {
      ?>
        <tr>
          <td><?= $b->tgl_order ?></td>
          <td><?= $b->nama_bahan ?></td>
          <td><?= $b->jumlah ?></td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>