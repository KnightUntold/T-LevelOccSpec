-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Aug 21, 2025 at 10:00 AM
-- Server version: 8.0.40
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doctored`
--

-- --------------------------------------------------------

--
-- Table structure for table `daysfordays`
--

CREATE TABLE `daysfordays` (
  `id` int NOT NULL,
  `days` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `daysfordays`
--

INSERT INTO `daysfordays` (`id`, `days`) VALUES
(0, 'Sunday'),
(1, 'Monday'),
(2, 'Tuesday'),
(3, 'Wednesday'),
(4, 'Thursday'),
(5, 'Friday'),
(6, 'Saturday');

-- --------------------------------------------------------

--
-- Table structure for table `daysfordoctors`
--

CREATE TABLE `daysfordoctors` (
  `id` int NOT NULL,
  `doctors_id` int NOT NULL,
  `days_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `daysfordoctors`
--

INSERT INTO `daysfordoctors` (`id`, `doctors_id`, `days_id`) VALUES
(1, 1, 3),
(2, 1, 5),
(3, 1, 0),
(4, 2, 1),
(5, 2, 2),
(6, 2, 4),
(7, 3, 2),
(8, 3, 5),
(9, 3, 6),
(10, 4, 3),
(11, 4, 6),
(12, 4, 0),
(13, 5, 3),
(14, 5, 4),
(15, 5, 5),
(16, 6, 1),
(17, 6, 2),
(18, 6, 4),
(19, 7, 4),
(20, 7, 5),
(21, 7, 0),
(22, 8, 1),
(23, 8, 3),
(24, 8, 6),
(25, 9, 1),
(26, 9, 5),
(27, 9, 0),
(28, 10, 2),
(29, 10, 3),
(30, 10, 4),
(31, 11, 1),
(32, 11, 3),
(33, 11, 6);

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `ID` int NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Speciality` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`ID`, `Name`, `Speciality`) VALUES
(1, 'Dr. William Afton', 'Pediatrician'),
(2, 'Dr. Faris Caldwell', 'Pediatrician'),
(3, 'Dr. Liberty Mann', 'Pediatrician'),
(4, 'Dr. Paul Morton', 'GP'),
(5, 'Dr. Nannie Bishop', 'GP'),
(6, 'Dr. Fleur Glass', 'GP'),
(7, 'Dr. Callum Suarez', 'GP'),
(8, 'Dr. Damon Fowler', 'GP'),
(9, 'Dr. Alexia 0\'Quinn', 'GP'),
(10, 'Dr. Ameer Davidson', 'GP'),
(11, 'Dr. Kirsty Miller', 'GP');

-- --------------------------------------------------------

--
-- Table structure for table `patient_data`
--

CREATE TABLE `patient_data` (
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `app_date` date NOT NULL,
  `app_time` time NOT NULL,
  `doctor` varchar(50) NOT NULL,
  `query` varchar(500) NOT NULL,
  `Time_Booked` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `patient_data`
--

INSERT INTO `patient_data` (`first_name`, `last_name`, `email`, `phone`, `app_date`, `app_time`, `doctor`, `query`, `Time_Booked`) VALUES
('RWR', 'RGWR', 'RGWRG@FGRWG.COM', '452454252452', '2025-07-09', '03:02:00', 'Dr. Damon Fowler', '442424TTRGFVDFGDF', '0000-00-00 00:00:00'),
('test', 'test', 'test@test.co.uk', '63524453634', '2025-07-23', '23:04:00', 'Dr. Liberty Mann', 'test', '0000-00-00 00:00:00'),
('test', 'test', 'test@test.co.uk', '63524453634', '2025-07-23', '23:04:00', 'Dr. Liberty Mann', 'test', '0000-00-00 00:00:00'),
('test', 'test', 'test@test.co.uk', '63524453634', '2025-07-23', '23:04:00', 'Dr. Liberty Mann', 'test', '0000-00-00 00:00:00'),
('test', 'test', 'test@test.co.uk', '63524453634', '2025-07-23', '23:04:00', 'Dr. Liberty Mann', 'test', '0000-00-00 00:00:00'),
('freddy', 'fazbear', 'horhorhorhorhor@gmail.com', '183345245245', '2025-07-18', '23:32:00', 'Dr. William Afton', 'am dead', '0000-00-00 00:00:00'),
('fred', 'parrot', 'fredparrot@gmail.com', '5356355465', '2026-09-17', '02:10:00', 'Dr. Damon Fowler', 'headache', '0000-00-00 00:00:00'),
('fred', 'parrot', 'fredparrot@gmail.com', '5356355465', '2026-09-17', '02:10:00', 'Dr. Damon Fowler', 'headache', '0000-00-00 00:00:00'),
('harrison', 'greg', 'harrygreg@yahoo.com', '78868684676546', '2025-09-20', '23:02:00', '5', 'my eyes fell out and I&#39;ve accidentally put them in the blender because I couldn&#39;t see what i was doing and I accidentally blended up my eyes and drank them instead of my strawberries', '0000-00-00 00:00:00'),
('steven', 'universe', 'stevenuniverse@crystalgems.com', '84534267654', '2025-07-22', '03:04:00', '11', 'I&#39;ve never been to a doctor before in my life and need a checkup', '0000-00-00 00:00:00'),
('shelly', 'shell', 'fossils@gmail.com', '425643234', '2025-08-22', '23:05:00', 'Dr. Damon Fowler', 'I am a shell', '0000-00-00 00:00:00'),
('hunter', 'smith', 'karensmith@yahoo.com', '46576876543', '2025-03-29', '23:54:00', 'Dr. William Afton', 'my son hunter has a tummy ache and needs help immediately!!!!!!!!!!!!!!!!!', '0000-00-00 00:00:00'),
('hunter', 'smith', 'karensmith@yahoo.com', '46576876543', '2025-03-29', '23:54:00', 'Dr. William Afton', 'my son hunter has a tummy ache and needs help immediately!!!!!!!!!!!!!!!!!', '0000-00-00 00:00:00'),
('hunter', 'smith', 'karensmith@yahoo.com', '46576876543', '2025-03-29', '23:54:00', 'Dr. William Afton', 'my son hunter has a tummy ache and needs help immediately!!!!!!!!!!!!!!!!!', '0000-00-00 00:00:00'),
('hunter', 'smith', 'karensmith@yahoo.com', '46576876543', '2025-03-29', '23:54:00', 'Dr. William Afton', 'my son hunter has a tummy ache and needs help immediately!!!!!!!!!!!!!!!!!', '0000-00-00 00:00:00'),
('hunter', 'smith', 'karensmith@yahoo.com', '46576876543', '2025-03-29', '23:54:00', 'Dr. William Afton', 'my son hunter has a tummy ache and needs help immediately!!!!!!!!!!!!!!!!!', '0000-00-00 00:00:00'),
('hunter', 'smith', 'karensmith@yahoo.com', '46576876543', '2025-03-29', '23:54:00', 'Dr. William Afton', 'my son hunter has a tummy ache and needs help immediately!!!!!!!!!!!!!!!!!', '0000-00-00 00:00:00'),
('gnhgrdcvbg', 'btrwsvbgerwe', 'rsgvhjrkexjhvnbfsjkjmfd@gfdsadfgres.com', '', '2025-07-17', '05:01:00', 'Dr. William Afton', 'fdgfhjklkjhgvcfgvhyujikjiuhyghuijjhbujnhttytrewrgt54ewfgt54wftrered', '0000-00-00 00:00:00'),
('56132therwsdvgf', 'geadscxvgtwreadsf', 'dfgtredfgtre@fgrqwesda.com', '45676543456543', '2025-07-18', '23:05:00', 'Dr. Callum Suarez', 'yt645rewdfghyt5t4redwfgtred&#13;&#10;', '0000-00-00 00:00:00'),
('rterr', 'gqewrgtr2', 'rgtrqwegtr1e@fdfbgdfe.com', '', '2025-07-15', '23:02:00', 'Dr. William Afton', 'hgrfgfrfbvfe3rtghtredfgtredftrd', '0000-00-00 00:00:00'),
('wfwf', 'fwwrwrf', 'fwrfwrgrw@frwf2.com', '0534234564324', '2025-07-15', '23:03:00', 'Dr. William Afton', 'vfvsdeffbvfv', '0000-00-00 00:00:00'),
('wfwf', 'fwwrwrf', 'fwrfwrgrw@frwf2.com', '0534234564324', '2025-07-15', '23:03:00', 'Dr. William Afton', 'vfvsdeffbvfv', '0000-00-00 00:00:00'),
('rterr', 'gqewrgtr2', 'rgtrqwegtr1e@fdfbgdfe.com', '', '2025-07-15', '23:02:00', 'Dr. William Afton', 'hgrfgfrfbvfe3rtghtredfgtredftrd', '0000-00-00 00:00:00'),
('rterr', 'gqewrgtr2', 'rgtrqwegtr1e@fdfbgdfe.com', '', '2025-07-15', '23:02:00', 'Dr. William Afton', 'hgrfgfrfbvfe3rtghtredfgtredftrd', '0000-00-00 00:00:00'),
('FGSDBFSD', 'FHHFSMNJ', 'KJLGKHFDRSHTEAGWq@hgdhdgasd.com', '', '2025-07-19', '03:04:00', 'Dr. William Afton', 'mhgfrgmnhgrthgnh', '0000-00-00 00:00:00'),
('summer', 'wall', 'no@gmail.com', '3565432345323', '0001-01-01', '00:00:00', 'Dr. Callum Suarez', 'am stuck in the past help', '2025-07-10 09:17:53'),
('cody', 'elf', 'codyelf@gmail.com', '46753467', '0745-12-07', '04:03:00', 'Dr. William Afton', 'stuck in the past&#13;&#10;', '2025-07-10 09:19:42'),
('theza', 'treacle', 'trfeh3gfef@gtefa.com', '24567556453', '0007-07-08', '03:54:00', 'Dr. Alexia 0&#39;Quinn', 'treacle in my eyes', '2025-07-10 09:21:38'),
('theza', 'treacle', 'trfeh3gfef@gtefa.com', '24567556453', '0007-07-08', '03:54:00', 'Dr. Alexia 0&#39;Quinn', 'treacle in my eyes', '2025-07-10 10:23:28'),
('theza', 'treacle', 'trfeh3gfef@gtefa.com', '24567556453', '0007-07-08', '03:54:00', 'Dr. Alexia 0&#39;Quinn', 'treacle in my eyes', '2025-07-10 14:36:57'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '1997-10-31', '03:47:00', 'Dr. Callum Suarez', 'AAAAAAAAAA', '2025-07-10 14:49:08'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '1997-10-31', '03:47:00', 'Dr. Callum Suarez', 'AAAAAAAAAA', '2025-07-10 14:57:49'),
('enter', 'my database', 'hi@gtgth.com', '35654334565', '2025-07-22', '05:04:00', 'Dr. Fleur Glass', 'hi', '2025-07-11 09:01:09'),
('summer', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-08-01', '17:29:00', '3', 'code broke send help', '2025-07-30 14:29:36'),
('summer', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-08-01', '17:29:00', '3', 'code broke send help', '2025-07-30 14:34:59'),
('summer', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-08-01', '17:29:00', '3', 'code broke send help', '2025-07-30 14:35:29'),
('summer', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-08-01', '17:29:00', '3', 'code broke send help', '2025-07-30 14:35:49'),
('summer', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-08-01', '17:29:00', '3', 'code broke send help', '2025-07-30 14:51:22'),
('summer', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-08-01', '17:29:00', '3', 'code broke send help', '2025-07-30 14:52:34'),
('summer', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-08-01', '17:29:00', '3', 'code broke send help', '2025-07-30 14:53:03'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-18', '13:36:00', '7', 'kljhq', '2025-07-31 08:36:25'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-18', '13:36:00', '7', 'kljhq', '2025-07-31 10:05:00'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-17', '11:10:00', '7', 'hgtfrdewsqa', '2025-07-31 10:05:44'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-17', '11:10:00', '7', 'hgtfrdewsqa', '2025-07-31 10:27:21'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-17', '11:10:00', '7', 'hgtfrdewsqa', '2025-07-31 10:30:00'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-17', '11:10:00', '7', 'hgtfrdewsqa', '2025-07-31 10:31:50'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-17', '11:10:00', '7', 'hgtfrdewsqa', '2025-07-31 10:47:20'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-17', '11:10:00', '7', 'hgtfrdewsqa', '2025-07-31 10:48:02'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-17', '11:10:00', '7', 'hgtfrdewsqa', '2025-07-31 10:50:30'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-17', '11:10:00', '7', 'hgtfrdewsqa', '2025-07-31 10:51:13'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-17', '11:10:00', '7', 'hgtfrdewsqa', '2025-07-31 10:51:15'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-17', '11:10:00', '7', 'hgtfrdewsqa', '2025-07-31 10:51:15'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-17', '11:10:00', '7', 'hgtfrdewsqa', '2025-07-31 10:51:15'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-17', '11:10:00', '7', 'hgtfrdewsqa', '2025-07-31 10:51:15'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-17', '11:10:00', '7', 'hgtfrdewsqa', '2025-07-31 10:51:16'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-17', '11:10:00', '7', 'hgtfrdewsqa', '2025-07-31 10:51:16'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-17', '11:10:00', '7', 'hgtfrdewsqa', '2025-07-31 10:51:16'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-17', '11:10:00', '7', 'hgtfrdewsqa', '2025-07-31 10:51:16'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-17', '11:10:00', '7', 'hgtfrdewsqa', '2025-07-31 10:51:16'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-17', '11:10:00', '7', 'hgtfrdewsqa', '2025-07-31 10:51:17'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-17', '11:10:00', '7', 'hgtfrdewsqa', '2025-07-31 10:51:17'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-17', '11:10:00', '7', 'hgtfrdewsqa', '2025-07-31 10:51:17'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-17', '11:10:00', '7', 'hgtfrdewsqa', '2025-07-31 10:51:17'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-17', '11:10:00', '7', 'hgtfrdewsqa', '2025-07-31 10:51:17'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-17', '11:10:00', '7', 'hgtfrdewsqa', '2025-07-31 10:51:18'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-17', '11:10:00', '7', 'hgtfrdewsqa', '2025-07-31 10:51:18'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-17', '11:10:00', '7', 'hgtfrdewsqa', '2025-07-31 10:51:18'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-17', '11:10:00', '7', 'hgtfrdewsqa', '2025-07-31 10:51:55'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-17', '11:10:00', '7', 'hgtfrdewsqa', '2025-07-31 10:52:17'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-17', '11:10:00', '7', 'hgtfrdewsqa', '2025-07-31 10:52:26'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-17', '11:10:00', '7', 'hgtfrdewsqa', '2025-07-31 10:52:26'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-17', '11:10:00', '7', 'hgtfrdewsqa', '2025-07-31 10:52:26'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-17', '11:10:00', '7', 'hgtfrdewsqa', '2025-07-31 10:52:26'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-17', '11:10:00', '7', 'hgtfrdewsqa', '2025-07-31 10:52:27'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-17', '11:10:00', '7', 'hgtfrdewsqa', '2025-07-31 10:52:27'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-17', '11:10:00', '7', 'hgtfrdewsqa', '2025-07-31 10:52:27'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-17', '11:10:00', '7', 'hgtfrdewsqa', '2025-07-31 10:52:27'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-17', '11:10:00', '7', 'hgtfrdewsqa', '2025-07-31 10:52:27'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-17', '11:10:00', '7', 'hgtfrdewsqa', '2025-07-31 10:52:28'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-17', '11:10:00', '7', 'hgtfrdewsqa', '2025-07-31 10:52:28'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-17', '11:10:00', '7', 'hgtfrdewsqa', '2025-07-31 10:52:28'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-17', '11:10:00', '7', 'hgtfrdewsqa', '2025-07-31 10:52:28'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-17', '11:10:00', '7', 'hgtfrdewsqa', '2025-07-31 10:52:28'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-17', '11:10:00', '7', 'hgtfrdewsqa', '2025-07-31 10:52:29'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-17', '11:10:00', '7', 'hgtfrdewsqa', '2025-07-31 10:52:29'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-17', '11:10:00', '7', 'hgtfrdewsqa', '2025-07-31 10:52:29'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-17', '11:10:00', '7', 'hgtfrdewsqa', '2025-07-31 10:52:29'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-17', '11:10:00', '7', 'hgtfrdewsqa', '2025-07-31 10:52:30'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-17', '11:10:00', '7', 'hgtfrdewsqa', '2025-07-31 10:52:31'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-17', '11:10:00', '7', 'hgtfrdewsqa', '2025-07-31 10:52:31'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-17', '11:10:00', '7', 'hgtfrdewsqa', '2025-07-31 10:52:31'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-17', '11:10:00', '7', 'hgtfrdewsqa', '2025-07-31 10:52:31'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-17', '11:10:00', '7', 'hgtfrdewsqa', '2025-07-31 10:52:32'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-17', '11:10:00', '7', 'hgtfrdewsqa', '2025-07-31 10:52:32'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-17', '11:10:00', '7', 'hgtfrdewsqa', '2025-07-31 10:52:32'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-17', '11:10:00', '7', 'hgtfrdewsqa', '2025-07-31 10:52:32'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-17', '11:10:00', '7', 'hgtfrdewsqa', '2025-07-31 10:52:33'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-17', '11:10:00', '7', 'hgtfrdewsqa', '2025-07-31 10:52:52'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-17', '11:10:00', '7', 'hgtfrdewsqa', '2025-07-31 10:52:52'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-17', '11:10:00', '7', 'hgtfrdewsqa', '2025-07-31 10:52:52'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-17', '11:10:00', '7', 'hgtfrdewsqa', '2025-07-31 10:52:52'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-17', '11:10:00', '7', 'hgtfrdewsqa', '2025-07-31 10:52:53'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-17', '11:10:00', '7', 'hgtfrdewsqa', '2025-07-31 10:52:53'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-17', '11:10:00', '7', 'hgtfrdewsqa', '2025-07-31 10:52:53'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-17', '11:10:00', '7', 'hgtfrdewsqa', '2025-07-31 10:52:53'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-17', '11:10:00', '7', 'hgtfrdewsqa', '2025-07-31 10:53:00'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-17', '11:10:00', '7', 'hgtfrdewsqa', '2025-07-31 10:57:08'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-17', '11:10:00', '7', 'hgtfrdewsqa', '2025-07-31 10:57:42'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-14', '05:59:00', '1', '3543ehfnhtrf', '2025-07-31 10:58:42'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-14', '05:59:00', '1', '3543ehfnhtrf', '2025-07-31 10:59:14'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-14', '04:56:00', 'Dr. William Afton', 'mjytthjuy5rjyu654t', '2025-07-31 10:59:43'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-14', '04:56:00', 'Dr. William Afton', 'mjytthjuy5rjyu654t', '2025-07-31 11:07:29'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-14', '04:56:00', 'Dr. William Afton', 'mjytthjuy5rjyu654t', '2025-07-31 11:17:03'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-14', '04:56:00', 'Dr. William Afton', 'mjytthjuy5rjyu654t', '2025-07-31 11:19:01'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-14', '04:56:00', 'Dr. William Afton', 'mjytthjuy5rjyu654t', '2025-07-31 11:19:35'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-14', '04:56:00', 'Dr. William Afton', 'mjytthjuy5rjyu654t', '2025-07-31 11:20:42'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-14', '04:56:00', 'Dr. William Afton', 'mjytthjuy5rjyu654t', '2025-07-31 11:21:05'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-14', '04:56:00', 'Dr. William Afton', 'mjytthjuy5rjyu654t', '2025-07-31 11:21:05'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-14', '04:56:00', 'Dr. William Afton', 'mjytthjuy5rjyu654t', '2025-07-31 11:21:05'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-14', '04:56:00', 'Dr. William Afton', 'mjytthjuy5rjyu654t', '2025-07-31 11:21:06'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-14', '04:56:00', 'Dr. William Afton', 'mjytthjuy5rjyu654t', '2025-07-31 11:21:06'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-14', '04:56:00', 'Dr. William Afton', 'mjytthjuy5rjyu654t', '2025-07-31 11:21:06'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-14', '04:56:00', 'Dr. William Afton', 'mjytthjuy5rjyu654t', '2025-07-31 11:21:06'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-14', '04:56:00', 'Dr. William Afton', 'mjytthjuy5rjyu654t', '2025-07-31 11:21:06'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-14', '04:56:00', 'Dr. William Afton', 'mjytthjuy5rjyu654t', '2025-07-31 11:21:07'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-14', '04:56:00', 'Dr. William Afton', 'mjytthjuy5rjyu654t', '2025-07-31 11:21:07'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-14', '04:56:00', 'Dr. William Afton', 'mjytthjuy5rjyu654t', '2025-07-31 11:21:50'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-14', '04:56:00', 'Dr. William Afton', 'mjytthjuy5rjyu654t', '2025-07-31 11:25:33'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-14', '04:56:00', 'Dr. William Afton', 'mjytthjuy5rjyu654t', '2025-07-31 11:25:54'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-14', '04:56:00', 'Dr. William Afton', 'mjytthjuy5rjyu654t', '2025-07-31 11:25:54'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-14', '04:56:00', 'Dr. William Afton', 'mjytthjuy5rjyu654t', '2025-07-31 11:25:54'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-14', '04:56:00', 'Dr. William Afton', 'mjytthjuy5rjyu654t', '2025-07-31 11:25:54'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-14', '04:56:00', 'Dr. William Afton', 'mjytthjuy5rjyu654t', '2025-07-31 11:25:54'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-14', '04:56:00', 'Dr. William Afton', 'mjytthjuy5rjyu654t', '2025-07-31 11:25:55'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-14', '04:56:00', 'Dr. William Afton', 'mjytthjuy5rjyu654t', '2025-07-31 11:25:55'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-14', '04:56:00', 'Dr. William Afton', 'mjytthjuy5rjyu654t', '2025-07-31 11:25:55'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-14', '04:56:00', 'Dr. William Afton', 'mjytthjuy5rjyu654t', '2025-07-31 11:25:55'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-14', '04:56:00', 'Dr. William Afton', 'mjytthjuy5rjyu654t', '2025-07-31 11:25:55'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-14', '04:56:00', 'Dr. William Afton', 'mjytthjuy5rjyu654t', '2025-07-31 11:25:56'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-14', '04:56:00', 'Dr. William Afton', 'mjytthjuy5rjyu654t', '2025-07-31 11:25:57'),
('uyetwr', 'yutrew', 'kjyhdsf@gmail.com', '43546764753642', '2025-07-22', '12:30:00', 'Please Select a doctor', 'hjtherwgetqrwe', '2025-07-31 11:27:06'),
('uyetwr', 'yutrew', 'kjyhdsf@gmail.com', '43546764753642', '2025-07-22', '12:30:00', 'Please Select a doctor', 'hjtherwgetqrwe', '2025-07-31 11:33:23'),
('uyetwr', 'yutrew', 'kjyhdsf@gmail.com', '43546764753642', '2025-07-22', '12:30:00', 'Please Select a doctor', 'hjtherwgetqrwe', '2025-07-31 11:33:25'),
('uyetwr', 'yutrew', 'kjyhdsf@gmail.com', '43546764753642', '2025-07-22', '12:30:00', 'Please Select a doctor', 'hjtherwgetqrwe', '2025-07-31 11:33:52'),
('uyetwr', 'yutrew', 'kjyhdsf@gmail.com', '43546764753642', '2025-07-22', '12:30:00', 'Please Select a doctor', 'hjtherwgetqrwe', '2025-07-31 11:34:09'),
('uyetwr', 'yutrew', 'kjyhdsf@gmail.com', '43546764753642', '2025-07-22', '12:30:00', 'Please Select a doctor', 'hjtherwgetqrwe', '2025-07-31 11:35:17'),
('uyetwr', 'yutrew', 'kjyhdsf@gmail.com', '43546764753642', '2025-07-22', '12:30:00', 'Please Select a doctor', 'hjtherwgetqrwe', '2025-07-31 11:35:40'),
('uyetwr', 'yutrew', 'kjyhdsf@gmail.com', '43546764753642', '2025-07-22', '12:30:00', 'Please Select a doctor', 'hjtherwgetqrwe', '2025-07-31 11:35:41'),
('uyetwr', 'yutrew', 'kjyhdsf@gmail.com', '43546764753642', '2025-07-22', '12:30:00', 'Please Select a doctor', 'hjtherwgetqrwe', '2025-07-31 11:37:39'),
('uyetwr', 'yutrew', 'kjyhdsf@gmail.com', '43546764753642', '2025-07-22', '12:30:00', 'Please Select a doctor', 'hjtherwgetqrwe', '2025-07-31 11:40:36'),
('uyetwr', 'yutrew', 'kjyhdsf@gmail.com', '43546764753642', '2025-07-22', '12:30:00', 'Please Select a doctor', 'hjtherwgetqrwe', '2025-07-31 11:41:01'),
('uyetwr', 'yutrew', 'kjyhdsf@gmail.com', '43546764753642', '2025-07-22', '12:30:00', 'Please Select a doctor', 'hjtherwgetqrwe', '2025-07-31 11:41:44'),
('uyetwr', 'yutrew', 'kjyhdsf@gmail.com', '43546764753642', '2025-07-22', '12:30:00', 'Please Select a doctor', 'hjtherwgetqrwe', '2025-07-31 11:47:26'),
('uyetwr', 'yutrew', 'kjyhdsf@gmail.com', '43546764753642', '2025-07-22', '12:30:00', 'Please Select a doctor', 'hjtherwgetqrwe', '2025-07-31 11:49:02'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-12', '12:51:00', 'Dr. Liberty Mann', 'uyitukrjyhyt', '2025-07-31 11:49:33'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-12', '12:51:00', 'Dr. Liberty Mann', 'uyitukrjyhyt', '2025-07-31 13:26:20'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-12', '12:51:00', 'Dr. Liberty Mann', 'uyitukrjyhyt', '2025-07-31 13:32:17'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-12', '12:51:00', 'Dr. Liberty Mann', 'uyitukrjyhyt', '2025-07-31 13:32:33'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-12', '12:51:00', 'Dr. Liberty Mann', 'uyitukrjyhyt', '2025-07-31 13:33:26'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-12', '12:51:00', 'Dr. Liberty Mann', 'uyitukrjyhyt', '2025-07-31 13:47:06'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-12', '12:51:00', 'Dr. Liberty Mann', 'uyitukrjyhyt', '2025-07-31 13:47:43'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-12', '12:51:00', 'Dr. Liberty Mann', 'uyitukrjyhyt', '2025-07-31 13:50:00'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-12', '12:51:00', 'Dr. Liberty Mann', 'uyitukrjyhyt', '2025-07-31 13:53:58'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-12', '12:51:00', 'Dr. Liberty Mann', 'uyitukrjyhyt', '2025-07-31 13:54:14'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-12', '12:51:00', 'Dr. Liberty Mann', 'uyitukrjyhyt', '2025-07-31 14:15:09'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-21', '00:20:00', 'Dr. Damon Fowler', 'help me', '2025-07-31 14:19:24'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-21', '00:20:00', 'Dr. Damon Fowler', 'help me', '2025-07-31 14:23:13'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '654345676543', '2025-07-21', '00:20:00', 'Dr. Damon Fowler', 'help me', '2025-07-31 14:23:42'),
('freddy', 'kruger', 'kjyhdsf@gmail.com', '654345676543', '2025-08-13', '17:00:00', 'Dr. William Afton', 'jytrgbtr', '2025-08-01 08:55:22'),
('freddy', 'kruger', 'kjyhdsf@gmail.com', '654345676543', '2025-08-13', '17:00:00', 'Dr. William Afton', 'jytrgbtr', '2025-08-01 08:56:21'),
('summer', 'yutrew', 'kjyhdsf@gmail.com', '43546764753642', '2025-08-12', '15:48:00', 'Dr. Ameer Davidson', 'lhkjhgsfhjlkj.h,gjfd', '2025-08-01 08:57:13'),
('bhjbh', 'jhkl', 'kjyhdsf@gmail.com', '654345676543', '2025-08-13', '12:58:00', 'Dr. Nannie Bishop', 'hmfgjdhfsgaf', '2025-08-01 08:58:26'),
('bhjbh', 'jhkl', 'kjyhdsf@gmail.com', '654345676543', '2025-08-13', '12:58:00', 'Dr. Nannie Bishop', 'hmfgjdhfsgaf', '2025-08-01 09:49:07'),
('bhjbh', 'jhkl', 'kjyhdsf@gmail.com', '654345676543', '2025-08-13', '12:58:00', 'Dr. Nannie Bishop', 'hmfgjdhfsgaf', '2025-08-01 09:49:24'),
('bhjbh', 'jhkl', 'kjyhdsf@gmail.com', '654345676543', '2025-08-13', '12:58:00', 'Dr. Nannie Bishop', 'hmfgjdhfsgaf', '2025-08-01 09:49:32'),
('bhjbh', 'jhkl', 'kjyhdsf@gmail.com', '654345676543', '2025-08-13', '12:58:00', 'Dr. Nannie Bishop', 'hmfgjdhfsgaf', '2025-08-01 09:54:07'),
('iukjytr4', 'kjhgftfre', 'kjyhdsf@gmail.com', '654345676543', '2025-08-22', '11:00:00', 'Dr. Nannie Bishop', 'mhkjgfdrse', '2025-08-01 10:32:17'),
('bhjbh', 'yutrew', 'hello@etempa.co.uk', '654345676543', '2025-08-01', '11:30:00', 'Dr. Callum Suarez', 'ghgfds', '2025-08-05 12:34:03'),
('bhjbh', 'yutrew', 'hello@etempa.co.uk', '654345676543', '2025-08-01', '11:30:00', 'Dr. Callum Suarez', 'ghgfds', '2025-08-05 12:37:11'),
('bhjbh', 'yutrew', 'hello@etempa.co.uk', '654345676543', '2025-08-01', '11:30:00', 'Dr. Callum Suarez', 'ghgfds', '2025-08-05 12:48:48'),
('bhjbh', 'yutrew', 'kjyhdsf@gmail.com', '654345676543', '0003-05-04', '14:30:00', 'Dr. Damon Fowler', 'juy654erfg', '2025-08-05 12:49:27'),
('bhjbh', 'yutrew', 'kjyhdsf@gmail.com', '654345676543', '0003-05-04', '14:30:00', 'Dr. Damon Fowler', 'juy654erfg', '2025-08-05 12:51:09'),
('bhjbh', 'yutrew', 'kjyhdsf@gmail.com', '654345676543', '0003-05-04', '14:30:00', 'Dr. Damon Fowler', 'juy654erfg', '2025-08-05 12:51:30'),
('uyetwr', 'jhkl', 'hgrty45@gmail.com', '654345676543', '2025-07-03', '11:30:00', 'Dr. Fleur Glass', 'ghrdtfyuiop[]', '2025-08-05 12:52:07'),
('bhjbh', 'jhkl', 'kjyhdsf@gmail.com', '654345676543', '2025-09-19', '11:00:00', 'Dr. Callum Suarez', 'fhgjfhkjlnkml;', '2025-08-05 13:08:06'),
('bhjbh', 'jhkl', 'kjyhdsf@gmail.com', '654345676543', '0312-02-23', '10:30:00', 'Dr. Fleur Glass', 'bgfredcvdfscfrdfd', '2025-08-05 13:08:36'),
('bhjbh', 'jhkl', 'kjyhdsf@gmail.com', '654345676543', '2025-10-22', '12:00:00', 'Dr. Nannie Bishop', 'bgfdfvbgrfvgtr', '2025-08-05 13:09:14'),
('bhjbh', 'jhkl', 'kjyhdsf@gmail.com', '654345676543', '2025-10-22', '12:00:00', 'Dr. Nannie Bishop', 'bgfdfvbgrfvgtr', '2025-08-05 13:10:04'),
('bhjbh', 'jhkl', 'kjyhdsf@gmail.com', '654345676543', '2025-10-22', '12:00:00', 'Dr. Nannie Bishop', 'bgfdfvbgrfvgtr', '2025-08-05 13:10:07'),
('bhjbh', 'jhkl', 'kjyhdsf@gmail.com', '654345676543', '2025-09-05', '11:30:00', 'Dr. Callum Suarez', 'dgfehrtjyukio', '2025-08-05 13:10:37'),
('bhjbh', 'jhkl', 'kjyhdsf@gmail.com', '654345676543', '0001-03-05', '11:30:00', 'Dr. Paul Morton', 'gtrefvgtrdcvfr', '2025-08-05 13:11:03'),
('bhjbh', 'jhkl', 'kjyhdsf@gmail.com', '654345676543', '0001-03-05', '11:30:00', 'Dr. Paul Morton', 'gtrefvgtrdcvfr', '2025-08-05 13:11:41'),
('bhjbh', 'jhkl', 'kjyhdsf@gmail.com', '654345676543', '0001-03-05', '11:30:00', 'Dr. Paul Morton', 'gtrefvgtrdcvfr', '2025-08-05 13:12:06'),
('bhjbh', 'jhkl', 'kjyhdsf@gmail.com', '654345676543', '0001-03-05', '11:30:00', 'Dr. Paul Morton', 'gtrefvgtrdcvfr', '2025-08-05 13:13:50'),
('bhjbh', 'jhkl', 'kjyhdsf@gmail.com', '654345676543', '0001-03-05', '11:30:00', 'Dr. Paul Morton', 'gtrefvgtrdcvfr', '2025-08-05 13:14:14'),
('summer', 'jhkl', 'kjyhdsf@gmail.com', '43546764753642', '2025-09-21', '10:30:00', 'Dr. Callum Suarez', 'nhterwrh', '2025-08-05 13:14:52'),
('summer', 'jhkl', 'kjyhdsf@gmail.com', '43546764753642', '2025-09-21', '10:30:00', 'Dr. Callum Suarez', 'nhterwrh', '2025-08-05 13:14:57'),
('summer', 'jhkl', 'kjyhdsf@gmail.com', '43546764753642', '2025-09-21', '10:30:00', 'Dr. Callum Suarez', 'nhterwrh', '2025-08-05 13:15:35'),
('summer', 'jhkl', 'kjyhdsf@gmail.com', '43546764753642', '2025-09-21', '10:30:00', 'Dr. Callum Suarez', 'nhterwrh', '2025-08-05 13:15:56'),
('summer', 'jhkl', 'kjyhdsf@gmail.com', '43546764753642', '2025-09-21', '10:30:00', 'Dr. Callum Suarez', 'nhterwrh', '2025-08-05 13:16:20'),
('jhygtre', 'mjhgtr', 'kjyhdsf@gmail.com', '654345676543', '2025-07-03', '11:00:00', 'Dr. Ameer Davidson', 'hjtdrgseaweehnhgfd', '2025-08-05 13:16:42'),
('bhjbh', 'jhkl', 'kjyhdsf@gmail.com', '654345676543', '2025-08-13', '10:00:00', 'Dr. William Afton', 'kjhgfdsa', '2025-08-05 13:21:44'),
('bhjbh', 'jhkl', 'kjyhdsf@gmail.com', '654345676543', '2025-09-18', '12:00:00', 'Dr. Callum Suarez', 'jtyrewsaxcvb', '2025-08-05 13:21:58'),
('bhjbh', 'jhkl', 'kjyhdsf@gmail.com', '654345676543', '2025-09-18', '12:00:00', 'Dr. Callum Suarez', 'jtyrewsaxcvb', '2025-08-05 13:23:15'),
('bhjbh', 'jhkl', 'kjyhdsf@gmail.com', '654345676543', '2025-06-05', '11:00:00', 'Dr. Fleur Glass', 'jhgtrewq', '2025-08-05 13:24:14'),
('bhjbh', 'jhkl', 'kjyhdsf@gmail.com', '654345676543', '2025-06-05', '11:00:00', 'Dr. Fleur Glass', 'jhgtrewq', '2025-08-05 13:28:05'),
('bhjbh', 'jhkl', 'kjyhdsf@gmail.com', '654345676543', '2025-08-22', '11:30:00', 'Dr. Nannie Bishop', 'gtr43qwdfgrew', '2025-08-06 08:57:16'),
('bhjbh', 'jhkl', 'sliceofhamface@gmail.com', '654345676543', '2025-08-30', '11:00:00', 'Dr. Paul Morton', 'yktu54trwefsdgh', '2025-08-06 08:57:39'),
('bhjbh', 'jhkl', 'kjyhdsf@gmail.com', '654345676543', '2025-06-04', '10:30:00', 'Dr. Nannie Bishop', 'jutyrtesdfg', '2025-08-06 08:58:00'),
('bhjbh', 'jhkl', 'kjyhdsf@gmail.com', '654345676543', '2025-08-14', '11:30:00', 'Dr. Faris Caldwell', 'nghfterw', '2025-08-06 09:04:43'),
('bhjbh', 'jhkl', 'kjyhdsf@gmail.com', '654345676543', '2025-08-14', '10:30:00', 'Dr. Fleur Glass', '.ljkhgftgdrsaz`sdfgh', '2025-08-06 10:02:04'),
('bhjbh', 'jhkl', 'kjyhdsf@gmail.com', '654345676543', '2025-08-14', '11:00:00', 'Dr. Fleur Glass', 'jkhjghfdxfrtghjhgf', '2025-08-06 10:02:27'),
('bhjbh', 'jhkl', 'kjyhdsf@gmail.com', '654345676543', '2025-08-22', '13:00:00', 'Dr. Callum Suarez', 'khj,fgdfsfaedwqa', '2025-08-06 10:05:00'),
('bhjbh', 'jhkl', 'kjyhdsf@gmail.com', '654345676543', '2025-08-15', '11:00:00', 'Dr. William Afton', 'hjkjyhtgrew', '2025-08-06 10:09:51'),
('bhjbh', 'jhkl', 'kjyhdsf@gmail.com', '43546764753642', '2025-08-09', '11:30:00', 'Dr. Kirsty Miller', 'rewerhgtrew', '2025-08-06 10:11:40'),
('bhjbh', 'jhkl', 'kjyhdsf@gmail.com', '654345676543', '2025-08-08', '11:00:00', 'Dr. Nannie Bishop', 'ewdfvgfres', '2025-08-06 10:13:05'),
('bhjbh', 'jhkl', 'kjyhdsf@gmail.com', '654345676543', '2025-08-14', '11:30:00', 'Dr. Callum Suarez', 'hgtre3wsdcvbgfds', '2025-08-06 10:13:36'),
('bhjbh', 'jhkl', 'kjyhdsf@gmail.com', '654345676543', '2025-08-07', '11:00:00', 'Dr. Callum Suarez', 'gfrewsdfvgfr', '2025-08-06 10:16:20'),
('bhjbh', 'jhkl', 'kjyhdsf@gmail.com', '654345676543', '2025-08-24', '09:00:00', 'Dr. Paul Morton', 'gfdsadfvbfds', '2025-08-06 10:19:29'),
('bhjbh', 'jhkl', 'kjyhdsf@gmail.com', '654345676543', '2025-08-20', '09:00:00', 'Dr. Nannie Bishop', 'hgfdeswaq', '2025-08-06 10:19:59'),
('bhjbh', 'jhkl', 'sliceofhamface@gmail.com', '654345676543', '2025-08-23', '12:30:00', 'Dr. Damon Fowler', 'jmhgfdd', '2025-08-07 11:11:39'),
('bhjbh', 'jhkl', 'sliceofhamface@gmail.com', '654345676543', '2025-08-23', '12:30:00', 'Dr. Damon Fowler', 'jmhgfdd', '2025-08-07 11:12:14'),
('bhjbh', 'jhkl', 'sliceofhamface@gmail.com', '654345676543', '2025-08-23', '12:30:00', 'Dr. Damon Fowler', 'jmhgfdd', '2025-08-07 11:18:00'),
('bhjbh', 'jhkl', 'kjyhdsf@gmail.com', '654345676543', '2026-05-22', '12:00:00', 'Dr. Callum Suarez', 'gfdewdfbgres', '2025-08-07 11:18:48'),
('bhjbh', 'jhkl', 'kjyhdsf@gmail.com', '654345676543', '2025-08-23', '12:00:00', 'Dr. Damon Fowler', 'ukyj,mthgfd', '2025-08-07 14:24:09'),
('bhjbh', 'jhkl', 'kjyhdsf@gmail.com', '654345676543', '2025-08-23', '12:30:00', 'Dr. Damon Fowler', 'trdfgtrdvg', '2025-08-08 09:15:59'),
('bhjbh', 'jhkl', 'kjyhdsf@gmail.com', '654345676543', '2025-08-21', '12:30:00', 'Dr. Faris Caldwell', 'p;o0p987654reh', '2025-08-11 09:11:10'),
('bhjbh', 'jhkl', 'kjyhdsf@gmail.com', '6543424567654', '2025-08-21', '12:30:00', 'Dr. Faris Caldwell', 'ytgfdsdf', '2025-08-11 09:17:06'),
('bhjbh', 'jhkl', 'kjyhdsf@gmail.com', '654345676543', '2025-08-19', '11:30:00', 'Dr. Faris Caldwell', 'hgfds', '2025-08-15 09:00:51'),
('freddy', 'kruger', 'sliceofhamface@gmail.com', '43546764753642', '2025-10-31', '12:00:00', 'Dr. William Afton', 'mjhytr43wd', '2025-08-15 09:02:58'),
('hgtre', 'hytre', 'kjyhdsf@gmail.com', '654345676543', '2025-08-29', '11:00:00', 'Dr. Nannie Bishop', 'lkjuyt5r43', '2025-08-15 09:08:35');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `user` varchar(50) NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`user`, `password`) VALUES
('', ''),
('test1', 'password'),
('test1', 'password'),
('test2', 'password'),
('test3', 'hello'),
('hbhjk', '$2y$10$OJN13MhaE1IHPHhGeUTmse3ZHI3eQ3GrAuqRQBGkuh8WvPd4bRvNK'),
('hbhjk', '$2y$10$EeXc8qADuzvyaku/VUJ/6ugNzS3Np8Y9QtmxYqMM6iQSrEM1Warzi'),
('test', '$2y$10$IaDu4iH29hlc6FbYDS8MeuPNybChYF2LUdUtHWE.Zprp5512B28Z6'),
('mewsdfgdesdfg', '$2y$10$sLaRweh995bu7jwyQkTENOCmHna5IbKSjZ.RrHUHKkbvFKz6Lukua'),
('testagain omg', '$2y$10$ZFCx0mUT31fa8Amri7mrT.m8XOCm/jThe3R0dok8IpoUbOE3OKCoG');

-- --------------------------------------------------------

--
-- Table structure for table `time_slots`
--

CREATE TABLE `time_slots` (
  `id` int NOT NULL,
  `times` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `time_slots`
--

INSERT INTO `time_slots` (`id`, `times`) VALUES
(1, '09:00:00'),
(2, '09:30:00'),
(3, '10:00:00'),
(4, '10:30:00'),
(5, '11:00:00'),
(6, '11:30:00'),
(7, '12:00:00'),
(8, '12:30:00'),
(9, '13:00:00'),
(10, '13:30:00'),
(11, '14:00:00'),
(12, '14:30:00'),
(13, '15:00:00'),
(14, '15:30:00'),
(15, '16:00:00'),
(16, '16:30:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daysfordays`
--
ALTER TABLE `daysfordays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daysfordoctors`
--
ALTER TABLE `daysfordoctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `time_slots`
--
ALTER TABLE `time_slots`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `daysfordays`
--
ALTER TABLE `daysfordays`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `daysfordoctors`
--
ALTER TABLE `daysfordoctors`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `time_slots`
--
ALTER TABLE `time_slots`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=193;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
