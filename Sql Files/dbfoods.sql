-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2021 at 04:06 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbfoods`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`email`, `password`) VALUES
('codies@codies.com', 'codies');

-- --------------------------------------------------------

--
-- Table structure for table `complaintsreply`
--

CREATE TABLE `complaintsreply` (
  `complaintid` varchar(100) NOT NULL,
  `currentstatus` varchar(100) DEFAULT NULL,
  `useremail` varchar(100) DEFAULT NULL,
  `reply` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` varchar(30) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `query` text DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `email`, `query`, `status`) VALUES
('Codies1', 'dkkarthik2000@gmail.com', 'Rise and Shinse', 'closed'),
('Codies2', 'dkkarthik2000@gmail.com', 'Sine and rise..spelling mistake', 'closed'),
('Codies3', 'codies@codies.com', 's', 'closed'),
('Codies4', 'dkkarthik2000@gmail.com', '123', 'open');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `foodid` varchar(10) NOT NULL,
  `hotelid` varchar(10) DEFAULT NULL,
  `cost` decimal(6,2) DEFAULT NULL,
  `foodname` varchar(50) DEFAULT NULL,
  `foodtype` varchar(15) DEFAULT NULL,
  `cuisines` varchar(50) DEFAULT NULL,
  `available` varchar(20) DEFAULT NULL,
  `fooddesc` varchar(255) DEFAULT NULL,
  `keyword` varchar(255) DEFAULT NULL,
  `foodimage` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`foodid`, `hotelid`, `cost`, `foodname`, `foodtype`, `cuisines`, `available`, `fooddesc`, `keyword`, `foodimage`) VALUES
