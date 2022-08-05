-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 05 Agu 2022 pada 15.21
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventaris`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `idbarang` int(11) NOT NULL,
  `merek_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `nama_barang` varchar(128) NOT NULL,
  `keterangan` varchar(256) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`idbarang`, `merek_id`, `kategori_id`, `nama_barang`, `keterangan`, `stok`) VALUES
(4, 2, 2, 'Spidol', ' ', 10),
(5, 2, 1, 'HP', 'Baru', 0),
(6, 2, 2, 'Laptop', 'Rusak', 30),
(7, 2, 2, 'Kursi', 'Rusak', 50),
(8, 2, 2, 'Mouse', 'Mouse komputer', 30);

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `idbarang_keluar` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` varchar(256) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang_keluar`
--

INSERT INTO `barang_keluar` (`idbarang_keluar`, `barang_id`, `jumlah`, `keterangan`, `tanggal`) VALUES
(1, 1, 1, 'Rusak', '2020-11-26');

--
-- Trigger `barang_keluar`
--
DELIMITER $$
CREATE TRIGGER `kurang_stok` AFTER INSERT ON `barang_keluar` FOR EACH ROW BEGIN
	UPDATE barang SET stok = stok - new.jumlah WHERE idbarang = new.barang_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `idbarang_masuk` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` varchar(256) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang_masuk`
--

INSERT INTO `barang_masuk` (`idbarang_masuk`, `barang_id`, `jumlah`, `keterangan`, `tanggal`) VALUES
(1, 4, 10, 'Beli Baru', '2020-11-24'),
(2, 1, 3, 'Beli baru', '2020-11-23'),
(3, 3, 2, 'Beli baru', '2020-11-24');

--
-- Trigger `barang_masuk`
--
DELIMITER $$
CREATE TRIGGER `tambah_stok` AFTER INSERT ON `barang_masuk` FOR EACH ROW BEGIN
	UPDATE barang SET stok = stok + new.jumlah WHERE idbarang = new.barang_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `idkategori` int(11) NOT NULL,
  `nama_kategori` varchar(128) NOT NULL,
  `keterangan` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`idkategori`, `nama_kategori`, `keterangan`) VALUES
(1, 'Elektronik', 'Barang Elektronik'),
(2, 'Alat Tulis', 'seperti Pena, Pensil'),
(3, 'Kebersihan', 'Sapu dll');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_prasarana`
--

CREATE TABLE `kategori_prasarana` (
  `idkat_prasarana` int(11) NOT NULL,
  `nama` varchar(50) COLLATE utf8_bin NOT NULL,
  `keterangan` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data untuk tabel `kategori_prasarana`
--

INSERT INTO `kategori_prasarana` (`idkat_prasarana`, `nama`, `keterangan`) VALUES
(1, 'Kelas', 'Ruangan Belajar'),
(2, 'Kantin', 'Tempat makan dan minum');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_sarana`
--

