

 <section class="content">
      <div class="row">
<div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Pembayaran Keuangan Sekolah</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            	<a href="?page=bayar&aksi=tambah" class="btn btn-info" style="margin-bottom: 10px;" title="">Tambah</a>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Siswa</th>
                  <th>Nama Bayar</th>
                  <th>Jumlah</th>
                  <th>Keterangan</th>
                  
                  
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>

                	<?php 

                			$no = 1;

                			$sql = $koneksi->query("select * from tb_bayar, tb_siswa where tb_bayar.nis_siswa=tb_siswa.nis order by id_bayar desc");

                			while ($data = $sql->fetch_assoc()) {
                				
                			
                	 ?>


                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $data['nama_siswa'] ?></td>
                  <td><?php echo $data['nama_bayar'] ?></td>
                 <td><?php echo $data['jumlah'] ?></td>
                 <td><?php echo $data['keterangan'] ?></td>
                
               

                  <td>
                    
                    <a href="?page=bayar&aksi=ubah&id=<?php echo $data['id_bayar'] ;?>" class="btn btn-success" title=""><i class="fa fa-edit"></i>  Ubah</a>

                     <a onclick="return confirm('Apakah Anda Yakin Mengahpus Data Ini')" href="?page=bayar&aksi=hapus&id=<?php echo $data['id_bayar'] ;?>" class="btn btn-danger" title=""><i class="fa fa-trash"></i>  Hapus</a>


                     <a target="blank" href="page/bayar/cetak.php?id_bayar=<?php echo $data['id_bayar'] ?>" class="btn btn-default" title=""><i class="fa fa-print"></i>  Cetak</a>


                  </td>
                  
                </tr>
                

                <?php } ?>

            </tbody>

        </table>

    </div>
</div>
</div>
</section>