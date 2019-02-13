-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 13, 2019 at 05:45 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `andronikadb`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id_client` varchar(20) NOT NULL,
  `address` text,
  `email` varchar(100) DEFAULT NULL,
  `telp` varchar(15) DEFAULT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `company_cash`
--

CREATE TABLE `company_cash` (
  `id_transaction` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `description` text NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `number` int(10) NOT NULL,
  `total` decimal(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_cash`
--

INSERT INTO `company_cash` (`id_transaction`, `date`, `description`, `price`, `number`, `total`) VALUES
('CC1549340607', '2019-02-25', 'Mobil', '50000.00', 3, '150000.00'),
('CC1549869841', '2019-02-06', 'Batako (Kg)', '50000.00', 5, '250000.00'),
('CC1549870169', '2019-04-01', 'Tas', '5000.00', 3, '15000.00');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id_employee` varchar(20) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `age` date DEFAULT NULL,
  `address` text,
  `telp` varchar(15) DEFAULT NULL,
  `religion` varchar(15) DEFAULT NULL,
  `gender` varchar(15) DEFAULT NULL,
  `division` varchar(20) DEFAULT NULL,
  `password` varchar(191) DEFAULT NULL,
  `remember_token` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id_employee`, `name`, `age`, `address`, `telp`, `religion`, `gender`, `division`, `password`, `remember_token`) VALUES
