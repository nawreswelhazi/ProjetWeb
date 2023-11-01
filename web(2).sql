-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 01 nov. 2023 à 17:48
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `web`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(10) NOT NULL,
  `nom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `nom`) VALUES
(1, 'Légumes'),
(2, 'Fromages'),
(3, 'Charcuterie'),
(4, 'Huiles'),
(5, 'Vinaigre'),
(6, 'Boissons'),
(7, 'Miel'),
(8, 'Confiture'),
(9, 'Autres'),
(10, 'Fruits');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `dateNaissance` date NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `nrTelph` int(100) NOT NULL,
  `Pays` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id`, `email`, `password`, `nom`, `prenom`, `dateNaissance`, `adresse`, `photo`, `nrTelph`, `Pays`) VALUES
(1, 'Aya@gmail.com', 'aya', 'larif', 'Aya', '2013-09-10', 'gaston defferre', 'blob:http://localhost/787ab324-132a-4aca-932b-093d480d9606', 2222, 'Belgique'),
(3, 'nawreswelhazi@hotmail.com', 'Souad&@3Kaies', 'ouelhazi', 'naoures', '2009-12-06', '', '', 0, ''),
(4, 'nawres@hotmail.com', 'Souad&@3Kaies', 'ouelhazi', 'naoures', '2009-12-06', '', '', 0, ''),
(5, 'aya1@gmail.com', 'Souad&@3Kaies', 'ouelhazi', 'naoures', '2023-10-10', '', '', 0, ''),
(6, 'aya11@gmail.com', 'Souad&@3Kaies', 'ouelhazi', 'naoures', '2023-10-10', '', '', 0, ''),
(7, 'nawress@hotmail.com', 'Souad&@3Kaies', 'ouelhazi', 'naoures', '2023-10-18', '', '', 0, ''),
(8, 'ayaaa@gmail.com', 'Souad&@3Kaies', 'naoures', 'naoures', '2023-09-28', '', '', 0, ''),
(9, 'ayaaaaa@gmail.com', 'Souad&@3Kaies', 'naoures', 'naoures', '2023-09-28', '', '', 0, ''),
(10, 'ayaaaa@gmail.com', 'Souad&@3Kaies', 'naoures', 'ouelhazi', '2023-09-27', '', '', 0, ''),
(11, 'ayyya@gmail.com', 'Souad&@3Kaies', 'ouelhazi', 'naoures', '2023-10-12', '', '', 0, ''),
(12, 'ayyyya@gmail.com', 'Souad&@3Kaies', 'ouelhazi', 'naoures', '2023-10-26', '', '', 0, ''),
(13, 'aaaya@gmail.com', 'Souad&@3Kaies', 'Souad', 'ouelhazi', '2023-10-03', '', '', 0, ''),
(14, 'ayyza@gmail.com', 'Souad&@3Kaies', 'ouelhazi', 'naoures', '2023-10-18', '', '', 0, ''),
(15, 'kaiesa@gmail.com', 'Souad&@3Kaies', 'kaies', 'ouelhazi', '2023-10-11', '', '', 0, ''),
(16, 'kaiessa@gmail.com', 'Souad&@3Kaies', 'ouelhazi', 'Kaies', '2023-10-12', '', '', 0, ''),
(17, 'ayttta@gmail.com', 'Souad&@3Kaies', 'ouelhazi', 'naoures', '2023-10-19', '', '', 0, ''),
(18, 'aytttza@gmail.com', 'Souad&@3Kaies', 'ouelhazi', 'naoures', '2023-10-19', '', '', 0, ''),
(19, 'ayar@gmail.com', 'Souad&@3Kaies', 'kaies', 'naoures', '2023-10-04', '', '', 0, ''),
(20, 'ayrrra@gmail.com', 'Souad&@3Kaies', 'aaa', 'aaa', '2023-10-24', '', '', 0, ''),
(21, 'artttya@gmail.com', 'Souad&@3Kaies', 'kaies', 'ouelhazi', '2023-10-24', '', '', 0, '');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id` int(10) NOT NULL,
  `id_client` int(10) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `totalPrix` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id`, `id_client`, `date`, `totalPrix`) VALUES
(4, 1, '2023-11-01 03:22:53', 51.25),
(5, 1, '2023-11-01 03:26:40', 20),
(6, 1, '2023-11-01 05:09:29', 6),
(7, 1, '2023-11-01 05:22:24', 14),
(8, 1, '2023-11-01 05:37:18', 10),
(9, 1, '2023-11-01 05:38:39', 30),
(10, 3, '2023-11-01 06:25:50', 30);

-- --------------------------------------------------------

--
-- Structure de la table `lignecommande`
--

