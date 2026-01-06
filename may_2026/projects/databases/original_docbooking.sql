-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2025 at 02:50 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `docbooking`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `appointment_id` int(11) NOT NULL,
  `appointment_kind` text NOT NULL,
  `reason` text NOT NULL,
  `preferred_contact` text NOT NULL,
  `app_date` date NOT NULL,
  `app_time` time NOT NULL,
  `accomidations` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`appointment_id`, `appointment_kind`, `reason`, `preferred_contact`, `app_date`, `app_time`, `accomidations`) VALUES
(1, 'efef', 'sdfe', 'email', '2025-10-08', '09:00:00', 'vrgfrsdfewsdf'),
(2, 'efef', 'sdfe', 'email', '2025-10-08', '09:00:00', 'vrgfrsdfewsdf'),
(3, 'efef', 'sdfe', 'email', '2025-10-08', '09:00:00', 'rgewfewr'),
(4, 'efef', 'sdfe', 'phone', '2025-10-08', '09:00:00', 'v'),
(5, 'efef', 'sdfe', 'email', '2025-10-08', '09:00:00', 'fvdafaedd'),
(6, 'gp', 'fd', 'email', '2025-10-01', '09:00:00', 'eed'),
(7, 'gp', 'xsad', 'email', '2025-10-02', '09:00:00', 'wedw'),
(8, 'gp', 'fgf', 'email', '2025-10-09', '09:00:00', 'fggf');

-- --------------------------------------------------------

--
-- Table structure for table `audit`
--

