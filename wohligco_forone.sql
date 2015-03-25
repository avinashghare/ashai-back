-- phpMyAdmin SQL Dump
-- version 4.0.10.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 25, 2015 at 05:00 AM
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
(1, 'Advertiser1', '<p>advertiser json</p>', 'views', 'mmcwa-logo.png'),
(2, 'Advertiser2', '<p>Advertiser2 Json</p>', 'Advertiser Json', '01.jpg'),
(3, 'scs', '<p>qcww</p>', 'wecw', 'help.jpg'),
(4, '2', '<p>[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":"3"},{"label":"Meta Description","type":"textarea","classes":"","placeholder":"","value":"3"},{"label":"Meta Keywords","type":"textarea","classes":"","placeholder":"","value":"23"}]</p>', '2', 'gg57266117.jpg');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `powerforone_category`
--

INSERT INTO `powerforone_category` (`id`, `name`, `parent`, `json`, `order`, `views`, `image`, `description`) VALUES
(1, 'EDUCATION', 0, '<p>json</p>', 1, '0', 'education.jpg', '0'),
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
(1, 'Tata Services', '<p>Karjat Raigad</p>', 'ngo@ngo.com', '<p>json for ngo</p>', 1, 'ngowebsite.com', 'rail_logo.gif'),
(2, 'NGO2', '<p>akjkas ckjasbc</p>', 'ngo2@ngo.com', '<p>json for ngo2</p>', 2, 'ngo2.com', 'logoCNRS.png'),
(3, '2', '<p>2</p>', '2@2.com', '<p>[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":"2"},{"label":"Meta Description","type":"textarea","classes":"","placeholder":"","value":"2"},{"label":"Meta Keywords","type":"textarea","classes":"","placeholder":"","value":"2"}]</p>', 1, '2', 'World.gif'),
(4, '2', '<p>2</p>', '2@2.com', '<p>[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":"3"},{"label":"Meta Description","type":"textarea","classes":"","placeholder":"","value":"3"},{"label":"Meta Keywords","type":"textarea","classes":"","placeholder":"","value":"3"}]</p>', 1, '2', 'Xbox_logo_2012_cropped.svg_.png'),
(5, '3', '<p>3</p>', '3@3.com', '<p>[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":"3"},{"label":"Meta Description","type":"textarea","classes":"","placeholder":"","value":"3"},{"label":"Meta Keywords","type":"textarea","classes":"","placeholder":"","value":"3"}]</p>', 1, '3', 'logo.png');

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
  `timesinword` varchar(255) NOT NULL,
  `facebooktext` text NOT NULL,
  `twittertext` text NOT NULL,
  `sharevalue` varchar(255) NOT NULL,
  `cardimage` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `powerforone_project`
--

