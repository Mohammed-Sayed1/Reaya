-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2023 at 12:58 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reaya`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appointmentId` int(11) NOT NULL,
  `patientName` varchar(255) DEFAULT NULL,
  `doctorId` int(11) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(255) DEFAULT NULL,
  `patient_adress` varchar(255) NOT NULL,
  `patient_phone` varchar(255) NOT NULL,
  `patient_email` varchar(255) NOT NULL,
  `doctor_name` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appointmentId`, `patientName`, `doctorId`, `department`, `date`, `status`, `patient_adress`, `patient_phone`, `patient_email`, `doctor_name`, `user_id`) VALUES
(48, 'mohamed hany', 156, NULL, '2023-02-27 20:46:36', 'inprocess', '', '01212117200', '', 'f', 151),
(49, '', 156, NULL, '0000-00-00 00:00:00', 'inprocess', '', '', '', 'dddddddddddd', 151),
(50, '', 156, NULL, '0000-00-00 00:00:00', 'inprocess', '', '', '', 'dddddddddddd', 151),
(51, '', 156, NULL, '0000-00-00 00:00:00', 'inprocess', '', '', '', 'dddddddddddd', 151),
(58, '', 156, NULL, '0000-00-00 00:00:00', 'inprocess', '', '', '', 'dddddddddddd', 151),
(59, 'aaaaaaaaaa', 156, NULL, '2023-02-08 21:07:00', 'inprocess', '', '222222222222', '', 'dddddddddddd', 151),
(60, 'aaaaaaaaaa', 156, NULL, '2023-02-08 21:07:00', 'inprocess', '', '222222222222', '', 'dddddddddddd', 151),
(61, 'aaaaaaaaaa', 156, NULL, '2023-02-08 21:07:00', 'inprocess', '', '222222222222', '', 'dddddddddddd', 151),
(62, 'aaaaaaaaaa', 156, NULL, '2023-02-08 21:07:00', 'inprocess', '', '222222222222', '', 'dddddddddddd', 151),
(63, 'aaaaaaaa', 156, NULL, '2023-02-08 23:18:00', 'inprocess', '', '222222', '', 'dddddddddddd', 151);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `client_phone` int(11) DEFAULT NULL,
  `client_name` varchar(255) DEFAULT NULL,
  `client_email` varchar(255) DEFAULT NULL,
  `client_address` varchar(255) DEFAULT NULL,
  `order_status` varchar(255) DEFAULT NULL,
  `product_Id` int(11) DEFAULT NULL,
  `price` int(255) NOT NULL,
  `product_Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `client_phone`, `client_name`, `client_email`, `client_address`, `order_status`, `product_Id`, `price`, `product_Name`) VALUES
