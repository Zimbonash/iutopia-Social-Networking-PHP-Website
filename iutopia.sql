-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Dec 22, 2021 at 12:12 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iutopia`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `articleID` bigint(255) NOT NULL,
  `title` varchar(16) DEFAULT NULL,
  `username` varchar(16) DEFAULT NULL,
  `contents` longtext DEFAULT NULL,
  `datePosted` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `username` varchar(16) DEFAULT NULL,
  `friend` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`username`, `friend`) VALUES
('phone', 'Tinashe'),
('phone', 'Zimbonash'),
('Tinashe', 'Zimbonash');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `user` varchar(50) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `dob` varchar(16) DEFAULT NULL,
  `interests` varchar(16) DEFAULT NULL,
  `email` varchar(16) DEFAULT NULL,
  `phone` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`user`, `password`, `dob`, `interests`, `email`, `phone`) VALUES
('phone', 'phone', 'phone', 'phone', 'phone', 'phone'),
('Tinashe', 'Jamanda', '1234567', 'I.T', 'tinasheja', '123345'),
('Zimbonash ', '123Christ', '12/12/12', 'AI, Blockchain', 'zimbonash@gmail.', '12345678910');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(255) UNSIGNED NOT NULL,
  `auth` varchar(16) DEFAULT NULL,
  `recip` varchar(16) DEFAULT NULL,
  `pm` char(1) DEFAULT NULL,
  `time` int(10) UNSIGNED DEFAULT NULL,
  `message` varchar(4096) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `auth`, `recip`, `pm`, `time`, `message`) VALUES
(2, 'Tinashe', 'phone', '0', 1635690772, 'Hi Phone'),
(3, 'phone', 'phone', '1', 1635690953, 'Yo, sup wid it ?'),
(5, 'Zimbonash', 'Tinashe', '1', 1635796809, 'Yo, Sup bro. I finally joined iUtopia. \r\nLets Bomb this place with ideas. '),
(6, 'Tinashe', 'Tinashe', '1', 1635796958, 'Yo, good to see you around here. Lets Goooo!!!!!!!!!!');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `username` varchar(16) DEFAULT NULL,
  `text` varchar(4096) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`username`, `text`) VALUES
('Tinashe', 'Tinashe Jamanda, Information Systems Solutions Architecture @ Amazon South Africa. '),
('Zimbonash', 'Hi, I am Zimbonash. I like AI, Blockchain and Cyber Security Stuff. Cool I know ;)');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `reviewID` bigint(255) NOT NULL,
  `articleID` varchar(16) DEFAULT NULL,
  `memberID` varchar(16) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `content` varchar(4096) DEFAULT NULL,
  `datePosted` varchar(16) DEFAULT NULL,
  `lastUpdate` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`articleID`),
  ADD KEY `username` (`username`(6));

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD KEY `username` (`username`(6)),
  ADD KEY `friend` (`friend`(6));

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD KEY `username` (`user`(6));

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth` (`auth`(6)),
  ADD KEY `recip` (`recip`(6));

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD KEY `username` (`username`(6));

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`reviewID`),
  ADD KEY `username` (`username`(6));

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `articleID` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1292;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `reviewID` bigint(255) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
