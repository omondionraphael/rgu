-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 24, 2024 at 10:58 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `recipe`
--

-- --------------------------------------------------------

--
-- Table structure for table `direction_table`
--

CREATE TABLE `direction_table` (
  `id` int(11) NOT NULL,
  `recipeid` varchar(11) NOT NULL,
  `dir1` text NOT NULL,
  `dir2` text NOT NULL,
  `dir3` text NOT NULL,
  `dir4` text NOT NULL,
  `dir5` text NOT NULL,
  `dir6` text NOT NULL,
  `dir7` text NOT NULL,
  `dir8` text NOT NULL,
  `dir9` text NOT NULL,
  `dir10` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `direction_table`
--

INSERT INTO `direction_table` (`id`, `recipeid`, `dir1`, `dir2`, `dir3`, `dir4`, `dir5`, `dir6`, `dir7`, `dir8`, `dir9`, `dir10`) VALUES
(7, '80', 'sghghs', 'weee', 'qqq', '', '', '', '', '', '', ''),
(8, '81', 'hhjjj', 'juuiui', 'jkkj', '', '', '', '', '', '', ''),
(9, '82', 'hhjjj', 'juuiui', 'jkkj', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `image_table`
--

CREATE TABLE `image_table` (
  `id` int(11) NOT NULL,
  `recipeid` text NOT NULL,
  `image1` text NOT NULL,
  `image2` text NOT NULL,
  `image3` text NOT NULL,
  `image4` text NOT NULL,
  `image5` text NOT NULL,
  `image6` text NOT NULL,
  `image7` text NOT NULL,
  `image8` text NOT NULL,
  `image9` text NOT NULL,
  `image10` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `image_table`
--

INSERT INTO `image_table` (`id`, `recipeid`, `image1`, `image2`, `image3`, `image4`, `image5`, `image6`, `image7`, `image8`, `image9`, `image10`) VALUES
(26, '80', '360_F_700415179_VB9NNfRb7Ed77IoQx07DzwtvDLVhCWkh.jpg', '649-08118192en_Masterfile.jpg', 'fire_damage.png', '', '', '', '', '', '', ''),
(27, '81', '360_F_700415179_VB9NNfRb7Ed77IoQx07DzwtvDLVhCWkh.jpg', '649-08118192en_Masterfile.jpg', 'fire_damage.png', '', '', '', '', '', '', ''),
(28, '82', '360_F_700415179_VB9NNfRb7Ed77IoQx07DzwtvDLVhCWkh.jpg', '649-08118192en_Masterfile.jpg', 'fire_damage.png', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `ingredient_table`
--

CREATE TABLE `ingredient_table` (
  `id` int(11) NOT NULL,
  `recipeid` varchar(255) NOT NULL,
  `ingredient1` varchar(255) NOT NULL,
  `ingredient2` varchar(255) NOT NULL,
  `ingredient3` varchar(255) NOT NULL,
  `ingredient4` varchar(255) NOT NULL,
  `ingredient5` varchar(255) NOT NULL,
  `ingredient6` varchar(255) NOT NULL,
  `ingredient7` varchar(255) NOT NULL,
  `ingredient8` varchar(255) NOT NULL,
  `ingredient9` varchar(255) NOT NULL,
  `ingredient10` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ingredient_table`
--

INSERT INTO `ingredient_table` (`id`, `recipeid`, `ingredient1`, `ingredient2`, `ingredient3`, `ingredient4`, `ingredient5`, `ingredient6`, `ingredient7`, `ingredient8`, `ingredient9`, `ingredient10`) VALUES
(7, '80', 'sjhjss', 'ssjks', '', '', '', '', '', '', '', ''),
(8, '81', 'ghhghg', 'hhhhj', 'ukkjjk', '', '', '', '', '', '', ''),
(9, '82', 'ghhghg', 'hhhhj', 'ukkjjk', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `nutrition_table`
--

CREATE TABLE `nutrition_table` (
  `id` int(11) NOT NULL,
  `recipeid` varchar(255) NOT NULL,
  `serving` text NOT NULL,
  `calories` text NOT NULL,
  `nutrition_value` text NOT NULL,
  `value` text NOT NULL,
  `percentage` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nutrition_table`
--

INSERT INTO `nutrition_table` (`id`, `recipeid`, `serving`, `calories`, `nutrition_value`, `value`, `percentage`) VALUES
(7, '80', 'uuwui', 'wwiu', 'uuiwuiq', 'uuiwu', 'ui'),
(8, '81', 'tttty', 'erree', 'uiuiu', 'wwe', 'ffgfg'),
(9, '82', 'tttty', 'erree', 'uiuiu', 'wwe', 'ffgfg');

-- --------------------------------------------------------

--
-- Table structure for table `recipe`
--

CREATE TABLE `recipe` (
  `id` int(11) NOT NULL,
  `userid` varchar(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recipe`
--

INSERT INTO `recipe` (`id`, `userid`, `title`, `description`, `location`) VALUES
(80, '15', 'gghhg', 'hhhh', 'kitchen'),
(81, '15', 'ghghhg', 'yyytyyu', 'restaurant'),
(82, '15', 'ghghhg', 'yyytyyu', 'restaurant');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--
-- Error reading structure for table recipe.users: #1932 - Table &#039;recipe.users&#039; doesn&#039;t exist in engine
-- Error reading data for table recipe.users: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `recipe`.`users`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `users_table`
--

CREATE TABLE `users_table` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `role` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_table`
--

INSERT INTO `users_table` (`id`, `fullname`, `email`, `password`, `role`) VALUES
(1, 'admin', 'admin@example.com', '12345', 'admin'),
(15, 'john james', 'examplezz@gmail.com', '1234567', 'regular'),
(17, 'asasddsaad', 'example1@gmail.com', '1234567', 'regular'),
(18, 'testts', 'examplex@gmail.com', '1234567', 'regular');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `direction_table`
--
ALTER TABLE `direction_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image_table`
--
ALTER TABLE `image_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ingredient_table`
--
ALTER TABLE `ingredient_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nutrition_table`
--
ALTER TABLE `nutrition_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recipe`
--
ALTER TABLE `recipe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_table`
--
ALTER TABLE `users_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `direction_table`
--
ALTER TABLE `direction_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `image_table`
--
ALTER TABLE `image_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `ingredient_table`
--
ALTER TABLE `ingredient_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `nutrition_table`
--
ALTER TABLE `nutrition_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `recipe`
--
ALTER TABLE `recipe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `users_table`
--
ALTER TABLE `users_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
