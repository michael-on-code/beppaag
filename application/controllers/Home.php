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
        $this->render('index');
    }
}