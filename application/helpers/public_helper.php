<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 31/10/2019
 * Time: 14:52
 */

function getBreadcrump(array $data){
    ?>
    <section class="wf100 subheader">
        <div class="container">
            <h2><?= maybe_null_or_empty($data, 'title') ?></h2>
            <ul>
                <li> <a href="<?= site_url() ?>">Accueil</a> </li>
                <?php
                if(isset($data['before']) && !empty($data['before'])){
                    foreach ($data['before'] as $before){
                        ?>
                        <li> <a href="<?= maybe_null_or_empty($before, 'url') ?>"> <?= maybe_null_or_empty($before, 'title') ?> </a> </li>
                        <?php
                    }
                }
                ?>
                <li><?= maybe_null_or_empty($data, 'title') ?></li>
            </ul>
        </div>
    </section>
    <?php

}