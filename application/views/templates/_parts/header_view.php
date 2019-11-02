<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BEPPAAG</title>
    <!-- CSS Files -->
    <link href="<?= $assetsUrl ?>public/css/custom.css" rel="stylesheet">
    <link href="<?= $assetsUrl ?>public/css/responsive.css" rel="stylesheet">
    <link href="<?= $assetsUrl ?>public/css/color.css" rel="stylesheet">
    <link href="<?= $assetsUrl ?>public/css/all.css" rel="stylesheet">
    <link href="<?= $assetsUrl ?>public/css/owl.carousel.min.css" rel="stylesheet">
    <link href="<?= $assetsUrl ?>public/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= $assetsUrl ?>public/css/stylesheet.css?v=1.11" rel="stylesheet">
    <link rel="icon" href="<?= $assetsUrl ?>public/images/favicon.png" type="image/png">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<!--Wrapper Start-->
<div class="wrapper">
    <!--Header Start-->
    <header class="wf100 header">
        <div class="topbar">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <ul class="left-links">
                            <li><a target="_blank" href="https://www.presidence.bj/">LA PRESIDENCE</a></li>
                            <li><a target="_blank" href="https://www.unicef.fr">UNICEF</a></li>
                            <li><a href="#">CNE</a></li>
                            <li><a href="#">BEPPAAG</a></li>
                            <!--<li> <a href="#">A-Z Index</a> </li>-->
                        </ul>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <ul class="right-links">
                            <li><a href="#"><i class="fas fa-phone"></i> <strong>+229 90 90 90 90</strong></a></li>
                            <li><a href="mailto:contact@beppaag.com"><i class="fas fa-envelope"></i> contact@beppaag.com</a></li>
                            <li> <a href="<?= pro_url() ?>"><i class="fas fa-desktop"></i> Connexion</a> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="logo-nav-row">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <nav class="navbar">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                        data-target="#bs-example-navbar-collapse-1" aria-expanded="false"><span
                                            class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span
                                            class="icon-bar"></span> <span class="icon-bar"></span></button>
                                <a class="navbar-brand" href="<?= site_url() ?>"><img style="height: 100px;"
                                                                                  src="<?= $assetsUrl ?>public/images/benin-revele-logo.png"
                                                                                  alt=""></a></div>
                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav">
                                    <li><a href="<?= site_url() ?>">Accueil</a></li>
                                    <li><a href="##">Evaluations</a></li>
                                    <li><a href="<?= site_url('events') ?>">Evènements</a></li>
                                    <li><a href="<?= site_url('blog') ?>">Actualités</a></li>
                                    <li class="dropdown"><a href="##" class="dropdown-toggle" data-toggle="dropdown"
                                                            role="button" aria-haspopup="true" aria-expanded="false">Rubriques
                                            <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="##">Publications</a></li>
                                            <li><a href="##">Gestion de connaissances</a></li>
                                            <li><a href="##">Partenariat</a></li>
                                            <li><a href="##">Ressources techniques</a></li>
                                        </ul>
                                    </li><li class="dropdown"><a href="##" class="dropdown-toggle" data-toggle="dropdown"
                                                                 role="button" aria-haspopup="true" aria-expanded="false">Médiathèque
                                            <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="##">Photos</a></li>
                                            <li><a href="##">Vidéos</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="<?= site_url('contact') ?>">Contact</a></li>
                                </ul>
                                <ul class="nav navbar-nav navbar-right">
                                    <li class="search-btn"><a class="search-icon" href="##search"> <i
                                                    class="fas fa-search"></i> </a></li>
                                    <!--<li class="bars-btn"><a href="##" id="sidebarCollapse"><img src="<?= $assetsUrl ?>public/images/bars.png"-->
                                    <!--alt=""> </a></li>-->
                                </ul>
                                <div id="search">
                                    <button type="button" class="close">×</button>
                                    <form class="search-overlay-form">
                                        <input type="search" value="" name="s" placeholder="Saisissez le mot clé..."/>
                                        <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>