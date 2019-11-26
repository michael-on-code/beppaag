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
            'title'=>"Catégories d'evenements",
            'url'=>pro_url('events/categories')
        ]
    ]);
    getAddOrEditCategoryHTML(true, $category, $pageTitle)
    ?>

</div>