-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2023 at 07:33 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Uid` varchar(25) NOT NULL,
  `pd` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Uid`, `pd`) VALUES
('Laasya', 'ALaasya@2004'),
('Sreekar', 'ASreekar@2003'),
('superA', 'superA');

-- --------------------------------------------------------

--
-- Table structure for table `castordisease`
--

CREATE TABLE `castordisease` (
  `Id` int(25) NOT NULL,
  `PName` varchar(30) NOT NULL,
  `SCName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `castordisease`
--

INSERT INTO `castordisease` (`Id`, `PName`, `SCName`) VALUES
(101, 'Seedling blight', 'Phytophthora parasitica'),
(102, 'Rust', 'Melampsora ricini'),
(103, 'Leaf blight', 'Alternaria ricini'),
(104, 'Brown leaf spot', 'Cercospora ricinella'),
(105, 'Powdery mildew', 'Leveillula taurica'),
(106, 'Stem rot', 'Macrophomina phaseolina'),
(107, 'Bacterial leaf spot', 'Xanthomonas campestris pv. ric'),
(108, 'Wilt', 'Fusarium oxysporum'),
(109, 'Alternaria Blight', 'Alternaria ricini Y'),
(110, 'Root rot / Charcoal Rot / Die ', 'Macrophomina phaseolina'),
(111, 'Fusarium wilt', 'Fusarium oxysporum f. sp. rici'),
(112, 'Grey mold', 'Botrytis ricini'),
(113, 'Capsule rot', 'Cladosporium oxysporum');

-- --------------------------------------------------------

--
-- Table structure for table `castorpests`
--

CREATE TABLE `castorpests` (
  `Id` int(25) NOT NULL,
  `PName` varchar(30) NOT NULL,
  `SCName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `castorpests`
--

INSERT INTO `castorpests` (`Id`, `PName`, `SCName`) VALUES
(101, 'Red Hairy Catterpillar', 'Amsacta albistriga Walker'),
(102, 'Castor semilooper', 'Achoea janata Linnaeus'),
(103, 'Tobacco caterpillar', 'Spodoptera litura (Fabr)'),
(104, 'Shoot and Capsule borer', 'Conogethes (Dichocrosis) punct'),
(105, 'Leaf hopper', 'Empoasca flavescens (Fabr)'),
(106, 'Thrips', 'Retithrips syriacus (Mayet)'),
(107, 'Whitefly', 'Trialeurodes ricini (Misra)'),
(108, 'Serpentine leaf miner', 'Liriomyza trifolii Burgess'),
(109, 'Bihar Hairy caterpillar', 'Spilosoma (Diacrisia) obliqua '),
(110, 'Red spider mite', 'Tetranychus telarious L.');

-- --------------------------------------------------------

--
-- Table structure for table `crop`
--

CREATE TABLE `crop` (
  `Id` int(3) NOT NULL,
  `CName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `crop`
--

INSERT INTO `crop` (`Id`, `CName`) VALUES
(1, 'Castor'),
(2, 'Sunflower'),
(3, 'Safflower'),
(4, 'Sesame'),
(5, 'Linseed');

-- --------------------------------------------------------

--
-- Table structure for table `healthy`
--

CREATE TABLE `healthy` (
  `crop` varchar(20) NOT NULL,
  `dt` date NOT NULL,
  `cropstage` varchar(30) NOT NULL,
  `st` varchar(30) NOT NULL,
  `part` varchar(30) NOT NULL,
  `device` varchar(30) NOT NULL,
  `season` varchar(30) NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `healthy`
--

INSERT INTO `healthy` (`crop`, `dt`, `cropstage`, `st`, `part`, `device`, `season`, `ID`) VALUES
('Safflower', '2023-02-16', 'Seed Setting', 'Capsules', 'Telangana', 'Camera-Long', 'Rabi', 8),
('Safflower', '2023-02-16', 'Seed Setting', 'Capsules', 'Telangana', 'Camera-Long', 'Rabi', 9),
('Safflower', '2023-02-16', 'Seed Setting', 'Capsules', 'Telangana', 'Camera-Long', 'Rabi', 10),
('Safflower', '2023-02-16', 'Seed Setting', 'Capsules', 'Telangana', 'Camera-Long', 'Rabi', 11),
('Safflower', '2023-02-16', 'Seed Setting', 'Capsules', 'Telangana', 'Camera-Long', 'Rabi', 12),
('Safflower', '2023-02-16', 'Seed Setting', 'Capsules', 'Telangana', 'Camera-Long', 'Rabi', 13),
('Castor', '2021-02-01', 'Rosette', 'Flowers', 'Goa', 'Camera-CloseUp', 'Rabi', 14),
('Sesame', '2023-02-07', 'Germination', 'Leaves', 'Goa', 'Camera-Long', 'Summer', 15),
('Safflower', '2023-02-16', 'Vegetative', 'Capsules', 'Telangana', 'Mobile-Long', 'Rabi', 16),
('Castor', '0000-00-00', 'Germination', 'Leaves', 'Andhra Pradesh', 'Camera-Long', 'Kharif', 17),
('Castor', '2023-03-09', 'Germination', 'Leaves', 'Andhra Pradesh', 'Camera-Long', 'Kharif', 18),
('Castor', '2023-03-14', 'Germination', 'Leaves', 'Andhra Pradesh', 'Camera-Long', 'Kharif', 19),
('Castor', '2023-03-21', 'Germination', 'Leaves', 'Andhra Pradesh', 'Camera-Long', 'Kharif', 20),
('Castor', '2023-03-08', 'Germination', 'Leaves', 'Andhra Pradesh', 'Camera-Long', 'Kharif', 21),
('Castor', '2023-03-15', 'Germination', 'Leaves', 'Andhra Pradesh', 'Camera-Long', 'Kharif', 22),
('Castor', '2023-03-15', 'Germination', 'Leaves', 'Andhra Pradesh', 'Camera-Long', 'Kharif', 23),
('Castor', '2023-03-15', 'Germination', 'Leaves', 'Andhra Pradesh', 'Camera-Long', 'Kharif', 24);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `name` int(30) NOT NULL,
  `size` int(30) NOT NULL,
  `type` int(30) NOT NULL,
  `data` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `linseeddiseases`
--

CREATE TABLE `linseeddiseases` (
  `Id` int(25) NOT NULL,
  `PName` varchar(30) NOT NULL,
  `SCName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `linseeddiseases`
--

INSERT INTO `linseeddiseases` (`Id`, `PName`, `SCName`) VALUES
(501, 'Rust', 'Melompsora lini'),
(502, 'Alternaria blight', 'Alternaria lini'),
(503, 'Wilt', 'Fusarium oxysporum spp. Lini'),
(504, 'Powdery mildew ', 'Powdery mildew ');

-- --------------------------------------------------------

--
-- Table structure for table `moderator`
--

CREATE TABLE `moderator` (
  `Uid` varchar(25) NOT NULL,
  `pd` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `moderator`
--

INSERT INTO `moderator` (`Uid`, `pd`) VALUES
('Laasya', 'MLaasya@2004'),
('Sreekar', 'MSreekar@2003'),
('superM', 'superM');

-- --------------------------------------------------------

--
-- Table structure for table `pestcastor`
--

CREATE TABLE `pestcastor` (
  `Pest` varchar(50) NOT NULL,
  `SName` varchar(50) NOT NULL,
  `id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pestcastor`
--

INSERT INTO `pestcastor` (`Pest`, `SName`, `id`) VALUES
('Red Hairy caterpillar', 'Amsacta albistriga Walker', 1),
('Castor semilooper', 'Achoea janata Linnaeus', 2),
('Tobacco caterpillar', 'Spodoptera litura (Fabr)', 3),
('Shoot and Capsule borer', 'Conogethes (Dichocrosis) punctiferalis', 4),
('Leaf hopper', 'Empoasca flavescens (Fabr)', 5),
('Thrips', 'Retithrips syriacus (Mayet)', 6),
('Whitefly', 'Trialeurodes ricini (Misra)', 7),
('Serpentine leaf miner', 'Liriomyza trifolii Burgess', 8),
('Bihar Hairy caterpillar', 'Spilosoma (Diacrisia) obliqua wlk.', 9),
('Red spider mite', 'Tetranychus telarious L.', 10);

-- --------------------------------------------------------

--
-- Table structure for table `safflowerpests`
--

CREATE TABLE `safflowerpests` (
  `Id` int(25) NOT NULL,
  `PName` varchar(30) NOT NULL,
  `SCName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `safflowerpests`
--

INSERT INTO `safflowerpests` (`Id`, `PName`, `SCName`) VALUES
(301, 'Capsule borer', 'Helicoverpa armigera'),
(302, 'Safflower caterpillar', 'Perigaea capensis'),
(303, 'Capsule fly/Safflower bud fly', 'Acanthiophilus helianthi rossi'),
(304, 'Safflower aphid', 'Uroleucon carthami'),
(305, 'Aphids', 'Uroleucon compositae');

-- --------------------------------------------------------

--
-- Table structure for table `sesamediseases`
--

CREATE TABLE `sesamediseases` (
  `Id` int(25) NOT NULL,
  `PName` varchar(30) NOT NULL,
  `SCName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sesamediseases`
--

INSERT INTO `sesamediseases` (`Id`, `PName`, `SCName`) VALUES
(401, 'Bacterial blight', 'Xanthomonas campestris pv. ses'),
(402, 'Cercospora leaf spot ', 'Cercospora sesami, C. sesamico'),
(403, 'Damping off / Root Rot', 'Macrophomina phaseolina'),
(404, 'Powdery mildew', 'Oidium sp., Sphaerotheca fulig'),
(405, 'Sesamum phyllody', 'Phytoplasma'),
(406, 'Root rot', 'Fusarium oxysporum f.sp.sesami'),
(407, 'Leaf blight', 'Alternaria sesami'),
(408, 'Stem blight', 'Phytophthora parasitica var. s'),
(409, 'Bacterial leaf spot', 'Pseudomonas sesami');

-- --------------------------------------------------------

--
-- Table structure for table `sesamepests`
--

CREATE TABLE `sesamepests` (
  `Id` int(25) NOT NULL,
  `PName` varchar(30) NOT NULL,
  `SCName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sesamepests`
--

INSERT INTO `sesamepests` (`Id`, `PName`, `SCName`) VALUES
(401, 'Leaf webber', 'Antigastra catalaunalis'),
(402, 'Gall fly', 'Asphondylia sesami'),
(403, 'Bud fly', 'Dasineura sesami'),
(404, 'Sesame leafhopper', 'Orosius albicinctus'),
(405, 'Orosius albicinctus', 'Orosius albicinctus'),
(406, 'Bihar hairy caterpillar', 'Spilosoma obliqua'),
(407, 'Linseed gall fly', 'Dasyneura sesame '),
(408, 'Aphids', 'Aphis gossypii');

-- --------------------------------------------------------

--
-- Table structure for table `sunflowerdisease`
--

CREATE TABLE `sunflowerdisease` (
  `Id` int(25) NOT NULL,
  `PName` varchar(30) NOT NULL,
  `SCName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sunflowerdisease`
--

INSERT INTO `sunflowerdisease` (`Id`, `PName`, `SCName`) VALUES
(201, 'Alternaria leaf blight', 'Alternaria helianthi'),
(202, 'Downy mildew', 'Plasmopara halstedi'),
(203, 'Phoma blight', 'Phoma macdonaldii'),
(204, 'Powdery mildew', 'Erysiphe cichoracearum'),
(205, 'Septoria leaf spot', 'Septoria helianthi'),
(206, 'Verticillium wilt', 'Verticillium wilt'),
(207, 'Rust', 'Puccinia helianthi'),
(208, 'Charcoal Rot', 'Macrophomina phaseolina'),
(209, 'Rhizopus Head Rot', 'Rhizopus sp'),
(210, 'Sclerotium wilt', 'Sclerotium rolfsii'),
(212, 'Sunflower mosaic virus SMV', 'Sunflower mosaic virus ');

-- --------------------------------------------------------

--
-- Table structure for table `sunflowerpests`
--

CREATE TABLE `sunflowerpests` (
  `Id` int(25) NOT NULL,
  `PName` varchar(30) NOT NULL,
  `SCName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sunflowerpests`
--

INSERT INTO `sunflowerpests` (`Id`, `PName`, `SCName`) VALUES
(201, 'Capitulum borer', 'Helicoverpa armigera'),
(202, 'Bihar hairy caterpillar', 'Spilosoma obliqua '),
(203, 'Tobacco caterpillar', 'Spodoptera litura'),
(204, 'Leaf hopper', 'Amrasca biguttula biguttula'),
(205, 'Parakeet', 'Psittacula krameri'),
(206, 'cut worms', 'Agrotis sp.'),
(207, 'Grasshoppers', 'Attractomorpha crenulata'),
(208, 'White fly', 'Bemesia tabaci'),
(209, 'Thrips', 'Scirtothrips dorsalis'),
(210, 'Green semilooper', 'Green semilooper');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Uid` varchar(25) NOT NULL,
  `pd` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Uid`, `pd`) VALUES
('Laasya', 'ULaasya@2004'),
('Sreekar', 'USreekar@2003'),
('superU', 'superU');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Uid`);

--
-- Indexes for table `castordisease`
--
ALTER TABLE `castordisease`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `castorpests`
--
ALTER TABLE `castorpests`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `crop`
--
ALTER TABLE `crop`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `healthy`
--
ALTER TABLE `healthy`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `linseeddiseases`
--
ALTER TABLE `linseeddiseases`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `moderator`
--
ALTER TABLE `moderator`
  ADD PRIMARY KEY (`Uid`);

--
-- Indexes for table `pestcastor`
--
ALTER TABLE `pestcastor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `safflowerpests`
--
ALTER TABLE `safflowerpests`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `sesamediseases`
--
ALTER TABLE `sesamediseases`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `sesamepests`
--
ALTER TABLE `sesamepests`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `sunflowerdisease`
--
ALTER TABLE `sunflowerdisease`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `sunflowerpests`
--
ALTER TABLE `sunflowerpests`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `crop`
--
ALTER TABLE `crop`
  MODIFY `Id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `healthy`
--
ALTER TABLE `healthy`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
