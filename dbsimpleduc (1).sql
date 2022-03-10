-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : jeu. 10 mars 2022 à 16:12
-- Version du serveur : 10.3.31-MariaDB-0+deb10u1
-- Version de PHP : 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `dbsimpleduc`
--

-- --------------------------------------------------------

--
-- Structure de la table `Actualite`
--

CREATE TABLE `Actualite` (
  `id` int(11) NOT NULL,
  `titre` varchar(50) NOT NULL,
  `contenu` varchar(160) NOT NULL,
  `idAuteur` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `Employe`
--

CREATE TABLE `Employe` (
  `id` int(11) NOT NULL,
  `Nom` varchar(100) NOT NULL,
  `Prenom` varchar(100) NOT NULL,
  `Date_de_naissance` date NOT NULL,
  `Telephone` text NOT NULL,
  `Mail` varchar(255) NOT NULL,
  `MDP` varchar(255) NOT NULL,
  `Adresse` varchar(255) NOT NULL,
  `Code_postal` varchar(255) NOT NULL,
  `Pays` varchar(255) NOT NULL,
  `Permis` varchar(20) NOT NULL,
  `Date_embauche` date NOT NULL,
  `Num_secu` text NOT NULL,
  `idQualification` int(20) NOT NULL,
  `Photo` varchar(255) DEFAULT NULL,
  `confirmkey` varchar(255) NOT NULL,
  `confirm` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `Employe`
--

INSERT INTO `Employe` (`id`, `Nom`, `Prenom`, `Date_de_naissance`, `Telephone`, `Mail`, `MDP`, `Adresse`, `Code_postal`, `Pays`, `Permis`, `Date_embauche`, `Num_secu`, `idQualification`, `Photo`, `confirmkey`, `confirm`) VALUES
(13, 'test', 'Employe', '2022-03-10', '4', 'test@employe.fr', '$2y$10$X4mp16sryPW6ZmoPI1IS2OEP/hZdH.oj5YArjN9kPBcjEBKnbdtjW', '16 rue d\'arras', '62123', 'France', '1', '2022-03-10', '1', 1, NULL, '56883275847526', 0),
(14, 'test', 'responsable technique', '2022-03-10', '4', 'test@ressourceshumaines.fr', '$2y$10$c827el7MwHlDuxfSj87SFuq5yfcgoTusgw.lnX4SqKITYzSpmrmwm', '16 rue d\'arras', '62123', 'France', '3', '2022-03-10', '1', 3, NULL, '71357759254084', 0),
(15, 'test', 'responsable technique', '2022-03-10', '4', 'test@responsabletechnique.fr', '$2y$10$I6e9tXWBYQwe05Ltt8rBU.VASUR.oMd7mEdeANLcJgVIpqpfqK/32', '16 rue d\'arras', '62123', '4', '4', '2022-03-10', '4', 4, NULL, '08650941184385', 0),
(16, 'test', 'direction', '2022-03-10', '4', 'test@direction.fr', '$2y$10$bibFfZrZeCFlOFxlFJA6s.UiAnVF9RIal/uZew5a8S5ZphdajNVKO', '16 rue d\'arras', '62123', '21', '5', '2022-03-10', '1', 5, NULL, '41510763700801', 0),
(18, 'test', 'test', '2022-03-10', '4', 'test@comptable.fr', '$2y$10$WWFUK.Vwt1OHsBKK7/HLS.6oOAky6DE5cU4.KSRSs4jqskDD8wTBm', '16 rue d\'arras', '62123', 'France', '2', '2022-03-10', '4', 2, NULL, '42076449202375', 0);

-- --------------------------------------------------------

--
-- Structure de la table `Qualification`
--

CREATE TABLE `Qualification` (
  `id` int(11) NOT NULL,
  `Type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `Qualification`
--

INSERT INTO `Qualification` (`id`, `Type`) VALUES
(1, 'Base'),
(2, 'Comptable'),
(5, 'Directeur'),
(4, 'Responsable Technique'),
(3, 'Ressource Humaine');

-- --------------------------------------------------------

--
-- Structure de la table `Taux`
--

CREATE TABLE `Taux` (
  `Type` varchar(255) NOT NULL,
  `taux_salaire` float NOT NULL,
  `taux_complementaire_sante_IDD` float NOT NULL,
  `taux_complementaire_sante` float NOT NULL,
  `taux_securite_sociale_plafonne` float NOT NULL,
  `taux_securite_sociale_deplafonne` float NOT NULL,
  `taux_complementaire` float NOT NULL,
  `taux_CSG` float NOT NULL,
  `taux_CSG_non_deductible` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `Taux`
--

INSERT INTO `Taux` (`Type`, `taux_salaire`, `taux_complementaire_sante_IDD`, `taux_complementaire_sante`, `taux_securite_sociale_plafonne`, `taux_securite_sociale_deplafonne`, `taux_complementaire`, `taux_CSG`, `taux_CSG_non_deductible`) VALUES
('Base', 10.25, 0.592, 0.36, 6.9, 0.4, 4.01, 6.8, 2.9),
('Comptable', 0, 0, 0, 0, 0, 0, 0, 0),
('Directeur', 0, 0, 0, 0, 0, 0, 0, 0),
('Responsable Technique', 0, 0, 0, 0, 0, 0, 0, 0),
('Ressource Humaine', 0, 0, 0, 0, 0, 0, 0, 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Actualite`
--
ALTER TABLE `Actualite`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idAuteur` (`idAuteur`);

--
-- Index pour la table `Employe`
--
ALTER TABLE `Employe`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Mail` (`Mail`),
  ADD KEY `idQualification` (`idQualification`) USING BTREE;

--
-- Index pour la table `Qualification`
--
ALTER TABLE `Qualification`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Type` (`Type`);

--
-- Index pour la table `Taux`
--
ALTER TABLE `Taux`
  ADD PRIMARY KEY (`Type`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Actualite`
--
ALTER TABLE `Actualite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `Employe`
--
ALTER TABLE `Employe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `Qualification`
--
ALTER TABLE `Qualification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Actualite`
--
ALTER TABLE `Actualite`
  ADD CONSTRAINT `Actualite_ibfk_1` FOREIGN KEY (`idAuteur`) REFERENCES `Employe` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `Employe`
--
ALTER TABLE `Employe`
  ADD CONSTRAINT `Employe_ibfk_1` FOREIGN KEY (`idQualification`) REFERENCES `Qualification` (`id`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `Qualification`
--
ALTER TABLE `Qualification`
  ADD CONSTRAINT `Qualification_ibfk_1` FOREIGN KEY (`Type`) REFERENCES `Taux` (`Type`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
