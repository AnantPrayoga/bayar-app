<?php 


		$id = $_GET['id'];

		$sql=$koneksi->query("delete from tb_bayar where id_bayar='$id'");
		$sql=$koneksi->query("delete from tb_kas where id_bayar='$id'");

		if ($sql) {
			?>

				<script>
				    setTimeout(function() {
				        sweetAlert({
				            title: 'OKE!',
				            text: 'Data Pembayaran Keuangan Sekolah Berhasil Dihapus!',
				            type: 'error'
				        }, function() {
				            window.location = '?page=bayar';
				        });
				    }, 300);
				</script>


			<?php
		}

 ?>