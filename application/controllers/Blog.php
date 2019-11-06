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

    public function index($postSlug=""){

        if($postSlug==""){
            $this->data['pageTitle']= 'Actualités';
            $this->render('blog/index');
        }else{
            $this->data['pageTitle']= "Insécurité alimentaire : un regard sur les réponses apportées par les diverses parties prenantes";
            $this->render('blog/single');
        }

    }
}