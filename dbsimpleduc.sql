-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mar. 19 oct. 2021 à 14:45
-- Version du serveur : 10.3.29-MariaDB-0+deb10u1
-- Version de PHP : 8.0.10

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
(3, 'oui', 'oui', '2010-01-01', '06.06.06.06.06', 'oui@oui.fr', '$2y$10$Wg.UH659XfkMbOWNh1Mxh.PQMRcN03LKuwVzWbQ4AXGPYlVSd2pOG', '8 rue oui', '62000', 'France', 'B', '2021-09-01', '0316546030', 1, NULL, '', 0),
(5, 'non', 'non', '2014-01-01', '06.06.06.06.06', 'non@non.fr', '$2y$10$DzAyRt.I5bXnCiLDIZI5S.G9wcuCMyXqpjVb/idhyGuzoBvKKKfIm', '8 rue du refus', '62000', 'nonménistan', 'B', '2021-10-01', '650616060651063', 5, NULL, '', 0),
(6, 'Raymond', 'Mehdi', '2001-02-06', '06.51.30.15.66', 'mehdi.raymond1@outlook.fr', '$2y$10$u9D7TO9.F/gJnKXDadbZ.eM9616YgYT0wBziTvXLpCKcEAPZ7TPQy', '8 rue des boss', '62000', 'France Askip', 'B', '2020-09-01', '506150410410420', 5, NULL, '95085230634999', 1),
(7, 'Le bro', 'Jérémy', '2002-07-08', '06.05.05.05.05', 'lebougyvick@gmail.com', '616c5c78c3b65', '8 rue du style', '62000', 'nigeria', 'B askip', '2021-01-01', '4561613151', 2, NULL, '14237089049114', 0),
(8, 'Le bro', 'Imrane', '0001-01-01', '06.05.05.05.04', 'mysterie62@hotmail.fr', 'OUIOUIOUI', '8 rue du style', '62000', 'Togo', 'B askip', '2021-01-01', '4561613151', 2, NULL, '76055559572210', 0),
(10, 'fsdfsd', 'fsdfsdf', '1111-01-01', '06.06.06.06.06', 'test2@test2.fr', '$2y$10$K7po2fxiuZkguYGDZhgg0.Qq6kqQOhrQzJ.6x0axKRTwPtgn9r5fy', '8 rue du oui', '62000', 'france', 'Sans Permis', '1111-01-01', '544554324', 1, NULL, '28852177920540', 0);

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
-- AUTO_INCREMENT pour la table `Employe`
--
ALTER TABLE `Employe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `Qualification`
--
ALTER TABLE `Qualification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Contraintes pour les tables déchargées
--

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
