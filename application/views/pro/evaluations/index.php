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
            <a href="<?= pro_url('evaluations/add') ?>" class="btn btn-primary mail-open-compose real-btn-primary">
                <i class="anticon anticon-plus"></i>
                <span class="m-l-5">Ajouter</span>
            </a>
            <p>Trouvez dans le tableau ci-dessous, la liste des évaluations</p>
            <div class="m-t-25">

                <table class="table table-responsive-md table-hover my-complicated-datatable wd-100p-f">
                    <thead>
                    <tr>
                        <?php
                        foreach ($tableHeaders as $key => $header) {
                            $class = '';
                            /*if($key==0){
                                //Numero Interne
                                $class='class="min-wd-150-f"';
                            }elseif($key==1){
                                //Designation
                                $class='class="min-wd-200-f"';
                            }*/
                            ?>
                            <th <?= $class ?>><?= $header ?></th> <?php
                        }
                        ?>
                        <th class="wd-70-f text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if (isset($evaluations) && !empty($evaluations)) {
                        foreach ($evaluations as $key => $evaluation) {
                            ?>
                            <tr>
                                <td data-sort="<?= $evaluation->year ?>"><?= $evaluation->year ?></td>
                                <td data-toggle="tooltip" class=""
                                    data-placement="top"
                                    title="<?= $evaluation->title ?>"><?= myWordLimiter($evaluation->title) ?></td>
                                <td data-toggle="tooltip" class=""
                                    data-placement="top"
                                    title="<?= $evaluation->object ?>"><?= myWordLimiter($evaluation->object) ?></td>
                                <td data-toggle="tooltip" class=""
                                    data-placement="top"
                                    title="<?= $evaluation->sector ?>"><?= myWordLimiter($evaluation->sector) ?></td>
                                <td data-toggle="tooltip" class=""
                                    data-placement="top"
                                    title="<?= $evaluation->thematic ?>"><?= myWordLimiter($evaluation->thematic) ?></td>
                                <td data-sort="<?= $evaluation->active ?>">
                                    <?php
                                    if($evaluation->active){
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
                                <td data-toggle="tooltip" class=""
                                    data-placement="top"
                                    title="<?= $evaluation->type ?>"><?= myWordLimiter($evaluation->type) ?></td>
                                <td data-toggle="tooltip" class=""
                                    data-placement="top"
                                    title="<?= $evaluation->temporality ?>"><?= myWordLimiter($evaluation->temporality) ?></td>
                                <td data-toggle="tooltip" class=""
                                    data-placement="top"
                                    title="<?= $evaluation->leading_authority ?>"><?= myWordLimiter($evaluation->leading_authority) ?></td>
                                <td data-toggle="tooltip" class=""
                                    data-placement="top"
                                    title="<?= $evaluation->contracting_authority ?>"><?= myWordLimiter($evaluation->contracting_authority) ?></td>

                                <td data-sort="<?= strtotime($evaluation->created_at) ?>"><?= convert_date_to_french($evaluation->created_at) ?></td>
                                <td ><?= $evaluation->first_name.' '.$evaluation->last_name ?></td>
                                <td class="text-center actions-btn-container">

                                    <a target="_blank" href="<?= site_url("evaluations/$evaluation->slug") ?>" data-toggle="tooltip"
                                       data-placement="top" title="Voir Evaluation"
                                       class="btn btn-dark btn-icon">
                                        <i class="anticon anticon-eye"></i>
                                    </a>
                                    <a href="<?= pro_url("evaluations/edit/$evaluation->slug") ?>" data-toggle="tooltip"
                                       data-placement="top" title="Modifier evaluation"
                                       class="btn btn-primary btn-icon">
                                        <i class="anticon anticon-edit"></i>
                                    </a>
                                    <?php
                                    if ($isEditor && !$evaluation->active) {
                                        ?>
                                        <a data-confirm-message="Voulez-vous vraiment activer et publier cette évaluation ?"
                                           href="#"
                                           data-href="<?= pro_url("evaluations/activate/$evaluation->slug") ?>" data-toggle="tooltip"
                                           data-placement="top" title="Activer & Publier évaluation"
                                           class="btn btn-success btn-icon prompt">
                                            <i class="anticon anticon-check"></i>
                                        </a>
                                        <?php
                                    }
                                    if($isEditor){
                                        ?>
                                        <a data-confirm-message="Voulez-vous vraiment déplacer à la corbeille cette évaluation ?"
                                           href="#"
                                           data-href="<?= pro_url("evaluations/delete/$evaluation->slug") ?>" data-toggle="tooltip"
                                           data-placement="top" title="Déplacer évaluation à la corbeille"
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