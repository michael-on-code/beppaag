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
						<?= form_open(site_url('evaluations'), [
							'method'=>'get'
						]) ?>
                            <div class="inner-form">
                                <div class="input-field col-md-2 col-sm-3 col-xs-6">
                                    <label for="" style="">Année d'évaluation</label>
                                    <?=
                                    form_dropdown($name='search[year]', $years, set_value($name), [
                                        'class' => 'form-control'
                                    ]);
                                    ?>
                                </div>
                                <div class="input-field col-md-2 col-sm-3 col-xs-6">
                                    <label for="" style="">Secteur</label>
                                    <?=
                                    form_dropdown($name='search[sector_id]', $sectors, set_value($name), [
                                        'class' => 'form-control'
                                    ]);
                                    ?>
                                </div>

                                <div class="input-field col-md-2 col-sm-3 col-xs-6">
                                    <label for="" style="">Thématique</label>
                                    <?=
                                    form_dropdown($name='search[thematic_id]', $thematics, set_value($name), [
                                        'class' => 'form-control'
                                    ]);
                                    ?>
                                </div>
                                <div class="input-field col-md-2 col-sm-3 col-xs-6">
                                    <label for="" style="">Temporalité</label>
                                    <?=
                                    form_dropdown($name='search[temporality_id]', $temporalities, set_value($name), [
                                        'class' => 'form-control'
                                    ]);
                                    ?>
                                </div>
                                <div class="input-field col-md-2 col-sm-3 col-xs-6">
                                    <label for="" style="">Autorité contractante</label>
                                    <?=
                                    form_dropdown($name='search[contracting_authority_id]', $contractingAuthorities, set_value($name), [
                                        'class' => 'form-control'
                                    ]);
                                    ?>
                                </div>
                                <div class="input-field col-md-2 col-sm-8 col-xs-6">
                                    <label for="" style="">Mot clé</label>
                                    <?=
                                    form_input([
                                        'name' => $name='search[keyword]',
                                        'placeholder' => 'Saisir mot clé',
										'value'=>set_value($name)
                                    ]);
                                    ?>
                                </div>
                                <div class="input-field  search-btn-container">
                                    <button class="btn-search" type="submit"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
						<?= form_close() ?>
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
													   <?php
													   if($evaluation->annexe_file_1 && $evaluation->annexe_file_1){
														   ?>
														   <li><a download
																  href="<?= $uploadPath . $evaluation->annexe_file_1 ?>">Annexe 1</a></li>
														   <?php
													   }
													   if($evaluation->annexe_file_2 && $evaluation->annexe_file_2){
														   ?>
														   <li><a download
																  href="<?= $uploadPath . $evaluation->annexe_file_2 ?>">Annexe 2</a></li>
														   <?php
													   }

													   ?>
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

														if($previousOffset < 1){
															$linkUrl = getAddPaginationToUrl();
														}else{
															$linkUrl = getAddPaginationToUrl('', $previousOffset);
														}
														?>
														<a class="btn-search" style="padding: 1px 3px 1px 7px"
														   href="<?= $linkUrl ?>">
															<i class="fa fa-angle-left"></i>
														</a>
														<?php
													}
													?>
                                                    <b class="text-bold"><?= $countStart ?> - <?= $countEnd ?>
                                                        / <?= $totalCount ?></b>
                                                    <?php
                                                    if ($totalCount > $countEnd) {
                                                    	if($currentOffset == 0){
                                                    		$linkUrl = getAddPaginationToUrl();
														}else{
                                                    		$linkUrl = getAddPaginationToUrl('', $currentOffset);
														}
                                                        ?>
                                                        <a class="btn-search"
                                                           href="<?= $linkUrl ?>">
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
