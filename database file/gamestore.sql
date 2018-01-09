-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2018 at 08:09 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gamestore`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `address_id` varchar(100) NOT NULL,
  `street` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `zipcode` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`address_id`, `street`, `city`, `state`, `zipcode`) VALUES
('1', '235 Butler St', 'Lawrencville', 'PA', 15201),
('10', '23 Red Blvd', 'Bair Island', 'CA', 94302),
('11', '1 Mountain View', 'Menlo Park', 'CA', 94025),
('13', 'Yankee Street', 'Lawrencville', 'PA', 15201),
('14', 'Stamford Street', 'Gainsville', 'FL', 33315),
('15', 'Liverpool Street', 'Tempe', 'AZ', 85281),
('16', 'Scouser Street', 'Guadalupe', 'AZ', 85283),
('17', 'White Hart Lane', 'Palo Alto', 'CA', 94024),
('18', 'Leister Blvd', 'Ft Lauderdale', 'FL', 33304),
('2', '630 Clyde St', 'Pittsburgh', 'PA', 15213),
('3', '228 Noble Woods Dr', 'Coraopolis', 'PA', 15108),
('4', '214 Ventana Dr', 'Tempe', 'AZ', 85281),
('5', '451 Forbes Ave', 'Guadalupe', 'AZ', 85283),
('5a2a577648abf', '123 Diagon Alley', 'Pittsburgh', '123 Diagon Alley', 15201),
('5a2a60062b7c4', '12, Butler Street', 'Pittsburgh', '12, Butler Street', 15201),
('5a2a60c33d376', '12, Great Road', 'Pittsburgh', '12, Great Road', 15213),
('5a2a88da0ddc3', '12, Forbes', 'Pittsburgh', '11', 15213),
('5a2a88dea88f7', '12, Forbes', 'Pittsburgh', '11', 15213),
('5a2aa288cfaa8', '490 Summer St', 'Philadelphia', '11', 15108),
('5a2ad0205fab8', '630 clyde st', 'pittsburgh', 'Pennsylvania', 15213),
('6', '781 Sunrise Blvd', 'Gainsville', 'FL', 33315),
('7', '123 Sunset Blvd', 'Ft Lauderdale', 'FL', 33304),
('8', '56 Sunny Blvd', 'Dania Beach', 'FL', 33311),
('9', '1 Hacker Way', 'Palo Alto', 'CA', 94024);

-- --------------------------------------------------------

--
-- Table structure for table `business`
--

CREATE TABLE `business` (
  `name` varchar(100) NOT NULL,
  `annual_income` int(11) NOT NULL,
  `customer_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `business`
--

INSERT INTO `business` (`name`, `annual_income`, `customer_id`) VALUES
('Unique Ent.', 1200000, '5a2a88da0ddc6'),
('Unique Ent.', 1200000, '5a2a88dea88fa'),
('Facebook', 5000000, '5a2aa288cfaab'),
('Chelsea FC', 20000000, 'cfc'),
('Liverpool FC', 2000, 'lfc'),
('Tottenham FC', 4000, 'tfc');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `product_id` varchar(100) NOT NULL,
  `store_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `user_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `product_id`, `store_id`, `quantity`, `user_id`) VALUES
(1, '5a2a3bfad1922', 2, 9, '5a2acea341b92'),
(2, '5a2a3bfad1922', 2, 3, '5a2ad10440a6d'),
(3, '5a2a3bfad1922', 2, 3, '5a2ad10440a6d');

-- --------------------------------------------------------

--
-- Table structure for table `console_type`
--

