-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Aug 13, 2022 at 11:49 AM
-- Server version: 5.7.34
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_post`
--

CREATE TABLE `blog_post` (
  `id` int(11) NOT NULL,
  `postTitle` varchar(255) DEFAULT NULL,
  `postChapo` longtext,
  `postContent` longtext,
  `postCreated` datetime NOT NULL,
  `postStatus` enum('Waiting for validation','Open','Closed') DEFAULT NULL,
  `postModified` datetime DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blog_post`
--

INSERT INTO `blog_post` (`id`, `postTitle`, `postChapo`, `postContent`, `postCreated`, `postStatus`, `postModified`, `user_id`) VALUES
(1, 'Ceci est le titre 1 ', 'Chapo du 1 : Lorem ipsum dolor sit amet. Repellendus odit et quia ;corporis At quibusdam sed dolore consequatur&amp;amp;amp;amp;amp;amp; optio cupiditate sit sapiente esse. In similique similique cum unde velit Sed aperiam qui saepe alias et \r\n                                                                                      ', 'Lorem ipsum dolor sit amet. Et labore debitis ab galisum voluptatem et ducimus sint. Ex porro voluptates quo laudantium velit ad obcaecati assumenda eum consequatur alias quo asperiores minus ut autem tenetur et tenetur ipsam. Aut quia dolor 33 minima rerum vel galisum minima ad repudiandae atque. Et maiores recusandae sed deleniti culpa ea nihil sunt et quod repudiandae id fugit ducimus qui repellendus cupiditate?\r\n\r\nEa perspiciatis velit a quia Quis qui totam delectus. Ut consectetur excepturi ea voluptatem esse eum corrupti architecto ut vitae mollitia et quam placeat ut suscipit eligendi. Rerum esse et voluptas saepe id totam dolore non quis necessitatibus! Rem nihil doloremque est reiciendis laboriosam et amet reprehenderit ea ducimus placeat sed quisquam mollitia At sint libero!\r\n\r\nSed nihil odit sit fugit natus et fugit voluptatibus ut nulla aperiam. Vel labore mollitia sit cumque harum qui Quis maiores id impedit aspernatur vel corporis eveniet qui iste quibusdam ea consequatur odio. Sed aliquid similique ut illum minima sed quibusdam repudiandae hic voluptates maiores ut labore dolores et fugit quam?                                                                                 ', '2022-06-24 14:42:43', 'Open', '2022-08-10 09:15:57', 67),
(2, 'test Titre du 2 \r\n quibusdam, quos audio      ', 'chapot du 2 : amicitias, ne necesse sit unum sollicitum esse pro pluribus; satis superque esse sibi suarum cuique rerum, alienis nimis implicari molestum esse; commodissimum esse quam laxissimas habenas habere amicitiae, quas vel adducas, cum velis, vel remittas; caput enim esse ad beate vivendum securitatem, qua frui non possit animus, si tamquam parturiat unus pro pluribus.     ', 'Nam quibusdam, quos audio sapientes habitos in Graecia, placuisse opinor mirabilia quaedam (sed nihil est quod illi non persequantur argutiis): partim fugiendas esse nimias amicitias, ne necesse sit unum sollicitum esse pro pluribus; satis superque esse sibi suarum cuique rerum, alienis nimis implicari molestum esse; commodissimum esse quam laxissimas habenas habere amicitiae, quas vel adducas, cum velis, vel remittas; caput enim esse ad beate vivendum securitatem, qua frui non possit animus, si tamquam parturiat unus pro pluribus.\r\n\r\nSin autem ad adulescentiam perduxissent, dirimi tamen interdum contentione vel uxoriae condicionis vel commodi alicuius, quod idem adipisci uterque non posset. Quod si qui longius in amicitia provecti essent, tamen saepe labefactari, si in honoris contentionem incidissent; pestem enim nullam maiorem esse amicitiis quam in plerisque pecuniae cupiditatem, in optimis quibusque honoris certamen et gloriae; ex quo inimicitias maximas saepe inter amicissimos exstitisse.\r\n\r\nEquitis Romani autem esse filium criminis loco poni ab accusatoribus neque his iudicantibus oportuit neque defendentibus nobis. Nam quod de pietate dixistis, est quidem ista nostra existimatio, sed iudicium certe parentis; quid nos opinemur, audietis ex iuratis; quid parentes sentiant, lacrimae matris incredibilisque maeror, squalor patris et haec praesens maestitia, quam cernitis, luctusque declarat.\r\n\r\nHaec ubi latius fama vulgasset missaeque relationes adsiduae Gallum Caesarem permovissent, qu     ', '2022-06-24 14:44:36', 'Open', '2022-08-10 07:52:07', 2),
(3, ' test Titre du 3 : Nam \r\n quibusdam, quos audio         ', ' chapot du 3: amicitias, ne necesse sit unum sollicitum         ', ' Nam quibusdam, quos audio sapientes habitos in Graecia, placuisse opinor mirabilia quaedam (sed nihil est quod illi non persequantur argutiis): partim fugiendas esse nimias amicitias, ne necesse sit unum sollicitum esse pro pluribus; satis superque esse sibi suarum cuique rerum, alienis nimis implicari molestum esse; commodissimum esse quam laxissimas habenas habere amicitiae, quas vel adducas, cum velis, vel remittas; caput enim esse ad beate vivendum securitatem, qua frui non possit animus, si tamquam parturiat unus pro pluribus.\r\n\r\nSin autem ad adulescentiam perduxissent, dirimi tamen interdum contentione vel uxoriae condicionis vel commodi alicuius, quod idem adipisci uterque non posset. Quod si qui longius in amicitia provecti essent, tamen saepe labefactari, si in honoris contentionem incidissent; pestem enim nullam maiorem esse amicitiis quam in plerisque pecuniae cupiditatem, in optimis quibusque honoris certamen et gloriae; ex quo inimicitias maximas saepe inter amicissimos exstitisse.\r\n\r\nEquitis Romani autem esse filium criminis loco poni ab accusatoribus neque his iudicantibus oportuit neque defendentibus nobis. Nam quod de pietate dixistis, est quidem ista nostra existimatio, sed iudicium certe parentis; quid nos opinemur, audietis ex iuratis; quid parentes sentiant, lacrimae matris incredibilisque maeror, squalor patris et haec praesens maestitia, quam cernitis, luctusque declarat.\r\n\r\nHaec ubi latius fama vulgasset missaeque relationes adsiduae Gallum Caesarem permovissent, qu            ', '2022-06-25 14:44:36', 'Open', '2022-08-08 13:42:35', 67),
(20, '  test Titre du 4 : Nam\r\n quibusdam, quos audio        ', ' hapot du 4: amicitias, ne necesse sit unum sollicitum             ', '  Nam quibusdam, quos audio sapientes habitos in Graecia, placuisse opinor mirabilia quaedam (sed nihil est quod illi non persequantur argutiis): partim fugiendas esse nimias amicitias, ne necesse sit unum sollicitum esse pro pluribus; satis superque esse sibi suarum cuique rerum, alienis nimis implicari molestum esse; commodissimum esse quam laxissimas habenas habere amicitiae, quas vel adducas, cum velis, vel remittas; caput enim esse ad beate vivendum securitatem, qua frui non possit animus, si tamquam parturiat unus pro pluribus.\r\n\r\nSin autem ad adulescentiam perduxissent, dirimi tamen interdum contentione vel uxoriae condicionis vel commodi alicuius, quod idem adipisci uterque non posset. Quod si qui longius in amicitia provecti essent, tamen saepe labefactari, si in honoris contentionem incidissent; pestem enim nullam maiorem esse amicitiis quam in plerisque pecuniae cupiditatem, in optimis quibusque honoris certamen et gloriae; ex quo inimicitias maximas saepe inter amicissimos exstitisse.\r\n\r\nEquitis Romani autem esse filium criminis loco poni ab accusatoribus neque his iudicantibus oportuit neque defendentibus nobis. Nam quod de pietate dixistis, est quidem ista nostra existimatio, sed iudicium certe parentis; quid nos opinemur, audietis ex iuratis; quid parentes sentiant, lacrimae matris incredibilisque maeror, squalor patris et haec praesens maestitia, quam cernitis, luctusque declarat.\r\n\r\nHaec ubi latius fama vulgasset missaeque relationes adsiduae Gallum Caesarem permovissent, qu                ', '2022-08-08 14:39:00', 'Open', '2022-08-09 09:20:16', 67);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `commentCreated` datetime DEFAULT NULL,
  `commentStatus` enum('Waiting for validation','Open','Closed','Refuse') DEFAULT NULL,
  `commentContent` longtext,
  `user_id` int(11) NOT NULL COMMENT 'id of the writer of the comment',
  `blog_post_id` int(11) NOT NULL COMMENT 'the id of the article',
  `blog_post_user_id` int(11) NOT NULL COMMENT 'the writer''s id of the article'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `commentCreated`, `commentStatus`, `commentContent`, `user_id`, `blog_post_id`, `blog_post_user_id`) VALUES
