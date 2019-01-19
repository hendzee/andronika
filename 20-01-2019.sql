-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 19, 2019 at 06:11 PM
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

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id_client`, `address`, `email`, `telp`, `description`) VALUES
('CL1547863610', 'Jl. Dawuhan Tegalgondo, Karangploso, Malang.', 'whiteblog10@gmail.com', '082227126670', 'Virgini Hendras Prawira');

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
  `division` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employee_bonus`
--

CREATE TABLE `employee_bonus` (
  `id_bonus` varchar(20) NOT NULL,
  `id_employee` varchar(20) DEFAULT NULL,
  `id_salary` varchar(20) NOT NULL,
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
  `id_salary` varchar(20) NOT NULL,
  `id_employee` varchar(20) DEFAULT NULL,
  `salary` decimal(15,2) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employee_salary_transaction`
--

CREATE TABLE `employee_salary_transaction` (
  `id_transaction` varchar(20) NOT NULL,
  `id_salary` varchar(20) NOT NULL,
  `id_employee` varchar(20) NOT NULL,
  `nominal` decimal(15,2) NOT NULL,
  `date` date NOT NULL
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

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id_project`, `id_client`, `name`, `start`, `end`, `island`, `status`, `total`) VALUES
('PR1547863666', 'CL1547863610', 'Pembangunan jembatan suhat, Luwuk.', '2019-01-01', '2019-01-31', 'Luwuk', 'PROSES', '500000000.00');

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

--
-- Dumping data for table `project_bonus`
--

INSERT INTO `project_bonus` (`id_bonus`, `id_project`, `id_worker`, `bonus`, `description`, `status`, `date_take`) VALUES
('PB1547905182', 'PR1547863666', 'PW1547866819', '300000.00', 'Rajin bekerja', 'BELUM DIAMBIL', NULL);

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

--
-- Dumping data for table `project_contract_transaction`
--

INSERT INTO `project_contract_transaction` (`id_transaction`, `id_worker`, `id_project`, `nominal`, `date`) VALUES
('PT1547911236', 'PW1547906173', 'PR1547863666', '650000.00', '2019-01-23'),
('PT1547911369', 'PW1547906173', 'PR1547863666', '150000.00', '2019-01-16'),
('PT1547912654', 'PW1547906173', 'PR1547863666', '70000.00', '2019-01-22');

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

--
-- Dumping data for table `project_payment`
--

INSERT INTO `project_payment` (`id_payment`, `id_project`, `transfer`, `date`) VALUES
('PY1547863727', 'PR1547863666', '10000000.00', '2019-01-04');

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

--
-- Dumping data for table `project_purchase`
--

INSERT INTO `project_purchase` (`id_transaction`, `id_project`, `id_supply`, `date`, `total_item`, `price_per_item`, `resp_person`) VALUES
('PP1547865782', 'PR1547863666', 'SP1547864398', '2019-01-02', 5, '150000.00', 'Kang kirun');

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

--
-- Dumping data for table `project_salary_transaction`
--

INSERT INTO `project_salary_transaction` (`id_transaction`, `id_worker`, `id_project`, `nominal`, `date`) VALUES
('PT1547912185', 'PW1547866819', 'PR1547863666', '250000.00', '2019-01-23');

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

--
-- Dumping data for table `project_supply`
--

INSERT INTO `project_supply` (`id_supply`, `id_project`, `item_name`, `measure`) VALUES
('SP1547864398', 'PR1547863666', 'Baja', 'TON'),
('SP1547864902', 'PR1547863666', 'Batako', 'KG');

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

--
-- Dumping data for table `project_worker`
--

INSERT INTO `project_worker` (`id_worker`, `id_project`, `name`, `address`, `telp`, `religion`, `gender`, `division`, `salary_status`) VALUES
('PW1547866819', 'PR1547863666', 'Ruben', 'Jl. Achmad yani no.2, Malang', '0341531657', 'ISLAM', 'PRIA', 'Benerin tembok', 'HARIAN'),
('PW1547906173', 'PR1547863666', 'Miftakhul Jannah', 'Jl. Achmad Yani no.2007,  Malang.', '024178902829', 'ISLAM', 'WANITA', 'Desainer tronjal tronjol.', 'KONTRAK');

-- --------------------------------------------------------

--
-- Table structure for table `repair_and_used`
--

