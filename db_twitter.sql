-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2017 at 10:47 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_twitter`
--

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `status` text NOT NULL,
  `tgl` date NOT NULL,
  `jam` time NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `email`, `status`, `tgl`, `jam`) VALUES
(11, 'hilman@engineer.com', 'Kesempatan untuk menemukan kekuatan yang lebih baik dalam diri kita muncul ketika hidup terlihat sangat menantang. .', '2017-11-02', '07:11:09'),
(12, 'hilman@mail.com', 'Orang sukses akan mengambil keuntungan dari kesalahan dan mencoba lagi dengan cara yang berbeda. .', '2017-11-02', '07:11:03'),
(13, 'hilman@engineer.com', 'Ini kisah persahabatanku dengan Ozi, yang dimulai sejak pertemuan kami di kelas 3 SMP. Ozi adalah teman main, teman curhat, teman iseng bahkan teman yang sempat membuatku terjatuh dalam hal yang bernama cinta, tapi akhirnya aku dapat menahan semua rasa itu dan menjaga kemurnian persahabatan kami. Seperti yang aku yakini, tak ada yang lebih indah dari sebuah persahabatan.  Pagi ini aku mengayuh sepedaku untuk pergi ke sekolah. Kukayuh sepedaku dengan cepat agar tak terlambat sampai di sekolah. Disela-sela fokusku menatap jalan, dari kejauhan aku melihat sosok yang sangat kukenal. Dia melambaikan tangannya dan mensejajarkan posisinya denganku.', '2017-11-02', '07:11:43');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `pass` varchar(35) NOT NULL,
  `foto` varchar(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `email`, `nama`, `pass`, `foto`) VALUES
(4, 'hilman@engineer.com', 'Hilman Fadillah', 'd8578edf8458ce06fbc5bb76a58c5ca4', '1509615426.jpg'),
(5, 'hilman@mail.com', 'Johnson', '202cb962ac59075b964b07152d234b70', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
