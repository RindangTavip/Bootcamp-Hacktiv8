-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Feb 2024 pada 15.36
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dblatihanform`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `portfolio`
--

CREATE TABLE `portfolio` (
  `portfolioID` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `availability` varchar(50) NOT NULL,
  `age` varchar(20) NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  `pengalaman` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `portfolio`
--

INSERT INTO `portfolio` (`portfolioID`, `nama`, `role`, `availability`, `age`, `lokasi`, `pengalaman`, `email`) VALUES
(1, 'Jackson', 'Back End', 'Full Time', '24', 'Bandung', '5', 'jackson5@gmail.com'),
(2, 'Bruno', 'Front End', 'Full Time', '25', 'Jakarta', '5', 'bruno887@gmail.com'),
(3, 'Dina', 'Front End', 'Full Time', '21', 'Jakarta', '2', 'dina556@gmail.com'),
(4, 'Brian', 'Front End', 'Full Time', '21', 'Jakarta', '5', 'brian078@gmail.com'),
(5, 'Bazuki', 'Back End', 'Full Time', '35', 'Jakarta', '15', 'bazooka558@gmail.com'),
(6, 'Delisa', 'Front End', 'Full Time', '20', 'Jakarta', '2', 'delisa234@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`portfolioID`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `portfolioID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
