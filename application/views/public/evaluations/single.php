<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 30/11/2019
 * Time: 06:10
 */
getBreadcrump([
    'title' => $pageTitle,
], $options, 'evaluation')
?>
<style type="text/css">
    .panel-default > .panel-heading {
        padding: 12px 0px 12px 10px;
    }

    .panel {
        margin-bottom: 30px !important;
    }

    .panel-title a {
        text-transform: uppercase;
    }

    h4.panel-title {
        font-weight: 700;
        font-size: 18px;
        padding-left: 10px;
    }

    .evaluation-sidebar-content {
        padding: 20px 36px 0px 30px;
    }

    .evaluation-sidebar-content h6 {
        font-weight: 600;
        padding: 0px 2px 16px 0px;
        color: white;
        font-size: 14px;
        line-height: 1.1;
        border-bottom: 1px solid #eeeeee38;
        text-transform: uppercase;
        position: relative;
    }

    .evaluation-sidebar-content h6 img {
        position: absolute;
        top: -15px;
        right: 5px;
        left: unset;
    }

    .panel-body {
        padding-left: 20px;
    }

    .panel-body .myRow {
        /*padding: 0px 20px;*/
        margin-bottom: 14px;
    }

    .panel-body .myRow label {
        text-transform: uppercase;
    }

    .panel-body .myRow, .panel-body .myRow p {
        color: #000;
        font-size: 16px
    }

    .each-question label {
        margin-top: 10px;
        margin-bottom: 15px;
        font-size: 16px;
        font-weight: 600;
        color: #000;
        padding: 0px 0px 20px 0px;
        border-bottom: 1px solid #d0d0d0;
    }
    .panel.questions-heading{
        margin-bottom: unset!important;
    }

    @media (min-width: 998px) {
        .evaluation-sidebar-content h6.recommendations img {
            top: -6px;
        }
    }

    @media (min-width: 998px) {
        .evaluation-sidebar-content h6 img {
            right: unset;
            left: 88%;
        }
    }

    @media (max-width: 500px) {
        .evaluation-sidebar-content h6 img {
            right: unset;
            left: 95%;
        }
    }

    @media (min-width: 500px) and (max-width: 998px) {
        .evaluation-sidebar-content h6 img {
            right: unset;
            left: 40%;
        }
    }

    @media (min-width: 998px) and (max-width: 1200px) {
        .evaluation-sidebar-content h6 {
            font-size: 12px !important;
            line-height: 1.3 !important;
        }
    }

    .evaluation-sidebar-content {
        cursor: pointer;
    }

    .evaluation-sidebar-content:hover, .evaluation-sidebar-content.active {
        background-color: #4084c3;
    }

    .evaluation-sidebar-content h6:hover, .evaluation-sidebar-content.active h6, {
        color: #ffffff !important;
    }

    .evaluation-sidebar .widget {
        background-color: <?= $options['site_secondary_color'] ?>;
        box-shadow: unset;
    }

    .evaluation-sidebar .symbol-icon {
        width: 40px;
    }

    .evaluation-sidebar .widget {
        float: unset !important;
    }

    .pos-relative {
        position: relative;
    }

    .evaluation-sidebar-container.fixed {
        position: fixed !important;
        top: 10px !important;
        bottom: auto !important;
    }


