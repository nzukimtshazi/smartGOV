-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2023 at 08:59 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `research_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` int(11) NOT NULL,
  `names` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `statuss` varchar(1000) NOT NULL,
  `comments` varchar(5000) NOT NULL,
  `comments2` varchar(5000) NOT NULL,
  `comments3` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `names`, `email`, `statuss`, `comments`, `comments2`, `comments3`) VALUES
(17, 'S Ngwane', 'sngwane1998@gmail.com', 'Approved', 'Yes', 'Yes Yes', 'Congrats'),
(18, 'S', 'sssss@gmail.com', 'Rejected On Stage 1', '', '', 'No Comments.'),
(19, 'AA', 'aa@gmail.com', 'Approved', 'Approved', 'Approved again', 'Well done!');

-- --------------------------------------------------------

--
-- Table structure for table `budget_details`
--

CREATE TABLE `budget_details` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `ticket` varchar(100) NOT NULL,
  `ticketComment` varchar(1000) NOT NULL,
  `transportation` varchar(100) NOT NULL,
  `transportationComment` varchar(1000) NOT NULL,
  `registration` varchar(100) NOT NULL,
  `registrationComment` varchar(1000) NOT NULL,
  `accommodation` varchar(100) NOT NULL,
  `accommodationComment` varchar(1000) NOT NULL,
  `subsistence` varchar(100) NOT NULL,
  `subsistenceComment` varchar(1000) NOT NULL,
  `otherCosts` varchar(100) NOT NULL,
  `otherCostsComment` varchar(1000) NOT NULL,
  `totalCost` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `budget_details`
--

INSERT INTO `budget_details` (`id`, `email`, `ticket`, `ticketComment`, `transportation`, `transportationComment`, `registration`, `registrationComment`, `accommodation`, `accommodationComment`, `subsistence`, `subsistenceComment`, `otherCosts`, `otherCostsComment`, `totalCost`) VALUES
(19, 'sngwane1998@gmail.com', '77878', 'uhjhjh', '8787', 'hjhjhj', '8787', 'jhjhjhj', '87878', 'jhjhjhj', '878', 'hjhjhj', '878', 'jhjhj', '185086'),
(20, 'sssss@gmail.com', '656', 'GGH', '767', 'TYTY', '676', 'YTY', '6767', 'YTYTY', '67676', 'TYTYT', '6767', 'YTYTY', '83309'),
(21, 'aa@gmail.com', '2000', 'QQUYU', '1000', 'UYUYU', '1000', 'HGHGH', '2500', 'HGHGH', '44545', 'YGGG', '56565', 'GGHGHG', '107610');

-- --------------------------------------------------------

--
-- Table structure for table `conference_details`
--

CREATE TABLE `conference_details` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subjects` varchar(1000) NOT NULL,
  `venue` varchar(1000) NOT NULL,
  `host` varchar(1000) NOT NULL,
  `duration` varchar(1000) NOT NULL,
  `titleOfPaper` varchar(1000) NOT NULL,
  `coAuthers` varchar(1000) NOT NULL,
  `otherFinancial` varchar(1000) NOT NULL,
  `amtReceived` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `conference_details`
--

INSERT INTO `conference_details` (`id`, `email`, `subjects`, `venue`, `host`, `duration`, `titleOfPaper`, `coAuthers`, `otherFinancial`, `amtReceived`) VALUES
(19, 'sngwane1998@gmail.com', 'jjhjhjhjhj', 'hjhjhjhj', 'hjhuhuhu', 'yyttyyg', 'yytyt', 'ytytyty', 'jhj', '8778'),
(20, 'sssss@gmail.com', 'S', 'S', 'S', 'S', 'S', 'S', 'S', '1000'),
(21, 'aa@gmail.com', 'QQ', 'QQ', 'QQ', 'QQ', 'QQ', 'QQ', 'QQ', '2000');

-- --------------------------------------------------------

--
-- Table structure for table `login_details`
--

CREATE TABLE `login_details` (
  `id` int(11) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `passwords` varchar(1000) NOT NULL,
  `role` varchar(1000) NOT NULL,
  `statuss` varchar(100) NOT NULL,
  `snumber` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_details`
--

