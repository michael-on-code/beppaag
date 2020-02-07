<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 22/11/2019
 * Time: 04:33
 */

class Admin_newsletter extends Pro_Controller{

    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
    	$this->load->model('newsletter_model');
        $this->data['pageTitle']="Liste des abonnés ayant souscrit à la Newsletter";
        includeDatatablesAssets();
		includeDatatableButtonsAssets();
        $this->data['newsletters']= $this->newsletter_model->getAll();
		$this->data['tableHeaders']=[
			"Nom complet","Email", "Téléphone"
		];
        //var_dump($this->data['newsletters']);exit;
        $this->render('newsletter/index');
    }
}
