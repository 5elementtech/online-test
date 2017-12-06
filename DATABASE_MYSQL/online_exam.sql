-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2014 at 08:06 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `online_exam`
--
CREATE DATABASE IF NOT EXISTS `online_exam` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `online_exam`;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `department_id` int(11) NOT NULL AUTO_INCREMENT,
  `department_code` varchar(255) NOT NULL,
  `department_name` varchar(255) NOT NULL,
  PRIMARY KEY (`department_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `department_code`, `department_name`) VALUES
(1, 'D1', 'Sales'),
(2, 'D2', 'Production'),
(3, 'D3', 'Customer Support');

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE IF NOT EXISTS `exams` (
  `exam_id` int(11) NOT NULL AUTO_INCREMENT,
  `exam_name` longtext NOT NULL,
  `exam_from` date NOT NULL,
  `exam_to` date NOT NULL,
  `passing_score` int(11) NOT NULL,
  `exam_date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `exam_created_by` int(11) NOT NULL,
  `exam_modified_by` int(11) NOT NULL,
  `exam_time_limit` int(11) NOT NULL,
  `isdeleted` int(11) DEFAULT '0',
  `passing_grade` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  PRIMARY KEY (`exam_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`exam_id`, `exam_name`, `exam_from`, `exam_to`, `passing_score`, `exam_date_created`, `exam_created_by`, `exam_modified_by`, `exam_time_limit`, `isdeleted`, `passing_grade`, `department_id`) VALUES
(23, 'FREQUENTLY ASKED QUESTIONS (FAQs)', '2013-04-03', '2018-01-19', 20, '2013-04-03 04:23:18', 1, 1, 1740, 0, 75, 1),
(24, 'FREQUENTLY ASKED QUESTIONS (FAQs) SET 2', '2013-08-21', '2018-01-19', 20, '2013-04-11 01:43:01', 1, 1, 1740, 0, 75, 1),
(25, 'FREQUENTLY ASKED QUESTIONS (FAQs) SET 3', '2013-04-29', '2018-01-19', 16, '2013-04-19 09:01:30', 1, 1, 1800, 0, 75, 1);

-- --------------------------------------------------------

--
-- Table structure for table `exams_answers`
--

CREATE TABLE IF NOT EXISTS `exams_answers` (
  `answer_id` int(11) NOT NULL AUTO_INCREMENT,
  `question_id` int(11) NOT NULL,
  `answer_name` longtext NOT NULL,
  `answer_flag` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`answer_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=270 ;

--
-- Dumping data for table `exams_answers`
--

INSERT INTO `exams_answers` (`answer_id`, `question_id`, `answer_name`, `answer_flag`) VALUES
(189, 75, 'Ad Acquisition', 0),
(188, 75, 'Paid or Priority Ad Listing', 1),
(187, 75, 'Ad portal', 0),
(186, 74, 'Bandwith', 0),
(185, 74, 'Portal', 0),
(184, 74, 'Traffic', 1),
(183, 73, '2,000 plus VAT', 0),
(182, 73, '1,5000 plus VAT', 1),
(181, 73, '1,000 plus VAT', 0),
(180, 72, '11,000 plus VAT', 0),
(179, 72, '10,000 plus VAT', 1),
(178, 72, '12,000 plus VAT', 0),
(190, 76, 'Same rate', 0),
(191, 76, 'Less than the original price', 0),
(192, 76, 'Might go up / drop by 10%', 1),
(193, 77, 'Yes', 1),
(194, 77, 'No', 0),
(195, 78, 'No', 1),
(196, 78, 'Yes', 0),
(197, 79, 'No', 1),
(198, 79, 'Yes', 0),
(199, 80, 'No', 1),
(200, 80, 'Yes', 0),
(201, 81, 'No', 1),
(202, 81, 'Yes', 0),
(203, 84, '4 MB', 0),
(204, 84, '5 MB', 1),
(205, 84, '200 MB', 0),
(206, 85, '1,000 plus VAT', 0),
(207, 85, '1,500 plus VAT', 1),
(208, 85, '2,000 plus VAT', 0),
(209, 86, 'Traffic', 0),
(210, 86, 'Portal', 0),
(211, 86, 'Bandwith', 1),
(212, 87, 'Custom Redirection', 0),
(213, 87, 'Partial Custom ', 1),
(214, 87, 'Full Custom Domain', 0),
(215, 88, 'No', 1),
(216, 88, 'Yes', 0),
(217, 89, 'Yes', 1),
(218, 89, 'No', 0),
(219, 90, 'No', 1),
(220, 90, 'Yes', 0),
(221, 91, 'No', 1),
(222, 91, 'Yes', 0),
(223, 92, 'Yes', 1),
(224, 92, 'No', 0),
(225, 95, 'Same rate', 0),
(226, 95, 'Less than the original price', 0),
(227, 95, 'Might go up / drop by 10%', 1),
(228, 97, '4MB', 1),
(229, 97, '10MB', 0),
(230, 97, '6MB', 0),
(231, 97, '20MB', 0),
(232, 98, '10', 0),
(233, 98, '5', 0),
(234, 98, '8', 1),
(235, 98, '12', 0),
(236, 99, '1 PER SHOP / 2 CUSTOM PLUS 3 GOOGLE FORM AS LONG AS IT IS NOT IN THE SAME PAGE', 0),
(237, 99, '1 PER SHOP / 1 CUSTOM PLUS 1 GOOGLE FORM AS LONG AS IT IS NOT IN THE SAME PAGE', 1),
(238, 99, '1 PER SHOP / 1 CUSTOM PLUS 2 GOOGLE FORM AS LONG AS IT IS NOT IN THE SAME PAGE', 0),
(239, 99, '2 PER SHOP / 1 CUSTOM PLUS 1 GOOGLE FORM AS LONG AS IT IS NOT IN THE SAME PAGE', 0),
(240, 100, 'YES', 0),
(241, 100, 'NO', 1),
(242, 101, 'YES', 0),
(243, 101, 'NO', 1),
(244, 102, '250MB', 0),
(245, 102, '200MB', 0),
(246, 102, '300MB', 1),
(247, 102, '350MB', 0),
(249, 105, 'YES', 1),
(250, 105, 'NO', 0),
(251, 114, 'Web Client Form', 0),
(252, 114, 'Web Content Form', 1),
(253, 114, 'Web Contact Form', 0),
(254, 114, 'Web Customer Form', 0),
(255, 116, '5', 0),
(256, 116, '2', 0),
(257, 116, '3', 1),
(258, 116, '1', 0),
(259, 117, 'Basic: 10 , Business: 23 , Premium: 41', 0),
(260, 117, 'Basic: 13 , Business: 35 , Premium: 45', 0),
(261, 117, 'Basic: 13 , Business: 25 , Premium: 40', 1),
(262, 117, 'Basic: 13 , Business:15 , Premium: 30', 0),
(263, 118, '890 px', 0),
(264, 118, '990 px', 1),
(265, 118, '950 px', 0),
(266, 118, '1024 px', 0),
(267, 122, 'Dawn Flores', 0),
(268, 122, 'Angela Gabrielle', 1);

-- --------------------------------------------------------

--
-- Table structure for table `exams_question`
--

CREATE TABLE IF NOT EXISTS `exams_question` (
  `question_id` int(11) NOT NULL AUTO_INCREMENT,
  `exam_id` int(11) NOT NULL,
  `question_name` longtext NOT NULL,
  `question_code` varchar(255) NOT NULL,
  `question_type` int(11) DEFAULT '0',
  `question_date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `question_date_modified` datetime NOT NULL,
  `question_modified_by` int(11) NOT NULL,
  `question_created_by` int(11) NOT NULL,
  `essay_points` int(11) NOT NULL,
  PRIMARY KEY (`question_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=123 ;

--
-- Dumping data for table `exams_question`
--

INSERT INTO `exams_question` (`question_id`, `exam_id`, `question_name`, `question_code`, `question_type`, `question_date_created`, `question_date_modified`, `question_modified_by`, `question_created_by`, `essay_points`) VALUES
(80, 23, 'Is it possible for the client to have their own customer database?', '', 0, '2013-04-03 04:42:36', '0000-00-00 00:00:00', 0, 1, 0),
(79, 23, 'Would it be possible to turn-over files/html pages to the client in case they no longer want to renew their contract?', '', 0, '2013-04-03 04:42:15', '0000-00-00 00:00:00', 0, 1, 0),
(78, 23, 'If the client already has a domain and hosting services, is it possible for him/her to avail design services only?', '', 0, '2013-04-03 04:41:53', '0000-00-00 00:00:00', 0, 1, 0),
(76, 23, 'How much does shop renewal costs?', '', 0, '2013-04-03 04:25:35', '0000-00-00 00:00:00', 0, 1, 0),
(77, 23, 'Can we Link Videos to the shops?', '', 0, '2013-04-03 04:26:12', '0000-00-00 00:00:00', 0, 1, 0),
(75, 23, ' What is the value added service that enables your Ad to stand out from the rest of the Listing??', '', 0, '2013-04-03 05:59:07', '0000-00-00 00:00:00', 0, 1, 0),
(74, 23, 'What is the internet term that refers to the number of times your visitor views your website?', '', 0, '2013-04-03 04:24:31', '0000-00-00 00:00:00', 0, 1, 0),
(73, 23, 'How much is the additional payment for Paypal Application?', '', 0, '2013-04-03 04:24:00', '0000-00-00 00:00:00', 0, 1, 0),
(72, 23, 'How much is the additional payment for E-Commerce Application?', '', 0, '2013-04-03 04:23:28', '0000-00-00 00:00:00', 0, 1, 0),
(81, 23, 'Are Sulit and Multiply direct competitors of company?', '', 0, '2014-08-21 03:57:40', '0000-00-00 00:00:00', 0, 1, 0),
(82, 23, ' In what ways can company improve the shopâ€™s traffic?  (5points) ', '', 1, '2014-08-21 03:56:03', '0000-00-00 00:00:00', 0, 1, 5),
(83, 23, '  What is the difference between Search engine-friendly services and SEO-optimized services? (5points)', '', 1, '2013-04-05 04:59:27', '0000-00-00 00:00:00', 0, 1, 5),
(84, 24, 'How big is the allowable size per image?', '', 0, '2013-04-11 01:43:40', '0000-00-00 00:00:00', 0, 1, 0),
(85, 24, 'How much is the additional payment for Paypal Application?', '', 0, '2013-04-11 01:44:21', '0000-00-00 00:00:00', 0, 1, 0),
(86, 24, 'What is the internet term that refers to the data consumed per website visit?', '', 0, '2013-04-11 01:44:56', '0000-00-00 00:00:00', 0, 1, 0),
(87, 24, 'What type of domain attachment allows a custom domain URL to be attached to the home page of the shop yet retains company shop domain URL on inside pages?', '', 0, '2014-08-21 03:58:22', '0000-00-00 00:00:00', 0, 1, 0),
(88, 24, 'Full Custom Domain requests require approval from Client. Yes or No?', '', 0, '2013-04-11 01:46:11', '0000-00-00 00:00:00', 0, 1, 0),
(89, 24, 'Can the packages be made more dynamic??', '', 0, '2013-04-11 01:46:56', '0000-00-00 00:00:00', 0, 1, 0),
(90, 24, 'Would it be possible to turn-over files/html pages to the client in case they no longer want to renew their contract?', '', 0, '2013-04-11 01:47:28', '0000-00-00 00:00:00', 0, 1, 0),
(91, 24, 'Is it possible for the client to have their own customer database?', '', 0, '2013-04-11 01:47:54', '0000-00-00 00:00:00', 0, 1, 0),
(92, 24, 'Do Web-based CMS allow users to modify their page contents?', '', 0, '2013-04-11 01:48:19', '0000-00-00 00:00:00', 0, 1, 0),
(93, 24, 'How does company business model different from Multiplyâ€™s and Sulitâ€™s.  (5points)', '', 1, '2014-08-21 03:56:17', '0000-00-00 00:00:00', 0, 1, 5),
(94, 24, 'Differentiate web design from web hosting services. (5points)', '', 1, '2013-04-11 01:49:19', '0000-00-00 00:00:00', 0, 1, 5),
(95, 24, 'How much does shop renewal costs?', '', 0, '2013-04-11 01:50:33', '0000-00-00 00:00:00', 0, 1, 0),
(96, 25, ' Give three  file types accepted in our file library / What file types are allowed to be uploaded in our file library?  ', '', 1, '2013-04-19 09:13:02', '0000-00-00 00:00:00', 0, 1, 3),
(97, 25, 'What is the maximum size of files to be uploaded', '', 0, '2013-04-19 09:03:17', '0000-00-00 00:00:00', 0, 1, 0),
(98, 25, 'What is the maximum tab number allowed in our shop builder?', '', 0, '2013-04-19 09:04:12', '0000-00-00 00:00:00', 0, 1, 0),
(99, 25, 'How many custom forms are allowed?', '', 0, '2013-04-19 09:05:56', '0000-00-00 00:00:00', 0, 1, 0),
(100, 25, 'Do we accept â€œstep by stepâ€ form formats? ', '', 0, '2013-04-19 09:06:40', '0000-00-00 00:00:00', 0, 1, 0),
(101, 25, 'Does our shop builder support flash?  ', '', 0, '2013-04-19 09:07:04', '0000-00-00 00:00:00', 0, 1, 0),
(102, 25, 'What is the storage capacity of our shop builder? ', '', 0, '2013-04-19 09:07:40', '0000-00-00 00:00:00', 0, 1, 0),
(103, 25, ' What are the ONLY allowed transition effects of our slider? ', '', 1, '2013-04-19 09:10:35', '0000-00-00 00:00:00', 0, 1, 1),
(104, 25, 'Is it possible to change the color of tabs? / What tab element/s can we customize? ', '', 1, '2013-04-19 09:11:21', '0000-00-00 00:00:00', 0, 1, 5),
(105, 25, 'Can we convert subpages to tabs or vice versa?  ', '', 0, '2013-04-19 09:11:41', '0000-00-00 00:00:00', 0, 1, 0),
(119, 26, 'What is pagination? ', '', 1, '2013-04-22 04:51:38', '0000-00-00 00:00:00', 0, 25, 3),
(118, 26, 'What is the allowed size of pictures for our company shop?', '', 0, '2014-08-21 03:59:10', '0000-00-00 00:00:00', 0, 25, 0),
(117, 26, 'How many pages are allowed for the following: Basic? Business? Premium?', '', 0, '2013-04-22 04:49:47', '0000-00-00 00:00:00', 0, 25, 0),
(116, 26, 'How many domain names do we need to get from the client for WCF?', '', 0, '2013-04-22 04:48:51', '0000-00-00 00:00:00', 0, 25, 0),
(114, 26, 'What is WCF?', '', 0, '2013-04-22 04:46:54', '0000-00-00 00:00:00', 0, 25, 0),
(115, 26, 'What is Custom Domain?', '', 1, '2013-04-22 04:48:41', '0000-00-00 00:00:00', 0, 25, 5),
(120, 26, 'What are subpages?', '', 1, '2013-04-22 04:51:48', '0000-00-00 00:00:00', 0, 25, 3),
(121, 26, 'What are the differences of the following?  Static, with transition, fade, flash/pulse & fade slide?', '', 1, '2013-04-22 04:52:02', '0000-00-00 00:00:00', 0, 25, 5),
(122, 27, ' Who is my love?', '', 0, '2014-08-21 05:18:55', '0000-00-00 00:00:00', 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `transaction_id` int(11) NOT NULL AUTO_INCREMENT,
  `transaction_date` date NOT NULL,
  `transaction_code` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `time_consumed` int(11) NOT NULL,
  `check_status` int(11) NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=107 ;

-- --------------------------------------------------------

--
-- Table structure for table `transaction_dtl`
--

CREATE TABLE IF NOT EXISTS `transaction_dtl` (
  `transaction_dtl_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `transaction_answer_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `essay` longtext,
  `transaction_code` varchar(255) NOT NULL,
  `transaction_question_type` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `israted` int(11) NOT NULL,
  `checked_by` int(11) NOT NULL,
  PRIMARY KEY (`transaction_dtl_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=930 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_fname` varchar(256) NOT NULL,
  `user_lname` varchar(256) NOT NULL,
  `department_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT '4',
  `user_enabled` int(11) DEFAULT '0',
  `user_createdby` int(11) NOT NULL,
  `user_createdon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_modifiedby` int(11) DEFAULT NULL,
  `user_modifiedon` datetime DEFAULT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_password` varchar(256) NOT NULL,
  `exam_checker` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=70 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_fname`, `user_lname`, `department_id`, `role_id`, `user_enabled`, `user_createdby`, `user_createdon`, `user_modifiedby`, `user_modifiedon`, `user_name`, `user_password`, `exam_checker`) VALUES
(1, 'admin', 'admin', 1, 1, 1, 0, '2013-04-17 08:21:37', 25, '2013-04-17 00:00:00', 'admin', '0192023a7bbd73250516f069df18b500', 1),
(67, 'test1', 'test1', 1, 4, 1, 1, '2013-04-16 10:22:58', NULL, NULL, 'test1', '5a105e8b9d40e1329780d62ea2265d8a', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE IF NOT EXISTS `user_roles` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(255) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`role_id`, `role_name`) VALUES
(1, 'Admin'),
(2, 'Manager'),
(3, 'Team Leader'),
(4, 'Staff');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
