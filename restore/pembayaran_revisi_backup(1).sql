

CREATE TABLE `tb_barang` (
  `kode` varchar(20) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `jenis_barang` varchar(255) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `posisi` varchar(255) NOT NULL,
  `tgl_beli` date NOT NULL,
  `nilai_beli` int(11) NOT NULL,
  `nilai_residu` int(11) NOT NULL,
  `umur_ekonomis` int(11) NOT NULL,
  `kondisi` varchar(30) NOT NULL,
  `sumber_dana` varchar(100) NOT NULL,
  PRIMARY KEY (`kode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tb_barang VALUES("BG-0001","Meja 1","Mebel","13","TU 1","2020-07-25","3000000","300000","5","Second","APBN");
INSERT INTO tb_barang VALUES("BG-0002","Laptop","Elektronik","8","Ruang Kepegawaian","2020-07-25","40000000","2000000","2","Baru","APBN");



CREATE TABLE `tb_barang_keluar` (
  `id_keluar` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(20) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `tgl_keluar` date NOT NULL,
  PRIMARY KEY (`id_keluar`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO tb_barang_keluar VALUES("5","BG-0001","2","tes","2020-07-25");



CREATE TABLE `tb_bayar_bebas` (
  `id_bayar_bebas` int(11) NOT NULL AUTO_INCREMENT,
  `id_tagihan_bebas` int(11) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `jml_bayar` int(11) NOT NULL,
  `ket` varchar(100) NOT NULL,
  `cara_bayar` varchar(50) NOT NULL,
  PRIMARY KEY (`id_bayar_bebas`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;




CREATE TABLE `tb_bulan` (
  `id_bulan` varchar(15) NOT NULL DEFAULT '0',
  `nama_bulan` varchar(25) DEFAULT NULL,
  `urutan` int(2) DEFAULT NULL,
  PRIMARY KEY (`id_bulan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tb_bulan VALUES("1","Januari","7");
INSERT INTO tb_bulan VALUES("10","Oktober","4");
INSERT INTO tb_bulan VALUES("11","November","5");
INSERT INTO tb_bulan VALUES("12","Desember","6");
INSERT INTO tb_bulan VALUES("2","Februari","8");
INSERT INTO tb_bulan VALUES("3","Maret","9");
INSERT INTO tb_bulan VALUES("4","April","10");
INSERT INTO tb_bulan VALUES("5","Mei","11");
INSERT INTO tb_bulan VALUES("6","Juni","12");
INSERT INTO tb_bulan VALUES("7","Juli","1");
INSERT INTO tb_bulan VALUES("8","Agustus","2");
INSERT INTO tb_bulan VALUES("9","September","3");



CREATE TABLE `tb_gaji` (
  `id_gaji` int(11) NOT NULL AUTO_INCREMENT,
  `bulan_tahun` varchar(30) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `masuk` int(11) NOT NULL,
  `sakit` int(11) NOT NULL,
  `izin` int(11) NOT NULL,
  `lembur` int(11) NOT NULL,
  `alpha` int(11) NOT NULL,
  PRIMARY KEY (`id_gaji`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

INSERT INTO tb_gaji VALUES("24","012017","12344","1","3","2","5","4");
INSERT INTO tb_gaji VALUES("25","012017","434322","6","8","7","10","8");
INSERT INTO tb_gaji VALUES("26","052020","12344","19","3","2","5","4");
INSERT INTO tb_gaji VALUES("27","052020","434322","20","3","2","5","4");
INSERT INTO tb_gaji VALUES("28","052020","343443555","19","0","0","0","0");



CREATE TABLE `tb_jenis_bayar` (
  `id_bayar` int(11) NOT NULL AUTO_INCREMENT,
  `id_tahun_ajaran` int(11) NOT NULL,
  `nama_bayar` varchar(100) NOT NULL,
  `tipe_bayar` varchar(30) NOT NULL,
  PRIMARY KEY (`id_bayar`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

INSERT INTO tb_jenis_bayar VALUES("6","3","SPP","Bulanan");
INSERT INTO tb_jenis_bayar VALUES("7","3","iuaran","Bebas");
INSERT INTO tb_jenis_bayar VALUES("8","1","spp2","Bulanan");
INSERT INTO tb_jenis_bayar VALUES("9","2","spp3","Bulanan");
INSERT INTO tb_jenis_bayar VALUES("10","4","spp2021","Bulanan");
INSERT INTO tb_jenis_bayar VALUES("11","4","infak","Bebas");
INSERT INTO tb_jenis_bayar VALUES("12","3","uang gedung","Bebas");



CREATE TABLE `tb_kas` (
  `id_kas` int(11) NOT NULL AUTO_INCREMENT,
  `id_transaksi` int(11) NOT NULL,
  `tgl_kas` date NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `penerimaan` int(11) NOT NULL,
  `pengeluaran` int(11) NOT NULL,
  `jenis_kas` varchar(15) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id_kas`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;




CREATE TABLE `tb_kelas` (
  `id_kelas` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kelas` varchar(100) NOT NULL,
  PRIMARY KEY (`id_kelas`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO tb_kelas VALUES("1","1A");
INSERT INTO tb_kelas VALUES("2","1B");
INSERT INTO tb_kelas VALUES("3","2a");



CREATE TABLE `tb_maintenance` (
  `id_maintenance` int(11) NOT NULL AUTO_INCREMENT,
  `kode_brg` varchar(30) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `posisi` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `teknisi` varchar(30) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id_maintenance`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO tb_maintenance VALUES("2","BG-0001","2","Ruang Kepegawaian","2020-07-25","TK-0001","tes","0");
INSERT INTO tb_maintenance VALUES("3","BG-0002","2","Ruang Kepegawaian","2020-07-25","TK-0001","tes","1");



CREATE TABLE `tb_pinjam` (
  `kode_pinjam` int(11) NOT NULL AUTO_INCREMENT,
  `kode_barang` varchar(20) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `posisi` varchar(100) NOT NULL,
  `nama_peminjam` varchar(255) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`kode_pinjam`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO tb_pinjam VALUES("2","BG-0001","2","Ruang Kepegawaian","tes2","2020-07-25","2020-07-25","321","0");
INSERT INTO tb_pinjam VALUES("3","BG-0002","2","Ruang Kepegawaian","tes2","2020-07-25","2020-07-25","321","1");



CREATE TABLE `tb_profile` (
  `nama_sekolah` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `telpon` varchar(20) NOT NULL,
  `website` varchar(100) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `bendahara` varchar(100) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `ktu` varchar(255) NOT NULL,
  `nip_ktu` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tb_profile VALUES("SEKOLAH BAHAGIA SELALU","JALAN RONGGOLAW NO 25 KOTA COBA-COBA","021.090939","www.sekolah.com","Jakarta","Bejo Santoso","1968890993933434","admin.png","ABDUL MUIS","343434343434");
INSERT INTO tb_profile VALUES("SEKOLAH BAHAGIA SELALU","JALAN RONGGOLAW NO 25 KOTA COBA-COBA","021.090939","www.sekolah.com","Jakarta","Bejo Santoso","1968890993933434","admin.png","ABDUL MUIS","343434343434");
INSERT INTO tb_profile VALUES("SEKOLAH BAHAGIA SELALU","JALAN RONGGOLAW NO 25 KOTA COBA-COBA","021.090939","www.sekolah.com","Jakarta","Bejo Santoso","1968890993933434","admin.png","ABDUL MUIS","343434343434");
INSERT INTO tb_profile VALUES("SEKOLAH BAHAGIA SELALU","JALAN RONGGOLAW NO 25 KOTA COBA-COBA","021.090939","www.sekolah.com","Jakarta","Bejo Santoso","1968890993933434","admin.png","ABDUL MUIS","343434343434");
INSERT INTO tb_profile VALUES("SEKOLAH BAHAGIA SELALU","JALAN RONGGOLAW NO 25 KOTA COBA-COBA","021.090939","www.sekolah.com","Jakarta","Bejo Santoso","1968890993933434","admin.png","ABDUL MUIS","343434343434");
INSERT INTO tb_profile VALUES("SEKOLAH BAHAGIA SELALU","JALAN RONGGOLAW NO 25 KOTA COBA-COBA","021.090939","www.sekolah.com","Jakarta","Bejo Santoso","1968890993933434","admin.png","ABDUL MUIS","343434343434");
INSERT INTO tb_profile VALUES("SEKOLAH BAHAGIA SELALU","JALAN RONGGOLAW NO 25 KOTA COBA-COBA","021.090939","www.sekolah.com","Jakarta","Bejo Santoso","1968890993933434","admin.png","ABDUL MUIS","343434343434");
INSERT INTO tb_profile VALUES("SEKOLAH BAHAGIA SELALU","JALAN RONGGOLAW NO 25 KOTA COBA-COBA","021.090939","www.sekolah.com","Jakarta","Bejo Santoso","1968890993933434","admin.png","ABDUL MUIS","343434343434");
INSERT INTO tb_profile VALUES("SEKOLAH BAHAGIA SELALU","JALAN RONGGOLAW NO 25 KOTA COBA-COBA","021.090939","www.sekolah.com","Jakarta","Bejo Santoso","1968890993933434","admin.png","ABDUL MUIS","343434343434");
INSERT INTO tb_profile VALUES("SEKOLAH BAHAGIA SELALU","JALAN RONGGOLAW NO 25 KOTA COBA-COBA","021.090939","www.sekolah.com","Jakarta","Bejo Santoso","1968890993933434","admin.png","ABDUL MUIS","343434343434");
INSERT INTO tb_profile VALUES("SEKOLAH BAHAGIA SELALU","JALAN RONGGOLAW NO 25 KOTA COBA-COBA","021.090939","www.sekolah.com","Jakarta","Bejo Santoso","1968890993933434","admin.png","ABDUL MUIS","343434343434");
INSERT INTO tb_profile VALUES("SEKOLAH BAHAGIA SELALU","JALAN RONGGOLAW NO 25 KOTA COBA-COBA","021.090939","www.sekolah.com","Jakarta","Bejo Santoso","1968890993933434","admin.png","ABDUL MUIS","343434343434");
INSERT INTO tb_profile VALUES("SEKOLAH BAHAGIA SELALU","JALAN RONGGOLAW NO 25 KOTA COBA-COBA","021.090939","www.sekolah.com","Jakarta","Bejo Santoso","1968890993933434","admin.png","ABDUL MUIS","343434343434");
INSERT INTO tb_profile VALUES("SEKOLAH BAHAGIA SELALU","JALAN RONGGOLAW NO 25 KOTA COBA-COBA","021.090939","www.sekolah.com","Jakarta","Bejo Santoso","1968890993933434","admin.png","ABDUL MUIS","343434343434");
INSERT INTO tb_profile VALUES("SEKOLAH BAHAGIA SELALU","JALAN RONGGOLAW NO 25 KOTA COBA-COBA","021.090939","www.sekolah.com","Jakarta","Bejo Santoso","1968890993933434","admin.png","ABDUL MUIS","343434343434");
INSERT INTO tb_profile VALUES("SEKOLAH BAHAGIA SELALU","JALAN RONGGOLAW NO 25 KOTA COBA-COBA","021.090939","www.sekolah.com","Jakarta","Bejo Santoso","1968890993933434","admin.png","ABDUL MUIS","343434343434");
INSERT INTO tb_profile VALUES("SEKOLAH BAHAGIA SELALU","JALAN RONGGOLAW NO 25 KOTA COBA-COBA","021.090939","www.sekolah.com","Jakarta","Bejo Santoso","1968890993933434","admin.png","ABDUL MUIS","343434343434");
INSERT INTO tb_profile VALUES("SEKOLAH BAHAGIA SELALU","JALAN RONGGOLAW NO 25 KOTA COBA-COBA","021.090939","www.sekolah.com","Jakarta","Bejo Santoso","1968890993933434","admin.png","ABDUL MUIS","343434343434");
INSERT INTO tb_profile VALUES("SEKOLAH BAHAGIA SELALU","JALAN RONGGOLAW NO 25 KOTA COBA-COBA","021.090939","www.sekolah.com","Jakarta","Bejo Santoso","1968890993933434","admin.png","ABDUL MUIS","343434343434");
INSERT INTO tb_profile VALUES("SEKOLAH BAHAGIA SELALU","JALAN RONGGOLAW NO 25 KOTA COBA-COBA","021.090939","www.sekolah.com","Jakarta","Bejo Santoso","1968890993933434","admin.png","ABDUL MUIS","343434343434");



CREATE TABLE `tb_siswa` (
  `id_siswa` int(11) NOT NULL AUTO_INCREMENT,
  `nis` varchar(30) NOT NULL,
  `nama_siswa` varchar(255) NOT NULL,
  `jk` varchar(20) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `nama_ortu` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp_ortu` varchar(15) NOT NULL,
  PRIMARY KEY (`id_siswa`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

INSERT INTO tb_siswa VALUES("18","123","Agung Saputra","Laki-laki","Islam","1","Aktif","Paijo","Jakarta","6281392828");
INSERT INTO tb_siswa VALUES("19","456","Dian Syaputra","Laki-laki","Islam","1","Aktif","Paijo","Jakarta","6281392828");
INSERT INTO tb_siswa VALUES("20","321","Mirani Rahmawati","Perempuan","Islam","2","Aktif","Paijo","Jakarta","6281392828");
INSERT INTO tb_siswa VALUES("21","654","Novita Sari","Perempuan","Islam","2","Aktif","Paijo","Jakarta","6281392828");



CREATE TABLE `tb_tagihan_bebas` (
  `id_tagihan_bebas` int(11) NOT NULL AUTO_INCREMENT,
  `id_bayar` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `total_tagihan` int(11) NOT NULL,
  `terbayar` int(11) NOT NULL,
  `status_bayar` int(11) NOT NULL,
  PRIMARY KEY (`id_tagihan_bebas`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;




CREATE TABLE `tb_tagihan_bulanan` (
  `id_tagihan_bulanan` int(11) NOT NULL AUTO_INCREMENT,
  `id_bayar` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_bulan` int(11) NOT NULL,
  `jml_bayar` int(11) NOT NULL,
  `terbayar` int(11) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `status_bayar` int(11) NOT NULL,
  `cara_bayar` varchar(30) NOT NULL,
  PRIMARY KEY (`id_tagihan_bulanan`)
) ENGINE=InnoDB AUTO_INCREMENT=721 DEFAULT CHARSET=latin1;




CREATE TABLE `tb_tahun_ajaran` (
  `id_tahun_ajaran` int(11) NOT NULL AUTO_INCREMENT,
  `tahun_ajaran` varchar(10) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id_tahun_ajaran`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO tb_tahun_ajaran VALUES("1","2018/2019","tidak");
INSERT INTO tb_tahun_ajaran VALUES("2","2019/2020","tidak");
INSERT INTO tb_tahun_ajaran VALUES("3","2020/2021","tidak");
INSERT INTO tb_tahun_ajaran VALUES("4","2021/2022","aktif");



CREATE TABLE `tb_teknisi` (
  `kode_teknisi` varchar(20) NOT NULL,
  `nama_teknisi` varchar(255) NOT NULL,
  `telp` varchar(20) NOT NULL,
  PRIMARY KEY (`kode_teknisi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tb_teknisi VALUES("TK-0001","AGUS RAHARJO","3434345");
INSERT INTO tb_teknisi VALUES("TK-0002","PARMAN","3434345");



CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(30) NOT NULL,
  `foto` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

INSERT INTO tb_user VALUES("1","admin","Admin","admin","admin","avatar.png");
INSERT INTO tb_user VALUES("5","123","Agung Saputra","123456","user","avatar.png");
INSERT INTO tb_user VALUES("6","456","Dian Syaputra","123456","user","avatar.png");
INSERT INTO tb_user VALUES("7","321","Mirani Rahmawati","123456","user","avatar.png");
INSERT INTO tb_user VALUES("8","654","Novita Sari","123456","user","avatar.png");
INSERT INTO tb_user VALUES("9","123","Agung Saputra","123456","user","avatar.png");
INSERT INTO tb_user VALUES("10","456","Dian Syaputra","123456","user","avatar.png");
INSERT INTO tb_user VALUES("11","321","Mirani Rahmawati","123456","user","avatar.png");
INSERT INTO tb_user VALUES("12","654","Novita Sari","123456","user","avatar.png");

