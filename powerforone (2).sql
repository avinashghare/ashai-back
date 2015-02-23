-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2015 at 01:19 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `powerforone`
--
CREATE DATABASE IF NOT EXISTS `powerforone` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `powerforone`;

-- --------------------------------------------------------

--
-- Table structure for table `accesslevel`
--

CREATE TABLE IF NOT EXISTS `accesslevel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `accesslevel`
--

INSERT INTO `accesslevel` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'Operator'),
(3, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE IF NOT EXISTS `blog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `blogcategory` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `blogcategory`, `title`, `image`, `description`, `timestamp`) VALUES
(1, 1, 'demo', 'event48821.jpg', 'ahsgxbhas', '2015-02-21 12:14:47');

-- --------------------------------------------------------

--
-- Table structure for table `blogcategory`
--

CREATE TABLE IF NOT EXISTS `blogcategory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `blogcategory`
--

INSERT INTO `blogcategory` (`id`, `name`) VALUES
(1, 'demo'),
(2, 'dmeo2');

-- --------------------------------------------------------

--
-- Table structure for table `logintype`
--

CREATE TABLE IF NOT EXISTS `logintype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `logintype`
--

INSERT INTO `logintype` (`id`, `name`) VALUES
(1, 'Facebook'),
(2, 'Twitter'),
(3, 'Email'),
(4, 'Google');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `keyword` varchar(255) NOT NULL,
  `url` text NOT NULL,
  `linktype` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `isactive` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `icon` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `description`, `keyword`, `url`, `linktype`, `parent`, `isactive`, `order`, `icon`) VALUES
(1, 'Users', '', '', 'site/viewusers', 1, 0, 1, 1, 'icon-user'),
(4, 'Dashboard', '', '', 'site/index', 1, 0, 1, 0, 'icon-dashboard'),
(5, 'Category', '', '', 'site/viewcategory', 1, 0, 1, 2, 'icon-dashboard'),
(6, 'Project', '', '', 'site/viewproject', 1, 0, 1, 3, 'icon-dashboard'),
(7, 'NGO', '', '', 'site/viewngo', 1, 0, 1, 4, 'icon-dashboard'),
(8, 'Advertiser', '', '', 'site/viewadvertiser', 1, 0, 1, 5, 'icon-dashboard'),
(9, 'Coupon', '', '', 'site/viewcoupon', 1, 0, 1, 6, 'icon-dashboard'),
(10, 'Order', '', '', 'site/vieworder', 1, 0, 1, 7, 'icon-dashboard');

-- --------------------------------------------------------

--
-- Table structure for table `menuaccess`
--

