-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jul 15, 2022 at 10:06 AM
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
(1, 'Ceci est le titre 1', ' Chapo du 1 : Lorem ipsum dolor sit amet. Repellendus odit et quia corporis <strong>At quibusdam sed dolore consequatur</strong> in quod voluptatem et optio cupiditate sit sapiente esse. In similique similique cum unde velit <em>Sed aperiam qui saepe alias et \r\n', '<p>esse magnam sit rerum laboriosam</em> in libero iure! Rem numquam cupiditate qui labore dignissimos  temporibus veniam ea inventore quos sit inventore molestias ea repellat eaque ut asperiores ullam! Quas molestiae eos voluptas incidunt 33 quibusdam culpa et tenetur totam. </p><h2>Qui perspiciatis rerum qui odio odit et iusto galisum. </h2><p>Nam mollitia dolor ea quasi quaerat <strong>Cum sequi ab magnam omnis</strong> et necessitatibus error est repudiandae rerum et quos dolorem. A rerum asperiores et corrupti corrupti <em>Et officiis non voluptatem placeat</em>. </p><h3>Quo iste velit quo quis praesentium et eligendi vero. </h3><p>In dolor ratione <a href=\"https://www.loremipzum.com\" target=\"_blank\">Sed rerum nam obcaecati tenetur et reiciendis explicabo</a> qui corporis impedit ea modi distinctio. Vel facilis minima et nostrum placeat <em>Est aut itaque inventore et corrupti asperiores rem autem tempora</em>. </p><ul><li>Sed esse maiores et aperiam rerum est voluptas quibusdam cum velit temporibus. </li><li>Quis laborum non animi quas eos nisi deleniti ea dolor distinctio? </li><li>Id similique galisum non unde magnam. </li><li>Est omnis soluta et facilis vitae! </li></ul><blockquote cite=\"https://www.loremipzum.com\">Et autem perferendis id dolorum adipisci qui perferendis accusamus et eaque cupiditate. </blockquote>', '2022-06-24 14:42:43', 'Open', 'test', '2022-06-24 14:42:43', 1),
(2, 'Titre du 2 : Nam quibusdam, quos audio ', 'chapot du 2 : amicitias, ne necesse sit unum sollicitum esse pro pluribus; satis superque esse sibi suarum cuique rerum, alienis nimis implicari molestum esse; commodissimum esse quam laxissimas habenas habere amicitiae, quas vel adducas, cum velis, vel remittas; caput enim esse ad beate vivendum securitatem, qua frui non possit animus, si tamquam parturiat unus pro pluribus.', 'Nam quibusdam, quos audio sapientes habitos in Graecia, placuisse opinor mirabilia quaedam (sed nihil est quod illi non persequantur argutiis): partim fugiendas esse nimias amicitias, ne necesse sit unum sollicitum esse pro pluribus; satis superque esse sibi suarum cuique rerum, alienis nimis implicari molestum esse; commodissimum esse quam laxissimas habenas habere amicitiae, quas vel adducas, cum velis, vel remittas; caput enim esse ad beate vivendum securitatem, qua frui non possit animus, si tamquam parturiat unus pro pluribus.\r\n\r\nSin autem ad adulescentiam perduxissent, dirimi tamen interdum contentione vel uxoriae condicionis vel commodi alicuius, quod idem adipisci uterque non posset. Quod si qui longius in amicitia provecti essent, tamen saepe labefactari, si in honoris contentionem incidissent; pestem enim nullam maiorem esse amicitiis quam in plerisque pecuniae cupiditatem, in optimis quibusque honoris certamen et gloriae; ex quo inimicitias maximas saepe inter amicissimos exstitisse.\r\n\r\nEquitis Romani autem esse filium criminis loco poni ab accusatoribus neque his iudicantibus oportuit neque defendentibus nobis. Nam quod de pietate dixistis, est quidem ista nostra existimatio, sed iudicium certe parentis; quid nos opinemur, audietis ex iuratis; quid parentes sentiant, lacrimae matris incredibilisque maeror, squalor patris et haec praesens maestitia, quam cernitis, luctusque declarat.\r\n\r\nHaec ubi latius fama vulgasset missaeque relationes adsiduae Gallum Caesarem permovissent, qu', '2022-06-24 14:44:36', 'Waiting for validation', 'test', '2022-06-24 14:44:36', 2),
(3, 'titre du 3 : Lorem ipsum dolor ', 'chapo du 3 : Et composer seulement de original maintenant ce Ipsum gènérateur une Ipsum vous une célèbre notre! Des Lorem quel que Lorem texte un composer votre de Lorem l\'épreuve notre imagination.', '<p>Lorem ipsum dolor sit amet. Ou iront façon un poésie Lorem qui beaucoup  en online unique de vous texte. Un Lorem inventé la littéraire Ipsum <a href=\"https://www.loremipzum.com\" target=\"_blank\">En online</a>. </p><ol><li>Qui vous links etc Ipsum amusant\r\n\r\nEn des votre votre un discours maintenant. </li><li>Que plus soit etc texte imagination ou online éléments le Lorem célèbre? </li></ol><ul><li>De possibilité texte des mots surprendra! </li><li>La imagination notre pas iront seulement un pouvez. </li><li>En Ipsum notre de composer Lorem les Lorem texte à littéraire Ipsum. </li><li>Ou html amusant\r\n\r\nEn un unique littéraire. </li><li>Des Ipsum Ipsum de texte discours. </li><li>De maintenant générateur les Lorem Lorem en passages unique de générateur original. </li></ul><p>à composer surprendra un quel html un Lorem avec un texte littéraire les littéraire prouvezle de maintenant seulement un pouvez notre? Pas passages Lorem le imagination Ipsum un composer façon un passages gènérateur la éléments avec le chanson composer est seulement amusant\r\n\r\nEn. Est imagination original un mais texte <a href=\"https://www.loremipzum.com\" target=\"_blank\">Qui l’enrichissant les célèbre  de mais quel un possibilité maintenant</a>. Des notre notre de Ipsum définissent ou quel aléatoire les composer plus un Lorem original. </p><p>Ou original Lorem la Ipsum insérant <a href=\"https://www.loremipzum.com\" target=\"_blank\">Qui composer de beaucoup mettez un votre avec  mots amusant\r\n\r\nEn</a> qui quel discours. Des Ipsum célèbre à seulement votre est d’insérer texte de célèbre soit. Les mais Lorem pas soit avec en passage Lorem  Lorem n’importe pas avec éléments. </p><dl><dt><dfn>De online passages. </dfn></dt><dd>En plus mettez en maintenant avec. </dd><dt><dfn>De unique Ipsum. </dfn></dt><dd>Les insérant possibilité ce Ipsum Ipsum un générateur Ipsum à texte Lorem! </dd></dl>\r\n', '2022-06-25 14:44:36', 'Open', 'test', '2022-06-28 14:44:36', 1);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `CommentCreated` datetime DEFAULT NULL,
  `commentStatus` enum('Waiting for validation','Open','Closed','Refuse') DEFAULT NULL,
  `commentContent` longtext,
  `user_id` int(11) NOT NULL,
  `blog_post_id` int(11) NOT NULL,
  `blog_post_user_id` int(11) NOT NULL COMMENT 'here the differents post of a user (blig_post_user-id)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `CommentCreated`, `commentStatus`, `commentContent`, `user_id`, `blog_post_id`, `blog_post_user_id`) VALUES