(15, '2022-07-22 08:00:59', 'Waiting for validation', 'test avec Gérard...', 2, 2, 2),
(43, '2022-07-25 02:59:39', 'Waiting for validation', 'qdqDqd', 28, 3, 1),
(44, '2022-07-25 03:00:30', 'Waiting for validation', 'test encrypt 2', 28, 3, 1),
(45, '2022-07-25 04:56:30', 'Waiting for validation', 'test avec test.fr', 32, 2, 2),
(46, '2022-07-26 10:19:44', 'Waiting for validation', 'test de moi', 41, 1, 1),
(47, '2022-07-26 10:24:02', 'Waiting for validation', 'moi 2', 42, 3, 1),
(48, '2022-07-26 03:33:09', 'Waiting for validation', 'test moi', 47, 3, 1),
(53, '2022-08-08 09:40:21', 'Open', 'test', 2, 1, 67),
(54, '2022-08-08 10:52:35', 'Closed', 'test', 2, 1, 67),
(60, '2022-08-09 04:47:56', 'Open', '9 Aout 2022 : mollitia At sint libero! Sed nihil odit sit fugit natus et fugit voluptatibus ut nulla aperiam. Vel labore mollitia sit cumque harum qui Quis maiores id impedit aspe', 2, 1, 67),
(62, '2022-08-09 05:32:51', 'Open', 'test Babette', 2, 21, 67),
(63, '2022-08-09 08:26:04', 'Waiting for validation', 'test commentaire du 9 Aout 2022', 2, 2, 2),
(64, '2022-08-09 08:31:41', 'Open', 'test commentaire du 9 Aout 2022', 2, 2, 2),
(66, '2022-08-09 09:42:08', 'Open', 'pala@pala.fr', 76, 21, 67),
(67, '2022-08-10 07:49:26', 'Waiting for validation', 'test test test', 2, 21, 67),
(70, '2022-08-12 04:08:23', 'Waiting for validation', 'test moi p', 2, 1, 67);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `emailUser` varchar(255) DEFAULT NULL,
  `passWordUser` varchar(60) DEFAULT NULL,
  `firstNameUser` varchar(70) DEFAULT NULL,
  `surNameUser` varchar(70) DEFAULT NULL,
  `roleUser` enum('Admin','User') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `emailUser`, `passWordUser`, `firstNameUser`, `surNameUser`, `roleUser`) VALUES
