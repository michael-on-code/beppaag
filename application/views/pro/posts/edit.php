<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 26/11/2019
 * Time: 10:09
 */
?>
<div class="main-content">
    <?php getAdminBreadcrump([
        'title'=>$pageTitle,
        'before'=>[
            'title'=>"Articles",
            'url'=>pro_url('posts')
        ]
    ]);
    getAddOrEditPostHTML(true, $post, $categories, $tags, $categoryAjaxForm, $tagAjaxForm,$uploadPath, $pageTitle)
    ?>

</div>