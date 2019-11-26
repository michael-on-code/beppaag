-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mar 26 Novembre 2019 à 18:06
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
  `recommendation_start_date` datetime DEFAULT NULL,
  `recommendation_actor_id` int(10) UNSIGNED DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `evaluations`
--

INSERT INTO `evaluations` (`id`, `slug`, `title`, `object`, `year`, `active`, `type_id`, `temporality_id`, `leading_authority_id`, `contracting_authority_id`, `recommendation_start_date`, `recommendation_actor_id`, `created_by`, `created_at`, `updated_at`) VALUES
(12, 'strategie-de-croissance-pour-la-reductio5ddd53a4ed', 'Stratégie de Croissance pour la Réduction de la Pauvreté (SCRP 2011-2015)', 'Stratégie de Croissance pour la Réduction de la Pauvreté (SCRP 2011-2015)', 2016, 1, 3, 2, 2, 12, NULL, NULL, 1, '2019-11-26 16:32:36', '2019-11-26 16:54:17'),
(13, 'politique-nationale-de-developpement-de-5ddd57fcdd', 'Politique Nationale de Développement de l’Artisanat (PNDA)', 'Politique Nationale de Développement de l’Artisanat (PNDA)', 2014, 1, 4, 4, 3, 12, NULL, NULL, 1, '2019-11-26 16:51:08', '2019-11-26 17:06:38'),
(14, 'profil-social-national-edition-2014---co5ddd5e47f2', 'Profil social national édition 2014 : « Commercialisation de l’essence dans le secteur informel au Bénin : analyse et enjeux de la commercialisation de l’essence dans le secteur informel au Bénin : analyse et enjeux »', 'L’essence dans le secteur informel', 2014, 1, 5, 4, 5, 14, NULL, NULL, 1, '2019-11-26 17:17:59', NULL),
(15, 'politique-nationale-du-tourisme-pnt-20135ddd60cc7f', 'Politique Nationale du Tourisme (PNT 2013-2025)', 'Politique Nationale du Tourisme (PNT 2013-2025)', 2014, 1, 6, 1, 3, 12, NULL, NULL, 1, '2019-11-26 17:28:44', NULL),
(16, 'profil-social-national-edition-2012--hyg5ddd694ec4', 'Profil social national, Edition 2012 « Hygiène et assainissement au Bénin: Handicap ou opportunité pour l’amélioration des conditions de vie de la population ?', 'Les conditions sanitaires de la population', 2013, 1, 4, 4, 5, 14, NULL, NULL, 1, '2019-11-26 18:05:02', NULL);

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
(10, 'direction-de-linformatique-et-du-pre-arc5dd0b09ba5', 'Direction de l\'Informatique et du Pré-archivage', 'La Direction de l\'informatique et du pré-archivage assure, en relation avec toutes les structures du ministère, la conception'),
(12, 'beppaag5dd2709c87dea', 'BEPPAAG', 'Bureau de l’Evaluation des Politiques Publiques et de l’Analyse de l’Action Gouvernementale'),
(13, 'maep5dd64fa196553', 'MAEP', 'Ministère de l\'Agriculture, de l\'Elevage et de la Pêche'),
(14, 'ocs5ddd5c64a9774', 'OCS', 'Observatoire du Changement Social');

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
(1, 'societe-adeoti5dd0b55cde196', 'Société ADEOTI', 'Enreprise privée spécialisée dans la conception et la réalisation des travaux publics'),
(2, 'laboratoire-amen5dd270810e62b', 'Laboratoire AMEN', 'Laboratoire d’Appui au Management et des Etudes Novatrices'),
(3, 'cimes-benin5dd3fadb4aa5a', 'CIMES BENIN', 'Comptoir d’Ingénierie en Management, 01 BP 1959 Cotonou – BENIN, Téléphone : (229) 21.14.47.82 /95.69.47.89 ; cimesingenierie(at)yahoo.fr; boflorent(at)yahoo.fr'),
(4, 'agetip5dd64f512313e', 'AGETIP', 'Agence d\'Exécution des Travaux d\'Intérêt Public'),
(5, 'ocs5ddd5c5525d7a', 'OCS', 'Observatoire du Changement Social');

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

--
-- Contenu de la table `evaluation_meta`
--

INSERT INTO `evaluation_meta` (`id`, `evaluation_id`, `key`, `value`) VALUES
(71, 12, 'cover_photo', '2.png'),
(72, 12, 'evaluation_file', '1.pdf'),
(73, 12, 'objective', '<ul style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px 0px 0px 20px; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-size: 12px;"><li style="padding: 0px; margin: 0px 0px 5px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">analyser le fonctionnement du dispositif de pilotage de la mise en œuvre de la SCRP et de ses processus de prise de décision&nbsp;;</li><li style="padding: 0px; margin: 0px 0px 5px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">apprécier la capacité institutionnelle et organisationnelle du dispositif de pilotage de la mise en œuvre de la SCRP à assurer l’atteinte des objectifs de la stratégie&nbsp;;</li><li style="padding: 0px; margin: 0px 0px 5px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">analyser l’opérationnalité et l’efficacité actuelle du mécanisme de suivi et d’évaluation de la SCRP y compris le processus de revue de la stratégie et les capacités des acteurs à produire les extrants attendus.</li><li style="padding: 0px; margin: 0px 0px 5px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">faire une analyse rétrospective de la qualité du processus d’élaboration de la SCRP, y compris l’association des parties prenantes ;</li><li style="padding: 0px; margin: 0px 0px 5px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">faire une analyse de la qualité de la SCRP, des options et des orientations clés retenues pour le développement du Bénin ;</li><li style="padding: 0px; margin: 0px 0px 5px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">apprécier quantitativement et qualitativement les niveaux de résultats atteints pour chaque axe stratégique défini dans la SCRP ;</li><li style="padding: 0px; margin: 0px 0px 5px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">formuler des recommandations claires sous forme de plan d’actions détaillé à prendre en compte dans l’élaboration de la nouvelle stratégie.</li></ul>'),
(74, 12, 'description', '<p style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">La troisième génération de la Stratégie de Croissance pour la Réduction de la Pauvreté (SCRP) a pour objectif d’améliorer les conditions de vie des populations, notamment des pauvres puisqu’elle se veut pro-pauvre. Elle a été conçue pour faciliter l’atteinte des OMD. Elle a été mise en œuvre de 2011 à 2015 dans un contexte où le Bénin a régulièrement subi les affres des aléas économiques, politiques, sociaux, environnementaux, etc.</p><p style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Cinq axes opérationnels ont été définis et se résument comme suit.</p><ul style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px 0px 0px 20px; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-size: 12px;"><li style="padding: 0px; margin: 0px 0px 5px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Axe 1&nbsp;: Accélération durable de la croissance et de la transformation de l’économie&nbsp;;</li><li style="padding: 0px; margin: 0px 0px 5px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Axe 2&nbsp;: Développement des infrastructures&nbsp;;</li><li style="padding: 0px; margin: 0px 0px 5px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Axe 3&nbsp;: Renforcement du capital humain&nbsp;;</li><li style="padding: 0px; margin: 0px 0px 5px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Axe 4&nbsp;: Renforcement de la qualité de la gouvernance&nbsp;;</li><li style="padding: 0px; margin: 0px 0px 5px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Axe 5&nbsp;: Développement équilibré et durable de l’espace national.</li></ul><p style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">La mise en œuvre de la stratégie s’est faite suivant sept principes directeurs et deux principaux instruments d’opérationnalisation.</p><p style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Les sept (07) principes directeurs sont&nbsp;:</p><ul style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px 0px 0px 20px; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-size: 12px;"><li style="padding: 0px; margin: 0px 0px 5px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Principe 1&nbsp;: Intégration et gestion efficiente des programmes sectoriels&nbsp;;</li><li style="padding: 0px; margin: 0px 0px 5px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Principe 2&nbsp;: Meilleur ciblage des pauvres et des programmes&nbsp;;</li><li style="padding: 0px; margin: 0px 0px 5px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Principe 3 : Décentralisation de la stratégie de lutte contre la pauvreté</li><li style="padding: 0px; margin: 0px 0px 5px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Principe 4 : Gestion Axée sur les Résultats&nbsp;;</li><li style="padding: 0px; margin: 0px 0px 5px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Principe 5 : Alignement des programmes des PTF avec la SCRP&nbsp;;</li><li style="padding: 0px; margin: 0px 0px 5px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Principe 6 : Promotion de la subsidiarité et du partenariat&nbsp;; et enfin</li><li style="padding: 0px; margin: 0px 0px 5px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Principe 7 : Neutralité politique vis-à-vis des cibles et des bénéficiaires</li></ul><p style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Au nombre de deux (02), les principaux instruments d\'opérationnalisation de la SCRP sont le Programme d’Actions Prioritaires (PAP) et les Plans de Développement Communaux (PDC). Le PAP est l\'instrument programmatique de toutes actions prioritaires ainsi que des investissements y afférents. La mise en cohérence permanente des PDC avec les orientations nationales et la SCRP permet d\'amener les collectivités locales à arrimer les interventions à la base aux objectifs nationaux définis.</p><p style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Les ressources nécessaires mobilisées pour la mise en œuvre de la stratégie ont des sources aussi diverses que variées. Au titre des ressources internes, il y a l’épargne nationale. S\'agissant des ressources externes, il y a les Investissements Directs Etrangers (IDE) et l\'aide des Partenaires Techniques et Financiers (PTF).</p>'),
(75, 12, 'methodological_approach', '<p style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Pour le volet institutionnel et le mécanisme de suivi et d’évaluation de la SCRP 3, l’approche méthodologique utilisée est articulée autour d’une revue documentaire et d’entretiens avec les parties prenantes au processus de suivi et d’évaluation de la SCRP, des partenaires techniques et financiers, et de quelques acteurs de la société civile. A l’issue de la revue documentaire et des entretiens, un cadre d’analyse a permis de réponse aux questions évaluatives.</p><p style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">S’agissant du volet relatif à l’évaluation de la mise en œuvre de la SCRP 3, il est essentiellement fondé sur l’analyse des données secondaires à travers l\'exploitation de plusieurs documents dont les rapports d’avancement de la SCRP, les aide-mémoires des revues de la SCRP, les rapports de suivi et d’évaluation de la mise en œuvre des OMD au Bénin, le rapport d’évaluation à mi-parcours de la mise en œuvre du Plan d’Actions d’Istanbul et les Tableaux de Bord de Suivi du PAP (TBS-PAP). Une collecte de données complémentaires a été faite au niveau des Directions de la Programmation et de la Prospective (DPP) et d\'autres structures clés.</p><p style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Limites&nbsp;:</p><p style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Selon le modèle d’évaluation retenu, les données à utiliser devraient être celles des années 2010 à 2015. Mais, en raison des difficultés liées à la fois à l’accès et au manque de certaines données, l’évaluation n’a pris en compte que les données disponibles.</p><p style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">De plus, les données à fournir par les ministères sectoriels n’ont pu l’être puisqu’elles ne sont pas encore validées par l’ensemble des acteurs. Ainsi, en absence des données de 2015, notamment, celles de 2014 sont utilisées. Elles ne rendent donc pas fidèlement compte de la réalité mais approchent celle-ci au regard de la tendance affichée par les indicateurs du secteur étudié. Il convient également de souligner la non disponibilité des informations financières relatives à la mise en œuvre de la stratégie, ce qui n’a pas permis d’approfondir les analyses en qui concerne le critère d’efficience.</p><p style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Par ailleurs, en raison des ressources allouées à l’évaluation, les analyses n’ont pu prendre en compte la perception des acteurs impliqués dans la mise en œuvre de la stratégie en vue d’apporter des nuances importantes sur des aspects spécifiques. Par conséquent, le critère de durabilité, de même que les acquis et leçons apprises, n’ont pu être examinés convenablement.</p><p style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">En outre, du fait de son envergure, cette évaluation devrait s’appuyer sur les résultats de plusieurs évaluations d’impacts spécifiques, notamment sur les plan social, économique et institutionnel. Ce qui n’a pas permis d’approfondir les analyses à cet effet.</p>'),
(76, 12, 'recommendation_actor_associated', '0'),
(77, 13, 'cover_photo', '12.png'),
(78, 13, 'evaluation_file', '21.pdf'),
(79, 13, 'objective', '<p style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">L’objectif global de la mission d’évaluation est de faire un point exhaustif de la mise en œuvre de la PNDA dans le cadre des Orientations Stratégiques de Développement du Bénin en général et de la stratégie de dynamisation du secteur privé et de la promotion de l’emploi des jeunes et des femmes en particulier. L’évaluation vise aussi à tirer tous les enseignements du passé afin d’améliorer les effets et impacts attendus de ladite politique.</p><p style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">De façon spécifique il s’agit de :</p><ul style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px 0px 0px 20px; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-size: 12px;"><li style="padding: 0px; margin: 0px 0px 5px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">analyser le degré de pertinence de la PNDA par rapport aux Orientations Stratégiques de Développement (2011-2020) ;</li><li style="padding: 0px; margin: 0px 0px 5px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">analyser les principes directeurs de la mise en cohérence de la PNDA avec la vision globale définie pour le pôle prioritaire de développement « tourisme, culture et artisanat » ;</li><li style="padding: 0px; margin: 0px 0px 5px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">formuler des recommandations pratiques pour une meilleure mise en œuvre de la PNDA 2005-2025.</li></ul>'),
(80, 13, 'description', '<p style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">La PNDA a pour vision de faire de l’artisanat béninois « un secteur bien organisé à l’horizon 2025 où opèrent des entreprises artisanales compétitives, contribuant notablement à la valorisation du patrimoine national et au bien-être social de l’artisan et du béninois, dans un pays uni et de paix ».</p><p style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Elle comporte cinq (05) orientations stratégiques à savoir : (i) l’amélioration des conditions-cadres ; (ii) la promotion de l’organisation des acteurs ; (iii) le renforcement du savoir-faire et du savoir-être ; (iv) la promotion et le développement des microentreprises artisanales ; (v) la protection sociale des artisans.</p>'),
(81, 13, 'methodological_approach', '<ul style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px 0px 0px 20px; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-size: 12px;"><li style="padding: 0px; margin: 0px 0px 5px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Revue documentaire;</li><li style="padding: 0px; margin: 0px 0px 5px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Collecte d\'information auprès des acteurs au moyen d\'un guide d\'entretien;</li><li style="padding: 0px; margin: 0px 0px 5px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">51 acteurs représentant toutes les parties prenantes ont été interviewés;</li><li style="padding: 0px; margin: 0px 0px 5px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Recours à une grille d\'évaluation pour apprécier la pertinence, la cohérence, l’efficacité, l’efficience et la durabilité des orientations contenues dans la PNDA.</li></ul>'),
(82, 13, 'recommendation_actor_associated', '0'),
(83, 14, 'cover_photo', '3.png'),
(84, 14, 'evaluation_file', '3.pdf'),
(85, 14, 'objective', '<p>&nbsp;Neant</p>'),
(86, 14, 'description', '<p style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;"><span style="padding: 0px; margin: 0px; font-size: inherit; font-weight: 700;">Objectif général</span>: L’objectif poursuivi à travers la réalisation de cette étude est d’évaluer les effets de la suppression de la commercialisation des produits pétroliers sur les conditions de vie de la population au Bénin.</p><p style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;"><span style="padding: 0px; margin: 0px; font-size: inherit; font-weight: 700;">Objectifs spécifiques</span>:</p><ul style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px 0px 0px 20px; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-size: 12px;"><li style="padding: 0px; margin: 0px 0px 5px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Présenter le profil social du béninois en 2013</li><li style="padding: 0px; margin: 0px 0px 5px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Faire l’état des lieux du secteur (informel, formel) pétrolier au Bénin</li><li style="padding: 0px; margin: 0px 0px 5px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Identifier les réformes à mettre œuvre pour la suppression à moyen et long terme du secteur informel dans le domaine pétrolier</li><li style="padding: 0px; margin: 0px 0px 5px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Evaluer l’effet de la suppression de ce commerce illicite sur la pauvreté</li></ul><p style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;"><span style="padding: 0px; margin: 0px; font-size: inherit; font-weight: 700;">Orientations stratégiques</span>&nbsp;:</p>'),
(87, 14, 'methodological_approach', '<li style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px; margin: 0px; font-size: 12px; line-height: 1.8;"><span style="font-size: 14px;">La revue documentaire;</span></li><li style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px; margin: 0px; font-size: 12px; line-height: 1.8;"><span style="font-size: 14px;">La Collecte de données auprès des acteurs directs ou indirects du secteur pétrolier et de la commercialisation de l’essence qui constitue la population totale. Au total nous avons enquêté 166 individus à raison de 12 grossistes ou semi-grossistes, 32 détaillants, 96 consommateurs, 14 instituts (directions les sociétés privés …) et 12 élus locaux. 12 enquêteurs et 03 contrôleurs ont menés l’enquête sur 5 jours et ceci ensillonnant tous les groupes cibles qui sont : le secteur informel, le secteur formel, lesconsommateurs, les élus locaux et les directions techniques des ministères chargés desressources minières et pétrolières.</span></li>'),
(88, 14, 'recommendation_actor_associated', '0'),
(89, 15, 'cover_photo', '4.png'),
(90, 15, 'evaluation_file', '4.pdf'),
(91, 15, 'objective', '<p style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">L’objectif de l’évaluation est d’examiner les chances de succès de la PNT en cohérence avec les orientations stratégiques de développement du Bénin en général et de la stratégie de dynamisation du secteur privé et de la promotion de l’emploi des jeunes et des femmes en particulier. L’évaluation vise aussi à tirer tous les enseignements du passé afin d’améliorer les effets et impacts attendus de ladite politique.</p><p style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Les résultats attendus de l’évaluation de la politique sont ci-après :</p><ul style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px 0px 0px 20px; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-size: 12px;"><li style="padding: 0px; margin: 0px 0px 5px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">une analyse pertinente de la PNT par rapport aux Orientations Stratégiques de Développement (2011-2020) ;</li><li style="padding: 0px; margin: 0px 0px 5px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">une analyse des principes directeurs de la mise en cohérence de la PNT avec la vision globale définie pour le pôle prioritaire de développement « tourisme, culture et artisanat » ;</li><li style="padding: 0px; margin: 0px 0px 5px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">un bilan du rôle joué par chaque acteur au regard des missions assignées ;</li><li style="padding: 0px; margin: 0px 0px 5px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">des recommandations pratiques pour une meilleure mise en œuvre de la PNT 2013-2025.</li></ul>'),
(92, 15, 'description', '<p style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">La PNT a pour vision de « Faire du Bénin une destination de référence en Afrique de l’Ouest dans le respect de la préservation du patrimoine culturel et naturel ». Elle a pour objectif général de doubler d’ici 2025 la contribution du Tourisme au Produit Intérieur Brut. De façon spécifique, la PNT vise à : (i) accroître et améliorer l’offre touristique ; (ii) promouvoir le tourisme et (iii) renforcer les capacités managériales du secteur du tourisme.</p><p style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Elle comporte huit (08) stratégies définies en lien avec les objectifs énoncés. Il s\'agit de: (i) Développement des infrastructures touristiques et de soutien au tourisme de standards internationaux ; (ii) Renforcement des capacités des ressources humaines et amélioration de la qualité des services touristiques (iii) Développement du tourisme intérieur ; (iv) Promotion de la « destination Bénin » sur les principaux marchés émetteurs de touristes ; (v) Développement du tourisme vert (éco-tourisme) ; (vi) Amélioration du cadre institutionnel, législatif et réglementaire ; (vii) Mise en place de mécanismes de financement productifs adéquats pour le secteur du tourisme ; (viii) Amélioration du système d’information sur le secteur touristique.</p>'),
(93, 15, 'methodological_approach', '<ul style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px 0px 0px 20px; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-size: 12px;"><li style="padding: 0px; margin: 0px 0px 5px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Revue documentaire;</li><li style="padding: 0px; margin: 0px 0px 5px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Collecte d\'information auprès des acteurs au moyen d\'un guide d\'entretien;</li><li style="padding: 0px; margin: 0px 0px 5px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">62 acteurs représentant toutes les parties prenantes ont été interviewés;</li><li style="padding: 0px; margin: 0px 0px 5px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">14 touristes de diverses nationalités ont été interviewés;</li><li style="padding: 0px; margin: 0px 0px 5px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Recours à une grille d\'évaluation pour apprécier la pertinence, la cohérence, l’efficacité, l’efficience et la durabilité des orientations contenues dans la PNT.</li></ul>'),
(94, 15, 'recommendation_actor_associated', '0'),
(95, 16, 'cover_photo', '51.png'),
(96, 16, 'evaluation_file', '51.pdf'),
(97, 16, 'objective', '<p>Néant</p>'),
(98, 16, 'description', '<p style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;"><span style="padding: 0px; margin: 0px; font-size: inherit; font-weight: 700;">Objectif général</span>: Evaluer les conditions sanitaires des populations sur le plan de l’hygiène et de l’assainissement au Bénin<br style="padding: 0px; margin: 0px; font-size: 12px;"><br style="padding: 0px; margin: 0px; font-size: 12px;"><span style="padding: 0px; margin: 0px; font-size: inherit; font-weight: 700;">Objectifs spécifiques</span>:</p><ul style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px 0px 0px 20px; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-size: 12px;"><li style="padding: 0px; margin: 0px 0px 5px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">faire l’état des lieux dans le sous secteur de l’hygiène et de l’assainissement</li><li style="padding: 0px; margin: 0px 0px 5px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">évaluer les conditions sanitaires de la population sur le plan de l’hygiène et de l’assainissement</li><li style="padding: 0px; margin: 0px 0px 5px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">faire une analyse comparative des conditions de vie des populations des communes faiblement, moyennement et plus assainies, en ressortir l’handicap ou l’opportunité pour l’amélioration des conditions de vie de la population</li><li style="padding: 0px; margin: 0px 0px 5px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">analyser les facteurs explicatifs des comportements des populations en matière d’hygiène et d’assainissement</li><li style="padding: 0px; margin: 0px 0px 5px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">analyser les perspectives en matière d’hygiène et d’assainissement</li></ul><p style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;"><span style="padding: 0px; margin: 0px; font-size: inherit; font-weight: 700;">Orientations stratégiques</span>&nbsp;:</p>'),
(99, 16, 'methodological_approach', '<p><span style="color: rgb(53, 53, 53); font-family: montserrat, sans-serif, calibri, tahoma, verdana; font-size: 15px;">L’approche méthodologique est constituée de l’état de la question à travers la revue documentaire et les différentes enquêtes de terrain (guides d’entretien et de questionnaires).</span><br style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px; margin: 0px; font-size: 12px; color: rgb(53, 53, 53);"><span style="color: rgb(53, 53, 53); font-family: montserrat, sans-serif, calibri, tahoma, verdana; font-size: 15px;">L’étude a couvert les douze départements du Bénin, et a exploré les milieux urbain, périurbain et rural. Quatorze communes (soit 18,18% des communes du pays) avec une taille totale de 1600 ménages échantillons ont été retenues avec 1000 dans les villes à statut particulier. Logiciels Epi-Data, SPSS et Excel utilisés.</span><br></p>'),
(100, 16, 'recommendation_actor_associated', '0');

