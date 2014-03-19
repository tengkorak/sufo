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
-- Dumping data for table prac1.answers1s: ~4 rows (approximately)
/*!40000 ALTER TABLE `answers1s` DISABLE KEYS */;
INSERT INTO `answers1s` (`id`, `survey_id`, `question_id`, `ans`) VALUES
	(1, 1, 1, 3),
	(2, 2, 1, 3),
	(3, 1, 2, 2),
	(4, 2, 2, 4);
/*!40000 ALTER TABLE `answers1s` ENABLE KEYS */;

-- Dumping data for table prac1.answers2s: ~0 rows (approximately)
/*!40000 ALTER TABLE `answers2s` DISABLE KEYS */;
/*!40000 ALTER TABLE `answers2s` ENABLE KEYS */;

-- Dumping data for table prac1.courses: ~3 rows (approximately)
/*!40000 ALTER TABLE `courses` DISABLE KEYS */;
INSERT INTO `courses` (`id`, `program_id`, `code`, `name`) VALUES
	(555231, 231, 'ITT555', 'Web Project Management'),
	(650225, 225, 'CSP650', 'Project'),
	(650231, 231, 'CSP650', 'Project');
/*!40000 ALTER TABLE `courses` ENABLE KEYS */;

-- Dumping data for table prac1.courses_users: ~1 rows (approximately)
/*!40000 ALTER TABLE `courses_users` DISABLE KEYS */;
INSERT INTO `courses_users` (`id`, `user_id`, `course_id`) VALUES
	(1, 3, 650231),
	(5, 3, 555231);
/*!40000 ALTER TABLE `courses_users` ENABLE KEYS */;

-- Dumping data for table prac1.faculties: ~2 rows (approximately)
/*!40000 ALTER TABLE `faculties` DISABLE KEYS */;
INSERT INTO `faculties` (`id`, `name`) VALUES
	(1, 'FSKM'),
	(2, 'Dentistry');
/*!40000 ALTER TABLE `faculties` ENABLE KEYS */;

