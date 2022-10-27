<div class="container">
   <hr>
   <div class="col-12 d-flex flex-row align-items-center justify-content-between pl-0">
      <h5 class="mb-0">Retur Barang </h5>
      <button type="button" class="btn btn-sm btn-warning float-right" data-toggle="modal" data-target="#batal">
         <i class="fa-solid fa-xmark pr-2"></i>Batal
      </button>
   </div>
   <hr>
   <form action="<?= base_url('Gudang/retur_update'); ?>" method="post">
      <div class="row">
         <input type="hidden" class="form-control" name="id_beli" value="<?= $barangRetur->id_beli ?>">
         <input type="hidden" class="form-control" name="id_barang" value="<?= $barangRetur->id_barang ?>">

         <div class="col-md-3">
            <div class="form-group">
               <label for="last">NOMER PO</label>
               <input type="text" class="form-control" name="no_po" value="<?= $barangRetur->no_po ?>" disabled>
            </div>
         </div>

         <div class="col-md-3">
            <div class="form-group">
               <label for="last">KATEGORI</label>
               <input type="text" class="form-control" name="nama_bahan" value="<?= $barangRetur->nama_bahan ?>" disabled>
            </div>
         </div>

         <div class="col-md-3">
            <div class="form-group">
               <label for="last">NAMA BAHAN</label>
               <input type="text" class="form-control" name="id_kategori" value="<?= $barangRetur->nama_kategori ?>" disabled>
            </div>
         </div>

         <div class="col-md-3">
            <div class="form-group">
               <label for="last">JUMLAH BARANG</label>
               <input type="text" class="form-control" name="stok_lama" value="<?= $barangRetur->jumlah ?>" readonly>
            </div>
         </div>

         <div class="col-md-3">
            <div class="form-group">
               <label for="last">JUMLAH RETUR</label>
               <input type="number" class="form-control" name="jumlah">
            </div>
         </div>

         <div class="col-md-3">
            <div class="form-group">
               <label for="last">TANGGAL RETUR</label>
               <input type="date" class="form-control" name="tanggal_retur">
            </div>
         </div>

         <div class="col-6">
            <div class="form-group">
               <label for="last">KETERANGAN</label>
               <textarea class="form-control mb-3" name="keterangan" id="keterangan" cols="30" rows="2"></textarea>
            </div>
         </div>

      </div>
      <button class="btn btn-primary">Retur Barang</button>
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
            <a href="<?= base_url('Gudang/barang_masuk') ?>" type="button" class="btn btn-primary">Ya</a>
         </div>
      </div>
   </div>
</div>