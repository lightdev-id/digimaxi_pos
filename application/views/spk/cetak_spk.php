<style>
   * {
      color: black;
   }

   .tbl {
      width: 100%;
      line-height: inherit;
      text-align: left;
   }

   table tr td {
      vertical-align: top;
   }

   p {
      margin-bottom: 0px;
   }

   p.tab {
      margin-left: 20px;
   }
</style>
<div class="container my-2">
   <div class="card p-4 my-3">
      <div class="row">
         <div class="col-12">
            <table class="table mb-0">
               <tr>
                  <td style="border-top: 0px;">
                     <img class="mr-2" src="<?php echo base_url('assets/img/logo_digimaxie-rbg.png') ?>" style="width: 25%; height:80px; max-width: 300px; float:left" />
                     <h4 class="mt-3 ml-5 pl-5 mb-0"><b>SURAT PERINTAH KERJA</b></h3>
                        <?php
                        $getTahun = explode("-", $orderDetail->tgl_spk);
                        $getBulan = explode("-", $orderDetail->tgl_spk);
                        $getNoInv = explode("INV-", $orderDetail->no_inv);
                        ?>
                        <p class="ml-5 pl-5">ID. <?= $getNoInv[1] ?>/SPK/<?php $bulan_romawi = $getBulan[1];
                                                                           switch ($bulan_romawi) {
                                                                              case "01":
                                                                                 echo "I";
                                                                                 break;
                                                                              case "02":
                                                                                 echo "II";
                                                                                 break;
                                                                              case "03":
                                                                                 echo "III";
                                                                                 break;
                                                                              case "04":
                                                                                 echo "IV";
                                                                                 break;
                                                                              case "05":
                                                                                 echo "V";
                                                                                 break;
                                                                              case "06":
                                                                                 echo "VI";
                                                                                 break;
                                                                              case "07":
                                                                                 echo "VII";
                                                                                 break;
                                                                              case "08":
                                                                                 echo "VIII";
                                                                                 break;
                                                                              case "09":
                                                                                 echo "IX";
                                                                                 break;
                                                                              case "10":
                                                                                 echo "X";
                                                                                 break;
                                                                              case "11":
                                                                                 echo "XI";
                                                                                 break;
                                                                              case "12":
                                                                                 echo "XII";
                                                                                 break;
                                                                           } ?>/<?= $getTahun[0] ?></p>
                  </td>
                  <td class="text-right" style="border-top: 0px;">
                     <b>Alamat</b>
                     <br>PT. Edukidos Madina Creativa Jl. Muhammad Thohir
                     <br>Ruko Podomoro Golf View B3 No.10 Gunung Putri, Kab. Bogor
                     <br>Telp. 081384434480
                  </td>
                  <td style="border-top: 0px; padding-left:0px">
                     <img src="<?php echo base_url('assets/qrcache/' . $orderDetail->id_order . '.png') ?>" style="width: 100%; max-width: 100px; float:right" />
                  </td>
               </tr>
            </table>

            <hr class="mb-3 mt-0" style="height:4px;border:none;color:#333;background-color:#333;">

            <table class="tbl">
               <tr>
                  <td width="140px">Kepada Yth</td>
                  <td>: <?= $orderDetail->nama_customer ?></td>
                  <td class="text-right" width="180px">Depok, <?= $orderDetail->tgl_spk ?></td>
               </tr>
               <tr>
                  <td>Email</td>
                  <td>: <?= $orderDetail->email ?></td>
                  <td class="text-right" width="180px">Operator : <?= $orderDetail->spk ?></td>
               </tr>
               <tr>
                  <td>Alamat Kirim</td>
                  <td>: <?= $orderDetail->alamat ?></td>
                  <td></td>
               </tr>
            </table>
         </div>
      </div>
      <div class="row">
         <div class="col-12 mt-3">
            <p class="tab">Dengan Hormat</p>
            <p class="tab">Bersama ini kami kirimkan barang-barang sebagai berikut</p>
         </div>
      </div>

      <div class="row">
         <div class="col-12 mt-3">
            <table class="table table-bordered table-sm">
               <thead style="background-color: lightgrey;">
                  <tr>
                     <th>Nama Pekerjaan</th>
                     <th>Bahan</th>
                     <th>Panjang</th>
                     <th>Lebar</th>
                     <th>Qty</th>
                  </tr>
               </thead>
               <tbody>
                  <tr>
                     <td><?= $orderDetail->nama_kerja ?></td>
                     <td><?= $orderDetail->nama_bahan ?></td>
                     <td><?= $orderDetail->panjang ?> cm</td>
                     <td><?= $orderDetail->lebar ?> cm</td>
                     <td><?= $orderDetail->jumlah ?></td>
                     <?php
                     $totalUkuran = $orderDetail->panjang + $orderDetail->lebar;
                     $totalHargaSatuan =  $totalUkuran * $orderDetail->harga_jual;
                     $totalSemua = $totalHargaSatuan * $orderDetail->jumlah;
                     ?>

                  </tr>
               </tbody>
            </table>
         </div>
      </div>

      <div class="row">
         <div class="col-12 mt-4">
            <table class="tbl">
               <tr height="100px">
                  <td class="text-center">OPERATOR</td>
                  <td class="text-center">SUPERVISOR</td>
               </tr>
               <tr>
                  <td class="text-center">( .................................... )</td>
                  <td class="text-center">( .................................... )</td>
               </tr>
            </table>
         </div>
      </div>
   </div>
</div>
