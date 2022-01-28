-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 24 août 2021 à 18:52
-- Version du serveur :  10.4.8-MariaDB
-- Version de PHP :  7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projecto`
--

-- --------------------------------------------------------

--
-- Structure de la table `alerte`
--

CREATE TABLE `alerte` (
  `id` int(11) NOT NULL,
  `emetteur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `objet` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `heure_envoi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `statut` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `alerte`
--

INSERT INTO `alerte` (`id`, `emetteur`, `objet`, `heure_envoi`, `statut`, `id_user_id`) VALUES
(2, 'Compagne créer', '', '2021/08/16', 'non lu', 1),
(3, 'Compagne créer', 'Création de la campagne dont le nom est:', '2021/08/16', 'lu', NULL),
(4, 'Compagne créer', 'Création de la campagne dont le nom est:\'kjk\'', '2021/08/16', 'non lu', NULL),
(5, 'Compagne créer', 'Création de la campagne dont le nom est: \'gd\'', '2021/08/17', 'non lu', 1),
(6, 'Compagne créer', 'Création de la campagne dont le nom est: \'jk\'', '2021/08/17', 'non lu', NULL),
(7, 'Compagne créer', 'Création de la campagne dont le nom est: \'hyhy\'', '2021/08/18', 'non lu', NULL),
(8, 'Compagne créer', 'Création de la campagne dont le nom est: \'njnj\'', '2021/08/18', 'non lu', NULL),
(9, 'Compagne créer', 'Création de la campagne dont le nom est: \'ffffff\'', '2021/08/19', 'non lu', NULL),
(10, 'Compagne créer', 'Création de la campagne dont le nom est: \'test65\'', '2021/08/24', 'non lu', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `campagne`
--

CREATE TABLE `campagne` (
  `id` int(11) NOT NULL,
  `canal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categorie` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `planification` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `silence` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categorie_promotionnelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `titre_message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `corps_message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_user_id` int(11) DEFAULT NULL,
  `id_message_simple_id` int(11) DEFAULT NULL,
  `idd` int(11) DEFAULT NULL,
  `dest` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `campagne`
--

