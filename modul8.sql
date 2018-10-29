-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Okt 2018 pada 15.49
-- Versi server: 10.1.35-MariaDB
-- Versi PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `modul8`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurnal`
--

CREATE TABLE `jurnal` (
  `nama` varchar(25) NOT NULL,
  `nim` char(10) NOT NULL,
  `kelas` varchar(6) NOT NULL,
  `hobi` varchar(10) NOT NULL,
  `genre` enum('Horror','Anime','Action','Drama') NOT NULL,
  `wisata` enum('Bali','Tanjung Selor','Jakarta','Lombok') NOT NULL,
  `tgl` date NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jurnal`
--

INSERT INTO `jurnal` (`nama`, `nim`, `kelas`, `hobi`, `genre`, `wisata`, `tgl`, `username`, `email`, `password`, `foto`) VALUES
(' M. Dava Fachrulah', '6701172222', 'd3mi45', ' makan', 'Action', 'Bali', '2018-10-29', 'davafachrulah', 'davafachrulah@gmail.com', 'dava123', 'icon.png'),
(' Devi Fildzania', '6701171052', 'd3mi41', ' nobar', 'Drama', 'Lombok', '2018-10-27', 'devifildzania', 'delafildzania76@gmail.com', ' devi456', ' v.jpg'),
(' Dewi Nurhasanah', '6701173344', 's1ab41', ' makan', 'Horror', 'Tanjung Selor', '2018-10-22', 'dewinurhasanah', 'dewinurhasanah@gmail.com', 'dewi123', 'icon.png');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jurnal`
--
ALTER TABLE `jurnal`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
