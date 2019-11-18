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
        'title'=>$pageTitle,
    ]);
    ?>
    <div class="card">
        <div class="card-body">
            <h4 class="inline"><?= $pageTitle ?></h4>
            <a href="<?= pro_url('contracting-authorities/add') ?>" class="btn btn-primary mail-open-compose real-btn-primary">
                <i class="anticon anticon-plus"></i>
                <span class="m-l-5">Ajouter</span>
            </a>
            <p>Trouvez dans le tableau ci-dessous, la liste des authorités contractantes d'évaluations</p>
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
                    <?php if(isset($contractingAuthorities) && !empty($contractingAuthorities)){
                        foreach ($contractingAuthorities as $key=> $contractingAuthority){
                            ?>
                            <tr>
                                <td><a href="<?= pro_url("contracting-authorities/edit/$contractingAuthority->slug") ?>">
                                        <?= $contractingAuthority->name ?>
                                    </a></td>
                                <td><?= $contractingAuthority->description ?></td>
                                <td class="text-center actions-btn-container">
                                    <a href="<?= pro_url("contracting-authorities/edit/$contractingAuthority->slug") ?>" data-toggle="tooltip" data-placement="top" title="Modifier authorité contractante d'évaluation" class="btn btn-primary btn-icon">
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