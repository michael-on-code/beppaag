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
        'title' => $pageTitle,
    ]);
    ?>
    <div class="card">
        <div class="card-body">
            <h4 class="inline"><?= $pageTitle ?></h4>
            <a href="<?= pro_url('users/add') ?>" class="btn btn-primary mail-open-compose real-btn-primary">
                <i class="anticon anticon-plus"></i>
                <span class="m-l-5">Ajouter</span>
            </a>
            <p>Trouvez dans le tableau ci-dessous, la liste des utilisateur de la plateforme</p>
            <div class="m-t-25">

                <table class="table table-responsive-md table-hover my-complicated-datatable wd-100p-f">
                    <thead>
                    <tr>
                        <?php
                        foreach ($tableHeaders as $key => $header) {
                            $class = '';
                            ?>
                            <th <?= $class ?>><?= $header ?></th> <?php
                        }
                        ?>
                        <th class="wd-70-f text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if (isset($users) && !empty($users)) {
                        foreach ($users as $key => $user) {
                            $userPhoto = $user->user_photo ? $user->user_photo : maybe_null_or_empty($options, 'siteDefaultAvatar')
                            ?>
                            <tr>
                                <td>
                                    <div class="cover-section">
                                        <div class="inner-box">
                                            <div class="image-box">
                                                <img class="wd-50-f" src="<?= getUploadedImageBySize($userPhoto, '150x150')?>" alt="">
                                            </div>
                                            <div class="overlay-box">
                                                <a data-fancybox="1" href="<?= getUploadedImageBySize($userPhoto)?>" class="img-popup"><figure><img src="<?= $assetsUrl ?>pro/images/others/zoom-in-icon.png" alt=""></figure></a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td ><?= $user->last_name.' '.$user->first_name ?></td>
                                <td ><?= $user->email ?></td>
                                <td data-sort="<?= $user->active ?>">
                                    <?php
                                    if($user->active==1){
                                        ?>
                                        <span class="badge badge-pill badge-success">Actif</span>
                                        <?php
                                    }elseif($user->active==2){
                                        ?>
                                        <span class="badge badge-pill badge-danger">Banni</span>
                                        <?php
                                    }else{
                                        ?>
                                        <span class="badge badge-pill badge-primary">En attente</span>
                                        <?php
                                    }
                                    ?>
                                </td>
                                <td ><?= $user->role ?></td>
                                <td data-sort="<?= $user->last_login ?>"><?= getDateByTime($user->last_login, $dateFormat = getRegularDateTimeFormat(false)) ?></td>
                                <td data-sort="<?= $user->created_on ?>"><?= getDateByTime($user->created_on, $dateFormat) ?></td>
                                <td class="text-center actions-btn-container">
                                    <a href="<?= pro_url("users/edit/$user->username") ?>" data-toggle="tooltip"
                                       data-placement="top" title="Modifier utilisateur"
                                       class="btn btn-primary btn-icon">
                                        <i class="anticon anticon-edit"></i>
                                    </a>
                                    <?php
                                    if ($user->active==2) {
                                        ?>
                                        <a data-confirm-message="Voulez-vous vraiment activer cet utilisateur ?"
                                           href="#"
                                           data-href="<?= pro_url("users/activate/$user->username") ?>" data-toggle="tooltip"
                                           data-placement="top" title="Activer utilisateur"
                                           class="btn btn-success btn-icon prompt">
                                            <i class="anticon anticon-check"></i>
                                        </a>
                                        <?php
                                    }elseif($user->active==1){
                                        ?>
                                        <a data-confirm-message="Voulez-vous vraiment bannir cet utilisateur ?"
                                           href="#"
                                           data-href="<?= pro_url("users/ban/$user->username") ?>" data-toggle="tooltip"
                                           data-placement="top" title="Bannir utilisateur"
                                           class="btn btn-danger btn-icon prompt">
                                            <i class="anticon anticon-stop"></i>
                                        </a>
                                        <?php
                                    }else{
                                        ?>
                                        <a data-confirm-message="Voulez-vous vraiment renvoyer le mail d'activation à cet utilisateur ?"
                                           href="#"
                                           data-href="<?= pro_url("users/resend-activation/$user->username") ?>" data-toggle="tooltip"
                                           data-placement="top" title="Renvoyer mail d'activation à l'utilisateur"
                                           class="btn btn-warning btn-icon prompt">
                                            <i class="anticon anticon-reload"></i>
                                        </a>
                                        <a data-confirm-message="Voulez-vous vraiment supprimer cet utilisateur ?"
                                           href="#"
                                           data-href="<?= pro_url("users/delete-awaiting/$user->username") ?>" data-toggle="tooltip"
                                           data-placement="top" title="Supprimer utilisateur"
                                           class="btn btn-danger btn-icon prompt">
                                            <i class="anticon anticon-delete"></i>
                                        </a>
                                        <?php
                                    }
                                    ?>

                                </td>
                            </tr>
                            <?php
                        }
                    } ?>
                    </tbody>
                </table>

            </div>
            <div class="row m-t-25">
                <div class="col-md-6 offset-md-3">
                    <div class="form-group">
                        <?php
                        echo form_label('Afficher / Masquer des colonnes');
                        echo form_dropdown('', $tableHeaders, $visiblesColumns, [
                            'class' => 'select2',
                            'multiple' => '',
                            'id' => 'columnToggle'
                        ]);
                        ?>
                    </div>
                </div>
            </div>


        </div>

    </div>

</div>