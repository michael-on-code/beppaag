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

    public function banners(){
        $this->data['pageTitle']="Modification des bannières";
        includeDropifyAssets();
        if($banners = $this->input->post('banners')){
            setFormValidationRules([
                [
                    'name'=>'banners[home_banner]',
                    'label'=>"Bannière de la page d'accueil",
                    'rules'=>'trim|required'
                ],
                [
                    'name'=>'banners[post_banner]',
                    'label'=>"Bannière des pages articles",
                    'rules'=>'trim|required'
                ],
                [
                    'name'=>'banners[event_banner]',
                    'label'=>"Bannière des pages evenement",
                    'rules'=>'trim|required'
                ],
                [
                    'name'=>'banners[evaluation_banner]',
                    'label'=>"Bannière des pages évaluations",
                    'rules'=>'trim|required'
                ],
                [
                    'name'=>'banners[contact_banner]',
                    'label'=>"Bannière de la page contact",
                    'rules'=>'trim|required'
                ],
                [
                    'name'=>'banners[other_banner]',
                    'label'=>"Bannière des autres pages",
                    'rules'=>'trim|required'
                ],
            ]);
            if($this->form_validation->run()){
                $this->option_model->update_all_options($banners);
                get_success_message('Bannières de la plateformes mises à jour avec succès');
                pro_redirect('contents/banners');
            }else{
                get_error_message();
            }
        }
        $this->render('contents/banners');
    }

    public function index(){
        $this->data['pageTitle']="Modification du contenu général";
        if($content = $this->input->post('content')){
            setFormValidationRules([
                [
                    'name'=>'content[site_main_color]',
                    'label'=>'Couleur principal du site',
                    'rules'=>'trim|required',
                ],
                [
                    'name'=>'content[site_secondary_color]',
                    'label'=>'Couleur secondaire du site',
                    'rules'=>'trim|required',
                ],

            ]);
            if($this->form_validation->run()){
                $this->option_model->update_all_options($content);
                get_success_message('Contenus généraux mis à jour avec succès');
                pro_redirect('contents');
            }else{
                get_error_message();
            }
        }
        $this->render('contents/index');
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