CREATE TABLE `console_type` (
  `console_id` int(11) NOT NULL,
  `console_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `console_type`
--

INSERT INTO `console_type` (`console_id`, `console_name`) VALUES
(1, 'PlayStation 3'),
(2, 'PlayStation 4'),
(3, 'XBOX 360'),
(4, 'XBOX One'),
(5, 'PC'),
(6, 'Nintendo Wii'),
(7, 'Nintendo Switch'),
(8, 'Wii U'),
(9, 'Nintendo 3DS'),
(10, 'PlayStation Vita'),
(11, 'Game Boy Advance'),
(12, 'N-gage'),
(13, 'Dreamcast'),
(14, 'GameCube'),
(15, 'Atari Jaguar'),
(16, 'Sega Saturn'),
(17, 'Nintendo 64'),
(18, 'Virtual Boy'),
(19, 'Game Boy Pocket'),
(20, 'Sega Nomad'),
(21, 'PlayStation'),
(22, 'PlayStation 2');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` varchar(100) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `customer_type` varchar(100) NOT NULL,
  `address_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `first_name`, `last_name`, `email`, `password`, `customer_type`, `address_id`) VALUES
('5a2a577648ac1', 'Panna', 'Paneer', 'ppn@pitt.edu', 'paneer123', 'home', '5a2a577648abf'),
('5a2a60062b7c6', 'Komal', 'Agarwal', 'kmag@acc.com', 'komal123', 'home', '5a2a60062b7c4'),
('5a2a60c33d379', 'Rahul', 'Acharya', 'rahul@123.com', 'rahul123', 'home', '5a2a60c33d376'),
('5a2a88da0ddc6', 'Ankit', 'Agarwal', 'ankit@pitt.edu', 'ankit123', 'business', '5a2a88da0ddc3'),
('5a2a88dea88fa', 'Ankit', 'Agarwal', 'ankit@pitt.edu', 'ankit123', 'business', '5a2a88dea88f7'),
('5a2aa288cfaab', 'Naresh', 'Patil', 'nptel@pitt.edu', 'np123', 'business', '5a2aa288cfaa8'),
('5a2ad0205fabe', 'hearsh', 'mahidharia', 'ham99@pitt.edu', 'test', 'home', '5a2ad0205fab8'),
('cfc', 'Chelsea', 'FC', 'cfc@cfc.com', 'cfcforever', 'business', '14'),
('jt26', 'John', 'Terry', 'jt26@cfc.com', 'cfcforever', 'home', '13'),
('jv11', 'Jamie', 'Vardey', 'jv11@lfc.com', 'lfcrespect', 'home', '18'),
('lfc', 'Liverpool', 'FC', 'lfc@lfc.com', 'lfcsucks', 'business', '15'),
('sg8', 'Steven', 'Gerrard', 'sg8@lfc.com', 'lfcrespect', 'home', '16'),
('tfc', 'Tottenham', 'FC', 'tfc@tfc.com', 'tfcsucks', 'business', '17');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(11) NOT NULL,
  `password` varchar(100) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `salary` int(11) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `store_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `password`, `first_name`, `last_name`, `salary`, `designation`, `store_id`) VALUES
