-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 01 juil. 2023 à 21:22
-- Version du serveur :  10.4.18-MariaDB
-- Version de PHP : 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projetvillage`
--

-- --------------------------------------------------------

--
-- Structure de la table `actualite`
--

CREATE TABLE `actualite` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `actualite`
--

INSERT INTO `actualite` (`id`, `title`, `content`, `image`, `created_at`) VALUES
(32, 'Today is Tuesday again', '<p>Trying to finish my symfony project</p>', 'https://picsum.photos/id/176/500/300', '2021-05-04 13:47:37'),
(33, 'Tomorro is Wednesday', '<p>Yes tomorrow is Wednesday</p>', 'https://picsum.photos/id/159/500/300', '2021-05-04 13:47:37'),
(34, 'Titre de l\'actualité', '<p>Contenu de l\'actualité numéro</p>', 'https://picsum.photos/id/79/500/300', '2021-05-04 13:47:37'),
(35, 'Titre de l\'actualité', '<p>Contenu de l\'actualité numéro</p>', 'https://picsum.photos/id/24/500/300', '2021-05-04 13:47:37'),
(36, 'Titre de l\'actualité', '<p>Contenu de l\'actualité numéro</p>', 'https://picsum.photos/id/98/500/300', '2021-05-04 13:47:37'),
(37, 'Titre de l\'actualité', '<p>Contenu de l\'actualité numéro</p>', 'https://picsum.photos/id/21/500/300', '2021-05-04 13:47:37'),
(38, 'Titre de l\'actualité', '<p>Contenu de l\'actualité numéro</p>', 'https://picsum.photos/id/31/500/300', '2021-05-04 13:47:37'),
(39, 'Titre de l\'actualité', '<p>Contenu de l\'actualité numéro</p>', 'https://picsum.photos/id/142/500/300', '2021-05-04 13:47:37'),
(40, 'Titre de l\'actualité', '<p>Contenu de l\'actualité numéro</p>', 'https://picsum.photos/id/59/500/300', '2021-05-04 13:47:37'),
(41, 'Today is Wedneday, yeah, sports', '<p>Contenu de l\'actualité numéro</p>', 'https://picsum.photos/id/182/500/300', '2021-05-04 13:47:37'),
(44, 'Geeky girl', 'She is  becoming a geek after struggling over many sleepless night, is moving in the right direction', 'https://picsum.photos/id/91/500/300', '2021-05-04 19:32:22');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20210428131843', '2021-04-28 15:18:57', 59),
('DoctrineMigrations\\Version20210429071858', '2021-04-29 09:20:14', 81),
('DoctrineMigrations\\Version20210429123426', '2021-04-29 14:34:44', 221),
('DoctrineMigrations\\Version20210430085851', '2021-04-30 11:01:50', 194),
('DoctrineMigrations\\Version20210503063457', '2021-05-03 08:35:34', 215),
('DoctrineMigrations\\Version20210503091124', '2021-05-03 11:13:20', 74);

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

CREATE TABLE `evenement` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `evenement`
--

INSERT INTO `evenement` (`id`, `title`, `content`, `image`, `created_at`) VALUES
(11, 'Titre de l\'événement n°: 1', '<p>Contenu de l\'événement n°: 1</p>', 'https://picsum.photos/id/53/500/300', '2021-05-04 13:47:37'),
(12, 'Titre de l\'événement n°: 2', '<p>Contenu de l\'événement n°: 2</p>', 'https://picsum.photos/id/46/500/300', '2021-05-04 13:47:37'),
(13, 'Titre de l\'événement n°: 3', '<p>Contenu de l\'événement n°: 3</p>', 'https://picsum.photos/id/164/500/300', '2021-05-04 13:47:37'),
(14, 'Titre de l\'événement n°: 4', '<p>Contenu de l\'événement n°: 4</p>', 'https://picsum.photos/id/118/500/300', '2021-05-04 13:47:37'),
(15, 'Titre de l\'événement n°: 5', '<p>Contenu de l\'événement n°: 5</p>', 'https://picsum.photos/id/55/500/300', '2021-05-04 13:47:37'),
(16, 'Titre de l\'événement n°: 6', '<p>Contenu de l\'événement n°: 6</p>', 'https://picsum.photos/id/168/500/300', '2021-05-04 13:47:37'),
(17, 'Titre de l\'événement n°: 7', '<p>Contenu de l\'événement n°: 7</p>', 'https://picsum.photos/id/76/500/300', '2021-05-04 13:47:37'),
(18, 'Titre de l\'événement n°: 8', '<p>Contenu de l\'événement n°: 8</p>', 'https://picsum.photos/id/67/500/300', '2021-05-04 13:47:37'),
(19, 'Titre de l\'événement n°: 9', '<p>Contenu de l\'événement n°: 9</p>', 'https://picsum.photos/id/153/500/300', '2021-05-04 13:47:37'),
(20, 'Titre de l\'événement n°: 10', '<p>Contenu de l\'événement n°: 10</p>', 'https://picsum.photos/id/66/500/300', '2021-05-04 13:47:37');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(10, 'toto', '$2y$13$/JO64NHlYJ1Sw3ZF5gB4y.EqFhcbVd7.s/hRlpOUc6ETeL5B1Y/Xy');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `actualite`
--
ALTER TABLE `actualite`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `actualite`
--
ALTER TABLE `actualite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `evenement`
--
ALTER TABLE `evenement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
