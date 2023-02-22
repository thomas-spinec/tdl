-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 22 fév. 2023 à 13:31
-- Version du serveur : 10.6.11-MariaDB-0ubuntu0.22.04.1
-- Version de PHP : 8.1.2-1ubuntu2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `tdl`
--

-- --------------------------------------------------------

--
-- Structure de la table `task`
--

CREATE TABLE `task` (
  `id` int(11) NOT NULL,
  `tache` varchar(255) NOT NULL,
  `state` tinyint(1) NOT NULL,
  `dateCrea` datetime NOT NULL,
  `dateRea` datetime DEFAULT NULL,
  `id_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `task`
--

INSERT INTO `task` (`id`, `tache`, `state`, `dateCrea`, `dateRea`, `id_utilisateur`) VALUES
(26, 'Test356', 0, '2023-02-21 16:23:37', NULL, 3),
(27, 'test845654', 0, '2023-02-21 17:04:40', NULL, 3),
(31, 'Tâche ajouté par Thomas', 1, '2023-02-22 12:54:55', '2023-02-22 12:55:11', 5);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_droit` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `prenom`, `nom`, `login`, `password`, `id_droit`) VALUES
(3, 'Thomas', 'Spinec', 'Tom', '$2y$10$Xs7eZ.N7VcYda6R58m7NTes4Ck.XTcLT3ibMR1RIEHFJSr5BgQccG', '3,4,5'),
(4, 'Test1', 'Test1', 'Test1', '$2y$10$eGqi4QKOvd3pjMXb9UYs6.d7JzFBlxcqQxEB6ffwsqmtpCy8gekUu', '4,3'),
(5, 'Test2', 'Test2', 'Test2', '$2y$10$jKtWfrwa75zowrcZtOQzceI6QoTf.2owA9D.ZHeDrCej6ehnrrOey', '5,3'),
(6, 'Test3', 'Test3', 'Test3', '$2y$10$Jv2oW2HWuoNmkG47BtqnHO2p166sCCi2qgUYkh8Wr8SaOWCFLD.BG', '6,3'),
(7, 'Last', 'Test', 'LastTest', '$2y$10$03zNbGp6mqJTPyYJ8VH3cuBfdY8QPgl45s5L/uaAcSFKoVcBPSQxC', '7');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Delete` (`id_utilisateur`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `Delete` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