(1, 'zidane123', 'Zinedine', 'Zidane', 200000, 'RM', 1),
(2, 'ankur123', 'Ankur', 'Nadda', 100000, 'SM', 1),
(3, 'ivanovic123', 'Branislav', 'Ivanovic', 1000, 'Associate', 1),
(4, 'cole123', 'Ashley', 'Cole', 1000, 'Associate', 1),
(5, 'cohelo123', 'Ricardo', 'Cohelo', 1000, 'Associate', 1),
(6, 'kaka123', 'Ricardo', 'Kaka', 1000, 'Associate', 1),
(7, 'ronald123', 'Gaucho', 'Ronaldinho', 200000, 'RM', 2),
(8, 'chutiya123', 'Rishab', 'Gulati', 100000, 'SM', 2),
(9, 'carlos123', 'Roberto', 'Carlos', 1000, 'Associate', 2),
(10, 'jr123', 'Ronaldo', 'Jr', 1000, 'Associate', 2),
(11, 'steven', 'Steven', 'Fletcher', 1000, 'Associate', 2),
(12, 'henderson123', 'Richard', 'Henderson', 1000, 'Associate', 2),
(13, 'zolaa123', 'Frank', 'Zola', 200000, 'RM', 5),
(14, 'parsana123', 'Chits', 'Parsana', 100000, 'SM', 5),
(15, 'roger123', 'Chad', 'Roger', 1000, 'Associate', 5),
(16, 'waters123', 'Roger', 'Waters', 1000, 'Associate', 5),
(17, 'hetfoelf123', 'James', 'Hetfield', 1000, 'Associate', 5),
(18, 'murray123', 'Alan', 'Murray', 1000, 'Associate', 5),
(19, 'ballack123', 'Micheal', 'Ballack', 200000, 'RM', 4),
(20, 'gavande123', 'Pranjal', 'Gavande', 100000, 'SM', 4),
(21, 'hagi123', 'Gheorgie', 'Hagi', 1000, 'Associate', 4),
(22, 'sr123', 'Rivaldo', 'Sr', 1000, 'Associate', 4),
(23, 'madden123', 'Steve', 'Madden', 1000, 'Associate', 4),
(24, 'shearer123', 'Alan', 'Shearer', 1000, 'Associate', 4),
(25, 'franc123', 'Franc', 'Beckenbauer', 200000, 'RM', 6),
(26, 'raghav123', 'Raman', 'Raghav', 100000, 'SM', 6),
(27, 'ramn123', 'Raghav', 'Raman', 1000, 'Associate', 6),
(28, 'raje123', 'Ishaan', 'Raje', 1000, 'Associate', 6),
(29, 'sinha123', 'Anirub', 'Sinha', 1000, 'Associate', 6),
(30, 'sharma123', 'Bhargav', 'Sharma', 1000, 'Associate', 6),
(31, 'charlton123', 'Bobby', 'Charlton', 200000, 'RM', 7),
(32, 'surana123', 'Rohit', 'Surana', 100000, 'SM', 7),
(33, 'ramos123', 'Sergio', 'Ramos', 1000, 'Associate', 7),
(34, 'jr123', 'Asensio', 'Jr', 1000, 'Associate', 7),
(35, 'gaga123', 'Fernando', 'Gaga', 1000, 'Associate', 7),
(36, 'feta123', 'Steven', 'Feta', 1000, 'Associate', 7),
(37, 'pizza123', 'Parmesan', 'Pizza', 1000, 'Associate', 7),
(38, 'teddy123', 'Teddy', 'Sheringham', 200000, 'RM', 9),
(39, 'takkar123', 'Pratik', 'Takkar', 100000, 'SM', 9),
(40, 'jr123', 'Firmnio', 'Jr', 1000, 'Associate', 9),
(41, 'bell123', 'Taco', 'Bell', 1000, 'Associate', 9),
(42, 'king123', 'Burger', 'King', 1000, 'Associate', 9),
(43, 'kroc123', 'Ray', 'Kroc', 1000, 'Associate', 3),
(44, 'rowling123', 'JK', 'Rowling', 200000, 'RM', 10),
(45, 'sawant123', 'Omkar', 'Sawant', 100000, 'SM', 10),
(46, 'ambani123', 'Dhiru', 'Ambani', 1000, 'Associate', 10),
(47, 'anil123', 'Anil', 'Ambani', 1000, 'Associate', 10),
(48, 'ambani123', 'Mukesh', 'Ambani', 1000, 'Associate', 10),
(49, 'patel123', 'Mukesh', 'Patel', 1000, 'Associate', 10);

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `genre_id` int(11) NOT NULL,
  `genre_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`genre_id`, `genre_name`) VALUES
(1, 'Action-adventure'),
(2, 'Action role-playing'),
(3, 'Sports'),
(4, 'Platformer, video game compilation'),
(5, 'Action role-playing'),
(6, 'First-person shooter'),
(7, 'Action role-playing'),
(8, 'Racing'),
(9, 'Platformer, beat ''em up'),
(10, 'Action-adventure'),
(11, 'Fighting'),
(12, 'Action-adventure, survival horror'),
(13, 'Sports'),
(14, 'Action role-playing'),
(15, 'Role-playing'),
(16, 'First-person shooter'),
(17, 'Action-adventure, stealth'),
(18, 'First-person shooter'),
(19, 'Role-playing'),
(20, 'Action-adventure'),
(21, 'Action role-playing'),
(28, 'Accessory'),
(29, 'Gaming Console');

-- --------------------------------------------------------

--
-- Table structure for table `home`
--

CREATE TABLE `home` (
  `gender` varchar(6) NOT NULL,
  `age` int(11) NOT NULL,
  `income` int(11) NOT NULL,
  `martial_status` varchar(10) NOT NULL,
  `customer_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `home`
