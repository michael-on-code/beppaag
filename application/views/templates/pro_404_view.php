<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8"/>
    <title><?= $options['siteName'] ?> - <?= $pageTitle ?></title>
    <meta name="description" content="<?= $options['siteDescription'] ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="noindex, nofollow">
    <link rel="shortcut icon" href="<?= getUploadedImageBySize($options['siteFavicon'], '150x150')?>">
    <!-- Core css -->
    <link href="<?= $assetsUrl ?>pro/css/app.min.css" rel="stylesheet">

</head>

<body>
<div class="app">
    <div class="container-fluid">
        <div class="d-flex full-height p-v-20 flex-column justify-content-between">
            <div class="d-none d-md-flex p-h-40">
                <img class="real-logo" src="<?= getUploadedImageBySize($options['siteLogo'], '345x119')?>" alt="Logo">
            </div>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="p-v-30">
                            <h1 class="font-weight-semibold display-1 text-primary lh-1-2">404</h1>
                            <h2 class="font-weight-light font-size-30">Page Introuvable</h2>
                            <p class="lead m-b-30">La Page que vous recherchez est introuvable ou indisponible</p>
                            <a href="<?= site_url() ?>" class="btn btn-primary btn-tone"><i class="anticon anticon-arrow-left"></i> Retour au site</a> ou
                            <a href="<?= pro_url() ?>" class="btn btn-primary btn-tone"><i class="anticon anticon-home"></i> Retour au Tableau de Bord</a>
                        </div>
                    </div>
                    <div class="col-md-6 m-l-auto">
                        <img class="img-fluid" src="<?= $assetsUrl ?>pro/images/others/error-2.png" alt="">
                    </div>
                </div>
            </div>
            <div class="d-none d-md-flex  p-h-40 justify-content-between">
                <span class="">Copyright © 2019 <?= $options['siteName'] ?>. Propulsé par <a target="_blank" href="http://akasigroup.com">AKASI Consulting Group</a></span>
            </div>
        </div>
    </div>
</div>
<!-- Core Vendors JS -->
<script src="<?= $assetsUrl ?>pro/js/vendors.min.js"></script>

<!-- page js -->

<!-- Core JS -->
<script src="<?= $assetsUrl ?>pro/js/app.min.js"></script>

</body>

</html>