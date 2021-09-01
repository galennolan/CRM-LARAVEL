-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2021 at 03:31 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crm`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) UNSIGNED NOT NULL,
  `Contact_Title` varchar(30) DEFAULT NULL,
  `Contact_First` varchar(5) NOT NULL,
  `produk` varchar(30) DEFAULT NULL,
  `Contact_Last` varchar(8) NOT NULL,
  `Lead_Referral_Source` varchar(23) NOT NULL,
  `Date_of_Initial_Contact` date NOT NULL,
  `Title` varchar(20) NOT NULL,
  `Company` varchar(16) NOT NULL,
  `Address` varchar(38) NOT NULL,
  `Address_Street_1` varchar(17) NOT NULL,
  `Phone` varchar(14) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Status` int(11) UNSIGNED DEFAULT 1,
  `Rating` decimal(4,2) NOT NULL,
  `Deliverables` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `Contact_Title`, `Contact_First`, `produk`, `Contact_Last`, `Lead_Referral_Source`, `Date_of_Initial_Contact`, `Title`, `Company`, `Address`, `Address_Street_1`, `Phone`, `Email`, `Status`, `Rating`, `Deliverables`) VALUES
(1, NULL, 'jokie', NULL, 'Kahnzz', 'www.google .com', '2014-05-09', 'PR Director', 'Barnes and Wells', '52 Broadway New York, NY 12345', '52 Broadway', '(234) 432-2234', 'amir@pr.com', 2, '4.00', NULL),
(2, NULL, 'Dave', NULL, 'Myers', 'Mack Truck Partner Site', '2014-02-11', 'DEF Sales', 'DEF Fluids', '456 Diesel St Philadelphia, PA 19308', '456 Diesel St', '(765) 765-7755', 'dave@def.com', 2, '2.50', NULL),
(3, NULL, 'Jason', NULL, 'Wright', 'salesforce associate', '2014-09-12', 'Marketing Director', 'Ben and Jerry\'s', '123 Ice Cream Way Burlington, VT 12345', '123 Ice Cream Way', '(123) 432-1223', 'eat@benandjerrys.com', 1, '4.00', NULL),
(4, NULL, 'Linda', NULL, 'DeCastro', 'Conference', '2014-01-19', 'Regional Sales Mgr', 'Pillsbury', '44 Reading Rd Flourtown, NJ 39485', '44 Reading Rd', '(555) 555-5555', 'linda@pillsbury.com', 3, '3.00', '6 Proofs, multiple assets'),
(5, NULL, 'Sally', NULL, 'Jane', 'CES Conference', '2014-07-01', 'COO', 'Facetech', '123 Tech Blvd Menlo Park, CA 12345', '123 Tech Blvd', '(321) 321-1122', 'sally@facetech.com', 1, '5.00', NULL),
(6, NULL, 'Tim', NULL, 'Smith', 'www.google.com', '2014-10-10', 'Supply Chain Manager', 'Levis', '1 Blue Jean St. Corduroy, CO 12345', '1 Blue Jean St.', '(321) 321-4321', 'tim@levis.com', 2, '3.50', '10k shelf talkers, 1500 kiosks'),
(19, NULL, 'Galih', NULL, '', '', '0000-00-00', '', '', '', '', '628562839372', 'arrialfitri@gmail.co', 4, '0.00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact_status`
--

CREATE TABLE `contact_status` (
  `id` int(11) UNSIGNED NOT NULL,
  `status` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact_status`
--

INSERT INTO `contact_status` (`id`, `status`) VALUES
(1, 'Cold'),
(2, 'Warm'),
(3, 'Hot'),
(4, 'Loyal');

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `idu` int(11) UNSIGNED NOT NULL,
  `Date` date DEFAULT NULL,
  `Notes` tinytext DEFAULT NULL,
  `Is_New_Todo` int(11) UNSIGNED NOT NULL,
  `Todo_Type_ID` int(11) UNSIGNED NOT NULL,
  `Todo_Desc_ID` int(11) UNSIGNED NOT NULL,
  `Todo_Due_Date` varchar(29) DEFAULT NULL,
  `Contact` int(11) UNSIGNED NOT NULL,
  `Task_Status` enum('Completed','Pending') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `Task_Update` varchar(51) DEFAULT NULL,
  `Sales_Rep` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`idu`, `Date`, `Notes`, `Is_New_Todo`, `Todo_Type_ID`, `Todo_Desc_ID`, `Todo_Due_Date`, `Contact`, `Task_Status`, `Task_Update`, `Sales_Rep`) VALUES
(3, '2021-05-25', 'janeta', 1, 1, 1, '07/31/2014', 3, 'Completed', '', 1),
(4, '2014-06-01', 'Want to be sure to communicate weekly.', 1, 2, 3, '07/04/2014 10:00am to 10:30am', 4, 'Completed', 'Ongoing', 1),
(5, '2014-01-31', 'ini berhasil', 1, 1, 1, '04/09/2014 3:45pm to 4:45pm', 5, 'Completed', 'Great demo. All they needed to seal the deal.<br>', 1),
(6, '2014-11-11', 'Great to have this customer on board!', 0, 1, 7, NULL, 6, 'Completed', NULL, 1),
(7, '2017-01-27', 'test', 0, 1, 2, '', 3, 'Completed', '', 1),
(9, '2017-01-11', 'ini test tapi berhasil', 0, 1, 1, NULL, 6, 'Completed', NULL, 5),
(11, '2021-05-24', 'ini baru nih tugasnya', 0, 1, 1, NULL, 19, 'Pending', NULL, 1),
(12, '2021-05-24', 'ini tugas baru untuk marketer', 0, 2, 2, NULL, 1, 'Completed', NULL, 5),
(13, '2021-05-29', 'pesan promosi dengan whatsapp', 0, 2, 7, '2021-05-29', 3, 'Completed', NULL, 2),
(14, NULL, 'hubungin customer untuk promosi tiang infus', 0, 1, 2, '2021-05-29', 3, 'Completed', NULL, 3);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) UNSIGNED NOT NULL,
  `role` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`) VALUES
(1, 'Sales Rep'),
(2, 'Sales Manager'),
(3, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `todo_desc`
--

CREATE TABLE `todo_desc` (
  `id` int(11) UNSIGNED NOT NULL,
  `description` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `todo_desc`
--

INSERT INTO `todo_desc` (`id`, `description`) VALUES
(1, 'Follow Up Email'),
(2, 'Phone Call'),
(3, 'Lunch Meeting'),
(4, 'Tech Demo'),
(5, 'Meetup'),
(6, 'Conference'),
(7, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `todo_type`
--

CREATE TABLE `todo_type` (
  `id` int(11) UNSIGNED NOT NULL,
  `type` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `todo_type`
--

INSERT INTO `todo_type` (`id`, `type`) VALUES
(1, 'task'),
(2, 'meeting');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `Name_Title` varchar(30) DEFAULT NULL,
  `Name_First` varchar(6) NOT NULL,
  `Name_Middle` varchar(30) DEFAULT NULL,
  `Name_Last` varchar(8) NOT NULL,
  `Email` varchar(16) NOT NULL,
  `Password` varchar(9) NOT NULL,
  `User_Roles` int(11) UNSIGNED NOT NULL,
  `User_Status` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `Name_Title`, `Name_First`, `Name_Middle`, `Name_Last`, `Email`, `Password`, `User_Roles`, `User_Status`) VALUES
(1, NULL, 'Johnny', NULL, 'Rep', 'rep@test.com', '123456', 1, 1),
(2, NULL, 'Mary', NULL, 'Rep', 'rep2@test.com', '123456', 1, 1),
(3, NULL, 'Suzy', NULL, 'Manager', 'manager@test.com', '123456', 2, 1),
(4, NULL, 'Sales', NULL, 'Manager1', 'sm@sm.com', '123456', 2, 1),
(5, NULL, 'Rich', NULL, 'C', 'test@test.com', '123456', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_status`
--

CREATE TABLE `user_status` (
  `id` int(11) UNSIGNED NOT NULL,
  `status` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_status`
--

INSERT INTO `user_status` (`id`, `status`) VALUES
(1, 'active'),
(2, 'inactive'),
(3, 'pending approval');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_status`
--
ALTER TABLE `contact_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`idu`),
  ADD KEY `FK_EVENT_NAME` (`Todo_Type_ID`),
  ADD KEY `FK_EVENT_TYPE` (`Todo_Desc_ID`),
  ADD KEY `FK_CONTACT_ID` (`Contact`),
  ADD KEY `Sales_Rep` (`Sales_Rep`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `todo_desc`
--
ALTER TABLE `todo_desc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `todo_type`
--
ALTER TABLE `todo_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_USER_STATUS` (`User_Status`),
  ADD KEY `FK_ROLE` (`User_Roles`);

--
-- Indexes for table `user_status`
--
ALTER TABLE `user_status`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `contact_status`
--
ALTER TABLE `contact_status`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `idu` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `todo_desc`
--
ALTER TABLE `todo_desc`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `todo_type`
--
ALTER TABLE `todo_type`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_status`
--
ALTER TABLE `user_status`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `FK_STATUS` FOREIGN KEY (`Status`) REFERENCES `contact_status` (`id`);

--
-- Constraints for table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `FK_EVENT_NAME` FOREIGN KEY (`Todo_Type_ID`) REFERENCES `todo_type` (`id`),
  ADD CONSTRAINT `FK_EVENT_TYPE` FOREIGN KEY (`Todo_Desc_ID`) REFERENCES `todo_desc` (`id`),
  ADD CONSTRAINT `FK_SALES_ID` FOREIGN KEY (`Sales_Rep`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `fk_users_ID` FOREIGN KEY (`Sales_Rep`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `notes_ibfk_1` FOREIGN KEY (`Contact`) REFERENCES `contact` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_ROLE` FOREIGN KEY (`User_Roles`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `FK_USER_STATUS` FOREIGN KEY (`User_Status`) REFERENCES `user_status` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
