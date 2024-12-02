<?php 

		error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
		include "../../include/koneksi.php";


$sql = $koneksi->query("SELECT * FROM tb_tahun_ajaran where id_tahun_ajaran='$_GET[tahun_ajaran]'");
$ta = $sql->fetch_assoc();
$idTahun = $ta['id_tahun_ajaran'];
$tahun = $ta['tahun_ajaran'];


$satu_hari        = mktime(0,0,0,date("n"),date("j"),date("Y"));
       
          function tglIndonesia($str){
             $tr   = trim($str);
             $str    = str_replace(array('Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'), array('Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum\'at', 'Sabtu', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'), $tr);
             return $str;
         }



?>
<!DOCTYPE html>
<html>
<head>
<title>Cetak  Tagihan Siswa</title>
	<style type="text/css">

		.tabel{border-collapse: collapse;}
		.tabel th{padding: 8px 5px;  background-color:  #cccccc;  }
		.tabel td{padding: 8px 5px;     }
	</style>

	<script>
	

			window.print();
			window.onfocus=function() {window.close();}

</script>

</head>
<body>

<?php 

    $sql = $koneksi->query("select * from tb_profile ");

    $data1 = $sql->fetch_assoc();

 ?>

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

<br>	


<?php
$id_siswa = $_GET['id'];
  
  $sql = $koneksi->query("select * from tb_siswa, tb_kelas where tb_siswa.id_kelas=tb_kelas.id_kelas and tb_siswa.id_siswa='$id_siswa'");
  $data = $sql->fetch_assoc();
  $nis = $data['nis'];
?>

<table width="100%" >

	<tr>
    <td>&nbsp;</td>
    <td width="700">&nbsp;</td>
    <td width="16">&nbsp;</td>
    <td width="2000">&nbsp;</td>
    <td width="500">&nbsp;</td>
    <td width="15">&nbsp;</td>
    <td width="375">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td width="80px">Nama Siswa</td>
    <td>:</td>
    <td><?php echo $data['nama_siswa'] ?></td>
    <td>Nis</td>
    <td>:</td>
    <td><?php echo $data['nis'] ?></td>
      </tr>
  

	
</table>
<br>


<table border="1" width="100%" class="tabel">
	<caption>Tagihan Bulanan <p></caption>
	<thead>
		<tr>
			<th>No.</th>
                 	<th>Tahun Ajaran</th>
                  <th>Kelas</th>
                  <th>Jenis Pembayaran</th>
                  <th>Total Tagihan</th>
                  <th>Tagihan Dibayar</th>
                  <th>Sisa Tagihan </th>
                  
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

</table><br>

<table border="1" width="100%" class="tabel">
	<caption>Tagihan Lain<p></caption>
	<thead>
		<tr>
			 <th>No.</th>
                  <th>Tahun Ajaran</th>
                  <th>Kelas</th>
                  <th>Jenis Pembayaran</th>
                  <th>Total Tagihan</th>
                  <th>Tagihan Dibayar</th>
                  <th>Sisa Tagihan </th>
                  
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
</table> <br>
<div style="font-size: 20px; text-align: right; font-weight: bold; color: red;">Total Semua Tagihan : <?php echo number_format($total + $total2) ?></div><br><br>

<?php $tgl=date('Y-m-d'); ?>
<table width="100%">
<tr>
  <td align="center"></td>
  <td align="center" width="200px">
   <?php echo $data1['kota']; ?>, <?php echo tglIndonesia(date('d F Y', strtotime($tgl))) ?>
    <br/>Bendahara,<br/><br/><br/><br/>
    <b><u><?php echo $data1['bendahara']; ?></u><br/><?php echo $data1['nip']; ?></b>
  </td>
</tr>
</table>


</body>
<script>
	window.print()
</script>
</html>