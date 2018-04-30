-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 27 avr. 2018 à 15:59
-- Version du serveur :  5.7.17
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `dbtransportme`
--

-- --------------------------------------------------------

--
-- Structure de la table `adresse`
--

CREATE TABLE `adresse` (
  `id_adresse` int(11) NOT NULL,
  `usr_id` int(11) NOT NULL,
  `lib_adresse` char(50) DEFAULT NULL,
  `ligne1_adresse` char(25) DEFAULT NULL,
  `ligne2_adresse` char(25) DEFAULT NULL,
  `CP_adresse` int(11) DEFAULT NULL,
  `lib_ville` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `adresse`
--

INSERT INTO `adresse` (`id_adresse`, `usr_id`, `lib_adresse`, `ligne1_adresse`, `ligne2_adresse`, `CP_adresse`, `lib_ville`) VALUES
(1, 1, 'Rouen', '63 rue MoÃ¯se', '', 76000, 'Rouen');

-- --------------------------------------------------------

--
-- Structure de la table `attribuer`
--

CREATE TABLE `attribuer` (
  `debut_attribution` date DEFAULT NULL,
  `fin_attribution` date DEFAULT NULL,
  `id_vehicule` int(11) NOT NULL,
  `id_chauffeur` int(11) NOT NULL,
  `usr_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `chauffeur`
--

CREATE TABLE `chauffeur` (
  `id_chauffeur` int(11) NOT NULL,
  `date_embauche` char(25) DEFAULT NULL,
  `date_permis` date DEFAULT NULL,
  `usr_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `usr_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `course`
--

CREATE TABLE `course` (
  `idCourse` int(11) NOT NULL,
  `dateCourse` date DEFAULT NULL,
  `id_chauffeur` int(11) NOT NULL,
  `usr_id` int(11) NOT NULL,
  `usr_usr_id` int(11) NOT NULL,
  `id_adresse` int(11) NOT NULL,
  `id_adresse_Adresse` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `etre_facturer`
--

CREATE TABLE `etre_facturer` (
  `id_adresse` int(11) NOT NULL,
  `usr_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `habiter`
--

CREATE TABLE `habiter` (
  `id_adresse` int(11) NOT NULL,
  `usr_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `usr_id` int(11) NOT NULL,
  `usr_name` char(25) DEFAULT NULL,
  `usr_firstname` char(25) DEFAULT NULL,
  `usr_birthdate` date DEFAULT NULL,
  `usr_phone` char(25) DEFAULT NULL,
  `usr_email` char(100) DEFAULT NULL,
  `usr_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`usr_id`, `usr_name`, `usr_firstname`, `usr_birthdate`, `usr_phone`, `usr_email`, `usr_password`) VALUES
(1, 'mercan', 'brandon', '1997-02-22', '0768006602', 'mercan.brandon@outlook.fr', '22021997'),
(2, 'Louison', 'Laurence', '1997-10-05', '0647371613', 'louison.laurence@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Structure de la table `vehicule`
--

CREATE TABLE `vehicule` (
  `id_vehicule` int(11) NOT NULL,
  `immatriculation` char(25) DEFAULT NULL,
  `marque` char(25) DEFAULT NULL,
  `modele` char(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `adresse`
--
ALTER TABLE `adresse`
  ADD PRIMARY KEY (`id_adresse`);

--
-- Index pour la table `attribuer`
--
ALTER TABLE `attribuer`
  ADD PRIMARY KEY (`id_vehicule`,`id_chauffeur`,`usr_id`),
  ADD KEY `FK_attribuer_id_chauffeur` (`id_chauffeur`),
  ADD KEY `FK_attribuer_usr_id` (`usr_id`);

--
-- Index pour la table `chauffeur`
--
ALTER TABLE `chauffeur`
  ADD PRIMARY KEY (`id_chauffeur`,`usr_id`),
  ADD KEY `FK_Chauffeur_usr_id` (`usr_id`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`usr_id`);

--
-- Index pour la table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`idCourse`),
  ADD KEY `FK_Course_id_chauffeur` (`id_chauffeur`),
  ADD KEY `FK_Course_usr_id` (`usr_id`),
  ADD KEY `FK_Course_usr_usr_id` (`usr_usr_id`),
  ADD KEY `FK_Course_id_adresse` (`id_adresse`),
  ADD KEY `FK_Course_id_adresse_Adresse` (`id_adresse_Adresse`);

--
-- Index pour la table `etre_facturer`
--
ALTER TABLE `etre_facturer`
  ADD PRIMARY KEY (`id_adresse`,`usr_id`),
  ADD KEY `FK_etre_facturer_usr_id` (`usr_id`);

--
-- Index pour la table `habiter`
--
ALTER TABLE `habiter`
  ADD PRIMARY KEY (`id_adresse`,`usr_id`),
  ADD KEY `FK_habiter_usr_id` (`usr_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`usr_id`),
  ADD KEY `email_usr` (`email_usr`);

--
-- Index pour la table `vehicule`
--
ALTER TABLE `vehicule`
  ADD PRIMARY KEY (`id_vehicule`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `adresse`
--
ALTER TABLE `adresse`
  MODIFY `id_adresse` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `chauffeur`
--
ALTER TABLE `chauffeur`
  MODIFY `id_chauffeur` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `course`
--
ALTER TABLE `course`
  MODIFY `idCourse` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `usr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `vehicule`
--
ALTER TABLE `vehicule`
  MODIFY `id_vehicule` int(11) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `attribuer`
--
ALTER TABLE `attribuer`
  ADD CONSTRAINT `FK_attribuer_id_chauffeur` FOREIGN KEY (`id_chauffeur`) REFERENCES `chauffeur` (`id_chauffeur`),
  ADD CONSTRAINT `FK_attribuer_usr_id` FOREIGN KEY (`usr_id`) REFERENCES `user` (`usr_id`),
  ADD CONSTRAINT `FK_attribuer_id_vehicule` FOREIGN KEY (`id_vehicule`) REFERENCES `vehicule` (`id_vehicule`);

--
-- Contraintes pour la table `chauffeur`
--
ALTER TABLE `chauffeur`
  ADD CONSTRAINT `FK_Chauffeur_usr_id` FOREIGN KEY (`usr_id`) REFERENCES `user` (`usr_id`);

--
-- Contraintes pour la table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `FK_Client_usr_id` FOREIGN KEY (`usr_id`) REFERENCES `user` (`usr_id`);

--
-- Contraintes pour la table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `FK_Course_id_adresse` FOREIGN KEY (`id_adresse`) REFERENCES `adresse` (`id_adresse`),
  ADD CONSTRAINT `FK_Course_id_adresse_Adresse` FOREIGN KEY (`id_adresse_Adresse`) REFERENCES `adresse` (`id_adresse`),
  ADD CONSTRAINT `FK_Course_id_chauffeur` FOREIGN KEY (`id_chauffeur`) REFERENCES `chauffeur` (`id_chauffeur`),
  ADD CONSTRAINT `FK_Course_usr_id` FOREIGN KEY (`usr_id`) REFERENCES `user` (`usr_id`),
  ADD CONSTRAINT `FK_Course_usr_usr_id` FOREIGN KEY (`usr_usr_id`) REFERENCES `user` (`usr_id`);

--
-- Contraintes pour la table `etre_facturer`
--
ALTER TABLE `etre_facturer`
  ADD CONSTRAINT `FK_etre_facturer_id_adresse` FOREIGN KEY (`id_adresse`) REFERENCES `adresse` (`id_adresse`),
  ADD CONSTRAINT `FK_etre_facturer_usr_id` FOREIGN KEY (`usr_id`) REFERENCES `user` (`usr_id`);

--
-- Contraintes pour la table `habiter`
--
ALTER TABLE `habiter`
  ADD CONSTRAINT `FK_habiter_id_adresse` FOREIGN KEY (`id_adresse`) REFERENCES `adresse` (`id_adresse`),
  ADD CONSTRAINT `FK_habiter_usr_id` FOREIGN KEY (`usr_id`) REFERENCES `user` (`usr_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
