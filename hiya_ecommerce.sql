-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 21 nov. 2023 à 20:00
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `hiya_ecommerce`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `ID` int(10) NOT NULL,
  `Nom` varchar(30) NOT NULL,
  `Description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`ID`, `Nom`, `Description`) VALUES
(1, 'Bracelet', ' des bracelets'),
(2, 'Collier', ' des colliers'),
(3, 'Chaine téléphone', 'des chaines de téléphone');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id` int(10) NOT NULL,
  `Produit` int(10) NOT NULL,
  `Quantité` int(10) NOT NULL,
  `Panier` int(10) NOT NULL,
  `Total` float NOT NULL,
  `Date_création` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id`, `Produit`, `Quantité`, `Panier`, `Total`, `Date_création`) VALUES
(1, 1, 1, 1, 5, '2023-06-14'),
(2, 1, 1, 2, 5, '2023-06-14'),
(3, 3, 2, 2, 24, '2023-06-14'),
(4, 7, 3, 2, 18, '2023-06-14'),
(5, 2, 10, 3, 140, '2023-06-14'),
(6, 6, 1, 3, 10, '2023-06-14'),
(7, 1, 2, 4, 10, '2023-06-15'),
(8, 2, 1, 4, 14, '2023-06-15'),
(9, 1, 5, 5, 25, '2023-06-15'),
(10, 1, 10, 5, 50, '2023-06-15'),
(11, 2, 2, 6, 28, '2023-11-21'),
(12, 3, 5, 6, 60, '2023-11-21'),
(13, 5, 3, 6, 24, '2023-11-21');

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE `panier` (
  `ID` int(10) NOT NULL,
  `Visiteur` int(10) NOT NULL,
  `Total` float NOT NULL,
  `Etat` varchar(30) NOT NULL DEFAULT 'En cours',
  `Date_création` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `panier`
--

INSERT INTO `panier` (`ID`, `Visiteur`, `Total`, `Etat`, `Date_création`) VALUES
(1, 4, 5, 'Reçu', '2023-06-14'),
(2, 3, 47, 'En livraison', '2023-06-14'),
(3, 2, 150, 'Reçu', '2023-06-14'),
(4, 3, 24, 'En cours', '2023-06-15'),
(5, 3, 75, 'En cours', '2023-06-15'),
(6, 7, 112, 'En cours', '2023-11-21');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `ID` int(10) NOT NULL,
  `Image` varchar(20) NOT NULL,
  `Nom` varchar(20) NOT NULL,
  `Prix` float NOT NULL,
  `Description` text NOT NULL,
  `Catégorie` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`ID`, `Image`, `Nom`, `Prix`, `Description`, `Catégorie`) VALUES
(1, '1.jpg', 'Sunshine', 5, '  bracelet ', 'Bracelet'),
(2, '6.jpg', 'Turquoise', 14, 'Collier avec une petite perle Turquoise 💙qui est considérée comme une pierre qui favorise l’harmonie du corps et de l’esprit', 'Collier'),
(3, '7.jpg', 'Cerise', 12, 'Collier', 'Collier'),
(4, '5.jpg', 'Pack bracelets', 6, 'Pack de deux bracelets', 'Bracelet'),
(5, 'chaine1.png', 'Chaîne ', 8, '  Chaîne téléphone personnalisée ', 'Chaine tél'),
(6, '2.jpg', 'Fleure', 10, 'colier', 'Collier'),
(8, '4.jpg', 'Collier', 12, 'collier turquoise', 'Bracelet');

-- --------------------------------------------------------

--
-- Structure de la table `stock`
--

CREATE TABLE `stock` (
  `ID` int(10) NOT NULL,
  `Produit` int(10) NOT NULL,
  `Quantité` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `stock`
--

INSERT INTO `stock` (`ID`, `Produit`, `Quantité`) VALUES
(1, 1, 5),
(2, 2, 10),
(3, 3, 2),
(4, 4, 4),
(5, 5, 4),
(6, 6, 5),
(7, 7, 3),
(8, 8, 4),
(9, 9, 10);

-- --------------------------------------------------------

--
-- Structure de la table `visiteur`
--

CREATE TABLE `visiteur` (
  `ID` int(10) NOT NULL,
  `Nom` varchar(20) NOT NULL,
  `Prénom` varchar(20) NOT NULL,
  `NumTel` int(8) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Etat` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `visiteur`
--

INSERT INTO `visiteur` (`ID`, `Nom`, `Prénom`, `NumTel`, `Email`, `Password`, `Etat`) VALUES
(1, 'admin', 'admin', 87542112, 'admin@gmail.com', '123456', 1),
(2, 'user', 'user', 12365873, 'user@gmail.com', '654321', 0),
(3, 'user1', 'user1', 54521145, 'user1@gmail.com', 'azerty', 0),
(6, 'test', 'eh', 23654453, 'test@gmail.com', '123', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `visiteur`
--
ALTER TABLE `visiteur`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `panier`
--
ALTER TABLE `panier`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `stock`
--
ALTER TABLE `stock`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `visiteur`
--
ALTER TABLE `visiteur`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
