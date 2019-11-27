<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 27/11/2019
 * Time: 09:11
 */
?>
<div class="main-content">
    <?php getAdminBreadcrump([
        'title'=>$pageTitle,
        'before'=>[
            'title'=>"Utilisateurs",
            'url'=>pro_url('users')
        ]
    ]);
    getAddOrEditUserHTML(true, $user, $roles, $uploadPath,$pageTitle)
    ?>

</div>