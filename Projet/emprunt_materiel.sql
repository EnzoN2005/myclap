SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

-- Base de données : `emprunt_materiel`

-- Structure de la table `user`

CREATE TABLE `user` (
  `id` int(11) NOT NULL COMMENT 'Clé primaire auto-incrémentée',
  `nom` varchar(100) NOT NULL COMMENT 'Nom complet de l\'utilisateur',
  `role` int(11) NOT NULL DEFAULT '0' COMMENT 'Rôle : 0 = membre, 1 = admin',
  `mdp` varchar(255) NOT NULL COMMENT 'Mot de passe hashé',
  `numAppart` varchar(100) DEFAULT NULL,
  `contact` varchar(100) DEFAULT NULL COMMENT 'Email,tél ou facebook',
  `points` int(11) NOT NULL DEFAULT '0' COMMENT 'Points d experience de l\'utilisateur'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL COMMENT 'Clé primaire auto-incrémentée',
  `name` varchar(100) NOT NULL COMMENT 'Nom de la catégorie',
  `description` text DEFAULT NULL COMMENT 'Description détaillée de la catégorie'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Structure de la table `produit`

CREATE TABLE `produit` (
  `id` int(11) NOT NULL COMMENT 'Clé primaire auto-incrémentée',
  `nom` varchar(150) NOT NULL COMMENT 'Nom du produit',
  `description` text DEFAULT NULL COMMENT 'Description détaillée du produit',
  `caution` decimal(8,2) NOT NULL DEFAULT '0.00' COMMENT 'Montant de la caution en euros',
  `categorieId` int(11) NOT NULL COMMENT 'Clé étrangère vers la table categorie'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Structure de la table `photos_produit`

CREATE TABLE `photos_produit` (
  `id` int(11) NOT NULL COMMENT 'Clé primaire auto-incrémentée',
  `produitId` int(11) NOT NULL COMMENT 'Clé étrangère vers la table produit',
  `url` varchar(255) NOT NULL COMMENT 'Chemin ou URL de la photo',
  `ordre` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- Structure de la table `produit_favori`
--

CREATE TABLE `produit_favori` (
  `userId` int(11) NOT NULL COMMENT 'Clé étrangère vers la table user',
  `produitId` int(11) NOT NULL COMMENT 'Clé étrangère vers la table produit'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Structure de la table `panier`

CREATE TABLE `panier` (
  `id` int(11) NOT NULL COMMENT 'Clé primaire auto-incrémentée',
  `customerId` int(11) NOT NULL COMMENT 'Clé étrangère vers la table user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `panier_item`
--

CREATE TABLE `panier_item` (
  `id` int(11) NOT NULL COMMENT 'Clé primaire auto-incrémentée',
  `panierId` int(11) NOT NULL COMMENT 'Clé étrangère vers la table panier',
  `productId` int(11) NOT NULL COMMENT 'Clé étrangère vers la table produit',
  `itemQte` int(11) NOT NULL DEFAULT '1' COMMENT 'Quantité souhaitée',
  `dateDebutEmprunt` date NOT NULL COMMENT 'Date de début souhaitée pour l\'emprunt',
  `dateFinEmprunt` date NOT NULL COMMENT 'Date de fin souhaitée pour l\'emprunt'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `emprunt`
--

CREATE TABLE `emprunt` (
  `id` int(11) NOT NULL COMMENT 'Clé primaire auto-incrémentée',
  `user_id` int(11) NOT NULL COMMENT 'Clé étrangère vers la table user',
  `start_date` date NOT NULL COMMENT 'Date de début de l\'emprunt',
  `end_date` date NOT NULL COMMENT 'Date de fin prévue de l\'emprunt',
  `actual_return_date` date DEFAULT NULL COMMENT 'Date de retour effective',
  `status` varchar(20) NOT NULL DEFAULT 'en attente' COMMENT 'Statut : en attente, à valider, validé, annulé, en cours, fini'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `emprunt_item`
--

CREATE TABLE `emprunt_item` (
  `id` int(11) NOT NULL COMMENT 'Clé primaire auto-incrémentée',
  `emprunt_id` int(11) NOT NULL COMMENT 'Clé étrangère vers la table emprunt',
  `product_id` int(11) NOT NULL COMMENT 'Clé étrangère vers la table produit',
  `status` varchar(20) NOT NULL DEFAULT 'en attente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Index des tables
--

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `photos_produit`
--
ALTER TABLE `photos_produit`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produit_favori`
-- Clé composite : la paire (userId, produitId) est unique
--
ALTER TABLE `produit_favori`
  ADD PRIMARY KEY (`userId`, `produitId`);

--
-- Index pour la table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `panier_item`
--
ALTER TABLE `panier_item`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `emprunt`
--
ALTER TABLE `emprunt`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `emprunt_item`
--
ALTER TABLE `emprunt_item`
  ADD PRIMARY KEY (`id`);

-- --------------------------------------------------------

--
-- AUTO_INCREMENT des tables
--

ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Clé primaire auto-incrémentée', AUTO_INCREMENT=1;

ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Clé primaire auto-incrémentée', AUTO_INCREMENT=1;

ALTER TABLE `produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Clé primaire auto-incrémentée', AUTO_INCREMENT=1;

ALTER TABLE `photos_produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Clé primaire auto-incrémentée', AUTO_INCREMENT=1;

ALTER TABLE `panier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Clé primaire auto-incrémentée', AUTO_INCREMENT=1;

ALTER TABLE `panier_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Clé primaire auto-incrémentée', AUTO_INCREMENT=1;

ALTER TABLE `emprunt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Clé primaire auto-incrémentée', AUTO_INCREMENT=1;

ALTER TABLE `emprunt_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Clé primaire auto-incrémentée', AUTO_INCREMENT=1;

-- --------------------------------------------------------

--
-- Clés étrangères
--

-- produit -> categorie
ALTER TABLE `produit`
  ADD CONSTRAINT `fk_produit_categorie` FOREIGN KEY (`categorieId`) REFERENCES `categorie` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

-- photos_produit -> produit
ALTER TABLE `photos_produit`
  ADD CONSTRAINT `fk_photos_produit` FOREIGN KEY (`produitId`) REFERENCES `produit` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

-- produit_favori -> user
ALTER TABLE `produit_favori`
  ADD CONSTRAINT `fk_favori_user` FOREIGN KEY (`userId`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

-- produit_favori -> produit
ALTER TABLE `produit_favori`
  ADD CONSTRAINT `fk_favori_produit` FOREIGN KEY (`produitId`) REFERENCES `produit` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

-- panier -> user
ALTER TABLE `panier`
  ADD CONSTRAINT `fk_panier_user` FOREIGN KEY (`customerId`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

-- panier_item -> panier
ALTER TABLE `panier_item`
  ADD CONSTRAINT `fk_panier_item_panier` FOREIGN KEY (`panierId`) REFERENCES `panier` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

-- panier_item -> produit
ALTER TABLE `panier_item`
  ADD CONSTRAINT `fk_panier_item_produit` FOREIGN KEY (`productId`) REFERENCES `produit` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

-- emprunt -> user
ALTER TABLE `emprunt`
  ADD CONSTRAINT `fk_emprunt_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

-- emprunt_item -> emprunt
ALTER TABLE `emprunt_item`
  ADD CONSTRAINT `fk_emprunt_item_emprunt` FOREIGN KEY (`emprunt_id`) REFERENCES `emprunt` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

-- emprunt_item -> produit
ALTER TABLE `emprunt_item`
  ADD CONSTRAINT `fk_emprunt_item_produit` FOREIGN KEY (`product_id`) REFERENCES `produit` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;