<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 22/11/2019
 * Time: 04:35
 */

class Admin_contents extends Pro_Controller{

    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $this->data['pageTitle']="Modification du contenu général";
        $this->render('index');
    }
    public function header(){
        $this->data['pageTitle']="Modification du contenu de l'entête";
        $this->render('index');
    }
    public function footer(){
        $this->data['pageTitle']="Modification du contenu du pied de page";
        $this->render('index');
    }
    public function home_page(){
        $this->data['pageTitle']="Modification du contenu de la page d'accueil";
        $this->render('index');
    }
    public function contact_page(){
        $this->data['pageTitle']="Modification du contenu de la page contact";
        $this->render('index');
    }


}