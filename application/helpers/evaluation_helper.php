<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 14/11/2019
 * Time: 13:21
 */

function getExecutionLevels($forSelect = true, $defaultFirstElementValue = '')
{
    $temp = [];
    if ($forSelect) {
        $temp = ['' => $defaultFirstElementValue];
    }
    $temp['executed'] = "Exécuté";
    $temp['in_progress'] = "En cours";
    $temp['unexecuted'] = "Non exécuté";
    return $temp;
}

function getRecommandationStatus($percentage)
{
    if($percentage===''){
        return 'no_data';
    }
    $percentage = (float)$percentage;
    if($percentage<50){
        return 'bad';
    }elseif($percentage >= 50 && $percentage < 75){
        return 'fair';
    }else{
        return 'excellent';
    }
    /*switch ($percentage) {
        case $percentage < 50 :
            return 'bad';
            break;
        case ($percentage >= 50 && $percentage < 75) :
            return 'fair';
            break;
        default:
            return 'excellent';
            break;

    }*/
}

function setEvaluationFormValidation($edit = false, $evaluationID = '')
{
    $ci =& get_instance();
    if ($evaluation = $ci->input->post('evaluation')) {
        $validations = [
            [
                'name' => 'evaluation[title]',
                'label' => "Titre de l'évaluation",
                'rules' => 'trim|required'
            ],
            [
                'name' => 'evaluation[object]',
                'label' => "Objet de l'évaluation",
                'rules' => 'trim|required'
            ],
            [
                'name' => 'evaluation[year]',
                'label' => "Année d'évaluation",
                'rules' => 'trim|required|is_natural_no_zero'
            ],
            [
                'name' => 'evaluation[type_id]',
                'label' => "Type d'évaluation",
                'rules' => 'trim|required|is_natural_no_zero'
            ],
            [
                'name' => 'evaluation[sector_id][]',
                'label' => "Type d'évaluation",
                'rules' => 'trim|required'
            ],
            [
                'name' => 'evaluation[temporality_id]',
                'label' => "Temporalité de l'évaluation",
                'rules' => 'trim|required|is_natural_no_zero'
            ],
            [
                'name' => 'evaluation[leading_authority_id]',
                'label' => "Structure ayant conduit l'évaluation",
                'rules' => 'trim|required|is_natural_no_zero'
            ],
            [
                'name' => 'evaluation[sector_id][]',
                'label' => "Thématique de l'évaluation",
                'rules' => 'trim|required'
            ],
            [
                'name' => 'evaluation[contracting_authority_id]',
                'label' => "Authorité contractante de l'évaluation",
                'rules' => 'trim|required|is_natural_no_zero'
            ],
            [
                'name' => 'evaluation[objective]',
                'label' => "Objectifs et résultats attendus",
                'rules' => 'trim|required'
            ],
            [
                'name' => 'evaluation[description]',
                'label' => "Description sommaire",
                'rules' => 'trim|required'
            ],
            [
                'name' => 'evaluation[methodological_approach]',
                'label' => "Approche méthodologique",
                'rules' => 'trim|required'
            ],
            [
                'name' => 'evaluation[results_resume]',
                'label' => "Résumé des résultats attendus",
                'rules' => 'trim|required'
            ],
            [
                'name' => 'evaluation[cover_photo]',
                'label' => "Photo de page de couverture",
                'rules' => 'trim|required'
            ],
            [
                'name' => 'evaluation[cover_photo]',
                'label' => "Fichier PDF d'évaluation",
                'rules' => 'trim|required'
            ],
        ];
        if ($isActorAssociated = maybe_null_or_empty($evaluation, 'recommendation_actor_associated', true)) {
            $validations[] = [
                'name' => 'evaluation[recommendation_user_id]',
                'label' => "Acteur de recommandation",
                'rules' => 'trim|required|is_natural_no_zero'
            ];
            $validations[] = [
                'name' => 'evaluation[recommendation_start_date]',
                'label' => "Date de début de recommandation",
                'rules' => 'trim|required'
            ];
            $validations[] = [
                'name' => 'evaluation[recommendation_comment]',
                'label' => "Commentaires à l'endroit de l'acteur",
                'rules' => 'trim'
            ];
        }
        setFormValidationRules($validations);
        if ($ci->form_validation->run()) {
            if ($ci->evaluation_model->insertOrUpdateEvaluation($edit, $evaluation, $evaluationID, $isActorAssociated, $ci->input->post('activity'))) {
                get_success_message('Evaluation ' . ($edit ? 'modifiée' : 'ajoutée') . ' avec succès');
                pro_redirect('evaluations');
            } else {
                get_warning_message("Une erreur s'est produite <br> Veuillez recommencer");
            }
        } else {
            get_form_error();
        }
    }
}

function setSectorFormValidation($edit = false, $sectorID = '')
{
    $tables = getEvaluationTablesNames();
    $ci = &get_instance();
    if ($sector = $ci->input->post('sector')) {
        setFormValidationRules([
            [
                'name' => 'sector[name]',
                'label' => "Titre du secteur d'évaluation",
                'rules' => 'trim|required|' . $edit ? "callback_is_unique_on_update[$tables->sectors.name.$sectorID]" : "is_unique[$tables->sectors.name]"
            ],
            [
                'name' => 'sector[description]',
                'label' => "Description du secteur d'évaluation",
                'rules' => 'trim|required'
            ],
        ]);
        if ($ci->form_validation->run()) {
            if (!$edit) {
                $sector['slug'] = getSlugifyString($sector['name'], true, true) . uniqid();
            }
            $ci->evaluation_model->insertorUpdateSector($sector, $sectorID);
            get_success_message("Secteur d'évaluation " . ($edit ? 'modifié' : 'ajouté') . ' avec succès');
            pro_redirect("sectors");
        } else {
            get_error_message();
        }
    }
}

