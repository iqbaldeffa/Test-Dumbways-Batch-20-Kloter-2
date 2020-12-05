-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2020 at 01:51 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_froz`
--

-- --------------------------------------------------------

--
-- Table structure for table `distributor`
--

CREATE TABLE `distributor` (
  `id` int(10) NOT NULL,
  `name` varchar(500) NOT NULL,
  `address` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `distributor`
--

INSERT INTO `distributor` (`id`, `name`, `address`) VALUES
(1, 'M iqbal deffa N', 'Bekasi Utara'),
(2, 'Lazuardi', 'Jakarta Selatan'),
(3, 'Andhinie', 'Bekasi Selatan');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(3) NOT NULL,
  `name_product` varchar(500) NOT NULL,
  `photo` varchar(500) NOT NULL,
  `desc` text NOT NULL,
  `nutrisi` varchar(500) NOT NULL,
  `serving_size` varchar(100) NOT NULL,
  `id_distributor` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name_product`, `photo`, `desc`, `nutrisi`, `serving_size`, `id_distributor`) VALUES
(3, 'Chicken Nugget Jets', '5fcb4998a25d1.png', 'So Good Chicken Nugget JETZ sajian nikmat penggugah selera , diolah dari daging dada ayam pilihan, dan dibalut breadcrumb yang renyah. So Good Chicken Nugget JETZ hidangan kaya protein dengan rasa original yang disukai anak-anak, dengan beragam bentuk pesawat terbang akan memberikan banyak inspirasi kreatif bagi anak saat makan, cocok sebagai camilan dan lauk bagi anak tercinta. So Good Chicken Nugget Jetz diperkaya Omega-3 baik untuk perkembangan otak anak.\r\n\r\nSo Good Chicken Nugget JETZ selalu menjadi pilihan keluarga indonesia.\r\n\r\nBerat bersih : 400g ', 'Lemak Total 12g / 17% Protein 12g / 20% Karbohidrat 17g / 5% Natrium / Sodium 400mg / 27%', '100g ', '2'),
(5, 'Chicken Nugget ANIMAL', '5fcb697126c3d.png', 'So Good Chicken Nugget ANIMAL sajian yang menggugah selera , diolah dari daging dada ayam pilihan, dan bumbu Pizza yang khas, dibalut dengan breadcrumb yang renyah. So Good Chicken Nugget ANIMAL hidangan kaya protein, lezat, dengan bentuk berbagai hewan unik, saat makan anak menjadi sangat menyenangkan, melatih kreativitas serta imaginasi. disukai anak-anak. Cocok sebagai camilan dan lauk anak tercinta.', 'Lemak Total 16 g / 23 %  Protein 14 g / 24 %  Karbohidrat 39 g / 12 %  Natrium / Sodium 420 mg / 28 %', '100g', '1'),
(8, 'Chicken Stick Original', '5fcb777b302a6.png', 'Rasakan kelezatan So Good Chicken Stick Original, dibuat dari daging dada ayam pilihan dengan rasa original yang khas, tekstur yang lembut , aroma yang menggugah selera, dan dibalut breadcrumb renyah. So Good Chicken Stick Original sajian kaya protein yang Lezat, sehat, dan bentuknya yang menyerupai jari sangat cocok untuk dijadikan makanan cemilan kesukaan semua.\r\n\r\nSo Good Chicken Stick original selalu menjadi pilihan keluarga Indonesia.\r\n\r\nBerat bersih : 200g', 'Lemak Total 15 g / 23 %  Protein 15 g / 26 %  Karbohidrat 2 g / 1 %  Natrium / Sodium 460 mg / 31 %', '100g', '3'),
(9, 'Otak Otak', '5fcb77ba55486.png', 'So Good Otak-otak dibuat dari daging ikan pilihan berpadu bumbu berkualitas, memiliki bentuk yang khas, tekstur yang garing dan kenyal menjadikannya pilihan kaya protein yang lezat dan praktis. So Good Otak-Otak bergizi dan aman di konsumsi sebagai cemilan ataupun lauk. Selalu ada alasan untuk menikmati sajian So Good Otak-Otak di segala situasi.\r\n\r\nSo Good Otak-Otak selalu menjadi pilihan keluarga Indonesia.\r\n\r\n400mg', 'Lemak Total 0 g / 0 %  Protein 9 g / 16 %  Karbohidrat 33 g / 10 %  Natrium / Sodium 930 mg / 62 %', '100g', '1'),
(10, 'Chicken Nugget Dinobites ', '5fcb781173d86.png', 'So Good Chicken Nugget DINOBITES sajian yang menggugah selera , diolah dari daging dada ayam pilihan, dan dibalut dengan breadcrumb yang renyah. So Good Chicken Nugget DINOBITES hidangan kaya protein dengan rasa original, lezat dan disukai anak-anak. Bentuk dinosaurus yang playful membuat saat makan anak menjadi semakin menyenangkan, dan melatih kreativitas serta imaginasi. Cocok sebagai camilan dan lauk untuk anak tercinta.\r\n\r\nSo Good Chicken Nugget DINOBITES selalu menjadi pilihan keluarga indonesia.\r\n\r\n\r\nBerat bersih : 400g ', 'Lemak Total 14 g / 21 %  Protein 15 g / 25 %  Karbohidrat 18 g / 6 %  Natrium / Sodium 480 mg / 32 %', '100g ', '2'),
(11, 'Sausage Premium Garlic', '5fcb78469f48e.png', 'Di setiap gigitan So Good Sausage Premium Garlic, terdapat kandungan daging dada ayam yang lebih banyak, dengan bumbu rasa bawang putih yang harum, dan tekstur yang crunchy. Nikmati langsung tanpa periu membuka selongsong sosisnya, dikemas vacuum untuk menjaga bentuk, kesegaran, dan kualitas rasa. Bersiaplah memanjakan lidah dengan kelezatannya.\r\n\r\nSo Good Sausage Premium Garlic selalu menjadi pilihan favorit keluarga Indonesia.\r\n\r\nBerat bersih : 300g', 'Lemak Total 7 g / 10 %  Protein 8 g / 14 %  Karbohidrat 2 g / 0 %  Natrium / Sodium 380 mg / 25 %', '60g', '3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `distributor`
--
ALTER TABLE `distributor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
