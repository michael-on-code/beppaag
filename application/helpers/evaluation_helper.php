<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 14/11/2019
 * Time: 13:21
 */

function getEvaluationYears($backToNYear = 20, $forSelect2 = true)
{
    $actualYear = date('Y');
    $returnArray = [];
    if ($forSelect2) {
        $returnArray[''] = '';
    }
    for ($i = 0; $i < $backToNYear; $i++) {
        $returnArray[$actualYear - $i] = $actualYear - $i;
    }
    return $returnArray;
}

function getAddOrEditEvaluationHTML($edit = false, $evaluation = [], $pageTitle, $evaluationTypes, $evaluationTemporalities, $evaluationLeadingAuthorities, $evaluationContractingAuthorities, $uploadPath)
{
    $years = getEvaluationYears();
    ?>
    <div class="card">
        <div class="card-body">
            <h4><?= $pageTitle ?></h4>
            <!--            <p>Les paramètres globaux de la plateforme</p>-->
            <div class="m-t-25">
                <?= form_open_multipart('', [
                    'id' => 'form-validation'
                ]) ?>
                <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="general_information_tab" data-toggle="tab"
                           href="#general_information" role="tab" aria-controls="general_information"
                           aria-selected="true">Informations générales</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="content_tab" data-toggle="tab" href="#content" role="tab"
                           aria-controls="content" aria-selected="false">Contenu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="recommendation_tab" data-toggle="tab" href="#recommendation" role="tab"
                           aria-controls="recommendation" aria-selected="false">Recommandation</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="files_tab" data-toggle="tab" href="#files" role="tab"
                           aria-controls="files" aria-selected="false">Fichiers</a>
                    </li>
                </ul>
                <div class="tab-content m-t-15" id="myTabContent">
                    <!--                    general information tab-->
                    <div class="tab-pane fade show active" id="general_information" role="tabpanel"
                         aria-labelledby="general_information_tab">
                        <div class="form-group">
                            <?php
                            echo form_label($title = "Titre de l'évaluation", 'title');
                            echo form_input([
                                'name' => $name = 'evaluation[title]',
                                'class' => 'form-control',
                                'placeholder' => $title,
                                'id' => 'title',
                                'required' => '',
                                'value' => set_value($name, maybe_null_or_empty($evaluation, 'title'))
                            ]);
                            echo form_error($name)
                            ?>
                        </div>
                        <div class="row">
                            <!--                    First Half-->
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <?php
                                        echo form_label($title = "Objet de l'évaluation", $id = 'object');
                                        echo form_input([
                                            'name' => $name = 'evaluation[object]',
                                            'class' => 'form-control',
                                            'placeholder' => $title,
                                            'id' => $id,
                                            'required' => '',
                                            'value' => set_value($name, maybe_null_or_empty($evaluation, $id))
                                        ]);
                                        echo form_error($name)
                                        ?>

                                    </div>
                                    <div class="form-group col-md-12">
                                        <div class="input-group with-add-btn ">
                                            <?php
                                            echo form_label($title = "Secteur concerné", $id = 'sector_id');
                                            ?>
                                            <div class="input-group-container">
                                                <?php
                                                echo form_dropdown($name = 'evaluation[sector_id]', $evaluationTypes, set_value($name, maybe_null_or_empty($evaluation, $id)), [
                                                    'class' => 'select2',
                                                    'required' => ''
                                                ]);
                                                ?>
                                                <div class="input-group-append">
                                                    <button data-modal-target="evaluation-sector"
                                                            class="input-group-text btn btn-primary my-additional-add-btn">
                                                        <i
                                                                class="anticon anticon-plus"></i></button>
                                                </div>
                                                <?php
                                                echo form_error($name)
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <div class="input-group with-add-btn ">
                                            <?php
                                            echo form_label($title = "Thématique de l'évaluation", $id = 'thematic_id');
                                            ?>
                                            <div class="input-group-container">
                                                <?php
                                                echo form_dropdown($name = 'evaluation[thematic_id]', $evaluationTypes, set_value($name, maybe_null_or_empty($evaluation, $id)), [
                                                    'class' => 'select2',
                                                    'required' => ''
                                                ]);
                                                ?>
                                                <div class="input-group-append">
                                                    <button data-modal-target="evaluation-thematic"
                                                            class="input-group-text btn btn-primary my-additional-add-btn">
                                                        <i
                                                                class="anticon anticon-plus"></i></button>
                                                </div>
                                                <?php
                                                echo form_error($name)
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!--                    Second Half-->
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <?php
                                        echo form_label($title = "Année d'évaluation", $id = 'year');
                                        echo form_dropdown($name = 'evaluation[year]', $years, set_value($name, maybe_null_or_empty($evaluation, $id)), [
                                            'class' => 'select2',
                                            'required' => ''
                                        ]);
                                        echo form_error($name)
                                        ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <div class="input-group with-add-btn ">
                                            <?php
                                            echo form_label($title = "Type d'évaluation", $id = 'type_id');
                                            ?>
                                            <div class="input-group-container">
                                                <?php
                                                echo form_dropdown($name = 'evaluation[type_id]', $evaluationTypes, set_value($name, maybe_null_or_empty($evaluation, $id)), [
                                                    'class' => 'select2',
                                                    'required' => ''
                                                ]);
                                                ?>
                                                <div class="input-group-append">
                                                    <button data-modal-target="evaluation-type"
                                                            class="input-group-text btn btn-primary my-additional-add-btn">
                                                        <i
                                                                class="anticon anticon-plus"></i></button>
                                                </div>
                                                <?php
                                                echo form_error($name)
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <div class="input-group with-add-btn ">
                                            <?php
                                            echo form_label($title = "Temporalité de l'évaluation", $id = 'temporality_id');
                                            ?>
                                            <div class="input-group-container">
                                                <?php
                                                echo form_dropdown($name = 'evaluation[temporality_id]', $evaluationTypes, set_value($name, maybe_null_or_empty($evaluation, $id)), [
                                                    'class' => 'select2',
                                                    'required' => ''
                                                ]);
                                                ?>
                                                <div class="input-group-append">
                                                    <button data-modal-target="evaluation-temporality"
                                                            class="input-group-text btn btn-primary my-additional-add-btn">
                                                        <i
                                                                class="anticon anticon-plus"></i></button>
                                                </div>
                                                <?php
                                                echo form_error($name)
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <div class="input-group with-add-btn ">
                                            <?php
                                            echo form_label($title = "Structure/Personnes...", $id = 'leading_authority_id', [
                                                'data-toggle' => 'tooltip',
                                                'title' => "Structure/Personnes ayant conduit l'évaluation"
                                            ]);
                                            ?>
                                            <div class="input-group-container">
                                                <?php
                                                echo form_dropdown($name = 'evaluation[leading_authority_id]', $evaluationTypes, set_value($name, maybe_null_or_empty($evaluation, $id)), [
                                                    'class' => 'select2',
                                                    'required' => '',
                                                ]);
                                                ?>
                                                <div class="input-group-append">
                                                    <button data-modal-target="evaluation-leading-authority"
                                                            class="input-group-text btn btn-primary my-additional-add-btn">
                                                        <i
                                                                class="anticon anticon-plus"></i></button>
                                                </div>
                                                <?php
                                                echo form_error($name)
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <div class="input-group with-add-btn ">
                                            <?php
                                            echo form_label($title = "Authorité contractante", $id = 'contracting_authority_id');
                                            ?>
                                            <div class="input-group-container">
                                                <?php
                                                echo form_dropdown($name = 'evaluation[contracting_authority_id]', $evaluationTypes, set_value($name, maybe_null_or_empty($evaluation, $id)), [
                                                    'class' => 'select2',
                                                    'required' => '',
                                                ]);
                                                ?>
                                                <div class="input-group-append">
                                                    <button data-modal-target="evaluation-contracting-authority"
                                                            class="input-group-text btn btn-primary my-additional-add-btn">
                                                        <i
                                                                class="anticon anticon-plus"></i></button>
                                                </div>
                                                <?php
                                                echo form_error($name)
                                                ?>
                                            </div>
                                        </div>
                                    </div>



                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="tab-pane fade" id="content" role="tabpanel" aria-labelledby="content_tab">
                        <div class="row">
                            <div class="col-md-6">
                                <!--                                First-->
                                <div class="form-group col-md-12 text-area">
                                    <?= form_label("Objectifs et Résultats Attendus", $id = 'objective') ?>
                                    <?= form_textarea([
                                        'name' => $name = 'evaluation[objective]',
                                        'class' => 'my-summernote',
                                        'required' => '',
                                        'id' => $id,
                                        'value' => set_value($name, maybe_null_or_empty($evaluation, $id), false)
                                    ]) ?>
                                    <?= get_form_error($name) ?>
                                </div>
                                <div class="form-group col-md-12 text-area">
                                    <?= form_label("Approche méthodologique", $id = 'methodological_approach') ?>
                                    <?= form_textarea([
                                        'name' => $name = 'evaluation[methodological_approach]',
                                        'class' => 'my-summernote',
                                        'required' => '',
                                        'id' => $id,
                                        'value' => set_value($name, maybe_null_or_empty($evaluation, $id), false)
                                    ]) ?>
                                    <?= get_form_error($name) ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <!--                                Second-->
                                <div class="form-group col-md-12 text-area">
                                    <?= form_label("Description sommaire", $id = 'description') ?>
                                    <?= form_textarea([
                                        'name' => $name = 'evaluation[description]',
                                        'class' => 'my-summernote',
                                        'required' => '',
                                        'id' => $id,
                                        'value' => set_value($name, maybe_null_or_empty($evaluation, $id), false)
                                    ]) ?>
                                    <?= get_form_error($name) ?>
                                </div>
                                <div class="form-group col-md-12 text-area">
                                    <?= form_label("Résumé des résultats attendus", $id = 'results_resume') ?>
                                    <?= form_textarea([
                                        'name' => $name = 'evaluation[results_resume]',
                                        'class' => 'my-summernote',
                                        'required' => '',
                                        'id' => $id,
                                        'value' => set_value($name, maybe_null_or_empty($evaluation, $id), false)
                                    ]) ?>
                                    <?= get_form_error($name) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="recommendation" role="tabpanel" aria-labelledby="recommendation_tab">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <div class="input-group with-add-btn ">
                                            <?php
                                            echo form_label($title = "Associer un acteur de recommandation à l'évaluation", $id = 'recommendation_user_id');
                                            ?>
                                            <div class="input-group-container">
                                                <?php
                                                echo form_dropdown($name = 'evaluation[recommendation_user_id]', $evaluationTypes, set_value($name, maybe_null_or_empty($evaluation, $id)), [
                                                    'class' => 'select2',
                                                    'required' => ''
                                                ]);
                                                ?>
                                                <div class="input-group-append">
                                                    <button data-modal-target="evaluation-recommendation-user"
                                                            class="input-group-text btn btn-primary my-additional-add-btn">
                                                        <i
                                                                class="anticon anticon-plus"></i></button>
                                                </div>
                                                <?php
                                                echo form_error($name)
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <?php
                                        echo form_label($title = "Commentaires à l'endroit de l'acteur", $id='recommendation_comment');
                                        echo form_textarea([
                                            'name' => $name = 'evaluation[recommendation_comment]',
                                            'class' => 'form-control',
                                            'placeholder' => $title,
                                            'id' => $id,
                                            //'required' => '',
                                            'rows' => 3,
                                            'value' => set_value($name, maybe_null_or_empty($evaluation, $id))
                                        ]);
                                        echo form_error($name)
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="files" role="tabpanel" aria-labelledby="files_tab">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <?php echo form_label($title="Attacher la photo de page de couverture");
                                $file = set_value($name='evaluation[cover_photo]', maybe_null_or_empty($evaluation, 'cover_photo', true));
                                ?>
                                <a class="my-file-preview-btn"
                                   data-toggle="tooltip" <?= $file ? '' : 'style="display:none;"' ?>
                                   data-placement="top" title="Visualiser l'image" target="_blank"
                                   href="<?= $file ? $uploadPath . $file : '#' ?>"> <span
                                            class="anticon anticon-cloud-upload"></span></a>
                                <?php
                                $data = [
                                    'name' => '',
                                    'attributes' => [
                                        'data-target' => 'cover_photo',
                                        'data-target-name' => $name,
                                    ],
                                    'title' => $title,
                                ];
                                if ($file) {
                                    $data['value'] = $uploadPath . $file;
                                } else {
                                    $data['value'] = '';
                                }
                                echo form_hidden($name, set_value($name, $file));
                                get_form_upload($data, $extensions = 'jpg jpeg png', '1M', true, 'auto-upload ignore');
                                echo get_form_error($name);
                                getFieldInfo('Format : JPG | JPEG | PNG Taille Max : 1M');
                                ?>
                            </div>
                            <div class="form-group col-md-6">
                                <?php echo form_label($title="Attacher le fichier PDF d'évaluation");
                                $file = set_value($name='evaluation[evaluation_file]', maybe_null_or_empty($evaluation, 'evaluation_file', true));
                                ?>
                                <a class="my-file-preview-btn"
                                   data-toggle="tooltip" <?= $file ? '' : 'style="display:none;"' ?>
                                   data-placement="top" title="Visualiser le fichier" target="_blank"
                                   href="<?= $file ? $uploadPath . $file : '#' ?>"> <span
                                            class="anticon anticon-cloud-upload"></span></a>
                                <?php
                                $data = [
                                    'name' => '',
                                    'attributes' => [
                                        'data-target' => 'evaluation_file',
                                        'data-target-name' => $name,
                                    ],
                                    'title' => $title,
                                ];
                                if ($file) {
                                    $data['value'] = $uploadPath . $file;
                                } else {
                                    $data['value'] = '';
                                }
                                echo form_hidden($name, set_value($name, $file));
                                get_form_upload($data, $extensions = 'pdf', '5M', true, 'auto-upload ignore');
                                echo get_form_error($name);
                                getFieldInfo('Format : PDF Taille Max : 5M');
                                ?>
                            </div>

                        </div>
                    </div>

                </div>

                <div class="form-group">
                    <?php getFormSubmit('Modifier') ?>
                </div>
                <?= form_close() ?>
                <script>
                    var validationRules = {
                        'evaluation[title]': 'required',
                        'evaluation[type_id]': 'required',
                    }
                </script>
            </div>
        </div>
    </div>
    <?php

}

