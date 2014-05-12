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
-- Dumping data for table prac1.answers1s: ~75 rows (approximately)
/*!40000 ALTER TABLE `answers1s` DISABLE KEYS */;
INSERT INTO `answers1s` (`id`, `survey_id`, `question_id`, `ans`) VALUES
	(1, 1, 1, 1),
	(2, 1, 2, 2),
	(3, 1, 3, 1),
	(4, 1, 4, 3),
	(5, 1, 5, 1),
	(6, 1, 6, 4),
	(7, 1, 7, 1),
	(8, 1, 8, 2),
	(9, 1, 9, 3),
	(10, 1, 10, 4),
	(11, 1, 11, 1),
	(12, 1, 12, 2),
	(13, 1, 13, 3),
	(14, 1, 14, 4),
	(15, 1, 15, 1),
	(16, 1, 16, 3),
	(17, 1, 17, 2),
	(18, 1, 18, 1),
	(19, 1, 19, 2),
	(20, 1, 20, 3),
	(21, 1, 21, 4),
	(22, 1, 22, 3),
	(23, 1, 23, 1),
	(24, 1, 24, 2),
	(25, 1, 25, 4),
	(26, 3, 1, 1),
	(27, 3, 2, 3),
	(28, 3, 3, 2),
	(29, 3, 4, 3),
	(30, 3, 5, 1),
	(31, 3, 6, 4),
	(32, 3, 7, 1),
	(33, 3, 8, 1),
	(34, 3, 9, 3),
	(35, 3, 10, 2),
	(36, 3, 11, 4),
	(37, 3, 12, 4),
	(38, 3, 13, 3),
	(39, 3, 14, 1),
	(40, 3, 15, 2),
	(41, 3, 16, 2),
	(42, 3, 17, 3),
	(43, 3, 18, 3),
	(44, 3, 19, 1),
	(45, 3, 20, 4),
	(46, 3, 21, 2),
	(47, 3, 22, 2),
	(48, 3, 23, 1),
	(49, 3, 24, 3),
	(50, 3, 25, 4),
	(51, 4, 1, 1),
	(52, 4, 2, 2),
	(53, 4, 3, 1),
	(54, 4, 4, 3),
	(55, 4, 5, 1),
	(56, 4, 6, 4),
	(57, 4, 7, 1),
	(58, 4, 8, 3),
	(59, 4, 9, 2),
	(60, 4, 10, 1),
	(61, 4, 11, 2),
	(62, 4, 12, 3),
	(63, 4, 13, 2),
	(64, 4, 14, 4),
	(65, 4, 15, 3),
	(66, 4, 16, 2),
	(67, 4, 17, 3),
	(68, 4, 18, 1),
	(69, 4, 19, 3),
	(70, 4, 20, 1),
	(71, 4, 21, 2),
	(72, 4, 22, 4),
	(73, 4, 23, 1),
	(74, 4, 24, 3),
	(75, 4, 25, 2);
/*!40000 ALTER TABLE `answers1s` ENABLE KEYS */;

-- Dumping data for table prac1.answers2s: ~6 rows (approximately)
/*!40000 ALTER TABLE `answers2s` DISABLE KEYS */;
INSERT INTO `answers2s` (`id`, `survey_id`, `question_id`, `ans`) VALUES
	(1, 1, 26, '1'),
	(2, 1, 27, '2'),
	(3, 3, 26, '1'),
	(4, 3, 27, '2'),
	(5, 4, 26, '2'),
	(6, 4, 27, '1');
/*!40000 ALTER TABLE `answers2s` ENABLE KEYS */;