(1, 'gerard.lepage@example.fr', '$1$thexkyis$qhLnFid8IDRHoOnZrAomH0', 'Gérard', 'lepage', 'Admin'),
(2, 'tanguy.guillo@gmail.com', '$1$thexkyis$U05YXCCvhX49vidDiXV.Q/', 'Tanguy', 'Guillo', 'Admin'),
(3, 'Lebeau@exemple.fr', '$1$thexkyis$YLrLuFK598r8RRKoKBLKW0', 'René', 'Lebeau ', 'User'),
(4, 'i.marchand@example.fr', '$1$thexkyis$uDIqgNhVSZYUigXjJ9o7K0', 'Isabelle', 'Marchand', 'User'),
(5, 'Jeanne.delabas@example.fr', '$1$thexkyis$4bouVMEF2Wz9SwyCd/4Xb1', 'Jeanne', 'delabas', 'User'),
(22, 'legrand@test.fr', '$1$thexkyis$Jg3YE53nNcraRQjHLMudV0', 'jean Marie', 'Le Grand', 'User'),
(44, 'test@test.fr', '$1$thexkyis$hNvuAeGdrf02qoassydzQ.', 'test', 'test@test.fr', 'User'),
(67, 'pa@pa.fr', '$1$thexkyis$U05YXCCvhX49vidDiXV.Q/', 'Paolo', 'easy', 'Admin'),
(73, 'pa2@pa2.fr', '$1$thexkyis$.O9HIP.VO6aX/M0qIXRTO/', 'Paolo user', 'easy user', 'User'),
(76, 'pala@pala.fr', '$1$thexkyis$Zut/0bHqGSg6FPwFvO6Gq1', 'pala@pala.fr', 'pala@pala.fr', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_post`
--
ALTER TABLE `blog_post`
  ADD PRIMARY KEY (`id`,`user_id`),
  ADD KEY `fk_blog_post_user1_idx` (`user_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`,`user_id`,`blog_post_id`,`blog_post_user_id`),
  ADD KEY `fk_comment_user1_idx` (`user_id`),
  ADD KEY `fk_comment_blog_post1_idx` (`blog_post_id`,`blog_post_user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog_post`
--
ALTER TABLE `blog_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
