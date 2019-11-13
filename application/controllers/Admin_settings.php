<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 13/11/2019
 * Time: 14:04
 */

class Admin_settings extends Pro_Controller{

    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $this->data['pageTitle']='Paramètres généraux';
        $this->data['footerJs'][]=$this->data['assetsUrl'].'pro/vendors/jquery-validation/jquery.validate.min.js';
        $this->data['footerJs'][]=$this->data['assetsUrl'].'pro/vendors/jquery-validation/messages_fr.js';
        $this->data['footerJs'][]=$this->data['assetsUrl'].'pro/vendors/dropify/dist/js/dropify.min.js';
        $this->data['headerCss'][]=$this->data['assetsUrl'].'pro/vendors/dropify/dist/css/dropify.min.css';
        $this->render('settings/index');
    }
}