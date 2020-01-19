<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 31/10/2019
 * Time: 14:41
 */
getBreadcrump([
    'title' => $pageTitle,
], $options, 'evaluation')
?>
<!--Sub Header End-->
<!--Main Content Start-->
<div class="main-content">
    <!--Events Start-->
    <div class="events-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="s002">
                        <form>
                            <div class="inner-form">
                                <div class="input-field col-md-2 col-sm-3 col-xs-6">
                                    <label for="" style="">Année</label>
                                    <?=
                                    form_dropdown('year', $years, '', [
                                        'class' => 'form-control'
                                    ]);
                                    ?>
                                </div>
                                <div class="input-field col-md-2 col-sm-3 col-xs-6">
                                    <label for="" style="">Secteur</label>
                                    <?=
                                    form_dropdown('sector', $sectors, '', [
                                        'class' => 'form-control'
                                    ]);
                                    ?>
                                </div>

                                <div class="input-field col-md-2 col-sm-3 col-xs-6">
                                    <label for="" style="">Thématique</label>
                                    <?=
                                    form_dropdown('thematic', $thematics, '', [
                                        'class' => 'form-control'
                                    ]);
                                    ?>
                                </div>
                                <div class="input-field col-md-2 col-sm-3 col-xs-6">
                                    <label for="" style="">Temporalité</label>
                                    <?=
                                    form_dropdown('temporality', $temporalities, '', [
                                        'class' => 'form-control'
                                    ]);
                                    ?>
                                </div>
                                <div class="input-field col-md-2 col-sm-3 col-xs-6">
                                    <label for="" style="">Autorité contractante</label>
                                    <?=
                                    form_dropdown('contractingAuthority', $contractingAuthorities, '', [
                                        'class' => 'form-control'
                                    ]);
                                    ?>
                                </div>
                                <div class="input-field col-md-2 col-sm-8 col-xs-6">
                                    <label for="" style="">Mot clé</label>
                                    <?=
                                    form_input([
                                        'name' => 'keyword',
                                        'placeholder' => 'Saisir mot clé'
                                    ]);
                                    ?>
                                </div>
                                <div class="input-field  search-btn-container">
                                    <button class="btn-search" type="button"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">


                <div class="col-md-9 col-sm-8">
                    <div class="city-updates">
                        <?php if (isset($evaluations) && !empty($evaluations)) {
                            foreach ($evaluations as $evaluation) {
                                ?>
                                <ul class="eval-ul">
                                    <li>
                                        <div class="row">
                                            <div class=" eval-list-container">
                                                <div>
                                                    <label class="checkbox-container">
                                                        <input type="checkbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>

                                                <div class="eval-list-content">
                                                    <h5>
                                                        <a href="<?= $permalink = site_url("evaluations/$evaluation->id") ?>"><?= $evaluation->title ?></a>
                                                    </h5>
                                                    <!--<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et </p>-->
                                                    <div class="eval-list-btns-container">
                                                        <span data-toggle="tooltip" title="Année d'évaluation"
                                                              class="post-date"><i class="far fa-calendar-alt"></i> <a
                                                                    href="<?= site_url("evaluations/year/$evaluation->year") ?>"><?= $evaluation->year ?></a></span>
                                                        <span data-toggle="tooltip" title="Date d'ajout"
                                                              class="post-date"><i
                                                                    class="far fa-calendar-plus"></i> <?= getFullDateInFrench($evaluation->created_at, getRegularDateTimeFormat(), false, false, false, true) ?></span>
                                                        <?php
                                                        $recommendationStatData = getEvaluationRecommendationLabel($evaluation->executed_count, $evaluation->total_recommendation_activities_count, $evaluation->unknown_count);
                                                        getEvaluationRecommendationIndicator($recommendationStatData['label'], $recommendationStatData['percentage'], $assetsUrl, 'm-l-10 boldify', true);
                                                        ?>
                                                        <span class="eval-list-btns">
                                                   <a style="" class="see-more" href="<?= $permalink ?>"> <i
                                                               class="fa fa-eye"></i> | Lire</a>
                                                            <!--<a class="see-more" href="#"> <i class="fa fa-download"></i> | Télécharger</a>-->
                                                <div class="btn-group share-post no-float">
                                                   <a class="see-more" href="#" class="dropdown-toggle"
                                                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i
                                                               class="fa fa-download" style="margin-right: 5px"></i> | Télécharger</a>
                                                   <ul class="dropdown-menu downloading">
                                                      <li><a download
                                                             href="<?= $uploadPath . $evaluation->evaluation_file ?>">Rapport de l'évaluation</a></li>
                                                      <li><a href="#">Résumé des recommandations</a></li>
                                                      <li class="all"><a href="#">Télécharger tout</a></li>
                                                   </ul>
                                                </div>
                                                            <div class="btn-group share-post no-float">
                                                   <a class="see-more" href="#" class="dropdown-toggle"
                                                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i
                                                               class="fa fa-share-alt" style="margin-right: 5px"></i> | Partager</a>
                                                   <ul class="dropdown-menu">
                                                      <li><a <?= getSharerAttributes($permalink, $evaluation->title) ?> class="fb"><i
                                                                      class="fab fa-facebook-f"></i></a></li>
                                                      <li><a <?= getSharerAttributes($permalink, $evaluation->title, 'whatsapp') ?> class="whats"><i class="fab fa-whatsapp"></i></a></li>
                                                      <li><a <?= getSharerAttributes($permalink, $evaluation->title, 'twitter') ?> class="tw"><i class="fab fa-twitter"></i></a></li>
                                                      <li><a <?= getSharerAttributes($permalink, $evaluation->title, 'linkedin') ?> class="linken"><i class="fab fa-linkedin-in"></i></a></li>
                                                   </ul>
                                                </div>

                                                </span>


                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </li>
                                </ul>
                                <?php
                            }
                            ?>
                            <ul class="eval-ul eval-last">
                                <li>
                                    <div class="row">
                                        <div class="eval-list-container">
                                            <div>
                                                <label class="checkbox-container">
                                                    <input type="checkbox">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>

                                            <div class="eval-list-content">
                                                <a class="see-more"><i class="fa fa-download"></i> | Tout Télécharger</a>
                                                <div class="pull-right pagination-content">
													<?php
													if ($previousOffset>=0) {
														?>
														<a class="btn-search" style="padding: 1px 3px 1px 7px"
														   href="<?= $previousOffset < 1 ? current_url() : current_url()."?page=$previousOffset" ?>">
															<i class="fa fa-angle-left"></i>
														</a>
														<?php
													}
													?>
                                                    <b class="text-bold"><?= $countStart ?> - <?= $countEnd ?>
                                                        / <?= $totalCount ?></b>
                                                    <?php
                                                    if ($totalCount > $countEnd) {
                                                        ?>
                                                        <a class="btn-search"
                                                           href="<?= $currentOffset == 0 ? site_url('evaluations') : current_url()."?page=$currentOffset" ?>">
                                                            <i class="fa fa-angle-right"></i>
                                                        </a>
                                                        <?php
                                                    }
                                                    ?>

                                                </div>
                                                <!--<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et </p>-->
                                            </div>

                                        </div>

                                    </div>
                                </li>
                            </ul>
                            <?php

                        }else{
                            ?>
                            <h4 class="sorry-no-content">Désolé, aucun contenu trouvé</h4>
                            <?php
                        }

                        ?>

                    </div>
                </div>
                <?php $this->load->view('public/evaluations/sidebar'); ?>
            </div>
        </div>
    </div>
    <!--Events End-->
</div>
