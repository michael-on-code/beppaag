<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 16/11/2019
 * Time: 08:55
 */

class Admin_leading_authorities extends Pro_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('evaluation');
        $this->load->model('evaluation_model');
    }

    public function index(){
        $tables = getEvaluationTablesNames();
        $this->data['pageTitle']="Liste des structures/personnes ayant conduit d'évaluations";
        //$dataTable
        includeDatatablesAssets();
        $this->data['leadingAuthorities']=getAllInTable($tables->leading_authorities, false);
//        var_dump($this->data['leading_authorities']);exit;
        $this->render('leading_authorities/index');
    }

    public function add(){
        $this->data['pageTitle']="Ajouter une structure/personne ayant conduit d'évaluation";
        setLeadingAuthorityFormValidation();
        $this->render('leading_authorities/add');
    }

    public function edit($leadingAuthoritySlug){
        $tables = getEvaluationTablesNames();
        $leadingAuthorityID = (int) getIDBySlug($tables->leading_authorities, $leadingAuthoritySlug);
        redirect_if_id_is_not_valid($leadingAuthorityID, $tables->leading_authorities, 'leading-authorities');
        $this->data['pageTitle']="Modifier une structure/personne ayant conduit d'évaluation";
        setLeadingAuthorityFormValidation(true, $leadingAuthorityID);
        $this->data['leadingAuthority']=getTableByID($tables->leading_authorities, $leadingAuthorityID);
        $this->render('leading_authorities/edit');
    }

    public function is_unique_on_update($field_value, $args)
    {
        return control_unique_on_update($field_value, $args);
    }
}