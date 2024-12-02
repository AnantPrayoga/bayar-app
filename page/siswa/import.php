<div class="row">
    <div class="col-md-6" >
        <!-- Form Elements -->
         <div class="box box-success box-solid">
              <div class="box-header with-border">
                Import Data Siswa
            </div>
            <div class="panel-body" >
                <div class="row">
                    <div class="col-md-12">
                        <form role="form" method="POST" enctype="multipart/form-data" >


                            

                             <div class="form-group">
                                <label>File Excel : </label>
                                <input type="file" class="form-control" name="filemhsw" required="" />
                             </div>


                             <input type="submit" name="upload" value="Import" class="btn btn-success">


	</form>

</div>
</div>

</div>
	<?php
error_reporting(0);
	if (isset($_POST['upload'])) {

		require('spreadsheet-reader-master/php-excel-reader/excel_reader2.php');
		require('spreadsheet-reader-master/SpreadsheetReader.php');

		//upload data excel kedalam folder uploads
		$target_dir = "uploads/".basename($_FILES['filemhsw']['name']);
		
		move_uploaded_file($_FILES['filemhsw']['tmp_name'],$target_dir);

		$Reader = new SpreadsheetReader($target_dir);

		foreach ($Reader as $Key => $Row)
		{
			// import data excel mulai baris ke-2 (karena ada header pada baris 1)
			if ($Key < 1) continue;			
			$query=$koneksi->query("INSERT INTO tb_siswa(nis, nama_siswa, jk, agama, id_kelas, status, nama_ortu, alamat, no_hp_ortu) VALUES ('".$Row[0]."', '".$Row[1]."', '".$Row[2]."', '".$Row[3]."', '".$Row[4]."', '".$Row[5]."', '".$Row[6]."', '".$Row[7]."', '".$Row[8]."')");

			$sql = $koneksi->query("insert into tb_user (username, nama_user, password, level, foto)values('".$Row[0]."', '".$Row[1]."', '123456', 'user', 'avatar.png') ");
		}
		if ($query) {
				echo "

					<script>
					    setTimeout(function() {
					        swal({
					            title: 'Selamat!',
					            text: 'Data Berhasil Diimport!',
					            type: 'success'
					        }, function() {
					            window.location = '?page=siswa';
					        });
					    }, 300);
					</script>

			";
			}else{
				echo mysqli_error();
			}
	}
	?>
	