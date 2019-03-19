-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2019 at 08:25 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `fullname`, `email`) VALUES
(1, 'shikhar', 'abcd1234', 'shikharmakker', 'shikharmakker@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `first_test`
--

CREATE TABLE `first_test` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `version` int(255) NOT NULL,
  `JSON_string` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `first_test`
--

INSERT INTO `first_test` (`id`, `name`, `username`, `version`, `JSON_string`) VALUES
(1, 'aiims', 'shikhar', 0, '{\"cords\":[{\"value\":4726,\"connected_nodes\":[3226,4740],\"Tags\":[\"entry\",\"undefined\"],\"name\":\"Entry\",\"description\":\"Welcome\"},{\"value\":3226,\"connected_nodes\":[2226,4726],\"Tags\":[\"OPD 16-22B\",\"Help Desk\"],\"name\":\"Node 1\",\"description\":\"Help Desk Timings 8am-8pm\"},{\"value\":2226,\"connected_nodes\":[3226,2230],\"Tags\":[\"Room 33\",\"34\"],\"name\":\"Node 2\",\"description\":\"T-point 1\"},{\"value\":2230,\"connected_nodes\":[1230,2226,2240],\"Tags\":[\"Room 30\",\"33A,B\",\"undefined\"],\"name\":\"Node 3\",\"description\":\"T-point 2\"},{\"value\":1230,\"connected_nodes\":[2230],\"Tags\":[\"Room 31\"],\"name\":\"Node 5\",\"description\":\"Rooms\"},{\"value\":4740,\"connected_nodes\":[4726,3240],\"Tags\":[\"Medical Record\",\"undefined\"],\"name\":\"Node 6\",\"description\":\"Near Help Desk\"},{\"value\":2240,\"connected_nodes\":[3240,2230],\"Tags\":[\"Lift\",\"undefined\"],\"name\":\"Node 8\",\"description\":\"Intersection\"},{\"value\":3240,\"connected_nodes\":[4740,2240],\"Tags\":[\"Room 21b\",\"undefined\"],\"name\":\"Node 7\",\"description\":\"Help Desk Open till midnight\"}]}'),
(2, 'aiims', 'shikhar', 1, '{\"cords\":[{\"value\":4726,\"connected_nodes\":[3226,4740],\"Tags\":[\"entry\",\"undefined\"],\"name\":\"Entry\",\"description\":\"Welcome\"},{\"value\":3226,\"connected_nodes\":[2226,4726],\"Tags\":[\"OPD 16-22B\",\"Help Desk\"],\"name\":\"Node 1\",\"description\":\"Help Desk Timings 8am-8pm\"},{\"value\":2226,\"connected_nodes\":[3226,2230],\"Tags\":[\"Room 33\",\"34\"],\"name\":\"Node 2\",\"description\":\"T-point 1\"},{\"value\":2230,\"connected_nodes\":[1230,2226,2240],\"Tags\":[\"Room 30\",\"33A,B\",\"undefined\"],\"name\":\"Node 3\",\"description\":\"T-point 2\"},{\"value\":1230,\"connected_nodes\":[2230,530],\"Tags\":[\"Room 31\"],\"name\":\"Node 5\",\"description\":\"Rooms\"},{\"value\":4740,\"connected_nodes\":[4726,3240],\"Tags\":[\"Medical Record\",\"undefined\"],\"name\":\"Node 6\",\"description\":\"Near Help Desk\"},{\"value\":2240,\"connected_nodes\":[3240,2230],\"Tags\":[\"Lift\",\"undefined\"],\"name\":\"Node 8\",\"description\":\"Intersection\"},{\"value\":3240,\"connected_nodes\":[4740,2240],\"Tags\":[\"Room 21b\",\"undefined\"],\"name\":\"Node 7\",\"description\":\"Help Desk Open till midnight\"},{\"value\":530,\"connected_nodes\":[1230],\"Tags\":[],\"name\":\"\",\"description\":\"\"}]}'),
(3, 'abcd', 'shikharabcd', 0, '[{\"key\":\"hellodfs\",\"value\":\"{abc:\"sdfsdsadsaf\"}\",\"description\":\"\",\"type\":\"text\",\"enabled\":true}]'),
(4, 'abcd', 'shikharabcd', 1, '[{\"key\":\"hellodfs\",\"value\":\"{abc:\"sdfsdsadsaf\"}\",\"description\":\"\",\"type\":\"text\",\"enabled\":true}]');

-- --------------------------------------------------------

--
-- Table structure for table `maps`
--

CREATE TABLE `maps` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `maps`
--

INSERT INTO `maps` (`id`, `name`, `username`, `file_name`, `date`) VALUES
(1, 'aiims', 'shikhar', 'shikharaiims.jpg', '2019-02-27 00:00:00'),
(2, 'floor_1', 'shikhar', 'floor_1.jpg', '2019-03-19 08:00:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `first_test`
--
ALTER TABLE `first_test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maps`
--
ALTER TABLE `maps`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `first_test`
--
ALTER TABLE `first_test`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `maps`
--
ALTER TABLE `maps`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
