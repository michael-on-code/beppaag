<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 31/10/2019
 * Time: 14:52
 */

function getBreadcrump(array $data){
    $assetsUrl = base_url('assets/');
    ?>
    <section class="banner banner-small scale-hover">
        <div class="">
            <img src="<?= $assetsUrl ?>public/images/banner.jpg" class="cover transition">
        </div>
        <div class="infos on-container flex flex-col center text-left anim-title">
            <div>
                <h1 class="title small-title"><span><?= maybe_null_or_empty($data, 'title') ?></span></h1>
            </div>
        </div>
    </section>
    <!--<section class="breadcrumb">
        <ul class="block-center">
            <li class="iblock middle"><a href="<?/*= site_url('/') */?>">Accueil</a></li>
            <?php
/*            if(isset($data['before']) && !empty($data['before'])){
                foreach ($data['before'] as $before){
                    */?>
                    <li class="iblock middle"><a href="<?/*= maybe_null_or_empty($before, 'url') */?>"><?/*= maybe_null_or_empty($before, 'title') */?></a></li>
                    <?php
/*                }
            }
            */?>
            <li class="iblock middle"><?/*= maybe_null_or_empty($data, 'title') */?></li>
        </ul>
    </section>-->
    <?php

}