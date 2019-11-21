<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 21/11/2019
 * Time: 11:13
 */
class P_404 extends MY_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('ion_auth');
    }

    public function index(){
        if($this->ion_auth->logged_in()){
            $this->render(null, 'pro_404');
            //render private 404
        }else{
            $this->load->helper('public');
            //render public 404
            $this->data['pageTitle']='Erreur 404';
            $this->render('public/404', 'public');
        }
    }
}