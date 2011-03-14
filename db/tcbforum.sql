-- phpMyAdmin SQL Dump
-- version 3.3.2deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 14, 2011 at 02:26 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.2-1ubuntu4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tcbforum`
--

-- --------------------------------------------------------

--
-- Table structure for table `forums`
--

CREATE TABLE IF NOT EXISTS `forums` (
  `forum_id` int(11) NOT NULL,
  `forum_parent_id` int(11) NOT NULL,
  `forum_name` text NOT NULL,
  `forum_descr` text NOT NULL,
  `forum_last_post_id` int(11) DEFAULT NULL COMMENT 'Topic Id',
  `forum_type` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forums`
--

INSERT INTO `forums` (`forum_id`, `forum_parent_id`, `forum_name`, `forum_descr`, `forum_last_post_id`, `forum_type`) VALUES
(1, 0, 'Category1', 'This is category 1', NULL, 0),
(2, 1, 'Forum 1', 'this is forum1', NULL, 1),
(3, 0, 'Category2', 'This is category2', NULL, 0),
(4, 3, 'Forum 2', 'This is forum 2', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `post_id` int(11) NOT NULL,
  `post_title` text NOT NULL,
  `post_body` text NOT NULL,
  `post_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--


-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE IF NOT EXISTS `topics` (
  `topic_id` int(11) NOT NULL,
  `topic_title` text NOT NULL,
  `topic_first_post_id` int(11) NOT NULL,
  `forum_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topics`
--

