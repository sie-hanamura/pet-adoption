-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2024 at 08:09 AM
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
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(50) DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adoptions`
--

INSERT INTO `adoptions` (`id`, `pet_name`, `pet_type`, `breed`, `age`, `gender`, `spayed_neutered`, `vaccination_status`, `health_issues`, `behavioral_traits`, `reason`, `owner_name`, `email`, `phone`, `address`, `contact_method`, `adoption_conditions`, `additional_notes`, `reg_date`, `status`) VALUES
(7, 'Bella', 'cat', 'Siamese', 3, 'female', 'yes', 'up-to-date', 'none', 'friendly, playful', 'looking for a companion', 'Emma Smith', 'emma@example.com', '123-456-7890', '456 Elm Street', 'phone', 'none', 'none', '2024-06-02 05:48:05', 'Approved'),
(8, 'Max', 'dog', 'Golden Retriever', 5, 'male', 'yes', 'up-to-date', 'none', 'well-behaved, obedient', 'family wants to adopt a dog', 'John Johnson', 'john@example.com', '987-654-3210', '789 Oak Avenue', 'email', 'none', 'none', '2024-06-02 05:00:00', 'Pending'),
(9, 'Luna', 'dog', 'German Shepherd', 2, 'female', 'no', 'up-to-date', 'none', 'energetic, loves outdoor activities', 'seeking a running partner', 'Sarah Williams', 'sarah@example.com', '234-567-8901', '101 Pine Street', 'phone', 'none', 'none', '2024-06-02 06:00:00', 'Pending');

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
  `pet_name` varchar(255) DEFAULT NULL,
  `status` enum('Pending','Accepted','Rejected') NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adoption_applications`
--

INSERT INTO `adoption_applications` (`id`, `first_name`, `middle_name`, `last_name`, `age`, `email`, `address`, `job`, `contact_method`, `allergies`, `allergy_details`, `previous_pets`, `pet_experiences`, `reason`, `pet_id`, `created_at`, `pet_name`, `status`) VALUES
(5, 'Emma', '', 'Smith', 30, 'emma@example.com', '456 Elm Street', 'Software Engineer', 'email', 'none', 'none', '', 'none', 'want to adopt a pet for companionship', 2, '2024-06-02 04:00:00', 'Max', 'Accepted'),
(6, 'John', '', 'Johnson', 45, 'john@example.com', '789 Oak Avenue', 'Teacher', 'phone', 'none', 'none', '', 'grown up with pets all his life', 'looking for a new furry friend for the family', 1, '2024-06-02 05:00:00', 'Bella', 'Rejected'),
(7, 'Sarah', '', 'Williams', 28, 'sarah@example.com', '101 Pine Street', 'Athlete', 'email', 'none', 'none', '', 'has volunteered at animal shelters', 'seeking an active companion for outdoor activities', 3, '2024-06-02 06:00:00', 'Luna', 'Accepted'),
(8, 'Siera', 'Quidayan', 'Hallig', 19, 'qsierahallig@gmail.com', '096 J Tanalega Street', 'Jobless', 'email', 'yes', 'Seafood', 'no', 'I love doge', '', 23, '2024-06-02 05:29:31', 'fhfsdsdfj', 'Rejected'),
(9, 'Siera', 'Quidayan', 'Hallig', 19, '0', '096 J Tanalega Street', 'Jobless', 'email', 'none', '', 'yes', 'None', '0', 24, '2024-06-02 05:50:59', 'Keayon', 'Rejected');

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
(16, 'Sheldon', '', 'Bazinga', '6b067236003cc3e2da3df20f929a89e4.jpg', 'Cat', 4, NULL),
(18, 'Young sheldon', '', 'Bazinga', 'torta.jpg', 'Aso', 7, NULL),
(19, 'Young sheldon', '', 'Bazinga', 'torta.jpg', 'Aso', 7, NULL),
(24, 'Keayon', 'Dog', 'Very Energetic', 'resources/baziga.jpg', 'Askal', 6, 'Male');

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
(2, 'scara', 'qsierahallig@gmail.com', '$2y$10$ViaDr/5XQkNOAN2XrGP9Fe9P5PSeceGd07.rLyXaj9fJElCRNo7ju', '+639674035726', 'female', 19, '2003-07-05', 'user', 0),
(10, 'Siera', 'qsiera_hallig@gmail.com', '$2y$10$wfkNvXl9XQRNxRvaNztlEO4Gc8qjyGwS2ClRUBl9/VfVFbGCagIA.', '+639674035726', 'female', 16, '2003-07-05', 'user', 0);

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
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `adoption_applications`
--
ALTER TABLE `adoption_applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pets`
--
ALTER TABLE `pets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
