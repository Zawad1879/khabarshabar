-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2017 at 11:32 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `khabarshabar`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `user_id`, `title`, `text`, `created`, `modified`) VALUES
(1, 2, 'A love poem to the lovely biriyani', 'Ah the biriyani\r\nBetter than the khichuri!\r\nYou''re so delicious\r\nWhenever someone eats you I get jealous!\r\nYou''re only mine\r\nCause you deserve someone fine!\r\n\r\n', '2017-03-01 00:00:00', '2017-03-01 00:00:00'),
(2, 2, 'Recipe for the magnificent chicken biriyani', 'In a large skillet, in 2 tablespoons vegetable oil (or ghee) fry potatoes until brown, drain and reserve the potatoes. Add remaining 2 tablespoons oil to the skillet and fry onion, garlic and ginger until onion is soft and golden. Add chili, pepper, turmeric, cumin, salt and the tomatoes. Fry, stirring constantly for 5 minutes. Add yogurt, mint, cardamom and cinnamon stick. Cover and cook over low heat, stirring occasionally until the tomatoes are cooked to a pulp. It may be necessary to add a little hot water if the mixture becomes too dry and starts to stick to the pan.\r\nWhen the mixture is thick and smooth, add the chicken pieces and stir well to coat them with the spice mixture. Cover and cook over very low heat until the chicken is tender, approximately 35 to 45 minutes. There should only be a little very thick gravy left when chicken is finished cooking. If necessary cook uncovered for a few minutes to reduce the gravy.\r\nWash rice well and drain in colander for at least 30 minutes.\r\nIn a large skillet, heat vegetable oil (or ghee) and fry the onions until they are golden. Add saffron, cardamom, cloves, cinnamon stick, ginger and rice. Stir continuously until the rice is coated with the spices.\r\nIn a medium-size pot, heat the chicken stock and salt. When the mixture is hot pour it over the rice and stir well. Add the chicken mixture and the potatoes; gently mix them into the rice. Bring to boil. Cover the saucepan tightly, turn heat to very low and steam for 20 minutes. Do not lift lid or stir while cooking. Spoon biryani onto a warm serving dish.', '2017-03-01 18:43:32', '2017-03-01 18:43:32'),
(15, 2, 'Testing for paragraphs', 'This is the first,\r\nThis is the second..', '2017-03-02 07:18:22', '2017-03-02 07:18:22'),
(16, 2, 'Mahir loves food', 'Especially polao', '2017-03-02 10:39:03', '2017-03-02 10:39:03'),
(17, 2, 'Testing', 'Testing', '2017-03-05 13:30:35', '2017-03-05 13:30:35'),
(18, 2, 'Hello', 'Hi', '2017-03-09 11:44:25', '2017-03-09 11:44:25');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`Name`) VALUES
('Breakfast'),
('Lunch'),
('Supper');

-- --------------------------------------------------------

--
-- Table structure for table `foods`
--

CREATE TABLE `foods` (
  `id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  `food_name` varchar(255) NOT NULL,
  `food_calories` varchar(255) NOT NULL,
  `food_quantity` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foods`
--

INSERT INTO `foods` (`id`, `food_id`, `food_name`, `food_calories`, `food_quantity`) VALUES
(1, 1, 'Rice', '206', '158g'),
(3, 3, 'Meat', '122', '85g'),
(4, 4, 'Fish', '366', '178g');

-- --------------------------------------------------------

--
-- Table structure for table `tracked_calories`
--

CREATE TABLE `tracked_calories` (
  `id` int(11) NOT NULL,
  `created` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `calories` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tracked_calories`
--

INSERT INTO `tracked_calories` (`id`, `created`, `user_id`, `calories`) VALUES
(36, '2017-02-23', 2, 20),
(37, '2017-02-24', 2, 1400),
(38, '2017-02-25', 2, 20),
(39, '2017-02-28', 2, 1900),
(40, '2017-03-03', 2, 2000),
(41, '2017-03-16', 2, 2300),
(42, '2017-02-23', 2, 25),
(43, '2017-02-23', 2, 10),
(44, '2017-02-28', 2, 12),
(45, '2017-02-28', 2, 200),
(46, '2017-02-28', 2, 200),
(47, '2017-03-01', 2, 200),
(48, '2017-03-01', 2, 200),
(49, '2017-03-01', 2, 200),
(50, '2017-03-01', 2, 200),
(51, '2017-03-01', 2, 200),
(52, '2017-03-02', 2, 400),
(53, '2017-03-09', 2, 2300);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `created`, `modified`) VALUES
(2, 'zawad1879@gmail.com', '$2a$10$kfDYgfFMvWxOHkNaxzzEkecIoYKCH0oxC5hbW3fFQ9JRI9.56kGNa', 'admin', '2017-02-16 06:56:55', '2017-02-16 06:56:55'),
(3, 'zawad@gmail.com', '$2a$10$2keq/0USU2033DhLgK8vb.tw3a7s4S/ihP2RWrWp64HV0dpBOwjC.', NULL, '2017-03-08 11:02:36', '2017-03-08 11:02:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foods`
--
ALTER TABLE `foods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tracked_calories`
--
ALTER TABLE `tracked_calories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `foods`
--
ALTER TABLE `foods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tracked_calories`
--
ALTER TABLE `tracked_calories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
