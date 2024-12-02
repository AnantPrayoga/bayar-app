<?php 

	$id_bayar = $_GET['id'];
	
	$sql = $koneksi->query("select * from tb_jenis_bayar, tb_tahun_ajaran where tb_jenis_bayar.id_tahun_ajaran=tb_tahun_ajaran.id_tahun_ajaran and tb_jenis_bayar.id_bayar='$id_bayar'");
	$data = $sql->fetch_assoc();

	$tipe_bayar = $data['tipe_bayar'];


	if ($tipe_bayar=="Bulanan") {
		
	


 ?>



<script>
function copytextbox() {
    document.getElementById('n1').value = document.getElementById('txtFirst').value;
    document.getElementById('n2').value = document.getElementById('txtFirst').value;
    document.getElementById('n3').value = document.getElementById('txtFirst').value;
    document.getElementById('n4').value = document.getElementById('txtFirst').value;
    document.getElementById('n5').value = document.getElementById('txtFirst').value;
    document.getElementById('n6').value = document.getElementById('txtFirst').value;
    document.getElementById('n7').value = document.getElementById('txtFirst').value;
    document.getElementById('n8').value = document.getElementById('txtFirst').value;
    document.getElementById('n9').value = document.getElementById('txtFirst').value;
    document.getElementById('n10').value = document.getElementById('txtFirst').value;
    document.getElementById('n11').value = document.getElementById('txtFirst').value;
    document.getElementById('n12').value = document.getElementById('txtFirst').value;
}
</script>





<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="box box-primary box-solid">
            <div class="box-header with-border">
                 Pilih Kelas dan Input Tarif
            </div>
            <div class="panel-body">

            	<form role="form"  method="POST"> 

            		<div class="col-md-2">
            			<div class="form-group">
                          <label>Jenis Bayar</label>
                          <input type="text" name="jenis_bayar" value="<?php echo $data['nama_bayar'] ?>" readonly="" class="form-control" >      
                        </div>
                     </div>


                     <div class="col-md-2">
            			<div class="form-group">
                          <label>Tahun Ajaran</label>
                          <input type="text" name="tahun_ajaran" value="<?php echo $data['tahun_ajaran'] ?>" readonly="" class="form-control" >      
                        </div>
                     </div>  

                      <div class="col-md-2">
            			<div class="form-group">
                          <label>Tipe Bayar</label>
                          <input type="text" name="tipe_bayar" value="<?php echo $data['tipe_bayar'] ?>" readonly="" class="form-control" >      
                        </div>
                     </div>


                       


                     <div class="col-md-3">
                     <div class="form-group">

                            <label>Kelas :</label> <br>
                            <select required=""   class="form-control" name="kelas">

                               <option value="">-Pilih Kelas-</option>
                                  <?php


                                      $query = $koneksi->query("SELECT * FROM tb_kelas ORDER by id_kelas");
                                       
                                      while ($tampil_t=$query->fetch_assoc()) {
                                         
                                        echo "<option value='$tampil_t[id_kelas]'> $tampil_t[nama_kelas]</option>";
                                      }

                                  ?>

                            </select>
                        </div>
                    </div>


                     <div class="col-md-3">
            			<div class="form-group">
                          <label>Tarif Setiap Bulan </label>
                          <input type="text" name="tarif" id="txtFirst" onkeyup="copytextbox();" required="" autocomplete="off" class="form-control uang" >      
                        </div>
                     </div> 



                  


                      <div class="col-md-12">
            			<div class="form-group">
                          <label> <br>Tarif Setiap Bulan Tidak Sama</label>
                           
                        </div>
                     </div>


                     <div class="col-md-2">
            			<div class="form-group">
                          <label>Juli</label>
                          <input type="text" name="n1" required="" id="n1" class="form-control uang" >      
                        </div>
                     </div>

                     <div class="col-md-2">
            			<div class="form-group">
                          <label>Agustus</label>
                          <input type="text" name="n2" required="" id="n2" class="form-control uang" >      
                        </div>
                     </div>

                      <div class="col-md-2">
            			<div class="form-group">
                          <label>September</label>
                          <input type="text" name="n3" required="" id="n3" class="form-control uang" >      
                        </div>
                     </div>

                      <div class="col-md-2">
            			<div class="form-group">
                          <label>Oktober</label>
                          <input type="text" name="n4" required="" id="n4"  class="form-control uang" >      
                        </div>
                     </div>

                      <div class="col-md-2">
            			<div class="form-group">
                          <label>November</label>
                          <input type="text" name="n5" required="" id="n5"  class="form-control uang" >      
                        </div>
                     </div>

                      <div class="col-md-2">
            			<div class="form-group">
                          <label>Desember</label>
                          <input type="text" name="n6" required="" id="n6"  class="form-control uang" >      
                        </div>
                     </div>

                     <div class="col-md-2">
            			<div class="form-group">
                          <label>Januari</label>
                          <input type="text" name="n7" required="" id="n7"  class="form-control uang" >      
                        </div>
                     </div>

                     <div class="col-md-2">
            			<div class="form-group">
                          <label>Februari</label>
                          <input type="text" name="n8" required="" id="n8"  class="form-control uang" >      
                        </div>
                     </div>

                     <div class="col-md-2">
            			<div class="form-group">
                          <label>Maret</label>
                          <input type="text" name="n9" required="" id="n9"  class="form-control uang" >      
                        </div>
                     </div>

                     <div class="col-md-2">
            			<div class="form-group">
                          <label>April</label>
                          <input type="text" name="n10" required="" id="n10"  class="form-control uang" >      
                        </div>
                     </div>

                     <div class="col-md-2">
            			<div class="form-group">
                          <label>Mei</label>
                          <input type="text" name="n11" required="" id="n11"  class="form-control uang" >      
                        </div>
                     </div>

                     <div class="col-md-2">
            			<div class="form-group">
                          <label>Juni</label>
                          <input type="text" name="n12" required="" id="n12"  class="form-control uang" >      
                        </div>
                     </div>

                     <button type="submit" name="tambah" class="btn btn-block btn-primary btn-lg">Simpan</button>

                 </form> 

             
                      
                     

                     

                
               
</div>
</div>



<?php
if (isset($_POST['tambah'])){
		
		$id_kelas = $_POST['kelas'];
		//$sqlSiswa=mysql_query("SELECT * FROM siswa WHERE idKelas='$_POST[idKelas]'");
		$sqlSiswa=$koneksi->query("SELECT * FROM tb_siswa WHERE id_siswa NOT IN (SELECT id_siswa FROM tb_tagihan_bulanan WHERE id_bayar='$id_bayar') AND id_kelas='$id_kelas' AND status='Aktif'");
		$jmlSiswa = $sqlSiswa->num_rows;


		
		
		//nilai tarif
		$dt1=$_POST['n1'];
		$dt1_oke = str_replace(".", "", $dt1);

		$dt2=$_POST['n2'];
		$dt2_oke = str_replace(".", "", $dt2);

		$dt3=$_POST['n3'];
		$dt3_oke = str_replace(".", "", $dt3);

		$dt4=$_POST['n4'];
		$dt4_oke = str_replace(".", "", $dt4);

		$dt5=$_POST['n5'];
		$dt5_oke = str_replace(".", "", $dt5);

		$dt6=$_POST['n6'];
		$dt6_oke = str_replace(".", "", $dt6);

		$dt7=$_POST['n7'];
		$dt7_oke = str_replace(".", "", $dt7);

		$dt8=$_POST['n8'];
		$dt8_oke = str_replace(".", "", $dt8);

		$dt9=$_POST['n9'];
		$dt9_oke = str_replace(".", "", $dt9);

		$dt10=$_POST['n10'];
		$dt10_oke = str_replace(".", "", $dt10);

		$dt11=$_POST['n11'];
		$dt11_oke = str_replace(".", "", $dt11);

		$dt12=$_POST['n12'];
		$dt12_oke = str_replace(".", "", $dt12);

		if ($jmlSiswa==0) {

			?>

		        <script>
		            setTimeout(function() {
		                sweetAlert({
		                    title: 'Maaf!',
		                    text: 'Data Tagihan Sudah Dibuat Silahkan Cari di Data Tagihan!',
		                    type: 'error'
		                }, function() {
		                    window.location = '?page=jenisbayar&aksi=seting&id=<?php echo $id_bayar ?>';
		                });
		            }, 300);
		        </script>

      <?php
			
		}else{
		
		while($ds=$sqlSiswa->fetch_assoc()){
			$idSiswa = $ds['id_siswa'];
			$jmlbulan = 12;
			for($j=1; $j<=$jmlbulan; $j++){
				 if ($j==1) {
          $dt=$dt1_oke;
        }

        if ($j==2) {
            $dt=$dt2_oke;
        }

        if ($j==3) {
         $dt=$dt3_oke;
        }
         if ($j==4) {
         $dt=$dt4_oke;
        }
         if ($j==5) {
         $dt=$dt5_oke;
        }
         if ($j==6) {
         $dt=$dt6_oke;
        }
         if ($j==7) {
         $dt=$dt7_oke;
        }
         if ($j==8) {
         $dt=$dt8_oke;
        }
         if ($j==9) {
         $dt=$dt9_oke;
        }
         if ($j==10) {
         $dt=$dt10_oke;
        }
        if ($j==11) {
         $dt=$dt11_oke;
        }
        if ($j==12) {
         $dt=$dt12_oke;
        }
				$query = $koneksi->query("INSERT INTO tb_tagihan_bulanan(id_bayar, id_siswa, id_kelas, id_bulan, jml_bayar)
									VALUES('$id_bayar',
										'$idSiswa',
										'$id_kelas',
										'$j',
										'$dt')");


				
			}
		}

		if ($query) {
		            echo "

		                <script>
		                    setTimeout(function() {
		                        swal({
		                            title: 'Data Tagihan',
		                            text: 'Berhasil Disimpan!',
		                            type: 'success'
		                        }, function() {
		                            window.location = '?page=jenisbayar&aksi=seting&id=$id_bayar';
		                        });
		                    }, 300);
		                </script>

		            ";
		          }
		
		
    }
}
	
	
?>



<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                 Data Tagihan
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="example1">

               <div class="col-md-12" >
				<form  method="POST" >
                    <div class="col-md-3">    
		                <div class="form-group">

                    <label style="color: black; font-weight: bold;">Pilih Kelas</label> <br>
                   <select required=""   class="form-control" name="kelas">

                               <option value="">-Pilih Kelas-</option>
                                  <?php


                                      $query = $koneksi->query("SELECT * FROM tb_kelas ORDER by id_kelas");
                                       
                                      while ($tampil_t=$query->fetch_assoc()) {
                                         
                                        echo "<option value='$tampil_t[id_kelas]'> $tampil_t[nama_kelas]</option>";
                                      }

                                  ?>

                            </select>
              </div> 

          </div>

          

       
          
             <div class="col-md-3">    
               <div class="form-group">
                <button type="submit" name="filter" style="margin-top: 25px;" class="btn btn-info"><i class="fa fa-search"></i> Cari</button>
             </div>

        </div>


            

         </form> 

   </div>      	


             
                <thead>
                <tr>
                  <th>No.</th>
				  <th>NIS</th>
				  <th>Nama</th>
				  <th>Kelas</th>
          <th>Total Tagihan</th>
				  <th>Aksi</th>
             
                </tr>
                </thead>
                <tbody>

                  <?php 

                  if (isset($_POST['filter'])) {
                     		 $kelas = $_POST['kelas'];
                         
                     		 
                     	}

                     	if ($kelas !="") {

                      $no = 1;

                      $sql = $koneksi->query("SELECT tb_siswa.nis, tb_siswa.id_siswa, tb_siswa.nama_siswa, tb_kelas.nama_kelas, sum(tb_tagihan_bulanan.jml_bayar) as jml_bayar_oke from tb_tagihan_bulanan
													
											INNER JOIN tb_siswa ON tb_tagihan_bulanan.id_siswa = tb_siswa.id_siswa
											INNER JOIN tb_kelas ON tb_tagihan_bulanan.id_kelas = tb_kelas.id_kelas
											WHERE tb_tagihan_bulanan.id_bayar='$id_bayar'
											AND tb_tagihan_bulanan.id_kelas='$kelas'
                      GROUP BY tb_siswa.id_siswa	
                      	");


                      while ($data = $sql->fetch_assoc()) {
                        
                      
                   ?>


                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $data['nis'] ?></td>
                  <td><?php echo $data['nama_siswa'] ?></td>
                  <td><?php echo $data['nama_kelas'] ?></td>
                  <td><?php echo number_format($data['jml_bayar_oke'],0,",",".") ?></td>
                 
                  <td> 

                    <a href="#" type="button" class="btn btn-info" data-toggle="modal" data-target="#mymodal<?php echo $data['id_siswa']; ?>"><i class="fa fa-eye"></i>  Lihat Detail Tagihan</a>

                  	<a href="?page=jenisbayar&aksi=ubahbulanan&id=<?php echo $data['id_siswa'] ;?>" class="btn btn-success" title=""><i class="fa fa-edit"></i>  Ubah</a>

                     <a onclick="return confirm('Apakah Anda Yakin Mengahpus Data Ini')" href="?page=jenisbayar&aksi=hapusbulanan&id_siswa=<?php echo $data['id_siswa'] ;?>&id_bayar=<?php echo $id_bayar?>" class="btn btn-danger" title=""><i class="fa fa-trash"></i>  Hapus</a>
                 </td>


                  
                </tr>


                 <div class="modal fade" id="mymodal<?php echo $data['id_siswa']; ?>">
                  <div class="modal-dialog" >
                    <div class="modal-content" >
                     <div class="box box-primary box-solid">
                      <div class="box-header with-border">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                          Detail Tagihan
                      </div>
                      <div class="modal-body">

                        <?php 

                          $id_siswa = $data['id_siswa'];

                          $nama_siswa = $data['nama_siswa'];
                          $nis = $data['nis'];

                          ?>


                      <div class="col-md-12">  

                         <div class="col-md-6">

                          <div class="form-group">
                            <label>Nis</label>
                            <input  type="text" name="nis" class="form-control" value="<?php echo  $nis; ?>" required="">      
                          </div>
                         </div> 

                          <div class="col-md-6">

                            <div class="form-group">
                              <label>Nama Siswa</label>
                              <input  type="text" name="nis" class="form-control" value="<?php echo  $nama_siswa; ?>" required="">      
                            </div>

                          </div>
                     
                     </div>   


                          <?php

                          $sql2 = $koneksi->query("select * from tb_tagihan_bulanan, tb_bulan, tb_jenis_bayar, tb_tahun_ajaran, tb_kelas, tb_siswa where tb_tagihan_bulanan.id_bayar=tb_jenis_bayar.id_bayar and tb_tahun_ajaran.id_tahun_ajaran=tb_jenis_bayar.id_tahun_ajaran and
                            tb_tagihan_bulanan.id_kelas=tb_kelas.id_kelas and
                            tb_tagihan_bulanan.id_siswa=tb_siswa.id_siswa and
                            tb_tagihan_bulanan.id_bulan = tb_bulan.id_bulan and
                            tb_tagihan_bulanan.id_siswa='$id_siswa' and tb_tagihan_bulanan.id_bayar='$id_bayar' ORDER BY tb_bulan.urutan ASC");

                         while ($data2 = $sql2->fetch_assoc()) {


                          $status=$data2['status_bayar'] ;

                            if ($status==0) {
                              $status_t="Belum Lunas";
                              $color = "red";
                            }else{
                              $status_t="Lunas";
                              $color = "green";
                            }

                         ?>

                     

                    <div class="col-md-12">      

                      <div class="col-md-4">

                        <div class="form-group"  style="color: <?php echo $color ?>">
                          <label>Bulan</label>
                          <input  style="color: <?php echo $color ?>" type="text" name="nis" class="form-control" value="<?php echo $data2['nama_bulan']; ?>" required="">      
                        </div>

                        

                      </div>

                      <div class="col-md-4">

                        <div class="form-group"  style="color: <?php echo $color ?>">
                          <label>Jumlah Tagihan</label>
                          <input  style="color: <?php echo $color ?>" type="text" name="nis" class="form-control" value="<?php echo number_format($data2['jml_bayar'],0,",",".") ?>" required="">      
                        </div>

                        

                      </div>

                       <div class="col-md-4">

                        <div class="form-group" style="color: <?php echo $color ?>">
                          <label>Status</label>
                          <input  style="color: <?php echo $color ?>" type="text" name="nis" class="form-control" value="<?php echo $status_t ?>" required="">      
                        </div>

                        

                      </div>

                    </div>  

                     
                         
                         <?php
                          }
                         ?> 


                      </div>
                      <div class="modal-footer">

                         <button type="button" class="btn btn-block btn-danger btn-lg" data-dismiss="modal">Close</button>
                        

                      
                       
                      </div>



                <?php } } ?>

            </tbody>


             	

        </table>



    </div>

   
</div>
</div>


<?php } else{ ?>

<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="box box-primary box-solid">
            <div class="box-header with-border">
                 Pilih Kelas dan Input Tarif
            </div>
            <div class="panel-body">

            	<form role="form"  method="POST"> 

            		<div class="col-md-2">
            			<div class="form-group">
                          <label>Jenis Bayar</label>
                          <input type="text" name="jenis_bayar" value="<?php echo $data['nama_bayar'] ?>" readonly="" class="form-control" >      
                        </div>
                     </div>


                     <div class="col-md-2">
            			<div class="form-group">
                          <label>Tahun Ajaran</label>
                          <input type="text" name="tahun_ajaran" value="<?php echo $data['tahun_ajaran'] ?>" readonly="" class="form-control" >      
                        </div>
                     </div>  

                      <div class="col-md-2">
            			<div class="form-group">
                          <label>Tipe Bayar</label>
                          <input type="text" name="tipe_bayar" value="<?php echo $data['tipe_bayar'] ?>" readonly="" class="form-control" >      
                        </div>
                     </div>


                       


                     <div class="col-md-3">
                     <div class="form-group">

                            <label>Kelas :</label> <br>
                            <select required=""   class="form-control" name="kelas">

                               <option value="">-Pilih Kelas-</option>
                                  <?php


                                      $query = $koneksi->query("SELECT * FROM tb_kelas ORDER by id_kelas");
                                       
                                      while ($tampil_t=$query->fetch_assoc()) {
                                         
                                        echo "<option value='$tampil_t[id_kelas]'> $tampil_t[nama_kelas]</option>";
                                      }

                                  ?>

                            </select>
                        </div>
                    </div>


                     <div class="col-md-3">
            			<div class="form-group">
                          <label>Tarif  </label>
                          <input type="text" name="tarif"  required="" autocomplete="off" class="form-control uang" >      
                        </div>
                     </div> 


                     <button type="submit" name="tambah" class="btn btn-block btn-primary btn-lg">Simpan</button>

                 </form> 

     
               
</div>
</div>







<?php
if (isset($_POST['tambah'])){

		$id_bayar_oke = $id_bayar;
		$id_kelas = $_POST['kelas'];
		$tarif = $_POST['tarif'];
		$tarif_oke = str_replace(".", "", $tarif);

		$sqlSiswa=$koneksi->query("SELECT * FROM tb_siswa WHERE id_siswa NOT IN (SELECT id_siswa FROM tb_tagihan_bebas WHERE id_bayar='$id_bayar') AND id_kelas='$id_kelas' AND status='Aktif'");
		$jmlSiswa = $sqlSiswa->num_rows;


		if ($jmlSiswa==0) {

			?>

		        <script>
		            setTimeout(function() {
		                sweetAlert({
		                    title: 'Maaf!',
		                    text: 'Data Tagihan Sudah Dibuat Silahkan Cari di Data Tagihan!',
		                    type: 'error'
		                }, function() {
		                    window.location = '?page=jenisbayar&aksi=seting&id=<?php echo $id_bayar ?>';
		                });
		            }, 300);
		        </script>

      <?php
			
		}else{

		

		// looping
	while($ds=$sqlSiswa->fetch_assoc()){
			$idSiswa = $ds['id_siswa'];


			$query= $koneksi->query("INSERT INTO tb_tagihan_bebas(id_bayar, id_siswa, id_kelas, total_tagihan)
									VALUES('$id_bayar_oke',
											'$idSiswa',
											'$id_kelas',
											'$tarif_oke')");
		
			}
		

		if ($query) {
		            echo "

		                <script>
		                    setTimeout(function() {
		                        swal({
		                            title: 'Data Tagihan Bebas',
		                            text: 'Berhasil Disimpan!',
		                            type: 'success'
		                        }, function() {
		                            window.location = '?page=jenisbayar&aksi=seting&id=$id_bayar';
		                        });
		                    }, 300);
		                </script>

		            ";
		          }
		
		
    }

    }
	
	
?>



<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                 Data Tagihan
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="example1">

               <div class="col-md-12" >
				<form  method="POST" >
                    <div class="col-md-3">    
		                <div class="form-group">

                    <label style="color: black; font-weight: bold;">Pilih Kelas</label> <br>
                   <select required=""   class="form-control" name="kelas">

                               <option value="">-Pilih Kelas-</option>
                                  <?php


                                      $query = $koneksi->query("SELECT * FROM tb_kelas ORDER by id_kelas");
                                       
                                      while ($tampil_t=$query->fetch_assoc()) {
                                         
                                        echo "<option value='$tampil_t[id_kelas]'> $tampil_t[nama_kelas]</option>";
                                      }

                                  ?>

                            </select>
              </div> 

          </div>

       
          
             <div class="col-md-3">    
               <div class="form-group">
                <button type="submit" name="filter" style="margin-top: 25px;" class="btn btn-info"><i class="fa fa-search"></i> Cari</button>
             </div>

        </div>


            

         </form> 

   </div>      	


             
                <thead>
                <tr>
                  <th>No.</th>
				  <th>NIS</th>
				  <th>Nama</th>
				  <th>Kelas</th>
          <th>Total Tagihan</th>
				  <th>Aksi</th>
             
                </tr>
                </thead>
                <tbody>

                  <?php 

                  if (isset($_POST['filter'])) {
                     		 $kelas = $_POST['kelas'];
                     		 
                     	}

                     	if ($kelas !="") {

                      $no = 1;

                      $sql = $koneksi->query("SELECT * from tb_tagihan_bebas
													
											INNER JOIN tb_siswa ON tb_tagihan_bebas.id_siswa = tb_siswa.id_siswa
											INNER JOIN tb_kelas ON tb_tagihan_bebas.id_kelas = tb_kelas.id_kelas
											WHERE tb_tagihan_bebas.id_bayar='$id_bayar'
											AND tb_tagihan_bebas.id_kelas='$kelas' GROUP BY tb_siswa.id_siswa	
                      	");


                      while ($data = $sql->fetch_assoc()) {
                        
                      
                   ?>


                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $data['nis'] ?></td>
                  <td><?php echo $data['nama_siswa'] ?></td>
                  <td><?php echo $data['nama_kelas'] ?></td>
                  <td><?php echo number_format($data['total_tagihan'],0,",",".") ?></td>
                 
                  <td> 



                  	<a href="?page=jenisbayar&aksi=ubahbebas&id=<?php echo $data['id_tagihan_bebas'] ;?>" class="btn btn-success" title=""><i class="fa fa-edit"></i>  Ubah</a>

                     <a onclick="return confirm('Apakah Anda Yakin Mengahpus Data Ini')" href="?page=jenisbayar&aksi=hapusbebas&id_tagihan=<?php echo $data['id_tagihan_bebas'] ;?>&id_bayar=<?php echo $id_bayar?>" class="btn btn-danger" title=""><i class="fa fa-trash"></i>  Hapus</a>
                 </td>


                  
                </tr>
                

                <?php } }?>

            </tbody>


             	

        </table>



    </div>

   
</div>
</div>



<?php } ?>







