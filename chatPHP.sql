-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : jeu. 25 fév. 2021 à 15:53
-- Version du serveur :  8.0.23-0ubuntu0.20.04.1
-- Version de PHP : 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `chatPHP`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id` int NOT NULL,
  `idUser` int NOT NULL,
  `objet` varchar(100) NOT NULL,
  `article` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` int NOT NULL,
  `nom` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `nom`) VALUES
(1, 'informatique'),
(2, 'Gestion'),
(3, 'Langue'),
(4, 'Communication');

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

CREATE TABLE `cours` (
  `id` int NOT NULL,
  `nom` varchar(50) NOT NULL,
  `idUser` int DEFAULT NULL,
  `idCategorie` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `cours`
--

INSERT INTO `cours` (`id`, `nom`, `idUser`, `idCategorie`) VALUES
(1, 'INFO-253|Base de PHP Web Dynamique', NULL, 1),
(2, 'LAN-200| Français Professionnel', NULL, 3),
(3, 'Info-200| Base de données Relationnel', 24, 1),
(4, 'INFO220 | Programmation C ++', 26, 1),
(5, 'COM15 | Communication-LeaderShip', NULL, 2);

-- --------------------------------------------------------

--
-- Structure de la table `discussion`
--

CREATE TABLE `discussion` (
  `id` int NOT NULL,
  `idUserEmmeteur` int NOT NULL,
  `idUserRecepteur` int NOT NULL,
  `message` text NOT NULL,
  `visibilite` tinyint NOT NULL DEFAULT '0',
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `discussion`
--

INSERT INTO `discussion` (`id`, `idUserEmmeteur`, `idUserRecepteur`, `message`, `visibilite`, `date`) VALUES
(1, 11, 3, 'Je suis nul  anie eeee', 1, '2021-02-25 11:59:50'),
(2, 12, 3, 'Je susi avec toi', 1, '2021-02-25 11:59:50'),
(3, 13, 3, 'Mazotoa nareo', 1, '2021-02-25 12:00:33'),
(4, 11, 3, 'Mety amiok', 1, '2021-02-25 12:00:33'),
(5, 25, 3, 'La vie est belle', 1, '2021-02-25 12:01:25'),
(6, 13, 3, 'Je skuis malade', 1, '2021-02-25 12:01:25'),
(7, 3, 11, 'riajo enw', 0, '2021-02-25 14:12:33'),
(8, 3, 11, 'salamaba aby', 0, '2021-02-25 14:15:17'),
(9, 3, 25, 'Je suis malade', 0, '2021-02-25 14:40:23'),
(10, 3, 11, 'Inona ny vaovao an ndry', 0, '2021-02-25 16:33:49');

-- --------------------------------------------------------

--
-- Structure de la table `options`
--

CREATE TABLE `options` (
  `id` int NOT NULL,
  `nom` varchar(50) NOT NULL,
  `idType` int NOT NULL,
  `lien` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `options`
--

INSERT INTO `options` (`id`, `nom`, `idType`, `lien`) VALUES
(1, 'Accueil', 1, 'index.php?action=etudiant'),
(2, 'Accueil', 2, 'index.php?action=professeur'),
(3, 'Accueil', 3, 'index.php?action=administrateur'),
(4, 'Message', 1, 'index.php?action=message'),
(5, 'Message', 2, 'index.php?action=message'),
(6, 'Historique', 3, 'index.php?action=liste_message'),
(7, 'Etudiants', 3, 'index.php?action=liste_etudiant'),
(8, 'Professeurs', 3, 'index.php?action=liste_professeur'),
(9, 'About Us', 3, 'index.php?action=about'),
(10, 'Article', 1, 'index.php?action=liste_article'),
(11, 'Publier', 2, 'index.php?action=publish'),
(12, 'About Us', 1, 'index.php?action=about'),
(13, 'About Us', 2, 'index.php?action=about');

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

CREATE TABLE `type` (
  `id` int NOT NULL,
  `nom` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `type`
--

INSERT INTO `type` (`id`, `nom`) VALUES
(1, 'etudiant'),
(2, 'professeur'),
(3, 'administrateur');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `nom` char(50) NOT NULL,
  `prenom` char(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mdp` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `profile` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `idType` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `prenom`, `email`, `mdp`, `profile`, `idType`) VALUES
(1, 'RAJAONARIVONY', 'Rivo Lalaina', 'rivo2302@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'pdp/default.png', 3),
(2, 'BOTORAVONY', 'Arlème Johnson', 'rootkit7628@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'pdp/default.png', 2),
(3, 'RAJAONARIVONY', 'Rivo Lalaina', 'rivo2302@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'pdp/rivo.jpeg', 1),
(8, 'RAJERISON', 'Fabien Julio', 'fabien53@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'pdp/default.png', 3),
(11, 'RAJAONARISON', 'Rochelle', 'rochelle@esti.mg', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'pdp/default.png', 2),
(12, 'RAJAONARISON', 'Rochelle', 'rochelle@esti.mg', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'pdp/default.png', 2),
(13, 'RAJAONARISON', 'Rochelle', 'rochelle@esti.mg', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'pdp/default.png', 2),
(14, 'RAJAONARISON', 'Rochelle', 'rochelle@esti.mg', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'pdp/default.png', 2),
(15, 'RAKONTINIRINA', 'Rochelle', 'rochelle@esti.mg', 'ac1ab23d6288711be64a25bf13432baf1e60b2bd', 'pdp/default.png', 2),
(16, 'RAKONTINIRINA', 'Rochelle', 'rochelle@esti.mg', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'pdp/default.png', 2),
(22, 'RAKONTINIRINA', 'Rochelle', 'rochelle@esti.mg', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'pdp/default.png', 2),
(24, 'RAKONTINIRINA', 'Rochelle', 'rochelle@test.ng', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'pdp/default.png', 2),
(25, 'RAKOTONIRINA', 'Mendrika', 'mendrika@gmail.ocm', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', NULL, 1),
(26, 'RAJAONARIVONY', 'Rivoniaina Mioratiana', 'miora@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', NULL, 2),
(27, 'BOTORAVONY', 'Arlème Jhonsno', 'arleme.dev7@esti.mg', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', NULL, 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUser` (`idUser`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cours`
--
ALTER TABLE `cours`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUser` (`idUser`),
  ADD KEY `idCategorie` (`idCategorie`);

--
-- Index pour la table `discussion`
--
ALTER TABLE `discussion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUserEmmeteur` (`idUserEmmeteur`),
  ADD KEY `idUserRecepeteur` (`idUserRecepteur`);

--
-- Index pour la table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idType` (`idType`);

--
-- Index pour la table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idType` (`idType`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `cours`
--
ALTER TABLE `cours`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `discussion`
--
ALTER TABLE `discussion`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `options`
--
ALTER TABLE `options`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `type`
--
ALTER TABLE `type`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
