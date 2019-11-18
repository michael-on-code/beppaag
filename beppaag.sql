-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Lun 18 Novembre 2019 à 07:33
-- Version du serveur :  5.7.14
-- Version de PHP :  7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `beppaag`
--

-- --------------------------------------------------------

--
-- Structure de la table `cron_jobs`
--

CREATE TABLE `cron_jobs` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` text NOT NULL,
  `function_to_call` varchar(100) NOT NULL,
  `params` longtext NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `starts_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `evaluations`
--

CREATE TABLE `evaluations` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(50) NOT NULL,
  `title` text NOT NULL,
  `object` text NOT NULL,
  `year` int(4) UNSIGNED NOT NULL,
  `active` tinyint(1) NOT NULL,
  `type_id` int(10) UNSIGNED NOT NULL,
  `temporality_id` int(10) UNSIGNED NOT NULL,
  `leading_authority_id` int(10) UNSIGNED NOT NULL,
  `contracting_authority_id` int(10) UNSIGNED NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `evaluation_contracting_authorities`
--

CREATE TABLE `evaluation_contracting_authorities` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(50) NOT NULL,
  `name` text NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `evaluation_contracting_authorities`
--

INSERT INTO `evaluation_contracting_authorities` (`id`, `slug`, `name`, `description`) VALUES
(9, 'direction-des-infrastructures-et-du-tran5dd0b07f8d', 'Direction des Infrastructures et du Transport', 'La Direction générale des infrastructures est chargée de : piloter tous les volets de l\'installation, aménagement et maintenance de tous travaux publics'),
(10, 'direction-de-linformatique-et-du-pre-arc5dd0b09ba5', 'Direction de l\'Informatique et du Pré-archivage', 'La Direction de l\'informatique et du pré-archivage assure, en relation avec toutes les structures du ministère, la conception');

-- --------------------------------------------------------

--
-- Structure de la table `evaluation_leading_authorities`
--

CREATE TABLE `evaluation_leading_authorities` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(50) NOT NULL,
  `name` text NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `evaluation_leading_authorities`
--

INSERT INTO `evaluation_leading_authorities` (`id`, `slug`, `name`, `description`) VALUES
(1, 'societe-adeoti5dd0b55cde196', 'Société ADEOTI', 'Enreprise privée spécialisée dans la conception et la réalisation des travaux publics');

-- --------------------------------------------------------

--
-- Structure de la table `evaluation_meta`
--

