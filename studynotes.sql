-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 21, 2021 at 01:15 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studynotes`
--

-- --------------------------------------------------------

--
-- Table structure for table `questions_content`
--

DROP TABLE IF EXISTS `questions_content`;
CREATE TABLE IF NOT EXISTS `questions_content` (
  `questionID` int(12) NOT NULL AUTO_INCREMENT,
  `question` mediumtext NOT NULL,
  `answerA` text NOT NULL,
  `answerB` text NOT NULL,
  `answerC` text NOT NULL,
  `answerD` text NOT NULL,
  `correctAnswer` char(1) NOT NULL,
  `questionSheetID` int(8) NOT NULL,
  PRIMARY KEY (`questionID`)
) ENGINE=MyISAM AUTO_INCREMENT=309 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions_content`
--

INSERT INTO `questions_content` (`questionID`, `question`, `answerA`, `answerB`, `answerC`, `answerD`, `correctAnswer`, `questionSheetID`) VALUES
(113, 'They _____ in the basement for three months.', 'were made sleeping', 'were made sleep', 'were made to sleep', 'made to sleep', 'C', 26),
(111, 'She was working on her computer with her baby next to _____.', 'herself', 'her', 'her own', 'hers', 'B', 26),
(112, 'Well never know what might have happened _____ the email earlier.', 'if he sent', 'had he sent', 'if he has sent', 'did he sent', 'B', 26),
(110, 'The woman, who has been missing for 10 days, is believed _____.', 'to be abducted', 'to be abducting', 'to have been abducted', 'to have been abducting', 'C', 26),
(109, 'I wish I _____ those words. But now its too late.', 'not having said', 'have never said', 'never said', 'had never said', 'D', 26),
(107, 'Im very happy _____ in India. I really miss being there.', 'to live', 'to have lived', 'to be lived', 'to be living', 'B', 26),
(108, 'They didnt reach an agreement ______ their differences.', 'on account of', 'due', 'because', 'owing', 'A', 26),
(114, 'Last year, when I last met her, she told me she _____ a letter every day for the last two months.', 'had written', 'has written', 'had been writing', 'wrote', 'C', 26),
(115, 'He _____ robbed as he was walking out of the bank.', 'had', 'did', 'got', 'were', 'C', 26),
(116, 'It _____ the best idea to pay for those tickets by credit card. It was too risky.', 'may not have been', 'may not be', 'might not be', 'must not have been', 'A', 26),
(22, 'Which of the following is a branch of statistics?', 'Descriptive statistics', 'Inferential statistics', 'Industry statistics', 'Both A and B', 'D', 3),
(21, 'Which of the following values is used as a summary measure for a sample, such as a sample mean?', 'Population parameter', 'Sample parameter', 'Sample statistic', 'Population mean', 'C', 3),
(27, 'Which method used to examine inflation rate anticipation, unemployment rate, and capacity utilisation to produce products?', 'Data exporting technique', 'Data importing technique', 'Forecasting technique', 'Data supplying technique', 'C', 3),
(26, 'What are the variables whose calculation is done according to the weight, height, and length known as?', 'Flowchart variables', 'Discrete variables', 'Continuous variables', 'Measuring variables', 'C', 3),
(25, 'To which of the following options do individual respondents, focus groups, and panels of respondents belong?', 'Primary data sources', 'Secondary data sources', 'Itemised data sources', 'Pointed data sources', 'A', 3),
(24, 'Which of the following can also be represented as sample statistics?', 'Lowercase Greek letters', 'Roman letters', 'Associated Roman alphabets', 'Uppercase Greek letters', 'B', 3),
(23, 'The control charts and procedures of descriptive statistics which are used to enhance a procedure can be classified into which of these categories?', 'Behavioural tools', 'Serial tools', 'Industry statistics', 'Statistical tools', 'D', 3),
(217, 'dummy', 'dummy', 'dummy', 'dummy', 'dummy', 'B', 43),
(216, 'dummy', 'dummy', 'dummy', 'dummy', 'dummy', 'C', 43),
(215, 'dummy', 'dummy', 'dummy', 'dummy', 'dummy', 'D', 43),
(214, 'dummy', 'dummy', 'dummy', 'dummy', 'dummy', 'C', 43),
(213, 'dummy', 'dummy', 'dummy', 'dummy', 'dummy', 'B', 43),
(212, 'dummy', 'dummy', 'dummy', 'dummy', 'dummy', 'C', 43),
(211, 'dummy', 'dummy', 'dummy', 'dummy', 'dummy', 'A', 43),
(210, 'dummy', 'dummy', 'dummy', 'dummy', 'dummy', 'B', 43),
(209, 'dummy', 'dummy', 'dummy', 'dummy', 'dummy', 'A', 43),
(30, 'Review of performance appraisal, labour turnover rates, planning of incentives, and training programs are the examples of which of the following?', 'Statistics in production', 'Statistics in marketing', 'Statistics in finance', 'Statistics in personnel management', 'D', 3),
(29, 'What is the scale applied in statistics, which imparts a difference of magnitude and proportions, is considered as?', 'Exponential scale', 'Goodness scale', 'Ratio scale', 'Satisfactory scale', 'C', 3),
(28, 'Specialised processes such as graphical and numerical methods are utilised in which of the following?', 'Education statistics', 'Descriptive statistics', 'Business statistics', 'Social statistics', 'B', 3),
(218, 'dummy', 'dummy', 'dummy', 'dummy', 'dummy', 'A', 43);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(30) NOT NULL,
  `email` varchar(320) NOT NULL,
  `password` varchar(30) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `email`, `password`) VALUES
('YanYee', 'yy@gmail.com', '123'),
('helloWorld', 'helloworld123@gmail.com', '123abc'),
('adam123', 'adam_123@gmail.com', 'adam123'),
('Lee', 'yy86@gmail.com', '123'),
('hihi', 'hihi@gmail.com', 'hihi');

-- --------------------------------------------------------

--
-- Table structure for table `user_question_sheet`
--

DROP TABLE IF EXISTS `user_question_sheet`;
CREATE TABLE IF NOT EXISTS `user_question_sheet` (
  `questionSheetID` int(8) NOT NULL AUTO_INCREMENT,
  `title` varchar(300) NOT NULL,
  `username` varchar(30) NOT NULL,
  `dateCreated` date NOT NULL,
  PRIMARY KEY (`questionSheetID`)
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_question_sheet`
--

INSERT INTO `user_question_sheet` (`questionSheetID`, `title`, `username`, `dateCreated`) VALUES
(3, 'Statistics', 'YanYee', '2021-11-19'),
(43, 'dummy, to be deleted', 'YanYee', '2021-11-20'),
(26, 'English', 'adam123', '2021-11-20');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
