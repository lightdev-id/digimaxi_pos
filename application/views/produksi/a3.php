<script type="text/javascript">
    $(document).ready(function () {
    $('#example').DataTable();
});
</script>


<div class="container">
    <h3>PRODUKSI - A3</h3>
    <div class="table-responsive">
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                
                <th>Nama Pekerjaan</th>
                <th>Nama Customer</th>
                <th>Tanggal Order</th>
                <th>Qty</th>
                <th>Finishing</th>
                <th>Status Bayar</th>
                <th>Status Urgensi</th>
                <th>Status Pekerjaan</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($orderMasuk as $b){
            ?>
            <tr>
                <td><?= $b->nama_kerja?></td>
                <td><?= $b->nama_customer?></td>

                <td><?=$b->tgl_order?></td>
                <td><?=$b->jumlah?></td>
                <td><?php
$favcolor = $b->finishing;

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
          <td><?php
$favcolor = $b->urgensi;

switch ($favcolor) {
  case "1":
    echo "<button class='btn btn-sm btn-danger'>SEGERA DIKERJAKAN</button>";
    break;
  default:
    echo "Tidak";
}
?></td>
                <td><?php
$favcolor = $b->status;

switch ($favcolor) {
  case "0":
    echo "<button class='btn btn-sm btn-danger'>Belum Dikerjakan</button>";
    break;
    case "1":
    echo "<button class='btn btn-sm btn-warning'>On Progress</button>";
    break;
    case "2":
    echo "<button class='btn btn-sm btn-success'>Selesai</button>";
    break;

  default:
    echo "Tidak";
}
?></td><td>
                             <a href="<?= base_url('Spk/download/'). $b->file;?>" style="margin-bottom: 2%;"  class="btn btn-sm btn-primary" value="Download Data">Download Data</a>
                             <a class="btn btn-sm btn-primary" style="margin-bottom: 2%;" href="<?= base_url('Spk/cetak_spk/'). $b->id_order;?>">Cetak SPK</a>
    <a class="btn btn-sm btn-primary" href="<?= base_url('Produksi/finishing/'.$b->id_order)?>">Selesaikan</a>
</td>
            </tr>
        <?php }?>
        </tbody>
       </table>
       </div>
</div>