CREATE TABLE `repair_and_used` (
  `item_name` varchar(20) NOT NULL,
  `number_repair` int(10) DEFAULT NULL,
  `number_used` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transportation`
--

CREATE TABLE `transportation` (
  `id_transportation` varchar(20) NOT NULL,
  `id_employee` varchar(20) NOT NULL,
  `starting_point` varchar(45) NOT NULL,
  `destination` varchar(45) NOT NULL,
  `distance` int(11) NOT NULL,
  `cost` decimal(15,2) NOT NULL,
  `description` text NOT NULL,
  `url_token` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `warehouse_purchase`
--

CREATE TABLE `warehouse_purchase` (
  `id_purchase` varchar(20) NOT NULL,
  `date` date DEFAULT NULL,
  `item_name` varchar(35) DEFAULT NULL,
  `number` int(35) DEFAULT NULL,
  `price_per_item` decimal(15,2) DEFAULT NULL,
  `resp_person` varchar(35) DEFAULT NULL,
  `token` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `warehouse_rent`
--

CREATE TABLE `warehouse_rent` (
  `id_rent` varchar(20) NOT NULL,
  `item_name` varchar(45) DEFAULT NULL,
  `number_item` int(25) DEFAULT NULL,
  `id_client` varchar(45) DEFAULT NULL,
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
  `date` date DEFAULT NULL,
  `item_name` varchar(35) DEFAULT NULL,
  `number` int(35) DEFAULT NULL,
  `price_per_item` decimal(15,0) DEFAULT NULL,
  `resp_person` varchar(35) DEFAULT NULL,
  `token` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `worker_contract`
--

CREATE TABLE `worker_contract` (
  `id_project` varchar(20) DEFAULT NULL,
  `id_worker` varchar(20) NOT NULL,
  `contract_value` decimal(15,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `worker_contract`
--

INSERT INTO `worker_contract` (`id_project`, `id_worker`, `contract_value`) VALUES
('PR1547863666', 'PW1547906173', '500000.00');

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
-- Dumping data for table `worker_salary`
--

INSERT INTO `worker_salary` (`id_worker`, `id_project`, `salary`, `fullday`, `halfday`) VALUES
('PW1547866819', 'PR1547863666', '500000.00', 5, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id_employee`);

--
-- Indexes for table `employee_bonus`
--
ALTER TABLE `employee_bonus`
  ADD PRIMARY KEY (`id_bonus`);

--
-- Indexes for table `employee_salary`
--
ALTER TABLE `employee_salary`
  ADD PRIMARY KEY (`id_salary`);

--
-- Indexes for table `employee_salary_transaction`
--
ALTER TABLE `employee_salary_transaction`
  ADD PRIMARY KEY (`id_transaction`);

--
-- Indexes for table `fuel`
--
ALTER TABLE `fuel`
  ADD PRIMARY KEY (`id_fuel`);

--
-- Indexes for table `mutation`
--
ALTER TABLE `mutation`
  ADD PRIMARY KEY (`id_mutation`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id_project`);

--
-- Indexes for table `project_bonus`
--
ALTER TABLE `project_bonus`
  ADD PRIMARY KEY (`id_bonus`);

--
-- Indexes for table `project_contract_transaction`
--
ALTER TABLE `project_contract_transaction`
  ADD PRIMARY KEY (`id_transaction`);

--
-- Indexes for table `project_payment`
--
ALTER TABLE `project_payment`
  ADD PRIMARY KEY (`id_payment`);

--
-- Indexes for table `project_purchase`
--
ALTER TABLE `project_purchase`
  ADD PRIMARY KEY (`id_transaction`);

--
-- Indexes for table `project_salary_transaction`
--
ALTER TABLE `project_salary_transaction`
  ADD PRIMARY KEY (`id_transaction`);

--
-- Indexes for table `project_supply`
--
ALTER TABLE `project_supply`
  ADD PRIMARY KEY (`id_supply`);

--
-- Indexes for table `project_worker`
--
ALTER TABLE `project_worker`
  ADD PRIMARY KEY (`id_worker`);

--
-- Indexes for table `repair_and_used`
--
ALTER TABLE `repair_and_used`
  ADD PRIMARY KEY (`item_name`);

--
-- Indexes for table `transportation`
--
ALTER TABLE `transportation`
  ADD PRIMARY KEY (`id_transportation`);

--
-- Indexes for table `warehouse`
--
ALTER TABLE `warehouse`
  ADD PRIMARY KEY (`item_name`);

--
-- Indexes for table `warehouse_purchase`
--
ALTER TABLE `warehouse_purchase`
  ADD PRIMARY KEY (`id_purchase`);

--
-- Indexes for table `warehouse_rent`
--
ALTER TABLE `warehouse_rent`
  ADD PRIMARY KEY (`id_rent`);

--
-- Indexes for table `warehouse_rent_payment`
--
ALTER TABLE `warehouse_rent_payment`
  ADD PRIMARY KEY (`id_payment`);

--
-- Indexes for table `warehouse_sell`
--
ALTER TABLE `warehouse_sell`
  ADD PRIMARY KEY (`id_sell`);

--
-- Indexes for table `worker_contract`
--
ALTER TABLE `worker_contract`
  ADD PRIMARY KEY (`id_worker`);

--
-- Indexes for table `worker_salary`
--
ALTER TABLE `worker_salary`
  ADD PRIMARY KEY (`id_worker`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
