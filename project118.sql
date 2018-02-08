-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2018 at 10:23 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project118`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `username`, `password`, `email`) VALUES
(7, 'dhanmarlanortiz', '$2y$10$J6Ir61.gmsHv2mONYYO.q.txl5kKi3yEIIPaW2x7w9glE8wUkwEZC', 'dhan.marlan.ortiz@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `payroll_entries_deductions`
--

CREATE TABLE `payroll_entries_deductions` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payroll_entries_deductions`
--

INSERT INTO `payroll_entries_deductions` (`id`, `name`) VALUES
(1, 'PagIBIG Emp Contri Nontaxabl'),
(2, 'SSS Employee Contribution'),
(3, 'Medicare Employee Contri');

-- --------------------------------------------------------

--
-- Table structure for table `payroll_entries_earnings`
--

CREATE TABLE `payroll_entries_earnings` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payroll_entries_earnings`
--

INSERT INTO `payroll_entries_earnings` (`id`, `name`) VALUES
(1, 'Salaries and Wages'),
(2, 'accural (+) taxable'),
(3, 'APA adj 12/30 payroll'),
(4, 'Regular Holiday'),
(5, 'Regular Holiday ND'),
(6, 'Night Differential'),
(7, 'Special Holiday'),
(8, 'Special Holiday ND'),
(9, 'Rice Allowance'),
(10, 'Tax Payble/Refund'),
(11, 'Accural (+) non-taxable'),
(12, 'Deduction Absences'),
(13, 'Deduction Late');

-- --------------------------------------------------------

--
-- Table structure for table `payroll_payslip_deductions`
--

CREATE TABLE `payroll_payslip_deductions` (
  `id` int(11) NOT NULL,
  `entry_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `amount` float NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payroll_payslip_deductions`
--

INSERT INTO `payroll_payslip_deductions` (`id`, `entry_id`, `date`, `amount`) VALUES
(6, 1, '2018-01-15', 100),
(7, 2, '2018-01-30', 327),
(8, 3, '2018-01-30', 137);

-- --------------------------------------------------------

--
-- Table structure for table `payroll_payslip_earnings`
--

CREATE TABLE `payroll_payslip_earnings` (
  `id` int(11) NOT NULL,
  `entry_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `amount` float NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payroll_payslip_earnings`
--

INSERT INTO `payroll_payslip_earnings` (`id`, `entry_id`, `date`, `amount`) VALUES
(102, 1, '2018-01-15', 8000),
(103, 2, '2018-01-15', -5149.43),
(104, 3, '2018-01-15', 441.38),
(105, 4, '2018-01-15', 183.91),
(106, 5, '2018-01-15', 36.78),
(107, 6, '2018-01-15', 294.25),
(108, 7, '2018-01-15', 165.52),
(109, 8, '2018-01-15', 33.1),
(110, 9, '2018-01-15', 750),
(111, 10, '2018-01-15', 6347.1),
(112, 11, '2018-01-15', 5149.43),
(113, 12, '2018-01-15', -2942.53),
(114, 13, '2018-01-15', -4.6),
(115, 1, '2018-01-30', 8000),
(116, 9, '2018-01-30', 750);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payroll_entries_deductions`
--
ALTER TABLE `payroll_entries_deductions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payroll_entries_earnings`
--
ALTER TABLE `payroll_entries_earnings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payroll_payslip_deductions`
--
ALTER TABLE `payroll_payslip_deductions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `entry_fk` (`entry_id`);

--
-- Indexes for table `payroll_payslip_earnings`
--
ALTER TABLE `payroll_payslip_earnings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `entry_fk` (`entry_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `payroll_entries_deductions`
--
ALTER TABLE `payroll_entries_deductions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payroll_entries_earnings`
--
ALTER TABLE `payroll_entries_earnings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `payroll_payslip_deductions`
--
ALTER TABLE `payroll_payslip_deductions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `payroll_payslip_earnings`
--
ALTER TABLE `payroll_payslip_earnings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
