-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 19, 2021 at 01:19 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `barber`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

DROP TABLE IF EXISTS `booking`;
CREATE TABLE IF NOT EXISTS `booking` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `cusID` varchar(20) NOT NULL,
  `staffID` varchar(20) NOT NULL,
  `service` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `logDT` datetime NOT NULL,
  `review` varchar(255) NOT NULL,
  `approve` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `cusID`, `staffID`, `service`, `date`, `time`, `logDT`, `review`, `approve`) VALUES
(10, 'Test1', 'Aiman Putra', 'adult', '2021-04-30', '16:30:00', '2021-04-18 16:55:52', '', 1),
(4, 'Customer', 'Aiman Putra', 'adult', '2021-03-30', '19:30:00', '2021-03-29 13:10:54', 'Good Service', 1),
(5, 'Customer', 'Abdul Malik', 'adult', '2021-04-01', '15:30:00', '2021-03-31 07:19:42', '', 1),
(6, 'Customer', 'Aiman Putra', 'kids', '2021-04-01', '19:30:00', '2021-03-31 07:24:39', '', 1),
(8, 'Customer', 'Abdul Malik', 'kids', '2021-04-09', '21:00:00', '2021-03-31 07:28:59', '', 2),
(9, 'Abu', 'Aiman Putra', 'school', '2021-04-09', '20:00:00', '2021-03-31 07:29:41', '', 2),
(11, 'Customer', 'Afiq Haiqal', 'school', '2021-04-30', '12:30:00', '2021-04-29 18:48:00', '', 1),
(12, 'Customer', 'Abdul Malik', 'hairshave', '2021-05-29', '19:30:00', '2021-05-03 23:12:44', '', 1),
(13, 'Thinesh', 'Afiq Haiqal', 'trim', '2021-05-05', '12:00:00', '2021-05-04 01:16:07', '', 2),
(14, 'Thinesh', 'Afiq Haiqal', 'shave', '2021-05-04', '19:00:00', '2021-05-04 14:59:58', 'Hope for good haircut', 1),
(15, 'Thinesh', 'Afiq Haiqal', 'adult', '2021-05-14', '17:00:00', '2021-05-14 16:23:22', '', 1),
(16, 'Customer', 'Aiman Putra', 'school', '2021-05-23', '12:00:00', '2021-05-15 03:26:08', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

DROP TABLE IF EXISTS `event`;
CREATE TABLE IF NOT EXISTS `event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(99) NOT NULL,
  `description` varchar(255) NOT NULL,
  `picture` varchar(99) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `name`, `description`, `picture`) VALUES
(4, 'Get Your Special Promotions Now', 'Book 5 Slots & Get One Free Haircut', 'event1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `username` varchar(99) NOT NULL,
  `star` varchar(99) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `main` int(9) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `username`, `star`, `comment`, `main`) VALUES
(1, 'Customer', '4', 'Nice', 1),
(7, 'Thinesh', '5', 'Well Done', 1),
(9, 'Ahmad', '5', 'Well Treated', 1),
(6, 'Customer', '5', 'Perfect', 1),
(11, 'salim', '5', 'Well Treat', 1),
(13, 'Thinesh', '5', 'Good', 1);

-- --------------------------------------------------------

--
-- Table structure for table `timeslot`
--

DROP TABLE IF EXISTS `timeslot`;
CREATE TABLE IF NOT EXISTS `timeslot` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `time` time NOT NULL,
  `date` date NOT NULL,
  `staff` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timeslot`
--

INSERT INTO `timeslot` (`id`, `time`, `date`, `staff`) VALUES
(1, '19:30:00', '2021-04-01', 'Aiman Putra'),
(2, '19:30:00', '2021-04-01', 'Aiman Putra'),
(3, '21:00:00', '2021-04-09', 'Abdul Malik'),
(4, '20:00:00', '2021-04-09', 'Aiman Putra'),
(5, '16:30:00', '2021-04-30', 'Aiman Putra'),
(6, '12:30:00', '2021-04-30', 'Afiq Haiqal'),
(7, '19:30:00', '2021-05-29', 'Abdul Malik'),
(8, '12:00:00', '2021-05-05', 'Afiq Haiqal'),
(9, '19:00:00', '2021-05-04', 'Afiq Haiqal'),
(10, '17:00:00', '2021-05-14', 'Afiq Haiqal'),
(11, '12:00:00', '2021-05-23', 'Aiman Putra'),
(12, '13:00:00', '2021-05-20', 'Aiman Putra'),
(13, '13:00:00', '2021-05-20', 'Afiq Haiqal');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `Hp` varchar(15) NOT NULL,
  `address` varchar(255) NOT NULL,
  `type_user` varchar(15) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `name`, `email`, `Hp`, `address`, `type_user`) VALUES
('Admin', '123', '', '', '', '', 'Admin'),
('Customer', '123', 'Liew Darren', 'liewdarren@gmail.com', '014287678', 'No 4,\r\nJalan Kampung Pisang, Taman Indah, 33000 Kuala Kangsar', 'Customer'),
('Aiman', '123', 'Aiman Putra', 'aimanputra@gmail.com', '0124316343', 'No 11, Jalan Kanari, Taman Bunga Raya, 33000 Kuala Kangsar.', 'Staff'),
('Ahmad', '123', 'Ahmad', 'Ahmad@gmail.com', '01433253223', 'No 3, Jalan Bun, Taman Bakery 84000 Skudai, Johor Bahru', 'Customer'),
('Salim', '123', 'Salim', 'salim@gmial.com', '017827791', 'NO3 , JALAN CILI, TAMAN KAMPUNG', 'Customer'),
('Afiq', '123', 'Afiq Haiqal', 'afiqhaiqal19@gmail.com', '0124315671', 'No 143, Jalan Merawati 3, Taman Kangsar, 33000 Kuala Kangsar, PeraK Darul Ridzuan', 'Staff'),
('Thinesh', '123', 'Thinesh', 'thinesh@gmail.com', '0124319987', 'No 127, Jalan Talang, Taman Kenari, 33000 Kuala Kangsar, Perak', 'Customer'),
('Abdul Malik', '123', 'Abdul Malik', 'abdulmalik@gmail.com', '0117515884', 'No 11, Lorong 13, Taman Bunga Raya, 33000 Kuala Kangsar, Perak', 'Staff');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
