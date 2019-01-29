-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2016 at 12:20 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `com409`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `ID` int(10) unsigned NOT NULL,
  `username` char(30) NOT NULL,
  `password` char(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `username`, `password`) VALUES
(1, 'jonathan', 'JonathanMcCrink1'),
(3, 'gary', 'GaryMcShane1'),
(4, 'ryan', 'RyanKinley1');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `id` int(10) unsigned NOT NULL,
  `custFirstName` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `custLastName` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `DOB` date NOT NULL,
  `email` char(30) COLLATE utf8_unicode_ci NOT NULL,
  `pword` char(30) COLLATE utf8_unicode_ci NOT NULL,
  `cPword` char(30) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `town` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `county` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `pcode` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `custFirstName`, `custLastName`, `DOB`, `email`, `pword`, `cPword`, `address`, `town`, `county`, `pcode`, `country`, `created_at`, `updated_at`) VALUES
(28, 'Paul', 'Murray', '1992-03-05', 'pmurray@hotmail.com', 'PaulMurray1', 'PaulMurray1', '4 Monaghan Row', 'Newry', 'Down', 'BT65 7GF', 'Ireland', '2016-04-13 14:37:23', '0000-00-00 00:00:00'),
(36, 'Steven', 'McCoy', '1982-03-20', 'smcoy@gmail.com', 'StevenMcCoy1', 'StevenMcCoy1', '34 Hill Grove', 'Lurgan', 'Armagh', 'BT21 6YE', 'Northern Ireland', '2016-04-13 21:55:57', '0000-00-00 00:00:00'),
(37, 'Mary', 'Stewart', '1975-04-04', 'stewart.m@mail.com', 'Mary1stewart', 'Mary1stewart', '4 New Bridge', 'Belfast', 'Antrim', 'BT10 4GF', 'Northern Ireland', '2016-04-13 22:08:55', '0000-00-00 00:00:00'),
(38, 'Ryan', 'Kinley', '1995-06-05', 'rkinley@email.com', 'Kinleyr1', 'Kinleyr1', '2 Hill St', 'Newry', 'Down', 'BT43 5LD', 'Northern Ireland', '2016-04-13 22:11:10', '0000-00-00 00:00:00'),
(39, 'Gary', 'McShane', '1994-02-07', 'gmcshane@hotmail.co.uk', 'Garymcshane10', 'Garymcshane10', '28 Lisseraw Rd, Crossmaglen', 'Newry', 'Down', 'BT64 7LG', 'Ireland', '2016-04-13 22:12:35', '0000-00-00 00:00:00'),
(40, 'Jonathan', 'McCrink', '1994-08-08', 'jmccrink895@hotmail.com', 'JonnyMcCrink4', 'JonnyMcCrink4', '3 Carrick Meadows Camlough', 'Newry', 'Down', 'BT35 7LJ', 'Ireland', '2016-04-13 22:13:13', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `Product_ID` int(10) unsigned NOT NULL,
  `Title` varchar(50) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `Image` blob NOT NULL,
  `Category` varchar(10) NOT NULL,
  `Price` decimal(15,2) NOT NULL,
  `Rating` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`Product_ID`, `Title`, `Description`, `Image`, `Category`, `Price`, `Rating`, `created_at`, `updated_at`) VALUES
