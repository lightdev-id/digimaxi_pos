<script type="text/javascript">
    $(document).ready(function () {
      $('#example').DataTable({
      "columnDefs": [
    { "width": "2%", "targets": 0 }
   ]
})
});
</script>

<?php if ($this->session->flashdata('input-berhasil')) : ?>
   <script type="text/javascript">
      let timerInterval
      Swal.fire({
         title: 'Karyawan Berhasil Ditambahkan!',
         html: ' ',
         icon: 'success',
         timer: 1500,

         didOpen: () => {
            Swal.showLoading()
            const b = Swal.getHtmlContainer().querySelector('b')
         },
         willClose: () => {
            clearInterval(timerInterval)
         }
         
      })
   </script>
   <?= $this->session->flashdata('input-berhasil') ?>
<?php endif ?>

<?php if ($this->session->flashdata('update-berhasil')) : ?>
   <script type="text/javascript">
      let timerInterval
      Swal.fire({
         title: 'Data Karyawan Berhasil Diupdate!',
         html: ' ',
         icon: 'success',
         timer: 1500,

         didOpen: () => {
            Swal.showLoading()
            const b = Swal.getHtmlContainer().querySelector('b')
         },
         willClose: () => {
            clearInterval(timerInterval)
         }
         
      })
   </script>
   <?= $this->session->flashdata('update-berhasil') ?>
<?php endif ?>

<?php if ($this->session->flashdata('hapus-berhasil')) : ?>
   <script type="text/javascript">
      let timerInterval
      Swal.fire({
         title: 'Data Karyawan Berhasil Dihapus!',
         html: ' ',
         icon: 'success',
         timer: 1500,

         didOpen: () => {
            Swal.showLoading()
            const b = Swal.getHtmlContainer().querySelector('b')
         },
         willClose: () => {
            clearInterval(timerInterval)
         }
         
      })
   </script>
   <?= $this->session->flashdata('hapus-berhasil') ?>
<?php endif ?>

<div class="container">
    <h3>Data Karyawan</h3>
    <a class="btn btn-sm btn-success mb-2" href="<?= base_url('Master/tambah_karyawan');?>">+ Tambah Karyawan</a>
    <div class="table-responsive">
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                
                <th>Nama</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($karyawan as $b){
            ?>
            <tr>
              <td><?php echo $b->id_user?></td>
                <td><?= $b->username?></td>
                  
                <td><?=$b->nama?></td>
                <td><?php switch ($b->role) {
                    case 1:
                        echo 'Direktur';
                        break;
                    case 2:
                        echo 'SPK';
                        break;
                    case 3:
                        echo 'Gudang';
                        break;
                    case 4:
                        echo 'Admin';
                        break;
                    case 5:
                        echo 'Karyawan';
                        break;
                    default:
                      echo 'Not';
                        break;
                }
            ?></td>
                <td><a class="btn btn-sm btn-primary" href="<?= base_url('Master/edit_karyawan/'). $b->id_user;?>">Edit</a>
                  <a class="btn btn-sm btn-danger" href="<?= base_url('Master/hapus_karyawan/'). $b->id_user;?>" onclick="return confirm('Anda Yakin Ingin Menghapus Data Karyawan ID : <?= $b->id_user ?> Ini?');">Hapus</a></td>
            </tr>
        <?php }?>
        </tbody>
       </table>
       </div>
</div>