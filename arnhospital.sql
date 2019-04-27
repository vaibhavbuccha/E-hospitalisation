-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2019 at 09:14 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arnhospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'vaibhav', '310a87565a48526e9d096f917007dbfe');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date` varchar(100) NOT NULL,
  `issue` varchar(1000) NOT NULL,
  `time` varchar(50) NOT NULL,
  `Doctor` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `name`, `date`, `issue`, `time`, `Doctor`) VALUES
(1, 'vaibhav', '2019-04-09', 'fever', '23:44', 'nipun'),
(2, 'nipun', '2019-04-10', 'headache', '22:58', 'Dr. rishi'),
(3, 'aman', '2019-04-09', 'fever', '23:57', 'nipun'),
(4, 'prashant', '2019-04-10', 'fever', '12:01', 'nipun'),
(5, 'rishi', '2019-04-10', 'headache', '22:00', 'Dr. rishi'),
(6, 'aayush', '2019-04-28', 'fever', '12:59', 'Dr. rishi');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `name`, `email`, `password`) VALUES
(1, 'nipun', 'nipun@gmail.com', 'b9e88579af34e13717f84345039b8b4d'),
(2, 'Dr. rishi', 'rishi@gmail.com', 'ac4b0a568e8d3a14b521eae07006bc95');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `report` varchar(255) NOT NULL,
  `date` varchar(50) NOT NULL,
  `report_desc` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`id`, `name`, `report`, `date`, `report_desc`) VALUES
(1, 'vaibhav', 'INDEX.docx', '26-Apr-2019', 'this is your report'),
(2, 'aayush', 'Registration Form.pdf', '27-Apr-2019', 'blood report'),
(3, 'rishi', 'Registration Form.pdf', '27-Apr-2019', 'report ok');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`) VALUES
(1, 'vaibhav', 'jainvaibhav415@gmail.com', '310a87565a48526e9d096f917007dbfe'),
(2, 'aman', 'amanjainkdl@gmail.com', '310a87565a48526e9d096f917007dbfe'),
(4, 'rishi', 'rishi@gmail.com', 'ac4b0a568e8d3a14b521eae07006bc95'),
(5, 'nehabuccha', 'nehabuccha@gmail.com', '262f5bdd0af9098e7443ab1f8e435290'),
(6, 'aayush', 'aayush@gmail.com', '6bc80b9416b95aac0cf7757fc1bb1e65');

-- --------------------------------------------------------

--
-- Table structure for table `view`
--

CREATE TABLE `view` (
  `id` int(255) NOT NULL,
  `topbg` varchar(255) NOT NULL,
  `doc1` varchar(255) NOT NULL,
  `doc2` varchar(255) NOT NULL,
  `doc3` varchar(255) NOT NULL,
  `service1_title` varchar(255) NOT NULL,
  `service2_title` varchar(255) NOT NULL,
  `service3_title` varchar(255) NOT NULL,
  `service1_content` varchar(1000) NOT NULL,
  `service2_content` varchar(1000) NOT NULL,
  `service3_content` varchar(1000) NOT NULL,
  `about` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `view`
--

INSERT INTO `view` (`id`, `topbg`, `doc1`, `doc2`, `doc3`, `service1_title`, `service2_title`, `service3_title`, `service1_content`, `service2_content`, `service3_content`, `about`) VALUES
(1, 'image/carosul.jpg', 'image/sins.png', 'image/doc1.png', 'image/doc3.png', 'Book your Appointment on phone', 'book bed online', 'Reports on phone', 'Establishing and maintaining a hospital blog may seem like it should be an afterthought to the greater goal of providing care to patients onsite. But by disseminating professionally vetted content, healthcare facilities can become invaluable resources for people with limited access to care, as well as those interested in preventative medicine.', 'Establishing and maintaining a hospital blog may seem like it should be an afterthought to the greater goal of providing care to patients onsite. But by disseminating professionally vetted content, healthcare facilities can become invaluable resources for people with limited access to care, as well as those interested in preventative medicine.', 'Establishing and maintaining a hospital blog may seem like it should be an afterthought to the greater goal of providing care to patients onsite. But by disseminating professionally vetted content, healthcare facilities can become invaluable resources for people with limited access to care, as well as those interested in preventative medicine.', 'Two years ago, we identified 15 hospitals with engaging, substantive blogs that help position the institutions as leaders within the healthcare field. Since then, even more medical facilities have invested in their online presence with the goal of delivering healthcare guidance, medical tips, and industry overviews to their patients, industry peers, and local communities.\r\n\r\nEstablishing and maintaining a hospital blog may seem like it should be an afterthought to the greater goal of providing care to patients onsite. But by disseminating professionally vetted content, healthcare facilities can become invaluable resources for people with limited access to care, as well as those interested in preventative medicine. Additionally, hospital blogs that detail their institutionâ€™s unique practices and methodologies can help direct patients to the facilities that best suit their needs.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `view`
--
ALTER TABLE `view`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `view`
--
ALTER TABLE `view`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
