-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 18 jan. 2021 à 13:47
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bd_projet`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id_categorie` int(11) NOT NULL,
  `nom_categorie` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `nom_categorie`) VALUES
(1, 'Agrumes'),
(2, 'Baies'),
(3, 'Fruits rouges'),
(4, 'Legume vert');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id_client` int(11) NOT NULL,
  `nom_client` varchar(30) NOT NULL,
  `prenom_client` varchar(30) NOT NULL,
  `mail_client` varchar(50) NOT NULL,
  `tel_client` int(10) NOT NULL,
  `adresse_client` varchar(50) NOT NULL,
  `quartier_client` varchar(50) NOT NULL,
  `login_client` varchar(30) NOT NULL,
  `mdp_client` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id_client`, `nom_client`, `prenom_client`, `mail_client`, `tel_client`, `adresse_client`, `quartier_client`, `login_client`, `mdp_client`) VALUES
(1, 'Rei', 'David', 'david.rei@u-psud.fr', 123456789, '10 Rue de la rue', 'Quartier', 'rei111', '111rei'),
(20, 'Hervé', 'Oui', 'mail@mail.fr', 0, '5 rue de la rue', 'ouioui', 'test', 'testtest'),
(21, 'Henri', 'Hervé', 'lemail@gmail.com', 0, '1 rue de la rue', 'Paris10', 'cestuntest', 'testtest'),
(22, 'zelda', 'Hervé', 'ouioui@oui.fr', 0, '12 rue de la rue', 'OUIOUI', 'ouicmoi', 'moimoi'),
(23, 'zfer', 'dzefr', 'defr@efrgt', 0, 'ezfregrt', 'ezrgt', 'rohlala', 'lalala'),
(24, 'Stp', 'Marche', 'sinon@tmor.fr', 0, '12 rue de la tue', 'Lacite', 'testfinal', 'onespere');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id_client` int(11) NOT NULL,
  `id_commande` int(11) NOT NULL,
  `prix_commande` float NOT NULL,
  `poids_commande` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id_client`, `id_commande`, `prix_commande`, `poids_commande`) VALUES
(1, 1, 15, 8),
(1, 40, 140.9, 67),
(1, 41, 148.4, 72),
(1, 47, 17, 10),
(22, 25, 24, 30),
(22, 26, 24, 30),
(22, 27, 24, 30),
(22, 28, 24, 30),
(22, 29, 24, 30),
(22, 30, 41, 40),
(22, 31, 41, 40),
(22, 32, 61.4, 52),
(22, 33, 95, 64),
(22, 34, 99, 69),
(23, 37, 86.6, 51),
(23, 38, 88.2, 52),
(23, 39, 88.2, 52),
(24, 43, 58, 50),
(24, 44, 0, 0),
(24, 45, 8, 5);

-- --------------------------------------------------------

--
-- Structure de la table `livraison`
--

