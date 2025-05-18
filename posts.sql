-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Bulan Mei 2025 pada 11.53
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `date` date NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `posts`
--

INSERT INTO `posts` (`id`, `title`, `image`, `date`, `content`) VALUES
(130, 'jj', '', '2025-05-13', 'jj'),
(131, 'kk', '', '2025-05-13', 'kk'),
(132, 'yy', '', '2025-05-13', 'yy'),
(133, 'ii', '', '2025-05-13', 'ii'),
(134, 'gg', '', '2025-05-13', 'gg'),
(135, 'jj', '', '2025-05-14', 'jj'),
(136, 'yy', '', '2025-05-14', 'yy'),
(137, 'uu', '', '2025-05-14', 'uu'),
(138, 'ww', '', '2025-05-14', 'ww'),
(139, 'nn', '', '2025-05-14', 'nn'),
(140, 'SURVEI LOKASI EVENT DIASRAMA HAJI MAKASSAR', 'IMG-20181112-WA0060.jpg', '2025-05-15', 'Melakukan survei lokasi tahap kedua dan evaluasi persiapan event di Asrama Haji Embarkasi Makassar. Setiap detail diperiksa secara menyeluruh untuk menjamin kelancaran kegiatan serta memberikan pelayanan terbaik bagi jamaah haji.\r\n'),
(141, 'CONTOH', 'IMG-20181112-WA0026.jpg', '2025-05-15', 'Melakukan survei lokasi tahap kedua dan evaluasi persiapan event di Asrama Haji Embarkasi Makassar. Setiap detail diperiksa secara menyeluruh untuk menjamin kelancaran kegiatan serta memberikan pelayanan terbaik bagi jamaah haji.\r\n'),
(142, 'CONTOH', '20190117_063129.jpg', '2025-05-15', 'Melakukan survei lokasi tahap kedua dan evaluasi persiapan event di Asrama Haji Embarkasi Makassar. Setiap detail diperiksa secara menyeluruh untuk menjamin kelancaran kegiatan serta memberikan pelayanan terbaik bagi jamaah haji.\r\n'),
(143, 'ff', 'BATAS PENGAMBILAN GAMBAR.png', '2025-05-18', 'gg'),
(144, 'hhhh', '01.jpg', '2025-05-18', 'hh');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
