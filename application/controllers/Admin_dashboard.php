<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 12/11/2019
 * Time: 11:34
 */
class Admin_dashboard extends Pro_Controller{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $this->data['pageTitle']='Tableau de bord';
        if(user_can('admin')){
            $this->data['html']=getAdminDashboardView($this->data['assetsUrl']);
        }
        $this->render('index');
    }
}