-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2024 at 05:47 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `english_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cauhoi`
--

CREATE TABLE `tbl_cauhoi` (
  `macauhoi` int(11) NOT NULL,
  `noidungcauhoi` varchar(1000) NOT NULL,
  `hinhanh` varchar(100) DEFAULT NULL,
  `amthanh` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_cauhoi`
--

INSERT INTO `tbl_cauhoi` (`macauhoi`, `noidungcauhoi`, `hinhanh`, `amthanh`) VALUES
(19, 'Participants in the walking tour should gather_____ 533 Bates Road on Saturday morning.', '', ''),
(20, 'When filling out the order form, please _____ your address clearly to prevent delays.', '', ''),
(21, 'At the guest’s _____ , an extra set of towels and complimentary soaps were brought to the room.', '', ''),
(22, '_____ seeking a position at Tulare Designs must submit a portfolio of previous work.\r\n\r\n', '', ''),
(23, '_____ sales of junk food have been steadily declining indicates that consumers are becoming more health-conscious.', '', ''),
(24, 'Mr. Sims needs a more _____ vehicle for commuting from his suburban home to his office downtown.', '', ''),
(25, 'The company _____ lowered its prices to outsell its competitors and attract more customers.', '', ''),
(26, 'The figures that accompany the financial statement should be _____ to the spending category.', '', ''),
(27, 'The riskiest _____ of the development of new medications are the trials with human subjects.', '', ''),
(28, 'The guidelines for the monthly publication are _____revised to adapt to the changing readers.', '', ''),
(29, '_____ an ankle injury, the baseball player participated in the last game of the season.', '', ''),
(30, 'The building owner purchased the property _____ three months ago, but she has already spent a great deal of money on renovations.', '', ''),
(31, 'The company started to recognize the increasing _____ of using resources responsibly', 'bgIndex.jpg', ''),
(32, 'The artist sent _____ best pieces to the gallery to be reviewed by the owner', '', ''),
(38, 'The free clinic was founded by a group of doctors to give_____for various medical conditions.', 'bgIndex1.jpg', '020.mp3'),
(39, 'Mr. Ross, _____is repainting the interior of the lobby, was recommended by a friend of the building manager.', 'cau1.png', '020.mp3'),
(40, 'The contractor had a fifteen-percent _____ in his business after advertising in the local newspaper.', '', ''),
(41, 'During the peak season, it is _____ to hire additional workers for the weekend shifts.', '', ''),
(42, 'The library staff posted signs to _____ patrons of the upcoming closure for renovations.', '', ''),
(43, '_____ that the insulation has been replaced, the building is much more energy-efficient.', '', ''),
(44, 'Ms. Morgan recruited the individuals that the company _____ for the next three months.', '', ''),
(45, 'For optimal safety on the road, avoid _____ the view of the rear window and side-view mirrors.', '', ''),
(46, 'The governmental department used to provide financial aid, but now it offers _____ services only.', '', ''),
(47, 'The store’s manager plans to put the new merchandise on display _____ to promote the line of fall fashions.', '', ''),
(48, 'We would like to discuss this problem honestly and _____ at the next staff meeting.', '', ''),
(49, '_____Mr. Williams addressed the audience, he showed a brief video about the engine he had designed.', '', ''),
(50, 'Having proper ventilation throughout the building is _____ for protecting the health and well-being of the workers.', '', ''),
(51, '_____ restructuring several departments within the company, the majority of the problems with miscommunication have disappeared.', '', ''),
(52, 'The sprinklers for the lawn’s irrigation system are _____controlled.', '', ''),
(53, 'The upscale boutique Jane’s Closet is known for selling the most stylish _____ for young professionals.', '', ''),
(54, '', '', '020.mp3'),
(55, '', '', '021.mp3'),
(56, '', 'audio44.jpg', '044.mp3'),
(60, '', 'img1.png', 'audio1.mp3'),
(61, '', 'img2.png', 'audio2.mp3'),
(62, '', 'img3.png', 'audio3.mp3'),
(63, '', 'img4.png', 'audio4.mp3'),
(64, '', 'img5.png', 'audio5.mp3'),
(65, '', 'img6.png', 'audio6.mp3'),
(66, '', '038.jpg', '038.mp3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_chitietketqua`
--

CREATE TABLE `tbl_chitietketqua` (
  `makq` int(11) NOT NULL,
  `macauhoi` int(11) NOT NULL,
  `madapan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_chitietketqua`
--

INSERT INTO `tbl_chitietketqua` (`makq`, `macauhoi`, `madapan`) VALUES
(331, 21, 13),
(331, 22, 20),
(331, 23, 24),
(331, 24, 28),
(331, 26, 36),
(332, 21, 13),
(332, 22, 20),
(332, 23, 24),
(332, 24, 28),
(332, 26, 36),
(333, 21, 13),
(333, 22, 20),
(333, 23, 24),
(333, 24, 28),
(333, 26, 36),
(334, 21, 13),
(334, 22, 20),
(334, 23, 24),
(334, 24, 28),
(334, 26, 36),
(335, 21, 13),
(335, 22, 20),
(335, 23, 24),
(335, 24, 28),
(335, 26, 36),
(336, 21, 13),
(336, 22, 20),
(336, 23, 24),
(336, 24, 28),
(336, 26, 36),
(337, 39, 68),
(338, 39, 68),
(339, 21, 13),
(339, 22, 20),
(339, 23, 21),
(339, 24, 28),
(339, 26, 36),
(340, 21, 13),
(340, 22, 20),
(340, 23, 21),
(340, 24, 28),
(340, 26, 36),
(341, 21, 13),
(341, 22, 20),
(341, 23, 21),
(341, 24, 28),
(341, 26, 36),
(342, 39, 68),
(343, 21, 13),
(343, 22, 20),
(343, 23, 23),
(343, 24, 27),
(343, 26, 36),
(344, 21, 16),
(344, 22, 20),
(344, 23, 23),
(344, 24, 28),
(344, 26, 36),
(345, 21, 16),
(345, 22, 20),
(345, 23, 23),
(345, 24, 28),
(345, 26, 36),
(346, 21, 16),
(346, 22, 20),
(346, 23, 23),
(346, 24, 28),
(346, 26, 36),
(347, 21, 16),
(347, 22, 20),
(347, 23, 23),
(347, 24, 28),
(347, 26, 36),
(348, 21, 16),
(348, 22, 20),
(348, 23, 21),
(348, 24, 28),
(348, 26, 36),
(349, 21, 16),
(349, 22, 20),
(349, 23, 21),
(349, 24, 28),
(349, 26, 36),
(350, 39, 66),
(351, 21, 13),
(351, 22, 18),
(351, 23, 23),
(351, 24, 28),
(351, 26, 33),
(355, 21, 15),
(355, 22, 18),
(355, 23, 22),
(355, 24, 25),
(355, 26, 34),
(356, 21, 15),
(356, 22, 17),
(356, 23, 22),
(356, 24, 27),
(356, 26, 36);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_chungchi`
--

CREATE TABLE `tbl_chungchi` (
  `machungchi` int(11) NOT NULL,
  `tenchungchi` varchar(255) NOT NULL,
  `mota` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_chungchi`
--

INSERT INTO `tbl_chungchi` (`machungchi`, `tenchungchi`, `mota`) VALUES
(1, 'VSTEP', 'VSTEP - Chứng chỉ khung năng lực ngoại ngữ 6 bậc Vstep (Vietnamese Standardized Test of English Proficiency) là chứng chỉ đánh giá năng lực tiếng Anh theo 6 bậc dành cho người Việt Nam. Tương đương với 6 bậc là A1, A2, B1, B2, C1 và C2. Đây là chứng chỉ tiếng Anh chính quy, được cấp bởi các trường uỷ quyền của Bộ Giáo dục và Đào tạo.'),
(2, 'TOEIC', 'TOEIC (Test of English for International Communication) là chứng chỉ tiếng Anh Quốc tế, được phát triển bởi ETS (Educational Testing Service) - Viện khảo thí Hoa Kỳ.\r\n\r\nBài thi TOEIC tập trung vào kỹ năng nghe và đọc, khả năng nói và viết. Điểm số của chứng chỉ TOEIC dựa trên một thang điểm từ 100 đến 990'),
(3, 'IELTS', 'Chứng chỉ IELTS (International English Language Testing System) là một trong những chứng chỉ tiếng Anh Quốc tế phổ biến và được công nhận trên toàn cầu. IELTS được phát triển bởi Hội đồng Anh (British Council), IDP Education Australia và Tổ chức Giáo dục Quốc tế Cambridge. IELTS được công nhận và chấp nhận rộng rãi bởi trường đại học, tổ chức giáo dục.'),
(4, 'CEFR', 'Chứng chỉ CEFR (Common European Framework of Reference for Languages) là một hệ thống đánh giá trình độ tiếng Anh, được phát triển bởi Hội đồng Châu Âu. Chứng chỉ CEFR tiếng Anh là “quy chuẩn” để thể hiện khả năng ngoại ngữ, được coi là khung tham chiếu tiêu chuẩn trên khắp châu Âu và được sử dụng mà không bị hạn chế.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ctdethi`
--

CREATE TABLE `tbl_ctdethi` (
  `made` int(10) NOT NULL,
  `macauhoi` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_ctdethi`
--

INSERT INTO `tbl_ctdethi` (`made`, `macauhoi`) VALUES
(1, 21),
(1, 22),
(1, 23),
(1, 24),
(1, 26),
(74, 39);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dapan`
--

CREATE TABLE `tbl_dapan` (
  `madapan` int(11) NOT NULL,
  `noidungdapan` text NOT NULL,
  `trangthai` tinyint(1) NOT NULL,
  `macauhoi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_dapan`
--

INSERT INTO `tbl_dapan` (`madapan`, `noidungdapan`, `trangthai`, `macauhoi`) VALUES
(3, 'With', 0, 19),
(4, 'At', 1, 19),
(5, 'Among', 0, 19),
(8, 'Like', 1, 19),
(9, 'Fix', 0, 20),
(10, 'Write', 1, 20),
(11, 'Send', 0, 20),
(12, 'Direct', 0, 20),
(13, 'Quote', 0, 21),
(14, 'Graduation', 0, 21),
(15, 'Request', 1, 21),
(16, 'Dispute', 0, 21),
(17, 'Anyone', 1, 22),
(18, 'Whenever', 0, 22),
(19, 'Other', 0, 22),
(20, 'Fewer', 0, 22),
(21, 'In addition to', 0, 23),
(22, 'The fact that', 1, 23),
(23, 'As long as', 0, 23),
(24, 'In keeping with', 0, 23),
(25, 'Expessive', 0, 24),
(26, 'Reliable', 1, 24),
(27, 'Partial', 0, 24),
(28, 'Extreme', 0, 24),
(29, 'Strategy', 0, 25),
(30, 'Strategically', 1, 25),
(31, 'Strategies', 0, 25),
(32, 'Strategic', 0, 25),
(33, 'Relevance', 0, 26),
(34, 'Relevantly', 0, 26),
(35, 'More relevantly', 0, 26),
(36, 'Relevant', 1, 26),
(37, 'Proceeds', 0, 27),
(38, 'Perspectives', 0, 27),
(39, 'Installments', 0, 27),
(40, 'Stages', 1, 27),
(41, 'Courteously', 0, 28),
(42, 'Initially', 0, 28),
(43, 'Periodically', 1, 28),
(44, 'Physically', 0, 28),
(45, 'In spite of', 1, 29),
(46, 'Even if', 0, 29),
(47, 'Whether', 0, 29),
(48, 'Given that', 0, 29),
(49, 'Yet', 0, 30),
(50, 'Just', 1, 30),
(51, 'Few', 0, 30),
(52, 'Still', 0, 30),
(53, 'More important', 0, 31),
(54, 'Importantly', 0, 31),
(55, 'Importance', 1, 31),
(56, 'Important', 0, 31),
(57, 'him', 0, 32),
(58, 'himself', 0, 32),
(59, 'his', 1, 32),
(60, 'he', 0, 32),
(61, 'treatment', 1, 38),
(62, 'treat', 0, 38),
(63, 'treated', 0, 38),
(64, 'treating', 0, 38),
(65, 'himself', 0, 39),
(66, 'he', 0, 39),
(67, 'who', 1, 39),
(68, 'which', 0, 39),
(69, 'experience', 0, 40),
(70, 'growth', 1, 40),
(71, 'formula', 0, 40),
(72, 'incentive', 0, 40),
(73, 'necessitate', 0, 41),
(74, 'necessarily', 0, 41),
(75, 'necessary', 1, 41),
(76, 'necessity', 0, 41),
(77, 'notify', 1, 42),
(78, 'agree', 0, 42),
(79, 'generate', 0, 42),
(80, 'perform', 0, 42),
(81, 'Now', 1, 43),
(82, 'For', 0, 43),
(83, 'As', 0, 43),
(84, 'Though', 0, 43),
(85, 'will employ', 1, 44),
(86, 'to employ', 0, 44),
(87, 'has been employed', 0, 44),
(88, 'employ', 0, 44),
(89, 'obstructs', 0, 45),
(90, 'obstructed', 0, 45),
(91, 'obstruction', 0, 45),
(92, 'obstructing', 1, 45),
(93, 'legal', 1, 46),
(94, 'legalize', 0, 46),
(95, 'lagally', 0, 46),
(96, 'legalizes', 0, 46),
(97, 'soon', 1, 47),
(98, 'very', 0, 47),
(99, 'that', 0, 47),
(100, 'still', 0, 47),
(101, 'rarely', 0, 48),
(102, 'tiredly', 0, 48),
(103, 'openly', 1, 48),
(104, 'highly', 0, 48),
(105, 'Then', 0, 49),
(106, 'So that', 0, 49),
(107, 'Before', 1, 49),
(108, 'Whereas', 0, 49),
(109, 'coopaerative', 0, 50),
(110, 'visible', 0, 50),
(111, 'essential', 1, 50),
(112, 'alternative', 0, 50),
(113, 'After', 1, 51),
(114, 'Until', 0, 51),
(115, 'Below', 0, 51),
(116, 'Like', 0, 51),
(117, 'mechannically', 1, 52),
(118, 'mechanic', 0, 52),
(119, 'mechanism', 0, 52),
(120, 'mechanical', 0, 52),
(122, 'accessorized', 0, 53),
(123, 'accessorizes', 0, 53),
(124, 'accessories', 1, 53),
(125, 'accessorize', 0, 53),
(126, 'A. True', 1, 54),
(127, 'B. False', 0, 54),
(128, 'C. False', 0, 54),
(129, 'D. False', 0, 54),
(130, 'A. False', 0, 55),
(131, 'B. True', 1, 55),
(132, 'C. False', 0, 55),
(133, 'D. Both A & c', 0, 55),
(134, 'The notebook is open on the desk', 1, 56),
(135, 'The man\'s glasses are on the shelf', 0, 56),
(136, 'The pen is lying on the floor ', 0, 56),
(137, 'The man is wwriting on the board', 0, 56),
(150, 'A', 1, 60),
(151, 'B', 0, 60),
(152, 'C', 0, 60),
(153, 'D', 0, 60),
(154, 'A', 0, 61),
(155, 'B', 1, 61),
(156, 'C', 0, 61),
(157, 'D', 0, 61),
(158, 'A', 0, 62),
(159, 'B', 0, 62),
(160, 'C', 1, 62),
(161, 'D', 0, 62),
(162, 'A', 0, 63),
(163, 'B', 0, 63),
(164, 'C', 0, 63),
(165, 'D', 1, 63),
(166, 'A', 1, 64),
(167, 'B', 0, 64),
(168, 'C', 0, 64),
(169, 'D', 0, 64),
(170, 'A', 0, 65),
(171, 'B', 1, 65),
(172, 'C', 0, 65),
(173, 'D', 0, 65),
(174, 'The truck\'s door is open ', 0, 66),
(175, 'The truck is parked', 1, 66),
(176, 'The man is unloading a truck', 0, 66),
(177, 'There are packages on the ground', 0, 66);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dethi`
--

CREATE TABLE `tbl_dethi` (
  `made` int(11) NOT NULL,
  `tendethi` varchar(100) NOT NULL,
  `thoigianthi` int(11) NOT NULL,
  `luotthi` int(11) NOT NULL,
  `xemdiemthi` tinyint(1) NOT NULL,
  `xemdapan` tinyint(1) NOT NULL,
  `machungchi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_dethi`
--

INSERT INTO `tbl_dethi` (`made`, `tendethi`, `thoigianthi`, `luotthi`, `xemdiemthi`, `xemdapan`, `machungchi`) VALUES
(1, 'Đề số 1 - TOEIC ', 120, 1, 0, 0, 2),
(2, 'Đề số 2 - TOEIC ', 45, 0, 0, 0, 2),
(26, 'Đề số 3 - TOEIC ', 45, 0, 0, 0, 2),
(27, 'Đề số 4 - TOEIC ', 45, 0, 0, 0, 2),
(32, 'Đề số 5 - TOEIC ', 45, 0, 0, 0, 2),
(33, 'Đề số 6 - TOEIC ', 45, 0, 0, 0, 2),
(34, 'Đề số 7 - TOEIC ', 45, 0, 0, 0, 2),
(35, 'Đề số 8 - TOEIC ', 45, 0, 0, 0, 2),
(36, 'Đề số 9 - TOEIC ', 45, 0, 0, 0, 2),
(37, 'Đề số 10 - TOEIC ', 45, 0, 0, 0, 2),
(38, 'Đề số 1 - IELTS ', 45, 0, 0, 0, 3),
(39, 'Đề số 2 - IELTS ', 45, 0, 0, 0, 3),
(40, 'Đề số 3 - IELTS ', 45, 0, 0, 0, 3),
(41, 'ĐỀ SỐ 4 - IELTS\r\n', 45, 0, 0, 0, 3),
(74, 'Đề số 1 - VSTEP', 45, 0, 0, 0, 1),
(74, 'Đề số 5 - IELTS ', 45, 0, 0, 0, 3),
(78, 'Đề số 2 - VSTEP ', 120, 0, 0, 0, 1),
(79, 'Đề số 3 - VSTEP ', 45, 0, 0, 0, 1),
(80, 'Đề số 4 - VSTEP ', 45, 0, 0, 0, 1),
(81, 'Đề số 5 - VSTEP ', 45, 0, 0, 0, 1),
(82, 'Đề số 1 - CEFR ', 45, 0, 0, 0, 4),
(83, 'Đề số 2 - CEFR ', 45, 0, 0, 0, 4),
(84, 'Đề số 3 - CEFR ', 45, 0, 0, 0, 4),
(85, 'Đề số 4 - CEFR ', 45, 0, 0, 0, 4),
(86, 'Đề số 5 - CEFR ', 45, 0, 0, 0, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ketqua`
--

CREATE TABLE `tbl_ketqua` (
  `makq` int(11) NOT NULL,
  `diemthi` double NOT NULL,
  `thoigianlambai` text NOT NULL,
  `thoigiannopbai` text NOT NULL,
  `socaudung` int(11) NOT NULL,
  `made` int(11) NOT NULL,
  `id_nguoidung` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_ketqua`
--

INSERT INTO `tbl_ketqua` (`makq`, `diemthi`, `thoigianlambai`, `thoigiannopbai`, `socaudung`, `made`, `id_nguoidung`) VALUES
(331, 0, '00:00:02', '', 0, 1, 18),
(332, 0, '00:00:02', '', 0, 1, 18),
(333, 0, '00:00:02', '', 0, 1, 18),
(334, 0, '00:00:02', '', 0, 1, 18),
(335, 0, '00:00:02', '', 0, 1, 18),
(336, 0, '00:00:32', '', 0, 1, 18),
(337, 0, '00:00:04', '', 0, 74, 18),
(338, 0, '00:00:04', '', 0, 74, 18),
(339, 0, '00:00:12', '', 0, 1, 18),
(340, 0, '00:00:12', '', 0, 1, 18),
(341, 0, '00:00:12', '', 0, 1, 18),
(342, 0, '00:00:04', '', 0, 74, 18),
(343, 0, '00:00:18', '', 0, 1, 18),
(344, 0, '00:00:11', '17:42:29 01-06-2024', 0, 1, 18),
(345, 0, '00:00:11', '17:44:43 01-06-2024', 0, 1, 18),
(346, 0, '00:00:11', '17:45:48 01-06-2024', 0, 1, 18),
(347, 0, '00:00:11', '17:46:46 01-06-2024', 0, 1, 18),
(348, 0, '00:00:09', '17:47:27 01-06-2024', 0, 1, 18),
(349, 0, '00:00:03', '17:51:17 01-06-2024', 0, 1, 18),
(350, 0, '00:00:07', '20:54:02 01-06-2024', 0, 74, 18),
(351, 0, '00:00:16', '20:56:09 01-06-2024', 0, 1, 18),
(355, 0, '00:00:50', '2024-06-03 01:44:22', 0, 1, 18),
(356, 4, '00:02:39', '2024-06-04 01:02:25', 4, 1, 18);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nguoidung`
--

CREATE TABLE `tbl_nguoidung` (
  `id_nguoidung` int(11) NOT NULL,
  `hoten` varchar(100) NOT NULL,
  `ngaysinh` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `taikhoan` varchar(255) NOT NULL,
  `matkhau` varchar(255) NOT NULL,
  `manhomquyen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_nguoidung`
--

INSERT INTO `tbl_nguoidung` (`id_nguoidung`, `hoten`, `ngaysinh`, `email`, `taikhoan`, `matkhau`, `manhomquyen`) VALUES
(1, 'Quốc Thái', '2024-04-02', 'quocthai@gmail.com', 'admin', '123', 1),
(18, 'Nguyễn Văn ABC', '2024-05-06', '123456@gmail.com', 'user', '123', 2),
(21, 'Trần Đức Thiện', '2015-12-09', 'ducthien@gmail.com', 'ducthien', '123', 1),
(22, 'Trần Văn B', '2018-05-23', 'abc@gmail.com', 'user1', '123', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nhomquyen`
--

CREATE TABLE `tbl_nhomquyen` (
  `manhomquyen` int(11) NOT NULL,
  `tennhomquyen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_nhomquyen`
--

INSERT INTO `tbl_nhomquyen` (`manhomquyen`, `tennhomquyen`) VALUES
(1, 'admin'),
(2, 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_cauhoi`
--
ALTER TABLE `tbl_cauhoi`
  ADD PRIMARY KEY (`macauhoi`);

--
-- Indexes for table `tbl_chitietketqua`
--
ALTER TABLE `tbl_chitietketqua`
  ADD PRIMARY KEY (`makq`,`macauhoi`,`madapan`),
  ADD KEY `makq` (`makq`,`macauhoi`,`madapan`),
  ADD KEY `madapan` (`madapan`),
  ADD KEY `macauhoi` (`macauhoi`);

--
-- Indexes for table `tbl_chungchi`
--
ALTER TABLE `tbl_chungchi`
  ADD PRIMARY KEY (`machungchi`);

--
-- Indexes for table `tbl_ctdethi`
--
ALTER TABLE `tbl_ctdethi`
  ADD PRIMARY KEY (`made`,`macauhoi`),
  ADD KEY `fk_ctdethi_cauhoi` (`macauhoi`);

--
-- Indexes for table `tbl_dapan`
--
ALTER TABLE `tbl_dapan`
  ADD PRIMARY KEY (`madapan`),
  ADD KEY `macauhoi` (`macauhoi`);

--
-- Indexes for table `tbl_dethi`
--
ALTER TABLE `tbl_dethi`
  ADD PRIMARY KEY (`made`,`tendethi`) USING BTREE,
  ADD KEY `machungchi` (`machungchi`);

--
-- Indexes for table `tbl_ketqua`
--
ALTER TABLE `tbl_ketqua`
  ADD PRIMARY KEY (`makq`),
  ADD KEY `made` (`made`,`id_nguoidung`),
  ADD KEY `id_nguoidung` (`id_nguoidung`);

--
-- Indexes for table `tbl_nguoidung`
--
ALTER TABLE `tbl_nguoidung`
  ADD PRIMARY KEY (`id_nguoidung`),
  ADD KEY `manhomquyen` (`manhomquyen`);

--
-- Indexes for table `tbl_nhomquyen`
--
ALTER TABLE `tbl_nhomquyen`
  ADD PRIMARY KEY (`manhomquyen`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_cauhoi`
--
ALTER TABLE `tbl_cauhoi`
  MODIFY `macauhoi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `tbl_chungchi`
--
ALTER TABLE `tbl_chungchi`
  MODIFY `machungchi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_dapan`
--
ALTER TABLE `tbl_dapan`
  MODIFY `madapan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;

--
-- AUTO_INCREMENT for table `tbl_dethi`
--
ALTER TABLE `tbl_dethi`
  MODIFY `made` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `tbl_ketqua`
--
ALTER TABLE `tbl_ketqua`
  MODIFY `makq` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=357;

--
-- AUTO_INCREMENT for table `tbl_nguoidung`
--
ALTER TABLE `tbl_nguoidung`
  MODIFY `id_nguoidung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_nhomquyen`
--
ALTER TABLE `tbl_nhomquyen`
  MODIFY `manhomquyen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_chitietketqua`
--
ALTER TABLE `tbl_chitietketqua`
  ADD CONSTRAINT `tbl_chitietketqua_ibfk_1` FOREIGN KEY (`makq`) REFERENCES `tbl_ketqua` (`makq`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_chitietketqua_ibfk_2` FOREIGN KEY (`madapan`) REFERENCES `tbl_dapan` (`madapan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_chitietketqua_ibfk_3` FOREIGN KEY (`macauhoi`) REFERENCES `tbl_cauhoi` (`macauhoi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_ctdethi`
--
ALTER TABLE `tbl_ctdethi`
  ADD CONSTRAINT `fk_ctdethi_cauhoi` FOREIGN KEY (`macauhoi`) REFERENCES `tbl_cauhoi` (`macauhoi`),
  ADD CONSTRAINT `fk_ctdethi_dethi` FOREIGN KEY (`made`) REFERENCES `tbl_dethi` (`made`);

--
-- Constraints for table `tbl_dapan`
--
ALTER TABLE `tbl_dapan`
  ADD CONSTRAINT `tbl_dapan_ibfk_1` FOREIGN KEY (`macauhoi`) REFERENCES `tbl_cauhoi` (`macauhoi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_dethi`
--
ALTER TABLE `tbl_dethi`
  ADD CONSTRAINT `tbl_dethi_ibfk_1` FOREIGN KEY (`machungchi`) REFERENCES `tbl_chungchi` (`machungchi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_ketqua`
--
ALTER TABLE `tbl_ketqua`
  ADD CONSTRAINT `tbl_ketqua_ibfk_1` FOREIGN KEY (`id_nguoidung`) REFERENCES `tbl_nguoidung` (`id_nguoidung`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_ketqua_ibfk_2` FOREIGN KEY (`made`) REFERENCES `tbl_dethi` (`made`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_nguoidung`
--
ALTER TABLE `tbl_nguoidung`
  ADD CONSTRAINT `tbl_nguoidung_ibfk_1` FOREIGN KEY (`manhomquyen`) REFERENCES `tbl_nhomquyen` (`manhomquyen`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
