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
            <p>Trouvez dans le tableau ci-dessous, la liste des évaluations déplacées à la corbeille</p>
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
                            $recommendationStatData = getEvaluationRecommendationLabel($evaluation->executed_count, $evaluation->total_recommendation_activities_count);
                            ?>
                            <tr>
                                <td>
                                    <div class="cover-section">
                                        <div class="inner-box">
                                            <div class="image-box">
                                                <img class="wd-70-f" src="<?= getUploadedImageBySize($evaluation->cover_photo, '150x150')?>" alt="">
                                            </div>
                                            <div class="overlay-box">
                                                <a data-fancybox="1" href="<?= getUploadedImageBySize($evaluation->cover_photo)?>" class="img-popup"><figure><img src="<?= $assetsUrl ?>pro/images/others/zoom-in-icon.png" alt=""></figure></a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
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
                                <td class="text-center" data-sort="<?= $recommendationStatData['percentage'] ?>">
                                    <?php
                                    getEvaluationRecommendationIndicator($recommendationStatData['label'], $recommendationStatData['percentage'], $assetsUrl);
                                    ?>
                                </td><td>
                                    <span class="badge badge-pill badge-danger">Supprimée</span>
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

                                    <?php
                                    if($isEditor){
                                        ?>
                                        <a data-confirm-message="Voulez-vous vraiment restaurer cette évaluation ?"
                                           href="#"
                                           data-href="<?= pro_url("evaluations/activate/$evaluation->id") ?>" data-toggle="tooltip"
                                           data-placement="top" title="Restaurer & publier évaluation"
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