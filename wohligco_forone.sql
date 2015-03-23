-- phpMyAdmin SQL Dump
-- version 4.0.10.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 21, 2015 at 07:26 AM
-- Server version: 5.6.21
-- PHP Version: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wohligco_forone`
--

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
-- Table structure for table `contactus`
--

CREATE TABLE IF NOT EXISTS `contactus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `name`, `contact`, `email`, `country`, `city`, `message`, `timestamp`) VALUES
(1, 'Avinash', '8989878788', 'avinash@wohlig.com', 'India', 'Mumbai', 'Demo Message', '2015-03-06 03:38:08'),
(2, 'Mahesh', '8787878988', 'mahesh@wohlig.com', 'India', 'Kalyan', 'Demooooo44', '2015-03-06 08:04:36');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `description`, `keyword`, `url`, `linktype`, `parent`, `isactive`, `order`, `icon`) VALUES
(1, 'Users', '', '', 'site/viewusers', 1, 0, 1, 1, 'icon-user'),
(4, 'Dashboard', '', '', 'site/index', 1, 0, 1, 0, 'icon-dashboard'),
(5, 'Category', '', '', 'site/viewcategory', 1, 0, 1, 2, 'icon-dashboard'),
(6, 'Project', '', '', 'site/viewproject', 1, 0, 1, 3, 'icon-dashboard'),
(7, 'NGO', '', '', 'site/viewngo', 1, 0, 1, 4, 'icon-dashboard'),
(8, 'Cooperator', '', '', 'site/viewadvertiser', 1, 0, 1, 5, 'icon-dashboard'),
(9, 'Coupon', '', '', 'site/viewcoupon', 1, 0, 1, 6, 'icon-dashboard'),
(10, 'Orders', '', '', 'site/vieworder', 1, 0, 1, 7, 'icon-dashboard'),
(11, 'Testimonial', '', '', 'site/viewtestimonial', 1, 0, 1, 8, 'icon-dashboard'),
(12, 'Contact Us', '', '', 'site/viewcontactus', 1, 0, 1, 9, 'icon-dashboard'),
(13, 'Static Pages', '', '', 'site/viewstaticpage', 1, 0, 1, 10, 'icon-dashboard'),
(14, 'PFO Apply', '', '', 'site/viewpfo', 1, 0, 1, 11, 'icon-dashboard'),
(15, 'Work With Us', '', '', 'site/viewworkwithus', 1, 0, 1, 12, 'icon-dashboard'),
(16, 'News Letter', '', '', 'site/viewnewsletter', 1, 0, 1, 13, 'icon-dashboard');

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
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1);

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE IF NOT EXISTS `newsletter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`id`, `email`, `timestamp`) VALUES
(1, 'avinash@wohlig.com', '2015-03-06 02:40:38'),
(2, 'avinashghare572@gmail.com', '2015-03-06 02:40:38');

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
-- Table structure for table `pfo`
--

CREATE TABLE IF NOT EXISTS `pfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `pfo`
--

INSERT INTO `pfo` (`id`, `name`, `contact`, `email`, `country`, `city`, `message`, `timestamp`) VALUES
(1, 'Avinash', '9898878788', 'avinash@email.com', 'India', 'Mumbai', 'Demo', '2015-03-06 13:03:14'),
(2, 'info', '2232', '2@2.com', 'India', 'kalyan1', 'nijniu', '2015-03-06 13:10:25');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `powerforone_category`
--

