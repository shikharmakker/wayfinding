-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2019 at 09:44 PM
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
-- Database: `innav`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `firstname`, `lastname`, `password`, `email`) VALUES
(1, 'dsfsfd', 'dsf', 'sfd', 'a', 'fds'),
(2, 'sdffdsf', 'sdf', 'fdsf', 'a', 'fsf'),
(3, 'shikharmakker', 'shikhar', 'makker', 'abcd1234', 'shikharmakker@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `maps`
--

CREATE TABLE `maps` (
  `id` int(255) NOT NULL,
  `building_name` varchar(255) NOT NULL,
  `floor` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `maps`
--

INSERT INTO `maps` (`id`, `building_name`, `floor`, `username`, `file_name`, `date`) VALUES
(9, 'aiims', 'ground', 'shikhar', 'aiimsground.jpg', '2019-04-09 06:23:47');

-- --------------------------------------------------------

--
-- Table structure for table `maps_data`
--

CREATE TABLE `maps_data` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `version` int(255) NOT NULL,
  `JSON_string` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `maps_data`
--

INSERT INTO `maps_data` (`id`, `name`, `username`, `version`, `JSON_string`) VALUES
(28, 'aiimsground', 'shikhar', 0, '{\"cords\":[{\"value\":2110,\"connected_nodes\":[2125],\"Tags\":[\"43\"],\"name\":\"n1\",\"description\":\"sdfds\"},{\"value\":2125,\"connected_nodes\":[2110,3125],\"Tags\":[\"35a\",\"undefined\"],\"name\":\"n2\",\"description\":\"fsdf\"},{\"value\":3125,\"connected_nodes\":[2125,4425],\"Tags\":[\"help_desk\"],\"name\":\"n3\",\"description\":\"dsfsd\"},{\"value\":4425,\"connected_nodes\":[3125],\"Tags\":[\"c1-6\",\"7B\"],\"name\":\"n4\",\"description\":\"dsf\"}]}'),
(29, 'aiimsground', 'shikhar', 1, '{\"cords\":[{\"value\":2110,\"connected_nodes\":[2125],\"Tags\":[\"43\",\"36a\"],\"name\":\"n1\",\"description\":\"sdfds\"},{\"value\":2125,\"connected_nodes\":[2110],\"Tags\":[\"35a\",\"35b\"],\"name\":\"n2\",\"description\":\"fsdf\"}]}'),
(30, 'aiimsground', 'shikhar', 2, '{\"cords\":[{\"value\":2110,\"connected_nodes\":[2125],\"Tags\":[\"43\"],\"name\":\"n1\",\"description\":\"sdfds\"},{\"value\":2125,\"connected_nodes\":[2110,3125],\"Tags\":[\"35a\"],\"name\":\"n2\",\"description\":\"fsdf\"},{\"value\":3125,\"connected_nodes\":[2125],\"Tags\":[\"help_desk\"],\"name\":\"n3\",\"description\":\"dsfsd\"}]}');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(255) NOT NULL,
  `tag_name` varchar(255) NOT NULL,
  `value` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `building` int(255) NOT NULL,
  `floor` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maps`
--
ALTER TABLE `maps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maps_data`
--
ALTER TABLE `maps_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `maps`
--
ALTER TABLE `maps`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `maps_data`
--
ALTER TABLE `maps_data`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
