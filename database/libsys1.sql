-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2017 at 12:32 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `libsys1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `firstname`, `middlename`, `lastname`) VALUES
(1, 'admin', 'admin', 'jay', 'h', 'savani');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_id` int(11) NOT NULL,
  `book_title` varchar(50) NOT NULL,
  `book_description` varchar(100) NOT NULL,
  `book_category` varchar(100) NOT NULL,
  `book_author` varchar(100) NOT NULL,
  `date_publish` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `book_title`, `book_description`, `book_category`, `book_author`, `date_publish`, `qty`) VALUES
(5, 'introduction to algorithm', 'algorithm theory', 'algorithm theory', 'padma reddy', '2017-01-04', 5),
(6, 'the c programming', 'programming language', 'code', 'vikas gupta', '2017-05-11', 5),
(7, 'relational dbms', 'datbase description', 'database', 'robert morrison', '2016-06-16', 5),
(10, 'essential engineering maths', 'maths related to engineering', 'mech', 'michael betty', '2017-03-01', 5),
(11, 'automation & robotics', 'theory about automation', 'mech', 'aditi mittal', '2017-05-01', 5),
(12, 'machine designs', 'designing of machines', 'design', 'v.b.bhanderi', '2017-07-01', 5),
(13, 'mechanics of material', 'about materials', 'design', 'jayprakash gupta', '2017-08-01', 5),
(14, 'thermodynamics', 'processing of materials', 'mech', 'prakash nag', '2017-09-01', 5),
(15, 'introduction to chemical engineering', 'introduction', 'chemical', 'james smith', '2017-10-01', 5),
(16, 'process system analysis', 'analysing process', 'analysis', 'donald williams', '2016-06-16', 5),
(17, 'process modeling', 'about process', 'analysis', 'williams luiben', '2016-02-01', 5),
(18, 'optimisation of chemical process', 'about process', 'chemical', 'thomas edge', '2016-07-02', 5),
(19, 'principas of polymeric materials', 'about polymerisation', 'analysis', 'stephen rosen', '2016-05-25', 5),
(20, 'engineering mathematics 1', 'mathematics', 'mathematics', 'vikas aggarwal', '2015-01-14', 5),
(22, 'engineering mathematics 3', 'mathematics', 'mathematics', 'vikas aggarwal', '2015-03-28', 5),
(23, 'engineering mathematics 4', 'mathematics', 'mathematics', 'vikas aggarwal', '2015-04-08', 5);

-- --------------------------------------------------------

--
-- Table structure for table `borrowing`
--

CREATE TABLE `borrowing` (
  `borrow_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `borrowing`
--

INSERT INTO `borrowing` (`borrow_id`, `book_id`, `student_id`, `qty`, `date`, `status`) VALUES
(10, 5, 5, 1, '2017-11-06', 'Borrowed'),
(11, 6, 5, 1, '2017-11-06', 'Borrowed'),
(12, 7, 5, 1, '2017-11-06', 'Borrowed'),
(14, 5, 8, 1, '2017-11-06', 'Borrowed'),
(15, 6, 8, 1, '2017-11-06', 'Borrowed'),
(16, 7, 8, 1, '2017-11-06', 'Borrowed'),
(21, 5, 19, 1, '2017-11-06', 'Borrowed'),
(22, 6, 19, 1, '2017-11-06', 'Borrowed');

-- --------------------------------------------------------

--
-- Table structure for table `sessiondata`
--

CREATE TABLE `sessiondata` (
  `session_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `student_no` varchar(20) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `course` varchar(50) NOT NULL,
  `section` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `student_no`, `firstname`, `middlename`, `lastname`, `course`, `section`) VALUES
(4, '15cs01', 'ram', 'lal', 'sharma', 'cse', '1a'),
(5, '15cs02', 'shyam', 'kumar', 'varma', 'cse', '3b'),
(7, '15cs04', 'rahul', '', 'mishra', 'cse', '4a'),
(8, '15cs05', 'sakir', '', 'shekh', 'cse', '2b'),
(9, '15is04', 'binni', '', 'sodhi', 'ise', '1a'),
(11, '15is03', 'varun', 'kumar', 'dhawan', 'ise', '4a'),
(13, '15is05', 'tapsee', 'kumari', 'pannu', 'ise', '2a'),
(14, '15che02', 'siddharth', '', 'malhotra', 'chemical', '1a'),
(15, '15che01', 'ranveer', '', 'singh', 'cse', '3b'),
(16, '15che03', 'disha', '', 'patani', 'chemical', '3b'),
(17, '15che04', 'rohan', '', 'joshi', 'chemical', '3a'),
(18, '15che05', 'ashish', '', 'shakya', 'chemical', '4b'),
(19, '15me01', 'prem', '', 'chopra', 'mech', '4a'),
(20, '15me02', 'gautam', '', 'singhaniya', 'mech', '4b'),
(21, '15me03', 'rahul', '', 'meena', 'mech', '1a'),
(22, '15me04', 'divyanshu', '', 'bansal', 'mech', '2a'),
(23, '15me05', 'shivam', 'singh', 'shastri', 'mech', '2b'),
(25, '15cs03', 'hitesh', '', 'patel', 'cse', '3a');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `borrowing`
--
ALTER TABLE `borrowing`
  ADD PRIMARY KEY (`borrow_id`),
  ADD KEY `FK_Borrow_book` (`book_id`),
  ADD KEY `FK_Borrow_student` (`student_id`);

--
-- Indexes for table `sessiondata`
--
ALTER TABLE `sessiondata`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `FK_session_admin` (`admin_id`),
  ADD KEY `FK_session_book` (`book_id`),
  ADD KEY `FK_session_student` (`student_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `student_id` (`student_id`),
  ADD UNIQUE KEY `student_no` (`student_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `borrowing`
--
ALTER TABLE `borrowing`
  MODIFY `borrow_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `sessiondata`
--
ALTER TABLE `sessiondata`
  MODIFY `session_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `borrowing`
--
ALTER TABLE `borrowing`
  ADD CONSTRAINT `FK_Borrow_book` FOREIGN KEY (`book_id`) REFERENCES `book` (`book_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Borrow_student` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sessiondata`
--
ALTER TABLE `sessiondata`
  ADD CONSTRAINT `FK_session_admin` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_session_book` FOREIGN KEY (`book_id`) REFERENCES `book` (`book_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_session_student` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