('EM1548824869', 'James', '2019-01-21', 'Jl. Dawuhan Tegalgondo, Malang.', '082227126670', 'KONGHUCU', 'PRIA', 'BENDAHARA', NULL, NULL),
('EM1549263921', 'Kielvien Les Putra', '2019-02-26', 'Jl. Puncak Tidar, Malang.', '082227126670', 'KRISTEN', 'PRIA', 'DRIVER', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee_bonus`
--

CREATE TABLE `employee_bonus` (
  `id_bonus` varchar(20) NOT NULL,
  `id_employee` varchar(20) DEFAULT NULL,
  `id_detail` varchar(20) NOT NULL,
  `bonus` decimal(15,2) NOT NULL,
  `date` date DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employee_salary`
--

CREATE TABLE `employee_salary` (
  `id_employee` varchar(20) NOT NULL,
  `salary` decimal(15,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_salary`
--

INSERT INTO `employee_salary` (`id_employee`, `salary`) VALUES
('EM1548824869', '1000000.00'),
('EM1549263921', '2000000.00');

-- --------------------------------------------------------

--
-- Table structure for table `employee_salary_transaction`
--

CREATE TABLE `employee_salary_transaction` (
  `id_transaction` varchar(20) NOT NULL,
  `id_detail` varchar(20) DEFAULT NULL,
  `id_employee` varchar(20) DEFAULT NULL,
  `nominal` decimal(15,2) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fuel`
--

CREATE TABLE `fuel` (
  `id_fuel` varchar(20) NOT NULL,
  `name` varchar(45) NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_02_10_072151_create_permission_tables', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1),
(2, 'App\\User', 2);

-- --------------------------------------------------------

--
-- Table structure for table `mutation`
--

CREATE TABLE `mutation` (
  `id_mutation` varchar(20) NOT NULL,
  `source` varchar(20) DEFAULT NULL,
  `destiny` varchar(20) DEFAULT NULL,
  `nominal` decimal(15,2) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mutation`
--

INSERT INTO `mutation` (`id_mutation`, `source`, `destiny`, `nominal`, `date`, `description`) VALUES
('MT1549978966', 'KAS', 'PERUSAHAAN', '90000000.00', '2019-02-19', 'Tambahan');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'add client', 'web', NULL, NULL),
(2, 'edit client', 'web', NULL, NULL),
(3, 'delete client', 'web', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id_project` varchar(20) NOT NULL,
  `id_client` varchar(20) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `start` date DEFAULT NULL,
  `end` date DEFAULT NULL,
  `island` varchar(35) DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL,
  `total` decimal(15,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `project_bonus`
--

CREATE TABLE `project_bonus` (
  `id_bonus` varchar(20) NOT NULL,
  `id_project` varchar(20) DEFAULT NULL,
  `id_worker` varchar(20) DEFAULT NULL,
  `bonus` decimal(15,2) DEFAULT NULL,
  `description` text,
  `status` varchar(15) DEFAULT NULL,
  `date_take` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `project_contract_transaction`
--

CREATE TABLE `project_contract_transaction` (
  `id_transaction` varchar(20) NOT NULL,
  `id_worker` varchar(20) DEFAULT NULL,
  `id_project` varchar(20) DEFAULT NULL,
  `nominal` decimal(15,2) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `project_payment`
--

CREATE TABLE `project_payment` (
  `id_payment` varchar(20) NOT NULL,
  `id_project` varchar(20) DEFAULT NULL,
  `transfer` decimal(15,2) DEFAULT NULL,
  `date` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `project_purchase`
--

CREATE TABLE `project_purchase` (
  `id_transaction` varchar(20) NOT NULL,
  `id_project` varchar(20) DEFAULT NULL,
  `id_supply` varchar(25) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `total_item` int(15) DEFAULT NULL,
  `price_per_item` decimal(15,2) DEFAULT NULL,
  `resp_person` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `project_salary_transaction`
--

CREATE TABLE `project_salary_transaction` (
  `id_transaction` varchar(20) NOT NULL,
  `id_worker` varchar(20) DEFAULT NULL,
  `id_project` varchar(20) DEFAULT NULL,
  `nominal` decimal(15,2) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `project_supply`
--

CREATE TABLE `project_supply` (
  `id_supply` varchar(45) NOT NULL,
  `id_project` varchar(20) DEFAULT NULL,
  `item_name` varchar(20) DEFAULT NULL,
  `measure` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `project_worker`
--

CREATE TABLE `project_worker` (
  `id_worker` varchar(20) NOT NULL,
  `id_project` varchar(20) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `address` text,
  `telp` varchar(15) DEFAULT NULL,
  `religion` varchar(15) DEFAULT NULL,
  `gender` varchar(15) DEFAULT NULL,
  `division` text,
  `salary_status` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `repair_and_used`
--

CREATE TABLE `repair_and_used` (
  `item_name` varchar(45) NOT NULL,
  `number_repair` int(10) DEFAULT NULL,
  `number_used` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `repair_and_used`
--

INSERT INTO `repair_and_used` (`item_name`, `number_repair`, `number_used`) VALUES
('Batu', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'ADMIN', 'web', NULL, NULL),
(2, 'BENDAHARA', 'web', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `salary_month`
--

CREATE TABLE `salary_month` (
  `id_month` varchar(20) NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salary_month`
--

INSERT INTO `salary_month` (`id_month`, `date`) VALUES
('MO1550065109', '2019-02-03');

-- --------------------------------------------------------

--
-- Table structure for table `salary_month_detail`
--

CREATE TABLE `salary_month_detail` (
  `id_detail` varchar(20) NOT NULL,
  `id_month` varchar(20) DEFAULT NULL,
  `id_employee` varchar(20) DEFAULT NULL,
  `salary` decimal(15,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salary_month_detail`
--

INSERT INTO `salary_month_detail` (`id_detail`, `id_month`, `id_employee`, `salary`) VALUES
('MD15500651091', 'MO1550065109', 'EM1549263921', '2000000.00');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_transportation`
--

CREATE TABLE `transaction_transportation` (
  `id_transaction` varchar(20) NOT NULL,
  `id_transportation` varchar(20) NOT NULL,
  `nominal` decimal(15,2) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transportation`
--

CREATE TABLE `transportation` (
  `id_transportation` varchar(20) NOT NULL,
  `id_employee` varchar(20) NOT NULL,
  `id_client` varchar(20) DEFAULT NULL,
  `starting_point` varchar(45) NOT NULL,
  `destination` varchar(45) NOT NULL,
  `distance` int(11) NOT NULL,
  `cost` decimal(15,2) NOT NULL,
  `description` text NOT NULL,
  `total` decimal(15,2) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_employee` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `id_employee`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '001', 'hendras', 'hendras@gmail.com', NULL, '$2y$10$MGKL5NcnDEOGp9P8ir3nveZX6eWK8reDS3nWqiWARoFieN0VCHhFW', '1sPcaIupIAPd71kL4PC8aQPULB0mDRytufHwt30wd4uJTGrqkY1Y6kV6HoHE', '2019-02-10 01:49:56', '2019-02-10 01:49:56'),
(2, '002', 'brian', 'brian@gmail.com', NULL, '$2y$10$By5EQD4mP42pf9GzysUWiuqKoTclb1UdJ2ksdKJdce0Y2tLN7Dvy2', 'L6VSpBGf0sLDs5IebR4p1Tm8mYUfxEChpN4iH5kSOcI5QkEWKJFoPXuTNfBU', '2019-02-10 01:50:48', '2019-02-10 01:50:48');

-- --------------------------------------------------------

--
-- Table structure for table `warehouse`
--

CREATE TABLE `warehouse` (
  `item_name` varchar(45) NOT NULL,
  `measure` varchar(10) DEFAULT NULL,
  `number` int(35) DEFAULT NULL,
  `rent_status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `warehouse`
--

INSERT INTO `warehouse` (`item_name`, `measure`, `number`, `rent_status`) VALUES
('Batu', 'Buah', 5, 'BOLEH');

-- --------------------------------------------------------

--
-- Table structure for table `warehouse_rent`
--

CREATE TABLE `warehouse_rent` (
  `id_rent` varchar(20) NOT NULL,
  `item_name` varchar(45) DEFAULT NULL,
  `number_item` int(25) DEFAULT NULL,
  `id_client` varchar(20) DEFAULT NULL,
  `price_day` decimal(15,2) DEFAULT NULL,
  `start` date DEFAULT NULL,
  `end` date DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `warehouse_rent_payment`
--

CREATE TABLE `warehouse_rent_payment` (
  `id_payment` varchar(20) NOT NULL,
  `id_rent` varchar(20) DEFAULT NULL,
  `nominal` decimal(15,2) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `warehouse_sell`
--

CREATE TABLE `warehouse_sell` (
  `id_sell` varchar(20) NOT NULL,
  `item_name` varchar(45) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `number` int(35) DEFAULT NULL,
  `price_per_item` decimal(15,0) DEFAULT NULL,
  `resp_person` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `warehouse_sell`
--

INSERT INTO `warehouse_sell` (`id_sell`, `item_name`, `date`, `number`, `price_per_item`, `resp_person`) VALUES
('WL1550063602', 'Batu', '2019-02-01', 5, '50000', 'yy');

-- --------------------------------------------------------

--
-- Table structure for table `worker_contract`
--

CREATE TABLE `worker_contract` (
  `id_project` varchar(20) DEFAULT NULL,
  `id_worker` varchar(20) NOT NULL,
  `contract_value` decimal(15,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `worker_salary`
--

CREATE TABLE `worker_salary` (
  `id_worker` varchar(20) NOT NULL,
  `id_project` varchar(20) DEFAULT NULL,
  `salary` decimal(15,2) DEFAULT NULL,
  `fullday` int(10) DEFAULT NULL,
  `halfday` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`);

--
-- Indexes for table `company_cash`
--
ALTER TABLE `company_cash`
  ADD PRIMARY KEY (`id_transaction`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id_employee`);

--
-- Indexes for table `employee_bonus`
--
ALTER TABLE `employee_bonus`
  ADD PRIMARY KEY (`id_bonus`),
  ADD KEY `fk_employee_bonus_1_idx` (`id_employee`),
  ADD KEY `employee_bonus_salary_month_detail_FK` (`id_detail`);

--
-- Indexes for table `employee_salary`
--
ALTER TABLE `employee_salary`
  ADD PRIMARY KEY (`id_employee`);

--
-- Indexes for table `employee_salary_transaction`
--
ALTER TABLE `employee_salary_transaction`
  ADD PRIMARY KEY (`id_transaction`),
  ADD KEY `fk_employee_salary_transaction_1_idx` (`id_employee`),
  ADD KEY `fk_employee_salary_transaction_2_idx` (`id_detail`);

--
-- Indexes for table `fuel`
--
ALTER TABLE `fuel`
  ADD PRIMARY KEY (`id_fuel`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `mutation`
--
ALTER TABLE `mutation`
  ADD PRIMARY KEY (`id_mutation`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id_project`),
  ADD KEY `fk_project_1_idx` (`id_client`);

--
-- Indexes for table `project_bonus`
--
ALTER TABLE `project_bonus`
  ADD PRIMARY KEY (`id_bonus`),
  ADD KEY `fk_project_bonus_1_idx` (`id_project`),
  ADD KEY `fk_project_bonus_2_idx` (`id_worker`);

--
-- Indexes for table `project_contract_transaction`
--
ALTER TABLE `project_contract_transaction`
  ADD PRIMARY KEY (`id_transaction`),
  ADD KEY `fk_project_contract_transaction_1_idx` (`id_project`),
  ADD KEY `fk_project_contract_transaction_2_idx` (`id_worker`);

--
-- Indexes for table `project_payment`
--
ALTER TABLE `project_payment`
  ADD PRIMARY KEY (`id_payment`),
  ADD KEY `fk_project_payment_1_idx` (`id_project`);

--
-- Indexes for table `project_purchase`
--
ALTER TABLE `project_purchase`
  ADD PRIMARY KEY (`id_transaction`),
  ADD KEY `fk_project_purchase_1_idx` (`id_project`),
  ADD KEY `fk_project_purchase_2_idx` (`id_supply`);

--
-- Indexes for table `project_salary_transaction`
--
ALTER TABLE `project_salary_transaction`
  ADD PRIMARY KEY (`id_transaction`),
  ADD KEY `fk_project_salary_transaction_1_idx` (`id_project`),
  ADD KEY `fk_project_salary_transaction_2_idx` (`id_worker`);

--
-- Indexes for table `project_supply`
--
ALTER TABLE `project_supply`
  ADD PRIMARY KEY (`id_supply`),
  ADD KEY `fk_project_supply_1_idx` (`id_project`);

--
-- Indexes for table `project_worker`
--
ALTER TABLE `project_worker`
  ADD PRIMARY KEY (`id_worker`),
  ADD KEY `fk_project_worker_1_idx` (`id_project`);

--
-- Indexes for table `repair_and_used`
--
ALTER TABLE `repair_and_used`
  ADD PRIMARY KEY (`item_name`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `salary_month`
--
ALTER TABLE `salary_month`
  ADD PRIMARY KEY (`id_month`);

--
-- Indexes for table `salary_month_detail`
--
ALTER TABLE `salary_month_detail`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `fk_salary_month_detail_1_idx` (`id_employee`),
  ADD KEY `fk_salary_month_detail_2_idx` (`id_month`);

--
-- Indexes for table `transaction_transportation`
--
ALTER TABLE `transaction_transportation`
  ADD PRIMARY KEY (`id_transaction`),
  ADD KEY `transaction_transportation_transportation_FK` (`id_transportation`);

--
-- Indexes for table `transportation`
--
ALTER TABLE `transportation`
  ADD PRIMARY KEY (`id_transportation`),
  ADD KEY `transportation_employee_FK` (`id_employee`),
  ADD KEY `transportation_client_FK` (`id_client`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `warehouse`
--
ALTER TABLE `warehouse`
  ADD PRIMARY KEY (`item_name`);

--
-- Indexes for table `warehouse_rent`
--
ALTER TABLE `warehouse_rent`
  ADD PRIMARY KEY (`id_rent`),
  ADD KEY `fk_warehouse_rent_1_idx` (`item_name`),
  ADD KEY `warehouse_rent_client_FK` (`id_client`);

--
-- Indexes for table `warehouse_rent_payment`
--
ALTER TABLE `warehouse_rent_payment`
  ADD PRIMARY KEY (`id_payment`),
  ADD KEY `fk_warehouse_rent_payment_1_idx` (`id_rent`);

--
-- Indexes for table `warehouse_sell`
--
ALTER TABLE `warehouse_sell`
  ADD PRIMARY KEY (`id_sell`),
  ADD KEY `fk_warehouse_sell_1_idx` (`item_name`);

--
-- Indexes for table `worker_contract`
--
ALTER TABLE `worker_contract`
  ADD PRIMARY KEY (`id_worker`),
  ADD KEY `fk_worker_contract_1_idx` (`id_project`);

--
-- Indexes for table `worker_salary`
--
ALTER TABLE `worker_salary`
  ADD PRIMARY KEY (`id_worker`),
  ADD KEY `fk_worker_salary_1_idx` (`id_project`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee_bonus`
--
ALTER TABLE `employee_bonus`
  ADD CONSTRAINT `employee_bonus_salary_month_detail_FK` FOREIGN KEY (`id_detail`) REFERENCES `salary_month_detail` (`id_detail`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_employee_bonus_1` FOREIGN KEY (`id_employee`) REFERENCES `employee` (`id_employee`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employee_salary`
--
ALTER TABLE `employee_salary`
  ADD CONSTRAINT `fk_employee_salary_1` FOREIGN KEY (`id_employee`) REFERENCES `employee` (`id_employee`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employee_salary_transaction`
--
ALTER TABLE `employee_salary_transaction`
  ADD CONSTRAINT `fk_employee_salary_transaction_1` FOREIGN KEY (`id_employee`) REFERENCES `employee` (`id_employee`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_employee_salary_transaction_2` FOREIGN KEY (`id_detail`) REFERENCES `salary_month_detail` (`id_detail`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `fk_project_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `project_bonus`
--
ALTER TABLE `project_bonus`
  ADD CONSTRAINT `fk_project_bonus_1` FOREIGN KEY (`id_project`) REFERENCES `project` (`id_project`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_project_bonus_2` FOREIGN KEY (`id_worker`) REFERENCES `project_worker` (`id_worker`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `project_contract_transaction`
--
ALTER TABLE `project_contract_transaction`
  ADD CONSTRAINT `fk_project_contract_transaction_1` FOREIGN KEY (`id_project`) REFERENCES `project` (`id_project`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_project_contract_transaction_2` FOREIGN KEY (`id_worker`) REFERENCES `project_worker` (`id_worker`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `project_payment`
--
ALTER TABLE `project_payment`
  ADD CONSTRAINT `fk_project_payment_1` FOREIGN KEY (`id_project`) REFERENCES `project` (`id_project`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `project_purchase`
--
ALTER TABLE `project_purchase`
  ADD CONSTRAINT `fk_project_purchase_1` FOREIGN KEY (`id_project`) REFERENCES `project` (`id_project`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_project_purchase_2` FOREIGN KEY (`id_supply`) REFERENCES `project_supply` (`id_supply`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `project_salary_transaction`
--
ALTER TABLE `project_salary_transaction`
  ADD CONSTRAINT `fk_project_salary_transaction_1` FOREIGN KEY (`id_project`) REFERENCES `project` (`id_project`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_project_salary_transaction_2` FOREIGN KEY (`id_worker`) REFERENCES `project_worker` (`id_worker`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `project_supply`
--
ALTER TABLE `project_supply`
  ADD CONSTRAINT `fk_project_supply_1` FOREIGN KEY (`id_project`) REFERENCES `project` (`id_project`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `project_worker`
--
ALTER TABLE `project_worker`
  ADD CONSTRAINT `fk_project_worker_1` FOREIGN KEY (`id_project`) REFERENCES `project` (`id_project`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `repair_and_used`
--
ALTER TABLE `repair_and_used`
  ADD CONSTRAINT `fk_repair_and_used_1` FOREIGN KEY (`item_name`) REFERENCES `warehouse` (`item_name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `salary_month_detail`
--
ALTER TABLE `salary_month_detail`
  ADD CONSTRAINT `fk_salary_month_detail_1` FOREIGN KEY (`id_employee`) REFERENCES `employee` (`id_employee`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_salary_month_detail_2` FOREIGN KEY (`id_month`) REFERENCES `salary_month` (`id_month`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaction_transportation`
--
ALTER TABLE `transaction_transportation`
  ADD CONSTRAINT `transaction_transportation_transportation_FK` FOREIGN KEY (`id_transportation`) REFERENCES `transportation` (`id_transportation`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transportation`
--
ALTER TABLE `transportation`
  ADD CONSTRAINT `transportation_client_FK` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transportation_employee_FK` FOREIGN KEY (`id_employee`) REFERENCES `employee` (`id_employee`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `warehouse_rent`
--
ALTER TABLE `warehouse_rent`
  ADD CONSTRAINT `fk_warehouse_rent_1` FOREIGN KEY (`item_name`) REFERENCES `warehouse` (`item_name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `warehouse_rent_client_FK` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `warehouse_rent_payment`
--
ALTER TABLE `warehouse_rent_payment`
  ADD CONSTRAINT `fk_warehouse_rent_payment_1` FOREIGN KEY (`id_rent`) REFERENCES `warehouse_rent` (`id_rent`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `warehouse_sell`
--
ALTER TABLE `warehouse_sell`
  ADD CONSTRAINT `fk_warehouse_sell_1` FOREIGN KEY (`item_name`) REFERENCES `warehouse` (`item_name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `worker_contract`
--
ALTER TABLE `worker_contract`
  ADD CONSTRAINT `fk_worker_contract_1` FOREIGN KEY (`id_project`) REFERENCES `project` (`id_project`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_worker_contract_2` FOREIGN KEY (`id_worker`) REFERENCES `project_worker` (`id_worker`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `worker_salary`
--
ALTER TABLE `worker_salary`
  ADD CONSTRAINT `fk_worker_salary_1` FOREIGN KEY (`id_project`) REFERENCES `project` (`id_project`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_worker_salary_2` FOREIGN KEY (`id_worker`) REFERENCES `project_worker` (`id_worker`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
