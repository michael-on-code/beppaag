<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 13/11/2019
 * Time: 10:02
 */

class Admin_evaluations extends Pro_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('evaluation');
    }

    public function index(){
        $this->data['pageTitle']='Evaluations';
        $this->render('evaluations/index');
    }

    public function add(){
        $this->data['pageTitle']='Ajouter Evaluation';
        includeDropifyAssets();

        //SummerNote Text Editor
        includeSummernoteAssets();
        //select2
        includeSelect2Assets();
        $tables = getEvaluationTablesNames();
        $this->data['sectors']=getAllInTable($tables->sectors, true, true, 'id', 'DESC', true, 'id', 'name',false);
        $this->data['types']=getAllInTable($tables->types, true, true, 'id', 'DESC', true, 'id', 'name');
        $this->data['temporalities']=getAllInTable($tables->temporalities, true, true, 'id', 'DESC', true, 'id', 'name');
        $this->data['thematics']=getAllInTable($tables->thematics, true, true, 'id', 'DESC', true, 'id', 'name', false);
        $this->data['leading_authorities']=getAllInTable($tables->leading_authorities, true, true, 'id', 'DESC', true, 'id', 'name');
        $this->data['contracting_authorities']=getAllInTable($tables->contracting_authorities, true, true, 'id', 'DESC', true, 'id', 'name');
        $this->render('evaluations/add');
    }

}