function setThematicFormValidation($edit = false, $thematicID = '')
{
    $tables = getEvaluationTablesNames();
    $ci = &get_instance();
    if ($thematic = $ci->input->post('thematic')) {
        setFormValidationRules([
            [
                'name' => 'thematic[name]',
                'label' => "Titre de la thématique d'évaluation",
                'rules' => 'trim|required|' . $edit ? "callback_is_unique_on_update[$tables->thematics.name.$thematicID]" : "is_unique[$tables->thematics.name]"
            ],
            [
                'name' => 'thematic[description]',
                'label' => "Description de la thématique d'évaluation",
                'rules' => 'trim|required'
            ],
        ]);
        if ($ci->form_validation->run()) {
            if (!$edit) {
                $thematic['slug'] = getSlugifyString($thematic['name'], true, true) . uniqid();
            }
            $ci->evaluation_model->insertorUpdateThematic($thematic, $thematicID);
            get_success_message("Thématique d'évaluation " . ($edit ? 'modifiée' : 'ajoutée') . ' avec succès');
            pro_redirect("thematics");
        } else {
            get_error_message();
        }
    }
}

function setTypeFormValidation($edit = false, $typeID = '')
{
    $tables = getEvaluationTablesNames();
    $ci = &get_instance();
    if ($type = $ci->input->post('type')) {
        setFormValidationRules([
            [
                'name' => 'type[name]',
                'label' => "Titre du type d'évaluation",
                'rules' => 'trim|required|' . $edit ? "callback_is_unique_on_update[$tables->types.name.$typeID]" : "is_unique[$tables->types.name]"
            ],
            [
                'name' => 'type[description]',
                'label' => "Description du type d'évaluation",
                'rules' => 'trim|required'
            ],
        ]);
        if ($ci->form_validation->run()) {
            if (!$edit) {
                $type['slug'] = getSlugifyString($type['name'], true, true) . uniqid();
            }
            $ci->evaluation_model->insertorUpdateTypes($type, $typeID);
            get_success_message("Type d'évaluation " . ($edit ? 'modifié' : 'ajouté') . ' avec succès');
            pro_redirect("types");
        } else {
            get_error_message();
        }
    }
}

function setTemporalityFormValidation($edit = false, $temporalityID = '')
{
    $tables = getEvaluationTablesNames();
    $ci = &get_instance();
    if ($temporality = $ci->input->post('temporality')) {
        setFormValidationRules([
            [
                'name' => 'temporality[name]',
                'label' => "Titre de la temporalité d'évaluation",
                'rules' => 'trim|required|' . $edit ? "callback_is_unique_on_update[$tables->temporalities.name.$temporalityID]" : "is_unique[$tables->temporalities.name]"
            ],
            [
                'name' => 'temporality[description]',
                'label' => "Description de la temporalité d'évaluation",
                'rules' => 'trim|required'
            ],
        ]);
        if ($ci->form_validation->run()) {
            if (!$edit) {
                $temporality['slug'] = getSlugifyString($temporality['name'], true, true) . uniqid();
            }
            $ci->evaluation_model->insertorUpdateTemporalities($temporality, $temporalityID);
            get_success_message("Temporalité d'évaluation " . ($edit ? 'modifiée' : 'ajoutée') . ' avec succès');
            pro_redirect("temporalities");
        } else {
            get_error_message();
        }
    }
}

function setcontractingAuthorityFormValidation($edit = false, $contractingAuthorityID = '')
{
    $tables = getEvaluationTablesNames();
    $ci = &get_instance();
    if ($contractingAuthority = $ci->input->post('contractingAuthority')) {
        setFormValidationRules([
            [
                'name' => 'contractingAuthority[name]',
                'label' => "Titre de l'authorité contractante d'évaluation",
                'rules' => 'trim|required|' . $edit ? "callback_is_unique_on_update[$tables->contracting_authorities.name.$contractingAuthorityID]" : "is_unique[$tables->contracting_authorities.name]"
            ],
            [
                'name' => 'contractingAuthority[description]',
                'label' => "Description de l'authorité contractante d'évaluation",
                'rules' => 'trim|required'
            ],
        ]);
        if ($ci->form_validation->run()) {
            if (!$edit) {
                $contractingAuthority['slug'] = getSlugifyString($contractingAuthority['name'], true, true) . uniqid();
            }
            $ci->evaluation_model->insertorUpdateContractingAuthority($contractingAuthority, $contractingAuthorityID);
            get_success_message("Authorité contractante d'évaluation " . ($edit ? 'modifiée' : 'ajoutée') . ' avec succès');
            pro_redirect("contracting-authorities");
        } else {
            get_error_message();
        }
    }
}

