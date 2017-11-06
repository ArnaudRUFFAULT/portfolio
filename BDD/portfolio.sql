-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 30 Octobre 2017 à 11:14
-- Version du serveur :  10.1.19-MariaDB
-- Version de PHP :  7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `portfolio`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `a_id` int(11) NOT NULL,
  `a_date` date NOT NULL,
  `a_titre` varchar(60) DEFAULT NULL,
  `a_texte` mediumtext,
  `a_lien` varchar(250) DEFAULT NULL,
  `a_validation` tinyint(1) DEFAULT NULL,
  `a_user_fk` int(11) DEFAULT NULL,
  `a_categorie_fk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `article`
--

INSERT INTO `article` (`a_id`, `a_date`, `a_titre`, `a_texte`, `a_lien`, `a_validation`, `a_user_fk`, `a_categorie_fk`) VALUES
(1, '2017-10-17', 'HTML5/CSS3', 'Je sais faire du CSS HTML', NULL, 1, NULL, 1),
(2, '2013-10-17', 'Réalisation 1', 'Ceci est ma réalisation 1', '', 1, NULL, 3),
(3, '2015-10-01', 'Réalisation 2', 'Ceci est ma réalisation 2', NULL, 1, NULL, 3),
(4, '2016-10-03', 'Réalisation 3', 'Ceci est ma réalisation 3', NULL, 1, NULL, 3),
(5, '2017-02-17', 'Réalisation 4', 'Ceci est ma réalisation 4', NULL, 1, NULL, 3),
(6, '2017-10-31', 'Réalisation 5', 'Ceci est ma réalisation 5', NULL, 1, NULL, 3),
(7, '2017-10-23', 'Réalisation 6', 'Ceci est ma réalisation 6', NULL, 0, NULL, 3),
(8, '2017-10-04', 'PHP', 'Je sais faire du PHP', NULL, 1, NULL, 2),
(9, '2017-10-01', 'Trello', 'Je sais utiliser Trello', NULL, 1, NULL, 4),
(10, '0000-00-00', 'HTML5/CSS3', NULL, NULL, 1, NULL, 7),
(11, '0000-00-00', 'POO', NULL, NULL, 1, NULL, 7),
(12, '0000-00-00', 'Stage de Microbiologie Master 2', 'Université Montpellier II', NULL, 1, NULL, 6),
(13, '0000-00-00', 'Stage de Microbiologie Master 1', 'Faculté de pharmacie , Montpellier', NULL, 1, NULL, 6),
(14, '0000-00-00', 'Formation Développement WEB', 'Titre professionel du ministère de l’emploi\r\nObjectif 3W, Montferriez-sur-Lez', NULL, 1, NULL, 5),
(15, '0000-00-00', 'Master Biologie Santé, acquis', 'Université Montpellier II', NULL, 1, NULL, 5);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `c_id` int(11) NOT NULL,
  `c_libelle` varchar(60) DEFAULT NULL,
  `c_description` varchar(250) DEFAULT NULL,
  `c_section_fk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`c_id`, `c_libelle`, `c_description`, `c_section_fk`) VALUES
(1, 'Intégration / Développement Front-End ', 'Description Integration', 2),
(2, ' Développement Back-End ', 'Description Back-end', 2),
(3, 'none', NULL, 3),
(4, 'Outils Collaboratifs', 'liste des outils colliaboratif', 2),
(5, 'Formations', NULL, 4),
(6, 'Experiences', NULL, 4),
(7, 'Compétences', NULL, 4);

-- --------------------------------------------------------

--
-- Structure de la table `droit`
--