(6, 1212117200, 'ibrahim', 'ibrahim@gmail.com', 'mansoura', 'inprocess', 20, 0, ''),
(7, 1212117200, 'ibrahim', 'ibrahim@gmail.com', 'mansoura', 'inprocess', 19, 0, ''),
(8, 2147483647, 'ibrahim', 'ibrahim@gmail.com', 'mansoura', 'inprocess', 19, 0, ''),
(9, 2147483647, 'ibrahim', 'ibrahim@gmail.com', 'mansoura', 'Canseled', 21, 0, ''),
(10, NULL, NULL, NULL, NULL, NULL, NULL, 0, '21'),
(11, NULL, NULL, NULL, NULL, NULL, NULL, 0, '21'),
(12, 2147483647, 'ibrahim', '23333333333333', '2111111111111', NULL, NULL, 120, 'panadol10'),
(13, 2147483647, 'ibrahim', '23333333333333', '2111111111111', 'inprocess', 21, 0, ''),
(14, 147258369, 'ibrahim', 'aaddddddddddddddhmed@gmail.com', 'mitghamr', 'Canseled', 21, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` float DEFAULT NULL,
  `product_image` varchar(100) DEFAULT NULL,
  `product_description` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `product_image`, `product_description`, `user_id`) VALUES
(21, 'panadol10', 120, 'Screenshot 2023-02-26 144628.png', 'Test', 121);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `role` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `specialization` varchar(255) NOT NULL,
  `price` varchar(255) DEFAULT NULL,
  `docDesc` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `address`, `role`, `gender`, `specialization`, `price`, `docDesc`, `image`, `password`) VALUES
(121, 'ibrahimaa', 'ibrahim@gmail.com', '01022614018', 'aswan', 'pharmacie', NULL, '', NULL, NULL, '', ''),
(138, 'sdsffffdsfsdf', 'ibrahim.hamed15512@hotmail.com', '11111111111111111111111111111111111111486731041658', 'zxczxcdfs', '', NULL, '', NULL, NULL, '', ''),
(151, 'ibrahim hamed', 'ibrahim.hamed1123@gmail.com', '01212117200', 'Mansura', 'user', 'male', '', NULL, NULL, '', '147258369'),
(153, 'ibrahim hamed', 'ibrahim.hamed1123@gmail.com', '01212117200', 'Mansura', 'user', 'male', '', NULL, NULL, '', '147258369'),
(154, 'ahmed', 'ibrahim.hamed1123@hotmail.com', '01212117200', 'aswan', 'doctor', 'male', 'eye', '120', 'test', 'IMG_5679-removebg-preview.png', '123456789'),
(155, 'gggggggggg', 'ibrahim.hamed1123@hotmail.com', '01212117200', 'mansoura', 'doctor', 'male', 'bone', '120', 'test', 'IMG_5679-removebg-preview.png', '123456789'),
(156, 'dddddddddddd', 'ibrahim.hamed1123@hotmail.com', '01212117200', 'mansoura', 'doctor', 'male', 'heart', '120', 'test', 'IMG_5679-removebg-preview.png', '123456789'),
(157, 'mohamed mohamed', 'ibrahiaaaam@email.com', '0106851105696', 'Mansoura', 'doctor', 'male', 'eye', '1000', 'test', '', '12345678911111'),
(158, 'mohamed mohamed', 'ibrahiaaaam@email.com', '0106851105696', 'Mansoura', 'doctor', 'male', 'eye', '1000', 'test', '', '12345678911111'),
(159, 'dddddddddd', 'ibrahdddddddddim@email.com', '854655555555555555555', 'ssssssssssss', 'doctor', 'male', 'ssssssss', '56', 'dedddddd', '', 'ssssssssssss1655555555555'),
(160, 'dddddddddd', 'ibrahdddddddddim@email.com', '854655555555555555555', 'ssssssssssss', 'doctor', 'male', 'ssssssss', '56', 'dedddddd', '', 'ssssssssssss1655555555555'),
(161, 'dddddddddd', 'ibrssssahim@email.com', '4444444444444444', 'ssssssssssss', 'doctor', 'male', 'eye2', '10001', 'test', 'Screenshot 2023-02-26 144628.png', '123456ssssssssss'),
(162, 'aaaaaaaaaaaaaaaaaaaaa', 'ibecddrahim@email.com', '01104111851043', 'Tanah', 'doctor', 'male', 'eye2', '1000', 'test', 'Screenshot 2023-02-26 144628.png', '123456aaaaaaaaaa'),
(163, 'mohamedae5trhhr', 'ibrahim444@email.com', '11111111111111111111', 'Mansoura', 'pharmacie', NULL, '', NULL, NULL, '', '111111111111111111'),
(164, 'mohamedae5trhhr', 'ibrahim444@email.com', '11111111111111111111', 'Mansoura', 'pharmacie', NULL, '', NULL, NULL, '', 'aaaaaaaaaaaaaaaaaaaaaaaaaaa'),
(165, 'mohamedae5trhhr', 'ibrahim444@email.com', '11111111111111111111', 'Mansoura', 'pharmacie', NULL, '', NULL, NULL, '', 'aaaaaaaaaaaaaaaaaaaaaaaaaaa'),
(166, 'mohamedae5trhhr', 'ibrahim444@email.com', '11111111111111111111', 'Mansoura', 'pharmacie', NULL, '', NULL, NULL, '', 'aaaaaaaaaaaaaaaaaaaaaaaaaaa'),
(167, 'aaaaaaaaaaaaaaaaaaaaaaaa', 'ibrassssshim@email.com', '0106811111505696', 'Mansoura', 'pharmacie', NULL, '', NULL, NULL, '', '123456dddddddddddd'),
(168, 'aaaaaaaaaaaaaaaaaaaaaaaa', 'ibrahima@email.com', '010685056961111111', 'Mansoura', 'user', 'male', '', NULL, NULL, '', '123456aaaaaaaa'),
(169, 'aaaaaaaaaaaaaaaaaaaaaaaass', 'ibrasshim@email.com', '010685011445696', 'Mansoura', 'user', 'male', '', NULL, NULL, '', '123456aaaaaa'),
(170, 'mohamed sayed', 'ibrssssahim@email.com', '0106851105696', 'Mansoura', 'doctor', 'male', 'eye', '1000', 'test', 'Screenshot 2023-02-26 144628.png', '147258369'),
(171, 'aaaaaaaaaa', 'ibrahim.ssahamed112@hotmail.com', '111111111111111111', 'hshshjsdkh', 'user', 'male', '', NULL, NULL, '', 'aaaaaaaaaaaaaaaaaaaaaaaa'),
(172, 'aaaaaaaaaa', 'ibrahim.ssahamed112@hotmail.com', '111111111111111111', 'hshshjsdkh', 'user', 'male', '', NULL, NULL, '', 'aaaaaaaaaaaaaaaaaaaaaaaa'),
(173, 'aaaaaaaa', 'ibrahim.hameddddds1123@hotmail.com', '555555555555555555555', 'dsgvdsgdgdss', 'user', 'male', '', NULL, NULL, '', '123456789sssss'),
(174, 'aaaaaaaaaaaaaaaaaaa', 'ibrsssssahim.hamed1123@hotmail.com', '66666666666666666', 'dsgvdsgdgd', 'doctor', 'male', 'hearta', '1022', 'hkjshdjksdmbaas', 'ac84b8ac-e0e8-45e8-827f-7c7a3b0c5aca.jpeg', '123456789aaaaaaa'),
(175, 'aaaaaaaaaaaaaaaaaaa', 'ibrsssssahim.hamed1123@hotmail.com', '66666666666666666', 'dsgvdsgdgd', 'doctor', 'male', 'hearta', '1022', 'hkjshdjksdmbaas', 'ac84b8ac-e0e8-45e8-827f-7c7a3b0c5aca.jpeg', '123456789aaaaaaa'),
(176, 'aaaaaaaaaaaaaaaaaaa', 'ibrsssssahim.hamed1123@hotmail.com', '66666666666666666', 'dsgvdsgdgd', 'doctor', 'male', 'hearta', '1022', 'hkjshdjksdmbaas', 'ac84b8ac-e0e8-45e8-827f-7c7a3b0c5aca.jpeg', '123456789aaaaaaa'),
(177, 'aaaaaaaaaaaaaaaaaaa', 'ibrsssssahim.hamed1123@hotmail.com', '66666666666666666', 'dsgvdsgdgd', 'doctor', 'male', 'hearta', '1022', 'hkjshdjksdmbaas', 'ac84b8ac-e0e8-45e8-827f-7c7a3b0c5aca.jpeg', '123456789aaaaaaa'),
(178, 'ggggggggggggggggggg', 'ggggggggggggg@ggggg.com', '1111111111111115555555555555666666', 'fffffffffffffffffffff', 'doctor', 'male', 'ffffffffffffffffffffff', '15', 'ffffffffffffffffffff', 'download.jpeg', 'ggggggg155555555555555555555'),
(179, 'ggggggggggggggggggg', 'ggggggggggggg@ggggg.com', '1111111111111115555555555555666666', 'fffffffffffffffffffff', 'doctor', 'male', 'ffffffffffffffffffffff', '15', 'ffffffffffffffffffff', 'download.jpeg', 'ggggggg155555555555555555555'),
(180, 'mohamed tgardd', 'm@gmail.com', '0112457855559952', 'wertyuiokjhgfdcvb', 'doctor', 'male', 'wertyuilxcvbnm', '123', 'wertyuiop', 'images.jpeg', '456123798852144'),
(181, 'mohamed tgardd', 'm@gmail.com', '0112457855559952', 'wertyuiokjhgfdcvb', 'doctor', 'male', 'wertyuilxcvbnm', '123', 'wertyuiop', 'images.jpeg', '456123798852144'),
(184, 'ibrahim hamed', 'admin@iti.com', '01212117200', 'aswan', 'admin', NULL, '', NULL, NULL, '', '123456789');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appointmentId`),
  ADD UNIQUE KEY `user_id` (`appointmentId`),
  ADD KEY `user_id_2` (`user_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appointmentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
