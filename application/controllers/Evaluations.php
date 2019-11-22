<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 04/11/2019
 * Time: 10:58
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class Evaluations extends Public_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('evaluation_model');
        $this->_tables = getEvaluationTablesNames();
        $choose= 'Choisir ...';
        $this->data['sectors']=getAllInTable($this->_tables->sectors, true, true, 'id', 'DESC', true, 'slug', 'name', true,'slug, name', $choose);
        $this->data['thematics']=getAllInTable($this->_tables->thematics, true, true, 'id', 'DESC', true, 'slug', 'name', true,'slug, name',$choose);
        $this->data['temporalities']=getAllInTable($this->_tables->temporalities, true, true, 'id', 'DESC', true, 'slug', 'name', true,'slug, name',$choose);
        $this->data['years']=$this->evaluation_model->getDistinctYears(true, $choose);
    }

    public function index($offset='1'){
        $page=abs((int) $offset);
        if($page>0){
            $page--;
        }
        $this->load->helper('form');
        $choose= 'Choisir ...';
        $this->data['pageTitle']= 'Liste des Evaluations';
        $evaluationData = $this->evaluation_model->getMinifiedAll('title, year, created_at, slug', true, $page);
        $this->data['evaluations']=$evaluationData['evaluations'];
        $this->data['totalCount']=$evaluationData['total'];
        $this->data['countStart']=$evaluationData['start'];
        $this->data['countEnd']=$evaluationData['end'];
        $this->data['countResult']=$evaluationData['countResult'];
        $this->data['currentOffset']=$evaluationData['currentOffset'];
        //var_dump($this->data['evaluations']);exit;
        $this->data['contractingAuthorities']=getAllInTable($this->_tables->contracting_authorities, true, true, 'id', 'DESC', true, 'slug', 'name', true,'slug, name',$choose);
        $this->data['footerJs'][]=$this->data['assetsUrl'].'public/lib/colorlib-search/js/extention/choices.js';
        $this->data['footerJs'][]=$this->data['assetsUrl'].'public/lib/colorlib-search/js/extention/flatpickr.js';
        $this->data['headerCss'][]=$this->data['assetsUrl'].'public/lib/colorlib-search/css/main.css';
        $this->render('evaluations/index');
    }
}