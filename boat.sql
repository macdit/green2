-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2019 at 09:03 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `boat`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `comment` text NOT NULL,
  `sent_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `address`, `phone`, `email`, `comment`, `sent_date`) VALUES
(16, 'Altered Carbon', '772 New Manchester Hill. Manchester, NH 03102', '603-234-234', 'altered.carbon@hotmail.com', 'Please, I would like to have more information about effective malaria drugs.', '2019-04-23 14:14:24'),
(17, 'Lual Deng', '241 Pine Streete # 347', '603245663', 'lual.deng@hotmail.com', 'I want more health awareness information related.', '2019-04-23 14:36:05'),
(20, 'David Luck', '177 Beech St Apt 2', '6032602408', 'macueidit@gmail.com', 'I would like to like to know if your platform has new features.', '2019-04-23 15:27:12'),
(21, 'Paul Wol', '177 Beech St Apt 2', '6032602408', 'macueidit@gmail.com', 'Could please tell me about the Green Boat platform?', '2019-04-24 06:55:42');

-- --------------------------------------------------------

--
-- Table structure for table `drugs`
--

CREATE TABLE `drugs` (
  `d_id` int(11) NOT NULL,
  `d_name` varchar(300) NOT NULL,
  `d_desc` varchar(500) NOT NULL,
  `d_use` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `drugs`
--

INSERT INTO `drugs` (`d_id`, `d_name`, `d_desc`, `d_use`) VALUES
(1, 'Chloroquine', 'Chloroquine is a medication used to prevent and to treat malaria in areas where malaria is known to be sensitive to its effects. Certain types of malaria, resistant strains, and complicated cases typically require different or additional medication.', 'Malaria '),
(2, 'Malarone', 'Malarone (atovaquone; proguanil hydrochloride) Tablet: For the treatment and prevention of Plasmodium falciparum malaria.', 'Malaria '),
(3, 'ceftriaxone', 'Ceftriaxone is used to treat a wide variety of bacterial infections. Ceftriaxone belongs to a class of drugs known as cephalosporin antibiotics.', 'typhoid'),
(4, 'ciprofloxacin', 'Ciprofloxacin is an antibiotic that is used to treat bacterial infections. It stops the multiplication of bacteria by inhibiting the reproduction and repair of their genetic material (DNA).', 'typhoid'),
(5, 'Rehydration Therapy Kits', 'Oral rehydration salts and, when necessary, intravenous fluids and electrolytes, if administered in a timely manner and in adequate volumes, will reduce fatalities to well under 1% of all patients.', 'cholera '),
(6, 'Doxycycline', 'It can treat and prevent infections. It can also treat rosacea and severe acne, and prevent malaria', 'cholera '),
(7, 'Doxycycline', '', 'malaria'),
(8, 'Primaquine', 'malaria', 'malaria'),
(9, 'Tafenoquine', '', 'malaria'),
(10, 'Malaria_Drug6', '', 'malaria'),
(11, 'Malaria_drug7', '', 'malaria'),
(12, 'Malaria_drug8', '', 'malaria');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `user_id` int(11) NOT NULL,
  `user_first` varchar(256) NOT NULL,
  `user_last` varchar(256) NOT NULL,
  `user_email` varchar(256) NOT NULL,
  `user_uid` varchar(256) NOT NULL,
  `user_pwd` varchar(256) NOT NULL,
  `joined_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`user_id`, `user_first`, `user_last`, `user_email`, `user_uid`, `user_pwd`, `joined_date`) VALUES