CREATE TABLE `lignecommande` (
  `id` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `id_commande` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `totalprix` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `lignecommande`
--

INSERT INTO `lignecommande` (`id`, `id_produit`, `id_commande`, `quantite`, `totalprix`) VALUES
(7, 5, 4, 2, 10),
(8, 6, 4, 5, 30),
(9, 12, 4, 5, 11.25),
(10, 5, 5, 4, 20),
(11, 4, 6, 2, 6),
(12, 7, 7, 7, 14),
(13, 7, 8, 5, 10),
(14, 4, 9, 10, 30),
(15, 8, 10, 10, 30);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id` int(10) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  `prix` double NOT NULL,
  `quantite` int(100) NOT NULL,
  `imageP` varchar(100) NOT NULL,
  `urlP` varchar(100) NOT NULL,
  `FirstCreat` date NOT NULL,
  `Qteunite` float NOT NULL DEFAULT 1,
  `unite` varchar(4) NOT NULL DEFAULT 'Kg',
  `categorieId` int(10) NOT NULL,
  `classement` int(11) NOT NULL DEFAULT 0 CHECK (`classement` >= 0 and `classement` <= 5),
  `code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `nom`, `description`, `prix`, `quantite`, `imageP`, `urlP`, `FirstCreat`, `Qteunite`, `unite`, `categorieId`, `classement`, `code`) VALUES
(1, 'Aubergine blanche', '', 4, 150, 'AubergineBlanche.jpg', 'AubergineBlanche', '2019-10-19', 1, 'Kg', 1, 2, 'LG000001'),
(2, 'Aubergine mauve', '', 4, 150, 'aubergineMauve.jpg', 'aubergineMauve', '2019-10-19', 1, 'Kg', 1, 3, 'LG000002'),
(3, 'Bettrave rouge', '', 3, 150, 'BettraveRouge.jpg', 'BettraveRouge', '2019-10-19', 1, 'Kg', 1, 5, 'LG000003'),
(4, 'Choux de Bruxelle', '', 3, 150, 'chouxdebruxelle.jpg', 'chouxdebruxelle', '2019-10-19', 1, 'Kg', 1, 0, 'LG000004'),
(5, 'Abricot', '', 5, 150, 'Fabricot.jpg', 'Fabricot', '2019-10-19', 1, 'Kg', 10, 0, 'FR000005'),
(6, 'Prune', '', 6, 150, 'Fprune.jpg', 'Fprune', '2019-10-19', 1, 'Kg', 10, 0, 'FR000006'),
(7, 'Patisson', '', 2, 150, 'patisson.jpg', 'patisson', '2019-10-19', 1, 'Kg', 10, 0, 'FR000007'),
(8, 'Piment Fort', '', 3, 150, 'pimentFort.jpg', 'pimentFort', '2019-10-19', 1, 'Kg', 1, 0, 'LG000008'),
(9, 'Salade de Chene', '', 2, 150, 'saladeDeChene.webp', 'saladeDeChene', '2019-10-19', 1, 'Kg', 1, 0, 'LG000009'),
(10, 'Tomate Scion', '', 4, 150, 'tomateScion.jpg', 'tomateScion', '2019-10-19', 1, 'Kg', 1, 0, 'LG000010'),
(11, 'Cerise de terre', '', 7, 150, 'FCeriseDeTerre.jpg', 'FCeriseDeTerre', '2019-10-19', 1, 'Kg', 10, 0, 'FR000011'),
(12, 'Pomme de terre', 'Variété demi-précoce, de type consommation, aux tubercules oblongs et réguliers à très réguliers, à ', 2.25, 3, 'PommeDeTerre.webp', 'PommeDeTerre', '2023-10-29', 1, 'g', 1, 4, 'LG000012'),
(13, 'Oeufs', 'OEUFS DE POULE ÉLEVÉES EN PLEIN AIR', 6, 0, 'oeuf.jpg', 'oeuf', '2023-10-30', 12, 'oeuf', 9, 3, 'AU000013');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_client` (`id_client`);

--
-- Index pour la table `lignecommande`
--
ALTER TABLE `lignecommande`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_produit` (`id_produit`),
  ADD KEY `id_commande` (`id_commande`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nouveau_code` (`code`),
  ADD KEY `fk_produit_categorie` (`categorieId`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `lignecommande`
--
ALTER TABLE `lignecommande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Contraintes pour la table `lignecommande`
--
ALTER TABLE `lignecommande`
  ADD CONSTRAINT `lignecommande_ibfk_1` FOREIGN KEY (`id_commande`) REFERENCES `commande` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `lignecommande_ibfk_2` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `fk_produit_categorie` FOREIGN KEY (`categorieId`) REFERENCES `categorie` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
