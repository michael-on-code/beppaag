<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 19/11/2019
 * Time: 11:03
 */
class Admin_ajaxify extends Pro_Controller{

    public function __construct()
    {
        parent::__construct();
    }

    public function addPostCategory(){
        if($this->input->is_ajax_request()){
            if($category = $this->input->post('category')){
                $tables = getPostTablesNames();
                setFormValidationRules([
                    [
                        'name'=>'category[name]',
                        'label'=>"Titre de la catégorie",
                        'rules' => "trim|required|is_unique[$tables->categories.name]"
                    ],
                    [
                        'name' => 'category[description]',
                        'label' => "Description de la catégorie d'article",
                        'rules' => 'trim|required'
                    ],
                ]);
                if($this->form_validation->run()){
                    $this->load->model('post_model');
                    $category['slug'] = getSlugifyString($category['name'], true, true) . uniqid();
                    $categoryID = $this->post_model->insertorUpdateCategory($category);
                    echo json_encode([
                        'status'=>true,
                        'message'=>"<p>Catégorie d'article ajoutée avec succès</p>",
                        'select2Data'=>[
                            'id'=>$categoryID,
                            'text'=>$category['name']
                        ]
                    ]);
                }else{
                    echo json_encode([
                        'status'=>false,
                        'message'=>validation_errors()
                    ]);
                }
            }else{
                echo json_encode([
                    'status'=>false,
                    'message'=>"<p>Action non authorisée</p>"
                ]);
            }
            die();
        }
        pro_redirect();
    }

    public function addPostTag(){
        if($this->input->is_ajax_request()){
            if($tag = $this->input->post('tag')){
                $tables = getPostTablesNames();
                setFormValidationRules([
                    [
                        'name'=>'tag[name]',
                        'label'=>"Titre de l'étiquette",
                        'rules' => "trim|required|is_unique[$tables->tags.name]"
                    ],
                    [
                        'name' => 'tag[description]',
                        'label' => "Description de l'étiquette d'article",
                        'rules' => 'trim|required'
                    ],
                ]);
                if($this->form_validation->run()){
                    $this->load->model('post_model');
                    $tag['slug'] = getSlugifyString($tag['name'], true, true) . uniqid();
                    $tagID = $this->post_model->insertorUpdateTag($tag);
                    echo json_encode([
                        'status'=>true,
                        'message'=>"<p>Etiquette d'article ajouté avec succès</p>",
                        'select2Data'=>[
                            'id'=>$tagID,
                            'text'=>$tag['name']
                        ]
                    ]);
                }else{
                    echo json_encode([
                        'status'=>false,
                        'message'=>validation_errors()
                    ]);
                }
            }else{
                echo json_encode([
                    'status'=>false,
                    'message'=>"<p>Action non authorisée</p>"
                ]);
            }
            die();
        }
        pro_redirect();
    }
    
    public function addEventCategory(){
        if($this->input->is_ajax_request()){
            if($category = $this->input->post('category')){
                $tables = getEventTablesNames();
                setFormValidationRules([
                    [
                        'name'=>'category[name]',
                        'label'=>"Titre de la catégorie",
                        'rules' => "trim|required|is_unique[$tables->categories.name]"
                    ],
                    [
                        'name' => 'category[description]',
                        'label' => "Description de la catégorie d'evenement",
                        'rules' => 'trim|required'
                    ],
                ]);
                if($this->form_validation->run()){
                    $this->load->model('event_model');
                    $category['slug'] = getSlugifyString($category['name'], true, true) . uniqid();
                    $categoryID = $this->event_model->insertorUpdateCategory($category);
                    echo json_encode([
                        'status'=>true,
                        'message'=>"<p>Catégorie d'evenement ajoutée avec succès</p>",
                        'select2Data'=>[
                            'id'=>$categoryID,
                            'text'=>$category['name']
                        ]
                    ]);
                }else{
                    echo json_encode([
                        'status'=>false,
                        'message'=>validation_errors()
                    ]);
                }
            }else{
                echo json_encode([
                    'status'=>false,
                    'message'=>"<p>Action non authorisée</p>"
                ]);
            }
            die();
        }
        pro_redirect();
    }

