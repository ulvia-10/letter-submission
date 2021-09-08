-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Sep 2021 pada 14.57
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `suratkeluar`
--

CREATE TABLE `suratkeluar` (
  `id_surat` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `surat_dari` varchar(150) NOT NULL,
  `tgl_surat` datetime NOT NULL,
  `no_surat` varchar(150) NOT NULL,
  `tgl_diterima` datetime NOT NULL,
  `sifat` enum('sangat_segera','rahasia','segera','biasa') NOT NULL,
  `perihal` varchar(1500) NOT NULL,
  `isi_disposisi` text NOT NULL,
  `jenis_surat` enum('nota_dinas','surat','spt') NOT NULL,
  `status` enum('diterima','direvisi','draft') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_notif`
--

CREATE TABLE `tbl_notif` (
  `id_notif` int(11) NOT NULL,
  `surat_dari` varchar(1500) NOT NULL,
  `perihal` varchar(1500) NOT NULL,
  `tgl_surat` datetime NOT NULL,
  `tgl_notifikasi` datetime NOT NULL,
  `is_read` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `photo` varchar(500) NOT NULL,
  `status_account` enum('active','inactive') NOT NULL,
  `level` enum('kepala_cabang','kasubag_tu','pmk','pma','staf','admin','super_admin') NOT NULL,
  `email` varchar(100) NOT NULL,
  `telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `full_name`, `username`, `password`, `created_at`, `photo`, `status_account`, `level`, `email`, `telp`) VALUES
(1, 'Lusi Tiana Trisila', 'lusi', '$2y$10$8/3HAesCKz.Zzw8bHyniTeegF2OSL85Jlzvy7Z4FVPvswnvitdQ.a', '2021-08-31 03:08:55', '5051d447-30d9-4e1b-b3be-2f3ab1d69d86.jpg', 'active', 'admin', 'lucytiana1504@gmail.com', '081902609277'),
(2, 'Ulvia Yulianti', 'ulvi', '$2y$10$shzED5sDL/udoC0rOF7LUexB3lHFHnIoqRFQX5LgHnO2c2KW4dUtO', '2021-08-30 05:48:08', 'logo-garuda-pancasila-warna.jpg', 'active', 'admin', 'ulvi.yulianti@gmail.com', ''),
(3, 'DWIYANTI 1', 'ulvi', '$2y$10$ZLR.AVzL6NbEPOyke6ddz.e.uQ3TvCdbwzvGIMdNL8jjG6PegRsQe', '2021-08-31 03:05:36', 'Me.jpeg', 'active', 'pma', 'ulvia1@gmail.com', ''),
(5, 'syifa', 'syifa', '$2y$10$8/3HAesCKz.Zzw8bHyniTeegF2OSL85Jlzvy7Z4FVPvswnvitdQ.a', '2021-08-31 02:46:01', '', 'active', 'super_admin', '', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `surat`
--
ALTER TABLE `surat`
  ADD PRIMARY KEY (`id_surat`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `surat`
--
ALTER TABLE `surat`
  MODIFY `id_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
