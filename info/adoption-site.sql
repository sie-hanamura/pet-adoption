-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2024 at 12:46 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adoption-site`
--

-- --------------------------------------------------------

--
-- Table structure for table `adoptions`
--

CREATE TABLE `adoptions` (
  `id` int(6) UNSIGNED NOT NULL,
  `pet_name` varchar(255) NOT NULL,
  `pet_type` varchar(255) NOT NULL,
  `breed` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `spayed_neutered` varchar(255) NOT NULL,
  `vaccination_status` varchar(255) NOT NULL,
  `health_issues` text DEFAULT NULL,
  `behavioral_traits` text DEFAULT NULL,
  `reason` text NOT NULL,
  `owner_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact_method` varchar(255) NOT NULL,
  `adoption_conditions` text DEFAULT NULL,
  `additional_notes` text DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adoptions`
--

INSERT INTO `adoptions` (`id`, `pet_name`, `pet_type`, `breed`, `age`, `gender`, `spayed_neutered`, `vaccination_status`, `health_issues`, `behavioral_traits`, `reason`, `owner_name`, `email`, `phone`, `address`, `contact_method`, `adoption_conditions`, `additional_notes`, `reg_date`) VALUES
(1, 'Sie', 'cat', 'Aso', 19, 'female', 'yes', 'up-to-date', 'shabu addict', 'shabu addict', 'shabu addict', 'Siera Quidayan Hallig', 'qsierahallig@gmail.com', '09674035726', '096 J Tanalega Street', 'phone', 'shabu addict', 'shabu addict', '2024-06-01 07:57:55'),
(3, 'Sie', 'cat', 'Aso', 19, 'female', 'yes', 'up-to-date', 'shabu addict', 'shabu addict', 'shabu addict', 'Siera Quidayan Hallig', 'qsierahallig@gmail.com', '09674035726', '096 J Tanalega Street', 'phone', 'shabu addict', 'shabu addict', '2024-06-01 12:03:52'),
(4, 'Sie', 'cat', 'Aso', 19, 'female', 'yes', 'up-to-date', 'shabu addict', 'shabu addict', 'shabu addict', 'Siera Quidayan Hallig', 'qsierahallig@gmail.com', '09674035726', '096 J Tanalega Street', 'phone', 'shabu addict', 'shabu addict', '2024-06-01 12:04:49'),
(5, 'Sie', 'cat', 'Aso', 19, 'female', 'yes', 'up-to-date', 'shabu addict', 'shabu addict', 'shabu addict', 'Siera Quidayan Hallig', 'qsierahallig@gmail.com', '09674035726', '096 J Tanalega Street', 'phone', 'shabu addict', 'shabu addict', '2024-06-01 12:09:41'),
(6, 'a', 'dog', 'a', 1, 'male', 'yes', 'up-to-date', 'a', 'a', 'a', 'Siera Quidayan Hallig', 'qsierahallig@gmail.com', '09674035726', '096 J Tanalega Street', 'email', 'a', 'a', '2024-06-01 12:16:24');

-- --------------------------------------------------------

--
-- Table structure for table `adoption_applications`
--

CREATE TABLE `adoption_applications` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `job` varchar(100) DEFAULT NULL,
  `contact_method` varchar(20) DEFAULT NULL,
  `allergies` enum('none','yes') DEFAULT NULL,
  `allergy_details` text DEFAULT NULL,
  `previous_pets` enum('yes','no') DEFAULT NULL,
  `pet_experiences` text DEFAULT NULL,
  `reason` text DEFAULT NULL,
  `pet_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `pet_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adoption_applications`
--

INSERT INTO `adoption_applications` (`id`, `first_name`, `middle_name`, `last_name`, `age`, `email`, `address`, `job`, `contact_method`, `allergies`, `allergy_details`, `previous_pets`, `pet_experiences`, `reason`, `pet_id`, `created_at`, `pet_name`) VALUES
(1, 'Siera', 'Quidayan', 'Hallig', 0, 'qsierahallig@gmail.com', '096 J Tanalega Street', 'LOL', 'email', 'none', '', 'yes', '123', '', 1, '2024-06-01 13:53:08', NULL),
(2, 'Siera', 'Quidayan', 'Hallig', 3, 'qsierahallig@gmail.com', '096 J Tanalega Street', 'LOL', 'email', 'none', '', 'yes', '123', '', 1, '2024-06-01 13:54:02', NULL),
(3, 'Siera', 'Quidayan', 'Hallig', 12, 'qsierahallig@gmail.com', '096 J Tanalega Street', 'LOL', 'email', 'none', '', 'yes', 'not really', '', 1, '2024-06-01 13:56:38', NULL),
(4, 'Siera', 'Quidayan', 'Hallig', -2, 'qsierahallig@gmail.com', '096 J Tanalega Street', 'LOL', 'email', 'yes', '13123', 'yes', 'asfasfaf', '123', 1, '2024-06-01 13:58:49', 'Lucy');

-- --------------------------------------------------------

--
-- Table structure for table `pets`
--

CREATE TABLE `pets` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `breed` varchar(100) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pets`
--

