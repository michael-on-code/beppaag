<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 02/11/2019
 * Time: 09:39
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class Blog extends Public_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $this->data['pageTitle']= 'Actualités';
        $this->render('blog/index');
    }
}