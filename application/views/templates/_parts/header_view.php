<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BEPPAAG</title>
    <!-- CSS Files -->
    <?php if(isset($headerCss) && !empty($headerCss)){
        foreach ($headerCss as $css){
            ?>
            <link href="<?= $css ?>" rel="stylesheet" type="text/css" />
            <?php
        }
    } ?>

    <link href="<?= $assetsUrl ?>public/css/os-stylec577.css" rel="stylesheet">
    <link href="<?= $assetsUrl ?>public/css/stylefd49.css" rel="stylesheet">
    <link href="<?= $assetsUrl ?>public/css/m-style5fab.css" rel="stylesheet">
    <link href="<?= $assetsUrl ?>public/css/custom.css" rel="stylesheet">
    <link href="<?= $assetsUrl ?>public/css/responsive.css" rel="stylesheet">
    <link href="<?= $assetsUrl ?>public/css/color.css" rel="stylesheet">
    <link href="<?= $assetsUrl ?>public/css/all.css" rel="stylesheet">
    <link href="<?= $assetsUrl ?>public/css/owl.carousel.min.css" rel="stylesheet">
    <link href="<?= $assetsUrl ?>public/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= $assetsUrl ?>public/css/stylesheet.css?v=1.23" rel="stylesheet">
    <link rel="icon" href="<?= $assetsUrl ?>public/images/favicon.png" type="image/png">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body style="">
<!--Wrapper Start-->
<!--<div class="wrapper">-->
    <header class="flex flex-row space transition" style="z-index: 99999;">
        <a href="#index.html"></a>
        <span id="btn-main-menu"></span>
        <ul class="flex flex-row center" id="main-menu">
            <li>
                <span>La Présidence</span>
                <ul class="">
                    <li>
                        <a href="#home/la-presidence/le-president/biographie/index.html">Le Président</a>
                    </li>
                    <li>
                        <a href="#home/la-presidence/le-secretaire-general-de-la-presidence/biographie/index.html">Le Secrétaire Général de la Présidence</a>
                    </li>
                    <li><a href="#ecrire-au-president/index.html">Écrire au Président</a></li>
                    <li><a href="#agenda/index.html">Agenda du Président</a></li>
                    <li><a href="#phrases-fortes-president/index.html">
                            Phrases fortes du Président de la République</a></li>
                </ul>
            </li>
            <li>
                <span>Les Institutions</span>
                <ul class="">
                    <li>
                        <a href="#home/les-institutions/assemblee-nationale/index.html">L&#039;Assemblee Nationale</a>
                    </li>
                    <li>
                        <a href="#home/les-institutions/la-cour-constitutionnelle/index.html">La Cour Constitutionnelle</a>
                    </li>
                    <li>
                        <a href="#home/les-institutions/la-cour-supreme/index.html">La Cour Suprême</a>
                    </li>
                    <li>
                        <a href="#home/les-institutions/le-conseil-economique-et-social/index.html">Le Conseil Économique et Social</a>
                    </li>
                    <li>
                        <a href="#home/les-institutions/la-haute-autorite-de-audiovisuel-et-de-la-communication/index.html">La Haute Autorité de l&#039;Audiovisuel et de la Communication</a>
                    </li>
                    <li>
                        <a href="#home/les-institutions/la-haute-cour-de-justice/index.html">La Haute Cour de Justice</a>
                    </li>
                </ul>
            </li>
            <li>
                <span>Bénin Révélé</span>
                <ul class="">
                    <li>
                        <a href="#home/benin-revele/mot-president-republique/index.html">Mot du Président de la République</a>
                    </li>
                    <li>
                        <a href="#home/benin-revele/decouvrir-benin-revele/index.html">Découvrir le Bénin Révélé </a>
                    </li>
                    <li>
                        <a target="blank" href="#http://revealingbenin.com/">Site web - Bénin Révélé</a>
                    </li>
                    <li><a href="#benin-revele/read/index.html">Lire la synthèse</a></li>
                    <li><a href="#benin-revele/download/index.html">Télécharger la synthèse</a></li>
                    <li><a href="#benin-revele/version-complete/download/index.html">Télécharger la version complète</a></li>
                    <li><a href="#benin-revele/45-projets-phares/download/index.html">Télécharger les 45 projets phares</a></li>
                    <li><a href="#revealing-benin/download/index.html">Download the summary</a></li>
                    <li><a href="#revealing-benin/45-flagship-projects/download/index.html">Download the 45 flagship projects</a></li>
                </ul>
            </li>
            <li>
                <span>Le Bénin</span>
                <ul class="">
                    <li>
                        <a href="#home/le-benin/les-symboles/les-armoiries/index.html">Les Symboles</a>
                    </li>
                    <li>
                        <a href="#home/le-benin/histoire/index.html">L&#039;histoire</a>
                    </li>
                    <li>
                        <a href="#home/le-benin/geographie/index.html">La Géographie</a>
                    </li>
                    <li>
                        <a target="blank" href="#https://challenge.presidence.bj/">Challenge - Je Connais Le Bénin</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#actualites/index.html">LES ACTUALITÉS</a>
                <ul class="">
                    <li><a href="#actualites/communiques/index.html">Communiqués</a></li>
                    <li><a href="#actualites/discours-interviews/index.html">Discours et interviews</a></li>
                    <li><a href="#actualites/comptes-rendus/index.html">Comptes rendus</a></li>
                    <li><a href="#actualites/point-presse/index.html">Point de Presse</a></li>
                </ul>
            </li>
        </ul>
        <span class="btn-search"></span>
    </header>