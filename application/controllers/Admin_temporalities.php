<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 16/11/2019
 * Time: 08:55
 */

class Admin_temporalities extends Pro_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('evaluation');
        $this->load->model('evaluation_model');
    }

    public function index(){
        $tables = getEvaluationTablesNames();
        $this->data['pageTitle']="Liste des temporalités d'évaluations";
        //$dataTable
        includeDatatablesAssets();
        $this->data['temporalities']=getAllInTable($tables->temporalities, false);
//        var_dump($this->data['temporalities']);exit;
        $this->render('temporalities/index');
    }

    public function add(){
        $this->data['pageTitle']="Ajouter une temporalité d'évaluation";
        setTemporalityFormValidation();
        $this->render('temporalities/add');
    }

    public function edit($temporalitieslug){
        $tables = getEvaluationTablesNames();
        $temporalityID = (int) getIDBySlug($tables->temporalities, $temporalitieslug);
        redirect_if_id_is_not_valid($temporalityID, $tables->temporalities, 'temporalities');
        $this->data['pageTitle']="Modifier une temporalité d'évaluation";
        setTemporalityFormValidation(true, $temporalityID);
        $this->data['temporality']=getTableByID($tables->temporalities, $temporalityID);
        $this->render('temporalities/edit');
    }

    public function is_unique_on_update($field_value, $args)
    {
        return control_unique_on_update($field_value, $args);
    }
}