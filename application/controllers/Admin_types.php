<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 16/11/2019
 * Time: 08:55
 */

class Admin_types extends Pro_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('evaluation');
        $this->load->model('evaluation_model');
    }

    public function index(){
        $tables = getEvaluationTablesNames();
        $this->data['pageTitle']="Liste des types d'évaluations";
        //$dataTable
        includeDatatablesAssets();
        $this->data['types']=getAllInTable($tables->types, false);
//        var_dump($this->data['types']);exit;
        $this->render('types/index');
    }

    public function add(){
        $this->data['pageTitle']="Ajouter un type d'évaluation";
        setTypeFormValidation();
        $this->render('types/add');
    }

    public function edit($typeslug){
        $tables = getEvaluationTablesNames();
        $typeID = (int) getIDBySlug($tables->types, $typeslug);
        redirect_if_id_is_not_valid($typeID, $tables->types, 'types');
        $this->data['pageTitle']="Modifier un type d'évaluation";
        setTypeFormValidation(true, $typeID);
        $this->data['type']=getTableByID($tables->types, $typeID);
        $this->render('types/edit');
    }

    public function is_unique_on_update($field_value, $args)
    {
        return control_unique_on_update($field_value, $args);
    }
}