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
         title: 'Data Berhasil Ditambahkan!',
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

<?php if ($this->session->flashdata('update_berhasil')) : ?>
   <script type="text/javascript">
      let timerInterval
      Swal.fire({
         title: 'Data Rekening Berhasil Update!',
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
   <?= $this->session->flashdata('update_berhasil') ?>

<?php endif ?>

<?php if ($this->session->flashdata('hapus-berhasil')) : ?>
   <script type="text/javascript">
      let timerInterval
      Swal.fire({
         title: 'Data Rekening Berhasil di Hapus!',
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
    <h3>Data Rekening</h3>
    <a class="btn btn-sm btn-success mb-2" href="<?= base_url('Master/tambah_rekening');?>">+ Tambah Rekening</a>
    <div class="table-responsive">
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Atas Nama</th>
                
                <th>Nomor Rekening</th>
                <th>Bank</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($rekening as $b){
            ?>
            <tr>
              <td><?php echo $b->id?></td>
                <td><?= $b->atas_nama?></td>
                  
                <td><?=$b->norek?></td>
                <td><?= $b->bank?></td>
                <td><a class="btn btn-sm btn-primary" href="<?= base_url('Master/edit_rekening/'). $b->id;?>">Edit</a>
                  <a class="btn btn-sm btn-danger" href="<?= base_url('Master/hapus_rekening/'). $b->id;?>" onclick="return confirm('Anda Yakin Ingin Menghapus Data Rekening ID : <?= $b->id ?> Ini?');">Hapus</a></td>
            </tr>
        <?php }?>
        </tbody>
       </table>

    </div>
</div>