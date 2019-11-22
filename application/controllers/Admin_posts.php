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
    }

    public function index(){
        $this->data['pageTitle']="Liste des articles";
        $this->render('index');
    }
    public function add(){
        $this->data['pageTitle']="Ajouter un article";
        $this->render('index');
    }
    public function trash(){
        $this->data['pageTitle']="Articles à la corbeille";
        $this->render('index');
    }
    public function categories($action=''){
        switch ($action){
            case 'add':
                $this->data['pageTitle']="Ajouter catégorie d'article";
                $this->render('index');

                break;
            default:
                $this->data['pageTitle']="Catégorie d'articles";
                $this->render('index');

                break;
        }

    }
    public function tags($action=''){
        switch ($action){
            case 'add':
                $this->data['pageTitle']="Ajouter étiquette d'article";
                $this->render('index');

                break;
            default:
                $this->data['pageTitle']="Etiquettes d'articles";
                $this->render('index');

                break;
        }

    }



}