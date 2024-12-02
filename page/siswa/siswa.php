
<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="box box-primary box-solid">
            <div class="box-header with-border">
                 Data Siswa
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="example1">

                       <div style="color: red;">Catatan : Untuk Melakukan import data dari excel.. download dahulu  format tempelate excel pada tombol  download tempelate excel</div><br>


            
               <button type="button" class="btn btn-info" style="margin-bottom: 10px;" data-toggle="modal" data-target="#modal-default">
               Tambah
              </button>

                <a href="?page=siswa&aksi=import" class="btn btn-warning" style="margin-bottom:  12px; margin-left: 10px;" > <i class=" fa fa-arrow-circle-down"></i> Import File Excel</a>

               <a href="temp_excel/siswa_upload.xlsx" class="btn btn-primary" style="margin-bottom:  10px; margin-left: 10px;" > <i class="fa fa-download"></i>  Download Tempelate Excel</a>


             
                <thead>
                <tr>
                  <th>No</th>
                  <th>NIS</th>
                  <th>Nama</th>
                  <th>Jenis Kelamin</th>
                  <th>Agama</th>
                  <th>Kelas</th>
                  <th>Status</th>
                  <th>Nama Ortu</th>
                  <th>Alamat</th>
                  <th>No. Telp. Ortu</th>
                 
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>

                  <?php 

                      $no = 1;

                      $sql = $koneksi->query("select * from tb_siswa, tb_kelas where tb_siswa.id_kelas=tb_kelas.id_kelas order by tb_siswa.id_siswa desc");

                      while ($data = $sql->fetch_assoc()) {

                     
                        
                      
                   ?>


                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $data['nis'] ?></td>
                  <td><?php echo $data['nama_siswa'] ?></td>
                  <td><?php echo $data['jk'] ?></td>
                  <td><?php echo $data['agama'] ?></td>
                  <td><?php echo $data['nama_kelas'] ?></td>  
                  <td><?php echo $data['status'] ?></td>
                  <td><?php echo $data['nama_ortu'] ?></td>
                  <td><?php echo $data['alamat'] ?></td>
                  <td><?php echo $data['no_hp_ortu'] ?></td>
                
                 
                  <td>

                    <a href="#" type="button" class="btn btn-info" data-toggle="modal" data-target="#mymodal<?php echo $data['id_siswa']; ?>"><i class="fa fa-edit"></i> Ubah</a>
                    
                  

                     <a onclick="return confirm('Apakah Anda Yakin Mengahpus Data Ini')" href="?page=siswa&aksi=hapus&id=<?php echo $data['id_siswa'] ;?>" class="btn btn-danger" title=""><i class="fa fa-trash"></i>  Hapus</a>


                  </td>
                  
                </tr>

                  <div class="modal fade" id="mymodal<?php echo $data['id_siswa']; ?>">
                  <div class="modal-dialog" style=" width: 1000px;">
                    <div class="modal-content" style=" width: 1000px;">
                     <div class="box box-primary box-solid">
                      <div class="box-header with-border">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                           Ubah Data Siswa
                      </div>
                      <div class="modal-body">

                        <form role="form"  method="POST"> 
                        <?php 

                          $id_siswa = $data['id_siswa'];

                          $sql1 = $koneksi->query("select * from tb_siswa where id_siswa='$id_siswa'");

                         while ($data1 = $sql1->fetch_assoc()) {

                          


                        ?>

                        <input type="hidden" name="id_siswa" value="<?php echo $data1['id_siswa']; ?>">

                        <div class="col-md-6">
                          
                        

                        <div class="form-group">
                          <label>Nis</label>
                          <input type="text" name="nis" class="form-control" value="<?php echo $data1['nis']; ?>" required="">      
                        </div>

                        <div class="form-group">
                          <label>Nama Siswa</label>
                          <input type="text" name="nama" class="form-control" value="<?php echo $data1['nama_siswa']; ?>" required="">      
                        </div>

                        <div class="form-group">

                          <label>Jenis Kelamin :</label> <br>
                          <select   class="form-control"  name="jk">
                            
                              <option value="Laki-laki"  <?php if ($data1['jk']=='Laki-laki'){ echo "selected";} ?>>Laki-laki</option>
                              <option value="Perempuan"  <?php if ($data1['jk']=='Perempuan'){ echo "selected";} ?>>Perempuan</option>
                              
                          </select>
                        </div>  


                        <div class="form-group">

                          <label>Agama :</label> <br>
                          <select   class="form-control"  name="agama">
                            
                              <option value="Islam"  <?php if ($data1['agama']=='Islam'){ echo "selected";} ?>>Islam</option>
                              <option value="Kristen"  <?php if ($data1['agama']=='Kristen'){ echo "selected";} ?>>Kristen</option>
                              <option value="Katolik"  <?php if ($data1['agama']=='Katolik'){ echo "selected";} ?>>Katolik</option>
                              <option value="Hindu"  <?php if ($data1['agama']=='Hindu'){ echo "selected";} ?>>Hindu</option>
                              <option value="Budha"  <?php if ($data1['agama']=='Budha'){ echo "selected";} ?>>Budha</option>
                              
                          </select>
                        </div>  


                        <div class="form-group">

                            <label>Kelas :</label> <br>
                            <select   class="form-control" name="kelas">

                               
                                        <?php


                                            $query = $koneksi->query("SELECT * FROM tb_kelas ORDER by id_kelas");
                                             
                                            while ($tampil_t=$query->fetch_assoc()) {
                                                $pilih_t=($tampil_t['id_kelas']==$data1['kelas']?"selected":"");
                                              echo "<option value='$tampil_t[id_kelas]' $pilih_t> $tampil_t[nama_kelas]</option>";
                                            }

                                        ?>

                            </select>
                        </div>

                        </div>

                         <div class="col-md-6">

                         <div class="form-group">
                          <label>Nama Ortu</label>
                          <input type="text" name="nama_ortu" class="form-control" value="<?php echo $data1['nama_ortu']; ?>" required="">      
                        </div>

                         <div class="form-group">
                                <label>Alamat Ortu </label>
                                <textarea class="form-control" rows="3" name="alamat"><?php echo $data['alamat']; ?></textarea>
                          </div> 

                       

                         <div class="form-group">
                          <label>No HP ortu (Contoh 6285781480396)</label>
                          <input type="text" name="no_hp_ortu" class="form-control" value="<?php echo $data1['no_hp_ortu']; ?>" required="">      
                        </div>



                         <div class="form-group">

                          <label>Status :</label> <br>
                          <select   class="form-control"  name="status">
                            
                              <option value="Aktif"  <?php if ($data1['status']=='Aktif'){ echo "selected";} ?>>Aktif</option>
                              <option value="Tidak Aktif"  <?php if ($data1['status']=='Tidak Aktif'){ echo "selected";} ?>>Tidak Aktif</option>
                              <option value="Lulus"  <?php if ($data1['status']=='Lulus'){ echo "selected";} ?>>Lulus</option>
                              <option value="Pindah"  <?php if ($data1['status']=='Pindah'){ echo "selected";} ?>>Pindah</option>
                              <option value="Keluar"  <?php if ($data1['status']=='Keluar'){ echo "selected";} ?>>Keluar</option>
                              
                          </select>
                        </div> 

                        </div>   


                     
                       

                     

                      </div>
                      <div class="modal-footer">
                        

                        <button type="submit" name="simpan" class="btn btn-block btn-primary btn-lg">Simpan</button>
                       
                      </div>

                      <?php } ?>

                       </form>

                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
                </div>
                

                <?php } ?>

               <?php 



              if (isset($_POST['simpan'])) {
                $id_siswa_ubah = $_POST['id_siswa'];

                $sql=$koneksi->query("select * from tb_siswa where id_siswa='$id_siswa_ubah'");

    $data = $sql->fetch_assoc();

    $nis2 = $data['nis'];

                $nis = $_POST['nis'];
                $nama = $_POST['nama'];
                $jk = $_POST['jk'];
                $agama = $_POST['agama'];
                $kelas = $_POST['kelas'];
                $nama_ortu = $_POST['nama_ortu'];
                $alamat = $_POST['alamat'];
                $no_hp_ortu = $_POST['no_hp_ortu'];
                $status = $_POST['status'];
                
                

                $sql = $koneksi->query("update  tb_siswa set 
                                         nis='$nis',
                                         nama_siswa='$nama', 
                                         jk='$jk',
                                         agama='$agama',
                                         id_kelas='$kelas',
                                         status='$status',
                                         nama_ortu='$nama_ortu',  
                                         alamat='$alamat',  
                                         no_hp_ortu='$no_hp_ortu'   
                                         where id_siswa='$id_siswa_ubah'");

                $sql = $koneksi->query("update tb_user  set username='$nis', nama_user='$nama' where username='$nis2'");

              

                if ($sql) {
                    echo "

                        <script>
                            setTimeout(function() {
                                swal({
                                    title: 'Data Siswa',
                                    text: 'Berhasil Diubah!',
                                    type: 'success'
                                }, function() {
                                    window.location = '?page=siswa';
                                });
                            }, 300);
                        </script>

                    ";
                  }



              }


           ?>

            </tbody>

        </table>

    </div>
</div>
</div>


<!-- AWAL TAMBAH DATA SISWA -->

<div class="modal fade"  id="modal-default">
          <div class="modal-dialog" style=" width: 1000px;">
            <div class="modal-content" style="width: 1000px;">
              <div class="box box-primary box-solid">
            <div class="box-header with-border">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                 Tambah Siswa
            </div>
                
               
              
              <div class="modal-body">
                <form role="form"  method="POST"> 
                         <div class="col-md-6">
                          
                        

                        <div class="form-group">
                          <label>Nis</label>
                          <input type="text" name="nis" class="form-control" required="">      
                        </div>

                        <div class="form-group">
                          <label>Nama Siswa</label>
                          <input type="text" name="nama" class="form-control"  required="">      
                        </div>

                        <div class="form-group">

                          <label>Jenis Kelamin :</label> <br>
                          <select   class="form-control"  name="jk">

                              <option value="">-Pilih Jenis Kelamin-</option>
                            
                              <option value="Laki-laki" >Laki-laki</option>
                              <option value="Perempuan" >Perempuan</option>
                              
                          </select>
                        </div>  


                        <div class="form-group">

                          <label>Agama :</label> <br>
                          <select   class="form-control"  name="agama">

                              <option value="">-Pilih Agama-</option>
                            
                              <option value="Islam">Islam</option>
                              <option value="Kristen">Kristen</option>
                              <option value="Katolik">Katolik</option>
                              <option value="Hindu">Hindu</option>
                              <option value="Budha">Budha</option>
                              
                          </select>
                        </div>  


                        </div>

                         <div class="col-md-6">

                          
                        <div class="form-group">

                            <label>Kelas :</label> <br>
                            <select   class="form-control" name="kelas">

                               
                                  <?php


                                      $query = $koneksi->query("SELECT * FROM tb_kelas ORDER by id_kelas");
                                       
                                      while ($tampil_t=$query->fetch_assoc()) {
                                         
                                        echo "<option value='$tampil_t[id_kelas]'> $tampil_t[nama_kelas]</option>";
                                      }

                                  ?>

                            </select>
                        </div>


                         <div class="form-group">
                          <label>Nama Ortu</label>
                          <input type="text" name="nama_ortu" class="form-control"  required="">      
                        </div>

                         <div class="form-group">
                                <label>Alamat Ortu </label>
                                <textarea class="form-control" rows="3" name="alamat"></textarea>
                          </div> 

                       

                         <div class="form-group">
                          <label>No HP ortu (Contoh 6285781480396)</label>
                          <input type="text" name="no_hp_ortu" class="form-control" placeholder="6285781480396"  required="">      
                        </div>


                        </div>   


                     

                      </div>
                      <div class="modal-footer">
                        
                          <button type="submit" name="tambah" class="btn btn-block btn-primary btn-lg">Simpan</button>
                       
                      </div>

                     

                       </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
 


<?php 

      if (isset($_POST['tambah'])) {
  
        $nis = $_POST['nis'];
        $nama = $_POST['nama'];
        $jk = $_POST['jk'];
        $agama = $_POST['agama'];
        $kelas = $_POST['kelas'];
        $nama_ortu = $_POST['nama_ortu'];
        $alamat = $_POST['alamat'];
        $no_hp_ortu = $_POST['no_hp_ortu'];
        $status = $_POST['status'];
        
        

        $sql = $koneksi->query("insert into tb_siswa (nis, nama_siswa, jk, agama, id_kelas, status, nama_ortu, alamat, no_hp_ortu)values('$nis', '$nama', '$jk', '$agama', '$kelas', 'Aktif', '$nama_ortu', '$alamat', '$no_hp_ortu') ");

        $sql = $koneksi->query("insert into tb_user (username, nama_user, password, level, foto)values('$nis', '$nama', '123456', 'user', 'avatar.png') ");

      

        if ($sql) {
            echo "

                <script>
                    setTimeout(function() {
                        swal({
                            title: 'Data Siswa',
                            text: 'Berhasil Disimpan!',
                            type: 'success'
                        }, function() {
                            window.location = '?page=siswa';
                        });
                    }, 300);
                </script>

            ";
          }



      }

 ?>   


 <!-- AKHIR TAMBAH DATA SISWA -->   