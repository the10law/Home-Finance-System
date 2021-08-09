-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2021 at 06:49 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `home_finance`
--

-- --------------------------------------------------------

--
-- Table structure for table `balance`
--

CREATE TABLE `balance` (
  `person` varchar(20) NOT NULL,
  `balance_amt` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `balance`
--

INSERT INTO `balance` (`person`, `balance_amt`) VALUES
('Angelish', 16966),
('Chandan', 79831),
('jeswin', 2097777576),
('Rahul', 199400),
('Rohan', 0);

--
-- Triggers `balance`
--
DELIMITER $$
CREATE TRIGGER `balance_new_person` AFTER INSERT ON `balance` FOR EACH ROW insert into login values(new.person,new.person,new.person)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `date` date NOT NULL,
  `category` varchar(20) NOT NULL,
  `specific_item` varchar(100) NOT NULL,
  `amount` varchar(20) NOT NULL,
  `paid_by` varchar(50) NOT NULL,
  `pay_method` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`date`, `category`, `specific_item`, `amount`, `paid_by`, `pay_method`) VALUES
('2018-10-01', 'Entertainment/Hotel', 'food', '169', 'Chandan', 'Cash'),
('2018-10-01', 'Entertainment/Hotel', 'food', '169', 'Chandan', 'Cash'),
('2018-10-03', 'Vegetables', 'vegie', '800', 'Angelish', 'Cash'),
('2018-09-01', 'Vegetables', 'asdfads', '1234', 'Angelish', 'Cash'),
('2018-11-01', 'Vegetables', 'carrot', '600', 'Rahul', 'Credit Card'),
('2018-11-02', 'Groceries', 'carrot', '6000', 'Angelish', 'Cash'),
('2020-02-05', 'Entertainment/Hotel', 'Oyo', '1098978', 'jeswin', 'Cash');

--
-- Triggers `expense`
--
DELIMITER $$
CREATE TRIGGER `expense_balance` AFTER INSERT ON `expense` FOR EACH ROW update balance set balance_amt=balance_amt-new.amount WHERE balance.person=new.paid_by
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE `income` (
  `date` date NOT NULL,
  `person` varchar(30) NOT NULL,
  `month` varchar(10) NOT NULL,
  `amount` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `income`
--

INSERT INTO `income` (`date`, `person`, `month`, `amount`) VALUES
('2018-10-14', 'Rahul', 'September', '6000'),
('2018-10-01', 'Chandan', 'September', '50000'),
('2018-10-03', 'Angelish', 'September', '50000'),
('2018-10-01', 'Chandan', 'August', '80000'),
('2018-10-02', 'Angelish', 'October', '25000'),
('2019-01-04', 'Rahul', 'March', '100000'),
('2020-01-09', 'Rahul', 'January', '100000');

--
-- Triggers `income`
--
DELIMITER $$
CREATE TRIGGER `income_balance` AFTER INSERT ON `income` FOR EACH ROW update balance set balance_amt=balance_amt+new.amount WHERE balance.person=new.person
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `person` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`person`, `username`, `password`) VALUES
('Angelish', 'angelish', 'angelish'),
('Chandan', 'chandan', 'chandan'),
('jeswin', 'jeswin', 'jeswin'),
('Rahul', 'rahul', 'rahul'),
('Rohan', 'rohan', 'rohan');

-- --------------------------------------------------------

--
-- Table structure for table `withdrawal`
--

CREATE TABLE `withdrawal` (
  `date` date NOT NULL,
  `person` varchar(30) NOT NULL,
  `amount` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `withdrawal`
--

INSERT INTO `withdrawal` (`date`, `person`, `amount`) VALUES
('2018-10-01', 'Chandan', '4000'),
('2018-10-11', 'Rahul', '3000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `balance`
--
ALTER TABLE `balance`
  ADD PRIMARY KEY (`person`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`person`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
