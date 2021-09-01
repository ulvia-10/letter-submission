-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Sep 2021 pada 14.12
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kantor`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat`
--

CREATE TABLE `surat` (
  `id_surat` int(11) NOT NULL,
  `surat_dari` varchar(150) NOT NULL,
  `tgl_surat` datetime NOT NULL,
  `no_surat` varchar(100) NOT NULL,
  `tgl_diterima` datetime NOT NULL,
  `sifat` enum('sangat_segera','rahasia','segera','biasa') NOT NULL,
  `perihal` varchar(250) NOT NULL,
  `isi_disposisi` varchar(350) NOT NULL,
  `jenis_surat` enum('nota_dinas','surat','spt') NOT NULL,
  `status` enum('diterima','revisi','draft') NOT NULL,
  `namaberkas` varchar(300) NOT NULL,
  `diteruskan` enum('kasi_pma','kasi_pmk_dan_pkplk','kasubag_tu','kepala_cabang') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `surat`
--

INSERT INTO `surat` (`id_surat`, `surat_dari`, `tgl_surat`, `no_surat`, `tgl_diterima`, `sifat`, `perihal`, `isi_disposisi`, `jenis_surat`, `status`, `namaberkas`, `diteruskan`) VALUES
(6, 'baru', '2021-08-25 14:08:52', 'hjbjbj', '2021-08-11 14:08:52', 'segera', 'hvvhj', 'hgvgh', 'nota_dinas', 'draft', '', 'kasubag_tu'),
(7, 'aye', '2021-08-25 14:34:40', 'hjggikhkh', '2021-08-19 14:34:40', 'segera', 'jhjjhkh', 'ghhjnjjk', 'surat', 'diterima', '', 'kasubag_tu'),
(8, 'lusi', '2021-08-28 15:07:47', 'gghhg', '2021-08-30 15:07:47', 'biasa', 'nvngh', 'fgbfngh', 'spt', 'revisi', '', ''),
(9, 'sma budi utomo', '2021-09-22 00:00:00', '', '2021-09-08 00:00:00', 'segera', 'surat keterangan kelakuan baik', '', 'surat', 'draft', 'Undangan_Webinar_BNN1.pdf', 'kasubag_tu'),
(10, 'Cabdin jombang', '2021-09-08 00:00:00', '', '2021-09-15 00:00:00', 'segera', 'Surat Perintah Tugas', '', 'spt', 'draft', 'NOTA_DINAS_SOSIALISASI_JATIM_CERDAS.pdf', 'kepala_cabang');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `surat`
--
ALTER TABLE `surat`
  ADD PRIMARY KEY (`id_surat`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `surat`
--
ALTER TABLE `surat`
  MODIFY `id_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
