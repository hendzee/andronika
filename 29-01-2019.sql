-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 29, 2019 at 03:53 PM
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
('CL1548766177', 'Jl. Dawuhan Tegalgondo, Malang.', 'hendras@gmail.com', '082227126670', 'Virginia Hendras');

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
('EM1548086171', 'Sopian', '1970-01-01', 'Jl. Dawuhan Tegalgondo, Karangploso, Malang.', '0898181922918', 'KRISTEN', 'WANITA', 'MARKETING', NULL, NULL),
('EM1548558793', 'James Hutapea', '2019-04-01', 'Jl. Dawuhan Tegalgondo, Karangploso, Malang.', '0898181922918', 'ISLAM', 'PRIA', 'BENDAHARA', NULL, NULL);

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

--
-- Dumping data for table `employee_bonus`
--

INSERT INTO `employee_bonus` (`id_bonus`, `id_employee`, `id_detail`, `bonus`, `date`, `status`, `description`) VALUES
('BS1548569598', 'EM1548558793', 'MD15485634061', '500000.00', '2019-01-11', 'BELUM DIAMBIL', 'Mantap++');

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
('EM1548086171', '60000.00'),
('EM1548558793', '190000000.00');

-- --------------------------------------------------------

--
-- Table structure for table `employee_salary_transaction`
--

CREATE TABLE `employee_salary_transaction` (
  `id_transaction` varchar(20) NOT NULL,
  `id_detail` varchar(20) NOT NULL,
  `id_employee` varchar(20) NOT NULL,
  `nominal` decimal(15,2) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_salary_transaction`
--

INSERT INTO `employee_salary_transaction` (`id_transaction`, `id_detail`, `id_employee`, `nominal`, `date`) VALUES
('ET1548568483', 'MD15485634061', 'EM1548558793', '5000.00', '2019-01-03');

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

--
-- Dumping data for table `mutation`
--

INSERT INTO `mutation` (`id_mutation`, `source`, `destiny`, `nominal`, `date`, `description`) VALUES
('MT1548608402', 'PERUSAHAAN', 'PERUSAHAAN', '50000.00', '2019-01-29', 'Tambahan');

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
('PR1548767867', 'CL1548766177', 'Pembuatan dinding batu', '2019-01-16', '2019-01-31', 'Luwuk', 'PROSES', '700000000.00');

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

--
-- Dumping data for table `project_supply`
--

INSERT INTO `project_supply` (`id_supply`, `id_project`, `item_name`, `measure`) VALUES
('SP1548769685', 'PR1548767867', 'Batu', 'SAK');

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
('PW1548771540', 'PR1548767867', 'James', 'Jl. Dawuhan Tegalgondo, Malang.', '082227126670', 'ISLAM', 'PRIA', 'Ngayak pasir', 'KONTRAK'),
('PW1548771703', 'PR1548767867', 'Londo', 'Jl. Dawuhan Tegalgondo, Malang.', '082227126670', 'ISLAM', 'PRIA', 'Ngayak pasir', 'HARIAN');

-- --------------------------------------------------------

--
-- Table structure for table `repair_and_used`
--

CREATE TABLE `repair_and_used` (
  `item_name` varchar(20) NOT NULL,
  `number_repair` int(10) DEFAULT NULL,
  `number_used` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `repair_and_used`
--

INSERT INTO `repair_and_used` (`item_name`, `number_repair`, `number_used`) VALUES
('Batako', 5, 7),
('Molen', 7, 9);

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
('MO1548563406', '2019-01-01'),
('MO1548563436', '2019-02-02');

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
('MD15485634060', 'MO1548563406', 'EM1548086171', '60000.00'),
('MD15485634061', 'MO1548563406', 'EM1548558793', '5000.00'),
('MD15485634360', 'MO1548563436', 'EM1548086171', '60000.00'),
('MD15485634361', 'MO1548563436', 'EM1548558793', '700000.00');

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

--
-- Dumping data for table `warehouse`
--

INSERT INTO `warehouse` (`item_name`, `measure`, `number`, `rent_status`) VALUES
('Batako', 'Kg', 0, 'TIDAK'),
('Molen', 'Buah', 15, 'BOLEH');

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

--
-- Dumping data for table `warehouse_rent`
--

INSERT INTO `warehouse_rent` (`id_rent`, `item_name`, `number_item`, `id_client`, `price_day`, `start`, `end`, `status`) VALUES
('RN1548082001', 'Molen', 1, 'CL1547863610', '600000.00', '2019-01-01', '2019-01-31', 'DISEWA');

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

--
-- Dumping data for table `warehouse_rent_payment`
--

INSERT INTO `warehouse_rent_payment` (`id_payment`, `id_rent`, `nominal`, `date`) VALUES
('PS1548298872', 'RN1548082001', '500000.00', '2019-01-23');

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

--
-- Dumping data for table `warehouse_sell`
--

INSERT INTO `warehouse_sell` (`id_sell`, `date`, `item_name`, `number`, `price_per_item`, `resp_person`, `token`) VALUES
('WL1548082374', '2019-01-23', 'Batako', 15, '500000', 'Kang kirun', 'ggg');

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
('PR1548767867', 'PW1548771540', '30000000.00');

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
('PW1548771703', 'PR1548767867', '5000000.00', 5, 1);

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
  ADD PRIMARY KEY (`id_employee`);

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
-- Indexes for table `salary_month`
--
ALTER TABLE `salary_month`
  ADD PRIMARY KEY (`id_month`);

--
-- Indexes for table `salary_month_detail`
--
ALTER TABLE `salary_month_detail`
  ADD PRIMARY KEY (`id_detail`);

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
  ADD PRIMARY KEY (`id_worker`),
  ADD KEY `fk_worker_contract_1_idx` (`id_project`);

--
-- Indexes for table `worker_salary`
--
ALTER TABLE `worker_salary`
  ADD PRIMARY KEY (`id_worker`),
  ADD KEY `fk_worker_salary_1_idx` (`id_project`);

--
-- Constraints for dumped tables
--

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
