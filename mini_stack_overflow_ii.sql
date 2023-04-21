-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2023 at 12:24 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mini_stack_overflow_ii`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `ID` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `details` longtext NOT NULL,
  `carrect` enum('yes','no') NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`ID`, `question_id`, `user_id`, `details`, `carrect`) VALUES
(2, 36, 1, '<p>This is the other answer from RuhulRonny</p>', 'no'),
(8, 40, 8, '<p>This is the fast answer details from biloxy.&nbsp;</p>\r\n<p>This is the fast answer details from biloxy.</p>\r\n<p>This is the fast answer details from biloxy.</p>', 'no'),
(9, 40, 5, '<p>asdf</p>', 'no'),
(11, 2, 2, '<p>Lorem ipsum doller&nbsp;</p>\r\n<p>Lorem ipsum doller&nbsp;</p>\r\n<p>Lorem ipsum doller&nbsp;</p>\r\n<p>Lorem ipsum doller&nbsp;</p>\r\n<p>Lorem ipsum doller&nbsp;</p>', 'no'),
(12, 36, 2, '<p>This is the other answer from Onu</p>', 'no'),
(13, 38, 2, '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>', 'no'),
(14, 40, 9, '<p>This is the fast answer from newUser.</p>', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `ID` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `website` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `ID` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `details` longtext NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`ID`, `title`, `details`, `user_id`, `created_at`) VALUES
(2, 'This is fast question for RuhulRonny.', 'This is fast question details for RuhulRonny.', 1, '2023-03-04 19:59:16'),
(36, 'Et rerum culpa conse', 'Provident rerum mag', 2, '2023-03-06 10:50:49'),
(37, 'This is qilafa fast question.', 'This is qilafa fast question details.', 5, '2023-03-05 10:46:52'),
(38, 'This is the fast question from lodazy', '<p>\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?\"</p>', 6, '2023-03-06 10:45:30'),
(39, 'Dolore earum qui ist', '<p>Dolore earum qui istDolore earum qui istDolore earum qui istDolore earum qui istDolore earum qui istDolore earum qui ist</p>', 4, '2023-03-06 20:56:12'),
(40, 'This is the fast question update from biloxy.', '<p>This is the fast question update from biloxy. This is the fast question update from biloxy. This is the fast question update from biloxy.</p>', 8, '2023-03-08 02:12:37'),
(41, 'This is the fast question from qilafa', '<p>This is the fast question details from qilafa.&nbsp;</p>\r\n<p>This is the fast question details from qilafa.&nbsp;</p>\r\n<p>This is the fast question details from qilafa.&nbsp;</p>\r\n<p>This is the fast question details from qilafa.&nbsp;</p>', 5, '2023-03-08 04:08:09'),
(43, 'Cillum esse volupta', '<p>Cillum esse voluptaCillum esse voluptaCillum esse volupta</p>\r\n<p>Cillum esse voluptaCillum esse voluptaCillum esse volupta</p>\r\n<p>Cillum esse voluptaCillum esse voluptaCillum esse volupta</p>\r\n<p>Cillum esse voluptaCillum esse voluptaCillum esse volupta</p>\r\n<p>Cillum esse voluptaCillum esse voluptaCillum esse volupta</p>', 10, '2023-04-21 12:20:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `username`, `email`, `password`) VALUES
(1, 'RuhulRonny', 'RuhulRonny@gmail.com', '06eac4d209dab4702e2b348266222955'),
(2, 'onu', 'onu@gmail.com', '2d495b068a3563f4c3af3cbe7a21adf3'),
(3, 'Ratul', 'Ratul@gmail.com', 'dd3c1ef98242989a3983ea1449e6b048'),
(4, 'tajamymojo', 'pewynujuvo@mailinator.com', 'f3668935125414703a0e7cb3c4de15c6'),
(5, 'qilafa', 'dotaw@mailinator.com', '104a599fabe46e4cc0495cf01817ae01'),
(6, 'lodazy', 'gapepix@mailinator.com', '45db7353ea47f0fc77ef93365a9f39fe'),
(7, 'puxuho', 'ryqe@mailinator.com', '9da63b07535764fa725d3139d6e67100'),
(8, 'biloxy', 'konafugemi@mailinator.com', '8fd5e070e3c78cb49d86d41f26b75d28'),
(9, 'newUser', 'newUser@gmail.com', '6eea8b95428877fd69f77b7d03291233'),
(10, 'ximeqo', 'tuhoduhe@mailinator.com', '966ceee45a9ed41996d82cfee4182eb4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `answers_ibfk_1` (`question_id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `questions` (`ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `answers_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`ID`);

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`ID`);

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
