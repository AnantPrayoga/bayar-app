<?php 	
		error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
		include "../../include/koneksi.php";
    include "../../include/terbilang.php";
    date_default_timezone_set('Asia/Jakarta');
$tanggal =  date('d-m-Y H:i:s'); // Hasil: 20-01-2017 05:32:15


		 
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

        


      $satu_hari        = mktime(0,0,0,date("n"),date("j"),date("Y"));
       
          function tglIndonesia($str){
             $tr   = trim($str);
             $str    = str_replace(array('Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'), array('Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum\'at', 'Sabtu', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'), $tr);
             return $str;
         }

        

 ?>
<style type="text/css">

	.tabel{border-collapse: collapse;}
	.tabel th{padding: 2px 2px;  background-color:  #cccccc;  }
	.tabel td{padding: 2px 2px;     }
</style>
<script>
	

			window.print();
			window.onfocus=function() {window.close();}
				
	

</script>
</head>

<body onload="window.print()">

<?php 

    $sql = $koneksi->query("select * from tb_profile ");

    $data1 = $sql->fetch_assoc();

 ?>

<div style="font-size: 10px;"><?php echo $tanggal; ?></div>
   <table width="100%" >
  <tr>
    
    <td width="10" rowspan="3" valign="top"><img src="../../images/<?php echo $data1['foto']; ?>" width="80" height="85" /></td>
    <td width="383"><div align="center"><?php echo $data1['nama_sekolah']; ?></div></td>
  </tr>
  <tr>
    <td><div align="center"><?php echo $data1['alamat']; ?></div></td>
  </tr>
  <tr>
    <td><div align="center">TELP. <?php echo $data1['telpon']; ?> WEBSITE: <?php echo $data1['website']; ?></div></td>
  </tr>
</table>
<hr>

	


<table width="100%" style="font-size: 12px;">
  <tr>
    <td width="0">&nbsp;</td>
    <td colspan="6"><div align="center"><strong>LAPORAN PEMBAYARAN <br> <?php echo $data['nama_bayar'] ?></strong></div></td>
  </tr>
  
  
</table>
<hr>






<table width="100%" style="font-size: 12px;">
  

 
  <tr>
    <td>&nbsp;</td>
    <td width="150px">Nama Siswa</td>
    <td>:</td>
    <td><?php echo $data['nama_siswa'] ?></td>
    <td>Kelas</td>
    <td>:</td>
    <td><?php echo $data['nama_kelas'] ?></td>
  </tr>
   <tr>
    <td>&nbsp;</td>
    <td>NIS/NISN</td>
    <td>:</td>
    <td><?php echo $data['nis'] ?>/<?php echo $data['nisn'] ?></td>
     <td>Tahun Ajaran</td>
    <td>:</td>
    <td><?php echo $data['tahun_ajaran'] ?></td>
  </tr>
</table><br>


<table class="tabel" border="1" width="100%" style="font-size: 12px;">

  <thead>
    <tr>
      
                  <th>No</th>
                  <th>Bulan</th>
                  <th>Tangal Bayar</th>
                  <th>Cara Bayar</th>
                  <th>Jumlah Byar</th>
                  <th>Status</th>
                  
                  
    </tr>
  </thead>
    <tbody>
  
                     <?php 

                      $no = 1;

                       $sql = $koneksi->query("SELECT tb_tahun_ajaran.tahun_ajaran, tb_tahun_ajaran.id_tahun_ajaran, tb_jenis_bayar.nama_bayar, tb_jenis_bayar.id_bayar, tb_jenis_bayar.id_tahun_ajaran, tb_siswa.nis, tb_siswa.nama_siswa, tb_kelas.nama_kelas, tb_tagihan_bulanan.id_bayar, tb_tagihan_bulanan.cara_bayar, tb_tagihan_bulanan.tgl_bayar, tb_bulan.nama_bulan, tb_bulan.urutan, tb_tagihan_bulanan.jml_bayar, tb_tagihan_bulanan.id_tagihan_bulanan, tb_tagihan_bulanan.status_bayar from tb_jenis_bayar
                          
                        INNER JOIN tb_tagihan_bulanan ON tb_tagihan_bulanan.id_bayar = tb_jenis_bayar.id_bayar
                        INNER JOIN tb_tahun_ajaran ON tb_jenis_bayar.id_tahun_ajaran = tb_tahun_ajaran.id_tahun_ajaran
                        INNER JOIN tb_bulan ON tb_tagihan_bulanan.id_bulan = tb_bulan.id_bulan

                        INNER JOIN tb_siswa ON tb_tagihan_bulanan.id_siswa = tb_siswa.id_siswa
                        INNER JOIN tb_kelas ON tb_tagihan_bulanan.id_kelas = tb_kelas.id_kelas
                        WHERE tb_siswa.nis='$nis' and tb_jenis_bayar.id_tahun_ajaran='$id_tahun_ajaran' and tb_jenis_bayar.id_bayar='$id_bayar' order BY tb_bulan.urutan");

                      while ($data = $sql->fetch_assoc()) {

                        $jml_bayar=  $data['jml_bayar'];

                        $status=  $data['status_bayar'];

                        if ($status==1) {
                          $status_oke = "Lunas";
                        }else{
                           $status_oke = "Belum Lunas";
                        }
                        
                      
                   ?>


                <tr>
                  <td align="center"><?php echo $no++; ?></td>
                  <td><?php echo $data['nama_bulan'] ?></td>
                  <?php 

                        if ($data['tgl_bayar']=="0000-00-00") {
                          
                        

                     ?>
                  <td>
                    
                   
                      
                    </td>

                  <?php }else{ ?>
                  
                    <td> <?php echo tglIndonesia(date('d F Y', strtotime($data['tgl_bayar']))) ?></td>
                  <?php } ?>  
                  <td><?php echo $data['cara_bayar'] ?></td>
                  <td><?php echo number_format($data['jml_bayar'],0,",",".") ?></td>
                  <td><?php echo $status_oke ?></td>
                 

                 </tr> 

                 <?php


                  } 

                  ?>

               

  </tbody>
</table><br>

<?php $tgl=date('Y-m-d'); ?>
<table width="100%" style="font-size: 12px;">

 <tr>
    <td>&nbsp;</td>
    <td width="350"></td>
    <td><?php echo $data1['kota']; ?>, <?php echo tglIndonesia(date('d F Y', strtotime($tgl))) ?> <br/>Bendahara,<br/><br/><br/>
    <b><u><?php echo $data1['bendahara']; ?></u><br/>Hp/Wa <?php echo $data1['nip']; ?></b></td>
  </tr>  

</table>