-- Dumping data for table prac1.campuses: ~25 rows (approximately)
/*!40000 ALTER TABLE `campuses` DISABLE KEYS */;
INSERT INTO `campuses` (`id`, `name`, `code`) VALUES
	(1, 'UiTM Shah Alam', 'SA'),
	(2, 'UiTM Puncak Alam', 'ML'),
	(3, 'UiTM Puncak Perdana', NULL),
	(4, 'UiTM Jalan Othman', NULL),
	(5, 'UiTM Hospital Selayang', NULL),
	(6, 'UiTM Johor', NULL),
	(7, 'UiTM Johor Bahru', NULL),
	(8, 'UiTM Kedah', NULL),
	(9, 'UiTM Kelantan', NULL),
	(10, 'UiTM Kota Bharu', NULL),
	(11, 'UiTM Melaka', NULL),
	(12, 'UiTM Bandaraya Melaka', NULL),
	(13, 'UiTM Negeri Sembilan', NULL),
	(14, 'UiTM Pahang', NULL),
	(15, 'UiTM Kuantan', NULL),
	(16, 'UiTM Perak', NULL),
	(17, 'UiTM Perlis', NULL),
	(18, 'UiTM Pulau Pinang', NULL),
	(19, 'UiTM Sabah', NULL),
	(20, 'UiTM Tawau', NULL),
	(21, 'UiTM Sarawak', NULL),
	(22, 'UiTM Kuching', NULL),
	(23, 'UiTM Terengganu', NULL),
	(24, 'UiTM Kuala Terengganu', NULL),
	(25, 'UiTM Besut', NULL);
/*!40000 ALTER TABLE `campuses` ENABLE KEYS */;

-- Dumping data for table prac1.courses: ~4 rows (approximately)
/*!40000 ALTER TABLE `courses` DISABLE KEYS */;
INSERT INTO `courses` (`id`, `program_id`, `code`, `name`) VALUES
	(550225, 225, 'ITT550', 'Network Design'),
	(550231, 231, 'ITT550', 'Network Design'),
	(650225, 225, 'CSP650', 'Project'),
	(650231, 231, 'CSP650', 'Project');
/*!40000 ALTER TABLE `courses` ENABLE KEYS */;

-- Dumping data for table prac1.courses_users: ~3 rows (approximately)
/*!40000 ALTER TABLE `courses_users` DISABLE KEYS */;
INSERT INTO `courses_users` (`id`, `user_id`, `course_id`) VALUES
	(3, 3, 650231),
	(4, 3, 550225),
	(5, 5, 550231);
/*!40000 ALTER TABLE `courses_users` ENABLE KEYS */;

-- Dumping data for table prac1.faculties: ~27 rows (approximately)
/*!40000 ALTER TABLE `faculties` DISABLE KEYS */;
INSERT INTO `faculties` (`id`, `name`, `code`) VALUES
	(1, 'Fakulti Undang-Undang', ''),
	(2, 'Fakulti Perakaunan', ''),
	(3, 'Fakulti Pentadbiran & Pengajian Polisi', ''),
	(4, 'Fakulti Pengurusan Perniagaan', ''),
	(5, 'Fakulti Kejuruteraan Awam', ''),
	(6, 'Fakulti Kejuruteraan Elektrik', ''),
	(7, 'Fakulti Kejuruteraan Mekanikal', ''),
	(8, 'Fakulti Kejuruteraan Kimia', ''),
	(9, 'Fakulti Seni Bina Perancangan & Ukur', ''),
	(10, 'Fakulti Seni Persembahan', ''),
	(11, 'Fakulti Seni Lukis & Seni Reka', ''),
	(12, 'Fakulti Perubatan', ''),
	(13, 'Fakulti Farmasi', ''),
	(14, 'Fakulti Sains Kesihatan', ''),
	(15, 'Fakulti Pergigian', ''),
	(16, 'Fakulti Pengurusan Maklumat', ''),
	(17, 'Fakulti Pengurusan & Teknologi Pejabat', ''),
	(18, 'Fakulti Komunikasi dan Pengajian Media', ''),
	(19, 'Fakulti Pengurusan Hotel & Pelancongan', ''),
	(20, 'Fakulti Teknologi Kreatif Dan Artistik', ''),
	(21, 'Fakulti Sains Gunaan', ''),
	(22, 'Fakulti Sains Sukan Dan Rekreasi', ''),
	(23, 'Fakulti Teknologi Maklumat & Sains Kuantitatif', ''),
	(24, 'Fakulti Pendidikan', ''),
	(25, 'Akademi Pengajian Bahasa', ''),
	(26, 'Pusat Pendidikan Antarabangsa', ''),
	(27, 'Pusat Pemikiran Dan Pemahaman Islam', '');