CREATE TABLE IF NOT EXISTS `menuaccess` (
  `menu` int(11) NOT NULL,
  `access` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menuaccess`
--

INSERT INTO `menuaccess` (`menu`, `access`) VALUES
(1, 1),
(4, 1),
(2, 1),
(3, 1),
(5, 1),
(6, 1),
(7, 1),
(7, 3),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ordercoupon`
--

CREATE TABLE IF NOT EXISTS `ordercoupon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order` int(11) NOT NULL,
  `coupon` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `ordercoupon`
--

INSERT INTO `ordercoupon` (`id`, `order`, `coupon`) VALUES
(1, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `orderstatus`
--

CREATE TABLE IF NOT EXISTS `orderstatus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `orderstatus`
--

INSERT INTO `orderstatus` (`id`, `name`) VALUES
(1, 'Pending'),
(2, 'Confirm'),
(3, 'Cancel'),
(4, 'Refund Applied'),
(5, 'Refunded');

-- --------------------------------------------------------

--
-- Table structure for table `powerforone_advertiser`
--

CREATE TABLE IF NOT EXISTS `powerforone_advertiser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `json` text NOT NULL,
  `views` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `powerforone_advertiser`
--

INSERT INTO `powerforone_advertiser` (`id`, `name`, `json`, `views`, `image`) VALUES
(1, 'Advertiser1', 'advertiser json', 'views', ''),
(2, 'Advertiser2', 'Advertiser2 Json', 'Advertiser Json', ''),
(3, 'scs', 'qcww', 'wecw', 'Nature_at_its_Best!!!1.png'),
(4, '2', '[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":"3"},{"label":"Meta Description","type":"textarea","classes":"","placeholder":"","value":"3"},{"label":"Meta Keywords","type":"textarea","classes":"","placeholder":"","value":"23"}]', '2', 'nav.png');

-- --------------------------------------------------------

--
-- Table structure for table `powerforone_category`
--

CREATE TABLE IF NOT EXISTS `powerforone_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `json` text NOT NULL,
  `order` int(11) NOT NULL,
  `views` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `powerforone_category`
--

INSERT INTO `powerforone_category` (`id`, `name`, `parent`, `json`, `order`, `views`, `image`, `description`) VALUES
(1, 'Parent', NULL, 'json', 1, 'views', '', ''),
(3, 'child1', 1, 'jabsxiasubcaiusbias', 1, 'aas', 'Nature_at_its_Best!!!.png', ''),
(4, 'demo', 1, 'sdc skjdc', 1, '123', 'Nature_at_its_Best!!!5.png', 'demo'),
(5, 'avinash', 1, '[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":"amt"},{"label":"Meta Description","type":"textarea","classes":"","placeholder":"","value":"amd"},{"label":"Meta Keywords","type":"textarea","classes":"","placeholder":"","value":"amk"}]', 1, 'avinash', '', 'avinash');

-- --------------------------------------------------------

--
-- Table structure for table `powerforone_coupon`
--

CREATE TABLE IF NOT EXISTS `powerforone_coupon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `order` int(11) NOT NULL,
  `json` text NOT NULL,
  `text` text NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `expirydate` date NOT NULL,
  `couponcode` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `powerforone_coupon`
--

INSERT INTO `powerforone_coupon` (`id`, `name`, `order`, `json`, `text`, `description`, `image`, `expirydate`, `couponcode`) VALUES
(1, 'Coupon1', 1, 'Coupon Json', 'Coupon text', 'coupon description', '', '0000-00-00', ''),
(2, 'k kwc', 1, 'wjnecwj', 'kwmeclwk', 'kemlwk', 'Nature_at_its_Best!!!2.png', '2015-01-25', 'A33'),
(3, 'demooooooo', 1, 'dcsdc', 'dscs', 'csdcd', 'Nature_at_its_Best!!!6.png', '2015-01-24', 'A12'),
(4, '2', 2, '[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":"32"},{"label":"Meta Description","type":"textarea","classes":"","placeholder":"","value":"32"},{"label":"Meta Keywords","type":"textarea","classes":"","placeholder":"","value":"32"}]', '2', '2', 'nav1.png', '2015-02-20', '2');

-- --------------------------------------------------------

--
-- Table structure for table `powerforone_ngo`
--

CREATE TABLE IF NOT EXISTS `powerforone_ngo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `json` text NOT NULL,
  `status` int(11) NOT NULL,
  `website` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `powerforone_ngo`
--

INSERT INTO `powerforone_ngo` (`id`, `name`, `address`, `email`, `json`, `status`, `website`) VALUES
(1, 'NGO', 'Karjat Raigad', 'ngo@ngo.com', 'json for ngo', 1, 'ngowebsite.com'),
(2, 'NGO2', 'akjkas ckjasbc', 'ngo2@ngo.com', 'json for ngo2', 2, 'ngo2.com'),
(3, '2', '2', '2@2.com', '[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":"2"},{"label":"Meta Description","type":"textarea","classes":"","placeholder":"","value":"2"},{"label":"Meta Keywords","type":"textarea","classes":"","placeholder":"","value":"2"}]', 1, '2'),
(4, '2', '2', '2@2.com', '[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":"3"},{"label":"Meta Description","type":"textarea","classes":"","placeholder":"","value":"3"},{"label":"Meta Keywords","type":"textarea","classes":"","placeholder":"","value":"3"}]', 1, '2');

-- --------------------------------------------------------

--
-- Table structure for table `powerforone_order`
--

CREATE TABLE IF NOT EXISTS `powerforone_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user` int(11) NOT NULL,
  `amount` double NOT NULL,
  `ngo` int(11) NOT NULL,
  `project` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `powerforone_order`
--

INSERT INTO `powerforone_order` (`id`, `name`, `email`, `user`, `amount`, `ngo`, `project`, `status`) VALUES
(1, 'Demo', 'chintsn@wohlig.co', 1, 1, 1, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `powerforone_project`
--

CREATE TABLE IF NOT EXISTS `powerforone_project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `category` int(11) NOT NULL,
  `ngo` int(11) NOT NULL,
  `advertiser` int(11) NOT NULL,
  `json` text NOT NULL,
  `like` int(11) NOT NULL,
  `share` int(11) NOT NULL,
  `follow` int(11) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `google` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `order` int(11) NOT NULL,
  `views` varchar(255) NOT NULL,
  `video` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `contribution` varchar(255) NOT NULL,
  `times` varchar(255) NOT NULL,
  `donate` varchar(255) NOT NULL,
  `tagline` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `powerforone_project`
--

INSERT INTO `powerforone_project` (`id`, `name`, `category`, `ngo`, `advertiser`, `json`, `like`, `share`, `follow`, `facebook`, `twitter`, `google`, `status`, `order`, `views`, `video`, `image`, `content`, `contribution`, `times`, `donate`, `tagline`) VALUES
(1, 'Project1', 1, 1, 1, 'ksjcnksajc', 10, 9, 11, 'fb.com', 'tw.com', 'gogl.com', '2', 1, 'views', 'videourl', '', '', '', '', '', ''),
(2, '1', 3, 1, 1, '[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":"bbb"},{"label":"Meta Description","type":"textarea","classes":"","placeholder":"","value":"bbb"},{"label":"Meta Keywords","type":"textarea","classes":"","placeholder":"","value":"bbb"}]', 2, 2, 2, '2', '2', '2', '1', 2, '2', '2', '', '', '', '', '', ''),
(3, '9', 1, 1, 1, '[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":"9"},{"label":"Meta Description","type":"textarea","classes":"","placeholder":"","value":"9"},{"label":"Meta Keywords","type":"textarea","classes":"","placeholder":"","value":"9"}]', 9, 1, 9, '9', '9', '9', '1', 9, '9', '9', 'event4881.jpg', '9', '9', '9', '1', '0');

-- --------------------------------------------------------

--
-- Table structure for table `projectdatapoint`
--

CREATE TABLE IF NOT EXISTS `projectdatapoint` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `project` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `projectdatapoint`
--

INSERT INTO `projectdatapoint` (`id`, `name`, `project`, `image`) VALUES
(1, 'dddmo', 1, '31.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `projectenquiry`
--

CREATE TABLE IF NOT EXISTS `projectenquiry` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user` int(11) NOT NULL,
  `comment` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `project` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `projectenquiry`
--

INSERT INTO `projectenquiry` (`id`, `name`, `email`, `user`, `comment`, `timestamp`, `project`) VALUES
(1, 'Avinash', 'avinash@wohlig.com', 1, 'testing', '2015-01-05 12:26:51', 1),
(2, 'jhbjh', 'a@a.com', 14, '1bkjbkj', '2015-01-05 16:32:02', 1);

-- --------------------------------------------------------

--
-- Table structure for table `projectimage`
--

CREATE TABLE IF NOT EXISTS `projectimage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `projectimage`
--

INSERT INTO `projectimage` (`id`, `project`, `image`) VALUES
(1, 1, 'Nature_at_its_Best!!!4.png');

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE IF NOT EXISTS `statuses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `name`) VALUES
(1, 'inactive'),
(2, 'Active'),
(3, 'Waiting'),
(4, 'Active Waiting'),
(5, 'Blocked');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `accesslevel` int(11) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `socialid` varchar(255) NOT NULL,
  `logintype` int(11) NOT NULL,
  `json` text NOT NULL,
  `dob` date NOT NULL,
  `street` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `google` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `password`, `email`, `accesslevel`, `timestamp`, `status`, `image`, `username`, `socialid`, `logintype`, `json`, `dob`, `street`, `address`, `city`, `state`, `country`, `pincode`, `facebook`, `google`, `twitter`) VALUES
(1, 'wohlig', 'a63526467438df9566c508027d9cb06b', 'wohlig@wohlig.com', 1, '0000-00-00 00:00:00', 1, NULL, '', '', 0, '', '0000-00-00', '', '', '', '', '', '', '', '', ''),
(4, 'pratik', '0cb2b62754dfd12b6ed0161d4b447df7', 'pratik@wohlig.com', 1, '2014-05-12 06:52:44', 1, NULL, 'pratik', '1', 1, '', '0000-00-00', '', '', '', '', '', '', '', '', ''),
(5, 'wohlig123', 'wohlig123', 'wohlig1@wohlig.com', 1, '2014-05-12 06:52:44', 1, NULL, '', '', 0, '', '0000-00-00', '', '', '', '', '', '', '', '', ''),
(6, 'wohlig1', 'a63526467438df9566c508027d9cb06b', 'wohlig2@wohlig.com', 1, '2014-05-12 06:52:44', 1, NULL, '', '', 0, '', '0000-00-00', '', '', '', '', '', '', '', '', ''),
(7, 'Avinash', '7b0a80efe0d324e937bbfc7716fb15d3', 'avinash@wohlig.com', 1, '2014-10-17 06:22:29', 1, NULL, '', '', 0, '', '0000-00-00', '', '', '', '', '', '', '', '', ''),
(9, 'avinash', 'a208e5837519309129fa466b0c68396b', 'a@email.com', 2, '2014-12-03 11:06:19', 3, '', '', '123', 1, 'demojson', '0000-00-00', '', '', '', '', '', '', '', '', ''),
(13, 'aaa', 'a208e5837519309129fa466b0c68396b', 'aaa3@email.com', 3, '2014-12-04 06:55:42', 3, NULL, '', '1', 2, 'userjson', '0000-00-00', '', '', '', '', '', '', '', '', ''),
(14, 'Rohan Patil', 'aeae5b2f900e84d784a0f0111e650835', 'rohan@gmail.com', 1, '2015-01-04 10:20:37', 2, '', '', '1', 1, 'demojson', '2015-01-15', 'kacheri street', 'yashodatt apt', 'karjat', 'Maharashtra', 'India', '410201', 'rohan09@fb.com', 'rohan@google.com', '#rohand'),
(15, 'avinash', 'a208e5837519309129fa466b0c68396b', 'avinash@avinash.com', 1, '2015-02-03 17:19:36', 1, '', '', '1', 1, '[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":"metatitle"},{"label":"Meta Description","type":"textarea","classes":"","placeholder":"","value":"metadesc"},{"label":"Meta Keywords","type":"textarea","classes":"","placeholder":"","value":"metakey"}]', '2015-02-04', '1', '1', '1', '1', '1', '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE IF NOT EXISTS `userlog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `onuser` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `onuser`, `status`, `description`, `timestamp`) VALUES
(1, 1, 1, 'User Address Edited', '2014-05-12 06:50:21'),
(2, 1, 1, 'User Details Edited', '2014-05-12 06:51:43'),
(3, 1, 1, 'User Details Edited', '2014-05-12 06:51:53'),
(4, 4, 1, 'User Created', '2014-05-12 06:52:44'),
(5, 4, 1, 'User Address Edited', '2014-05-12 12:31:48'),
(6, 23, 2, 'User Created', '2014-10-07 06:46:55'),
(7, 24, 2, 'User Created', '2014-10-07 06:48:25'),
(8, 25, 2, 'User Created', '2014-10-07 06:49:04'),
(9, 26, 2, 'User Created', '2014-10-07 06:49:16'),
(10, 27, 2, 'User Created', '2014-10-07 06:52:18'),
(11, 28, 2, 'User Created', '2014-10-07 06:52:45'),
(12, 29, 2, 'User Created', '2014-10-07 06:53:10'),
(13, 30, 2, 'User Created', '2014-10-07 06:53:33'),
(14, 31, 2, 'User Created', '2014-10-07 06:55:03'),
(15, 32, 2, 'User Created', '2014-10-07 06:55:33'),
(16, 33, 2, 'User Created', '2014-10-07 06:59:32'),
(17, 34, 2, 'User Created', '2014-10-07 07:01:18'),
(18, 35, 2, 'User Created', '2014-10-07 07:01:50'),
(19, 34, 2, 'User Details Edited', '2014-10-07 07:04:34'),
(20, 18, 2, 'User Details Edited', '2014-10-07 07:05:11'),
(21, 18, 2, 'User Details Edited', '2014-10-07 07:05:45'),
(22, 18, 2, 'User Details Edited', '2014-10-07 07:06:03'),
(23, 7, 6, 'User Created', '2014-10-17 06:22:29'),
(24, 7, 6, 'User Details Edited', '2014-10-17 06:32:22'),
(25, 7, 6, 'User Details Edited', '2014-10-17 06:32:37'),
(26, 8, 6, 'User Created', '2014-11-15 12:05:52'),
(27, 9, 6, 'User Created', '2014-12-02 10:46:36'),
(28, 9, 6, 'User Details Edited', '2014-12-02 10:47:34'),
(29, 4, 6, 'User Details Edited', '2014-12-03 10:34:49'),
(30, 4, 6, 'User Details Edited', '2014-12-03 10:36:34'),
(31, 4, 6, 'User Details Edited', '2014-12-03 10:36:49'),
(32, 8, 6, 'User Details Edited', '2014-12-03 10:47:16');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