--

INSERT INTO `home` (`gender`, `age`, `income`, `martial_status`, `customer_id`) VALUES
('female', 24, 50000, 'single', '5a2a577648ac1'),
('female', 25, 20000, 'single', '5a2a60062b7c6'),
('male', 27, 20000, 'married', '5a2a60c33d379'),
('male', 24, 50, 'single', '5a2ad0205fabe'),
('Male', 40, 170000, 'Married', 'jt26'),
('Male', 25, 1700000, 'Single', 'jv11'),
('Male', 36, 170000, 'Married', 'sg8');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `store_id` int(11) NOT NULL,
  `product_id` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `region_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`store_id`, `product_id`, `quantity`, `region_id`) VALUES
(1, '5a2a3c72e166c', 11, 11),
(2, '5a2a3bfad1922', 18, 11),
(2, '5a2a3cbfc1f43', 23, 11),
(2, '5a2a3f60bb76d', 13, 11),
(2, '5a2ace7723f17', 8, 11),
(3, '5a2a3d173163e', 24, 11),
(3, '5a2a3d5df040e', 12, 11),
(3, '5a2a3e5c39cbf', 50, 11),
(3, '5a2aadc1780d5', 30, 11),
(4, '5a2a3ead7cff8', 25, 2),
(4, '5a2a405cf3374', 15, 2),
(4, '5a2aaec877c2a', 25, 2),
(5, '5a2a3d9fbefb0', 35, 2),
(6, '5a2a40d9a4ede', 9, 4),
(7, '5a2a4030d4946', 25, 4),
(7, '5a2aae39871a2', 25, 4),
(9, '5a2a3ee200f28', 24, 3),
(9, '5a2a3fe658c69', 25, 3),
(9, '5a2a4092dab5f', 20, 3),
(10, '5a2a3ddbe9ebf', 24, 3),
(10, '5a2a3e0e52692', 25, 3),
(10, '5a2a3f324da3e', 10, 3),
(10, '5a2aad61623c3', 25, 3),
(10, '5a2aaf31afea6', 25, 3),
(11, '5a2a3fbac3095', 18, 3);

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `order_id` int(11) NOT NULL,
  `transaction_id` varchar(100) NOT NULL,
  `store_id` int(11) NOT NULL,
  `product_id` varchar(100) NOT NULL,
  `price` double NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`order_id`, `transaction_id`, `store_id`, `product_id`, `price`, `quantity`) VALUES
(1, '5a2a59819707d', 2, '5a2a3bfad1922', 10, 1),
(3, '5a2a5ad2cbe23', 1, '5a2a3c72e166c', 12, 2),
(4, '5a2a63afbba69', 1, '5a2a3c72e166c', 12, 2),
(5, '5a2a649335f92', 2, '5a2a3f60bb76d', 100, 2),
(6, '5a2a66bf34f93', 6, '5a2a40d9a4ede', 17, 3),
(7, '5a2a681be8a14', 2, '5a2a3cbfc1f43', 25, 2),
(8, '5a2a8a628d524', 11, '5a2a3fbac3095', 300, 2),
(9, '5a2ac1aaeb76b', 2, '5a2a3bfad1922', 10, 1),
(10, '5a2ad0a94ffc1', 2, '5a2ace7723f17', 10, 2),
(11, '5a2ad0a94ffc1', 2, '5a2a3bfad1922', 10, 2);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` double NOT NULL,
  `console_id` int(11) NOT NULL,
  `description` varchar(500) NOT NULL,
  `class` varchar(100) NOT NULL,
  `genre_id` int(11) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `name`, `price`, `console_id`, `description`, `class`, `genre_id`, `image`, `rating`) VALUES
