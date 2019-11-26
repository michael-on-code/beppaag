<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 26/11/2019
 * Time: 08:51
 */
?>
<div class="main-content">
    <?php getAdminBreadcrump([
        'title'=>$pageTitle,
        'before'=>[
            'title'=>"Etiquettes d'evenements",
            'url'=>pro_url('events/tags')
        ]
    ]);
    getAddOrEditTagHTML(true, $tag, $pageTitle)
    ?>

</div>