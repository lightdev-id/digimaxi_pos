<div class="container">
   <hr>
   <h5>Tambah Data Kategori</h5>
   <hr>
   <form action="<?= base_url('Master/kategori_save'); ?>" method="post">
      <div class="row">

         <div class="col-md-6">
            <div class="form-group">
               <label for="last">NAMA KATEGORI</label>
               <input type="text" class="form-control" name="nama_kategori" required>
            </div>
         </div>

      </div>
      <button class="btn btn-md btn-primary">Tambah Kategori</button>
   </form>
</div>