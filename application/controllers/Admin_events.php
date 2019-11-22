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
    }

    public function index(){
        $this->data['pageTitle']="Liste des évènements";
        $this->render('index');
    }
    public function add(){
        $this->data['pageTitle']="Ajouter un évènement";
        $this->render('index');
    }
    public function trash(){
        $this->data['pageTitle']="Evènements à la corbeille";
        $this->render('index');
    }
    public function categories($action=''){
        switch ($action){
            case 'add':
                $this->data['pageTitle']="Ajouter catégorie d'évènements";
                $this->render('index');

                break;
            default:
                $this->data['pageTitle']="Catégorie d'évènements";
                $this->render('index');

                break;
        }

    }



}