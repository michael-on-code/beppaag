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
            <a href="<?= pro_url('posts/add') ?>" class="btn btn-primary mail-open-compose real-btn-primary">
                <i class="anticon anticon-plus"></i>
                <span class="m-l-5">Ajouter</span>
            </a>
            <p>Trouvez dans le tableau ci-dessous, la liste des articles déplacés à la corbeille</p>
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
                    <?php if (isset($posts) && !empty($posts)) {
                        foreach ($posts as $key => $post) {
                            ?>
                            <tr>
                                <td>
                                    <div class="cover-section">
                                        <div class="inner-box">
                                            <div class="image-box">
                                                <img class="wd-70-f" src="<?= getUploadedImageBySize($post->thumbnail, '150x150')?>" alt="">
                                            </div>
                                            <div class="overlay-box">
                                                <a data-fancybox="1" href="<?= getUploadedImageBySize($post->thumbnail)?>" class="img-popup"><figure><img src="<?= $assetsUrl ?>pro/images/others/zoom-in-icon.png" alt=""></figure></a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td data-toggle="tooltip" class=""
                                    data-placement="top"
                                    title="<?= $post->title ?>"><?= myWordLimiter($post->title, 10) ?></td>
                                <td data-sort="<?= $post->category_id ?>" data-toggle="tooltip" class=""
                                    data-placement="top"
                                    title="<?= $post->category ?>"><?= myWordLimiter($post->category) ?></td>
                                <td data-toggle="tooltip" class=""
                                    data-placement="top"
                                    title="<?= $post->tag ?>"><?= myWordLimiter($post->tag) ?></td>
                                <td data-sort="<?= $post->active ?>">
                                    <span class="badge badge-pill badge-danger">Supprimé</span>
                                </td>
                                <td data-sort="<?= strtotime($post->created_at) ?>"><?= convert_date_to_french($post->created_at) ?></td>
                                <td ><?= $post->first_name.' '.$post->last_name ?></td>
                                <td class="text-center actions-btn-container">
                                    <?php
                                    if ($isEditor) {
                                        ?>
                                        <a data-confirm-message="Voulez-vous vraiment restaurer et publier cet article ?"
                                           href="#"
                                           data-href="<?= pro_url("posts/activate/$post->slug") ?>" data-toggle="tooltip"
                                           data-placement="top" title="Restaurer & Publier article"
                                           class="btn btn-success btn-icon prompt">
                                            <i class="anticon anticon-check"></i>
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