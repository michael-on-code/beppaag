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
                        ?><a href="<?= site_url("evaluations/year/$key") ?>"><?= $year ?></a> <?php
                    }

                    ?>
                </div>
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
                            ?><li><a href="<?= site_url("evaluations/thematic/$slug") ?>"><?= $thematic ?></a></li><?php
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
                            ?><li><a href="<?= site_url("evaluations/temporality/$slug") ?>"><?= $temporality ?></a></li><?php
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
                            ?><li><a href="<?= site_url("evaluations/sector/$slug") ?>"><?= $sector ?></a></li><?php
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
