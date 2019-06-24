-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 24, 2019 at 02:17 PM
-- Server version: 5.7.26-0ubuntu0.16.04.1
-- PHP Version: 7.0.33-0ubuntu0.16.04.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `salary_db`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `avg_sal` (OUT `avg_sal` DECIMAL)  BEGIN
    select avg(sal) into avg_sal from salary;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `CreateUser` (IN `firstName` VARCHAR(64))  BEGIN
   INSERT INTO user(f_name) values(firstName);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `DEPT` ()  SELECT * FROM `tbl_department`$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GetAllDepartments` ()  BEGIN
   SELECT *  FROM  user join tbl_user_account on user.user_id = tbl_user_account.user_id  ;
   END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `empid` int(11) NOT NULL,
  `sal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_department`
--

CREATE TABLE `tbl_department` (
  `id` int(11) NOT NULL,
  `department_name` varchar(65) NOT NULL,
  `comission_percentage` float NOT NULL,
  `allevence_payable` float NOT NULL,
  `last_month_deduction` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_department`
--

INSERT INTO `tbl_department` (`id`, `department_name`, `comission_percentage`, `allevence_payable`, `last_month_deduction`) VALUES
(8, 'Physics', 1000, 100, 10),
(9, 'Chemistry', 1000, 10, 10);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payable_tax_charge`
--

CREATE TABLE `tbl_payable_tax_charge` (
  `id` int(11) NOT NULL,
  `payable_salary` float DEFAULT NULL,
  `tax_percentage` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_payable_tax_charge`
--

INSERT INTO `tbl_payable_tax_charge` (`id`, `payable_salary`, `tax_percentage`) VALUES
(1, 110090, 10),
(2, 330090, 12);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_account`
--

CREATE TABLE `tbl_user_account` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `salary_amount` float DEFAULT NULL,
  `basic_salary` float DEFAULT NULL,
  `tax_value` float DEFAULT NULL,
  `month` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_account`
--

INSERT INTO `tbl_user_account` (`id`, `user_id`, `salary_amount`, `basic_salary`, `tax_value`, `month`) VALUES
(18, 1, 110090, 110090, 11009, 1),
(19, 2, 330090, 330090, 39610.8, 1),
(20, 1, 110090, 110090, 11009, 2),
(21, 2, 330090, 330090, 39610.8, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_type`
--

CREATE TABLE `tbl_user_type` (
  `id` int(11) NOT NULL,
  `user_type_name` varchar(55) DEFAULT NULL,
  `basic_salary` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_type`
--

INSERT INTO `tbl_user_type` (`id`, `user_type_name`, `basic_salary`) VALUES
(1, 'Accountant', 10000),
(2, 'Manager', 30000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `f_name` varchar(65) DEFAULT NULL,
  `l_name` varchar(65) DEFAULT NULL,
  `email_id` varchar(25) DEFAULT NULL,
  `username` varchar(60) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `user_type_id` int(10) DEFAULT NULL,
  `dept_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `f_name`, `l_name`, `email_id`, `username`, `password`, `user_type_id`, `dept_id`) VALUES
(1, 'san', 'sa', 'admin@gmail.com', NULL, '12345', 1, 8),
(2, 'Jhon', NULL, 'jhon@gmail.com', NULL, '12345', 2, 8),
(3, 'Ramesh', 'Kumar', 'jhon@gmail.com', NULL, '12345', 2, 8),
(4, 'test', NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'ddd', NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'aaa', NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'test', NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`empid`);

--
-- Indexes for table `tbl_department`
--
ALTER TABLE `tbl_department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_payable_tax_charge`
--
ALTER TABLE `tbl_payable_tax_charge`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_account`
--
ALTER TABLE `tbl_user_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_type`
--
ALTER TABLE `tbl_user_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_department`
--
ALTER TABLE `tbl_department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_payable_tax_charge`
--
ALTER TABLE `tbl_payable_tax_charge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_user_account`
--
ALTER TABLE `tbl_user_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_user_type`
--
ALTER TABLE `tbl_user_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
