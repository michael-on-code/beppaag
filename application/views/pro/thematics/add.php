<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 16/11/2019
 * Time: 08:58
 */
?>
<div class="main-content">
    <?php getAdminBreadcrump([
        'title'=>$pageTitle,
        'before'=>[
            'title'=>"Thématiques d'évaluation",
            'url'=>pro_url('thematics')
        ]
    ]);
    getAddOrEditThematicHTML(false, [], $pageTitle)
    ?>

</div>
