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
            'title'=>"Etiquettes d'articles",
            'url'=>pro_url('posts/tags')
        ]
    ]);
    getAddOrEditTagHTML(false, [], $pageTitle)
    ?>

</div>