(1, 'Macuei', 'Mathiang', 'macueidit@gmail.com', 'johny', '$2y$10$6ApKOjwAh44rLGa5x0cdwOoSd5yrrGisBg5JzdinRxbAUa.YKQCfO', '2019-04-05 16:17:35'),
(2, 'Mary', 'Dut', 'mary.dut@gmail.com', 'mary', '$2y$10$UL4hSdArMNaamSdFEqABOOXRYsiegEvYl6SsafIYI4KOqEv5g1jsi', '2019-04-05 16:17:35'),
(3, 'james', 'Tok', 'james.jok@outlook.com', 'james', '$2y$10$vfGiNGtu4s2m6SZU0e74XuZzkpr9OjSfXtBfvaNQ8SNF92JnTSseO', '2019-04-05 16:17:35'),
(4, 'Tim', 'Doe', 'tim.doe@hotmail.com', 'tim', '$2y$10$8Wvq6kkgurko7Fw6gMzGs.R6FrxMxNmLz84hK7h1fuUHt5ryjpMtO', '2019-04-05 16:17:35'),
(5, 'Oreva', 'Nd', 'orevand@gmail.com', 'oreva', '$2y$10$AbVCZeg3IVEZVXlJxON/IeUzna0h/J.A2.RjCS1kdWaxN/Tsb/SLq', '2019-04-05 16:17:35'),
(9, 'david', 'david', 'david@david.com', 'david', '$2y$10$1oxL64tuCiyRpanegAruyudQFIXpseE4LUKoDIvMdEvnqDUlMqpIC', '2019-04-05 16:17:35'),
(10, 'test', 'test', 'test@test.com', 'test', '$2y$10$og/AToJJ90GLMprR5qj/KeWb.C2khyLcFFnWcTQRwA0iGDcBDyEoW', '2019-04-05 16:17:35'),
(11, 'Atem', 'Doe', 'atemdoe@outlook.com', 'atem', '$2y$10$CisC9/FiG.bb6YdIxeGQpey29swlDktikXfhSdgVnRki85V9LoI9u', '2019-04-05 16:17:35'),
(12, 'John', 'Mac', 'john@outlook.com', 'john', '$2y$10$SFOCzwSf.5RBKeqeqxWc/.E9bJLlSxqFufYZSIm7zO3NX5T9RMlpm', '2019-04-05 16:17:35'),
(13, 'Bol', 'Riing', 'bol@hotmail.com', 'bol', '$2y$10$4/Moi4KGN2Oa3k.hlIKsgOT87QzhQuCaDqWlWNVhnv/J8CoI0Br6O', '2019-04-05 16:17:35'),
(14, 'Bin', 'Aguer', 'bin@gmail.com', 'bin', '$2y$10$W8QfWW2Wy9.lW1UChbsJfedOGaBoI5GZbyei7RMKwoNz4HQ/d9som', '2019-04-05 16:17:35'),
(15, 'bol', 'ring', 'boldit@nud.com', 'bol', '$2y$10$JP.mi6xVHKVl.cE6k.1T3Oq4eCEQJn/uakNLSJu.pDAxZnm8ogqp2', '2019-04-08 15:20:33'),
(16, 'Eddy', 'Tim', 'eddy@gmail.com', 'eddy', '$2y$10$hmIJ2TwyExRbVS8axFMeR.xDQLanNtqbU.7/w6Okm8iMAdX/P5cqS', '2019-04-08 17:54:10'),
(17, 'j', '', '', '', '$2y$10$C0nFPhmPi0yAwNmmrI2ZgOmk3ehVqQg5Cqd1gQb9pO7Urgo.4W9Am', '2019-04-16 22:43:41'),
(18, 'Wol', 'chan', 'wol.chan@tmail.com', 'wol', '$2y$10$IHXbCjVjrkmSWipe3cjEkeY8HlPXekcvVlIiFAqGIMTCy2IoQf0Kq', '2019-04-18 15:31:47'),
(19, 'Handy', 'Taler', 'handy.taler@yahoo.com', 'handy', '$2y$10$PsjxzxG5KCX9cvqSgh4/F.m05FO3Y9xDoK5970hOw9qhdzNQLT7Ke', '2019-04-19 08:14:54'),
(20, 'Mac', 'Mathiang', 'macueidit@mac.com', 'mac', '$2y$10$H2uoD107ldcwVPBtnR4onu8wApzWkk9/crMcCKIE/fIP/Zp5y7S3a', '2019-04-19 17:51:17'),
(21, 'Gaberial', 'Gaberial', 'gaberial@hotmail.com', 'gaberial', '$2y$10$dc1B3sWpo/Q9D4hd1tvEFeZuu1eZNHxJ9TDtVw1en7Ey7YHc8YczO', '2019-04-19 20:35:25'),
(22, 'Lual', 'Complete', 'luald@hotmail.com', 'lual', '$2y$10$AIr6h7SEEr/uJVtSv4x5b.zbCGrp2wYlVsqZ3Xrc3rc58XJ0WtFLi', '2019-04-22 13:10:16'),
(23, 'Mic', 'Pilly', 'mic.pilly@channel0.com', 'mic', '$2y$10$jqXH4jcTF3UiSButEQu1c.MPCdH/rh43rlsYEreU9Qz7HzO//fEGy', '2019-04-22 13:19:35'),
(24, 'Don', 'Remon', 'don.remon@remote.com', 'don', '$2y$10$EwnxDOFiAZEbtFD2Cwru6uwVN5sduXNVmo.ropXnOz1D8Jxgf/Rhe', '2019-04-23 16:39:55'),
(25, 'Jok', 'Tong', 'jok.tong@gmail.com', 'jok', '$2y$10$QWmiqNKI4tQoyzveLTp3HeafHzUHhTvs6BVPRYXY9lsvAPLOaG1sW', '2019-04-23 16:47:15'),
(26, 'wol', 'Kenndy', 'wol@gmail.com', 'wol', '$2y$10$W.zFOQo5fqi.ZULmad6TMervDDf.1n5ar.9A/uqP6wiwDgpswatFS', '2019-04-24 04:54:02');

