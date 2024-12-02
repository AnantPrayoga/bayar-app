<?php 

    function tglIndonesia3($str2){
               $tr2   = trim($str2);
               $str2    = str_replace(array('Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'), array('Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum\'at', 'Sabtu', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'), $tr2);
               return $str2;
           }

 ?>

<?php 


   $nis = $_GET['nis_siswa'];
   $id_bayar = $_GET['id_bayar'];
   $id_tahun_ajaran = $_GET['id_tahun_ajaran'];
  
  $sql = $koneksi->query("SELECT tb_tahun_ajaran.tahun_ajaran, tb_tahun_ajaran.id_tahun_ajaran, tb_jenis_bayar.nama_bayar, tb_jenis_bayar.id_bayar, tb_jenis_bayar.id_tahun_ajaran, tb_siswa.nis, tb_siswa.nama_siswa, tb_siswa.no_hp_ortu, tb_kelas.nama_kelas, tb_tagihan_bulanan.id_bayar, Sum(tb_tagihan_bulanan.jml_bayar) AS jmlTagihanBulanan from tb_jenis_bayar
                          
                        INNER JOIN tb_tagihan_bulanan ON tb_tagihan_bulanan.id_bayar = tb_jenis_bayar.id_bayar
                        INNER JOIN tb_tahun_ajaran ON tb_jenis_bayar.id_tahun_ajaran = tb_tahun_ajaran.id_tahun_ajaran

                        INNER JOIN tb_siswa ON tb_tagihan_bulanan.id_siswa = tb_siswa.id_siswa
                        INNER JOIN tb_kelas ON tb_tagihan_bulanan.id_kelas = tb_kelas.id_kelas
                        WHERE tb_siswa.nis='$nis' and tb_jenis_bayar.id_tahun_ajaran='$id_tahun_ajaran' and tb_jenis_bayar.id_bayar='$id_bayar' GROUP BY tb_jenis_bayar.id_bayar 
                          ");

  $data = $sql->fetch_assoc();

  $nama_bayar= $data['nama_bayar'];
  $Siswa = $data['nama_siswa'];
  $keterangan = 'pembayaran'.'&nbsp'.$nama_bayar.'&nbsp'.'Atas Nama'.'&nbsp'.$Siswa;
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
                  Pembayaran Tagihan Bulanan
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="">

               

   </div>       


             
                <thead>
                <tr>
                  <th>No.</th>
                  <th>Bulan</th>
                  <th>Tagihan</th>
                  <th>Status</th>

                  <?php  if ($_SESSION['admin']){ ?>
                  <th>Tanggal Bayar</th>
                  <th>Tipe Bayar</th>
                  
                  <th>Aksi </th>
                  <?php } ?>
             
                </tr>
                </thead>
                <tbody>

                  <?php 

                  

                      $no = 1;

                     $sql2 = $koneksi->query("SELECT tb_tahun_ajaran.tahun_ajaran, tb_tahun_ajaran.id_tahun_ajaran, tb_jenis_bayar.nama_bayar, tb_jenis_bayar.id_bayar, tb_jenis_bayar.id_tahun_ajaran, tb_siswa.nis, tb_siswa.nama_siswa, tb_kelas.nama_kelas, tb_tagihan_bulanan.id_bayar, tb_tagihan_bulanan.tgl_bayar, tb_bulan.nama_bulan, tb_bulan.urutan, tb_tagihan_bulanan.jml_bayar, tb_tagihan_bulanan.id_tagihan_bulanan, tb_tagihan_bulanan.status_bayar from tb_jenis_bayar
                          
                        INNER JOIN tb_tagihan_bulanan ON tb_tagihan_bulanan.id_bayar = tb_jenis_bayar.id_bayar
                        INNER JOIN tb_tahun_ajaran ON tb_jenis_bayar.id_tahun_ajaran = tb_tahun_ajaran.id_tahun_ajaran
                        INNER JOIN tb_bulan ON tb_tagihan_bulanan.id_bulan = tb_bulan.id_bulan

                        INNER JOIN tb_siswa ON tb_tagihan_bulanan.id_siswa = tb_siswa.id_siswa
                        INNER JOIN tb_kelas ON tb_tagihan_bulanan.id_kelas = tb_kelas.id_kelas
                        WHERE tb_siswa.nis='$nis' and tb_jenis_bayar.id_tahun_ajaran='$id_tahun_ajaran' and tb_jenis_bayar.id_bayar='$id_bayar' order BY tb_bulan.urutan 
                          ");

                      while ($data = $sql2->fetch_assoc()) {


                      	$status=$data['status_bayar'] ;

                      	if ($status==0) {
                      		$status_t="Belum Bayar";
                      		$color = "red";
                      	}else{
                      		$status_t="Sudah Bayar";
                      		$color = "green";
                      	}

                      	$tgl=date('Y-m-d');

                    
                      
                   ?>


                <tr>
                  <td><?php echo $no++; ?></td>
                  <td style="color:<?php echo $color ?>"><?php echo $data['nama_bulan'] ?></td>
                  <div col-md-1>

                 <form  method="POST">	
                  	
                  
                  <td> <input style="color:<?php echo $color ?>; width: 100px;" type="text" value="<?php echo number_format($data['jml_bayar']) ?>"  class="form-control" readonly="" name="jml_bayar"></td>
                  </div>
                  <td style="color:<?php echo $color ?>"><?php echo $status_t ?></td>

                
                  	
                 <?php  if ($_SESSION['admin']){ ?>

                  <td ><input style=" width: 150px;" type="date" value="<?php echo $tgl ?>"  class="form-control" name="tgl_bayar"></td>

                   <td >
                  <div class="form-group">

                        
                          <select style=" width: 100px;"   class="form-control"  name="tipe">

                             
                            
                              <option value="Cash" >Cash</option>
                              <option value="Transfer" >Transfer</option>
                              
                          </select>
                        </div> 
                  </td>       
                  <input type="hidden"  name="id_tagihan_bulanan" value="<?php echo $data['id_tagihan_bulanan'] ?>">

                  <?php if ($status==0) {
                  	
                  ?>
                  <td > <button type="submit"  name="simpan" class="btn btn-primary btn-xs"><i class="fa fa-money"></i> Bayar
                  </button></td>

                  <td >
                      <a  href="#" disabled="" class="btn btn-success btn-xs"> <i class="fa  fa-whatsapp"></i> Kirim WA</a>

                      </td>

                   <td ><a href="" disabled="" class="btn btn-default" title=""><i class="fa fa-print"></i>  Cetak</a></td>

                  <?php } else{ ?>
                  		<td ><button type="submit" dis  name="simpan2" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus </button></td>

                      <td >
                      <a  href="https://api.whatsapp.com/send?phone=<?php echo $no_hp ?>&text=Terima Kasih Telah Melakukan Pembayaran Atas Nama <?php echo $data['nama_siswa']?>, kelas: <?php echo $kelas ?>, Pada <?php echo tglIndonesia3(date('D, d F Y', strtotime($data['tgl_bayar'])))?>,   Rp <?php echo number_format($data['jml_bayar'])?>  Guna Membayar <?php echo $nama_bayar ?> bulan <?php echo $data['nama_bulan']?>" target="blank" class="btn btn-success btn-xs"> <i class="fa  fa-whatsapp"></i> Kirim WA</a>

                      </td>

                  		 <td ><a target="blank" href="page/transaksi/cetak.php?id_tagihan_bulanan=<?php echo $data['id_tagihan_bulanan'] ?>" class="btn btn-default" title=""><i class="fa fa-print"></i>  Cetak</a></td>
                  <?php } ?>

                  <?php } ?>

              </form>
               
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

	
	if (isset($_POST['simpan'])) {
		$jml_bayar = $_POST['jml_bayar'];
        $jml_bayar_oke = str_replace(",", "", $jml_bayar);

		$tgl_bayar = $_POST['tgl_bayar'];
		$tipe = $_POST['tipe'];
		$id_tagihan_bulanan = $_POST['id_tagihan_bulanan'];
		
		

		$query= $koneksi->query("UPDATE tb_tagihan_bulanan SET status_bayar='1', tgl_bayar='$tgl_bayar',  cara_bayar='$tipe', terbayar=(terbayar+jml_bayar) WHERE id_tagihan_bulanan='$id_tagihan_bulanan' ");

		$query= $koneksi->query(" insert into tb_kas (id_transaksi, tgl_kas, keterangan, penerimaan)values('$id_tagihan_bulanan', '$tgl_bayar', '$keterangan', '$jml_bayar_oke') ");


		if ($query) {
            echo "

                <script>
                    setTimeout(function() {
                        swal({
                            title: 'Pemabayaran',
                            text: 'Berhasil Disimpan!',
                            type: 'success'
                        }, function() {
                            window.location ='?page=transaksi&aksi=bayarbulanan&nis_siswa=$nis&id_bayar=$id_bayar&id_tahun_ajaran=$id_tahun_ajaran';
                        });
                    }, 300);
                </script>

            ";
          }

	
	}


 ?>



 <?php 

	
	if (isset($_POST['simpan2'])) {
		$tgl_bayar = $_POST['tgl_bayar'];
		$tipe = $_POST['tipe'];
		$id_tagihan_bulanan = $_POST['id_tagihan_bulanan'];
		
		

		$query= $koneksi->query("UPDATE tb_tagihan_bulanan SET status_bayar='0', tgl_bayar='0000-00-00', terbayar=(terbayar-jml_bayar), cara_bayar='' WHERE id_tagihan_bulanan='$id_tagihan_bulanan' ");

		$query= $koneksi->query("delete from tb_kas WHERE id_transaksi='$id_tagihan_bulanan'");


		if ($query) {
            echo "

                <script>
                    setTimeout(function() {
                        swal({
                            title: 'Pemabayaran',
                            text: 'Berhasil Disimpan!',
                            type: 'success'
                        }, function() {
                            window.location ='?page=transaksi&aksi=bayarbulanan&nis_siswa=$nis&id_bayar=$id_bayar&id_tahun_ajaran=$id_tahun_ajaran';
                        });
                    }, 300);
                </script>

            ";
          }

	
	}


 ?>

