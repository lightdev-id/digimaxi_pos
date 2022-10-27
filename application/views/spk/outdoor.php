<script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable();
  });
</script>


<div class="container">
  <h3>SPK - INDOOR</h3>
  <div class="table-responsive">
    <table id="example" class="display" style="width:100%">
      <thead>
        <tr>
          <th>Status Urgensi</th>
          <th>Nama Customer</th>
          <th>Nama Pekerjaan</th>
          <th>Tanggal Order</th>
          <th>Qty</th>
          <th>Finishing</th>
          <th>Status Bayar</th>
          <th>Status Pekerjaan</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($orderMasuk as $b) {
        ?>
          <tr>
            <td><?php $favcolor = $b->urgensi;
                switch ($favcolor) {
                  case "1":
                    echo "<button class='btn btn-sm btn-danger'>SEGERA DIKERJAKAN</button>";
                    break;
                  default:
                    echo "Tidak";
                }
                ?></td>
            <td><?= $b->nama_customer ?></td>
            <td><?= $b->nama_kerja ?></td>
            <td><?= $b->tgl_order ?></td>
            <td><?= $b->jumlah ?></td>
            <td><?php $favcolor = $b->finishing;
                switch ($favcolor) {
                  case "0":
                    echo "Packing";
                    break;
                  case "1":
                    echo "Cutting";
                    break;
                  case "2":
                    echo "Seaming";
                    break;
                  case "3":
                    echo "Jilid";
                    break;

                  default:
                    echo "Tidak";
                }
                ?></td>
            <td><?php $favcolor = $b->status_bayar;
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
            <td><?php $favcolor = $b->status_bayar;
                switch ($favcolor) {
                  case "0":
                    echo "<button class='btn btn-sm btn-danger'>Belum Dikerjakan</button>";
                    break;
                  case "1":
                    echo "<button class='btn btn-sm btn-warning'>Sedang Dikerjakan</button>";
                    break;
                  case "2":
                    echo "<button class='btn btn-sm btn-success'>Finishing</button>";
                    break;

                  default:
                    echo "Tidak";
                }
                ?></td>
            <td>
              <form action="<?= base_url('Spk/ambil_kerja_a3/') ?>" method="post">
                <input type="hidden" name="id_order" value="<?= $b->id_order; ?>">
                <input type="submit" style="margin-bottom:2%;" class="btn btn-sm btn-primary" value="Ambil Pekerjaan">
              </form>
              <a href="<?= base_url('Spk/download/') . $b->file; ?>" class="btn btn-sm btn-primary" value="Download Data">Download Data</a>
            </td>
          <?php } ?>
      </tbody>
    </table>
  </div>
</div>