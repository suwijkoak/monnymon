-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2021 at 10:54 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `monnymon_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `card_clan`
--

CREATE TABLE `card_clan` (
  `clan_id` tinyint(2) NOT NULL,
  `clan_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `c_nation_id` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `card_clan`
--

INSERT INTO `card_clan` (`clan_id`, `clan_name`, `c_nation_id`) VALUES
(1, 'Royal Paladin', 1),
(2, 'Oracle Think Tank', 1),
(3, 'Angel Feather', 1),
(4, 'Shadow Paladin', 1),
(5, 'Gold Paladin', 1),
(6, 'Genesis', 1),
(7, 'Kagero', 2),
(8, 'Nubatama', 2),
(9, 'Tachikaze', 2),
(10, 'Murakumo', 2),
(11, 'Narukami', 2),
(12, 'Nova Grappler', 3),
(13, 'Dimension Police', 3),
(14, 'Link Joker', 3),
(15, 'Etranger', 3),
(16, 'Link Joker', 3),
(17, 'The Mask Collection', 3),
(18, 'Spike Brothers', 4),
(19, 'Dark Irregulars', 4),
(20, 'Pale Moon', 4),
(21, 'Gear Chronicle', 4),
(22, 'Granblue', 5),
(23, 'Bermuda Triangle', 5),
(24, 'Aqua Force', 5),
(25, 'Megacolony', 6),
(26, 'Great Nature', 6),
(27, 'Neo Nectar', 6),
(30, 'Cray Elemental', 7),
(31, 'BanG Dream!', 8);

-- --------------------------------------------------------

--
-- Table structure for table `card_gift`
--

