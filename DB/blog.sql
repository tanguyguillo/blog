-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jul 26, 2022 at 10:02 AM
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
  `postName` varchar(255) DEFAULT NULL,
  `postModified` datetime DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blog_post`
--

INSERT INTO `blog_post` (`id`, `postTitle`, `postChapo`, `postContent`, `postCreated`, `postStatus`, `postName`, `postModified`, `user_id`) VALUES
(1, 'Ceci est le titre 1', ' Chapo du 1 : Lorem ipsum dolor sit amet. Repellendus odit et quia corporis At quibusdam sed dolore consequatur</strong> in quod voluptatem et optio cupiditate sit sapiente esse. In similique similique cum unde velit Sed aperiam qui saepe alias et \r\n', 'Lorem ipsum dolor sit amet. Et labore debitis ab galisum voluptatem et ducimus sint. Ex porro voluptates quo laudantium velit ad obcaecati assumenda eum consequatur alias quo asperiores minus ut autem tenetur et tenetur ipsam. Aut quia dolor 33 minima rerum vel galisum minima ad repudiandae atque. Et maiores recusandae sed deleniti culpa ea nihil sunt et quod repudiandae id fugit ducimus qui repellendus cupiditate?\r\n\r\nEa perspiciatis velit a quia Quis qui totam delectus. Ut consectetur excepturi ea voluptatem esse eum corrupti architecto ut vitae mollitia et quam placeat ut suscipit eligendi. Rerum esse et voluptas saepe id totam dolore non quis necessitatibus! Rem nihil doloremque est reiciendis laboriosam et amet reprehenderit ea ducimus placeat sed quisquam mollitia At sint libero!\r\n\r\nSed nihil odit sit fugit natus et fugit voluptatibus ut nulla aperiam. Vel labore mollitia sit cumque harum qui Quis maiores id impedit aspernatur vel corporis eveniet qui iste quibusdam ea consequatur odio. Sed aliquid similique ut illum minima sed quibusdam repudiandae hic voluptates maiores ut labore dolores et fugit quam?', '2022-06-24 14:42:43', 'Open', 'test', '2022-06-24 14:42:43', 1),
(2, 'Titre du 2 : Nam quibusdam, quos audio ', 'chapot du 2 : amicitias, ne necesse sit unum sollicitum esse pro pluribus; satis superque esse sibi suarum cuique rerum, alienis nimis implicari molestum esse; commodissimum esse quam laxissimas habenas habere amicitiae, quas vel adducas, cum velis, vel remittas; caput enim esse ad beate vivendum securitatem, qua frui non possit animus, si tamquam parturiat unus pro pluribus.', 'Nam quibusdam, quos audio sapientes habitos in Graecia, placuisse opinor mirabilia quaedam (sed nihil est quod illi non persequantur argutiis): partim fugiendas esse nimias amicitias, ne necesse sit unum sollicitum esse pro pluribus; satis superque esse sibi suarum cuique rerum, alienis nimis implicari molestum esse; commodissimum esse quam laxissimas habenas habere amicitiae, quas vel adducas, cum velis, vel remittas; caput enim esse ad beate vivendum securitatem, qua frui non possit animus, si tamquam parturiat unus pro pluribus.\r\n\r\nSin autem ad adulescentiam perduxissent, dirimi tamen interdum contentione vel uxoriae condicionis vel commodi alicuius, quod idem adipisci uterque non posset. Quod si qui longius in amicitia provecti essent, tamen saepe labefactari, si in honoris contentionem incidissent; pestem enim nullam maiorem esse amicitiis quam in plerisque pecuniae cupiditatem, in optimis quibusque honoris certamen et gloriae; ex quo inimicitias maximas saepe inter amicissimos exstitisse.\r\n\r\nEquitis Romani autem esse filium criminis loco poni ab accusatoribus neque his iudicantibus oportuit neque defendentibus nobis. Nam quod de pietate dixistis, est quidem ista nostra existimatio, sed iudicium certe parentis; quid nos opinemur, audietis ex iuratis; quid parentes sentiant, lacrimae matris incredibilisque maeror, squalor patris et haec praesens maestitia, quam cernitis, luctusque declarat.\r\n\r\nHaec ubi latius fama vulgasset missaeque relationes adsiduae Gallum Caesarem permovissent, qu', '2022-06-24 14:44:36', 'Open', 'test', '2022-06-24 14:44:36', 2),
(3, 'titre du 3 : Lorem ipsum dolor ', 'chapo du 3 : Et composer seulement de original maintenant ce Ipsum gènérateur une Ipsum vous une célèbre notre! Des Lorem quel que Lorem texte un composer votre de Lorem l\'épreuve notre imagination.', 'Lorem ipsum dolor sit amet. Des célèbre générateur en avec avec est poésie amusant En. Est Ipsum mais un personnel avec Ipsum composer de avec plus est d’insérer amusant En. De générateur possibilité un externes Ipsum un externes online que avec en n’importe.\r\n\r\nEn soit avec est littéraire célèbre la links fait ce texte n’importe la personnel mais la externes texte. La Lorem avec de d’insérer poésie de texte l’enrichissant un avec Lorem un littéraire votre la chanson pouvez en structure poésie? Pas Lorem mais pas links littéraire la chanson mais en l’enrichissant composer des personnel avec? En fait discours etc d’insérer poésie la vous amusant En ou insérant Lorem que pouvez texte.\r\n\r\nEn mais générateur qui beaucoup fait une externes personnel! En texte structure ce notr chanson pas fait notr des littéraire texte un links externes de avec texte. De links n’importe une html personnel en d’insérer notr est beaucoup définissent?', '2022-06-25 14:44:36', 'Open', 'test', '2022-06-28 14:44:36', 1);

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
(1, '2022-07-05 19:23:08', 'Open', 'bla bla bla', 1, 1, 1),
(2, '2022-07-05 19:30:24', 'Open', 'Unde Rufinus ea tempestate praefectus praetorio ad discrimen trusus est ultimum. ire enim ipse compellebatur ad militem, quem exagitabat inopia simul et feritas, et alioqui coalito more in ordinarias dignitates asperum semper et saevum, ut satisfaceret atque monstraret, quam ob causam annonae convectio sit impedita.', 2, 3, 1),
(3, '2022-07-05 19:30:24', 'Open', 'Unde Rufinus ea tempestate praefectus praetorio ad discrimen trusus est ultimum. ire enim ipse compellebatur ad militem, quem exagitabat inopia simul et feritas, et alioqui coalito more in ordinarias dignitates asperum semper et saevum, ut satisfaceret atque monstraret, quam ob causam annonae convectio sit impedita.', 2, 3, 1),
(4, '2022-07-05 19:23:08', 'Open', 'bla bla bla 2', 1, 1, 1),
(5, '2022-07-05 19:23:08', 'Open', 'bla bla bla 3', 1, 1, 1),
(7, '2022-07-22 05:47:24', 'Open', 'test 42', 2, 3, 1),
(9, '2022-07-22 05:52:01', 'Open', 'test avec 1', 2, 1, 1),
(11, '2022-07-22 05:59:39', 'Open', 'test avec le 2', 2, 2, 2),
(12, '2022-07-22 06:12:22', 'Open', 'un commentaire de pa@pa.fr ....', 2, 2, 2),
(15, '2022-07-22 08:00:59', 'Open', 'test avec Gérard...', 2, 2, 2),
(19, '2022-07-22 08:10:22', 'Waiting for validation', 'test 56 tanguy', 2, 2, 2),
(21, '2022-07-22 08:50:00', 'Waiting for validation', 'test a 22H49 tanguy', 2, 3, 1),
(27, '2022-07-22 09:01:24', 'Open', 'test avec rené id : 3', 3, 3, 1),
(28, '2022-07-22 09:04:59', 'Open', 'test avec rené id  writer: 3', 3, 1, 1),
(29, '2022-07-22 09:07:32', 'Open', 'test avec jeanne id : 5  ', 3, 2, 2),
(39, '2022-07-23 06:16:21', 'Waiting for validation', 'test 56', 2, 3, 1),
(40, '2022-07-23 06:17:20', 'Waiting for validation', 'test 56 --2', 2, 3, 1),
(41, '2022-07-23 06:54:37', 'Waiting for validation', 'test 57', 2, 3, 1),
(42, '2022-07-25 09:11:27', 'Open', 'test commentaire tanguy 25 juillet 2022 11h11', 2, 3, 1),
(43, '2022-07-25 02:59:39', 'Waiting for validation', 'qdqDqd', 28, 3, 1),
(44, '2022-07-25 03:00:30', 'Waiting for validation', 'test encrypt 2', 28, 3, 1),
(45, '2022-07-25 04:56:30', 'Waiting for validation', 'test avec test.fr', 32, 2, 2);

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
  `titleUser` enum('Madam','Miss','Mister') DEFAULT NULL,
  `telGsmUser` varchar(45) DEFAULT NULL,
  `roleUser` enum('Admin','User') DEFAULT NULL,
  `pictureOrLogo` varchar(512) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `emailUser`, `passWordUser`, `firstNameUser`, `surNameUser`, `titleUser`, `telGsmUser`, `roleUser`, `pictureOrLogo`) VALUES
(1, 'gerard.lepage@example.fr', '$1$thexkyis$qhLnFid8IDRHoOnZrAomH0', 'Gérard', 'lepage', 'Mister', NULL, 'Admin', NULL),
(2, 'tanguy.guillo@gmail.com', '$1$thexkyis$ubEukNiISWiDZgoOqM6zd', 'Tanguy', 'Guillo', 'Mister', NULL, 'Admin', NULL),
(3, 'Lebeau@exemple.fr', '$1$thexkyis$YLrLuFK598r8RRKoKBLKW0', 'René', 'Lebeau ', 'Mister', NULL, 'User', NULL),
(4, 'i.marchand@example.fr', '$1$thexkyis$uDIqgNhVSZYUigXjJ9o7K0', 'Isabelle', 'Marchand', 'Miss', NULL, 'User', NULL),
(5, 'Jeanne.delabas@example.fr', '$1$thexkyis$4bouVMEF2Wz9SwyCd/4Xb1', 'Jeanne', 'delabas', 'Madam', NULL, 'User', NULL),
(7, 'pa@pa.fr', '$1$thexkyis$ubEukNiISWiDZgoOqM6zd.', 'Paolo', 'Easy', 'Mister', NULL, 'Admin', NULL),
(22, 'legrand@test.fr', '$1$thexkyis$Jg3YE53nNcraRQjHLMudV0', 'jean Marie', 'Le Grand', NULL, NULL, 'User', NULL),
(40, 'test@test.fr', '$1$thexkyis$hNvuAeGdrf02qoassydzQ.', 'test@test.fr', 'test@test.fr', NULL, NULL, 'User', NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog_post`
--
ALTER TABLE `blog_post`
  ADD CONSTRAINT `fk_blog_post_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk_comment_blog_post1` FOREIGN KEY (`blog_post_id`,`blog_post_user_id`) REFERENCES `blog_post` (`id`, `user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_comment_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
