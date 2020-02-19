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
		$this->_choose= 'Choisir ...';
        $this->_limit = 12;
        $this->data['sectors']=getAllInTable($this->_tables->sectors, true, true, 'id', 'DESC', true, 'id', 'name', true,'id, name', $this->_choose);
        $this->data['thematics']=getAllInTable($this->_tables->thematics, true, true, 'id', 'DESC', true, 'id', 'name', true,'id, name',$this->_choose);
        $this->data['temporalities']=getAllInTable($this->_tables->temporalities, true, true, 'id', 'DESC', true, 'id', 'name', true,'id, name',$this->_choose);
        $this->data['years']=$this->evaluation_model->getDistinctYears(true, $this->_choose);
    }

    public function year($year){
        $year=abs((int)$year);
        $this->load->helper('form');
        $this->_choose= 'Choisir ...';
        $this->data['pageTitle']= "Année d'évaluation : ".$year;
        $page =  abs((int)$this->input->get('page'));
        $limit = $this->_limit;
        $offset = $limit * $page;
		$this->data['previousOffset']=$page-1;
        $this->data['evaluations'] = $this->evaluation_model->getAll(true, true, true, false, true, 'id', 'desc', false, $year, '', [], false, $limit, $offset);
        $countResult=count($this->data['evaluations']);
        $this->data['totalCount']=$this->evaluation_model->getAll(true, true, true, false, '', '', '', true, $year);
        $this->data['countStart']=($start=$page*$limit)+1;
        $this->data['currentOffset']=$page+1;

        $this->data['countEnd']=$start+$countResult;
        $this->data['countResult']=$countResult;
        $this->data['contractingAuthorities']=getAllInTable($this->_tables->contracting_authorities, true, true, 'id', 'DESC', true, 'id', 'name', true,'id, name',$this->_choose);
        includeEvaluationColirLibAssets();
        $this->render('evaluations/index');
    }

    public function temporality($temporalityID){
		$temporalityID = abs((int)$temporalityID);
        //$temporalityID = (int) getIDBySlug($this->_tables->temporalities, $temporalitySlug);
        redirect_if_id_is_not_valid($temporalityID, $this->_tables->temporalities, 'evaluations', false, false);
        $this->load->helper('form');
        $this->_choose= 'Choisir ...';
        $temporality = getTableByID($this->_tables->temporalities, $temporalityID);
        $this->data['pageTitle']= "Temporalité d'évaluation : ".maybe_null_or_empty($temporality, 'name');
		$page =  abs((int)$this->input->get('page'));
		$limit = $this->_limit;
		$offset = $limit * $page;
		$this->data['previousOffset']=$page-1;
        $this->data['evaluations'] = $this->evaluation_model->getAll(true, true, true, false, true, 'id', 'desc', false, '', $temporalityID, [], false, $limit, $offset);
        $countResult=count($this->data['evaluations']);
        $this->data['totalCount']=$this->evaluation_model->getAll(true, true, true, false, '', '', '', true, '',$temporalityID);
        $this->data['countStart']=($start=$page*$limit)+1;
        $this->data['currentOffset']=$page+1;
        $this->data['countEnd']=$start+$countResult;
        $this->data['countResult']=$countResult;
        $this->data['contractingAuthorities']=getAllInTable($this->_tables->contracting_authorities, true, true, 'id', 'DESC', true, 'id', 'name', true,'id, name',$this->_choose);
        includeEvaluationColirLibAssets();
        $this->render('evaluations/index');
    }

    public function thematic($thematicID){
		$thematicID = abs((int)$thematicID);
        //$thematicID = (int) getIDBySlug($this->_tables->thematics, $thematicSlug);
        redirect_if_id_is_not_valid($thematicID, $this->_tables->thematics, 'evaluations', false, false);
        $this->_choose= 'Choisir ...';
        $allthematics = getAllInTable($this->_tables->thematic_group, true, false, '', '',false, '', '', '', '', '', ['thematic_id'=>$thematicID]);
        $thematic = getTableByID($this->_tables->thematics, $thematicID);
        //var_dump($thematic);exit;
        $postIDs=[];
        $this->data['evaluations']=[];
        $this->data['totalCount']=0;
		$page =  abs((int)$this->input->get('page'));
		$limit = $this->_limit;
		$offset = $limit * $page;
		$this->data['previousOffset']=$page-1;
        if(!empty($allthematics)){
            foreach ($allthematics as $mythematic){
                $postIDs[]= (int) $mythematic['evaluation_id'];
            }
            $this->data['evaluations'] = $this->evaluation_model->getAll(true, true, true, false, true, 'id', 'desc', false, '', '', $postIDs, false, $limit, $offset);
            //var_dump($postIDs);exit;
            $this->data['totalCount']=$this->evaluation_model->getAll(true, true, true, false, '', '', '', true, '', '', $postIDs);
        }
        $this->data['pageTitle']= "Thématique d'évaluation : ".maybe_null_or_empty($thematic, 'name');
        $countResult=count($this->data['evaluations']);
        $this->data['countStart']=($start=$page*$limit)+1;
        $this->data['currentOffset']=$page+1;
        $this->data['countEnd']=$start+$countResult;
        $this->data['countResult']=$countResult;
        $this->data['contractingAuthorities']=getAllInTable($this->_tables->contracting_authorities, true, true, 'id', 'DESC', true, 'id', 'name', true,'id, name',$this->_choose);
        includeEvaluationColirLibAssets();
        $this->render('evaluations/index');
    }

    public function sector($sectorID){
		$sectorID = abs((int)$sectorID);
        //$sectorID = (int) getIDBySlug($this->_tables->sectors, $sectorSlug);
        redirect_if_id_is_not_valid($sectorID, $this->_tables->sectors, 'evaluations', false, false);
        $this->_choose= 'Choisir ...';
        $allSectors = getAllInTable($this->_tables->sector_group, true, false, '', '',false, '', '', '', '', '', ['sector_id'=>$sectorID]);
        $sector = getTableByID($this->_tables->sectors, $sectorID);
        //var_dump($sector);exit;
        $postIDs=[];
        $this->data['evaluations']=[];
        $this->data['totalCount']=0;
		$page =  abs((int)$this->input->get('page'));
		$limit = $this->_limit;
		$offset = $limit * $page;
		$this->data['previousOffset']=$page-1;
        if(!empty($allSectors)){
            foreach ($allSectors as $mySector){
                $postIDs[]= (int) $mySector['evaluation_id'];
            }
			$this->data['evaluations'] = $this->evaluation_model->getAll(true, true, true, false, true, 'id', 'desc', false, '', '', $postIDs, false, $limit, $offset);
            //var_dump($postIDs);exit;
            $this->data['totalCount']=$this->evaluation_model->getAll(true, true, true, false, '', '', '', true, '', '', $postIDs);
        }
        $this->data['pageTitle']= "Secteur d'évaluation : ".maybe_null_or_empty($sector, 'name');
        $countResult=count($this->data['evaluations']);
        $this->data['countStart']=($start=$page*$limit)+1;
        $this->data['currentOffset']=$page+1;
        $this->data['countEnd']=$start+$countResult;
        $this->data['countResult']=$countResult;
        $this->data['contractingAuthorities']=getAllInTable($this->_tables->contracting_authorities, true, true, 'id', 'DESC', true, 'id', 'name', true,'id, name',$this->_choose);
        includeEvaluationColirLibAssets();
        $this->render('evaluations/index');
    }

    public function index($evaluationID=""){
		if($this->input->get('search')){
			//search
			$this->data['pageTitle']='Recherche avancée';
			$searchParams = $this->input->get('search');
			$queryData['evaluation_ids']=[];
			$queryData['year']=null;
			$queryData['temporality_id']=null;
			$queryData['sector_id']=null;
			$queryData['thematic_id']=null;
			$queryData['contracting_authority_id']=null;
			//years
			$year = abs((int) maybe_null_or_empty($searchParams, 'year', true));
			$sectorID = abs((int) maybe_null_or_empty($searchParams, 'sector_id', true));
			$thematicID = abs((int) maybe_null_or_empty($searchParams, 'thematic_id', true));
			$temporalityID = abs((int) maybe_null_or_empty($searchParams, 'temporality_id', true));
			$contractingAuthorityID = abs((int) maybe_null_or_empty($searchParams, 'contracting_authority_id', true));
			$keyword = trim(maybe_null_or_empty($searchParams, 'keyword', true));
			if($year){
				$queryData['year']=$year;
			}
			if($sectorID){
				$allSectors = getAllInTable($this->_tables->sector_group, true, false, '', '',false, '', '', '', '', '', ['sector_id'=>$sectorID]);
				if(!empty($allSectors)){
					foreach ($allSectors as $mySector){
						if(!in_array((int) $mySector['evaluation_id'], $queryData['evaluation_ids'])){
							$queryData['evaluation_ids'][]=(int) $mySector['evaluation_id'];
						}
					}
				}
			}
			if($thematicID){
				$allthematics = getAllInTable($this->_tables->thematic_group, true, false, '', '',false, '', '', '', '', '', ['thematic_id'=>$thematicID]);
				if(!empty($allthematics)){
					foreach ($allthematics as $mythematic){
						if(!in_array((int) $mythematic['evaluation_id'], $queryData['evaluation_ids'])){
							$queryData['evaluation_ids'][]= (int) $mythematic['evaluation_id'];
						}

					}
				}
			}
			if($temporalityID){
				$queryData['temporality_id']=$temporalityID;
			}
			if($contractingAuthorityID){
				$queryData['contracting_authority_id']=$contractingAuthorityID;
			}
			if($keyword && $keyword!=''){
				$resultsFromKeyword = $this->evaluation_model->getEvaluationIDsByKeyword($keyword);
				if(!empty($resultsFromKeyword)){
					foreach ($resultsFromKeyword as $result){
						if(!in_array( (int) $result->evaluation_id, $queryData['evaluation_ids'])){
							$queryData['evaluation_ids'][]= (int) $result->evaluation_id;
						}
					}
				}
			}
			//var_dump($queryData);exit;
			$page =  abs((int)$this->input->get('page'));
			$limit = $this->_limit;
			$offset = $limit * $page;
			$this->data['previousOffset']=$page-1;
			$this->data['totalCount']=$this->evaluation_model->getAll(true, true, true, true, true, 'id', 'desc', true, $queryData['year'], $queryData['temporality_id'], $queryData['evaluation_ids'], false, $limit, $offset, $queryData['contracting_authority_id']);
			$this->data['evaluations']=$this->evaluation_model->getAll(true, true, true, false, true, 'id', 'desc', false, $queryData['year'], $queryData['temporality_id'], $queryData['evaluation_ids'], false, $limit, $offset, $queryData['contracting_authority_id']);
			$countResult=count($this->data['evaluations']);
			$this->data['countStart']=($start=$page*$limit)+1;
			$this->data['currentOffset']=$page+1;
			$this->data['countEnd']=$start+$countResult;
			$this->data['countResult']=$countResult;
			$this->data['contractingAuthorities']=getAllInTable($this->_tables->contracting_authorities, true, true, 'id', 'DESC', true, 'id', 'name', true,'id, name',$this->_choose);
			includeEvaluationColirLibAssets();
			$this->render('evaluations/index');
		}
		else{
			if(trim($evaluationID)==''){
				$this->load->helper('form');
				$this->_choose= 'Choisir ...';
				$this->data['pageTitle']= 'Liste des Evaluations';
				$page = abs((int)$this->input->get('page'));
				$limit = $this->_limit;
				$offset = $limit * $page;
				$this->data['evaluations'] = $this->evaluation_model->getAll(true, true, true, false, true, 'id', 'desc', false, '', '', [], false, $limit, $offset);
				$countResult=count($this->data['evaluations']);
				$this->data['totalCount']=$this->evaluation_model->getAll(true, true, true, false, '', '', '', true);
				$this->data['countStart']=($start=$page*$limit)+1;
				$this->data['currentOffset']=$page+1;
				$this->data['previousOffset']=$page-1;
				$this->data['countEnd']=$start+$countResult;
				$this->data['countResult']=$countResult;
				$this->data['contractingAuthorities']=getAllInTable($this->_tables->contracting_authorities, true, true, 'id', 'DESC', true, 'id', 'name', true,'id, name',$this->_choose);
				includeEvaluationColirLibAssets();
				$this->render('evaluations/index');
			}else{
				//$evaluationID = (int) getIDBySlug($this->_tables->evaluations, $evaluationID);
				$evaluationID = abs((int)$evaluationID);
				redirect_if_id_is_not_valid($evaluationID, $this->_tables->evaluations, 'evaluations', false, false, ['active'=>1]);
				$this->data['evaluation']=$this->evaluation_model->getByID($evaluationID, true);
				$this->data['sidebarClass']='col-md-3';
				$this->data['pageTitle']= $this->data['evaluation']['title'];
				//            SEO
				$this->data['pageUrl']=getPermalink($this->data['evaluation']['id'], 'evaluations');
				$this->data['pageDefaultImageUrl']=getUploadedImageBySize($this->data['evaluation']['cover_photo'], '848x420');
				$this->data['pageDescription']=myWordLimiter(strip_tags($this->data['evaluation']['description']), 30);
				//var_dump($this->data['evaluation']['recommendations'][0]);exit;
				$this->render('evaluations/single');
			}
		}
        
    }
}