(6, 'Specture', 'A cryptic message from the past sends James Bond on a rogue mission to Mexico City and eventually Rome, where he meets Lucia Sciarra (Monica Bellucci), the beautiful and forbidden widow of an infamous criminal. Bond infiltrates a secret meeting and uncovers the existence of the sinister organisation known as SPECTRE.', 0x5370656374726520426c752d5261792e6a7067, 'Blu_Ray', '2.70', '12', '2016-04-13 19:35:23', '0000-00-00 00:00:00'),
(7, 'Vacation', 'Ed Helms and Christina Applegate star in this comedy written and directed by John Francis Daley and Jonathan M. Goldstein. Rusty Griswold (Helms) and his family are in need of a vacation so he surprises his wife Debbie (Applegate) by booking them and their two boys into the soon-to-be-closing Walley World to recreate the memorable vacation he had with his family 30 years ago.', 0x7661636174696f6e20426c752d5261792e6a7067, 'Blu_Ray', '2.00', '15', '2016-04-13 19:35:28', '0000-00-00 00:00:00'),
(11, 'Need for Speed', 'With over 20 years of history in its rear view mirror, Need for Speed returns with a reboot that delivers on what Need for Speed stands for - rich customization, authentic urban car culture, a nocturnal open world, and an immersive narrative that drives your Need For Speed game.', 0x4e65656420666f722053706565642058626f784f6e652e6a7067, 'Games', '3.00', '12', '2016-04-13 19:35:09', '0000-00-00 00:00:00'),
(12, 'Pixels', 'Adam Sandler, Kevin James, Josh Gad and Peter Dinklage star in this part-animated comedy directed by Chris Columbus. Back in 1982, NASA sent a time capsule into space containing an insight into life on Earth including the video games Pac-Man, Donkey Kong and Space Invaders.', 0x506978656c732e6a7067, 'DVD', '2.50', '12', '2016-04-13 19:34:48', '0000-00-00 00:00:00'),
(13, 'Paddington', 'Nicole Kidman and Hugh Bonneville star in this family comedy based on the popular childrens books written by Michael Bond. A young Peruvian bear (voice of Ben Whishaw) grows up dreaming of a life in London, having been influenced by his aunt who once met an explorer from England. ', 0x50616464696e67746f6e504f535445522e6a7067, 'DVD', '3.70', 'PG', '2016-04-13 19:34:41', '0000-00-00 00:00:00'),
(15, 'Bourne Identity', 'Badly wounded and suffering from amnesia, Jason Bourne (Matt Damon) is pulled out of the Mediterranean by fishermen, and is able to recall neither who he is nor what happened to him. His only clue to his identity is the number of a Swiss bank account which has been etched into a device implanted in his body', 0x626f75726e652e6a7067, 'Blu_Ray', '3.00', '12', '2016-04-08 08:16:03', '0000-00-00 00:00:00'),
(17, 'GTA 5', 'One of the biggest events of the last console generation is finally striding onto more powerful formats! GTA V finally makes its next-gen debut. With GTA IV having taken place in a decidedly east coast sort of setting in Liberty City, this game takes things over to the west coast. The action takes place in Los Santos and the surrounding countryside of San Andreas. Los Santos has seen better days.', 0x4772616e645f54686566745f4175746f5f562e706e67, 'Games', '3.50', '18', '2016-04-13 19:34:27', '0000-00-00 00:00:00'),
(18, 'Dumb and Dumber', 'Troy Millers prequel to the Farrelly Brothers 1994 hit  Dumb and Dumber. Harry Dunne (Derek Richardson) and Lloyd Christmas (Eric Christian Olsen) are seen in their formative teen years where it all began - 1986 at Providence High School - when Dumb literally ran headfirst into Dumberer.', 0x64756d625f616e645f64756d6265722e6a7067, 'DVD', '2.00', '12', '2016-04-13 19:34:18', '0000-00-00 00:00:00'),
(20, '2 Fast 2 furious', 'John Singletons sequel to The Fast and the Furious - which brought stardom to Vin Diesel. Diesel decided not to reprise his role but Paul Walker did. Former undercover cop Brian OConner (Walker) finds himself on the trail of another group of underground car enthusiasts in an attempt to redeem himself after his illegal escapades in the first movie.', 0x666173745f667572696f75732e6a7067, 'DVD', '3.00', '15', '2016-04-05 10:26:09', '0000-00-00 00:00:00'),
(21, 'Fallout 4', 'Return to the wasteland in Fallout 4, the latest titles from the award winning studio who have brought you the likes of Fallout 3 & The Elder Scrolls V: Skyrim.', 0x66616c6c6f75742e6a7067, 'Games', '3.50', '18', '2016-04-13 19:35:00', '0000-00-00 00:00:00'),
(22, 'Terminator Genisys', 'In 2029, John Connor (Jason Clarke), leader of the human resistance movement against the machines, learns that Skynet is planning to attack the movement by targeting him in the past and changing the future timeline. In an effort to ensure his own existence and the survival of the human race, John sends lieutenant Kyle Reese (Jai Courtney) back to protect his mother. But when Kyle arrives to find Sarah Connor (Emilia Clarke) partnered with a T-800 (Arnold Schwarzenegger) and fending off an unexpe', 0x7465726d696e61746f722e6a7067, 'DVD', '2.50', '12', '2016-04-12 11:19:46', '0000-00-00 00:00:00'),
(23, 'Michael Collins', 'Liam Neeson stars in this historical drama written and directed by Neil Jordan. Set in 1916, the film follows the story of Irish revolutionary leader Michael Collins (Neeson), telling of his struggle to release Ireland from British rule in the 1920s, his love affair with Kitty Kiernan (Julia Roberts) and political struggles with Sinn Fein president Eamon De Valera (Alan Rickman).', 0x6d69636861656c5f636f6c6c696e732e6a7067, 'Blu_Ray', '3.75', '15', '2016-04-13 21:58:34', '0000-00-00 00:00:00'),
(24, 'The Hunger Games: Mockingjay - Part 2', 'Jennifer Lawrence reprises her role as Katniss Everdeen in the fourth and final instalment of the sci-fi film series based on the novels by Suzanne Collins. With Katniss as their leader, the citizens of Panem unite in battle against the Capitol in an attempt to bring down the autocratic President Snow (Donald Sutherland) once and for all.', 0x68756e6765725f67616d65732e6a7067, 'DVD', '3.00', '12', '2016-04-13 21:59:52', '0000-00-00 00:00:00'),
(25, 'Dark Souls III', 'While the Dark Souls III feels instantly familiar, it does much to turn the series on its head. The ruined castle ramparts and monstrous dragons are still present and accounted for, as is the atmosphere of impending doom. But where the games have traditionally seen the player ascending ever higher as the game progresses, here the player begins by sinking ever deeper into the world.', 0x6461726b5f736f756c732e6a7067, 'Games', '2.50', '15', '2016-04-13 22:01:58', '0000-00-00 00:00:00'),
(26, 'Quantum Break', 'Time is Power. In the aftermath of a split second of destruction that fractures time itself, two people find they have changed and gained extraordinary abilities. One of them travels through time and becomes hell-bent on controlling this power. The other uses these new abilities to attempt to defeat him â€“ and fix time before it tears itself irreparably apart', 0x7175616e74696d5f627265616b2e6a7067, 'Games', '3.50', '15', '2016-04-13 22:03:00', '0000-00-00 00:00:00'),
(27, 'Bridge of Spies', 'Tom Hanks stars in this historical drama, set during the Cold War, directed by Steven Spielberg. When Rudolf Abel (Mark Rylance) sits down on a park bench in Brooklyn, New York, a secret message left for him causes the FBI to arrest him under suspicion of being a Soviet spy.', 0x6272696467655f73706965732e6a7067, 'Blu_Ray', '3.00', '12', '2016-04-13 22:03:56', '0000-00-00 00:00:00'),
(28, 'Steve Jobs', 'Danny Boyle directs this award-winning biopic starring Michael Fassbender as the American businessman and co-founder of multinational tech company Apple Inc. The film follows Steve Jobs (Fassbender) as he sacrifices his personal life and relationships while transforming Apple from a dwindling loss-making company into a key player in the digital revolution.', 0x73746576655f6a6f62732e6a7067, 'Blu_Ray', '3.75', '15', '2016-04-13 22:05:43', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `rental_note`
--

CREATE TABLE IF NOT EXISTS `rental_note` (
  `Rental_ID` int(10) unsigned NOT NULL,
  `id` int(10) unsigned NOT NULL,
  `Product_ID` int(10) unsigned NOT NULL,
  `Duration` int(20) NOT NULL,
  `Date_Rented` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rental_note`
--

INSERT INTO `rental_note` (`Rental_ID`, `id`, `Product_ID`, `Duration`, `Date_Rented`) VALUES
(54, 28, 18, 3, '2016-04-13 14:33:16'),
(55, 28, 6, 2, '2016-04-13 14:33:24'),
(56, 28, 21, 4, '2016-04-13 14:33:30'),
(57, 28, 17, 2, '2016-04-13 14:33:42'),
(58, 36, 13, 3, '2016-04-13 21:54:37'),
(60, 36, 7, 2, '2016-04-13 21:54:56'),
(61, 40, 23, 7, '2016-04-13 22:14:31'),
(62, 40, 17, 5, '2016-04-13 22:14:50'),
(63, 39, 22, 3, '2016-04-13 22:15:31'),
(64, 38, 11, 3, '2016-04-13 22:16:20'),
(65, 38, 25, 2, '2016-04-13 22:16:26'),
(66, 38, 28, 4, '2016-04-13 22:16:38'),
(67, 37, 15, 2, '2016-04-13 22:17:26'),
(68, 37, 7, 3, '2016-04-13 22:17:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`Product_ID`);

--
-- Indexes for table `rental_note`
--
ALTER TABLE `rental_note`
  ADD PRIMARY KEY (`Rental_ID`),
  ADD KEY `id` (`id`) USING BTREE,
  ADD KEY `Product_ID` (`Product_ID`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `Product_ID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `rental_note`
--
ALTER TABLE `rental_note`
  MODIFY `Rental_ID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=69;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `rental_note`
--
ALTER TABLE `rental_note`
  ADD CONSTRAINT `rental_note_ibfk_1` FOREIGN KEY (`Product_ID`) REFERENCES `products` (`Product_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rental_note_ibfk_2` FOREIGN KEY (`id`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
