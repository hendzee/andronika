-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 11, 2019 at 09:59 AM
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
('CL1544631409', 'jl. Surabaya, karangplos, malang', 'ptsekarsari@gmail.com', '082227126670', 'deskripsi 2'),
('CL1544770294', 'Jl.Tokala', 'michael@gmail.com', '089899898', 'Michael');

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

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id_employee`, `name`, `age`, `address`, `telp`, `religion`, `gender`, `division`) VALUES
('EM1545048205', 'mike', '0000-00-00', 'palu', '08123456789', 'kristen', 'laki-laki', 'bendahara'),
('EM1545048206', 'nandes', '0000-00-00', 'sawojajar', '08123456789', 'kristen', 'laki-laki', 'DRIVER'),
('EM1545048207', 'coy', '0000-00-00', 'sawojajar', '08123456789', 'kristen', 'laki-laki', 'DRIVER');

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

--
-- Dumping data for table `employee_bonus`
--

INSERT INTO `employee_bonus` (`id_bonus`, `id_employee`, `id_salary`, `bonus`, `date`, `status`, `description`) VALUES
('BS1545049383', 'EM1545048205', 'ES1545048910', '112.00', '2019-04-30', 'belum diambil', 'untung untung'),
('BS1545496369', 'EM1545048205', 'ES1545048910', '800.00', NULL, 'belum diambil', 'bonus melimpah'),
('BS1546921571', 'EM1545048205', 'ES1545048910', '3000.00', NULL, 'belum diambil', 'bonus++');

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

--
-- Dumping data for table `employee_salary`
--

INSERT INTO `employee_salary` (`id_salary`, `id_employee`, `salary`, `date`) VALUES
('ES1545048910', 'EM1545048205', '1000000.00', '2018-12-31'),
('ES1545748827', 'EM1545048205', '7000000.00', '2018-12-01');

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

--
-- Dumping data for table `employee_salary_transaction`
--

INSERT INTO `employee_salary_transaction` (`id_transaction`, `id_salary`, `id_employee`, `nominal`, `date`) VALUES
('ET1545048875', 'ES1545048690', 'EM1545046784', '6000.00', '2019-11-11'),
('ET1545048892', 'ES1545048690', 'EM1545046784', '500.00', '2019-02-04'),
('ET1545495499', 'ES1545048910', 'EM1545048205', '5000.00', '2018-12-31');

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

--
-- Dumping data for table `fuel`
--

INSERT INTO `fuel` (`id_fuel`, `name`, `price`, `date`) VALUES
('TF1546925633', 'solar', '17000.00', '2018-12-27');

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
('MT1546354221', 'PERUSAHAAN', 'PR1544635431', '100000000.00', '2019-01-01', 'Suntikan dana'),
('MT1546354269', 'PERUSAHAAN', 'PR1544635431', '100000000.00', '2018-12-04', 'Suntikan dana'),
('MT1546354318', 'PR1544635431', 'PERUSAHAAN', '100000000.00', '2018-12-01', 'Buat beli kebutuhan harian');

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
('PR1544635431', 'CL1544631409', 'Pembangunan Jalan Raya Dieng', '2018-12-02', '2018-12-31', 'SELESAI', 'SELESAI', '710000000.00'),
('PR1544770800', 'CL1544770294', 'Pembutan Tol', '2018-12-01', '2018-12-31', 'Sulawesi', 'PROSES', '5000000.00'),
('PR1547141824', 'CL1544770294', 'Bikin Rumah Masa Depan', '2019-01-05', '2019-01-31', 'Luwuk', 'PROSES', '150000000.00');

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
('PB1545280843', 'PR1544770800', 'PW1544774404', '2000.00', 'lembur', 'belum diambil', '1970-01-01'),
('PB1545818506', 'PR1544635431', 'PW1544638365', '15000.00', 'Bonus++', 'belum diambil', NULL),
('PB1547153601', 'PR1544635431', 'PW1544638365', '200000.00', 'Bonus tahun new', 'diambil', '2019-01-23');

-- --------------------------------------------------------

--
-- Table structure for table `project_contract_transaction`
--

CREATE TABLE `project_contract_transaction` (
  `id_transaction` varchar(20) NOT NULL,
  `id_contract` varchar(20) DEFAULT NULL,
  `id_worker` varchar(20) DEFAULT NULL,
  `id_project` varchar(20) DEFAULT NULL,
  `nominal` decimal(15,2) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_contract_transaction`
