-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2022 at 09:55 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `socialmedia`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `postid` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(22) NOT NULL,
  `created_by_ip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`postid`, `title`, `image`, `description`, `created_at`, `created_by`, `created_by_ip`) VALUES
(1, 'My Posts', '1671871002_37-root_alittlegirlwitharedchristmastreeinherhan20220118233415utc.jpg', 'Hello this is my post', '2022-12-24 09:36:42', 1, '::1'),
(2, 'My Birds Post', '1671871073_9-root_PexelsVideos1966695.mp4', 'Travel to river side', '2022-12-24 09:37:53', 1, '::1');

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

CREATE TABLE `user_tbl` (
  `id` int(11) NOT NULL,
  `username` varchar(256) NOT NULL,
  `contact` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `dob` date NOT NULL,
  `address` text NOT NULL,
  `usertags` text DEFAULT NULL,
  `userprofile` varchar(255) DEFAULT NULL,
  `created_at` date NOT NULL,
  `created_by_ip` varchar(256) NOT NULL,
  `userrole` int(2) NOT NULL DEFAULT 2 COMMENT '1=Admin,2=User',
  `userstatus` int(2) NOT NULL DEFAULT 1 COMMENT '1=Active, 2=Deactive',
  `tooken` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`id`, `username`, `contact`, `email`, `password`, `dob`, `address`, `usertags`, `userprofile`, `created_at`, `created_by_ip`, `userrole`, `userstatus`, `tooken`) VALUES
(1, 'Om Prakash', '7870876219', 'omprakashbhagat1995@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2023-01-21', 'kolkata', 'my tags', '1670660088_57-Om-Prakash_pexelswendywei14397947.jpg', '2022-12-04', '::1', 2, 1, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`postid`);

--
-- Indexes for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `postid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
