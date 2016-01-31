-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 06, 2016 at 11:46 AM
-- Server version: 5.5.46-0ubuntu0.14.04.2
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `entsol`
--

--
-- Dumping data for table `article`
--

INSERT INTO `ac_group_one` (`id`, `code`, `title`, `description`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, '101', 'FIXED ASSETS', '', 'active', '2014-11-05 10:37:45', '0000-00-00 00:00:00', '1', ''),
(2, '102', 'DEPRECIATION', '', 'active', '2014-11-05 10:37:53', '0000-00-00 00:00:00', '1', ''),
(3, '104', 'CASH & BANK', '', 'active', '2014-11-05 10:37:54', '0000-00-00 00:00:00', '1', ''),
(4, '105', 'OTHER MISCELLANEOUS ASSETS', '', 'active', '2014-11-05 10:37:54', '0000-00-00 00:00:00', '1', ''),
(5, '201', 'FUNDS OR GRANTS', '', 'active', '2014-11-05 10:37:55', '0000-00-00 00:00:00', '1', ''),
(6, '202', 'LONG TERM LIABILITIES', '', 'active', '2014-11-05 10:37:55', '0000-00-00 00:00:00', '1', ''),
(7, '203', 'CURRENT LIABILITIES', '', 'active', '2014-11-05 10:37:56', '0000-00-00 00:00:00', '1', ''),
(8, '301', 'OPERATIONAL REVENUES', '', 'active', '2014-11-05 10:37:56', '0000-00-00 00:00:00', '1', ''),
(9, '302', 'REVENUES GRANTS', '', 'active', '2014-11-05 10:37:57', '0000-00-00 00:00:00', '1', ''),
(10, '303', 'MISCELLANEOUS REVENUES', '', 'active', '2014-11-05 10:37:57', '0000-00-00 00:00:00', '1', ''),
(11, '401', 'COSTS OF GOODS SOLD (COGS)', '', 'active', '2014-11-05 10:37:58', '0000-00-00 00:00:00', '1', ''),
(12, '402', 'SG&A EXPENDITURES', '', 'active', '2014-11-05 10:37:58', '0000-00-00 00:00:00', '1', ''),
(13, '403', 'FINANCIAL EXPENSES', '', 'active', '2014-11-05 10:38:00', '0000-00-00 00:00:00', '1', ''),
(14, '404', 'OTHER MISCELLANEOUS EXPENSES', '', 'active', '2014-11-05 10:37:59', '0000-00-00 00:00:00', '1', ''),
(15, '103', 'CURRENT ASSETS', '', 'active', '2014-11-17 13:59:00', '0000-00-00 00:00:00', '1', '');