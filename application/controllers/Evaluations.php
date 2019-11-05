<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 04/11/2019
 * Time: 10:58
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class Evaluations extends Public_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $this->data['pageTitle']= 'Evaluations';
        $this->data['footerJs'][]=$this->data['assetsUrl'].'public/lib/colorlib-search/js/extention/choices.js';
        $this->data['footerJs'][]=$this->data['assetsUrl'].'public/lib/colorlib-search/js/extention/flatpickr.js';
        $this->data['headerCss'][]=$this->data['assetsUrl'].'public/lib/colorlib-search/css/main.css';
        $this->render('evaluations/index');
    }
}