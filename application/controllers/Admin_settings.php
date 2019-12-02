<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 13/11/2019
 * Time: 14:04
 */

class Admin_settings extends Pro_Controller{

    public function __construct()
    {
        parent::__construct();
        redirect_if_user_cannot('admin', 'dashboard');
    }

    public function index(){
        $this->data['pageTitle']='Paramètres généraux';
        //var_dump(getAllImageSizes());exit;
        if($settings = $this->input->post('options')){
            //var_dump($settings);exit;
            setFormValidationRules([
                [
                    'name'=>'options[siteName]',
                    'label'=>'Nom de la plateforme',
                    'rules'=>'trim|required'
                ],
                [
                    'name'=>'options[siteDescription]',
                    'label'=>'Description de la plateforme',
                    'rules'=>'trim|required'
                ],
                /*[
                    'name'=>'options[siteFooterDescription]',
                    'label'=>'Pied de page de la plateforme',
                    'rules'=>'trim|required'
                ],*/
                /*[
                    'name'=>'options[notificationEmails]',
                    'label'=>'Emails de notification',
                    'rules'=>'trim|required'
                ],*/
                [
                    'name'=>'options[googleAnalyticsID]',
                    'label'=>'ID de suivi Google Analytics',
                    'rules'=>'trim|required'
                ],[
                    'name'=>'options[googleRecaptchaPublicKey]',
                    'label'=>'Clé publique Google Recaptcha',
                    'rules'=>'trim|required'
                ],
                [
                    'name'=>'options[googleRecaptchaSecretKey]',
                    'label'=>'Clé privé Google Recaptcha',
                    'rules'=>'trim|required'
                ],
                [
                    'name'=>'options[siteLogo]',
                    'label'=>'Logo de la plateforme',
                    'rules'=>'trim|required'
                ],
                [
                    'name'=>'options[siteFavicon]',
                    'label'=>'Favicon de la plateforme',
                    'rules'=>'trim|required'
                ],
                [
                    'name'=>'options[siteDefaultAvatar]',
                    'label'=>'Avatar utilisateur par défaut',
                    'rules'=>'trim|required'
                ],

            ]);
            if($this->form_validation->run()){
                $this->option_model->update_all_options($settings);
                //var_dump($globalSettings);exit;
                get_success_message('Paramètres généraux de la plateforme mis à jour avec succès');
                pro_redirect('settings');
            }else{
                get_error_message();
            }
        }
        $this->data['footerJs'][]=$this->data['assetsUrl'].'pro/vendors/jquery-validation/jquery.validate.min.js';
        $this->data['footerJs'][]=$this->data['assetsUrl'].'pro/vendors/jquery-validation/messages_fr.js';
        $this->data['footerJs'][]=$this->data['assetsUrl'].'pro/vendors/dropify/dist/js/dropify.min.js';
        $this->data['headerCss'][]=$this->data['assetsUrl'].'pro/vendors/dropify/dist/css/dropify.min.css';
        $this->render('settings/index');
    }
}