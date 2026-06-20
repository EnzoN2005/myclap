-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mar. 27 mai 2025 à 10:03
-- Version du serveur : 8.0.42-0ubuntu0.24.04.1
-- Version de PHP : 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `tinyFB`
--

-- --------------------------------------------------------

--
-- Structure de la table `publications`
--

CREATE TABLE `publications` (
  `id` int NOT NULL COMMENT 'clé primaire, identifiant numérique auto incrémenté',
  `idAuteur` int NOT NULL COMMENT 'id de l''auteur de la publication',
  `idDestinataire` int DEFAULT NULL COMMENT 'id de la personne destinataire de la publication (éventuellement NULL)',
  `contenu` text COLLATE utf8mb4_general_ci NOT NULL COMMENT 'texte de la publication'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `suivis`
--

CREATE TABLE `suivis` (
  `id` int NOT NULL COMMENT 'clé primaire, identifiant numérique auto incrémenté',
  `idSuiveur` int NOT NULL COMMENT 'id de la personne qui suit',
  `idSuivi` int NOT NULL COMMENT 'id de la personne qui est suivie'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL COMMENT 'clé primaire, identifiant numérique auto incrémenté',
  `pseudo` varchar(50) COLLATE utf8mb4_general_ci NOT NULL COMMENT 'pseudo',
  `passe` varchar(50) COLLATE utf8mb4_general_ci NOT NULL COMMENT 'mot de passe',
  `admin` int NOT NULL DEFAULT '0' COMMENT 'indique si l''utilisateur est un administrateur	',
  `couleur` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'black' COMMENT 'indique la couleur préférée de l''utilisateur, en anglais'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `pseudo`, `passe`, `admin`, `couleur`) VALUES
(1, 'tom', 'tom', 1, 'green'),
(2, 'isa', 'bdd', 0, 'orange');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `publications`
--
ALTER TABLE `publications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idAuteur` (`idAuteur`),
  ADD KEY `idDestinataire` (`idDestinataire`);

--
-- Index pour la table `suivis`
--
ALTER TABLE `suivis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idSuiveur` (`idSuiveur`),
  ADD KEY `idSuivi` (`idSuivi`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `publications`
--
ALTER TABLE `publications`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT 'clé primaire, identifiant numérique auto incrémenté';

--
-- AUTO_INCREMENT pour la table `suivis`
--
ALTER TABLE `suivis`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT 'clé primaire, identifiant numérique auto incrémenté';

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT 'clé primaire, identifiant numérique auto incrémenté', AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `publications`
--
ALTER TABLE `publications`
  ADD CONSTRAINT `publications_ibfk_1` FOREIGN KEY (`idAuteur`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `publications_ibfk_2` FOREIGN KEY (`idDestinataire`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `suivis`
--
ALTER TABLE `suivis`
  ADD CONSTRAINT `suivis_ibfk_1` FOREIGN KEY (`idSuiveur`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `suivis_ibfk_2` FOREIGN KEY (`idSuivi`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
