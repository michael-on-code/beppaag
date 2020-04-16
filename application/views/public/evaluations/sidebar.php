<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 06/11/2019
 * Time: 12:22
 */
if(!isset($sidebarClass)){
    $sidebarClass = 'col-md-3 col-sm-4';
}
?>
<div class="<?= $sidebarClass ?>">
    <div class="sidebar">
        <?php
        if (isset($years) && !empty($years)) {
            ?>
            <div class="widget eval-year-grouping">
                <h4>Années d'évaluation</h4>
                <div class="tags-widget inner">
                    <?php

                    foreach ($years as $key => $year) {
                        if ($key == '') {
                            continue;
                        }
                        ?><a href="<?= site_url("evaluations/annee/$key") ?>"><?= $year ?></a> <?php
                    }

                    ?>
                </div>


            </div>
			<div class="widget">
				<h4>Rangées d'années</h4>
				<?= form_open(site_url('evaluations'), [
					'method'=>'get'
				]) ?>
				<div class="tags-widget inner" style="width: 80%">

					<?=
					form_input([
						'name'=>$name ='search[year_range]',
						'class'=>'js-range-slider form-control',
						'value'=>set_value($name),
						'placeholder'=>'Choisir rangée',
						'style'=>'width:80%'
					]);
					?>
				</div>
				<div class="range-btn-container">
					<button class="btn-search" type="submit"><i class="fas fa-search"></i></button>
				</div>
				<?= form_close() ?>
			</div>
            <?php
        }
        if(isset($thematics) && !empty($thematics)){
            ?>
            <div class="widget">
                <h4>Thématiques</h4>
                <div class="categories inner">
                    <ul>
                        <?php
                        foreach ($thematics as $slug => $thematic) {
                            if ($slug == '') {
                                continue;
                            }
                            ?><li><a href="<?= site_url("evaluations/thematique/$slug") ?>"><?= $thematic ?></a></li><?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <?php
        }
        if(isset($temporalities) && !empty($temporalities)){
            ?>
            <div class="widget">
                <h4>Temporalités</h4>
                <div class="categories inner">
                    <ul>
                        <?php
                        foreach ($temporalities as $slug => $temporality) {
                            if ($slug == '') {
                                continue;
                            }
                            ?><li><a href="<?= site_url("evaluations/temporalite/$slug") ?>"><?= $temporality ?></a></li><?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <?php
        }
        if(isset($sectors) && !empty($sectors)){
            ?>
            <div class="widget">
                <h4>Secteurs</h4>
                <div class="categories inner">
                    <ul>
                        <?php
                        foreach ($sectors as $slug => $sector) {
                            if ($slug == '') {
                                continue;
                            }
                            ?><li><a href="<?= site_url("evaluations/secteur/$slug") ?>"><?= $sector ?></a></li><?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <?php
        }
        ?>




    </div>
</div>
