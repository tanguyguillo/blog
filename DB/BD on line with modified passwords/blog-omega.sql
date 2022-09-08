-- phpMyAdmin SQL Dump
-- version 5.1.4
-- https://www.phpmyadmin.net/
--
-- Host: mysql-tanguy-guillo.alwaysdata.net
-- Generation Time: Sep 08, 2022 at 12:43 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tanguy-guillo_blog-omega`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_post`
--

CREATE TABLE `blog_post` (
  `id` int(11) NOT NULL,
  `postTitle` varchar(255) DEFAULT NULL,
  `postChapo` longtext DEFAULT NULL,
  `postContent` longtext DEFAULT NULL,
  `postCreated` datetime NOT NULL,
  `postStatus` enum('Waiting for validation','Open','Closed') DEFAULT NULL,
  `postModified` datetime DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blog_post`
--

INSERT INTO `blog_post` (`id`, `postTitle`, `postChapo`, `postContent`, `postCreated`, `postStatus`, `postModified`, `user_id`) VALUES
(1, 'Titre 1 :\r\nLorem ipsum dolor sit amet. Et labore debi', 'Chapo 1 : \r\nLorem ipsum dolor sit amet. Repellendus odit et quia corporis At quibusdam sed dolore consequatur tron n quod voluptatem et optio cupiditate sit sapiente esse. In similique similique cum unde velit Sed aperiam qui saepe alias et', 'Lorem ipsum dolor sit amet. Et labore debitis ab galisum voluptatem et ducimus sint. Ex porro voluptates quo laudantium velit ad obcaecati assumenda eum consequatur alias quo asperiores minus ut autem tenetur et tenetur ipsam. Aut quia dolor 33 minima rerum vel galisum minima ad repudiandae atque. Et maiores recusandae sed deleniti culpa ea nihil sunt et quod repudiandae id fugit ducimus qui repellendus cupiditate?\r\n\r\nEa perspiciatis velit a quia Quis qui totam delectus. Ut consectetur excepturi ea voluptatem esse eum corrupti architecto ut vitae mollitia et quam placeat ut suscipit eligendi. Rerum esse et voluptas saepe id totam dolore non quis necessitatibus! Rem nihil doloremque est reiciendis laboriosam et amet reprehenderit ea ducimus placeat sed quisquam mollitia At sint libero!\r\n\r\nSed nihil odit sit fugit natus et fugit voluptatibus ut nulla aperiam. Vel labore mollitia sit cumque harum qui Quis maiores id impedit aspernatur vel corporis eveniet qui iste quibusdam ea consequatur odio. Sed aliquid similique ut illum minima sed quibusdam repudiandae hic voluptates maiores ut labore dolores et fugit quam? ', '2022-06-24 14:42:43', 'Open', '2022-09-08 12:39:07', 46),
(3, 'Titre 3 :\r\nEt composer seulement de original ', 'Chapo 3 : \r\nEt composer seulement de original maintenant ce Ipsum gènérateur une Ipsum vous une célèbre notre! Des Lorem quel que Lorem texte un composer votre de Lorem preuve notre imagination.  ', 'Lorem ipsum dolor sit amet. Des célèbre générateur en avec avec est poésie amusant En. Est Ipsum mais un personnel avec Ipsum composer de avec plus est d’insérer amusant En. De générateur possibilité un externes Ipsum un externes online que avec en n’importe.\r\n\r\nEn soit avec est littéraire célèbre la links fait ce texte n’importe la personnel mais la externes texte. La Lorem avec de d’insérer poésie de texte l’enrichissant un avec Lorem un littéraire votre la chanson pouvez en structure poésie? Pas Lorem mais pas links littéraire la chanson mais en l’enrichissant composer des personnel avec? En fait discours etc d’insérer poésie la vous amusant En ou insérant Lorem que pouvez texte.\r\n\r\nEn mais générateur qui beaucoup fait une externes personnel! En texte structure ce notr chanson pas fait notr des littéraire texte un links externes de avec texte. De links n’importe une html personnel en d’insérer notr est beaucoup définissent? ', '2022-06-25 14:44:36', 'Open', '2022-09-08 12:41:26', 1),
(11, 'Titre 2 :\r\nLorem ipsum dolor ', 'Chapo 2 : \r\nEt composer seulement de original ', 'Lorem ipsum dolor sit amet. Des célèbre générateur en avec avec est poésie amusant En. Est Ipsum mais un personnel avec Ipsum composer de avec plus est d’insérer amusant En. De générateur possibilité un externes Ipsum un externes online que avec en n’importe. ', '2022-08-12 11:33:58', 'Open', '2022-09-08 12:41:33', 1),
(13, 'Titre 4: \r\nLorem ipsum dolor ', 'Chapo 4 : \r\nLorem ipsum dolor sitamet. Repellendus odit et quia corporis At quibusdam sed dolore consequaquod voluptatem et optio cupiditate sit sapiente esse. In similique similique cum unde velit Sed aperiam qui saepe alias et  ', 'Lorem ipsum dolor sit amet. Des célèbre générateur en avec avec est poésie amusant En. Est Ipsum mais un personnel avec Ipsum composer de avec plus est d’insérer amusant En. De générateur possibilité un externes Ipsum un externes online que avec en n’importe.  ', '2022-08-12 12:10:21', 'Open', '2022-09-08 12:41:42', 1),
(52, 'Titre : test en ligne du 3 sept             ', 'Chapo : test en ligne du 3 sept   ', 'Contenu : Titre : test en ligne du 3 sept             ', '2022-09-02 18:08:39', 'Closed', '2022-09-05 11:55:39', 1),
(72, 'test ', 'test ', 'test ', '2022-09-08 12:35:00', 'Waiting for validation', '2022-09-08 12:35:22', 47);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `commentCreated` datetime DEFAULT NULL,
  `commentStatus` enum('Waiting for validation','Open','Closed','Refuse') DEFAULT NULL,
  `commentContent` longtext DEFAULT NULL,
  `user_id` int(11) NOT NULL COMMENT 'id of the writer of the comment',
  `blog_post_id` int(11) NOT NULL COMMENT 'the id of the article',
  `blog_post_user_id` int(11) NOT NULL COMMENT 'the writer''s id of the article'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `commentCreated`, `commentStatus`, `commentContent`, `user_id`, `blog_post_id`, `blog_post_user_id`) VALUES
(83, '2022-09-01 12:27:46', 'Open', '  Unde Rufinus ea tempestate praefectus praetorio ad discrimen trusus est ultimum. ire enim ipse compellebatur ad militem, quem exagitabat inopia simul et feritas, et alioqui coalito more in ordinarias dignitates asperum semper et saevum, ut satisfaceret atque monstraret, quam ob causam annonae convectio sit impedita.', 53, 1, 1),
(84, '2022-09-01 12:28:12', 'Open', 'Cognitis enim pilatorum caesorumque funeribus nemo deinde ad has stationes appulit navem, sed ut Scironis praerupta letalia declinantes litoribus Cypriis contigui navigabant, quae Isauriae scopulis sunt controversa.', 53, 1, 1),
(85, '2022-09-01 12:28:22', 'Open', 'Cognitis enim pilatorum caesorumque funeribus nemo deinde ad has stationes appulit navem, sed ut Scironis praerupta letalia declinantes litoribus Cypriis contigui navigabant, quae Isauriae scopulis sunt controversa.', 53, 3, 1),
(86, '2022-09-01 09:35:25', 'Open', 'Oem ipsum dolor sit amet. Repellendus odit et  Lorem ipsum dolor sit amet. Des célèbre générateur en avec avec est poésie amusant En. Est Ipsum mais un personnel avec Ipsum composer de avec plus est d’insérer amusant En. De générateur possibilité un externes Ipsum un externes online que avec en n’importe.\r\n', 53, 11, 47),
(87, '2022-09-01 09:36:13', 'Open', ' WLorem ipsum dolor sit amet. Des célèbre générateur en avec avec est poésie amusant En. Est Ipsum mais un personnel avec Ipsum composer de avec plus est d’insérer amusant En. De générateur possibilité un externes Ipsum un externes online que avec en n’importe.\n', 53, 13, 63),
(193, '2022-09-08 12:33:16', 'Waiting for validation', 'test', 1, 1, 46);

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
(1, 'gerard.lepage@example.fr', '$1$BlueyeWe$VGBc..yP9FcF1YRFq2aeF/', 'Gérard', 'lepage', 'Admin'),
(3, 'Lebeau@exemple.fr', '$1$BlueyeWe$OMuncSfm2T70H2H7kQRQb/', 'René', 'Lebeau ', 'User'),
(4, 'i.marchand@example.fr', '$1$BlueyeWe$OMuncSfm2T70H2H7kQRQb/', 'Isabelle', 'Marchand', 'User'),
(5, 'Jeanne.delabas@example.fr', '$1$BlueyeWe$QnZiwcMKzBL.Qy3r6.0tt0', 'Jeanne', 'delabas', 'User'),
(46, 'pa@pa.fr', '$1$BlueyeWe$W.8xZr4tQmsOqFaLO3TuX.', 'Paolo', 'easy', 'Admin'),
(47, 'tanguy.guillo@gmail.com', '$1$BlueyeWe$RYnkj/79HvFt.AZGNcaVo0', 'Tanguy', 'Guillo', 'Admin'),
(50, 'moi@moi.fr', '$1$BlueyeWe$4q86/zo8p.JaCZgVvzbOw/', 'moi@moi.fr', 'moi@moi.fr', 'User'),
(53, 'admin@admin.fr', '$1$BlueyeWe$BI8oshXyacQCNVjJf.kvx/', 'admin@admin.fr', 'admin@admin.fr', 'Admin'),
(63, 'babguillo@exemple.fr', '$1$BlueyeWe$n0BPoj7p9Gq3KjZi0iks9.', 'Babette', 'Guillo', 'Admin');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=194;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
