-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Des 2018 pada 20.34
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `post`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_karyawan`
--

CREATE TABLE `tbl_karyawan` (
  `nip` varchar(20) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(25) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `username` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_karyawan`
--

INSERT INTO `tbl_karyawan` (`nip`, `nama`, `alamat`, `email`, `no_hp`, `username`) VALUES
('', '', '', '', '', ''),
('65432', 'elisa', 'bhvgc', 'rtyui', '87665', 'ellis'),
('87643', 'trg', 'fyf', 'gfgdt', '87654', 'trd'),
('9876543', 'admin', 'gcg', 'fgdfuu', '87654', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_login`
--

CREATE TABLE `tbl_login` (
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` int(1) NOT NULL,
  `pertanyaan` varchar(255) NOT NULL,
  `jawaban` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_login`
--

INSERT INTO `tbl_login` (`username`, `password`, `level`, `pertanyaan`, `jawaban`) VALUES
('', 'd41d8cd98f00b204e9800998ecf8427e', 1, '', ''),
('admin', 'd41d8cd98f00b204e9800998ecf8427e', 1, '', ''),
('asd', 'asda', 2, '', ''),
('asdas', 'dasd', 2, '', ''),
('az', 'az', 2, '', ''),
('br', 'br', 2, '', ''),
('brbrbrb', '8787878', 2, '', ''),
('bryan', 'bryan', 2, '', ''),
('cx', 'xc', 2, '', ''),
('dasd', 'asdsa', 2, '', ''),
('dddd', 'd41d8cd98f00b204e9800998ecf8427e', 1, '', ''),
('ellis', 'rangga', 1, '', ''),
('elliskim', 'rangga', 1, '', ''),
('ellis_kim', 'd41d8cd98f00b204e9800998ecf8427e', 2, 'Tanggal lahir anda?', '12'),
('eqw', 'weqw', 2, '', ''),
('fitrianar', '12345', 2, '', ''),
('guwbd', 'uibiib', 2, '', ''),
('hhh', 'd41d8cd98f00b204e9800998ecf8427e', 2, 'Apa warna favorite anda?', 'putih'),
('hhhh', 'd41d8cd98f00b204e980', 2, 'Apa warna favorite anda?', 'hitam'),
('hjjhj', 'asd', 2, '', ''),
('mnb', 'mnb', 2, '', ''),
('po', 'po', 2, '', ''),
('poiu', 'poiu', 2, '', ''),
('put', 'put', 2, '', ''),
('qwer', 'qwer', 2, '', ''),
('raisah', 'rangga', 2, 'Apa warna favorite anda?', 'putih'),
('rama', 'd41d8cd98f00b204e9800998ecf8427e', 2, 'Apa warna favorite anda?', 'hijau'),
('sadas', 'dasd', 2, '', ''),
('sasd', 'asd', 2, '', ''),
('trd', 'd41d8cd98f00b204e980', 1, '', ''),
('tuti', 'd41d8cd98f00b204e9800998ecf8427e', 2, 'Apa warna favorite anda?', 'kuning'),
('uihihuihuih', 'uihuihiuhiuh', 2, '', ''),
('vbbvvb', 'sdsad', 2, '', ''),
('z', 'z', 2, '', ''),
('zzxc', 'zxc', 2, '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_paket`
--

CREATE TABLE `tbl_paket` (
  `no` int(11) NOT NULL,
  `tgl_datang` varchar(15) NOT NULL,
  `sasaran` varchar(35) NOT NULL,
  `penerima` varchar(35) NOT NULL,
  `isi_paket` varchar(20) NOT NULL,
  `tgl_ambil` varchar(15) NOT NULL,
  `status` varchar(15) NOT NULL,
  `perantara` varchar(35) NOT NULL,
  `nip` varchar(20) DEFAULT NULL,
  `no_ktp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_paket`
--

INSERT INTO `tbl_paket` (`no`, `tgl_datang`, `sasaran`, `penerima`, `isi_paket`, `tgl_ambil`, `status`, `perantara`, `nip`, `no_ktp`) VALUES
(21, '2018/12/04 17:0', '', '', 'cincin', '', 'AKAN DATANG', '', NULL, ''),
(23, '2018/12/04 17:0', 'tuti', '', 'baju', '', 'AKAN DATANG', '', NULL, ''),
(24, '2018/12/04 17:1', 'ellis kim', '', 'sepatu', '', 'AKAN DATANG', '', NULL, ''),
(25, '2018/12/04 17:4', '', '', 'tas', '', '', '', NULL, ''),
(26, '2018/12/04 17:4', '', '', 'cincin', '', '', '', NULL, ''),
(27, '2018/12/04 17:4', '', '', 'buah', '', '', '', NULL, ''),
(28, '2018/12/04 17:4', '', '', 'cincin', '', '', '', NULL, ''),
(29, '2018/12/04 17:4', '', '09876', 'bom', '', '', '', NULL, ''),
(30, '2018/12/04 17:5', '7676', '', 'cincin', '', '', '', NULL, ''),
(31, '2018/12/04 18:3', 'tuti', '', 'sepatu', 'DIKEMBALIKAN', 'AKAN DATANG', '', NULL, ''),
(32, '2018/12/04 18:3', 'tuti', '', 'gelang', '', 'AKAN DATANG', '', NULL, ''),
(33, '2018/12/04 18:3', 'tuti', '', 'bom', '', 'AKAN DATANG', '', NULL, ''),
(34, '2018/12/04 18:3', 'tuti', '', 'bom', '', 'AKAN DATANG', '', NULL, ''),
(35, '2018/12/04 18:3', 'tuti', '', 'bom', '', 'AKAN DATANG', '', NULL, ''),
(36, '2018/12/04 18:3', 'tuti', '', 'buah', '', 'AKAN DATANG', '', NULL, ''),
(37, '2018/12/04 18:3', 'tuti', '', 'gelang', '', 'AKAN DATANG', '', NULL, ''),
(38, '2018/12/04 18:3', 'tuti', '', 'gelang', '', 'AKAN DATANG', '', NULL, ''),
(39, '2018/12/04 18:3', 'tuti', '', 'gelang', '', 'AKAN DATANG', '', NULL, ''),
(40, '2018/12/04 18:3', 'tuti', '', 'gelang', '', 'AKAN DATANG', '', NULL, ''),
(41, '2018/12/04 19:0', 'tuti', '', 'gelang', '', 'AKAN DATANG', '', NULL, ''),
(42, '2018/12/04 19:0', 'tuti', '', 'gelang', '', 'AKAN DATANG', '', NULL, ''),
(43, '2018/12/04 19:0', 'tuti', '', 'buah', '', 'AKAN DATANG', '', NULL, ''),
(44, '2018/12/04 19:1', 'tuti', '', 'cincin', '', 'AKAN DATANG', '', NULL, ''),
(45, '2018/12/04 19:4', 'tuti', '', 'tas', '', 'AKAN DATANG', '', NULL, ''),
(46, '2018/12/04 20:1', '09876', '', '', '', '', '', NULL, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_penghuni`
--

CREATE TABLE `tbl_penghuni` (
  `no_ktp` varchar(20) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `unit` varchar(20) NOT NULL,
  `gambar` text NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `email` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_penghuni`
--

INSERT INTO `tbl_penghuni` (`no_ktp`, `nama`, `unit`, `gambar`, `no_hp`, `email`, `username`) VALUES
('09876', 'rama', '123', 'asssa.jpg', '09876', 'rama', 'rama'),
('123', 'poiu', 'poiu', 'doodle_of_telkom_university_logo_by_dhekaanzarp-d9v0lsx.jpg', '098', 'oiu', 'poiu'),
('234', 'tuti', '234', 'thVG7KDEP3.jpg', '09876', 'tuti', 'tuti'),
('56', 'mnb', 'mnb', 'thVG7KDEP3.jpg', '5', 'nb', 'mnb'),
('7676', 'bryan', '46', 'qq.png', '08777', 'bryan@gmail', 'bryan'),
('78593582', 'put', '12f', 'gb.jpg', '343256', 'put', 'put'),
('876543', 'raisa', '12', 'thVG7KDEP3.jpg', 'csdwyds', 'vhv', 'raisah'),
('9', 'po', 'po', 'thVG7KDEP3.jpg', '90', 'hg', 'po'),
('987654', 'ellis kim', '9a', 'asssa.jpg', '9809766', 'eljhhdf', 'ellis_kim'),
('az', 'az', 'az', 'qq.png', 'az', 'z', 'az'),
('qwer', 'qwer', 'qwer', 'doodle_of_telkom_university_logo_by_dhekaanzarp-d9v0lsx.jpg', 'qwer', 'qwer', 'qwer'),
('z', 'zz', 'z', 'qq.png', 'z', 'z', 'z');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_karyawan`
--
ALTER TABLE `tbl_karyawan`
  ADD PRIMARY KEY (`nip`),
  ADD KEY `username` (`username`);

--
-- Indeks untuk tabel `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `tbl_paket`
--
ALTER TABLE `tbl_paket`
  ADD PRIMARY KEY (`no`),
  ADD KEY `nip` (`nip`),
  ADD KEY `no_ktp` (`no_ktp`);

--
-- Indeks untuk tabel `tbl_penghuni`
--
ALTER TABLE `tbl_penghuni`
  ADD PRIMARY KEY (`no_ktp`),
  ADD KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_paket`
--
ALTER TABLE `tbl_paket`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_karyawan`
--
ALTER TABLE `tbl_karyawan`
  ADD CONSTRAINT `tbl_karyawan_ibfk_1` FOREIGN KEY (`username`) REFERENCES `tbl_login` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_paket`
--
ALTER TABLE `tbl_paket`
  ADD CONSTRAINT `tbl_paket_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `tbl_karyawan` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_penghuni`
--
ALTER TABLE `tbl_penghuni`
  ADD CONSTRAINT `tbl_penghuni_ibfk_1` FOREIGN KEY (`username`) REFERENCES `tbl_login` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
