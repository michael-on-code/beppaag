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
        <img src="<?= $assetsUrl ?>public/images/banner.jpg" class="cover transition" />
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
                <div class="col-md-3 col-sm-3">
                    <div class="deprt-icon-box">
                        <a href="<?= site_url('evaluations') ?>">
                            <img src="<?= $assetsUrl ?>public/images/evaluation-symbol.png" alt="">
                        </a>

                        <h6> <a href="<?= site_url('evaluations') ?>">Evaluations</a> </h6>
                        <a class="rm" href="<?= site_url('evaluations') ?>">Découvrir</a>
                    </div>
                </div>
                <!--Local Box End-->
                <!--Local Box Start-->
                <div class="col-md-3 col-sm-3">
                    <div class="deprt-icon-box">
                        <a href="<?= site_url('events') ?>">
                            <img src="<?= $assetsUrl ?>public/images/calendar-symbol.png" alt="">
                        </a>

                        <h6> <a href="<?= site_url('events') ?>">Evènements</a> </h6>
                        <a class="rm" href="<?= site_url('events') ?>">Découvrir</a>
                    </div>
                </div>
                <!--Local Box End-->
                <!--Local Box Start-->
                <div class="col-md-3 col-sm-3">
                    <div class="deprt-icon-box">
                        <a href="<?= site_url('blog') ?>">
                            <img src="<?= $assetsUrl ?>public/images/brochure-symbol.png" alt="">
                        </a>
                        <h6> <a href="<?= site_url('blog') ?>">Actualités</a> </h6>
                        <a class="rm" href="<?= site_url('blog') ?>">Découvrir</a>
                    </div>
                </div>
                <!--Local Box End-->
                <!--Local Box Start-->
                <div class="col-md-3 col-sm-3">
                    <div class="deprt-icon-box">
                        <a href="<?= site_url('/') ?>">
                            <img src="<?= $assetsUrl ?>public/images/analysis-symbol.png" alt="">
                        </a>
                        <h6> <a href="<?= site_url('/') ?>">Statistiques</a>
                        </h6>
                        <a class="rm" href="<?= site_url('/') ?>">Découvrir</a>
                    </div>
                </div>
                <!--Local Box End-->
            </div>
        </div>
    </section>
    <!--Local Boards & Services End-->
    <!--Event Festivals & News Articles Start-->
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
                <div class="col-md-3 col-sm-6">
                    <div class="news-box">
                        <div class="new-thumb"> <span class="cat c1">Publication</span> <img src="<?= $assetsUrl ?>public/images/poverty.jpg" alt=""> </div>
                        <div class="new-txt">
                            <div class="row">
                                <div class="col-xs-10">
                                    <ul class="news-meta">
                                        <li>28 Octobre 2019</li>
                                    </ul>
                                </div>
                                <div class="col-xs-2">
                                    <div class="btn-group share-post">
                                        <button type="button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-share-alt"></i></button>
                                        <ul class="dropdown-menu">
                                            <li><a href="#" class="fb"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="#" class="whats"><i class="fab fa-whatsapp"></i></a></li>
                                            <li><a href="#" class="tw"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="#" class="linken"><i class="fab fa-linkedin-in"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <h6><a href="<?= site_url('events/seminaire-sur-la-bonne-gestion-des-processus-evaluation') ?>" data-toggle="tooltip" title="Stratégies de croissances pour la réduction de la pauvreté" class="cutter" data-line="2">Stratégies de croissances pour la réduction de la pauvreté</a></h6>
                            <p class="cutter" data-line="4"> La troisième génération de la Stratégie de Croissance pour la Réduction de la Pauvreté (SCRP) a pour objectif d’améliorer les conditions de vie des populations, notamment des pauvres puisqu’elle se veut pro-pauvre. </p>
                        </div>
                        <div class="news-box-f"> <img src="<?= $assetsUrl ?>public/images/michael1.jpg" alt=""> A. Michael <a href="<?= site_url('events/seminaire-sur-la-bonne-gestion-des-processus-evaluation') ?>"><i class="fas fa-arrow-right"></i></a> </div>
                    </div>
                </div>
                <!--News Box End-->
                <!--News Box Start-->
                <div class="col-md-3  col-sm-6">
                    <div class="news-box">
                        <div class="new-thumb"> <span class="cat c2">Gestion de connaissances</span> <img src="<?= $assetsUrl ?>public/images/h3citynews-2.jpg" alt=""> </div>
                        <div class="new-txt">
                            <div class="row">
                                <div class="col-xs-10">
                                    <ul class="news-meta">
                                        <li>28 Octobre 2019</li>
                                    </ul>
                                </div>
                                <div class="col-xs-2">
                                    <div class="btn-group share-post">
                                        <button type="button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-share-alt"></i></button>
                                        <ul class="dropdown-menu">
                                            <li><a href="#" class="fb"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="#" class="whats"><i class="fab fa-whatsapp"></i></a></li>
                                            <li><a href="#" class="tw"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="#" class="linken"><i class="fab fa-linkedin-in"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <h6><a href="<?= site_url('events/seminaire-sur-la-bonne-gestion-des-processus-evaluation') ?>" data-toggle="tooltip" title="Politique Nationale de Développement de l’Artisanat (PNDA)" class="cutter" data-line="2">Politique Nationale de Développement de l’Artisanat (PNDA)</a></h6>
                            <p class="cutter" data-line="4"> La PNDA a pour vision de faire de l’artisanat béninois « un secteur bien organisé à l’horizon 2025 où opèrent des entreprises artisanales compétitives, contribuant notablement à la valorisation du patrimoine national et au bien-être social de l’artisan et du béninois, dans un pays uni et de paix ».</p>
                        </div>
                        <div class="news-box-f"> <img src="<?= $assetsUrl ?>public/images/michael1.jpg" alt=""> A. Michael <a href="<?= site_url('events/seminaire-sur-la-bonne-gestion-des-processus-evaluation') ?>"><i class="fas fa-arrow-right"></i></a> </div>
                    </div>
                </div>
                <!--News Box End-->
                <!--News Box Start-->
                <div class="col-md-3  col-sm-6">
                    <div class="news-box">
                        <div class="new-thumb"> <span class="cat c3">Ressources techniques</span> <img src="<?= $assetsUrl ?>public/images/tourism.jpg" alt=""> </div>
                        <div class="new-txt">
                            <div class="row">
                                <div class="col-xs-10">
                                    <ul class="news-meta">
                                        <li>28 Octobre 2019</li>
                                    </ul>
                                </div>
                                <div class="col-xs-2">
                                    <div class="btn-group share-post">
                                        <button type="button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-share-alt"></i></button>
                                        <ul class="dropdown-menu">
                                            <li><a href="#" class="fb"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="#" class="whats"><i class="fab fa-whatsapp"></i></a></li>
                                            <li><a href="#" class="tw"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="#" class="linken"><i class="fab fa-linkedin-in"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <h6><a href="<?= site_url('events/seminaire-sur-la-bonne-gestion-des-processus-evaluation') ?>" data-toggle="tooltip" title="Politique Nationale du Tourisme" class="cutter" data-line="2">Politique Nationale du Tourisme</a></h6>
                            <p class="cutter" data-line="3">La PNT a pour vision de « Faire du Bénin une destination de référence en Afrique de l’Ouest dans le respect de la préservation du patrimoine culturel et naturel ». Elle a pour objectif général de doubler d’ici 2025 la contribution du Tourisme au Produit Intérieur Brut.</p>
                        </div>
                        <div class="news-box-f"> <img src="<?= $assetsUrl ?>public/images/michael1.jpg" alt=""> A. Michael <a href="<?= site_url('events/seminaire-sur-la-bonne-gestion-des-processus-evaluation') ?>"><i class="fas fa-arrow-right"></i></a> </div>
                    </div>
                </div>
                <!--News Box End-->
                <!--News Box Start-->
                <div class="col-md-3  col-sm-6">
                    <div class="news-box">
                        <div class="new-thumb"> <span class="cat c4">Partenariat</span> <img src="<?= $assetsUrl ?>public/images/food.jpg" alt=""> </div>
                        <div class="new-txt">
                            <div class="row">
                                <div class="col-xs-10">
                                    <ul class="news-meta">
                                        <li>28 Octobre 2019</li>
                                    </ul>
                                </div>
                                <div class="col-xs-2">
                                    <div class="btn-group share-post">
                                        <button type="button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-share-alt"></i></button>
                                        <ul class="dropdown-menu">
                                            <li><a href="#" class="fb"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="#" class="whats"><i class="fab fa-whatsapp"></i></a></li>
                                            <li><a href="#" class="tw"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="#" class="linken"><i class="fab fa-linkedin-in"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <h6><a href="<?= site_url('events/seminaire-sur-la-bonne-gestion-des-processus-evaluation') ?>" data-toggle="tooltip" title="Insécurité alimentaire : un regard sur les réponses apportées par les diverses parties prenantes" class="cutter" data-line="2">Insécurité alimentaire : un regard sur les réponses apportées par les diverses parties prenantes</a></h6>
                            <p class="cutter" data-line="3">La démarche méthodologique repose sur la recherche documentaire, un Guide d’entretien, un Guide de focus group, un questionnaire individuel.
                                Echantillonnage à deux degrés retenu.</p>
                        </div>
                        <div class="news-box-f"> <img src="<?= $assetsUrl ?>public/images/michael1.jpg" alt=""> A. Michael <a href="<?= site_url('events/seminaire-sur-la-bonne-gestion-des-processus-evaluation') ?>"><i class="fas fa-arrow-right"></i></a> </div>
                    </div>
                </div>
                <!--News Box End-->
            </div>
        </div>
    </section>
    <section class="wf100 p80 news-event">
        <div class="container">
            <div class="row">
                <div class="title-style-2 wf100">
                    <div class="col-md-4 col-sm-6">
                        <h2>Derniers évènements</h2>
                    </div>
                    <div class="col-md-6 col-sm-6 outerTitleDescription">
                        <p class="innerTitleDescription">Retrouvez les derniers évènements organisés par la BEPPAAG au suget de la gestion des processus evaluatifs</p>
                    </div>
                    <div class="col-md-2 "><a class="mg-t-17" href="<?= site_url('events') ?>">Voir tout</a></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <!--News Post Start-->
                    <div class="event-post">
                        <div class="thumb"><a href="<?= site_url('events/seminaire-sur-la-bonne-gestion-des-processus-evaluation') ?>"><i class="fas fa-link"></i></a> <img src="<?= $assetsUrl ?>public/images/event3.jpg"
                                                                                            alt=""></div>
                        <div class="event-post-txt">
                            <h5><a class="cutter" data-line="2" href="<?= site_url('events/seminaire-sur-la-bonne-gestion-des-processus-evaluation') ?>" data-toggle="tooltip" title="Séminaire sur la bonne gestion des processus d'évaluation">Séminaire sur la bonne gestion des processus d'évaluation </a></h5>
                            <ul class="event-meta">
                                <li><i class="far fa-calendar-alt"></i> 3-6 Novembre, 2019</li>
                                <li><i class="far fa-clock"></i> 09H - 13H</li>
                            </ul>
                            <p class="cutter" data-line="2">Séminaire portant sur la bonne gestion des processus évaluatifs concernant les acteurs de l'UNICEF et de la présidence</p>
                        </div>
                        <div class="event-post-loc"><i class="fas fa-map-marker-alt"></i> Espace DINA, St Michel <a
                                href="<?= site_url('events/seminaire-sur-la-bonne-gestion-des-processus-evaluation') ?>"><i class="fas fa-arrow-right"></i></a></div>
                    </div>
                    <!--News Post End-->
                </div>
                <div class="col-md-4 col-sm-4">
                    <!--News Post Start-->
                    <div class="event-post">
                        <div class="thumb"><a href="<?= site_url('events/seminaire-sur-la-bonne-gestion-des-processus-evaluation') ?>"><i class="fas fa-link"></i></a> <img src="<?= $assetsUrl ?>public/images/event1.jpg"
                                                                                            alt=""></div>
                        <div class="event-post-txt">
                            <h5><a class="cutter" data-line="2" href="<?= site_url('events/seminaire-sur-la-bonne-gestion-des-processus-evaluation') ?>" data-toggle="tooltip" title="Séminaire sur la bonne gestion des processus d'évaluation">Séminaire sur la bonne gestion des processus d'évaluation </a></h5>
                            <ul class="event-meta">
                                <li><i class="far fa-calendar-alt"></i> 15-17 Décembre, 2019</li>
                                <li><i class="far fa-clock"></i> 09H - 13H</li>
                            </ul>
                            <p class="cutter" data-line="2">Séminaire portant sur la bonne gestion des processus évaluatifs concernant les acteurs de l'UNICEF et de la présidence</p>
                        </div>
                        <div class="event-post-loc"><i class="fas fa-map-marker-alt"></i> Espace DINA, St Michel <a
                                href="<?= site_url('events/seminaire-sur-la-bonne-gestion-des-processus-evaluation') ?>"><i class="fas fa-arrow-right"></i></a></div>
                    </div>
                    <!--News Post End-->
                </div>
                <div class="col-md-4 col-sm-4">
                    <!--News Post Start-->
                    <div class="event-post">
                        <div class="thumb"><a href="<?= site_url('events/seminaire-sur-la-bonne-gestion-des-processus-evaluation') ?>"><i class="fas fa-link"></i></a> <img src="<?= $assetsUrl ?>public/images/event2.jpg"
                                                                                            alt=""></div>
                        <div class="event-post-txt">
                            <h5><a class="cutter" data-line="2" href="<?= site_url('events/seminaire-sur-la-bonne-gestion-des-processus-evaluation') ?>" data-toggle="tooltip" title="Séminaire sur la bonne gestion des processus d'évaluation">Séminaire sur la bonne gestion des processus d'évaluation </a></h5>
                            <ul class="event-meta">
                                <li><i class="far fa-calendar-alt"></i> 10-20 Janvier, 2020</li>
                                <li><i class="far fa-clock"></i> 09H - 13H</li>
                            </ul>
                            <p class="cutter" data-line="2">Séminaire portant sur la bonne gestion des processus évaluatifs concernant les acteurs de l'UNICEF et de la présidence</p>
                        </div>
                        <div class="event-post-loc"><i class="fas fa-map-marker-alt"></i> Espace DINA, St Michel <a
                                href="<?= site_url('events/seminaire-sur-la-bonne-gestion-des-processus-evaluation') ?>"><i class="fas fa-arrow-right"></i></a></div>
                    </div>
                    <!--News Post End-->
                </div>
            </div>
        </div>
    </section>
    <!--Event Festivals & News Articles End-->

    <style>
        .fact-newsletter {
            background: url(<?= $assetsUrl ?>public/images/etoile-rouge1.jpg) no-repeat;
            background-size: cover;
        }
    </style>
    <section class="wf100 p80 fact-newsletter">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="title-style-1 white">
                        <h2>Nos stats &  chiffres</h2>
                        <!--<p>Découvrez nos </p>-->
                    </div>
                    <div class="row">
                        <ul class="counter">
                            <li class="col-md-4 col-sm-4">
                                <div class="fact-box"><i><img src="<?= $assetsUrl ?>public/images/test.png" alt=""></i> <strong>1920</strong> <span>Evaluations publiées</span>
                                </div>
                            </li>
                            <li class="col-md-4 col-sm-4">
                                <div class="fact-box"><i><img src="<?= $assetsUrl ?>public/images/progress.png" alt=""></i> <strong>870</strong>
                                    <span>Recommandations en cours</span></div>
                            </li>
                            <li class="col-md-4 col-sm-4">
                                <div class="fact-box"><i><img src="<?= $assetsUrl ?>public/images/checked.png" alt=""></i> <strong>900</strong> <span>Recommandations exécutées</span>
                                </div>
                            </li>
                            <li class="col-md-4 col-sm-4">
                                <div class="fact-box"><i><img src="<?= $assetsUrl ?>public/images/warning.png" alt=""></i> <strong>150</strong>
                                    <span>Recommandations non exécutées</span></div>
                            </li>
                            <li class="col-md-4 col-sm-4">
                                <div class="fact-box"><i><img src="<?= $assetsUrl ?>public/images/calendar.png" alt=""></i> <strong>28</strong> <span>Evènements organisés</span>
                                </div>
                            </li>
                            <li class="col-md-4 col-sm-4">
                                <div class="fact-box"><i><img src="<?= $assetsUrl ?>public/images/brochure.png" alt=""></i> <strong>15</strong> <span>Articles publiés</span>
                                </div>
                            </li>

                        </ul>
                    </div>
                    <div class="row ">
                        <div class="col-md-12 title-style-2 text-center">
                            <a class="mg-t-17 my-a " href="#">Voir toutes les stats</a>
                        </div>
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
