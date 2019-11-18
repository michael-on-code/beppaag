<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 16/11/2019
 * Time: 08:55
 */

class Admin_sectors extends Pro_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('evaluation');
        $this->load->model('evaluation_model');
    }

    public function index(){
        $tables = getEvaluationTablesNames();
        $this->data['pageTitle']="Liste des secteurs d'évaluations";
        //$dataTable
        includeDatatablesAssets();
        $this->data['sectors']=getAllInTable($tables->sectors, false);
//        var_dump($this->data['sectors']);exit;
        $this->render('sectors/index');
    }

    public function add(){
        $this->data['pageTitle']="Ajouter un secteur d'évaluation";
        setSectorFormValidation();
        $this->render('sectors/add');
    }

    public function edit($sectorSlug){
        $tables = getEvaluationTablesNames();
        $sectorID = (int) getIDBySlug($tables->sectors, $sectorSlug);
        redirect_if_id_is_not_valid($sectorID, $tables->sectors, 'sectors');
        $this->data['pageTitle']="Modifier un secteur d'évaluation";
        setSectorFormValidation(true, $sectorID);
        $this->data['sector']=getTableByID($tables->sectors, $sectorID);
        $this->render('sectors/edit');
    }

    public function is_unique_on_update($field_value, $args)
    {
        return control_unique_on_update($field_value, $args);
    }
}