-- Dumping data for table prac1.groups: ~0 rows (approximately)
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` (`id`, `course_id`, `name`) VALUES
	(1, 650231, 'CS2316A'),
	(2, 650231, 'CS2316B');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;

-- Dumping data for table prac1.groups_users: ~2 rows (approximately)
/*!40000 ALTER TABLE `groups_users` DISABLE KEYS */;
INSERT INTO `groups_users` (`id`, `user_id`, `group_id`, `stats`) VALUES
	(1, 1, 1, 0),
	(2, 2, 1, 0);
/*!40000 ALTER TABLE `groups_users` ENABLE KEYS */;

-- Dumping data for table prac1.programs: ~2 rows (approximately)
/*!40000 ALTER TABLE `programs` DISABLE KEYS */;
INSERT INTO `programs` (`id`, `faculty_id`, `code`, `name`) VALUES
	(225, 1, 'CS225', 'Networking'),
	(231, 1, 'CS231', 'Netcentric Computing');
/*!40000 ALTER TABLE `programs` ENABLE KEYS */;

-- Dumping data for table prac1.questions: ~27 rows (approximately)
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` (`id`, `ques`) VALUES
	(1, 'Saya berminat dengan kursus ini.<br/> <i>\nI am interested in this course.</i>\n'),
	(2, 'Saya sentiasa hadir ke sesi syarahan/tutorial/makmal/studio/kerja lapangan untuk kursus ini. <br/><i>\nI am always present during all lecture/tutorial/studio/fieldwork sessions for this course.</i>\n'),
	(3, 'Saya sentiasa bersedia untuk setiap sesi syarahan/tutorial/makmal/studio/kerja lapangan untuk kursus ini.<br/><i>\nI am always prepared for every lecture/tutorial/laboratory/studio/fieldwork sessions for this course.</i>\n'),
	(4, 'Pensyarah memaklumkan perancangan pengajaran/skema kerja kepada pelajar.<br/><i>\nThe lecturer informs the students about the teaching plan/scheme of work for this course.</i>\n'),
	(5, 'Pensyarah menerangkan dengan jelas tentang hasil kursus dan pembelajaran kepada pelajar.<br/><i>\nThe lecturer provides a clear explanation about the course outcomes and the learning outcomes to the students.</i>\n'),
	(6, 'Pensyarah menerangkan cara penilaian kursus dengan jelas kepada pelajar.<br/><i>\nThe lecturer clearly explains to the students the assessment procedure for this course.</i>\n'),
	(7, 'Pensyarah mengendalikan sesi syarahan/tutorial/makmal/studio/klinikal/kerja lapangan yang ditangguhkan.<br/><i>\nThe lecturer conducts lecture/tutorial/laboratory/studio/clinical/fieldwork sessions based on the teaching plan for this course.</i>'),
	(8, 'Pensyarah memenuhi waktu pengajaran yang dijadualkan.<br/><i>\nThe lecturer observes the scheduled training hours for this course.</i>'),
	(9, 'Pensyarah menggantikan setiap sesi syarahan/tutorial/makmal/studio/klinikal/kerja lapangan yang ditangguhkan.<br/>\n(Sekiranya pensyarah tidak pernah menangguhkan kelas, sila abaikan soalan ini.)<br/><i>\nThe lecturer replaces every lecture/tutorial/laboratory/studio/clinical/field work sessions which has been postponed.<br/>\n(If lecturer never postpones lecture, do not answer this question.)</i>\n'),
	(10, 'Pensyarah mengambil berat tentang kehadiran pelajar. <br/><i>\nThe lecturer is concerned about the studentsâ€™ attendance.</i>'),
	(11, 'Pensyarah menggunakan Bahasa Inggeris sebagai bahasa pengantar semasa kuliah (jika berkaitan). <br/><i>\nThe lecturer uses English language during lectures (where applicable).</i>\n'),
	(12, 'Pensyarah sentiasa bersedia untuk setiap sesi pertemuan/pengajaran.<br/><i>\nThe lecturer is always prepared for every meeting/lecture.</i>'),
	(13, 'Pensyarah berusaha untuk membantu pelajar untuk memahami pelajaran.<br/><i>\nThe lecturer makes effort to help students understand the lessons.</i>'),
	(14, 'Pensyarah menggunakan/mencadangkan bahan pengajaran/pembelajaran/rujukan yang sesuai.<br/><i>\nThe lecturer uses/suggests suitable teaching aids/references.</i>'),
	(15, 'Pensyarah menggunakan kaedah penyampaian yang sesuai dan berkesan.<br/><i>\nThe lecturer uses effective and appropriate teaching techniques.</i>'),
	(16, 'Pensyarah menggalakkan pelajar bertanya soalan dan mengemukakan pendapat.<br/><i>\nThe lecturer encourages the students to ask questions and give opinions.</i>'),
	(17, 'Pensyarah bersedia memberi bimbingan akademik kepada pelajar.<br/><i>\nThe lecturer is prepared to provide academic guidance to students.</i>'),
	(18, 'Pensyarah memberi ujian/penilaian/tugasan yang sesuai dengan hasil pembelajaran dan hasil kusus.<br/>\nThe lecturer gives tests/evaluation/assignments in line with the learning and course outcomes.'),
	(19, 'Pensyarah memaklumkan setiap hasil penilaian kepada pelajar. <br/><i>\nThe lecturer informs every assessment results to the students.</i>\n'),
	(20, 'Pensyarah berpakaian kemas dan sopan.<br/><i>\nThe lecturer is appropriately attired.</i>\n'),
	(21, 'Pensyarah membincangkan isu-isu yang relevan dengan bidang semasa sesi pertemuan rasmi.<br/><i>\nThe lecturer discusses relevant issues pertaining to the course during lectures.</i>\n'),
	(22, 'Pensyarah mudah dihubungi untuk perbincangan.<br/><i>\nThe lecturer is easily contactable for discussions. </i>\n'),
	(23, 'Secara keseluruhannya, saya berpuas hati dengan pengajaran pensyarah ini.<br/><i>\nIn general, I am satisfied with the lecturerâ€™s teaching.</i>'),
	(24, 'Kelengkapan ruang kondusif untuk pembelajaran dan pengajaran.<br/><i>\nThe space is conducive for teaching and learning.</i>\n'),
	(25, 'Kelengkapan dan peralatan pengajaran bagi kursus ini mencukupi dan berfungsi.<br/><i>\nThe teaching and learning equipments are adequate and functioning.</i>\n'),
	(26, 'Nyatakan apa yang anda suka tentang kursus ini.<br/><i>\nState what you like about this course.</i>\n'),
	(27, 'Cadangkan aspek penambahbaikan untuk kursus ini.<br/><i>\nSuggest improvements to aspects of the course.</i>');
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;

-- Dumping data for table prac1.scores: ~0 rows (approximately)
/*!40000 ALTER TABLE `scores` DISABLE KEYS */;
/*!40000 ALTER TABLE `scores` ENABLE KEYS */;

-- Dumping data for table prac1.semesters: ~2 rows (approximately)
/*!40000 ALTER TABLE `semesters` DISABLE KEYS */;
INSERT INTO `semesters` (`id`, `startmonth`, `startyear`, `endmonth`, `endyear`) VALUES
	(20131, 'Sept', '2013', 'Jan', '2014'),
	(20141, 'Mac', '2014', 'Jun', '2014');
/*!40000 ALTER TABLE `semesters` ENABLE KEYS */;

-- Dumping data for table prac1.surveys: ~2 rows (approximately)
/*!40000 ALTER TABLE `surveys` DISABLE KEYS */;
INSERT INTO `surveys` (`id`, `user_id`, `course_id`, `semester_id`, `group_id`) VALUES
	(1, 1, 650231, 20131, 1),
	(2, 2, 650231, 20131, 1);
/*!40000 ALTER TABLE `surveys` ENABLE KEYS */;

-- Dumping data for table prac1.users: ~4 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `faculty_id`, `uid`, `pswd`, `fname`, `role`, `addrs`, `nric`, `email`, `gender`) VALUES
	(1, 1, 111111, '123456', 'Student 1', 3, NULL, NULL, NULL, NULL),
	(2, 1, 222222, '123456', 'Student 2', 3, NULL, NULL, NULL, NULL),
	(3, 1, 99901, '123456', 'Lecturer 1', 2, NULL, NULL, NULL, NULL),
	(999999, 1, 999999, 'admin', 'Administrator', 1, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
