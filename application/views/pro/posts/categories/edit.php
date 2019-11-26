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
            'title'=>"Catégories d'articles",
            'url'=>pro_url('posts/categories')
        ]
    ]);
    getAddOrEditCategoryHTML(true, $category, $pageTitle)
    ?>

</div>