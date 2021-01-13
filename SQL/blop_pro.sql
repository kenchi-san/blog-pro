-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : Dim 03 jan. 2021 à 02:47
-- Version du serveur :  5.7.31
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `blop_pro`
--

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` longtext COLLATE utf8_bin NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `post_id` int(11) NOT NULL,
  `comment_status_id` int(11) NOT NULL DEFAULT '1',
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `comment_status_id` (`comment_status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id`, `content`, `created_at`, `post_id`, `comment_status_id`, `user_id`) VALUES
(1, 'mon super premier commentaire !!!!!!!!!', '2020-11-10 21:39:06', 7, 1, 10),
(2, '<p>efzef zef zef zef zefze fze fze fezf&nbsp;efzef zef zef zef zefze fze fze fezf&nbsp;efzef zef zef zef zefze fze fze fezf&nbsp;efzef zef zef zef zefze fze fze fezf&nbsp;efzef zef zef zef zefze fze fze fezf&nbsp;efzef zef zef zef zefze fze fze fezf&nbsp;efzef zef zef zef zefze fze fze fezf&nbsp;efzef zef zef zef zefze fze fze fezf&nbsp;efzef zef zef zef zefze fze fze fezf&nbsp;efzef zef zef zef zefze fze fze fezf&nbsp;efzef zef zef zef zefze fze fze fezf&nbsp;efzef zef zef zef zefze fze fze fezf&nbsp;efzef zef zef zef zefze fze fze fezf&nbsp;efzef zef zef zef zefze fze fze fezf&nbsp;efzef zef zef zef zefze fze fze fezf&nbsp;efzef zef zef zef zefze fze fze fezf&nbsp;</p>', '2020-11-12 21:51:24', 5, 1, 10),
(3, '<p>efzef zef zef zef zefze fze fze fezf&nbsp;efzef zef zef zef zefze fze fze fezf&nbsp;efzef zef zef zef zefze fze fze fezf&nbsp;efzef zef zef zef zefze fze fze fezf&nbsp;efzef zef zef zef zefze fze fze fezf&nbsp;efzef zef zef zef zefze fze fze fezf&nbsp;efzef zef zef zef zefze fze fze fezf&nbsp;efzef zef zef zef zefze fze fze fezf&nbsp;efzef zef zef zef zefze fze fze fezf&nbsp;efzef zef zef zef zefze fze fze fezf&nbsp;efzef zef zef zef zefze fze fze fezf&nbsp;efzef zef zef zef zefze fze fze fezf&nbsp;efzef zef zef zef zefze fze fze fezf&nbsp;efzef zef zef zef zefze fze fze fezf&nbsp;efzef zef zef zef zefze fze fze fezf&nbsp;efzef zef zef zef zefze fze fze fezf&nbsp;</p>', '2020-11-12 21:51:56', 5, 1, 10),
(4, '<p>efzef zef zef zef zefze fze fze fezf&nbsp;efzef zef zef zef zefze fze fze fezf&nbsp;efzef zef zef zef zefze fze fze fezf&nbsp;efzef zef zef zef zefze fze fze fezf&nbsp;efzef zef zef zef zefze fze fze fezf&nbsp;efzef zef zef zef zefze fze fze fezf&nbsp;efzef zef zef zef zefze fze fze fezf&nbsp;efzef zef zef zef zefze fze fze fezf&nbsp;efzef zef zef zef zefze fze fze fezf&nbsp;efzef zef zef zef zefze fze fze fezf&nbsp;efzef zef zef zef zefze fze fze fezf&nbsp;efzef zef zef zef zefze fze fze fezf&nbsp;efzef zef zef zef zefze fze fze fezf&nbsp;efzef zef zef zef zefze fze fze fezf&nbsp;efzef zef zef zef zefze fze fze fezf&nbsp;efzef zef zef zef zefze fze fze fezf&nbsp;</p>', '2020-11-12 21:53:30', 5, 1, 10),
(5, '<p>efzef zef zef zef zefze fze fze fezf&nbsp;efzef zef zef zef zefze fze fze fezf&nbsp;efzef zef zef zef zefze fze fze fezf&nbsp;efzef zef zef zef zefze fze fze fezf&nbsp;efzef zef zef zef zefze fze fze fezf&nbsp;efzef zef zef zef zefze fze fze fezf&nbsp;efzef zef zef zef zefze fze fze fezf&nbsp;efzef zef zef zef zefze fze fze fezf&nbsp;efzef zef zef zef zefze fze fze fezf&nbsp;efzef zef zef zef zefze fze fze fezf&nbsp;efzef zef zef zef zefze fze fze fezf&nbsp;efzef zef zef zef zefze fze fze fezf&nbsp;efzef zef zef zef zefze fze fze fezf&nbsp;efzef zef zef zef zefze fze fze fezf&nbsp;efzef zef zef zef zefze fze fze fezf&nbsp;efzef zef zef zef zefze fze fze fezf&nbsp;</p>', '2020-11-12 22:01:40', 5, 1, 10),
(6, '<p>vjgfujgjg uv ik viy il &nbsp;ih bhbki bkh blivhi vv v kyv yy ivjgfujgjg uv ik viy il &nbsp;ih bhbki bkh blivhi vv v kyv yy ivjgfujgjg uv ik viy il &nbsp;ih bhbki bkh blivhi vv v kyv yy ivjgfujgjg uv ik viy il &nbsp;ih bhbki bkh blivhi vv v kyv yy ivjgfujgjg uv ik viy il &nbsp;ih bhbki bkh blivhi vv v kyv yy ivjgfujgjg uv ik viy il &nbsp;ih bhbki bkh blivhi vv v kyv yy ivjgfujgjg uv ik viy il &nbsp;ih bhbki bkh blivhi vv v kyv yy ivjgfujgjg uv ik viy il &nbsp;ih bhbki bkh blivhi vv v kyv yy ivjgfujgjg uv ik viy il &nbsp;ih bhbki bkh blivhi vv v kyv yy ivjgfujgjg uv ik viy il &nbsp;ih bhbki bkh blivhi vv v kyv yy ivjgfujgjg uv ik viy il &nbsp;ih bhbki bkh blivhi vv v kyv yy ivjgfujgjg uv ik viy il &nbsp;ih bhbki bkh blivhi vv v kyv yy ivjgfujgjg uv ik viy il &nbsp;ih bhbki bkh blivhi vv v kyv yy ivjgfujgjg uv ik viy il &nbsp;ih bhbki bkh blivhi vv v kyv yy ivjgfujgjg uv ik viy il &nbsp;ih bhbki bkh blivhi vv v kyv yy ivjgfujgjg uv ik viy il &nbsp;ih bhbki bkh blivhi vv v kyv yy ivjgfujgjg uv ik viy il &nbsp;ih bhbki bkh blivhi vv v kyv yy ivjgfujgjg uv ik viy il &nbsp;ih bhbki bkh blivhi vv v kyv yy ivjgfujgjg uv ik viy il &nbsp;ih bhbki bkh blivhi vv v kyv yy ivjgfujgjg uv ik viy il &nbsp;ih bhbki bkh blivhi vv v kyv yy ivjgfujgjg uv ik viy il &nbsp;ih bhbki bkh blivhi vv v kyv yy ivjgfujgjg uv ik viy il &nbsp;ih bhbki bkh blivhi vv v kyv yy i</p>', '2020-11-12 22:02:04', 5, 1, 10),
(7, '<p>vjgfujgjg uv ik viy il &nbsp;ih bhbki bkh blivhi vv v kyv yy ivjgfujgjg uv ik viy il &nbsp;ih bhbki bkh blivhi vv v kyv yy ivjgfujgjg uv ik viy il &nbsp;ih bhbki bkh blivhi vv v kyv yy ivjgfujgjg uv ik viy il &nbsp;ih bhbki bkh blivhi vv v kyv yy ivjgfujgjg uv ik viy il &nbsp;ih bhbki bkh blivhi vv v kyv yy ivjgfujgjg uv ik viy il &nbsp;ih bhbki bkh blivhi vv v kyv yy ivjgfujgjg uv ik viy il &nbsp;ih bhbki bkh blivhi vv v kyv yy ivjgfujgjg uv ik viy il &nbsp;ih bhbki bkh blivhi vv v kyv yy ivjgfujgjg uv ik viy il &nbsp;ih bhbki bkh blivhi vv v kyv yy ivjgfujgjg uv ik viy il &nbsp;ih bhbki bkh blivhi vv v kyv yy ivjgfujgjg uv ik viy il &nbsp;ih bhbki bkh blivhi vv v kyv yy ivjgfujgjg uv ik viy il &nbsp;ih bhbki bkh blivhi vv v kyv yy ivjgfujgjg uv ik viy il &nbsp;ih bhbki bkh blivhi vv v kyv yy ivjgfujgjg uv ik viy il &nbsp;ih bhbki bkh blivhi vv v kyv yy ivjgfujgjg uv ik viy il &nbsp;ih bhbki bkh blivhi vv v kyv yy ivjgfujgjg uv ik viy il &nbsp;ih bhbki bkh blivhi vv v kyv yy ivjgfujgjg uv ik viy il &nbsp;ih bhbki bkh blivhi vv v kyv yy ivjgfujgjg uv ik viy il &nbsp;ih bhbki bkh blivhi vv v kyv yy ivjgfujgjg uv ik viy il &nbsp;ih bhbki bkh blivhi vv v kyv yy ivjgfujgjg uv ik viy il &nbsp;ih bhbki bkh blivhi vv v kyv yy ivjgfujgjg uv ik viy il &nbsp;ih bhbki bkh blivhi vv v kyv yy ivjgfujgjg uv ik viy il &nbsp;ih bhbki bkh blivhi vv v kyv yy i</p>', '2020-11-12 22:02:09', 5, 1, 10),
(8, 'Edouard', '2020-11-12 22:08:04', 5, 1, 16),
(9, '<p><i><strong>orimgoeut ghuoetg ukfmo rgnoje noen gome ngojmehuorimgoeut ghuoetg ukfmo rgnoje noen gome ngojmehuorimgoeut ghuoetg ukfmo rgnoje noen gome ngojmehuorimgoeut ghuoetg ukfmo rgnoje noen gome ngojmehuorimgoeut ghuoetg ukf</strong></i>mo rgnoje noen gome ngojmehuorimgoeut ghuoetg ukfmo rgnoje noen gome ngojmehuorimgoeut ghuoetg ukfmo rgnoje noen gome ngojmehuorimgoeut ghuoetg ukfmo rgnoje noen gome ngojmehuorimgoeut ghuoetg ukfmo rgnoje noen gome ngojmehuorimgoeut ghuoetg ukfmo rgnoje noen gome ngojmehu</p>', '2020-11-12 22:09:12', 5, 1, 10),
(10, '<p>&nbsp;zruofpruo guoer guoerug eruohgoupe hguperhg ue thog hetopgh pethuo</p>', '2020-11-13 18:57:04', 3, 1, 10),
(11, '<p>&nbsp;zruofpruo guoer guoerug eruohgoupe hguperhg ue thog hetopgh pethuo</p>', '2020-11-13 18:57:08', 3, 1, 10),
(12, '<p><i><strong>pizjho zrhguo bogoug oueg eog i g</strong></i></p>', '2020-11-15 21:03:46', 3, 1, 10),
(13, '<p><i><strong>pizjho zrhguo bogoug oueg eog i g</strong></i></p>', '2020-11-15 21:03:51', 3, 1, 10);

-- --------------------------------------------------------

--
-- Structure de la table `comment_status`
--

DROP TABLE IF EXISTS `comment_status`;
CREATE TABLE IF NOT EXISTS `comment_status` (
  `id` int(11) NOT NULL,
  `status` varchar(45) COLLATE utf8_bin NOT NULL DEFAULT 'wait',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `comment_status`
--

INSERT INTO `comment_status` (`id`, `status`) VALUES
(1, 'wait'),
(2, 'validated'),
(3, 'ban');

-- --------------------------------------------------------

--
-- Structure de la table `experience`
--

DROP TABLE IF EXISTS `experience`;
CREATE TABLE IF NOT EXISTS `experience` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_bin NOT NULL,
  `description` text COLLATE utf8_bin NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `img` text COLLATE utf8_bin NOT NULL,
  `link` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `experience`
--

INSERT INTO `experience` (`id`, `user_id`, `title`, `description`, `created_at`, `updated_at`, `img`, `link`) VALUES
(1, 10, 'mon expérience numéro 252 <script>alert(\'\'foiré\");</script>', '<p>Hello bibi&nbsp;</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab dolorem nesciunt pariatur quidem voluptate. Aut consequuntur exercitationem in ipsa ipsam labore maiores nemo, non repellat sequi sit, tempora, ullam voluptatibus! Aliquam aut autem cum deleniti dignissimos, doloremque doloribus et eum eveniet facilis labore laboriosam minima molestiae natus non nulla odit omnis perspiciatis, porro quae quia, quis quisquam ratione saepe ullam? Aspernatur cupiditate nesciunt non, nulla perspiciatis ut. Aperiam, architecto asperiores, assumenda culpa deleniti dolorem doloribus ex facilis fuga impedit incidunt ipsum labore magnam minima neque, praesentium sed tenetur veritatis vitae?</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>', '2020-10-31 23:04:43', '2020-12-21 11:54:21', '5fda25e2eace4carte.PNG', 'lecesarhotel.com'),
(9, 10, 'mon expérience numéro 1 est super ', '<p><strong>Grand test 2</strong></p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab dolorem nesciunt pariatur quidem voluptate. Aut consequuntur exercitationem in ipsa ipsam labore maiores nemo, non repellat sequi sit, tempora, ullam voluptatibus! Aliquam aut autem cum deleniti dignissimos, doloremque doloribus et eum eveniet facilis labore laboriosam minima molestiae natus non nulla odit omnis perspiciatis, porro quae quia, quis quisquam ratione saepe ullam? Aspernatur cupiditate nesciunt non, nulla perspiciatis ut. Aperiam, architecto asperiores, assumenda culpa deleniti dolorem doloribus ex facilis fuga impedit incidunt ipsum labore magnam minima neque, praesentium sed tenetur veritatis vitae?</p>', '2020-11-06 21:38:04', '2020-12-16 14:21:26', '5fda25f612b5fcarte.PNG', 'lecesarhotel.com'),
(10, 10, 'Mr```', '<p>vdwbdbtgbrbrgbstrb</p>', '2020-12-03 12:52:34', '2020-12-21 12:01:39', '5fda350674eceqr linkedn.jpg', 'https://www.youtube.com/watch?v=IGSmLvfEz18'),
(13, 10, 'Type', '<p>f nr nr y nt&nbsp;</p>', '2020-12-03 12:57:56', '2020-12-16 15:25:59', '5fda351795e36resolution du pb.PNG', 'https://www.youtube.com/watch?v=IGSmLvfEz18'),
(14, 10, 'mon expérience numéro bibi', '<p>kb lihhlihih goiygoygkb lihhlihih goiygoygkb lihhlihih goiygoygkb lihhlihih goiygoygkb lihhlihih goiygoygkb lihhlihih goiygoygkb lihhlihih goiygoygkb lihhlihih goiygoygkb lihhlihih goiygoygkb lihhlihih goiygoygkb lihhlihih goiygoygkb lihhlihih goiygoygkb lihhlihih goiygoygkb lihhlihih goiygoygkb lihhlihih goiygoygkb lihhlihih goiygoygkb lihhlihih goiygoygkb lihhlihih goiygoygkb lihhlihih goiygoygkb lihhlihih goiygoygkb lihhlihih goiygoygkb lihhlihih goiygoygkb lihhlihih goiygoygkb lihhlihih goiygoygkb lihhlihih goiygoygkb lihhlihih goiygoygkb lihhlihih goiygoygkb lihhlihih goiygoygkb lihhlihih goiygoygkb lihhlihih goiygoygkb lihhlihih goiygoyg</p>', '2020-12-28 00:41:07', NULL, '5fe929a3df6d1en bref 2.jpg', '#');

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_bin NOT NULL,
  `resume` text COLLATE utf8_bin NOT NULL,
  `content` longtext COLLATE utf8_bin NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`id`, `title`, `resume`, `content`, `created_at`, `user_id`, `updated_at`) VALUES
