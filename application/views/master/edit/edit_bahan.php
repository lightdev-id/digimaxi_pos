

  
<div class="container">

   <hr>
   <div class="col-12 d-flex flex-row align-items-center justify-content-between pl-0">
         <h5 class="mb-0">Spesifikasi & File Order</h5>
      <button type="button" class="btn btn-sm btn-warning float-right" data-toggle="modal" data-target="#batal">
        <i class="fa-solid fa-xmark pr-2"></i>Batal
      </button>
   </div>
         <hr>
         <?php foreach($bahan as $u){ ?>
         <form action="<?php echo base_url(). 'Master/update_bahan'; ?>" method="post">
          <input type="hidden" name="id_bahan" value="<?php echo $u->id_bahan?>">
            <div class="row">
     <div class="col-md-3">
        <div class="form-group">
          <label for="last">Nama Bahan</label>
          <input type="text" name="nama_bahan" value="<?= $u->nama_bahan?>" class="form-control">
        </div>
      
        

      </div>

        <div class="col-md-3">
        <div class="form-group">
          <label for="last">Kategori</label>
          <select class="form-control" name="kategori"><?php foreach($kategori as $k){ ?>
                  <option <?php if($k['id'] == $bahan[0]->id_kategori) { echo 'selected';} ?> value="<?= $k['id']; ?>"><?php echo $k['nama_kategori']; ?></option>
                  <?php } ?></select>
        </div>
      </div>

      
    <div class="col-md-3">       
        <div class="form-group">
          <label for="last">Harga Beli</label>
          <input class="form-control" type="number" name="harga_beli" value="<?php echo $u->harga_beli?>" >
        </div>
      </div>
     <div class="col-md-3">       
        <div class="form-group">
          <label for="last">Harga Jual</label>
          <input class="form-control" type="number" name="harga_jual" value="<?php echo $u->harga_jual?>">
        </div>
      </div>

        


   </div>
    

       <input class="btn btn-primary" type="submit" name="" value="Update Bahan">



    

         </form>
  
 <br> 
   
<?php } ?>
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
            <a href="<?= base_url('Master/data_bahan') ?>" type="button" class="btn btn-primary">Ya</a>
         </div>
      </div>
   </div>
</div>


