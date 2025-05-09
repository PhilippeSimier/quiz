-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Ven 09 Mai 2025 à 11:47
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
-- Structure de la vue `classement`
--

CREATE ALGORITHM=UNDEFINED DEFINER=`ciel`@`localhost` SQL SECURITY DEFINER VIEW `classement`  AS  select `joueurs`.`pseudo` AS `pseudo`,sum(`scores`.`score`) AS `total` from (`scores` join `joueurs`) where (`joueurs`.`id` = `scores`.`id_joueur`) group by `scores`.`id_joueur` ;

--
-- VIEW  `classement`
-- Données :  Aucune
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
