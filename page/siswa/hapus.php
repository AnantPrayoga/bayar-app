<?php 


		$id_siswa = $_GET['id'];

		$sql=$koneksi->query("select * from tb_siswa where id_siswa='$id_siswa'");

		$data = $sql->fetch_assoc();

		$nis = $data['nis'];

		$sql=$koneksi->query("delete from tb_siswa where id_siswa='$id_siswa'");

		$sql = $koneksi->query("delete from  tb_user  where username='$nis'");

		if ($sql) {
			?>

				<script>
				    setTimeout(function() {
				        sweetAlert({
				            title: 'OKE!',
				            text: 'Data Berhasil Dihapus!',
				            type: 'error'
				        }, function() {
				            window.location = '?page=siswa';
				        });
				    }, 300);
				</script>

			<?php
		}

 ?>


