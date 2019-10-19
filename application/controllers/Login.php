<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 19/10/2019
 * Time: 09:29
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends Login_Controller{

    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $this->data['pageTitle']= 'Login';
        $this->render('index');
    }
}