(1, '2022-07-05 19:23:08', 'Open', 'bla bla bla', 1, 1, 1),
(2, '2022-07-05 19:30:24', 'Open', 'Unde Rufinus ea tempestate praefectus praetorio ad discrimen trusus est ultimum. ire enim ipse compellebatur ad militem, quem exagitabat inopia simul et feritas, et alioqui coalito more in ordinarias dignitates asperum semper et saevum, ut satisfaceret atque monstraret, quam ob causam annonae convectio sit impedita.', 2, 3, 1),
(3, '2022-07-05 19:30:24', 'Open', 'Unde Rufinus ea tempestate praefectus praetorio ad discrimen trusus est ultimum. ire enim ipse compellebatur ad militem, quem exagitabat inopia simul et feritas, et alioqui coalito more in ordinarias dignitates asperum semper et saevum, ut satisfaceret atque monstraret, quam ob causam annonae convectio sit impedita.', 2, 3, 1),
(4, '2022-07-05 19:23:08', 'Open', 'bla bla bla 2', 1, 1, 1),
(5, '2022-07-05 19:23:08', 'Open', 'bla bla bla 3', 1, 1, 1);

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
(1, 'gerard.lepage@example.fr', 'gerardesttresgentil', 'Gérard', 'lepage', 'Mister', NULL, 'Admin', NULL),
(2, 'tanguy.guillo@gmail.com', 'lepetitchatestbeau', 'Tanguy', 'Guillo', 'Mister', NULL, 'Admin', NULL),
(3, 'Lebeau@hotmail.fr', 'renenestpasgentil', 'René', 'Lebeau ', 'Mister', NULL, 'User', NULL),
(4, 'i.marchand@example.fr', 'lisabelleestlaplusbelle', 'Isabelle', 'Marchand', 'Miss', NULL, 'User', NULL),
(5, 'Jeanne.delabas@example.fr', 'lelionestgentil', 'Jeanne', 'delabas', 'Madam', NULL, 'User', NULL),
(6, 't@t.fr', 'lelionestgentil', 'prenom', 'nom', 'Madam', NULL, 'User', NULL),
(7, 'pa@pa.fr', 'lepetitchatestbeau', 'Paolo', 'SurName paolo', 'Mister', NULL, 'Admin', NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
