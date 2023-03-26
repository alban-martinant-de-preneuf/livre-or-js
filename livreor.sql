-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : dim. 26 mars 2023 à 18:58
-- Version du serveur : 10.6.12-MariaDB-0ubuntu0.22.04.1
-- Version de PHP : 8.1.2-1ubuntu2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `livreor`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `id` int(11) NOT NULL,
  `commentaire` text DEFAULT NULL,
  `id_utilisateur` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `commentaire`, `id_utilisateur`, `date`) VALUES
(8, 'blablabla', 35, '2023-03-26 18:28:42'),
(9, 'je suis user !', 36, '2023-03-26 18:34:26'),
(10, 'asasasdceqc', 39, '2023-03-26 18:55:25'),
(11, 'dqcnfy,yfnd', 39, '2023-03-26 18:55:30');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `login` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`) VALUES
(34, 'alban', '$2y$10$b8sIkdoiWBIX8Bqsl2hG/egaYeK2DEDP76NLOQjwObKzFy5A9TLUm'),
(35, 'test', '$2y$10$.IVSpV9xgEJtTq6dpAPYA.YYHaoLIHA6ATXy/5hRCJnPBipfVxY5W'),
(36, 'user', '$2y$10$8aEUIxX0n2tT.RypdbA7keUFmSt0DWOhzAywiP5NUj1jELhhDP8cO'),
(37, 'util', '$2y$10$WUjQm0pDErBs.jZycL0Gn.1/Ave.DrewvF2okssQMvyC2RnnH64nu'),
(38, 'toto', '$2y$10$CnXiqc/AYpjhvmFUhVsbI.V3JxQ7S5O5bKE8d/p5BLz9UUxKgGSZ.'),
(39, 'lala', '$2y$10$BD4idHXq1gczqS0ZwLjHgu8WRGIgO7SoPfJLubELqnonHlb9LCeEe');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