function setLeadingAuthorityFormValidation($edit = false, $leadingAuthorityID = '')
{
    $tables = getEvaluationTablesNames();
    $ci = &get_instance();
    if ($leadingAuthority = $ci->input->post('leadingAuthority')) {
        setFormValidationRules([
            [
                'name' => 'leadingAuthority[name]',
                'label' => "Titre de la Structure/personne ayant conduit d'évaluation",
                'rules' => 'trim|required|' . $edit ? "callback_is_unique_on_update[$tables->leading_authorities.name.$leadingAuthorityID]" : "is_unique[$tables->leading_authorities.name]"
            ],
            [
                'name' => 'leadingAuthority[description]',
                'label' => "Description de la Structure/personne ayant conduit d'évaluation",
                'rules' => 'trim|required'
            ],
        ]);
        if ($ci->form_validation->run()) {
            if (!$edit) {
                $leadingAuthority['slug'] = getSlugifyString($leadingAuthority['name'], true, true) . uniqid();
            }
            $ci->evaluation_model->insertorUpdateLeadingAuthority($leadingAuthority, $leadingAuthorityID);
            get_success_message("Structure/personne ayant conduit d'évaluation " . ($edit ? 'modifiée' : 'ajoutée') . ' avec succès');
            pro_redirect("leading-authorities");
        } else {
            get_error_message();
        }
    }
}

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

