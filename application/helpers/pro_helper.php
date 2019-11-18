<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 15/11/2019
 * Time: 08:29
 */

function includeDatatablesAssets(){
    $ci=&get_instance();
    $ci->data['footerJs'][]=$ci->data['assetsUrl']."pro/vendors/datatables/jquery.dataTables.min.js";
    $ci->data['footerJs'][]=$ci->data['assetsUrl']."pro/vendors/datatables/dataTables.bootstrap.min.js";
    $ci->data['headerCss'][]=$ci->data['assetsUrl']."pro/vendors/datatables/dataTables.bootstrap.min.css";
}

function includeSummernoteAssets(){
    $ci=&get_instance();
    $ci->data['footerJs'][]='//cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.js';
    $ci->data['headerCss'][]='//cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.css';
    $ci->data['footerJs'][]='//cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/lang/summernote-fr-FR.js';
}

function includeSelect2Assets(){
    $ci=&get_instance();
//    $ci->data['footerJs'][]=$ci->data['assetsUrl'].'pro/vendors/select2a/js/select2.min.js';
//    $ci->data['headerCss'][]=$ci->data['assetsUrl'].'pro/vendors/select2a/css/select2.min.css';
    $ci->data['footerJs'][]=$ci->data['assetsUrl'].'pro/vendors/select2/select2.min.js';
    $ci->data['headerCss'][]=$ci->data['assetsUrl'].'pro/vendors/select2/select2.css';
}

function includeDropifyAssets(){
    $ci=&get_instance();
    $ci->data['footerJs'][]=$ci->data['assetsUrl'].'pro/vendors/dropify/dist/js/dropify.min.js';
    $ci->data['headerCss'][]=$ci->data['assetsUrl'].'pro/vendors/dropify/dist/css/dropify.min.css';
}

function getAllFormButtons($edit=false, $cancelUrl){
    ?>
    <div class="form-group pull-right">
        <a href="<?= $cancelUrl ?>" class="btn btn-primary m-l-5 real-btn-primary">
           <i class="anticon anticon-arrow-left"></i> Annuler
        </a>
        <button type="button" class="btn btn-warning m-l-5 clear-form">
            Effacer
        </button>
        <?php getFormSubmit($edit ? 'Modifier' : 'Ajouter') ?>
    </div>
    <?php
}

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