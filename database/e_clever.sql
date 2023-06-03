-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Jun 2023 pada 21.12
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_clever`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `course`
--

CREATE TABLE `course` (
  `id_course` int(11) NOT NULL,
  `judul_course` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `course`
--

INSERT INTO `course` (`id_course`, `judul_course`, `deskripsi`, `gambar`) VALUES
(1, 'Hypertext Markup Language (HTML)', '“ HTML adalah kerangka struktural dari proses desain situs web. Dan proses desain website HTML menggunakan tag HTML yang sering digunakan dalam desain website antara lain div, p, h1, img, a, nav, ol, ul dan masih banyak lagi.“', 'thumb-1.png'),
(2, 'Cascading Style Sheet (CSS)', 'Cascading Style Sheet merupakan bahasa presentasi digunakan untuk mengatur tampilan visual halaman web. CSS memungkinkan pengembang web untuk membuat halaman web yang tampak cantik dan menarik, mengontrol bagaimana elemen seperti teks, gambar, dan formuli', 'thumb-2.png'),
(3, 'Javascript (JS)', 'JavaScript memungkinkan pengembang web untuk menambahkan interaksi, animasi, dan efek visual ke halaman web. JavaScript juga memungkinkan pengembang memvalidasi input formulir, membuat pop-up, dan menambahkan konten secara real-time tanpa memuat ulang hal', 'thumb-3.png'),
(4, 'PHP: Hypertext Preprocessor', 'PHP merupakan singkatan dari PHP : Hypertext Preprocessor adalah salah satu Bahasa scripting open source yang banyak digunakan oleh Web Developer untuk pengembangan Web. PHP banyak digunakan untuk membuat banyak project seperti Grafik Antarmuka (GUI), Web', 'thumb-2.png'),
(7, 'goggle', 'aaaaa', '647b8fc58b808.jpg'),
(8, 'goggle', 'aaaaa', '647b90233cc81.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokumen`
--

CREATE TABLE `dokumen` (
  `id_doc` int(11) NOT NULL,
  `id_course` int(11) NOT NULL,
  `judul_doc` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `dokumen`
--

INSERT INTO `dokumen` (`id_doc`, `id_course`, `judul_doc`, `link`) VALUES
(1, 1, 'Materi 1', 'https://youtube.com/embed/NBZ9Ro6UKV8');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` int(11) NOT NULL,
  `id_users` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_users`, `nama`, `username`, `email`, `password`, `role`) VALUES
(1, 'Wahyu', 'wahyu10', 'wahyu@gmail.com', 'admin123', 'admin'),
(2, 'alsa', 'alsa12', 'alsa@gmail.com', 'alsa123', 'pengajar'),
(3, 'sam', 'samm', 'sam@gmail.com', 'sam123', 'pelajar'),
(4, 'firas', 'firrr', 'firas@gmail.com', 'firas123', 'pelajar'),
(5, 'alang', 'alang', 'alang@gmail.com', '12345', 'pelajar'),
(6, 'adhit', 'adit', 'adhit@gmail.com', '3456', 'pelajar'),
(7, 'ryan', 'ryann', 'ryan@gmail.com', '7890', 'pengajar'),
(8, 'islam', 'islam34', 'islam@gmail.com', '12345', 'pengajar');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id_course`);

--
-- Indeks untuk tabel `dokumen`
--
ALTER TABLE `dokumen`
  ADD PRIMARY KEY (`id_doc`),
  ADD KEY `id_course` (`id_course`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `course`
--
ALTER TABLE `course`
  MODIFY `id_course` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `dokumen`
--
ALTER TABLE `dokumen`
  MODIFY `id_doc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
