-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2013 at 09:49 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `farmer_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `USER_ID` varchar(45) NOT NULL,
  `ACCOUNT_NO` varchar(45) NOT NULL,
  `LOAN` varchar(45) DEFAULT NULL,
  `CREDIT_LIMIT` varchar(45) NOT NULL,
  `BANK` varchar(45) NOT NULL,
  `PURPOSE` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`USER_ID`,`ACCOUNT_NO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`USER_ID`, `ACCOUNT_NO`, `LOAN`, `CREDIT_LIMIT`, `BANK`, `PURPOSE`) VALUES
('hemant', '809986', '456', '987696', 'lolbank', 'kck');

-- --------------------------------------------------------

--
-- Table structure for table `climate`
--

CREATE TABLE IF NOT EXISTS `climate` (
  `CLIMATE_ZONE` varchar(45) NOT NULL,
  `ANNUAL_RAINFALL` float NOT NULL,
  `SOIL_COND` varchar(45) NOT NULL,
  `SEA_LEVEL` float NOT NULL,
  PRIMARY KEY (`CLIMATE_ZONE`,`SOIL_COND`),
  UNIQUE KEY `CLIMATE_ZONE` (`CLIMATE_ZONE`),
  UNIQUE KEY `CLIMATE_ZONE_2` (`CLIMATE_ZONE`),
  UNIQUE KEY `CLIMATE_ZONE_3` (`CLIMATE_ZONE`,`SOIL_COND`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `climate`
--

INSERT INTO `climate` (`CLIMATE_ZONE`, `ANNUAL_RAINFALL`, `SOIL_COND`, `SEA_LEVEL`) VALUES
('ALPINE', 19.5, 'CHERNOZEM', 500),
('DRY', 10.5, 'DESERT', 230.5),
('HOT_HUMID', 25.2, 'FERRALLITIC', 350),
('MILD_HUMID', 18.3, 'GLEY', 300);

-- --------------------------------------------------------

--
-- Stand-in structure for view `cli_corp`
--
CREATE TABLE IF NOT EXISTS `cli_corp` (
`CLIMATE_ZONE` varchar(200)
);
-- --------------------------------------------------------

--
-- Table structure for table `crops_climate`
--

CREATE TABLE IF NOT EXISTS `crops_climate` (
  `CLIMATE_ZONE` varchar(200) NOT NULL,
  `BR_ID` varchar(200) NOT NULL,
  PRIMARY KEY (`CLIMATE_ZONE`,`BR_ID`),
  KEY `BR_ID` (`BR_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `crops_climate`
--

INSERT INTO `crops_climate` (`CLIMATE_ZONE`, `BR_ID`) VALUES
('ALPINE', '12A'),
('DRY', '12A'),
('DRY', '1A'),
('ALPINE', '1N'),
('MILD_HUMID', '1Z'),
('HOT_HUMID', '21B'),
('DRY', '2X'),
('HOT_HUMID', '2X'),
('MILD_HUMID', '3AM'),
('HOT_HUMID', '3W'),
('MILD_HUMID', '4F');

-- --------------------------------------------------------

--
-- Table structure for table `crops_vegetable`
--

CREATE TABLE IF NOT EXISTS `crops_vegetable` (
  `BREED_ID` varchar(200) NOT NULL,
  `SEASON` varchar(200) NOT NULL,
  `NAME` varchar(450) NOT NULL,
  PRIMARY KEY (`BREED_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `crops_vegetable`
--

INSERT INTO `crops_vegetable` (`BREED_ID`, `SEASON`, `NAME`) VALUES
('12A', 'KHARIF', 'PADDY'),
('1A', 'KHARIF', 'PADDY'),
('1N', 'MANSOON', 'BT-BENGEAN'),
('1Z', 'KHARIF', 'BAZERA'),
('21B', 'KHARIF', 'RICE'),
('23C', 'RABI', 'WHEAT'),
('2B', 'MANSOOON', 'WATERLEMON'),
('2C', 'KHARIF', 'PEANUT'),
('2X', 'RABBI', 'WHEAT'),
('3AM', 'MANSOON', 'CUCUMBER'),
('3W', 'KHARIF', ' RICE'),
('4F', 'RABBI', 'MUSTARD'),
('4T', 'KHARIF', 'RICE'),
('6T', 'RABBI', ' SUGARCANE'),
('7Y', 'MANSOON', 'CULIFLOWER'),
('8B', 'MANSOON', 'CUCUMBER');

-- --------------------------------------------------------

--
-- Table structure for table `crop_fertilizers`
--

CREATE TABLE IF NOT EXISTS `crop_fertilizers` (
  `BREED_ID` varchar(200) NOT NULL,
  `COMPANY_NM` varchar(200) NOT NULL,
  `FERTILIZER_NM` varchar(45) NOT NULL,
  PRIMARY KEY (`BREED_ID`,`COMPANY_NM`,`FERTILIZER_NM`),
  KEY `COMPANY_NM` (`COMPANY_NM`,`FERTILIZER_NM`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `crop_fertilizers`
--

INSERT INTO `crop_fertilizers` (`BREED_ID`, `COMPANY_NM`, `FERTILIZER_NM`) VALUES
('12A', 'CHAMBAL', 'POTASH'),
('1N', 'CHAMBAL', 'POTASH'),
('23C', 'CHAMBAL', 'POTASH'),
('4T', 'CHAMBAL', 'POTASH'),
('8B', 'CHAMBAL', 'POTASH'),
('1A', 'CHAMBAL', 'UREA'),
('2B', 'CHAMBAL', 'UREA'),
('7Y', 'CHAMBAL', 'UREA'),
('21B', 'IFFCO', 'DOUBLENP'),
('3AM', 'IFFCO', 'DOUBLENP'),
('3W', 'IFFCO', 'DOUBLENP'),
('12A', 'IFFCO', 'POTASH'),
('1N', 'IFFCO', 'POTASH'),
('23C', 'IFFCO', 'POTASH'),
('4T', 'IFFCO', 'POTASH'),
('8B', 'IFFCO', 'POTASH'),
('1Z', 'IFFCO', 'SINGLENP'),
('2X', 'IFFCO', 'SINGLENP'),
('4F', 'IFFCO', 'SINGLENP'),
('1A', 'IFFCO', 'UREA'),
('2B', 'IFFCO', 'UREA'),
('7Y', 'IFFCO', 'UREA'),
('21B', 'KRISCHCO', 'DOUBLENP'),
('3AM', 'KRISCHCO', 'DOUBLENP'),
('3W', 'KRISCHCO', 'DOUBLENP'),
('1Z', 'KRISCHCO', 'SINGLENP'),
('2X', 'KRISCHCO', 'SINGLENP'),
('4F', 'KRISCHCO', 'SINGLENP'),
('1A', 'KRISCHCO', 'UREA'),
('2B', 'KRISCHCO', 'UREA'),
('7Y', 'KRISCHCO', 'UREA');

-- --------------------------------------------------------

--
-- Table structure for table `fertilizers`
--

CREATE TABLE IF NOT EXISTS `fertilizers` (
  `COMPANY_NM` varchar(200) NOT NULL,
  `FERTILIZER_NM` varchar(200) NOT NULL,
  `POTASSIUM` float DEFAULT NULL,
  `PHOSPHORUS` float DEFAULT NULL,
  `SULPHUR` float DEFAULT NULL,
  `NITROGEN` float DEFAULT NULL,
  `COST` float NOT NULL,
  PRIMARY KEY (`COMPANY_NM`,`FERTILIZER_NM`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fertilizers`
--

INSERT INTO `fertilizers` (`COMPANY_NM`, `FERTILIZER_NM`, `POTASSIUM`, `PHOSPHORUS`, `SULPHUR`, `NITROGEN`, `COST`) VALUES
('CHAMBAL', 'POTASH', 34, 12, 6, 7, 930),
('CHAMBAL', 'UREA', 4, 12, 1, 57, 870),
('IFFCO', 'DOUBLENP', 2, 12, 3.5, 47, 850),
('IFFCO', 'POTASH', 34, 12, 6, 7, 950),
('IFFCO', 'SINGLENP', 0, 12, 3.5, 27, 750),
('IFFCO', 'UREA', 4, 12, 1, 57, 900),
('KRISCHCO', 'DOUBLENP', 2, 12, 3.5, 47, 900),
('KRISCHCO', 'SINGLENP', 1, 10, 4, 50, 870),
('KRISCHCO', 'UREA', 4, 12, 1, 57, 900);

-- --------------------------------------------------------

--
-- Table structure for table `herbs`
--

CREATE TABLE IF NOT EXISTS `herbs` (
  `HERBICIDE` varchar(45) NOT NULL,
  `LAND_AMOUNT` varchar(45) DEFAULT NULL,
  `QUANTITY` varchar(45) NOT NULL,
  `PRICE` varchar(45) NOT NULL,
  PRIMARY KEY (`HERBICIDE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `herbs`
--

INSERT INTO `herbs` (`HERBICIDE`, `LAND_AMOUNT`, `QUANTITY`, `PRICE`) VALUES
('assureII', '200', '100', '2000'),
('clethodim', '200', '60', '4000'),
('clodinafop', '200', '200', '3000'),
('dakota', '200', '50', '5000'),
('fargo', '200', '100', '1800'),
('hoelon', '200', '80', '1600'),
('poast', '200', '150', '2500'),
('prowl', '200', '100', '3000'),
('puma', '200', '75', '1000'),
('treflan', '200', '125', '2000');

-- --------------------------------------------------------

--
-- Table structure for table `herbs_t1`
--

CREATE TABLE IF NOT EXISTS `herbs_t1` (
  `BR_ID` varchar(200) NOT NULL,
  `HERBICIDE` varchar(45) NOT NULL,
  PRIMARY KEY (`BR_ID`,`HERBICIDE`),
  KEY `BR_ID_idx` (`BR_ID`),
  KEY `HERBICIDE` (`HERBICIDE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `herbs_t1`
--

INSERT INTO `herbs_t1` (`BR_ID`, `HERBICIDE`) VALUES
('12A', 'assureII'),
('6T', 'assureII'),
('1A', 'clethodim'),
('1N', 'clodinafop'),
('7Y', 'clodinafop'),
('1Z', 'dakota'),
('21B', 'dakota'),
('23C', 'fargo'),
('2B', 'fargo'),
('2C', 'hoelon'),
('2X', 'poast'),
('4T', 'poast'),
('3AM', 'puma'),
('8B', 'puma'),
('3W', 'treflan'),
('4F', 'treflan');

-- --------------------------------------------------------

--
-- Table structure for table `herbs_t2`
--

CREATE TABLE IF NOT EXISTS `herbs_t2` (
  `HERBICIDE` varchar(45) NOT NULL,
  `HERBS` varchar(200) NOT NULL,
  PRIMARY KEY (`HERBICIDE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `herbs_t2`
--

INSERT INTO `herbs_t2` (`HERBICIDE`, `HERBS`) VALUES
('assureII', 'WO,PD,GF'),
('clethodim', 'GRASSES'),
('clodinafop', 'WO,PD,GF'),
('dakota', 'WO,GF'),
('fargo', 'GRASS AND BROADLEAF'),
('hoelon', 'GRASS AND BROADLEAF'),
('poast', 'WO'),
('prowl', 'DOWNY BROME'),
('puma', 'WO,PD'),
('treflan', 'GRASS AND BROADLEAF');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `USER_ID` varchar(45) NOT NULL DEFAULT '',
  `PASSWORD` varchar(450) NOT NULL,
  PRIMARY KEY (`USER_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`USER_ID`, `PASSWORD`) VALUES
('hemant', 'e10adc3949ba59abbe56e057f20f883e'),
('krish', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Table structure for table `market`
--

CREATE TABLE IF NOT EXISTS `market` (
  `GOVT_SUB_PRICE` float(6,2) NOT NULL,
  `OPEN_MARKET_PRICE` float(6,2) NOT NULL,
  `GOVT_IMPORT` float(6,2) DEFAULT NULL,
  `GOVT_EXPORT` float(6,2) DEFAULT NULL,
  `BREED_ID` varchar(200) NOT NULL,
  PRIMARY KEY (`BREED_ID`),
  KEY `BREED_ID_idx` (`BREED_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `market`
--

INSERT INTO `market` (`GOVT_SUB_PRICE`, `OPEN_MARKET_PRICE`, `GOVT_IMPORT`, `GOVT_EXPORT`, `BREED_ID`) VALUES
(234.50, 150.45, 1300.34, 1200.45, '12A'),
(345.45, 234.45, 2300.45, 2100.34, '1A'),
(350.00, 345.00, 2000.00, 1200.00, '2X'),
(453.12, 231.23, 3400.45, 2309.34, '3W');

-- --------------------------------------------------------

--
-- Table structure for table `pests`
--

CREATE TABLE IF NOT EXISTS `pests` (
  `PESTICIDES` varchar(200) NOT NULL,
  `LAND_AMOUNT` varchar(45) DEFAULT NULL,
  `QUANTITY` varchar(45) DEFAULT NULL,
  `PRICE` float(5,2) NOT NULL,
  PRIMARY KEY (`PESTICIDES`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pests`
--

INSERT INTO `pests` (`PESTICIDES`, `LAND_AMOUNT`, `QUANTITY`, `PRICE`) VALUES
('Algicides', '200', '50', 999.99),
('Avicides', '200', '50', 999.99),
('Bactericides', '200', '80', 999.99),
('Fungicides', '200', '70', 999.99),
('Insecticides', '200', '70', 999.99),
('Rodenticides', '200', '75', 999.99),
('Virucides', '200', '60', 999.99);

-- --------------------------------------------------------

--
-- Table structure for table `pests_t1`
--

CREATE TABLE IF NOT EXISTS `pests_t1` (
  `BR_ID` varchar(200) NOT NULL,
  `PESTICIDE` varchar(200) NOT NULL,
  PRIMARY KEY (`BR_ID`,`PESTICIDE`),
  KEY `TF` (`PESTICIDE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pests_t1`
--

INSERT INTO `pests_t1` (`BR_ID`, `PESTICIDE`) VALUES
('12A', 'Algicides'),
('4F', 'Algicides'),
('1A', 'Avicides'),
('2X', 'Avicides'),
('8B', 'Avicides'),
('1N', 'Bactericides'),
('4T', 'Bactericides'),
('1Z', 'Fungicides'),
('21B', 'Insecticides'),
('7Y', 'Insecticides'),
('2B', 'Rodenticides'),
('3W', 'Rodenticides'),
('23C', 'Virucides'),
('3AM', 'Virucides');

-- --------------------------------------------------------

--
-- Table structure for table `pests_t2`
--

CREATE TABLE IF NOT EXISTS `pests_t2` (
  `PESTICIDE` varchar(200) NOT NULL,
  `PESTS` varchar(100) NOT NULL,
  PRIMARY KEY (`PESTICIDE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pests_t2`
--

INSERT INTO `pests_t2` (`PESTICIDE`, `PESTS`) VALUES
('Algicides', 'Algae'),
('Avicides', 'Birds'),
('Bactericides', 'Bacteria'),
('Fungicides', 'Fungi'),
('Insecticides', 'Insects'),
('Rodenticides', 'Rodents'),
('Virucides', 'Viruses');

-- --------------------------------------------------------

--
-- Table structure for table `storage_t1`
--

CREATE TABLE IF NOT EXISTS `storage_t1` (
  `BR_ID` varchar(200) NOT NULL,
  `GOD_ID` varchar(45) NOT NULL,
  `CAPACITY` float(6,2) NOT NULL,
  `BUFFER_STOCK` float(6,2) NOT NULL,
  PRIMARY KEY (`BR_ID`,`GOD_ID`),
  KEY `BR_ID_idx` (`BR_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `storage_t1`
--

INSERT INTO `storage_t1` (`BR_ID`, `GOD_ID`, `CAPACITY`, `BUFFER_STOCK`) VALUES
('12A', '11', 50.00, 10.00),
('1A', '12', 30.00, 7.00),
('1N', '13', 40.00, 15.00),
('1Z', '11', 50.00, 10.00),
('21B', '12', 30.00, 11.00),
('23C', '15', 70.00, 15.00),
('2B', '13', 40.00, 15.00),
('2X', '15', 70.00, 15.00),
('3AM', '13', 40.00, 10.00),
('3W', '11', 50.00, 20.00),
('4F', '15', 70.00, 25.00),
('4T', '11', 50.00, 10.00),
('7Y', '14', 20.00, 15.00),
('8B', '14', 20.00, 5.00);

-- --------------------------------------------------------

--
-- Table structure for table `storage_t2`
--

CREATE TABLE IF NOT EXISTS `storage_t2` (
  `GODOWN` int(45) NOT NULL,
  `CITY` varchar(45) NOT NULL,
  PRIMARY KEY (`GODOWN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `storage_t2`
--

INSERT INTO `storage_t2` (`GODOWN`, `CITY`) VALUES
(11, 'Delhi'),
(12, 'Chandigarh'),
(13, 'Murena'),
(14, 'Agra'),
(15, 'Kanpur');

-- --------------------------------------------------------

--
-- Stand-in structure for view `st_combo`
--
CREATE TABLE IF NOT EXISTS `st_combo` (
`BR_ID` varchar(200)
,`GOD_ID` varchar(45)
,`CAPACITY` float(6,2)
,`BUFFER_STOCK` float(6,2)
,`GODOWN` int(45)
,`CITY` varchar(45)
);
-- --------------------------------------------------------

--
-- Table structure for table `user_farmer`
--

CREATE TABLE IF NOT EXISTS `user_farmer` (
  `USER_ID` varchar(45) NOT NULL,
  `NAME` char(200) NOT NULL,
  `PHONE_NO` double NOT NULL,
  `REGION` varchar(200) NOT NULL,
  `RESIDENCE` varchar(500) NOT NULL,
  `PLANTATION_LAND` float(7,4) NOT NULL,
  `TYPE_OF_FARMING` varchar(45) NOT NULL,
  PRIMARY KEY (`USER_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_farmer`
--

INSERT INTO `user_farmer` (`USER_ID`, `NAME`, `PHONE_NO`, `REGION`, `RESIDENCE`, `PLANTATION_LAND`, `TYPE_OF_FARMING`) VALUES
('12a', 'ankit', 9479494341, 'japan', 'fertt', 0.0000, 'wereurnef'),
('hemant', 'hemant singh rathore', 89898978, 'jbp', 'jodhpur', 456.0000, 'kol'),
('krish', 'krishna ananth', 8989894407, 'chennai', 'jbp', 500.0000, 'step');

-- --------------------------------------------------------

--
-- Structure for view `cli_corp`
--
DROP TABLE IF EXISTS `cli_corp`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `cli_corp` AS select distinct `c`.`CLIMATE_ZONE` AS `CLIMATE_ZONE` from `crops_climate` `c`;

-- --------------------------------------------------------

--
-- Structure for view `st_combo`
--
DROP TABLE IF EXISTS `st_combo`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `st_combo` AS select `t_1`.`BR_ID` AS `BR_ID`,`t_1`.`GOD_ID` AS `GOD_ID`,`t_1`.`CAPACITY` AS `CAPACITY`,`t_1`.`BUFFER_STOCK` AS `BUFFER_STOCK`,`t_2`.`GODOWN` AS `GODOWN`,`t_2`.`CITY` AS `CITY` from (`storage_t1` `t_1` join `storage_t2` `t_2`) where (`t_1`.`GOD_ID` = `t_2`.`GODOWN`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `user_farmer` (`USER_ID`);

--
-- Constraints for table `crops_climate`
--
ALTER TABLE `crops_climate`
  ADD CONSTRAINT `crops_climate_ibfk_1` FOREIGN KEY (`CLIMATE_ZONE`) REFERENCES `climate` (`CLIMATE_ZONE`),
  ADD CONSTRAINT `crops_climate_ibfk_2` FOREIGN KEY (`BR_ID`) REFERENCES `crops_vegetable` (`BREED_ID`);

--
-- Constraints for table `crop_fertilizers`
--
ALTER TABLE `crop_fertilizers`
  ADD CONSTRAINT `crop_fertilizers_ibfk_1` FOREIGN KEY (`BREED_ID`) REFERENCES `crops_vegetable` (`BREED_ID`),
  ADD CONSTRAINT `crop_fertilizers_ibfk_2` FOREIGN KEY (`COMPANY_NM`, `FERTILIZER_NM`) REFERENCES `fertilizers` (`COMPANY_NM`, `FERTILIZER_NM`);

--
-- Constraints for table `herbs_t1`
--
ALTER TABLE `herbs_t1`
  ADD CONSTRAINT `HERBICIDE` FOREIGN KEY (`HERBICIDE`) REFERENCES `herbs` (`HERBICIDE`),
  ADD CONSTRAINT `herbs_t1_ibfk_1` FOREIGN KEY (`BR_ID`) REFERENCES `crops_vegetable` (`BREED_ID`);

--
-- Constraints for table `herbs_t2`
--
ALTER TABLE `herbs_t2`
  ADD CONSTRAINT `herbs_t2_ibfk_1` FOREIGN KEY (`HERBICIDE`) REFERENCES `herbs` (`HERBICIDE`);

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `user_farmer` (`USER_ID`);

--
-- Constraints for table `market`
--
ALTER TABLE `market`
  ADD CONSTRAINT `BREED_ID` FOREIGN KEY (`BREED_ID`) REFERENCES `crops_vegetable` (`BREED_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pests_t1`
--
ALTER TABLE `pests_t1`
  ADD CONSTRAINT `TF` FOREIGN KEY (`PESTICIDE`) REFERENCES `pests` (`PESTICIDES`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `pests_t1_ibfk_1` FOREIGN KEY (`BR_ID`) REFERENCES `crops_vegetable` (`BREED_ID`);

--
-- Constraints for table `pests_t2`
--
ALTER TABLE `pests_t2`
  ADD CONSTRAINT `TI` FOREIGN KEY (`PESTICIDE`) REFERENCES `pests` (`PESTICIDES`);

--
-- Constraints for table `storage_t1`
--
ALTER TABLE `storage_t1`
  ADD CONSTRAINT `BR_ID` FOREIGN KEY (`BR_ID`) REFERENCES `crops_vegetable` (`BREED_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
