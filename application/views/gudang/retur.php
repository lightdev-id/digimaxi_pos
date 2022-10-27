<script type="text/javascript">
    $(document).ready(function () {
    $('#example').DataTable();
});
</script>


<div class="container">
  <h3>BARANG RETUR</h3>
  <div class="table-responsive">
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Nomor PO</th>
                <th>Kategori</th>
                <th>Nama Bahan</th>
                <th>Tanggal Retur</th>
                <th>Jumlah Retur</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($stokRetur as $b){
            ?>
            <tr>
                <td><?= $b->no_po ?></td>
                <td><?= $b->nama_kategori ?></td>
                <td><?= $b->nama_bahan ?></td>
                <td><?= $b->tanggal_retur ?></td>
                <td><?= $b->jumlah_retur ?></td>
                <td><a class="btn btn-sm btn-info" href="<?= base_url('Gudang/retur_detail/'). $b->id_retur;?>">Detail</td>
            </tr>
        <?php }?>
        </tbody>
       </table>
       </div>
</div>