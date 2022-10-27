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

<?php if ($this->session->flashdata('update-berhasil')) : ?>
   <script type="text/javascript">
      let timerInterval
      Swal.fire({
         title: 'Kategori Berhasil Update!',
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
         title: 'Data Kategori Berhasil Dihapus!',
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
    <h3>Data Kategori</h3>
    <!-- <a class="btn btn-sm btn-success mb-2" href="<?= base_url('Master/tambah_kategori');?>">+ Tambah Kategori</a> -->
    <div class="table-responsive">
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th class="col-1">ID</th>
                <th>Nama Kategori</th>
                <!-- <th>Action</th> -->
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($kategori as $b){
            ?>
            <tr>
              <td><?php echo $b->id?></td>
                <td><?= $b->nama_kategori?></td>

                <!-- <td><a class="btn btn-sm btn-primary" href="<?//= base_url('Master/edit_kategori/'). $b->id;?>">Edit</a> -->
                  <!-- <td><a class="btn btn-sm btn-danger" href="<?//= base_url('Master/hapus_kategori/'). $b->id;?>" onclick="return confirm('Anda Yakin Ingin Menghapus Data Kategori ID : <?//= $b->id ?> Ini?');">Hapus</a></td> -->
            </tr>
        <?php }?>
        </tbody>
       </table>
    </div>
</div>