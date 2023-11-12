-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 19, 2023 at 11:38 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`id`, `name`, `email`, `password`) VALUES
(1, 'casdc', 'casc', '465465'),
(2, 'vcsdv', 'biswajitbala808@gmail.com', '45454'),
(3, 'rgrweg', 'gre@gmail.com', '454646'),
(4, 'nghn', 'mhy4564@gmail.com', '465465'),
(5, 'fgrg', 'biswajit@gmail.com', 'grtgee'),
(6, 'cds', 'biswajitbala@gmail.com', '123456'),
(7, 'test', 'amitbala@gmail.com', '4564'),
(8, 'testt', 'kalu@gmail.com', '123456'),
(9, 'test user', 'biswajitbala86541568@gmail.com', '454'),
(10, 'teug', 'biswajitbala99@gmail.com', '465465'),
(11, 'Biswajit Bala', 'biswajit454@gmail.com', '123456'),
(12, 'Biswajit Bala', 'biswajitbala883333@gmail.com', '123456'),
(13, 'Biswajit Bala', 'biswajitbala112188@gmail.com', '123456'),
(14, 'Biswajit Bala', 'biswajitbala1000088@gmail.com', '123456'),
(15, 'Biswajit Bala', 'biswajitbala88@gmail.com', '123456'),
(16, 'Biswajit Bala', 'biswajitbala188@gmail.com', '123456'),
(17, 'test', 'hs732086@gmail.com', 'test');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
