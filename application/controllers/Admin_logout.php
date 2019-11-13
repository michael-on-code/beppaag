<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 13/11/2019
 * Time: 10:32
 */
class Admin_logout extends Pro_Controller{

    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        while($this->ion_auth->logged_in()){
            $this->ion_auth->logout();
            pro_redirect('logout');
        }
        get_info_message('Vous vous êtes déconnectés');
        pro_redirect();
    }
}