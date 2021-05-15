-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 15 mai 2021 à 06:45
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
-- Base de données : `janettmanagmentltd_aecorp_2021546778884`
--

-- --------------------------------------------------------

--
-- Structure de la table `apropos`
--

DROP TABLE IF EXISTS `apropos`;
CREATE TABLE IF NOT EXISTS `apropos` (
  `id_apropos` int(3) NOT NULL,
  `menu_apropos` varchar(30) DEFAULT NULL,
  `donnees_apropos` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `date_at_apropos` datetime DEFAULT NULL,
  PRIMARY KEY (`id_apropos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `apropos`
--

INSERT INTO `apropos` (`id_apropos`, `menu_apropos`, `donnees_apropos`, `date_at_apropos`) VALUES
(1, 'qsn', '{\"menu\":\"qsn\",\"image_\":\"IMG20210303205010.jpg\",\"titre\":\"NOTRE HISTOIRE\",\"soustitre\":\"\",\"details\":\"<div class=\\\"row\\\">\\r\\n<h1 class=\\\"col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12\\\"><strong><span class=\\\"date_qsn\\\">1930 - 2020<\\/span><\\/strong><\\/h1>\\r\\n<\\/div>\\r\\n<div class=\\\"row\\\">\\r\\n<p class=\\\"col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12\\\"><span class=\\\"under_date_qsn\\\">Toute une histoire<\\/span><\\/p>\\r\\n<p class=\\\"col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12\\\"><span class=\\\"under_date_qsn\\\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras eget posuere erat. Nulla volutpat lacus et erat sagittis congue. Duis dignissim venenatis rhoncus. Donec porttitor nisl nec arcu eleifend, luctus accumsan massa bibendum. Integer efficitur bi bendum tincidunt. Ut interdum est a augue volutpat, at mollis diam fringilla. Cras interdum faucibus malesuada. Maecenas dignis sim, erat id dignissim fringilla, diam arcu molestie tortor, tut tempus sapien erat maximus erat. Proin vitae malesuada est, vel.<\\/span><\\/p>\\r\\n<\\/div>\",\"image_2\":\"IMG220210303205010.jpg\",\"titre2\":\"DU R\\u00caVE A LA R\\u00c9ALIT\\u00c9\",\"soustitre2\":\"\",\"details2\":\"<p><span class=\\\"under_date_qsn\\\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras eget posuere erat. Nulla volutpat lacus et erat sagittis congue. Duis dignissim venenatis rhoncus. Donec porttitor nisl nec arcu eleifend, luctus accumsan massa bibendum. Integer efficitur bi bendum tincidunt. Ut interdum est a augue volutpat, at mollis diam fringilla. Cras interdum faucibus malesuada. Maecenas dignis sim, erat id dignissim fringilla, diam arcu molestie tortor, tut tempus sapien erat maximus erat. Proin vitae malesuada est, vel.<\\/span><\\/p>\",\"image_3\":\"IMG320210303205010.jpg\",\"image\":\"IMG20210303205819.jpg\",\"image2\":\"IMG220210303205819.jpg\",\"image3\":\"IMG320210303205010.jpg\"}', '2021-03-03 20:58:19'),
(2, 'integrer_equipe', '{\"menu\":\"integrer_equipe\",\"image_\":\"IMG20210303212146.jpg\",\"titre\":\"D\\u00e9tails pour nous rejoindre\",\"soustitre\":\"\",\"details\":\"<p><strong>Lorem Ipsum<\\/strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<\\/p>\",\"image\":\"IMG20210303212943.jpg\"}', '2021-03-03 21:29:43'),
(3, 'politique_entrepreunariale', '{\"menu\":\"politique_entrepreunariale\",\"image_\":\"IMG20210208145832.jpg\",\"titre\":\"EWWRER\",\"soustitre\":\"RWR\",\"details\":\"<p><strong>Lorem Ipsum<\\/strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<\\/p>\",\"image\":\"IMG20210303212923.jpg\"}', '2021-03-03 21:29:23');

-- --------------------------------------------------------

--
-- Structure de la table `blog`
--

DROP TABLE IF EXISTS `blog`;
CREATE TABLE IF NOT EXISTS `blog` (
  `id_blog` int(11) NOT NULL AUTO_INCREMENT,
  `code_blog` varchar(30) DEFAULT NULL,
  `titre_blog` varchar(225) DEFAULT NULL,
  `soustitre_blog` varchar(225) DEFAULT NULL,
  `details_blog` text,
  `image_blog` varchar(150) DEFAULT NULL,
  `menu_blog` varchar(50) DEFAULT NULL,
  `date_at_blog` datetime DEFAULT NULL,
  PRIMARY KEY (`id_blog`),
  UNIQUE KEY `code_blog` (`code_blog`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `blog`
--

INSERT INTO `blog` (`id_blog`, `code_blog`, `titre_blog`, `soustitre_blog`, `details_blog`, `image_blog`, `menu_blog`, `date_at_blog`) VALUES
(2, 'BLG63H2021J', 'JANETT MANAGEMENT', '', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ultricies porta pretium. Duis posuere ante lorem, sit amet suscipit metus mattis eget. Maecenas mollis congue tempor. Donec euismod lectus sem, eu tempor eros condimentum at.</p>\r\n<p>WNam dapibus leo vitae dolor venenatis, a malesuada neque rhoncus. Aenean ac nisi egestas, varius orci vel, dapibus nunc. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin consequat molestie semper.</p>\r\n<p>Sed lectus erat, pellentesque at dolor at, placerat fringilla sem. Nulla id dolor mauris. Nulla finibus est in diam finibus, at molestie arcu pulvinar. Aliquam eleifend, ligula a lobortis lobortis, mi ligula bibendum metus, nec posuere quam lorem quis ligula. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec id lacus id sapien accumsan lacinia at nec urna.</p>', NULL, 'qsn', '2021-05-01 11:55:52'),
(3, 'BLG62L2021V', 'NOS SERVICES', '', '<div class=\"row\">\r\n<div class=\"col-xl-8 offset-xl-2 col-lg-8 offset-lg-2 col-md-8 offset-md-2 col-sm-8 offset-sm-2 col-12\" align=\"center\">&nbsp;</div>\r\n</div>\r\n<div class=\"row\">\r\n<div class=\"col-xl-8 offset-xl-2 col-lg-8 offset-lg-2 col-md-8 offset-md-2 col-sm-8 offset-sm-2 col-12\"><span class=\"subtitre_page\">- Fournitures de Produits<br />- Rechercher des produits en fonction des besoins qualitatifs du client<br />- Consolidation des produits, optimisation des delais de livraison et minimisation des co&ucirc;ts logistiques</span></div>\r\n</div>', NULL, 'services', '2021-05-04 02:17:50'),
(4, 'BLG85V2021Y', 'MISSION ET VISION', 'NOTRE MISSION & VALEURS', '<p style=\"text-align: center;\"><strong><span class=\"subtitre_page\">NOTRE MISSION &amp; VALEURS</span></strong><br /><span class=\"text_mv\">Nous d&eacute;fendons un environnement d\'honn&ecirc;tet&eacute; , de transparence, d\'&eacute;quit&eacute; et de normes morales &eacute;l&eacute;v&eacute;es.</span></p>', NULL, 'mission-et-vision', '2021-05-04 02:23:53'),
(5, 'BLG72D2021F', 'NOS CONTACTS', '', '', NULL, 'contact', '2021-05-04 02:30:13'),
(6, 'BLG11B2021J', 'ENVOI DE MESSAGE', '', '<p>DEMANDE EN LIGNE</p>', NULL, 'envoi_message', '2021-05-04 02:31:12');

-- --------------------------------------------------------

--
-- Structure de la table `children_menuitems`
--

DROP TABLE IF EXISTS `children_menuitems`;
CREATE TABLE IF NOT EXISTS `children_menuitems` (
  `id_children_menuitems` int(11) NOT NULL AUTO_INCREMENT,
  `image_children_menuitems` varchar(150) DEFAULT NULL,
  `contenu_children_menuitems` text NOT NULL,
  `date_at_children_menuitems` datetime NOT NULL,
  `codemenuitems_children_menuitems` varchar(30) DEFAULT NULL,
  `code_children_menuitems` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_children_menuitems`),
  UNIQUE KEY `code_children_menuitems` (`code_children_menuitems`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `children_menuitems`
--

INSERT INTO `children_menuitems` (`id_children_menuitems`, `image_children_menuitems`, `contenu_children_menuitems`, `date_at_children_menuitems`, `codemenuitems_children_menuitems`, `code_children_menuitems`) VALUES
(1, 'IMG-CHLMITMS78W2021F-20210501180921.jpg', '<p style=\"text-align: justify;\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum ggggg</p>', '2021-05-01 18:09:21', 'MITM27I2021S', 'CHLMITMS78W2021F'),
(3, 'IMG-CHLMITMS57N2021D-20210503065525.jpg', '<p style=\"text-align: justify;\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>', '2021-05-03 06:55:25', 'MITM27I2021S', 'CHLMITMS57N2021D'),
(4, 'IMG-CHLMITMS76E2021Y-20210503065751.jpg', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>', '2021-05-03 06:57:51', 'MITM27I2021S', 'CHLMITMS76E2021Y'),
(5, 'IMG-CHLMITMS11E2021T-20210503065912.jpg', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>', '2021-05-03 06:59:12', 'MITM27I2021S', 'CHLMITMS11E2021T'),
(6, 'IMG-CHLMITMS87M2021W-20210503070201.jpg', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>', '2021-05-03 07:02:02', 'MITM27I2021S', 'CHLMITMS87M2021W');

-- --------------------------------------------------------

--
-- Structure de la table `connectyhistory`
--

DROP TABLE IF EXISTS `connectyhistory`;
CREATE TABLE IF NOT EXISTS `connectyhistory` (
  `id` int(11) NOT NULL,
  `dateconnect` datetime DEFAULT NULL COMMENT 'Date et heure connexion',
  `datedisconnect` datetime DEFAULT NULL COMMENT 'Date et heure deconnexion',
  `statusconnect` int(1) DEFAULT NULL COMMENT '1 =>Connecté et 0=>Déconnecté',
  `userconnected` varchar(30) DEFAULT NULL COMMENT 'Administrateur ou utilisateur',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `element_blog`
--

DROP TABLE IF EXISTS `element_blog`;
CREATE TABLE IF NOT EXISTS `element_blog` (
  `id` int(11) NOT NULL,
  `menu` longtext,
  `contenu` longtext,
  `code` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `historique`
--

DROP TABLE IF EXISTS `historique`;
CREATE TABLE IF NOT EXISTS `historique` (
  `id_historique` int(11) NOT NULL AUTO_INCREMENT,
  `titre_historique` mediumtext COMMENT 'Titre expicatif de l''historique',
  `detailsobject_historique` longtext COMMENT 'L''Object json de tout object de l''application de l''historique',
  `foreignKey_historique` varchar(50) DEFAULT NULL COMMENT 'La clé relatif a l''element modifiée de l''historique',
  `libele_historique` varchar(50) DEFAULT NULL COMMENT 'Titre de l''historique',
  `type_historique` varchar(50) DEFAULT NULL COMMENT 'Enregistrement, Modification, supprimer, Selectionner',
  `date_at_historique` datetime DEFAULT NULL COMMENT 'Date de l''historique',
  `auteur_historique` varchar(30) DEFAULT NULL COMMENT 'Celui qui a fait l''action',
  PRIMARY KEY (`id_historique`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `historique`
--

INSERT INTO `historique` (`id_historique`, `titre_historique`, `detailsobject_historique`, `foreignKey_historique`, `libele_historique`, `type_historique`, `date_at_historique`, `auteur_historique`) VALUES
(1, ' avec pour titre << Image de fond >> et pour code IMVDPB87X2021G', '{\"titre_imagevideopub\":\"Image de fond\",\"soustitre_imagevideopub\":\"\",\"menu_imagevideopub\":\"qsn\",\"position_imagevideopub\":1,\"type_imagevideopub\":\"background\",\"etat_imagevideopub\":\"Active\",\"focus_imagevideopub\":\"1\",\"details_imagevideopub\":\"<p>RAS<\\/p>\",\"fichier_imagevideopub\":\"IMG-IMVDPB87X2021G-20210504020209.jpg\",\"code_imagevideopub\":\"IMVDPB87X2021G\",\"date_at_imagevideopub\":\"2021-05-04 02:02:09\"}', 'IMVDPB87X2021G', 'Enregistrement', 'Fichier', '2021-05-04 02:02:09', '18263ADM2021X01U28J'),
(2, ' avec pour titre << illustration de services >> et pour code IMVDPB87V2021M', '{\"titre_imagevideopub\":\"illustration de services\",\"soustitre_imagevideopub\":\"\",\"menu_imagevideopub\":\"services\",\"position_imagevideopub\":1,\"type_imagevideopub\":\"background\",\"etat_imagevideopub\":\"Active\",\"focus_imagevideopub\":\"1\",\"details_imagevideopub\":\"<p>RAS<\\/p>\",\"fichier_imagevideopub\":\"IMG-IMVDPB87V2021M-20210504020452.jpg\",\"code_imagevideopub\":\"IMVDPB87V2021M\",\"date_at_imagevideopub\":\"2021-05-04 02:04:52\"}', 'IMVDPB87V2021M', 'Enregistrement', 'Fichier', '2021-05-04 02:04:53', '18263ADM2021X01U28J'),
(3, ' avec pour titre << illustration de services >> et pour code IMVDPB87V2021M', '{\"code_imagevideopub\":\"IMVDPB87V2021M\",\"titre_imagevideopub\":\"illustration de services\",\"soustitre_imagevideopub\":\"\",\"menu_imagevideopub\":\"services\",\"position_imagevideopub\":1,\"type_imagevideopub\":\"background\",\"etat_imagevideopub\":\"Active\",\"details_imagevideopub\":\"<p>RAS<\\/p>\",\"focus_imagevideopub\":\"1\",\"fichier_imagevideopub\":\"IMG-IMVDPB87V2021M-20210504020516.jpg\"}', 'IMVDPB87V2021M', 'Modification', 'Fichier', '2021-05-04 02:05:16', '18263ADM2021X01U28J'),
(4, ' avec pour titre << illustration de qsn >> et pour code IMVDPB87V2021M', '{\"code_imagevideopub\":\"IMVDPB87V2021M\",\"titre_imagevideopub\":\"illustration de qsn\",\"soustitre_imagevideopub\":\"\",\"menu_imagevideopub\":\"qsn\",\"position_imagevideopub\":1,\"type_imagevideopub\":\"background\",\"etat_imagevideopub\":\"Active\",\"details_imagevideopub\":\"<p>RAS<\\/p>\",\"focus_imagevideopub\":\"1\"}', 'IMVDPB87V2021M', 'Modification', 'Fichier', '2021-05-04 02:06:04', '18263ADM2021X01U28J'),
(5, ' avec pour titre << Image de fond services >> et pour code IMVDPB87X2021G', '{\"code_imagevideopub\":\"IMVDPB87X2021G\",\"titre_imagevideopub\":\"Image de fond services\",\"soustitre_imagevideopub\":\"\",\"menu_imagevideopub\":\"services\",\"position_imagevideopub\":1,\"type_imagevideopub\":\"background\",\"etat_imagevideopub\":\"Active\",\"details_imagevideopub\":\"<p>RAS<\\/p>\",\"focus_imagevideopub\":\"1\"}', 'IMVDPB87X2021G', 'Modification', 'Fichier', '2021-05-04 02:06:25', '18263ADM2021X01U28J'),
(6, ' avec pour code menu contact', '{\"menu_serviceclient\":\"contact\",\"donnees_serviceclient\":\"{\\\"menu\\\":\\\"contact\\\",\\\"localisation\\\":\\\"asdsafsfdsg 5\\\",\\\"details\\\":\\\"<p style=\\\\\\\"text-align: center;\\\\\\\"><strong>JANETT MANAGEMENT LTD<\\\\\\/strong><br \\\\\\/>Corniche EL Mazraa, Jaber Center 3&egrave;me &eacute;tage office n&deg;3<br \\\\\\/>BEIRUT - LEBANON<br \\\\\\/>PH: +961 (01) 306 829<\\\\\\/p>\\\"}\",\"date_at_serviceclient\":\"2021-05-04 02:08:31\"}', 'contact', 'Modification', 'Service client', '2021-05-04 02:08:32', '18263ADM2021X01U28J'),
(7, ' MENU qsn >> et pour code BLG63H2021J', '{\"code_blog\":\"BLG63H2021J\",\"titre_blog\":\"JANETT MANAGEMENT\",\"menu_blog\":\"qsn\",\"details_blog\":\"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ultricies porta pretium. Duis posuere ante lorem, sit amet suscipit metus mattis eget. Maecenas mollis congue tempor. Donec euismod lectus sem, eu tempor eros condimentum at.<\\/p>\\r\\n<p>WNam dapibus leo vitae dolor venenatis, a malesuada neque rhoncus. Aenean ac nisi egestas, varius orci vel, dapibus nunc. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin consequat molestie semper.<\\/p>\\r\\n<p>Sed lectus erat, pellentesque at dolor at, placerat fringilla sem. Nulla id dolor mauris. Nulla finibus est in diam finibus, at molestie arcu pulvinar. Aliquam eleifend, ligula a lobortis lobortis, mi ligula bibendum metus, nec posuere quam lorem quis ligula. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec id lacus id sapien accumsan lacinia at nec urna.<\\/p>\"}', 'BLG63H2021J', 'Enregistrement', 'Blog', '2021-05-04 02:09:21', '18263ADM2021X01U28J'),
(8, ' MENU qsn >> et pour code BLG63H2021J', '{\"code_blog\":\"BLG63H2021J\",\"titre_blog\":\"JANETT MANAGEMENT\",\"menu_blog\":\"qsn\",\"details_blog\":\"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ultricies porta pretium. Duis posuere ante lorem, sit amet suscipit metus mattis eget. Maecenas mollis congue tempor. Donec euismod lectus sem, eu tempor eros condimentum at.<\\/p>\\r\\n<p>WNam dapibus leo vitae dolor venenatis, a malesuada neque rhoncus. Aenean ac nisi egestas, varius orci vel, dapibus nunc. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin consequat molestie semper.<\\/p>\\r\\n<p>Sed lectus erat, pellentesque at dolor at, placerat fringilla sem. Nulla id dolor mauris. Nulla finibus est in diam finibus, at molestie arcu pulvinar. Aliquam eleifend, ligula a lobortis lobortis, mi ligula bibendum metus, nec posuere quam lorem quis ligula. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec id lacus id sapien accumsan lacinia at nec urna.<\\/p>\"}', 'BLG63H2021J', 'Enregistrement', 'Blog', '2021-05-04 02:09:35', '18263ADM2021X01U28J'),
(9, ' MENU qsn >> et pour code BLG63H2021J', '{\"code_blog\":\"BLG63H2021J\",\"titre_blog\":\"JANETT MANAGEMENT\",\"menu_blog\":\"qsn\",\"details_blog\":\"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ultricies porta pretium. Duis posuere ante lorem, sit amet suscipit metus mattis eget. Maecenas mollis congue tempor. Donec euismod lectus sem, eu tempor eros condimentum at.<\\/p>\\r\\n<p>WNam dapibus leo vitae dolor venenatis, a malesuada neque rhoncus. Aenean ac nisi egestas, varius orci vel, dapibus nunc. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin consequat molestie semper.<\\/p>\\r\\n<p>Sed lectus erat, pellentesque at dolor at, placerat fringilla sem. Nulla id dolor mauris. Nulla finibus est in diam finibus, at molestie arcu pulvinar. Aliquam eleifend, ligula a lobortis lobortis, mi ligula bibendum metus, nec posuere quam lorem quis ligula. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec id lacus id sapien accumsan lacinia at nec urna.<\\/p>\"}', 'BLG63H2021J', 'Enregistrement', 'Blog', '2021-05-04 02:13:16', '18263ADM2021X01U28J'),
(10, ' MENU qsn >> et pour code BLG63H2021J', '{\"code_blog\":\"BLG63H2021J\",\"titre_blog\":\"JANETT MANAGEMENT\",\"menu_blog\":\"qsn\",\"details_blog\":\"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ultricies porta pretium. Duis posuere ante lorem, sit amet suscipit metus mattis eget. Maecenas mollis congue tempor. Donec euismod lectus sem, eu tempor eros condimentum at.<\\/p>\\r\\n<p>WNam dapibus leo vitae dolor venenatis, a malesuada neque rhoncus. Aenean ac nisi egestas, varius orci vel, dapibus nunc. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin consequat molestie semper.<\\/p>\\r\\n<p>Sed lectus erat, pellentesque at dolor at, placerat fringilla sem. Nulla id dolor mauris. Nulla finibus est in diam finibus, at molestie arcu pulvinar. Aliquam eleifend, ligula a lobortis lobortis, mi ligula bibendum metus, nec posuere quam lorem quis ligula. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec id lacus id sapien accumsan lacinia at nec urna.<\\/p>\"}', 'BLG63H2021J', 'Enregistrement', 'Blog', '2021-05-04 02:14:48', '18263ADM2021X01U28J'),
(11, ' MENU qsn >> et pour code BLG63H2021J', '{\"code_blog\":\"BLG63H2021J\",\"titre_blog\":\"JANETT MANAGEMENT\",\"menu_blog\":\"qsn\",\"details_blog\":\"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ultricies porta pretium. Duis posuere ante lorem, sit amet suscipit metus mattis eget. Maecenas mollis congue tempor. Donec euismod lectus sem, eu tempor eros condimentum at.<\\/p>\\r\\n<p>WNam dapibus leo vitae dolor venenatis, a malesuada neque rhoncus. Aenean ac nisi egestas, varius orci vel, dapibus nunc. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin consequat molestie semper.<\\/p>\\r\\n<p>Sed lectus erat, pellentesque at dolor at, placerat fringilla sem. Nulla id dolor mauris. Nulla finibus est in diam finibus, at molestie arcu pulvinar. Aliquam eleifend, ligula a lobortis lobortis, mi ligula bibendum metus, nec posuere quam lorem quis ligula. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec id lacus id sapien accumsan lacinia at nec urna.<\\/p>\"}', 'BLG63H2021J', 'Enregistrement', 'Blog', '2021-05-04 02:16:55', '18263ADM2021X01U28J'),
(12, ' MENU services >> et pour code BLG62L2021V', '{\"titre_blog\":\"NOS SERVICES\",\"menu_blog\":\"services\",\"details_blog\":\"<div class=\\\"row\\\">\\r\\n<div class=\\\"col-xl-8 offset-xl-2 col-lg-8 offset-lg-2 col-md-8 offset-md-2 col-sm-8 offset-sm-2 col-12\\\" align=\\\"center\\\"><hr class=\\\"serv\\\" \\/><\\/div>\\r\\n<\\/div>\\r\\n<div class=\\\"row\\\">\\r\\n<div class=\\\"col-xl-8 offset-xl-2 col-lg-8 offset-lg-2 col-md-8 offset-md-2 col-sm-8 offset-sm-2 col-12\\\"><span class=\\\"subtitre_page\\\">- Fournitures de Produits<br \\/>- Rechercher des produits en fonction des besoins qualitatifs du client<br \\/>- Consolidation des produits, optimisation des delais de livraison et minimisation des co&ucirc;ts logistiques<\\/span><\\/div>\\r\\n<\\/div>\",\"code_blog\":\"BLG62L2021V\",\"date_at_blog\":\"2021-05-04 02:17:50\"}', 'BLG62L2021V', 'Enregistrement', 'Blog', '2021-05-04 02:17:51', '18263ADM2021X01U28J'),
(13, ' MENU qsn >> et pour code BLG85V2021Y', '{\"titre_blog\":\"MISSION ET VISION\",\"soustitre_blog\":\"NOTRE MISSION & VALEURS\",\"menu_blog\":\"qsn\",\"details_blog\":\"<p style=\\\"text-align: center;\\\"><strong><span class=\\\"subtitre_page\\\">NOTRE MISSION &amp; VALEURS<\\/span><\\/strong><br \\/><span class=\\\"text_mv\\\">Nous d&eacute;fendons un environnement d\'honn&ecirc;tet&eacute; , de transparence, d\'&eacute;quit&eacute; et de normes morales &eacute;l&eacute;v&eacute;es.<\\/span><\\/p>\",\"code_blog\":\"BLG85V2021Y\",\"date_at_blog\":\"2021-05-04 02:23:53\"}', 'BLG85V2021Y', 'Enregistrement', 'Blog', '2021-05-04 02:23:53', '18263ADM2021X01U28J'),
(14, ' MENU cission-et-vision >> et pour code BLG85V2021Y', '{\"code_blog\":\"BLG85V2021Y\",\"titre_blog\":\"MISSION ET VISION\",\"soustitre_blog\":\"NOTRE MISSION & VALEURS\",\"menu_blog\":\"cission-et-vision\",\"details_blog\":\"<p style=\\\"text-align: center;\\\"><strong><span class=\\\"subtitre_page\\\">NOTRE MISSION &amp; VALEURS<\\/span><\\/strong><br \\/><span class=\\\"text_mv\\\">Nous d&eacute;fendons un environnement d\'honn&ecirc;tet&eacute; , de transparence, d\'&eacute;quit&eacute; et de normes morales &eacute;l&eacute;v&eacute;es.<\\/span><\\/p>\"}', 'BLG85V2021Y', 'Enregistrement', 'Blog', '2021-05-04 02:26:52', '18263ADM2021X01U28J'),
(15, ' MENU mission-et-vision >> et pour code BLG85V2021Y', '{\"code_blog\":\"BLG85V2021Y\",\"titre_blog\":\"MISSION ET VISION\",\"soustitre_blog\":\"NOTRE MISSION & VALEURS\",\"menu_blog\":\"mission-et-vision\",\"details_blog\":\"<p style=\\\"text-align: center;\\\"><strong><span class=\\\"subtitre_page\\\">NOTRE MISSION &amp; VALEURS<\\/span><\\/strong><br \\/><span class=\\\"text_mv\\\">Nous d&eacute;fendons un environnement d\'honn&ecirc;tet&eacute; , de transparence, d\'&eacute;quit&eacute; et de normes morales &eacute;l&eacute;v&eacute;es.<\\/span><\\/p>\"}', 'BLG85V2021Y', 'Enregistrement', 'Blog', '2021-05-04 02:27:49', '18263ADM2021X01U28J'),
(16, ' MENU qsn >> et pour code BLG72D2021F', '{\"titre_blog\":\"NOS CONTACTS\",\"soustitre_blog\":\"\",\"menu_blog\":\"qsn\",\"details_blog\":\"\",\"code_blog\":\"BLG72D2021F\",\"date_at_blog\":\"2021-05-04 02:30:13\"}', 'BLG72D2021F', 'Enregistrement', 'Blog', '2021-05-04 02:30:13', '18263ADM2021X01U28J'),
(17, ' MENU envoi_message >> et pour code BLG11B2021J', '{\"titre_blog\":\"ENVOI DE MESSAGE\",\"soustitre_blog\":\"\",\"menu_blog\":\"envoi_message\",\"details_blog\":\"<p>DEMANDE EN LIGNE<\\/p>\",\"code_blog\":\"BLG11B2021J\",\"date_at_blog\":\"2021-05-04 02:31:12\"}', 'BLG11B2021J', 'Enregistrement', 'Blog', '2021-05-04 02:31:12', '18263ADM2021X01U28J'),
(18, ' MENU services >> et pour code BLG62L2021V', '{\"code_blog\":\"BLG62L2021V\",\"titre_blog\":\"NOS SERVICES\",\"soustitre_blog\":\"\",\"menu_blog\":\"services\",\"details_blog\":\"<div class=\\\"row\\\">\\r\\n<div class=\\\"col-xl-8 offset-xl-2 col-lg-8 offset-lg-2 col-md-8 offset-md-2 col-sm-8 offset-sm-2 col-12\\\" align=\\\"center\\\">&nbsp;<\\/div>\\r\\n<\\/div>\\r\\n<div class=\\\"row\\\">\\r\\n<div class=\\\"col-xl-8 offset-xl-2 col-lg-8 offset-lg-2 col-md-8 offset-md-2 col-sm-8 offset-sm-2 col-12\\\"><span class=\\\"subtitre_page\\\">- Fournitures de Produits<br \\/>- Rechercher des produits en fonction des besoins qualitatifs du client<br \\/>- Consolidation des produits, optimisation des delais de livraison et minimisation des co&ucirc;ts logistiques<\\/span><\\/div>\\r\\n<\\/div>\"}', 'BLG62L2021V', 'Enregistrement', 'Blog', '2021-05-04 03:36:33', '18263ADM2021X01U28J'),
(19, ' MENU contact >> et pour code BLG72D2021F', '{\"code_blog\":\"BLG72D2021F\",\"titre_blog\":\"NOS CONTACTS\",\"soustitre_blog\":\"\",\"menu_blog\":\"contact\",\"details_blog\":\"\"}', 'BLG72D2021F', 'Enregistrement', 'Blog', '2021-05-04 03:44:26', '18263ADM2021X01U28J'),
(20, '2', '{\"id_messagerie\":2,\"expediteur_messagerie\":\"Abraham Elvis\",\"email_messagerie\":\"abraham@gmail.com\",\"contacts_messagerie\":\"78965412\",\"destinataire_messagerie\":null,\"objet_messagerie\":\"RENSEIGNEMENT\",\"contenu_messagerie\":\"Coucou\",\"date_at_messagerie\":\"2021-03-29 13:35:37\",\"dateview_messagerie\":\"2021-03-29 14:42:05\",\"type_messagerie\":\"contact\",\"compagnie_messagerie\":\"\"}', '2', 'Suppression', 'Message', '2021-05-04 04:19:51', '18263ADM2021X01U28J'),
(21, '1', '{\"id_messagerie\":1,\"expediteur_messagerie\":\"Aymard Elvis\",\"email_messagerie\":\"kacou_2@gmail.com\",\"contacts_messagerie\":null,\"destinataire_messagerie\":null,\"objet_messagerie\":\"RENSEIGNEMENT\",\"contenu_messagerie\":\"Salut monsieur\",\"date_at_messagerie\":\"2021-03-29 13:30:40\",\"dateview_messagerie\":\"2021-03-29 14:42:05\",\"type_messagerie\":\"contact\",\"compagnie_messagerie\":\"\"}', '1', 'Suppression', 'Message', '2021-05-04 04:19:56', '18263ADM2021X01U28J'),
(22, ' ITEM avec pour titre << Where can I get some? >> et pour code MITM52K2021L', '{\"code_menuitems\":\"MITM52K2021L\",\"titre_menuitems\":\"Where can I get some?\",\"menu_menuitems\":\"mission_vision\",\"type_menuitems\":\"vision\",\"details_menuitems\":\"<div>\\r\\n<div>Nous&nbsp;d&eacute;fendons&nbsp;un&nbsp;environnement&nbsp;d\'honn&ecirc;tet&eacute;&nbsp;,&nbsp;de&nbsp;transparence,&nbsp;d\'&eacute;quit&eacute;&nbsp;et&nbsp;de&nbsp;normes&nbsp;morales&nbsp;&eacute;l&eacute;v&eacute;es.<\\/div>\\r\\n<\\/div>\"}', 'MITM52K2021L', 'Modification', 'Menusitems', '2021-05-04 04:26:05', '18263ADM2021X01U28J'),
(23, ' avec pour code menu contact', '{\"menu_serviceclient\":\"contact\",\"donnees_serviceclient\":\"{\\\"menu\\\":\\\"contact\\\",\\\"localisation\\\":\\\"https:\\\\\\/\\\\\\/www.google.com\\\\\\/maps\\\\\\/embed?pb=!1m18!1m12!1m3!1d254252.49964956383!2d-4.0095404924133184!3d5.310147818908659!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xfc202aed707539d%3A0x5749a7901998d993!2saeCorporation!5e0!3m2!1sfr!2sci!4v1614171870643!5m2!1sfr!2sci\\\",\\\"details\\\":\\\"<p style=\\\\\\\"text-align: center;\\\\\\\"><strong>JANETT MANAGEMENT LTD<\\\\\\/strong><br \\\\\\/>Corniche EL Mazraa, Jaber Center 3&egrave;me &eacute;tage office n&deg;3<br \\\\\\/>BEIRUT - LEBANON<br \\\\\\/>PH: +961 (01) 306 829<\\\\\\/p>\\\"}\",\"date_at_serviceclient\":\"2021-05-04 09:10:51\"}', 'contact', 'Modification', 'Service client', '2021-05-04 09:10:52', '18263ADM2021X01U28J'),
(24, ' ITEM avec pour titre << Where can I get some? >> et pour code MITM52K2021L', '{\"code_menuitems\":\"MITM52K2021L\",\"titre_menuitems\":\"Where can I get some?\",\"menu_menuitems\":\"mission_vision\",\"type_menuitems\":\"vision\",\"details_menuitems\":\"<div>\\r\\n<div>Nous&nbsp;d&eacute;fendons&nbsp;un&nbsp;environnement&nbsp;d\'honn&ecirc;tet&eacute;&nbsp;,&nbsp;de&nbsp;transparence,&nbsp;d\'&eacute;quit&eacute;&nbsp;et&nbsp;de&nbsp;normes&nbsp;morales&nbsp;&eacute;l&eacute;v&eacute;es.<\\/div>\\r\\n<\\/div>\",\"image_menuitems\":\"IMG-MITM52K2021L-20210504131137.jpg\"}', 'MITM52K2021L', 'Modification', 'Menusitems', '2021-05-04 13:11:37', '18263ADM2021X01U28J'),
(25, ' ITEM avec pour titre << Where can I get some? >> et pour code MITM52K2021T', '{\"code_menuitems\":\"MITM52K2021T\",\"titre_menuitems\":\"Where can I get some?\",\"menu_menuitems\":\"mission_vision\",\"type_menuitems\":\"vision\",\"details_menuitems\":\"<div>\\r\\n<div>Nous&nbsp;d&eacute;fendons&nbsp;un&nbsp;environnement&nbsp;d\'honn&ecirc;tet&eacute;&nbsp;,&nbsp;de&nbsp;transparence,&nbsp;d\'&eacute;quit&eacute;&nbsp;et&nbsp;de&nbsp;normes&nbsp;morales&nbsp;&eacute;l&eacute;v&eacute;es.<\\/div>\\r\\n<\\/div>\",\"image_menuitems\":\"IMG-MITM52K2021T-20210504132954.jpg\"}', 'MITM52K2021T', 'Modification', 'Menusitems', '2021-05-04 13:29:55', '18263ADM2021X01U28J'),
(26, ' ITEM avec pour titre << Where can I get some? >> et pour code MITM52K2021B', '{\"code_menuitems\":\"MITM52K2021B\",\"titre_menuitems\":\"Where can I get some?\",\"menu_menuitems\":\"mission_vision\",\"type_menuitems\":\"vision\",\"details_menuitems\":\"<div>\\r\\n<div>Nous&nbsp;d&eacute;fendons&nbsp;un&nbsp;environnement&nbsp;d\'honn&ecirc;tet&eacute;&nbsp;,&nbsp;de&nbsp;transparence,&nbsp;d\'&eacute;quit&eacute;&nbsp;et&nbsp;de&nbsp;normes&nbsp;morales&nbsp;&eacute;l&eacute;v&eacute;es.<\\/div>\\r\\n<\\/div>\",\"image_menuitems\":\"IMG-MITM52K2021B-20210504133024.jpg\"}', 'MITM52K2021B', 'Modification', 'Menusitems', '2021-05-04 13:30:24', '18263ADM2021X01U28J'),
(27, ' ITEM avec pour titre << Where can I get some? >> et pour code MITM52K2021D', '{\"code_menuitems\":\"MITM52K2021D\",\"titre_menuitems\":\"Where can I get some?\",\"menu_menuitems\":\"mission_vision\",\"type_menuitems\":\"vision\",\"details_menuitems\":\"<div>\\r\\n<div>Nous&nbsp;d&eacute;fendons&nbsp;un&nbsp;environnement&nbsp;d\'honn&ecirc;tet&eacute;&nbsp;,&nbsp;de&nbsp;transparence,&nbsp;d\'&eacute;quit&eacute;&nbsp;et&nbsp;de&nbsp;normes&nbsp;morales&nbsp;&eacute;l&eacute;v&eacute;es.<\\/div>\\r\\n<\\/div>\",\"image_menuitems\":\"IMG-MITM52K2021D-20210504133043.jpg\"}', 'MITM52K2021D', 'Modification', 'Menusitems', '2021-05-04 13:30:43', '18263ADM2021X01U28J'),
(28, ' ITEM avec pour titre << Where can I get some? >> et pour code MITM52K20212', '{\"code_menuitems\":\"MITM52K20212\",\"titre_menuitems\":\"Where can I get some?\",\"menu_menuitems\":\"mission_vision\",\"type_menuitems\":\"vision\",\"details_menuitems\":\"<div>\\r\\n<div>Nous&nbsp;d&eacute;fendons&nbsp;un&nbsp;environnement&nbsp;d\'honn&ecirc;tet&eacute;&nbsp;,&nbsp;de&nbsp;transparence,&nbsp;d\'&eacute;quit&eacute;&nbsp;et&nbsp;de&nbsp;normes&nbsp;morales&nbsp;&eacute;l&eacute;v&eacute;es.<\\/div>\\r\\n<\\/div>\",\"image_menuitems\":\"IMG-MITM52K20212-20210504133103.jpg\"}', 'MITM52K20212', 'Modification', 'Menusitems', '2021-05-04 13:31:03', '18263ADM2021X01U28J'),
(29, ' avec pour titre << illustration de qsn >> et pour code IMVDPB87V2021M', '{\"code_imagevideopub\":\"IMVDPB87V2021M\",\"titre_imagevideopub\":\"illustration de qsn\",\"soustitre_imagevideopub\":\"\",\"menu_imagevideopub\":\"qsn\",\"position_imagevideopub\":1,\"type_imagevideopub\":\"background\",\"etat_imagevideopub\":\"Active\",\"details_imagevideopub\":\"<p>RAS<\\/p>\",\"focus_imagevideopub\":\"1\",\"fichier_imagevideopub\":\"IMG-IMVDPB87V2021M-20210504172833.jpg\"}', 'IMVDPB87V2021M', 'Modification', 'Fichier', '2021-05-04 17:28:34', '18263ADM2021X01U28J'),
(30, ' avec pour titre << illustration de qsn >> et pour code IMVDPB87V2021M', '{\"code_imagevideopub\":\"IMVDPB87V2021M\",\"titre_imagevideopub\":\"illustration de qsn\",\"soustitre_imagevideopub\":\"\",\"menu_imagevideopub\":\"qsn\",\"position_imagevideopub\":1,\"type_imagevideopub\":\"background\",\"etat_imagevideopub\":\"Active\",\"details_imagevideopub\":\"<p>RAS<\\/p>\",\"focus_imagevideopub\":\"1\"}', 'IMVDPB87V2021M', 'Modification', 'Fichier', '2021-05-04 17:29:27', '18263ADM2021X01U28J'),
(31, ' avec pour titre << Image de fond services >> et pour code IMVDPB87X2021G', '{\"code_imagevideopub\":\"IMVDPB87X2021G\",\"titre_imagevideopub\":\"Image de fond services\",\"soustitre_imagevideopub\":\"\",\"menu_imagevideopub\":\"services\",\"position_imagevideopub\":1,\"type_imagevideopub\":\"background\",\"etat_imagevideopub\":\"Active\",\"details_imagevideopub\":\"<p>RAS<\\/p>\",\"focus_imagevideopub\":\"1\"}', 'IMVDPB87X2021G', 'Modification', 'Fichier', '2021-05-04 17:30:45', '18263ADM2021X01U28J'),
(32, ' avec pour titre << Image de fond services >> et pour code IMVDPB87X2021G', '{\"code_imagevideopub\":\"IMVDPB87X2021G\",\"titre_imagevideopub\":\"Image de fond services\",\"soustitre_imagevideopub\":\"\",\"menu_imagevideopub\":\"services\",\"position_imagevideopub\":1,\"type_imagevideopub\":\"background\",\"etat_imagevideopub\":\"Active\",\"details_imagevideopub\":\"<p>RAS<\\/p>\",\"focus_imagevideopub\":\"1\"}', 'IMVDPB87X2021G', 'Modification', 'Fichier', '2021-05-04 17:32:24', '18263ADM2021X01U28J'),
(33, ' avec pour titre << Image de fond services >> et pour code IMVDPB87X2021G', '{\"code_imagevideopub\":\"IMVDPB87X2021G\",\"titre_imagevideopub\":\"Image de fond services\",\"soustitre_imagevideopub\":\"\",\"menu_imagevideopub\":\"services\",\"position_imagevideopub\":1,\"type_imagevideopub\":\"background\",\"etat_imagevideopub\":\"Active\",\"details_imagevideopub\":\"<p>RAS<\\/p>\",\"focus_imagevideopub\":\"1\"}', 'IMVDPB87X2021G', 'Modification', 'Fichier', '2021-05-04 17:32:58', '18263ADM2021X01U28J'),
(34, ' avec pour titre << Image de fond services >> et pour code IMVDPB87X2021G', '{\"code_imagevideopub\":\"IMVDPB87X2021G\",\"titre_imagevideopub\":\"Image de fond services\",\"soustitre_imagevideopub\":\"\",\"menu_imagevideopub\":\"services\",\"position_imagevideopub\":1,\"type_imagevideopub\":\"background\",\"etat_imagevideopub\":\"Active\",\"details_imagevideopub\":\"<p>RAS<\\/p>\",\"focus_imagevideopub\":\"1\"}', 'IMVDPB87X2021G', 'Modification', 'Fichier', '2021-05-04 17:34:27', '18263ADM2021X01U28J'),
(35, ' avec pour titre << Image de fond services >> et pour code IMVDPB87X2021G', '{\"code_imagevideopub\":\"IMVDPB87X2021G\",\"titre_imagevideopub\":\"Image de fond services\",\"soustitre_imagevideopub\":\"\",\"menu_imagevideopub\":\"services\",\"position_imagevideopub\":1,\"type_imagevideopub\":\"background\",\"etat_imagevideopub\":\"Active\",\"details_imagevideopub\":\"<p>RAS<\\/p>\",\"focus_imagevideopub\":\"1\"}', 'IMVDPB87X2021G', 'Modification', 'Fichier', '2021-05-04 17:43:06', '18263ADM2021X01U28J'),
(36, ' avec pour titre << Image de fond services >> et pour code IMVDPB87X2021G', '{\"code_imagevideopub\":\"IMVDPB87X2021G\",\"titre_imagevideopub\":\"Image de fond services\",\"soustitre_imagevideopub\":\"\",\"menu_imagevideopub\":\"services\",\"position_imagevideopub\":1,\"type_imagevideopub\":\"background\",\"etat_imagevideopub\":\"Active\",\"details_imagevideopub\":\"<p>RAS<\\/p>\",\"focus_imagevideopub\":\"1\"}', 'IMVDPB87X2021G', 'Modification', 'Fichier', '2021-05-04 17:44:21', '18263ADM2021X01U28J'),
(37, ' avec pour titre << Image de fond services >> et pour code IMVDPB87X2021G', '{\"code_imagevideopub\":\"IMVDPB87X2021G\",\"titre_imagevideopub\":\"Image de fond services\",\"soustitre_imagevideopub\":\"\",\"menu_imagevideopub\":\"services\",\"position_imagevideopub\":1,\"type_imagevideopub\":\"background\",\"etat_imagevideopub\":\"Active\",\"details_imagevideopub\":\"<p>RAS<\\/p>\",\"focus_imagevideopub\":\"1\"}', 'IMVDPB87X2021G', 'Modification', 'Fichier', '2021-05-04 17:46:04', '18263ADM2021X01U28J'),
(38, ' ITEM avec pour titre << Innovation >> et pour code MITM52K2021L', '{\"code_menuitems\":\"MITM52K2021L\",\"titre_menuitems\":\"Innovation\",\"menu_menuitems\":\"mission_vision\",\"type_menuitems\":\"vision\",\"details_menuitems\":\"<div>\\r\\n<div>Nous&nbsp;d&eacute;fendons&nbsp;un&nbsp;environnement&nbsp;d\'honn&ecirc;tet&eacute;&nbsp;,&nbsp;de&nbsp;transparence,&nbsp;d\'&eacute;quit&eacute;&nbsp;et&nbsp;de&nbsp;normes&nbsp;morales&nbsp;&eacute;l&eacute;v&eacute;es.<\\/div>\\r\\n<\\/div>\"}', 'MITM52K2021L', 'Modification', 'Menusitems', '2021-05-05 06:45:09', '18263ADM2021X01U28J'),
(39, ' ITEM avec pour titre << Recherche >> et pour code MITM52K2021T', '{\"code_menuitems\":\"MITM52K2021T\",\"titre_menuitems\":\"Recherche\",\"menu_menuitems\":\"mission_vision\",\"type_menuitems\":\"vision\",\"details_menuitems\":\"<div>\\r\\n<div>Nous&nbsp;d&eacute;fendons&nbsp;un&nbsp;environnement&nbsp;d\'honn&ecirc;tet&eacute;&nbsp;,&nbsp;de&nbsp;transparence,&nbsp;d\'&eacute;quit&eacute;&nbsp;et&nbsp;de&nbsp;normes&nbsp;morales&nbsp;&eacute;l&eacute;v&eacute;es.<\\/div>\\r\\n<\\/div>\"}', 'MITM52K2021T', 'Modification', 'Menusitems', '2021-05-05 06:45:49', '18263ADM2021X01U28J'),
(40, ' ITEM avec pour titre << Progression >> et pour code MITM52K2021B', '{\"code_menuitems\":\"MITM52K2021B\",\"titre_menuitems\":\"Progression\",\"menu_menuitems\":\"mission_vision\",\"type_menuitems\":\"vision\",\"details_menuitems\":\"<div>\\r\\n<div>Nous&nbsp;d&eacute;fendons&nbsp;un&nbsp;environnement&nbsp;d\'honn&ecirc;tet&eacute;&nbsp;,&nbsp;de&nbsp;transparence,&nbsp;d\'&eacute;quit&eacute;&nbsp;et&nbsp;de&nbsp;normes&nbsp;morales&nbsp;&eacute;l&eacute;v&eacute;es.<\\/div>\\r\\n<\\/div>\"}', 'MITM52K2021B', 'Modification', 'Menusitems', '2021-05-05 06:46:26', '18263ADM2021X01U28J'),
(41, ' ITEM avec pour titre << Harmonie >> et pour code MITM52K2021D', '{\"code_menuitems\":\"MITM52K2021D\",\"titre_menuitems\":\"Harmonie\",\"menu_menuitems\":\"mission_vision\",\"type_menuitems\":\"vision\",\"details_menuitems\":\"<div>\\r\\n<div>Nous&nbsp;d&eacute;fendons&nbsp;un&nbsp;environnement&nbsp;d\'honn&ecirc;tet&eacute;&nbsp;,&nbsp;de&nbsp;transparence,&nbsp;d\'&eacute;quit&eacute;&nbsp;et&nbsp;de&nbsp;normes&nbsp;morales&nbsp;&eacute;l&eacute;v&eacute;es.<\\/div>\\r\\n<\\/div>\"}', 'MITM52K2021D', 'Modification', 'Menusitems', '2021-05-05 06:47:00', '18263ADM2021X01U28J'),
(42, ' ITEM avec pour titre << Croissance >> et pour code MITM52K20212', '{\"code_menuitems\":\"MITM52K20212\",\"titre_menuitems\":\"Croissance\",\"menu_menuitems\":\"mission_vision\",\"type_menuitems\":\"vision\",\"details_menuitems\":\"<div>\\r\\n<div>Nous&nbsp;d&eacute;fendons&nbsp;un&nbsp;environnement&nbsp;d\'honn&ecirc;tet&eacute;&nbsp;,&nbsp;de&nbsp;transparence,&nbsp;d\'&eacute;quit&eacute;&nbsp;et&nbsp;de&nbsp;normes&nbsp;morales&nbsp;&eacute;l&eacute;v&eacute;es.<\\/div>\\r\\n<\\/div>\"}', 'MITM52K20212', 'Modification', 'Menusitems', '2021-05-05 06:47:24', '18263ADM2021X01U28J'),
(43, ' ITEM avec pour titre << Equilibre >> et pour code MITM52K20214', '{\"code_menuitems\":\"MITM52K20214\",\"titre_menuitems\":\"Equilibre\",\"menu_menuitems\":\"mission_vision\",\"type_menuitems\":\"vision\",\"details_menuitems\":\"<div>\\r\\n<div>Nous&nbsp;d&eacute;fendons&nbsp;un&nbsp;environnement&nbsp;d\'honn&ecirc;tet&eacute;&nbsp;,&nbsp;de&nbsp;transparence,&nbsp;d\'&eacute;quit&eacute;&nbsp;et&nbsp;de&nbsp;normes&nbsp;morales&nbsp;&eacute;l&eacute;v&eacute;es.<\\/div>\\r\\n<\\/div>\"}', 'MITM52K20214', 'Modification', 'Menusitems', '2021-05-05 06:47:53', '18263ADM2021X01U28J'),
(44, ' ITEM avec pour titre << EquitÃ© >> et pour code MITM52K20218', '{\"code_menuitems\":\"MITM52K20218\",\"titre_menuitems\":\"Equit\\u00e9\",\"menu_menuitems\":\"mission_vision\",\"type_menuitems\":\"vision\",\"details_menuitems\":\"<div>\\r\\n<div>Nous&nbsp;d&eacute;fendons&nbsp;un&nbsp;environnement&nbsp;d\'honn&ecirc;tet&eacute;&nbsp;,&nbsp;de&nbsp;transparence,&nbsp;d\'&eacute;quit&eacute;&nbsp;et&nbsp;de&nbsp;normes&nbsp;morales&nbsp;&eacute;l&eacute;v&eacute;es.<\\/div>\\r\\n<\\/div>\"}', 'MITM52K20218', 'Modification', 'Menusitems', '2021-05-05 06:48:27', '18263ADM2021X01U28J'),
(45, ' avec pour titre << Image de fond services >> et pour code IMVDPB87X2021G', '{\"code_imagevideopub\":\"IMVDPB87X2021G\",\"titre_imagevideopub\":\"Image de fond services\",\"soustitre_imagevideopub\":\"\",\"menu_imagevideopub\":\"services\",\"position_imagevideopub\":1,\"type_imagevideopub\":\"background\",\"etat_imagevideopub\":\"Active\",\"details_imagevideopub\":\"<p>RAS<\\/p>\",\"focus_imagevideopub\":\"1\",\"fichier_imagevideopub\":\"FCH-IMVDPB87X2021G-20210505065904.jpg\"}', 'IMVDPB87X2021G', 'Modification', 'Fichier', '2021-05-05 06:59:05', '18263ADM2021X01U28J'),
(46, 'janett management', '{\"code_useradmin\":\"18263ADM2021X01U28J\",\"etat_useradmin\":1,\"numpiece_useradmin\":\"----\",\"nom_useradmin\":\"janett\",\"prenoms_useradmin\":\"management\",\"dateNais_useradmin\":\"2021-01-29\",\"lieuNais_useradmin\":\"Abidjan\",\"sexe_useradmin\":\"M\",\"sitMatr_useradmin\":\"C\\u00e9libataire\",\"nbenf_useradmin\":1,\"contact_useradmin\":\"0000000000\",\"email_useradmin\":\"janettmanagmentltd@gmail.com\",\"adresse_useradmin\":\"\",\"bp_useradmin\":\"\",\"pays_useradmin\":\"C\\u00f4te d\'Ivoire\",\"ville_useradmin\":\"Abidjan\",\"quartier_useradmin\":\"Marcory, IBIS\",\"login_useradmin\":\"janettmanagmentltd225\",\"mdp_useradmin\":\"janettmanagmentltd225\",\"codePrivilege_useradmin\":\"PRV603f2626de5f9\",\"loginC_useradmin\":\"a8ff01c53bafc8118b90d1e829edfd0d\",\"mdpC_useradmin\":\"a8ff01c53bafc8118b90d1e829edfd0d\"}', '18263ADM2021X01U28J', 'Modification', 'Administrateur', '2021-05-15 05:17:36', '18263ADM2021X01U28J'),
(47, ' : DESIGNATION : Kacou aymard Aymard', '', '78361ADM2021Z01528O', 'Suppression', 'Administrateur', '2021-05-15 05:26:55', '18263ADM2021X01U28J'),
(48, 'janett management', '{\"code_useradmin\":\"18263ADM2021X01U28J\",\"etat_useradmin\":1,\"numpiece_useradmin\":\"----\",\"nom_useradmin\":\"janett\",\"prenoms_useradmin\":\"management\",\"dateNais_useradmin\":\"2021-01-29\",\"lieuNais_useradmin\":\"Abidjan\",\"sexe_useradmin\":\"M\",\"sitMatr_useradmin\":\"C\\u00e9libataire\",\"nbenf_useradmin\":1,\"contact_useradmin\":\"0000000000\",\"email_useradmin\":\"janettmanagmentltd@gmail.com\",\"adresse_useradmin\":\"\",\"bp_useradmin\":\"\",\"pays_useradmin\":\"C\\u00f4te d\'Ivoire\",\"ville_useradmin\":\"Abidjan\",\"quartier_useradmin\":\"Marcory, IBIS\",\"login_useradmin\":\"janettmanagmentltd225\",\"mdp_useradmin\":\"janettmanagmentltd225\",\"codePrivilege_useradmin\":\"PRV603f2626de5f9\",\"loginC_useradmin\":\"a8ff01c53bafc8118b90d1e829edfd0d\",\"mdpC_useradmin\":\"a8ff01c53bafc8118b90d1e829edfd0d\"}', '18263ADM2021X01U28J', 'Modification', 'Administrateur', '2021-05-15 05:27:08', '18263ADM2021X01U28J'),
(49, 'janett management', '{\"code_useradmin\":\"18263ADM2021X01U28J\",\"etat_useradmin\":1,\"numpiece_useradmin\":\"----\",\"nom_useradmin\":\"janett\",\"prenoms_useradmin\":\"management\",\"dateNais_useradmin\":\"2021-01-29\",\"lieuNais_useradmin\":\"Abidjan\",\"sexe_useradmin\":\"M\",\"sitMatr_useradmin\":\"C\\u00e9libataire\",\"nbenf_useradmin\":1,\"contact_useradmin\":\"0000000000\",\"email_useradmin\":\"janettmanagmentltd@gmail.com\",\"adresse_useradmin\":\"\",\"bp_useradmin\":\"\",\"pays_useradmin\":\"C\\u00f4te d\'Ivoire\",\"ville_useradmin\":\"Abidjan\",\"quartier_useradmin\":\"Marcory, IBIS\",\"login_useradmin\":\"janettmanagmentltd225\",\"mdp_useradmin\":\"janettmanagmentltd225\",\"codePrivilege_useradmin\":\"PRV603f2626de5f9\",\"loginC_useradmin\":\"a8ff01c53bafc8118b90d1e829edfd0d\",\"mdpC_useradmin\":\"a8ff01c53bafc8118b90d1e829edfd0d\",\"image_useradmin\":\"IMG20210515053032.png\"}', '18263ADM2021X01U28J', 'Modification', 'Administrateur', '2021-05-15 05:30:32', '18263ADM2021X01U28J'),
(50, 'janett management', '{\"code_useradmin\":\"18263ADM2021X01U28J\",\"etat_useradmin\":1,\"numpiece_useradmin\":\"----\",\"nom_useradmin\":\"janett\",\"prenoms_useradmin\":\"management\",\"dateNais_useradmin\":\"2021-01-29\",\"lieuNais_useradmin\":\"Abidjan\",\"sexe_useradmin\":\"M\",\"sitMatr_useradmin\":\"C\\u00e9libataire\",\"nbenf_useradmin\":1,\"contact_useradmin\":\"0000000000\",\"email_useradmin\":\"janettmanagmentltd@gmail.com\",\"adresse_useradmin\":\"\",\"bp_useradmin\":\"\",\"pays_useradmin\":\"C\\u00f4te d\'Ivoire\",\"ville_useradmin\":\"Abidjan\",\"quartier_useradmin\":\"Marcory, IBIS\",\"login_useradmin\":\"janettmanagmentltd225\",\"mdp_useradmin\":\"janettmanagmentltd225\",\"codePrivilege_useradmin\":\"PRV603f2626de5f9\",\"loginC_useradmin\":\"a8ff01c53bafc8118b90d1e829edfd0d\",\"mdpC_useradmin\":\"a8ff01c53bafc8118b90d1e829edfd0d\",\"image_useradmin\":\"18263ADM2021X01U28JIMG20210515054050.png\"}', '18263ADM2021X01U28J', 'Modification', 'Administrateur', '2021-05-15 05:40:50', '18263ADM2021X01U28J'),
(51, 'janett management', '{\"code_useradmin\":\"18263ADM2021X01U28J\",\"etat_useradmin\":1,\"numpiece_useradmin\":\"----\",\"nom_useradmin\":\"janett\",\"prenoms_useradmin\":\"management\",\"dateNais_useradmin\":\"2021-01-29\",\"lieuNais_useradmin\":\"Abidjan\",\"sexe_useradmin\":\"M\",\"sitMatr_useradmin\":\"C\\u00e9libataire\",\"nbenf_useradmin\":1,\"contact_useradmin\":\"0000000000\",\"email_useradmin\":\"janettmanagmentltd@gmail.com\",\"adresse_useradmin\":\"\",\"bp_useradmin\":\"\",\"pays_useradmin\":\"C\\u00f4te d\'Ivoire\",\"ville_useradmin\":\"Abidjan\",\"quartier_useradmin\":\"Marcory, IBIS\",\"login_useradmin\":\"janettmanagmentltd225\",\"mdp_useradmin\":\"janettmanagmentltd225\",\"codePrivilege_useradmin\":\"PRV603f2626de5f9\",\"loginC_useradmin\":\"a8ff01c53bafc8118b90d1e829edfd0d\",\"mdpC_useradmin\":\"a8ff01c53bafc8118b90d1e829edfd0d\",\"image_useradmin\":\"18263ADM2021X01U28JIMG20210515054430.png\"}', '18263ADM2021X01U28J', 'Modification', 'Administrateur', '2021-05-15 05:44:30', '18263ADM2021X01U28J');

-- --------------------------------------------------------

--
-- Structure de la table `imagevideopub`
--

DROP TABLE IF EXISTS `imagevideopub`;
CREATE TABLE IF NOT EXISTS `imagevideopub` (
  `id_imagevideopub` int(11) NOT NULL AUTO_INCREMENT,
  `code_imagevideopub` varchar(30) DEFAULT NULL,
  `titre_imagevideopub` text,
  `soustitre_imagevideopub` text,
  `details_imagevideopub` text,
  `fichier_imagevideopub` varchar(150) DEFAULT NULL,
  `menu_imagevideopub` varchar(50) DEFAULT NULL,
  `position_imagevideopub` int(3) DEFAULT NULL,
  `type_imagevideopub` varchar(30) DEFAULT NULL,
  `etat_imagevideopub` varchar(30) DEFAULT NULL,
  `focus_imagevideopub` int(1) DEFAULT NULL COMMENT '1 pour le focus et 0 pour non focus',
  `typefile_imagevideopub` varchar(30) DEFAULT NULL COMMENT 'IMAGE - VIDEOS - PDF etc...',
  `date_at_imagevideopub` datetime NOT NULL,
  PRIMARY KEY (`id_imagevideopub`),
  UNIQUE KEY `indexcode_imagpub` (`code_imagevideopub`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `imagevideopub`
--

INSERT INTO `imagevideopub` (`id_imagevideopub`, `code_imagevideopub`, `titre_imagevideopub`, `soustitre_imagevideopub`, `details_imagevideopub`, `fichier_imagevideopub`, `menu_imagevideopub`, `position_imagevideopub`, `type_imagevideopub`, `etat_imagevideopub`, `focus_imagevideopub`, `typefile_imagevideopub`, `date_at_imagevideopub`) VALUES
(1, 'IMVDPB87X2021G', 'Image de fond services', '', '<p>RAS</p>', 'FCH-IMVDPB87X2021G-20210505065904.jpg', 'services', 1, 'background', 'Active', 1, NULL, '2021-05-04 02:02:09'),
(2, 'IMVDPB87V2021M', 'illustration de qsn', '', '<p>RAS</p>', 'IMG-IMVDPB87V2021M-20210504172833.jpg', 'qsn', 1, 'background', 'Active', 1, NULL, '2021-05-04 02:04:52');

-- --------------------------------------------------------

--
-- Structure de la table `juridique`
--

DROP TABLE IF EXISTS `juridique`;
CREATE TABLE IF NOT EXISTS `juridique` (
  `id_juridique` int(3) NOT NULL,
  `menu_juridique` varchar(30) NOT NULL,
  `donnees_juridique` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `date_at_juridique` datetime NOT NULL,
  PRIMARY KEY (`id_juridique`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `juridique`
--

INSERT INTO `juridique` (`id_juridique`, `menu_juridique`, `donnees_juridique`, `date_at_juridique`) VALUES
(1, 'code_ethique', '{\"menu\":\"code_ethique\",\"image_\":\"IMG20210208163219.png\",\"titre\":\"Where does it come from?\",\"soustitre\":\"\",\"details\":\"<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \\\"de Finibus Bonorum et Malorum\\\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \\\"Lorem ipsum dolor sit amet..\\\", comes from a line in section 1.10.32.<\\/p>\\r\\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \\\"de Finibus Bonorum et Malorum\\\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the<\\/p>\",\"image\":\"IMG20210303213114.jpg\"}', '2021-03-03 21:31:14'),
(2, 'politique_confidencialite', '{\"menu\":\"politique_confidencialite\",\"image_\":\"IMG20210208163305.png\",\"titre\":\"Where does it come from?\",\"soustitre\":\"\",\"details\":\"<h2>&nbsp;<\\/h2>\\r\\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \\\"de Finibus Bonorum et Malorum\\\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \\\"Lorem ipsum dolor sit amet..\\\", comes from a line in section 1.10.32.<\\/p>\\r\\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \\\"de Finibus Bonorum et Malorum\\\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the<\\/p>\",\"image\":\"IMG20210303213146.jpg\"}', '2021-03-03 21:31:46'),
(3, 'conditions_generales', '{\"menu\":\"conditions_generales\",\"image_\":\"IMG20210208163417.jpg\",\"titre\":\"Where can I get some?\",\"soustitre\":\"\",\"details\":\"<h2>&nbsp;<\\/h2>\\r\\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.<\\/p>\",\"image\":\"IMG20210303213201.jpg\"}', '2021-03-03 21:32:01');

-- --------------------------------------------------------

--
-- Structure de la table `menuitems`
--

DROP TABLE IF EXISTS `menuitems`;
CREATE TABLE IF NOT EXISTS `menuitems` (
  `id_menuitems` int(11) NOT NULL AUTO_INCREMENT,
  `code_menuitems` varchar(30) DEFAULT NULL,
  `titre_menuitems` varchar(225) DEFAULT NULL,
  `soustitre_menuitems` varchar(225) DEFAULT NULL,
  `details_menuitems` text,
  `image_menuitems` varchar(150) DEFAULT NULL,
  `menu_menuitems` varchar(50) DEFAULT NULL,
  `type_menuitems` varchar(50) DEFAULT NULL,
  `date_at_menuitems` datetime DEFAULT NULL,
  PRIMARY KEY (`id_menuitems`),
  UNIQUE KEY `code_menuitems` (`code_menuitems`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `menuitems`
--

INSERT INTO `menuitems` (`id_menuitems`, `code_menuitems`, `titre_menuitems`, `soustitre_menuitems`, `details_menuitems`, `image_menuitems`, `menu_menuitems`, `type_menuitems`, `date_at_menuitems`) VALUES
(1, 'MITM27I2021S', 'Where does it come from?', NULL, '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>', 'IMG-MITM27I2021S-20210501161934.jpg', 'services', 'service', '2021-05-01 16:19:34'),
(2, 'MITM52K2021L', 'Innovation', NULL, '<div>\r\n<div>Nous&nbsp;d&eacute;fendons&nbsp;un&nbsp;environnement&nbsp;d\'honn&ecirc;tet&eacute;&nbsp;,&nbsp;de&nbsp;transparence,&nbsp;d\'&eacute;quit&eacute;&nbsp;et&nbsp;de&nbsp;normes&nbsp;morales&nbsp;&eacute;l&eacute;v&eacute;es.</div>\r\n</div>', 'IMG-MITM52K2021L-20210504131137.jpg', 'mission_vision', 'vision', '2021-05-01 16:24:00'),
(3, 'MITM27I2021M', 'Where does it come from?', NULL, '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>', 'IMG-MITM27I2021S-20210501161934.jpg', 'services', 'service', '2021-05-01 16:19:34'),
(4, 'MITM52K2021T', 'Recherche', NULL, '<div>\r\n<div>Nous&nbsp;d&eacute;fendons&nbsp;un&nbsp;environnement&nbsp;d\'honn&ecirc;tet&eacute;&nbsp;,&nbsp;de&nbsp;transparence,&nbsp;d\'&eacute;quit&eacute;&nbsp;et&nbsp;de&nbsp;normes&nbsp;morales&nbsp;&eacute;l&eacute;v&eacute;es.</div>\r\n</div>', 'IMG-MITM52K2021T-20210504132954.jpg', 'mission_vision', 'vision', '2021-05-01 16:24:00'),
(5, 'MITM27I2021A', 'Where does it come from?', NULL, '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>', 'IMG-MITM27I2021S-20210501161934.jpg', 'services', 'service', '2021-05-01 16:19:34'),
(6, 'MITM52K2021B', 'Progression', NULL, '<div>\r\n<div>Nous&nbsp;d&eacute;fendons&nbsp;un&nbsp;environnement&nbsp;d\'honn&ecirc;tet&eacute;&nbsp;,&nbsp;de&nbsp;transparence,&nbsp;d\'&eacute;quit&eacute;&nbsp;et&nbsp;de&nbsp;normes&nbsp;morales&nbsp;&eacute;l&eacute;v&eacute;es.</div>\r\n</div>', 'IMG-MITM52K2021B-20210504133024.jpg', 'mission_vision', 'vision', '2021-05-01 16:24:00'),
(7, 'MITM27I2021C', 'Where does it come from?', NULL, '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>', 'IMG-MITM27I2021S-20210501161934.jpg', 'services', 'service', '2021-05-01 16:19:34'),
(8, 'MITM52K2021D', 'Harmonie', NULL, '<div>\r\n<div>Nous&nbsp;d&eacute;fendons&nbsp;un&nbsp;environnement&nbsp;d\'honn&ecirc;tet&eacute;&nbsp;,&nbsp;de&nbsp;transparence,&nbsp;d\'&eacute;quit&eacute;&nbsp;et&nbsp;de&nbsp;normes&nbsp;morales&nbsp;&eacute;l&eacute;v&eacute;es.</div>\r\n</div>', 'IMG-MITM52K2021D-20210504133043.jpg', 'mission_vision', 'vision', '2021-05-01 16:24:00'),
(9, 'MITM27I20211', 'Where does it come from?', NULL, '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>', 'IMG-MITM27I2021S-20210501161934.jpg', 'services', 'service', '2021-05-01 16:19:34'),
(10, 'MITM52K20212', 'Croissance', NULL, '<div>\r\n<div>Nous&nbsp;d&eacute;fendons&nbsp;un&nbsp;environnement&nbsp;d\'honn&ecirc;tet&eacute;&nbsp;,&nbsp;de&nbsp;transparence,&nbsp;d\'&eacute;quit&eacute;&nbsp;et&nbsp;de&nbsp;normes&nbsp;morales&nbsp;&eacute;l&eacute;v&eacute;es.</div>\r\n</div>', 'IMG-MITM52K20212-20210504133103.jpg', 'mission_vision', 'vision', '2021-05-01 16:24:00'),
(11, 'MITM27I20213', 'Where does it come from?', NULL, '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>', 'IMG-MITM27I2021S-20210501161934.jpg', 'services', 'service', '2021-05-01 16:19:34'),
(12, 'MITM52K20214', 'Equilibre', NULL, '<div>\r\n<div>Nous&nbsp;d&eacute;fendons&nbsp;un&nbsp;environnement&nbsp;d\'honn&ecirc;tet&eacute;&nbsp;,&nbsp;de&nbsp;transparence,&nbsp;d\'&eacute;quit&eacute;&nbsp;et&nbsp;de&nbsp;normes&nbsp;morales&nbsp;&eacute;l&eacute;v&eacute;es.</div>\r\n</div>', 'IMG-MITM52K2021L-20210504131137.jpg', 'mission_vision', 'vision', '2021-05-01 16:24:00'),
(13, 'MITM27I20215', 'Where does it come from?', NULL, '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>', 'IMG-MITM27I2021S-20210501161934.jpg', 'services', 'service', '2021-05-01 16:19:34'),
(14, 'MITM52K20216', 'Where can I get some?', NULL, '<div>\r\n<div>Nous&nbsp;d&eacute;fendons&nbsp;un&nbsp;environnement&nbsp;d\'honn&ecirc;tet&eacute;&nbsp;,&nbsp;de&nbsp;transparence,&nbsp;d\'&eacute;quit&eacute;&nbsp;et&nbsp;de&nbsp;normes&nbsp;morales&nbsp;&eacute;l&eacute;v&eacute;es.</div>\r\n</div>', 'IMG-MITM52K2021L-20210504131137.jpg', 'mission_vision', 'vision', '2021-05-01 16:24:00'),
(15, 'MITM27I20217', 'Where does it come from?', NULL, '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>', 'IMG-MITM27I2021S-20210501161934.jpg', 'services', 'service', '2021-05-01 16:19:34'),
(16, 'MITM52K20218', 'EquitÃ©', NULL, '<div>\r\n<div>Nous&nbsp;d&eacute;fendons&nbsp;un&nbsp;environnement&nbsp;d\'honn&ecirc;tet&eacute;&nbsp;,&nbsp;de&nbsp;transparence,&nbsp;d\'&eacute;quit&eacute;&nbsp;et&nbsp;de&nbsp;normes&nbsp;morales&nbsp;&eacute;l&eacute;v&eacute;es.</div>\r\n</div>', 'IMG-MITM52K2021L-20210504131137.jpg', 'mission_vision', 'vision', '2021-05-01 16:24:00');

-- --------------------------------------------------------

--
-- Structure de la table `messagerie`
--

DROP TABLE IF EXISTS `messagerie`;
CREATE TABLE IF NOT EXISTS `messagerie` (
  `id_messagerie` int(11) NOT NULL AUTO_INCREMENT,
  `expediteur_messagerie` varchar(50) DEFAULT NULL COMMENT 'code expéditeur',
  `email_messagerie` varchar(255) DEFAULT NULL COMMENT 'Email expéditeur',
  `contacts_messagerie` varchar(50) DEFAULT NULL COMMENT 'Phone expéditeur',
  `destinataire_messagerie` varchar(50) DEFAULT NULL COMMENT 'code destinataire',
  `objet_messagerie` mediumtext COMMENT 'Objet du message',
  `contenu_messagerie` longtext COMMENT 'Contenu du message',
  `date_at_messagerie` datetime DEFAULT NULL COMMENT 'Date de l''envoi ou de la reception du message',
  `dateview_messagerie` datetime DEFAULT NULL COMMENT 'date de lecture du message',
  `type_messagerie` varchar(30) DEFAULT NULL,
  `compagnie_messagerie` varchar(150) NOT NULL,
  PRIMARY KEY (`id_messagerie`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `messagerie`
--

INSERT INTO `messagerie` (`id_messagerie`, `expediteur_messagerie`, `email_messagerie`, `contacts_messagerie`, `destinataire_messagerie`, `objet_messagerie`, `contenu_messagerie`, `date_at_messagerie`, `dateview_messagerie`, `type_messagerie`, `compagnie_messagerie`) VALUES
(3, 'Aymard Elvis', 'kacou_2@gmail.com', '78965412', NULL, NULL, 'salut', '2021-05-04 04:19:17', '2021-05-04 04:19:38', 'contact', 'orange'),
(4, 'Abraham Elvis', 'abraham@gmail.com', '78965412', NULL, NULL, 'Salut', '2021-05-04 09:34:11', '2021-05-04 10:08:49', 'contact', 'MTN'),
(5, 'Abraham Elvis', 'abraham@gmail.com', '78965412', NULL, NULL, 'Salut', '2021-05-04 09:34:53', '2021-05-04 10:08:49', 'contact', 'MTN'),
(6, 'Abraham Elvis', 'abraham@gmail.com', '78965412', NULL, NULL, 'Salut', '2021-05-04 09:41:14', '2021-05-04 10:08:49', 'contact', 'MTN'),
(7, 'Abraham Elvis', 'abraham@gmail.com', '78965412', NULL, NULL, 'Salut', '2021-05-04 09:47:30', '2021-05-04 10:08:49', 'contact', 'MTN'),
(8, 'Abraham Elvis', 'abraham@gmail.com', '78965412', NULL, NULL, 'Salut', '2021-05-04 09:48:11', '2021-05-04 10:08:49', 'contact', 'MTN'),
(9, 'Abraham Elvis', 'abraham@gmail.com', '78965412', NULL, NULL, 'Salut', '2021-05-04 09:48:53', '2021-05-04 10:08:49', 'contact', 'MTN'),
(10, 'Abraham Elvis', 'abraham@gmail.com', '78965412', NULL, NULL, 'Salut', '2021-05-04 09:55:30', '2021-05-04 10:08:49', 'contact', 'MTN'),
(11, 'Abraham Elvis', 'abraham@gmail.com', '78965412', NULL, NULL, 'Salut', '2021-05-04 09:57:04', '2021-05-04 10:08:49', 'contact', 'MTN'),
(12, 'Abraham Elvis', 'abraham@gmail.com', '78965412', NULL, NULL, 'Salut', '2021-05-04 09:59:34', '2021-05-04 10:08:49', 'contact', 'MTN'),
(13, 'Abraham Elvis', 'abraham@gmail.com', '78965412', NULL, NULL, 'Salut', '2021-05-04 10:01:34', '2021-05-04 10:08:49', 'contact', 'MTN'),
(14, 'Abraham Elvis', 'abraham@gmail.com', '78965412', NULL, NULL, 'Salut', '2021-05-04 10:02:16', '2021-05-04 10:08:49', 'contact', 'MTN'),
(15, 'Abraham Elvis', 'abraham@gmail.com', '78965412', NULL, NULL, 'Salut', '2021-05-04 10:02:58', '2021-05-04 10:08:49', 'contact', 'MTN'),
(16, 'Abraham Elvis', 'abraham@gmail.com', '78965412', NULL, NULL, 'Salut', '2021-05-04 10:03:39', '2021-05-04 10:08:49', 'contact', 'MTN'),
(17, 'Abraham Elvis', 'abraham@gmail.com', '78965412', NULL, NULL, 'Salut', '2021-05-04 10:07:46', '2021-05-04 10:08:49', 'contact', 'MTN'),
(18, 'Aymard Elvis', 'borgelin@gmail.com', '78965412', NULL, NULL, 'Salut', '2021-05-04 10:08:32', '2021-05-04 10:08:49', 'contact', 'MOOV'),
(19, 'Abraham Elvis', 'abraham@gmail.com', '78965412', NULL, NULL, 'COUCOU', '2021-05-04 12:08:35', '2021-05-04 12:22:40', 'contact', 'MTN');

-- --------------------------------------------------------

--
-- Structure de la table `msgnewsletter`
--

DROP TABLE IF EXISTS `msgnewsletter`;
CREATE TABLE IF NOT EXISTS `msgnewsletter` (
  `id_msgnewsletter` int(11) NOT NULL,
  `contenu_msgnewsletter` mediumtext,
  `piecesjoins_msgnewsletter` mediumtext,
  `date_at_msgnewsletter` datetime DEFAULT NULL,
  `typecontenu_msgnewsletter` text NOT NULL,
  `categorie_msgnewsletter` text NOT NULL,
  `code_msgnewsletter` varchar(30) NOT NULL,
  PRIMARY KEY (`id_msgnewsletter`),
  UNIQUE KEY `code_msgnewsletter` (`code_msgnewsletter`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `newsletter`
--

DROP TABLE IF EXISTS `newsletter`;
CREATE TABLE IF NOT EXISTS `newsletter` (
  `id_newsletter` int(11) NOT NULL,
  `email_newsletter` varchar(225) DEFAULT NULL,
  `date_at_newsletter` datetime DEFAULT NULL,
  `typecontenu_newsletter` text NOT NULL,
  `categorie_newsletter` text NOT NULL,
  PRIMARY KEY (`id_newsletter`),
  UNIQUE KEY `email_newsletter` (`email_newsletter`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `newsletter`
--

INSERT INTO `newsletter` (`id_newsletter`, `email_newsletter`, `date_at_newsletter`, `typecontenu_newsletter`, `categorie_newsletter`) VALUES
(2, 'abraham@gamail.com', '2021-03-29 18:15:07', 'TOUS', 'TOUS'),
(7, 'abraham7@gamail.com', '2021-03-29 19:05:55', 'TOUS', 'TOUS'),
(12, 'abraham29@gamail.com', '2021-03-29 19:11:33', 'TOUS', 'TOUS');

-- --------------------------------------------------------

--
-- Structure de la table `notification`
--

DROP TABLE IF EXISTS `notification`;
CREATE TABLE IF NOT EXISTS `notification` (
  `id_notification` int(11) NOT NULL AUTO_INCREMENT,
  `contenu_notification` mediumtext COMMENT 'Contenu de la notification',
  `type_of_notification` varchar(30) DEFAULT NULL COMMENT 'Type de la notification',
  `destinataire_notification` varchar(30) DEFAULT NULL COMMENT 'Destinataire de la notification',
  `date_at_notification` datetime DEFAULT NULL COMMENT 'Date de la notification',
  `expediteur_notification` varchar(30) DEFAULT NULL COMMENT 'emetteur de la notification',
  `dateview_notification` datetime DEFAULT NULL COMMENT 'date a laquelle la notification est vue',
  `objetconcerne_notification` varchar(30) DEFAULT NULL COMMENT 'Objet concernés',
  PRIMARY KEY (`id_notification`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `notification`
--

INSERT INTO `notification` (`id_notification`, `contenu_notification`, `type_of_notification`, `destinataire_notification`, `date_at_notification`, `expediteur_notification`, `dateview_notification`, `objetconcerne_notification`) VALUES
(1, 'Vous avez recu un nouveau message de :<br/> <b>Abraham Elvis</b>', 'Messagerie', 'ADMIN', '2021-05-04 10:07:46', NULL, '2021-05-04 10:08:38', NULL),
(2, 'Vous avez recu un nouveau message de :<br/> <b>Aymard Elvis</b>', 'Messagerie', 'ADMIN', '2021-05-04 10:08:32', NULL, '2021-05-04 10:08:38', NULL),
(3, 'Vous avez recu un nouveau message de :<br/> <b>Abraham Elvis</b>', 'Messagerie', 'ADMIN', '2021-05-04 12:08:36', NULL, '2021-05-04 12:22:34', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `phinxlog`
--

DROP TABLE IF EXISTS `phinxlog`;
CREATE TABLE IF NOT EXISTS `phinxlog` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `breakpoint` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `phinxlog`
--

INSERT INTO `phinxlog` (`version`, `migration_name`, `start_time`, `end_time`, `breakpoint`) VALUES
(20201001172419, 'SlideShowMigration', '2020-11-27 01:31:42', '2020-11-27 01:31:43', 0),
(20201003094419, 'ExpositionMigration', '2020-11-27 01:31:43', '2020-11-27 01:31:43', 0),
(20201003094529, 'VideoThequeMigration', '2020-11-27 01:31:43', '2020-11-27 01:31:43', 0),
(20201005111437, 'PrivilegeMigration', '2020-11-27 01:31:43', '2020-11-27 01:31:44', 0),
(20201005112708, 'UseradminMigration', '2020-11-27 01:31:44', '2020-11-27 01:31:45', 0),
(20201005122439, 'QsnMigration', '2020-11-27 01:31:45', '2020-11-27 01:31:45', 0),
(20201005124431, 'ContactMigration', '2020-11-27 01:31:45', '2020-11-27 01:31:46', 0),
(20201005142455, 'CategorieMigration', '2020-11-27 01:31:46', '2020-11-27 01:31:47', 0),
(20201005144210, 'ProduitMigration', '2020-11-27 01:31:47', '2020-11-27 01:31:50', 0),
(20201005151332, 'ImageProduitMigration', '2020-11-27 01:31:50', '2020-11-27 01:31:51', 0),
(20201005152334, 'VideoProduitMigration', '2020-11-27 01:31:51', '2020-11-27 01:31:52', 0),
(20201005153903, 'CollectionMigration', '2020-11-27 01:31:52', '2020-11-27 01:31:54', 0),
(20201005163630, 'UserMigration', '2020-11-27 01:31:54', '2020-11-27 01:31:55', 0),
(20201005165953, 'CommandeMigration', '2020-11-27 01:31:55', '2020-11-27 01:31:57', 0),
(20201006130752, 'MessagerieMigration', '2020-11-27 01:31:58', '2020-11-27 01:31:58', 0),
(20201006145723, 'NewsletterMigration', '2020-11-27 01:31:58', '2020-11-27 01:31:59', 0),
(20201007204238, 'NotificationMigration', '2020-11-27 01:31:59', '2020-11-27 01:31:59', 0),
(20201007205413, 'HelpFqMigration', '2020-11-27 01:31:59', '2020-11-27 01:32:03', 0),
(20201007212134, 'AproposMigration', '2020-11-27 01:32:03', '2020-11-27 01:32:04', 0),
(20201104000345, 'JuridiqueMigration', '2020-11-27 01:32:04', '2020-11-27 01:32:05', 0),
(20201104004321, 'CommentaireMigration', '2020-11-27 01:32:05', '2020-11-27 01:32:05', 0),
(20201106212907, 'HistoriqueMigration', '2020-11-27 01:32:05', '2020-11-27 01:32:05', 0),
(20201107000147, 'PanierMigration', '2020-11-27 01:32:05', '2020-11-27 01:32:08', 0),
(20201107000322, 'PromotionPubVideoMigration', '2020-11-27 01:32:08', '2020-11-27 01:32:09', 0),
(20201107112812, 'ConnectyHistoryMigration', '2020-11-27 01:32:09', '2020-11-27 01:32:10', 0),
(20201117170207, 'StockMigration', '2020-11-27 01:32:10', '2020-11-27 01:32:11', 0),
(20201117194126, 'FournisseurMigration', '2020-11-27 01:32:11', '2020-11-27 01:32:11', 0),
(20201120011554, 'AchatMigration', '2020-11-27 01:32:11', '2020-11-27 01:32:13', 0),
(20201123215007, 'VenteMigration', '2020-11-27 01:32:13', '2020-11-27 01:32:14', 0),
(20210201084221, 'LivraisonMigration', '2021-02-01 13:13:07', '2021-02-01 13:13:09', 0);

-- --------------------------------------------------------

--
-- Structure de la table `privilege`
--

DROP TABLE IF EXISTS `privilege`;
CREATE TABLE IF NOT EXISTS `privilege` (
  `id_privilege` int(11) NOT NULL,
  `code_privilege` varchar(30) DEFAULT NULL,
  `nom_privilege` varchar(50) DEFAULT NULL,
  `details_privilege` longtext,
  `parent_privilege` varchar(30) NOT NULL,
  `menus_privilege` mediumtext,
  `actions_privilege` mediumtext,
  PRIMARY KEY (`id_privilege`),
  UNIQUE KEY `indexPrivilege` (`code_privilege`),
  UNIQUE KEY `indexNomPrivilege` (`nom_privilege`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `privilege`
--

INSERT INTO `privilege` (`id_privilege`, `code_privilege`, `nom_privilege`, `details_privilege`, `parent_privilege`, `menus_privilege`, `actions_privilege`) VALUES
(1, 'PRV603f2626de5f9', 'ADMINISTRATEUR GENERAL', '<p>Premier responsable de la plateforme</p>', '', '[\"admin.dashbord.index\",\"admin.imagevideopub.gestion\",\"admin.imagevideopub.gestion.save\",\"admin.imagevideopub.gestion.edit\",\"admin.site.slide\",\"admin.serviceclient.gestion\",\"admin.serviceclient.gestion.page\",\"admin.blog.gestion\",\"admin.blog.gestion.save\",\"admin.blog.gestion.edit\",\"admin.menuitems.gestion\",\"admin.menuitems.gestion.save\",\"admin.menuitems.gestion.edit\",\"admin.administrateur.gestion\",\"admin.administrateur.visualiseradmin\",\"admin.administrateur.profiladmin\",\"admin.administrateur.actualiserUseradmin\",\"admin.administrateur.saveUseradmin\",\"admin.administrateur.createPrivilege\",\"admin.administrateur.createPrivilege.visualiserPrivilege\",\"admin.messagerie.index\",\"admin.messagerie.visualiser\",\"admin.notification.index\",\"admin.historique.createHistorique\"]', '[\"admin.imagevideopub.gestion.save.post.saveImagevideopub\",\"admin.imagevideopub.gestion.edit.post.updateImagevideopub\",\"admin.imagevideopub.gestion.edit.post.deleteImagevideopub\",\"admin.imagevideopub.gestion.post.searchImagevideopub\",\"admin.imagevideopub.gestion.save.post.saveImagevideopub\",\"admin.imagevideopub.gestion.edit.post.updateImagevideopub\",\"admin.imagevideopub.gestion.edit.post.deleteImagevideopub\",\"admin.serviceclient.gestion.post.updateServiceclient\",\"admin.blog.gestion.save.post.saveblog\",\"admin.blog.gestion.edit.post.updateblog\",\"admin.blog.gestion.edit.post.deleteblog\",\"admin.blog.gestion.post.searchblog\",\"admin.blog.gestion.save.post.saveblog\",\"admin.blog.gestion.edit.post.updateblog\",\"admin.blog.gestion.edit.post.deleteblog\",\"admin.menuitems.gestion.save.post.savemenuitems\",\"admin.menuitems.gestion.edit.post.updatemenuitems\",\"admin.menuitems.gestion.edit.post.deletemenuitems\",\"admin.menuitems.gestion.post.searchmenuitems\",\"admin.menuitems.gestion.save.post.savechildrenmenuitems\",\"admin.menuitems.gestion.edit.post.updatechildrenmenuitems\",\"admin.menuitems.gestion.edit.post.deletechildrenmenuitems\",\"admin.menuitems.gestion.save.post.savemenuitems\",\"admin.menuitems.gestion.save.post.savechildrenmenuitems\",\"admin.menuitems.gestion.edit.post.updatemenuitems\",\"admin.menuitems.gestion.edit.post.deletemenuitems\",\"admin.menuitems.gestion.edit.post.updatechildrenmenuitems\",\"admin.menuitems.gestion.edit.post.deletechildrenmenuitems\",\"admin.administrateur.gestion.post.saveUseradmin\",\"admin.administrateur.gestion.post.searchUseradmin\",\"admin.administrateur.gestion.post.updateUseradmin\",\"admin.administrateur.gestion.post.deleteUseradmin\",\"admin.administrateur.gestion.post.disconnectUseradmin\",\"admin.administrateur.createPrivilege.post.savePrivilege\",\"admin.administrateur.createPrivilege.post.searchPrivilege\",\"admin.administrateur.createPrivilege.post.updatePrivilege\",\"admin.administrateur.createPrivilege.post.deletePrivilege\",\"admin.messagerie.index.post.searchMessagerie\",\"admin.messagerie.index.post.deleteMessagerie\",\"admin.notification.index.post.searchNotification\",\"admin.historique.createHistorique.post.saveHistorique\",\"admin.historique.createHistorique.post.searchHistorique\",\"admin.historique.createHistorique.post.deleteHistorique\"]');

-- --------------------------------------------------------

--
-- Structure de la table `serviceclient`
--

DROP TABLE IF EXISTS `serviceclient`;
CREATE TABLE IF NOT EXISTS `serviceclient` (
  `id_serviceclient` int(3) NOT NULL,
  `menu_serviceclient` varchar(150) DEFAULT NULL,
  `donnees_serviceclient` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `date_at_serviceclient` datetime DEFAULT NULL,
  PRIMARY KEY (`id_serviceclient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `serviceclient`
--

INSERT INTO `serviceclient` (`id_serviceclient`, `menu_serviceclient`, `donnees_serviceclient`, `date_at_serviceclient`) VALUES
(1, 'contact', '{\"menu\":\"contact\",\"localisation\":\"https:\\/\\/www.google.com\\/maps\\/embed?pb=!1m18!1m12!1m3!1d254252.49964956383!2d-4.0095404924133184!3d5.310147818908659!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xfc202aed707539d%3A0x5749a7901998d993!2saeCorporation!5e0!3m2!1sfr!2sci!4v1614171870643!5m2!1sfr!2sci\",\"details\":\"<p style=\\\"text-align: center;\\\"><strong>JANETT MANAGEMENT LTD<\\/strong><br \\/>Corniche EL Mazraa, Jaber Center 3&egrave;me &eacute;tage office n&deg;3<br \\/>BEIRUT - LEBANON<br \\/>PH: +961 (01) 306 829<\\/p>\"}', '2021-05-04 09:10:51');

-- --------------------------------------------------------

--
-- Structure de la table `useradmin`
--

DROP TABLE IF EXISTS `useradmin`;
CREATE TABLE IF NOT EXISTS `useradmin` (
  `id_useradmin` int(11) NOT NULL,
  `code_useradmin` varchar(30) DEFAULT NULL,
  `image_useradmin` varchar(150) DEFAULT NULL,
  `piece_useradmin` varchar(150) DEFAULT NULL COMMENT 'Image de CNI, PASSEPORT, ETC...',
  `numpiece_useradmin` varchar(50) DEFAULT NULL COMMENT 'Numero de la piece d''identité',
  `nom_useradmin` varchar(50) DEFAULT NULL,
  `prenoms_useradmin` varchar(100) DEFAULT NULL,
  `dateNais_useradmin` date DEFAULT NULL,
  `lieuNais_useradmin` varchar(100) DEFAULT NULL,
  `sexe_useradmin` varchar(1) DEFAULT NULL,
  `sitMatr_useradmin` varchar(30) DEFAULT NULL,
  `nbenf_useradmin` int(3) DEFAULT NULL COMMENT 'Nombre d''enfant',
  `contact_useradmin` varchar(50) DEFAULT NULL,
  `email_useradmin` varchar(100) DEFAULT NULL,
  `adresse_useradmin` varchar(100) DEFAULT NULL,
  `bp_useradmin` varchar(100) DEFAULT NULL,
  `pays_useradmin` varchar(50) DEFAULT NULL,
  `ville_useradmin` varchar(50) DEFAULT NULL,
  `quartier_useradmin` varchar(80) DEFAULT NULL,
  `login_useradmin` varchar(50) DEFAULT NULL,
  `loginC_useradmin` mediumtext,
  `mdp_useradmin` varchar(50) DEFAULT NULL,
  `mdpC_useradmin` mediumtext,
  `codePrivilege_useradmin` varchar(30) DEFAULT NULL,
  `menusForbiden_useradmin` mediumtext,
  `actionsForbiden_useradmin` mediumtext,
  `menusAuthorised_useradmin` mediumtext,
  `actionsAuthorised_useradmin` mediumtext,
  `etat_useradmin` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `useradmin`
--

INSERT INTO `useradmin` (`id_useradmin`, `code_useradmin`, `image_useradmin`, `piece_useradmin`, `numpiece_useradmin`, `nom_useradmin`, `prenoms_useradmin`, `dateNais_useradmin`, `lieuNais_useradmin`, `sexe_useradmin`, `sitMatr_useradmin`, `nbenf_useradmin`, `contact_useradmin`, `email_useradmin`, `adresse_useradmin`, `bp_useradmin`, `pays_useradmin`, `ville_useradmin`, `quartier_useradmin`, `login_useradmin`, `loginC_useradmin`, `mdp_useradmin`, `mdpC_useradmin`, `codePrivilege_useradmin`, `menusForbiden_useradmin`, `actionsForbiden_useradmin`, `menusAuthorised_useradmin`, `actionsAuthorised_useradmin`, `etat_useradmin`) VALUES
(2, '18263ADM2021X01U28J', '18263ADM2021X01U28JIMG20210515054430.png', '18263ADM2021X01U28JPIECE20210128214410.jpg', '----', 'janett', 'management', '2021-01-29', 'Abidjan', 'M', 'CÃ©libataire', 1, '0000000000', 'janettmanagmentltd@gmail.com', '', '', 'CÃ´te d\'Ivoire', 'Abidjan', 'Marcory, IBIS', 'janettmanagmentltd225', 'a8ff01c53bafc8118b90d1e829edfd0d', 'janettmanagmentltd225', 'a8ff01c53bafc8118b90d1e829edfd0d', 'PRV603f2626de5f9', NULL, NULL, NULL, NULL, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
