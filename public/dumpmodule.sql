-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 29, 2018 at 05:49 PM
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
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `modulename`, `mdisplay_name`, `mdescription`, `mstatus`, `created_at`, `updated_at`, `mmstatus`) VALUES
(1, 'electioncommission', 'Election Commission', 'Polling Details', 'uninstalled', 'now()', 'now()', 'inactive');
INSERT INTO `modules` (`id`, `modulename`, `mdisplay_name`, `mdescription`, `mstatus`, `created_at`, `updated_at`, `mmstatus`) VALUES
(2, 'cms', 'Content Managaement System', 'Content Managaement System', 'uninstalled', 'now()', 'now()', 'inactive');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
