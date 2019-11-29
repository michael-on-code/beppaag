<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 22/11/2019
 * Time: 04:32
 */
class Admin_account extends Pro_Controller{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $this->data['pageTitle']="Mon compte";
        if($user = $this->input->post('user')){
            setFormValidationRules([
                [
                    'name'=>'user[last_name]',
                    'label'=>'Nom',
                    'rules'=>'trim|required|max_length[50]'
                ],
                [
                    'name'=>'user[first_name]',
                    'label'=>'Prénom(s)',
                    'rules'=>'trim|required|max_length[50]'
                ],
                [
                    'name'=>'user[user_photo]',
                    'label'=>'Photo',
                    'rules'=>'trim'
                ],

            ]);
            if($this->form_validation->run()){
                $this->user_model->update($this->data['user']->id, $user);
                get_success_message('Informations personnelles mis à jour avec succès');
                pro_redirect('account');
            }else{
                get_error_message();
            }
        }

        //Updating password
        if($password = $this->input->post('password')){
            setFormValidationRules([
                [
                    'name'=>'password[actual]',
                    'label'=>'Mot de passe actuel',
                    'rules'=>[
                        'trim', 'required', array('password_check', array($this->user_model, 'old_password_check'))
                    ]
                ],
                [
                    'name'=>'password[new]',
                    'label'=>'Nouveau mot de passe',
                    'rules'=>'trim|required|min_length[8]',
                ],
                [
                    'name'=>'password[confirm]',
                    'label'=>'Confirmer mot de passe',
                    'rules'=>'trim|required|matches[password[new]]',
                ],
            ]);
            if($this->form_validation->run()){
                $this->ion_auth->update($this->data['user']->id, array(
                    'password' => $password['new']
                ));
                get_success_message('Mot de passe modifié avec succès');
                pro_redirect('account');
            }
        }
        includeDropifyAssets();
        $this->render('account/index');
    }
}