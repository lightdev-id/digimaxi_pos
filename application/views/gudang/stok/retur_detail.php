<div class="container-fluid">
   <h1 class="h3 mb-4 text-gray-800">Detail Barang Retur</h1>
   <div class="row">

      <div class="col-lg-12">
         <div class="card shadow mb-4">
            <div class="card-header py-3">
               <div class="col-12 d-flex flex-row align-items-center justify-content-between pl-0">
                  <h6 class="m-0 font-weight-bold text-primary">Nomer PO : <?= $returDetail->no_po ?></h6>
                  <a href="<?= base_url('Gudang/barang_retur') ?>" class="btn btn-warning btn-sm float-right"><i class="fa-sharp fa-solid fa-arrow-left pr-2"></i></i>Kembali</a>
               </div>
            </div>
            <div class="card-body">
               <div class="row">
                  <div class="col-12 table-responsive">
                     <table class="table table-hover table-bordered">
                           <tr>
                              <td><strong>Kategori</strong></td>
                              <td><?= $returDetail->nama_kategori ?></td>
                           <tr>
                              <td><strong>Nama Bahan</strong></td>
                              <td><?= $returDetail->nama_bahan ?></td>
                           </tr>
                           <tr>
                              <td><strong>Tanggal Order</strong></td>
                              <td><?= $returDetail->tgl_beli ?></td>
                           </tr>
                           <tr>
                              <td><strong>Qty Lama</strong></td>
                              <td><?= $returDetail->jumlah ?></td>
                           </tr>
                           <td></td>
                           <tr>
                              <td><strong>Tanggal Retur</strong></td>
                              <td><?= $returDetail->tanggal_retur ?></td>
                           </tr>
                           <tr>
                              <td><strong>Jumlah Retur</strong></td>
                              <td><?= $returDetail->jumlah_retur ?></td>
                           </tr>
                           <tr>
                              <td><strong>Keterangan Retur</strong></td>
                              <td><?= $returDetail->keterangan ?></td>
                           </tr>
                           
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>