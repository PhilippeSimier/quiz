-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Mer 07 Mai 2025 à 17:13
-- Version du serveur :  10.1.41-MariaDB-0+deb9u1
-- Version de PHP :  7.0.33-0+deb9u10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `Quizz`
--

-- --------------------------------------------------------

--
-- Structure de la table `joueurs`
--

CREATE TABLE `joueurs` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(15) NOT NULL,
  `mdp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `joueurs`
--

INSERT INTO `joueurs` (`id`, `pseudo`, `mdp`) VALUES
(1, 'philippe', '$2y$10$v5YGT3Xvj7h1BS8Hsvrdp.QbaD8eBOEzrqvioL3rPBXujEjpvgYWe'),
(5, 'ciel', '$2y$10$v5YGT3Xvj7h1BS8Hsvrdp.QbaD8eBOEzrqvioL3rPBXujEjpvgYWe'),
(6, 'toto', '$2y$10$bDBPIu2m2KG2t4Z3metgzuokmasXEDeQ0fdbB3jTSS.Y4y2qdQnAW');

-- --------------------------------------------------------

--
-- Structure de la table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `id_type` int(11) NOT NULL,
  `intitule` varchar(512) NOT NULL,
  `reponse` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `questions`
--

INSERT INTO `questions` (`id`, `id_type`, `intitule`, `reponse`) VALUES
(2, 10, 'Quel pays a remporté la Coupe du Monde de football en 2018 ?', 'France'),
(3, 10, 'Combien de joueurs composent une équipe de basket-ball sur le terrain en même temps (par équipe) ?', '5'),
(4, 10, 'Quel est le seul tournoi du Grand Chelem de tennis qui se joue sur gazon ?', 'Wimbledon'),
(7, 10, 'Dans quelle ville se sont déroulés les Jeux Olympiques d\'été en 2016 ?', 'Rio de Janeiro'),
(8, 10, 'Dans quelle ville se sont déroulés les Jeux Olympiques d\'été en 2021 ?', 'Tokyo'),
(9, 10, 'Quel cycliste a remporté 5 fois le Tour de France entre 1991 et 1995 ?', 'Indurain'),
(10, 11, 'Quel est le plus long fleuve du monde ?', 'Amazone'),
(11, 11, 'Quel pays possède le plus grand nombre de fuseaux horaires ?', 'France'),
(12, 11, 'Quelle est la capitale de l’Australie ?', 'Canberra'),
(13, 11, 'Quel pays a la plus grande population au monde ?', 'Inde'),
(16, 11, 'Comment s’appelle le détroit qui sépare l’Europe de l’Afrique ?', 'Gibraltar'),
(17, 11, 'Quelle ville est surnommée \"la ville aux mille minarets\" ?', 'Le Caire'),
(18, 11, 'Quelle est la capitale de la France ?', 'Paris'),
(19, 11, 'Quel est le plus grand océan du monde ?', 'Pacifique'),
(20, 11, 'Sur quel continent se trouve l\'Égypte ?', 'Afrique'),
(21, 11, 'Dans quel pays se trouve la ville de Tokyo ?', 'Japon'),
(22, 11, 'Quel est le plus haut sommet du monde ?', 'Everest'),
(23, 11, 'Quel est le désert le plus chaud du monde ?', 'Sahara'),
(26, 11, 'Quel pays a la forme d\'une botte ?', 'Italie'),
(27, 11, 'Quel fleuve traverse la ville de Paris ?', 'Seine');

-- --------------------------------------------------------

--
-- Structure de la table `scores`
--

CREATE TABLE `scores` (
  `id_type` int(11) NOT NULL,
  `id_joueur` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `horodatage` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `scores`
--

INSERT INTO `scores` (`id_type`, `id_joueur`, `score`, `horodatage`) VALUES
(11, 6, 4, '2025-05-07 16:40:08'),
(10, 6, 4, '2025-05-07 16:47:49');

-- --------------------------------------------------------

--
-- Structure de la table `type_questions`
--

CREATE TABLE `type_questions` (
  `id` int(11) NOT NULL,
  `nom_type` varchar(150) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `type_questions`
--

INSERT INTO `type_questions` (`id`, `nom_type`, `description`) VALUES
(10, 'Sports', 'Tous types de sports et compétitions'),
(11, 'Géographie', 'Pays, capitales et découvertes'),
(12, 'Histoire', 'Evènement et personnages historiques'),
(13, 'Sciences', 'Physique, chimie, biologie et plus'),
(14, 'Divertissement', 'Films, séries et jeux vidéos'),
(15, 'Culture générale', 'Questions variées sur divers sujets');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `joueurs`
--
ALTER TABLE `joueurs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_type` (`id_type`);

--
-- Index pour la table `scores`
--
ALTER TABLE `scores`
  ADD KEY `id_joueur` (`id_joueur`),
  ADD KEY `id_type` (`id_type`);

--
-- Index pour la table `type_questions`
--
ALTER TABLE `type_questions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `joueurs`
--
ALTER TABLE `joueurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT pour la table `type_questions`
--
ALTER TABLE `type_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`id_type`) REFERENCES `type_questions` (`id`);

--
-- Contraintes pour la table `scores`
--
ALTER TABLE `scores`
  ADD CONSTRAINT `scores_ibfk_1` FOREIGN KEY (`id_joueur`) REFERENCES `joueurs` (`id`),
  ADD CONSTRAINT `scores_ibfk_2` FOREIGN KEY (`id_type`) REFERENCES `type_questions` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
