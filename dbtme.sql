-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 30 avr. 2018 à 17:00
-- Version du serveur :  5.7.17
-- Version de PHP :  7.1.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `dbtme`
--

-- --------------------------------------------------------

--
-- Structure de la table `adress`
--

CREATE TABLE `adress` (
  `adr_id` int(11) NOT NULL,
  `adr_libelle` char(50) DEFAULT NULL,
  `adr_ligne1` char(25) DEFAULT NULL,
  `asr_ligne2` char(25) DEFAULT NULL,
  `adr_PC` int(11) DEFAULT NULL,
  `adr_city_lib` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `adress`
--

INSERT INTO `adress` (`adr_id`, `adr_libelle`, `adr_ligne1`, `asr_ligne2`, `adr_PC`, `adr_city_lib`) VALUES
(1, 'Rouen', '63 rue moise', NULL, 76000, 'ROUEN'),
(2, 'Petit-canal', 'Maisoncelle', NULL, 97131, 'PETIT-CANAL');

-- --------------------------------------------------------

--
-- Structure de la table `assign`
--

CREATE TABLE `assign` (
  `assign_start_date` date DEFAULT NULL,
  `assign_end_date` date DEFAULT NULL,
  `id_vehicule` int(11) NOT NULL,
  `drv_id` int(11) NOT NULL,
  `usr_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `course`
--

CREATE TABLE `course` (
  `idCourse` int(11) NOT NULL,
  `dateCourse` date DEFAULT NULL,
  `drv_id` int(11) DEFAULT NULL,
  `usr_id` int(11) NOT NULL,
  `usr_id_User` int(11) NOT NULL,
  `adr_id` int(11) NOT NULL,
  `adr_id_Adress` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `driver`
--

CREATE TABLE `driver` (
  `drv_id` int(11) NOT NULL,
  `drv_hiring_date` date DEFAULT NULL,
  `drv_licence_date` date DEFAULT NULL,
  `usr_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `usedby`
--

CREATE TABLE `usedby` (
  `is_billing_adress` tinyint(1) DEFAULT NULL,
  `adr_id` int(11) NOT NULL,
  `usr_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `usedby`
--

INSERT INTO `usedby` (`is_billing_adress`, `adr_id`, `usr_id`) VALUES
(1, 1, 1),
(0, 2, 1);

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
  `usr_password` char(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`usr_id`, `usr_name`, `usr_firstname`, `usr_birthdate`, `usr_phone`, `usr_email`, `usr_password`) VALUES
(1, 'Mercan', 'Brandon', '1997-02-22', '0768006602', 'mercan.brandon@outlook.fr', '22021997'),
(2, 'Louison', 'Laurence', '1997-10-05', '0690193646', 'missmwa971@gmail.com', '123456'),
(33, NULL, NULL, NULL, NULL, NULL, NULL);

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
-- Index pour la table `adress`
--
ALTER TABLE `adress`
  ADD PRIMARY KEY (`adr_id`);

--
-- Index pour la table `assign`
--
ALTER TABLE `assign`
  ADD PRIMARY KEY (`id_vehicule`,`drv_id`,`usr_id`),
  ADD KEY `FK_assign_drv_id` (`drv_id`),
  ADD KEY `FK_assign_usr_id` (`usr_id`);

--
-- Index pour la table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`idCourse`),
  ADD KEY `FK_Course_drv_id` (`drv_id`),
  ADD KEY `FK_Course_usr_id` (`usr_id`),
  ADD KEY `FK_Course_usr_id_User` (`usr_id_User`),
  ADD KEY `FK_Course_adr_id` (`adr_id`),
  ADD KEY `FK_Course_adr_id_Adress` (`adr_id_Adress`);

--
-- Index pour la table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`drv_id`,`usr_id`),
  ADD KEY `FK_Driver_usr_id` (`usr_id`);

--
-- Index pour la table `usedby`
--
ALTER TABLE `usedby`
  ADD PRIMARY KEY (`adr_id`,`usr_id`),
  ADD KEY `FK_usedBy_usr_id` (`usr_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`usr_id`),
  ADD KEY `usr_email` (`usr_email`);

--
-- Index pour la table `vehicule`
--
ALTER TABLE `vehicule`
  ADD PRIMARY KEY (`id_vehicule`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `adress`
--
ALTER TABLE `adress`
  MODIFY `adr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `course`
--
ALTER TABLE `course`
  MODIFY `idCourse` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `driver`
--
ALTER TABLE `driver`
  MODIFY `drv_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `usr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT pour la table `vehicule`
--
ALTER TABLE `vehicule`
  MODIFY `id_vehicule` int(11) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `assign`
--
ALTER TABLE `assign`
  ADD CONSTRAINT `FK_assign_drv_id` FOREIGN KEY (`drv_id`) REFERENCES `driver` (`drv_id`),
  ADD CONSTRAINT `FK_assign_id_vehicule` FOREIGN KEY (`id_vehicule`) REFERENCES `vehicule` (`id_vehicule`),
  ADD CONSTRAINT `FK_assign_usr_id` FOREIGN KEY (`usr_id`) REFERENCES `user` (`usr_id`);

--
-- Contraintes pour la table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `FK_Course_adr_id` FOREIGN KEY (`adr_id`) REFERENCES `adress` (`adr_id`),
  ADD CONSTRAINT `FK_Course_adr_id_Adress` FOREIGN KEY (`adr_id_Adress`) REFERENCES `adress` (`adr_id`),
  ADD CONSTRAINT `FK_Course_drv_id` FOREIGN KEY (`drv_id`) REFERENCES `driver` (`drv_id`),
  ADD CONSTRAINT `FK_Course_usr_id` FOREIGN KEY (`usr_id`) REFERENCES `user` (`usr_id`),
  ADD CONSTRAINT `FK_Course_usr_id_User` FOREIGN KEY (`usr_id_User`) REFERENCES `user` (`usr_id`);

--
-- Contraintes pour la table `driver`
--
ALTER TABLE `driver`
  ADD CONSTRAINT `FK_Driver_usr_id` FOREIGN KEY (`usr_id`) REFERENCES `user` (`usr_id`);

--
-- Contraintes pour la table `usedby`
--
ALTER TABLE `usedby`
  ADD CONSTRAINT `FK_usedBy_adr_id` FOREIGN KEY (`adr_id`) REFERENCES `adress` (`adr_id`),
  ADD CONSTRAINT `FK_usedBy_usr_id` FOREIGN KEY (`usr_id`) REFERENCES `user` (`usr_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