('5a2a3bfad1922', 'Uncharted 4: A Thief End', 10, 2, 'Game for PlayStation 4', 'Game', 1, 'images/download.jpg', 0),
('5a2a3c72e166c', 'Horizon Zero Dawn', 12, 2, 'Game for PlayStation 4 \r\nNA: February 28, 2017 EU: March 1, 2017 JP: March 2, 2017Guerrilla GamesSony Interactive Entertainment\r\n', 'Game', 1, 'images/download (1).jpg', 0),
('5a2a3cbfc1f43', 'FIFA 17', 25, 2, 'Game for PlayStation 4\r\nNA: September 27, 2016 WW: September 29, 2016EA Canada EA BucharestEA Sports\r\n', 'Game', 3, 'images/download (2).jpg', 0),
('5a2a3d173163e', 'Crash Bandicoot N. Sane Trilogy', 26, 4, 'Game for XBOX One\r\nWW: June 30, 2017Vicarious VisionsActivision\r\n', 'Game', 10, 'images/download (3).jpg', 0),
('5a2a3d5df040e', 'Final Fantasy XV', 35, 9, 'Game for Nintendo 3DS\r\nWW: November 29, 2016Square Enix Business Division 2Square Enix\r\n', 'Game', 11, 'images/download (4).jpg', 0),
('5a2a3d9fbefb0', 'Bloodborne', 25, 5, 'Game for PC\r\nNA: March 24, 2015 EU: March 25, 2015 AU: March 25, 2015 JP: March 26, 2015 UK: March 27, 2015FromSoftwareSony Computer Entertainment\r\n', 'Game', 6, 'images/download (5).jpg', 0),
('5a2a3ddbe9ebf', 'Driveclub', 34, 1, 'Game for PlayStation 3\r\nNA: October 7, 2014 EU: October 8, 2014 UK: October 10, 2014Evolution StudiosSony Computer Entertainment\r\n', 'Game', 12, 'images/download (6).jpg', 0),
('5a2a3e0e52692', 'Knack', 20, 12, 'Game for N-gage\r\nNA: November 15, 2013 PAL: November 29, 2013 JP: February 22, 2014SCE Japan StudioSony Computer Entertainment\r\n', 'Game', 5, 'images/download (7).jpg', 0),
('5a2a3e5c39cbf', 'Grand Theft Auto V', 40, 2, 'Game for PS4\r\nWW: November 18, 2014 JP: December 11, 2014Rockstar NorthRockstar Games\r\n', 'Game', 21, 'images/download (8).jpg', 0),
('5a2a3ead7cff8', 'The Last of Us Remastered', 20, 2, 'Game for PlayStation 4\r\nNA: July 29, 2014 AU: July 30, 2014 EU: July 30, 2014 UK: August 1, 2014Naughty DogSony Computer Entertainment\r\n', 'Game', 2, 'images/download (9).jpg', 0),
('5a2a3ee200f28', 'Battlefield 1', 50, 4, 'Game for XBOX One\r\nWW: October 21, 2016EA DICEElectronic Arts\r\n', 'Game', 12, 'images/download (10).jpg', 0),
('5a2a3f324da3e', 'NES Advantage', 10, 6, 'Arcade style joystick for the NES.\r\n', 'Accessory', 28, 'images/download (11).jpg', 0),
('5a2a3f60bb76d', 'DualShock 1', 100, 22, 'DualShock 1 for Playstation 2\r\n', 'Accessory', 28, 'images/download (11).jpg', 0),
('5a2a3fbac3095', 'Play Station 3', 300, 1, 'Gaming Console PlayStation 3 Edition', 'Console', 29, 'images/download (12).jpg', 0),
('5a2a3fe658c69', 'Xbox 360', 250, 3, 'Xbox 360 Console Edition\r\n', 'Console', 29, 'images/download (12).jpg', 0),
('5a2a4030d4946', 'Xbox One', 299, 4, 'Xbox One Console EDition\r\n', 'Console', 29, 'images/download (13).jpg', 0),
('5a2a405cf3374', 'DualShock 3', 50, 1, 'DualShock 3 Controller for PlayStation 3\r\n', 'Accessory', 28, 'images/download (11).jpg', 0),
('5a2a4092dab5f', 'Wii Fit U Fit Meter', 100, 8, 'Fit Controller for Wii U New Edition\r\n', 'Accessory', 28, 'images/download (14).jpg', 0),
('5a2a40d9a4ede', 'Call of Duty: Black Ops III', 17, 10, 'Game for PS Vita \r\nCall of Duty: Black Ops III\r\n', 'Game', 17, 'images/download (15).jpg', 0),
('5a2aad61623c3', 'NBA 2K18 - PlayStation 4', 29, 2, 'Publisher: 2KSKU: 6084214Release Date: 09/19/2017Platform: PlayStation 4', 'Game', 3, 'images/6084214_sa.jpg', 0),
('5a2aadc1780d5', 'FIFA 18 - PlayStation 4', 59, 2, 'Publisher: EASKU: 5901103Release Date: 09/29/2017Platform: PlayStation 4', 'Game', 3, 'images/5901103_sa.jpg', 0),
('5a2aae39871a2', 'Headset Audio Controller for PlayStation 4 - Black', 50, 2, 'Model: NS-GPS4HA101SKU: 8703029Release Date: 12/25/2014 Play Station 4', 'Accessory', 28, 'images/8703029_ra.jpg', 0),
('5a2aaec877c2a', 'Racing Wheel PlayStation 3', 100, 1, 'Thrustmaster T80 Racing Wheel\r\nGet behind the wheel of your favorite racing games with this and dual pedal set for PlayStation 3', 'Accessory', 28, 'images/4750104_sa.jpg', 0),
('5a2aaf31afea6', 'Nintendo - Switch 32GB Console - Neon Red/Neon Blue Joy-Con', 300, 7, 'Model: HACSKABAASKU: 5670100Release Date: 03/03/2017', 'Console', 29, 'images/5670100_sa.jpg', 0),
('5a2ace7723f17', 'Revolt', 10, 5, 'this is a good game', 'Game', 8, 'images/revolt.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE `region` (
  `region_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `region_manager` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `region`
--

INSERT INTO `region` (`region_id`, `name`, `region_manager`) VALUES
(1, 'Ohio', 11),
(2, 'Arizona', 2),
(3, 'California', 13),
(4, 'Florida', 15),
(5, 'Virginia', 7),
(6, 'Massachusetts', 9),
(7, 'Maryland', 3),
(8, 'Georgia', 1),
(9, 'New York', 5),
(10, 'New Jersey', 8),
(11, 'Pennsylvania', 6),
(12, 'North Carolina', 10),
(13, 'South Carolina', 12),
(14, 'Texas', 14),
(15, 'Utah', 4);

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `store_id` int(11) NOT NULL,
  `address_id` varchar(100) NOT NULL,
  `store_manager` int(11) NOT NULL,
  `region_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`store_id`, `address_id`, `store_manager`, `region_id`) VALUES
