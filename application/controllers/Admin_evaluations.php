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
        $this->data['pageTitle']='Ajouter Evaluations';

        $this->data['footerJs'][]=$this->data['assetsUrl'].'pro/vendors/jquery-validation/jquery.validate.min.js';
        $this->data['footerJs'][]=$this->data['assetsUrl'].'pro/vendors/jquery-validation/messages_fr.js';
        $this->data['footerJs'][]=$this->data['assetsUrl'].'pro/vendors/dropify/dist/js/dropify.min.js';
        $this->data['headerCss'][]=$this->data['assetsUrl'].'pro/vendors/dropify/dist/css/dropify.min.css';

        //SummerNote Text Editor
        $this->data['footerJs'][]='//cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.js';
        $this->data['headerCss'][]='//cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.css';
        $this->data['footerJs'][]='//cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/lang/summernote-fr-FR.js';
        //select2
        $this->data['footerJs'][]=$this->data['assetsUrl'].'pro/vendors/select2/select2.min.js';
        $this->data['headerCss'][]=$this->data['assetsUrl'].'pro/vendors/select2/select2.css';
        $this->render('evaluations/add');
    }

    public function sector($action=''){
        switch ($action){
            case 'add':
                $this->data['pageTitle']='Evaluations';
                $this->render('evaluations/index');
                break;
            default:
                $this->data['pageTitle']='Evaluations';
                $this->render('evaluations/index');
                break;
        }

    }

}