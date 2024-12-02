<?php 


   $nis = $_GET['nis_siswa'];
   $id_bayar = $_GET['id_bayar'];
   $id_tahun_ajaran = $_GET['id_tahun_ajaran'];
  
  $sql = $koneksi->query("SELECT tb_tahun_ajaran.tahun_ajaran, tb_tahun_ajaran.id_tahun_ajaran, tb_jenis_bayar.nama_bayar, tb_jenis_bayar.id_bayar, tb_jenis_bayar.id_tahun_ajaran, tb_siswa.nis, tb_siswa.nama_siswa, tb_siswa.no_hp_ortu, tb_kelas.nama_kelas, tb_tagihan_bebas.id_tagihan_bebas, tb_tagihan_bebas.id_bayar, Sum(tb_tagihan_bebas.total_tagihan) AS jmlTagihanBulanan, Sum(tb_tagihan_bebas.terbayar) AS total_terbayar from tb_jenis_bayar
                          
                        INNER JOIN tb_tagihan_bebas ON tb_tagihan_bebas.id_bayar = tb_jenis_bayar.id_bayar
                        INNER JOIN tb_tahun_ajaran ON tb_jenis_bayar.id_tahun_ajaran = tb_tahun_ajaran.id_tahun_ajaran

                        INNER JOIN tb_siswa ON tb_tagihan_bebas.id_siswa = tb_siswa.id_siswa
                        INNER JOIN tb_kelas ON tb_tagihan_bebas.id_kelas = tb_kelas.id_kelas
                        WHERE tb_siswa.nis='$nis' and tb_jenis_bayar.id_tahun_ajaran='$id_tahun_ajaran' and tb_jenis_bayar.id_bayar='$id_bayar' GROUP BY tb_jenis_bayar.id_bayar 
                          ");

  $data = $sql->fetch_assoc();

  $nama_bayar= $data['nama_bayar'];
  $Siswa = $data['nama_siswa'];
  $keterangan = 'pembayaran'.'&nbsp'.$nama_bayar.'&nbsp'.'Atas Nama'.'&nbsp'.$Siswa;

  $sisa = $data['jmlTagihanBulanan'] - $data['total_terbayar'];
  $terbayar = $data['total_terbayar'];
  $id_tagihan_bebas = $data['id_tagihan_bebas'];
  
   $tgl=date('Y-m-d');

   $no_hp = $data['no_hp_ortu'];

  $kelas = $data['nama_kelas'];
  

 ?>


<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="box box-primary box-solid">
            <div class="box-header with-border">
                 Informasi Siswa
            </div>
            <div class="panel-body">


               <div class="col-md-4">
                  <div class="form-group">
                          <label>Jenis Bayar</label>
                          <input type="text" readonly="" value="<?php echo $data['nama_bayar'] ?>" class="form-control" >      
                        </div>
                     </div>

                
                <div class="col-md-4">
                  <div class="form-group">
                          <label>Tahun Ajaran</label>
                          <input type="text"  value="<?php echo $data['tahun_ajaran'] ?>" readonly="" class="form-control" >      
                        </div>
                     </div>

                <div class="col-md-4">
                  <div class="form-group">
                          <label>Nis</label>
                          <input type="text" name="jenis_bayar" value="<?php echo $data['nis'] ?>" readonly="" class="form-control" >      
                        </div>
                     </div>


                     <div class="col-md-4">
                  <div class="form-group">
                          <label>Nama Siswa</label>
                          <input type="text" name="tahun_ajaran" value="<?php echo $data['nama_siswa'] ?>" readonly="" class="form-control" >      
                        </div>
                     </div>  

                      <div class="col-md-4">
                  <div class="form-group">
                          <label>Kelas</label>
                          <input type="text" name="tipe_bayar" value="<?php echo $data['nama_kelas'] ?>" readonly="" class="form-control" >      
                        </div>
                     </div>


                    <div class="col-md-4">
                      <div class="form-group">
                          <label>Jumlah Tagihan</label>
                          <input type="text" name="tipe_bayar" value="<?php echo number_format($data['jmlTagihanBulanan']) ?>" readonly="" class="form-control" >      
                        </div>
                     </div>



               
</div>
</div>


<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="box box-info box-solid">
            <div class="box-header with-border">
                  Pembayaran Tagihan Lain-lain
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="">

   <?php  if ($_SESSION['admin']){ ?>

       <?php if ($sisa!=0) {
        
        ?>               

          <form  method="POST" >

                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Tanggal Bayar</label>
                      <input type="date" class="form-control" value="<?php echo $tgl ?>"   name="tgl_bayar">
                    </div>
                   </div>  


                    <div class="col-md-3">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Jumlah Bayar</label>
                      <input type="text" class="form-control uang" value="<?php echo $sisa ?>"   name="jml_bayar">
                    </div>
                   </div> 


                <div class="col-md-2">
                  <label for="exampleInputEmail1">Tipe Bayar</label>
                   <div class="form-group">
 
                          <select   class="form-control"  name="tipe">

                             
                            
                              <option value="Cash" >Cash</option>
                              <option value="Transfer" >Transfer</option>
                              
                          </select>
                    </div>
                 </div> 

                 <div class="col-md-2">
                  <label for="exampleInputEmail1">Keterangan</label>
                   <div class="form-group">
 
                          <select   class="form-control"  name="keterangan">
                             <option value="Angsuran 1" >Angsuran 1</option>
                             <option value="Angsuran 2" >Angsuran 2</option>
                             <option value="Angsuran 3" >Angsuran 3</option>
                             <option value="Angsuran 4" >Angsuran 4</option>
                             <option value="Angsuran 5" >Angsuran 5</option>
                             <option value="Angsuran 6" >Angsuran 6</option>
                              
                          </select>
                    </div>
                 </div> 

               <div class="col-md-2">



                  <button type="submit" style="margin-top: 20px;" name="simpan" class="btn btn-primary">Bayar</button>

                </div>  

            </form> 


            <?php } }?> 


            <?php 


                if (isset($_POST['simpan'])) {



                  
                     $tgl_bayar = $_POST['tgl_bayar'];
                     $jml_bayar = $_POST['jml_bayar'];
                     $tipe_bayar = $_POST['tipe'];
                     $keterangan2 = $_POST['keterangan'];
                     $jml_bayar_oke = str_replace(".", "", $jml_bayar);

                     $keterangan_oke = $keterangan.'&nbsp'.$keterangan2;


                     if ($jml_bayar_oke > $sisa) {
                      echo "

                          <script>
                              setTimeout(function() {
                                  sweetAlert({
                                      title: 'Maaf!',
                                      text: 'Jumlah Bayar Melebihi sisa Tagihan!',
                                      type: 'error'
                                  }, function() {
                                      window.location = '?page=transaksi&aksi=bayarbebas&nis_siswa=$nis&id_bayar=$id_bayar&id_tahun_ajaran=$id_tahun_ajaran';
                                  });
                              }, 300);
                          </script>
                        ";

                  
                     }else{

                    

                      $query= $koneksi->query(" insert into tb_bayar_bebas (id_tagihan_bebas, tgl_bayar, jml_bayar, ket, cara_bayar)values('$id_tagihan_bebas', '$tgl_bayar', '$jml_bayar_oke', '$keterangan2', '$tipe_bayar') ");



                     $query= $koneksi->query(" insert into tb_kas (id_transaksi, tgl_kas, keterangan, penerimaan)values('$id_tagihan_bebas', '$tgl_bayar', '$keterangan_oke', '$jml_bayar_oke') ");

                     $query= $koneksi->query("UPDATE tb_tagihan_bebas SET  terbayar=(terbayar+$jml_bayar_oke) WHERE id_tagihan_bebas='$id_tagihan_bebas' ");


                  if ($query) {
                          echo "

                              <script>
                                  setTimeout(function() {
                                      swal({
                                          title: 'Pemabayaran',
                                          text: 'Berhasil Disimpan!',
                                          type: 'success'
                                      }, function() {
                                          window.location ='?page=transaksi&aksi=bayarbebas&nis_siswa=$nis&id_bayar=$id_bayar&id_tahun_ajaran=$id_tahun_ajaran';
                                      });
                                  }, 300);
                              </script>

                          ";
                        }


                   }

                   }


             ?>      

   </div>       


             
                <thead>
                <tr>
                  <th>No.</th>
                  <th>Tanggal</th>
                  <th>Jumlah Bayar</th>
                  <th>Tipe Bayar</th>
                  <th>Keterangan</th>

                 <?php  if ($_SESSION['admin']){ ?>
                  <th>Aksi </th>

                  <?php } ?>
             
                </tr>
                </thead>
                <tbody>

                  <?php 


                      $no = 1;

                     $sql2 = $koneksi->query("SELECT * from tb_bayar_bebas WHERE id_tagihan_bebas='$id_tagihan_bebas'");

                      while ($data = $sql2->fetch_assoc()) {
                      
                   ?>


                <tr>
                  <td><?php echo $no++; ?></td>
                  <td ><?php echo tglIndonesia2(date('d F Y', strtotime($data['tgl_bayar']))) ?></td>
                  <td ><?php echo number_format($data['jml_bayar']) ?></td>
                  <td ><?php echo $data['cara_bayar'] ?></td>
                  <td ><?php echo $data['ket'] ?></td>

                  <td >
                   

                     
                    <?php  if ($_SESSION['admin']){ ?>
                    <td >

                      <form method="POST">
                      <input style="width: 150px;" type="hidden" name="jml_bayar" value="<?php echo $data['jml_bayar'] ?>" readonly="" class="form-control"> 

                       <input type="hidden"  name="id_bayar_bebas" value="<?php echo $data['id_bayar_bebas'] ?>"> 
                      <button type="submit" dis  name="simpan2" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus </button>

                       <a target="blank" href="page/transaksi/cetak_bebas.php?id_bayar_bebas=<?php echo $data['id_bayar_bebas'] ?>" class="btn btn-default btn-xs" title=""><i class="fa fa-print"></i>  Cetak</a>

                       <a  href="https://api.whatsapp.com/send?phone=<?php echo $no_hp ?>&text=Terima Kasih Telah Melakukan Pembayaran Atas Nama <?php echo $Siswa?>, kelas: <?php echo $kelas ?>, Pada <?php echo tglIndonesia2(date('D, d F Y', strtotime($data['tgl_bayar'])))?>,   Rp <?php echo number_format($data['jml_bayar'])?>  Guna Membayar <?php echo $nama_bayar ?>  <?php echo $data['ket']?>" target="blank" class="btn btn-success btn-xs"> <i class="fa  fa-whatsapp"></i> Kirim WA</a>

                    </td>
                    </form>


              </form>


             <?php } ?> 
               
                  <td>
                    
                    

         

                  </td>



 
                </tr>
                

                <?php  } ?>

            </tbody>


        </table>

    </div>
 
</div>
</div>


<?php 

    if (isset($_POST['simpan2'])) {

       $id_bayar_bebas=$_POST['id_bayar_bebas'];

        $jml_bayar2=$_POST['jml_bayar'];
      


      $query= $koneksi->query("delete from tb_kas WHERE id_transaksi='$id_tagihan_bebas'");

      $query= $koneksi->query("delete from tb_bayar_bebas WHERE id_bayar_bebas='$id_bayar_bebas'");

      $query= $koneksi->query("update tb_tagihan_bebas set terbayar=(terbayar-$jml_bayar2) WHERE id_tagihan_bebas='$id_tagihan_bebas'");


        if ($query) {
         echo "

                <script>
                    setTimeout(function() {
                        sweetAlert({
                            title: 'OKE!',
                            text: 'Berhasil Dihapus!',
                            type: 'error'
                        }, function() {
                            window.location = '?page=transaksi&aksi=bayarbebas&nis_siswa=$nis&id_bayar=$id_bayar&id_tahun_ajaran=$id_tahun_ajaran';
                        });
                    }, 300);
                </script>
              ";
        }


    }

 ?>