CREATE TABLE `livraison` (
  `id_client` int(11) NOT NULL,
  `id_producteur` int(11) NOT NULL,
  `id_type` int(11) NOT NULL,
  `id_livraison` int(11) NOT NULL,
  `id_commande` int(11) NOT NULL,
  `validée` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `livraison`
--

INSERT INTO `livraison` (`id_client`, `id_producteur`, `id_type`, `id_livraison`, `id_commande`, `validée`) VALUES
(1, 1, 1, 1, 1, 1),
(1, 1, 2, 104, 2, 1),
(1, 1, 2, 105, 40, 1),
(1, 2, 2, 106, 41, 0),
(24, 1, 2, 108, 43, 1),
(24, 1, 3, 109, 45, 0);

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE `panier` (
  `id_panier` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `nom_produit` varchar(40) NOT NULL,
  `quantite` int(4) NOT NULL,
  `prix_kilo` float NOT NULL,
  `prix_total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `panier`
--

INSERT INTO `panier` (`id_panier`, `id_client`, `id_produit`, `nom_produit`, `quantite`, `prix_kilo`, `prix_total`) VALUES
(15, 22, 5, 'Banane', 30, 0.8, 24),
(16, 22, 1, 'Orange', 10, 1.7, 17),
(17, 22, 1, 'Orange', 12, 1.7, 20.4),
(18, 22, 4, 'Fraise', 12, 2.8, 33.6),
(19, 22, 5, 'Banane', 5, 0.8, 4),
(20, 23, 1, 'Orange', 30, 1.7, 51),
(21, 23, 2, 'Pomelos', 1, 1.6, 1.6),
(22, 23, 1, 'Orange', 20, 1.7, 34),
(23, 23, 2, 'Pomelos', 1, 1.6, 1.6),
(30, 24, 1, 'Orange', 10, 1.7, 17),
(32, 1, 1, 'Orange', 10, 1.7, 17);

-- --------------------------------------------------------

--
-- Structure de la table `producteur`
--

CREATE TABLE `producteur` (
  `id_producteur` int(11) NOT NULL,
  `nom_producteur` varchar(50) NOT NULL,
  `prenom_producteur` varchar(50) NOT NULL,
  `adresse_producteur` varchar(50) NOT NULL,
  `quartier_producteur` varchar(50) NOT NULL,
  `login_producteur` varchar(30) NOT NULL,
  `mdp_producteur` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `producteur`
--

INSERT INTO `producteur` (`id_producteur`, `nom_producteur`, `prenom_producteur`, `adresse_producteur`, `quartier_producteur`, `login_producteur`, `mdp_producteur`) VALUES
(1, 'Deschamps', 'Didier', '1 Rue de la rue', 'Quartier', 'cc', 'lacite'),
(2, 'Dujardin', 'Jean', '2 Rue du gazon', 'Cambrousse', 'jeandu93', 'ouioui');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id_categorie` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `id_producteur` int(11) NOT NULL,
  `nom_produit` varchar(30) NOT NULL,
  `prix_unité` float NOT NULL,
  `stock_dispo` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id_categorie`, `id_produit`, `id_producteur`, `nom_produit`, `prix_unité`, `stock_dispo`) VALUES
(1, 1, 1, 'Orange', 1.7, 50),
(1, 2, 1, 'Pomelos', 1.6, 20),
(2, 3, 2, 'physalis', 1.5, 20),
(3, 4, 1, 'Fraise', 2.8, 30),
(2, 5, 1, 'Banane', 0.8, 60),
(4, 16, 1, 'Epinard', 2, 0);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `produitequi`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `produitequi` (
`id_categorie` int(11)
,`id_produit` int(11)
,`id_producteur` int(11)
,`nom_produit` varchar(30)
,`prix_unité` float
,`stock_dispo` int(3)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `produitequivalent`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `produitequivalent` (
`id_categorie` int(11)
,`id_produit` int(11)
,`id_producteur` int(11)
,`nom_produit` varchar(30)
,`prix_unité` float
,`stock_dispo` int(3)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `produitequivalenta`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `produitequivalenta` (
`id_categorie` int(11)
,`id_produit` int(11)
,`id_producteur` int(11)
,`nom_produit` varchar(30)
,`prix_unité` float
,`stock_dispo` int(3)
);

-- --------------------------------------------------------

--
-- Structure de la table `typelivraison`
--

CREATE TABLE `typelivraison` (
  `id_type` int(11) NOT NULL,
  `nom_type` varchar(30) NOT NULL,
  `mode_transport` varchar(30) NOT NULL,
  `poids_maximal` int(11) NOT NULL,
  `nb_clients` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `typelivraison`
--

INSERT INTO `typelivraison` (`id_type`, `nom_type`, `mode_transport`, `poids_maximal`, `nb_clients`) VALUES
(1, 'Vélo', 'Vélo', 10, 1),
(2, 'Camionnette', 'Camionnette', 200, 10),
(3, 'Voiture', 'Voiture', 50, 4);

-- --------------------------------------------------------

--
-- Structure de la vue `produitequi`
--
DROP TABLE IF EXISTS `produitequi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `produitequi`  AS SELECT `produit`.`id_categorie` AS `id_categorie`, `produit`.`id_produit` AS `id_produit`, `produit`.`id_producteur` AS `id_producteur`, `produit`.`nom_produit` AS `nom_produit`, `produit`.`prix_unité` AS `prix_unité`, `produit`.`stock_dispo` AS `stock_dispo` FROM `produit` WHERE `produit`.`id_categorie` = (select `produit`.`id_categorie` from `produit` where `produit`.`nom_produit` = 'Orange') AND `produit`.`nom_produit` <> 'Orange' ;

-- --------------------------------------------------------

--
-- Structure de la vue `produitequivalent`
--
DROP TABLE IF EXISTS `produitequivalent`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `produitequivalent`  AS SELECT `produit`.`id_categorie` AS `id_categorie`, `produit`.`id_produit` AS `id_produit`, `produit`.`id_producteur` AS `id_producteur`, `produit`.`nom_produit` AS `nom_produit`, `produit`.`prix_unité` AS `prix_unité`, `produit`.`stock_dispo` AS `stock_dispo` FROM `produit` WHERE `produit`.`id_categorie` = (select `produit`.`id_categorie` from `produit` where `produit`.`nom_produit` = 'Orange') ;

-- --------------------------------------------------------

--
-- Structure de la vue `produitequivalenta`
--
DROP TABLE IF EXISTS `produitequivalenta`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `produitequivalenta`  AS SELECT `produit`.`id_categorie` AS `id_categorie`, `produit`.`id_produit` AS `id_produit`, `produit`.`id_producteur` AS `id_producteur`, `produit`.`nom_produit` AS `nom_produit`, `produit`.`prix_unité` AS `prix_unité`, `produit`.`stock_dispo` AS `stock_dispo` FROM `produit` WHERE `produit`.`id_categorie` = (select `produit`.`id_categorie` from `produit` where `produit`.`nom_produit` = 'Orange') ;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id_client`,`id_commande`),
  ADD KEY `id_commande` (`id_commande`);

--
-- Index pour la table `livraison`
--
ALTER TABLE `livraison`
  ADD PRIMARY KEY (`id_livraison`),
  ADD KEY `Livraison_Client_FK` (`id_client`),
  ADD KEY `Livraison_TypeLivraison0_FK` (`id_type`),
  ADD KEY `Livraison_producteur` (`id_producteur`);

--
-- Index pour la table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`id_panier`),
  ADD KEY `Panier_cli` (`id_client`),
  ADD KEY `Panier_prod` (`id_produit`);

--
-- Index pour la table `producteur`
--
ALTER TABLE `producteur`
  ADD PRIMARY KEY (`id_producteur`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id_produit`),
  ADD KEY `Produit_Categorie_FK` (`id_categorie`),
  ADD KEY `id_producteur` (`id_producteur`);

--
-- Index pour la table `typelivraison`
--
ALTER TABLE `typelivraison`
  ADD PRIMARY KEY (`id_type`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_categorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id_commande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT pour la table `livraison`
--
ALTER TABLE `livraison`
  MODIFY `id_livraison` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT pour la table `panier`
--
ALTER TABLE `panier`
  MODIFY `id_panier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT pour la table `producteur`
--
ALTER TABLE `producteur`
  MODIFY `id_producteur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id_produit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `typelivraison`
--
ALTER TABLE `typelivraison`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `Commande_Client_FK` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`);

--
-- Contraintes pour la table `livraison`
--
ALTER TABLE `livraison`
  ADD CONSTRAINT `Livraison_Client_FK` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`),
  ADD CONSTRAINT `Livraison_TypeLivraison0_FK` FOREIGN KEY (`id_type`) REFERENCES `typelivraison` (`id_type`),
  ADD CONSTRAINT `Livraison_producteur` FOREIGN KEY (`id_producteur`) REFERENCES `producteur` (`id_producteur`);

--
-- Contraintes pour la table `panier`
--
ALTER TABLE `panier`
  ADD CONSTRAINT `Panier_cli` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`),
  ADD CONSTRAINT `Panier_prod` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id_produit`);

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `Produit_Categorie_FK` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id_categorie`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
