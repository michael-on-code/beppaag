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
    }

    public function index(){
        $this->data['pageTitle']='Evaluations';
        $this->render('evaluations/index');
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