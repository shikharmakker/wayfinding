-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2019 at 09:42 PM
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
  `employee_id` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `employee_id`, `username`, `firstname`, `lastname`, `password`, `email`) VALUES
(1, '', 'dsfsfd', 'dsf', 'sfd', 'a', 'fds'),
(2, '', 'sdffdsf', 'sdf', 'fdsf', 'a', 'fsf'),
(3, '', 'shikharmakker', 'shikhar', 'makker', 'abcd', 'shikharmakker@gmail.com'),
(19, '123', 'khb', 'khb', '', 'a', 'fddfg'),
(20, 'sdf', 'a', 'a', '', 'f', 'csdv'),
(21, 'fsd', 'ab', 'a', 'b', 'a', 'fsf'),
(22, '123', 'abcdef', 'abc', 'def', 'abcd', 'fdsfssd'),
(23, 'a', 'shmabc', 'shm', 'abc', 'a', 'shikharmakker@gmail.com'),
(24, 'sfd', 'abcshm', 'abc', 'shm', 'a', 'shikharmakker@gmail.com'),
(25, '', '', '', '', '', ''),
(26, 'a', 'dfsdfsdf', 'dfsd', 'fsdf', 'a', 'fsd');

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `id` int(255) NOT NULL,
  `Tag` varchar(255) NOT NULL,
  `value` int(255) DEFAULT NULL,
  `complaint` varchar(255) DEFAULT NULL,
  `map` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`id`, `Tag`, `value`, `complaint`, `map`, `user`, `status`, `date`) VALUES
(1, 'fsd', 5631, 'fs', 'sitgf', 'shikharmakker', 'resolved', '2019-04-14'),
(2, 'dsf', 4421, 'fdsf', 'sitgf', 'shikharmakker', 'resolved', '2019-04-14'),
(3, 'fsd', 5631, 'sad', 'sitgf', 'shikharmakker', 'resolved', '2019-04-14'),
(4, 'dsf', 4421, 'disabled', 'sitgf', 'shikharmakker', 'unresolved', '2019-04-15'),
(5, 'dsf', 4421, 'Unserviceable', 'sitgf', 'shikharmakker', 'unresolved', '2019-04-15'),
(6, 'fsd', 5631, 'Unserviceable', 'sitgf', 'shikharmakker', 'unresolved', '2019-04-15'),
(7, 'fdsfdsf', 810, 'Service is down', 'aiimsgf', 'shikharmakker', 'unresolved', '2019-04-19'),
(8, 'fdsfdsf', 810, 'Other', 'aiimsgf', 'shikharmakker', 'unresolved', '2019-04-19'),
(9, 'fdsf', 1310, 'Other', 'aiimsgf', 'shikharmakker', 'unresolved', '2019-04-19'),
(10, 'fdsfdsf', 810, 'Other', 'aiimsgf', 'shikharmakker', 'unresolved', '2019-04-19'),
(11, 'fdsfdsf', 810, 'dsadas', 'aiimsgf', 'shikharmakker', 'unresolved', '2019-04-19'),
(12, 'fwf', 2117, 'Unserviceable', 'aiimsgf', 'shikharmakker', 'unresolved', '2019-04-19'),
(13, 'fdsfdsf', 810, 'Other: not working', 'aiimsgf', 'shikharmakker', 'unresolved', '2019-04-19'),
(14, 'fsd', 5631, 'Unserviceable', 'sitgf', 'shikharmakker', 'unresolved', '2019-04-19'),
(15, 'fsd', 5631, 'Other: dsfdsf', 'sitgf', 'shikharmakker', 'unresolved', '2019-04-19');

-- --------------------------------------------------------

--
-- Table structure for table `forget_psw`
--

