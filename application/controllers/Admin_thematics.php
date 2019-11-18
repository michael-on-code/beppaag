<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 16/11/2019
 * Time: 08:55
 */

class Admin_thematics extends Pro_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('evaluation');
        $this->load->model('evaluation_model');
    }

    public function index(){
        $tables = getEvaluationTablesNames();
        $this->data['pageTitle']="Liste des thématiques d'évaluations";
        //$dataTable
        includeDatatablesAssets();
        $this->data['thematics']=getAllInTable($tables->thematics, false);
//        var_dump($this->data['thematics']);exit;
        $this->render('thematics/index');
    }

    public function add(){
        $this->data['pageTitle']="Ajouter une thématique d'évaluation";
        setThematicFormValidation();
        $this->render('thematics/add');
    }

    public function edit($thematicSlug){
        $tables = getEvaluationTablesNames();
        $thematicID = (int) getIDBySlug($tables->thematics, $thematicSlug);
        redirect_if_id_is_not_valid($thematicID, $tables->thematics, 'thematics');
        $this->data['pageTitle']="Modifier une thématique d'évaluation";
        setThematicFormValidation(true, $thematicID);
        $this->data['thematic']=getTableByID($tables->thematics, $thematicID);
        $this->render('thematics/edit');
    }

    public function is_unique_on_update($field_value, $args)
    {
        return control_unique_on_update($field_value, $args);
    }
}