<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 14/11/2019
 * Time: 13:21
 */
?>
<div class="main-content">
    <?php getAdminBreadcrump([
        'title'=>$pageTitle,
        'before'=>[
            'title'=>'Evaluations',
            'url'=>pro_url('evaluations')
        ]
    ]);
    getAddOrEditEvaluationHTML(true, $evaluation, $pageTitle, $sectors, $thematics, $types, $temporalities, $leading_authorities, $contracting_authorities, $users, $uploadPath, $sectorAjaxForm, $thematicAjaxForm, $typeAjaxForm, $temporalityAjaxForm, $contractingAuthorityAjaxForm, $leadingAuthorityAjaxForm)
    ?>

</div>
