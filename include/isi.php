<?php 


		$page = $_GET['page'];
		$aksi = $_GET['aksi'];


		if ($page == "ubah_p") {
	      if ($aksi == "") {
	      include "ubah_password.php";
	      }
	    }

		if ($page == "tahunajaran") {
			if ($aksi == "") {
				include "page/tahunajaran/tahunajaran.php";
			}

			

			if ($aksi == "hapus") {
				include "page/tahunajaran/hapus.php";
			}

			if ($aksi == "aktif") {
				include "page/tahunajaran/aktif.php";
			}
		}



		if ($page == "backup") {
      if ($aksi == "") {
        include"page/backup/form_backup.php";
      }

      if ($aksi == "download") {
        include"page/backup/backup.php";
      }

    }

    if ($page == "restore") {
      if ($aksi == "") {
        include"page/restore/restore.php";
      }
    }


		if ($page == "kelas") {
			if ($aksi == "") {
				include "page/kelas/kelas.php";
			}


			if ($aksi == "hapus") {
				include "page/kelas/hapus.php";
			}
		}

		if ($page == "kenaikan") {
			if ($aksi == "") {
				include "page/kenaikan/kenaikan.php";
	
		    }

	    }

		if ($page == "kelulusan") {
			if ($aksi == "") {
				include "page/kelulusan/kelulusan.php";

			 }
	
	
		}

		if ($page == "profile") {
			if ($aksi == "") {
				include "page/profile/profile.php";

			 }
	
	
		}


		if ($page == "laporan_tagihan_siswa") {
			if ($aksi == "") {
				include "page/laporan/laporan_tagihan_siswa.php";

			 }
	
	
		}

		if ($page == "laporan_data_siswa") {
			if ($aksi == "") {
				include "page/laporan/laporan_data_siswa.php";

			 }
	
	
		}

		



		if ($page == "siswa") {
			if ($aksi == "") {
				include "page/siswa/siswa.php";
			}

			if ($aksi == "import") {
				include "page/siswa/import.php";
			}

			

			if ($aksi == "hapus") {
				include "page/siswa/hapus.php";
			}
		}

		if ($page == "jenisbayar") {
			if ($aksi == "") {
				include "page/jenisbayar/jenisbayar.php";
			}

			if ($aksi == "tambah") {
				include "page/jenisbayar/tambah.php";
			}

			if ($aksi == "hapus") {
				include "page/jenisbayar/hapus.php";
			}

			if ($aksi == "ubahbulanan") {
				include "page/jenisbayar/ubah_bulanan.php";
			}

			if ($aksi == "hapusbulanan") {
				include "page/jenisbayar/hapusbayar.php";
			}

			if ($aksi == "seting") {
				include "page/jenisbayar/bulanan.php";
			}

			if ($aksi == "ubahbebas") {
				include "page/jenisbayar/ubah_bebas.php";
			}

			if ($aksi == "hapusbebas") {
				include "page/jenisbayar/hapus_bebas.php";
			}
		}


		if ($page == "transaksi") {
			if ($aksi == "") {
				include "page/transaksi/transaksi.php";
			}

			if ($aksi == "lihat") {
				include "page/transaksi/lihat.php";
			}

			if ($aksi == "bayarbulanan") {
				include "page/transaksi/bayar_bulanan.php";
			}

			if ($aksi == "bayarbebas") {
				include "page/transaksi/bayar_bebas.php";
			}

			

			

			if ($aksi == "hapus") {
				include "page/transaksi/hapus.php";
			}
		}







		if ($page == "pengguna") {
			if ($aksi == "") {
				include "page/pengguna/pengguna.php";
			}

			if ($aksi == "tambah") {
				include "page/pengguna/tambah.php";
			}

			if ($aksi == "ubah") {
				include "page/pengguna/ubah.php";
			}

			if ($aksi == "hapus") {
				include "page/pengguna/hapus.php";
			}
		}


		if ($page == "bayar") {
			if ($aksi == "") {
				include "page/bayar/bayar.php";
			}

			if ($aksi == "tambah") {
				include "page/bayar/tambah.php";
			}

			if ($aksi == "ubah") {
				include "page/bayar/ubah.php";
			}

			if ($aksi == "hapus") {
				include "page/bayar/hapus.php";
			}
		}


		if ($page == "kas") {
			if ($aksi == "") {
				include "page/kas/kas.php";
			}

		}	
	



		if ($page == "") {
			include "home.php";
		}



 ?>