INSERT INTO `pets` (`id`, `name`, `type`, `description`, `image`, `breed`, `age`, `gender`) VALUES
(1, 'Lucy', 'Orange Cat', 'A friendly orange cat.', 'resources/orange-cat.jpg', NULL, NULL, NULL),
(2, 'Hulfy', 'Aspin Dog', 'A playful aspin dog.', 'resources/aspin-dog.jpg', NULL, NULL, NULL),
(3, 'Susu', 'Labrador Dog', 'A loyal labrador dog.', 'resources/labrador.jpg', NULL, NULL, NULL),
(4, 'Hulfy', 'Dog', 'Hulfy is a friendly and playful pug looking for a loving home. He enjoys going for walks and cuddling on the couch.', 'resources/pug-dog.png', 'Pug', 2, 'Male'),
(5, 'Luna', 'Dog', 'Luna is a sweet and gentle Golden Retriever with a loving personality. She enjoys playing fetch and spending time with her human companions.', 'resources/gold-ret.jpg', 'Golden Retriever', 4, 'Female'),
(6, 'Max', 'Dog', 'Max is an energetic and loyal German Shepherd who loves outdoor adventures. He is always ready for a game of fetch or a long walk in the park.', 'resources/gmnshprd.png', 'German Shepherd', 1, 'Male'),
(7, 'Rocky', 'Dog', 'Rocky is a handsome and affectionate Boxer with a playful spirit. He loves meeting new people and making friends wherever he goes.', 'resources/boxer.png', 'Boxer', 6, 'Male'),
(8, 'Sadie', 'Dog', 'Sadie is a smart and playful Australian Shepherd who enjoys learning new tricks and going for hikes. She is looking for an active family to join.', 'resources/australian.png', 'Australian Shepherd', 2, 'Female'),
(9, 'Daisy', 'Dog', 'Daisy is a friendly and outgoing Beagle who loves to explore the world around her. She enjoys sniffing out new scents and going on adventures.', 'resources/beagle.png', 'Beagle', 3, 'Female'),
(10, 'Loafy', 'Cat', 'Loafy is a charming Siamese cat with striking blue eyes and a curious personality. He enjoys lounging in the sun and chasing after toys.', 'resources/siamese-cat.png', 'Siamese', 3, 'Male'),
(11, 'Mittens', 'Cat', 'Mittens is a sweet and playful Tabby cat with a love for cuddles and attention. She enjoys napping in cozy spots and batting at toy mice.', 'resources/tabby.png', 'Tabby', 2, 'Female'),
(12, 'Simba', 'Cat', 'Simba is a majestic Persian cat with a luxurious coat and a regal demeanor. He enjoys lounging on soft pillows and being admired by his humans.', 'resources/orange-cat.png', 'Persian', 5, 'Male'),
(13, 'Oliver', 'Cat', 'Oliver is a handsome British Shorthair with a calm and laid-back personality. He enjoys lounging in sunny spots and receiving gentle pets from his humans.', 'resources/sh.png', 'British Shorthair', 4, 'Male'),
(14, 'Milo', 'Cat', 'Milo is a playful Bengal cat with a striking coat and a mischievous streak. He enjoys climbing to high places and exploring his surroundings.', 'resources/bengal.png', 'Bengal', 1, 'Female'),
(15, 'Gizmo', 'Cat', 'Gizmo is a sweet Scottish Fold cat with adorable folded ears and a gentle disposition. She enjoys curling up in laps and purring contentedly.', 'resources/scot.png', 'Scottish Fold', 3, 'Female'),
(16, 'Bazinga', '', 'Bazinga', '6b067236003cc3e2da3df20f929a89e4.jpg', 'Aso', 4, NULL),
(17, 'Bazinga', '', 'Bazinga', '6b067236003cc3e2da3df20f929a89e4.jpg', 'Aso', 4, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact` varchar(15) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `bday` date DEFAULT NULL,
  `role` enum('user','admin') DEFAULT 'user',
  `is_admin` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `contact`, `gender`, `age`, `bday`, `role`, `is_admin`) VALUES
(1, 'admin', 'admin@example.com', '$2y$10$3KqUgsA.VBBtUw0bgTBhDebGJQCaLhn7RyPvH6y/WvVswdwGfdrsq', '', 'other', 0, '0000-00-00', 'admin', 1),
(2, 'scara', 'qsierahallig@gmail.com', '$2y$10$ViaDr/5XQkNOAN2XrGP9Fe9P5PSeceGd07.rLyXaj9fJElCRNo7ju', '+639674035726', 'female', 19, '2003-07-05', 'user', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adoptions`
--
ALTER TABLE `adoptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adoption_applications`
--
ALTER TABLE `adoption_applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pets`
--
ALTER TABLE `pets`
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
-- AUTO_INCREMENT for table `adoptions`
--
ALTER TABLE `adoptions`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `adoption_applications`
--
ALTER TABLE `adoption_applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pets`
--
ALTER TABLE `pets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
