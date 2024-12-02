
 <?php 

 		$id = $_GET['id'];

 		$sql = $koneksi->query("select * from tb_bayar where id_bayar='$id'");

 		$data = $sql->fetch_assoc();

 		
 		

  ?>

 <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Ubah Pembayaran Keuangan Sekolah</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="POST" enctype="multipart/form-data">
              <div class="box-body">

              	<div class="form-group">


              		 <div class="form-group">

                            <label>Nama Siswa :</label> <br>
                            <select required=""  class="form-control" name="siswa">


    	
                               
    <?php


        $query = $koneksi->query("SELECT * FROM tb_siswa");
         
        while ($tampil_t=$query->fetch_assoc()) {

        	 $pilih_t=($tampil_t['nis']==$data['nis_siswa']?"selected":"");
           
          echo "<option value='$tampil_t[nis]' $pilih_t> $tampil_t[nama_siswa]</option>";
        }

    ?>

                            </select>
                        </div>

                          <label>Nama Bayar :</label> <br>
                          <select required=""   class="form-control"  name="bayar">

                              
                           
                              <option value="Seragam" <?php if ($data['nama_bayar']=='Seragam'){ echo "selected";} ?>>Seragam</option>
                              <option value="Buku" <?php if ($data['nama_bayar']=='Buku'){ echo "selected";} ?>>Buku</option>
                              <option value="Alat Tulis" <?php if ($data['nama_bayar']=='Alat Tulis'){ echo "selected";} ?>>Alat Tulis</option>
                              <option value="Peci" <?php if ($data['nama_bayar']=='Peci'){ echo "selected";} ?>>Peci</option>
                              <option value="Jilbab" <?php if ($data['nama_bayar']=='Jilbab'){ echo "selected";} ?>>Jilbab</option>
                              
                          </select>
                        </div>  
                

                <div class="form-group">
                  <label>Jumlah </label>
                  <input type="text" class="form-control uang" name="jumlah" required="" value="<?php echo $data['jumlah'] ?>">
                </div>


                <div class="form-group">
                  <label>Keterangan </label>
                  <input type="text" class="form-control" name="keterangan" required="" value="<?php echo $data['keterangan'] ?>">
                </div>
               


              <div class="box-footer">
                <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
              </div>
            </form>
          </div>



          <?php 



          		if (isset($_POST['simpan'])) {
          			
          			$siswa = $_POST['siswa'];
          			$bayar = $_POST['bayar'];
          			$jumlah = $_POST['jumlah'];
          			$keterangan = $_POST['keterangan'];

          			$sql_siswa = $koneksi->query("select * from tb_siswa where nis='$siswa'");
          			$data_siswa = $sql_siswa->fetch_assoc();

          			$nama_siswa = $data_siswa['nama_siswa'];

          			$jumlah_oke = str_replace(".", "", $jumlah);
          			
          			$keterangan_oke = 'pembayaran'.'&nbsp'.$bayar.'&nbsp'.'Atas Nama'.'&nbsp'.$nama_siswa;
					$tgl=date('Y-m-d');

          			$sql = $koneksi->query("update  tb_bayar set nis_siswa='$siswa', nama_bayar='$bayar', jumlah='$jumlah_oke', keterangan='$keterangan' where id_bayar='$id' ");

          			

          			$sql = $koneksi->query("update  tb_kas set keterangan='$keterangan_oke', penerimaan='$jumlah_oke' where id_bayar='$id' ");

          			if ($sql) {
          				?>

          					<script>
                            setTimeout(function() {
                                swal({
                                    title: 'Data Pembayaran Keuangan Sekolah',
                                    text: 'Berhasil Diubah!',
                                    type: 'success'
                                }, function() {
                                    window.location = '?page=bayar';
                                });
                            }, 300);
                        </script>


          				<?php
          			}


          		
}


           ?>