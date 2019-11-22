<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 22/11/2019
 * Time: 04:32
 */
class Admin_account extends Pro_Controller{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $this->data['pageTitle']="Mon compte";
        $this->render('index');
    }
}