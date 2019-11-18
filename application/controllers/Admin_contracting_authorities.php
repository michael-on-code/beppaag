<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 16/11/2019
 * Time: 08:55
 */

class Admin_contracting_authorities extends Pro_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('evaluation');
        $this->load->model('evaluation_model');
    }

    public function index(){
        $tables = getEvaluationTablesNames();
        $this->data['pageTitle']="Liste des authorités contractantes d'évaluations";
        //$dataTable
        includeDatatablesAssets();
        $this->data['contractingAuthorities']=getAllInTable($tables->contracting_authorities, false);
//        var_dump($this->data['contracting_authorities']);exit;
        $this->render('contracting_authorities/index');
    }

    public function add(){
        $this->data['pageTitle']="Ajouter une authorité contractante d'évaluation";
        setcontractingAuthorityFormValidation();
        $this->render('contracting_authorities/add');
    }

    public function edit($contractingAuthoritySlug){
        $tables = getEvaluationTablesNames();
        $contractingAuthorityID = (int) getIDBySlug($tables->contracting_authorities, $contractingAuthoritySlug);
        redirect_if_id_is_not_valid($contractingAuthorityID, $tables->contracting_authorities, 'contracting-authorities');
        $this->data['pageTitle']="Modifier une authorité contractante d'évaluation";
        setcontractingAuthorityFormValidation(true, $contractingAuthorityID);
        $this->data['contractingAuthority']=getTableByID($tables->contracting_authorities, $contractingAuthorityID);
        $this->render('contracting_authorities/edit');
    }

    public function is_unique_on_update($field_value, $args)
    {
        return control_unique_on_update($field_value, $args);
    }
}