CREATE TABLE `kategori_sarana` (
  `idkat_sarana` int(11) NOT NULL,
  `nama` varchar(50) COLLATE utf8_bin NOT NULL,
  `keterangan` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data untuk tabel `kategori_sarana`
--

INSERT INTO `kategori_sarana` (`idkat_sarana`, `nama`, `keterangan`) VALUES
(1, 'Sarana Kelas', 'Pensil, penghapus dan lainnya'),
(2, 'Meja', 'Meja belajar'),
(3, 'Laptop', 'akljsoka'),
(4, 'Kursi', 'Tempat duduk');

-- --------------------------------------------------------

--
-- Struktur dari tabel `merek`
--

CREATE TABLE `merek` (
  `idmerek` int(11) NOT NULL,
  `nama_merek` varchar(128) NOT NULL,
  `keterangan` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `merek`
--

INSERT INTO `merek` (`idmerek`, `nama_merek`, `keterangan`) VALUES
(1, 'Epson', 'Printer Epson'),
(2, 'Canon', 'Printer canon');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` int(11) NOT NULL,
  `pesan` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data untuk tabel `pesan`
--

INSERT INTO `pesan` (`id_pesan`, `pesan`) VALUES
(1, 'test'),
(2, 'test 2'),
(3, 'test3'),
(4, 'test4'),
(5, 'test 5\r\n'),
(6, 'test 6');

-- --------------------------------------------------------

--
-- Struktur dari tabel `prasarana`
--

CREATE TABLE `prasarana` (
  `id_sekolah` int(11) NOT NULL,
  `id_prasarana` int(50) NOT NULL,
  `nama_prasarana` varchar(50) COLLATE utf8_bin NOT NULL,
  `jenis_prasarana` varchar(50) COLLATE utf8_bin NOT NULL,
  `no_regis` varchar(50) COLLATE utf8_bin NOT NULL,
  `luas` int(11) NOT NULL,
  `kapasitas` int(11) NOT NULL,
  `kondisi_prasarana` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data untuk tabel `prasarana`
--

INSERT INTO `prasarana` (`id_sekolah`, `id_prasarana`, `nama_prasarana`, `jenis_prasarana`, `no_regis`, `luas`, `kapasitas`, `kondisi_prasarana`) VALUES
(0, 1, 'Ruangan 7C', 'Ruangan', 'Negeri', 900, 30, ''),
(0, 4, 'Ruangan 7F', 'Ruangan', 'Negeri', 900, 40, ''),
(0, 5, 'Ruangan 7A', '2', '', 900, 40, ''),
(1, 6, 'Ruangan 7A', '1', '', 900, 40, ''),
(1, 7, 'Ruangan 9A', '1', '98039-480', 70, 40, ''),
(2, 8, 'Ruangan 7A', '2', '98039-480', 900, 40, 'Baik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sarana`
--

CREATE TABLE `sarana` (
  `id_sarana` int(11) NOT NULL,
  `id_sekolah` int(11) NOT NULL,
  `jenis_sarana` varchar(50) COLLATE utf8_bin NOT NULL,
  `no_regis` varchar(50) COLLATE utf8_bin NOT NULL,
  `nama_sarana` varchar(50) COLLATE utf8_bin NOT NULL,
  `keperluan` varchar(50) COLLATE utf8_bin NOT NULL,
  `kondisi_sarana` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data untuk tabel `sarana`
--

INSERT INTO `sarana` (`id_sarana`, `id_sekolah`, `jenis_sarana`, `no_regis`, `nama_sarana`, `keperluan`, `kondisi_sarana`) VALUES
(3, 0, '', '8768796', 'Laptop Asus X-441M', 'Mengetik', ''),
(4, 0, '1', '98039-480', 'Laptop Asus X-441M', 'Mengetik', ''),
(5, 0, '2', '98039-480', 'Laptop Asus X-441S', 'Mengetik', ''),
(6, 0, '2', '98039-480', 'Laptop Asus X-441S', 'Mengetik', ''),
(7, 1, '3', '98039-480', 'Laptop Asus X-441V', 'Mengetik', ''),
(8, 1, '3', '98039-480', 'Laptop Asus X-441S', 'Mengetik', ''),
(9, 5, '3', '98039-480', 'Laptop Asus X-441M', 'Mengetik', ''),
(10, 2, '3', '98039-480', 'Laptop Asus X-441M', 'Mengetik', 'Baik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sekolah`
--

CREATE TABLE `sekolah` (
  `id_sekolah` int(11) NOT NULL,
  `nama_sekolah` varchar(50) COLLATE utf8_bin NOT NULL,
  `npsn` varchar(50) COLLATE utf8_bin NOT NULL,
  `status` varchar(50) COLLATE utf8_bin NOT NULL,
  `alamat` varchar(50) COLLATE utf8_bin NOT NULL,
  `telepon` varchar(20) COLLATE utf8_bin NOT NULL,
  `kode_pos` varchar(15) COLLATE utf8_bin NOT NULL,
  `kelurahan` varchar(50) COLLATE utf8_bin NOT NULL,
  `kecamatan` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data untuk tabel `sekolah`
--

INSERT INTO `sekolah` (`id_sekolah`, `nama_sekolah`, `npsn`, `status`, `alamat`, `telepon`, `kode_pos`, `kelurahan`, `kecamatan`) VALUES
(0, 'SMP Negeri 1', '209978', 'Swasta', 'Jl. Adhyaksa Baru No.14 A', '08798796876', '91831', 'Penanian', 'Rantepao'),
(1, 'SMP 1', '209974', 'Swasta', 'Jl. Adhyaksa Baru No.14 A', '08798796876', '91831', 'Tampo', 'Rantepao'),
(2, 'SMP 3', '209979', 'Swasta', 'Jl. Frans Karangan No. 60', '0879879879', '91831', 'Tampo', 'Tallunglipu'),
(3, 'SMP 4', '209978', 'Negeri', 'Jl. Frans Karangan No20', '0879879', '91833', 'Penanian', 'Rantepao'),
(4, 'SMP 5', '209978', 'Negeri', 'Jl. Frans Karangan No20', '0879879', '91832', 'Penanian', 'Rantepao'),
(5, 'SMP 50', '209978', 'Negeri', 'Jl. Frans Karangan No20', '0879879', '91832', 'Tampo', 'Tallunglipu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_users` int(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('admin','user') NOT NULL,
  `id_sekolah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_users`, `nama`, `no_hp`, `username`, `password`, `level`, `id_sekolah`) VALUES
(3, 'Administrator', '082248577297', 'admin', '$2y$10$uJoRzGIQD.lhHT68zPUtSuub1zmEvUeVnIqIX2nmunxtS0CkYct92', 'admin', 1),
(4, 'Yanto', '0657647546', 'yanto', '$2y$10$x9ByzvELLVf.M1SXYn7Gye3FPkqpTmAyeYsFw8Yj2XWxj.oE0eMBG', 'user', 2),
(5, 'Bebet', '0657647546', 'bebet', '$2y$10$KnSJbkNK4zmVnu8RuqD6oeMh4LrxLW2FJ53p0HFf/ojI0hV2ORQfu', 'admin', 0),
(6, 'admin', '0657647546', 'kura', '$2y$10$VcOmLix.e.IDCocMkPVH/OwYXlqh6g9jehmA30Ae.EvpSr8zKrtD6', 'user', 5),
(7, 'Fadli', '0657647546', 'fadli', '$2y$10$Rthio6h8QhcsjIPawtrOlO7r8ipLMs5y9Nww.DMrDMLWq/0PAuS/i', 'user', 5),
(8, 'Jojo', '0657647546', 'jojo', '$2y$10$eODk9n0z2irYP3gqvmVOI.FINchEvxxoZEqNl3Si624E2sy0ex8xO', 'user', 4),
(9, 'Guru', '0657647546', 'guru', '$2y$10$bV3FPS/ob7JGlgy0rIESVOMFZoNrxPeGkoRrSw66SujvmsHeCME6u', 'admin', 0),
(10, 'Kolam', '0657647546', 'kolam', '$2y$10$argMzhD95aLmjhLp2BJKc.4V1s2Oi/je9bw03h3EJr9WChzhM5x9y', 'admin', 0),
(11, 'Johan Suratno', '0657647546', 'johan', '$2y$10$jsktdT8YFQmtBgNsU9CCuOeeG4lAvV54NraCMbktG1pWPGZtW3qsm', 'user', 0),
(12, 'Saulus', '0657647546', 'saulus', '$2y$10$triQspJ/ffsW3/uo7x8C7.OdxnhPtmg1anaQf.t23NitBvtXLrSsK', 'admin', 0),
(13, 'ari', '0865726573', 'ari', '$2y$10$sCEnJPbf1Mqah87a1tN6i.B7AX0YjZHYuZemxSd5lKLN7ksxiB1zG', 'admin', 0),
(14, 'joni', 'joni', 'joni', '$2y$10$gTcsiwUK8P802x5hbwZV1OmmrLSj3cMm2u8OCwzLfLo.MtURFphDe', 'admin', 0),
(15, 'lukas', '086753264756', 'lukas', '$2y$10$dveal4LWqsmKps61dhwlV.A4Qmgf1BBPhFl2X8l6eLrq4HR8J0WAO', 'admin', 0),
(16, 'geri', '98097-9', 'geri', '$2y$10$FSo.w68IREQbxcsPUZxycuKKwtsiLQIPsCZfKh81xJTzjIeEedG32', 'user', 5),
(17, 'samsul', '08762876', 'samsul', '$2y$10$DWFolRr/Ro1nc11i7PuvquUWRfuSl0kQQ89K1QMUnogu9uB6XnFVG', 'admin', 0),
(18, 'ade', '0567657', 'ade', '$2y$10$bK6Eb7aVwsqECxxaIGvkB.Y6fD09Jry4r/ONS.Dp7yiM1yUNITf1e', 'admin', 0),
(19, 'melda', '067527635', 'melda', '$2y$10$bALxgTnCccCLYJgY7/Lo6.G6PD1NOWOXIsryhpJs8vQYIJtQaccny', 'admin', 0),
(20, 'jojon', '087263', 'jojon', '$2y$10$DbUlxoaNB.WEhZ65yUEMkeeQc0NJW8g.KMtbcSHmMyrSxBiFzJ4mG', 'admin', 0),
(21, 'Hari', '09834', 'hari', '$2y$10$jM7coBAwh3kYcP7le.601udHrFEILfEBSCAaQvhvZNhxJPC0ekg.m', 'user', 0),
(22, 'aa', '0657647546', 'aa', '$2y$10$TTf6lTW6RJWXYDVJXvgU0exLiGF77Y35biRjj4mBSuC3AfMCG6MLu', 'user', 2),
(23, 'ww', '0657647546', 'ww', '$2y$10$nsDKacvGkN7wge4N5JAGNu4DVReNIVYVkm19yYW.MA0YTx.yNiXqC', 'user', 9),
(24, 'rr', '0657647546', 'rr', '$2y$10$SsrqgUj9h8hWeBrIhJ2rkeT5udcxeojGKnJm3wjjcyCF4PKMgChF2', 'user', 0),
(26, 'tt2', '0657647546', 'tt', '$2y$10$2DY5Fbm7XTTWHwpuF6la7OuYycLh9RzFo7JZ9emC1QYCvr6S5Pgqy', 'user', 0),
(27, 'Hore', '0657647546', 'hore', '$2y$10$yfX3M1L.vHwnWfaRiByjLOYJJOxuG9w7w/io5ERd4SUZVET2i3tF2', 'user', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `wilayah`
--

CREATE TABLE `wilayah` (
  `id_wilayah` int(11) NOT NULL,
  `wilayah` varchar(50) COLLATE utf8_bin NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data untuk tabel `wilayah`
--

INSERT INTO `wilayah` (`id_wilayah`, `wilayah`, `latitude`, `longitude`) VALUES
(1, 'Air Terjun Indah', -5.14914, 122.851),
(2, 'Makassar', -5.1477, 119.433),
(3, 'SMPN 2 Rantepao', -2.97316, 119.899);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`idbarang`);

--
-- Indeks untuk tabel `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`idbarang_keluar`);

--
-- Indeks untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`idbarang_masuk`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`idkategori`);

--
-- Indeks untuk tabel `kategori_prasarana`
--
ALTER TABLE `kategori_prasarana`
  ADD PRIMARY KEY (`idkat_prasarana`);

--
-- Indeks untuk tabel `kategori_sarana`
--
ALTER TABLE `kategori_sarana`
  ADD PRIMARY KEY (`idkat_sarana`);

--
-- Indeks untuk tabel `merek`
--
ALTER TABLE `merek`
  ADD PRIMARY KEY (`idmerek`);

--
-- Indeks untuk tabel `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indeks untuk tabel `prasarana`
--
ALTER TABLE `prasarana`
  ADD PRIMARY KEY (`id_prasarana`);

--
-- Indeks untuk tabel `sarana`
--
ALTER TABLE `sarana`
  ADD PRIMARY KEY (`id_sarana`);

--
-- Indeks untuk tabel `sekolah`
--
ALTER TABLE `sekolah`
  ADD PRIMARY KEY (`id_sekolah`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- Indeks untuk tabel `wilayah`
--
ALTER TABLE `wilayah`
  ADD PRIMARY KEY (`id_wilayah`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `idbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `barang_keluar`
--
ALTER TABLE `barang_keluar`
  MODIFY `idbarang_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `idbarang_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `idkategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kategori_prasarana`
--
ALTER TABLE `kategori_prasarana`
  MODIFY `idkat_prasarana` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kategori_sarana`
--
ALTER TABLE `kategori_sarana`
  MODIFY `idkat_sarana` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `merek`
--
ALTER TABLE `merek`
  MODIFY `idmerek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `prasarana`
--
ALTER TABLE `prasarana`
  MODIFY `id_prasarana` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `sarana`
--
ALTER TABLE `sarana`
  MODIFY `id_sarana` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `sekolah`
--
ALTER TABLE `sekolah`
  MODIFY `id_sekolah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `wilayah`
--
ALTER TABLE `wilayah`
  MODIFY `id_wilayah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
