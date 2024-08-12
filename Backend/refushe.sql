-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2024 at 02:44 PM
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
-- Database: `refushe`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` char(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `duration` varchar(50) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `certificate_type` varchar(50) DEFAULT NULL,
  `details_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `description`, `duration`, `image_url`, `certificate_type`, `details_url`) VALUES
('2492e132-c160-4834-8b3d-5ce1158e33b1', 'Management Studies', '', '1 YEAR', 'book.png', 'CERT', 'Home/PublicProgramDetails%3Fid=2492e132-c160-4834-8b3d-5ce1158e33b1.html'),
('29501d28-894b-43bd-98cb-120ad7555b0d', 'Fashion and Design', '', '2 Years', 'book.png', 'CERT', 'Home/PublicProgramDetails%3Fid=29501d28-894b-43bd-98cb-120ad7555b0d.html'),
('aadd394b-a42d-4303-bcbc-200cbd27c716', 'Web Development', '', '6 MONTHS', 'book.png', 'CERT', 'Home/PublicProgramDetails%3Fid=aadd394b-a42d-4303-bcbc-200cbd27c716.html'),
('c219caa2-cea5-4fa9-84d4-0d5bd0094e53', 'Digital Literacy', '', '6 MONTHS', 'book.png', 'CERT', 'Home/PublicProgramDetails%3Fid=c219caa2-cea5-4fa9-84d4-0d5bd0094e53.html'),
('d5305e8a-b072-4969-80c9-681f5c3ce1b4', 'Artisan Collective', '', '2 YEARS', 'book.png', 'CERT', 'Home/PublicProgramDetails%3Fid=d5305e8a-b072-4969-80c9-681f5c3ce1b4.html'),
('fd35dc5f-b5cc-4573-9625-1af331f585d1', 'Entrepreneurship', '', '1 YEAR', 'book.png', 'CERT', 'Home/PublicProgramDetails%3Fid=fd35dc5f-b5cc-4573-9625-1af331f585d1.html');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `other_names` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `id_document_name` enum('Birth Certificate','National Id','Alien Card') NOT NULL,
  `id_document_number` varchar(50) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `reset_token_hash` varchar(64) DEFAULT NULL,
  `reset_token_expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `surname`, `other_names`, `email`, `id_document_name`, `id_document_number`, `password_hash`, `created_at`, `reset_token_hash`, `reset_token_expires_at`) VALUES
(1, 'Odipo', 'Onyango Shadrack', 'shadrackonyango30@gmail.com', 'National Id', '39504975', '$2y$10$nu3yToujnliRyK7g1RihLOl49GD9vgVPVXtqJcRuQMbV/SUEaJRqG', '2024-08-10 19:58:27', '18ad85d5006c5111209a9c53b073a72ebde64a3dbf4b98e0e089d42ce3ffa03a', '2024-08-12 14:47:01'),
(2, 'User', 'User2', 'user@gmail.com', 'Birth Certificate', '2134654', '$2y$10$G7LiMvbh5GloRzHuKK1jq.wzb9H.ANulmTj9V.Z3i46HcMFpDgE4W', '2024-08-10 20:05:52', NULL, NULL),
(3, 'Onyango', 'Shadrack', 'odpsha@gmail.com', 'National Id', '23432', '$2y$10$3RzSOmrNnqSgqCBQwTH.dO.7oPYfPFSMdLlJvpVrh7arjQLPaKr/i', '2024-08-12 09:30:23', '399759210cf30ad57e83d1ffab9bc0944e95648bb18e6489ead84a5b1c94fd0d', '2024-08-12 14:56:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `id_document_number` (`id_document_number`),
  ADD UNIQUE KEY `reset_password_hash` (`reset_token_hash`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
