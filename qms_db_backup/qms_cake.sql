-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 30, 2013 at 06:06 PM
-- Server version: 5.1.37
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `qms_cake`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tenant_id` int(11) NOT NULL,
  `article_name` varchar(40) NOT NULL,
  `keywords` varchar(40) NOT NULL,
  `keywords_description` varchar(100) NOT NULL,
  `author` varchar(40) NOT NULL,
  `date_of_posting` date NOT NULL,
  `article_description` varchar(100) NOT NULL,
  `upload_file` varchar(100) NOT NULL,
  `Authentication` int(20) NOT NULL,
  `usergroup_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `tenant_id`, `article_name`, `keywords`, `keywords_description`, `author`, `date_of_posting`, `article_description`, `upload_file`, `Authentication`, `usergroup_id`, `user_id`) VALUES
(1, 2, 'test', 'test', 'test', '2', '2013-05-30', 'sdf', 'coniferous-forest.jpg', 1, 1, 1),
(2, 2, 'jh', 'sdf', 'sdf', '1', '2013-05-30', 'sadf', 'delete.png', 1, 1, 1),
(3, 2, 'fgh', 'fgh', 'fgh', '1', '2013-05-30', 'fgh', 'HD-Forest-Wallpaper.jpg', 0, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE IF NOT EXISTS `attributes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `model` varchar(40) NOT NULL,
  `name` varchar(64) NOT NULL,
  `description` varchar(255) NOT NULL,
  `data_type` varchar(16) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `data_type` (`data_type`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `attributes`
--

INSERT INTO `attributes` (`id`, `model`, `name`, `description`, `data_type`, `created`, `modified`) VALUES
(1, 'contacts', 'address', '', 'string', '2013-05-27 22:17:57', '2013-05-27 22:18:00'),
(2, 'contacts', 'email', '', 'string', '2013-05-27 22:18:14', '2013-05-27 22:18:16');

-- --------------------------------------------------------

--
-- Table structure for table `attributes_binary_values`
--

CREATE TABLE IF NOT EXISTS `attributes_binary_values` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entity_id` char(36) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `attribute_id` int(11) NOT NULL,
  `value` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `entity_id` (`entity_id`),
  KEY `attribute_id` (`attribute_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `attributes_binary_values`
--


-- --------------------------------------------------------

--
-- Table structure for table `attributes_boolean_values`
--

CREATE TABLE IF NOT EXISTS `attributes_boolean_values` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entity_id` char(36) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `attribute_id` int(11) NOT NULL,
  `value` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `entity_id` (`entity_id`),
  KEY `attribute_id` (`attribute_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `attributes_boolean_values`
--


-- --------------------------------------------------------

--
-- Table structure for table `attributes_datetime_values`
--

CREATE TABLE IF NOT EXISTS `attributes_datetime_values` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entity_id` char(36) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `attribute_id` int(11) NOT NULL,
  `value` datetime DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `entity_id` (`entity_id`),
  KEY `attribute_id` (`attribute_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `attributes_datetime_values`
--


-- --------------------------------------------------------

--
-- Table structure for table `attributes_date_values`
--

CREATE TABLE IF NOT EXISTS `attributes_date_values` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entity_id` char(36) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `attribute_id` int(11) NOT NULL,
  `value` date DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `entity_id` (`entity_id`),
  KEY `attribute_id` (`attribute_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `attributes_date_values`
--


-- --------------------------------------------------------

--
-- Table structure for table `attributes_float_values`
--

CREATE TABLE IF NOT EXISTS `attributes_float_values` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entity_id` char(36) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `attribute_id` int(11) NOT NULL,
  `value` float DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `entity_id` (`entity_id`),
  KEY `attribute_id` (`attribute_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `attributes_float_values`
--


-- --------------------------------------------------------

--
-- Table structure for table `attributes_integer_values`
--

CREATE TABLE IF NOT EXISTS `attributes_integer_values` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entity_id` char(36) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `attribute_id` int(11) NOT NULL,
  `value` int(11) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `entity_id` (`entity_id`),
  KEY `attribute_id` (`attribute_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `attributes_integer_values`
--


-- --------------------------------------------------------

--
-- Table structure for table `attributes_key_values`
--

CREATE TABLE IF NOT EXISTS `attributes_key_values` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entity_id` char(36) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `attribute_id` int(11) NOT NULL,
  `value` int(11) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `entity_id` (`entity_id`),
  KEY `attribute_id` (`attribute_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `attributes_key_values`
--


-- --------------------------------------------------------

--
-- Table structure for table `attributes_string_values`
--

CREATE TABLE IF NOT EXISTS `attributes_string_values` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entity_id` char(36) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `attribute_id` int(11) NOT NULL,
  `value` varchar(255) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `entity_id` (`entity_id`),
  KEY `attribute_id` (`attribute_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `attributes_string_values`
--

INSERT INTO `attributes_string_values` (`id`, `entity_id`, `attribute_id`, `value`, `created`, `modified`) VALUES
(1, '1', 1, 'Erode', '2013-05-28 10:18:42', '2013-05-28 10:18:42'),
(2, '1', 2, 'san@san.com', '2013-05-28 10:18:42', '2013-05-28 10:18:42'),
(3, '2', 1, 'sdf', '2013-05-28 10:31:00', '2013-05-28 10:31:00'),
(4, '2', 2, 'sfd', '2013-05-28 10:31:00', '2013-05-28 10:31:00'),
(11, '3', 1, 'cbe', '2013-05-28 11:55:34', '2013-05-28 11:55:34'),
(12, '3', 2, 'sakthikumar@angleritech.com', '2013-05-28 11:55:34', '2013-05-28 11:55:34'),
(13, '2', 1, 'ss', '2013-05-28 11:57:18', '2013-05-28 11:57:18'),
(14, '2', 2, 'ssdd', '2013-05-28 11:57:18', '2013-05-28 11:57:18'),
(15, '2', 1, 'salem', '2013-05-28 12:23:30', '2013-05-28 12:23:30'),
(16, '2', 2, 'k@k.com', '2013-05-28 12:23:30', '2013-05-28 12:23:30'),
(17, '4', 1, 'lakk', '2013-05-28 12:23:59', '2013-05-28 12:23:59'),
(18, '4', 2, 'man@man.com', '2013-05-28 12:23:59', '2013-05-28 12:23:59'),
(19, '1', 1, 'Erode', '2013-05-28 12:24:07', '2013-05-28 12:24:07'),
(20, '1', 2, 'san@san.com', '2013-05-28 12:24:07', '2013-05-28 12:24:07'),
(21, '5', 1, 'sdfsdf', '2013-05-29 14:52:24', '2013-05-29 14:52:24'),
(22, '5', 2, 'sdfsdf@sd.com', '2013-05-29 14:52:24', '2013-05-29 14:52:24'),
(23, '6', 1, 'dsfgdfg', '2013-05-29 17:18:39', '2013-05-29 17:18:39'),
(24, '6', 2, 'sddfg@safd.com', '2013-05-29 17:18:39', '2013-05-29 17:18:39');

-- --------------------------------------------------------

--
-- Table structure for table `attributes_text_values`
--

CREATE TABLE IF NOT EXISTS `attributes_text_values` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entity_id` char(36) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `attribute_id` int(11) NOT NULL,
  `value` text,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `entity_id` (`entity_id`),
  KEY `attribute_id` (`attribute_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `attributes_text_values`
--


-- --------------------------------------------------------

--
-- Table structure for table `attributes_timestamp_values`
--

CREATE TABLE IF NOT EXISTS `attributes_timestamp_values` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entity_id` char(36) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `attribute_id` int(11) NOT NULL,
  `value` datetime DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `entity_id` (`entity_id`),
  KEY `attribute_id` (`attribute_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `attributes_timestamp_values`
--


-- --------------------------------------------------------

--
-- Table structure for table `attributes_time_values`
--

CREATE TABLE IF NOT EXISTS `attributes_time_values` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entity_id` char(36) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `attribute_id` int(11) NOT NULL,
  `value` time DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `entity_id` (`entity_id`),
  KEY `attribute_id` (`attribute_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `attributes_time_values`
--


-- --------------------------------------------------------

--
-- Table structure for table `attributes_uuid_values`
--

CREATE TABLE IF NOT EXISTS `attributes_uuid_values` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entity_id` char(36) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `attribute_id` int(11) NOT NULL,
  `value` char(36) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `entity_id` (`entity_id`),
  KEY `attribute_id` (`attribute_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `attributes_uuid_values`
--


-- --------------------------------------------------------

--
-- Table structure for table `auditchecklists`
--

CREATE TABLE IF NOT EXISTS `auditchecklists` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tenant_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `schedulecategory_id` int(11) NOT NULL,
  `process_id` int(11) NOT NULL,
  `auditchecklist_name` varchar(40) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `auditchecklists`
--

INSERT INTO `auditchecklists` (`id`, `tenant_id`, `department_id`, `schedulecategory_id`, `process_id`, `auditchecklist_name`, `status`) VALUES
(1, 2, 1, 2, 1, 'Test audit check list', 1),
(2, 2, 2, 1, 2, 'tesssst', 1);

-- --------------------------------------------------------

--
-- Table structure for table `auditschedules`
--

CREATE TABLE IF NOT EXISTS `auditschedules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tenant_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `schedulecategory_id` int(11) NOT NULL,
  `schedulesubcategory_id` int(11) NOT NULL,
  `auditor` varchar(40) NOT NULL,
  `supporting_auditor` varchar(40) NOT NULL,
  `auditee` varchar(40) NOT NULL,
  `supporting_auditee` varchar(40) NOT NULL,
  `organizer` varchar(40) NOT NULL,
  `project_name` varchar(40) NOT NULL,
  `process_id` int(11) NOT NULL,
  `audit_datetime` datetime NOT NULL,
  `meetingroom_id` int(11) NOT NULL,
  `reschedule_approval_authority` varchar(40) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `auditschedules`
--

INSERT INTO `auditschedules` (`id`, `tenant_id`, `department_id`, `schedulecategory_id`, `schedulesubcategory_id`, `auditor`, `supporting_auditor`, `auditee`, `supporting_auditee`, `organizer`, `project_name`, `process_id`, `audit_datetime`, `meetingroom_id`, `reschedule_approval_authority`, `status`) VALUES
(1, 2, 1, 2, 1, 'sankar', 'kavitha', 'mohanapriya', 'sankar', 'sakthikumar', 'Angler QMS', 1, '2013-05-30 18:04:00', 1, 'Parthiban', 1),
(2, 2, 1, 2, 2, 'kann', 'mano', 'adhi', 'san', 'sasi', 'cbedirect', 2, '2013-06-30 18:05:00', 1, 'sfdsdf', 0);

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE IF NOT EXISTS `companies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(64) NOT NULL,
  `domain_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `company_id` (`company_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `company_name`, `domain_name`, `username`, `password`, `created`, `modified`) VALUES
(1, 'Angler ', 'angleritech.com', 'angler', 'YW5nbGVy', '2013-05-29 18:19:26', '2013-05-29 18:19:26'),
(2, 'kansaro', 'san.com', 'sankar', 'c2Fu', '2013-05-29 18:55:43', '2013-05-29 18:56:03');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `created`, `modified`) VALUES
(1, 'sankar', '2013-05-28 10:18:42', '2013-05-28 12:24:07'),
(2, 'second', '2013-05-28 10:31:00', '2013-05-28 12:23:30'),
(3, 'new', '2013-05-28 10:31:44', '2013-05-28 11:55:33'),
(4, 'mani1', '2013-05-28 12:23:59', '2013-05-29 16:55:45'),
(5, 'madhu', '2013-05-29 14:52:24', '2013-05-29 15:16:47'),
(6, 'dfgdfg', '2013-05-29 17:18:39', '2013-05-29 17:18:39');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE IF NOT EXISTS `departments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tenant_id` int(11) NOT NULL,
  `department_name` varchar(40) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `tenant_id`, `department_name`, `status`) VALUES
(1, 2, 'EIT', 1),
(2, 2, 'IM', 1);

-- --------------------------------------------------------

--
-- Table structure for table `meetingrooms`
--

CREATE TABLE IF NOT EXISTS `meetingrooms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tenant_id` int(11) NOT NULL,
  `meetingroom_name` varchar(40) NOT NULL,
  `meetingroom_description` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `meetingrooms`
--

INSERT INTO `meetingrooms` (`id`, `tenant_id`, `meetingroom_name`, `meetingroom_description`, `status`) VALUES
(1, 2, 'Test', 'sfsfd', 1),
(2, 2, 'second', 'sfsdfasdf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orderlines`
--

CREATE TABLE IF NOT EXISTS `orderlines` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `orderlines`
--


-- --------------------------------------------------------

--
-- Table structure for table `processes`
--

CREATE TABLE IF NOT EXISTS `processes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tenant_id` int(11) NOT NULL,
  `schedulecategory_id` int(11) NOT NULL,
  `process_name` varchar(40) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `processes`
--

INSERT INTO `processes` (`id`, `tenant_id`, `schedulecategory_id`, `process_name`, `status`) VALUES
(1, 2, 1, 'Test process', 1),
(2, 2, 2, 'second process', 1);

-- --------------------------------------------------------

--
-- Table structure for table `schedulecategories`
--

CREATE TABLE IF NOT EXISTS `schedulecategories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tenant_id` int(11) NOT NULL,
  `schedule_type` int(11) NOT NULL,
  `schedulecategory_name` varchar(40) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `schedulecategories`
--

INSERT INTO `schedulecategories` (`id`, `tenant_id`, `schedule_type`, `schedulecategory_name`, `status`) VALUES
(1, 2, 0, 'test', 1),
(2, 2, 1, 'two', 1);

-- --------------------------------------------------------

--
-- Table structure for table `schedulesubcategories`
--

CREATE TABLE IF NOT EXISTS `schedulesubcategories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tenant_id` int(11) NOT NULL,
  `schedule_type` varchar(40) NOT NULL,
  `schedulecategory_id` int(11) NOT NULL,
  `schedulesubcategory_name` varchar(40) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `schedulesubcategories`
--

INSERT INTO `schedulesubcategories` (`id`, `tenant_id`, `schedule_type`, `schedulecategory_id`, `schedulesubcategory_name`, `status`) VALUES
(1, 2, '0', 1, 'subcat1', 1),
(2, 2, '1', 2, 'subcat2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `usergroups`
--

CREATE TABLE IF NOT EXISTS `usergroups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tenant_id` int(11) NOT NULL,
  `usergroup_name` varchar(40) NOT NULL,
  `department_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `usergroups`
--

INSERT INTO `usergroups` (`id`, `tenant_id`, `usergroup_name`, `department_id`, `status`) VALUES
(1, 2, 'sankar', 1, 1),
(2, 2, 'sdlc', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(40) NOT NULL,
  `first_name` varchar(40) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `email` varchar(100) NOT NULL,
  `designation` varchar(40) NOT NULL,
  `department_id` int(11) NOT NULL,
  `usergroup_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `title`, `first_name`, `last_name`, `email`, `designation`, `department_id`, `usergroup_id`, `username`, `password`, `status`) VALUES
(1, 'new', 'sankar', 'kannan', 'san@san.com', 'php', 1, 1, 'sankar', 'c2Fu', 1),
(2, 'sdf', 'sdf', 'sdf', 'sdf@angleritech.com', 'sfd', 2, 1, 'sdf', 'c2Rm', 1),
(3, 'kal', 'kan', 'nan', 'test@san.com', '.net', 2, 2, 'test', 'dGVzdA==', 1),
(4, 'sec tst', 'mad', 'dhu', 'kan@angleritech.com', 'seo', 1, 1, 'kan', 'a2Fu', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
