
               <?php if($this->session->flashdata('order_berhasil')): ?>
             <script type="text/javascript">
               let timerInterval
Swal.fire({
  title: 'Order Berhasil!',
  html: 'Order telah di input, silahkan konfirmasi SPK!',
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
                    <?= $this->session->flashdata('order_berhasil') ?>
           
        <?php endif ?>
<div class="container">
   <hr>
         <h5>Data Input Gudang</h5>
         <hr>
         <form action="<?= base_url('Order/tambah_order');?>" method="post" enctype="multipart/form-data">
   <div class="row">

  

    <div class="col-md-3">
        <div class="form-group">
          <label for="last">ID ORDER</label>
          <input type="text" class="form-control" value="<?= uniqid();?>" name="id_order" readonly>
        </div>
      </div>

      <div class="col-md-3">
        <div class="form-group">
          <label for="last">TANGGAL ORDER</label>
          <input type="date" class="form-control" name="tgl_order">
        </div>
      </div>
      
      <div class="col-md-3">
        <div class="form-group">
          <label for="last">NO. SURAT JALAN</label>
          <input type="text" class="form-control" name="no_po">
        </div>
      </div>

  
      <div class="col-md-3">
        <div class="form-group">
          <label for="last">NO. TELEPON</label>
          <input type="text" name="email" class="form-control">
        </div>
   
      </div>


</div>
</div>


<div class="container">

   <hr>
         <h5>Data Barang</h5>
           
         <hr>





  
       
  <div class="row" id="readroot">
     <div class="col-md-3">       
        <div class="form-group">
          <label for="last">Nama Barang</label>
<select class="form-control"  id="id" name="id_barang" onchange="return autofill();"><?php foreach($bahanBaku as $i){ ?>
                  <option value="<?php echo $i['id_bahan']; ?>"><?php echo $i['nama_bahan']; ?></option>
                  <?php } ?></select>        </div>
      </div>

        <div class="col-md-2">       
        <div class="form-group">
          <label for="last">Qty</label>
          <input class="form-control" type="number" name="biaya_design">
        </div>
      </div>
  </div>

<button class="btn btn-sm btn-primary">Submit</button>
</form>

</div>

<script type="text/javascript">
    $(document).ready(function(){
             $('#kategori').on('input',function(){
                 
                var kode=$(this).val();
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url('index.php/pos/get_barang')?>",
                    dataType : "JSON",
                    data : {kode: kode},
                    cache:false,
                    success: function(data){
                        $.each(data,function(kode, nama_barang, harga, satuan){
                            $('[name="nama"]').val(data.nama_barang);
                            $('[name="harga"]').val(data.harga);
                            $('[name="satuan"]').val(data.satuan);
                             
                        });
                         
                    }
                });
                return false;
           });
 
        });
</script>

<script type="text/javascript">
   function yesnoCheck(that) {
    if (that.value == "custom") {
        document.getElementById("ifYes").style.display = "block";
    } else {
        document.getElementById("ifYes").style.display = "none";
    }
}
</script>

<script type="text/javascript">
  var counter = 0;

function moreFields() {
  counter++;
  var newFields = document.getElementById('readroot').cloneNode(true);
  newFields.id = '';
  newFields.style.display = 'block';
  var newField = newFields.childNodes;
  for (var i=0;i<newField.length;i++) {
    var theName = newField[i].name
    if (theName)
      newField[i].name = theName + counter;
  }
  var insertHere = document.getElementById('writeroot');
  insertHere.parentNode.insertBefore(newFields,insertHere);
}

window.onload = moreFields;
</script>
