<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 31/10/2019
 * Time: 11:40
 */
?>
<section class="banner banner-small scale-hover">
    <div class="">
        <img data-src="<?= getUploadedImageBySize($options['home_banner'], '1024x649')?>" class="cover transition" />
    </div>
    <div class="infos on-container flex flex-col center text-left anim-title">
        <div>
            <h1 class="title"><span>Évaluation des politiques publiques</span></h1>
        </div>
    </div>
</section>

<!--Slider End-->
<!--Main Content Start-->
<div class="main-content">
    <section class="wf100 p80 h2-local-brands depart-info">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h2>Parcourir & Découvrir</h2>
                        <p>Découvrez les pages essentielles de notre plateforme de Gestion des Processus Evaluatifs au Bénin à partir desquelles vous retrouverez toutes les informations
                            relatives aux évaluations au Bénin
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <!--Local Box Start-->
				<div class="col-md-1"></div>
                <div class="col-md-2 col-sm-2 col-xs-6">
                    <div class="deprt-icon-box">
                        <a href="<?= site_url('evaluations') ?>">
                            <img data-src="<?= $assetsUrl ?>public/images/report-symbol.png" alt="">
                        </a>

                        <h6> <a href="<?= site_url('evaluations') ?>">Evaluations</a> </h6>
                        <a class="rm" href="<?= site_url('evaluations') ?>">Découvrir</a>
                    </div>
                </div>
                <!--Local Box End-->
                <!--Local Box Start-->
                <div class="col-md-2 col-sm-2 col-xs-6">
                    <div class="deprt-icon-box">
                        <a href="<?= site_url('events') ?>">
                            <img data-src="<?= $assetsUrl ?>public/images/calendar-symbol.png" alt="">
                        </a>

                        <h6> <a href="<?= site_url('events') ?>">Evènements</a> </h6>
                        <a class="rm" href="<?= site_url('events') ?>">Découvrir</a>
                    </div>
                </div>
                <!--Local Box End-->
                <!--Local Box Start-->
                <div class="col-md-2 col-sm-2 col-xs-6">
                    <div class="deprt-icon-box">
                        <a href="<?= site_url('blog') ?>">
                            <img data-src="<?= $assetsUrl ?>public/images/brochure-symbol.png" alt="">
                        </a>
                        <h6> <a href="<?= site_url('blog') ?>">Actualités</a> </h6>
                        <a class="rm" href="<?= site_url('blog') ?>">Découvrir</a>
                    </div>
                </div>
                <!--Local Box End-->
                <!--Local Box Start-->
                <div class="col-md-2 col-sm-2 col-xs-6">
                    <div class="deprt-icon-box">
                        <a data-scroll-nav="1" href="<?= site_url('/') ?>">
                            <img data-src="<?= $assetsUrl ?>public/images/agreement.png" alt="">
                        </a>
                        <h6> <a href="<?= site_url('evaluations') ?>">Coopération en évaluation</a>
                        </h6>
                        <a class="rm" href="<?= site_url('evaluations') ?>">Découvrir</a>
                    </div>
                </div>
                <!--Local Box End-->
				<!--Local Box Start-->
                <div class="col-md-2 col-sm-2 col-xs-6">
                    <div class="deprt-icon-box">
                        <a data-scroll-nav="1" href="<?= site_url('/') ?>">
                            <img data-src="<?= $assetsUrl ?>public/images/analysis-symbol.png" alt="">
                        </a>
                        <h6> <a data-scroll-nav="1" href="<?= site_url('/') ?>">Statistiques</a>
                        </h6>
                        <a class="rm" data-scroll-nav="1" href="<?= site_url('/') ?>">Découvrir</a>
                    </div>
                </div>
                <!--Local Box End-->
            </div>
        </div>
    </section>
    <!--Local Boards & Services End-->
    <!--Event Festivals & News Articles Start-->
    <?php
    if(!empty($latestPosts)){
        ?>
        <section class="wf100 city-news p75">
            <div class="container">
                <div class="title-style-3">
                    <div class="row">
                        <div class="col-md-10 col-sm-6">
                            <h3>Nos dernières actualités & publications</h3>
                        </div>
                        <div class="col-md-2 col-sm-6 title-style-2">
                            <a href="<?= site_url('blog') ?>">Voir tout</a>
                        </div>
                    </div>
                    <p>Restez au courant de nos dernières actualiés & publications en rapport avec la gestion des processus évaluatifs</p>
                </div>
                <div class="row">
                    <!--News Box Start-->
                    <?php
                    foreach ($latestPosts as $post){
                        getPostTemplatePreview($post, $options);
                    } ?>


                </div>
            </div>
        </section>
        <?php
    }
    if(!empty($latestEvents)){
        ?>
        <section class="wf100 p80 news-event">
            <div class="container">
                <div class="row">
                    <div class="title-style-2 wf100">
                        <div class="col-md-4 col-sm-6 m-b-20">
                            <h2>Derniers évènements</h2>
                        </div>
                        <div class="col-md-6 col-sm-6 outerTitleDescription">
                            <p class="innerTitleDescription">Retrouvez les derniers évènements organisés par la BEPPAAG au sujet de la gestion des processus evaluatifs</p>
                        </div>
                        <div class="col-md-2 "><a class="mg-t-17" href="<?= site_url('events') ?>">Voir tout</a></div>
                    </div>
                </div>
                <div class="row">
                    <?php
                    foreach ($latestEvents as $event){
                        getEventTemplatePreview($event);
                    }
                    ?>
                </div>
            </div>
        </section>
        <?php
    }
    ?>
    <style>
        .fact-newsletter {
            background: url(<?= $assetsUrl ?>public/images/etoile-rouge1.jpg) no-repeat;
            background-size: cover;
        }
    </style>
    <section class="wf100 p80 fact-newsletter" data-scroll-index="1">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="title-style-1 white">
                        <h2>Nos chiffres</h2>
                    </div>
                    <div class="row">
                        <ul class="counter">
                            <li class="col-md-4 col-sm-4">
                                <div class="fact-box"><i><img data-src="<?= $assetsUrl ?>public/images/report-symbol.png" alt=""></i> <strong><?= $totalEvaluations ?></strong> <span>Evaluations publiées</span>
                                </div>
                            </li>
                            <li class="col-md-4 col-sm-4">
                                <div class="fact-box"><i><img data-src="<?= $assetsUrl ?>public/images/progress.png" alt=""></i> <strong><?= $totalInProgressRecommendation ?></strong>
                                    <span>Recommandations en cours</span></div>
                            </li>
                            <li class="col-md-4 col-sm-4">
                                <div class="fact-box"><i><img data-src="<?= $assetsUrl ?>public/images/checked.png" alt=""></i> <strong><?= $totalExecutedRecommendation ?></strong> <span>Recommandations exécutées</span>
                                </div>
                            </li>
                            <li class="col-md-4 col-sm-4">
                                <div class="fact-box"><i><img data-src="<?= $assetsUrl ?>public/images/warning.png" alt=""></i> <strong><?= $totalNonExecutedRecommendation ?></strong>
                                    <span>Recommandations non exécutées</span></div>
                            </li>
                            <li class="col-md-4 col-sm-4">
                                <div class="fact-box"><i><img data-src="<?= $assetsUrl ?>public/images/calendar.png" alt=""></i> <strong><?= $totalEvents ?></strong> <span>Evènements organisés</span>
                                </div>
                            </li>
                            <li class="col-md-4 col-sm-4">
                                <div class="fact-box"><i><img data-src="<?= $assetsUrl ?>public/images/brochure.png" alt=""></i> <strong><?= $totalPosts ?></strong> <span>Articles publiés</span>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <!--Stay Connected Start-->
                    <div class="stay-connected">
                        <h5>Restez connectés</h5>
                        <p>Restez au courant de nos dernières évaluations, actualités & evènements en souscrivant à notre Newsletter</p>
                        <ul>
                            <li>
                                <input type="text" class="form-control" placeholder="Saisissez votre nom">
                            </li>
                            <li>
                                <input type="text" class="form-control" placeholder="Saisissez votre adresse mail">
                            </li>
                            <li>
                                <input type="submit" value="Soumettre">
                            </li>
                        </ul>
                    </div>
                    <!--Stay Connected End-->
                </div>
            </div>
        </div>
    </section>
</div>
