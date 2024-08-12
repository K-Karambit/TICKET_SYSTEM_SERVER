-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 12, 2024 at 07:44 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `new_ticket_system_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_services`
--

DROP TABLE IF EXISTS `tbl_services`;
CREATE TABLE IF NOT EXISTS `tbl_services` (
  `id` int NOT NULL AUTO_INCREMENT,
  `service_unique_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `service_creator_username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `service_creator_unique_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `service_creator_department` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `service_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `is_deleted` int NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_services`
--

INSERT INTO `tbl_services` (`id`, `service_unique_id`, `service_creator_username`, `service_creator_unique_id`, `service_creator_department`, `service_name`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, '2023-10-19-3693277070898372', 'Administrator', '2023-10-18-3801874411584926', 'CITRMU', 'IT EQUIPMENT REPAIR &amp; MAINTENANCE', 0, '2023-10-19 15:06:21', '2023-10-19 15:06:21'),
(2, '2023-10-19-0910916316351619', 'Administrator', '2023-10-18-3801874411584926', 'CITRMU', 'COMPUTER &amp; NETWORK SUPPORT', 0, '2023-10-19 15:06:29', '2023-10-19 15:06:29'),
(3, '2023-10-19-1158238075725486', 'Administrator', '2023-10-18-3801874411584926', 'CITRMU', 'INSTALLATION OF VARIOUS SOFTWARE', 0, '2023-10-19 15:06:38', '2023-10-19 15:06:38'),
(4, '2023-10-19-1510047855984607', 'Administrator', '2023-10-18-3801874411584926', 'CITRMU', 'CCTV FOOTAGE REVIEW', 0, '2023-10-19 15:06:47', '2023-10-19 15:06:47'),
(5, '2023-10-19-5062275633504326', 'Administrator', '2023-10-18-3801874411584926', 'CITRMU', 'AUXILLARY SYSTEM (PABX DOOR ACCESS)', 0, '2023-10-19 15:06:55', '2023-10-19 15:06:55'),
(6, '2023-10-19-0442941376526758', 'Administrator', '2023-10-18-3801874411584926', 'CITRMU', 'TECH SUPPORT (VIRTUAL PROJECTS &amp; PROGRAM)', 0, '2023-10-19 15:07:02', '2023-10-19 15:07:02'),
(8, '2024-03-08-6521838224310217', 'Administrator', '2023-10-18-3801874411584926', 'CITRMU', 'Test', 1, '2024-03-08 11:53:14', '2024-03-08 11:53:23'),
(9, '2024-03-08-2694553063831952', 'Administrator', '2023-10-18-3801874411584926', 'CITRMU', '&lt;script&gt;alert(\'Test\');&lt;/script&gt;', 1, '2024-03-08 11:56:10', '2024-03-08 11:56:31');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_technicians`
--

DROP TABLE IF EXISTS `tbl_technicians`;
CREATE TABLE IF NOT EXISTS `tbl_technicians` (
  `id` int NOT NULL AUTO_INCREMENT,
  `technician_unique_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `technician_creator_username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `technician_creator_unique_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `technician_creator_department` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `technician_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `is_assigned` int NOT NULL,
  `is_deleted` int NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_technicians`
--

INSERT INTO `tbl_technicians` (`id`, `technician_unique_id`, `technician_creator_username`, `technician_creator_unique_id`, `technician_creator_department`, `technician_name`, `is_assigned`, `is_deleted`, `created_at`, `updated_at`) VALUES
(8, '2023-10-20-6114140943923054', 'Administrator', '2023-10-18-3801874411584926', 'CITRMU', 'PHILIP PAUL GAMIS', 0, 0, '2023-10-20 08:54:24', '2023-10-20 08:54:24'),
(9, '2023-10-20-9191546338068500', 'Administrator', '2023-10-18-3801874411584926', 'CITRMU', 'GERALD ANGELES', 0, 0, '2023-10-20 08:54:43', '2023-10-20 08:54:43'),
(10, '2023-10-20-4275950238570921', 'Administrator', '2023-10-18-3801874411584926', 'CITRMU', 'JIROSHI MALICSI', 0, 0, '2023-10-20 08:54:51', '2023-10-20 08:54:51'),
(11, '2023-10-20-8865470274728898', 'Administrator', '2023-10-18-3801874411584926', 'CITRMU', 'ALLAN JOHN ANOG', 0, 0, '2023-10-20 08:54:58', '2023-10-20 08:54:58'),
(12, '2023-10-20-4749117139073652', 'Administrator', '2023-10-18-3801874411584926', 'CITRMU', 'HANYZEL LEGASPI', 0, 0, '2023-10-20 08:55:04', '2023-10-20 08:55:04'),
(13, '2023-10-20-7539853723334188', 'Administrator', '2023-10-18-3801874411584926', 'CITRMU', 'KARL JOSEPH FOZ', 0, 0, '2023-10-20 08:55:10', '2023-10-20 08:55:10'),
(14, '2023-10-20-0024665341881111', 'Administrator', '2023-10-18-3801874411584926', 'CITRMU', 'MARIANNE REYES', 0, 0, '2023-10-20 08:55:19', '2023-10-20 08:55:19'),
(15, '2023-10-20-1041370327335450', 'Administrator', '2023-10-18-3801874411584926', 'CITRMU', 'KRISELL ANNE ANDAL', 0, 0, '2023-10-20 08:56:02', '2023-10-20 08:56:02'),
(16, '2023-10-20-6670331007454225', 'Administrator', '2023-10-18-3801874411584926', 'CITRMU', 'RONABELLE SILLA', 0, 0, '2023-10-20 08:56:09', '2023-10-20 08:56:09'),
(17, '2023-10-20-2636260571405174', 'Administrator', '2023-10-18-3801874411584926', 'CITRMU', 'VANESSA MAE MENDOZA', 0, 0, '2023-10-20 08:56:16', '2023-10-20 08:56:16'),
(18, '2023-10-20-0466887023000951', 'Administrator', '2023-10-18-3801874411584926', 'CITRMU', 'JELLY ANNE VENANCIO', 0, 0, '2023-10-20 08:56:22', '2023-10-20 08:56:22'),
(19, '2023-10-20-8455408078078613', 'Administrator', '2023-10-18-3801874411584926', 'CITRMU', 'KATRINA MAE GARCIA', 0, 0, '2023-10-20 08:56:33', '2023-10-20 08:56:33');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tickets`
--

DROP TABLE IF EXISTS `tbl_tickets`;
CREATE TABLE IF NOT EXISTS `tbl_tickets` (
  `id` int NOT NULL AUTO_INCREMENT,
  `unique_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `requestor_username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `requestor_unique_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `requestor_department` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `service_request` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ticket_subject` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ticket_description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `is_assigned_to` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `technician_assigned_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ticket_timeliness` int DEFAULT NULL,
  `ticket_effectiveness` int DEFAULT NULL,
  `ticket_overall_rate` int DEFAULT NULL,
  `ticket_feedback` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `is_done` int DEFAULT NULL,
  `is_deleted` int DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_tickets`
--

INSERT INTO `tbl_tickets` (`id`, `unique_id`, `requestor_username`, `requestor_unique_id`, `requestor_department`, `service_request`, `ticket_subject`, `ticket_description`, `is_assigned_to`, `technician_assigned_id`, `ticket_timeliness`, `ticket_effectiveness`, `ticket_overall_rate`, `ticket_feedback`, `is_done`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, '2024-03-11-5825593715710811', 'Administrator', '2023-10-18-3801874411584926', 'CITRMU', '&lt;option value=', 'dwadwa', 'dwadwadwa', '&lt;option value=', '', 0, 0, 0, ' ', 0, 0, '2024-03-11 14:03:32', '2024-03-11 14:03:32');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE IF NOT EXISTS `tbl_users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `unique_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password_hashed` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `department` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `img_user_profile_picture` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `is_deleted` int NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `unique_id`, `username`, `password_hashed`, `role`, `department`, `img_user_profile_picture`, `is_deleted`, `created_at`, `updated_at`) VALUES
(10, '2023-10-18-3801874411584926', 'Administrator', '$2y$10$YFaCkMXQEXjjZa8CnOef4eRWGRYqnTtoG1OmEsgRYOq790XaHqzlS', 'ADMIN', 'CITRMU', '2023-10-18-3801874411584926.jpg', 0, '2023-10-18 11:14:37', '2023-10-23 13:35:14'),
(16, '2023-10-22-5493585949316250', 'KARL JOSEPH FOZ', '$2y$10$81WtqTnGgQlT3Q/vcKzyYOzgLzLlny0XzpvDCAVNRi3WZF3IkAaye', 'TECHNICIAN', 'CITRMU', '2023-10-22-5493585949316250.png', 0, '2023-10-22 11:08:28', '2023-10-22 11:08:28'),
(17, '2023-10-22-6715666220701976', 'PHILIP PAUL GAMIS', '$2y$10$Kky2UXQI9VA9VA7peqG4PuT21.gZflhIH2gt.87hPYjwJIS5xaNOq', 'TECHNICIAN', 'CITRMU', '2023-10-22-6715666220701976.png', 0, '2023-10-22 17:19:31', '2023-10-22 17:19:31'),
(18, '2023-10-22-1498656296141502', 'GERALD ANGELES', '$2y$10$s9kPBae5ss.GPFHCVmgi5OotQ/vwo97KlDCsAm.hivm0aZH/fiSha', 'TECHNICIAN', 'CITRMU', '2023-10-22-1498656296141502.png', 0, '2023-10-22 17:19:46', '2023-10-22 17:19:46'),
(19, '2023-10-22-5579830661880536', 'JIROSHI MALICSI', '$2y$10$2qtRLyvXwmM1fZoboqusYOoKPb82dPtK8Imn6aKxqGEgFor4sntsK', 'TECHNICIAN', 'CITRMU', '2023-10-22-5579830661880536.png', 0, '2023-10-22 17:19:56', '2023-10-22 17:19:56'),
(20, '2023-10-22-3010779212969530', 'ALLAN JOHN ANOG', '$2y$10$XaHQg2aNazd1kFeoNhXavuaL0dDXGZnYCWPVSJGwMgP8eD8e5oeGW', 'TECHNICIAN', 'CITRMU', '2023-10-22-3010779212969530.png', 0, '2023-10-22 17:20:22', '2023-10-22 17:20:22'),
(21, '2023-10-22-0838926383625484', 'HANYZEL LEGASPI', '$2y$10$uYA.ZZI1pfwNTg.bOE9C2eL2plXgYWtcJPzZ4xBj0OBgW8h6Isacy', 'TECHNICIAN', 'CITRMU', '2023-10-22-0838926383625484.png', 0, '2023-10-22 17:20:33', '2023-10-22 17:20:33'),
(22, '2023-10-22-8633272385880506', 'MARIANNE REYES', '$2y$10$X50TRg3dFKXU/N1cCHZx0OnEoLq7En9F6T5Pubi3OPfPzGLj2vNCa', 'TECHNICIAN', 'CITRMU', '2023-10-22-8633272385880506.png', 0, '2023-10-22 17:20:44', '2023-10-22 17:20:44'),
(23, '2023-10-22-2934472182037889', 'KRISELL ANNE ANDAL', '$2y$10$kuR98U9T0Q0skGs.e/CnR.se3CCgzmiqxUyN0XQWszcQrV1FHElVm', 'TECHNICIAN', 'CITRMU', '2023-10-22-2934472182037889.png', 0, '2023-10-22 17:20:54', '2023-10-22 17:20:54'),
(24, '2023-10-22-6353483951837960', 'RONABELLE SILLA', '$2y$10$EgCFKEIiHICqvUUYlx6NxOOFYTgddBQ4YjWpj/hC7FZaq3lJf7ej2', 'MANAGER', 'CITRMU', '2023-10-22-6353483951837960.png', 0, '2023-10-22 17:21:15', '2023-10-22 17:21:15'),
(25, '2023-10-22-4883579098808012', 'VANESSA MAE MENDOZA', '$2y$10$Y/rv94nWBc7e2pEdQUBqOeWPJyQeLlzi9XYYTdfh5WXgeAnYyMLLW', 'TECHNICIAN', 'CITRMU', '2023-10-22-4883579098808012.png', 0, '2023-10-22 17:21:40', '2023-10-22 17:21:40'),
(26, '2023-10-22-1307536413843632', 'JELLY ANNE VENANCIO', '$2y$10$dEle7pBuktCeY8viY5p4aOk44tETq86WTk.C8iXGoj2Ur0NK6Ub5C', 'TECHNICIAN', 'CITRMU', '2023-10-22-1307536413843632.png', 0, '2023-10-22 17:21:51', '2023-10-22 17:21:51'),
(27, '2023-10-22-8821202735320815', 'KATRINA MAE GARCIA', '$2y$10$66jtxwngrHRUCdaCoFsZrexWSwCL/gVn5tmLgEvDquRnoRd2aYdse', 'TECHNICIAN', 'CITRMU', '2023-10-22-8821202735320815.png', 0, '2023-10-22 17:22:01', '2023-10-22 17:22:01'),
(28, '2024-03-08-5349957933143442', 'SoapEater', '$2y$10$h/BcEiN/wsEbmqw5/Mr4juJ9BDY9J.RK5Gf.J0/HRoyyfHxwLv86m', 'REQUESTOR', 'IT', '2024-03-08-5349957933143442.png', 0, '2024-03-08 11:58:08', '2024-03-08 15:14:16'),
(29, '2024-04-01-8191801967105399', 'Test', '$2y$10$UkgnDOrzXwIKLzzrN9E76eVaHdDrr5Etomf6xSNQBDNc1B7hBbPWi', 'REQUESTOR', 'HR-Test', '2024-04-01-8191801967105399.png', 0, '2024-04-01 14:06:54', '2024-04-01 14:06:54'),
(30, '2024-08-12-6819784698223244', 'admin', '$2y$10$q8jIDuRs4RBpBCihh/dx7.ULYYdUThijI5pYGqtQGaRRBI0FrOfMu', 'TECHNICIAN', 'CITRMU', '2024-08-12-6819784698223244.jpg', 0, '2024-08-12 14:25:32', '2024-08-12 14:25:32');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