CREATE TABLE `card_gift` (
  `gift_id` tinyint(2) NOT NULL,
  `gift_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `card_gift`
--

INSERT INTO `card_gift` (`gift_id`, `gift_name`) VALUES
(1, 'Force'),
(2, 'Protect'),
(3, 'Accel');

-- --------------------------------------------------------

--
-- Table structure for table `card_list`
--

CREATE TABLE `card_list` (
  `card_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `card_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `card_jp_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `card_th_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Grade` tinyint(1) NOT NULL,
  `Skill` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Imaginary_Gift` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `atk` int(11) NOT NULL,
  `Critical` tinyint(2) NOT NULL,
  `Nation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Clan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `card_race` tinyint(2) NOT NULL,
  `card_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Card_Flavor` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Card_Effect` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `card_pic` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `card_list`
--

INSERT INTO `card_list` (`card_id`, `card_name`, `card_jp_name`, `card_th_name`, `Grade`, `Skill`, `Imaginary_Gift`, `atk`, `Critical`, `Nation`, `Clan`, `card_race`, `card_type`, `Card_Flavor`, `Card_Effect`, `card_pic`) VALUES
('000003', 'Lohanan', '', '', 0, 'Intercept', '2', 10000, 1, '2', '1', 0, '1', 'กด้ิดเห่ท้เม่้ใ่าดเแืเื', 'แปืดเปา่่้มาฝใสาฝ', '03045620201226_V-MB01-007EN-RR.png'),
('000004', 'Alfred Early', 'アルフレッド・アーリー', 'อัลเฟรด เออร์ลี่', 3, 'Twin Drive!!', '1', 13000, 1, '1', '1', 0, '1', '(V-TD01): The young king advances with his allies on the path he believes in.', '[AUTO](VC):When placed, COST [Counter Blast (1)], call up to one \"Blaster Blade\" from your hand or soul to (RC), and that unit gets [Power]+10000 until end of turn. If you called, draw a card.', '40052920201226_V-MB01-007EN-RR.png'),
('000005', 'Alfred Early', 'アルフレッド・アーリー', 'อัลเฟรด เออร์ลี่', 3, 'Twin Drive!!', '1', 13000, 1, '1', '1', 0, '1', '(V-MB01): As long as you are with me I cannot lose.', '[AUTO](VC):When placed, COST [Counter Blast (1)], call up to one \"Blaster Blade\" from your hand or soul to (RC), and that unit gets [Power]+10000 until end of turn. If you called, draw a card.', '56053320201226_V-MB01-007EN-RR.png');

-- --------------------------------------------------------

--
-- Table structure for table `card_nation`
--

CREATE TABLE `card_nation` (
  `nation_id` tinyint(2) NOT NULL,
  `nation_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `card_nation`
--

INSERT INTO `card_nation` (`nation_id`, `nation_name`) VALUES
(1, 'United Sanctuary'),
(2, 'Dragon Empire'),
(3, 'Star Gate'),
(4, 'Dark Zone'),
(5, 'Magallanica'),
(6, 'Zoo'),
(7, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `card_race`
--

CREATE TABLE `card_race` (
  `race_id` tinyint(2) NOT NULL,
  `race_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `card_race`
--

INSERT INTO `card_race` (`race_id`, `race_name`) VALUES
(1, 'Afterglow'),
(2, 'Angelroid‎'),
(3, 'Astral Deity '),
(4, 'Astral Poet'),
(5, 'Aquaroid'),
(6, 'Bioroid'),
(7, 'Chrono Dragon'),
(8, 'Cyber Beast '),
(9, 'Cyber Dragon '),
(10, 'Cyber Fairy'),
(11, 'Cyber Golem'),
(12, 'Cyberoid '),
(13, 'Dark Elf '),
(14, 'Dryad'),
(15, 'Elemental'),
(16, 'Forest Dragon'),
(17, 'Gear Beast'),
(18, 'Gear Colossus'),
(19, 'Gear Dragon '),
(20, 'Gearoid '),
(21, 'Gyze'),
(22, 'Hello, Happy World! '),
(23, 'Kraken'),
(24, 'Pastel＊Palettes'),
(25, 'Poppin\'Party '),
(26, 'RAISE A SUILEN '),
(27, 'Roselia '),
(28, 'Shadow Dragon'),
(29, 'Skeleton'),
(30, 'Thunder Dragon '),
(31, 'Wild Dragon '),
(32, 'Zodiac Time Beast'),
(33, 'Abyss Dragon'),
(34, 'Alien'),
(35, 'Angel'),
(36, 'Battleroid'),
(37, 'Afterglow'),
(38, 'Angelroid‎'),
(39, 'Astral Deity '),
(40, 'Astral Poet'),
(41, 'Aquaroid'),
(42, 'Bioroid'),
(43, 'Chrono Dragon'),
(44, 'Cyber Beast '),
(45, 'Cyber Dragon '),
(46, 'Cyber Fairy'),
(47, 'Cyber Golem'),
(48, 'Cyberoid '),
(49, 'Dark Elf '),
(50, 'Dryad'),
(51, 'Elemental'),
(52, 'Forest Dragon'),
(53, 'Gear Beast'),
(54, 'Gear Colossus'),
(55, 'Gear Dragon '),
(56, 'Gearoid '),
(57, 'Gyze'),
(58, 'Hello, Happy World! '),
(59, 'Kraken'),
(60, 'Pastel＊Palettes'),
(61, 'Poppin\'Party '),
(62, 'RAISE A SUILEN '),
(63, 'Roselia '),
(64, 'Shadow Dragon'),
(65, 'Skeleton'),
(66, 'Thunder Dragon '),
(67, 'Wild Dragon '),
(68, 'Zodiac Time Beast'),
(69, 'Abyss Dragon'),
(70, 'Alien'),
(71, 'Angel'),
(72, 'Battleroid'),
(73, 'Chimera'),
(74, 'Cosmo Dragon'),
(75, 'Demon'),
(76, 'Dinodragon'),
(77, 'Dragonman'),
(78, 'Elf'),
(79, 'Flame Dragon'),
(80, 'Ghost'),
(81, 'Giant'),
(82, 'Gillman'),
(83, 'Gnome'),
(84, 'Goblin'),
(85, 'Golem'),
(86, 'High Beast'),
(87, 'Human'),
(88, 'Insect'),
(89, 'Mermaid'),
(90, 'Messiah'),
(91, 'Noble'),
(92, 'Ogre'),
(93, 'Royal Beast'),
(94, 'Salamander'),
(95, 'Space Dragon'),
(96, 'Succubus'),
(97, 'Sylph'),
(98, 'Tear Dragon'),
(99, 'Vampire'),
(100, 'Warbeast'),
(101, 'Winged Dragon'),
(102, 'Workeroid'),
(103, 'Zeroth Dragon'),
(104, 'Zombie');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_ id` int(11) UNSIGNED ZEROFILL NOT NULL,
  `comment_text` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_pic` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comment_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `quest_id` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_ id`, `comment_text`, `comment_name`, `comment_pic`, `comment_time`, `quest_id`) VALUES
(00000000001, '', '', '', '2020-11-22 19:42:22', ''),
(00000000002, '', '', '', '2020-11-22 20:00:31', ''),
(00000000003, '', '', '', '2020-11-22 20:28:31', ''),
(00000000004, 'ตามนี้ครับ', '', '', '2020-11-22 20:28:54', '00000000001'),
(00000000005, 'ตามนี้ครับ', '', '', '2020-11-22 20:30:47', '00000000001'),
(00000000006, 'ตามนี้ครับ', 'cus1', '', '2020-11-26 20:09:47', '00000000001'),
(00000000007, 'ตามนี้ครับ', 'cus1', '', '2020-11-26 20:19:57', '00000000001'),
(00000000008, 'ตามนี้ครับ', 'cus1', '', '2020-11-26 20:21:23', '00000000001'),
(00000000009, 'ควย', 'อิอิ', '000.jpg', '2020-11-27 07:29:28', ''),
(00000000010, '$_POST[comment]', '$_POST[user_name]', '$m_pic', '2020-11-27 07:31:37', '$_POST[topi'),
(00000000011, 'ตามนี้ครับ', 'cus555', '', '2020-11-27 07:48:09', '00000000001'),
(00000000012, 'ติดตามได้ที่หน้าเพจเลยครับ', '$_SESSION[valid_user]', '', '2020-12-02 17:27:47', '00000000002'),
(00000000013, 'ติดตามได้ที่หน้าเพจเลยครับ', '$_SESSION[valid_user]', '', '2020-12-02 17:30:07', '00000000002'),
(00000000014, 'ติดตามได้ที่หน้าเพจเลยครับ', 'admin', '', '2020-12-02 18:35:55', '00000000002'),
(00000000015, 'eiei', 'admin', '', '2020-12-02 18:38:12', '00000000002'),
(00000000016, '', 'admin', 'xg2s8r0q4l_', '2020-12-04 08:58:48', '00000000003'),
(00000000017, '', 'admin', '2d9zqjrunv_001.jpg', '2020-12-04 08:59:23', '00000000003');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `m_num` int(11) NOT NULL,
  `m_id` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `m_pass` varchar(20) NOT NULL,
  `m_pic` varchar(200) NOT NULL,
  `m_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `m_lastname` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `m_sex` int(1) NOT NULL,
  `m_age` int(3) NOT NULL,
  `m_birth` date NOT NULL,
  `m_tel` varchar(10) NOT NULL,
  `m_mail` varchar(50) NOT NULL,
  `m_contract1` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `m_contract2` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `m_type` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`m_num`, `m_id`, `m_pass`, `m_pic`, `m_name`, `m_lastname`, `m_sex`, `m_age`, `m_birth`, `m_tel`, `m_mail`, `m_contract1`, `m_contract2`, `m_type`) VALUES
(1, 'admin', '1234', 'd10b3amnz0_logo-monny.png', 'Inwza', '007', 1, 25, '2020-06-19', '0818888888', 'ggmail@gmail.com', 'ที่บ้าน หมู่บ้าน ซอยบ้าน', '', 1),
(9, 'cus', '1234', 'o60mwec1l5_avatar-03.jpg', 'kakakaa', 'waaaaaaaa', 1, 120, '2020-06-10', '1234567890', 'gmail@gmail.com', 'asdasdas', 'dasdasdasdasdasd', 2),
(10, 'cus1', '1234', 'wta46ymgn0_avatar-03.jpg', 'ololololooo123', 'eiei', 2, 12, '2020-07-02', '1234567890', 'gg@mail.com', 'asdasd', 'asdasd', 2),
(20, 'cus4', '1234', '', '', '', 0, 0, '0000-00-00', '', '', '', '', 2),
(21, 'cus555', '1234', 'irf40oqy0g_banner-3.jpg', 'testCus', 'Cus2', 1, 26, '2017-10-12', '0255555555', 'sssgmail@gmail.com', 'asd', 'asd', 2),
(22, 'cus123456', '1234', 'te9h3b5i0x_08104920200904_poke-slip.jpg', '1234', '1234', 2, 1234, '2020-09-19', '1111111111', 'aaamail@gmail.com', '1234', '1234', 2);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_num` int(255) NOT NULL,
  `order_id` int(255) NOT NULL,
  `order_memberid` int(11) NOT NULL,
  `order_pid` int(11) NOT NULL,
  `order_pname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `order_cname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `order_clastname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `order_address` tinyint(1) NOT NULL,
  `order_pstatus` tinyint(1) NOT NULL,
  `order_address1` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `order_phone` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `order_pic` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `order_paid_status` tinyint(1) NOT NULL,
  `order_product_status` tinyint(1) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `product_category` int(10) NOT NULL,
  `product_detail` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_sprice` int(100) DEFAULT NULL,
  `product_num` int(10) NOT NULL,
  `product_pic` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_category`, `product_detail`, `product_price`, `product_sprice`, `product_num`, `product_pic`) VALUES
(2, 'กล่องใส่การ์ดลายโปเกม่อน', 3, 'ลายโปเกม่อน', 250, 0, 10, 'poke-box.jpg'),
(6, 'การ์ดชุด C', 1, 'Extreamely Rare', 1000, 0, 1, '21084120200622_11083920200622_Yugioh_card_duelist_icon.png'),
(7, 'ซองการ์ด', 2, 'test', 100, 99, 10, '08104920200904_poke-slip.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `cate_id` int(11) NOT NULL,
  `cate_name` varchar(200) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`cate_id`, `cate_name`) VALUES
(1, 'การ์ด'),
(2, 'สลีฟ(ซองใส่การ์ด)'),
(3, 'กล่องใส่การ์ด');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `topic_id` int(11) UNSIGNED ZEROFILL NOT NULL,
  `topic_head` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `topic_text` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `topic_pic` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `topic_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `topic_member` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `topic_view` int(4) NOT NULL,
  `topic_reply` int(4) NOT NULL,
  `topic_type` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`topic_id`, `topic_head`, `topic_text`, `topic_pic`, `topic_time`, `topic_member`, `topic_view`, `topic_reply`, `topic_type`) VALUES
(00000000001, 'ร้านอยู่แถวไหนครับ', 'ขอแผนที่ด้วยครับ', '', '2020-10-25 08:43:54', 'cus', 0, 0, 0),
(00000000002, 'ทางร้านจัดแข่งวันไหนบ้างครับ', 'ไม่ทราบว่าทางร้านจัดแข่งอะไรวันไหนบ้างครับ', '', '2020-10-25 08:51:06', 'cus1', 0, 0, 0),
(00000000003, 'มีการ์ดไรขายมั้งครับ', 'มีตามภาพไหมครับ', '', '2020-12-02 20:59:25', 'admin', 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `card_clan`
--
ALTER TABLE `card_clan`
  ADD PRIMARY KEY (`clan_id`);

--
-- Indexes for table `card_gift`
--
ALTER TABLE `card_gift`
  ADD PRIMARY KEY (`gift_id`);

--
-- Indexes for table `card_list`
--
ALTER TABLE `card_list`
  ADD PRIMARY KEY (`card_id`);

--
-- Indexes for table `card_nation`
--
ALTER TABLE `card_nation`
  ADD PRIMARY KEY (`nation_id`);

--
-- Indexes for table `card_race`
--
ALTER TABLE `card_race`
  ADD PRIMARY KEY (`race_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_ id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`m_num`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_num`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`cate_id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`topic_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `card_clan`
--
ALTER TABLE `card_clan`
  MODIFY `clan_id` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `card_gift`
--
ALTER TABLE `card_gift`
  MODIFY `gift_id` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `card_nation`
--
ALTER TABLE `card_nation`
  MODIFY `nation_id` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `card_race`
--
ALTER TABLE `card_race`
  MODIFY `race_id` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_ id` int(11) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `m_num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_num` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `cate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `topic_id` int(11) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
