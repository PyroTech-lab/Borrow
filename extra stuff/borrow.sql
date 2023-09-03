-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2023 at 09:33 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `borrow`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `password_recovery_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `name`, `password`, `password_recovery_code`) VALUES
(1, 'luca.vandebilt@outlook.com', 'Luca van de Bilt', '$2y$10$v9ZCYbPXrolF4yaNtXn55e.svBqS1NoGzV1J5t701.pd8xcjSsxb6', 0);

-- --------------------------------------------------------

--
-- Table structure for table `banned_users`
--

CREATE TABLE `banned_users` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date_birth` date NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `postcode` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `identity_card` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `join_date` date NOT NULL,
  `banned_date` date NOT NULL,
  `reason` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deleted_users`
--

CREATE TABLE `deleted_users` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date_birth` date NOT NULL,
  `username` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `postcode` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `identity_card` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `join_date` date NOT NULL,
  `deleted_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `positive_feedback` int(11) NOT NULL,
  `negative_feedback` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `id_user`, `positive_feedback`, `negative_feedback`) VALUES
(9, 14, 0, 0),
(10, 15, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `loan`
--

CREATE TABLE `loan` (
  `id` int(11) NOT NULL,
  `loan_amount` int(11) NOT NULL,
  `repayment_amount` int(11) NOT NULL,
  `repayment_date` date NOT NULL,
  `request_date` datetime NOT NULL,
  `granting_date` datetime NOT NULL,
  `id_borrower` int(11) NOT NULL,
  `id_lender` int(11) NOT NULL,
  `username_borrower` varchar(255) NOT NULL,
  `username_lender` varchar(255) NOT NULL,
  `notes` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `repaid_date` datetime NOT NULL,
  `feedback_given` varchar(255) NOT NULL,
  `borrower_trustscore` int(11) NOT NULL,
  `borrower_positive_feedback` int(11) NOT NULL,
  `borrower_negative_feedback` int(11) NOT NULL,
  `payment_method_payment` varchar(255) NOT NULL,
  `payment_method_repayment` varchar(255) NOT NULL,
  `payment_transaction_id` varchar(255) NOT NULL,
  `repayment_transaction_id` varchar(255) NOT NULL,
  `repayment_received` varchar(255) NOT NULL,
  `repayment_id_confirmation_tries` varchar(255) NOT NULL,
  `repayment_proof` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loan`
--

INSERT INTO `loan` (`id`, `loan_amount`, `repayment_amount`, `repayment_date`, `request_date`, `granting_date`, `id_borrower`, `id_lender`, `username_borrower`, `username_lender`, `notes`, `status`, `repaid_date`, `feedback_given`, `borrower_trustscore`, `borrower_positive_feedback`, `borrower_negative_feedback`, `payment_method_payment`, `payment_method_repayment`, `payment_transaction_id`, `repayment_transaction_id`, `repayment_received`, `repayment_id_confirmation_tries`, `repayment_proof`) VALUES
(21, 100, 120, '2023-09-02', '2023-09-03 14:00:21', '2023-09-03 14:01:36', 14, 15, 'PlanetPro', 'VladRussia', '', 'paid_late_notseen', '2023-09-03 15:40:33', '', 0, 0, 0, 'Paypal', 'Paypal', '929/2', '584', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `payment_method`
--

CREATE TABLE `payment_method` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `paypal` varchar(255) NOT NULL,
  `cashapp` varchar(255) NOT NULL,
  `venmo` varchar(255) NOT NULL,
  `zelle` varchar(255) NOT NULL,
  `chime` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment_method`
--

INSERT INTO `payment_method` (`id`, `id_user`, `paypal`, `cashapp`, `venmo`, `zelle`, `chime`) VALUES
(8, 14, '8696', '*/6*6', '/+6-+', '*9+*-/+6*/', '/*6/*6'),
(9, 15, '888', '9829/', '9/29', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date_birth` date NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `password_recovery_code` int(11) NOT NULL,
  `verification_code` int(11) NOT NULL,
  `email_verified` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `postcode` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `identity_card` varchar(255) NOT NULL,
  `id_verified` varchar(255) NOT NULL,
  `join_date` date NOT NULL,
  `profile_picture` varchar(255) NOT NULL,
  `duplicate_user_okay` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `name`, `date_birth`, `username`, `password`, `password_recovery_code`, `verification_code`, `email_verified`, `phone_number`, `address`, `city`, `postcode`, `country`, `picture`, `identity_card`, `id_verified`, `join_date`, `profile_picture`, `duplicate_user_okay`) VALUES
(14, 'luca.vandebilt@outlook.com', 'Luca van de Bilt', '2004-12-11', 'PlanetPro', '$2y$10$D.UPS4h/FQU5DosWqY3jHefRs28v8iVb6oN3V7XKR/0Gfr/4lqYkm', 102866, 0, 'yes', '+33 6 36 11 28 77', '274 Chem. De Bellevue', 'Doussard', '74210', 'France', '1f4d2a8e0ee649f3a215f4801239dfbf.png', '910d450c5b13cba1bbca788ca75a4767.png', 'under_verification', '2023-09-03', '', ''),
(15, 'luca.vdbilt@outlook.com', 'Vladimir Putin', '0000-00-00', 'VladRussia', '$2y$10$OaEb7zYcgJNggUnx6uB0L.aNJeUa.M7torHFI/CS8zbvsTi3ojvU2', 0, 0, '', '', '', '', '', '', '', '', '', '2023-09-03', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banned_users`
--
ALTER TABLE `banned_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deleted_users`
--
ALTER TABLE `deleted_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan`
--
ALTER TABLE `loan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_method`
--
ALTER TABLE `payment_method`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `banned_users`
--
ALTER TABLE `banned_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `deleted_users`
--
ALTER TABLE `deleted_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `loan`
--
ALTER TABLE `loan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `payment_method`
--
ALTER TABLE `payment_method`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