INSERT INTO `powerforone_category` (`id`, `name`, `parent`, `json`, `order`, `views`, `image`, `description`) VALUES
(1, 'Education', 0, '<p>json</p>', 1, '0', 'education.jpg', '0'),
(3, 'CHILD WELFARE', 0, '<p>jabsxiasubcaiusbias</p>', 2, '0', 'walefare.jpg', '0'),
(4, 'EMPLOYMENT', 0, '<p>sdc skjdc</p>', 3, '0', 'employment.jpg', '0'),
(5, 'ENVIRONMENT AND ANIMAL WELFARE', 0, '<p>[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":"amt"},{"label":"Meta Description","type":"textarea","classes":"","placeholder":"","value":"amd"},{"label":"Meta Keywords","type":"textarea","classes":"","placeholder":"","value":"amk"}]</p>', 4, '0', 'environment.jpg', '0'),
(6, 'HEALTH AND SANITATION', 0, '<p>[{"placeholder":"","value":"","label":"SEO Title","type":"text","options":"","classes":""},{"placeholder":"","value":"","label":"SEO Description","type":"textarea","options":"","classes":""},{"placeholder":"","value":"","label":"SEO Keywords","type":"textarea","options":"","classes":""}]</p>', 5, '0', 'healthandsanitation.jpg', '0'),
(7, 'WELFARE OF THE ELDERLY', 0, '<p>[{"placeholder":"","value":"","label":"SEO Title","type":"text","options":"","classes":""},{"placeholder":"","value":"","label":"SEO Description","type":"textarea","options":"","classes":""},{"placeholder":"","value":"","label":"SEO Keywords","type":"textarea","options":"","classes":""}]</p>', 6, '0', 'welfareofedlerly.jpg', '0'),
(8, 'WOMAN EMPOWERMENT', 0, '<p>[{"placeholder":"","value":"","label":"SEO Title","type":"text","options":"","classes":""},{"placeholder":"","value":"","label":"SEO Description","type":"textarea","options":"","classes":""},{"placeholder":"","value":"","label":"SEO Keywords","type":"textarea","options":"","classes":""}]</p>', 7, '0', 'womaneempowerment.jpg', '0');

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
  `companyname` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `powerforone_coupon`
--

INSERT INTO `powerforone_coupon` (`id`, `name`, `order`, `json`, `text`, `description`, `image`, `expirydate`, `couponcode`, `companyname`) VALUES
(1, 'Coupon1', 1, 'Coupon Json', 'Coupon text', 'coupon description', '', '2015-03-13', '', 'demo'),
(2, 'k kwc', 1, 'wjnecwj', 'kwmeclwk', 'kemlwk', 'Nature_at_its_Best!!!2.png', '2015-01-25', 'A33', ''),
(3, 'demooooooo', 1, 'dcsdc', 'dscs', 'csdcd', 'Nature_at_its_Best!!!6.png', '2015-01-24', 'A12', ''),
(4, '2', 2, '[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":"32"},{"label":"Meta Description","type":"textarea","classes":"","placeholder":"","value":"32"},{"label":"Meta Keywords","type":"textarea","classes":"","placeholder":"","value":"32"}]', '2', '2', 'nav1.png', '2015-02-20', '2', '');

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
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `powerforone_ngo`
--

INSERT INTO `powerforone_ngo` (`id`, `name`, `address`, `email`, `json`, `status`, `website`, `image`) VALUES
(1, 'Tata Services', '<p>Karjat Raigad</p>', 'ngo@ngo.com', '<p>json for ngo</p>', 1, 'ngowebsite.com', ''),
(2, 'NGO2', 'akjkas ckjasbc', 'ngo2@ngo.com', 'json for ngo2', 2, 'ngo2.com', ''),
(3, '2', '2', '2@2.com', '[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":"2"},{"label":"Meta Description","type":"textarea","classes":"","placeholder":"","value":"2"},{"label":"Meta Keywords","type":"textarea","classes":"","placeholder":"","value":"2"}]', 1, '2', ''),
(4, '2', '2', '2@2.com', '[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":"3"},{"label":"Meta Description","type":"textarea","classes":"","placeholder":"","value":"3"},{"label":"Meta Keywords","type":"textarea","classes":"","placeholder":"","value":"3"}]', 1, '2', ''),
(5, '3', '3', '3@3.com', '[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":"3"},{"label":"Meta Description","type":"textarea","classes":"","placeholder":"","value":"3"},{"label":"Meta Keywords","type":"textarea","classes":"","placeholder":"","value":"3"}]', 1, '3', 'news8.jpg');

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
  `transactionid` bigint(20) NOT NULL,
  `typeofdonation` int(11) NOT NULL,
  `advertiser` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `powerforone_order`
