-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2022 at 08:08 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `words`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1 = Active, 0 = Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `name`, `email`, `password`, `role`, `status`) VALUES
(1, 'Parvez Habib', 'parvezmd082@gmail.com', '3b03edc740ccfcc986f062b00c9e156d8ce9830f', 5, 1),
(2, 'Talha Abdullah', 'talhaabdullah082@gmail.com', '3b03edc740ccfcc986f062b00c9e156d8ce9830f', 5, 1),
(3, 'Farjana Neela', 'farjananeela082@gmail.com', '3b03edc740ccfcc986f062b00c9e156d8ce9830f', 5, 1),
(4, 'Al Amin', 'alamin082@gmail.com', '3b03edc740ccfcc986f062b00c9e156d8ce9830f', 4, 0),
(5, 'Sohidul Islam', 'sohidulislam082@gmail.com', '3b03edc740ccfcc986f062b00c9e156d8ce9830f', 4, 0),
(7, 'Rahman Rocky', 'rahmanrocky082@gmail.com', '3b03edc740ccfcc986f062b00c9e156d8ce9830f', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `words`
--

CREATE TABLE `words` (
  `wId` int(11) NOT NULL,
  `word` varchar(256) NOT NULL,
  `meaning` varchar(256) NOT NULL,
  `synonym` varchar(256) NOT NULL,
  `antonym` varchar(256) NOT NULL,
  `user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `words`
--

INSERT INTO `words` (`wId`, `word`, `meaning`, `synonym`, `antonym`, `user`) VALUES
(1, 'Abate', '??????????????? ?????????', 'Decrease, Reduce, Diminish, Lessen', 'Intensify, Enhance, Increase', 1),
(2, 'Absolute', '?????????', 'Flawless, Unmitigated, Despotic, Immaculate, Peremptory', 'Abridged, Democratic, Dubious', 1),
(3, 'Absurd', '????????????????????????', 'Unreasonable, Illogical', 'Reasonable, Sensible, Cautious', 1),
(4, 'Abundant', '??????????????????', 'Plentiful, Profuse, Copious, Luxuriant, Ample', 'Scarce, Paucity, Meager, Insufficient, Exiguous', 1),
(5, 'Accumulate', '??????????????????????????? ?????????', 'Heap, Consolidate, Amass, Muster, Assemble, Gather, Blend', 'Scatter, Disperse', 1),
(6, 'Admire', '????????????????????????', 'Respect, Praise, Esteem, Appreciate, Laud, Praise', 'Criticize, Bellyache, Contempt, Denounce', 1),
(7, 'Adulterate', '??????????????? ', 'Contaminate, Sully, Blacken, Spoil, Pollute', 'Purify, Cleanse', 1),
(8, 'Accuse', '????????????????????????', 'Impeach, Indict, Incriminate, Denounce', 'Exonerate, Acquit, Exculpate', 1),
(9, 'Adept', '????????????????????????', 'Skillful, Expert, Cleaver, Master, Competent', 'Inept, Unskilled, Clumsy, Awkward', 1),
(10, 'Ambition', '??????????????????????????????????????? ', 'Aspiration, Objective, Longing, Ardour', 'Aversion, Apathy, Repulsion', 1),
(12, 'Annoy', '???????????? ???????????????', 'Disturb, Aggravate, Irritate', 'Calm, Please', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `words`
--
ALTER TABLE `words`
  ADD PRIMARY KEY (`wId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `words`
--
ALTER TABLE `words`
  MODIFY `wId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
