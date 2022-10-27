<div class="container">
   <hr>
   <h5>Edit Data Kategori</h5>
   <hr>
   <form action="<?= base_url('Master/update_kategori'); ?>" method="post">
      <div class="row">

         <?php foreach ($kategori as $k) : ?>
            <input type="hidden" class="form-control" name="id" value="<?= $k->id ?>">

            <div class="col-md-6">
               <div class="form-group">
                  <label for="last">NAMA KATEGORI</label>
                  <input type="text" class="form-control" name="nama_kategori" value="<?= $k->nama_kategori ?>">
               </div>
            </div>
         <?php endforeach ?>

      </div>
      <button class="btn btn-md btn-primary">Update Kategori</button>
   </form>
</div>