--

INSERT INTO `powerforone_order` (`id`, `name`, `email`, `user`, `amount`, `ngo`, `project`, `status`, `transactionid`, `typeofdonation`, `advertiser`) VALUES
(1, 'Demo', 'chintsn@wohlig.com', 1, 1, 1, 1, 3, 2541524521451782368, 1, 1),
(2, '3', '3@a.com', 1, 3, 1, 2, 1, 9879878978, 0, 2);

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
  `video2` varchar(255) NOT NULL,
  `cardtagline` varchar(255) NOT NULL,
  `indiandoner` int(11) NOT NULL,
  `foreigndoner` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `powerforone_project`
--

INSERT INTO `powerforone_project` (`id`, `name`, `category`, `ngo`, `advertiser`, `json`, `like`, `share`, `follow`, `facebook`, `twitter`, `google`, `status`, `order`, `views`, `video`, `image`, `content`, `contribution`, `times`, `donate`, `tagline`, `video2`, `cardtagline`, `indiandoner`, `foreigndoner`) VALUES
(1, 'Education', 1, 1, 1, '<p>ksjcnksajc</p>', 0, 1, 11, 'fb.com', 'tw.com', 'gogl.com', '2', 1, 'views', 'videourl', 'environment1.jpg', '', '', '', '1', 'demo project', 'demo', 'demo card', 0, 1),
(2, 'CHILD WELFARE', 3, 1, 1, '<p>[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":"bbb"},{"label":"Meta Description","type":"textarea","classes":"","placeholder":"","value":"bbb"},{"label":"Meta Keywords","type":"textarea","classes":"","placeholder":"","value":"bbb"}]</p>', 0, 1, 2, '2', '2', '2', '1', 2, '2', '2', 'employment1.jpg', '', '', '', '1', '', '', '', 0, 0),
(3, 'EMPLOYMENT', 4, 2, 1, '<p>[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":"9"},{"label":"Meta Description","type":"textarea","classes":"","placeholder":"","value":"9"},{"label":"Meta Keywords","type":"textarea","classes":"","placeholder":"","value":"9"}]</p>', 0, 1, 9, '9', '9', '9', '1', 9, '9', '9', 'event4881.jpg', '<p>9</p>', '9', '9', '1', 'EMPLOYMENT to everyone', '', '', 0, 0),
(4, 'ENVIRONMENT AND ANIMAL WELFARE', 3, 2, 2, '<p>[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":"wohlig"},{"label":"Meta Description","type":"textarea","classes":"","placeholder":"","value":"wohlig"},{"label":"Meta Keywords","type":"textarea","classes":"","placeholder":"","value":"wohlig"}]</p>', 0, 1, 0, '', '', '', '1', 1, '200', 'wohlig.mp4', 'walefare1.jpg', '<p><strong style="font-family: Arial, Helvetica, sans; line-height: 14px; text-align: justify;">Lorem Ipsum</strong><span style="font-family: Arial, Helvetica, sans; line-height: 14px; text-align: justify;">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>\n<p><strong style="font-family: Arial, Helvetica, sans; line-height: 14px; text-align: justify;">Lorem Ipsum</strong><span style="font-family: Arial, Helvetica, sans; line-height: 14px; text-align: justify;">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>', '210000', '2X', '1', 'STOP CHILD WELFARE', '', 'STOP CHILD', 1, 1),
(5, 'Anand', 6, 1, 1, '<p>[{"placeholder":"","value":"","label":"SEO Title","type":"text","options":"","classes":""},{"placeholder":"","value":"","label":"SEO Description","type":"textarea","options":"","classes":""},{"placeholder":"","value":"","label":"SEO Keywords","type":"textarea","options":"","classes":""}]</p>', 0, 1, 0, 'facebook.com', 'twitter.com', 'google.com', '2', 1, '120', 'video.mp4', 'healthandsanitation1.jpg', '<div class="paragraph" style="box-sizing: border-box; color: #333333; font-family: Gotham, sans-serif; font-size: 14px; line-height: 20px;">\n<h3 style="box-sizing: border-box; font-family: inherit; font-weight: 500; line-height: 1.1; color: inherit; margin-top: 20px; margin-bottom: 10px; font-size: 24px;">PROBLEM</h3>\n<p class="parapadding" style="box-sizing: border-box; margin: 0px 0px 10px; text-align: justify; padding: 10px 0px;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere consequuntur odio, quam cupiditate natus corporis doloremque voluptatibus mollitia, fugiat laudantium impedit. Ullam ratione labore aut repellat dolores praesentium sed quae. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque non iure rerum, sunt commodi itaque earum dignissimos esse a magni quod, asperiores eaque necessitatibus ipsam placeat rem modi perspiciatis! Quae! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat saepe alias sequi tempora, ex rerum, possimus ullam ab iusto in unde. Velit, aliquid, laudantium quisquam animi corporis praesentium eligendi pariatur.</p>\n</div>\n<div class="paragraph" style="box-sizing: border-box; color: #333333; font-family: Gotham, sans-serif; font-size: 14px; line-height: 20px;">\n<h3 style="box-sizing: border-box; font-family: inherit; font-weight: 500; line-height: 1.1; color: inherit; margin-top: 20px; margin-bottom: 10px; font-size: 24px;">SOLUTION</h3>\n<p class="parapadding" style="box-sizing: border-box; margin: 0px 0px 10px; text-align: justify; padding: 10px 0px;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere consequuntur odio, quam cupiditate natus corporis doloremque voluptatibus mollitia, fugiat laudantium impedit. Ullam ratione labore aut repellat dolores praesentium sed quae. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque non iure rerum, sunt commodi itaque earum dignissimos esse a magni quod, asperiores eaque necessitatibus ipsam placeat rem modi perspiciatis! Quae! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat saepe alias sequi tempora, ex rerum, possimus ullam ab iusto in unde. Velit, aliquid, laudantium quisquam animi corporis praesentium eligendi pariatur.</p>\n</div>\n<div class="paragraph" style="box-sizing: border-box; color: #333333; font-family: Gotham, sans-serif; font-size: 14px; line-height: 20px;">\n<h3 style="box-sizing: border-box; font-family: inherit; font-weight: 500; line-height: 1.1; color: inherit; margin-top: 20px; margin-bottom: 10px; font-size: 24px;">IMPACT</h3>\n<p class="parapadding" style="box-sizing: border-box; margin: 0px 0px 10px; text-align: justify; padding: 10px 0px;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere consequuntur odio, quam cupiditate natus corporis doloremque voluptatibus mollitia, fugiat laudantium impedit. Ullam ratione labore aut repellat dolores praesentium sed quae. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque non iure rerum, sunt commodi itaque earum dignissimos esse a magni quod, asperiores eaque necessitatibus ipsam placeat rem modi perspiciatis! Quae! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat saepe alias sequi tempora, ex rerum, possimus ullam ab iusto in unde. Velit, aliquid, laudantium quisquam animi corporis praesentium eligendi pariatur.</p>\n</div>\n<div class="paragraph" style="box-sizing: border-box; color: #333333; font-family: Gotham, sans-serif; font-size: 14px; line-height: 20px;">\n<h3 style="box-sizing: border-box; font-family: inherit; font-weight: 500; line-height: 1.1; color: inherit; margin-top: 20px; margin-bottom: 10px; font-size: 24px;">OTHER WRITTEN CONTENT</h3>\n<p class="parapadding" style="box-sizing: border-box; margin: 0px 0px 10px; text-align: justify; padding: 10px 0px;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere consequuntur odio, quam cupiditate natus corporis doloremque voluptatibus mollitia, fugiat laudantium impedit. Ullam ratione labore aut repellat dolores praesentium sed quae. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque non iure rerum, sunt commodi itaque earum dignissimos esse a magni quod, asperiores eaque necessitatibus ipsam placeat rem modi perspiciatis! Quae! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat saepe alias sequi tempora, ex rerum, possimus ullam ab iusto in unde. Velit, aliquid, laudantium quisquam animi corporis praesentium eligendi pariatur.</p>\n<p class="parapadding" style="box-sizing: border-box; margin: 0px 0px 10px; text-align: justify; padding: 10px 0px;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere consequuntur odio, quam cupiditate natus corporis doloremque voluptatibus mollitia, fugiat laudantium impedit. Ullam ratione labore aut repellat dolores praesentium sed quae. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque non iure rerum, sunt commodi itaque earum dignissimos esse a magni quod, asperiores eaque necessitatibus ipsam placeat rem modi perspiciatis! Quae! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat saepe alias sequi tempora, ex rerum, possimus ullam ab iusto in unde. Velit, aliquid, laudantium quisquam animi corporis praesentium eligendi pariatur.</p>\n<p class="parapadding" style="box-sizing: border-box; margin: 0px 0px 10px; text-align: justify; padding: 10px 0px;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere consequuntur odio, quam cupiditate natus corporis doloremque voluptatibus mollitia, fugiat laudantium impedit. Ullam ratione labore aut repellat dolores praesentium sed quae. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque non iure rerum, sunt commodi itaque earum dignissimos esse a magni quod, asperiores eaque necessitatibus ipsam placeat rem modi perspiciatis! Quae! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat saepe alias sequi tempora, ex rerum, possimus ullam ab iusto in unde. Velit, aliquid, laudantium quisquam animi corporis praesentium eligendi pariatur.</p>\n<p class="parapadding" style="box-sizing: border-box; margin: 0px 0px 10px; text-align: justify; padding: 10px 0px;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere consequuntur odio, quam cupiditate natus corporis doloremque voluptatibus mollitia, fugiat laudantium impedit. Ullam ratione labore aut repellat dolores praesentium sed quae. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque non iure rerum, sunt commodi itaque earum dignissimos esse a magni quod, asperiores eaque necessitatibus ipsam placeat rem modi perspiciatis! Quae! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat saepe alias sequi tempora, ex rerum, possimus ullam ab iusto in unde. Velit, aliquid, laudantium quisquam animi corporis praesentium eligendi pariatur.</p>\n</div>', 'Rs.2,30,0000', '2X', '1', 'Help Anand get clean water in', '', 'Help Anand', 1, 1),
(6, 'Salman', 1, 1, 1, '<p>[{"placeholder":"","value":"","label":"SEO Title","type":"text","options":"","classes":""},{"placeholder":"","value":"","label":"SEO Description","type":"textarea","options":"","classes":""},{"placeholder":"","value":"","label":"SEO Keywords","type":"textarea","options":"","classes":""}]</p>', 0, 1, 0, 'FACEBOOK', 'TWITTER', 'GOOGLE', '3', 4, '200', 'VIDEO.MP3', 'womaneempowerment1.jpg', '<p><span style="color: #333333; font-family: Gotham, sans-serif; font-size: 14px; line-height: 20px; text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere consequuntur odio, quam cupiditate natus corporis doloremque voluptatibus mollitia, fugiat laudantium impedit. Ullam ratione labore aut repellat dolores praesentium sed quae. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque non iure rerum, sunt commodi itaque earum dignissimos esse a magni quod, asperiores eaque necessitatibus ipsam placeat rem modi perspiciatis! Quae! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat saepe alias sequi tempora, ex rerum, possimus ullam ab iusto in unde. Velit, aliquid, laudantium quisquam animi corporis praesentium eligendi pariatur.</span></p>', 'Rs.100000', '5X', '1', 'Salman', 'VIDEO1.MP3', '24', 1, 0),
(7, 'WOMAN EMPOWERMENT', 8, 1, 1, '<p>[{"placeholder":"","value":"","label":"SEO Title","type":"text","options":"","classes":""},{"placeholder":"","value":"","label":"SEO Description","type":"textarea","options":"","classes":""},{"placeholder":"","value":"","label":"SEO Keywords","type":"textarea","options":"","classes":""}]</p>', 0, 1, 10, '10', '10', '10', '1', 10, '10', 'shrutika.mp3', 'banner200.jpg', '<p><strong style="color: #252525; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px;">Education</strong><span style="color: #252525; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px;">&nbsp;in its general sense is a form of&nbsp;</span><a style="text-decoration: none; color: #0b0080; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px; background-image: none; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;" title="Learning" href="http://en.wikipedia.org/wiki/Learning">learning</a><span style="color: #252525; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px;">&nbsp;in which the&nbsp;</span><a style="text-decoration: none; color: #0b0080; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px; background-image: none; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;" title="Knowledge" href="http://en.wikipedia.org/wiki/Knowledge">knowledge</a><span style="color: #252525; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px;">,&nbsp;</span><a class="mw-redirect" style="text-decoration: none; color: #0b0080; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px; background-image: none; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;" title="Skills" href="http://en.wikipedia.org/wiki/Skills">skills</a><span style="color: #252525; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px;">,&nbsp;</span><a class="mw-redirect" style="text-decoration: none; color: #0b0080; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px; background-image: none; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;" title="Values" href="http://en.wikipedia.org/wiki/Values">values</a><span style="color: #252525; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px;">,&nbsp;</span><a style="text-decoration: none; color: #0b0080; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px; background-image: none; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;" title="Belief" href="http://en.wikipedia.org/wiki/Belief">beliefs</a><span style="color: #252525; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px;">&nbsp;and&nbsp;</span><a class="mw-redirect" style="text-decoration: none; color: #0b0080; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px; background-image: none; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;" title="Habit (psychology)" href="http://en.wikipedia.org/wiki/Habit_(psychology)">habits</a><span style="color: #252525; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px;">&nbsp;of a group of people are transferred from one generation to the next through storytelling, discussion, teaching, training, and or research. Education may also include informal transmission of such information from one human being to another. Education frequently takes place under the guidance of others, but learners may also educate themselves (</span><a style="text-decoration: none; color: #0b0080; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px; background-image: none; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;" title="Autodidacticism" href="http://en.wikipedia.org/wiki/Autodidacticism">autodidactic</a><span style="color: #252525; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px;">&nbsp;learning).</span><sup id="cite_ref-1" class="reference" style="line-height: 1; unicode-bidi: -webkit-isolate; font-size: 11.1999998092651px; color: #252525; font-family: sans-serif;"><a style="text-decoration: none; color: #0b0080; white-space: nowrap; background: none;" href="http://en.wikipedia.org/wiki/Education#cite_note-1">[1]</a></sup><span style="color: #252525; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px;">&nbsp;Any&nbsp;</span><a style="text-decoration: none; color: #0b0080; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px; background-image: none; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;" title="Experience" href="http://en.wikipedia.org/wiki/Experience">experience</a><span style="color: #252525; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px;">&nbsp;that has a formative effect on the way one thinks, feels, or acts may be considered educational.</span></p>', '500000', '2x', '1', 'lliteracy eradication', 'shrutika.mp4', 'education', 1, 1),
(8, 'WELFARE OF THE ELDERLY', 7, 1, 2, '<p>[{"placeholder":"","value":"","label":"SEO Title","type":"text","options":"","classes":""},{"placeholder":"","value":"","label":"SEO Description","type":"textarea","options":"","classes":""},{"placeholder":"","value":"","label":"SEO Keywords","type":"textarea","options":"","classes":""}]</p>', 0, 1, 20, '20', '20', '20', '1', 20, '20', 'orphan.mp3', 'environment2.jpg', '<p><span style="color: #252525; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px;">An&nbsp;</span><strong style="color: #252525; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px;">orphan</strong><span style="color: #252525; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px;">&nbsp;(from the&nbsp;</span><a style="text-decoration: none; color: #0b0080; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px; background-image: none; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;" title="Greek language" href="http://en.wikipedia.org/wiki/Greek_language">Greek</a><span style="color: #252525; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px;">&nbsp;ὀ&rho;&phi;&alpha;&nu;ό&sigmaf;&nbsp;</span><em style="color: #252525; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px;">orfanos</em><sup id="cite_ref-1" class="reference" style="line-height: 1; unicode-bidi: -webkit-isolate; font-size: 11.1999998092651px; color: #252525; font-family: sans-serif;"><a style="text-decoration: none; color: #0b0080; white-space: nowrap; background: none;" href="http://en.wikipedia.org/wiki/Orphan#cite_note-1">[1]</a></sup><span style="color: #252525; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px;">) is a child whose parents are dead or have abandoned them permanently.</span><sup id="cite_ref-2" class="reference" style="line-height: 1; unicode-bidi: -webkit-isolate; font-size: 11.1999998092651px; color: #252525; font-family: sans-serif;"><a style="text-decoration: none; color: #0b0080; white-space: nowrap; background: none;" href="http://en.wikipedia.org/wiki/Orphan#cite_note-2">[2]</a></sup><sup id="cite_ref-3" class="reference" style="line-height: 1; unicode-bidi: -webkit-isolate; font-size: 11.1999998092651px; color: #252525; font-family: sans-serif;"><a style="text-decoration: none; color: #0b0080; white-space: nowrap; background: none;" href="http://en.wikipedia.org/wiki/Orphan#cite_note-3">[3]</a></sup><span style="color: #252525; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px;">&nbsp;In common usage, only a child who has lost both parents is called an orphan. When referring to animals, only the mother''s condition is usually relevant. If she has gone, the offspring is an orphan, regardless of the father''s condition</span></p>', '800000', '2X', '1', 'WELFARE OF THE ELDERLY', 'orphan.mp4', 'UNESCO', 1, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `projectdatapoint`
--

INSERT INTO `projectdatapoint` (`id`, `name`, `project`, `image`) VALUES
(1, 'dddmo', 1, '31.jpg'),
(2, 'DATA POINT', 5, ''),
(3, 'DATA POINT2', 5, ''),
(4, 'DATA POINT3', 5, '');

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
  `order` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `projectimage`
--

INSERT INTO `projectimage` (`id`, `project`, `image`, `order`) VALUES
(1, 1, 'Nature_at_its_Best!!!4.png', 1),
(2, 5, '33.jpg', 1),
(3, 5, '11.jpg', 2),
(4, 5, '312.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `similercauses`
--

CREATE TABLE IF NOT EXISTS `similercauses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `projectid` int(11) NOT NULL,
  `similarprojectid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `similercauses`
--

INSERT INTO `similercauses` (`id`, `projectid`, `similarprojectid`) VALUES
(18, 1, 2),
(22, 4, 1),
(23, 4, 2),
(24, 4, 3),
(28, 5, 1),
(29, 5, 2),
(30, 5, 4),
(31, 6, 1),
(32, 6, 4),
(33, 7, 5),
(34, 8, 6);

-- --------------------------------------------------------

--
-- Table structure for table `staticpage`
--

CREATE TABLE IF NOT EXISTS `staticpage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `order` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `bannerimage` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `staticpage`
--

INSERT INTO `staticpage` (`id`, `name`, `content`, `order`, `image`, `bannerimage`) VALUES
(1, 'About Us', '<p><strong>Avinash</strong></p>', 1, '', ''),
(2, 'FAQ', '<p><strong>Q. How To Donate?</strong></p>\r\n<p>Ans. Just share to donate.</p>', 1, '20.jpg', '32.jpg');

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
-- Table structure for table `testimonial`
--

CREATE TABLE IF NOT EXISTS `testimonial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `order` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`id`, `name`, `content`, `image`, `order`) VALUES
(1, 'demo', 'demo', 'image.png', 1),
(2, 'demo2', 'demo2', 'news2.jpg', 2);

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

-- --------------------------------------------------------

--
-- Table structure for table `workwithus`
--

CREATE TABLE IF NOT EXISTS `workwithus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `workwithus`
--

INSERT INTO `workwithus` (`id`, `name`, `contact`, `email`, `country`, `city`, `message`, `timestamp`) VALUES
(1, 'avinash@wohlig.com', '9898878788', 'avinash@email.com', 'India', 'Mumbai', 'demo', '2015-03-06 13:29:46'),
(2, '2', '2', '2@2.com', '2', '2', '2ajnascja', '2015-03-06 13:31:52');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
