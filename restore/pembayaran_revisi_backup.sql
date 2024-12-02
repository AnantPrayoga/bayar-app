

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

INSERT INTO tb_kas VALUES("56","631","2021-09-02","pembayaran&nbspSPP&nbspAtas Nama&nbspDian Syaputra","100000","0","","0");



CREATE TABLE `tb_kelas` (
  `id_kelas` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kelas` varchar(100) NOT NULL,
  PRIMARY KEY (`id_kelas`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO tb_kelas VALUES("1","1A");
INSERT INTO tb_kelas VALUES("2","1B");
INSERT INTO tb_kelas VALUES("3","2a");



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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

INSERT INTO tb_siswa VALUES("14","123","Agung Saputra","Laki-laki","Islam","1","Aktif","Paijo","Jakarta","6281392828");
INSERT INTO tb_siswa VALUES("15","456","Dian Syaputra","Laki-laki","Islam","3","Aktif","Paijo","Jakarta","6281392828");
INSERT INTO tb_siswa VALUES("16","321","Mirani Rahmawati","Perempuan","Islam","2","Aktif","Paijo","Jakarta","6281392828");
INSERT INTO tb_siswa VALUES("17","654","Novita Sari","Perempuan","Islam","2","Aktif","Paijo","Jakarta","6281392828");



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

INSERT INTO tb_tagihan_bebas VALUES("14","7","16","2","750000","0","0");
INSERT INTO tb_tagihan_bebas VALUES("15","7","17","2","1000000","0","0");
INSERT INTO tb_tagihan_bebas VALUES("16","11","15","3","500000","0","0");
INSERT INTO tb_tagihan_bebas VALUES("17","12","14","1","2000000","0","0");
INSERT INTO tb_tagihan_bebas VALUES("18","12","15","1","2000000","0","0");



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

INSERT INTO tb_tagihan_bulanan VALUES("613","6","14","1","1","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("614","6","14","1","2","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("615","6","14","1","3","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("616","6","14","1","4","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("617","6","14","1","5","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("618","6","14","1","6","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("619","6","14","1","7","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("620","6","14","1","8","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("621","6","14","1","9","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("622","6","14","1","10","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("623","6","14","1","11","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("624","6","14","1","12","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("625","6","15","1","1","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("626","6","15","1","2","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("627","6","15","1","3","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("628","6","15","1","4","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("629","6","15","1","5","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("630","6","15","1","6","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("631","6","15","1","7","100000","100000","2021-09-02","1","Cash");
INSERT INTO tb_tagihan_bulanan VALUES("632","6","15","1","8","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("633","6","15","1","9","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("634","6","15","1","10","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("635","6","15","1","11","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("636","6","15","1","12","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("637","6","16","2","1","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("638","6","16","2","2","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("639","6","16","2","3","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("640","6","16","2","4","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("641","6","16","2","5","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("642","6","16","2","6","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("643","6","16","2","7","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("644","6","16","2","8","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("645","6","16","2","9","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("646","6","16","2","10","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("647","6","16","2","11","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("648","6","16","2","12","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("649","6","17","2","1","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("650","6","17","2","2","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("651","6","17","2","3","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("652","6","17","2","4","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("653","6","17","2","5","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("654","6","17","2","6","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("655","6","17","2","7","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("656","6","17","2","8","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("657","6","17","2","9","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("658","6","17","2","10","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("659","6","17","2","11","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("660","6","17","2","12","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("661","8","14","1","1","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("662","8","14","1","2","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("663","8","14","1","3","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("664","8","14","1","4","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("665","8","14","1","5","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("666","8","14","1","6","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("667","8","14","1","7","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("668","8","14","1","8","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("669","8","14","1","9","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("670","8","14","1","10","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("671","8","14","1","11","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("672","8","14","1","12","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("673","8","15","1","1","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("674","8","15","1","2","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("675","8","15","1","3","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("676","8","15","1","4","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("677","8","15","1","5","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("678","8","15","1","6","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("679","8","15","1","7","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("680","8","15","1","8","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("681","8","15","1","9","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("682","8","15","1","10","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("683","8","15","1","11","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("684","8","15","1","12","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("685","9","14","1","1","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("686","9","14","1","2","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("687","9","14","1","3","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("688","9","14","1","4","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("689","9","14","1","5","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("690","9","14","1","6","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("691","9","14","1","7","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("692","9","14","1","8","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("693","9","14","1","9","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("694","9","14","1","10","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("695","9","14","1","11","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("696","9","14","1","12","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("697","9","15","1","1","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("698","9","15","1","2","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("699","9","15","1","3","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("700","9","15","1","4","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("701","9","15","1","5","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("702","9","15","1","6","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("703","9","15","1","7","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("704","9","15","1","8","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("705","9","15","1","9","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("706","9","15","1","10","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("707","9","15","1","11","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("708","9","15","1","12","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("709","10","15","3","1","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("710","10","15","3","2","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("711","10","15","3","3","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("712","10","15","3","4","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("713","10","15","3","5","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("714","10","15","3","6","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("715","10","15","3","7","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("716","10","15","3","8","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("717","10","15","3","9","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("718","10","15","3","10","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("719","10","15","3","11","100000","0","0000-00-00","0","");
INSERT INTO tb_tagihan_bulanan VALUES("720","10","15","3","12","100000","0","0000-00-00","0","");



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



CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(30) NOT NULL,
  `foto` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

INSERT INTO tb_user VALUES("1","admin","Admin","admin","admin","avatar.png");
INSERT INTO tb_user VALUES("5","123","Agung Saputra","123456","user","avatar.png");
INSERT INTO tb_user VALUES("6","456","Dian Syaputra","123456","user","avatar.png");
INSERT INTO tb_user VALUES("7","321","Mirani Rahmawati","123456","user","avatar.png");
INSERT INTO tb_user VALUES("8","654","Novita Sari","123456","user","avatar.png");