--

INSERT INTO `project_contract_transaction` (`id_transaction`, `id_contract`, `id_worker`, `id_project`, `nominal`, `date`) VALUES
('PT1545281728', 'CT1545031463', 'PW1544774405', 'PR1544770800', '5000.00', '2018-12-25'),
('PT1547138845', 'CT1547138730', 'PW1544638365', 'PR1544635431', '200000.00', '2019-07-24'),
('PT1547154589', 'CT1547138730', 'PW1544638365', 'PR1544635431', '90000.00', '2019-01-28');

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
('PY1544635721', 'PR1544635431', '200000.00', '2018-12-31'),
('PY1544771769', 'PR1544770800', '100000.00', '2018-12-23'),
('PY1544771988', 'PR1544770800', '200000.00', '2018-12-26'),
('PY1547148471', 'PR1544635431', NULL, '2019-01-01'),
('PY1547148485', 'PR1544635431', NULL, '2019-01-29');

-- --------------------------------------------------------

--
-- Table structure for table `project_purchase`
--

CREATE TABLE `project_purchase` (
  `id_transaction` varchar(20) NOT NULL,
  `id_project` varchar(20) DEFAULT NULL,
  `name` varchar(25) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `total_item` int(15) DEFAULT NULL,
  `price_per_item` decimal(15,2) DEFAULT NULL,
  `resp_person` varchar(45) DEFAULT NULL,
  `token` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_purchase`
--

INSERT INTO `project_purchase` (`id_transaction`, `id_project`, `name`, `date`, `total_item`, `price_per_item`, `resp_person`, `token`) VALUES
('PP1544637679', 'PR1544635431', 'Kayu', '2018-01-01', 25, '2600.00', 'Cak Paidi', 'Bukti 2'),
('PP1544773853', 'PR1544770800', 'Batu', '2018-12-01', 2, '20000000.00', 'Cak Ikin', 'bukti 1');

-- --------------------------------------------------------

--
-- Table structure for table `project_salary_transaction`
--

CREATE TABLE `project_salary_transaction` (
  `id_transaction` varchar(20) NOT NULL,
  `id_salary` varchar(20) DEFAULT NULL,
  `id_worker` varchar(20) DEFAULT NULL,
  `id_project` varchar(20) DEFAULT NULL,
  `nominal` decimal(15,2) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_salary_transaction`
--

INSERT INTO `project_salary_transaction` (`id_transaction`, `id_salary`, `id_worker`, `id_project`, `nominal`, `date`) VALUES
('PT1545279811', 'WS1544778077', 'PW1544774404', 'PR1544770800', '7000.00', '2018-12-31'),
('PT1545279902', 'WS1544778077', 'PW1544774404', 'PR1544770800', '5000.00', '2018-12-04'),
('PT1547138453', 'WS1544639792', 'PW1544638365', 'PR1544635431', '200000.00', '2019-03-01'),
('PT1547145666', 'WS1544639792', 'PW1544638365', 'PR1544635431', '50000.00', '2019-01-01'),
('PT1547153379', 'WS1544639792', 'PW1544638365', 'PR1544635431', '90000.00', '1970-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `project_supply`
--

CREATE TABLE `project_supply` (
  `id_project` varchar(20) DEFAULT NULL,
  `item_name` varchar(20) NOT NULL,
  `measure` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_supply`
--

INSERT INTO `project_supply` (`id_project`, `item_name`, `measure`) VALUES
('PR1544635431', 'Bata', 'Ton'),
('PR1544770800', 'Batu', 'Kg'),
('PR1544635431', 'Kayu', 'Kg'),
('PR1544635431', 'Semen', 'Sak');

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
('PW1544638365', 'PR1544635431', 'Muhammad Irfan', 'jl. patimura no.18, luwuk selatan, malang', '082227126671', 'Hindu', 'Perempuan', 'Marketing', 'KONTRAK'),
('PW1544774404', 'PR1544770800', 'Hendrin', 'Jl.Tokala', '08889887', 'Islam', 'Laki-laki', 'Bendahara', 'HARIAN'),
('PW1544774405', 'PR1544770800', 'Virginia', 'Jl.Sengkaling', '082227126670', 'Islam', 'Laki-laki', 'Arsitek', 'KONTRAK'),
('PW1545271580', 'PR1544770800', 'Johny Deep', 'jl. Mahadewi, no 19 kasembon, jambi', 'Mengecat tembok', 'Islam', 'Laki-laki', 'Ngecat tembok', 'HARIAN'),
('PW1547154174', 'PR1544635431', 'Sopian', 'Jl. Yahuut', '0898181922918', 'Islam', 'Laki-laki', 'Tukang kabel', 'KONTRAK');

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

--
-- Dumping data for table `transportation`
--

INSERT INTO `transportation` (`id_transportation`, `id_employee`, `starting_point`, `destination`, `distance`, `cost`, `description`, `url_token`) VALUES
('TT1547124501', 'EM1545048207', 'SURABAYA', 'MALANG', 10098, '80000.00', 'Pengantaran barang 3', '11111'),
('TT1547126274', 'EM1545048207', 'PALU', 'MAKASAR', 105, '90000.00', 'Pengantaran barang', '90990190');

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
('Gamping', 'Kg', 2, 'TIDAK'),
('Molen', 'Buah', 6, 'BOLEH'),
('Semen', 'Sak', 14, 'TIDAK'),
('Truck', 'Buah', 15, 'BOLEH');

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

--
-- Dumping data for table `warehouse_purchase`
--

INSERT INTO `warehouse_purchase` (`id_purchase`, `date`, `item_name`, `number`, `price_per_item`, `resp_person`, `token`) VALUES
('WP1544760722', '2018-12-31', 'Molen', 3, '20000000.00', 'Cak Ikin', 'bukti 1');

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
('RN1546447463', 'Molen', 3, 'CL1544770294', '500000.00', '2018-12-01', '2019-01-31', 'DISEWA'),
('RN1546447499', 'Molen', 5, 'CL1544770294', '700000.00', '2019-01-02', '2019-04-02', 'KEMBALI');

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
('PS1546495644', 'RN1546447463', '5000.00', '2019-01-31'),
('PS1546495829', 'RN1546447463', '20000.00', '2019-01-23'),
('PS1546495887', 'RN1546447463', '1000.00', '2019-01-21');

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
('WL1546711043', '2019-01-29', 'Semen', 1, '7000', 'Pak Bambang', 'bukti 1'),
('WP1546478496', '2019-01-03', 'Semen', 2, '50000', 'Toko Sebelah', '12'),
('WP1546478560', '2019-01-03', 'Semen', 1, '40000', 'Toko Sebelah', '11'),
('WP1546478635', '2019-01-03', 'Gamping', 1, '40000', 'Sebelah', '11');

-- --------------------------------------------------------

--
-- Table structure for table `worker_contract`
--

CREATE TABLE `worker_contract` (
  `id_contract` varchar(20) NOT NULL,
  `id_project` varchar(20) DEFAULT NULL,
  `id_worker` varchar(20) DEFAULT NULL,
  `contract_value` decimal(15,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `worker_contract`
--

INSERT INTO `worker_contract` (`id_contract`, `id_project`, `id_worker`, `contract_value`) VALUES
('CT1545031463', 'PR1544770800', 'PW1544774405', '90000000.00'),
('CT1547138730', 'PR1544635431', 'PW1544638365', '1900000.00'),
('CT1547154227', 'PR1544635431', 'PW1547154174', '70000000.00');

-- --------------------------------------------------------

--
-- Table structure for table `worker_salary`
--

CREATE TABLE `worker_salary` (
  `id_salary` varchar(20) NOT NULL,
  `salary_date` date DEFAULT NULL,
  `id_project` varchar(20) DEFAULT NULL,
  `id_worker` varchar(20) DEFAULT NULL,
  `salary` decimal(15,2) DEFAULT NULL,
  `fullday` int(10) DEFAULT NULL,
  `halfday` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `worker_salary`
--

INSERT INTO `worker_salary` (`id_salary`, `salary_date`, `id_project`, `id_worker`, `salary`, `fullday`, `halfday`) VALUES
('WS1544639792', '2018-12-05', 'PR1544635431', 'PW1544638365', '300000.00', 5, 2),
('WS1544778077', '2018-12-01', 'PR1544770800', 'PW1544774404', '10000.00', 5, 2);

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
  ADD PRIMARY KEY (`item_name`);

--
-- Indexes for table `project_worker`
--
ALTER TABLE `project_worker`
  ADD PRIMARY KEY (`id_worker`);

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
  ADD PRIMARY KEY (`id_contract`);

--
-- Indexes for table `worker_salary`
--
ALTER TABLE `worker_salary`
  ADD PRIMARY KEY (`id_salary`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
