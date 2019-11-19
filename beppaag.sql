-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mar 19 Novembre 2019 à 15:24
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

--
-- Contenu de la table `evaluations`
--

INSERT INTO `evaluations` (`id`, `slug`, `title`, `object`, `year`, `active`, `type_id`, `temporality_id`, `leading_authority_id`, `contracting_authority_id`, `created_by`, `created_at`, `updated_at`) VALUES
(2, 'strategie-de-croissance-pour-la-reductio5dd28c1a17', 'Stratégie de Croissance pour la Réduction de la Pauvreté (SCRP 2011-2015)', 'Stratégie de Croissance pour la Réduction de la Pauvreté (SCRP 2011-2015)', 2016, 0, 3, 1, 2, 10, 1, '2019-11-18 12:18:34', '2019-11-19 14:56:47'),
(3, 'politique-nationale-de-developpement-de-5dd3fbbe95', 'Politique Nationale de Développement de l’Artisanat (PNDA)', 'Politique Nationale de Développement de l’Artisanat (PNDA)', 2014, 0, 4, 4, 3, 12, 1, '2019-11-19 14:27:10', '2019-11-19 14:56:52');

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
(12, 'beppaag5dd2709c87dea', 'BEPPAAG', 'Bureau de l’Evaluation des Politiques Publiques et de l’Analyse de l’Action Gouvernementale');

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
(3, 'cimes-benin5dd3fadb4aa5a', 'CIMES BENIN', 'Comptoir d’Ingénierie en Management, 01 BP 1959 Cotonou – BENIN, Téléphone : (229) 21.14.47.82 /95.69.47.89 ; cimesingenierie(at)yahoo.fr; boflorent(at)yahoo.fr');

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
(7, 2, 'cover_photo', '857347.jpg'),
(8, 2, 'evaluation_file', 'AbakeFoundationLettre5.pdf'),
(9, 2, 'objective', '<ul style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px 0px 0px 20px; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-size: 12px;"><li style="padding: 0px; margin: 0px 0px 5px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">analyser le fonctionnement du dispositif de pilotage de la mise en œuvre de la SCRP et de ses processus de prise de décision&nbsp;;</li><li style="padding: 0px; margin: 0px 0px 5px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">apprécier la capacité institutionnelle et organisationnelle du dispositif de pilotage de la mise en œuvre de la SCRP à assurer l’atteinte des objectifs de la stratégie&nbsp;;</li><li style="padding: 0px; margin: 0px 0px 5px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">analyser l’opérationnalité et l’efficacité actuelle du mécanisme de suivi et d’évaluation de la SCRP y compris le processus de revue de la stratégie et les capacités des acteurs à produire les extrants attendus.</li><li style="padding: 0px; margin: 0px 0px 5px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">faire une analyse rétrospective de la qualité du processus d’élaboration de la SCRP, y compris l’association des parties prenantes ;</li><li style="padding: 0px; margin: 0px 0px 5px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">faire une analyse de la qualité de la SCRP, des options et des orientations clés retenues pour le développement du Bénin ;</li><li style="padding: 0px; margin: 0px 0px 5px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">apprécier quantitativement et qualitativement les niveaux de résultats atteints pour chaque axe stratégique défini dans la SCRP ;</li><li style="padding: 0px; margin: 0px 0px 5px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">formuler des recommandations claires sous forme de plan d’actions détaillé à prendre en compte dans l’élaboration de la nouvelle stratégie.</li></ul>'),
(10, 2, 'description', '<p style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">La troisième génération de la Stratégie de Croissance pour la Réduction de la Pauvreté (SCRP) a pour objectif d’améliorer les conditions de vie des populations, notamment des pauvres puisqu’elle se veut pro-pauvre. Elle a été conçue pour faciliter l’atteinte des OMD. Elle a été mise en œuvre de 2011 à 2015 dans un contexte où le Bénin a régulièrement subi les affres des aléas économiques, politiques, sociaux, environnementaux, etc.</p><p style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Cinq axes opérationnels ont été définis et se résument comme suit.</p><ul style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px 0px 0px 20px; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-size: 12px;"><li style="padding: 0px; margin: 0px 0px 5px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Axe 1&nbsp;: Accélération durable de la croissance et de la transformation de l’économie&nbsp;;</li><li style="padding: 0px; margin: 0px 0px 5px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Axe 2&nbsp;: Développement des infrastructures&nbsp;;</li><li style="padding: 0px; margin: 0px 0px 5px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Axe 3&nbsp;: Renforcement du capital humain&nbsp;;</li><li style="padding: 0px; margin: 0px 0px 5px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Axe 4&nbsp;: Renforcement de la qualité de la gouvernance&nbsp;;</li><li style="padding: 0px; margin: 0px 0px 5px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Axe 5&nbsp;: Développement équilibré et durable de l’espace national.</li></ul><p style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">La mise en œuvre de la stratégie s’est faite suivant sept principes directeurs et deux principaux instruments d’opérationnalisation.</p><p style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Les sept (07) principes directeurs sont&nbsp;:</p><ul style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px 0px 0px 20px; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-size: 12px;"><li style="padding: 0px; margin: 0px 0px 5px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Principe 1&nbsp;: Intégration et gestion efficiente des programmes sectoriels&nbsp;;</li><li style="padding: 0px; margin: 0px 0px 5px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Principe 2&nbsp;: Meilleur ciblage des pauvres et des programmes&nbsp;;</li><li style="padding: 0px; margin: 0px 0px 5px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Principe 3 : Décentralisation de la stratégie de lutte contre la pauvreté</li><li style="padding: 0px; margin: 0px 0px 5px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Principe 4 : Gestion Axée sur les Résultats&nbsp;;</li><li style="padding: 0px; margin: 0px 0px 5px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Principe 5 : Alignement des programmes des PTF avec la SCRP&nbsp;;</li><li style="padding: 0px; margin: 0px 0px 5px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Principe 6 : Promotion de la subsidiarité et du partenariat&nbsp;; et enfin</li><li style="padding: 0px; margin: 0px 0px 5px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Principe 7 : Neutralité politique vis-à-vis des cibles et des bénéficiaires</li></ul><p style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Au nombre de deux (02), les principaux instruments d\'opérationnalisation de la SCRP sont le Programme d’Actions Prioritaires (PAP) et les Plans de Développement Communaux (PDC). Le PAP est l\'instrument programmatique de toutes actions prioritaires ainsi que des investissements y afférents. La mise en cohérence permanente des PDC avec les orientations nationales et la SCRP permet d\'amener les collectivités locales à arrimer les interventions à la base aux objectifs nationaux définis.</p><p style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Les ressources nécessaires mobilisées pour la mise en œuvre de la stratégie ont des sources aussi diverses que variées. Au titre des ressources internes, il y a l’épargne nationale. S\'agissant des ressources externes, il y a les Investissements Directs Etrangers (IDE) et l\'aide des Partenaires Techniques et Financiers (PTF).</p>'),
(11, 2, 'methodological_approach', '<p style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Pour le volet institutionnel et le mécanisme de suivi et d’évaluation de la SCRP 3, l’approche méthodologique utilisée est articulée autour d’une revue documentaire et d’entretiens avec les parties prenantes au processus de suivi et d’évaluation de la SCRP, des partenaires techniques et financiers, et de quelques acteurs de la société civile. A l’issue de la revue documentaire et des entretiens, un cadre d’analyse a permis de réponse aux questions évaluatives.</p><p style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">S’agissant du volet relatif à l’évaluation de la mise en œuvre de la SCRP 3, il est essentiellement fondé sur l’analyse des données secondaires à travers l\'exploitation de plusieurs documents dont les rapports d’avancement de la SCRP, les aide-mémoires des revues de la SCRP, les rapports de suivi et d’évaluation de la mise en œuvre des OMD au Bénin, le rapport d’évaluation à mi-parcours de la mise en œuvre du Plan d’Actions d’Istanbul et les Tableaux de Bord de Suivi du PAP (TBS-PAP). Une collecte de données complémentaires a été faite au niveau des Directions de la Programmation et de la Prospective (DPP) et d\'autres structures clés.</p><p style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Limites&nbsp;:</p><p style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Selon le modèle d’évaluation retenu, les données à utiliser devraient être celles des années 2010 à 2015. Mais, en raison des difficultés liées à la fois à l’accès et au manque de certaines données, l’évaluation n’a pris en compte que les données disponibles.</p><p style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">De plus, les données à fournir par les ministères sectoriels n’ont pu l’être puisqu’elles ne sont pas encore validées par l’ensemble des acteurs. Ainsi, en absence des données de 2015, notamment, celles de 2014 sont utilisées. Elles ne rendent donc pas fidèlement compte de la réalité mais approchent celle-ci au regard de la tendance affichée par les indicateurs du secteur étudié. Il convient également de souligner la non disponibilité des informations financières relatives à la mise en œuvre de la stratégie, ce qui n’a pas permis d’approfondir les analyses en qui concerne le critère d’efficience.</p><p style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Par ailleurs, en raison des ressources allouées à l’évaluation, les analyses n’ont pu prendre en compte la perception des acteurs impliqués dans la mise en œuvre de la stratégie en vue d’apporter des nuances importantes sur des aspects spécifiques. Par conséquent, le critère de durabilité, de même que les acquis et leçons apprises, n’ont pu être examinés convenablement.</p><p style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">En outre, du fait de son envergure, cette évaluation devrait s’appuyer sur les résultats de plusieurs évaluations d’impacts spécifiques, notamment sur les plan social, économique et institutionnel. Ce qui n’a pas permis d’approfondir les analyses à cet effet.</p>'),
(12, 2, 'results_resume', '<p style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; box-sizing: border-box; padding: 0px; margin: 0px 0px 10px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;"><strong style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; box-sizing: border-box; padding: 0px; margin: 0px; font-size: inherit; font-weight: 700;">Pertinence&nbsp;</strong>: Analyser la pertinence des axes stratégiques</p><p><label style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px 0px 7px; margin: 0px 0px 10px; font-size: 17px; color: rgb(0, 0, 0); line-height: 22px; font-weight: 600; display: block; border-bottom: 1px solid rgb(230, 230, 230);"></label></p><div style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px; margin: 0px; font-size: 12px;"><p style="padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Par rapport à l’axe « accélération durable de la croissance et de la transformation de l’économie », on peut retenir que le choix fait par le Gouvernement qui consiste à accélérer les réformes afin de diversifier l’économie et de relever le taux de croissance à 7,5%, à l’horizon 2015 est bien pertinent. Cela se justifie par le fait que les quatre domaines prioritaires d’intervention à savoir, l’intensification de la croissance et la consolidation du cadre macroéconomique, la dynamisation du secteur privé et le développement des entreprises, la diversification de l’économie par la promotion de nouvelles filières porteuses pour les exportations et enfin, la promotion de l’intégration régionale et de l’insertion dans les réseaux mondiaux, sont bien pertinents pour relever les défis identifiés lors du diagnostic.</p><p style="padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">En ce qui concerne le développement des infrastructures, notamment celles économiques, focalisées sur les secteurs du transport, de l’énergie, de l\'eau, des technologies de l’information, de la communication, du bâtiment et de l’urbanisme, la non cohérente de la logique d’intervention (inexistence de synergie, simple énumération d’actions sans interrelation et ordonnancement plus ou moins précis, projets non structurants…), ne permet guère d’optimiser leur impact sur les populations pauvres. Il en découle que la SCRP 2011-2015 aurait gagné le pari d’être une stratégie pro-pauvre en matière de développement des infrastructures si un nombre raisonnable de projets structurants d’infrastructures avait été identifié après un examen approfondi et conséquent de leurs impacts/effets sur les pauvres. La pertinence est ici hypothéquée. Pour ce qui est du développement du capital humain, le choix de cet axe stratégique, au regard des défis, est bien pertinent dans la mesure où il revêt un caractère transversal et déterminant. Aucune action de développement ne peut être conduite sans l’indispensable et nécessaire ressource immatérielle que constitue le capital humain. A cet effet, huit (08) domaines d’intervention ont été identifiés et ciblés pour promouvoir l’éducation, la santé, l’emploi et les loisirs d’une part, et pour réduire les inégalités liées au genre d’autre part. Mais, les indicateurs d’impact de la santé retenus sont pertinents pour accélérer l’atteinte des OMD, tandis que ceux relatifs à l’éducation et la formation sont limités à l’éducation primaire et à l’alphabétisation des plus jeunes (priorité à l’éducation de base). Par ailleurs, l’accent n’a pas été mis ni sur l’amélioration des capacités individuelles à soutenir la productivité, ni sur la formation professionnelle et l’apprentissage, ce qui réduit leur pertinence. Par ailleurs, la SCRP a abordé des thématiques spécifiques pro-pauvres (emplois décents, questions liées au VIH/SIDA et au genre) mais a manqué d’en faire des priorités, notamment en ce qui concerne la promotion de l’emploi et le genre, dans la mesure où il n’y a pas d’indicateurs pour le suivi des progrès accomplis au niveau ces deux thématiques.</p><p style="padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Le renforcement de la qualité de la gouvernance constitue un axe bien pertinent dans la mesure où, le secteur privé, principal créateur et pourvoyeur d’emplois dans une économie de marché, trouve les conditions de son plein épanouissement, grâce à une gouvernance bonne et efficace. Cependant, il n’a pas été proposé dans la SCRP 2011-2015, d’indicateurs de résultat pouvant permettre d’apprécier ou d’approcher l’appréciation globale de la qualité de la gouvernance.</p><p style="padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Le développement équilibré et durable de l’espace national est l’une des conditions préalables à la réduction de la pauvreté et des inégalités sociales car, il induit la valorisation des ressources et potentialités locales, base de la création d’emplois et de richesse, ainsi que la réduction des disparités spatiales en matière d’infrastructures et d’équipements. Par conséquent, le choix du développement équilibré et durable de l’espace national comme axe stratégique de la SCRP 2011-2015 est bien pertinent.</p><p style="padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Le cadre institutionnel et le mécanisme de suivi et d’évaluation mis en place pour le pilotage et le suivi-évaluation de la mise en œuvre de la SCRP restent pertinents. Cependant, des améliorations restent à apporter pour améliorer son efficacité et l’appropriation du processus de pilotage par toutes les parties prenantes. Par ailleurs, le mécanisme pourrait être allégé au niveau du sous-système d’évaluation en se focalisant sur le seul sous-système traitant de toutes les questions d’évaluation.</p><p style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; box-sizing: border-box; padding: 0px; margin: 0px 0px 10px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;"><strong style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; box-sizing: border-box; padding: 0px; margin: 0px; font-size: inherit; font-weight: 700;">Cohérence&nbsp;</strong>: Analyser la Cohérence de la SCRP avec le système national de planification et son appropriation par les parties prenantes</p><p style="padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;"><label style="padding: 0px 0px 7px; margin: 0px 0px 10px; font-size: 17px; color: rgb(0, 0, 0); line-height: 22px; font-weight: 600; display: block; border-bottom: 1px solid rgb(230, 230, 230);"></label></p><div style="padding: 0px; margin: 0px;"><p style="padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">L’analyse de cohérence au niveau de la planification stratégique (cohérence entre la SCRP 2011-2015 et les différents documents de planification) montre que la SCRP 2011-2015 est en cohérence avec les différents documents de planification de développement du pays : (i) les actions prioritaires en matière de santé, d’emploi et de thématiques spécifiques relatives au genre et au VIH/SIDA retenues dans la SCRP opérationnalisent les grandes orientations de la vision Alafia 2025 ; (ii) la SCRP est bien cohérente avec les OSD si l\'horizon de ces dernières est bien étendu au-delà de 2011 ; (iii) les politiques sectorielles constituent les déclinaisons de la vision Alafia 2025 et sont alignées sur les OMD auxquels le Bénin a souscrit à l’horizon 2015 ; (iv) la SCRP 2011-2015 a été élaborée dans l’optique d’accélérer l’atteinte des OMD. En ce qui concerne la cohérence opérationnelle, on peut soutenir qu’elle est tout aussi bien établie dans la mesure où le Programme d’Actions Prioritaires, le Programme d’Investissements Publics, les budgets sectoriels annuels et les Plans de Développement Communaux, sont élaborés en tenant compte des domaines prioritaires d’intervention identifiés dans la SCRP.</p><p style="padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Cohérence du cadre institutionnel de pilotage de la SCRP et de son mécanisme de suivi-évaluation avec le cadre national de gestion du développement : Le dispositif mis en place au Bénin pour le pilotage de la mise en œuvre de la SCRP est en cohérence avec le dispositif institutionnel de gestion du développement. En effet, le cadre institutionnel de pilotage de la mise en œuvre de la SCRP est organisé autour de cinq instances : le Conseil d’Orientation (CO), le Comité de Pilotage (CP), les Groupes Techniques, thématiques et Sectoriels (GTS), les Comités Départementaux de Suivi (CDS) et les Comités Communaux de Suivi (CCS) de la mise en œuvre de la SCRP. Ces différentes instances s’inscrivent bien dans le cadre institutionnel de gestion du développement national tel que consacré par la législation.</p><p style="padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">L’appropriation de la SCRP 2011-2015est une réalité effective car les différents acteurs se réfèrent à son contenu tout au long des processus de planification sectorielle et communale (élaboration des documents de stratégies, des budgets-programmes, des Plans de Développement Communaux…). De même, le processus d’organisation du dispositif de pilotage de la SCRP est bien maitrisé par les différentes parties prenantes. Toutefois, la faible fonctionnalité des différents comités n’a pas permis d’assurer le suivi de la mise en œuvre de la SCRP aux niveaux décentralisé et déconcentré. Par contre, si le processus d’élaboration des rapports d’avancement est maîtrisé par les acteurs au niveau central, il n’en est pas de même pour les acteurs aux niveaux déconcentré et décentralisé. Aussi, l’appropriation des autres documents qui accompagnent la SCRP (PAP et cadre de suivi des performances de la SCRP) demeure-t-elle faible : aux niveaux déconcentré et décentralisé, les acteurs ont une faible connaissance de l’existence du cadre de suivi des performances de la SCRP, du PAP dont les PDC sont des outils d’opérationnalisation.</p><p style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; box-sizing: border-box; padding: 0px; margin: 0px 0px 10px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;"><strong style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; box-sizing: border-box; padding: 0px; margin: 0px; font-size: inherit; font-weight: 700;">Efficacité</strong>&nbsp;: Analyser l’efficacité de la SCRP</p><p style="padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;"><label style="padding: 0px 0px 7px; margin: 0px 0px 10px; font-size: 17px; color: rgb(0, 0, 0); line-height: 22px; font-weight: 600; display: block; border-bottom: 1px solid rgb(230, 230, 230);"></label></p><div style="padding: 0px; margin: 0px;"><p style="padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Les performances découlant de la mise en œuvre du PAP ont été analysées en raison du fait que les actions du PAP n’ont pas été pondérées d’une part, et que d’autre part, après le 31 décembre 2015, beaucoup d’actions prioritaires sont en cours de mise en œuvre, ce qui signifie que le taux d’exécution physique du PAP est nettement en deçà de 100%.</p><p style="padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">L’analyse a permis de constater que le PAP est mis en œuvre à travers cinq (05) programmes, vingt-neuf (29) sous-programmes, cent huit (108) objectifs et sept cent douze (712) actions dites prioritaires contre huit cent cinquante (850) initialement annoncées. En somme, cent trente-huit (138) actions prioritaires n’ont pu être programmées sur la période. Mais, les mesures/projets en cours d’exécution jusqu’en 2015 sont, soit de nature pérenne pour la plupart, soit la durée de mise en œuvre excède la période 2011-2015, ce qui pourrait signifier qu’elles demeurent encore pertinentes dans la mesure où les problèmes subsistent toujours sous diverses formes. Dans ces conditions, ils sont reconductibles pour une nouvelle stratégie. Par contre, les mesures qui ont été suspendues l’ont été pour des raisons d’insuffisance de financement. Il en est de même pour les mesures non entamées où aucune ressource n’a été prévue au budget de l’Etat tout au long de la période de mise en œuvre.</p><p style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; box-sizing: border-box; padding: 0px; margin: 0px 0px 10px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">&nbsp;<strong style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; box-sizing: border-box; padding: 0px; margin: 0px; font-size: inherit; font-weight: 700;">Efficience&nbsp;</strong>: Analyser l’efficience de la SCRP</p><p style="padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;"><label style="padding: 0px 0px 7px; margin: 0px 0px 10px; font-size: 17px; color: rgb(0, 0, 0); line-height: 22px; font-weight: 600; display: block; border-bottom: 1px solid rgb(230, 230, 230);"></label></p><div style="padding: 0px; margin: 0px;"><p style="padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">L’efficience étant la mesure dans laquelle les objectifs ont été atteints à moindre coût, il n’est guère possible, d’apprécier l’efficience de la SCRP 2011-2015 à fin 2015, étant donné qu’à cette date, le taux moyen des mesures/projets prioritaires inscrits au PAP et qui sont encore en cours d’exécution est de 70%.Toutefois, il a été procédé à l’analyse budgétaire de l’exécution budgétaire des programmes sur la période 2012 à 2014 pour laquelle les données sont disponibles et ce, suivant les secteurs retenus dans le document de base de la SCRP.Une analyse du budget voté chaque année a permis de constater que ces budgets respectifs n’ont jamais été en cohérence avec les prévisions annuelles de la SCRP. Une moindre priorité a été accordée aux secteurs « production et commerce » et « infrastructures productives » dans l’allocation des budgets contrairement aux prévisions de la SCRP : les secteurs sociaux (34,8% contre 33,8%), la gouvernance (12,9% contre 7,0%), la « défense et sécurité » (7,6% contre 4,0%) et la souveraineté (5,0% contre 2,5%) ont pris une part importante du budget au détriment des secteurs « production et commerce » (8,8% contre 12,3%) et « infrastructures productives » (14,3% contre 24,3%). Bien que ce constat soit fait chaque année, rien n’a été fait tout au long de la période de mise en œuvre de la SCRP pour rendre la structure du budget cohérente avec les prévisions de la SCRP.</p><p style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; box-sizing: border-box; padding: 0px; margin: 0px 0px 10px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;"><strong style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; box-sizing: border-box; padding: 0px; margin: 0px; font-size: inherit; font-weight: 700;">Impact de la SCRP</strong></p><p style="padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;"><label style="padding: 0px 0px 7px; margin: 0px 0px 10px; font-size: 17px; color: rgb(0, 0, 0); line-height: 22px; font-weight: 600; display: block; border-bottom: 1px solid rgb(230, 230, 230);"></label></p><div style="padding: 0px; margin: 0px;"><p style="padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">L’analyse des performances socio-économiques du Bénin sur la période 2011-2015 montre : (i) une croissance économique moyenne de 5,3% sur la période 2001-2015 mais, qui reste insuffisante dans un contexte où la croissance démographique est de 3,5% par an ; (ii) une persistance voire une légère augmentation des inégalités dans la distribution de la consommation par tête des ménages, inégalités principalement tirées par tête des ménages, inégalités principalement tirées par les déséquilibres entre les départements ; (iii) une augmentation de 16,5% du coût des besoins essentiels qui constitue le seuil de pauvreté. En conséquence, la pauvreté monétaire s’est aggravée, passant de 36,2% en 2011 à 40,1% en 2015 alors qu’il était attendu que la mise en œuvre de la SCRP3 permette de réduire son incidence à 25% en 2015. La détérioration la plus importante s’observe au niveau des ménages urbains. La pauvreté non monétaire connaît quant à elle un léger recul passant de 30,2% en 2011 à 29,4% en 2015 mais avec une dégradation de la situation en milieu rural.</p><p style="padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Globalement, aussi bien la croissance économique que l’amélioration de l’accès aux infrastructures de base résultant de la mise en œuvre de la SCRP3 ne semblent pas avoir profité aux plus pauvres. Cette situation questionne encore une fois l’efficacité de la mise en œuvre des politiques publiques conçues pour être pro-pauvres mais qui au final impactent très peu la répartition équitable des fruits de la croissance et l’inclusion des populations vulnérables dans la création de richesse.</p><p style="padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Un élément fondamental expliquant la contre-performance en matière de réduction de la pauvreté sur la période 2011-2015 reste la hausse importante du coût des besoins essentiels malgré une inflation globalement maîtrisée. Il est donc nécessaire d’accorder une attention particulière au suivi de l’évolution des prix des biens et services entrant dans la construction du seuil de pauvreté.</p><p style="padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">les déséquilibres entre les départements ; (iii) une augmentation de 16,5% du coût des besoins essentiels qui constitue le seuil de pauvreté. En conséquence, la pauvreté monétaire s’est aggravée, passant de 36,2% en 2011 à 40,1% en 2015 alors qu’il était attendu que la mise en œuvre de la SCRP3 permette de réduire son incidence à 25% en 2015. La détérioration la plus importante s’observe au niveau des ménages urbains. La pauvreté non monétaire connaît quant à elle un léger recul passant de 30,2% en 2011 à 29,4% en 2015 mais avec une dégradation de la situation en milieu rural.</p><p style="padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Globalement, aussi bien la croissance économique que l’amélioration de l’accès aux infrastructures de base résultant de la mise en œuvre de la SCRP3 ne semblent pas avoir profité aux plus pauvres. Cette situation questionne encore une fois l’efficacité de la mise en œuvre des politiques publiques conçues pour être pro-pauvres mais qui au final impactent très peu la répartition équitable des fruits de la croissance et l’inclusion des populations vulnérables dans la création de richesse.</p><p style="padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Un élément fondamental expliquant la contre-performance en matière de réduction de la pauvreté sur la période 2011-2015 reste la hausse importante du coût des besoins essentiels malgré une inflation globalement maîtrisée. Il est donc nécessaire d’accorder une attention particulière au suivi de l’évolution des prix des biens et services entrant dans la construction du seuil de pauvreté.</p></div></div></div></div></div>'),
(13, 3, 'cover_photo', '8573471.jpg'),
(14, 3, 'evaluation_file', '2.pdf'),
(15, 3, 'objective', '<p style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">L’objectif global de la mission d’évaluation est de faire un point exhaustif de la mise en œuvre de la PNDA dans le cadre des Orientations Stratégiques de Développement du Bénin en général et de la stratégie de dynamisation du secteur privé et de la promotion de l’emploi des jeunes et des femmes en particulier. L’évaluation vise aussi à tirer tous les enseignements du passé afin d’améliorer les effets et impacts attendus de ladite politique.</p><p style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">De façon spécifique il s’agit de :</p><ul style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px 0px 0px 20px; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-size: 12px;"><li style="padding: 0px; margin: 0px 0px 5px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">analyser le degré de pertinence de la PNDA par rapport aux Orientations Stratégiques de Développement (2011-2020) ;</li><li style="padding: 0px; margin: 0px 0px 5px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">analyser les principes directeurs de la mise en cohérence de la PNDA avec la vision globale définie pour le pôle prioritaire de développement « tourisme, culture et artisanat » ;</li><li style="padding: 0px; margin: 0px 0px 5px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">formuler des recommandations pratiques pour une meilleure mise en œuvre de la PNDA 2005-2025.</li></ul>'),
(16, 3, 'description', '<p style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">La PNDA a pour vision de faire de l’artisanat béninois « un secteur bien organisé à l’horizon 2025 où opèrent des entreprises artisanales compétitives, contribuant notablement à la valorisation du patrimoine national et au bien-être social de l’artisan et du béninois, dans un pays uni et de paix ».</p><p style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Elle comporte cinq (05) orientations stratégiques à savoir : (i) l’amélioration des conditions-cadres ; (ii) la promotion de l’organisation des acteurs ; (iii) le renforcement du savoir-faire et du savoir-être ; (iv) la promotion et le développement des microentreprises artisanales ; (v) la protection sociale des artisans.</p>'),
(17, 3, 'methodological_approach', '<ul style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px 0px 0px 20px; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-size: 12px;"><li style="padding: 0px; margin: 0px 0px 5px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Revue documentaire;</li><li style="padding: 0px; margin: 0px 0px 5px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Collecte d\'information auprès des acteurs au moyen d\'un guide d\'entretien;</li><li style="padding: 0px; margin: 0px 0px 5px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">51 acteurs représentant toutes les parties prenantes ont été interviewés;</li><li style="padding: 0px; margin: 0px 0px 5px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Recours à une grille d\'évaluation pour apprécier la pertinence, la cohérence, l’efficacité, l’efficience et la durabilité des orientations contenues dans la PNDA.</li></ul>'),
(18, 3, 'results_resume', '<p style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; box-sizing: border-box; padding: 0px; margin: 0px 0px 10px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">La PNDA est-elle cohérente avec les Orientations Stratégiques de Développement ?</p><p><label style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px 0px 7px; margin: 0px 0px 10px; font-size: 17px; color: rgb(0, 0, 0); line-height: 22px; font-weight: 600; display: block; border-bottom: 1px solid rgb(230, 230, 230);"></label></p><div style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; padding: 0px; margin: 0px; font-size: 12px;"><p style="padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Les choix stratégiques opérés dans la PNDA sont de nature à opérationnaliser les orientations des politiques nationale et internationale.</p><p style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; box-sizing: border-box; padding: 0px; margin: 0px 0px 10px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Quel bilan peut-on faire de la mise en œuvre de la PNDA? Cette stratégie a-t-elle été efficace ?</p><p style="padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;"><label style="padding: 0px 0px 7px; margin: 0px 0px 10px; font-size: 17px; color: rgb(0, 0, 0); line-height: 22px; font-weight: 600; display: block; border-bottom: 1px solid rgb(230, 230, 230);"></label></p><div style="padding: 0px; margin: 0px;"><p style="padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Au regard des faiblesses relevées et de la durée de validité et de mise en œuvre de la PNDA, il est difficile de dire que la mise en œuvre est efficace ou pas.</p><p style="padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Toutefois, des efforts louables ont été accomplis en terme de réalisation de certaines actions, même si ces dernières ne sont pas les plus importantes.</p><p style="padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">A moins de 11 ans de l’échéance fixée, l’espoir est permis, sur la base des niveaux de réalisation, que les objectifs seront atteints.</p><p style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; box-sizing: border-box; padding: 0px; margin: 0px 0px 10px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Les cadres institutionnel, législatif et réglementaire de mise en œuvre de la PNDA sont-ils adéquats pour prendre en charge efficacement les nouveaux défis du secteur de l’artisanat ?</p><p style="padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;"><label style="padding: 0px 0px 7px; margin: 0px 0px 10px; font-size: 17px; color: rgb(0, 0, 0); line-height: 22px; font-weight: 600; display: block; border-bottom: 1px solid rgb(230, 230, 230);"></label></p><div style="padding: 0px; margin: 0px;"><p style="padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Le cadre institutionnel, législatif et réglementaire a connu des mutations favorables à la mise en œuvre de la PNDA mais demeure peu attractif du point de vue des acteurs de champ.</p><p style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; box-sizing: border-box; padding: 0px; margin: 0px 0px 10px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Le financement des secteurs de l’artisanat et du tourisme sont-ils en adéquation avec les objectifs de la PNDA ?</p><p style="padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;"><label style="padding: 0px 0px 7px; margin: 0px 0px 10px; font-size: 17px; color: rgb(0, 0, 0); line-height: 22px; font-weight: 600; display: block; border-bottom: 1px solid rgb(230, 230, 230);"></label></p><div style="padding: 0px; margin: 0px;"><p style="padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Pas de réponse claire de l\'évaluation.</p><p style="font-family: montserrat, sans-serif, calibri, tahoma, verdana; box-sizing: border-box; padding: 0px; margin: 0px 0px 10px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Quels sont les effets de la mise en œuvre de la PNDA sur la croissance économique? Dans quelles mesures a-t-elle impacté la réduction de la pauvreté ?</p><p style="padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;"><label style="padding: 0px 0px 7px; margin: 0px 0px 10px; font-size: 17px; color: rgb(0, 0, 0); line-height: 22px; font-weight: 600; display: block; border-bottom: 1px solid rgb(230, 230, 230);"></label></p><div style="padding: 0px; margin: 0px;"><p style="padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">La contribution moyenne du secteur de l’artisanat est environ 10,8% du PIB du Bénin. Elle est relativement faible par rapport à la contribution des autres sous-secteurs de l’économie nationale.</p><p style="padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">L’impact de la PNDA sur l’emploi est apprécié par le nombre d’emplois permanents et occasionnels générés par les entreprises artisanales. Entre 2006 et 2007, l’effectif global des employés permanents a progressé de 10%. Le nombre d’emplois occasionnels a évolué dans la même proportion que celui des emplois permanents.</p><p style="padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;">Sur la base des résultats issus des enquêtes réalisées, 36% des agents enquêtés ont reconnu que la mise en œuvre de la PNDA a entrainé une augmentation de leur revenu sans pouvoir toutefois indiquer dans quelle proportion.</p><p style="padding: 0px; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(53, 53, 53); line-height: 22px;"><br></p></div></div></div></div></div>');

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
(24, 'artisanat-et-tourisme5dd3fab54438d', 'Artisanat et Tourisme', 'Artisanat et Tourisme');

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
(21, 2, 17),
(22, 2, 16),
(23, 2, 15),
(24, 3, 24);

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
(27, 2, 6),
(28, 2, 5),
(29, 2, 4),
(30, 2, 3),
(31, 3, 6);

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
(4, 'evaluation-ex-post5dd3fa943ab2d', 'Evaluation ex post', 'Evaluation ex post');

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
  `updated_at` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `recommendations`