    public function addEventTag(){
        if($this->input->is_ajax_request()){
            if($tag = $this->input->post('tag')){
                $tables = getEventTablesNames();
                setFormValidationRules([
                    [
                        'name'=>'tag[name]',
                        'label'=>"Titre de l'étiquette",
                        'rules' => "trim|required|is_unique[$tables->tags.name]"
                    ],
                    [
                        'name' => 'tag[description]',
                        'label' => "Description de l'étiquette d'evenement",
                        'rules' => 'trim|required'
                    ],
                ]);
                if($this->form_validation->run()){
                    $this->load->model('event_model');
                    $tag['slug'] = getSlugifyString($tag['name'], true, true) . uniqid();
                    $tagID = $this->event_model->insertorUpdateTag($tag);
                    echo json_encode([
                        'status'=>true,
                        'message'=>"<p>Etiquette d'evenement ajouté avec succès</p>",
                        'select2Data'=>[
                            'id'=>$tagID,
                            'text'=>$tag['name']
                        ]
                    ]);
                }else{
                    echo json_encode([
                        'status'=>false,
                        'message'=>validation_errors()
                    ]);
                }
            }else{
                echo json_encode([
                    'status'=>false,
                    'message'=>"<p>Action non authorisée</p>"
                ]);
            }
            die();
        }
        pro_redirect();
    }
    
    

    public function addSector(){
        if($this->input->is_ajax_request()){
            if($sector = $this->input->post('sector')){
                $tables = getEvaluationTablesNames();
                setFormValidationRules([
                    [
                        'name' => 'sector[name]',
                        'label' => "Titre du secteur d'évaluation",
                        'rules' => "trim|required|is_unique[$tables->sectors.name]"
                    ],
                    [
                        'name' => 'sector[description]',
                        'label' => "Description du secteur d'évaluation",
                        'rules' => 'trim|required'
                    ],
                ]);
                if($this->form_validation->run()){
                    $this->load->model('evaluation_model');
                    $sector['slug'] = getSlugifyString($sector['name'], true, true) . uniqid();
                    $sectorID = $this->evaluation_model->insertorUpdateSector($sector);
                    echo json_encode([
                        'status'=>true,
                        'message'=>"<p>Secteur d'évaluation ajouté avec succès</p>",
                        'select2Data'=>[
                            'id'=>$sectorID,
                            'text'=>$sector['name']
                        ]
                    ]);
                }else{
                    echo json_encode([
                        'status'=>false,
                        'message'=>validation_errors()
                    ]);
                }
            }else{
                echo json_encode([
                    'status'=>false,
                    'message'=>"<p>Action non authorisée</p>"
                ]);
            }
            die();
        }
        pro_redirect();
    }

    public function addThematic(){
        if($this->input->is_ajax_request()){
            if($thematic = $this->input->post('thematic')){
                $tables = getEvaluationTablesNames();
                setFormValidationRules([
                    [
                        'name' => 'thematic[name]',
                        'label' => "Titre de la thématique d'évaluation",
                        'rules' => "trim|required|is_unique[$tables->thematics.name]"
                    ],
                    [
                        'name' => 'thematic[description]',
                        'label' => "Description de la thématique d'évaluation",
                        'rules' => 'trim|required'
                    ],
                ]);
                if($this->form_validation->run()){
                    $this->load->model('evaluation_model');
                    $thematic['slug'] = getSlugifyString($thematic['name'], true, true) . uniqid();
                    $thematicID = $this->evaluation_model->insertorUpdateThematic($thematic);
                    echo json_encode([
                        'status'=>true,
                        'message'=>"<p>Thématique d'évaluation ajoutée avec succès</p>",
                        'select2Data'=>[
                            'id'=>$thematicID,
                            'text'=>$thematic['name']
                        ]
                    ]);
                }else{
                    echo json_encode([
                        'status'=>false,
                        'message'=>validation_errors()
                    ]);
                }
            }else{
                echo json_encode([
                    'status'=>false,
                    'message'=>"<p>Action non authorisée</p>"
                ]);
            }
            die();
        }
        pro_redirect();
    }

    public function addType(){
        if($this->input->is_ajax_request()){
            if($type = $this->input->post('type')){
                $tables = getEvaluationTablesNames();
                setFormValidationRules([
                    [
                        'name' => 'type[name]',
                        'label' => "Titre du type d'évaluation",
                        'rules' => "trim|required|is_unique[$tables->types.name]"
                    ],
                    [
                        'name' => 'type[description]',
                        'label' => "Description du type d'évaluation",
                        'rules' => 'trim|required'
                    ],
                ]);
                if($this->form_validation->run()){
                    $this->load->model('evaluation_model');
                    $type['slug'] = getSlugifyString($type['name'], true, true) . uniqid();
                    $typeID = $this->evaluation_model->insertorUpdateTypes($type);
                    echo json_encode([
                        'status'=>true,
                        'message'=>"<p>Type d'évaluation ajouté avec succès</p>",
                        'select2Data'=>[
                            'id'=>$typeID,
                            'text'=>$type['name']
                        ]
                    ]);
                }else{
                    echo json_encode([
                        'status'=>false,
                        'message'=>validation_errors()
                    ]);
                }
            }else{
                echo json_encode([
                    'status'=>false,
                    'message'=>"<p>Action non authorisée</p>"
                ]);
            }
            die();
        }
        pro_redirect();
    }

