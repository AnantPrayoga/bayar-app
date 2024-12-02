<?php 	
		error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
		include "../../include/koneksi.php";
		 $kelas = $_GET['kelas'];

     $kelast= $koneksi->query("select * from tb_kelas where id_kelas='$kelas'");
     $datak = $kelast->fetch_assoc();

     $kelas_oke = $datak['nama_kelas'];

    


      $satu_hari        = mktime(0,0,0,date("n"),date("j"),date("Y"));
       
          function tglIndonesia($str){
             $tr   = trim($str);
             $str    = str_replace(array('Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'), array('Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum\'at', 'Sabtu', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'), $tr);
             return $str;
         }

        

 ?>
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

<body onload="window.print()">

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



</body>



<table width="100%" >
  <tr>
    <td width="0">&nbsp;</td>
    <td colspan="6"><div align="center"><strong>Laporan Data Siswa</strong></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
     <td width="100">&nbsp;</td>
    <td width="16">&nbsp;</td>
    <td width="2200">&nbsp;</td>
    <td width="200">&nbsp;</td>
    <td width="15">&nbsp;</td>
    <td width="375">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td >Kelas</td>
    <td>:</td>
    <td><?php echo $kelas_oke ?></td>
    
  </tr>
  
</table><br>


<table class="tabel" border="1" width="100%">

  <thead>
    <tr>
      
                 <th>No</th>
                  <th>NIS</th>
                  <th>Nama</th>
                  <th>Jenis Kelamin</th>
                  <th>Kelas</th>
                  <th>Nama Ortu</th>
                  <th>Alamat</th>
                  <th>Telp</th>
                  
                  
    </tr>
  </thead>
    <tbody>
  
                     <?php 

                      $no = 1;

                    $sql = $koneksi->query("select * from tb_siswa, tb_kelas where tb_siswa.id_kelas=tb_kelas.id_kelas and tb_siswa.id_kelas='$kelas' ");

                     
                      while ($data = $sql->fetch_assoc()) {

                      
                        
                      
                   ?>


                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $data['nis'] ?></td>
                  <td><?php echo $data['nama_siswa'] ?></td>
                  <td><?php echo $data['jk'] ?></td>
                  <td><?php echo $data['nama_kelas'] ?></td>
                   <td><?php echo $data['nama_ortu'] ?></td>
                  <td><?php echo $data['alamat'] ?></td>
                  <td><?php echo $data['no_hp_ortu'] ?></td> 
                 

                 </tr> 

                 <?php


                  } 

                  ?>

               

  </tbody>
</table><br><br><br>

<?php $tgl=date('Y-m-d'); ?>
<table width="100%">
<tr>
  <td align="center"></td>
  <td align="center" width="200px">
   <?php echo $data1['kota']; ?>, <?php echo tglIndonesia(date('d F Y', strtotime($tgl))) ?>
    <br/>Kepala Tata Usaha,<br/><br/><br/><br/>
    <b><u><?php echo $data1['ktu']; ?></u><br/><?php echo $data1['nip_ktu']; ?></b>
  </td>
</tr>
</table>


