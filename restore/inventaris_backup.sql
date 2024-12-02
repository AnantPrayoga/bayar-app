

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
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO tb_user VALUES("1","admin","admin","admin","admin","logo.png");

