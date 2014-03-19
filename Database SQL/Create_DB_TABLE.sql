-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.12-log - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             8.3.0.4694
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for prac1
CREATE DATABASE IF NOT EXISTS `prac1` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `prac1`;


-- Dumping structure for table prac1.answers1s
CREATE TABLE IF NOT EXISTS `answers1s` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `survey_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `ans` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_ANSWER1_ENROLL1_idx` (`survey_id`),
  KEY `fk_ANSWER1_QUESTION1_idx` (`question_id`),
  CONSTRAINT `fk_ANSWER1_ENROLL1` FOREIGN KEY (`survey_id`) REFERENCES `surveys` (`id`),
  CONSTRAINT `fk_ANSWER1_QUESTION1` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.


-- Dumping structure for table prac1.answers2s
CREATE TABLE IF NOT EXISTS `answers2s` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `survey_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `ans` text,
  PRIMARY KEY (`id`),
  KEY `fk_ANSWER2_ENROLL1_idx` (`survey_id`),
  KEY `fk_ANSWER2_QUESTION1_idx` (`question_id`),
  CONSTRAINT `fk_ANSWER2_ENROLL1` FOREIGN KEY (`survey_id`) REFERENCES `surveys` (`id`),
  CONSTRAINT `fk_ANSWER2_QUESTION1` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.


-- Dumping structure for table prac1.courses
CREATE TABLE IF NOT EXISTS `courses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `program_id` int(11) NOT NULL,
  `code` varchar(6) DEFAULT NULL,
  `name` text,
  PRIMARY KEY (`id`),
  KEY `fk_COURSE_PROGRAM1_idx` (`program_id`),
  CONSTRAINT `fk_COURSE_PROGRAM1` FOREIGN KEY (`program_id`) REFERENCES `programs` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.


-- Dumping structure for table prac1.courses_users
CREATE TABLE IF NOT EXISTS `courses_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_courses_users_users1_idx` (`user_id`),
  KEY `fk_courses_users_courses1_idx` (`course_id`),
  CONSTRAINT `fk_courses_users_courses1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
  CONSTRAINT `fk_courses_users_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.


-- Dumping structure for table prac1.faculties
CREATE TABLE IF NOT EXISTS `faculties` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.


-- Dumping structure for table prac1.groups
CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) NOT NULL,
  `name` varchar(7) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_groups_courses1_idx` (`course_id`),
  CONSTRAINT `fk_groups_courses1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.


-- Dumping structure for table prac1.groups_users
CREATE TABLE IF NOT EXISTS `groups_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `stats` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_groups_users_users1_idx` (`user_id`),
  KEY `fk_groups_users_groups1_idx` (`group_id`),
  CONSTRAINT `fk_groups_users_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`),
  CONSTRAINT `fk_groups_users_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.


-- Dumping structure for table prac1.programs
CREATE TABLE IF NOT EXISTS `programs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `faculty_id` int(11) NOT NULL,
  `code` varchar(5) DEFAULT NULL,
  `name` text,
  PRIMARY KEY (`id`),
  KEY `fk_PROGRAM_FACULTY1_idx` (`faculty_id`),
  CONSTRAINT `fk_PROGRAM_FACULTY1` FOREIGN KEY (`faculty_id`) REFERENCES `faculties` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.


-- Dumping structure for table prac1.questions
CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(11) NOT NULL,
  `ques` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.


-- Dumping structure for table prac1.scores
CREATE TABLE IF NOT EXISTS `scores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `survey_id` int(11) NOT NULL,
  `secta` double DEFAULT NULL,
  `sectb` double DEFAULT NULL,
  `sectc` double DEFAULT NULL,
  `sectd` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_SCORE_ENROLL1_idx` (`survey_id`),
  CONSTRAINT `fk_SCORE_ENROLL1` FOREIGN KEY (`survey_id`) REFERENCES `surveys` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.


-- Dumping structure for table prac1.semesters
CREATE TABLE IF NOT EXISTS `semesters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `startmonth` varchar(5) DEFAULT NULL,
  `startyear` year(4) DEFAULT NULL,
  `endmonth` varchar(5) DEFAULT NULL,
  `endyear` year(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.


-- Dumping structure for table prac1.surveys
CREATE TABLE IF NOT EXISTS `surveys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `semester_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_ENROLL_USERS_idx` (`user_id`),
  KEY `fk_ENROLL_COURSE1_idx` (`course_id`),
  KEY `fk_ENROLL_SEMESTER1_idx` (`semester_id`),
  KEY `fk_surveys_groups1_idx` (`group_id`),
  CONSTRAINT `fk_ENROLL_COURSE1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
  CONSTRAINT `fk_ENROLL_SEMESTER1` FOREIGN KEY (`semester_id`) REFERENCES `semesters` (`id`),
  CONSTRAINT `fk_ENROLL_USERS` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `fk_surveys_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.


-- Dumping structure for table prac1.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `faculty_id` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `pswd` varchar(45) DEFAULT NULL,
  `fname` text,
  `role` int(1) DEFAULT NULL,
  `addrs` text,
  `nric` text,
  `email` text,
  `gender` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `USR_UID_UNIQUE` (`uid`),
  KEY `fk_USERS_FACULTY1_idx` (`faculty_id`),
  CONSTRAINT `fk_USERS_FACULTY1` FOREIGN KEY (`faculty_id`) REFERENCES `faculties` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
