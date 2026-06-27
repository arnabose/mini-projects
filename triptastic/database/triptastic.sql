-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 30, 2023 at 08:25 AM
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
-- Database: `triptastic`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(20) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` bigint(13) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `fname`, `lname`, `email`, `phone`, `password`) VALUES
(1, 'admin', ' ', 'admin@gmail.com', 987654321, '$2y$10$R6MPqgZkgGRb2BbcUN6JfOgXL0CV/f5gO9nJifrWooRktq/o2EKSe');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `booking_id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `place_id` int(20) NOT NULL,
  `persons` int(20) NOT NULL,
  `date` date NOT NULL,
  `total_amount` int(20) NOT NULL,
  `payment_method` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `place`
--

CREATE TABLE `place` (
  `place_id` int(20) NOT NULL,
  `place` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` varchar(15) NOT NULL,
  `duration` varchar(10) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `place`
--

INSERT INTO `place` (`place_id`, `place`, `description`, `price`, `duration`, `image`) VALUES
(1, 'Darjeeling', 'check-in:10 AM <br>\r\nBreakfast, Lunch, Dinner inclusive <br>\r\ncheck-out: 9 AM <br>\r\n<br>Description: Darjeeling is a favoured tourist destination, noted for its scenic beauty, ancient forests, quaint houses , friendly peopleand the mountain panorama that ', '10999', '5', '../image/uploads/darjeeling.jpg'),
(3, 'Mandarmani', 'check-in:11 AM <br>\r\nLunch & Dinner inclusive <br>\r\nfree wifi at hotel <br>\r\ncheck-out: 10 AM <br>\r\n<br>Description: Mandarmani is an ideal destination for families, couples and youngsters. This is one of the very quiet beaches which is a good place to ha', '3599', '3', '../image/uploads/21c249cf-city-310639-1699c657a2c.jpg'),
(4, 'Puri Beach', 'check-in:10 AM <br>\r\nBreakfast, Lunch & Dinner inclusive <br>\r\nAC and free wifi at hotel<br>\r\ncheck-out: 10 AM <br>\r\n<br>Description: Puri Beach, also known as Golden Beach, is one of the finest coastlines in East India, bordering the Bay of Bengal. It is', '4600', '3', '../image/uploads/puri corosal2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `fname`, `lname`, `email`, `mobile`, `address`, `password`) VALUES
(1, 'Arnab', 'Bose', 'arnab@gmail.com', '0987654321', 'durgapur', '$2y$10$U97WGQh7/436d0CyUZlLzOJkSKP/1xxXYBgGdZ39h9D1no4GhPJZq'),
(2, 'ranabir', 'goswami', 'ranabir@gmail.com', '9876543219', 'bankura', '$2y$10$.Ky0rAdOAtz.LZu7HBMSt.xSV5hTU5drOqttLVoMFh/x7m.Q1fIku'),
(3, 'arpan', 'pal', 'arpan@pal.com', '098', '', '$2y$10$ND6Xtg8C0tUdHBrUZDh8n.KVpcU6YOWUmQM0vT0Evu5/nuPCR2wDu');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `user_id` int(20) NOT NULL,
  `place_id` int(20) NOT NULL,
  `persons` int(20) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`user_id`, `place_id`, `persons`, `date`) VALUES
(1, 3, 5, '2022-12-13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `place`
--
ALTER TABLE `place`
  ADD PRIMARY KEY (`place_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `booking_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `place`
--
ALTER TABLE `place`
  MODIFY `place_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