</style>
<div class="main-content p80 evaluation-single">
    <!--News Details Page Start-->
    <div class="news-details">
        <div class="container-fluid">
            <div class="row evaluation-section">
                <!--Content Col Start-->
                <div class="col-md-3 pos-relative">
                    <div class="evaluation-sidebar-container evaluation-sidebar sidebar">
                        <div class="widget">
                            <div class="evaluation-sidebar-content" data-scroll-nav="1">
                                <h6>Informations générales</h6>
                            </div>
                            <div class="evaluation-sidebar-content" data-scroll-nav="2">
                                <h6>Objectifs et Résultats attendus</h6>
                            </div>
                            <div class="evaluation-sidebar-content" data-scroll-nav="3">
                                <h6>Description sommaire</h6>
                            </div>
                            <div class="evaluation-sidebar-content" data-scroll-nav="4">
                                <h6>Approche méthodologique</h6>
                            </div>
                            <div class="evaluation-sidebar-content" data-scroll-nav="5">
                                <h6>Questions évaluatives</h6>
                            </div>
                            <div class="evaluation-sidebar-content" data-scroll-nav="6">
                                <h6>Recommandations</h6>
                            </div>
                            <div class="evaluation-sidebar-content">
                                <h6>Rapport complet <img class="symbol-icon"
                                                         data-src="<?= $assetsUrl ?>public/images/pdf.png" alt=""></h6>
                            </div>
                            <div class="evaluation-sidebar-content">
                                <h6 class="recommendations">Résumé de recommandation <img class="symbol-icon"
                                                                                          data-src="<?= $assetsUrl ?>public/images/pdf.png"
                                                                                          alt=""></h6>
                            </div>
                            <div class="evaluation-sidebar-content">
                                <h6>Télécharger tout <img class="symbol-icon"
                                                          data-src="<?= $assetsUrl ?>public/images/zip.png" alt=""></h6>
                            </div>


                        </div>

                    </div>
                </div>
                <div class="col-md-9 evaluation-start">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="news-box">
                                <div class="text-center">
                                    <img style="width: auto;"
                                         data-src="<?= getUploadedImageBySize($evaluation['cover_photo'], '360x420') ?>"
                                         alt="<?= $evaluation['title'] ?>">
                                </div>
                            </div>
                            <div class="bs-example">
                                <div class="panel-group" id="accordion">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Informations
                                                    générales</a>
                                            </h4>
                                        </div>
                                        <div data-scroll-index="1" id="collapseOne" class="panel-collapse collapse in">
                                            <div class="panel-body">

                                                <div class="row myRow">
                                                    <div class="col-sm-6">
                                                        <label for="">Titre :</label>
                                                        <p><?= $evaluation['title'] ?></p>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label for="">Année :</label>
                                                        <p><?= $evaluation['year'] ?></p>
                                                    </div>
                                                </div>
                                                <div class="row myRow">
                                                    <div class="col-sm-6">
                                                        <label for="">Authorité contractante :</label>
                                                        <p><?= $evaluation['contracting_authority'] ?>
                                                            : <?= $evaluation['contracting_authority_desc'] ?></p>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label for="">Structure ayant conduit l'évaluation :</label>
                                                        <p><?= $evaluation['leading_authority'] ?>
                                                            : <?= $evaluation['leading_authority_desc'] ?></p>
                                                    </div>
                                                </div>
                                                <div class="row myRow">
                                                    <div class="col-sm-6">
                                                        <label for="">Type d'évaluation :</label>
                                                        <p><?= $evaluation['type'] ?> </p>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label for="">Objet de l'évaluation :</label>
                                                        <p><?= $evaluation['object'] ?></p>
                                                    </div>
                                                </div>
                                                <div class="row myRow">
                                                    <div class="col-sm-6">
                                                        <label for="">Thématiques transversales traitées :</label>
                                                        <p><?= $evaluation['thematic_id'] ?> </p>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label for="">Secteur concerné :</label>
                                                        <p><?= $evaluation['sector_id'] ?></p>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                    <div data-scroll-index="2" class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Objectifs
                                                    et résultats attendus</a>
                                            </h4>
                                        </div>
                                        <div id="collapseTwo" class="panel-collapse collapse in">
                                            <div class="panel-body">
                                                <?= $evaluation['objective'] ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div data-scroll-index="3" class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion"
                                                   href="#collapseThree">Description sommaire</a>
                                            </h4>
                                        </div>
                                        <div id="collapseThree" class="panel-collapse collapse in">
                                            <div class="panel-body">
                                                <?= $evaluation['description'] ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div data-scroll-index="4" class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">Approche
                                                    méthodologique</a>
                                            </h4>
                                        </div>
                                        <div id="collapseFour" class="panel-collapse collapse in">
                                            <div class="panel-body">
                                                <?= $evaluation['methodological_approach'] ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div data-scroll-index="5">
                                        <div class="panel panel-default questions-heading">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive">Questions
                                                        évaluatives</a>
                                                </h4>
                                            </div>
                                        </div>
                                        <?php
                                        if(!empty($evaluation['questions'])){
                                            foreach ($evaluation['questions'] as $question){
                                                ?>
                                                <div class="panel panel-default">
                                                    <div id="collapseFive" class="panel-collapse collapse in questions">
                                                        <div class="panel-body">
                                                            <div class="each-question">
                                                                <label for=""><?= $question['title'] ?></label>
                                                                <?= $question['explanation'] ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                        }
                                        ?>

                                    </div>

                                </div>
                            </div>
                        </div>
                        <?php
                        $this->load->view('public/evaluations/sidebar'); ?>
                    </div>

                </div>

                <!--Content Col End-->
                <!--Sidebar Start-->
                <!--Sidebar End-->
            </div>
        </div>
    </div>
    <!--News Details Page End-->
</div>
