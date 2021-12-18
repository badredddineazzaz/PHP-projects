-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : sam. 18 déc. 2021 à 23:28
-- Version du serveur : 8.0.27
-- Version de PHP : 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mygym`
--

-- --------------------------------------------------------

--
-- Structure de la table `kcals`
--

CREATE TABLE `kcals` (
  `id_Kcal` int NOT NULL,
  `Kcal_Nr` int NOT NULL,
  `Kcal_lose` int NOT NULL,
  `Kcal_lose_ext` int NOT NULL,
  `id_p` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id_p` int NOT NULL,
  `nom` varchar(45) DEFAULT NULL,
  `prenom` varchar(45) DEFAULT NULL,
  `username` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL,
  `sexe` varchar(2) DEFAULT NULL,
  `age` int DEFAULT NULL,
  `poids` int DEFAULT NULL,
  `taille` int DEFAULT NULL,
  `id_Kcal` int DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_p`, `nom`, `prenom`, `username`, `email`, `password`, `sexe`, `age`, `poids`, `taille`, `id_Kcal`) VALUES
(7, 'azzaz', 'pedro', 'badraz', 'azbadr123@gmail.com', 'afaomabamo', 'M', 15, 12, 12, NULL),
(6, 'azzaz', 'badr', 'pedroaz', 'pedroaz2406@gmail.com', 'badraz', 'M', 18, 60, 179, NULL),
(9, 'badr', 'badr', 'test', 'test@test.com', 'test', 'M', 12, 120, 165, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `kcals`
--
ALTER TABLE `kcals`
  ADD PRIMARY KEY (`id_Kcal`),
  ADD KEY `id_Kcal` (`id_Kcal`),
  ADD KEY `id_p` (`id_p`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_p`),
  ADD KEY `id_p` (`id_p`) USING BTREE,
  ADD KEY `id_Kcal` (`id_Kcal`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `kcals`
--
ALTER TABLE `kcals`
  MODIFY `id_Kcal` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id_p` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