-- --------------------------------------------------------

--
-- Table structure for table `pharmacies`
--

CREATE TABLE `pharmacies` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(256) NOT NULL,
  `p_address` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pharmacies`
--

INSERT INTO `pharmacies` (`p_id`, `p_name`, `p_address`) VALUES
(1, 'Rite Aid Pharmacy', 'Rite Aid Pharmacy	1631 Elm St, Manchester, NH 03101'),
(2, 'Walmart Pharmacy', 'Walmart pharmacy	1631 Elm St, Manchester, NH 03101'),
(3, 'CVS pharmacy', '1 Cedar Street'),
(4, 'Walgreens Pharmacy', '45 Pine Street, Manchester, NH 03103');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(11) NOT NULL,
  `disease` varchar(255) NOT NULL,
  `mid` int(11) NOT NULL,
  `d_id` int(11) NOT NULL,
  `r_effectiveness` int(11) NOT NULL,
  `r_affordability` int(11) NOT NULL,
  `r_availability` int(11) NOT NULL,
  `p_id` int(11) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `disease`, `mid`, `d_id`, `r_effectiveness`, `r_affordability`, `r_availability`, `p_id`, `created_date`) VALUES
(19, 'malaria', 2, 1, 4, 4, 1, NULL, '0000-00-00 00:00:00'),
(20, 'malaria', 2, 2, 5, 5, 5, NULL, '0000-00-00 00:00:00'),
(29, 'malaria', 2, 2, 1, 3, 3, NULL, '0000-00-00 00:00:00'),
(31, 'malaria', 2, 2, 1, 1, 1, 2, '0000-00-00 00:00:00'),
(32, 'malaria', 2, 2, 1, 1, 1, 2, '0000-00-00 00:00:00'),
(33, 'malaria', 2, 2, 1, 1, 1, 2, '0000-00-00 00:00:00'),
(34, 'malaria', 2, 2, 1, 1, 1, 2, '0000-00-00 00:00:00'),
(35, 'malaria', 2, 2, 1, 1, 1, 2, '0000-00-00 00:00:00'),
(36, 'malaria', 2, 2, 1, 1, 1, 2, '0000-00-00 00:00:00'),
(37, 'malaria', 2, 2, 1, 1, 1, 2, '0000-00-00 00:00:00'),
(38, 'malaria', 2, 2, 1, 1, 1, 2, '0000-00-00 00:00:00'),
(39, 'malaria', 2, 2, 1, 1, 1, 2, '0000-00-00 00:00:00'),
(40, 'malaria', 2, 2, 1, 1, 1, 2, '0000-00-00 00:00:00'),
(41, 'malaria', 2, 2, 1, 1, 1, 2, '0000-00-00 00:00:00'),
(43, 'malaria', 2, 1, 5, 5, 1, 3, '0000-00-00 00:00:00'),
(44, 'malaria', 2, 1, 5, 5, 1, 3, '0000-00-00 00:00:00'),
(45, 'malaria', 2, 1, 5, 5, 1, 3, '0000-00-00 00:00:00'),
(46, 'malaria', 2, 1, 5, 5, 1, 3, '0000-00-00 00:00:00'),
(47, 'malaria', 2, 1, 5, 5, 1, 3, '0000-00-00 00:00:00'),
(48, 'typhoid', 2, 3, 1, 2, 3, 2, '0000-00-00 00:00:00'),
(49, 'typhoid', 2, 3, 1, 2, 3, 2, '0000-00-00 00:00:00'),
(50, 'typhoid', 2, 3, 1, 2, 3, 2, '0000-00-00 00:00:00'),
(51, 'typhoid', 2, 4, 3, 3, 4, 3, '0000-00-00 00:00:00'),
(52, 'typhoid', 2, 4, 3, 3, 4, 3, '0000-00-00 00:00:00'),
(53, 'cholera', 2, 5, 2, 2, 2, 2, '0000-00-00 00:00:00'),
(54, 'cholera', 2, 5, 2, 2, 2, 2, '0000-00-00 00:00:00'),
(55, 'cholera', 2, 6, 4, 1, 3, 2, '0000-00-00 00:00:00'),
(56, 'cholera', 2, 6, 4, 1, 3, 2, '0000-00-00 00:00:00'),
(57, 'malaria', 2, 2, 2, 3, 4, 1, '0000-00-00 00:00:00'),
(58, 'typhoid', 20, 3, 5, 5, 5, 1, '0000-00-00 00:00:00'),
(59, 'malaria', 20, 2, 2, 3, 1, 2, '0000-00-00 00:00:00'),
(60, 'malaria', 21, 2, 1, 1, 5, 4, '0000-00-00 00:00:00'),
(61, 'typhoid', 2, 3, 5, 5, 5, 3, '0000-00-00 00:00:00'),
(62, 'cholera', 2, 6, 1, 1, 1, 4, '2019-04-22 13:51:57'),
(63, 'malaria', 25, 2, 1, 1, 1, 3, '2019-04-23 16:50:11'),
(64, 'cholera', 2, 6, 5, 5, 5, 4, '2019-04-24 04:56:46'),
(65, 'cholera', 2, 6, 1, 2, 3, 1, '2019-04-24 04:57:29'),
(66, 'malaria', 2, 8, 5, 5, 5, 1, '2019-04-24 10:03:34'),
(67, 'malaria', 2, 10, 3, 3, 5, 2, '2019-04-24 10:10:26'),
(68, 'malaria', 2, 11, 3, 5, 3, 2, '2019-04-24 10:10:50'),
(69, 'malaria', 2, 12, 5, 5, 5, 2, '2019-04-24 10:11:18'),
(70, 'typhoid', 9, 4, 2, 2, 4, 3, '2019-04-24 12:25:10'),
(71, 'malaria', 2, 7, 1, 4, 5, 2, '2019-04-29 19:28:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drugs`
--
ALTER TABLE `drugs`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `pharmacies`
--
ALTER TABLE `pharmacies`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mid` (`mid`),
  ADD KEY `d_id` (`d_id`),
  ADD KEY `p_id` (`p_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `drugs`
--
ALTER TABLE `drugs`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `pharmacies`
--
ALTER TABLE `pharmacies`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_ibfk_1` FOREIGN KEY (`mid`) REFERENCES `members` (`user_id`),
  ADD CONSTRAINT `ratings_ibfk_2` FOREIGN KEY (`d_id`) REFERENCES `drugs` (`d_id`),
  ADD CONSTRAINT `ratings_ibfk_3` FOREIGN KEY (`p_id`) REFERENCES `pharmacies` (`p_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