INSERT INTO `campagne` (`id`, `canal`, `type`, `nom`, `categorie`, `planification`, `description`, `silence`, `categorie_promotionnelle`, `label`, `titre_message`, `corps_message`, `id_user_id`, `id_message_simple_id`, `idd`, `dest`) VALUES
(1, 'sms', 'push', 'test1', 'promotionnelle', 'une fois', 'categorie test', 'silencieux', 'promotion', 'urgent', 'Francais', 'Hello World', NULL, NULL, NULL, NULL),
(42, 'sms', 'push', 'Presidentiel', 'promotionnel', 'periode', 'ceci est une campagne', 'Oui', 'prospection', 'une', 'Francais', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', NULL, NULL, NULL, NULL),
(45, 'sms', 'push', 'TEST25', 'promotionnel', 'une', '', 'Oui', 'promotionnel', 'une', 'francais', 'ehloo', NULL, NULL, NULL, NULL),
(46, 'sms', 'push', 'kjk', 'promotionnel', 'une', '', 'Oui', 'promotionnel', 'une', '', '', NULL, NULL, NULL, NULL),
(47, 'sms', 'push', 'gd', 'promotionnel', 'une', '', 'Oui', 'promotionnel', 'une', 'Francais', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', NULL, NULL, NULL, NULL),
(48, 'sms', 'push', 'jk', 'promotionnel', 'une', '', 'Oui', 'promotionnel', 'une', 'Francais', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', NULL, NULL, NULL, NULL),
(49, 'sms', 'push', 'hyhy', 'promotionnel', 'une', '', 'Oui', 'promotionnel', 'une', '', 'tgyhunj,k', NULL, NULL, NULL, NULL),
(50, 'sms', 'push', 'njnj', 'promotionnel', 'une', '', 'Oui', 'promotionnel', 'une', 'francais', 'supA', 1, NULL, NULL, NULL),
(51, 'sms', 'push', 'ffffff', 'promotionnel', 'une', '', 'Oui', 'promotionnel', 'une', 'francais', 'supA', 1, NULL, NULL, NULL),
(52, 'sms', 'push', 'test65', 'promotionnel', 'une', '', 'Oui', 'promotionnel', '', 'francais', '', 1, 20, 95263, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_connexion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url_delivery` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `canal_prefere` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alerte_statut` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `langue_prefere` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id`, `email`, `password`, `nom`, `prenom`, `tel`, `adresse`, `id_connexion`, `url_delivery`, `canal_prefere`, `alerte_statut`, `langue_prefere`) VALUES
(1, 'admin1@gmail.com', 'b8489c3d1018dc378c6f2c1bf5bd8c69b16290e2', 'Nom admin', 'Prenom admin', '212458963244', 'sale rabat', 'admin', 'fdsfsdfd', 'sms', NULL, 'francais');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `groupe` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_groupe_id` int(11) DEFAULT NULL,
  `id_user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `nom`, `telephone`, `email`, `adresse`, `groupe`, `id_groupe_id`, `id_user_id`) VALUES
(3, 'test2', '212369874521', 'test@gmail.fr', 'rabat, sale', 'Proxigroup', NULL, 1),
(7, 'test6', '212567894563', 'test11@gmail.com', 'fsdfqs', 'travail', 15, 1),
(8, 'test23', '212458963248', 'test42@gmail.com', 'fgvhbjnk', 'Proxigroup', 1, NULL),
(9, 'test25', '212458963248', 'test103@gmail.com', 'sale, rabat', 'Proxigroup', 1, 1),
(10, 'dfq', '212596302403', 'admin@gmail.com', 'qsdf', 'qfsd', NULL, 1),
(11, 'test2', '212589301489', 'admin2@gmail.com', 'rabat, sale', 'travail', 15, 1);

-- --------------------------------------------------------

--
-- Structure de la table `destinataire_camp`
--

CREATE TABLE `destinataire_camp` (
  `id` int(11) NOT NULL,
  `id_contact_id` int(11) DEFAULT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nb_dest` int(11) NOT NULL,
  `idd_campagne` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `groupe_contact`
--

CREATE TABLE `groupe_contact` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `groupe_contact`
--

INSERT INTO `groupe_contact` (`id`, `nom`, `id_user_id`) VALUES
(1, 'Proxigroup', 1),
(14, 'developpement', NULL),
(15, 'travail', NULL),
(42, 'hhhhhh', NULL),
(45, 'fffffff', 1);

-- --------------------------------------------------------

--
-- Structure de la table `label_service`
--

CREATE TABLE `label_service` (
  `id` int(11) NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `statut` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `label_service`
--

INSERT INTO `label_service` (`id`, `label`, `statut`, `id_user_id`) VALUES
(1, 'urgent', 'achevé', 1);

-- --------------------------------------------------------

--
-- Structure de la table `liste_destinataire`
--

CREATE TABLE `liste_destinataire` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nb_destinataires` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_campagne_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `liste_distribution`
--

CREATE TABLE `liste_distribution` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `abonnee` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `test` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:array)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `liste_distribution`
--

INSERT INTO `liste_distribution` (`id`, `nom`, `description`, `abonnee`, `test`) VALUES
(1, 'test1', 'le test description ', '7307406945,7307406945,7307406945 ', ''),
(9, 'test23', 'le test 3', '', 'a:2:{i:0;s:9:\"547852454\";i:1;s:4:\"5415\";}');

-- --------------------------------------------------------

--
-- Structure de la table `message_simple`
--

CREATE TABLE `message_simple` (
  `id` int(11) NOT NULL,
  `langue` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `message_simple`
--

INSERT INTO `message_simple` (`id`, `langue`, `message`, `type`, `nom`, `id_user_id`) VALUES
(17, 'francais', 'fsdfsqfdsq', 'texte/Unicode', 'n', 1),
(18, 'francais', 'fghbnj,k;', 'texte/Unicode', 'test2j', 1),
(19, 'francais', '', 'texte/Unicode', 'nqsdfqsdfq', 1),
(20, 'anglais', '', 'texte/Unicode', 'iii', 1);

-- --------------------------------------------------------

--
-- Structure de la table `message_variable`
--

CREATE TABLE `message_variable` (
  `id` int(11) NOT NULL,
  `id_user_id` int(11) DEFAULT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `langue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `num_ligne` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `message_variable`
--

INSERT INTO `message_variable` (`id`, `id_user_id`, `nom`, `langue`, `message`, `type`, `num_ligne`) VALUES
(1, 1, 'test', 'francais', '', NULL, '1');

-- --------------------------------------------------------

--
-- Structure de la table `migration_versions`
--

CREATE TABLE `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migration_versions`
--

INSERT INTO `migration_versions` (`version`, `executed_at`) VALUES
('20210728100345', '2021-07-28 10:04:04'),
('20210728141659', '2021-07-28 14:17:15'),
('20210728141829', '2021-07-28 14:18:48'),
('20210728145922', '2021-07-28 14:59:30'),
('20210728154350', '2021-07-28 15:43:56'),
('20210728154537', '2021-07-28 15:47:46'),
('20210728154739', '2021-07-28 15:47:46'),
('20210728154846', '2021-07-28 15:48:51'),
('20210728155241', '2021-07-28 15:52:45'),
('20210728155349', '2021-07-28 15:53:55'),
('20210728160013', '2021-07-28 16:00:23'),
('20210728160517', '2021-07-28 16:05:24'),
('20210728160713', '2021-07-28 16:07:22'),
('20210728161616', '2021-07-28 16:16:27'),
('20210728161751', '2021-07-28 16:17:57'),
('20210729103835', '2021-07-29 10:39:08'),
('20210729103947', '2021-07-29 10:39:55'),
('20210804144314', '2021-08-04 14:43:38'),
('20210804144407', '2021-08-04 14:44:12'),
('20210806081935', '2021-08-06 08:20:01'),
('20210806101324', '2021-08-06 10:13:40'),
('20210811093303', '2021-08-11 09:33:36'),
('20210811115032', '2021-08-11 11:50:44'),
('20210812090014', '2021-08-12 09:00:28'),
('20210812151859', '2021-08-12 15:19:13'),
('20210812164211', '2021-08-12 16:44:43'),
('20210813094302', '2021-08-13 09:43:16'),
('20210813111228', '2021-08-13 11:12:43'),
('20210816153619', '2021-08-16 15:36:36'),
('20210817115828', '2021-08-17 11:58:56'),
('20210817120116', '2021-08-17 12:01:22'),
('20210817120408', '2021-08-17 12:04:14'),
('20210818113302', '2021-08-18 11:33:18'),
('20210818114633', '2021-08-18 11:46:41'),
('20210818115545', '2021-08-18 11:55:54'),
('20210818122520', '2021-08-18 12:25:30'),
('20210818123654', '2021-08-18 12:37:02'),
('20210822214139', '2021-08-22 21:41:49'),
('20210824084632', '2021-08-24 08:46:53'),
('20210824084754', '2021-08-24 08:48:01'),
('20210824133503', '2021-08-24 13:35:10'),
('20210824142711', '2021-08-24 14:27:20'),
('20210824143644', '2021-08-24 14:36:51'),
('20210824145300', '2021-08-24 14:53:06'),
('20210824155012', '2021-08-24 15:50:17');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `alerte`
--
ALTER TABLE `alerte`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_3AE753A79F37AE5` (`id_user_id`);

--
-- Index pour la table `campagne`
--
ALTER TABLE `campagne`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_539B5D1679F37AE5` (`id_user_id`),
  ADD KEY `IDX_539B5D1653749FB4` (`id_message_simple_id`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_4C62E638FA7089AB` (`id_groupe_id`),
  ADD KEY `IDX_4C62E63879F37AE5` (`id_user_id`);

--
-- Index pour la table `destinataire_camp`
--
ALTER TABLE `destinataire_camp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_B5E4EA76422BA59D` (`id_contact_id`);

--
-- Index pour la table `groupe_contact`
--
ALTER TABLE `groupe_contact`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_8A05017679F37AE5` (`id_user_id`);

--
-- Index pour la table `label_service`
--
ALTER TABLE `label_service`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_5D1C33FB79F37AE5` (`id_user_id`);

--
-- Index pour la table `liste_destinataire`
--
ALTER TABLE `liste_destinataire`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_570C2F1DE30BE83` (`id_campagne_id`);

--
-- Index pour la table `liste_distribution`
--
ALTER TABLE `liste_distribution`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `message_simple`
--
ALTER TABLE `message_simple`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_F65CA00D79F37AE5` (`id_user_id`);

--
-- Index pour la table `message_variable`
--
ALTER TABLE `message_variable`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_C56B439C79F37AE5` (`id_user_id`);

--
-- Index pour la table `migration_versions`
--
ALTER TABLE `migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `alerte`
--
ALTER TABLE `alerte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `campagne`
--
ALTER TABLE `campagne`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `destinataire_camp`
--
ALTER TABLE `destinataire_camp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `groupe_contact`
--
ALTER TABLE `groupe_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT pour la table `label_service`
--
ALTER TABLE `label_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `liste_destinataire`
--
ALTER TABLE `liste_destinataire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT pour la table `liste_distribution`
--
ALTER TABLE `liste_distribution`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `message_simple`
--
ALTER TABLE `message_simple`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `message_variable`
--
ALTER TABLE `message_variable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `alerte`
--
ALTER TABLE `alerte`
  ADD CONSTRAINT `FK_3AE753A79F37AE5` FOREIGN KEY (`id_user_id`) REFERENCES `client` (`id`);

--
-- Contraintes pour la table `campagne`
--
ALTER TABLE `campagne`
  ADD CONSTRAINT `FK_539B5D1653749FB4` FOREIGN KEY (`id_message_simple_id`) REFERENCES `message_simple` (`id`),
  ADD CONSTRAINT `FK_539B5D1679F37AE5` FOREIGN KEY (`id_user_id`) REFERENCES `client` (`id`);

--
-- Contraintes pour la table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `FK_4C62E63879F37AE5` FOREIGN KEY (`id_user_id`) REFERENCES `client` (`id`),
  ADD CONSTRAINT `FK_4C62E638FA7089AB` FOREIGN KEY (`id_groupe_id`) REFERENCES `groupe_contact` (`id`);

--
-- Contraintes pour la table `destinataire_camp`
--
ALTER TABLE `destinataire_camp`
  ADD CONSTRAINT `FK_B5E4EA76422BA59D` FOREIGN KEY (`id_contact_id`) REFERENCES `contact` (`id`);

--
-- Contraintes pour la table `groupe_contact`
--
ALTER TABLE `groupe_contact`
  ADD CONSTRAINT `FK_8A05017679F37AE5` FOREIGN KEY (`id_user_id`) REFERENCES `client` (`id`);

--
-- Contraintes pour la table `label_service`
--
ALTER TABLE `label_service`
  ADD CONSTRAINT `FK_5D1C33FB79F37AE5` FOREIGN KEY (`id_user_id`) REFERENCES `client` (`id`);

--
-- Contraintes pour la table `liste_destinataire`
--
ALTER TABLE `liste_destinataire`
  ADD CONSTRAINT `FK_570C2F1DE30BE83` FOREIGN KEY (`id_campagne_id`) REFERENCES `campagne` (`id`);

--
-- Contraintes pour la table `message_simple`
--
ALTER TABLE `message_simple`
  ADD CONSTRAINT `FK_F65CA00D79F37AE5` FOREIGN KEY (`id_user_id`) REFERENCES `client` (`id`);

--
-- Contraintes pour la table `message_variable`
--
ALTER TABLE `message_variable`
  ADD CONSTRAINT `FK_C56B439C79F37AE5` FOREIGN KEY (`id_user_id`) REFERENCES `client` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
