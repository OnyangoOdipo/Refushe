-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2024 at 10:42 AM
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
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `application_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('Pending','Approved','Rejected') NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `user_id`, `course_id`, `application_date`, `status`) VALUES
(1, 4, 1, '2024-08-13 10:29:01', 'Pending'),
(2, 4, 2, '2024-08-13 10:44:37', 'Pending'),
(3, 82, 3, '2024-08-13 08:00:00', 'Approved'),
(4, 83, 4, '2024-08-13 08:15:00', ''),
(5, 84, 5, '2024-08-13 08:30:00', 'Pending'),
(6, 85, 6, '2024-08-13 08:45:00', 'Approved'),
(7, 86, 7, '2024-08-13 09:00:00', 'Pending'),
(8, 87, 8, '2024-08-13 09:15:00', ''),
(9, 88, 9, '2024-08-13 09:30:00', 'Pending'),
(10, 89, 10, '2024-08-13 09:45:00', 'Approved'),
(11, 81, 1, '2024-08-13 07:29:01', 'Pending'),
(12, 81, 2, '2024-08-13 07:44:37', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `duration` varchar(100) DEFAULT NULL,
  `certificate_type` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `description`, `duration`, `certificate_type`) VALUES
(1, 'Introduction to Programming', 'Learn the basics of programming using Python. This course is designed for beginners with no prior programming experience.', '6 weeks', 'Certificate of Completion'),
(2, 'Web Development Bootcamp', 'A comprehensive course on web development covering HTML, CSS, JavaScript, and backend technologies like PHP and MySQL.', '12 weeks', 'Certificate of Achievement'),
(3, 'Data Science with Python', 'Explore the world of data science with Python. This course covers data manipulation, visualization, and machine learning.', '8 weeks', 'Certificate of Completion'),
(4, 'Digital Marketing', 'Learn the fundamentals of digital marketing, including SEO, social media marketing, and content marketing.', '4 weeks', 'Certificate of Completion'),
(5, 'Graphic Design Masterclass', 'Master the art of graphic design with Adobe Photoshop and Illustrator. Create stunning visuals for web and print.', '10 weeks', 'Professional Certificate'),
(6, 'Project Management', 'Understand the key principles of project management, including planning, execution, and closing projects successfully.', '6 weeks', 'Certificate of Completion'),
(7, 'Cybersecurity Fundamentals', 'Learn the basics of cybersecurity, including network security, cryptography, and risk management.', '8 weeks', 'Certificate of Achievement'),
(8, 'Mobile App Development', 'A course on developing mobile applications using Android Studio and Java. Suitable for beginners and intermediate learners.', '10 weeks', 'Certificate of Completion'),
(9, 'Artificial Intelligence Basics', 'Get introduced to the fundamentals of AI, including machine learning, neural networks, and deep learning.', '7 weeks', 'Certificate of Achievement'),
(10, 'Financial Analysis', 'Develop your financial analysis skills by learning how to analyze financial statements and make informed decisions.', '5 weeks', 'Certificate of Completion');

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
(3, 'Onyango', 'Shadrack', 'odpsha@gmail.com', 'National Id', '23432', '$2y$10$Rvg/aYGzvRWA2yosBKockuXeezRGlTMmkNPLrJVQDEdVl3tVNUsgG', '2024-08-12 09:30:23', NULL, NULL),
(4, 'Ludwaro', 'Jasmine', 'jludwaro@gmail.com', 'National Id', '345678', '$2y$10$b2QgNSbBsoGeWsMfnVduR.gQY/AOysX2Jzp/wUQ.2rrzk8XYK6j4K', '2024-08-12 16:22:14', 'b3efa6a260b2016740b69e7f08d00674c4de29626ae69b01d9a6f72624dbee62', '2024-08-12 18:59:48'),
(81, 'Smith', 'John', 'john.smith@example.com', 'National Id', '12345679', '$2y$10$Ue5C1N27T7y6tTPF5OtrcuHk3ptmEzB/qDhG9JrcFVR9D.nYhcm0m', '2024-08-13 06:00:00', NULL, NULL),
(82, 'Johnson', 'Emily', 'emily.johnson@example.com', 'Alien Card', '23456780', '$2y$10$G9R5vLZBv0lUe5BdR/9D8.VDbjB8RiHzyMe6o3MTv5RdNTG1ph0bm', '2024-08-13 06:15:00', NULL, NULL),
(83, 'Williams', 'James', 'james.williams@example.com', 'National Id', '34567891', '$2y$10$C4JtPcYdy56RWJLsl0OEiu6E5.8DQ12.lcGzCiCDZ/jp2LgqFJtGS', '2024-08-13 06:30:00', NULL, NULL),
(84, 'Jones', 'Olivia', 'olivia.jones@example.com', 'Birth Certificate', '45678902', '$2y$10$Ex/Dd8qfG5TxCQyKgSznKeebwwlgmJwE/F2hL96dsmS9FQXQ3E/lG', '2024-08-13 06:45:00', NULL, NULL),
(85, 'Brown', 'Liam', 'liam.brown@example.com', 'National Id', '56789013', '$2y$10$Arbr3I1F4mLDTMIvHShMLeI4vYmzUMgZ/cp8sJl7ICxR2vjU5gHkG', '2024-08-13 07:00:00', NULL, NULL),
(86, 'Davis', 'Sophia', 'sophia.davis@example.com', 'Alien Card', '67890124', '$2y$10$E8L7pW71paDx4S8Y5tDb4eSNRZ7HRnpW2Ht0l/J3.5biEZMNiMIp.', '2024-08-13 07:15:00', NULL, NULL),
(87, 'Miller', 'Jackson', 'jackson.miller@example.com', 'National Id', '78901235', '$2y$10$F/Mq5RhxgB4yAQO4Y4LcrIoZeY8S5j8EG1tVvQg6OWJfo57O8t5re', '2024-08-13 07:30:00', NULL, NULL),
(88, 'Wilson', 'Ava', 'ava.wilson@example.com', 'Birth Certificate', '89012346', '$2y$10$LC/1Wn5v7g7cmDFIxz9VOIGi/LNZiyRQ8MPV7/BK2JcBkVuZ8pOCG', '2024-08-13 07:45:00', NULL, NULL),
(89, 'Moore', 'Lucas', 'lucas.moore@example.com', 'National Id', '90123457', '$2y$10$L9U/qfOv6b6K.TEzHfXzUevvF5M.I4FLX3pW1/fXJKiFZrJ6LkTOe', '2024-08-13 08:00:00', NULL, NULL),
(90, 'Taylor', 'Mia', 'mia.taylor@example.com', 'Alien Card', '01234568', '$2y$10$YdCOT3SwPcf9gn0kIXS0OeowFs2ndmFxHs5PSyQOZ6.EFEVhDR.pW', '2024-08-13 08:15:00', NULL, NULL),
(91, 'Anderson', 'Ethan', 'ethan.anderson@example.com', 'National Id', '12345680', '$2y$10$FSFZ5jCdYo09TQLF0h8i.eNhl7JAdy/wXT9nKpKvXIwG7X/LAD3Lq', '2024-08-13 08:30:00', NULL, NULL),
(92, 'Thomas', 'Charlotte', 'charlotte.thomas@example.com', 'Birth Certificate', '23456791', '$2y$10$3gA7bnKszJjZPlRs/oiQpOaQ2CB4uZgFQ4fZ8vnSVqAEMJo1qYHLO', '2024-08-13 08:45:00', NULL, NULL),
(93, 'Jackson', 'Daniel', 'daniel.jackson@example.com', 'National Id', '34567892', '$2y$10$4L/YPsbIbNhpz/szE/.IKDOw1Xz5tFjCrMs9RQkOHP5MnbD8s1v.G', '2024-08-13 09:00:00', NULL, NULL),
(94, 'White', 'Amelia', 'amelia.white@example.com', 'Alien Card', '45678903', '$2y$10$Rf7lZmMnhCB9C7T5deUe.d8fL6M9/MF83g.SU8tHeeslSHpW3oBf.', '2024-08-13 09:15:00', NULL, NULL),
(95, 'Harris', 'Matthew', 'matthew.harris@example.com', 'National Id', '56789014', '$2y$10$ZjXk5pTfM/hjxOZZv38ho3tWw07yF9d3azFZ9sU0zqO4TQu37TEY6', '2024-08-13 09:30:00', NULL, NULL),
(96, 'Martin', 'Isabella', 'isabella.martin@example.com', 'Birth Certificate', '67890125', '$2y$10$MzgNw6c7kbbYg2ox05YZdOej5d5TYO5AOp7ZwhjB3eMc8i1jtVOBe', '2024-08-13 09:45:00', NULL, NULL),
(97, 'Thompson', 'Henry', 'henry.thompson@example.com', 'National Id', '78901236', '$2y$10$3rTCUkFbkhj.tgLmOu5htH8U.m7bJDOWD/Cslfu35.TP6DiKe3n0O', '2024-08-13 10:00:00', NULL, NULL),
(98, 'Garcia', 'Ella', 'ella.garcia@example.com', 'Alien Card', '89012347', '$2y$10$4VfKPOc8.Da7D5T2gYsbkOZ/Wtx3.qCsCVPr5uIUsBMQJIBkmDG8C', '2024-08-13 10:15:00', NULL, NULL),
(99, 'Martinez', 'Owen', 'owen.martinez@example.com', 'National Id', '90123458', '$2y$10$KsIKt4tOBHoHpEGeWV1UuOCz6oFybDtUuAHDsbBRGnPQgTrr7EJ2O', '2024-08-13 10:30:00', NULL, NULL),
(100, 'Robinson', 'Grace', 'grace.robinson@example.com', 'Birth Certificate', '01234569', '$2y$10$Hokp1h7O29yXIlzzWspbG.plj4NU2/B9/BKHsFSV/gzYzFyyOBwJG', '2024-08-13 10:45:00', NULL, NULL),
(101, 'Clark', 'Benjamin', 'benjamin.clark@example.com', 'National Id', '12345681', '$2y$10$K9A1A1g7FZk6zP8JuoKQQF3dANg0d.B2jvDsF9QWfy9o3TbJtO.Rq', '2024-08-13 11:00:00', NULL, NULL),
(102, 'Lewis', 'Evelyn', 'evelyn.lewis@example.com', 'Alien Card', '23456792', '$2y$10$U4JvNhCME6OAKCWEH.v6DOW/T4EJeC1vFiGmd2Fr5Vrckp9Nm2EHu', '2024-08-13 11:15:00', NULL, NULL),
(103, 'Walker', 'Jacob', 'jacob.walker@example.com', 'National Id', '34567893', '$2y$10$YvA6Mo2D4.C1.4G1DvhpYO0BsPGNfFfGuEr4GhMubmJpHDCZyyl5e', '2024-08-13 11:30:00', NULL, NULL),
(104, 'Hall', 'Lily', 'lily.hall@example.com', 'Birth Certificate', '45678904', '$2y$10$9Ll6RJ6woOprNLZLn4tm4eMZZEXm6Rrt5xJsf/cGHDpRLn7EOovD.', '2024-08-13 11:45:00', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `course_id` (`course_id`);

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
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `applications_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `applications_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