--

INSERT INTO `recommendations` (`id`, `evaluation_id`, `user_id`, `start_date`, `status`, `created_at`, `updated_at`, `active`) VALUES
(2, 2, 1, '2020-03-14 00:00:00', 0, '2019-11-18 12:18:34', NULL, 1),
(3, 3, 1, '2020-01-18 00:00:00', 0, '2019-11-19 14:27:10', NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `recommendation_activities`
--

CREATE TABLE `recommendation_activities` (
  `id` int(10) UNSIGNED NOT NULL,
  `recommendation_id` int(10) UNSIGNED NOT NULL,
  `title` text NOT NULL,
  `amount` int(10) UNSIGNED DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `execution_level` varchar(35) NOT NULL,
  `explanation` text NOT NULL,
  `recipient` text,
  `active` int(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

--
-- Contenu de la table `recommendation_meta`
--

INSERT INTO `recommendation_meta` (`id`, `recommendation_id`, `key`, `value`) VALUES
(2, 2, 'attribution_comment', 'orem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt');

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
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, 'IR/Hhs/YqO5/Mo8Yte6R8e', 1268889823, 1574171655, 1, 'Admin', 'istrator', 'ADMIN', '0');

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
  ADD KEY `user_id` (`user_id`),
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `evaluation_contracting_authorities`
--
ALTER TABLE `evaluation_contracting_authorities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `evaluation_leading_authorities`
--
ALTER TABLE `evaluation_leading_authorities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `evaluation_meta`
--
ALTER TABLE `evaluation_meta`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT pour la table `evaluation_sectors`
--
ALTER TABLE `evaluation_sectors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT pour la table `evaluation_sector_groups`
--
ALTER TABLE `evaluation_sector_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT pour la table `evaluation_types`
--
ALTER TABLE `evaluation_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
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
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `recommendation_activities`
--
ALTER TABLE `recommendation_activities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
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
  ADD CONSTRAINT `recommendations_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
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
