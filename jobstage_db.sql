-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 09 sep. 2020 à 12:28
-- Version du serveur :  10.4.13-MariaDB
-- Version de PHP : 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `jobstage_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

CREATE TABLE `post` (
  `id` int(5) NOT NULL,
  `title` varchar(30) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `body` varchar(400) NOT NULL,
  `login` varchar(30) NOT NULL,
  `signaler` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`id`, `title`, `date`, `body`, `login`, `signaler`) VALUES
(1, 'Anonce 1', '2020-08-25', 'du contenu dans le body', '', 0),
(2, 'Hello', '2020-09-08', 'World', 'a', 0),
(16, 'azerty', '2020-09-09', 'uiop', 'a', 1),
(17, 'Nouveau post', '2020-09-09', 'Exemple de truite interessante pour la pêche', 'a', 0);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(10) NOT NULL,
  `password` varchar(12) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `mail` varchar(30) NOT NULL,
  `pays` varchar(30) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `nom`, `prenom`, `mail`, `pays`, `ville`, `admin`) VALUES
(1, 'a', 'a', 'a', 'a', 'a', 'ACORES, MADERE', 'a', 1),
(2, 'b', 'b', 'b', 'b', 'b', 'ACORES, MADERE', 'b', 0),
(3, 'c', 'c', 'c', 'c', 'c', 'ACORES, MADERE', 'c', 1),
(4, 'user', 'password', 'admin', 'user', 'user@user.com', 'jamaique', 'kingston', 1),
(5, 'z', 'z', 'z', 'z', 'z', 'ACORES, MADERE', 'z', 0),
(7, 'Jean', 'Michel', 'Jean', 'Michel', 'Sarcasme', 'NOUVELLE-CALEDONIE', 'Nouméa', 0),
(8, 'f', 'f', 'f', 'f', 'f@f.com', 'CANARIES (ILES)', 'f', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