INSERT INTO `powerforone_project` (`id`, `name`, `category`, `ngo`, `advertiser`, `json`, `like`, `share`, `follow`, `facebook`, `twitter`, `google`, `status`, `order`, `views`, `video`, `image`, `content`, `contribution`, `times`, `donate`, `tagline`, `video2`, `cardtagline`, `indiandoner`, `foreigndoner`, `timesinword`, `facebooktext`, `twittertext`, `sharevalue`, `cardimage`) VALUES
(1, 'EDUCATION', 1, 1, 1, '<p>ksjcnksajc</p>', 0, 1, 11, 'fb.com', 'tw.com', 'gogl.com', '2', 1, 'views', 'videourl', 'education_career_logo_7639_(1).jpg', '<p><strong style="color: #252525; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px;">Education</strong><span style="color: #252525; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px;">&nbsp;in its general sense is a form of&nbsp;</span><a style="text-decoration: none; color: #0b0080; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px; background-image: none; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;" title="Learning" href="http://en.wikipedia.org/wiki/Learning">learning</a><span style="color: #252525; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px;">&nbsp;in which the&nbsp;</span><a style="text-decoration: none; color: #0b0080; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px; background-image: none; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;" title="Knowledge" href="http://en.wikipedia.org/wiki/Knowledge">knowledge</a><span style="color: #252525; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px;">,&nbsp;</span><a class="mw-redirect" style="text-decoration: none; color: #0b0080; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px; background-image: none; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;" title="Skills" href="http://en.wikipedia.org/wiki/Skills">skills</a><span style="color: #252525; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px;">,&nbsp;</span><a class="mw-redirect" style="text-decoration: none; color: #0b0080; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px; background-image: none; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;" title="Values" href="http://en.wikipedia.org/wiki/Values">values</a><span style="color: #252525; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px;">,&nbsp;</span><a style="text-decoration: none; color: #0b0080; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px; background-image: none; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;" title="Belief" href="http://en.wikipedia.org/wiki/Belief">beliefs</a><span style="color: #252525; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px;">&nbsp;and&nbsp;</span><a class="mw-redirect" style="text-decoration: none; color: #0b0080; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px; background-image: none; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;" title="Habit (psychology)" href="http://en.wikipedia.org/wiki/Habit_(psychology)">habits</a><span style="color: #252525; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px;">&nbsp;of a group of people are transferred from one generation to the next through storytelling, discussion, teaching, training, and or research. Education may also include informal transmission of such information from one human being to another. Education frequently takes place under the guidance of others, but learners may also educate themselves (</span><a style="text-decoration: none; color: #0b0080; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px; background-image: none; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;" title="Autodidacticism" href="http://en.wikipedia.org/wiki/Autodidacticism">autodidactic</a><span style="color: #252525; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px;">&nbsp;learning).</span><sup id="cite_ref-1" class="reference" style="line-height: 1; unicode-bidi: -webkit-isolate; font-size: 11.1999998092651px; color: #252525; font-family: sans-serif;"><a style="text-decoration: none; color: #0b0080; white-space: nowrap; background: none;" href="http://en.wikipedia.org/wiki/Education#cite_note-1">[1]</a></sup><span style="color: #252525; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px;">&nbsp;Any&nbsp;</span><a style="text-decoration: none; color: #0b0080; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px; background-image: none; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;" title="Experience" href="http://en.wikipedia.org/wiki/Experience">experience</a><span style="color: #252525; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px;">&nbsp;that has a formative effect on the way one thinks, feels, or acts may be considered educational.</span></p>', '900000', '5x', '1', 'demo project', 'demo', 'demo card', 0, 1, 'Five Times', 'demo', 'demo', '0', ''),
(2, 'CHILD WELFARE', 3, 1, 1, '<p>[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":"bbb"},{"label":"Meta Description","type":"textarea","classes":"","placeholder":"","value":"bbb"},{"label":"Meta Keywords","type":"textarea","classes":"","placeholder":"","value":"bbb"}]</p>', 0, 1, 2, '2', '2', '2', '1', 2, '2', '2', 'Box-of-Hope-4.jpg', '<p><span style="color: #252525; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px;">Due to economical reasons, especially in poor countries, children are forced to work in order to survive. Child labour often happens in difficult conditions, which are dangerous and impair the education of the future citizens and increase vulnerability to adults. It is hard to know exactly the age and number of children who work. At least 150 million children under 5 years of age worked in 2004, but the figure is underestimated because domestic labour is not counted</span></p>', '8000000', '6x', '1', 'Child protection', '2', 'c labour', 0, 0, '', '', '', '0', ''),
(3, 'EMPLOYMENT', 4, 2, 1, '<p>[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":"9"},{"label":"Meta Description","type":"textarea","classes":"","placeholder":"","value":"9"},{"label":"Meta Keywords","type":"textarea","classes":"","placeholder":"","value":"9"}]</p>', 0, 1, 9, '9', '9', '9', '1', 9, '9', '9', 'page5-42-300x169.jpg', '<p><span style="color: #252525; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px;">An employee contributes labor and/or expertise to an endeavor of an employer and is usually hired to perform specific duties which are packaged into a&nbsp;</span><a class="mw-redirect" style="text-decoration: none; color: #0b0080; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px; background-image: none; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;" title="Job (role)" href="http://en.wikipedia.org/wiki/Job_(role)">job</a><span style="color: #252525; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px;">. An Employee is a person who is hired to provide services to a company on a regular basis in exchange for compensation and who does not provide these services as part of an independent business</span></p>', '9', '9', '1', 'EMPLOYMENT to everyone', '9', 'training', 0, 0, '', '', '', '0', ''),
(4, 'ENVIRONMENT AND ANIMAL WELFARE', 3, 2, 2, '<p>[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":"wohlig"},{"label":"Meta Description","type":"textarea","classes":"","placeholder":"","value":"wohlig"},{"label":"Meta Keywords","type":"textarea","classes":"","placeholder":"","value":"wohlig"}]</p>', 0, 1, 0, '99', '99', '99', '1', 1, '200', 'wohlig.mp4', 'c44ec344-fd9a-44d4-85c3-7365d4645028.jpg', '<p><span style="color: #252525; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px;">The&nbsp;</span><strong style="color: #252525; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px;">Animal Welfare Board of India</strong><span style="color: #252525; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px;">&nbsp;is a statutory advisory body advising the Government of India on animal welfare laws, and promotes animal welfare in the country of India.</span><sup id="cite_ref-Intro_1-0" class="reference" style="line-height: 1; unicode-bidi: -webkit-isolate; font-size: 11.1999998092651px; color: #252525; font-family: sans-serif;"><a style="text-decoration: none; color: #0b0080; white-space: nowrap; background: none;" href="http://en.wikipedia.org/wiki/Animal_Welfare_Board_of_India#cite_note-Intro-1">[1]</a></sup><span style="color: #252525; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px;">It works to ensure that animal welfare laws in the country are followed; provides grants to Animal Welfare Organisations; and considers itself "the face of the animal welfare movement in the country</span></p>', '210000', '2X', '1', 'STOP CHILD WELFARE', '', 'STOP CHILD', 1, 1, '', '', '', '0', ''),
(5, 'Anand', 6, 1, 1, '<p>[{"placeholder":"","value":"","label":"SEO Title","type":"text","options":"","classes":""},{"placeholder":"","value":"","label":"SEO Description","type":"textarea","options":"","classes":""},{"placeholder":"","value":"","label":"SEO Keywords","type":"textarea","options":"","classes":""}]</p>', 0, 1, 0, 'facebook.com', 'twitter.com', 'google.com', '2', 1, '120', 'video.mp4', '42-64059579__800x600_q85_crop.jpg', '<p><strong style="color: #252525; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px;">Drought</strong><span style="color: #252525; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px;">&nbsp;is an extended period when a region receives a deficiency in its&nbsp;</span><a style="text-decoration: none; color: #0b0080; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px; background-image: none; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;" title="Water supply" href="http://en.wikipedia.org/wiki/Water_supply">water supply</a><span style="color: #252525; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px;">, whether atmospheric,&nbsp;</span><a style="text-decoration: none; color: #0b0080; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px; background-image: none; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;" title="Surface water" href="http://en.wikipedia.org/wiki/Surface_water">surface</a><span style="color: #252525; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px;">&nbsp;or&nbsp;</span><a class="mw-redirect" style="text-decoration: none; color: #0b0080; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px; background-image: none; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;" title="Ground water" href="http://en.wikipedia.org/wiki/Ground_water">ground water</a><span style="color: #252525; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px;">. A drought can last for months or years, or may be declared after as few as 15 days.</span><sup id="cite_ref-1" class="reference" style="line-height: 1; unicode-bidi: -webkit-isolate; font-size: 11.1999998092651px; color: #252525; font-family: sans-serif;"><a style="text-decoration: none; color: #0b0080; white-space: nowrap; background: none;" href="http://en.wikipedia.org/wiki/Drought#cite_note-1">[1]</a></sup><span style="color: #252525; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px;">&nbsp;Generally, this occurs when a region receives consistently below average&nbsp;</span><a class="mw-redirect" style="text-decoration: none; color: #0b0080; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px; background-image: none; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;" title="Precipitation (meteorology)" href="http://en.wikipedia.org/wiki/Precipitation_(meteorology)">precipitation</a><span style="color: #252525; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px;">. It can have a substantial impact on the&nbsp;</span><a style="text-decoration: none; color: #0b0080; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px; background-image: none; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;" title="Ecosystem" href="http://en.wikipedia.org/wiki/Ecosystem">ecosystem</a><span style="color: #252525; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px;">&nbsp;and&nbsp;</span><a style="text-decoration: none; color: #0b0080; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px; background-image: none; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;" title="Agriculture" href="http://en.wikipedia.org/wiki/Agriculture">agriculture</a><span style="color: #252525; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px;">&nbsp;of the affected region. Although droughts can persist for several years, even a short, intense drought can cause significant damage</span><sup id="cite_ref-2" class="reference" style="line-height: 1; unicode-bidi: -webkit-isolate; font-size: 11.1999998092651px; color: #252525; font-family: sans-serif;"><a style="text-decoration: none; color: #0b0080; white-space: nowrap; background: none;" href="http://en.wikipedia.org/wiki/Drought#cite_note-2">[2]</a></sup><span style="color: #252525; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px;">&nbsp;and harm to the local&nbsp;</span><a style="text-decoration: none; color: #0b0080; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px; background-image: none; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;" title="Economy" href="http://en.wikipedia.org/wiki/Economy">economy</a><span style="color: #252525; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px;">.</span><sup id="cite_ref-3" class="reference" style="line-height: 1; unicode-bidi: -webkit-isolate; font-size: 11.1999998092651px; color: #252525; font-family: sans-serif;"><a style="text-decoration: none; color: #0b0080; white-space: nowrap; background: none;" href="http://en.wikipedia.org/wiki/Drought#cite_note-3">[3]</a></sup><span style="color: #252525; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px;">&nbsp;Annual dry seasons in the tropics significantly increase the chances of a drought developing and subsequent brush fires. Periods of heat can significantly worsen drought conditions by hastening evaporation of water vapor.</span></p>', 'Rs.2,30,0000', '2X', '1', 'Help Anand get clean water in', '', 'Help Anand', 1, 1, '', '', '', '0', ''),
(6, 'Salman', 1, 1, 1, '<p>[{"placeholder":"","value":"","label":"SEO Title","type":"text","options":"","classes":""},{"placeholder":"","value":"","label":"SEO Description","type":"textarea","options":"","classes":""},{"placeholder":"","value":"","label":"SEO Keywords","type":"textarea","options":"","classes":""}]</p>', 0, 1, 0, 'FACEBOOK', 'TWITTER', 'GOOGLE', '3', 4, '200', 'VIDEO.MP3', 'key_art_being_human-e1333476329615.jpg', '<p><span style="font-weight: bold; color: #545454; font-family: arial, sans-serif; font-size: small; line-height: 18.2000007629395px;">Being Human</span><span style="color: #545454; font-family: arial, sans-serif; font-size: small; line-height: 18.2000007629395px;">&nbsp;(</span><span style="font-weight: bold; color: #545454; font-family: arial, sans-serif; font-size: small; line-height: 18.2000007629395px;">NGO</span><span style="color: #545454; font-family: arial, sans-serif; font-size: small; line-height: 18.2000007629395px;">) a non-</span><wbr style="color: #545454; font-family: arial, sans-serif; font-size: small; line-height: 18.2000007629395px;" /><span style="color: #545454; font-family: arial, sans-serif; font-size: small; line-height: 18.2000007629395px;">governmental</span><span style="font-weight: bold; color: #545454; font-family: arial, sans-serif; font-size: small; line-height: 18.2000007629395px;">charity</span><span style="color: #545454; font-family: arial, sans-serif; font-size: small; line-height: 18.2000007629395px;">&nbsp;organisation started by Bollywood actor&nbsp;</span><span style="font-weight: bold; color: #545454; font-family: arial, sans-serif; font-size: small; line-height: 18.2000007629395px;">Salman Khan</span></p>', 'Rs.100000', '5X', '1', 'Salman', 'VIDEO1.MP3', '24', 1, 0, '', '', '', '0', ''),
(7, 'WOMAN EMPOWERMENT', 8, 1, 1, '<p>[{"placeholder":"","value":"","label":"SEO Title","type":"text","options":"","classes":""},{"placeholder":"","value":"","label":"SEO Description","type":"textarea","options":"","classes":""},{"placeholder":"","value":"","label":"SEO Keywords","type":"textarea","options":"","classes":""}]</p>', 0, 1, 10, '10', '10', '10', '1', 10, '10', 'shrutika.mp3', 'woman-empowerment-e1411744638401.jpg', '<p><span style="color: #252525; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px;">Empowerment is the process of obtaining basic opportunities for marginalized people, either directly by those people, or through the help of non-marginalized others who share their own access to these opportunities. It also includes actively thwarting attempts to deny those opportunities. Empowerment also includes encouraging, and developing the skills for, self-sufficiency, with a focus on eliminating the future need for charity or welfare in the individuals of the group. This process can be difficult to start and to implement effectively.</span></p>', '500000', '2x', '1', 'lliteracy eradication', 'shrutika.mp4', 'education', 1, 1, '', '', '', '0', ''),
(8, 'WELFARE OF THE ELDERLY', 7, 1, 2, '<p>[{"placeholder":"","value":"","label":"SEO Title","type":"text","options":"","classes":""},{"placeholder":"","value":"","label":"SEO Description","type":"textarea","options":"","classes":""},{"placeholder":"","value":"","label":"SEO Keywords","type":"textarea","options":"","classes":""}]</p>', 0, 1, 20, '20', '20', '20', '1', 20, '20', 'orphan.mp3', 'Save-the-Children-_-volunteers.jpg', '<p><span style="color: #252525; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px;">An&nbsp;</span><strong style="color: #252525; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px;">orphan</strong><span style="color: #252525; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px;">&nbsp;(from the&nbsp;</span><a style="text-decoration: none; color: #0b0080; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px; background-image: none; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;" title="Greek language" href="http://en.wikipedia.org/wiki/Greek_language">Greek</a><span style="color: #252525; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px;">&nbsp;ὀ&rho;&phi;&alpha;&nu;ό&sigmaf;&nbsp;</span><em style="color: #252525; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px;">orfanos</em><sup id="cite_ref-1" class="reference" style="line-height: 1; unicode-bidi: -webkit-isolate; font-size: 11.1999998092651px; color: #252525; font-family: sans-serif;"><a style="text-decoration: none; color: #0b0080; white-space: nowrap; background: none;" href="http://en.wikipedia.org/wiki/Orphan#cite_note-1">[1]</a></sup><span style="color: #252525; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px;">) is a child whose parents are dead or have abandoned them permanently.</span><sup id="cite_ref-2" class="reference" style="line-height: 1; unicode-bidi: -webkit-isolate; font-size: 11.1999998092651px; color: #252525; font-family: sans-serif;"><a style="text-decoration: none; color: #0b0080; white-space: nowrap; background: none;" href="http://en.wikipedia.org/wiki/Orphan#cite_note-2">[2]</a></sup><sup id="cite_ref-3" class="reference" style="line-height: 1; unicode-bidi: -webkit-isolate; font-size: 11.1999998092651px; color: #252525; font-family: sans-serif;"><a style="text-decoration: none; color: #0b0080; white-space: nowrap; background: none;" href="http://en.wikipedia.org/wiki/Orphan#cite_note-3">[3]</a></sup><span style="color: #252525; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px;">&nbsp;In common usage, only a child who has lost both parents is called an orphan. When referring to animals, only the mother''s condition is usually relevant. If she has gone, the offspring is an orphan, regardless of the father''s condition</span></p>', '800000', '2X', '1', 'WELFARE OF THE ELDERLY', 'orphan.mp4', 'UNESCO', 1, 1, '', '', '', '0', '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `projectdatapoint`
--

INSERT INTO `projectdatapoint` (`id`, `name`, `project`, `image`) VALUES
(1, 'dddmo', 1, 'Disabled_Play.jpg'),
(2, 'DATA POINT', 5, 'DROUGHT_--621x414.jpg'),
(3, 'DATA POINT2', 5, 'drought-story-150113-05-photo--mandar-deodhar_650_012413075353.jpg'),
(4, 'DATA POINT3', 5, 'india-sequia.jpg'),
(5, 'child welfare', 1, 'loading.gif'),
(6, 'mother and child welfare', 1, 'wordpress.png'),
(8, 'unicef', 2, 'image3.png'),
(9, 'non violence', 2, 'icon31-computer.gif'),
(10, 'darkness to light', 2, 'xcna-school-clock.png.pagespeed_.ic_.fIrO_QwN3r_.png'),
(11, 'EMPLOYMENT', 3, 'operationpaperclip.jpg'),
(12, 'market', 3, 'Jodie_Kidd-Flugtag.jpg'),
(13, 'green jobs', 3, 'green-jobs.gif'),
(14, 'pigs', 4, 'images2.jpg'),
(15, 'bear', 4, 'neon-environment-animals1.jpg'),
(16, 'rabbit', 4, 'Lab_animal_care.jpg'),
(17, '1', 6, 'sl0.jpg'),
(18, '2', 6, 'Salman-Khan-Being-Human-Clothing-Stores-Photos-1.jpg'),
(19, '1', 7, 'women-empowerment1.jpg'),
(20, '2', 7, 'famous-indian-women.jpg'),
(21, '3', 7, 'WomenPledge.jpg'),
(22, '1', 8, 'images_(1)4.jpg'),
(23, '3', 8, 'china-orphans.jpg'),
(24, '2', 8, 'contentMainHome-e1331071402679.jpg');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `projectimage`
--

INSERT INTO `projectimage` (`id`, `project`, `image`, `order`) VALUES
(2, 5, '456081826.jpg', 1),
(3, 5, 'A-drought-affected-sunflo-007.jpg', 2),
(4, 5, 'download7.jpg', 3),
(5, 7, '03032014111739.jpg', 1),
(6, 1, 'education-overview.jpg', 2),
(8, 1, 'download5.jpg', 3),
(9, 1, 'onemonthtraining.png', 4),
(10, 2, 'dsc_0655.jpg', 1),
(11, 2, 'ensignlp.nfo-o-131_.jpg', 2),
(12, 2, 'NITIN-JAGDISH.jpg', 3),
(13, 3, '20110816134503_o_c513f47f40618400.jpg', 1),
(14, 3, '53376.JPG', 2),
(15, 3, 'Covidien_11_2012.jpg', 3),
(16, 4, 'womanwithkitten.jpg', 1),
(17, 4, 'Lili.jpg', 2),
(18, 4, '2012-08_Dan_zivotinja.jpg', 3),
(19, 6, '12-bobby.jpg', 1),
(20, 6, 'bharat-n-dorris-awards-13_086.jpg', 2),
(21, 6, 'katewilliamnew5-ap.jpg', 3),
(22, 7, 'telharauniversity-9.jpg', 2),
(23, 7, 'women_empowerment.jpg', 3),
(24, 8, 'i.jpg', 1),
(25, 8, 'wed-hob-06.jpg', 2),
(26, 8, 'sli2.png', 3);

-- --------------------------------------------------------

--
-- Table structure for table `similercauses`
--

CREATE TABLE IF NOT EXISTS `similercauses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `projectid` int(11) NOT NULL,
  `similarprojectid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=76 ;

--
-- Dumping data for table `similercauses`
--

INSERT INTO `similercauses` (`id`, `projectid`, `similarprojectid`) VALUES
(61, 1, 2),
(64, 2, 6),
(65, 3, 8),
(66, 4, 1),
(67, 4, 2),
(68, 4, 3),
(69, 5, 1),
(70, 5, 2),
(71, 5, 4),
(72, 6, 1),
(73, 6, 4),
(74, 7, 5),
(75, 8, 6);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `staticpage`
--

INSERT INTO `staticpage` (`id`, `name`, `content`, `order`, `image`, `bannerimage`) VALUES
(1, 'About Us', '<div class="content-page"><h2>About Us</h2><p>Power for One was created to make it amazingly Convenient & Transparent for people to support causes that they care about. The origins of the idea goes back to when the founders were schoolmates & used to volunteer with NGOs they supported- they found that a lot of NGOs had amazing ideas & projects to make the world a better place- but lacked the working capital to see those projects executed successfully and in a sustainable manner.</p><p>After a lot of research & a number of conversations later, we also found that a large number of us as individuals want to help causes that we care about but we simply don’t know where to start.</p><p>Thus Power for One was born- We help people support causes that they care about by creating an ecosystem that connects Non Profits, Corporates & You. </p><p>Everything we do as an organization will be to make charitable giving.</p><div class="row height2">\n\n                                <div class="col-xs-6">\n\n                                    <div class="circle circlecolor">\n\n                                        Convenient\n\n                                    </div>\n\n \n\n                                </div>\n\n                                <div class="col-xs-6">\n\n                                    <div class="circle circlecolor">\n\n                                        Transparent\n\n                                    </div>\n\n                                </div>\n\n \n\n                            </div>\n\n                            <div class="row">\n\n                                <div class="col-xs-6">\n\n                                    <div class="circle circlecolor">\n\n                                        Social\n\n                                    </div>\n\n                                </div>\n\n                                <div class="col-xs-6">\n\n                                    <div class="circle circlecolor">\n\n                                        Fun\n\n                                    </div>\n\n                                </div>\n\n \n\n                            </div>\n\n \n\n \n\n \n\n                        </div>', 1, '', ''),
(2, 'FAQ', '<div class="holder">\n                            <div class="row">\n\n                                <div class="col-md-12">\n                                    <div class="signin">\n                                        <div class="text-center">\n                                            <h3 class="createtitle">FAQ</h3>\n                                        </div>\n                                        <div class="">\n\n                                            <h4>What is Power for One?</h4>\n                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>\n                                            <br>\n                                            <h4>Why is Power for One better than other giving websites?</h4>\n                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>\n                                            <br>\n                                            <h4>Why should I Give on Power for One?</h4>\n                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>\n                                            <br>\n                                            <h4>How does Power for One make money?</h4>\n                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>\n                                            <br>\n                                            <h4>How does the model work?</h4>\n                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>\n                                            <br>\n                                            <h4>How do I get in touch with Power for One?</h4>\n                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>\n\n\n                                        </div>\n                                    </div>\n                                </div>\n\n\n                            </div>\n\n                        </div>', 1, '20.jpg', '32.jpg'),
(3, 'Team and Advisor', '<h2>BOARD OF DIRECTORS</h2>\n                        <div class="row">\n                            <div class="col-md-4">\n                                <div class="socials pull-right">\n                                    <a href=""><i class="fa fa-twitter-square twitter"></i></a>\n                                    <a href=""><i class="fa fa-facebook-square facebook"></i></a>\n                                </div>\n                                <div class="teamcircle ">\n                                    <img src="images/profile.jpeg" class="img-circle " alt="">\n                                </div>\n                                <div class="clearfix"></div>\n                                <div class="content">\n                                    <h4>Brad Pitt, CEO</h4>\n                                    <p class="intro-line">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>\n                                    <p class="more-line">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>\n\n                                </div>\n                            </div>\n                            <div class="col-md-4">\n                                <div class="socials pull-right">\n                                    <a href=""><i class="fa fa-twitter-square twitter"></i></a>\n                                    <a href=""><i class="fa fa-facebook-square facebook"></i></a>\n                                </div>\n                                <div class="teamcircle ">\n                                    <img src="images/profile.jpeg" class="img-circle " alt="">\n                                </div>\n                                <div class="clearfix"></div>\n                                <div class="content">\n                                    <h4>Brad Pitt, CEO</h4>\n                                    <p class="intro-line">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>\n                                    <p class="more-line">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>\n\n                                </div>\n                            </div>\n                            <div class="col-md-4">\n                                <div class="socials pull-right">\n                                    <a href=""><i class="fa fa-twitter-square twitter"></i></a>\n                                    <a href=""><i class="fa fa-facebook-square facebook"></i></a>\n                                </div>\n                                <div class="teamcircle ">\n                                    <img src="images/profile.jpeg" class="img-circle " alt="">\n                                </div>\n                                <div class="clearfix"></div>\n                                <div class="content">\n                                    <h4>Brad Pitt, CEO</h4>\n                                    <p class="intro-line">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>\n                                    <p class="more-line">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>\n\n                                </div>\n                            </div>\n                        </div>\n                        <h2>OUR TEAM</h2>\n                        <div class="row">\n                            <div class="col-md-4">\n                                <div class="socials pull-right">\n                                    <a href=""><i class="fa fa-twitter-square twitter"></i></a>\n                                    <a href=""><i class="fa fa-facebook-square facebook"></i></a>\n                                </div>\n                                <div class="teamcircle ">\n                                    <img src="images/profile.jpeg" class="img-circle " alt="">\n                                </div>\n                                <div class="clearfix"></div>\n                                <div class="content">\n                                    <h4>Brad Pitt, CEO</h4>\n                                    <p class="intro-line">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>\n                                    <p class="more-line">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>\n\n                                </div>\n                            </div>\n                            <div class="col-md-4">\n                                <div class="socials pull-right">\n                                    <a href=""><i class="fa fa-twitter-square twitter"></i></a>\n                                    <a href=""><i class="fa fa-facebook-square facebook"></i></a>\n                                </div>\n                                <div class="teamcircle ">\n                                    <img src="images/profile.jpeg" class="img-circle " alt="">\n                                </div>\n                                <div class="clearfix"></div>\n                                <div class="content">\n                                    <h4>Brad Pitt, CEO</h4>\n                                    <p class="intro-line">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>\n                                    <p class="more-line">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>\n\n                                </div>\n                            </div>\n                            <div class="col-md-4">\n                                <div class="socials pull-right">\n                                    <a href=""><i class="fa fa-twitter-square twitter"></i></a>\n                                    <a href=""><i class="fa fa-facebook-square facebook"></i></a>\n                                </div>\n                                <div class="teamcircle ">\n                                    <img src="images/profile.jpeg" class="img-circle " alt="">\n                                </div>\n                                <div class="clearfix"></div>\n                                <div class="content">\n                                    <h4>Brad Pitt, CEO</h4>\n                                    <p class="intro-line">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>\n                                    <p class="more-line">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>\n\n                                </div>\n                            </div>\n                        </div>', 3, '', ''),
(4, 'How It Works', '<div class="row">\n            \n            \n            <div class="col-md-4">\n               \n                <div class="box text-center">\n                  \n               <div class="oneround">1</div>\n                   \n                    <img src="images/pick.jpg" class="img-responsive mainimg">\n                       \n                        <h4 class="works-title">PICK A CAUSE</h4>\n\n                    <div class="cont">\n                        <p class="wrapper">Choose a project or cause that addresses a problem you are passionate about solving.</p>\n                    </div>\n                </div>\n            \n            </div>\n            \n            \n            \n            \n            <div class="col-md-8">  \n            \n                <div class="row">\n                  <div class="box text-center marginlr">\n                   <div class="oneround">2</div>\n                    <div class="col-xs-6">\n\n                        <div>\n\n\n\n                            <img src="images/donate.jpg" class="img-responsive mainimg">\n\n                                <h4 class="works-title">MAKE A DONATION</h4>\n\n                            <div class="cont">\n                                <p class="wrapper">No amount is too little. We urge you to give small amounts on a regular basis.</p>\n                            </div>\n                        </div>\n                        <div>\n                            <p class="vrline"></p>\n                            <p class="vrcircle">OR</p>\n                            <p class="vrline1"></p>\n                        </div>\n                    </div>\n\n\n\n\n                    <div class="col-xs-6">\n\n                        <div>\n\n\n\n                            <img src="images/give.jpg" class="img-responsive mainimg">\n\n                                <h4 class="works-title">RAISE AWARENESS</h4>\n\n                            <div class="cont">\n                                <p class="wrapper">For those of you who do not believe in making monetary donations but still want to help out, share the word by sharing on Social Media. Each post you make will trigger a donation from our Corporate partner towards a particular project.</p>\n                            </div>\n                        </div>\n\n                    </div>\n                    </div>\n                </div>\n           </div> \n            \n            \n              \n            <div class="col-md-4">\n               \n                <div class="box text-center">\n                  \n               <div class="oneround">3</div>\n                   \n                    <img src="images/maximize.jpg" class="img-responsive mainimg">\n                       \n                        <h4 class="works-title">DOUBLE YOUR IMPACT</h4>\n\n                    <div class="cont">\n                        <p class="wrapper">Every Contribution you make on the Power for One platform gets doubled by our corporate partners- why give anywhere else?</p>\n                    </div>\n                </div>\n            \n            </div>\n            \n            \n            \n              \n            <div class="col-md-4">\n               \n                <div class="box text-center">\n                  \n               <div class="oneround">4</div>\n                   \n                    \n                      <img src="images/rewrd.jpg" class="img-responsive mainimg">\n                       \n                        <h4 class="works-title">GET REWARDED</h4>\n\n                    <div class="cont">\n                        <p class="wrapper">We just want to say Thank you for taking the time and effort for being awesome- get access to some amazing offers from our brand partners!</p>\n                    </div>\n                </div>\n            \n            </div>\n            \n            \n            \n              \n            <div class="col-md-4">\n               \n                <div class="box text-center">\n                  \n               <div class="oneround">5</div>\n                   \n                    <img src="images/monitor.jpg" class="img-responsive mainimg">\n                       \n                        <h4 class="works-title">MONITOR AND REVIEW THE IMPACT OF YOUR PROJECT</h4>\n\n                    <div class="cont">\n                        <p class="wrapper">One of the key reasons why we exist is so that you know your money is being utilized effectively. We monitor & review the activities of our Ngo partners and send you monthly updates on the impact & the utilization of your funds.</p>\n                    </div>\n                </div>\n            \n            </div>\n            \n            \n            \n            \n              \n            \n            <div class="col-md-4">\n               \n                <div class="box text-center">\n                  \n               <div class="oneround">6</div>\n                   \n                    <img src="images/see.jpg" class="img-responsive mainimg">\n                       \n                        <h4 class="works-title">SEEING IS BELIEVING</h4>\n\n                    <div class="cont">\n                        <p class="wrapper">Apart from sending you pictures, videos & reports on the progress you have enabled, we are happy to arrange physical meets between you & your beneficiaries as per your request.</p>\n                    </div>\n                </div>\n            \n            </div>\n            \n            \n            \n            \n            \n           \n            <div class="col-md-8">\n\n\n               \n                    <h1 class="esy">ITS EASY!</h1>\n                \n                <div class="cont1">\n                    <h5> If you think you have what its takes to make world a  better place,<br> its about time you clicked on the button below.</h5>\n                </div>\n\n\n                <a href="" class="explorep"> EXPLORE PROJECTS </a>\n\n            </div>\n\n        </div>', 4, '', ''),
(5, 'Work With Us', '<h2>WORK WITH US</h2>\n                    <p>We are constantly reminding ourselves that a company is nothing but a group of people. Finding scale able & sustainable solutions to end massive problems like hunger & sanitation requires bringing the best talent into the social impact sector (Which is why we got into it in the first place).</p>\n\n                    <p>We’ve created a business model around the social impact sector for this very reason- so we can attract the best talent & have the best minds working on solving the world’s largest problems.</p>\n                    <p>If you are passionate about using your skill set & time on earth to help us do this, write in!</p>', 5, '', ''),
(6, 'Contact Us', '<div class="map">\n                <h2>MAP</h2>\n                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3770.4696684758183!2d72.90183999999999!3d19.087041000000013!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7c62b2a1ed4c1%3A0x807458ec388bb2a7!2sThemis!5e0!3m2!1sen!2sin!4v1423832011511" width="600" height="230" frameborder="0" style="border:0">\n\n                </iframe>\n            </div>\n            <div class="middle">\n\n                <h2 class="ucase">CONTACT US</h2>\n                <p class="weightchange">Address - 201, Saurabh Building, Modi Industrial Estate, LBS Marg, Ghatkopar West - 400086.</p>\n                <p class="weightchange">Email - support@powerforone.org</p>\n                <p class="weightchange">Number - 022 67080507</p>\n            </div>', 6, '', '');

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
(1, 'EDUCATION', 'Education is commonly and formally divided into stages such as preschool, primary school, secondary school and then college, universityor apprenticeship. The science and art of how best to teach is called pedagogy.', 'ico-education.jpg', 1),
(2, 'BOOKS', 'In most countries today full-time education, whether at school or otherwise, is compulsory for all children up to a certain age. Due to this the proliferation of compulsory education, combined with population growth, UNESCO has calculated that in the next 30 years more people will receive formal education than in all of human history thus far', 'education_manifesto_thumbnail_7d4ffcc0bed33dbc55c1d2cd43ac9554.png', 2);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

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
(15, 'avinash', 'a208e5837519309129fa466b0c68396b', 'avinash@avinash.com', 1, '2015-02-03 17:19:36', 1, '', '', '1', 1, '[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":"metatitle"},{"label":"Meta Description","type":"textarea","classes":"","placeholder":"","value":"metadesc"},{"label":"Meta Keywords","type":"textarea","classes":"","placeholder":"","value":"metakey"}]', '2015-02-04', '1', '1', '1', '1', '1', '1', '1', '1', '1'),
(16, 'aaaaa', 'a63526467438df9566c508027d9cb06b', 'wohlig99@wohlig.com', 2, '2015-03-23 13:05:29', NULL, NULL, '', '', 0, '', '0000-00-00', '', '', '', '', '', '', '', '', ''),
(17, 'jagruti', '3677b23baa08f74c28aba07f0cb6554e', 'jagruti@wohlig.com', 2, '2015-03-23 14:17:08', NULL, NULL, '', '', 0, '', '0000-00-00', '', '', '', '', '', '', '', '', ''),
(18, '', 'd41d8cd98f00b204e9800998ecf8427e', '', 2, '2015-03-24 05:13:24', NULL, NULL, '', '', 0, '', '0000-00-00', '', '', '', '', '', '', '', '', ''),
(19, 'vijaya', '3677b23baa08f74c28aba07f0cb6554e', 'vijaya@gmail.com', 2, '2015-03-24 09:25:00', NULL, NULL, '', '', 0, '', '0000-00-00', '', '', '', '', '', '', '', '', ''),
(20, 'chintan shah', '', 'chintanhappiness@gmail.com', 3, '2015-03-24 13:11:06', 1, 'https://lh3.googleusercontent.com/-8gzsrm6Jr5U/AAAAAAAAAAI/AAAAAAAAAYk/Jk4xGAc7PGs/photo.jpg', '', '106909055181757599118', 0, '', '0000-00-00', '', ',', '', '', '', '', '', '', ''),
(21, 'Chintan Shah', '', 'chintanhappiness@gmail.com', 3, '2015-03-24 13:15:39', 1, 'https://graph.facebook.com/969366556407870/picture?width=150&height=150', '', '969366556407870', 0, '', '1990-09-07', '', ',Mumbai, Maharashtra, India', '', '', '', '', '', '', ''),
(22, 'Jagruti Patil', '', 'patiljagruti181@gmail.com', 3, '2015-03-24 13:21:07', 1, 'https://graph.facebook.com/898666320196261/picture?width=150&height=150', '', '898666320196261', 0, '', '0000-00-00', '', ',', '', '', '', '', '', '', '');

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
