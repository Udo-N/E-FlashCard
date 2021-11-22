-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2021 at 02:14 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-flash_card_schema`
--

-- --------------------------------------------------------

--
-- Table structure for table `card_text`
--

CREATE TABLE `card_text` (
  `index` int(11) NOT NULL,
  `Username` varchar(15) COLLATE utf8_bin NOT NULL,
  `Front_Text` mediumtext COLLATE utf8_bin DEFAULT NULL,
  `Back_Text` mediumtext COLLATE utf8_bin DEFAULT NULL,
  `Card_Number` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `card_text`
--

INSERT INTO `card_text` (`index`, `Username`, `Front_Text`, `Back_Text`, `Card_Number`) VALUES
(1, '', NULL, NULL, NULL),
(2, 'user6', 'someText', 'someMoreText', 1),
(3, 'username1', 'frontTExtHere', 'BackTe', 1),
(4, 'username5', NULL, NULL, NULL),
(5, 'UdoN', 'FRONT OF CARD1', 'Back of CARD1', 1),
(6, 'UdoN', 'No more null here', 'Back of flashcard text', 2),
(7, 'NjokuN', 'What is my name?', 'Udo', 1),
(8, 'NjokuN', 'What is my age?', '22', 2),
(9, 'NjokuN', 'What card?', 'Card 3', 3),
(10, 'NjokuN', 'What card is this?', 'This is card 4', 4),
(11, 'UdoNjoku', NULL, NULL, 1),
(12, 'UdoNjoku', NULL, NULL, 2),
(13, 'Test', NULL, NULL, 1),
(14, 'Test', NULL, NULL, 2),
(15, 'Yest', NULL, NULL, 1),
(16, 'Yest', NULL, NULL, 2),
(17, 'Username8', NULL, NULL, 1),
(18, 'Username8', NULL, NULL, 2),
(19, 'Username8', '123456789 123456789 123456789 123456789 123456789 123456789 123456789 123456789 123456789 123456789&nbsp;', 'Click Edit to add text to the back of the flashcard', 7),
(20, 'Username8', '123456789 123456789 123456789 123456789 123456789 123456789 123456789 123456789 123456789 123456789&nbsp;', 'Click Edit to add text to the back of the flashcard', 7),
(21, 'Username8', '123456789 123456789 123456789 123456789 123456789 123456789 123456789 123456789 123456789 123456789&nbsp;', 'Click Edit to add text to the back of the flashcard', 7),
(22, 'Username8', '123456789 123456789 123456789 123456789 123456789 123456789 123456789 123456789 123456789 123456789&nbsp;', 'Click Edit to add text to the back of the flashcard', 7),
(23, 'Username8', '123456789 123456789 123456789 123456789 123456789 123456789 123456789 123456789 123456789 123456789&nbsp;', 'Click Edit to add text to the back of the flashcard', 7);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Username` varchar(15) COLLATE utf8_bin NOT NULL,
  `Password` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Username`, `Password`) VALUES
('', ''),
('NjokuN', 'testpassword'),
('Test', 'testing'),
('UdoN', 'apassword'),
('UdoNjoku', 'whatever'),
('Username8', 'Password8'),
('Yest', 'testing'),
('user6', 'pass6'),
('username1', 'password1'),
('username5', 'pass5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `card_text`
--
ALTER TABLE `card_text`
  ADD PRIMARY KEY (`index`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `card_text`
--
ALTER TABLE `card_text`
  MODIFY `index` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