INSERT INTO `login_details` (`id`, `name`, `email`, `passwords`, `role`, `statuss`, `snumber`) VALUES
(1, 'Mr Syanda Ngwane', 'role1@gmail.com', 'role1', '1', 'Active', '11111'),
(2, 'Mr Lindani Myeni', 'role2@gmail.com', 'role2', '2', 'Active', '22222'),
(3, 'Mr Syathemba Ndlovu', 'role3@gmail.com', 'role3', '3', 'Active', '33333'),
(4, 'Mxo Zondi', 'mxo@gmail.com', 'mxo', '3', 'Active', '12345'),
(8, 'Siyanda Cele', 'syandangwane1998@gmail.com', '123456', '3', 'Active', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `personal_details`
--

CREATE TABLE `personal_details` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `names` varchar(100) NOT NULL,
  `staffNo` varchar(100) NOT NULL,
  `qualification` varchar(1000) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tel` varchar(100) NOT NULL,
  `cell` varchar(100) NOT NULL,
  `department` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `personal_details`
--

INSERT INTO `personal_details` (`id`, `title`, `names`, `staffNo`, `qualification`, `email`, `tel`, `cell`, `department`) VALUES
(19, 'Mr', 'S Ngwane', '11111111', 'ghghgh', 'sngwane1998@gmail.com', '0876767676', '0878787878', 'gghghg'),
(20, 'Prof', 'S', '7676766767', 'S', 'sssss@gmail.com', '0988787876', '0989898988', 'S'),
(21, 'Dr', 'AA', '5665656', 'AA', 'aa@gmail.com', '0989887878', '0989878787', 'IT');

-- --------------------------------------------------------

--
-- Table structure for table `supporting_documents`
--

CREATE TABLE `supporting_documents` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `invitation` varchar(1000) NOT NULL,
  `full_paper` varchar(1000) NOT NULL,
  `proof_of_acceptance` varchar(1000) NOT NULL,
  `official_programme` varchar(1000) NOT NULL,
  `period_date` varchar(1000) NOT NULL,
  `travelling_quotation` varchar(1000) NOT NULL,
  `visa_cost` varchar(1000) NOT NULL,
  `accommodation_costs` varchar(100) NOT NULL,
  `registration_fee` varchar(1000) NOT NULL,
  `proof_of_dhet` varchar(1000) NOT NULL,
  `proof_of_application` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supporting_documents`
--

INSERT INTO `supporting_documents` (`id`, `email`, `invitation`, `full_paper`, `proof_of_acceptance`, `official_programme`, `period_date`, `travelling_quotation`, `visa_cost`, `accommodation_costs`, `registration_fee`, `proof_of_dhet`, `proof_of_application`) VALUES
(23, 'sngwane1998@gmail.com', 'documents/692667459-L4 Basic steps of doing research.pdf', 'documents/2062977533-L4 Basic steps of doing research.pdf', 'documents/172685431-L4 Basic steps of doing research.pdf', 'documents/1756927343-L4 Basic steps of doing research.pdf', 'documents/1319761704-L4 Basic steps of doing research.pdf', 'documents/1740723023-L4 Basic steps of doing research.pdf', 'documents/1378968453-L4 Basic steps of doing research.pdf', 'documents/1655792650-L4 Basic steps of doing research.pdf', 'documents/982793456-L4 Basic steps of doing research.pdf', 'documents/491871832-L4 Basic steps of doing research.pdf', 'documents/742421152-L4 Basic steps of doing research.pdf'),
(24, 'sssss@gmail.com', 'documents/1860576087-Deep Drive on Container Security.pdf', 'documents/145601955-Getting into the Serverless Mindset.pdf', 'documents/1949954517-Intro to AWS Fargate.pdf', 'documents/1173456468-Intro to AWS Fargate.pdf', 'documents/1153587542-Intro to AWS Elastic Beanstalk.pdf', 'documents/397280929-Introduction to Containers.pdf', 'documents/1850423954-Introduction to Serverless Development.pdf', 'documents/862717824-Intro to AWS Elastic Beanstalk.pdf', 'documents/735369950-Getting Sarted with .NET on AWS.pdf', 'documents/986421972-Getting into the Serverless Mindset.pdf', 'documents/1216053710-Deep Drive on Container Security.pdf'),
(25, 'aa@gmail.com', 'documents/1608909153-Deep Drive on Container Security.pdf', 'documents/1427481534-AWS Lambda Foundations.pdf', 'documents/19239800-Intro to AWS Fargate.pdf', 'documents/1136982747-Getting Sarted with .NET on AWS.pdf', 'documents/1939558022-Amazon Elastic Kubernetes Service (EKS) Primer.pdf', 'documents/1987358775-Getting Sarted with .NET on AWS.pdf', 'documents/184802999-Deep Drive on AWS Fargate Building Serverless Containers at Scale.pdf', 'documents/784722997-Introduction to Containers.pdf', 'documents/548153219-Getting Sarted with .NET on AWS.pdf', 'documents/1806072996-Deep Drive on AWS Fargate Building Serverless Containers at Scale.pdf', 'documents/1946168503-Getting into the Serverless Mindset.pdf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `budget_details`
--
ALTER TABLE `budget_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conference_details`
--
ALTER TABLE `conference_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_details`
--
ALTER TABLE `login_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_details`
--
ALTER TABLE `personal_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supporting_documents`
--
ALTER TABLE `supporting_documents`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `budget_details`
--
ALTER TABLE `budget_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `conference_details`
--
ALTER TABLE `conference_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `login_details`
--
ALTER TABLE `login_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_details`
--
ALTER TABLE `personal_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `supporting_documents`
--
ALTER TABLE `supporting_documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