(1, '1', 16, 11),
(2, '2', 17, 11),
(3, '3', 18, 11),
(4, '4', 19, 2),
(5, '5', 20, 2),
(6, '6', 21, 4),
(7, '7', 22, 4),
(8, '8', 23, 4),
(9, '9', 24, 3),
(10, '10', 25, 3),
(11, '11', 26, 3);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transaction_id` varchar(100) NOT NULL,
  `customer_id` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `total_amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transaction_id`, `customer_id`, `date`, `total_amount`) VALUES
('5a2a59819707d', '5a2a577648ac1', '2017-12-08 09:21:05', 10),
('5a2a5ad2cbe23', '5a2a577648ac1', '2017-12-08 09:26:42', 74),
('5a2a63afbba69', '5a2a60062b7c6', '2017-12-08 10:04:31', 24),
('5a2a649335f92', '5a2a60062b7c6', '2017-12-08 10:08:19', 200),
('5a2a66bf34f93', '5a2a577648ac1', '2017-12-08 10:17:35', 51),
('5a2a681be8a14', '5a2a60c33d379', '2017-12-08 10:23:23', 50),
('5a2a8a628d524', '5a2a88dea88fa', '2017-12-08 12:49:38', 600),
('5a2ac1aaeb76b', 'cfc', '2017-12-08 16:45:30', 10),
('5a2ad0a94ffc1', '5a2ad0205fabe', '2017-12-08 17:49:29', 40);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`address_id`);

--
-- Indexes for table `business`
--
ALTER TABLE `business`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `store_id` (`store_id`);

--
-- Indexes for table `console_type`
--
ALTER TABLE `console_type`
  ADD PRIMARY KEY (`console_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD KEY `address_id` (`address_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`),
  ADD KEY `store_id` (`store_id`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`genre_id`);

