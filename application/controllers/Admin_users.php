<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 22/11/2019
 * Time: 04:34
 */

class Admin_users extends Pro_Controller{

    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $this->data['pageTitle']="Liste des utilisateurs";
        $this->data['users']=$this->user_model->getUsers(false, false, 'desc');
        //var_dump($this->data['users']);exit;
        $this->data['tableHeaders']=[
            'Photo', "Nom complet ", "Email" ,"Statut", "Role", "Dernière connexion", "Ajouté le",
        ];
        $this->data['invisiblesColumns']=[6];
        $numberColumns = count($this->data['tableHeaders']);
        $this->data['visiblesColumns']=[
            0,1,2,3,4,5
        ];
        $unOrderableColumns=[];
        for($i=0; $i<=$numberColumns; $i++){//<= because of action column
            if($i==3 || $i==5 || $i==6){
                continue;
            }
            $unOrderableColumns[]=$i;
        }
        $this->data['clientData']['invisiblesColumns']=$this->data['invisiblesColumns'];
        $this->data['clientData']['allColumns']=array_keys($this->data['tableHeaders']);
        $this->data['clientData']['unOrderableColumns']=$unOrderableColumns;
        includeDatatablesAssets();
        includeSelect2Assets();
        includeSweetAlertAssets();
        includeFancyBoxAssets();
        $this->render('users/index');
    }
    public function add(){
        setUserValidation(false);
        $this->data['pageTitle']="Ajouter un utilisateur";
        $this->data['roles'] =$this->user_model->getRoleForSelect2('name', 'members');
            //getAppropriateUsersRoles(true, true);
        //var_dump($this->data['roles']);exit;
        includeSelect2Assets();
        includeDropifyAssets();
        $this->render('users/add');
    }

    public function edit($username){
        $userID = (int)$this->user_model->getUserIDByUsername($username);
        redirect_if_id_is_not_valid($userID, 'users', 'users');
        setUserValidation(true, $userID);
        $this->data['user'] = $this->user_model->get_data_by_id($userID, true);
        $this->data['pageTitle']="Modifier un utilisateur";
        $this->data['roles'] =$this->user_model->getRoleForSelect2('name', 'members');
        //getAppropriateUsersRoles(true, true);
        //var_dump($this->data['user']);exit;
        includeSelect2Assets();
        includeDropifyAssets();
        $this->render('users/edit');
    }

    public function is_unique_on_update($field_value, $args)
    {
        return control_unique_on_update($field_value, $args);
    }

}