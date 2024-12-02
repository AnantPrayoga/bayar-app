<?php 


   $id_siswa = $_GET['id'];
  
  $sql = $koneksi->query("select * from tb_siswa, tb_kelas where tb_siswa.id_kelas=tb_kelas.id_kelas and tb_siswa.id_siswa='$id_siswa'");
  $data = $sql->fetch_assoc();
  $nis = $data['nis'];

  $no_hp = $data['no_hp_ortu'];
  $nama_siswa = $data['nama_siswa'];
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

                
                <div class="col-md-3">
                  <div class="form-group">
                          <label>Tahun Ajaran</label>
                          <input type="text"  value="Semua Tahun Ajaran" readonly="" class="form-control" >      
                        </div>
                     </div>

                <div class="col-md-3">
                  <div class="form-group">
                          <label>Nis</label>
                          <input type="text" name="jenis_bayar" value="<?php echo $data['nis'] ?>" readonly="" class="form-control" >      
                        </div>
                     </div>


                     <div class="col-md-3">
                  <div class="form-group">
                          <label>Nama Siswa</label>
                          <input type="text" name="tahun_ajaran" value="<?php echo $data['nama_siswa'] ?>" readonly="" class="form-control" >      
                        </div>
                     </div>  

                      <div class="col-md-3">
                  <div class="form-group">
                          <label>Kelas</label>
                          <input type="text" name="tipe_bayar" value="<?php echo $data['nama_kelas'] ?>" readonly="" class="form-control" >      
                        </div>
                     </div>



               
</div>
</div>