function getAddOrEditEvaluationHTML($edit = false, $evaluation = [], $pageTitle, $evaluationSectors, $evaluationThematics, $evaluationTypes, $evaluationTemporalities,
                                    $evaluationLeadingAuthorities, $evaluationContractingAuthorities, $usersForRecommendation, $uploadPath,
                                    $sectorModalForm, $thematicModalForm, $typeModalForm, $temporalityModalForm, $contractingAuthorityModalForm, $leadingAuthorityModalForm)
{
    $years = getEvaluationYears();
    ?>
    <div class="card">
        <div class="card-body">
            <h4><?= $pageTitle ?></h4>
            <!--            <p>Les paramètres globaux de la plateforme</p>-->
            <div class="m-t-25">
                <script>
                    var validationRules = {}
                </script>
                <?= form_open_multipart('', [
                    'id' => 'form-validation',
                    'class' => 'evaluationForm',
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
                        <a class="nav-link" id="files_tab" data-toggle="tab" href="#files" role="tab"
                           aria-controls="files" aria-selected="false">Téléversement</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="recommendation_tab" data-toggle="tab" href="#recommendation" role="tab"
                           aria-controls="recommendation" aria-selected="false">Recommandation</a>
                    </li>

                </ul>
                <div class="tab-content m-t-15" id="myTabContent">
                    <!--                    general information tab-->
                    <div class="tab-pane show active" id="general_information" aria-labelledby="general_information_tab"
                         role="tabpanel"
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
                            echo get_form_error($name)
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
                                        echo get_form_error($name)
                                        ?>

                                    </div>
                                    <div class="form-group col-md-12">
                                        <div class="input-group with-add-btn ">
                                            <?php
                                            echo form_label($title = "Secteur concerné", $id = 'sector_id');
                                            ?>
                                            <div class="input-group-container">
                                                <?php
                                                echo form_dropdown($name = 'evaluation[sector_id][]', $evaluationSectors, set_value($name, maybe_null_or_empty($evaluation, $id)), [
                                                    'class' => 'select2',
                                                    'required' => '',
                                                    'id' => $id,
                                                    'multiple' => 'multiple',
                                                ]);
                                                ?>
                                                <div class="input-group-append">
                                                    <button type="button" data-toggle="modal"
                                                            data-target="#evaluation-sector"
                                                            class="input-group-text btn btn-primary my-additional-add-btn">
                                                        <i
                                                                class="anticon anticon-plus"></i></button>
                                                </div>
                                                <?php
                                                echo get_form_error($name)
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
                                                echo form_dropdown($name = 'evaluation[thematic_id][]', $evaluationThematics, set_value($name, maybe_null_or_empty($evaluation, $id)), [
                                                    'class' => 'select2',
                                                    'required' => '',
                                                    'id' => $id,
                                                    'multiple' => 'multiple',
                                                ]);
                                                ?>
                                                <div class="input-group-append">
                                                    <button type="button" data-toggle="modal"
                                                            data-target="#evaluation-thematic"
                                                            class="input-group-text btn btn-primary my-additional-add-btn">
                                                        <i
                                                                class="anticon anticon-plus"></i></button>
                                                </div>
                                                <?php
                                                echo get_form_error($name)
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
                                        echo get_form_error($name)
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
                                                    'id' => $id,
                                                    'required' => ''
                                                ]);
                                                ?>
                                                <div class="input-group-append">
                                                    <button type="button" data-toggle="modal"
                                                            data-target="#evaluation-type"
                                                            class="input-group-text btn btn-primary my-additional-add-btn">
                                                        <i
                                                                class="anticon anticon-plus"></i></button>
                                                </div>
                                                <?php
                                                echo get_form_error($name)
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
                                                echo form_dropdown($name = 'evaluation[temporality_id]', $evaluationTemporalities, set_value($name, maybe_null_or_empty($evaluation, $id)), [
                                                    'class' => 'select2',
                                                    'id' => $id,
                                                    'required' => ''
                                                ]);
                                                ?>
                                                <div class="input-group-append">
                                                    <button type="button" data-toggle="modal"
                                                            data-target="#evaluation-temporality"
                                                            class="input-group-text btn btn-primary my-additional-add-btn">
                                                        <i
                                                                class="anticon anticon-plus"></i></button>
                                                </div>
                                                <?php
                                                echo get_form_error($name)
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
                                                echo form_dropdown($name = 'evaluation[leading_authority_id]', $evaluationLeadingAuthorities, set_value($name, maybe_null_or_empty($evaluation, $id)), [
                                                    'class' => 'select2',
                                                    'id' => $id,
                                                    'required' => '',
                                                ]);
                                                ?>
                                                <div class="input-group-append">
                                                    <button type="button" data-toggle="modal"
                                                            data-target="#evaluation-leading-authority"
                                                            class="input-group-text btn btn-primary my-additional-add-btn">
                                                        <i
                                                                class="anticon anticon-plus"></i></button>
                                                </div>
                                                <?php
                                                echo get_form_error($name)
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
                                                echo form_dropdown($name = 'evaluation[contracting_authority_id]', $evaluationContractingAuthorities, set_value($name, maybe_null_or_empty($evaluation, $id)), [
                                                    'class' => 'select2',
                                                    'id' => $id,
                                                    'required' => '',
                                                ]);
                                                ?>
                                                <div class="input-group-append">
                                                    <button type="button" data-toggle="modal"
                                                            data-target="#evaluation-contracting-authority"
                                                            class="input-group-text btn btn-primary my-additional-add-btn">
                                                        <i
                                                                class="anticon anticon-plus"></i></button>
                                                </div>
                                                <?php
                                                echo get_form_error($name)
                                                ?>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="tab-pane" id="content" role="tabpanel" aria-labelledby="content_tab">
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
                    <div class="tab-pane" id="files" role="tabpanel" aria-labelledby="files_tab">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <?php echo form_label($title = "Attacher la photo de page de couverture");
                                $file = set_value($name = 'evaluation[cover_photo]', maybe_null_or_empty($evaluation, 'cover_photo', true));
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
                                get_form_upload($data, $extensions = 'jpg jpeg png', '1M', true, 'auto-upload');
                                echo get_form_error($name);
                                getFieldInfo('Format : JPG | JPEG | PNG Taille Max : 1M');
                                ?>
                            </div>
                            <div class="form-group col-md-6">
                                <?php echo form_label($title = "Attacher le fichier PDF d'évaluation");
                                $file = set_value($name = 'evaluation[evaluation_file]', maybe_null_or_empty($evaluation, 'evaluation_file', true));
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
                                get_form_upload($data, $extensions = 'pdf', '5M', true, 'auto-upload');
                                echo get_form_error($name);
                                getFieldInfo('Format : PDF Taille Max : 5M');
                                ?>
                            </div>

                        </div>
                    </div>
                    <div class="tab-pane" id="recommendation" role="tabpanel" aria-labelledby="recommendation_tab">
                        <div class="row">
                            <div class="form-group col-md-12 d-flex align-items-center">
                                <div class="switch m-r-10">
                                    <?= form_checkbox('evaluation[recommendation_actor_associated]', 1, maybe_null_or_empty($evaluation, 'recommendation_actor_associated', false, true), [
                                        'class' => 'recommendation-actor-switcher',
                                        'id' => 'switcher'
                                    ]) ?>
                                    <label for="switcher"></label>
                                </div>
                                <label>Associer un acteur de recommandation</label>

                            </div>
                            <!--                            Actor Recommendation Insert-->
                            <div class="col-md-8" id="actor_recommendation_formgroups">
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <div class="input-group with-add-btn ">
                                            <?php
                                            echo form_label($title = "Associer un acteur de recommandation à l'évaluation", $id = 'recommendation_user_id');
                                            ?>
                                            <div class="input-group-container">
                                                <?php
                                                echo form_dropdown($name = 'evaluation[recommendation_user_id]', $usersForRecommendation, set_value($name, maybe_null_or_empty($evaluation, $id)), [
                                                    'class' => 'select2 ignore',
                                                    'required' => ''
                                                ]);
                                                ?>
                                                <?php
                                                echo get_form_error($name)
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <?php
                                        echo form_label($title = "Date de début de recommandation", $id = 'recommendation_start_date');
                                        echo form_input([
                                            'name' => $name = 'evaluation[recommendation_start_date]',
                                            'class' => 'form-control ignore datepicker-input starts-from-today',
                                            'placeholder' => $title,
                                            'id' => $id,
                                            'required' => '',
                                            'value' => set_value($name, maybe_null_or_empty($evaluation, $id))
                                        ]);
                                        echo get_form_error($name)
                                        ?>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <?php
                                        echo form_label($title = "Commentaires à l'endroit de l'acteur", $id = 'recommendation_comment');
                                        echo form_textarea([
                                            'name' => $name = 'evaluation[recommendation_comment]',
                                            'class' => 'form-control ignore',
                                            'placeholder' => $title,
                                            'id' => $id,
                                            //'required' => '',
                                            'rows' => 3,
                                            'value' => set_value($name, maybe_null_or_empty($evaluation, $id))
                                        ]);
                                        echo get_form_error($name)
                                        ?>
                                    </div>

                                </div>
                            </div>
                            <!--                            Personal Recommendation Insert-->
                            <div class="col-md-12" id="personal_insert_recommendation_formgroups">
                                <?php
                                $activities = maybe_null_or_empty($evaluation, 'activities', true);
                                $activitiesNotEmpty = !empty($activities);
                                ?>
                                <div class="my-repeater "
                                     delete-message="Etes-vous sûr de vouloir supprimer cette activité de recommendation">
                                    <div class="row <?= $activitiesNotEmpty ? 'not-empty' : '' ?>"
                                         data-repeater-list="activity">
                                        <div class="form-group col-md-12">
                                            <button title="Ajouter nouvelle activité" type="button" data-repeater-create
                                                    class="btn btn-primary mail-open-compose real-btn-primary">
                                                <i class="anticon anticon-plus"></i>
                                                <span class="m-l-5">Ajouter nouvelle activité</span>
                                                <span class="badge badge-indicator badge-danger my-repeater-badge"><?= $activitiesNotEmpty ? count($activities) : 1 ?></span>
                                            </button>
                                        </div>
                                        <?php
                                        //Default first one
                                        getRecommendationActivityRepeaterItem([], 'first-one', ($activitiesNotEmpty ? 'ignore-completely' : ''));
                                        if ($activitiesNotEmpty) {
                                            foreach ($activities as $activity) {
                                                getRecommendationActivityRepeaterItem($activity);
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

                <?php getAllFormButtons($edit, pro_url('evaluations')) ?>
                <?= form_close() ?>

            </div>
        </div>
    </div>
    <!-- Modal -->
    <?php
    echo $sectorModalForm;
    echo $thematicModalForm;
    echo $typeModalForm;
    echo $temporalityModalForm;
    echo $leadingAuthorityModalForm;
    echo $contractingAuthorityModalForm;
    ?>
    <?php

}

function getRecommendationActivityRepeaterItem($values = [], $additionalClassToParent = '', $additionalClassToFields = '')
{
    ?>
    <div class="col-md-6 repeater-item <?= $additionalClassToParent ?>" data-repeater-item>
        <button title="Supprimer activité" type="button" data-repeater-delete
                class="btn btn-danger btn-rounded">
            <i class="anticon anticon-delete"></i>
        </button>

        <div class="form-group">
            <?php
            echo form_label($title = "Titre de l'activité de recommendation", $id = 'activity_title');
            echo form_textarea([
                'name' => $name = 'title',
                'class' => "ignore form-control $additionalClassToFields",
                'placeholder' => $title,
                //'id' => $id,
                'required' => '',
                'rows' => 3,
                'value' => maybe_null_or_empty($values, 'title')
            ]);
            ?>
        </div>
        <div class="form-group">
            <?php
            echo form_label($title = "Destinataire de l'activité de recommendation", $id = 'activity_recipient');
            echo form_input([
                'name' => $name = 'recipient',
                'class' => "ignore form-control $additionalClassToFields",
                'placeholder' => $title,
                //'id' => $id,
                'required' => '',
                'value' => maybe_null_or_empty($values, 'recipient')
            ]);
            ?>
        </div>
        <div class="row">
            <div class="form-group col-md-6">

                <?php
                echo form_label($title = "Montant prévu pour l'activité de recommendation", $id = 'activity_amount');
                ?>
                <div class="input-group">
                    <?php
                    echo form_input([
                        'name' => $name = 'amount',
                        'class' => "ignore form-control $additionalClassToFields",//currencyInput
                        'placeholder' => $title,
                        //'id' => $id,
                        //'required' => '',
                        'value' => maybe_null_or_empty($values, 'amount')
                    ]);
                    ?>

                    <div class="input-group-append">
                        <span class="input-group-text" id="basic-addon2">FCFA</span>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-6">
                <?php
                echo form_label($title = "Niveau d'execution de l'activité de recommendation", $id = 'activity_execution_level');
                echo form_dropdown('execution_level', getExecutionLevels(false), maybe_null_or_empty($values, 'execution_level'), [
                    'class' => "ignore form-control $additionalClassToFields",
                    'required' => ''
                ]);
                ?>
            </div>
        </div>

        <div class="form-group">
            <?php
            echo form_label($title = "Commentaire de l'activité de recommendation", $id = 'activity_explanation');
            echo form_textarea([
                'name' => $name = 'explanation',
                'class' => "ignore form-control $additionalClassToFields",
                'placeholder' => $title,
                //'id' => $id,
                'rows' => 3,
                //'required' => '',
                'value' => maybe_null_or_empty($values, 'explanation')
            ]);
            ?>
        </div>
    </div>
    <?php
}

function getAddOrEditSectorHTML($edit = false, $sector = [], $pageTitle)
{
    ?>
    <div class="card">
        <div class="card-body">
            <h4><?= $pageTitle ?></h4>
            <p>Trouvez ici le formulaire de remplissage des secteurs d'évaluation de la plateforme</p>
            <div class="m-t-25">
                <?= form_open('', [
                    'id' => 'form-validation'
                ]) ?>
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <?php
                            echo form_label($title = "Titre du secteur d'évaluation", $id = 'name');
                            echo form_input([
                                'name' => $name = "sector[$id]",
                                'class' => 'form-control',
                                'placeholder' => $title,
                                'id' => $id,
                                'required' => '',
                                'value' => set_value($name, maybe_null_or_empty($sector, $id), false)
                            ]);
                            echo get_form_error($name);
                            ?>
                        </div>
                        <div class="form-group">
                            <?php
                            echo form_label($title = "Description du secteur d'évaluation", $id = 'description');
                            echo form_textarea([
                                'name' => $name = "sector[$id]",
                                'class' => 'form-control',
                                'placeholder' => $title,
                                'id' => $id,
                                'required' => '',
                                'rows' => 2,
                                'value' => set_value($name, maybe_null_or_empty($sector, $id), false)
                            ]);
                            echo get_form_error($name)
                            ?>
                        </div>

                        <?php getAllFormButtons($edit, pro_url('sectors')) ?>
                    </div>
                </div>


                <?= form_close() ?>
                <script>
                    var validationRules = {
                        'sector[name]': 'required',
                        'sector[description]': 'required',
                    }
                </script>
            </div>
        </div>
    </div>
    <?php
}

function getAddOrEditThematicHTML($edit = false, $thematic = [], $pageTitle)
{
    ?>
    <div class="card">
        <div class="card-body">
            <h4><?= $pageTitle ?></h4>
            <p>Trouvez ici le formulaire de remplissage des thématiques d'évaluation de la plateforme</p>
            <div class="m-t-25">
                <?= form_open('', [
                    'id' => 'form-validation'
                ]) ?>
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <?php
                            echo form_label($title = "Titre de la thématique d'évaluation", $id = 'name');
                            echo form_input([
                                'name' => $name = "thematic[$id]",
                                'class' => 'form-control',
                                'placeholder' => $title,
                                'id' => $id,
                                'required' => '',
                                'value' => set_value($name, maybe_null_or_empty($thematic, $id), false)
                            ]);
                            echo get_form_error($name);
                            ?>
                        </div>
                        <div class="form-group">
                            <?php
                            echo form_label($title = "Description de la thématique d'évaluation", $id = 'description');
                            echo form_textarea([
                                'name' => $name = "thematic[$id]",
                                'class' => 'form-control',
                                'placeholder' => $title,
                                'id' => $id,
                                'required' => '',
                                'rows' => 2,
                                'value' => set_value($name, maybe_null_or_empty($thematic, $id), false)
                            ]);
                            echo get_form_error($name)
                            ?>
                        </div>

                        <?php getAllFormButtons($edit, pro_url('thematics')) ?>
                    </div>
                </div>


                <?= form_close() ?>
                <script>
                    var validationRules = {
                        'thematic[name]': 'required',
                        'thematic[description]': 'required',
                    }
                </script>
            </div>
        </div>
    </div>
    <?php
}

function getAddOrEditTypeHTML($edit = false, $type = [], $pageTitle)
{
    ?>
    <div class="card">
        <div class="card-body">
            <h4><?= $pageTitle ?></h4>
            <p>Trouvez ici le formulaire de remplissage des types d'évaluation de la plateforme</p>
            <div class="m-t-25">
                <?= form_open('', [
                    'id' => 'form-validation'
                ]) ?>
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <?php
                            echo form_label($title = "Titre du type d'évaluation", $id = 'name');
                            echo form_input([
                                'name' => $name = "type[$id]",
                                'class' => 'form-control',
                                'placeholder' => $title,
                                'id' => $id,
                                'required' => '',
                                'value' => set_value($name, maybe_null_or_empty($type, $id), false)
                            ]);
                            echo get_form_error($name);
                            ?>
                        </div>
                        <div class="form-group">
                            <?php
                            echo form_label($title = "Description du type d'évaluation", $id = 'description');
                            echo form_textarea([
                                'name' => $name = "type[$id]",
                                'class' => 'form-control',
                                'placeholder' => $title,
                                'id' => $id,
                                'required' => '',
                                'rows' => 2,
                                'value' => set_value($name, maybe_null_or_empty($type, $id), false)
                            ]);
                            echo get_form_error($name)
                            ?>
                        </div>

                        <?php getAllFormButtons($edit, pro_url('types')) ?>
                    </div>
                </div>


                <?= form_close() ?>
                <script>
                    var validationRules = {
                        'type[name]': 'required',
                        'type[description]': 'required',
                    }
                </script>
            </div>
        </div>
    </div>
    <?php
}

function getAddOrEditTemporalityHTML($edit = false, $temporality = [], $pageTitle)
{
    ?>
    <div class="card">
        <div class="card-body">
            <h4><?= $pageTitle ?></h4>
            <p>Trouvez ici le formulaire de remplissage des temporalités d'évaluation de la plateforme</p>
            <div class="m-t-25">
                <?= form_open('', [
                    'id' => 'form-validation'
                ]) ?>
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <?php
                            echo form_label($title = "Titre de la temporalité d'évaluation", $id = 'name');
                            echo form_input([
                                'name' => $name = "temporality[$id]",
                                'class' => 'form-control',
                                'placeholder' => $title,
                                'id' => $id,
                                'required' => '',
                                'value' => set_value($name, maybe_null_or_empty($temporality, $id), false)
                            ]);
                            echo get_form_error($name);
                            ?>
                        </div>
                        <div class="form-group">
                            <?php
                            echo form_label($title = "Description de la temporalité d'évaluation", $id = 'description');
                            echo form_textarea([
                                'name' => $name = "temporality[$id]",
                                'class' => 'form-control',
                                'placeholder' => $title,
                                'id' => $id,
                                'required' => '',
                                'rows' => 2,
                                'value' => set_value($name, maybe_null_or_empty($temporality, $id), false)
                            ]);
                            echo get_form_error($name)
                            ?>
                        </div>

                        <?php getAllFormButtons($edit, pro_url('temporalities')) ?>
                    </div>
                </div>


                <?= form_close() ?>
                <script>
                    var validationRules = {
                        'temporality[name]': 'required',
                        'temporality[description]': 'required',
                    }
                </script>
            </div>
        </div>
    </div>
    <?php
}

function getAddOrEditContractingAuthorityHTML($edit = false, $contractingAuthority = [], $pageTitle)
{
    ?>
    <div class="card">
        <div class="card-body">
            <h4><?= $pageTitle ?></h4>
            <p>Trouvez ici le formulaire de remplissage des authorités contractantes d'évaluation de la plateforme</p>
            <div class="m-t-25">
                <?= form_open('', [
                    'id' => 'form-validation'
                ]) ?>
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <?php
                            echo form_label($title = "Titre de l'authorité contractante d'évaluation", $id = 'name');
                            echo form_input([
                                'name' => $name = "contractingAuthority[$id]",
                                'class' => 'form-control',
                                'placeholder' => $title,
                                'id' => $id,
                                'required' => '',
                                'value' => set_value($name, maybe_null_or_empty($contractingAuthority, $id), false)
                            ]);
                            echo get_form_error($name);
                            ?>
                        </div>
                        <div class="form-group">
                            <?php
                            echo form_label($title = "Description de l'authorité contractante d'évaluation", $id = 'description');
                            echo form_textarea([
                                'name' => $name = "contractingAuthority[$id]",
                                'class' => 'form-control',
                                'placeholder' => $title,
                                'id' => $id,
                                'required' => '',
                                'rows' => 2,
                                'value' => set_value($name, maybe_null_or_empty($contractingAuthority, $id), false)
                            ]);
                            echo get_form_error($name)
                            ?>
                        </div>

                        <?php getAllFormButtons($edit, pro_url('contracting-authorities')) ?>
                    </div>
                </div>


                <?= form_close() ?>
                <script>
                    var validationRules = {
                        'contractingAuthority[name]': 'required',
                        'contractingAuthority[description]': 'required',
                    }
                </script>
            </div>
        </div>
    </div>
    <?php
}

function getAddOrEditLeadingAuthorityHTML($edit = false, $leadingAuthority = [], $pageTitle)
{
    ?>
    <div class="card">
        <div class="card-body">
            <h4><?= $pageTitle ?></h4>
            <p>Trouvez ici le formulaire de remplissage des structures/personne ayant conduit d'évaluation de la
                plateforme</p>
            <div class="m-t-25">
                <?= form_open('', [
                    'id' => 'form-validation'
                ]) ?>
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <?php
                            echo form_label($title = "Titre de la structures/personne ayant conduit d'évaluation d'évaluation", $id = 'name');
                            echo form_input([
                                'name' => $name = "leadingAuthority[$id]",
                                'class' => 'form-control',
                                'placeholder' => $title,
                                'id' => $id,
                                'required' => '',
                                'value' => set_value($name, maybe_null_or_empty($leadingAuthority, $id), false)
                            ]);
                            echo get_form_error($name);
                            ?>
                        </div>
                        <div class="form-group">
                            <?php
                            echo form_label($title = "Description de la structures/personne ayant conduit d'évaluation", $id = 'description');
                            echo form_textarea([
                                'name' => $name = "leadingAuthority[$id]",
                                'class' => 'form-control',
                                'placeholder' => $title,
                                'id' => $id,
                                'required' => '',
                                'rows' => 2,
                                'value' => set_value($name, maybe_null_or_empty($leadingAuthority, $id), false)
                            ]);
                            echo get_form_error($name)
                            ?>
                        </div>

                        <?php getAllFormButtons($edit, pro_url('leading-authorities')) ?>
                    </div>
                </div>


                <?= form_close() ?>
                <script>
                    var validationRules = {
                        'leadingAuthority[name]': 'required',
                        'leadingAuthority[description]': 'required',
                    }
                </script>
            </div>
        </div>
    </div>
    <?php
}

function getAjaxifySectorForm()
{
    ob_start();
    ?>
    <div class="modal fade" id="evaluation-sector">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <?= form_open('', [
                    'class' => 'myAjaxifyModalForm',
                    'data-caller' => 'addSector',
                    'return-select-caller-id' => 'sector_id'
                ]) ?>
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Ajouter secteur d'évaluation</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <i class="anticon anticon-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row modal-body-container">
                        <div class="form-group col-md-12">
                            <?php
                            echo form_label($title = "Titre du secteur d'évaluation", $id = 'name');
                            echo form_input([
                                'name' => $name = "sector[$id]",
                                'class' => 'form-control',
                                'placeholder' => $title,
                                'id' => $id,
                                'required' => '',
                            ]);
                            echo get_form_error($name);
                            ?>
                        </div>
                        <div class="form-group col-md-12">
                            <?php
                            echo form_label($title = "Description du secteur d'évaluation", $id = 'description');
                            echo form_textarea([
                                'name' => $name = "sector[$id]",
                                'class' => 'form-control',
                                'placeholder' => $title,
                                'id' => $id,
                                'required' => '',
                                'rows' => 2,
                            ]);
                            echo get_form_error($name)
                            ?>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary">
                        <span>Ajouter</span>
                        <i class="anticon anticon-loading m-l-5"></i>
                    </button>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
    <?php
    return ob_get_clean();
}

function getAjaxifyThematicForm()
{
    ob_start();
    ?>
    <div class="modal fade" id="evaluation-thematic">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <?= form_open('', [
                    'class' => 'myAjaxifyModalForm',
                    'data-caller' => 'addThematic',
                    'return-select-caller-id' => 'thematic_id'
                ]) ?>
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Ajouter thématique d'évaluation</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <i class="anticon anticon-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row modal-body-container">
                        <div class="form-group col-md-12">
                            <?php
                            echo form_label($title = "Titre de la thématique d'évaluation", $id = 'name');
                            echo form_input([
                                'name' => $name = "thematic[$id]",
                                'class' => 'form-control',
                                'placeholder' => $title,
                                'id' => $id,
                                'required' => '',
                            ]);
                            echo get_form_error($name);
                            ?>
                        </div>
                        <div class="form-group col-md-12">
                            <?php
                            echo form_label($title = "Description de la thématique d'évaluation", $id = 'description');
                            echo form_textarea([
                                'name' => $name = "thematic[$id]",
                                'class' => 'form-control',
                                'placeholder' => $title,
                                'id' => $id,
                                'required' => '',
                                'rows' => 2,
                            ]);
                            echo get_form_error($name)
                            ?>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary">
                        <span>Ajouter</span>
                        <i class="anticon anticon-loading m-l-5"></i>
                    </button>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
    <?php
    return ob_get_clean();
}

function getAjaxifyTypeForm()
{
    ob_start();
    ?>
    <div class="modal fade" id="evaluation-type">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <?= form_open('', [
                    'class' => 'myAjaxifyModalForm',
                    'data-caller' => 'addType',
                    'return-select-caller-id' => 'type_id'
                ]) ?>
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Ajouter type d'évaluation</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <i class="anticon anticon-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row modal-body-container">
                        <div class="form-group col-md-12">
                            <?php
                            echo form_label($title = "Titre du type d'évaluation", $id = 'name');
                            echo form_input([
                                'name' => $name = "type[$id]",
                                'class' => 'form-control',
                                'placeholder' => $title,
                                'id' => $id,
                                'required' => '',
                            ]);
                            echo get_form_error($name);
                            ?>
                        </div>
                        <div class="form-group col-md-12">
                            <?php
                            echo form_label($title = "Description du type d'évaluation", $id = 'description');
                            echo form_textarea([
                                'name' => $name = "type[$id]",
                                'class' => 'form-control',
                                'placeholder' => $title,
                                'id' => $id,
                                'required' => '',
                                'rows' => 2,
                            ]);
                            echo get_form_error($name)
                            ?>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary">
                        <span>Ajouter</span>
                        <i class="anticon anticon-loading m-l-5"></i>
                    </button>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
    <?php
    return ob_get_clean();
}

function getAjaxifyTemporalityForm()
{
    ob_start();
    ?>
    <div class="modal fade" id="evaluation-temporality">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <?= form_open('', [
                    'class' => 'myAjaxifyModalForm',
                    'data-caller' => 'addTemporality',
                    'return-select-caller-id' => 'temporality_id'
                ]) ?>
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Ajouter temporalité d'évaluation</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <i class="anticon anticon-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row modal-body-container">
                        <div class="form-group col-md-12">
                            <?php
                            echo form_label($title = "Titre de la temporalité d'évaluation", $id = 'name');
                            echo form_input([
                                'name' => $name = "temporality[$id]",
                                'class' => 'form-control',
                                'placeholder' => $title,
                                'id' => $id,
                                'required' => '',
                            ]);
                            echo get_form_error($name);
                            ?>
                        </div>
                        <div class="form-group col-md-12">
                            <?php
                            echo form_label($title = "Description de la temporalité d'évaluation", $id = 'description');
                            echo form_textarea([
                                'name' => $name = "temporality[$id]",
                                'class' => 'form-control',
                                'placeholder' => $title,
                                'id' => $id,
                                'required' => '',
                                'rows' => 2,
                            ]);
                            echo get_form_error($name)
                            ?>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary">
                        <span>Ajouter</span>
                        <i class="anticon anticon-loading m-l-5"></i>
                    </button>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
    <?php
    return ob_get_clean();
}

function getAjaxifyContractingAuthorityForm()
{
    ob_start();
    ?>
    <div class="modal fade" id="evaluation-contracting-authority">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <?= form_open('', [
                    'class' => 'myAjaxifyModalForm',
                    'data-caller' => 'addContractingAuthority',
                    'return-select-caller-id' => 'contracting_authority_id'
                ]) ?>
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Ajouter authorité contractante
                        d'évaluation</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <i class="anticon anticon-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row modal-body-container">
                        <div class="form-group col-md-12">
                            <?php
                            echo form_label($title = "Titre de l'authorité contractante d'évaluation", $id = 'name');
                            echo form_input([
                                'name' => $name = "contractingAuthority[$id]",
                                'class' => 'form-control',
                                'placeholder' => $title,
                                'id' => $id,
                                'required' => '',
                            ]);
                            echo get_form_error($name);
                            ?>
                        </div>
                        <div class="form-group col-md-12">
                            <?php
                            echo form_label($title = "Description de l'authorité contractante d'évaluation", $id = 'description');
                            echo form_textarea([
                                'name' => $name = "contractingAuthority[$id]",
                                'class' => 'form-control',
                                'placeholder' => $title,
                                'id' => $id,
                                'required' => '',
                                'rows' => 2,
                            ]);
                            echo get_form_error($name)
                            ?>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary">
                        <span>Ajouter</span>
                        <i class="anticon anticon-loading m-l-5"></i>
                    </button>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
    <?php
    return ob_get_clean();
}

function getAjaxifyLeadingAuthorityForm()
{
    ob_start();
    ?>
    <div class="modal fade" id="evaluation-leading-authority">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <?= form_open('', [
                    'class' => 'myAjaxifyModalForm',
                    'data-caller' => 'addLeadingAuthority',
                    'return-select-caller-id' => 'leading_authority_id'
                ]) ?>
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Ajouter structure/personne ayant conduit
                        d'évaluation</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <i class="anticon anticon-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row modal-body-container">
                        <div class="form-group col-md-12">
                            <?php
                            echo form_label($title = "Titre de la structures/personne ayant conduit d'évaluation", $id = 'name');
                            echo form_input([
                                'name' => $name = "leadingAuthority[$id]",
                                'class' => 'form-control',
                                'placeholder' => $title,
                                'id' => $id,
                                'required' => '',
                            ]);
                            echo get_form_error($name);
                            ?>
                        </div>
                        <div class="form-group col-md-12">
                            <?php
                            echo form_label($title = "Description de la structures/personne ayant conduit d'évaluation", $id = 'description');
                            echo form_textarea([
                                'name' => $name = "leadingAuthority[$id]",
                                'class' => 'form-control',
                                'placeholder' => $title,
                                'id' => $id,
                                'required' => '',
                                'rows' => 2,
                            ]);
                            echo get_form_error($name)
                            ?>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary">
                        <span>Ajouter</span>
                        <i class="anticon anticon-loading m-l-5"></i>
                    </button>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
    <?php
    return ob_get_clean();
}





