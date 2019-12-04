<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 22/11/2019
 * Time: 04:42
 */
class Admin_posts extends Pro_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('post');
        $this->load->model('post_model');
        $this->data['clientData']['ajaxifyUrl']=pro_url('ajaxify/');
    }

    public function index(){
        $this->data['pageTitle']="Liste des articles";
        $this->data['isEditor']=user_can('editor');
        $this->data['posts']=$this->post_model->getAll(true, true, false);
        $this->data['tableHeaders']=[
            'Image'/*Picture*/, "Titre de l'article", "Catégorie",
            "Etiquette", "Statut", "Ajouté le", "Ajouté par",
        ];
        $numberColumns = count($this->data['tableHeaders']);
        $this->data['invisiblesColumns']=[];
        /*for($i=8; $i<$numberColumns; $i++){
            $this->data['invisiblesColumns'][]=$i;
        }*/
        $this->data['visiblesColumns']=[
            0,1,2,3,4,5,6
        ];
        $unOrderableColumns=[];
        for($i=0; $i<=$numberColumns; $i++){//<= because of action column
            if($i==4 || $i==2 || $i==5){
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
        //var_dump($this->data['posts']);exit;
        $this->render('posts/index');
    }

    public function delete($postID){
        $tables = getPostTablesNames();
        //$postID = (int) getIDBySlug($tables->posts, $slug);
        redirect_if_id_is_not_valid($postID, $tables->posts, 'posts');
        $this->post_model->trash($postID);
        get_success_message("Article déplacé à la corbeille avec succès");
        pro_redirect('posts');
    }

    public function activate($postID){
        $tables = getPostTablesNames();
        //$postID = (int) getIDBySlug($tables->posts, $slug);
        redirect_if_id_is_not_valid($postID, $tables->posts, 'posts');
        $this->post_model->activate($postID);
        get_success_message("Article activé et publié avec succès");
        pro_redirect('posts');
    }



    public function trash(){
        $this->data['pageTitle']="Articles déplacés à la corbeille";
        $this->data['isEditor']=user_can('editor');
        $this->data['posts']=$this->post_model->getAll(false, true, false, true, 'id', 'desc', true);
        $this->data['tableHeaders']=[
            'Image'/*Picture*/, "Titre de l'article", "Catégorie",
            "Etiquette", "Statut", "Ajouté le", "Ajouté par",
        ];
        $numberColumns = count($this->data['tableHeaders']);
        $this->data['invisiblesColumns']=[];
        /*for($i=8; $i<$numberColumns; $i++){
            $this->data['invisiblesColumns'][]=$i;
        }*/
        $this->data['visiblesColumns']=[
            0,1,2,3,4,5,6
        ];
        $unOrderableColumns=[];
        for($i=0; $i<=$numberColumns; $i++){//<= because of action column
            if($i==4 || $i==2 || $i==5){
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
        //var_dump($this->data['posts']);exit;
        $this->render('posts/trash');
    }

    public function add(){
        setPostValidation(false);
        $tables = getPostTablesNames();
        $this->data['pageTitle']="Ajouter un article";
        $this->data['categories']=getAllInTable($tables->categories, true, true, 'id', 'DESC', true);
        $this->data['tags']=getAllInTable($tables->tags, true, false, '', '', true,'id', 'name', false);
        $this->data['categoryAjaxForm']=getAjaxifyPostCategoryForm();
        $this->data['tagAjaxForm']=getAjaxifyPostTagForm();
        includeSummernoteAssets();
        includeSelect2Assets();
        includeDropifyAssets();
        $this->render('posts/add');
    }

    public function edit($postID){
        $tables = getPostTablesNames();
        //$postID = (int) getIDBySlug($tables->posts, $slug);
        redirect_if_id_is_not_valid($postID, $tables->posts, 'posts');
        setPostValidation(true, $postID);
        $this->data['pageTitle']="Modifier un article";
        $this->data['categories']=getAllInTable($tables->categories, true, true, 'id', 'DESC', true);
        $this->data['tags']=getAllInTable($tables->tags, true, false, '', '', true,'id', 'name', false);
        $this->data['categoryAjaxForm']=getAjaxifyPostCategoryForm();
        $this->data['tagAjaxForm']=getAjaxifyPostTagForm();
        $this->data['post']=$this->post_model->getByID($postID);
        includeSummernoteAssets();
        includeSelect2Assets();
        includeDropifyAssets();
        $this->render('posts/edit');
    }

    public function categories($action='', $slug=''){
        $tables = getPostTablesNames();
        switch ($action){
            case 'add':
                $this->data['pageTitle']="Ajouter catégorie d'article";
                setPostCategoryValidation(false);
                $this->render('posts/categories/add');
                break;
            case 'edit':
                $categoryID = (int) getIDBySlug($tables->categories, $slug);
                redirect_if_id_is_not_valid($categoryID, $tables->categories, 'posts/categories');
                setPostCategoryValidation(true, $categoryID);
                $this->data['pageTitle']="Modifier catégorie d'article";
                $this->data['category'] = getTableByID($tables->categories, $categoryID);
                $this->render('posts/categories/edit');
                break;
            default:
                $this->data['pageTitle']="Liste des catégorie d'articles";
                $this->data['categories']=getAllInTable($tables->categories, false);
                includeDatatablesAssets();
                $this->render('posts/categories/index');
                break;
        }

    }
    
    public function tags($action='', $slug=''){
        $tables = getPostTablesNames();
        switch ($action){
            case 'add':
                $this->data['pageTitle']="Ajouter étiquette d'article";
                setPostTagValidation(false);
                $this->render('posts/tags/add');
                break;
            case 'edit':
                $tagID = (int) getIDBySlug($tables->tags, $slug);
                redirect_if_id_is_not_valid($tagID, $tables->tags, 'posts/tags');
                setPostTagValidation(true, $tagID);
                $this->data['pageTitle']="Modifier étiquette d'article";
                $this->data['tag'] = getTableByID($tables->tags, $tagID);
                $this->render('posts/tags/edit');
                break;
            default:
                $this->data['pageTitle']="Liste des étiquettes d'articles";
                $this->data['tags']=getAllInTable($tables->tags, false);
                includeDatatablesAssets();
                $this->render('posts/tags/index');
                break;
        }

    }
    

    public function is_unique_on_update($field_value, $args)
    {
        return control_unique_on_update($field_value, $args);
    }



}