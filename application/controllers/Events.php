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

    public function index(){
        $this->data['pageTitle']= 'Liste des evènements';
        $this->render('events/index');
    }
}