('food1', 'hotel2', '3.52', 'Idly', 'veg', 'Southindian', 'all', 'Healthy Food', 'Idly,breakfast,healthy,tiffen', 'idly1617876331.jpg'),
('food10', 'hotel4', '120.00', 'Grilled Chicken', 'nonveg', 'Northindian', 'all', 'Spicy Chicken', 'chicken,nonveg,grilled', 'grilledchicken1620626955.jpg'),
('food11', 'hotel4', '125.00', 'Mutton Korma', 'nonveg', 'Northindian', 'lunch', 'Mutton Koroma', 'mutton,nonveg', 'Mutton Korma1620627069.jpg'),
('food12', 'hotel5', '125.00', 'Mutton Korma', 'nonveg', 'Northindian', 'lunch', 'Mutton Koroma', 'mutton,nonveg', 'Mutton Korma1620627069.jpg'),
('food13', 'hotel5', '120.00', 'Avial', 'veg', 'Southindian', 'all', 'Coconut paste, curd mixed with vegetables and some spices.	', 'Avial ,curd , veg,vegtable,spices', 'avial1620625637.jpg'),
('food14', 'hotel5', '10.00', 'Idli', 'veg', 'Southindian', 'all', 'Steamed cake of fermented rice and pulse flour. Rice, urad dal	', 'Steamed cake of fermented rice and pulse flour. Rice, urad dal	, idli, southindian,dinner,lunch,all', 'idly1620625843.jpg'),
('food2', 'hotel2', '55.25', 'Egg Dosa', 'onlyegg', 'Southindian', 'lunch', 'Dosa,Egg', 'Dosa,Egg,tiffen,breakfast', 'dosa1617876716.jpg'),
('food3', 'hotel1', '2550.00', 'Chicken', 'nonveg', 'Northindian', 'lunch', 'Chicken,non-veg', 'Chicken,non-veg', 'chicken1617879919.jpg'),
('food4', 'hotel1', '12.00', 'Mutton', 'nonveg', 'Southindian', 'breakfast', '123', '123', 'chicken1617881410.jpg'),
('food5', 'hotel3', '120.00', 'Avial', 'veg', 'Southindian', 'all', 'Coconut paste, curd mixed with vegetables and some spices.	', 'Avial ,curd , veg,vegtable,spices', 'avial1620625637.jpg'),
('food6', 'hotel3', '30.00', 'Dosa', 'veg', 'Southindian', 'all', 'Pancake/Hopper. Ground rice, urad dal	', 'Pancake/Hopper. Ground rice, urad dal	, dosa,veg,tiffen', 'dosa1620625695.jpg'),
('food7', 'hotel3', '10.00', 'Idiappam', 'veg', 'Southindian', 'all', 'Steamed rice noodles or vermicelli with Ground rice	', 'Steamed rice noodles or vermicelli with Ground rice,Idiappam , southindian', 'idiyappam1620625770.jpg'),
('food8', 'hotel3', '10.00', 'Idli', 'veg', 'Southindian', 'all', 'Steamed cake of fermented rice and pulse flour. Rice, urad dal	', 'Steamed cake of fermented rice and pulse flour. Rice, urad dal	, idli, southindian,dinner,lunch,all', 'idly1620625843.jpg'),
('food9', 'hotel4', '250.00', 'Malabar Briyani', 'nonveg', 'Southindian', 'lunch', 'Malbar,Kearala briyani', 'thalaserry,malabar,briyani,lunch', 'briyani1620626836.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `foodcomplaint`
--

CREATE TABLE `foodcomplaint` (
  `complaintid` varchar(100) NOT NULL,
  `orderid` varchar(100) DEFAULT NULL,
  `foodid` varchar(100) DEFAULT NULL,
  `useremail` varchar(100) DEFAULT NULL,
  `complaint` varchar(255) DEFAULT NULL,
  `currentstatus` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `foodorderdetails`
--

CREATE TABLE `foodorderdetails` (
  `orderid` varchar(100) DEFAULT NULL,
  `foodid` varchar(100) DEFAULT NULL,
  `hotelid` varchar(100) DEFAULT NULL,
  `foodname` varchar(50) DEFAULT NULL,
  `cost` decimal(6,2) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `orderdate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `fuotp`
--

CREATE TABLE `fuotp` (
  `email` varchar(50) NOT NULL,
  `otp` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hoteluser`
--

CREATE TABLE `hoteluser` (
  `sno` varchar(10) NOT NULL,
  `ownername` varchar(60) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `hotelname` varchar(60) NOT NULL,
  `descs` varchar(100) NOT NULL,
  `password` varchar(150) NOT NULL,
  `type` varchar(10) NOT NULL,
  `door` varchar(10) NOT NULL,
  `street` varchar(100) NOT NULL,
  `town` varchar(30) NOT NULL,
  `pin` int(6) NOT NULL,
  `phone` bigint(10) DEFAULT NULL,
  `filename` varchar(200) NOT NULL,
  `status` varchar(20) NOT NULL,
  `rating` float(1,1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hoteluser`
--

INSERT INTO `hoteluser` (`sno`, `ownername`, `email`, `hotelname`, `descs`, `password`, `type`, `door`, `street`, `town`, `pin`, `phone`, `filename`, `status`, `rating`) VALUES
('hotel1', 'Vignesh', 'dkkarthik2000@gmail.com', 'FoodFinger', 'Fingers in Food', '$2y$10$Ny9SmjC.iUvKvDZPfG5Jj.P6cykeW6VfQA4NP9afxGgn7X8u3PYNy', 'Veg', '123', 'Madhan Street', 'Vellore', 612500, 1234567890, 'foodfinger1614315784.jpg', 'ok', 0.0),
('hotel2', 'Vignesh', 'vignesharr55@gmail.com', 'dizengoff', 'nambi vanga hospital admit agudunga', '$2y$10$M4IjQ7aen3nX0kZCWpzCAuVrjKsm0/FQZL1ngdQYkljr5mTdakdxO', 'Non Veg', '123', 'Madhan Street', 'Vellore', 612500, 1234567890, 'dizengoff1614320809.jpg', 'ok', 0.0),
('hotel3', 'AnandhaRaj', 'anadhabhavan@gmail.com', 'Anandha Bhavan', 'Sweets and Care', '$2y$10$M4IjQ7aen3nX0kZCWpzCAuVrjKsm0/FQZL1ngdQYkljr5mTdakdxO', 'Veg', '12', 'Anadha Street', 'Chennai', 600100, 91234567890, 'anadhabhavan.jpg', 'ok', 0.9),
('hotel4', 'Prakash', 'thalassery@gmail.com', 'Thalassery', 'Fast Food and others', '$2y$10$M4IjQ7aen3nX0kZCWpzCAuVrjKsm0/FQZL1ngdQYkljr5mTdakdxO', 'non-veg', '34', 'Egmore Main Road', 'Chennai', 600030, 1234657890, 'thalassery.jpg ', 'ok', 0.0),
('hotel5', 'Udipi Kapoor', 'udipihotel@gmail.com', 'Udipi Hotel', 'Veg and Non-veg', '$2y$10$M4IjQ7aen3nX0kZCWpzCAuVrjKsm0/FQZL1ngdQYkljr5mTdakdxO', 'veg', '12', 'Main Street', 'Vellore', 600100, 987654321, 'udipi.jpg', 'ok', 0.0);

-- --------------------------------------------------------

--
-- Table structure for table `hotp`
--

CREATE TABLE `hotp` (
  `email` varchar(50) NOT NULL,
  `ownername` varchar(60) NOT NULL,
  `hotelname` varchar(60) NOT NULL,
  `descs` varchar(100) NOT NULL,
  `password` varchar(150) NOT NULL,
  `type` varchar(10) NOT NULL,
  `door` varchar(10) NOT NULL,
  `street` varchar(100) NOT NULL,
  `town` varchar(30) NOT NULL,
  `pin` int(6) NOT NULL,
  `phone` bigint(10) DEFAULT NULL,
  `filename` varchar(200) NOT NULL,
  `otp` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotp`
--

INSERT INTO `hotp` (`email`, `ownername`, `hotelname`, `descs`, `password`, `type`, `door`, `street`, `town`, `pin`, `phone`, `filename`, `otp`) VALUES
('karthikeyan.d2020a@vitstudent.ac.in', 'Vignesh', 'FoodFinger', 'd', '$2y$10$c2gpfw8BcjH/QFGyFowoQeTETwnygJLm3y6m12emDmuCRLBknFmsK', 'Veg', '123', 'Madhan Street', 'Vellore', 612500, 1234567890, 'green bg1616239217.jpg', 496365);

-- --------------------------------------------------------

--
-- Table structure for table `huotp`
--

CREATE TABLE `huotp` (
  `email` varchar(50) NOT NULL,
  `otp` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderid` varchar(15) DEFAULT NULL,
  `foodid` varchar(50) DEFAULT NULL,
  `hotelid` varchar(50) DEFAULT NULL,
  `useremail` varchar(100) DEFAULT NULL,
  `quantity` int(3) DEFAULT NULL,
  `cost` decimal(8,3) DEFAULT NULL,
  `subtotal` decimal(8,3) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `od` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderid`, `foodid`, `hotelid`, `useremail`, `quantity`, `cost`, `subtotal`, `status`, `od`) VALUES
('order1', 'food3', 'hotel1', 'prakashdayalans@gmail.com', 2, '2550.000', '5100.000', 'rejected', '10-05-2021 10:55'),
('order1', 'food4', 'hotel1', 'prakashdayalans@gmail.com', 2, '12.000', '24.000', 'rejected', '10-05-2021 10:55');

-- --------------------------------------------------------

--
-- Table structure for table `ordertotal`
--

CREATE TABLE `ordertotal` (
  `orderid` varchar(15) DEFAULT NULL,
  `total` decimal(10,3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ordertotal`
--

INSERT INTO `ordertotal` (`orderid`, `total`) VALUES
('order1', '7686.000'),
('order1', '2562.000'),
('order1', '5112.000'),
('order1', '2574.000'),
('order1', '2562.000'),
('order1', '2562.000'),
('order1', '5124.000');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `hotelid` varchar(15) DEFAULT NULL,
  `orderid` varchar(20) DEFAULT NULL,
  `rating` decimal(4,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `id` varchar(30) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `query` text DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reply`
--

INSERT INTO `reply` (`id`, `email`, `query`, `status`) VALUES
('Codies2', 'dkkarthik2000@gmail.com', 'spelling mistake', 'closed'),
('Codies3', 'codies@codies.com', 'Good', 'closed');

-- --------------------------------------------------------

--
-- Table structure for table `uotp`
--

CREATE TABLE `uotp` (
  `email` varchar(50) NOT NULL,
  `firstname` varchar(30) DEFAULT NULL,
  `lastname` varchar(30) DEFAULT NULL,
  `password` varchar(150) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `door` varchar(10) NOT NULL,
  `street` varchar(100) NOT NULL,
  `town` varchar(30) NOT NULL,
  `pin` int(6) NOT NULL,
  `dob` date DEFAULT NULL,
  `otp` int(6) DEFAULT NULL,
  `phone` bigint(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `email` varchar(50) NOT NULL,
  `firstname` varchar(30) DEFAULT NULL,
  `lastname` varchar(30) DEFAULT NULL,
  `password` varchar(150) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `door` varchar(10) NOT NULL,
  `street` varchar(100) NOT NULL,
  `town` varchar(30) NOT NULL,
  `pin` int(6) NOT NULL,
  `dob` date DEFAULT NULL,
  `phone` bigint(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`email`, `firstname`, `lastname`, `password`, `gender`, `door`, `street`, `town`, `pin`, `dob`, `phone`) VALUES
('dkkarthik2000@gmail.com', 'karthikeyan', 'S', '$2y$10$NvLFkupnfgaRvl6l4lAsn.6WGxv6hva4.yFYopc0pP1C1b6sy1MOC', 'Male', '123', 'Nagaar', 'Chennai', 600010, '2005-01-01', 1234567890),
('karthikeyan.d2020a@vitstudent.ac.in', 'Prakash', 'S', '$2y$10$Dhc7RC6umJpCmfLvmHu1/eFHFZRKF6TiGy0xkwngrwX4lkNWQ8kTG', 'Male', '123', 'Madhan Street', 'Vellore', 612500, '2005-01-01', 1234567890),
('prakashdayalans@gmail.com', 'Prakash', 'S', '$2y$10$b3m5dZsqiy5Tt.u2KN8ER.vv7FIaD2Lt52NPmnEw/iLmMrdNRb1oS', 'Male', '123', 'Madhan Street', 'Vellore', 612500, '2005-01-01', 1234567890);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complaintsreply`
--
ALTER TABLE `complaintsreply`
  ADD PRIMARY KEY (`complaintid`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`foodid`);

--
-- Indexes for table `foodcomplaint`
--
ALTER TABLE `foodcomplaint`
  ADD PRIMARY KEY (`complaintid`);

--
-- Indexes for table `fuotp`
--
ALTER TABLE `fuotp`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `hoteluser`
--
ALTER TABLE `hoteluser`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `hotp`
--
ALTER TABLE `hotp`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `huotp`
--
ALTER TABLE `huotp`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uotp`
--
ALTER TABLE `uotp`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
