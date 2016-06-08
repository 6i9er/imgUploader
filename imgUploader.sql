-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 08, 2016 at 07:09 PM
-- Server version: 5.5.49-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `imgUploader`
--

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `image_id` int(11) NOT NULL AUTO_INCREMENT,
  `path` varchar(255) NOT NULL,
  `image_order` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`image_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`image_id`, `path`, `image_order`, `created_at`, `updated_at`) VALUES
(1, 'Screenshot from 2016-02-02 04:52:55_1465244589.png', 1, '2016-06-08 16:07:11', '2016-06-06 18:23:09'),
(2, 'Screenshot from 2016-04-25 10:47:43_1465244589.png', 15, '2016-06-08 16:07:12', '2016-06-06 18:23:09'),
(4, 'Screenshot from 2016-02-02 04:52:55_1465305605.png', 13, '2016-06-08 16:07:12', '2016-06-07 11:20:05'),
(5, 'Screenshot from 2016-04-25 10:47:43_1465305605.png', 14, '2016-06-08 16:07:12', '2016-06-07 11:20:05'),
(6, 'Screenshot from 2016-06-05 14:44:15_1465305605.png', 11, '2016-06-08 16:07:12', '2016-06-07 11:20:05'),
(8, 'Screenshot from 2016-06-05 14:44:15_1465393620.png', 12, '2016-06-08 16:07:12', '2016-06-08 11:47:00'),
(10, 'Screenshot from 2016-06-05 14:44:15_1465394024.png', 8, '2016-06-08 16:07:12', '2016-06-08 11:53:44'),
(15, 'Screenshot from 2016-04-25 10:47:43_1465401997.png', 4, '2016-06-08 16:07:11', '0000-00-00 00:00:00'),
(18, 'Screenshot from 2016-04-25 10:47:43_1465402071.png', 0, '2016-06-08 16:07:51', '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