/*!40000 ALTER TABLE `faculties` ENABLE KEYS */;

-- Dumping data for table prac1.groups: ~4 rows (approximately)
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` (`id`, `course_id`, `name`) VALUES
	(1, 650231, 'CS2316A'),
	(2, 550231, 'CS2316A'),
	(3, 550225, 'CS2256A'),
	(4, 650225, 'CS2256A');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;

-- Dumping data for table prac1.groups_users: ~3 rows (approximately)
/*!40000 ALTER TABLE `groups_users` DISABLE KEYS */;
INSERT INTO `groups_users` (`id`, `user_id`, `group_id`, `stats`) VALUES
	(1, 1, 1, 1),
	(2, 1, 2, 1),
	(3, 2, 3, 1);
/*!40000 ALTER TABLE `groups_users` ENABLE KEYS */;

-- Dumping data for table prac1.programs: ~2 rows (approximately)
/*!40000 ALTER TABLE `programs` DISABLE KEYS */;
INSERT INTO `programs` (`id`, `faculty_id`, `code`, `name`) VALUES
	(225, 1, 'CS225', 'Networking'),
	(231, 1, 'CS231', 'Netcentric Computing');
/*!40000 ALTER TABLE `programs` ENABLE KEYS */;

-- Dumping data for table prac1.questions: ~27 rows (approximately)
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` (`id`, `ques`, `quesbi`) VALUES
	(1, 'Saya berminat dengan kursus ini.\n', 'I am interested in this course.'),
	(2, 'Saya sentiasa hadir ke sesi syarahan/tutorial/makmal/studio/kerja lapangan untuk kursus ini.\n', 'I am always present during all lecture/tutorial/studio/fieldwork sessions for this course.'),
	(3, 'Saya sentiasa bersedia untuk setiap sesi syarahan/tutorial/makmal/studio/kerja lapangan untuk kursus ini.\n', 'I am always prepared for every lecture/tutorial/laboratory/studio/fieldwork sessions for this course.'),
	(4, 'Pensyarah memaklumkan perancangan pengajaran/skema kerja kepada pelajar.\n', 'The lecturer informs the students about the teaching plan/scheme of work for this course.'),
	(5, 'Pensyarah menerangkan dengan jelas tentang hasil kursus dan pembelajaran kepada pelajar.\n', 'The lecturer provides a clear explanation about the course outcomes and the learning outcomes to the students.'),
	(6, 'Pensyarah menerangkan cara penilaian kursus dengan jelas kepada pelajar.\n', 'The lecturer clearly explains to the students the assessment procedure for this course.'),
	(7, 'Pensyarah mengendalikan sesi syarahan/tutorial/makmal/studio/klinikal/kerja lapangan yang ditangguhkan.', 'The lecturer conducts lecture/tutorial/laboratory/studio/clinical/fieldwork sessions based on the teaching plan for this course.'),
	(8, 'Pensyarah memenuhi waktu pengajaran yang dijadualkan.', 'The lecturer observes the scheduled training hours for this course.'),
	(9, 'Pensyarah menggantikan setiap sesi syarahan/tutorial/makmal/studio/klinikal/kerja lapangan yang ditangguhkan.\n(Sekiranya pensyarah tidak pernah menangguhkan kelas, sila abaikan soalan ini.)\n', 'The lecturer replaces every lecture/tutorial/laboratory/studio/clinical/field work sessions which has been postponed.\n(If lecturer never postpones lecture, do not answer this question.)'),
	(10, 'Pensyarah mengambil berat tentang kehadiran pelajar.', 'The lecturer is concerned about the students attendance.'),
	(11, 'Pensyarah menggunakan Bahasa Inggeris sebagai bahasa pengantar semasa kuliah (jika berkaitan).\n', 'The lecturer uses English language during lectures (where applicable).'),
	(12, 'Pensyarah sentiasa bersedia untuk setiap sesi pertemuan/pengajaran.', 'The lecturer is always prepared for every meeting/lecture.'),
	(13, 'Pensyarah berusaha untuk membantu pelajar untuk memahami pelajaran.', 'The lecturer makes effort to help students understand the lessons.'),
	(14, 'Pensyarah menggunakan/mencadangkan bahan pengajaran/pembelajaran/rujukan yang sesuai.', 'The lecturer uses/suggests suitable teaching aids/references.'),
	(15, 'Pensyarah menggunakan kaedah penyampaian yang sesuai dan berkesan.', 'The lecturer uses effective and appropriate teaching techniques.'),
	(16, 'Pensyarah menggalakkan pelajar bertanya soalan dan mengemukakan pendapat.', 'The lecturer encourages the students to ask questions and give opinions.'),
	(17, 'Pensyarah bersedia memberi bimbingan akademik kepada pelajar.', 'The lecturer is prepared to provide academic guidance to students.'),
	(18, 'Pensyarah memberi ujian/penilaian/tugasan yang sesuai dengan hasil pembelajaran dan hasil kusus.', 'The lecturer gives tests/evaluation/assignments in line with the learning and course outcomes.'),
	(19, 'Pensyarah memaklumkan setiap hasil penilaian kepada pelajar.\n', 'The lecturer informs every assessment results to the students.'),
	(20, 'Pensyarah berpakaian kemas dan sopan.\n', 'The lecturer is appropriately attired.'),
	(21, 'Pensyarah membincangkan isu-isu yang relevan dengan bidang semasa sesi pertemuan rasmi.\n', 'The lecturer discusses relevant issues pertaining to the course during lectures.'),
	(22, 'Pensyarah mudah dihubungi untuk perbincangan.\n', 'The lecturer is easily contactable for discussions.'),
	(23, 'Secara keseluruhannya, saya berpuas hati dengan pengajaran pensyarah ini.', 'In general, I am satisfied with the lecturers teaching.'),
	(24, 'Kelengkapan ruang kondusif untuk pembelajaran dan pengajaran.\n', 'The space is conducive for teaching and learning.'),
	(25, 'Kelengkapan dan peralatan pengajaran bagi kursus ini mencukupi dan berfungsi.\n', 'The teaching and learning equipments are adequate and functioning.'),
	(26, 'Nyatakan apa yang anda suka tentang kursus ini.\n', 'State what you like about this course.'),
	(27, 'Cadangkan aspek penambahbaikan untuk kursus ini.', 'Suggest improvements to aspects of the course.');
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

