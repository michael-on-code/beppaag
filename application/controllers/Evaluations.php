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
        $this->load->helper('evaluation');
        $this->_tables = getEvaluationTablesNames();
        $choose= 'Choisir ...';
        $this->data['sectors']=getAllInTable($this->_tables->sectors, true, true, 'id', 'DESC', true, 'slug', 'name', true,'slug, name', $choose);
        $this->data['thematics']=getAllInTable($this->_tables->thematics, true, true, 'id', 'DESC', true, 'slug', 'name', true,'slug, name',$choose);
        $this->data['temporalities']=getAllInTable($this->_tables->temporalities, true, true, 'id', 'DESC', true, 'slug', 'name', true,'slug, name',$choose);
        $this->data['years']=$this->evaluation_model->getDistinctYears(true, $choose);
    }

    public function year($year){
        $year=(int)$year;
        $this->load->helper('form');
        $choose= 'Choisir ...';
        $this->data['pageTitle']= "Année d'évaluation : ".$year;
        $page = (int)$this->input->get('page');
        $limit = 8;
        $this->data['evaluations'] = $this->evaluation_model->getAll(true, true, true, false, true, 'id', 'desc', false, $year);
        $countResult=count($this->data['evaluations']);
        $this->data['totalCount']=$this->evaluation_model->getAll(true, true, true, false, '', '', '', true, $year);
        $this->data['countStart']=($start=$page*$limit)+1;
        $this->data['currentOffset']=$page+1;
        $this->data['countEnd']=$start+$countResult;
        $this->data['countResult']=$countResult;
        $this->data['contractingAuthorities']=getAllInTable($this->_tables->contracting_authorities, true, true, 'id', 'DESC', true, 'slug', 'name', true,'slug, name',$choose);
        includeEvaluationColirLibAssets();
        $this->render('evaluations/index');
    }

    public function temporality($temporalitySlug){
        $temporalityID = (int) getIDBySlug($this->_tables->temporalities, $temporalitySlug);
        redirect_if_id_is_not_valid($temporalityID, $this->_tables->temporalities, 'evaluations', false, false);
        $this->load->helper('form');
        $choose= 'Choisir ...';
        $temporality = getTableByID($this->_tables->temporalities, $temporalityID);
        $this->data['pageTitle']= "Temporalité d'évaluation : ".maybe_null_or_empty($temporality, 'name');
        $page = (int)$this->input->get('page');
        $limit = 8;
        $this->data['evaluations'] = $this->evaluation_model->getAll(true, true, true, false, true, 'id', 'desc', false, '', $temporalityID);
        $countResult=count($this->data['evaluations']);
        $this->data['totalCount']=$this->evaluation_model->getAll(true, true, true, false, '', '', '', true, $temporalityID);
        $this->data['countStart']=($start=$page*$limit)+1;
        $this->data['currentOffset']=$page+1;
        $this->data['countEnd']=$start+$countResult;
        $this->data['countResult']=$countResult;
        $this->data['contractingAuthorities']=getAllInTable($this->_tables->contracting_authorities, true, true, 'id', 'DESC', true, 'slug', 'name', true,'slug, name',$choose);
        includeEvaluationColirLibAssets();
        $this->render('evaluations/index');
    }
    
    public function thematic($thematicSlug){
        $thematicID = (int) getIDBySlug($this->_tables->thematics, $thematicSlug);
        redirect_if_id_is_not_valid($thematicID, $this->_tables->thematics, 'evaluations', false, false);
        $choose= 'Choisir ...';
        $allthematics = getAllInTable($this->_tables->thematic_group, true, false, '', '',false, '', '', '', '', '', ['thematic_id'=>$thematicID]);
        $thematic = getTableByID($this->_tables->thematics, $thematicID);
        //var_dump($thematic);exit;
        $postIDs=[];
        $this->data['evaluations']=[];
        $this->data['totalCount']=0;
        if(!empty($allthematics)){
            foreach ($allthematics as $mythematic){
                $postIDs[]= (int) $mythematic['evaluation_id'];
            }
            $this->data['evaluations'] = $this->evaluation_model->getAll(true, true, true, false, true, 'id', 'desc', false, '', '', $postIDs);
            //var_dump($postIDs);exit;
            $this->data['totalCount']=$this->evaluation_model->getAll(true, true, true, false, '', '', '', true, '', '', $postIDs);
        }
        $this->data['pageTitle']= "Thématique d'évaluation : ".maybe_null_or_empty($thematic, 'name');
        $page = (int)$this->input->get('page');
        $limit = 8;
        $countResult=count($this->data['evaluations']);
        $this->data['countStart']=($start=$page*$limit)+1;
        $this->data['currentOffset']=$page+1;
        $this->data['countEnd']=$start+$countResult;
        $this->data['countResult']=$countResult;
        $this->data['contractingAuthorities']=getAllInTable($this->_tables->contracting_authorities, true, true, 'id', 'DESC', true, 'slug', 'name', true,'slug, name',$choose);
        includeEvaluationColirLibAssets();
        $this->render('evaluations/index');
    }

    public function sector($sectorSlug){
        $sectorID = (int) getIDBySlug($this->_tables->sectors, $sectorSlug);
        redirect_if_id_is_not_valid($sectorID, $this->_tables->sectors, 'evaluations', false, false);
        $choose= 'Choisir ...';
        $allSectors = getAllInTable($this->_tables->sector_group, true, false, '', '',false, '', '', '', '', '', ['sector_id'=>$sectorID]);
        $sector = getTableByID($this->_tables->sectors, $sectorID);
        //var_dump($sector);exit;
        $postIDs=[];
        $this->data['evaluations']=[];
        $this->data['totalCount']=0;
        if(!empty($allSectors)){
            foreach ($allSectors as $mySector){
                $postIDs[]= (int) $mySector['evaluation_id'];
            }
            $this->data['evaluations'] = $this->evaluation_model->getAll(true, true, true, false, true, 'id', 'desc', false, '', '', $postIDs);
            //var_dump($postIDs);exit;
            $this->data['totalCount']=$this->evaluation_model->getAll(true, true, true, false, '', '', '', true, '', '', $postIDs);
        }
        $this->data['pageTitle']= "Secteur d'évaluation : ".maybe_null_or_empty($sector, 'name');
        $page = (int)$this->input->get('page');
        $limit = 8;
        $countResult=count($this->data['evaluations']);
        $this->data['countStart']=($start=$page*$limit)+1;
        $this->data['currentOffset']=$page+1;
        $this->data['countEnd']=$start+$countResult;
        $this->data['countResult']=$countResult;
        $this->data['contractingAuthorities']=getAllInTable($this->_tables->contracting_authorities, true, true, 'id', 'DESC', true, 'slug', 'name', true,'slug, name',$choose);
        includeEvaluationColirLibAssets();
        $this->render('evaluations/index');
    }

    public function index($slug=""){
        if(trim($slug)==''){
            $this->load->helper('form');
            $choose= 'Choisir ...';
            $this->data['pageTitle']= 'Liste des Evaluations';
            $page = (int)$this->input->get('page');
            $limit = 8;
            $this->data['evaluations'] = $this->evaluation_model->getAll(true, true, true, false);
            $countResult=count($this->data['evaluations']);
            $this->data['totalCount']=$this->evaluation_model->getAll(true, true, true, false, '', '', '', true);
            $this->data['countStart']=($start=$page*$limit)+1;
            $this->data['currentOffset']=$page+1;
            $this->data['countEnd']=$start+$countResult;
            $this->data['countResult']=$countResult;
            $this->data['contractingAuthorities']=getAllInTable($this->_tables->contracting_authorities, true, true, 'id', 'DESC', true, 'slug', 'name', true,'slug, name',$choose);
            includeEvaluationColirLibAssets();
            $this->render('evaluations/index');
        }else{
            $evaluationID = (int) getIDBySlug($this->_tables->evaluations, $slug);
            redirect_if_id_is_not_valid($evaluationID, $this->_tables->evaluations, 'evaluations', false, false);
            $this->data['evaluation']=$this->evaluation_model->getByID($evaluationID, true);
            $this->data['sidebarClass']='col-md-3';
            $this->data['pageTitle']= $this->data['evaluation']['title'];
            //var_dump($this->data['evaluation']['recommendations'][0]);exit;
            $this->render('evaluations/single');
        }
        
    }
}