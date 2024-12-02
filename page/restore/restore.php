
<link rel="stylesheet" type="text/css" href="../../sw/dist/sweetalert.css">
  <script type="text/javascript" src="../../sw/dist/sweetalert.min.js"></script>
<form enctype="multipart/form-data" action="page/restore/restore.php" method="post">
	
	
	<tr><td>File Backup Database (*.sql) <input type="file" name="datafile" size="30" id="gambar" /></td></tr>
	<tr><td><input type="submit" onclick="return confirm('Apakah Anda yakin akan restore database?')" name="restore" value="Restore Database" /></td>
	</tr>
	
</form>


<?php
error_reporting(0);
if(isset($_POST['restore'])){
$koneksi = new mysqli ("localhost","root","","pembayaran_revisi");
	
	
	$nama_file=$_FILES['datafile']['name'];
	$ukuran=$_FILES['datafile']['size'];
	
	//periksa jika data yang dimasukan belum lengkap
	if ($nama_file=="")
	{
		echo "Fatal Error";
	}else{
		//definisikan variabel file dan alamat file
		$uploaddir='../../restore/';
		$alamatfile=$uploaddir.$nama_file;

		//periksa jika proses upload berjalan sukses
		if (move_uploaded_file($_FILES['datafile']['tmp_name'],$alamatfile))
		{
			
			$filename = '../../restore/'.$nama_file.'';
			
			// Temporary variable, used to store current query
			$templine = '';
			// Read in entire file
			$lines = file($filename);
			// Loop through each line
			foreach ($lines as $line)
			{
				// Skip it if it's a comment
				if (substr($line, 0, 2) == '--' || $line == '')
					continue;
			 
				// Add this line to the current segment
				$templine .= $line;
				// If it has a semicolon at the end, it's the end of the query
				if (substr(trim($line), -1, 1) == ';')
				{
					// Perform the query
					$koneksi->query($templine);
					// Reset temp variable to empty
					$templine = '';
				}
			}
			?>
 				

 				 <script>
                            setTimeout(function() {
                                swal({
                                    title: 'oke',
                                    text: 'Database Berhasil Direstore!',
                                    type: 'success'
                                }, function() {
                                    window.location = 'http://localhost/pembayaran_revisi/index.php?page=restore';
                                });
                            }, 300);
                        </script>
 			<?php

			


		
		}else{
			//jika gagal
			echo "Proses upload gagal, kode error = " . $_FILES['location']['error'];

			
		}	
	}

}else{
	unset($_POST['restore']);
}
?>


	