    public function addTemporality(){
        if($this->input->is_ajax_request()){
            if($temporality = $this->input->post('temporality')){
                $tables = getEvaluationTablesNames();
                setFormValidationRules([
                    [
                        'name' => 'temporality[name]',
                        'label' => "Titre de la temporalité d'évaluation",
                        'rules' => "trim|required|is_unique[$tables->temporalities.name]"
                    ],
                    [
                        'name' => 'temporality[description]',
                        'label' => "Description de la temporalité d'évaluation",
                        'rules' => 'trim|required'
                    ],
                ]);
                if($this->form_validation->run()){
                    $this->load->model('evaluation_model');
                    $temporality['slug'] = getSlugifyString($temporality['name'], true, true) . uniqid();
                    $temporalityID = $this->evaluation_model->insertorUpdateTemporalities($temporality);
                    echo json_encode([
                        'status'=>true,
                        'message'=>"<p>Temporalité d'évaluation ajoutée avec succès</p>",
                        'select2Data'=>[
                            'id'=>$temporalityID,
                            'text'=>$temporality['name']
                        ]
                    ]);
                }else{
                    echo json_encode([
                        'status'=>false,
                        'message'=>validation_errors()
                    ]);
                }
            }else{
                echo json_encode([
                    'status'=>false,
                    'message'=>"<p>Action non authorisée</p>"
                ]);
            }
            die();
        }
        pro_redirect();
    }

    public function addLeadingAuthority(){
        if($this->input->is_ajax_request()){
            if($leadingAuthority = $this->input->post('leadingAuthority')){
                $tables = getEvaluationTablesNames();
                setFormValidationRules([
                    [
                        'name' => 'leadingAuthority[name]',
                        'label' => "Titre de la Structure/personne ayant conduit d'évaluation",
                        'rules' => "trim|required|is_unique[$tables->leading_authorities.name]"
                    ],
                    [
                        'name' => 'leadingAuthority[description]',
                        'label' => "Description de la Structure/personne ayant conduit d'évaluation",
                        'rules' => 'trim|required'
                    ],
                ]);
                if($this->form_validation->run()){
                    $this->load->model('evaluation_model');
                    $leadingAuthority['slug'] = getSlugifyString($leadingAuthority['name'], true, true) . uniqid();
                    $leadingAuthorityID = $this->evaluation_model->insertorUpdateLeadingAuthority($leadingAuthority);
                    echo json_encode([
                        'status'=>true,
                        'message'=>"<p>Structure/personne ayant conduit d'évaluation ajoutée avec succès</p>",
                        'select2Data'=>[
                            'id'=>$leadingAuthorityID,
                            'text'=>$leadingAuthority['name']
                        ]
                    ]);
                }else{
                    echo json_encode([
                        'status'=>false,
                        'message'=>validation_errors()
                    ]);
                }
            }else{
                echo json_encode([
                    'status'=>false,
                    'message'=>"<p>Action non authorisée</p>"
                ]);
            }
            die();
        }
        pro_redirect();
    }

    public function addContractingAuthority(){
        if($this->input->is_ajax_request()){
            if($contractingAuthority = $this->input->post('contractingAuthority')){
                $tables = getEvaluationTablesNames();
                setFormValidationRules([
                    [
                        'name' => 'contractingAuthority[name]',
                        'label' => "Titre de l'authorité contractante d'évaluation",
                        'rules' => "trim|required|is_unique[$tables->contracting_authorities.name]"
                    ],
                    [
                        'name' => 'contractingAuthority[description]',
                        'label' => "Description de l'authorité contractante d'évaluation",
                        'rules' => 'trim|required'
                    ],
                ]);
                if($this->form_validation->run()){
                    $this->load->model('evaluation_model');
                    $contractingAuthority['slug'] = getSlugifyString($contractingAuthority['name'], true, true) . uniqid();
                    $contractingAuthorityID = $this->evaluation_model->insertorUpdateContractingAuthority($contractingAuthority);
                    echo json_encode([
                        'status'=>true,
                        'message'=>"<p>Authorité contractante d'évaluation ajoutée avec succès</p>",
                        'select2Data'=>[
                            'id'=>$contractingAuthorityID,
                            'text'=>$contractingAuthority['name']
                        ]
                    ]);
                }else{
                    echo json_encode([
                        'status'=>false,
                        'message'=>validation_errors()
                    ]);
                }
            }else{
                echo json_encode([
                    'status'=>false,
                    'message'=>"<p>Action non authorisée</p>"
                ]);
            }
            die();
        }
        pro_redirect();
    }
}
