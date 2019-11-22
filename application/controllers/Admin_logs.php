<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 22/11/2019
 * Time: 04:34
 */
class Admin_logs extends Pro_Controller{

    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $this->data['pageTitle']="Journalisation";
        $this->render('index');
    }
}