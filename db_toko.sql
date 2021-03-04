-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 04, 2021 at 05:53 AM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `db_toko`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `date_added`) VALUES
(4, 'Espresso Based', '2021-02-28 15:12:18'),
(5, 'non-coffee', '2021-03-02 20:59:56'),
(6, 'Dessert', '2021-03-04 03:29:07');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `nameItem` varchar(40) NOT NULL,
  `id_category` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `images` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `nameItem`, `id_category`, `deskripsi`, `images`) VALUES
(19, 'eka', 4, 'kampretttt', 'username.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(4) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fullname` varchar(120) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `fullname`, `date_added`) VALUES
(2, 'admin', '$2y$10$VV3FUUgO8E/qseBTay0ZkO0SHiywXNLoHbr.LROC1G5ai9P/QMyCS', 'Andreas', '2021-01-12 00:00:00'),
(3, 'admin123', '$2y$10$puRgBZCuiTGk7y2rvw1sVuH0hqmmRwmNpRrEZH4mfM7Ga4qQsHwsO', 'Udin', '2021-01-12 17:49:00'),
(4, 'botol', '$2y$10$NqirmTh5GPBPBdGBNgKXtO3kSSNd554gNfGKKJNhUjXxs71vKGrWq', 'bocil', '2021-02-25 21:03:40'),
(5, 'botol', '$2y$10$.rHr6bi4/6SLccPXcQaVKut3Zo9oFno8a/B/68pL5832oxmnt72mm', 'bocil', '2021-02-25 21:19:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
