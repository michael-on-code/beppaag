<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 31/10/2019
 * Time: 11:46
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class Contact extends Public_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $this->data['pageTitle']= 'Contact';
        $this->render('contact');
    }
}

