-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 01, 2023 at 06:28 AM
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
-- Database: `noIdea`
--

CREATE DATABASE IF NOT EXISTS noIdea;
USE noIdea;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(255) NOT NULL,
  `course_title` varchar(255) NOT NULL,
  `course_description` text NOT NULL,
  `course_start_date` date NOT NULL,
  `course_end_date` date NOT NULL,
  `provider_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_title`, `course_description`, `course_start_date`, `course_end_date`, `provider_id`) VALUES
(1, 'Introduction to Data Science', 'This course provides an introduction to the fundamentals of data science using the Python programming language. Participants will learn essential concepts such as data manipulation, visualization, and statistical analysis. Practical exercises and real-world case studies will be incorporated into the curriculum.', '2023-07-15', '2023-07-30', 1),
(2, 'Machine Learning Fundamentals', 'This course covers the foundational concepts of machine learning, including supervised and unsupervised learning algorithms, model evaluation, and feature engineering. Participants will gain hands-on experience by implementing machine learning models on real-world datasets.', '2023-07-22', '2023-08-06', 1),
(3, 'Applied Natural Language Processing', 'This course focuses on the practical applications of natural language processing (NLP). Participants will learn techniques for text preprocessing, sentiment analysis, named entity recognition, and text classification. The curriculum includes hands-on exercises and projects to develop NLP models for real-world scenarios.', '2023-07-12', '2023-07-28', 2),
(5, 'Introduction to Computer Science', 'This course provides a comprehensive introduction to computer science and programming. Participants will learn fundamental programming concepts and techniques using a high-level programming language. The curriculum covers topics such as variables, control structures, functions, and algorithms. Participants will also work on hands-on programming assignments and projects.', '2023-07-15', '2023-08-25', 4),
(6, 'Learn Python from Scratch', 'This course is designed for beginners who want to learn Python programming. Participants will learn the basics of Python syntax, data types, control structures, and functions. Through interactive coding exercises and projects, they will gain hands-on experience in Python programming.', '2023-07-06', '2023-07-28', 6),
(7, 'Introduction to Data Science with Python', 'This course introduces participants to the field of data science using the Python programming language. They will learn data manipulation, visualization, and analysis techniques using popular libraries such as Pandas, Matplotlib, and NumPy. Practical exercises and real-world datasets will be incorporated into the curriculum.', '2023-07-29', '2023-08-19', 6);

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE `instructor` (
  `instructor_id` int(255) NOT NULL,
  `instructor_name` varchar(255) NOT NULL,
  `provider_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `instructor`
--

INSERT INTO `instructor` (`instructor_id`, `instructor_name`, `provider_id`, `user_id`) VALUES
(1, 'John Smith', 1, 10),
(2, 'Emily Johnson', 1, 11),
(3, 'Michael Brown', 1, 12),
(4, 'Laura Davis', 1, 13),
(5, 'Jennifer Lee', 2, 14),
(6, 'Kevin Anderson', 2, 15),
(7, 'Sarah Thompson', 4, 16),
(8, 'Adam Davis', 4, 17),
(9, 'Matthew Anderson', 6, 19),
(10, 'Emma Thompson', 6, 20);

--
-- Triggers `instructor`
--
DELIMITER $$
CREATE TRIGGER `delete_instructor_trigger` AFTER DELETE ON `instructor` FOR EACH ROW DELETE from user WHERE user_id = old.user_id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `instructor_course`
--

CREATE TABLE `instructor_course` (
  `instructor_id` int(255) NOT NULL,
  `course_id` int(255) NOT NULL,
  `availability` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `instructor_course`
--

INSERT INTO `instructor_course` (`instructor_id`, `course_id`, `availability`) VALUES
(2, 1, 0),
(3, 2, 0),
(4, 2, 0),
(5, 3, 1),
(7, 5, 1),
(8, 5, 1),
(9, 6, 0),
(10, 7, 0);

-- --------------------------------------------------------

--
-- Table structure for table `provider`
--

CREATE TABLE `provider` (
  `provider_id` int(255) NOT NULL,
  `provider_name` varchar(255) NOT NULL,
  `user_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `provider`
--

INSERT INTO `provider` (`provider_id`, `provider_name`, `user_id`) VALUES
(1, 'Google', 4),
(2, 'OpenAI', 5),
(3, 'Amazon', 6),
(4, 'Harvard University', 7),
(5, 'Microsoft', 8),
(6, 'Codecademy', 9);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(255) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `student_age` int(255) NOT NULL,
  `user_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `student_name`, `student_age`, `user_id`) VALUES
(1, 'Mads Ng', 18, 18);

-- --------------------------------------------------------

--
-- Table structure for table `student_course`
--

CREATE TABLE `student_course` (
  `student_id` int(255) NOT NULL,
  `course_id` int(255) NOT NULL,
  `progress` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_course`
--

INSERT INTO `student_course` (`student_id`, `course_id`, `progress`) VALUES
(1, 1, 100.00),
(1, 7, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_email`, `user_password`, `user_role`) VALUES
(3, 'admin@noidea.tech.com', '$2y$10$dt/RBkWpz.ipwgaaamauaOjyEv6gxBgu.a8/5rGL9SUep2QH0/Wu2', 'admin'),
(4, 'google@gmail.com', '$2y$10$L/SQMo45yXZcyJesi0cy/Or/CoIm7s03PFPowxUmb4SZfeJE0eBCy', 'provider'),
(5, 'openai@openai.com', '$2y$10$vDiXDaOv8rcEgR/EBy0v4.mrHTJKyX57NOvpjl3Le3y5rF2qaVa46', 'provider'),
(6, 'amazon@amazon.com', '$2y$10$ekjxe//jYu.CEYf4/qIq4OPErlBJRPDMRQZ8MF2tGPCbeBmzRw1mO', 'provider'),
(7, 'harvard@harvard.com', '$2y$10$7m5YkBGay3TqaGKlR4S/0eR/0TusLjfcu/6LQuN8MWnstmzKcWeuC', 'provider'),
(8, 'microsoft@microsoft.com', '$2y$10$Iu3hUhPW3lcXr9xg8l.GgevkUO8jvmIwS5gmnlweNQi8vQd6FMVAi', 'provider'),
(9, 'codecademy@codecademy.com', '$2y$10$Hwp5E8VoVYdo1dSlUYrGKu35./xhsjf5gTVbgL3C7tMwRqhNr3K.6', 'provider'),
(10, 'johnsmith@google.com', '$2y$10$o/VySGGAB2FqWxiEJ6TKiOkabABlkZFXIROg8MoHw1iKFxhpDVOdW', 'instructor'),
(11, 'emilyjohnson@google.com', '$2y$10$rGmSLaxpDnl.w0OPOh7kUegMIT1fXSUOU3VxH3hOKzf2lmXF7KVri', 'instructor'),
(12, 'michaelbrown@google.com', '$2y$10$l1qAo68Lij6LKIrE1kUwQOUpUimunWreb7XvkBj26aKg./VbIThC.', 'instructor'),
(13, 'lauradavis@google.com', '$2y$10$yXd0nOTvJt/EwY6iFRFvw.iv4V135eTmUqBJNWDmPcfmdcoBPxdBK', 'instructor'),
(14, 'jenniferlee@openai.com', '$2y$10$RqEZc7EUqQZp.Xk9m2/l2uzho8xpT7yJsvDD30MA.trlGQiY07XnC', 'instructor'),
(15, 'kevinanderson@openai.com', '$2y$10$J.eX0zr/P5udgOp5ZQ0lwublkV/Z3f2oMLWaaySm5fyY40.a0b6xu', 'instructor'),
(16, 'sarahthompson@harvard.edu', '$2y$10$7Q9.dkmkuChx4fVrwuAvMe/SOjwA9IomLi4zUaacukSx09LAYund2', 'instructor'),
(17, 'adamdavis@harvard.edu', '$2y$10$R7jCp20hfBTR75ORtSwKy.Pj2QaiW5kz8V/JR1EhDBgbIORM5IoSC', 'instructor'),
(18, 'mads@gmail.com', '$2y$10$PPe0TitBmkbL5j/qJezC7OOqi1fT2WOnrfnbcqe4lkjtQnRBTjEUa', 'student'),
(19, 'matthew.anderson@example.com', '$2y$10$ErPZk7GLrnenu57uQxsZju//u2Fu9HDv47DicL/RLmbhxV6S/mBG.', 'instructor'),
(20, 'emma.thompson@example.com', '$2y$10$cjARAm/m6If2j6hyfYQSAurhvWLMCFKDvUR4hh6lK7S9XFxKyKIzu', 'instructor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`),
  ADD KEY `course_ibfk_1` (`provider_id`);

--
-- Indexes for table `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`instructor_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `instructor_course`
--
ALTER TABLE `instructor_course`
  ADD PRIMARY KEY (`instructor_id`,`course_id`),
  ADD KEY `instructor_course_ibfk_2` (`course_id`);

--
-- Indexes for table `provider`
--
ALTER TABLE `provider`
  ADD PRIMARY KEY (`provider_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `student_course`
--
ALTER TABLE `student_course`
  ADD PRIMARY KEY (`student_id`,`course_id`),
  ADD KEY `student_course_ibfk_2` (`course_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `instructor`
--
ALTER TABLE `instructor`
  MODIFY `instructor_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `provider`
--
ALTER TABLE `provider`
  MODIFY `provider_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`provider_id`) REFERENCES `provider` (`provider_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `instructor`
--
ALTER TABLE `instructor`
  ADD CONSTRAINT `instructor_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `instructor_course`
--
ALTER TABLE `instructor_course`
  ADD CONSTRAINT `instructor_course_ibfk_1` FOREIGN KEY (`instructor_id`) REFERENCES `instructor` (`instructor_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `instructor_course_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `provider`
--
ALTER TABLE `provider`
  ADD CONSTRAINT `provider_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_course`
--
ALTER TABLE `student_course`
  ADD CONSTRAINT `student_course_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_course_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