(3, 'hello Voici mon petit résumé de mon premier test', '<p>Voici mon petit résumé de mon premier test !!!!!!</p>', '<p>&nbsp;</p><p>Hello</p><p>&nbsp;</p><p><strong>elfn zrjng vojmzrnv ojzrnvojmzrn jozrnojn zjronvojzrn jvozrnv jozrnvoj zrnjo nzrojelfn zrjng vojmzrnv ojzrnvojmzrn jozrnojn zjronvojzrn jvozrnv jozrnvoj zrnjo nzrojelfn zrjng vojmzrnv ojzrnvojmzrn jozrnojn zjronvojzrn jvozrnv jozrnvoj zrnjo nzrojelfn zrjng vojmzrnv ojzrnvojmzrn jozrnojn zjronvojzrn jvozrnv jozrnvoj zrnjo nzrojelfn zrjng vojmzrnv ojzrnvojmzrn jozrnojn zjronvojzrn jvozrnv jozrnvoj zrnjo nzrojelfn zrjng vojmzrnv ojzrnvojmzrn jozrnojn zjronvojzrn jvozrnv jozrnvoj zrnjo nzrojelfn zrjng vojmzrnv ojzrnvojmzrn jozrnojn zjr</strong>onvojzrn jvozrnv jozrnvoj zrnjo nzrojelfn zrjng vojmzrnv ojzrnvojmzrn jozrnojn zjronvojzrn jvozrnv jozrnvoj zrnjo nzrojelfn zrjng vojmzrnv ojzrnvojmzrn jozrnojn zjronvojzrn jvozrnv jozrnvoj zrnjo nzrojelfn zrjng vojmzrnv ojzrnvojmzrn jozrnojn zjronvojzrn jvozrnv jozrnvoj zrnjo nzrojelfn zrjng vojmzrnv ojzrnvojmzrn jozrnojn zjronvojzrn jvozrnv jozrnvoj zrnjo nzrojelfn zrjng vojmzrnv ojzrnvojmzrn jozrnojn zjronvojzrn jvozrnv jozrnvoj zrnjo nzrojelfn zrjng vojmzrnv ojzrnvojmzrn jozrnojn zjronvojzrn jvozrnv jozrnvoj zrnjo nzrojelfn zrjng vojmzrnv ojzrnvojmzrn jozrnojn zjronvojzrn jvozrnv jozrnvoj zrnjo nzrojelfn zrjng vojmzrnv ojzrnvojmzrn jozrnojn zjronvojzrn jvozrnv jozrnvoj zrnjo nzrojelfn zrjng vojmzrnv ojzrnvojmzrn jozrnojn zjronvojzrn jvozrnv jozrnvoj zrnjo nzrojelfn zrjng vojmzrnv ojzrnvojmzrn jozrnojn zjronvojzrn jvozrnv jozrnvoj zrnjo nzrojelfn zrjng vojmzrnv ojzrnvojmzrn jozrnojn zjronvojzrn jvozrnv jozrnvoj zrnjo nzroj</p>', '2020-11-01 00:00:50', 23, '2021-01-03 02:30:15'),
(4, 'Mr', '<p>zvzrv</p>', '<p>vrzvzrv</p>', '2020-12-01 18:20:06', 24, '2020-12-16 17:41:04'),
(5, 'ezf ezf', '<p>ea faef aef dd</p>', '<p>eaf aef eaf eaf ea</p>', '2020-12-01 18:20:15', 16, '2020-12-27 21:38:34');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(16) COLLATE utf8_bin NOT NULL,
  `name` varchar(45) COLLATE utf8_bin NOT NULL,
  `firstname` varchar(45) COLLATE utf8_bin NOT NULL,
  `email` varchar(255) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_status_id` int(11) NOT NULL DEFAULT '2',
  `token` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user_user_status1` (`user_status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `name`, `firstname`, `email`, `password`, `create_time`, `user_status_id`, `token`) VALUES
(10, 'kenpa', 'charon', 'hugo', 'charon.hugo@gmail.com', '$2y$10$GrfCBSv0qSXzC6qmIWs0X.N6oM1UK5PAJKcGupLfN38Wp71H95Kii', '2020-10-31 22:46:19', 1, NULL),
(16, 'kenpachi', 'caron', 'alexis', 'charon.hugo@yahoo.fr', '$2y$10$GrfCBSv0qSXzC6qmIWs0X.N6oM1UK5PAJKcGupLfN38Wp71H95Kii', '2020-11-06 13:37:05', 2, NULL),
(23, 'kiki', 'gvzrg', 'jzrogvzrgv', 'c.ji@gmail.com', '$2y$10$9flL9NYJKK1WDmmO7RZ34eleBLE64XS8Om.HRTtmhykI.U66jYMcu', '2020-11-14 08:31:06', 2, NULL),
(24, 'koko', 'lolo', 'grgr', 'charon.hugo@gmail.fr', '$2y$10$GrfCBSv0qSXzC6qmIWs0X.N6oM1UK5PAJKcGupLfN38Wp71H95Kii', '2020-12-03 13:54:45', 2, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `user_status`
--

DROP TABLE IF EXISTS `user_status`;
CREATE TABLE IF NOT EXISTS `user_status` (
  `id` int(11) NOT NULL,
  `status` varchar(45) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `user_status`
--

INSERT INTO `user_status` (`id`, `status`) VALUES
(1, 'Admin'),
(2, 'Membre'),
(3, 'ban');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`comment_status_id`) REFERENCES `comment_status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `experience`
--
ALTER TABLE `experience`
  ADD CONSTRAINT `experience_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_user_status1` FOREIGN KEY (`user_status_id`) REFERENCES `user_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
