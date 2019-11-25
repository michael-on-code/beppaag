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
        $this->load->model('evaluation_model');
        $this->data['clientData']['ajaxifyUrl']=pro_url('ajaxify/');
    }

    public function index(){
        $this->data['pageTitle']='Evaluations';
        $this->data['isEditor']=user_can('editor');
        $this->data['evaluations']=$this->evaluation_model->getAll(false, true, true, false);
        //var_dump($this->data['evaluations']);exit;
        $this->data['tableHeaders']=[
            'Cover'/*Picture*/,'Année', "Titre de l'évaluation", "Objet de l'évaluation",
            "Secteur de l'évaluation", "Thématique de l'évaluation", "Appréciation", "Statut",
            "Type de l'évaluation", "Temporalité", "Structure ayant conduit l'évaluation",
            "Authorité contractante de l'évaluation" ,"Ajoutée le", "Ajoutée par",
        ];
        $numberColumns = count($this->data['tableHeaders']);
        for($i=8; $i<$numberColumns; $i++){
            $this->data['invisiblesColumns'][]=$i;
        }
        $this->data['visiblesColumns']=[
            0,1,2,3,4,5,6,7
        ];
        $unOrderableColumns=[];
        for($i=0; $i<=$numberColumns; $i++){//<= because of action column
            if($i==1 || $i==12 || $i==7|| $i==6){
                continue;
            }
            $unOrderableColumns[]=$i;
        }
        //var_dump($unOrderableColumns);exit;
        $this->data['clientData']['invisiblesColumns']=$this->data['invisiblesColumns'];
        $this->data['clientData']['allColumns']=array_keys($this->data['tableHeaders']);
        $this->data['clientData']['evaluations']=$this->data['evaluations'];
        $this->data['clientData']['unOrderableColumns']=$unOrderableColumns;
        includeDatatablesAssets();
        includeSelect2Assets();
        includeSweetAlertAssets();
        includeFancyBoxAssets();
        //var_dump($this->data['evaluations']);exit;
        $this->render('evaluations/index');
    }

    public function add(){
        setEvaluationFormValidation();
        $this->data['pageTitle']='Ajouter Evaluation';
        includeDropifyAssets();
        //DatePicker
        includeDatePickerAssets();
        //SummerNote Text Editor
        includeSummernoteAssets();
        //select2
        includeSelect2Assets();
        includeJQueryRepeaterAssets();
        includeCleaveNumberFormatterAssets();
        $tables = getEvaluationTablesNames();
        $this->data['sectors']=getAllInTable($tables->sectors, true, true, 'id', 'DESC', true, 'id', 'name',false);
        $users=$this->user_model->getUsers(false, true, 'desc', 'users.id, users.email, users.first_name, users.last_name');
        $this->data['users']=[''=>''];
        if(!empty($users)){
            foreach ($users as $user){
                $this->data['users'][maybe_null_or_empty($user, 'id')] = maybe_null_or_empty($user, 'first_name').' '.maybe_null_or_empty($user, 'last_name').' ('.maybe_null_or_empty($user, 'email').')';
            }
        }
        $this->data['types']=getAllInTable($tables->types, true, true, 'id', 'DESC', true, 'id', 'name');
        $this->data['temporalities']=getAllInTable($tables->temporalities, true, true, 'id', 'DESC', true, 'id', 'name');
        $this->data['thematics']=getAllInTable($tables->thematics, true, true, 'id', 'DESC', true, 'id', 'name', false);
        $this->data['leading_authorities']=getAllInTable($tables->leading_authorities, true, true, 'id', 'DESC', true, 'id', 'name');
        $this->data['contracting_authorities']=getAllInTable($tables->contracting_authorities, true, true, 'id', 'DESC', true, 'id', 'name');
        $this->data['sectorAjaxForm']=getAjaxifySectorForm();
        $this->data['thematicAjaxForm']=getAjaxifyThematicForm();
        $this->data['typeAjaxForm']=getAjaxifyTypeForm();
        $this->data['temporalityAjaxForm']=getAjaxifyTemporalityForm();
        $this->data['contractingAuthorityAjaxForm']=getAjaxifyContractingAuthorityForm();
        $this->data['leadingAuthorityAjaxForm']=getAjaxifyLeadingAuthorityForm();
        $this->render('evaluations/add');
    }

    public function edit($evaluationSlug){
        $tables = getEvaluationTablesNames();
        $evaluationID = (int) getIDBySlug($tables->evaluations, $evaluationSlug);
        redirect_if_id_is_not_valid($evaluationID, $tables->evaluations, 'evaluations');
        $this->data['pageTitle']="Modifier une évaluation";
        setEvaluationFormValidation(true, $evaluationID);
        includeDropifyAssets();
        //DatePicker
        includeDatePickerAssets();
        //SummerNote Text Editor
        includeSummernoteAssets();
        includeJQueryRepeaterAssets();
        includeCleaveNumberFormatterAssets();
        //select2
        includeSelect2Assets();
        $this->data['sectors']=getAllInTable($tables->sectors, true, true, 'id', 'DESC', true, 'id', 'name',false);
        $users=$this->user_model->getUsers(false, true, 'desc', 'users.id, users.email, users.first_name, users.last_name');
        $this->data['users']=[''=>''];
        if(!empty($users)){
            foreach ($users as $user){
                $this->data['users'][maybe_null_or_empty($user, 'id')] = maybe_null_or_empty($user, 'first_name').' '.maybe_null_or_empty($user, 'last_name').' ('.maybe_null_or_empty($user, 'email').')';
            }
        }
        $this->data['types']=getAllInTable($tables->types, true, true, 'id', 'DESC', true, 'id', 'name');
        $this->data['temporalities']=getAllInTable($tables->temporalities, true, true, 'id', 'DESC', true, 'id', 'name');
        $this->data['thematics']=getAllInTable($tables->thematics, true, true, 'id', 'DESC', true, 'id', 'name', false);
        $this->data['leading_authorities']=getAllInTable($tables->leading_authorities, true, true, 'id', 'DESC', true, 'id', 'name');
        $this->data['contracting_authorities']=getAllInTable($tables->contracting_authorities, true, true, 'id', 'DESC', true, 'id', 'name');
//        $this->data['recommendations']= maybe_null_or_empty($evaluation, 'recommendations');
//        $this->data['questions']= maybe_null_or_empty($evaluation, 'questions');
//        unset($evaluation['questions'], $evaluation['recommendations']);
        $this->data['evaluation']=$this->evaluation_model->getByID($evaluationID);
        //var_dump($this->data['evaluation']);exit;
        $this->data['sectorAjaxForm']=getAjaxifySectorForm();
        $this->data['thematicAjaxForm']=getAjaxifyThematicForm();
        $this->data['typeAjaxForm']=getAjaxifyTypeForm();
        $this->data['temporalityAjaxForm']=getAjaxifyTemporalityForm();
        $this->data['contractingAuthorityAjaxForm']=getAjaxifyContractingAuthorityForm();
        $this->data['leadingAuthorityAjaxForm']=getAjaxifyLeadingAuthorityForm();

        $this->render('evaluations/edit');
    }



}