CREATE TABLE `audit` (
  `audit_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `code` text NOT NULL,
  `longdesc` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `audit`
--

INSERT INTO `audit` (`audit_id`, `patient_id`, `code`, `longdesc`, `date`) VALUES
(1, 7, 'reg', 'New user registered', '2025-10-10'),
(2, 1, 'log', 'User has successfully logged out', '2025-10-10'),
(3, 1, 'log', 'User has successfully logged out', '2025-10-10'),
(4, 1, 'log', 'User has successfully logged in', '2025-10-10'),
(5, 1, 'log', 'User has successfully logged out', '2025-10-10'),
(6, 1, 'log', 'User has successfully logged in', '2025-10-13'),
(7, 1, 'log', 'User has successfully logged out', '2025-10-13'),
(8, 8, 'reg', 'New user registered', '2025-10-13'),
(9, 8, 'log', 'User has successfully logged in', '2025-10-13'),
(10, 8, 'log', 'User has successfully logged out', '2025-10-13'),
(11, 8, 'log', 'User has successfully logged in', '2025-10-13'),
(12, 8, 'log', 'User has successfully logged out', '2025-10-13'),
(13, 8, 'log', 'User has successfully logged in', '2025-10-13'),
(14, 8, 'log', 'User has successfully logged out', '2025-10-13'),
(15, 9, 'reg', 'New user registered', '2025-10-13'),
(16, 10, 'reg', 'New user registered', '2025-10-13'),
(17, 10, 'log', 'User has successfully logged in', '2025-10-13'),
(18, 10, 'log', 'User has successfully logged out', '2025-10-13'),
(19, 10, 'log', 'User has successfully logged in', '2025-10-13'),
(20, 10, 'log', 'User has successfully logged out', '2025-10-13'),
(21, 10, 'log', 'User has successfully logged in', '2025-10-13'),
(22, 10, 'log', 'User has successfully logged out', '2025-10-13'),
(23, 10, 'log', 'User has successfully logged in', '2025-10-13'),
(24, 10, 'log', 'User has successfully logged out', '2025-10-13'),
(25, 11, 'reg', 'New user registered', '2025-10-13'),
(26, 10, 'log', 'User has successfully logged in', '2025-10-13'),
(27, 10, 'log', 'User has successfully logged in', '2025-10-13');

-- --------------------------------------------------------

--
-- Table structure for table `patient_users`
--

CREATE TABLE `patient_users` (
  `patient_id` int(11) NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `email` text NOT NULL,
  `phone` text NOT NULL,
  `dob` date NOT NULL,
  `password` text NOT NULL,
  `sign_up_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient_users`
--

INSERT INTO `patient_users` (`patient_id`, `first_name`, `last_name`, `email`, `phone`, `dob`, `password`, `sign_up_date`) VALUES
(1, 'summer', 'wall', 'urmum@gmail.com', '0674442352', '2007-10-22', '$2y$10$1LDHBh3cfs4TnyrJVzmeT.akYlx/ttI6/u1C/PEUwBWhyZOKei8ey', '2025-10-10'),
(2, 'sgf', 'ddf\\zx', 'email@email.com', '45934543', '2025-10-08', '$2y$10$GLnOWPSQDWjF40u7a8nH5.1GO.58Dy1J9MWK/abRBILpYDtyqBKb6', '2025-10-10'),
(3, 'greg', 'house', 'house@gmail.com', '8573635', '2025-10-02', '$2y$10$49hV1exDsSmEHZ6ediuJKuA1m.zuJFRBsLTXidneSsUUuTfpW2b4m', '2025-10-10'),
(4, 'sammy', 'hair', 'samhair@yahoo.com', '06423356', '2025-09-29', '$2y$10$.WDaVHQ6f.8tGSPE9NsVy.jruItmC6lNcaRC03rTg8yURE79D86om', '2025-10-10'),
(5, 'fgsd', 'fgrg', 'gsdg@ghsff.com', 'fwefe', '2025-10-08', '$2y$10$1V.F9cwpcvojo8rBhEq11ehtE4KTI.i9JpxkgTJmuL/0psUyDQtYG', '2025-10-10'),
(6, 'gsrff', 'gwrf', 'rgrgyggsdg@gfsffs.com', 'dtged', '2025-10-08', '$2y$10$lQMsbaKLbUx.RkgcYSOEmu2LEmwCjoGO31ncnJ71kLsDO/RcEBH8S', '2025-10-10'),
(7, 'svdf', 'fvsf', 'fsfsd@rfedf', 'fsgvsf', '2025-09-30', '$2y$10$oHlvnhTz18IJI0VfDTp9A.RhcvpfblR9Lw4/Wn4pq/N6PHLmR.XOi', '2025-10-10'),
(8, 'test', 'test', 'test@test.com', '342323', '2025-09-29', '$2y$10$4XSilC6R1.DEocTDJvAZyusQjc1zyoQG3eOoIIZnXc4Of9xsw4zXG', '2025-10-13'),
(9, 'ger', 'ger', 'ger@ger', '303043043', '2025-10-06', '$2y$10$gUBUzKw2SE5agiqoKtXx8.soScI2a3X7atpiqDtrJcgLoC4v.xo.a', '2025-10-13'),
(10, 'gerg', 'gerg', 'gerg@gerg.com', '54545435345', '2025-10-06', '$2y$10$dPGiBkp9VjYRUjWEOoBHTOAjeW5PfWTtGFMRSTaGvgZ2m4n2SEiF2', '2025-10-13'),
(11, 'fgdsf', 'dfds', 'fgrsd@fgdsf', '4254243', '2025-10-01', '$2y$10$5paqoBkOupaSexbTCBjXI.LuF6up1KkjblI6VjXynjFKi8DxMyIGy', '2025-10-13');

-- --------------------------------------------------------

--
-- Table structure for table `pat_app`
--

CREATE TABLE `pat_app` (
  `pat_app_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `appointment_id` int(11) NOT NULL,
  `link_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staff_audit`
--

CREATE TABLE `staff_audit` (
  `audit_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `code` text NOT NULL,
  `longdesc` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staff_users`
--

CREATE TABLE `staff_users` (
  `staff_id` int(11) NOT NULL,
  `email` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `staff_type` text NOT NULL,
  `fname` text NOT NULL,
  `sname` text NOT NULL,
  `room` int(11) NOT NULL,
  `sign_up_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`appointment_id`);

--
-- Indexes for table `audit`
--
ALTER TABLE `audit`
  ADD PRIMARY KEY (`audit_id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `patient_users`
--
ALTER TABLE `patient_users`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `pat_app`
--
ALTER TABLE `pat_app`
  ADD PRIMARY KEY (`pat_app_id`),
  ADD KEY `patient_id` (`patient_id`,`appointment_id`),
  ADD KEY `appointment_id` (`appointment_id`),
  ADD KEY `staff_id` (`staff_id`);

--
-- Indexes for table `staff_audit`
--
ALTER TABLE `staff_audit`
  ADD PRIMARY KEY (`audit_id`),
  ADD KEY `staff_id` (`staff_id`);

--
-- Indexes for table `staff_users`
--
ALTER TABLE `staff_users`
  ADD PRIMARY KEY (`staff_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `audit`
--
ALTER TABLE `audit`
  MODIFY `audit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `patient_users`
--
ALTER TABLE `patient_users`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pat_app`
--
ALTER TABLE `pat_app`
  MODIFY `pat_app_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff_audit`
--
ALTER TABLE `staff_audit`
  MODIFY `audit_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff_users`
--
ALTER TABLE `staff_users`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `audit`
--
ALTER TABLE `audit`
  ADD CONSTRAINT `audit_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patient_users` (`patient_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pat_app`
--
ALTER TABLE `pat_app`
  ADD CONSTRAINT `pat_app_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patient_users` (`patient_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pat_app_ibfk_2` FOREIGN KEY (`appointment_id`) REFERENCES `appointments` (`appointment_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `staff_audit`
--
ALTER TABLE `staff_audit`
  ADD CONSTRAINT `staff_audit_ibfk_1` FOREIGN KEY (`staff_id`) REFERENCES `staff_users` (`staff_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `staff_users`
--
ALTER TABLE `staff_users`
  ADD CONSTRAINT `staff_users_ibfk_1` FOREIGN KEY (`staff_id`) REFERENCES `pat_app` (`staff_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
