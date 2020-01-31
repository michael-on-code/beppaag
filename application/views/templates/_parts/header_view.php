
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $options['siteName'] ?> - <?= $pageTitle ?></title>
    <meta name="description" content="<?= $pageDescription ?>">

    <!--    Facebook Meta Tags-->
    <meta property="og:title" content="<?= $pageTitle ?>">
    <meta property="og:description" content="<?= $pageDescription ?>">
    <meta property="og:image" content="<?= $pageDefaultImageUrl ?>">
    <meta property="og:url" content="<?= $pageUrl ?>">

    <!--    Twitter Meta Tags-->
    <meta name="twitter:title" content="<?= $pageTitle ?>">
    <meta name="twitter:description" content="<?= $pageDescription ?>">
    <meta name="twitter:image" content="<?= $pageDefaultImageUrl ?>">
    <meta name="twitter:card" content="<?= $pageUrl ?>">

    <!--    Others Meta Tags -->
    <meta property="og:site_name" content="<?= $options['siteName'] ?>">
    <meta name="twitter:image:alt" content="<?= $options['siteName'] ?>">

    <!-- CSS Files -->
    <?php if (isset($headerCss) && !empty($headerCss)) {
        foreach ($headerCss as $css) {
            ?>
            <link href="<?= $css ?>" rel="stylesheet" type="text/css"/>
            <?php
        }
    } ?>

    <link href="<?= $assetsUrl ?>public/css/os-stylec577.css?v=1.0" rel="stylesheet">
    <link href="<?= $assetsUrl ?>public/css/stylefd49.css?v=1.02" rel="stylesheet">
    <link href="<?= $assetsUrl ?>public/css/m-style5fab.css?v=1.001" rel="stylesheet">

    <link href="<?= $assetsUrl ?>public/css/custom.css?v=1.01" rel="stylesheet">
    <?php
    $this->load->view('templates/_parts/header_css_file_include');
    ?>
    <link href="<?= $assetsUrl ?>public/css/responsive.css?v=1.001" rel="stylesheet">
    <link href="<?= $assetsUrl ?>public/css/all.css" rel="stylesheet">
    <link href="<?= $assetsUrl ?>public/css/owl.carousel.min.css" rel="stylesheet">
    <link href="<?= $assetsUrl ?>public/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= $assetsUrl ?>public/css/stylesheet.css?v=1.049" rel="stylesheet">
    <link rel="shortcut icon" href="<?= getUploadedImageBySize($options['siteFavicon'], '150x150') ?>">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async
            src="https://www.googletagmanager.com/gtag/js?id=<?= maybe_null_or_empty($options, 'googleAnalyticsID', false, 'UA-153632512-1') ?>"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', "<?= maybe_null_or_empty($options, 'googleAnalyticsID', false, 'UA-153632512-1') ?>");
    </script>

</head>
<body style="">
<!--Wrapper Start-->
<!--<div class="wrapper">-->
<header class="wf100 header">
    <div class="topbar">
        <div class="container">
            <div class="row">
					<div class="col-md-6 col-sm-6">
					<?php
					if(isset($header_evaluations) && !empty($header_evaluations)){
						?>
						<div class="newsticker" id="my_newsticker">
							<div class="bn-title"><strong>Dernières évaluations:</strong><span></span></div>
							<ul>
								<?php
								foreach ($header_evaluations as $evaluation) {
									?>
									<li><a class="text-uppercase" title="<?= $evaluation->title ?>" href="<?= site_url("evaluations/$evaluation->id") ?>"><?= $evaluation->title ?></a>
									</li>
									<?php
								}
								?>
							</ul>
							<div class="bn-navi"><span></span> <span></span></div>
						</div>
						<?php
					}
					?>

                    <?php

                    ?>

                </div>
                <div class="col-md-6 col-sm-6">
                    <ul class="right-links">
                        <?php
                        if ($phone = maybe_null_or_empty($options, 'site_phone')) {
                            ?>
                            <li><a href="tel://<?= $phone ?>"><i class="fas fa-phone"></i>
                                    <strong><?= $phone ?></strong></a></li>
                            <?php
                        }
                        if ($mail = maybe_null_or_empty($options, 'site_email')) {
                            ?>
                            <li><a href="mailto:<?= $mail ?>"><i class="fas fa-envelope"></i> <?= $mail ?></a></li>
                            <?php
                        }
                        ?>
                        <li><a href="<?= pro_url() ?>"><i class="fas fa-desktop"></i> Connexion</a></li>
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
                            <a class="navbar-brand" href="<?= site_url() ?>"><img
                                        data-src="<?= getUploadedImageBySize($options['siteLogo'], '150x150') ?>"
                                        alt="Logo"></a></div>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <li><a href="<?= site_url() ?>">Accueil</a></li>
                                <li><a href="<?= site_url('evaluations') ?>">Evaluations</a></li>
                                <li><a href="<?= site_url('events') ?>">Evènements</a></li>
                                <li><a href="<?= site_url('blog') ?>">Actualités</a></li>
                                <?php
                                if (!empty($header_post_cats)) {
                                    ?>
                                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"
                                                            role="button" aria-haspopup="true" aria-expanded="false">Rubriques
                                            <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <?php
                                            foreach ($header_post_cats as $cat) {
                                                ?>
                                                <li>
                                                    <a href="<?= site_url("blog/category/$cat->slug") ?>"><?= $cat->name ?></a>
                                                </li> <?php
                                            }
                                            ?>
                                        </ul>
                                    </li>
                                    <?php
                                }
                                ?>
                                <li class="dropdown"><a href="##" class="dropdown-toggle" data-toggle="dropdown"
                                                        role="button" aria-haspopup="true" aria-expanded="false">Médiathèque
                                        <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="<?= ($flickrURl = (maybe_null_or_empty($options, 'site_flickr_url'))) ? $flickrURl : '#' ?>">Photos</a>
                                        </li>
                                        <li>
                                            <a href="<?= ($youtubeURL = (maybe_null_or_empty($options, 'site_youtube_url'))) ? $youtubeURL : '#' ?>">Vidéos</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="<?= site_url('contact') ?>">Contact</a></li>
                                <li class="search-btn"><a class="search-icon" href="#search"> <i
                                                class="fas fa-search"></i> </a></li>
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
