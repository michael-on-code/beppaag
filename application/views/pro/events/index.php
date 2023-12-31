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
            <a href="<?= pro_url('events/add') ?>" class="btn btn-primary mail-open-compose real-btn-primary">
                <i class="anticon anticon-plus"></i>
                <span class="m-l-5">Ajouter</span>
            </a>
            <p>Trouvez dans le tableau ci-dessous, la liste des evenements</p>
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
                    <?php if (isset($events) && !empty($events)) {
                        foreach ($events as $key => $event) {
                            ?>
                            <tr>
                                <td>
                                    <div class="cover-section">
                                        <div class="inner-box">
                                            <div class="image-box">
                                                <img class="wd-70-f" src="<?= getUploadedImageBySize($event->thumbnail, '150x150')?>" alt="">
                                            </div>
                                            <div class="overlay-box">
                                                <a data-fancybox="1" href="<?= getUploadedImageBySize($event->thumbnail)?>" class="img-popup"><figure><img src="<?= $assetsUrl ?>pro/images/others/zoom-in-icon.png" alt=""></figure></a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td data-toggle="tooltip" class=""
                                    data-placement="top"
                                    title="<?= $event->title ?>"><?= myWordLimiter($event->title, 10) ?></td>
                                <td data-toggle="tooltip" class=""
                                    data-placement="top"
                                    title="<?= $event->location ?>"><?= myWordLimiter($event->location) ?></td>
                                <td data-sort="<?= $event->category_id ?>" data-toggle="tooltip" class=""
                                    data-placement="top"
                                    title="<?= $event->category ?>"><?= myWordLimiter($event->category) ?></td>
                                <td data-toggle="tooltip" class=""
                                    data-placement="top"
                                    title="<?= $event->tag ?>"><?= myWordLimiter($event->tag) ?></td>
                                <td data-sort="<?= $event->active ?>">
                                    <?php
                                    if($event->active){
                                        ?>
                                        <span class="badge badge-pill badge-success">Publiée</span>
                                        <?php
                                    }else{
                                        ?>
                                        <span class="badge badge-pill badge-danger">Non publiée</span>
                                        <?php
                                    }
                                    ?>
                                </td>
                                <td data-sort="<?= strtotime($event->starts_at) ?>"><?= convert_date_to_french($event->starts_at) ?></td>
                                <td data-sort="<?= strtotime($event->ends_at) ?>"><?= convert_date_to_french($event->ends_at) ?></td>
                                <td data-sort="<?= strtotime($event->created_at) ?>"><?= convert_date_to_french($event->created_at) ?></td>
                                <td ><?= $event->first_name.' '.$event->last_name ?></td>
                                <td class="text-center actions-btn-container">

                                    <a target="_blank" href="<?= site_url("events/$event->id") ?>" data-toggle="tooltip"
                                       data-placement="top" title="Voir Evenement"
                                       class="btn btn-dark btn-icon">
                                        <i class="anticon anticon-eye"></i>
                                    </a>
                                    <a href="<?= pro_url("events/edit/$event->id") ?>" data-toggle="tooltip"
                                       data-placement="top" title="Modifier evenement"
                                       class="btn btn-primary btn-icon">
                                        <i class="anticon anticon-edit"></i>
                                    </a>
                                    <?php
                                    if ($isEditor && !$event->active) {
                                        ?>
                                        <a data-confirm-message="Voulez-vous vraiment activer et publier cet evenement ?"
                                           href="#"
                                           data-href="<?= pro_url("events/activate/$event->id") ?>" data-toggle="tooltip"
                                           data-placement="top" title="Activer & Publier evenement"
                                           class="btn btn-success btn-icon prompt">
                                            <i class="anticon anticon-check"></i>
                                        </a>
                                        <?php
                                    }
                                    if($isEditor){
                                        ?>
                                        <a data-confirm-message="Voulez-vous vraiment déplacer cet evenement à la corbeille  ?"
                                           href="#"
                                           data-href="<?= pro_url("events/delete/$event->id") ?>" data-toggle="tooltip"
                                           data-placement="top" title="Déplacer evenement à la corbeille"
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