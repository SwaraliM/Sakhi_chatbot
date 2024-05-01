-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2023 at 03:44 PM
-- Server version: 8.1.0
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `position` varchar(20) DEFAULT NULL,
  `profileURL` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `position`, `profileURL`) VALUES
(1, 'Nisha', 'admin', 'Women Redressal', 'Screenshots\Women-Development-Cell.png'),
(2, 'Priyanka', 'admin', 'ICC admin', 'Screenshots\Women-Development-Cell.png');

-- -------------------------------------------------------
--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `id` int NOT NULL,
  `name` varchar(30) NOT NULL,
  `contact` varchar(12) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `title` varchar(300) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `uniqueId` varchar(10) DEFAULT NULL,
  `status` int DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`id`, `name`, `contact`, `email`, `title`, `description`, `uniqueId`, `status`, `remarks`) VALUES
(1, 'Amit Sharma', '9876543210', 'amit@example.com', 'Sexual Innuendo in the Break Room', 'Employee reports repeated inappropriate comments of a sexual nature by a coworker during lunch breaks.', 'ABCD1234', 1, 'High'),
(2, 'Priya Patel', '9876543211', 'priya@example.com', 'Discriminatory Hiring Practices', 'Applicant files complaint alleging biased interview questions and unequal treatment based on ethnicity.', 'EFGH5678', 1, 'Medium'),
(3, 'Rajesh Kumar', '9876543212', 'rajesh@example.com', 'Bullying by Supervisor', 'Employee reports consistent verbal abuse and intimidation tactics from their direct supervisor.', 'IJKL9012', 1, 'High'),
(4, 'Neha Verma', '9876543213', 'neha@example.com', 'Unwanted Physical Contact at Meetings', 'Employee raises concern about a colleague who frequently invades personal space and touches without consent during office meetings.', 'MNOP3456', 1, 'High'),
(5, 'Ankur Gupta', '9876543214', 'ankur@example.com', 'Hostile Work Environment Due to Ageism', 'Older employee files complaint citing age-based jokes, exclusion, and derogatory remarks from coworkers.', 'QRST7890', 1, 'Medium'),
(6, 'Pooja Singh', '9876543215', 'pooja@example.com', 'Gender-Based Microaggressions', 'Female employee reports constant subtle sexism including interrupted speech, dismissive attitudes, and unequal workload distribution.', 'UVWX1234', 1, 'High'),
(7, 'Rahul Singh', '9876543216', 'rahul@example.com', 'Racial Profiling During Performance Reviews', 'Employee claims their performance evaluations consistently highlight racial stereotypes rather than actual job performance.', 'YZAB5678', 2, 'Medium'),
(8, 'Nisha Gupta', '9876543219', 'nisha@example.com', 'Harassment Based on Sexual Orientation', ' LGBTQ+ employee faces derogatory comments, jokes, and exclusion from coworkers due to their sexual orientation.', 'KLMN7890', 1, 'High'),
(9, 'Vikram Sharma', '9876543220', 'vikram@example.com', 'Gender Identity Discrimination in Bathroom Access', 'Transgender employee files complaint after being denied access to the restroom corresponding with their gender identity.', 'OPQR1234', 1, 'Low'),
(10, 'Arun Singh', '9876543222', 'arun@example.com', 'Persistent Verbal Abuse by Senior Management', 'Employee endures ongoing verbal attacks and belittlement from higher-ups, impacting their mental well-being and job performance.', 'WXYZ9012', 1, 'High');
-- (15, 'Kavita Patel', '9876543223', 'kavita@example.com', 'Late Response', 'I sent an email with a query, but I haven\'t received a response yet.', 'ABCD2345', 1, 'Medium'),
-- (16, 'Rajat Gupta', '9876543224', 'rajat@example.com', 'Faulty Electronics', 'The electronic device I purchased is malfunctioning.', 'EFGH3456', 1, 'High'),
-- (17, 'Suman Kumar', '9876543225', 'suman@example.com', 'Wrong Size', 'The clothing I ordered is not the size I specified.', 'IJKL4567', 1, 'Medium'),
-- (18, 'Adyut', '9131987420', 'kumaradyut@gmail.com', 'Watch problem', 'My watch stopped working after water damage.', 'EKC67', 1, 'hot hai'),
-- (19, 'Vishal .', '7876170032', 'vishalparmar3542@gmail.com', 'Accenture package ', 'I am not getting what I deserve in accenture. LOL', 'DAO99', 1, 'LOL aaukat me'),
-- (20, 'Vishal .', '7876170032', 'vishalparmar3542@gmail.com', 'Accenture package ', 'I am not getting what I deserve in accenture. LOL', '1A8MX', 2, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;