CREATE TABLE `forget_psw` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `api_key` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forget_psw`
--

INSERT INTO `forget_psw` (`id`, `username`, `email`, `api_key`) VALUES
(1, 'shikharmakker', 'shikharmakker@gmail.com', '5e47a4158d33054b7d239958ff89be01'),
(2, 'shikharmakker', 'shikharmakker@gmail.com', 'dd0fa3516b9befa337b2673096f24c3a'),
(3, 'shikharmakker', 'shikharmakker@gmail.com', 'c9ec8ec09fd9aa3780326ff4331bdffe'),
(4, 'shikharmakker', 'shikharmakker@gmail.com', 'd92fcd70eeea807d19278b3db93cbd26'),
(5, 'shikharmakker', 'shikharmakker@gmail.com', 'f92b02bbf28a7b954e55fa19228423c3'),
(6, 'shikharmakker', 'shikharmakker@gmail.com', '0c7920a786eec0fd775f192f4291b61b'),
(7, 'sfds', '', 'f82abe9afb9710207d78c7be0fa2722e'),
(8, 'rwe', '', 'fc33fa088c15a5a8c9dc1da199a0ce25'),
(9, 'fsdf', '', '012a79f8ca7acc1800835137a68b77d7'),
(10, 'shikharmakker', 'shikharmakker@gmail.com', 'd732007aa7c5ec95acedf06c600b0938'),
(11, 'shikharmakker', 'shikharmakker@gmail.com', 'c87e74f8c9a7ef9dc3c91d6e27093a1c'),
(12, 'shikharmakker', 'shikharmakker@gmail.com', '33ec74183edeef982617fc99dab620b2'),
(13, 'shikharmakker', 'shikharmakker@gmail.com', '1499c44df2ce76463f351f418a474726'),
(14, 'shikharmakker', 'shikharmakker@gmail.com', '19a4c0908df50b0d09c8fc767c4eac36'),
(15, 'shikharmakker', 'shikharmakker@gmail.com', '6d2329cab237b85617f72b4e50d0fd6c'),
(16, 'shikharmakker', 'shikharmakker@gmail.com', 'dbd88cece07928795d99a8f34f9c39b7'),
(17, 'shikharmakker', 'shikharmakker@gmail.com', '72f3f05b5027af8ff140eb92272229be');

-- --------------------------------------------------------

--
-- Table structure for table `junctions`
--

CREATE TABLE `junctions` (
  `id` int(255) NOT NULL,
  `value` int(255) NOT NULL,
  `Tags` varchar(255) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `map` varchar(255) NOT NULL,
  `audio` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `junctions`
--

INSERT INTO `junctions` (`id`, `value`, `Tags`, `Description`, `name`, `username`, `map`, `audio`, `image`) VALUES
(1, 830, 's', 'c', 'd', 'shikharmakker', 'aiimsgf', NULL, NULL),
(2, 1011, 'x', 'ss', 'dfc', 'shikharmakker', 'aiimsgf', 'SampleAudio_0.4mb.mp3', NULL),
(3, 2211, 'f', 'ss', 'sd', 'shikharmakker', 'aiimsgf', 'SampleAudio_0.4mb.mp3', NULL),
(4, 811, 'v', 'dd', 'fs', 'shikharmakker', 'aiimsgf', '42092160_2330518170308675_8018587066981941248_o.jpg', NULL),
(5, 811, 'c', 's', 'ff', 'shikharmakker', 'aiimsgf', '42092160_2330518170308675_8018587066981941248_o.jpg', NULL),
(6, 730, 'ff', 's', 'fs', 'shikharmakker', 'aiimsgf', 'SampleAudio_0.4mb.mp3', '42092160_2330518170308675_8018587066981941248_o.jpg'),
(7, 5631, 'fsd', '009', '1', 'shikharmakker', 'sitgf', NULL, NULL),
(8, 4431, 'fs', '001', '2', 'shikharmakker', 'sitgf', NULL, NULL),
(9, 4421, 'dsf', 'dummy', '3', 'shikharmakker', 'sitgf', NULL, NULL),
(10, 2721, 'f', 'dum_2', '4', 'shikharmakker', 'sitgf', NULL, NULL),
(11, 2731, 'fsdf', 'lift', '5', 'shikharmakker', 'sitgf', NULL, NULL),
(12, 2212, 'f', 'ff', 'sdf', 'shikharmakker', 'sitgf', NULL, NULL),
(13, 1210, 'f', 'ddsf', 'dfsd', 'shikharmakker', 'sitgf', NULL, NULL),
(14, 2745, 'c', 'b', 'a', 'shikharmakker', 'sitgf', 'SampleAudio_0.4mb.mp32745', NULL),
(15, 1931, 'f', 'f', 'fsdf', 'shikharmakker', 'sitgf', NULL, '193142092160_2330518170308675_8018587066981941248_o.jpg'),
(16, 1920, 'ff', 'fs', 'sdf', 'shikharmakker', 'sitgf', '1920SampleAudio_0.4mb.mp3', '192042092160_2330518170308675_8018587066981941248_o.jpg'),
(17, 1910, 'ff', 'fsfd', 'sfdd', 'shikharmakker', 'sitgf', '1910SampleAudio_0.4mb.mp3', '191042092160_2330518170308675_8018587066981941248_o.jpg'),
(18, 2224, 'fdsf', 'fsdf', 'sdf', 'shikharmakker', 'testab', NULL, NULL),
(19, 2231, 'f', 'f', 'fsdf', 'shikharmakker', 'sitgf', NULL, NULL),
(20, 2216, 'f', 'f', 'fs', 'shikharmakker', 'sitgf', NULL, NULL),
(21, 2616, 'fdsf', 'fs', 'fdsf', 'shikharmakker', 'sitgf', NULL, NULL),
(22, 2744, 'ab, fsdf,dsf ,df', 'fds', 'ab', 'shikharmakker', 'sitgf', NULL, NULL),
(23, 2743, 'a, fsdf,fdsf ,sf', 'fsfs', 'da', 'shikharmakker', 'sitgf', NULL, NULL),
(24, 2043, 'fds, fsdf ,fds , fds,fsd', 'ff', 'dsf', 'shikharmakker', 'sitgf', NULL, NULL),
(25, 2230, 'fdsf', 'fsdf', 'dsf', 'shikharmakker', 'testab', NULL, NULL),
(26, 830, 'fdsf', 'fdsf', 'dsf', 'shikharmakker', 'testab', NULL, NULL),
(27, 2240, 'fdsdf', 'dsf', 'dsad', 'shikharmakker', 'testab', NULL, NULL),
(28, 3240, 'fdsfs', 'fdsf', 'fdsf', 'shikharmakker', 'testab', NULL, NULL),
(29, 3225, 'fdsf', 'fds', 'fsdf', 'shikharmakker', 'testab', NULL, NULL),
(30, 2211, 'fdssfd', 'fdsf', 'dsad', 'shikharmakker', 'testab', NULL, NULL),
(31, 711, 'fdsf', 'fds', 'fds', 'shikharmakker', 'testab', NULL, NULL),
(32, 4225, 'fdsf', 'fsd', 'sdf', 'shikharmakker', 'testab', NULL, NULL),
(33, 4240, 'f', 'fds', 'fsd', 'shikharmakker', 'testab', NULL, NULL),
(34, 5025, 'dsf', 'fsd', 'sdf', 'shikharmakker', 'testab', NULL, NULL),
(35, 5040, 'fdsf', 'fdsd', 'sfdsdf', 'shikharmakker', 'testab', NULL, NULL),
(36, 2226, 'a', 'f', 'sdf', 'shikharmakker', 'aiimsgf', NULL, NULL),
(37, 2240, 'b', 'fds', 'dfs', 'shikharmakker', 'aiimsgf', NULL, NULL),
(38, 2211, 'c', 'f', 'fsd', 'shikharmakker', 'aiimsgf', NULL, NULL),
(39, 1111, 'fsd', 'fds', 'sfd', 'shikharmakker', 'aiimsgf', NULL, NULL),
(40, 211, 'ss', 'fds', 'sdf', 'shikharmakker', 'aiimsgf', NULL, NULL),
(41, 2226, 'f', 'fdsf', 'sdf', 'shikharmakker', 'aiimsgf', NULL, NULL),
(42, 2240, 'fds', 'fsd', 'sdf', 'shikharmakker', 'aiimsgf', NULL, NULL),
(43, 2926, 'fds', 'fdssf', 'dsf', 'shikharmakker', 'aiimsgf', NULL, NULL),
(44, 2210, 'fsf', 'fsdf', 'sdf', 'shikharmakker', 'aiimsgf', NULL, NULL),
(45, 1010, 'ss', 'fds', 'fsd', 'shikharmakker', 'aiimsgf', NULL, NULL),
(46, 3626, 'fdsf', 'fds', 'dsf', 'shikharmakker', 'aiimsgf', NULL, NULL),
(47, 4426, 'ffffs', 'sf', 'sd', 'shikharmakker', 'aiimsgf', NULL, NULL),
(48, 2211, 'fsdfds', 'fdsf', 'dsf', 'shikharmakker', 'aiimsgf', NULL, NULL),
(49, 2225, 'fdsf', 'fdssf', 'dsf', 'shikharmakker', 'aiimsgf', NULL, NULL),
(50, 1011, 'fsdf', 'fdsf', 'sdfd', 'shikharmakker', 'aiimsgf', NULL, NULL),
(51, 2238, 'fsssd,fsdffff,fsdfaa', 'fds', 'fds', 'shikharmakker', 'aiimsgf', NULL, NULL),
(52, 3325, 'fds', 'sdf', 'dsff', 'shikharmakker', 'aiimsgf', NULL, NULL),
(53, 1011, 'fsdfds', 'fsfds', 'dsf', 'shikharmakker', 'aiimsgf', NULL, NULL),
(54, 830, 'fdsf', 'fdsf', 'sdf', 'shikharmakker', 'aiimsgf', NULL, NULL),
(55, 1830, 'fdsf', 'fsdf', 'fdsf', 'shikharmakker', 'aiimsgf', NULL, NULL),
(56, 929, 'fs', 'fsdfsfdf', 'fds', 'shikharmakker', 'aiimsgf', NULL, NULL),
(57, 1811, 'fdsfds', 'fdsf', 'fsd', 'shikharmakker', 'aiimsgf', NULL, NULL),
(58, 2110, 'ff', 'fsd', 'sdf', 'shikharmakker', 'aiimsgf', NULL, NULL),
(59, 810, 'fdsfdsf', 'fds', 'dsf', 'shikharmakker', 'aiimsgf', NULL, NULL),
(60, 729, 'dd', 'fs', 'fsd', 'shikharmakker', 'aiimsgf', NULL, NULL),
(61, 1529, 'ssa', 'fds', 'sdf', 'shikharmakker', 'aiimsgf', NULL, NULL),
(62, 2739, 'abc', 'fg', 'sdf', 'shikharmakker', 'sitgf', '2739SampleAudio_0.4mb.mp3', '2739sitgf.jpg'),
(63, 2151, 'fdsf', '', 'sfd', 'shikharmakker', 'aiimsgf', NULL, NULL),
(64, 331, 'fdsf', '', 'dsf', 'shikharmakker', 'aiimsgf', NULL, NULL),
(65, 1110, 'fsdf', '', 'dsf', 'shikharmakker', 'aiimsgf', NULL, NULL),
(66, 211, 'dsf', 'fsdf', 'sdf', 'shikharmakker', 'aiimsgf', NULL, NULL),
(67, 1310, 'fdsf', '', 'fds', 'shikharmakker', 'aiimsgf', NULL, NULL),
(68, 640, 'fdsf', 'fds', 'fdsf', 'shikharmakker', 'aiimsgf', NULL, NULL),
(69, 2117, 'fwf', 'werf', 'rwe', 'shikharmakker', 'aiimsgf', NULL, NULL);

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
(9, 'aiims', 'ground', 'shikhar', 'aiimsground.jpg', '2019-04-09 06:23:47'),
(23, 'test', 'ab', 'shikharmakker', 'testab.jpg', '2019-04-13 12:59:04'),
(24, 'sit', 'gf', 'shikharmakker', 'sitgf.jpg', '2019-04-14 02:59:27'),
(25, 'aiims', 'gf', 'shikharmakker', 'aiimsgf.jpg', '2019-04-18 02:44:26');

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
(30, 'aiimsground', 'shikhar', 2, '{\"cords\":[{\"value\":2110,\"connected_nodes\":[2125],\"Tags\":[\"43\"],\"name\":\"n1\",\"description\":\"sdfds\"},{\"value\":2125,\"connected_nodes\":[2110,3125],\"Tags\":[\"35a\"],\"name\":\"n2\",\"description\":\"fsdf\"},{\"value\":3125,\"connected_nodes\":[2125],\"Tags\":[\"help_desk\"],\"name\":\"n3\",\"description\":\"dsfsd\"}]}'),
(73, 'testab', 'shikharmakker', 0, '{\"cords\":[{\"value\":2224,\"connected_nodes\":[],\"Tags\":[],\"name\":\"sdf\",\"description\":\"fsdf\"},{\"value\":2230,\"connected_nodes\":[],\"Tags\":[],\"name\":\"dsf\",\"description\":\"fsdf\"},{\"value\":830,\"connected_nodes\":[],\"Tags\":[],\"name\":\"dsf\",\"description\":\"fdsf\"},{\"value\":2240,\"connected_nodes\":[],\"Tags\":[],\"name\":\"dsad\",\"description\":\"dsf\"},{\"value\":3240,\"connected_nodes\":[],\"Tags\":[],\"name\":\"fdsf\",\"description\":\"fdsf\"},{\"value\":3225,\"connected_nodes\":[4225],\"Tags\":[],\"name\":\"fsdf\",\"description\":\"fds\"},{\"value\":2211,\"connected_nodes\":[],\"Tags\":[],\"name\":\"dsad\",\"description\":\"fdsf\"},{\"value\":711,\"connected_nodes\":[],\"Tags\":[],\"name\":\"fds\",\"description\":\"fds\"},{\"value\":4225,\"connected_nodes\":[5025,3225],\"Tags\":[],\"name\":\"sdf\",\"description\":\"fsd\"},{\"value\":4240,\"connected_nodes\":[5040],\"Tags\":[],\"name\":\"fsd\",\"description\":\"fds\"},{\"value\":5025,\"connected_nodes\":[5040,4225],\"Tags\":[],\"name\":\"sdf\",\"description\":\"fsd\"},{\"value\":5040,\"connected_nodes\":[5025,4240],\"Tags\":[],\"name\":\"sfdsdf\",\"description\":\"fdsd\"}]}'),
(74, 'testab', 'shikharmakker', 1, '{\"cords\":[{\"value\":2224,\"connected_nodes\":[],\"Tags\":[],\"name\":\"sdf\",\"description\":\"fsdf\"},{\"value\":2230,\"connected_nodes\":[],\"Tags\":[],\"name\":\"dsf\",\"description\":\"fsdf\"},{\"value\":830,\"connected_nodes\":[],\"Tags\":[],\"name\":\"dsf\",\"description\":\"fdsf\"},{\"value\":2240,\"connected_nodes\":[],\"Tags\":[],\"name\":\"dsad\",\"description\":\"dsf\"},{\"value\":3240,\"connected_nodes\":[],\"Tags\":[],\"name\":\"fdsf\",\"description\":\"fdsf\"},{\"value\":3225,\"connected_nodes\":[],\"Tags\":[],\"name\":\"fsdf\",\"description\":\"fds\"},{\"value\":2211,\"connected_nodes\":[],\"Tags\":[],\"name\":\"dsad\",\"description\":\"fdsf\"},{\"value\":711,\"connected_nodes\":[],\"Tags\":[],\"name\":\"fds\",\"description\":\"fds\"},{\"value\":4225,\"connected_nodes\":[],\"Tags\":[],\"name\":\"sdf\",\"description\":\"fsd\"},{\"value\":4240,\"connected_nodes\":[],\"Tags\":[\"f\"],\"name\":\"fsd\",\"description\":\"fds\"},{\"value\":5025,\"connected_nodes\":[],\"Tags\":[\"dsf\"],\"name\":\"sdf\",\"description\":\"fsd\"},{\"value\":5040,\"connected_nodes\":[],\"Tags\":[\"fdsf\"],\"name\":\"sfdsdf\",\"description\":\"fdsd\"}]}'),
(75, 'testab', 'shikharmakker', 2, '{\"cords\":[{\"value\":2224,\"connected_nodes\":[],\"Tags\":[],\"name\":\"sdf\",\"description\":\"fsdf\"},{\"value\":2230,\"connected_nodes\":[],\"Tags\":[],\"name\":\"dsf\",\"description\":\"fsdf\"},{\"value\":830,\"connected_nodes\":[],\"Tags\":[],\"name\":\"dsf\",\"description\":\"fdsf\"},{\"value\":2240,\"connected_nodes\":[],\"Tags\":[],\"name\":\"dsad\",\"description\":\"dsf\"},{\"value\":3240,\"connected_nodes\":[],\"Tags\":[],\"name\":\"fdsf\",\"description\":\"fdsf\"},{\"value\":3225,\"connected_nodes\":[],\"Tags\":[],\"name\":\"fsdf\",\"description\":\"fds\"},{\"value\":2211,\"connected_nodes\":[],\"Tags\":[\"fdssfd\"],\"name\":\"dsad\",\"description\":\"fdsf\"},{\"value\":711,\"connected_nodes\":[],\"Tags\":[\"fdsf\"],\"name\":\"fds\",\"description\":\"fds\"},{\"value\":4225,\"connected_nodes\":[],\"Tags\":[\"fdsf\"],\"name\":\"sdf\",\"description\":\"fsd\"}]}'),
(76, 'sitgf', 'shikharmakker', 0, '{\"cords\":[{\"value\":5631,\"connected_nodes\":[4431],\"Tags\":[\"fsd\"],\"name\":\"1\",\"description\":\"009\"},{\"value\":4431,\"connected_nodes\":[5631,4421],\"Tags\":[\"fs\",\"undefined\"],\"name\":\"2\",\"description\":\"001\"},{\"value\":4421,\"connected_nodes\":[4431,2721],\"Tags\":[\"dsf\",\"undefined\"],\"name\":\"3\",\"description\":\"dummy\"},{\"value\":2721,\"connected_nodes\":[4421,2731],\"Tags\":[\"f\",\"undefined\"],\"name\":\"4\",\"description\":\"dum_2\"},{\"value\":2731,\"connected_nodes\":[2721,2739],\"Tags\":[\"fsdf\"],\"name\":\"5\",\"description\":\"lift\"},{\"value\":2739,\"connected_nodes\":[2731],\"Tags\":[\"abc\"],\"name\":\"sdf\",\"description\":\"fg\"}]}'),
(77, 'sitgf', 'shikharmakker', 1, '{\"cords\":[{\"value\":5631,\"connected_nodes\":[4431],\"Tags\":[\"fsd\"],\"name\":\"1\",\"description\":\"009\"},{\"value\":4431,\"connected_nodes\":[5631,4421],\"Tags\":[\"fs\",\"undefined\"],\"name\":\"2\",\"description\":\"001\"},{\"value\":4421,\"connected_nodes\":[4431,2721],\"Tags\":[\"dsf\",\"undefined\"],\"name\":\"3\",\"description\":\"dummy\"},{\"value\":2721,\"connected_nodes\":[4421,2731],\"Tags\":[\"f\",\"undefined\"],\"name\":\"4\",\"description\":\"dum_2\"},{\"value\":2731,\"connected_nodes\":[2721],\"Tags\":[\"fsdf\"],\"name\":\"5\",\"description\":\"lift\"}]}'),
(78, 'sitgf', 'shikharmakker', 2, '{\"cords\":[{\"value\":5631,\"connected_nodes\":[4431],\"Tags\":[\"fsd\"],\"name\":\"1\",\"description\":\"009\"},{\"value\":4431,\"connected_nodes\":[5631,4421],\"Tags\":[\"fs\",\"undefined\"],\"name\":\"2\",\"description\":\"001\"},{\"value\":4421,\"connected_nodes\":[4431,2721],\"Tags\":[\"dsf\",\"undefined\"],\"name\":\"3\",\"description\":\"dummy\"},{\"value\":2721,\"connected_nodes\":[4421,2731],\"Tags\":[\"f\",\"undefined\"],\"name\":\"4\",\"description\":\"dum_2\"},{\"value\":2731,\"connected_nodes\":[2721],\"Tags\":[\"fsdf\"],\"name\":\"5\",\"description\":\"lift\"},{\"value\":2743,\"connected_nodes\":[],\"Tags\":[],\"name\":\"da\",\"description\":\"fsfs\"},{\"value\":2043,\"connected_nodes\":[],\"Tags\":[\"fds\",\"fsdf\",\"fds\",\"fds\",\"fsd\"],\"name\":\"dsf\",\"description\":\"ff\"}]}'),
(91, 'aiimsgf', 'shikharmakker', 0, '{\"cords\":[{\"value\":2125,\"connected_nodes\":[],\"Tags\":[],\"name\":\"sad\",\"description\":\"ff\"},{\"value\":2134,\"connected_nodes\":[],\"Tags\":[],\"name\":\"dsf\",\"description\":\"fdsf\"},{\"value\":2625,\"connected_nodes\":[],\"Tags\":[],\"name\":\"fsdf\",\"description\":\"fdsf\"},{\"value\":2141,\"connected_nodes\":[],\"Tags\":[],\"name\":\"dsf\",\"description\":\"fdsfds\"},{\"value\":2110,\"connected_nodes\":[],\"Tags\":[],\"name\":\"sdf\",\"description\":\"fsd\"},{\"value\":810,\"connected_nodes\":[],\"Tags\":[\"fdsfdsf\"],\"name\":\"dsf\",\"description\":\"fds\"},{\"value\":729,\"connected_nodes\":[],\"Tags\":[\"dd\"],\"name\":\"fsd\",\"description\":\"fs\"},{\"value\":1529,\"connected_nodes\":[],\"Tags\":[\"ssa\"],\"name\":\"sdf\",\"description\":\"fds\"},{\"value\":1310,\"connected_nodes\":[],\"Tags\":[\"fdsf\"],\"name\":\"fds\",\"description\":\"\"},{\"value\":2117,\"connected_nodes\":[],\"Tags\":[\"fwf\"],\"name\":\"rwe\",\"description\":\"werf\"}]}'),
(92, 'aiimsgf', 'shikharmakker', 1, '{\"cords\":[{\"value\":2125,\"connected_nodes\":[],\"Tags\":[],\"name\":\"sad\",\"description\":\"ff\"},{\"value\":2134,\"connected_nodes\":[],\"Tags\":[],\"name\":\"dsf\",\"description\":\"fdsf\"},{\"value\":2625,\"connected_nodes\":[],\"Tags\":[],\"name\":\"fsdf\",\"description\":\"fdsf\"},{\"value\":2141,\"connected_nodes\":[],\"Tags\":[],\"name\":\"dsf\",\"description\":\"fdsfds\"},{\"value\":2110,\"connected_nodes\":[],\"Tags\":[],\"name\":\"sdf\",\"description\":\"fsd\"},{\"value\":810,\"connected_nodes\":[],\"Tags\":[\"fdsfdsf\"],\"name\":\"dsf\",\"description\":\"fds\"},{\"value\":729,\"connected_nodes\":[],\"Tags\":[\"dd\"],\"name\":\"fsd\",\"description\":\"fs\"},{\"value\":1529,\"connected_nodes\":[],\"Tags\":[\"ssa\"],\"name\":\"sdf\",\"description\":\"fds\"},{\"value\":1310,\"connected_nodes\":[],\"Tags\":[\"fdsf\"],\"name\":\"fds\",\"description\":\"\"}]}'),
(93, 'aiimsgf', 'shikharmakker', 2, '{\"cords\":[{\"value\":2125,\"connected_nodes\":[],\"Tags\":[],\"name\":\"sad\",\"description\":\"ff\"},{\"value\":2134,\"connected_nodes\":[],\"Tags\":[],\"name\":\"dsf\",\"description\":\"fdsf\"},{\"value\":2625,\"connected_nodes\":[],\"Tags\":[],\"name\":\"fsdf\",\"description\":\"fdsf\"},{\"value\":2141,\"connected_nodes\":[],\"Tags\":[],\"name\":\"dsf\",\"description\":\"fdsfds\"},{\"value\":2110,\"connected_nodes\":[],\"Tags\":[],\"name\":\"sdf\",\"description\":\"fsd\"},{\"value\":810,\"connected_nodes\":[],\"Tags\":[\"fdsfdsf\"],\"name\":\"dsf\",\"description\":\"fds\"},{\"value\":729,\"connected_nodes\":[],\"Tags\":[\"dd\"],\"name\":\"fsd\",\"description\":\"fs\"},{\"value\":1529,\"connected_nodes\":[],\"Tags\":[\"ssa\"],\"name\":\"sdf\",\"description\":\"fds\"}]}');

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

-- --------------------------------------------------------

--
-- Table structure for table `temp_admin`
--

CREATE TABLE `temp_admin` (
  `id` int(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `confirm` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temp_admin`
