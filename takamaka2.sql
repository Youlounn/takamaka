-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 09 Janvier 2018 à 16:58
-- Version du serveur :  5.6.21
-- Version de PHP :  5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `takamaka2`
--

-- --------------------------------------------------------

--
-- Structure de la table `campagne`
--

CREATE TABLE IF NOT EXISTS `campagne` (
`id` int(11) NOT NULL,
  `id_message` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `adrExp` varchar(50) NOT NULL,
  `adrRep` varchar(50) NOT NULL,
  `titre` varchar(50) NOT NULL,
  `type` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `campagne`
--

INSERT INTO `campagne` (`id`, `id_message`, `id_user`, `nom`, `date`, `adrExp`, `adrRep`, `titre`, `type`) VALUES
(7, 11, 1, 'Campagne number one', '2017-11-22', 'mahamadsylla5@gmail.com', 'replay@reply.com', 'Sensibilisation', 1),
(8, 9, 1, 'Campagne  promotion', '2017-11-30', 'exp@exp/op', 'replay@reply.com', 'A ne pas manquer', 1);

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
`id` int(11) NOT NULL,
  `id_mailing` int(11) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `champ1` varchar(256) DEFAULT NULL,
  `champ2` varchar(256) DEFAULT NULL,
  `champ3` varchar(256) DEFAULT NULL,
  `champ4` varchar(256) DEFAULT NULL,
  `champ5` varchar(256) DEFAULT NULL,
  `champ6` varchar(256) DEFAULT NULL,
  `champ7` varchar(256) DEFAULT NULL,
  `champ8` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `corbeillecampagne`
--

CREATE TABLE IF NOT EXISTS `corbeillecampagne` (
`id` int(11) NOT NULL,
  `id_message` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `adrExp` varchar(50) NOT NULL,
  `adrRep` varchar(50) NOT NULL,
  `titre` varchar(50) NOT NULL,
  `type` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `corbeillecampagne`
--

INSERT INTO `corbeillecampagne` (`id`, `id_message`, `id_user`, `nom`, `date`, `adrExp`, `adrRep`, `titre`, `type`) VALUES
(4, 1, 1, 'nom de la campagne', '2017-11-01', 'maha@gn.com', 'reply@reply.rog', 'Titre de la campgne', 1),
(5, 2, 1, 'nom suivant', '2017-11-08', 'repppppn@fghjk.com', 're1@ty1.com', 'Titre inconnu', 1),
(9, 9, 1, 'finition', '2017-11-23', 'mahamadsylla5@gmail.com', 'reponse@reply.com', 'finition', 1),
(10, 9, 1, 'c&', '2017-12-17', 'mahamadsylla5@gmail.com', 'm@fg.com', 'four', 1);

-- --------------------------------------------------------

--
-- Structure de la table `corbeillemessage`
--

CREATE TABLE IF NOT EXISTS `corbeillemessage` (
`id` int(11) NOT NULL,
  `type` tinyint(1) NOT NULL,
  `contenu` varchar(255) DEFAULT NULL,
  `dateCreation` date DEFAULT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `corbeillemessage`
--

INSERT INTO `corbeillemessage` (`id`, `type`, `contenu`, `dateCreation`, `id_user`) VALUES
(6, 1, NULL, NULL, 0),
(7, 0, NULL, NULL, 0),
(8, 0, NULL, NULL, 0),
(9, 1, NULL, NULL, 0),
(10, 1, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Structure de la table `mailing`
--

CREATE TABLE IF NOT EXISTS `mailing` (
`id` int(11) NOT NULL,
  `id_campagne` int(11) NOT NULL,
  `champ1` varchar(256) DEFAULT NULL,
  `champ2` varchar(256) DEFAULT NULL,
  `champ3` varchar(256) DEFAULT NULL,
  `champ4` varchar(256) DEFAULT NULL,
  `champ5` varchar(256) DEFAULT NULL,
  `champ6` varchar(256) DEFAULT NULL,
  `champ7` varchar(256) DEFAULT NULL,
  `champ8` varchar(256) DEFAULT NULL,
  `type` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
`id` int(11) NOT NULL,
  `type` tinyint(1) NOT NULL,
  `contenu` varchar(255) DEFAULT NULL,
  `dateCreation` date DEFAULT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `message`
--

INSERT INTO `message` (`id`, `type`, `contenu`, `dateCreation`, `id_user`) VALUES
(1, 0, 'Hello how are', '2018-01-01', 0),
(5, 1, '                       are you fine Yes and You?                    ', '2018-01-09', 0),
(9, 1, 'salam', NULL, 0),
(11, 1, '[u]hohohhoooo [/u][i]Aloii[/i]', NULL, 0),
(12, 0, '[b]Allo [/b]tout le monde comment va?', NULL, 0);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
`id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mdp` varchar(30) CHARACTER SET utf8 NOT NULL,
  `type` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `email`, `mdp`, `type`) VALUES
(1, 'Ali', 'camara', 'man@gn.com', '123456', 1),
(2, 'Assa', 'Dior', 'uiop@vb.com', '7c4a8d09ca3762af61e59520943dc2', 2),
(6, 'wague', 'Mamadou', 'mahamadsylla5@gmail.com', '123456', 1),
(7, 'DIOP', 'Oumar', 'oumar.diop@gmail.com', 'sylla1234', 2),
(8, 'Sall', 'Mouhamadou', 'sallsaidoudev@gmail.com', '7c4a8d09ca3762af61e59520943dc2', 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `campagne`
--
ALTER TABLE `campagne`
 ADD PRIMARY KEY (`id`), ADD KEY `id_message` (`id_message`), ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
 ADD PRIMARY KEY (`id`), ADD KEY `id_mailing` (`id_mailing`);

--
-- Index pour la table `corbeillecampagne`
--
ALTER TABLE `corbeillecampagne`
 ADD PRIMARY KEY (`id`), ADD KEY `id_message` (`id_message`), ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `corbeillemessage`
--
ALTER TABLE `corbeillemessage`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `mailing`
--
ALTER TABLE `mailing`
 ADD PRIMARY KEY (`id`), ADD KEY `id_campagne` (`id_campagne`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `campagne`
--
ALTER TABLE `campagne`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `corbeillecampagne`
--
ALTER TABLE `corbeillecampagne`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `corbeillemessage`
--
ALTER TABLE `corbeillemessage`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `mailing`
--
ALTER TABLE `mailing`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `campagne`
--
ALTER TABLE `campagne`
ADD CONSTRAINT `campagne_ibfk_1` FOREIGN KEY (`id_message`) REFERENCES `message` (`id`),
ADD CONSTRAINT `campagne_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `contact`
--
ALTER TABLE `contact`
ADD CONSTRAINT `contact_ibfk_1` FOREIGN KEY (`id_mailing`) REFERENCES `mailing` (`id`);

--
-- Contraintes pour la table `mailing`
--
ALTER TABLE `mailing`
ADD CONSTRAINT `mailing_ibfk_1` FOREIGN KEY (`id_campagne`) REFERENCES `campagne` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
