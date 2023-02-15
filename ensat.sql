-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 19 mai 2022 à 13:41
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ensat`
--

-- --------------------------------------------------------

--
-- Structure de la table `comptes`
--

CREATE TABLE `comptes` (
  `id` int(11) NOT NULL,
  `user` varchar(30) NOT NULL,
  `pass` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `comptes`
--

INSERT INTO `comptes` (`id`, `user`, `pass`) VALUES
(56, 'yassir.idalin', '1234567890'),
(57, 'ammaar', '1234567890'),
(58, 'oussama.idalin', '1234567890'),
(65, 'ibrahim12', '1234567890'),
(75, 'Sohaib.idalin', '1234567890');

-- --------------------------------------------------------

--
-- Structure de la table `eleves`
--

CREATE TABLE `eleves` (
  `id` int(11) NOT NULL,
  `user` varchar(30) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `cne` varchar(20) NOT NULL,
  `ville` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `photo` varchar(30) DEFAULT NULL,
  `etat` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `eleves`
--

INSERT INTO `eleves` (`id`, `user`, `nom`, `prenom`, `cne`, `ville`, `email`, `tel`, `photo`, `etat`) VALUES
(56, 'yassir.idalin', 'Idalin', 'yassir', 'R130180340', 'Tanger', 'yassiridalin15@gmail.com', '0677442466', '56.png', 1),
(57, 'ammaar', 'ammar', 'idnasser', 'KB542987', 'Casablanca', 'ammar.idnasser@gmail.com', '0763845629', '57.png', 0),
(58, 'oussama.idalin', 'oussama', 'idalin', 'KB431289', 'Fes', 'oussamaidalin@gmail.com', '0672948443', '58.png', 0),
(65, 'ibrahim12', 'ibrahim', 'ibrahim', 'KB672901', 'Tanger', 'ibrahim@gmail.com', '0637009812', '65.png', 1),
(75, 'Sohaib.idalin', 'Idalin', 'Sohaib', 'KB196825', 'Tanger', 'sohaibidalin2017@gmail.com', '0684317455', '75.png', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `comptes`
--
ALTER TABLE `comptes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user` (`user`);

--
-- Index pour la table `eleves`
--
ALTER TABLE `eleves`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cne` (`cne`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `user` (`user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `eleves`
--
ALTER TABLE `eleves`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