CREATE TABLE `droit` (
  `d_id` int(11) NOT NULL,
  `d_libelle` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `droit`
--

INSERT INTO `droit` (`d_id`, `d_libelle`) VALUES
(1, 'ajouterService'),
(2, 'modifierService'),
(3, 'supprimerService'),
(4, 'ajouterRealisation'),
(5, 'modifierRealisation'),
(6, 'supprimerRealisation'),
(7, 'modifierCoordonnes'),
(8, 'modifierNetwork'),
(9, 'ajouterUser'),
(10, 'modifierUser'),
(11, 'supprimerUser'),
(12, 'soumettreArticle'),
(13, 'gererSonProfil');

-- --------------------------------------------------------

--
-- Structure de la table `grade`
--

CREATE TABLE `grade` (
  `g_id` int(11) NOT NULL,
  `g_libelle` char(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `grade`
--

INSERT INTO `grade` (`g_id`, `g_libelle`) VALUES
(1, 'administrateur'),
(2, 'référenceur'),
(3, 'contributeur'),
(4, 'abonné');

-- --------------------------------------------------------

--
-- Structure de la table `g_peut_d`
--

CREATE TABLE `g_peut_d` (
  `g_d_droit_fk` int(11) NOT NULL,
  `g_d_grade_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `g_peut_d`
--

INSERT INTO `g_peut_d` (`g_d_droit_fk`, `g_d_grade_fk`) VALUES
(1, 1),
(2, 1),
(2, 2),
(3, 1),
(4, 1),
(5, 1),
(5, 2),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(12, 2),
(12, 3),
(13, 1),
(13, 2),
(13, 3),
(13, 4);

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

CREATE TABLE `image` (
  `i_id` int(11) NOT NULL,
  `i_path` varchar(250) DEFAULT NULL,
  `i_article_fk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `m_id` int(11) NOT NULL,
  `m_nom` varchar(60) DEFAULT NULL,
  `m_prenom` varchar(60) DEFAULT NULL,
  `m_mail` varchar(250) DEFAULT NULL,
  `m_telephone` int(11) DEFAULT NULL,
  `m_texte` mediumtext,
  `m_titre` varchar(60) DEFAULT NULL,
  `m_user_fk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `modification`
--

CREATE TABLE `modification` (
  `m_id` int(11) NOT NULL,
  `m_articke_fk` int(11) NOT NULL,
  `m_titre` int(11) NOT NULL,
  `m_texte` int(11) NOT NULL,
  `m_lien` varchar(250) NOT NULL,
  `m_user_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `network`
--

CREATE TABLE `network` (
  `n_id` int(11) NOT NULL,
  `n_libelle` varchar(60) DEFAULT NULL,
  `n_url` varchar(250) DEFAULT NULL,
  `n_logo` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `network`
--

INSERT INTO `network` (`n_id`, `n_libelle`, `n_url`, `n_logo`) VALUES
(1, 'linkedin', 'https://www.linkedin.com/in/arnaud-ruffault/', NULL),
(2, 'twitter', 'https://twitter.com/Arnaud_RUFFAULT', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `proprietaire`
--

CREATE TABLE `proprietaire` (
  `p_id` int(11) NOT NULL,
  `nom` varchar(60) DEFAULT NULL,
  `prenom` varchar(60) DEFAULT NULL,
  `ville` varchar(255) DEFAULT NULL,
  `codePostal` int(11) DEFAULT NULL,
  `adresse` mediumtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `proprietaire`
--

INSERT INTO `proprietaire` (`p_id`, `nom`, `prenom`, `ville`, `codePostal`, `adresse`) VALUES
(1, 'ruffault', 'arnaud', 'montpellier', 34000, '101 avenue du Pirée, résidence le Moulin');

-- --------------------------------------------------------

--
-- Structure de la table `section`
--

CREATE TABLE `section` (
  `s_id` int(11) NOT NULL,
  `s_libelle` varchar(60) DEFAULT NULL,
  `s_texte` mediumtext,
  `s_image` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `section`
--

INSERT INTO `section` (`s_id`, `s_libelle`, `s_texte`, `s_image`) VALUES
(1, 'acceuil', 'Voici le texte de description de mon acceuil.', NULL),
(2, 'services', 'Voici le texte de description de ma section services', NULL),
(3, 'réalisation', 'Voici le texte de description de ma section réalisation', NULL),
(4, 'Curriculum Vitae', 'Ceci est la description de la section Curriculum vitae', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `u_id` int(11) NOT NULL,
  `u_nom` varchar(60) DEFAULT NULL,
  `u_prenom` varchar(60) DEFAULT NULL,
  `u_pseudo` varchar(20) DEFAULT NULL,
  `u_mail` varchar(250) DEFAULT NULL,
  `u_password` varchar(250) DEFAULT NULL,
  `u_newsletter` tinyint(1) NOT NULL,
  `u_grade_fk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`a_id`),
  ADD KEY `FK_article_u_identifiant` (`a_user_fk`),
  ADD KEY `FK_article_c_identifiant` (`a_categorie_fk`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`c_id`),
  ADD KEY `FK_categorie_s_identifiant` (`c_section_fk`);

--
-- Index pour la table `droit`
--
ALTER TABLE `droit`
  ADD PRIMARY KEY (`d_id`);

--
-- Index pour la table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`g_id`);

--
-- Index pour la table `g_peut_d`
--
ALTER TABLE `g_peut_d`
  ADD PRIMARY KEY (`g_d_droit_fk`,`g_d_grade_fk`),
  ADD KEY `FK_gradePeutDroit_g_identifiant` (`g_d_grade_fk`);

--
-- Index pour la table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`i_id`),
  ADD KEY `FK_image_a_identifiant` (`i_article_fk`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`m_id`),
  ADD KEY `FK_message_u_identifiant` (`m_user_fk`);

--
-- Index pour la table `modification`
--
ALTER TABLE `modification`
  ADD PRIMARY KEY (`m_id`),
  ADD KEY `m_user_fk` (`m_user_fk`);

--
-- Index pour la table `network`
--
ALTER TABLE `network`
  ADD PRIMARY KEY (`n_id`);

--
-- Index pour la table `proprietaire`
--
ALTER TABLE `proprietaire`
  ADD PRIMARY KEY (`p_id`);

--
-- Index pour la table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`s_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`),
  ADD KEY `FK_user_g_identifiant` (`u_grade_fk`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `droit`
--
ALTER TABLE `droit`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pour la table `grade`
--
ALTER TABLE `grade`
  MODIFY `g_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `image`
--
ALTER TABLE `image`
  MODIFY `i_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `modification`
--
ALTER TABLE `modification`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `network`
--
ALTER TABLE `network`
  MODIFY `n_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `proprietaire`
--
ALTER TABLE `proprietaire`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `section`
--
ALTER TABLE `section`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `FK_article_c_identifiant` FOREIGN KEY (`a_categorie_fk`) REFERENCES `categorie` (`c_id`),
  ADD CONSTRAINT `FK_article_u_identifiant` FOREIGN KEY (`a_user_fk`) REFERENCES `user` (`u_id`);

--
-- Contraintes pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD CONSTRAINT `FK_categorie_s_identifiant` FOREIGN KEY (`c_section_fk`) REFERENCES `section` (`s_id`);

--
-- Contraintes pour la table `g_peut_d`
--
ALTER TABLE `g_peut_d`
  ADD CONSTRAINT `FK_gradePeutDroit_d_identifiant` FOREIGN KEY (`g_d_droit_fk`) REFERENCES `droit` (`d_id`),
  ADD CONSTRAINT `FK_gradePeutDroit_g_identifiant` FOREIGN KEY (`g_d_grade_fk`) REFERENCES `grade` (`g_id`);

--
-- Contraintes pour la table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `FK_image_a_identifiant` FOREIGN KEY (`i_article_fk`) REFERENCES `article` (`a_id`);

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `FK_message_u_identifiant` FOREIGN KEY (`m_user_fk`) REFERENCES `user` (`u_id`);

--
-- Contraintes pour la table `modification`
--
ALTER TABLE `modification`
  ADD CONSTRAINT `modification_ibfk_1` FOREIGN KEY (`m_user_fk`) REFERENCES `user` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_user_g_identifiant` FOREIGN KEY (`u_grade_fk`) REFERENCES `grade` (`g_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
