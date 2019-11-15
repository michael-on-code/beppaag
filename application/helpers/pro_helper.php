<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 15/11/2019
 * Time: 08:29
 */

function getAdminBreadcrump(array $args){
    ?>
    <div class="page-header">
        <h2 class="header-title"><?= $args['title'] ?></h2>
        <div class="header-sub-title">
            <nav class="breadcrumb breadcrumb-dash">
                <a href="<?= pro_url() ?>" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Tableau de
                    bord</a>
                <?php
                if(isset($args['before'])){
                    ?>
                    <a href="<?= $args['before']['url'] ?>" class="breadcrumb-item"><?= $args['before']['title'] ?></a>
                    <?php
                }
                ?>
                <span class="breadcrumb-item active"><?= $args['title'] ?></span>

            </nav>
        </div>
    </div>
    <?php
}