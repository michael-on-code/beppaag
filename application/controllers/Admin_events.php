<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 22/11/2019
 * Time: 04:38
 */
class Admin_events extends Pro_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('event');
        $this->load->model('event_model');
        $this->data['clientData']['ajaxifyUrl']=pro_url('ajaxify/');
    }

    public function index(){
        $this->data['pageTitle']="Liste des evenements";
        $this->data['isEditor']=user_can('editor');
        $this->data['events']=$this->event_model->getAll(true, true, false);
        $this->data['tableHeaders']=[
            'Image'/*Picture*/, "Titre de l'evenement", 'Lieu', "Catégorie",
            "Etiquette", "Statut",'Date de debut','Date de fin', "Ajouté le", "Ajouté par",
        ];
        $numberColumns = count($this->data['tableHeaders']);
        $this->data['invisiblesColumns']=[];
        for($i=6; $i<$numberColumns; $i++){
            $this->data['invisiblesColumns'][]=$i;
        }
        $this->data['visiblesColumns']=[
            0,1,2,3,4,5
        ];
        $unOrderableColumns=[];
        for($i=0; $i<=$numberColumns; $i++){//<= because of action column
            if($i==5 || $i==6 || $i==7|| $i==8){
                continue;
            }
            $unOrderableColumns[]=$i;
        }
        $this->data['clientData']['invisiblesColumns']=$this->data['invisiblesColumns'];
        $this->data['clientData']['allColumns']=array_keys($this->data['tableHeaders']);
        $this->data['clientData']['unOrderableColumns']=$unOrderableColumns;
        includeDatatablesAssets();
        includeSelect2Assets();
        includeSweetAlertAssets();
        includeFancyBoxAssets();
        //var_dump($this->data['events']);exit;
        $this->render('events/index');
    }

    public function delete($slug){
        $tables = getEventTablesNames();
        $eventID = (int) getIDBySlug($tables->events, $slug);
        redirect_if_id_is_not_valid($eventID, $tables->events, 'events');
        $this->event_model->trash($eventID);
        get_success_message("Evenement déplacé à la corbeille avec succès");
        pro_redirect('events');
    }

    public function activate($slug){
        $tables = getEventTablesNames();
        $eventID = (int) getIDBySlug($tables->events, $slug);
        redirect_if_id_is_not_valid($eventID, $tables->events, 'events');
        $this->event_model->activate($eventID);
        get_success_message("Evenement activé et publié avec succès");
        pro_redirect('events');
    }



    public function trash(){
        $this->data['pageTitle']="Evenements déplacés à la corbeille";
        $this->data['isEditor']=user_can('editor');
        $this->data['events']=$this->event_model->getAll(false, true, false, true, 'id', 'desc', true);
        $this->data['tableHeaders']=[
            'Image'/*Picture*/, "Titre de l'evenement", 'Lieu', "Catégorie",
            "Etiquette", "Statut",'Date de debut','Date de fin', "Ajouté le", "Ajouté par",
        ];
        $numberColumns = count($this->data['tableHeaders']);
        $this->data['invisiblesColumns']=[];
        for($i=6; $i<$numberColumns; $i++){
            $this->data['invisiblesColumns'][]=$i;
        }
        $this->data['visiblesColumns']=[
            0,1,2,3,4,5
        ];
        $unOrderableColumns=[];
        for($i=0; $i<=$numberColumns; $i++){//<= because of action column
            if($i==5 || $i==6 || $i==7|| $i==8){
                continue;
            }
            $unOrderableColumns[]=$i;
        }
        $this->data['clientData']['invisiblesColumns']=$this->data['invisiblesColumns'];
        $this->data['clientData']['allColumns']=array_keys($this->data['tableHeaders']);
        $this->data['clientData']['unOrderableColumns']=$unOrderableColumns;
        includeDatatablesAssets();
        includeSelect2Assets();
        includeSweetAlertAssets();
        includeFancyBoxAssets();
        //var_dump($this->data['events']);exit;
        $this->render('events/trash');
    }

    public function add(){
        setEventValidation(false);
        $tables = getEventTablesNames();
        $this->data['pageTitle']="Ajouter un evenement";
        $this->data['categories']=getAllInTable($tables->categories, true, true, 'id', 'DESC', true);
        $this->data['tags']=getAllInTable($tables->tags, true, false, '', '', true,'id', 'name', false);
        $this->data['categoryAjaxForm']=getAjaxifyEventCategoryForm();
        $this->data['tagAjaxForm']=getAjaxifyEventTagForm();
        includeSummernoteAssets();
        includeSelect2Assets();
        includeDropifyAssets();
        includeDatePickerAssets();
        $this->render('events/add');
    }
    public function edit($slug=''){
        $tables = getEventTablesNames();
        $eventID = (int) getIDBySlug($tables->events, $slug);
        redirect_if_id_is_not_valid($eventID, $tables->events, 'events');
        setEventValidation(true, $eventID);
        $this->data['pageTitle']="Modifier un evenement";
        $this->data['categories']=getAllInTable($tables->categories, true, true, 'id', 'DESC', true);
        $this->data['tags']=getAllInTable($tables->tags, true, false, '', '', true,'id', 'name', false);
        $this->data['categoryAjaxForm']=getAjaxifyEventCategoryForm();
        $this->data['tagAjaxForm']=getAjaxifyEventTagForm();
        $this->data['event']=$this->event_model->getByID($eventID);
        includeSummernoteAssets();
        includeSelect2Assets();
        includeDropifyAssets();
        includeDatePickerAssets();
        $this->render('events/edit');
    }

    public function categories($action='', $slug=''){
        $tables = getEventTablesNames();
        switch ($action){
            case 'add':
                $this->data['pageTitle']="Ajouter catégorie d'evenement";
                setEventCategoryValidation(false);
                $this->render('events/categories/add');
                break;
            case 'edit':
                $categoryID = (int) getIDBySlug($tables->categories, $slug);
                redirect_if_id_is_not_valid($categoryID, $tables->categories, 'events/categories');
                setEventCategoryValidation(true, $categoryID);
                $this->data['pageTitle']="Modifier catégorie d'evenement";
                $this->data['category'] = getTableByID($tables->categories, $categoryID);
                $this->render('events/categories/edit');
                break;
            default:
                $this->data['pageTitle']="Liste des catégorie d'evenements";
                $this->data['categories']=getAllInTable($tables->categories, false);
                includeDatatablesAssets();
                $this->render('events/categories/index');
                break;
        }

    }

    public function tags($action='', $slug=''){
        $tables = getEventTablesNames();
        switch ($action){
            case 'add':
                $this->data['pageTitle']="Ajouter étiquette d'evenement";
                setEventTagValidation(false);
                $this->render('events/tags/add');
                break;
            case 'edit':
                $tagID = (int) getIDBySlug($tables->tags, $slug);
                redirect_if_id_is_not_valid($tagID, $tables->tags, 'events/tags');
                setEventTagValidation(true, $tagID);
                $this->data['pageTitle']="Modifier étiquette d'evenement";
                $this->data['tag'] = getTableByID($tables->tags, $tagID);
                $this->render('events/tags/edit');
                break;
            default:
                $this->data['pageTitle']="Liste des étiquettes d'evenements";
                $this->data['tags']=getAllInTable($tables->tags, false);
                includeDatatablesAssets();
                $this->render('events/tags/index');
                break;
        }

    }


    public function is_unique_on_update($field_value, $args)
    {
        return control_unique_on_update($field_value, $args);
    }



}