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
        $this->load->helper('content');
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
        if($header = $this->input->post('header')){
            setFormValidationRules([
                [
                    'name'=>'header[site_phone]',
                    'label'=>'Numéro de téléphone principal',
                    'rules'=>'trim|required',
                ],
                [
                    'name'=>'header[site_email]',
                    'label'=>'Email principal',
                    'rules'=>'trim|required|valid_email',
                ],
                [
                    'name'=>'header[site_header_post_cat_submenu][]',
                    'label'=>"Rubriques d'article à aficher",
                    'rules'=>'trim|required',
                ],
            ]);
            if($this->form_validation->run()){
                if(isset($header['top_header_links']) && !empty($header['top_header_links'])){
                    foreach ($header['top_header_links'] as $key=> $link){
                        if(!maybe_null_or_empty($link, 'label')){
                            unset($header['top_header_links'][$key]);
                            continue;
                        }
                    }
                }
                $this->option_model->update_all_options($header);
                get_success_message('Contenus généraux mis à jour avec succès');
                pro_redirect('contents/header');
            }else{
                get_error_message();
            }
        }
        $tables = getPostTablesNames();
        $this->data['pageTitle']="Modification du contenu de l'entête";
        $this->data['postSectors']=getAllInTable($tables->categories, true, true, 'id', 'desc', true, 'id', 'name', false);
        includeSelect2Assets();
        includeJQueryRepeaterAssets();
        $this->render('contents/header');
    }
    public function footer(){
        if($footer = $this->input->post('footer')){
            setFormValidationRules([
                [
                    'name'=>'footer[footer_background_color]',
                    'label'=>'Couleur arrière plan du pieds de page',
                    'rules'=>'trim|required',
                ],
                [
                    'name'=>'footer[footer_logo]',
                    'label'=>'Logo du pieds de page',
                    'rules'=>'trim|required',
                ],
            ]);
            if($this->form_validation->run()){
                if(maybe_null_or_empty($footer, 'footer_links')){
                    foreach ($footer['footer_links'] as $key=> $footerLink){
                        if(!maybe_null_or_empty($footerLink, 'label')){
                            unset($footer['footer_links'][$key]);
                            continue;
                        }
                        if(maybe_null_or_empty($footerLink, 'links')){
                            foreach ($footerLink['links'] as $keyLink => $link){
                                if(!maybe_null_or_empty($link, 'label')){
                                    unset($footer['footer_links'][$key]['links'][$keyLink]);
                                    continue;
                                }
                            }
                        }
                    }
                }
                $this->option_model->update_all_options($footer);
                get_success_message('Contenus du pieds de page mis à jour avec succès');
                pro_redirect('contents/footer');
            }else{
                get_error_message();
            }
        }
        $this->data['pageTitle']="Modification du contenu du pied de page";
        $this->data['footer']=maybe_null_or_empty($this->data['options'], 'footer');
        includeDropifyAssets();
        includeJQueryRepeaterAssets();
        $this->render('contents/footer');
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