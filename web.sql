-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 29 oct. 2023 à 20:33
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
  `nrTelph` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id`, `email`, `password`, `nom`, `prenom`, `dateNaissance`, `adresse`, `photo`, `nrTelph`) VALUES
(1, 'aya@gmail.com', 'aya', 'larif', 'aya', '2013-09-10', 'gaston defferre', '', 0);

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
(12, 'Pomme de terre', 'Variété demi-précoce, de type consommation, aux tubercules oblongs et réguliers à très réguliers, à ', 2.25, 3, 'PommeDeTerre.webp', 'PommeDeTerre', '2023-10-29', 1, 'g', 1, 4, 'LG000012');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `fk_produit_categorie` FOREIGN KEY (`categorieId`) REFERENCES `categorie` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
