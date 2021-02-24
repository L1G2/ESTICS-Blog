-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 24 fév. 2021 à 15:28
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
-- Base de données : `ESTICS`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` int NOT NULL,
  `nom` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `cours`
--

INSERT INTO `cours` (`id`, `nom`, `idUser`, `idCategorie`) VALUES
(1, 'INFO-253|Base de PHP Web Dynamique', 17, 1),
(2, 'LAN-200| Français Professionnel', 5, 3),
(3, 'Info-200| Base de données Relationnel', 6, 1),
(4, 'INFO220 | Programmation C ++', 18, 1),
(5, 'COM15 | Communication-LeaderShip', 19, 2);

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
  `date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `discussion`
--

INSERT INTO `discussion` (`id`, `idUserEmmeteur`, `idUserRecepteur`, `message`, `visibilite`, `date`) VALUES
(3, 1, 2, 'Kaiz lesy ', 0, '2021-02-13 22:33:30'),
(4, 2, 1, 'Kaiz lty aaa !! ela lesy zay le ', 1, '2021-02-13 22:34:22'),
(5, 4, 2, 'Inona ny vaovao lty ny malaza zandry', 0, '2021-02-15 22:52:28'),
(6, 1, 2, 'Mino zah fa sala tsara elah aaaaa', 0, '2021-02-15 22:52:28'),
(7, 5, 2, 'Ao tsara elah', 0, '2021-02-15 22:55:15'),
(8, 3, 2, 'Ap tsara ve enw eeeee', 0, '2021-02-15 22:55:15'),
(9, 6, 2, 'Tara kely aaa', 1, '2021-02-15 23:53:31'),
(10, 6, 1, 'Inona lesy ny vaovao zay elah be zay le', 1, '2021-02-15 23:53:31'),
(11, 6, 2, 'Salama ve ndry any zao sa tsia', 1, '2021-02-15 23:55:42'),
(12, 6, 2, 'Et sino ça va la vie est belle', 0, '2021-02-15 23:55:42');

-- --------------------------------------------------------

--
-- Structure de la table `options`
--

CREATE TABLE `options` (
  `id` int NOT NULL,
  `nom` varchar(50) NOT NULL,
  `idType` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `options`
--

INSERT INTO `options` (`id`, `nom`, `idType`) VALUES
(1, 'message', 1),
(2, 'message', 2),
(3, 'message', 3),
(4, 'notification', 1),
(5, 'Gestion étudiant', 3),
(6, 'Gestion  professeur', 3);

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

CREATE TABLE `type` (
  `id` int NOT NULL,
  `nom` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `mdp` varchar(250) CHARACTER SET utf8mb4 NOT NULL,
  `profile` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `idType` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `prenom`, `email`, `mdp`, `profile`, `idType`) VALUES
(1, 'RAJAONARIVONY', 'Rivo Lalaina', 'rivo2302@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '', 3),
(2, 'BOTORAVONY', 'Arlème Johnson', 'rootkit7628@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '', 2),
(3, 'RAJAONARIVONY', 'Rivo Lalaina', 'rivo2302@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '', 1),
(8, 'RAJERISON', 'Fabien Julio', 'fabien53@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '', 3),
(9, 'RAKONTINIRINA', 'Fitiavaan', 'fitiavana@yahoo.mg', '229be39e04f960e46d8a64cadc8b4534e6bfc364', NULL, 1),
(10, 'RAZAKASON', 'Nirina', 'nirina@gmail.com', 'f349de69da0e32888bc7eb29d3c64225a74accda', NULL, 1),
(11, 'RAJAONARISON', 'Rochelle', 'rochelle@esti.mg', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', NULL, 2),
(12, 'RAJAONARISON', 'Rochelle', 'rochelle@esti.mg', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', NULL, 2),
(13, 'RAJAONARISON', 'Rochelle', 'rochelle@esti.mg', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', NULL, 2),
(14, 'RAJAONARISON', 'Rochelle', 'rochelle@esti.mg', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', NULL, 2),
(15, 'RAKONTINIRINA', 'Rochelle', 'rochelle@esti.mg', 'ac1ab23d6288711be64a25bf13432baf1e60b2bd', NULL, 2),
(16, 'RAKONTINIRINA', 'Rochelle', 'rochelle@esti.mg', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', NULL, 2),
(17, 'BOTORAVONY', 'Arleme', 'arleme.dev7@esti.mg', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', NULL, 2);

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `options`
--
ALTER TABLE `options`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `type`
--
ALTER TABLE `type`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
