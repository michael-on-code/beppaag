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
    getAddOrEditEvaluationHTML(false, [], $pageTitle, [], [], [], [], $uploadPath)
    ?>

</div>