-- Dumping data for table prac1.surveys: ~6 rows (approximately)
/*!40000 ALTER TABLE `surveys` DISABLE KEYS */;
INSERT INTO `surveys` (`id`, `user_id`, `course_id`, `semester_id`, `group_id`) VALUES
	(1, 1, 650231, 20131, 1),
	(3, 1, 550231, 20131, 2),
	(4, 2, 550225, 20131, 3),
	(5, 3, 550225, 20131, 3),
	(6, 3, 650231, 20131, 1),
	(7, 5, 550231, 20131, 2);
/*!40000 ALTER TABLE `surveys` ENABLE KEYS */;

-- Dumping data for table prac1.users: ~5 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `faculty_id`, `campus_id`, `uid`, `pswd`, `fname`, `role`, `addrs`, `nric`, `email`, `gender`) VALUES
	(1, 23, 1, 111111, '123456', 'Sayyid Haziq Bin Rosfan', 3, NULL, NULL, NULL, NULL),
	(2, 23, 1, 222222, '123456', 'Zerajmahal Binti Biansing', 3, NULL, NULL, NULL, NULL),
	(3, 23, 1, 99901, '123456', 'Jamaliah Binti Taslim', 2, NULL, NULL, NULL, NULL),
	(5, 23, 1, 99902, '123456', 'Shapina Binti Abdullah', 2, NULL, NULL, NULL, NULL),
	(6, 23, 1, 999999, 'admin', 'Administrator 001', 1, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
