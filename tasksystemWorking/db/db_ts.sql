-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2026 at 01:49 PM
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
-- Database: `db_ts`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_task`
--

CREATE TABLE `tbl_task` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL,
  `color` text NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_task`
--

INSERT INTO `tbl_task` (`id`, `user_id`, `title`, `description`, `status`, `color`, `created_at`) VALUES
(7, 3, 'asdd', 'asdasd', 0, '#ffd700', '2026-04-27'),
(9, 4, 'asd', 'asd', 0, '#ffd700', '2026-04-27'),
(10, 4, 'dd', 'dd', 0, '#ffd700', '2026-04-27'),
(11, 4, 'ddd', 'dd', 0, '#ffd700', '2026-04-27'),
(12, 4, 'dd', 'dd', 1, '#ffd700', '2026-04-27'),
(13, 4, 'aaaa', 'a', 0, '#c0523f', '2026-04-27'),
(14, 4, 'dd', 'dd', 0, '#ffd700', '2026-04-27'),
(15, 4, 'dd', 'dd', 0, '#ffd700', '2026-04-27'),
(16, 4, 'dd', 'dd', 1, '#ffd700', '2026-04-27');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `active` int(11) NOT NULL,
  `role` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `name`, `username`, `password`, `email`, `active`, `role`, `created_at`) VALUES
(3, 'john', 'admin', '$2y$10$l7iRO8jyoMVq7q6LlJbtKe7bydwz2PZiQAztIjCYWEEhEFXtvyjv2', 'asd@gmail.com', 1, 'admin', '2026-04-22 20:01:27'),
(4, 'karl', 'user', '$2y$10$CbOzmoFZ0wVUUuIJWCC.x.fhDtJjEO1D9NQpZjQ1RslRxAqPZr9mC', 'user@gmail.com', 1, 'user', '2026-04-22 19:35:46'),
(5, 'kevin', 'kevin', '$2y$10$miPlr2UFChCP5O/0Ov.hPOsfUD1xYKSS6zmQ9E.zVBQJbg3wEjo7a', '', 0, 'admin', '2026-04-23 14:44:55'),
(6, 'asd', 'asd', '$2y$10$hfvpUc155JAEtCBvIWoR7.YUu9T.GA5zFgld87qPx6vExP4eE8vsq', 'asd@gmail.com', 1, 'user', '2026-04-28 19:18:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_task`
--
ALTER TABLE `tbl_task`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_task`
--
ALTER TABLE `tbl_task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
