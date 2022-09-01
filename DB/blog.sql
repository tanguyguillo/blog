-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Sep 01, 2022 at 02:35 PM
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
(1, 'Titre 1  \r\nirabilia quaedam (sed', 'Chapo du 1 : Lorem ipsum dolor sit amet. Repellendus odit et quia ;corporis At quibusdam sed dolore consequatur optio cupiditate sit sapiente esse. In similique similique cum unde velit Sed aperiam qui saepe alias et \r\n                                                                                       ', 'Lorem ipsum dolor sit amet. Et labore debitis ab galisum voluptatem et ducimus sint. Ex porro voluptates quo laudantium velit ad obcaecati assumenda eum consequatur alias quo asperiores minus ut autem tenetur et tenetur ipsam. Aut quia dolor 33 minima rerum vel galisum minima ad repudiandae atque. Et maiores recusandae sed deleniti culpa ea nihil sunt et quod repudiandae id fugit ducimus qui repellendus cupiditate?\r\n\r\nEa perspiciatis velit a quia Quis qui totam delectus. Ut consectetur excepturi ea voluptatem esse eum corrupti architecto ut vitae mollitia et quam placeat ut suscipit eligendi. Rerum esse et voluptas saepe id totam dolore non quis necessitatibus! Rem nihil doloremque est reiciendis laboriosam et amet reprehenderit ea ducimus placeat sed quisquam mollitia At sint libero!\r\n\r\nSed nihil odit sit fugit natus et fugit voluptatibus ut nulla aperiam. Vel labore mollitia sit cumque harum qui Quis maiores id impedit aspernatur vel corporis eveniet qui iste quibusdam ea consequatur odio. Sed aliquid similique ut illum minima sed quibusdam repudiandae hic voluptates maiores ut labore dolores et fugit quam?                                                                                  ', '2022-06-24 14:42:43', 'Open', '2022-08-31 22:19:37', 67),
(2, 'Titre du 2 \r\n quibusdam, quos audio', 'chapot du 2 : amicitias, ne necesse sit unum sollicitum esse pro pluribus; satis superque esse sibi suarum cuique rerum, alienis nimis implicari molestum esse; commodissimum esse quam laxissimas habenas habere amicitiae, quas vel adducas, cum velis, vel remittas; caput enim esse ad beate vivendum securitatem, qua frui non possit animus, si tamquam parturiat unus pro pluribus.      ', 'Nam quibusdam, quos audio sapientes habitos in Graecia, placuisse opinor mirabilia quaedam (sed nihil est quod illi non persequantur argutiis): partim fugiendas esse nimias amicitias, ne necesse sit unum sollicitum esse pro pluribus; satis superque esse sibi suarum cuique rerum, alienis nimis implicari molestum esse; commodissimum esse quam laxissimas habenas habere amicitiae, quas vel adducas, cum velis, vel remittas; caput enim esse ad beate vivendum securitatem, qua frui non possit animus, si tamquam parturiat unus pro pluribus.\r\n\r\nSin autem ad adulescentiam perduxissent, dirimi tamen interdum contentione vel uxoriae condicionis vel commodi alicuius, quod idem adipisci uterque non posset. Quod si qui longius in amicitia provecti essent, tamen saepe labefactari, si in honoris contentionem incidissent; pestem enim nullam maiorem esse amicitiis quam in plerisque pecuniae cupiditatem, in optimis quibusque honoris certamen et gloriae; ex quo inimicitias maximas saepe inter amicissimos exstitisse.\r\n\r\nEquitis Romani autem esse filium criminis loco poni ab accusatoribus neque his iudicantibus oportuit neque defendentibus nobis. Nam quod de pietate dixistis, est quidem ista nostra existimatio, sed iudicium certe parentis; quid nos opinemur, audietis ex iuratis; quid parentes sentiant, lacrimae matris incredibilisque maeror, squalor patris et haec praesens maestitia, quam cernitis, luctusque declarat.\r\n\r\nHaec ubi latius fama vulgasset missaeque relationes adsiduae Gallum Caesarem permovissent, qu      ', '2022-06-24 14:44:36', 'Open', '2022-08-31 22:17:22', 2),
(3, 'Titre du 3 : Nam \r\n quibusdam, quos audio', ' chapot du 3: amicitias, ne necesse sit unum sollicitum ', ' Nam quibusdam, quos audio sapientes habitos in Graecia, placuisse opinor mirabilia quaedam (sed nihil est quod illi non persequantur argutiis): partim fugiendas esse nimias amicitias, ne necesse sit unum sollicitum esse pro pluribus; satis superque esse sibi suarum cuique rerum, alienis nimis implicari molestum esse; commodissimum esse quam laxissimas habenas habere amicitiae, quas vel adducas, cum velis, vel remittas; caput enim esse ad beate vivendum securitatem, qua frui non possit animus, si tamquam parturiat unus pro pluribus.\r\n\r\nSin autem ad adulescentiam perduxissent, dirimi tamen interdum contentione vel uxoriae condicionis vel commodi alicuius, quod idem adipisci uterque non posset. Quod si qui longius in amicitia provecti essent, tamen saepe labefactari, si in honoris contentionem incidissent; pestem enim nullam maiorem esse amicitiis quam in plerisque pecuniae cupiditatem, in optimis quibusque honoris certamen et gloriae; ex quo inimicitias maximas saepe inter amicissimos exstitisse.\r\n\r\nEquitis Romani autem esse filium criminis loco poni ab accusatoribus neque his iudicantibus oportuit neque defendentibus nobis. Nam quod de pietate dixistis, est quidem ista nostra existimatio, sed iudicium certe parentis; quid nos opinemur, audietis ex iuratis; quid parentes sentiant, lacrimae matris incredibilisque maeror, squalor patris et haec praesens maestitia, quam cernitis, luctusque declarat.\r\n\r\nHaec ubi latius fama vulgasset missaeque relationes adsiduae Gallum Caesarem permovissent, qu              ', '2022-06-25 14:44:36', 'Open', '2022-08-31 22:17:28', 67),
(20, 'Titre du 4 : Nam\r\n quibusdam, quos audio', 'Chapot du 4: amicitias, ne necesse sit unum sollicitum ', '  Nam quibusdam, quos audio sapientes habitos in Graecia, placuisse opinor mirabilia quaedam (sed nihil est quod illi non persequantur argutiis): partim fugiendas esse nimias amicitias, ne necesse sit unum sollicitum esse pro pluribus; satis superque esse sibi suarum cuique rerum, alienis nimis implicari molestum esse; commodissimum esse quam laxissimas habenas habere amicitiae, quas vel adducas, cum velis, vel remittas; caput enim esse ad beate vivendum securitatem, qua frui non possit animus, si tamquam parturiat unus pro pluribus.\r\n\r\nSin autem ad adulescentiam perduxissent, dirimi tamen interdum contentione vel uxoriae condicionis vel commodi alicuius, quod idem adipisci uterque non posset. Quod si qui longius in amicitia provecti essent, tamen saepe labefactari, si in honoris contentionem incidissent; pestem enim nullam maiorem esse amicitiis quam in plerisque pecuniae cupiditatem, in optimis quibusque honoris certamen et gloriae; ex quo inimicitias maximas saepe inter amicissimos exstitisse.\r\n\r\nEquitis Romani autem esse filium criminis loco poni ab accusatoribus neque his iudicantibus oportuit neque defendentibus nobis. Nam quod de pietate dixistis, est quidem ista nostra existimatio, sed iudicium certe parentis; quid nos opinemur, audietis ex iuratis; quid parentes sentiant, lacrimae matris incredibilisque maeror, squalor patris et haec praesens maestitia, quam cernitis, luctusque declarat.\r\n\r\nHaec ubi latius fama vulgasset missaeque relationes adsiduae Gallum Caesarem permovissent, qu                 ', '2022-08-08 14:39:00', 'Open', '2022-08-31 22:17:43', 67),
(29, 'Titre du 5 : Nam\r\n quibusdam, quos audio', 'Chapot du 5: amicitias, ne necesse sit unum sollicitum ', 'Lorem ipsum dolor sit amet. Et labore debitis ab galisum voluptatem et ducimus sint. Ex porro voluptates quo laudantium velit ad obcaecati assumenda eum consequatur alias quo asperiores minus ut autem tenetur et tenetur ipsam. Aut quia dolor 33 minima rerum vel galisum minima ad repudiandae atque. Et maiores recusandae sed deleniti culpa ea nihil sunt et quod repudiandae id fugit ducimus qui repellendus cupiditate?\r\n\r\nEa perspiciatis velit a quia Quis qui totam delectus. Ut consectetur excepturi ea voluptatem esse eum corrupti architecto ut vitae mollitia et quam placeat ut suscipit eligendi. Rerum esse et voluptas saepe id totam dolore non quis necessitatibus! Rem nihil doloremque est reiciendis laboriosam et amet reprehenderit ea ducimus placeat sed quisquam mollitia At sint libero!\r\n\r\nSed nihil odit sit fugit natus et fugit voluptatibus ut nulla aperiam. Vel labore mollitia sit cumque harum qui Quis maiores id impedit aspernatur vel corporis eveniet qui iste quibusdam ea consequatur odio. Sed aliquid similique ut illum minima sed quibusdam repudiandae hic voluptates maiores ut labore dolores et fugit quam?                                                                                   ', '2022-08-31 22:18:36', 'Open', '2022-08-31 22:18:46', 1);

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
(144, '2022-09-01 12:33:52', 'Open', '  Unde Rufinus ea tempestate praefectus praetorio ad discrimen trusus est ultimum. ire enim ipse compellebatur ad militem, quem exagitabat inopia simul et feritas, et alioqui coalito more in ordinarias dignitates asperum semper et saevum, ut satisfaceret atque monstraret, quam ob causam annonae convectio sit impedita.', 3, 1, 67),
(145, '2022-09-01 12:34:00', 'Open', '  Unde Rufinus ea tempestate praefectus praetorio ad discrimen trusus est ultimum. ire enim ipse compellebatur ad militem, quem exagitabat inopia simul et feritas, et alioqui coalito more in ordinarias dignitates asperum semper et saevum, ut satisfaceret atque monstraret, quam ob causam annonae convectio sit impedita.', 1, 1, 67),
(146, '2022-09-01 12:34:13', 'Open', '  Unde Rufinus ea tempestate praefectus praetorio ad discrimen trusus est ultimum. ire enim ipse compellebatur ad militem, quem ex', 1, 2, 2),
(147, '2022-09-01 12:34:24', 'Open', '  Unde Rufinus ea tempestate praefectus praetorio ad discrimen trusus est ultimum. ire enim ipse compellebatur ad militem, quem exagitabat inopia simul et feritas, et alioqui coalito more in ordinarias dignitates asperum semper et saevum, ut satisfaceret atque monstraret, quam ob causam annonae convectio sit impedita.  Unde Rufinus ea tempestate praefectus praetorio ad discrimen trusus est ultimum. ire enim ipse compellebatur ad militem, quem exagitabat inopia simul et feritas, et alioqui coalito more in ordinarias dignitates asperum semper et saevum, ut satisfaceret atque monstraret, quam ob causam annonae convectio sit impedita.', 2, 20, 67);

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
(67, 'pa@pa.fr', '$1$thexkyis$U05YXCCvhX49vidDiXV.Q/', 'Paolo', 'easy', 'Admin'),
(68, 'admin@admin.fr', '$1$thexkyis$hHPrPFaej.5WhxmncL10R.', 'Visitor Admin firstName', 'Admin surName', 'Admin'),
(69, 'tete@tet.fr', '$1$thexkyis$VO9lCA1oiU/F3AlzCMZf6.', 'tete@tet.fr', 'tete@tet.fr', 'User');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
