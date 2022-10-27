<div class="container">
   <hr>
   <div class="col-12 d-flex flex-row align-items-center justify-content-between pl-0">
      <h5 class="mb-0">Edit Data Konsumen</h5>
      <button type="button" class="btn btn-sm btn-warning float-right" data-toggle="modal" data-target="#batal">
         <i class="fa-solid fa-xmark pr-2"></i>Batal
      </button>
   </div>
   <hr>
   <form action="<?= base_url('Master/update_konsumen'); ?>" method="post">
      <div class="row">

         <?php foreach ($customer as $c) : ?>
            <input type="hidden" class="form-control" name="id" value="<?= $c->id ?>">
            <div class="col-md-6">
               <div class="form-group">
                  <label for="last">NAMA</label>
                  <input type="text" class="form-control" name="nama_customer" value="<?= $c->nama_customer ?>">
               </div>
            </div>

            <div class="col-md-6">
               <div class="form-group">
                  <label for="last">EMAIL</label>
                  <input type="email" class="form-control" name="email" value="<?= $c->email ?>">
               </div>
            </div>

            <div class="col-md-12">
               <div class="form-group">
                  <label for="last">ALAMAT</label>
                  <textarea class="form-control" name="alamat"><?= $c->alamat ?></textarea>
               </div>
            </div>
         <?php endforeach ?>

      </div>
      <button class="btn btn-md btn-primary">Update Konsumen</button>
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
            <p>Jika anda menekan tombol "Ya" maka data yang sudah anda ubah tidak akan Diubah !</p>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
            <a href="<?= base_url('Master/konsumen') ?>" type="button" class="btn btn-primary">Ya</a>
         </div>
      </div>
   </div>
</div>