CREATE TABLE `evaluation_meta` (
  `id` int(10) UNSIGNED NOT NULL,
  `evaluation_id` int(10) UNSIGNED NOT NULL,
  `key` varchar(35) NOT NULL,
  `value` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `evaluation_sectors`
--

CREATE TABLE `evaluation_sectors` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `evaluation_sectors`
--

INSERT INTO `evaluation_sectors` (`id`, `slug`, `name`, `description`) VALUES
(14, 'industrie-et-commerce5dd0b1778b161', 'Industrie et commerce', 'Secteur d\'évaluations portant sur les Industries et le Commerce au Bénin'),
(15, 'rural5dd0b1842520e', 'Rural', 'Secteur d\'évaluations portant sur les zones Rurales au Bénin'),
(16, 'pauvrete5dd0b1929009c', 'Pauvreté', 'Secteur d\'évaluations portant sur la Pauvreté au Bénin');

-- --------------------------------------------------------

--
-- Structure de la table `evaluation_sector_groups`
--

CREATE TABLE `evaluation_sector_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `evaluation_id` int(10) UNSIGNED NOT NULL,
  `sector_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `evaluation_stats`
--

CREATE TABLE `evaluation_stats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `evaluation_id` int(10) UNSIGNED NOT NULL,
  `ip_adress` varchar(45) NOT NULL,
  `time` int(10) UNSIGNED NOT NULL,
  `type` varchar(10) NOT NULL DEFAULT 'view'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `evaluation_temporalities`
--

CREATE TABLE `evaluation_temporalities` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `evaluation_temporalities`
--

INSERT INTO `evaluation_temporalities` (`id`, `slug`, `name`, `description`) VALUES
(1, 'ex-ante5dd05acc33c85', 'Ex-ante', 'Evaluations ayant pour temporalité Ex-ante');

-- --------------------------------------------------------

--
-- Structure de la table `evaluation_thematics`
--

CREATE TABLE `evaluation_thematics` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `evaluation_thematics`
--

INSERT INTO `evaluation_thematics` (`id`, `slug`, `name`, `description`) VALUES
(3, 'droits-humains5dd0b20a0c9d8', 'Droits Humains', 'Evaluations ayant rapport avec la thématiques des Droits Humains'),
(4, 'aucune5dd0b2187d444', 'Aucune', 'Thématique d\'évaluation non classée');

-- --------------------------------------------------------

--
-- Structure de la table `evaluation_thematic_groups`
--

CREATE TABLE `evaluation_thematic_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `evaluation_id` int(10) UNSIGNED NOT NULL,
  `thematic_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `evaluation_types`
--

CREATE TABLE `evaluation_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `evaluation_types`
--

INSERT INTO `evaluation_types` (`id`, `slug`, `name`, `description`) VALUES
(3, 'evaluation-finale5dd0b1ded7a2b', 'Evaluation finale', 'Catégorie d\'évaluations en phase de finalisation');

-- --------------------------------------------------------

--
-- Structure de la table `events`
--

CREATE TABLE `events` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(50) NOT NULL,
  `title` text NOT NULL,
  `location` text,
  `active` tinyint(1) UNSIGNED NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `starts_at` datetime DEFAULT NULL,
  `ends_at` datetime DEFAULT NULL,
  `category_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `event_categories`
--

CREATE TABLE `event_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `event_meta`
--

CREATE TABLE `event_meta` (
  `id` int(10) UNSIGNED NOT NULL,
  `event_id` int(10) UNSIGNED NOT NULL,
  `key` varchar(35) NOT NULL,
  `value` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `event_tags`
--

CREATE TABLE `event_tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `event_tag_groups`
--

CREATE TABLE `event_tag_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `tag_id` int(10) UNSIGNED NOT NULL,
  `event_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User'),
(6, 'editor', 'Editeur'),
(7, 'evaluation_moderator', 'Modérateur d\'évaluation'),
(8, 'recommendation_moderator', 'Modérateur de récommendation');

-- --------------------------------------------------------

--
-- Structure de la table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `logs`
--

CREATE TABLE `logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `title` text NOT NULL,
  `params` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `options`
--

CREATE TABLE `options` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(35) NOT NULL,
  `value` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `options`
--

INSERT INTO `options` (`id`, `key`, `value`) VALUES
(1, 'siteName', 'BEPPAAG'),
(2, 'siteDescription', 'Plateforme de Gestion des Processus Evaluatifs'),
(3, 'googleRecaptchaPublicKey', '6LdBbL4UAAAAAN35hhhAHJ6V7PbZAeLG_RvC9weK'),
(4, 'googleRecaptchaSecretKey', '6LdBbL4UAAAAAJEod1c6up-2iWfi2aXyAMQK1CH5'),
(5, 'siteLogo', 'presidence-logo4.png'),
(6, 'siteFavicon', 'favicon12.jpg'),
(7, 'siteDefaultAvatar', 'defaukt.png');

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(50) NOT NULL,
  `title` text NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `category_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `post_categories`
--

CREATE TABLE `post_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `post_meta`
--

CREATE TABLE `post_meta` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `key` varchar(35) NOT NULL,
  `value` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `post_tags`
--

CREATE TABLE `post_tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `post_tag_groups`
--

CREATE TABLE `post_tag_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `tag_id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `recommendations`
--

CREATE TABLE `recommendations` (
  `id` int(10) UNSIGNED NOT NULL,
  `evaluation_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `start_date` datetime NOT NULL,
  `status` tinyint(1) DEFAULT '0',
  `created_at` datetime NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `recommendation_activities`
--

CREATE TABLE `recommendation_activities` (
  `id` int(10) UNSIGNED NOT NULL,
  `recommendation_id` int(10) UNSIGNED NOT NULL,
  `title` text NOT NULL,
  `amount` int(10) UNSIGNED NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `execution_level` varchar(35) NOT NULL,
  `explanation` text NOT NULL,
  `active` int(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, 'XTEbRBQ4lt.SjN2k73oijO', 1268889823, 1574054580, 1, 'Admin', 'istrator', 'ADMIN', '0');

-- --------------------------------------------------------

--
-- Structure de la table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 6),
(4, 1, 7),
(5, 1, 8);

-- --------------------------------------------------------

--
-- Structure de la table `user_meta`
--

CREATE TABLE `user_meta` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `key` varchar(35) NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `cron_jobs`
--
ALTER TABLE `cron_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `evaluations`
--
ALTER TABLE `evaluations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_id` (`type_id`),
  ADD KEY `leading_authority_id` (`leading_authority_id`),
  ADD KEY `contracting_authority_id` (`contracting_authority_id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `temporality_id` (`temporality_id`);

--
-- Index pour la table `evaluation_contracting_authorities`
--
ALTER TABLE `evaluation_contracting_authorities`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `evaluation_leading_authorities`
--
ALTER TABLE `evaluation_leading_authorities`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `evaluation_meta`
--
ALTER TABLE `evaluation_meta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `evaluation_id` (`evaluation_id`);

--
-- Index pour la table `evaluation_sectors`
--
ALTER TABLE `evaluation_sectors`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `evaluation_sector_groups`
--
ALTER TABLE `evaluation_sector_groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `evaluation_id` (`evaluation_id`),
  ADD KEY `sector_id` (`sector_id`);

--
-- Index pour la table `evaluation_stats`
--
ALTER TABLE `evaluation_stats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `evaluation_id` (`evaluation_id`);

--
-- Index pour la table `evaluation_temporalities`
--
ALTER TABLE `evaluation_temporalities`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `evaluation_thematics`
--
ALTER TABLE `evaluation_thematics`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `evaluation_thematic_groups`
--
ALTER TABLE `evaluation_thematic_groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `evaluation_id` (`evaluation_id`),
  ADD KEY `thematic_id` (`thematic_id`);

--
-- Index pour la table `evaluation_types`
--
ALTER TABLE `evaluation_types`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `category_id` (`category_id`);

--
-- Index pour la table `event_categories`
--
ALTER TABLE `event_categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `event_meta`
--
ALTER TABLE `event_meta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_id` (`event_id`);

--
-- Index pour la table `event_tags`
--
ALTER TABLE `event_tags`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `event_tag_groups`
--
ALTER TABLE `event_tag_groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tag_id` (`tag_id`),
  ADD KEY `event_id` (`event_id`);

--
-- Index pour la table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `category_id` (`category_id`);

--
-- Index pour la table `post_categories`
--
ALTER TABLE `post_categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `post_meta`
--
ALTER TABLE `post_meta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`);

--
-- Index pour la table `post_tags`
--
ALTER TABLE `post_tags`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `post_tag_groups`
--
ALTER TABLE `post_tag_groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tag_id` (`tag_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Index pour la table `recommendations`
--
ALTER TABLE `recommendations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `evaluation_id` (`evaluation_id`);

--
-- Index pour la table `recommendation_activities`
--
ALTER TABLE `recommendation_activities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recommendation_id` (`recommendation_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- Index pour la table `user_meta`
--
ALTER TABLE `user_meta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `cron_jobs`
--
ALTER TABLE `cron_jobs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `evaluations`
--
ALTER TABLE `evaluations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `evaluation_contracting_authorities`
--
ALTER TABLE `evaluation_contracting_authorities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `evaluation_leading_authorities`
--
ALTER TABLE `evaluation_leading_authorities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `evaluation_meta`
--
ALTER TABLE `evaluation_meta`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `evaluation_sectors`
--
ALTER TABLE `evaluation_sectors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT pour la table `evaluation_sector_groups`
--
ALTER TABLE `evaluation_sector_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `evaluation_stats`
--
ALTER TABLE `evaluation_stats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `evaluation_temporalities`
--
ALTER TABLE `evaluation_temporalities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `evaluation_thematics`
--
ALTER TABLE `evaluation_thematics`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `evaluation_thematic_groups`
--
ALTER TABLE `evaluation_thematic_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `evaluation_types`
--
ALTER TABLE `evaluation_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `event_categories`
--
ALTER TABLE `event_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `event_meta`
--
ALTER TABLE `event_meta`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `event_tags`
--
ALTER TABLE `event_tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `event_tag_groups`
--
ALTER TABLE `event_tag_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `options`
--
ALTER TABLE `options`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `post_categories`
--
ALTER TABLE `post_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `post_meta`
--
ALTER TABLE `post_meta`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `post_tags`
--
ALTER TABLE `post_tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `post_tag_groups`
--
ALTER TABLE `post_tag_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `recommendations`
--
ALTER TABLE `recommendations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `recommendation_activities`
--
ALTER TABLE `recommendation_activities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `user_meta`
--
ALTER TABLE `user_meta`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `evaluations`
--
ALTER TABLE `evaluations`
  ADD CONSTRAINT `evaluations_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `evaluation_types` (`id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `evaluations_ibfk_2` FOREIGN KEY (`temporality_id`) REFERENCES `evaluation_temporalities` (`id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `evaluations_ibfk_3` FOREIGN KEY (`leading_authority_id`) REFERENCES `evaluation_leading_authorities` (`id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `evaluations_ibfk_4` FOREIGN KEY (`contracting_authority_id`) REFERENCES `evaluation_contracting_authorities` (`id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `evaluations_ibfk_5` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE NO ACTION;

--
-- Contraintes pour la table `evaluation_meta`
--
ALTER TABLE `evaluation_meta`
  ADD CONSTRAINT `evaluation_meta_ibfk_1` FOREIGN KEY (`evaluation_id`) REFERENCES `evaluations` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `evaluation_sector_groups`
--
ALTER TABLE `evaluation_sector_groups`
  ADD CONSTRAINT `evaluation_sector_groups_ibfk_1` FOREIGN KEY (`evaluation_id`) REFERENCES `evaluations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `evaluation_sector_groups_ibfk_2` FOREIGN KEY (`sector_id`) REFERENCES `evaluation_sectors` (`id`) ON DELETE NO ACTION;

--
-- Contraintes pour la table `evaluation_stats`
--
ALTER TABLE `evaluation_stats`
  ADD CONSTRAINT `evaluation_stats_ibfk_1` FOREIGN KEY (`evaluation_id`) REFERENCES `evaluations` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `evaluation_thematic_groups`
--
ALTER TABLE `evaluation_thematic_groups`
  ADD CONSTRAINT `evaluation_thematic_groups_ibfk_1` FOREIGN KEY (`evaluation_id`) REFERENCES `evaluations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `evaluation_thematic_groups_ibfk_2` FOREIGN KEY (`thematic_id`) REFERENCES `evaluation_thematics` (`id`) ON DELETE NO ACTION;

--
-- Contraintes pour la table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `events_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `event_categories` (`id`) ON DELETE NO ACTION;

--
-- Contraintes pour la table `event_meta`
--
ALTER TABLE `event_meta`
  ADD CONSTRAINT `event_meta_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `event_tag_groups`
--
ALTER TABLE `event_tag_groups`
  ADD CONSTRAINT `event_tag_groups_ibfk_1` FOREIGN KEY (`tag_id`) REFERENCES `event_tags` (`id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `event_tag_groups_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `post_categories` (`id`) ON DELETE NO ACTION;

--
-- Contraintes pour la table `post_meta`
--
ALTER TABLE `post_meta`
  ADD CONSTRAINT `post_meta_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `post_tag_groups`
--
ALTER TABLE `post_tag_groups`
  ADD CONSTRAINT `post_tag_groups_ibfk_1` FOREIGN KEY (`tag_id`) REFERENCES `post_tags` (`id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `post_tag_groups_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `recommendations`
--
ALTER TABLE `recommendations`
  ADD CONSTRAINT `recommendations_ibfk_1` FOREIGN KEY (`evaluation_id`) REFERENCES `evaluations` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `recommendation_activities`
--
ALTER TABLE `recommendation_activities`
  ADD CONSTRAINT `recommendation_activities_ibfk_1` FOREIGN KEY (`recommendation_id`) REFERENCES `recommendations` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Contraintes pour la table `user_meta`
--
ALTER TABLE `user_meta`
  ADD CONSTRAINT `user_meta_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
