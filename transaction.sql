-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 26, 2021 at 04:29 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `transaction_detik`
--

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `references_id` int(11) NOT NULL,
  `invoice_id` char(8) NOT NULL,
  `merchant_id` char(5) NOT NULL,
  `status` char(10) NOT NULL DEFAULT 'pending',
  `item_name` varchar(250) NOT NULL,
  `amount` double NOT NULL,
  `payment_type` varchar(15) NOT NULL,
  `number_va` char(8) NOT NULL,
  `customer_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`references_id`, `invoice_id`, `merchant_id`, `status`, `item_name`, `amount`, `payment_type`, `number_va`, `customer_name`) VALUES
(1, 'DET12345', '12345', 'pending', 'Sepatu', 2, 'virtual_account', '12345678', 'Imam'),
(2, 'DET54321', '34693', 'pending', 'Kemeja', 1, 'credit_card', '', 'Sutono'),
(3, 'DET67890', '30293', 'failed', 'Celana', 3, 'virtual_account', '39487899', 'Udin'),
(4, 'DET09876', '94748', 'paid', 'Jam tangan', 1, 'credit_card', '', 'Wildan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`references_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `references_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
