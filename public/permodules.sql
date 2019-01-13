-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 30, 2018 at 10:05 AM
-- Server version: 5.7.22-0ubuntu0.16.04.1
-- PHP Version: 7.2.11-2+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dynamicdb1`
--

--
-- Dumping data for table `permodules`
--

INSERT INTO `permodules` (`id`, `modulename`, `pername`, `active`, `created_at`, `updated_at`) VALUES
(1, 'electioncommission', 'pollingformshow', 'yes', '2018-11-29 18:30:00', '2018-11-29 18:30:00'),
(2, 'electioncommission', 'pollingformedit', 'yes', '2018-11-29 18:30:00', '2018-11-29 18:30:00'),
(3, 'electioncommission', 'pollingitemdelete', 'yes', '2018-11-29 18:30:00', '2018-11-29 18:30:00');
(3, 'electioncommission', 'pollingdisplaylink', 'yes', '2018-11-29 18:30:00', '2018-11-29 18:30:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