--
-- Indexes for table `home`
--
ALTER TABLE `home`
  ADD PRIMARY KEY (`customer_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`store_id`,`product_id`,`region_id`),
  ADD KEY `store_id` (`store_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `region_id` (`region_id`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `transaction_id` (`transaction_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `store_id` (`store_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `genre_id` (`genre_id`),
  ADD KEY `console_id` (`console_id`);

--
-- Indexes for table `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`region_id`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`store_id`),
  ADD KEY `region_id` (`region_id`),
  ADD KEY `address_id` (`address_id`),
  ADD KEY `store_manager` (`store_manager`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `console_type`
--
ALTER TABLE `console_type`
  MODIFY `console_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `genre_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `region`
--
ALTER TABLE `region`
  MODIFY `region_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `store_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `business`
--
ALTER TABLE `business`
  ADD CONSTRAINT `business_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`store_id`) REFERENCES `store` (`store_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`address_id`) REFERENCES `address` (`address_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`store_id`) REFERENCES `store` (`store_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `home`
--
ALTER TABLE `home`
  ADD CONSTRAINT `home_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`store_id`) REFERENCES `store` (`store_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inventory_ibfk_3` FOREIGN KEY (`region_id`) REFERENCES `region` (`region_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inventory_ibfk_4` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_item`
--
ALTER TABLE `order_item`
  ADD CONSTRAINT `order_item_ibfk_2` FOREIGN KEY (`transaction_id`) REFERENCES `transaction` (`transaction_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_item_ibfk_3` FOREIGN KEY (`store_id`) REFERENCES `store` (`store_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_item_ibfk_4` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`genre_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`console_id`) REFERENCES `console_type` (`console_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `store`
--
ALTER TABLE `store`
  ADD CONSTRAINT `store_ibfk_1` FOREIGN KEY (`region_id`) REFERENCES `region` (`region_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `store_ibfk_2` FOREIGN KEY (`address_id`) REFERENCES `address` (`address_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `store_ibfk_3` FOREIGN KEY (`store_manager`) REFERENCES `employee` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
