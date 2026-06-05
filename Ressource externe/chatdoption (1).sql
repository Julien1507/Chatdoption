-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 05 juin 2026 à 19:54
-- Version du serveur : 9.1.0
-- Version de PHP : 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `chatdoption`
--

-- --------------------------------------------------------

--
-- Structure de la table `chats`
--

DROP TABLE IF EXISTS `chats`;
CREATE TABLE IF NOT EXISTS `chats` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `age` int NOT NULL,
  `photo` varchar(255) NOT NULL,
  `race` varchar(100) DEFAULT NULL,
  `sexe` enum('male','femelle') NOT NULL,
  `description` text,
  `vaccine` tinyint(1) NOT NULL DEFAULT '0',
  `puce` tinyint(1) NOT NULL DEFAULT '0',
  `statut` enum('disponible','adopte') NOT NULL DEFAULT 'disponible',
  `date_arrivee` date DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `chats`
--

INSERT INTO `chats` (`id`, `nom`, `age`, `photo`, `race`, `sexe`, `description`, `vaccine`, `puce`, `statut`, `date_arrivee`, `image`) VALUES
(1, 'Khalid Khasmiri\r\n', 3, 'khalid.jpg', 'Européen', 'male', 'Commandant d\'une grande armée arabe à ses heures perdues.', 1, 1, 'disponible', '2024-01-10', 'khalid.jpg'),
(2, 'Patate', 3, 'patate.jpg', 'Européen', 'male', 'Il ne mord pas mais il vous juge.', 1, 0, 'disponible', '2024-03-05', 'patate.jpg'),
(3, 'Power', 4, 'power.jpg', 'La rue', 'femelle', 'La meilleure crapule du monde', 1, 1, 'disponible', '2024-02-18', 'power.jpg'),
(4, 'Rigby', 1, 'rigby.jpg', 'Européen', 'male', 'Aussi gentil que spécial.', 0, 0, '', '2024-04-01', 'rigby.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `demandes_adoption`
--

DROP TABLE IF EXISTS `demandes_adoption`;
CREATE TABLE IF NOT EXISTS `demandes_adoption` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_utilisateur` int NOT NULL,
  `id_chat` int NOT NULL,
  `statut` enum('en_attente','accepte','refuse') NOT NULL DEFAULT 'en_attente',
  `date_demande` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `message` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_demande` (`id_utilisateur`,`id_chat`),
  KEY `id_chat` (`id_chat`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `demandes_adoption`
--

INSERT INTO `demandes_adoption` (`id`, `id_utilisateur`, `id_chat`, `statut`, `date_demande`, `message`) VALUES
(1, 1, 3, 'en_attente', '2026-05-20 15:40:09', 'Logement:  | Propriétaire:  | Animaux autorisés:  | Extérieur:  | Enfants:  | Age enfants:  | Autres animaux:  | Temps seul:  | Travail:  | Motivation: '),
(2, 1, 1, 'accepte', '2026-05-24 23:27:57', 'Logement:  | Propriétaire:  | Animaux autorisés:  | Extérieur:  | Enfants:  | Age enfants:  | Autres animaux:  | Temps seul:  | Travail:  | Motivation: '),
(3, 1, 2, 'accepte', '2026-05-28 22:32:15', 'Logement:  | Propriétaire:  | Animaux autorisés:  | Extérieur:  | Enfants:  | Age enfants:  | Autres animaux:  | Temps seul:  | Travail:  | Motivation: '),
(4, 2, 2, 'en_attente', '2026-05-29 13:51:37', 'Logement:  | Propriétaire:  | Animaux autorisés:  | Extérieur:  | Enfants:  | Age enfants:  | Autres animaux:  | Temps seul:  | Travail:  | Motivation: '),
(5, 2, 3, 'en_attente', '2026-06-05 21:19:28', 'Logement:  | Propriétaire:  | Animaux autorisés:  | Extérieur:  | Enfants:  | Age enfants:  | Autres animaux:  | Temps seul:  | Travail:  | Motivation: ');

-- --------------------------------------------------------

--
-- Structure de la table `favoris`
--

DROP TABLE IF EXISTS `favoris`;
CREATE TABLE IF NOT EXISTS `favoris` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_utilisateur` int NOT NULL,
  `id_chat` int NOT NULL,
  `date_ajout` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_favori` (`id_utilisateur`,`id_chat`),
  KEY `id_chat` (`id_chat`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `favoris`
--

INSERT INTO `favoris` (`id`, `id_utilisateur`, `id_chat`, `date_ajout`) VALUES
(7, 2, 3, '2026-06-05 21:19:12');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `role` enum('admin','utilisateur') NOT NULL DEFAULT 'utilisateur',
  `date_inscription` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `prenom`, `email`, `mot_de_passe`, `role`, `date_inscription`) VALUES
(1, 'landrieux', 'julien', 'julien@hotmail.com', '$2y$10$5X6SlqM3cVjER9AeGQLIkeY68KA3dCGuiC.iknCcuzBdASRE0B4VC', 'admin', '2026-05-17 17:13:27'),
(2, 'admin', 'admin2', 'admin@test.com', '$2y$10$0x378kgQ/rA8HatFKd9O/uoM0v2gjVhunqVpweTr41zMddLUFt/AC', 'admin', '2026-05-27 17:06:59'),
(3, 'alice', 'dupont', 'alicedupont@gmail.com', '$2y$10$yNwqd2/WU13zNPzqmDJMlu6lNQXDrupwhpXO8y4WdVJZsLbWneCiS', 'utilisateur', '2026-05-28 13:41:09'),
(4, 'alicia', 'duponne', 'alicia@hotmail.com', '$2y$10$iAigifkWXnkBqTBLNGz7NeFRwP8cVm/R/IFkpuAfT2utPh/aHFeP.', 'utilisateur', '2026-05-28 22:25:55'),
(7, 'Marie', 'marie_dupont', 'marie.dupont@email.com', 'monmotdepasse', 'admin', '2024-01-15 10:30:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
