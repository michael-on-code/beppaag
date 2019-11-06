<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 31/10/2019
 * Time: 14:47
 */

defined('BASEPATH') OR exit('No direct script access allowed');
class Events extends Public_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index($eventSlug=''){
        if($eventSlug==""){
            $this->data['pageTitle']= 'Liste des evènements';
            $this->render('events/index');
        }else{
            $this->data['footerJs'][]=$this->data['assetsUrl']."public/js/jquery.prettyPhoto.js";
            $this->data['headerCss'][]=$this->data['assetsUrl']."public/css/prettyPhoto.css";
            $this->data['footerJs'][]=$this->data['assetsUrl']."public/js/jquery.countdown.js?v=1.01";
            $this->data['pageTitle']= 'Séminaire sur la bonne gestion des processus d\'évaluation';
            $this->render('events/single');
        }

    }

}