-- --------------------------------------------------------

--
-- Structure de la table `evaluation_questions`
--

CREATE TABLE `evaluation_questions` (
  `id` int(10) UNSIGNED NOT NULL,
  `evaluation_id` int(10) UNSIGNED NOT NULL,
  `title` text NOT NULL,
  `explanation` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `evaluation_questions`
--

INSERT INTO `evaluation_questions` (`id`, `evaluation_id`, `title`, `explanation`) VALUES
(58, 12, 'Pertinence : Analyser la pertinence des axes stratégiques', '<p style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Par rapport à l’axe « accélération durable de la croissance et de la transformation de l’économie », on peut retenir que le choix fait par le Gouvernement qui consiste à accélérer les réformes afin de diversifier l’économie et de relever le taux de croissance à 7,5%, à l’horizon 2015 est bien pertinent. Cela se justifie par le fait que les quatre domaines prioritaires d’intervention à savoir, l’intensification de la croissance et la consolidation du cadre macroéconomique, la dynamisation du secteur privé et le développement des entreprises, la diversification de l’économie par la promotion de nouvelles filières porteuses pour les exportations et enfin, la promotion de l’intégration régionale et de l’insertion dans les réseaux mondiaux, sont bien pertinents pour relever les défis identifiés lors du diagnostic.</p><p style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">En ce qui concerne le développement des infrastructures, notamment celles économiques, focalisées sur les secteurs du transport, de l’énergie, de l\'eau, des technologies de l’information, de la communication, du bâtiment et de l’urbanisme, la non cohérente de la logique d’intervention (inexistence de synergie, simple énumération d’actions sans interrelation et ordonnancement plus ou moins précis, projets non structurants…), ne permet guère d’optimiser leur impact sur les populations pauvres. Il en découle que la SCRP 2011-2015 aurait gagné le pari d’être une stratégie pro-pauvre en matière de développement des infrastructures si un nombre raisonnable de projets structurants d’infrastructures avait été identifié après un examen approfondi et conséquent de leurs impacts/effets sur les pauvres. La pertinence est ici hypothéquée. Pour ce qui est du développement du capital humain, le choix de cet axe stratégique, au regard des défis, est bien pertinent dans la mesure où il revêt un caractère transversal et déterminant. Aucune action de développement ne peut être conduite sans l’indispensable et nécessaire ressource immatérielle que constitue le capital humain. A cet effet, huit (08) domaines d’intervention ont été identifiés et ciblés pour promouvoir l’éducation, la santé, l’emploi et les loisirs d’une part, et pour réduire les inégalités liées au genre d’autre part. Mais, les indicateurs d’impact de la santé retenus sont pertinents pour accélérer l’atteinte des OMD, tandis que ceux relatifs à l’éducation et la formation sont limités à l’éducation primaire et à l’alphabétisation des plus jeunes (priorité à l’éducation de base). Par ailleurs, l’accent n’a pas été mis ni sur l’amélioration des capacités individuelles à soutenir la productivité, ni sur la formation professionnelle et l’apprentissage, ce qui réduit leur pertinence. Par ailleurs, la SCRP a abordé des thématiques spécifiques pro-pauvres (emplois décents, questions liées au VIH/SIDA et au genre) mais a manqué d’en faire des priorités, notamment en ce qui concerne la promotion de l’emploi et le genre, dans la mesure où il n’y a pas d’indicateurs pour le suivi des progrès accomplis au niveau ces deux thématiques.</p><p style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Le renforcement de la qualité de la gouvernance constitue un axe bien pertinent dans la mesure où, le secteur privé, principal créateur et pourvoyeur d’emplois dans une économie de marché, trouve les conditions de son plein épanouissement, grâce à une gouvernance bonne et efficace. Cependant, il n’a pas été proposé dans la SCRP 2011-2015, d’indicateurs de résultat pouvant permettre d’apprécier ou d’approcher l’appréciation globale de la qualité de la gouvernance.</p><p style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Le développement équilibré et durable de l’espace national est l’une des conditions préalables à la réduction de la pauvreté et des inégalités sociales car, il induit la valorisation des ressources et potentialités locales, base de la création d’emplois et de richesse, ainsi que la réduction des disparités spatiales en matière d’infrastructures et d’équipements. Par conséquent, le choix du développement équilibré et durable de l’espace national comme axe stratégique de la SCRP 2011-2015 est bien pertinent.</p><p style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Le cadre institutionnel et le mécanisme de suivi et d’évaluation mis en place pour le pilotage et le suivi-évaluation de la mise en œuvre de la SCRP restent pertinents. Cependant, des améliorations restent à apporter pour améliorer son efficacité et l’appropriation du processus de pilotage par toutes les parties prenantes. Par ailleurs, le mécanisme pourrait être allégé au niveau du sous-système d’évaluation en se focalisant sur le seul sous-système traitant de toutes les questions d’évaluation.</p>'),
(59, 12, 'Cohérence : Analyser la Cohérence de la SCRP avec le système national de planification et son appropriation par les parties prenantes', '<p style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">L’analyse de cohérence au niveau de la planification stratégique (cohérence entre la SCRP 2011-2015 et les différents documents de planification) montre que la SCRP 2011-2015 est en cohérence avec les différents documents de planification de développement du pays : (i) les actions prioritaires en matière de santé, d’emploi et de thématiques spécifiques relatives au genre et au VIH/SIDA retenues dans la SCRP opérationnalisent les grandes orientations de la vision Alafia 2025 ; (ii) la SCRP est bien cohérente avec les OSD si l\'horizon de ces dernières est bien étendu au-delà de 2011 ; (iii) les politiques sectorielles constituent les déclinaisons de la vision Alafia 2025 et sont alignées sur les OMD auxquels le Bénin a souscrit à l’horizon 2015 ; (iv) la SCRP 2011-2015 a été élaborée dans l’optique d’accélérer l’atteinte des OMD. En ce qui concerne la cohérence opérationnelle, on peut soutenir qu’elle est tout aussi bien établie dans la mesure où le Programme d’Actions Prioritaires, le Programme d’Investissements Publics, les budgets sectoriels annuels et les Plans de Développement Communaux, sont élaborés en tenant compte des domaines prioritaires d’intervention identifiés dans la SCRP.</p><p style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Cohérence du cadre institutionnel de pilotage de la SCRP et de son mécanisme de suivi-évaluation avec le cadre national de gestion du développement : Le dispositif mis en place au Bénin pour le pilotage de la mise en œuvre de la SCRP est en cohérence avec le dispositif institutionnel de gestion du développement. En effet, le cadre institutionnel de pilotage de la mise en œuvre de la SCRP est organisé autour de cinq instances : le Conseil d’Orientation (CO), le Comité de Pilotage (CP), les Groupes Techniques, thématiques et Sectoriels (GTS), les Comités Départementaux de Suivi (CDS) et les Comités Communaux de Suivi (CCS) de la mise en œuvre de la SCRP. Ces différentes instances s’inscrivent bien dans le cadre institutionnel de gestion du développement national tel que consacré par la législation.</p><p style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">L’appropriation de la SCRP 2011-2015est une réalité effective car les différents acteurs se réfèrent à son contenu tout au long des processus de planification sectorielle et communale (élaboration des documents de stratégies, des budgets-programmes, des Plans de Développement Communaux…). De même, le processus d’organisation du dispositif de pilotage de la SCRP est bien maitrisé par les différentes parties prenantes. Toutefois, la faible fonctionnalité des différents comités n’a pas permis d’assurer le suivi de la mise en œuvre de la SCRP aux niveaux décentralisé et déconcentré. Par contre, si le processus d’élaboration des rapports d’avancement est maîtrisé par les acteurs au niveau central, il n’en est pas de même pour les acteurs aux niveaux déconcentré et décentralisé. Aussi, l’appropriation des autres documents qui accompagnent la SCRP (PAP et cadre de suivi des performances de la SCRP) demeure-t-elle faible : aux niveaux déconcentré et décentralisé, les acteurs ont une faible connaissance de l’existence du cadre de suivi des performances de la SCRP, du PAP dont les PDC sont des outils d’opérationnalisation.</p>'),
(60, 12, 'Efficacité : Analyser l’efficacité de la SCRP', '<p style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Les performances découlant de la mise en œuvre du PAP ont été analysées en raison du fait que les actions du PAP n’ont pas été pondérées d’une part, et que d’autre part, après le 31 décembre 2015, beaucoup d’actions prioritaires sont en cours de mise en œuvre, ce qui signifie que le taux d’exécution physique du PAP est nettement en deçà de 100%.</p><p style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">L’analyse a permis de constater que le PAP est mis en œuvre à travers cinq (05) programmes, vingt-neuf (29) sous-programmes, cent huit (108) objectifs et sept cent douze (712) actions dites prioritaires contre huit cent cinquante (850) initialement annoncées. En somme, cent trente-huit (138) actions prioritaires n’ont pu être programmées sur la période. Mais, les mesures/projets en cours d’exécution jusqu’en 2015 sont, soit de nature pérenne pour la plupart, soit la durée de mise en œuvre excède la période 2011-2015, ce qui pourrait signifier qu’elles demeurent encore pertinentes dans la mesure où les problèmes subsistent toujours sous diverses formes. Dans ces conditions, ils sont reconductibles pour une nouvelle stratégie. Par contre, les mesures qui ont été suspendues l’ont été pour des raisons d’insuffisance de financement. Il en est de même pour les mesures non entamées où aucune ressource n’a été prévue au budget de l’Etat tout au long de la période de mise en œuvre.</p>'),
(61, 12, ' Efficience : Analyser l’efficience de la SCRP', '<p><span style="color: rgb(53, 53, 53); font-family: montserrat, sans-serif, calibri, tahoma, verdana; font-size: 15px;">L’efficience étant la mesure dans laquelle les objectifs ont été atteints à moindre coût, il n’est guère possible, d’apprécier l’efficience de la SCRP 2011-2015 à fin 2015, étant donné qu’à cette date, le taux moyen des mesures/projets prioritaires inscrits au PAP et qui sont encore en cours d’exécution est de 70%.Toutefois, il a été procédé à l’analyse budgétaire de l’exécution budgétaire des programmes sur la période 2012 à 2014 pour laquelle les données sont disponibles et ce, suivant les secteurs retenus dans le document de base de la SCRP.Une analyse du budget voté chaque année a permis de constater que ces budgets respectifs n’ont jamais été en cohérence avec les prévisions annuelles de la SCRP. Une moindre priorité a été accordée aux secteurs « production et commerce » et « infrastructures productives » dans l’allocation des budgets contrairement aux prévisions de la SCRP : les secteurs sociaux (34,8% contre 33,8%), la gouvernance (12,9% contre 7,0%), la « défense et sécurité » (7,6% contre 4,0%) et la souveraineté (5,0% contre 2,5%) ont pris une part importante du budget au détriment des secteurs « production et commerce » (8,8% contre 12,3%) et « infrastructures productives » (14,3% contre 24,3%). Bien que ce constat soit fait chaque année, rien n’a été fait tout au long de la période de mise en œuvre de la SCRP pour rendre la structure du budget cohérente avec les prévisions de la SCRP.</span><br></p>'),
(62, 12, 'Impact de la SCRP', '<p style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">L’analyse des performances socio-économiques du Bénin sur la période 2011-2015 montre : (i) une croissance économique moyenne de 5,3% sur la période 2001-2015 mais, qui reste insuffisante dans un contexte où la croissance démographique est de 3,5% par an ; (ii) une persistance voire une légère augmentation des inégalités dans la distribution de la consommation par tête des ménages, inégalités principalement tirées par tête des ménages, inégalités principalement tirées par les déséquilibres entre les départements ; (iii) une augmentation de 16,5% du coût des besoins essentiels qui constitue le seuil de pauvreté. En conséquence, la pauvreté monétaire s’est aggravée, passant de 36,2% en 2011 à 40,1% en 2015 alors qu’il était attendu que la mise en œuvre de la SCRP3 permette de réduire son incidence à 25% en 2015. La détérioration la plus importante s’observe au niveau des ménages urbains. La pauvreté non monétaire connaît quant à elle un léger recul passant de 30,2% en 2011 à 29,4% en 2015 mais avec une dégradation de la situation en milieu rural.</p><p style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Globalement, aussi bien la croissance économique que l’amélioration de l’accès aux infrastructures de base résultant de la mise en œuvre de la SCRP3 ne semblent pas avoir profité aux plus pauvres. Cette situation questionne encore une fois l’efficacité de la mise en œuvre des politiques publiques conçues pour être pro-pauvres mais qui au final impactent très peu la répartition équitable des fruits de la croissance et l’inclusion des populations vulnérables dans la création de richesse.</p><p style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Un élément fondamental expliquant la contre-performance en matière de réduction de la pauvreté sur la période 2011-2015 reste la hausse importante du coût des besoins essentiels malgré une inflation globalement maîtrisée. Il est donc nécessaire d’accorder une attention particulière au suivi de l’évolution des prix des biens et services entrant dans la construction du seuil de pauvreté.</p><p style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">les déséquilibres entre les départements ; (iii) une augmentation de 16,5% du coût des besoins essentiels qui constitue le seuil de pauvreté. En conséquence, la pauvreté monétaire s’est aggravée, passant de 36,2% en 2011 à 40,1% en 2015 alors qu’il était attendu que la mise en œuvre de la SCRP3 permette de réduire son incidence à 25% en 2015. La détérioration la plus importante s’observe au niveau des ménages urbains. La pauvreté non monétaire connaît quant à elle un léger recul passant de 30,2% en 2011 à 29,4% en 2015 mais avec une dégradation de la situation en milieu rural.</p><p style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Globalement, aussi bien la croissance économique que l’amélioration de l’accès aux infrastructures de base résultant de la mise en œuvre de la SCRP3 ne semblent pas avoir profité aux plus pauvres. Cette situation questionne encore une fois l’efficacité de la mise en œuvre des politiques publiques conçues pour être pro-pauvres mais qui au final impactent très peu la répartition équitable des fruits de la croissance et l’inclusion des populations vulnérables dans la création de richesse.</p><p style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Un élément fondamental expliquant la contre-performance en matière de réduction de la pauvreté sur la période 2011-2015 reste la hausse importante du coût des besoins essentiels malgré une inflation globalement maîtrisée. Il est donc nécessaire d’accorder une attention particulière au suivi de l’évolution des prix des biens et services entrant dans la construction du seuil de pauvreté.</p>'),
(68, 13, 'La PNDA est-elle cohérente avec les Orientations Stratégiques de Développement ?', '<p><span style="color: rgb(53, 53, 53); font-family: montserrat, sans-serif, calibri, tahoma, verdana; font-size: 15px;">Les choix stratégiques opérés dans la PNDA sont de nature à opérationnaliser les orientations des politiques nationale et internationale.</span><br></p>'),
(69, 13, 'Quel bilan peut-on faire de la mise en œuvre de la PNDA? Cette stratégie a-t-elle été efficace ?', '<p style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Au regard des faiblesses relevées et de la durée de validité et de mise en œuvre de la PNDA, il est difficile de dire que la mise en œuvre est efficace ou pas.</p><p style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Toutefois, des efforts louables ont été accomplis en terme de réalisation de certaines actions, même si ces dernières ne sont pas les plus importantes.</p><p style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">A moins de 11 ans de l’échéance fixée, l’espoir est permis, sur la base des niveaux de réalisation, que les objectifs seront atteints.</p>'),
(70, 13, 'Les cadres institutionnel, législatif et réglementaire de mise en œuvre de la PNDA sont-ils adéquats pour prendre en charge efficacement les nouveaux défis du secteur de l’artisanat ?', '<p><span style="color: rgb(53, 53, 53); font-family: montserrat, sans-serif, calibri, tahoma, verdana; font-size: 15px;">Le cadre institutionnel, législatif et réglementaire a connu des mutations favorables à la mise en œuvre de la PNDA mais demeure peu attractif du point de vue des acteurs de champ.</span><br></p>'),
(71, 13, 'Le financement des secteurs de l’artisanat et du tourisme sont-ils en adéquation avec les objectifs de la PNDA ?', '<p><span style="color: rgb(53, 53, 53); font-family: montserrat, sans-serif, calibri, tahoma, verdana; font-size: 15px;">Pas de réponse claire de l\'évaluation.</span><br></p>'),
(72, 13, 'Quels sont les effets de la mise en œuvre de la PNDA sur la croissance économique? Dans quelles mesures a-t-elle impacté la réduction de la pauvreté ?', '<p style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">La contribution moyenne du secteur de l’artisanat est environ 10,8% du PIB du Bénin. Elle est relativement faible par rapport à la contribution des autres sous-secteurs de l’économie nationale.</p><p style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">L’impact de la PNDA sur l’emploi est apprécié par le nombre d’emplois permanents et occasionnels générés par les entreprises artisanales. Entre 2006 et 2007, l’effectif global des employés permanents a progressé de 10%. Le nombre d’emplois occasionnels a évolué dans la même proportion que celui des emplois permanents.</p><p style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Sur la base des résultats issus des enquêtes réalisées, 36% des agents enquêtés ont reconnu que la mise en œuvre de la PNDA a entrainé une augmentation de leur revenu sans pouvoir toutefois indiquer dans quelle proportion.</p>'),
(73, 14, 'Présenter le profil social du béninois en 2013', '<p><span style="color: rgb(53, 53, 53); font-family: montserrat, sans-serif, calibri, tahoma, verdana; font-size: 15px;">Le secteur primaire représente 37,86% du PIB (Produit Intérieur Brut) et emploie près de 60 % de la population active. Le secteur secondaire béninois n’occupe que 10% de la population active e représente 14,2% du PIB. Le secteur tertiaire quant à elle emploie 40 % de la population active et représente 31,46% du PIB.</span><br></p>'),
(74, 14, 'Faire l’état des lieux du secteur (informel, formel) pétrolier au Bénin', '<p><span style="color: rgb(53, 53, 53); font-family: montserrat, sans-serif, calibri, tahoma, verdana; font-size: 15px;">Au niveau social, le secteur de l’éducation a connu des résultats positifs en termes d’accès à tous les niveaux d’enseignement et d’équité au primaire et par une amélioration de l’inscription des filles au premier cycle du secondaire. Des progrès ont été également enregistrés dans les secteurs de la santé, de l’eau et assainissement ainsi que celui de l’environnement en termes de fourniture de services publics.</span><br></p>'),
(75, 14, 'Dentifier les réformes à mettre œuvre pour la suppression à moyen et long terme du secteur informel dans le domaine pétrolier ;', '<ul style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px 0px 0px 20px; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-size: 12px;"><li style="padding: 0px; margin: 0px 0px 5px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Encourager la création et l’installation des stations-service ;</li><li style="padding: 0px; margin: 0px 0px 5px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Rendre disponible le produit (s’assurer de la bonne qualité) à moindre coût ;</li><li style="padding: 0px; margin: 0px 0px 5px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Aider les vendeurs du « kpayo» à créer les mini-stations ;</li><li style="padding: 0px; margin: 0px 0px 5px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Développer la micro-finance par le recrutement des jeunes diplômés ;</li><li style="padding: 0px; margin: 0px 0px 5px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Réorganiser le secteur informel tout en imposant aux acteurs des taxes et impôts ;</li><li style="padding: 0px; margin: 0px 0px 5px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Filtrer les entrées au niveau de la frontière Nigeria-Bénin ;</li><li style="padding: 0px; margin: 0px 0px 5px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Coopérer avec le Nigeria sur la question ;</li><li style="padding: 0px; margin: 0px 0px 5px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Mener une étude profonde sur la question avant de prendre les décisions ;</li><li style="padding: 0px; margin: 0px 0px 5px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Mettre en place les infrastructures routières pour permettre aux acteurs de disposer de localisation pour construire des mini-stations ;</li><li style="padding: 0px; margin: 0px 0px 5px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Procéder à la sensibilisation de la population sur les dangers, les méfaits du « Kpayo » ;</li><li style="padding: 0px; margin: 0px 0px 5px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Doter chaque vendeur d’un moyen de financement ;</li><li style="padding: 0px; margin: 0px 0px 5px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Négocier avec les grossistes pour trouver un terrain d’entente ;</li><li style="padding: 0px; margin: 0px 0px 5px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Aider les vendeurs à créer des associations pour qu’à la fin de chaque mois ils puissent verser une somme dans la caisse de l’état ;</li><li style="padding: 0px; margin: 0px 0px 5px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Créer des emplois pour la reconversion des vendeurs ;</li><li style="padding: 0px; margin: 0px 0px 5px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Encourager le secteur agricole ;</li><li style="padding: 0px; margin: 0px 0px 5px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Alléger les procédures de création des stations afin de permettre aux grossistes et aux privés de construire des stations ;</li><li style="padding: 0px; margin: 0px 0px 5px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Rendre disponible le produit à moindre coût ;</li><li style="padding: 0px; margin: 0px 0px 5px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Interdire l’importation de l’essence dans le pays ;</li><li style="padding: 0px; margin: 0px 0px 5px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Formaliser le secteur informel ;</li><li style="padding: 0px; margin: 0px 0px 5px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Signer un partenariat avec le Nigéria afin de rendre l’essence sensiblement au même prix que dans les stations du Nigéria ;</li></ul>'),
(76, 14, 'Evaluer l’effet de la suppression de ce commerce illicite sur la pauvreté.', '<p><span style="color: rgb(53, 53, 53); font-family: montserrat, sans-serif, calibri, tahoma, verdana; font-size: 15px;">Les effets de la mise en œuvre des réformes pour la suppression du secteur informel dans le secteur pétrolier peuvent être positifs ou négatifs dépendant de la prise en compte de l’avis des acteurs du secteur informel.</span><br></p>'),
(77, 15, 'La PNT est-elle cohérente avec les Orientations Stratégiques de Développement ?', '<p><span style="color: rgb(53, 53, 53); font-family: montserrat, sans-serif, calibri, tahoma, verdana; font-size: 15px;">Les stratégies de la PNT internalisent les orientations nationales, sous régionales et internationales de développement et enrichissent la mission du Gouvernement en faveur du développement du secteur du tourisme.</span><br></p>'),
(78, 15, 'Les cadres institutionnel, législatif et réglementaire de mise en œuvre de la PNT sont-ils adéquats pour prendre en charge efficacement les nouveaux défis du secteur du tourisme ?', '<p style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">L\'insuffisance d\'information notée au niveau du diagnostic du secteur montre qu\'il existe des limites dans la collaboration interne entre les directions techniques dudit ministère.</p><p style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">NB : Question non suffisamment prise en charge par l\'évaluation.</p>'),
(79, 15, 'Le financement du secteur du tourisme est-il en adéquation avec les objectifs de la PNT ?', '<p style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">La politique ne dispose pas d\'un plan de financement.</p><p style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">NB : Question non clairement prise en charge par l\'évaluation.</p>'),
(80, 15, 'Le financement des secteurs de l’artisanat et du tourisme sont-ils en adéquation avec les objectifs de la PNDA ?', '<p><span style="color: rgb(53, 53, 53); font-family: montserrat, sans-serif, calibri, tahoma, verdana; font-size: 15px;">Pas de réponse claire de l\'évaluation.</span><br></p>'),
(81, 15, 'La mise en œuvre de la PNT pourrait-elle véritablement avoir un impact sur la croissance économique et la réduction de la pauvreté? Dans quelles conditions ?', '<p style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Le document de politique n’a pas proposé une analyse d’impact prévisionnel pour préciser de combien va s’améliorer sa contribution à la croissance économique, à la réduction du taux de chômage et à la réduction de la pauvreté.</p><p style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">NB : Question évaluative non véritablement prise en charge par la mission.</p>'),
(82, 16, 'Faire l’état des lieux dans le sous secteur de l’hygiène et de l’assainissement ;', '<p style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Etat des lieux dans le sous secteur de l’hygiène et de l’assainissement : Pendant longtemps, la gestion du secteur de l’hygiène et de l’assainissement au Bénin s\'est basée sur des textes datant de la période coloniale. C’est seulement en 1987 que le Bénin s’est doté de deux nouvelles lois pour réglementer le sous-secteur. Il s’agit de :</p><ul style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px 0px 0px 20px; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-size: 12px;"><li style="padding: 0px; margin: 0px 0px 5px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">la Loi n° 87-15 portant code d’hygiène permettant de réglementer le comportement des citoyens vis-à-vis de leur cadre de vie ;</li><li style="padding: 0px; margin: 0px 0px 5px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">la Loi n°87-16 portant code de l’eau.</li></ul><p style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Ces deux lois n’ont pas comblé les attentes, surtout parce qu\'elles n\'ont été que faiblement vulgarisées.<br style="padding: 0px; margin: 0px; font-size: 12px;">Le Bénin s’est ensuite doté, en 1990, d’une nouvelle Constitution qui, en ses articles 27, 28, 29 et 74, a érigé en droit constitutionnel, le droit à un environnement sain. Dès lors, il est devenu impérieux de doter le pays d’une vraie politique en matière d’assainissement. C’est alors qu’a été adoptée la politique nationale d’assainissement (PNA). Cette politique fondée sur un état des lieux du sous secteur de l’hygiène et de l’assainissement a mis un accent sur les problématiques suivantes :</p><ul style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px 0px 0px 20px; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-size: 12px;"><li style="padding: 0px; margin: 0px 0px 5px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">un faible taux de couverture dans la quasi-totalité des domaines du secteur ;</li><li style="padding: 0px; margin: 0px 0px 5px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">une dispersion des rôles et un manque de précision dans leur définition ayant constitué un blocage sérieux à l’efficacité des services.</li></ul><p style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Le droit constitutionnel à un environnement sain a conduit à l\'adoption de la politique nationale d’assainissement (PNA). Pour atteindre ces objectifs, il a été décidé de la création de différents comités et organes. La contre performance notée dans le secteur s’explique par la mobilité des cadres et le manque de suivi des différentes étapes du processus. En somme, les principes de la PNA ont été mis en œuvre même si certaines insuffisances ont été notées ça et là.</p>'),
(83, 16, 'Évaluer les conditions sanitaires de la population sur le plan de l’hygiène et de l’assainissement ;', '<p style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Evaluation des conditions sanitaires de la population sur le plan de l’hygiène et de l’assainissement : Les quantités produites de déchets solides ménagers au Bénin sont impressionnantes : la production moyenne de déchets solides ménagers est estimée à 0,42 kg / habitant / jour avec une quantité nationale annuelle de déchets solides ménagers estimée en 2012, à 1 381 525 tonnes. Les communes du Bénin peinent à trouver une solution permettant de gérer efficacement les déchets.</p><p style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Les déchets biomédicaux sont évalués à 1396,125 tonnes, soit un volume de 3405,6 m3 de déchets provenant de 2345 formations sanitaires dont 1744 pour le secteur privé et 601 pour le secteur public (DHAB 2009).<br style="padding: 0px; margin: 0px; font-size: 12px;">Les eaux usées domestiques sont issues des activités ménagères (eaux de cuisine et de lessive). Dans 66,9% des ménages urbains, elles sont simplement rejetées dans l\'enceinte des parcelles, sur les voies publiques ou dans les ouvrages d’assainissement (caniveaux). En ce qui concerne les excréta, on remarque quatre (4) modes d’aisance aussi bien en milieu rural qu’en milieu urbain. La défécation dans la nature constitue le principal mode d’aisance en milieu rural (68%). A Cotonou, l’utilisation des latrines à fosse ventilée est plus remarquée. Seulement 3,7% des populations béninoises utilisent des toilettes avec chasse d’eau et le reste utilise des latrines sèches simples. Les modes de gestion des excréta rencontrés dans les zones lacustres, sont la défécation directe dans les plans d’eau.</p><p style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">La problématique du secteur est marquée par quatre points essentiels :<br style="padding: 0px; margin: 0px; font-size: 12px;">Responsabilité des communes faiblement assumée, volonté politique insuffisamment affirmée dans le secteur de l’hygiène et de l’assainissement, cadre juridique et institutionnel favorable mais l’inexistence de coordination et de leadership du secteur a constitué un handicap à son développement jusqu\'à récemment, Faible utilisation des mécanismes durables de financement du secteur de l’hygiène et de l’assainissement.</p>'),
(84, 16, 'Faire une analyse comparative des conditions de vie des populations des communes faiblement, moyennement et plus assainies, en ressortir l’handicap ou l’opportunité pour l’amélioration des conditions de vie de la population.', '<p><span style="color: rgb(53, 53, 53); font-family: montserrat, sans-serif, calibri, tahoma, verdana; font-size: 15px;">Analyse comparative des conditions de vie des populations: Selon les responsables des centres de santé rencontrés, les principaux maux qui sévissent dans les quartiers périphériques et insalubres des communes plus assainies sont la diarrhée et le paludisme (40%). Cet état de choses est exacerbé par la non observance des règles d’hygiène après la défécation des enfants.</span><br style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px; margin: 0px; font-size: 12px; color: rgb(53, 53, 53);"><span style="color: rgb(53, 53, 53); font-family: montserrat, sans-serif, calibri, tahoma, verdana; font-size: 15px;">Dans les communes moyennement assainies, les principaux maux qui continuent de sévir dans ces communes sont la diarrhée, le kwashiorkor et le paludisme. Selon ceux-ci, 45% des patients souffrent du paludisme, ce qui témoigne du manque d’hygiène et d’assainissement du cadre de vie de ces populations (mauvaise gestion des déchets liquides et solides). Dans les communes moins assainies, on note la prévalence surtout dans leurs quartiers périphériques et insalubres de certaines maladies telles que la diarrhée, le kwashiorkor et le paludisme. 50% des patients souffrent du paludisme ce qui dénote de la non observance des bonnes pratiques d’hygiène et d’assainissement dans leur cadre de vie.</span><br></p>'),
(85, 16, 'Analyser les facteurs explicatifs des comportements des populations en matière d’hygiène et d’assainissement ;', '<p><span style="color: rgb(53, 53, 53); font-family: montserrat, sans-serif, calibri, tahoma, verdana; font-size: 15px;">Facteurs explicatifs des comportements des populations en matière d’hygiène et d’assainissement : Près de 9 ménages sur 10 (88,6%) ne disposant pas de latrines dans son ménage évoquent le manque de moyens financiers comme principale raison de l’absence de cette infrastructure. Cependant en dehors de l’insuffisance de revenus pour se doter de cet équipement important, les habitudes socioculturelles pourraient aussi expliquer dans la mesure où certains enquêtés continuent de ne par voir l’intérêt d’en disposer ou évoquent les nuisances (odeur/danger/honte) pour ne pas en disposer.</span><br style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px; margin: 0px; font-size: 12px; color: rgb(53, 53, 53);"><span style="color: rgb(53, 53, 53); font-family: montserrat, sans-serif, calibri, tahoma, verdana; font-size: 15px;">En ce qui concerne les ordures ménagères, seulement 26,4 % des ménages enquêtés ont déclaré se débarrasser de leurs ordures ménagères par la voirie privé/ONG ou par la voirie publique alors que sur le plan national la proportion est de 13,1% (EMICOV, 2010). Les pratiques dominantes sont l\'abandon des ordures dans l\'espace public. Quatre ménages enquêtés sur 10 (40,5%), justifient cette manière de se débarrasser des ordures par l’inexistence de système de collecte des ordures ménagères dans leurs localités.</span><br style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px; margin: 0px; font-size: 12px; color: rgb(53, 53, 53);"><span style="color: rgb(53, 53, 53); font-family: montserrat, sans-serif, calibri, tahoma, verdana; font-size: 15px;">Il ressort de l’examen de ces éléments que le niveau d’instruction, le standing de l’habitat et les conditions socio économiques constituent entre autres des déterminants plausibles en matière de connaissances, comportements, aptitudes et pratiques des communautés dans les domaines de l’hygiène et de l’assainissement dans les communes échantillon sur toute l’étendue du territoire.</span><br></p>'),
(86, 16, 'Analyser les perspectives en matière d’hygiène et d’assainissement.', '<p><span style="color: rgb(53, 53, 53); font-family: montserrat, sans-serif, calibri, tahoma, verdana; font-size: 15px;">Perspectives en matière d’hygiène et d’assainissement :</span><br style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px; margin: 0px; font-size: 12px; color: rgb(53, 53, 53);"><span style="color: rgb(53, 53, 53); font-family: montserrat, sans-serif, calibri, tahoma, verdana; font-size: 15px;">Les communes bénéficiant depuis 5 ans de ressources transférés et de fonds mis à disposition au travers du FADEC affecté, ont pu et pourront réaliser des ouvrages à usage collectif en milieu scolaire, dans les centres de santé, les lieux publics (marchés, gares) augmentant ainsi significativement l\'accès des populations à l\'hygiène et l\'assainissement.</span><br style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px; margin: 0px; font-size: 12px; color: rgb(53, 53, 53);"><span style="color: rgb(53, 53, 53); font-family: montserrat, sans-serif, calibri, tahoma, verdana; font-size: 15px;">L\'économie de temps pour les membres actifs des ménages est un élément d\'opportunité en termes d\'hygiène et d\'assainissement.</span><br style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px; margin: 0px; font-size: 12px; color: rgb(53, 53, 53);"><span style="color: rgb(53, 53, 53); font-family: montserrat, sans-serif, calibri, tahoma, verdana; font-size: 15px;">En termes de coût d\'opportunité, le Bénin perd 52 milliards FCFA chaque année à cause d\'un mauvais assainissement, dont 39 milliards à cause de morts prématurées (7.000 béninois dont 4.300 enfants de moins de 5 ans), 350 millions de perte de productivité pendant la maladie et 1,6 milliards de frais de soins de santé. Les pauvres payent plus cher que les riches les effets du mauvais assainissement. Dans ces coûts économiques sur la santé provoqué par le manque d\'assainissement ne sont pas comptés les coûts adjacents des funérailles, des épidémies, de la pollution durable de l\'eau, de la perte d\'efficacité des actions de développement, etc., autant de pertes que tous les efforts en matière de santé ne peuvent en aucun cas contrebalancer.</span><br></p>');

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
(16, 'pauvrete5dd0b1929009c', 'Pauvreté', 'Secteur d\'évaluations portant sur la Pauvreté au Bénin'),
(17, 'autres-secteurs-sociaux5dd26fe3e3c21', 'Autres secteurs sociaux', 'Secteur d\'évaluations portant sur d\'autres secteurs sociaux'),
(18, 'mines5dd3c37992c57', 'Mines', 'Secteur d\'évaluations portant sur les Mines au Bénin'),
(19, 'sante5dd3ca9bd7e6a', 'Santé', 'Secteur d\'évaluations portant sur la Santé au Bénin'),
(20, 'habitat5dd3cae375c27', 'Habitat', 'Secteur d\'évaluations portant sur l\'Habitat au Bénin'),
(21, 'education5dd3f893abd1b', 'Education', 'Secteur d\'évaluations portant sur l\'Education au Bénin'),
(22, 'infrastructures5dd3f8c883ab9', 'Infrastructures', 'Secteur d\'évaluations portant sur les Infrastructures au Bénin'),
(23, 'administration5dd3f8e9b4c1f', 'Administration', 'Secteur d\'évaluations portant sur l\'Administration au Bénin'),
(24, 'artisanat-et-tourisme5dd3fab54438d', 'Artisanat et Tourisme', 'Artisanat et Tourisme'),
(25, 'services5dd62631820ff', 'Services', 'Secteur d\'évaluations portant sur les services au Bénin'),
(26, 'eau-et-electricite5dd64f2218e3e', 'Eau et Electricité', 'Secteur d\'evaluation portant sur l\'Eau et Electricité');

-- --------------------------------------------------------

--
-- Structure de la table `evaluation_sector_groups`
--

CREATE TABLE `evaluation_sector_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `evaluation_id` int(10) UNSIGNED NOT NULL,
  `sector_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `evaluation_sector_groups`
--

INSERT INTO `evaluation_sector_groups` (`id`, `evaluation_id`, `sector_id`) VALUES
(78, 12, 17),
(79, 12, 16),
(81, 13, 24),
(82, 14, 14),
(83, 15, 24),
(84, 16, 19);

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
(1, 'ex-ante5dd05acc33c85', 'Ex-ante', 'Evaluations ayant pour temporalité Ex-ante'),
(2, 'finale5dd3d7361ed44', 'Finale', 'Evaluations ayant pour temporalité Finale'),
(3, 'mi-parcours5dd3f9265de47', 'Mi-Parcours', 'Evaluations ayant pour temporalité Mi-Parcours'),
(4, 'ex-post5dd3f9c902fd8', 'Ex-post', 'Evaluations ayant pour temporalité Ex-Post');

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
(4, 'aucune5dd0b2187d444', 'Aucune', 'Thématique d\'évaluation non classée'),
(5, 'genre5dd2700f30dad', 'Genre', 'Evaluations ayant rapport avec la thématiques Genre'),
(6, 'environnement5dd2702744683', 'Environnement', 'Evaluations ayant rapport avec la thématiques Environnement'),
(7, 'equite5dd3d7572c69b', 'Equité', 'Evaluations ayant rapport avec la thématiques Equité');

-- --------------------------------------------------------

--
-- Structure de la table `evaluation_thematic_groups`
--

CREATE TABLE `evaluation_thematic_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `evaluation_id` int(10) UNSIGNED NOT NULL,
  `thematic_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `evaluation_thematic_groups`
--

INSERT INTO `evaluation_thematic_groups` (`id`, `evaluation_id`, `thematic_id`) VALUES
(102, 12, 6),
(103, 12, 5),
(104, 12, 3),
(106, 13, 6),
(107, 14, 4),
(108, 15, 4),
(109, 16, 6),
(110, 16, 5),
(111, 16, 3);

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
(3, 'evaluation-finale5dd0b1ded7a2b', 'Evaluation finale', 'Catégorie d\'évaluations en phase de finalisation'),
(4, 'evaluation-ex-post5dd3fa943ab2d', 'Evaluation ex post', 'Evaluation ex post'),
(5, 'analyse-economique5ddd5c2b0d5f7', 'Analyse économique', 'Analyse économique'),
(6, 'evaluation-ex-ante5ddd5ebfe96da', 'Evaluation ex ante', 'Evaluation ex ante');

-- --------------------------------------------------------

--
-- Structure de la table `events`
--

CREATE TABLE `events` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(50) NOT NULL,
  `title` text NOT NULL,
  `location` text,
  `active` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `created_by` int(10) UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `starts_at` datetime DEFAULT NULL,
  `ends_at` datetime DEFAULT NULL,
  `category_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `events`
--

INSERT INTO `events` (`id`, `slug`, `title`, `location`, `active`, `created_by`, `created_at`, `updated_at`, `starts_at`, `ends_at`, `category_id`) VALUES
(1, 'seminaire-sur-la-bonne-gestion-des-proce5ddd316ca5', 'Séminaire sur la bonne gestion des processus d\'évaluation', ' Espace DINA, St Michel, Cotonou, Bénin', 1, 1, '2019-11-26 14:06:36', '2019-11-26 14:12:36', '2019-11-05 00:00:00', '2019-11-16 00:00:00', 1),
(2, '22eme-colloque-et-lecole-dete-du-sifee5ddd4bf338dd', '22ème colloque et l’école d’été du SIFÉE', ' Espace DINA, St Michel', 1, 1, '2019-11-26 15:59:47', NULL, '2019-12-04 00:00:00', '2019-12-28 00:00:00', 3),
(3, '36eme-session-du-conseil-des-ministres-d5ddd4cd088', '36ème Session du Conseil des Ministres du CAMES', ' Espace DINA, St Michel', 1, 1, '2019-11-26 16:03:28', NULL, '2019-12-12 00:00:00', '2019-12-29 00:00:00', 4),
(4, 'gala-des-champions-20185ddd4d9538dff', 'Gala des Champions 2018', 'Centre International des Conférences de Cotonou (CIC)', 1, 1, '2019-11-26 16:06:45', NULL, NULL, NULL, 5),
(5, 'semaine-du-numerique5ddd4e79a0281', 'Semaine du numérique', 'Golden Tulip Hotel', 1, 1, '2019-11-26 16:10:33', NULL, NULL, NULL, 4),
(6, 'pelerinage-annuel-et-touristique-de-ouid5ddd500a29', 'Pélérinage Annuel et Touristique de Ouidah', 'Ouidah', 1, 1, '2019-11-26 16:17:14', NULL, '2019-12-26 00:00:00', '2019-12-31 00:00:00', 6);

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

--
-- Contenu de la table `event_categories`
--

INSERT INTO `event_categories` (`id`, `slug`, `name`, `description`) VALUES
(1, 'seminaire5ddd233fd058d', 'Séminaire', 'Evènement de type Séminaires'),
(2, 'formation5ddd27ac1d688', 'Formation', 'Evènement de type Séminaires'),
(3, 'colloque5ddd4ba87c971', 'Colloque', 'Evenement classés sur Colloque'),
(4, 'session5ddd4c5e22cc8', 'Session', 'Evenement classés sous Session'),
(5, 'gala5ddd4d25eef12', 'Gala', 'Evenement classés sous Gala'),
(6, 'tourisme5ddd4fb0d3f58', 'Tourisme', 'Evenement classés sous tourisme\r\n');

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

--
-- Contenu de la table `event_meta`
--

INSERT INTO `event_meta` (`id`, `event_id`, `key`, `value`) VALUES
(1, 1, 'content', '<p style="font-family: Lato, sans-serif; color: rgb(119, 119, 119); margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 24px; font-size: 16px;">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed d Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed d</p><p style="font-family: Lato, sans-serif; color: rgb(119, 119, 119); margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 24px; font-size: 16px;">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed d Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed d</p><p style="font-family: Lato, sans-serif; color: rgb(119, 119, 119); margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 24px; font-size: 16px;">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed d Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed d</p><p style="font-family: Lato, sans-serif; color: rgb(119, 119, 119); margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 24px; font-size: 16px;">Consectetur turpis, et convallis mi. Nunc eu semper augue. Vestibulum justo nisi, lobortis sed est et, faucibus fringilla metus. Donec ipsum quam, laoreet ac ex non, hendrerit malesuada risus.</p>'),
(2, 1, 'thumbnail', '48875438238_133f358dac_c2.jpg'),
(3, 2, 'content', '<p style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 0px; margin-bottom: 23px; margin-left: 0px; font-size: 16px; color: rgb(51, 51, 51); font-family: Lato, sans-serif;"><em style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility;"><span style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; font-weight: bolder;">Le prix Equateur est un programme dont le but est de féliciter les communautés locales du monde entier, auteures des projets innovants, répondants aux problèmes du changement climatique, de l’environnement et de la pauvreté grandissante que le monde cherche à résoudre.</span></em></p><div class="my-pub" style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; color: rgb(51, 51, 51); font-family: Lato, sans-serif; font-size: 16px;"><ins class="adsbygoogle" data-ad-layout="in-article" data-ad-format="fluid" data-ad-client="ca-pub-6070593719826671" data-ad-slot="9609258602" data-adsbygoogle-status="done" style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; display: block; text-align: center; height: 0px;"><ins id="aswift_1_expand" style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; display: inline-table; border: none; height: 0px; margin: 0px; padding: 0px; position: relative; visibility: visible; width: 810px; background-color: transparent;"><ins id="aswift_1_anchor" style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; display: block; border: none; height: 0px; margin: 0px; padding: 0px; position: relative; visibility: visible; width: 810px; background-color: transparent; overflow: hidden; opacity: 0;"><iframe width="810" height="200" frameborder="0" marginwidth="0" marginheight="0" vspace="0" hspace="0" allowtransparency="true" scrolling="no" allowfullscreen="true" id="aswift_1" name="aswift_1" style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; left: 0px; position: absolute; top: 0px; width: 810px; height: 200px;"></iframe></ins></ins></ins></div><p style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 0px; margin-bottom: 23px; margin-left: 0px; font-size: 16px; color: rgb(51, 51, 51); font-family: Lato, sans-serif;">Les 22 communautés locales et autochtones du monde entier qui recevront à New York,les prix qui seront décernés en accord avec&nbsp; le Programme des Nations Unies pour le développement (PNUD)&nbsp;,sont issus respectivement de Guinée Bissau, Australie,Australie,États-Unis,Bénin,Brésil,Cameroun,Équateur,Inde,Indonésie, Kenya, Micronésie, Nigéria, au Pakistan, Pérou,Tanzanie et au Vanuatu.&nbsp;Ces lauréats du prix Equateur de cette année rejoint ainsi, l’ensemble des 223 communautés qui ont eu le privilège d’être les premiers gagnants dès la naissance de l’initiative Prix Equateur en 2002.</p><p style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 0px; margin-bottom: 23px; margin-left: 0px; font-size: 16px; color: rgb(51, 51, 51); font-family: Lato, sans-serif;">Les communautés locales du monde entier sélectionnés ont pu attirer l’attention des experts de renommée internationale, désignés pour analyser la qualité du plan d’action et des approches de solutions de sortie de crise fournies par chaque communauté locale du monde entier alors qu’ils étaient 847 candidats provenant de 127 pays sur la liste.«&nbsp;<em style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility;"><span style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; font-weight: bolder;">Chaque&nbsp;jour, des milliers de communautés locales et de peuples autochtones du monde entier mettent en œuvre sans faire de bruit des solutions innovantes basées sur la nature pour atténuer les effets du changement climatique et pour s’y adapter.&nbsp;Le Prix Équateur est à la fois une reconnaissance de leurs idées exceptionnelles et un moyen de mettre en valeur le pouvoir des personnes et des communautés de base de susciter un réel changement.</span></em>&nbsp;»Soutien Achim Steiner, administrateur du PNUD cité par “newspress”. Comme récompense, les gagnants au cours de la cérémonie de remise des prix au Town Hall Theatre à Midtown Manhattan(New-York), le 24 septembre 2019, prendront par tête, 10 000 USD. Ils auront aussi le choix de désigner deux&nbsp; membres de leur communauté pour participer au 74e Assemblée générale des Nations Unies.</p>'),
(4, 2, 'thumbnail', 'retour_colloque_sqvt.jpg'),
(5, 3, 'content', '<p style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 0px; margin-bottom: 23px; margin-left: 0px; font-size: 16px; color: rgb(51, 51, 51); font-family: Lato, sans-serif;"><em style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility;"><span style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; font-weight: bolder;">Le prix Equateur est un programme dont le but est de féliciter les communautés locales du monde entier, auteures des projets innovants, répondants aux problèmes du changement climatique, de l’environnement et de la pauvreté grandissante que le monde cherche à résoudre.</span></em></p><div class="my-pub" style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; color: rgb(51, 51, 51); font-family: Lato, sans-serif; font-size: 16px;"><ins class="adsbygoogle" data-ad-layout="in-article" data-ad-format="fluid" data-ad-client="ca-pub-6070593719826671" data-ad-slot="9609258602" data-adsbygoogle-status="done" style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; display: block; text-align: center; height: 0px;"><ins id="aswift_1_expand" style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; display: inline-table; border: none; height: 0px; margin: 0px; padding: 0px; position: relative; visibility: visible; width: 810px; background-color: transparent;"><ins id="aswift_1_anchor" style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; display: block; border: none; height: 0px; margin: 0px; padding: 0px; position: relative; visibility: visible; width: 810px; background-color: transparent; overflow: hidden; opacity: 0;"><iframe width="810" height="200" frameborder="0" marginwidth="0" marginheight="0" vspace="0" hspace="0" allowtransparency="true" scrolling="no" allowfullscreen="true" id="aswift_1" name="aswift_1" style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; left: 0px; position: absolute; top: 0px; width: 810px; height: 200px;"></iframe></ins></ins></ins></div><p style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 0px; margin-bottom: 23px; margin-left: 0px; font-size: 16px; color: rgb(51, 51, 51); font-family: Lato, sans-serif;">Les 22 communautés locales et autochtones du monde entier qui recevront à New York,les prix qui seront décernés en accord avec&nbsp; le Programme des Nations Unies pour le développement (PNUD)&nbsp;,sont issus respectivement de Guinée Bissau, Australie,Australie,États-Unis,Bénin,Brésil,Cameroun,Équateur,Inde,Indonésie, Kenya, Micronésie, Nigéria, au Pakistan, Pérou,Tanzanie et au Vanuatu.&nbsp;Ces lauréats du prix Equateur de cette année rejoint ainsi, l’ensemble des 223 communautés qui ont eu le privilège d’être les premiers gagnants dès la naissance de l’initiative Prix Equateur en 2002.</p><p style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 0px; margin-bottom: 23px; margin-left: 0px; font-size: 16px; color: rgb(51, 51, 51); font-family: Lato, sans-serif;">Les communautés locales du monde entier sélectionnés ont pu attirer l’attention des experts de renommée internationale, désignés pour analyser la qualité du plan d’action et des approches de solutions de sortie de crise fournies par chaque communauté locale du monde entier alors qu’ils étaient 847 candidats provenant de 127 pays sur la liste.«&nbsp;<em style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility;"><span style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; font-weight: bolder;">Chaque&nbsp;jour, des milliers de communautés locales et de peuples autochtones du monde entier mettent en œuvre sans faire de bruit des solutions innovantes basées sur la nature pour atténuer les effets du changement climatique et pour s’y adapter.&nbsp;Le Prix Équateur est à la fois une reconnaissance de leurs idées exceptionnelles et un moyen de mettre en valeur le pouvoir des personnes et des communautés de base de susciter un réel changement.</span></em>&nbsp;»Soutien Achim Steiner, administrateur du PNUD cité par “newspress”. Comme récompense, les gagnants au cours de la cérémonie de remise des prix au Town Hall Theatre à Midtown Manhattan(New-York), le 24 septembre 2019, prendront par tête, 10 000 USD. Ils auront aussi le choix de désigner deux&nbsp; membres de leur communauté pour participer au 74e Assemblée générale des Nations Unies.</p>'),
(6, 3, 'thumbnail', 'CONSEIL-MINISTRES-660x4002x.jpg'),
(7, 4, 'content', '<p style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 0px; margin-bottom: 23px; margin-left: 0px; font-size: 16px; color: rgb(51, 51, 51); font-family: Lato, sans-serif;"><em style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility;"><span style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; font-weight: bolder;">Le prix Equateur est un programme dont le but est de féliciter les communautés locales du monde entier, auteures des projets innovants, répondants aux problèmes du changement climatique, de l’environnement et de la pauvreté grandissante que le monde cherche à résoudre.</span></em></p><div class="my-pub" style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; color: rgb(51, 51, 51); font-family: Lato, sans-serif; font-size: 16px;"><ins class="adsbygoogle" data-ad-layout="in-article" data-ad-format="fluid" data-ad-client="ca-pub-6070593719826671" data-ad-slot="9609258602" data-adsbygoogle-status="done" style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; display: block; text-align: center; height: 0px;"><ins id="aswift_1_expand" style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; display: inline-table; border: none; height: 0px; margin: 0px; padding: 0px; position: relative; visibility: visible; width: 810px; background-color: transparent;"><ins id="aswift_1_anchor" style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; display: block; border: none; height: 0px; margin: 0px; padding: 0px; position: relative; visibility: visible; width: 810px; background-color: transparent; overflow: hidden; opacity: 0;"><iframe width="810" height="200" frameborder="0" marginwidth="0" marginheight="0" vspace="0" hspace="0" allowtransparency="true" scrolling="no" allowfullscreen="true" id="aswift_1" name="aswift_1" style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; left: 0px; position: absolute; top: 0px; width: 810px; height: 200px;"></iframe></ins></ins></ins></div><p style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 0px; margin-bottom: 23px; margin-left: 0px; font-size: 16px; color: rgb(51, 51, 51); font-family: Lato, sans-serif;">Les 22 communautés locales et autochtones du monde entier qui recevront à New York,les prix qui seront décernés en accord avec&nbsp; le Programme des Nations Unies pour le développement (PNUD)&nbsp;,sont issus respectivement de Guinée Bissau, Australie,Australie,États-Unis,Bénin,Brésil,Cameroun,Équateur,Inde,Indonésie, Kenya, Micronésie, Nigéria, au Pakistan, Pérou,Tanzanie et au Vanuatu.&nbsp;Ces lauréats du prix Equateur de cette année rejoint ainsi, l’ensemble des 223 communautés qui ont eu le privilège d’être les premiers gagnants dès la naissance de l’initiative Prix Equateur en 2002.</p><p style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 0px; margin-bottom: 23px; margin-left: 0px; font-size: 16px; color: rgb(51, 51, 51); font-family: Lato, sans-serif;">Les communautés locales du monde entier sélectionnés ont pu attirer l’attention des experts de renommée internationale, désignés pour analyser la qualité du plan d’action et des approches de solutions de sortie de crise fournies par chaque communauté locale du monde entier alors qu’ils étaient 847 candidats provenant de 127 pays sur la liste.«&nbsp;<em style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility;"><span style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; font-weight: bolder;">Chaque&nbsp;jour, des milliers de communautés locales et de peuples autochtones du monde entier mettent en œuvre sans faire de bruit des solutions innovantes basées sur la nature pour atténuer les effets du changement climatique et pour s’y adapter.&nbsp;Le Prix Équateur est à la fois une reconnaissance de leurs idées exceptionnelles et un moyen de mettre en valeur le pouvoir des personnes et des communautés de base de susciter un réel changement.</span></em>&nbsp;»Soutien Achim Steiner, administrateur du PNUD cité par “newspress”. Comme récompense, les gagnants au cours de la cérémonie de remise des prix au Town Hall Theatre à Midtown Manhattan(New-York), le 24 septembre 2019, prendront par tête, 10 000 USD. Ils auront aussi le choix de désigner deux&nbsp; membres de leur communauté pour participer au 74e Assemblée générale des Nations Unies.</p>'),
(8, 4, 'thumbnail', '32893410553_12ddc6fe06_b.jpg'),
(9, 5, 'content', '<p style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 0px; margin-bottom: 23px; margin-left: 0px; font-size: 16px; color: rgb(51, 51, 51); font-family: Lato, sans-serif;"><em style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility;"><span style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; font-weight: bolder;">Le prix Equateur est un programme dont le but est de féliciter les communautés locales du monde entier, auteures des projets innovants, répondants aux problèmes du changement climatique, de l’environnement et de la pauvreté grandissante que le monde cherche à résoudre.</span></em></p><div class="my-pub" style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; color: rgb(51, 51, 51); font-family: Lato, sans-serif; font-size: 16px;"><ins class="adsbygoogle" data-ad-layout="in-article" data-ad-format="fluid" data-ad-client="ca-pub-6070593719826671" data-ad-slot="9609258602" data-adsbygoogle-status="done" style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; display: block; text-align: center; height: 0px;"><ins id="aswift_1_expand" style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; display: inline-table; border: none; height: 0px; margin: 0px; padding: 0px; position: relative; visibility: visible; width: 810px; background-color: transparent;"><ins id="aswift_1_anchor" style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; display: block; border: none; height: 0px; margin: 0px; padding: 0px; position: relative; visibility: visible; width: 810px; background-color: transparent; overflow: hidden; opacity: 0;"><iframe width="810" height="200" frameborder="0" marginwidth="0" marginheight="0" vspace="0" hspace="0" allowtransparency="true" scrolling="no" allowfullscreen="true" id="aswift_1" name="aswift_1" style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; left: 0px; position: absolute; top: 0px; width: 810px; height: 200px;"></iframe></ins></ins></ins></div><p style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 0px; margin-bottom: 23px; margin-left: 0px; font-size: 16px; color: rgb(51, 51, 51); font-family: Lato, sans-serif;">Les 22 communautés locales et autochtones du monde entier qui recevront à New York,les prix qui seront décernés en accord avec&nbsp; le Programme des Nations Unies pour le développement (PNUD)&nbsp;,sont issus respectivement de Guinée Bissau, Australie,Australie,États-Unis,Bénin,Brésil,Cameroun,Équateur,Inde,Indonésie, Kenya, Micronésie, Nigéria, au Pakistan, Pérou,Tanzanie et au Vanuatu.&nbsp;Ces lauréats du prix Equateur de cette année rejoint ainsi, l’ensemble des 223 communautés qui ont eu le privilège d’être les premiers gagnants dès la naissance de l’initiative Prix Equateur en 2002.</p><p style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 0px; margin-bottom: 23px; margin-left: 0px; font-size: 16px; color: rgb(51, 51, 51); font-family: Lato, sans-serif;">Les communautés locales du monde entier sélectionnés ont pu attirer l’attention des experts de renommée internationale, désignés pour analyser la qualité du plan d’action et des approches de solutions de sortie de crise fournies par chaque communauté locale du monde entier alors qu’ils étaient 847 candidats provenant de 127 pays sur la liste.«&nbsp;<em style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility;"><span style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; font-weight: bolder;">Chaque&nbsp;jour, des milliers de communautés locales et de peuples autochtones du monde entier mettent en œuvre sans faire de bruit des solutions innovantes basées sur la nature pour atténuer les effets du changement climatique et pour s’y adapter.&nbsp;Le Prix Équateur est à la fois une reconnaissance de leurs idées exceptionnelles et un moyen de mettre en valeur le pouvoir des personnes et des communautés de base de susciter un réel changement.</span></em>&nbsp;»Soutien Achim Steiner, administrateur du PNUD cité par “newspress”. Comme récompense, les gagnants au cours de la cérémonie de remise des prix au Town Hall Theatre à Midtown Manhattan(New-York), le 24 septembre 2019, prendront par tête, 10 000 USD. Ils auront aussi le choix de désigner deux&nbsp; membres de leur communauté pour participer au 74e Assemblée générale des Nations Unies.</p>'),
(10, 5, 'thumbnail', 'b733c957-f7c2-454d-a66d-a8775e9207ea.jpg'),
(11, 6, 'content', '<p style="line-height: 1.8;"><span style="font-size: 18px;">?</span><span style="text-align: justify; font-size: 18px;">A cette occasion, des Afro-Américains viennent à Ouidah commémorer le souvenir de leurs ancêtres. Pour les programmes des cérémonies, renseignez-vous auprès de l\'office de tourisme de Ouidah. Notez que le ministère de la Culture, s\'il engrange des bénéfices de ces manifestations, semble négliger quelques sites où les sculptures se dégradent à vue d\'oeil.</span><br></p>'),
(12, 6, 'thumbnail', '20180208_171145.jpg');

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

--
-- Contenu de la table `event_tags`
--

INSERT INTO `event_tags` (`id`, `slug`, `name`, `description`) VALUES
(1, 'sante5ddd236376545', 'Santé', 'Evenements étiquettés Santé '),
(2, 'bien-etre5ddd27c250fcd', 'Bien être', 'Evenements étiquettés Bien être'),
(3, 'societe5ddd4bc2692cb', 'Société', 'Evenement etiquetté Société'),
(4, 'conseil-des-ministre5ddd4c7948123', 'Conseil des ministre', 'Evenement étiquettés sous conseil des ministre'),
(5, 'champions5ddd4d3f0e173', 'Champions', 'Evenements classés sous champions'),
(6, 'sports5ddd4d703258d', 'Sports', 'Evenements ayant trait au Sport'),
(7, 'numerique5ddd4de78a062', 'Numérique', 'Evenement ayant trait au Numérique'),
(8, 'pelerinnage5ddd4fccc0816', 'Pelerinnage', 'Evenement étiquettés sous Pelerinnage');

-- --------------------------------------------------------

--
-- Structure de la table `event_tag_groups`
--

CREATE TABLE `event_tag_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `tag_id` int(10) UNSIGNED NOT NULL,
  `event_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `event_tag_groups`
--

INSERT INTO `event_tag_groups` (`id`, `tag_id`, `event_id`) VALUES
(3, 1, 1),
(4, 3, 2),
(5, 4, 3),
(6, 5, 4),
(7, 6, 4),
(8, 7, 5),
(9, 2, 6),
(10, 3, 6),
(11, 8, 6);

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
-- Structure de la table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text,
  `email` varchar(45) NOT NULL,
  `phone` varchar(45) DEFAULT NULL
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
(1, 'siteName', 'PGEPE'),
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
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `category_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `posts`
--

INSERT INTO `posts` (`id`, `slug`, `title`, `active`, `created_at`, `created_by`, `updated_at`, `category_id`) VALUES
(3, 'strategie-de-croissance-pour-la-reductio5ddcfbac24', 'Stratégie de croissance pour la réduction de la pauvreté', 1, '2019-11-26 10:17:16', 1, '2019-11-26 13:14:19', 7),
(4, 'insecurite-alimentaire--un-regard-sur-le5ddd01af25', 'Insécurité alimentaire : un regard sur les réponses apportées par les diverses parties prenantes', 1, '2019-11-26 10:42:55', 1, '2019-11-26 13:13:13', 4),
(5, 'politique-nationale-de-developpement-de-5ddd085d58', 'Politique Nationale de Développement de l’Artisanat (PNDA)', 2, '2019-11-26 11:11:25', 1, NULL, 3),
(6, 'benin--15-personnes-condamnees-pour-avoi5ddd39ed78', 'Bénin : 15 personnes condamnées pour avoir uriné ou jeté des ordures dans la rue', 1, '2019-11-26 14:42:53', 1, NULL, 4),
(7, 'benin-maladie-virale--le-pays-mis-en-ale5ddd3b704d', 'Bénin-Maladie Virale : Le Pays Mis En Alerte Contre La Dengue', 1, '2019-11-26 14:49:20', 1, NULL, 1),
(8, 'afrique---migration--le-plaidoyer-des-os5ddd3bff58', 'Afrique - Migration : Le Plaidoyer Des OSC À Bruxelles Sur L’accord Post-Cotonou', 1, '2019-11-26 14:51:43', 1, NULL, 1),
(9, 'benin--lambassade-des-usa-pour-leducatio5ddd3cbd71', 'Bénin : L’Ambassade Des USA Pour L’éducation Des Filles Aux Sciences Et Aux Arts', 1, '2019-11-26 14:54:53', 1, NULL, 1),
(10, 'deux-eminents-universitaires-sanctionnes5ddd3d2caa', 'Deux Éminents Universitaires Sanctionnés Par Le CAMES', 1, '2019-11-26 14:56:44', 1, NULL, 1),
(11, '2e-festival-africa-vodoun-aux-usa--leven5ddd3db1ca', '2e Festival Africa Vodoun Aux USA : L\'événement Reporté En Septembre 2019', 1, '2019-11-26 14:58:57', 1, NULL, 1),
(12, 'prix-equateur-2019pnud--les-gagnants-ser5ddd3e63e0', 'Prix Equateur 2019/PNUD : Les Gagnants Seront À New-York Pour Une Récompense', 1, '2019-11-26 15:01:55', 1, NULL, 1),
(13, 'insecurite-et-terrorisme--la-prochaine-a5ddd3ec35a', 'Insécurité Et Terrorisme : La Prochaine Assise Du Geppao Sera Autour De Ces Sujets', 1, '2019-11-26 15:03:31', 1, NULL, 1),
(14, 'parlement-du-niger--laccord-bilateral-de5ddd3f1796', 'Parlement Du Niger : L‘accord Bilatéral De Construction De Pipeline Agadem-Cotonou Ratifié', 1, '2019-11-26 15:04:55', 1, NULL, 1),
(15, 'acces-a-leau--1-personne-sur-3-manque-de5ddd4091e1', 'Accès À L’eau : 1 Personne Sur 3 Manque D’eau Potable Dans Le Monde (OMS)', 1, '2019-11-26 15:11:13', 1, NULL, 1);

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

--
-- Contenu de la table `post_categories`
--

INSERT INTO `post_categories` (`id`, `slug`, `name`, `description`) VALUES
(1, 'publication5ddcdae14be7e', 'Publication', 'Regroupement d\'Articles catégorisés sous la rubrique Publication'),
(3, 'gestion-de-connaissances5ddcdbda7e21e', 'Gestion de connaissances', 'Regroupement d\'Articles catégorisés sous la rubrique Gestion de connaissances'),
(4, 'ressources-techniques5ddcdbf6b380c', 'Ressources Techniques', 'Regroupement d\'Articles catégorisés sous la rubrique Ressources Techniques'),
(6, 'partenariat5ddce7e015eff', 'Partenariat', 'Regroupement d\'Articles catégorisés sous la rubrique Partenariat'),
(7, 'non-classe5ddcf6058fdbb', 'Non classé', 'Article non classés');

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

--
-- Contenu de la table `post_meta`
--

INSERT INTO `post_meta` (`id`, `post_id`, `key`, `value`) VALUES
(3, 3, 'content', '<p>Stratégie de croissance pour la réduction de la pauvreté</p><p>sdlklsdk</p><p>sdlsdkls&nbsp;</p><p>skdlsdk</p>'),
(4, 3, 'thumbnail', 'post1.png'),
(5, 4, 'content', '<p style="font-family: Lato, sans-serif; color: rgb(119, 119, 119); margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 24px; font-size: 16px;">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo d Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo d</p><p style="font-family: Lato, sans-serif; color: rgb(119, 119, 119); margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 24px; font-size: 16px;">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo d Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo d</p><p style="font-family: Lato, sans-serif; color: rgb(119, 119, 119); margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 24px; font-size: 16px;">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo d Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo d</p>'),
(6, 4, 'thumbnail', 'post-single.jpg'),
(7, 5, 'content', '<p style="font-family: Lato, sans-serif; color: rgb(119, 119, 119); margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 24px; font-size: 16px;">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo d Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo d</p><p style="font-family: Lato, sans-serif; color: rgb(119, 119, 119); margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 24px; font-size: 16px;">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo d Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo d</p><p style="font-family: Lato, sans-serif; color: rgb(119, 119, 119); margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 24px; font-size: 16px;">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo d Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo d</p>'),
(8, 5, 'thumbnail', 'slide1.jpg'),
(9, 6, 'content', '<h3 style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-bottom: 0px; font-family: Montserrat, sans-serif; font-weight: 600; line-height: 33px; color: rgb(34, 34, 34); padding: 5px 0px 16px;">Mi-juillet 2019 à Cotonou au&nbsp;<span class="link-complex-target" style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility;">Bénin</span>, la Police interpelle 15 personnes pris en flagrant délit d’actes d’incivisme. Ce 22 juillet 2019, le Tribunal de Cotonou a condamné 2 d’entre elles à 20 mille fcfa d’amende pour avoir fait pipi dans la rue ; et les 13 autres à 3 mois de prison avec sursis et 20 mille fcfa d’amende pour avoir jeté des ordures dans la rue.</h3><p style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 0px; margin-bottom: 23px; margin-left: 0px; font-size: 16px; color: rgb(51, 51, 51); font-family: Lato, sans-serif;">A Cotonou, le sujet est au cœur de la polémique sur les réseaux sociaux. Certains internautes critiquent ces arrestations de la Police dans une ville où il n’y a quasiment pas de toilettes publiques, ceci à l’indifférence totale des autorités municipales. Mais pour d’autres, c’est un signale fort contre les actes d’incivisme des citoyens indélicats. Pour l’activiste sociale Sandra Idossou, les autorités béninoises doivent renforcer la lutte contre les actes d’incivisme pour une ville de Cotonou propre et écologique.</p><div class="my-pub" style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; color: rgb(51, 51, 51); font-family: Lato, sans-serif; font-size: 16px;"><ins class="adsbygoogle" data-ad-layout="in-article" data-ad-format="fluid" data-ad-client="ca-pub-6070593719826671" data-ad-slot="9609258602" data-adsbygoogle-status="done" style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; display: block; text-align: center; height: 0px;"><ins id="aswift_2_expand" style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; display: inline-table; border: none; height: 0px; margin: 0px; padding: 0px; position: relative; visibility: visible; width: 870px; background-color: transparent;"><ins id="aswift_2_anchor" style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; display: block; border: none; height: 0px; margin: 0px; padding: 0px; position: relative; visibility: visible; width: 870px; background-color: transparent; overflow: hidden; opacity: 0;"><iframe width="870" height="200" frameborder="0" marginwidth="0" marginheight="0" vspace="0" hspace="0" allowtransparency="true" scrolling="no" allowfullscreen="true" id="aswift_2" name="aswift_2" style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; left: 0px; position: absolute; top: 0px; width: 870px; height: 200px;"></iframe></ins></ins></ins></div><p style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 0px; margin-bottom: 23px; margin-left: 0px; font-size: 16px; color: rgb(51, 51, 51); font-family: Lato, sans-serif;">Rappelons qu’en 2017, le Bénin s’est dotée d’une loi portant interdiction de la production, de l’importation, de l’exportation, de la commercialisation, de la détention, de la distribution et de l’utilisation de sachets en plastique non biodégradables en République du Bénin. Cette loi réprime sévèrement l’utilisation et la commercialisation du sachet plastique dans le pays.</p>'),
(10, 6, 'thumbnail', 'Pipi-dans-la-rue-891x600.jpg'),
(11, 7, 'content', '<p style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 0px; margin-bottom: 23px; margin-left: 0px; font-size: 16px; color: rgb(51, 51, 51); font-family: Lato, sans-serif;">Le Bénin est en proie à une maladie virale dite de la Dengue.</p><p style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 0px; margin-bottom: 23px; margin-left: 0px; font-size: 16px; color: rgb(51, 51, 51); font-family: Lato, sans-serif;">Dans un communiqué, le ministre de la Santé, Benjamin&nbsp;HOUNKPATIN, a annoncé au peuple béninois la présence de la dengue dans le pays. La Dengue est une maladie très dangereuse, qui tue rapidement et est transmise par les piqûres de&nbsp;moustiques.</p><p style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 0px; margin-bottom: 23px; margin-left: 0px; font-size: 16px; color: rgb(51, 51, 51); font-family: Lato, sans-serif;">Dans le communiqué, le&nbsp;ministre&nbsp;rappelle que la prise de certains&nbsp;médicaments, &lt;&lt;&nbsp;<span style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; font-weight: bolder;"><em style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility;">notamment des anti-inflammations non stéroïdiens tels que l’aspirine, l’ibuprofène, le diclofénac…&gt;&gt;,</em></span>&nbsp;peut augmenter les&nbsp;risques.</p><p style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 0px; margin-bottom: 23px; margin-left: 0px; font-size: 16px; color: rgb(51, 51, 51); font-family: Lato, sans-serif;">Les symptômes de la Dengue sont les suivants :&nbsp;courbatures<span style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; font-weight: bolder;">, maux de tête ou de ventre, vomissements simples ou avec du sang, douleurs articulaires, fatigue, saignement souvent mortels.&nbsp;</span>Tous ceux qui remarquent ces symptômes sont donc invités à se rendre au plus vite dans un centre de santé.</p><p style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 0px; margin-bottom: 23px; margin-left: 0px; font-size: 16px; color: rgb(51, 51, 51); font-family: Lato, sans-serif;">Le communiqué invite la population à l’utilisation des moustiquaires imprégnées, des crèmes répulsives, à l’assainissement de l’environnement pour limiter la propagation de la Dengue.</p>'),
(12, 7, 'thumbnail', 'A5-891x600.jpg'),
(13, 8, 'content', '<p style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 0px; margin-bottom: 23px; margin-left: 0px; font-size: 16px; color: rgb(51, 51, 51); font-family: Lato, sans-serif;"><span style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; font-weight: bolder;">A l’initiative de la Confédération Européenne des ONG pour le Secours et le Développement (CONCORD) et du Comité de la Société Civile de l’Union Européenne pour la Stratégie Conjointe Afrique Union Européenne (EU CS Committee on the JAES), une délégation de la société civile africaine a pris part les 16 et &nbsp;17 juillet 2019 à Bruxelles à des rencontres de plaidoyer avec les institutions de l’Union Européenne (UE) et du groupe Afrique Caraïbe Pacifique (ACP).</span></p><div class="my-pub" style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; color: rgb(51, 51, 51); font-family: Lato, sans-serif; font-size: 16px;"><ins class="adsbygoogle" data-ad-layout="in-article" data-ad-format="fluid" data-ad-client="ca-pub-6070593719826671" data-ad-slot="9609258602" data-adsbygoogle-status="done" style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; display: block; text-align: center; height: 0px;"><ins id="aswift_1_expand" style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; display: inline-table; border: none; height: 0px; margin: 0px; padding: 0px; position: relative; visibility: visible; width: 870px; background-color: transparent;"><ins id="aswift_1_anchor" style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; display: block; border: none; height: 0px; margin: 0px; padding: 0px; position: relative; visibility: visible; width: 870px; background-color: transparent; overflow: hidden; opacity: 0;"><iframe width="870" height="200" frameborder="0" marginwidth="0" marginheight="0" vspace="0" hspace="0" allowtransparency="true" scrolling="no" allowfullscreen="true" id="aswift_1" name="aswift_1" style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; left: 0px; position: absolute; top: 0px; width: 870px; height: 200px;"></iframe></ins></ins></ins></div><p style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 0px; margin-bottom: 23px; margin-left: 0px; font-size: 16px; color: rgb(51, 51, 51); font-family: Lato, sans-serif;">La délégation de la société civile africaine était composée de la Plateforme des Acteurs de la Société Civile au Bénin (PASCiB), de la Plateforme ‘’Les Jeudis de Cotonou’’ du Cameroun et de l’Observatoire Ouest Africain des Migrations. Ces rencontres de plaidoyer menées à Bruxelles rentrent dans le cadre des négociations en cours pour dessiner le futur accord qui remplacera l’Accord de Cotonou prévu pour prendre fin le 29 février 2020.</p><p style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 0px; margin-bottom: 23px; margin-left: 0px; font-size: 16px; color: rgb(51, 51, 51); font-family: Lato, sans-serif;">L’Accord de Cotonou signé le 23 juin 2000, à la suite des quatre (4) Conventions de Lomé, définit les bases sur lesquelles repose le partenariat de développement entre l’Union Européenne et les 79 pays membres du Groupe ACP. Enfin de perpétuer ce partenariat stratégique de développement entre l’Union Européenne et les pays ACP, des négociations ont été lancées le 28 septembre 2018 afin d’élaborer le nouveau accord dit ‘’Accord Post-Cotonou’’. Malgré l’évidence actuelle sur le fait qu’aucun accord ne sera possible entre les deux parties à la fin février 2020, il est apparu nécessaire à la société civile euro-africaine d’entamer une série de plaidoyers pour que ses positions soient prises en compte.</p><p style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 0px; margin-bottom: 23px; margin-left: 0px; font-size: 16px; color: rgb(51, 51, 51); font-family: Lato, sans-serif;">Il faut rappeler le rôle très actif joué par la société civile depuis la signature l’Accord de Cotonou pour assurer une participation des acteurs associatifs et des ONG au dialogue politique entre l’Union Européenne et les pays ACP. Ce rôle actif de la société civile a été marqué par des actions de mobilisation autour des Accords de Partenariat Economique (APE) et des Accords de réadmission des migrants en situation irrégulière qui étaient des points clés de l’Accord de Cotonou. Fort des actions entreprises jusqu’alors, il était nécessaire aux acteurs associatifs et ONG de travailler à garantir et renforcer une meilleur prise en compte de la société civile dans l’Accord Post-Cotonou.</p><p style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 0px; margin-bottom: 23px; margin-left: 0px; font-size: 16px; color: rgb(51, 51, 51); font-family: Lato, sans-serif;">Des échanges tenus lors de ces deux jours de rencontres de plaidoyer avec des responsables du Service Européen de l’Action Extérieur (SEAE), de la Direction Générale Développement et Coopération de la Commission Européenne (DG DEVCO), de la Direction Générale du Commerce de la Commission Européenne (DG Trade), des ambassadeurs et du secrétariat du Groupe ACP, Il ressort que l’esprit de l’Accord de Cotonou concernant la participation des acteurs de la société civile reste présent dans le futur accord.</p><p style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 0px; margin-bottom: 23px; margin-left: 0px; font-size: 16px; color: rgb(51, 51, 51); font-family: Lato, sans-serif;">Les discussions avec les différentes parties ont également permis d’apprendre que les négociations sur le socle commun de l’Accord Post-Cotonou se déroulent assez bien. Il resterait à discuter à ce niveau selon les dire de nos interlocuteurs les chapitres concernant la migration et la croissance économique durable. En outre, les parties nous ont informées du démarrage, dans le courant de septembre, des négociations autour du protocole régional UE-Afrique qui sera un des 3 piliers annexés au socle commun de l’Accord Post-Cotonou.</p><p style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 0px; margin-bottom: 23px; margin-left: 0px; font-size: 16px; color: rgb(51, 51, 51); font-family: Lato, sans-serif;">La franchise et la qualité des discussions menées aussi bien avec les représentants du groupe ACP que ceux de l’Union Européenne ont été saluées par les acteurs de la société civile euro-africaine qui se sont engagés à rester à l’écoute de l’évolution des négociations tout en continuant par envoyer leurs contributions éventuelles. Pour finir la société civile euro-africaine a également souhaité, dans la mesure du possible, la tenue d’une rencontre de consultation élargie pour faciliter l’expression des points de vue d’un large éventail d’associations et ONG à ce processus crucial pour les futures relations entre l’Union Européenne et les pays d’Afrique Caraïbe Pacifique.</p><p style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 0px; margin-bottom: 23px; margin-left: 0px; font-size: 16px; color: rgb(51, 51, 51); font-family: Lato, sans-serif;">Fait à Bruxelles le 17 juillet 2019</p><p style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 0px; margin-bottom: 23px; margin-left: 0px; font-size: 16px; color: rgb(51, 51, 51); font-family: Lato, sans-serif;">Pour l’Observatoire Ouest Africain des Migrations<br style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility;">Le Secrétaire Permanent<br style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility;">Samir ABI</p>'),
(14, 8, 'thumbnail', 'UNHCR-891x600.jpg'),
(15, 9, 'content', '<p style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 0px; margin-bottom: 23px; margin-left: 0px; font-size: 16px; color: rgb(51, 51, 51); font-family: Lato, sans-serif;"><span style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; font-weight: bolder;">Le Directeur des Affaires Publiques de l’Ambassade des Etats-Unis d’Amérique près le Bénin, Kanishka Gangopadhyay, la Présidente Directrice Générale de l’organisation IREX, Kristin Lord, et la Ministre de l’Economie Numérique et de la Communication, Aurélie Adam Soulé Zoumarou, ont lancé le programme SHE’s GREAT BENIN, le 15 Avril 2019 dans les locaux de Sèmè City à Cotonou.</span></p><div class="my-pub" style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; color: rgb(51, 51, 51); font-family: Lato, sans-serif; font-size: 16px;"><ins class="adsbygoogle" data-ad-layout="in-article" data-ad-format="fluid" data-ad-client="ca-pub-6070593719826671" data-ad-slot="9609258602" data-adsbygoogle-status="done" style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; display: block; text-align: center; height: 0px;"><ins id="aswift_1_expand" style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; display: inline-table; border: none; height: 0px; margin: 0px; padding: 0px; position: relative; visibility: visible; width: 870px; background-color: transparent;"><ins id="aswift_1_anchor" style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; display: block; border: none; height: 0px; margin: 0px; padding: 0px; position: relative; visibility: visible; width: 870px; background-color: transparent; overflow: hidden; opacity: 0;"><iframe width="870" height="200" frameborder="0" marginwidth="0" marginheight="0" vspace="0" hspace="0" allowtransparency="true" scrolling="no" allowfullscreen="true" id="aswift_1" name="aswift_1" style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; left: 0px; position: absolute; top: 0px; width: 870px; height: 200px;"></iframe></ins></ins></ins></div><p style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 0px; margin-bottom: 23px; margin-left: 0px; font-size: 16px; color: rgb(51, 51, 51); font-family: Lato, sans-serif;">SHE’s GREAT BENIN est une initiative de l’organisation américaine IREX, en collaboration avec l’Ambassade et Sèmè City, qui offre aux filles et jeunes femmes béninoises des compétences et des opportunités dans les domaines de la science, de la technologie, de l’ingénierie, de l’art et du dessin, et des mathématiques (STEAM). Le programme est financé par le Bureau du Département d’Etat chargé des questions relatives aux femmes au niveau mondial et vise à lutter contre la violence basée sur le genre et les pratiques culturelles néfastes, tout en renforçant le leadership et la prise de décisions chez les filles.</p><p style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 0px; margin-bottom: 23px; margin-left: 0px; font-size: 16px; color: rgb(51, 51, 51); font-family: Lato, sans-serif;">SHE’s GREAT BENIN consistera en des camps STEAM pour permettre aux filles et garçons béninois de renforcer leurs connaissances des carrières STEAM et d’interagir avec des mentors dans des domaines connexes. Le Directeur des Affaires Publiques de l’Ambassade des Etats-Unis, Kanishka Gangopadhyay, a rappelé que l’Ambassade des Etats-Unis d’Amérique au Bénin, et le gouvernement américain dans son ensemble, se sont engagés à promouvoir la participation des femmes et des filles dans ces domaines essentiels au développement durable.&nbsp; «&nbsp;<em style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility;"><span style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; font-weight: bolder;">En formant des jeunes femmes dans ces domaines cruciaux, nous leur donnons les compétences nécessaires pour réussir à l’avenir</span></em>&nbsp;», a-t-il ajouté.</p><p style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 0px; margin-bottom: 23px; margin-left: 0px; font-size: 16px; color: rgb(51, 51, 51); font-family: Lato, sans-serif;">La Présidente Directrice Générale de IREX, Kristin Lord, a salué l’implication du Ministère de l’Enseignement Secondaire et du Ministère de l’Economie Numérique et de la Communication, pour l’aboutissement du programme SHE’s GREAT BENIN. Madame Lord a ajouté que ce programme accompagne l’émergence d’une nouvelle génération de femmes talentueuses.</p><p style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 0px; margin-bottom: 23px; margin-left: 0px; font-size: 16px; color: rgb(51, 51, 51); font-family: Lato, sans-serif;">La Ministre de l’Economie Numérique et de la Communication, Aurélie Adam Soulé Zoumarou, a déclaré qu’il existe toujours un écart entre les hommes et les femmes dans les domaines des sciences et des technologies, même si cet écart a tendance à se réduire. «&nbsp;<em style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility;"><span style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; font-weight: bolder;">Changer les mentalités sur le rôle des femmes est donc indispensable pour augmenter le nombre de celles-ci dans les domaines scientifiques. C’est à cet effet que l’activité de ce jour me parait opportune, car elle permet aux élèves et enseignants que vous êtes de devenir des pionniers du programme de promotion des STEAM dans vos collèges respectifs</span></em>&nbsp;», a ajouté la Ministre en s’adressant aux participants.</p><p style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 0px; margin-bottom: 23px; margin-left: 0px; font-size: 16px; color: rgb(51, 51, 51); font-family: Lato, sans-serif;">L’initiative SHE’s GREAT BENIN est un projet pilote pour un programme beaucoup plus vaste prévu cet été, et qui permettra de former encore plus de jeunes femmes et filles dans les domaines STEAM.</p>'),
(16, 9, 'thumbnail', 'USEmbassy-Benin.jpg'),
(17, 10, 'content', '<h4 style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-top: 8px; margin-bottom: 7px; font-family: Montserrat, sans-serif; font-weight: 600; line-height: 1.2; color: rgb(34, 34, 34); font-size: 18px; display: inline-block; width: 870px;">Le&nbsp;<span style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; font-weight: bolder;">Conseil africain et malgache pour l’enseignement supérieur (CAMES) a sanctionné les éminents professeurs béninois&nbsp;</span><span style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; font-weight: bolder;">Ibrahim Salami et Dandi Gnamou. Ils sont respectivement accusés de plagiat et de faux et usage de faux pour l’obtention de leur grade de professeur.</span></h4><p style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 0px; margin-bottom: 23px; margin-left: 0px; font-size: 16px; color: rgb(51, 51, 51); font-family: Lato, sans-serif;">Le CAMES a tenu du 28 au 30 mai 2019 à Cotonou au Bénin sa 36è session ordinaire. Au cours de cette session, la Commission d’éthique et de déontologie a présenté un rapport sur les cas de fraudes et de plagiats de cinq universitaires africains dont deux éminents professeurs béninois : Me Ibrahim Salami, seul professeur titulaire en droit public au Bénin, et Dandi Gnamou, professeur titulaire de droit privé et Conseillère à la Cour suprême du Bénin.</p><div class="my-pub" style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; color: rgb(51, 51, 51); font-family: Lato, sans-serif; font-size: 16px;"><ins class="adsbygoogle" data-ad-layout="in-article" data-ad-format="fluid" data-ad-client="ca-pub-6070593719826671" data-ad-slot="9609258602" data-adsbygoogle-status="done" style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; display: block; text-align: center; height: 0px;"><ins id="aswift_1_expand" style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; display: inline-table; border: none; height: 0px; margin: 0px; padding: 0px; position: relative; visibility: visible; width: 870px; background-color: transparent;"><ins id="aswift_1_anchor" style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; display: block; border: none; height: 0px; margin: 0px; padding: 0px; position: relative; visibility: visible; width: 870px; background-color: transparent; overflow: hidden; opacity: 0;"><iframe width="870" height="200" frameborder="0" marginwidth="0" marginheight="0" vspace="0" hspace="0" allowtransparency="true" scrolling="no" allowfullscreen="true" id="aswift_1" name="aswift_1" style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; left: 0px; position: absolute; top: 0px; width: 870px; height: 200px;"></iframe></ins></ins></ins></div><p style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 0px; margin-bottom: 23px; margin-left: 0px; font-size: 16px; color: rgb(51, 51, 51); font-family: Lato, sans-serif;">Selon le rapport la Commission d’éthique et de déontologie du CAMES a indiqué que&nbsp;«&nbsp;<span style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; font-weight: bolder;"><em style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility;">Ibrahim Salami a plagié dans sa thèse de doctorat un ouvrage de l’un de ses collègues, tandis que Dandi Gnamou a constitué son dossier de candidature en vue de sa titularisation avec des pièces jugées délictueuses. Elle [Dandi Gnamou] n’a pas dirigé seule au moins une thèse comme cela est exigée lorsque la faculté d’origine dispose d’une école doctorale</em></span>&nbsp;».</p><p style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 0px; margin-bottom: 23px; margin-left: 0px; font-size: 16px; color: rgb(51, 51, 51); font-family: Lato, sans-serif;">Au égard des conclusions de ce rapport, le CAMES a infligé de lourdes sanctions à l’encontre des universitaires. Selon la délibération de la Commission d’éthique et de déontologie, Dandi Gnamou est rétrogradée. Elle perd ainsi son titre de professeur titulaire des Universités du CAMES. Quant à Ibrahim Salami, il est interdit d’activités académiques au niveau du CAMES pendant trois ans.</p>'),
(18, 10, 'thumbnail', 'uac-logo-891x400.jpg'),
(19, 11, 'content', '<p style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 0px; margin-bottom: 23px; margin-left: 0px; font-size: 16px; color: rgb(51, 51, 51); font-family: Lato, sans-serif;"><span style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; font-weight: bolder;">Les citoyens américains qui attendaient depuis quelques semaines la célébration de la deuxième édition du festival Africa Vodoun devront patienter encore jusqu’aux 21 et 22 septembre prochain, nouvelles dates retenues pour la tenue de l’événement. Cette décision du report du festival a été prise après une importante réunion entre le comité d’organisation dudit festival et ses différents partenaires.</span></p><div class="my-pub" style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; color: rgb(51, 51, 51); font-family: Lato, sans-serif; font-size: 16px;"><ins class="adsbygoogle" data-ad-layout="in-article" data-ad-format="fluid" data-ad-client="ca-pub-6070593719826671" data-ad-slot="9609258602" data-adsbygoogle-status="done" style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; display: block; text-align: center; height: 0px;"><ins id="aswift_1_expand" style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; display: inline-table; border: none; height: 0px; margin: 0px; padding: 0px; position: relative; visibility: visible; width: 870px; background-color: transparent;"><ins id="aswift_1_anchor" style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; display: block; border: none; height: 0px; margin: 0px; padding: 0px; position: relative; visibility: visible; width: 870px; background-color: transparent; overflow: hidden; opacity: 0;"><iframe width="870" height="200" frameborder="0" marginwidth="0" marginheight="0" vspace="0" hspace="0" allowtransparency="true" scrolling="no" allowfullscreen="true" id="aswift_1" name="aswift_1" style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; left: 0px; position: absolute; top: 0px; width: 870px; height: 200px;"></iframe></ins></ins></ins></div><p style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 0px; margin-bottom: 23px; margin-left: 0px; font-size: 16px; color: rgb(51, 51, 51); font-family: Lato, sans-serif;">Prévue initialement pour se tenir les 10 et 11 août 2019, la célébration de deuxième édition du festival Africa Vodoun connaîtra un peu de décalage et se tiendra plutôt les 21 et 22 septembre prochains à New-York aux Etats-Unis. Pour l’heure, les raisons de ce report ne sont pas encore connues. Mais de sources proches, il s’agit d’une décision prise par les deux parties à savoir le comité d’organisation et les différents partenaires afin de mieux préparer cette deuxième édition du festival pour qu’elle soit un véritable succès.</p><p style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 0px; margin-bottom: 23px; margin-left: 0px; font-size: 16px; color: rgb(51, 51, 51); font-family: Lato, sans-serif;">En effet, au pays de l’Oncle Sam depuis quelques semaines, le président de l’Ong Midogbékpo Internationale, promoteur du festival Africa Vodoun, monsieur Denis Assongba met les bouchées doubles afin d’offrir au public américain, un festival inédit. Il promet faire vibrer le public «&nbsp;Newyorkais&nbsp;» au rythme de la culture béninoise les 21 et 22 septembre prochain. A cet effet, plusieurs activités seront au menu. Il s’agit de Chants liturgiques ; danses initiatiques ; art culinaire ; jeux ; des séances de causeries ; débats et bien d’autres surprises. L’une des particularités de cette deuxième édition qui pourraient séduire le plus d’américain,c’est la présence de l’une des figures emblématiques du culte Vodoun du Bénin. Il s’agit bel et bien du président Agassa Adanyro Guédéhoungué qui est annoncé à New-York les 21 et 22 septembre prochain.</p><p style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 0px; margin-bottom: 23px; margin-left: 0px; font-size: 16px; color: rgb(51, 51, 51); font-family: Lato, sans-serif;">« Cette année, nous avons négocié et obtenu l’accord de principe du Président Agassa Adanyro Guédéhoungué d’être avec nous à New-York », a déclaré le président Denis Assongba. Il faut dire cette édition ne souffrira d’aucun mal, car conscients de l’enjeu et de l’intérêt de la chose, les deux hommes forts de la culture Vodoun se sont engagés à œuvrer pour relever non seulement le Bénin à l’international, mais aussi de faire connaître les richesses culturelles du Bénin à travers le monde.</p><p style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 0px; margin-bottom: 23px; margin-left: 0px; font-size: 16px; color: rgb(51, 51, 51); font-family: Lato, sans-serif;">Pour le président Denis Assongba, « le festival Africa vodoun est un bon moyen d’expression de la culture béninoise en Amérique du nord ». Il est important de souligner que cette deuxième édition du festival Africa Vodoun présidée par Marsha Champagne est l’occasion pour le Bénin de resserrer les liens de coopération entre les deux Etats ; de faire connaître ses richesses culturelles aux américains et de promouvoir la destination Bénin au monde entier.</p><p style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 0px; margin-bottom: 23px; margin-left: 0px; font-size: 16px; color: rgb(51, 51, 51); font-family: Lato, sans-serif;">Pour rappel, près de 3 000 personnes ont participé aux différentes phases de la première édition du festival Africa Vodoun en août 2018, 33 touristes américains sont venus visiter le Bénin après avoir participé à la première édition. Des visites touristiques qui génèrent sans doute des recettes considérables pour le Bénin. De même, un accord a été signé avec la ville de Memphis dans le Tennessee pour une présence permanente du Bénin sur le Festival Africa Vodoun.</p>'),
(20, 11, 'thumbnail', 'WhatsApp-Image-2019-07-30-at-15_55_14-1.jpeg'),
(21, 12, 'content', '<p style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 0px; margin-bottom: 23px; margin-left: 0px; font-size: 16px; color: rgb(51, 51, 51); font-family: Lato, sans-serif;"><em style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility;"><span style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; font-weight: bolder;">Le prix Equateur est un programme dont le but est de féliciter les communautés locales du monde entier, auteures des projets innovants, répondants aux problèmes du changement climatique, de l’environnement et de la pauvreté grandissante que le monde cherche à résoudre.</span></em></p><div class="my-pub" style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; color: rgb(51, 51, 51); font-family: Lato, sans-serif; font-size: 16px;"><ins class="adsbygoogle" data-ad-layout="in-article" data-ad-format="fluid" data-ad-client="ca-pub-6070593719826671" data-ad-slot="9609258602" data-adsbygoogle-status="done" style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; display: block; text-align: center; height: 0px;"><ins id="aswift_1_expand" style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; display: inline-table; border: none; height: 0px; margin: 0px; padding: 0px; position: relative; visibility: visible; width: 870px; background-color: transparent;"><ins id="aswift_1_anchor" style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; display: block; border: none; height: 0px; margin: 0px; padding: 0px; position: relative; visibility: visible; width: 870px; background-color: transparent; overflow: hidden; opacity: 0;"><iframe width="870" height="200" frameborder="0" marginwidth="0" marginheight="0" vspace="0" hspace="0" allowtransparency="true" scrolling="no" allowfullscreen="true" id="aswift_1" name="aswift_1" style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; left: 0px; position: absolute; top: 0px; width: 870px; height: 200px;"></iframe></ins></ins></ins></div><p style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 0px; margin-bottom: 23px; margin-left: 0px; font-size: 16px; color: rgb(51, 51, 51); font-family: Lato, sans-serif;">Les 22 communautés locales et autochtones du monde entier qui recevront à New York,les prix qui seront décernés en accord avec&nbsp; le Programme des Nations Unies pour le développement (PNUD)&nbsp;,sont issus respectivement de Guinée Bissau, Australie,Australie,États-Unis,Bénin,Brésil,Cameroun,Équateur,Inde,Indonésie, Kenya, Micronésie, Nigéria, au Pakistan, Pérou,Tanzanie et au Vanuatu.&nbsp;Ces lauréats du prix Equateur de cette année rejoint ainsi, l’ensemble des 223 communautés qui ont eu le privilège d’être les premiers gagnants dès la naissance de l’initiative Prix Equateur en 2002.</p><p style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 0px; margin-bottom: 23px; margin-left: 0px; font-size: 16px; color: rgb(51, 51, 51); font-family: Lato, sans-serif;">Les communautés locales du monde entier sélectionnés ont pu attirer l’attention des experts de renommée internationale, désignés pour analyser la qualité du plan d’action et des approches de solutions de sortie de crise fournies par chaque communauté locale du monde entier alors qu’ils étaient 847 candidats provenant de 127 pays sur la liste.«&nbsp;<em style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility;"><span style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; font-weight: bolder;">Chaque&nbsp;jour, des milliers de communautés locales et de peuples autochtones du monde entier mettent en œuvre sans faire de bruit des solutions innovantes basées sur la nature pour atténuer les effets du changement climatique et pour s’y adapter.&nbsp;Le Prix Équateur est à la fois une reconnaissance de leurs idées exceptionnelles et un moyen de mettre en valeur le pouvoir des personnes et des communautés de base de susciter un réel changement.</span></em>&nbsp;»Soutien Achim Steiner, administrateur du PNUD cité par “newspress”. Comme récompense, les gagnants au cours de la cérémonie de remise des prix au Town Hall Theatre à Midtown Manhattan(New-York), le 24 septembre 2019, prendront par tête, 10 000 USD. Ils auront aussi le choix de désigner deux&nbsp; membres de leur communauté pour participer au 74e Assemblée générale des Nations Unies.</p>'),
(22, 12, 'thumbnail', '37fa4092f14e2c21a8e3ee6da2b41ef9_XL-891x426.jpg'),
(23, 13, 'content', '<p style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 0px; margin-bottom: 23px; margin-left: 0px; font-size: 16px; color: rgb(51, 51, 51); font-family: Lato, sans-serif;"><span style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; font-weight: bolder;"><i style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility;">Le Groupement des éditeurs de presse publique d’Afrique de l’Ouest (Geppao) dont fait parti la Côte d’Ivoire, le Bénin Faso, le Niger et le Sénégal, s’engage dans la lutte contre l’insécurité et terrorisme. D’ailleurs, leur prochaine réunion, prévue pour les 20 et 21 juin 2019 à Ouagadougou, tournera autour de « Présentation du forum du Geppao sur le rôle des médias dans la lutte contre l’insécurité et le terrorisme en Afrique de l’Ouest ».</i></span></p><div class="my-pub" style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; color: rgb(51, 51, 51); font-family: Lato, sans-serif; font-size: 16px;"><ins class="adsbygoogle" data-ad-layout="in-article" data-ad-format="fluid" data-ad-client="ca-pub-6070593719826671" data-ad-slot="9609258602" data-adsbygoogle-status="done" style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; display: block; text-align: center; height: 0px;"><ins id="aswift_1_expand" style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; display: inline-table; border: none; height: 0px; margin: 0px; padding: 0px; position: relative; visibility: visible; width: 870px; background-color: transparent;"><ins id="aswift_1_anchor" style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; display: block; border: none; height: 0px; margin: 0px; padding: 0px; position: relative; visibility: visible; width: 870px; background-color: transparent; overflow: hidden; opacity: 0;"><iframe width="870" height="200" frameborder="0" marginwidth="0" marginheight="0" vspace="0" hspace="0" allowtransparency="true" scrolling="no" allowfullscreen="true" id="aswift_1" name="aswift_1" style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; left: 0px; position: absolute; top: 0px; width: 870px; height: 200px;"></iframe></ins></ins></ins></div><p style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 0px; margin-bottom: 23px; margin-left: 0px; font-size: 16px; color: rgb(51, 51, 51); font-family: Lato, sans-serif;"><span style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility;">Avec à sa tête Venance Konan,directeur général du groupe Fraternité Matin, le Geppao ,créé le 11 décembre 2014,rassemble les acteurs de la presse publique ouest africaine qui s’engagent à mettre leurs compétences et expériences au service de leur pays,de l’Afrique de l’Ouest. C’est toujours dans ce contexte que le (Geppao), organise tour à tour, dans les pays, des forums focaliser sur des thèmes d’actualités précis.</span></p><p style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 0px; margin-bottom: 23px; margin-left: 0px; font-size: 16px; color: rgb(51, 51, 51); font-family: Lato, sans-serif;"><span style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility;">«</span><span style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; font-weight: bolder;"><i style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility;">Dans notre programme, il était prévu l’organisation d’un forum sur le terrorisme, un autre à Niamey sur l’immigration, à Dakar sur le franc cfa, à Marrakech sur le transport aérien. Le moment d’organiser le forum à Ouagadougou est arrivé, parce que d’abord, notre actualité est marquée par ce triste phénomène (le terrorisme) que connaissent tous nos pays. Notamment le Mali, le Burkina Faso, la Côte d’Ivoire, récemment le Bénin, le Niger et la Mauritanie</i></span><span style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility;">»disait Venance Konan Président du (Geppao) lors de la réunion qu’il a organisé avec ses collaborateurs(Mahamadi Tiegna, secrétaire général du Geppao) en prélude à la rencontre du 20 et 21 juin.</span></p><p style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 0px; margin-bottom: 23px; margin-left: 0px; font-size: 16px; color: rgb(51, 51, 51); font-family: Lato, sans-serif;"><span style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility;">Cité par le journal fratmat.info, Mahamadi Tiegna, secrétaire général du Geppao, a rappelé le point focal du prochain événement soutenu par le Président du Faso, Christian Roch Kaboré.«</span><span style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; font-weight: bolder;"><i style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility;">Certains journalistes ne savent pas comment traiter la question du terrorisme. Il est important que nous puissions nous retrouver au niveau de l’Afrique de l’Ouest pour partager les expériences sur la question. D’où la nécessité et la valeur ajoutée de ce forum&nbsp;</i></span><span style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility;">».</span><span style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility;">Cet événement connaîtra la présence des experts venus de la France, des pays de la sous-région et des ministres selon les dires du Président de Geppao rapportés par fratmat.</span></p>'),
(24, 13, 'thumbnail', '8492601ada58534bae5c23e405334206_L.jpg'),
(25, 14, 'content', '<h3 style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-bottom: 0px; font-family: Montserrat, sans-serif; font-weight: 600; line-height: 33px; color: rgb(34, 34, 34); padding: 5px 0px 16px;">Réuni en séance plénière le 03 juin 2019, le Parlement du Niger a ratifié le projet de loi portant ratification de l’accord bilatéral de construction et d’exploitation de pipeline Agadem-Cotonou pour le transport des hydrocarbures.</h3><p style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 0px; margin-bottom: 23px; margin-left: 0px; font-size: 16px; color: rgb(51, 51, 51); font-family: Lato, sans-serif;">Le 23 janvier 2019, le Niger et le Bénin signe un accord de construction et d’exploitation de pipeline pour le transport d’hydrocarbure de la zone pétrolière d’Agadem au Nord-est du Niger vers le port de Cotonou. D’un coût estimé à 2.360 milliards de francs cfa, l’infrastructure de près de 2.000 km&nbsp; sera construite sur une période de 2 ans avec pour possibilité d’évacuation de 90.000 barils par jour.</p><div class="my-pub" style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; color: rgb(51, 51, 51); font-family: Lato, sans-serif; font-size: 16px;"><ins class="adsbygoogle" data-ad-layout="in-article" data-ad-format="fluid" data-ad-client="ca-pub-6070593719826671" data-ad-slot="9609258602" data-adsbygoogle-status="done" style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; display: block; text-align: center; height: 0px;"><ins id="aswift_1_expand" style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; display: inline-table; border: none; height: 0px; margin: 0px; padding: 0px; position: relative; visibility: visible; width: 810px; background-color: transparent;"><ins id="aswift_1_anchor" style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; display: block; border: none; height: 0px; margin: 0px; padding: 0px; position: relative; visibility: visible; width: 810px; background-color: transparent; overflow: hidden; opacity: 0;"><iframe width="810" height="200" frameborder="0" marginwidth="0" marginheight="0" vspace="0" hspace="0" allowtransparency="true" scrolling="no" allowfullscreen="true" id="aswift_1" name="aswift_1" style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; left: 0px; position: absolute; top: 0px; width: 810px; height: 200px;"></iframe></ins></ins></ins></div><p style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 0px; margin-bottom: 23px; margin-left: 0px; font-size: 16px; color: rgb(51, 51, 51); font-family: Lato, sans-serif;">Dans son rapport, la Commission des Affaires Etrangères et de la coopération du Parlement nigérien a indiqué que l’accord entre les deux pays permet un droit de transit au bénéfice du Bénin pendant la période de l’exploitation du pipeline, un&nbsp; droit fixe. Le texte stipule que le prélèvement par baril est de 0,5 dollars pendant les 10 premières années puis sera&nbsp; augmenté de 0,25 dollars tous les 5 ans à l’issue de la période de 10 ans sans pouvoir dépasser 1,50 dollars.</p><p style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 0px; margin-bottom: 23px; margin-left: 0px; font-size: 16px; color: rgb(51, 51, 51); font-family: Lato, sans-serif;">Pour le ministre nigérien du Pétrole, Foumakoye Gado, l’accord entre le Bénin et le Niger fixe les conditions générales&nbsp; qui vont régir les relations entre les deux pays dans le cadre du projet de construction et d’exploitation du pipeline. «&nbsp;<span style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; font-weight: bolder;"><em style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility;">L’ouvrage&nbsp; quitte Agadem (Nord-est)&nbsp; jusqu’à la côte béninoise&nbsp; en vue du transport du pétrole brut nigérien</em></span>&nbsp;», a-t-il indiqué avant de préciser que pour des raisons multiples, le gouvernement nigérien a renoncé à l’option du passage du pipeline de la république du&nbsp; Tchad au Cameroun.</p>'),
(26, 14, 'thumbnail', 'Pipeline-illust-Niger-Benin-Port-de-Cotonou-accords-janv-2019.jpg');
INSERT INTO `post_meta` (`id`, `post_id`, `key`, `value`) VALUES
(27, 15, 'content', '<p style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 0px; margin-bottom: 23px; margin-left: 0px; font-size: 16px; color: rgb(51, 51, 51); font-family: Lato, sans-serif;"><em style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility;">Le Fonds des Nations unies pour l’enfance (UNICEF) et l’Organisation Mondiale de la Santé (OMS) ont publié un rapport sur les inégalités d’accès à l’eau potable, à l’assainissement et à l’hygiène dans le monde.</em></p><div class="my-pub" style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; color: rgb(51, 51, 51); font-family: Lato, sans-serif; font-size: 16px;"><ins class="adsbygoogle" data-ad-layout="in-article" data-ad-format="fluid" data-ad-client="ca-pub-6070593719826671" data-ad-slot="9609258602" data-adsbygoogle-status="done" style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; display: block; text-align: center; height: 0px;"><ins id="aswift_1_expand" style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; display: inline-table; border: none; height: 0px; margin: 0px; padding: 0px; position: relative; visibility: visible; width: 810px; background-color: transparent;"><ins id="aswift_1_anchor" style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; display: block; border: none; height: 0px; margin: 0px; padding: 0px; position: relative; visibility: visible; width: 810px; background-color: transparent; overflow: hidden; opacity: 0;"><iframe width="810" height="200" frameborder="0" marginwidth="0" marginheight="0" vspace="0" hspace="0" allowtransparency="true" scrolling="no" allowfullscreen="true" id="aswift_1" name="aswift_1" style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; left: 0px; position: absolute; top: 0px; width: 810px; height: 200px;"></iframe></ins></ins></ins></div><p style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 0px; margin-bottom: 23px; margin-left: 0px; font-size: 16px; color: rgb(51, 51, 51); font-family: Lato, sans-serif;">Le rapport publié ce mardi 18 juin 2019, indique que près de 2,2 milliards de personnes dans le monde n’ont pas de services d’eau potable gérés en toute sécurité, 4,2 pas de services d’assainissement gérés en toute sécurité et 3 milliards n’ont pas d’installations de base pour le lavage des mains.</p><p style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 0px; margin-bottom: 23px; margin-left: 0px; font-size: 16px; color: rgb(51, 51, 51); font-family: Lato, sans-serif;">Des chiffres très alarmants, alors que 1,8 milliard de personnes ont eu accès à des services de base en eau potable depuis 2000.&nbsp;Kelly Ann Naylor, directrice associée de l’Eau, Assainissement et hygiène de &nbsp;l’UNICEF, interpelle l’apport de tous pour l’atteinte de l’accès à l’eau pour tous et surtout pour les enfants qui méritent une attention particulière.</p><p style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 0px; margin-bottom: 23px; margin-left: 0px; font-size: 16px; color: rgb(51, 51, 51); font-family: Lato, sans-serif;">&lt;&lt;<em style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility;">Un simple accès ne suffit pas.&nbsp;Si l’eau n’est pas propre, n’est pas potable ou est loin, et si l’accès aux toilettes est dangereux ou limité, nous ne livrons pas pour les enfants du monde…Les enfants et leurs familles dans les communautés pauvres et rurales risquent davantage d’être laissés pour compte.&nbsp;Les gouvernements doivent investir dans leurs communautés si nous voulons combler ces divisions économiques et géographiques et réaliser ce droit humain fondamental&gt;&gt;</em>&nbsp;a-t-elle déclaré.</p><p style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 0px; margin-bottom: 23px; margin-left: 0px; font-size: 16px; color: rgb(51, 51, 51); font-family: Lato, sans-serif;">Depuis 2000, 2,1 milliards de personnes ont eu accès aux services d’assainissement de base.&nbsp;Le nombre de personne pratiquant la défécation a été réduit, passant de 21 % à 9 %, mais malheureusement cette pratique est toujours en vigueur dans certains pays, notamment en Afrique subsaharienne.&nbsp;Angola, Bénin, Burkina Faso, Cambodge, Tchad, Chine, Côte d’Ivoire, République démocratique du Congo, Érythrée, Éthiopie, Ghana, Inde, Indonésie, Kenya, Madagascar, Mozambique, Népal, Niger, Nigéria, Pakistan, Philippines, Soudan, Soudan du Sud, Togo, République-Unie de Tanzanie, Yémen, sont les pays les plus touchés par les défécations à &nbsp;l’air libre.</p><p style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 0px; margin-bottom: 23px; margin-left: 0px; font-size: 16px; color: rgb(51, 51, 51); font-family: Lato, sans-serif;">Il urge donc que des mesures idoines soient mises en place par les pays pour lutter contre cette pratique, atteindre l’accès à l’eau pour tous et surtout l’assainissement qui est vecteur de plusieurs maladies.&nbsp;L’accès&nbsp;à l’eau potable pour tous, est l’un&nbsp;des objectifs du&nbsp;développement&nbsp;durable&nbsp;(ODD)&nbsp;de l’ONU d’ici l’horizon 2030.</p><p style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 0px; margin-bottom: 23px; margin-left: 0px; font-size: 16px; color: rgb(51, 51, 51); font-family: Lato, sans-serif;"><em style="-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility;">&lt;&lt;Les pays doivent redoubler d’efforts en matière d’assainissement sinon nous ne pourrons pas atteindre l’accès universel d’ici 2030…Si les pays échouent à redoubler d’efforts en matière d’assainissement, d’eau potable et d’hygiène, nous continuerons à vivre avec des maladies qui auraient dû figurer depuis longtemps dans les livres d’histoire: maladies comme la diarrhée, le choléra, la typhoïde, l’hépatite A et les maladies tropicales négligées, notamment le trachome, les vers intestinaux et la schistosomiase.&nbsp;Investir dans l’eau, l’assainissement et l’hygiène est rentable et bon pour la société à bien des égards.&nbsp;C’est un fondement essentiel pour une bonne santé. &gt;&gt;</em>&nbsp;&nbsp;Dr Maria Neira, directrice de l’OMS, Département de la santé publique, des déterminants environnementaux et sociaux de la santé.</p>'),
(28, 15, 'thumbnail', 'D9TtZHMXUAAQ5eL-891x600.jpg');

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

--
-- Contenu de la table `post_tags`
--

INSERT INTO `post_tags` (`id`, `slug`, `name`, `description`) VALUES
(1, 'sante5ddce9eda1995', 'Santé', 'Articles étiquettés santé'),
(2, 'environnement--bien-etre5ddcea128d482', 'Environnement', 'Liste des articles étiquettés Environnement et Bien être'),
(3, 'vie-sociale5ddcf621dd1b8', 'Vie Sociale', 'Articles étiquettés sous Vie Sociale'),
(4, 'immigration5ddd3bfc0ff5f', 'Immigration', 'Article étiquettés sous Immigration'),
(5, 'education5ddd3ca71e50f', 'Education', 'Article étiquettés sous Education'),
(6, 'cames5ddd3d201f7f5', 'CAMES', 'Articles étiquettés sous CAMES'),
(7, 'festival5ddd3da748430', 'Festival', 'Articles étiquettés sous Festival'),
(8, 'recompense5ddd3e5729f5f', 'Récompense', 'Articles étiquettés sous Recompenses'),
(9, 'insecurite5ddd3ea81d46a', 'Insécurité', 'Articles sous Insécurité'),
(10, 'terrorisme5ddd3eb5e32be', 'Terrorisme', 'Article sous Terrorisme'),
(11, 'construction5ddd3f0f4fae0', 'Construction', 'Article étiquettés sous contruction'),
(12, 'eau5ddd4088799c0', 'Eau', 'Article catégorisé sous Eau');

-- --------------------------------------------------------

--
-- Structure de la table `post_tag_groups`
--

CREATE TABLE `post_tag_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `tag_id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `post_tag_groups`
--

INSERT INTO `post_tag_groups` (`id`, `tag_id`, `post_id`) VALUES
(4, 3, 5),
(7, 1, 4),
(8, 3, 4),
(9, 1, 3),
(10, 1, 7),
(11, 4, 8),
(12, 5, 9),
(13, 5, 10),
(14, 6, 10),
(15, 7, 11),
(16, 8, 12),
(17, 9, 13),
(18, 10, 13),
(19, 11, 14),
(20, 1, 15),
(21, 2, 15),
(22, 12, 15);

-- --------------------------------------------------------

--
-- Structure de la table `recommendations`
--

CREATE TABLE `recommendations` (
  `id` int(10) UNSIGNED NOT NULL,
  `evaluation_id` int(10) UNSIGNED NOT NULL,
  `title` text NOT NULL,
  `recipient` varchar(100) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `recommendations`
--

INSERT INTO `recommendations` (`id`, `evaluation_id`, `title`, `recipient`, `active`) VALUES
(60, 12, 'Améliorer le processus d’élaboration de la prochaine stratégie en la fondant sur des projets structurants d’infrastructures susceptibles d’avoir un impact optimal sur les pauvres', 'MPD et MEF', 1),
(61, 12, 'Procéder à une évaluation ex-ante de la stratégie, à travers 2 à 3 scénarii, avant sa mise en œuvre après le choix d’un scénario jugé le plus optimal.', 'MPD et MEF', 1),
(62, 12, 'Reposer la stratégie notamment sur quelques choix et non chercher à embrasser tous les secteurs à la fois', 'MPD et MEF', 1),
(63, 12, 'Faire de la promotion de l’emploi une thématique prioritaire de la prochaine stratégie.', 'MPD et MEF', 1),
(64, 12, 'Veiller à la détermination des niveaux hiérarchiques de priorité des actions inscrites dans le PAP', 'MPD et MEF', 1),
(65, 12, 'Faire du PAP un outil de référence pour la programmation des actions de développement', 'MPD et MEF', 1),
(69, 13, 'Renforcer la vulgarisation de la PNDA.', 'Inconnu', 1),
(70, 13, 'Prendre en compte dans les plans d’actions, le volet «promotion de l’artisanat béninois à l’étranger» qui constitue un moyen par excellence de faire connaitre le Bénin au plan international', 'Inconnu', 1),
(71, 13, 'Mettre en place et assurer le fonctionnement effectif du cadre institutionnel de mise en œuvre et de suivi-évaluation des actions contenues dans la PNDA.', 'Inconnu', 1),
(72, 13, 'Rendre le cadre législatif et réglementaire plus attractif en allégeant les formalités, notamment fiscales aux entreprises artisanales.', 'Inconnu', 1),
(73, 13, 'Désigner et responsabiliser les structures chargées directement de la réalisation des actions prévues.', 'Inconnu', 1),
(74, 13, 'Elaborer un plan d’actions prioritaires triennal qui s’appuie sur la PNDA pour définir les indicateurs liés aux objectifs spécifiques retenus avec des cibles à atteindre.', 'Inconnu', 1),
(75, 13, 'Mobiliser des ressources financières conséquentes et leur meilleure utilisation.', 'Inconnu', 1),
(76, 13, 'Poursuivre le renforcement des capacités des acteurs tant de l’Administration publique que du secteur privé pour une prise en charge efficace de l’exécution, du suivi et d’évaluation des actions retenues dans la PNDA.', 'Inconnu', 1),
(77, 13, 'Réaliser une étude de référence à partir de laquelle des hypothèses seront formulées pour établir les effets et impacts de la PNDA.', 'Inconnu', 1),
(78, 14, 'mettre en place des politiques qui permettrons aux acteurs du formel à occuper rationnellement le territoire de station-service comme dans l’installation des pharmacies', 'Inconnu', 1),
(79, 14, 'renforcer des capacités des vendeurs appelés pompistes dans l’accueil de la clientèle ;', 'Inconnu', 1),
(80, 14, 'instruire le Ministère de l’Economie et Finance à prendre les dispositions nécessaires pour introduire la loi de finances les taxes à payer tant au niveau de l’importation qu’au niveau des points de vente afin de réduire l’écart entre le prix à la pompe et le prix dans l’informel ; ', 'Inconnu', 1),
(81, 14, 'transformer les points de vente de l’informel en de mini-stations en installant des cuves destinées à contenir l’essence. Des mini-stations qui permettront aux vendeurs de respirer l’air pure, mais également aux consommateurs de s’approvisionner sans s’exposer aux dangers ;', 'Inconnu', 1),
(82, 14, 'formaliser le secteur informel en procédant à un recensement des acteurs du secteur informel ;', 'Inconnu', 1),
(83, 14, 'edynamiser le secteur agricole afin de favoriser la reconversion des acteurs du secteur informel ;', 'Inconnu', 1),
(84, 14, 'créer des stations –service un peu partout dans le pays et rendre le produit disponible et à moindre coût ;', 'Inconnu', 1),
(85, 14, 'amener les vendeurs à prendre toutes les dispositions possibles afin d’éviter les dégâts ;', 'Inconnu', 1),
(86, 14, 'sensibiliser les acteurs des risques qu’ils courent eux-mêmes et qu’ils font courir aux autres ;', 'Inconnu', 1),
(87, 14, 'encourager les acteurs économiques et tout autres acteurs voulant investir dans ce secteur au Bénin ;', 'Inconnu', 1),
(88, 14, 'encourager les grossistes à ouvrir eux-mêmes leur station en facilitant les procédures administratives ;', 'Inconnu', 1),
(89, 14, 'faire une évaluation à mi-parcours de la mise en œuvre des recommandations ;', 'Inconnu', 1),
(90, 14, 'créer une unité de suivi de ces recommandations composé des cadres de tous les Ministères impliqués dans l’élaboration et la mise en œuvre de cette politique ;', 'Inconnu', 1),
(91, 14, 'faire de sensibilisation avant la mise en œuvre des politiques.', 'Inconnu', 1),
(92, 15, 'Organiser une campagne de vulgarisation de la PNT afin que les différents acteurs qui n’avaient pas participé à son élaboration puissent se l’approprier et la traduire plus tard dans leurs programmes d’action.', 'Inconnu', 1),
(93, 15, 'Réaliser une revue des politiques de promotion du produit touristique mises en œuvre jusqu’à présent.', 'Inconnu', 1),
(94, 15, 'Etablir une relation claire et efficace entre les secteurs du tourisme et de l’artisanat afin de faire des propositions de mesures de renforcement du pôle « tourisme-culture-artisanat » et sensibiliser les décideurs sur l’interaction harmonieuse qui devrait exister entre ces deux secteurs.', 'Inconnu', 1),
(95, 15, 'Enoncer des indicateurs de performance par lesquels l’atteinte des objectifs sera appréciée et proposer un séquençage avec des cibles annuelles.', 'Inconnu', 1),
(96, 15, 'Intégrer le Programme de Développement Touristique de la Route des Pêches dans les actions phares à développer.', 'Inconnu', 1),
(97, 15, 'Proposer une stratégie visant la prise en compte du genre dans la PNT ainsi que les réformes structurelles spécifiques à opérer en vue d’améliorer significativement l’appui technique des administrations et favoriser le développement du financement et la mise en place d’un système d’information du secteur du tourisme.', 'Inconnu', 1),
(98, 15, 'Désigner et responsabiliser les structures chargées directement de la réalisation des actions prévues.', 'Inconnu', 1),
(99, 15, 'Elaborer des plans quinquennaux assortis d’indicateurs de performance et de résultats de la politique', 'Inconnu', 1),
(100, 15, 'Réaliser une étude de référence à partir de laquelle des hypothèses seront formulées pour établir les effets et impacts attendus.', 'Inconnu', 1),
(101, 16, 'Déchets solides ménagers', 'Le gouvernement, les collectivités locales et les ONG.', 1);

-- --------------------------------------------------------

--
-- Structure de la table `recommendation_activities`
--

CREATE TABLE `recommendation_activities` (
  `id` int(10) UNSIGNED NOT NULL,
  `recommendation_id` int(10) UNSIGNED NOT NULL,
  `title` text NOT NULL,
  `amount` bigint(10) UNSIGNED DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `execution_level` varchar(35) NOT NULL,
  `explanation` text,
  `active` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `recommendation_activities`
--

INSERT INTO `recommendation_activities` (`id`, `recommendation_id`, `title`, `amount`, `start_date`, `end_date`, `execution_level`, `explanation`, `active`) VALUES
(105, 69, 'S\'approprier et traduire correctement la vulgarisation de la PNDA dans des programmes et des projets', 0, NULL, NULL, 'unexecuted', 'les différents acteurs de l’administration se l’approprient et la traduisent correctement dans des programmes et projets. ', 1),
(106, 69, 'les organisations faîtières du secteur (CNAB et UCIMB) fassent de la PNDA, le socle des actions à mettre en œuvre dans le cadre de la promotion et du développement du secteur de l’artisanat. ', 0, NULL, NULL, 'unexecuted', 'les organisations faîtières du secteur (CNAB et UCIMB) fassent de la PNDA, le socle des actions à mettre en œuvre dans le cadre de la promotion et du développement du secteur de l’artisanat. ', 1),
(107, 71, 'Mettre en place et assurer le fonctionnement effectif du cadre institutionnel de mise en œuvre et de suivi-évaluation des actions contenues dans la PNDA.', 0, NULL, NULL, 'executed', '', 1),
(108, 72, 'Rendre le cadre législatif et réglementaire plus attractif en allégeant les formalités, notamment fiscales aux entreprises artisanales.', 0, NULL, NULL, 'executed', '', 1),
(109, 73, 'Désigner et responsabiliser les structures chargées directement de la réalisation des actions prévues.', 0, NULL, NULL, 'unexecuted', '', 1),
(110, 74, 'Elaborer un plan d’actions prioritaires triennal qui s’appuie sur la PNDA pour définir les indicateurs liés aux objectifs spécifiques retenus avec des cibles à atteindre.', 0, NULL, NULL, 'unexecuted', '', 1),
(111, 75, 'Mobiliser des ressources financières conséquentes et leur meilleure utilisation.', 0, NULL, NULL, 'executed', '', 1),
(112, 76, 'Poursuivre le renforcement des capacités des acteurs tant de l’Administration publique que du secteur privé pour une prise en charge efficace de l’exécution, du suivi et d’évaluation des actions retenues dans la PNDA.', 0, NULL, NULL, 'executed', '', 1),
(113, 77, 'Réaliser une étude de référence à partir de laquelle des hypothèses seront formulées pour établir les effets et impacts de la PNDA.', 0, NULL, NULL, 'unexecuted', '', 1),
(114, 92, 'Organiser une campagne de vulgarisation de la PNT afin que les différents acteurs qui n’avaient pas participé à son élaboration puissent se l’approprier et la traduire plus tard dans leurs programmes d’action.', 0, NULL, NULL, 'executed', '', 1),
(115, 93, 'Réaliser une revue des politiques de promotion du produit touristique mises en œuvre jusqu’à présent.', 0, NULL, NULL, 'unexecuted', '', 1),
(116, 94, 'Etablir une relation claire et efficace entre les secteurs du tourisme et de l’artisanat afin de faire des propositions de mesures de renforcement du pôle « tourisme-culture-artisanat » et sensibiliser les décideurs sur l’interaction harmonieuse qui devrait exister entre ces deux secteurs.', 0, NULL, NULL, 'executed', '', 1),
(117, 95, 'Enoncer des indicateurs de performance par lesquels l’atteinte des objectifs sera appréciée et proposer un séquençage avec des cibles annuelles.', 0, NULL, NULL, 'executed', '', 1),
(118, 96, 'Intégrer le Programme de Développement Touristique de la Route des Pêches dans les actions phares à développer.', 0, NULL, NULL, 'executed', '', 1),
(119, 97, 'Proposer une stratégie visant la prise en compte du genre dans la PNT ainsi que les réformes structurelles spécifiques à opérer en vue d’améliorer significativement l’appui technique des administrations et favoriser le développement du financement et la mise en place d’un système d’information du secteur du tourisme.', 0, NULL, NULL, 'unexecuted', '', 1),
(120, 98, 'Désigner et responsabiliser les structures chargées directement de la réalisation des actions prévues.', 0, NULL, NULL, 'executed', '', 1),
(121, 99, 'Elaborer des plans quinquennaux assortis d’indicateurs de performance et de résultats de la politique', 0, NULL, NULL, 'executed', '', 1),
(122, 100, 'Réaliser une étude de référence à partir de laquelle des hypothèses seront formulées pour établir les effets et impacts attendus.', 0, NULL, NULL, 'unexecuted', '', 1);

-- --------------------------------------------------------

--
-- Structure de la table `recommendation_meta`
--

CREATE TABLE `recommendation_meta` (
  `id` int(11) NOT NULL,
  `recommendation_id` int(10) UNSIGNED NOT NULL,
  `key` varchar(35) NOT NULL,
  `value` text NOT NULL
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
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, 'dulYyPx0G9Lqre6Lmi82r.', 1268889823, 1574751918, 1, 'Admin', 'istrator', 'ADMIN', '0');

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
  ADD KEY `temporality_id` (`temporality_id`),
  ADD KEY `associated_recommendation_actor_id` (`recommendation_actor_id`);

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
-- Index pour la table `evaluation_questions`
--
ALTER TABLE `evaluation_questions`
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
-- Index pour la table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

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
-- Index pour la table `recommendation_meta`
--
ALTER TABLE `recommendation_meta`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT pour la table `evaluation_contracting_authorities`
--
ALTER TABLE `evaluation_contracting_authorities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT pour la table `evaluation_leading_authorities`
--
ALTER TABLE `evaluation_leading_authorities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `evaluation_meta`
--
ALTER TABLE `evaluation_meta`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT pour la table `evaluation_questions`
--
ALTER TABLE `evaluation_questions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;
--
-- AUTO_INCREMENT pour la table `evaluation_sectors`
--
ALTER TABLE `evaluation_sectors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT pour la table `evaluation_sector_groups`
--
ALTER TABLE `evaluation_sector_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
--
-- AUTO_INCREMENT pour la table `evaluation_stats`
--
ALTER TABLE `evaluation_stats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `evaluation_temporalities`
--
ALTER TABLE `evaluation_temporalities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `evaluation_thematics`
--
ALTER TABLE `evaluation_thematics`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `evaluation_thematic_groups`
--
ALTER TABLE `evaluation_thematic_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;
--
-- AUTO_INCREMENT pour la table `evaluation_types`
--
ALTER TABLE `evaluation_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `event_categories`
--
ALTER TABLE `event_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `event_meta`
--
ALTER TABLE `event_meta`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `event_tags`
--
ALTER TABLE `event_tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `event_tag_groups`
--
ALTER TABLE `event_tag_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `options`
--
ALTER TABLE `options`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT pour la table `post_categories`
--
ALTER TABLE `post_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `post_meta`
--
ALTER TABLE `post_meta`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT pour la table `post_tags`
--
ALTER TABLE `post_tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `post_tag_groups`
--
ALTER TABLE `post_tag_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT pour la table `recommendations`
--
ALTER TABLE `recommendations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
--
-- AUTO_INCREMENT pour la table `recommendation_activities`
--
ALTER TABLE `recommendation_activities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;
--
-- AUTO_INCREMENT pour la table `recommendation_meta`
--
ALTER TABLE `recommendation_meta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
  ADD CONSTRAINT `evaluations_ibfk_5` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `evaluations_ibfk_6` FOREIGN KEY (`recommendation_actor_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `evaluation_meta`
--
ALTER TABLE `evaluation_meta`
  ADD CONSTRAINT `evaluation_meta_ibfk_1` FOREIGN KEY (`evaluation_id`) REFERENCES `evaluations` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `evaluation_questions`
--
ALTER TABLE `evaluation_questions`
  ADD CONSTRAINT `evaluation_questions_ibfk_1` FOREIGN KEY (`evaluation_id`) REFERENCES `evaluations` (`id`) ON DELETE CASCADE;

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
  ADD CONSTRAINT `recommendations_ibfk_3` FOREIGN KEY (`evaluation_id`) REFERENCES `evaluations` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `recommendation_activities`
--
ALTER TABLE `recommendation_activities`
  ADD CONSTRAINT `recommendation_activities_ibfk_1` FOREIGN KEY (`recommendation_id`) REFERENCES `recommendations` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `recommendation_meta`
--
ALTER TABLE `recommendation_meta`
  ADD CONSTRAINT `recommendation_meta_ibfk_1` FOREIGN KEY (`recommendation_id`) REFERENCES `recommendations` (`id`) ON DELETE CASCADE;

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
