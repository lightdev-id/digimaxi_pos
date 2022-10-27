<div class="container">
   <hr>
   <div class="col-12 d-flex flex-row align-items-center justify-content-between pl-0">
      <h5 class="mb-0">Tambah Data Karyawan</h5>
      <button type="button" class="btn btn-sm btn-warning float-right" data-toggle="modal" data-target="#batal">
         <i class="fa-solid fa-xmark pr-2"></i>Batal
      </button>
   </div>
   <hr>
   <form action="<?= base_url('Master/update_karyawan'); ?>" method="post">
      <div class="row">

         <?php foreach ($karyawan as $k) : ?>
            <input type="hidden" class="form-control" name="id_user" value="<?= $k->id_user ?>">

            <div class="col-md-6">
               <div class="form-group">
                  <label for="last">NAMA</label>
                  <input type="text" class="form-control" name="nama" value="<?= $k->nama ?>">
               </div>
            </div>

            <div class="col-md-6">
               <div class="form-group">
                  <label for="last">USERNAME</label>
                  <input type="text" class="form-control" name="username" value="<?= $k->username ?>">
               </div>
            </div>

            <div class="col-md-6">
               <div class="form-group">
                  <label for="last">PASSWORD</label>
                  <input type="password" class="form-control" name="password" id="showpass" value="<?= $k->password ?>">
                  <input type="checkbox" onclick="showpassword()"> Show Password
               </div>
            </div>

         <?php endforeach ?>
      </div>

      <button class="btn btn-md btn-primary">Update Karyawan</button>
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
            <a href="<?= base_url('Master/karyawan') ?>" type="button" class="btn btn-primary">Ya</a>
         </div>
      </div>
   </div>
</div>

<script>
   function showpassword() {
      var x = document.getElementById("showpass");
      if (x.type === "password") {
         x.type = "text";
      } else {
         x.type = "password";
      }
   }
</script>