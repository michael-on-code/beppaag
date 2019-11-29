<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 31/10/2019
 * Time: 11:44
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends Public_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $this->data['pageTitle']= 'Accueil';
        $this->load->model(['post_model', 'event_model']);
        $this->data['latestPosts']=$this->post_model->getAll(true, true, true, 'true', 'id', 'desc', false, 4, true);
        $this->data['latestEvents']=$this->event_model->getAll(true, true, true, 'true', 'id', 'desc', false, 3, true);
        $this->data['totalPosts']=getCountInTable('posts', ['active'=>1]);
        $this->data['totalEvents']=getCountInTable('events', ['active'=>1]);
        $this->data['totalEvaluations']=getCountInTable('evaluations', ['active'=>1]);
        //var_dump($this->data['totalPosts']);exit;
        $this->render('index');
    }


}