--

INSERT INTO `temp_admin` (`id`, `firstname`, `lastname`, `username`, `password`, `email`, `confirm`) VALUES
(1, 'khb', '', 'khb', 'a', 'fddfg', '02b42a4d6f4f8d95472c997c8d5b4982'),
(2, 'a', '', 'a', 'f', 'csdv', '820b61f81788a00d0a7fc7ea6c921ebd'),
(3, 'a', 'b', 'ab', 'a', 'fsf', 'bc636c9458027af5709ded69d6a112bf'),
(4, 'abc', 'def', 'abcdef', 'abcd', 'fdsfssd', 'a0c77112ee224baab232ba99a87ce3bd'),
(5, 'shm', 'abc', 'shmabc', 'a', 'shikharmakker@gmail.com', '4c7a4cf15133c38805869ef7d4cb6288'),
(6, 'abc', 'shm', 'abcshm', 'a', 'shikharmakker@gmail.com', '3f3098a7897af9b45cbf8cef8b5ac01b'),
(7, '', '', '', '', '', '50ed3d5ce8bad08015c4e215d1b37804'),
(8, 'dfsd', 'fsdf', 'dfsdfsdf', 'a', 'fsd', '395b0f06f21ff171c16749dfc9b3c886');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forget_psw`
--
ALTER TABLE `forget_psw`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `junctions`
--
ALTER TABLE `junctions`
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
-- Indexes for table `temp_admin`
--
ALTER TABLE `temp_admin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `forget_psw`
--
ALTER TABLE `forget_psw`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `junctions`
--
ALTER TABLE `junctions`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `maps`
--
ALTER TABLE `maps`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `maps_data`
--
ALTER TABLE `maps_data`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `temp_admin`
--
ALTER TABLE `temp_admin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
