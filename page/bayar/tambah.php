


 <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Pembayaran Keuangan Sekolah</h3>
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
                                               
                                              echo "<option value='$tampil_t[nis]'> $tampil_t[nama_siswa]</option>";
                                            }

                                        ?>

                            </select>
                        </div>

                          <label>Nama Bayar :</label> <br>
                          <select required=""   class="form-control"  name="bayar">

                              
                            
                              <option value="Seragam" >Seragam</option>
                              <option value="Buku" >Buku</option>
                              <option value="Alat Tulis" >Alat Tulis</option>
                              <option value="Peci" >Peci</option>
                              <option value="Jilbab" >Jilbab</option>
                              
                          </select>
                        </div>  
                

                <div class="form-group">
                  <label>Jumlah </label>
                  <input type="text" class="form-control uang" name="jumlah" required="">
                </div>


                <div class="form-group">
                  <label>Keterangan </label>
                  <input type="text" class="form-control" name="keterangan" required="">
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

          			$sql = $koneksi->query("insert into tb_bayar(nis_siswa, nama_bayar, jumlah, keterangan, tanggal_bayar)values('$siswa', '$bayar', '$jumlah_oke', '$keterangan', '$tgl') ");

          			$id_bayar = $koneksi->insert_id;

          			$sql = $koneksi->query("insert into tb_kas(tgl_kas, keterangan, penerimaan, id_bayar)values('$tgl', '$keterangan_oke', '$jumlah_oke', '$id_bayar') ");

          			if ($sql) {
          				?>

          					<script>
                            setTimeout(function() {
                                swal({
                                    title: 'Data Pembayaran Keuangan Sekolah',
                                    text: 'Berhasil Disimpan!',
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