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
    ]);
    ?>
    <div class="card">
        <div class="card-body">
            <h4 class="inline"><?= $pageTitle ?></h4>
            <a href="<?= pro_url('events/tags/add') ?>" class="btn btn-primary mail-open-compose real-btn-primary">
                <i class="anticon anticon-plus"></i>
                <span class="m-l-5">Ajouter</span>
            </a>
            <p>Trouvez dans le tableau ci-dessous, la liste des étiquettes d'evenements</p>
            <div class="m-t-25">

                <table  class="table table-hover my-datatable">
                    <thead>
                    <tr>
                        <th>Titre</th>
                        <th>Description</th>
                        <th class="text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(isset($tags) && !empty($tags)){
                        foreach ($tags as $key=> $tag){
                            ?>
                            <tr>
                                <td><a href="<?= pro_url("events/tags/edit/$tag->slug") ?>">
                                        <?= $tag->name ?>
                                    </a></td>
                                <td><?= $tag->description ?></td>
                                <td class="text-center actions-btn-container">
                                    <a href="<?= pro_url("events/tags/edit/$tag->slug") ?>" data-toggle="tooltip" data-placement="top" title="Modifier catégorie d'evenement" class="btn btn-primary btn-icon">
                                        <i class="anticon anticon-edit"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php
                        }
                    } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>