<div class="row">



    <div class="col-md-12">

      <div class="form-group">
                    <a target="blank" href="page/transaksi/catak_tagihan.php?id=<?php echo $id_siswa ?>" class="btn btn-warning" title=""><i class="fa fa-print"></i>  Cetak Semua Tagihan </a>
                 </div>

        <!-- Advanced Tables -->
        <div class="box box-danger box-solid">
            <div class="box-header with-border">
                  Tagihan Bulanan
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" >


                      

               

   </div>       


             
                <thead>
                <tr>
                  <th>No.</th>
                  <th>Tahun Ajaran</th>
                  <th>Kelas</th>
                  <th>Jenis Pembayaran</th>
                  <th>Total Tagihan</th>
                  <th>Tagihan Dibayar</th>
                  <th>Sisa Tagihan </th>
                  <th>Aksi </th>
             
                </tr>
                </thead>
                <tbody>

                  <?php 

                  

                      $no = 1;

                      $sql = $koneksi->query("SELECT tb_tahun_ajaran.tahun_ajaran, tb_tahun_ajaran.id_tahun_ajaran, tb_jenis_bayar.nama_bayar, tb_tagihan_bulanan.id_bayar, tb_kelas.nama_kelas, Sum(tb_tagihan_bulanan.jml_bayar) AS jmlTagihanBulanan, Sum(tb_tagihan_bulanan.terbayar) AS jml_terbayar from tb_jenis_bayar
                          
                        INNER JOIN tb_tagihan_bulanan ON tb_tagihan_bulanan.id_bayar = tb_jenis_bayar.id_bayar
                        INNER JOIN tb_tahun_ajaran ON tb_jenis_bayar.id_tahun_ajaran = tb_tahun_ajaran.id_tahun_ajaran

                        INNER JOIN tb_siswa ON tb_tagihan_bulanan.id_siswa = tb_siswa.id_siswa
                        INNER JOIN tb_kelas ON tb_tagihan_bulanan.id_kelas = tb_kelas.id_kelas
                        WHERE tb_siswa.nis='$nis' GROUP BY tb_jenis_bayar.id_bayar order by nama_kelas asc
                          ");


                      while ($data = $sql->fetch_assoc()) {

                      $jml_tagihan = $data['jmlTagihanBulanan'];
                      $terbayar =  $data['jml_terbayar'];

                      $sisa = $jml_tagihan-$terbayar;
                      
                   ?>


                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $data['tahun_ajaran'] ?></td>
                  <td><?php echo $data['nama_kelas'] ?></td>

                  <td><?php echo $data['nama_bayar'] ?></td>
                  <td><?php echo number_format($data['jmlTagihanBulanan']) ?></td>
                  <td><?php echo number_format($data['jml_terbayar']) ?></td> 
                  <td><?php echo number_format($sisa) ?></td> 
                  <td>
                    
                    <a href="?page=transaksi&aksi=bayarbulanan&nis_siswa=<?php echo $nis ;?>&id_bayar=<?php echo $data['id_bayar'] ?>&id_tahun_ajaran=<?php echo $data['id_tahun_ajaran']; ?>" class="btn btn-info" title=""><i class="fa fa-eye"></i>  Lihat Tagihan</a>


                    <a  href="https://api.whatsapp.com/send?phone=<?php echo $no_hp ?>&text=Tagihan Pembayaran <?php echo $data['nama_bayar'] ?> Atas Nama <?php echo $nama_siswa?>, kelas: <?php echo $kelas ?>, Dengan Tagihan   Rp <?php echo number_format($sisa)?>, Terima Kasih" target="blank" class="btn btn-success"> <i class="fa  fa-whatsapp"></i> Kirim WA</a>
         

                  </td>



 
                </tr>

                

                <?php

                  $total=$total+$sisa;

                 } 

                 ?>


                <tr>
                  <td colspan="6" align="right">Total Tagihan</td>
                  <td ><?php echo number_format($total) ?></td>
                </tr>

            </tbody>


        </table>

    </div>
 
</div>
</div>


<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="box box-info box-solid">
            <div class="box-header with-border">
                  Tagihan Lain-lain
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">

               

   </div>       


             
                <thead>
                <tr>
                  <th>No.</th>
                  <th>Tahun Ajaran</th>
                  <th>Kelas</th>
                  <th>Jenis Pembayaran</th>
                  <th>Total Tagihan</th>
                  <th>Tagihan Dibayar</th>
                  <th>Sisa Tagihan </th>
                  <th>Aksi </th>
             
                </tr>
                </thead>
                <tbody>

                  <?php 

                  

                      $no = 1;

                      $sql2 = $koneksi->query("SELECT tb_tahun_ajaran.tahun_ajaran, tb_tahun_ajaran.id_tahun_ajaran, tb_jenis_bayar.nama_bayar, tb_tagihan_bebas.id_bayar, tb_kelas.nama_kelas, Sum(tb_tagihan_bebas.total_tagihan) AS jmlTagihanBulanan2, Sum(tb_tagihan_bebas.terbayar) AS jml_terbayar2 from tb_jenis_bayar
                          
                        INNER JOIN tb_tagihan_bebas ON tb_tagihan_bebas.id_bayar = tb_jenis_bayar.id_bayar
                        INNER JOIN tb_tahun_ajaran ON tb_jenis_bayar.id_tahun_ajaran = tb_tahun_ajaran.id_tahun_ajaran

                        INNER JOIN tb_siswa ON tb_tagihan_bebas.id_siswa = tb_siswa.id_siswa
                        INNER JOIN tb_kelas ON tb_tagihan_bebas.id_kelas = tb_kelas.id_kelas
                        WHERE tb_siswa.nis='$nis' GROUP BY tb_jenis_bayar.id_bayar order by nama_kelas asc
                          ");


                      while ($data2 = $sql2->fetch_assoc()) {

                      $jml_tagihan2 = $data2['jmlTagihanBulanan2'];
                      $terbayar2 =  $data2['jml_terbayar2'];

                      $sisa2 = $jml_tagihan2-$terbayar2;
                      
                   ?>


                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $data2['tahun_ajaran'] ?></td>
                   <td><?php echo $data2['nama_kelas'] ?></td>
                  <td><?php echo $data2['nama_bayar'] ?></td>
                  <td><?php echo number_format($data2['jmlTagihanBulanan2']) ?></td>
                  <td><?php echo number_format($data2['jml_terbayar2']) ?></td> 
                  <td><?php echo number_format($sisa2) ?></td> 
                  <td>
                    
                    <a href="?page=transaksi&aksi=bayarbebas&nis_siswa=<?php echo $nis ;?>&id_bayar=<?php echo $data2['id_bayar'] ?>&id_tahun_ajaran=<?php echo $data2['id_tahun_ajaran']; ?>" class="btn btn-info" title=""><i class="fa fa-eye"></i>  Lihat Tagihan</a>

         
                    <a  href="https://api.whatsapp.com/send?phone=<?php echo $no_hp ?>&text=Tagihan Pembayaran <?php echo $data2['nama_bayar'] ?> Atas Nama <?php echo $nama_siswa?>, kelas: <?php echo $kelas ?>, Dengan Tagihan   Rp <?php echo number_format($sisa2)?>, Terima Kasih" target="blank" class="btn btn-success"> <i class="fa  fa-whatsapp"></i> Kirim WA</a>

                  </td>



 
                </tr>
                

                <?php  

                $total2=$total2+$sisa2;

                 } 

                 ?>


                <tr>
                  <td colspan="6" align="right">Total Tagihan</td>
                  <td ><?php echo number_format($total2) ?></td>
                </tr>

            </tbody>


        </table>



    </div>
 
</div>
</div>

<div style="font-size: 20px; text-align: right; font-weight: bold; color: red;">Total Semua Tagihan : <?php echo number_format($total + $total2) ?></div><br>