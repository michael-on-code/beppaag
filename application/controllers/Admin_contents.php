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

    public function login_page(){
		$this->data['pageTitle']="Modification du contenu de la page de Login";
		includeDropifyAssets();
		if($this->input->post('content')){
			setFormValidationRules([
				[
					'name'=>'content[site_login_title]',
					'label'=>'Titre de la page',
					'rules'=>'trim|required',
				],
				[
					'name'=>'content[site_login_description]',
					'label'=>'Description de la page',
					'rules'=>'trim|required',
				],
				[
					'name'=>'content[site_login_bg_image]',
					'label'=>"Image d'arriere plan de la page",
					'rules'=>'trim|required',
				],

			]);
			if($this->form_validation->run()){
				$content = $this->input->post('content');
				$this->option_model->update_all_options($content);
				get_success_message('Contenus mis à jour avec succès');
				pro_redirect('contents/login-page');
			}else{
				get_error_message();
			}
		}
		$this->render('contents/login');
	}

    public function slides(){
		$this->data['pageTitle']="Modification des slides";
		includeDropifyAssets();
		if($slides = $this->input->post('slides')){
			setFormValidationRules([
				[
					'name'=>'slides[show_latest_evaluations]',
					'label'=>"Afficher les dernières évaluations",
					'rules'=>'trim'
				],
				[
					'name'=>'slides[show_latest_posts]',
					'label'=>"Afficher les dernières actualités",
					'rules'=>'trim'
				],
				[
					'name'=>'slides[show_latest_events]',
					'label'=>"Afficher les derniers évènements",
					'rules'=>'trim'
				],
			]);
			if($this->form_validation->run()){
				$slides['show_latest_events']= maybe_null_or_empty($slides, 'show_latest_events', false, '0');
				$slides['show_latest_posts']= maybe_null_or_empty($slides, 'show_latest_posts', false, '0');
				$slides['show_latest_evaluations']= maybe_null_or_empty($slides, 'show_latest_evaluations', false, '0');
				//var_dump($slides);exit;
				$this->option_model->update_all_options($slides, false);
				get_success_message('Slides de la plateforme mis à à jour avec succès');
				pro_redirect('contents/slides');
			}else{
				get_error_message();
			}
		}
		$this->render('contents/slides');
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
        //$this->data['footer']=maybe_null_or_empty($this->data['options'], 'footer');
        includeDropifyAssets();
        includeJQueryRepeaterAssets();
        $this->render('contents/footer');
    }
    public function home_page(){
        $this->data['pageTitle']="Modification du contenu de la page d'accueil";
        includeDropifyAssets();
        if($home = $this->input->post('home')){
			setFormValidationRules([
				[
					'name'=>'home[site_director_name]',
					'label'=>'Nom du Directeur',
					'rules'=>'trim|required'
				],
				[
					'name'=>'home[site_director_phrase]',
					'label'=>'Mot du Directeur',
					'rules'=>'trim|required'
				],
				[
					'name'=>'home[site_director_photo]',
					'label'=>'Photo du Directeur',
					'rules'=>'trim|required'
				],
				[
					'name'=>'home[site_director_signature]',
					'label'=>'Signature du Directeur',
					'rules'=>'trim'
				],
			]);
			if($this->form_validation->run()){
				$this->option_model->update_all_options($home);
				get_success_message('Contenus de la page accueil mis à jour avec succès');
				pro_redirect('contents/home-page');
			}
		}
        $this->render('contents/home_page');
    }
    public function contact_page(){
        if($contact = $this->input->post('contact')){
            //var_dump($contact);exit;
            setFormValidationRules([
                [
                    'name'=>'contact[contact_infos]',
                    'label'=>'Informatons de contacts',
                    'rules'=>'required'
                ],
                [
                    'name'=>'contact[contact_form_receiver]',
                    'label'=>'Destinataire du formulaire de contact',
                    'rules'=>'trim|required|valid_email'
                ],
                [
                    'name'=>'contact[contact_google_map_iframe_html]',
                    'label'=>'Code HTML Iframe Google Maps',
                    'rules'=>'trim|required'
                ],
            ]);
            if($this->form_validation->run()){
                if(isset($contact['contact_infos']) && !empty($contact['contact_infos'])){
                    foreach ($contact['contact_infos'] as $key=> $info){
                        if(!maybe_null_or_empty($info, 'label')){
                            unset($contact['contact_infos'][$key]);
                        }
                    }
                }
                $this->option_model->update_all_options($contact);
                get_success_message('Contenus de la page contact mis à jour avec succès');
                pro_redirect('contents/contact-page');
            }else{
                get_error_message();
            }
        }
        $this->data['pageTitle']="Modification du contenu de la page contact";
        includeJQueryRepeaterAssets();
        $this->render('contents/contact');
    }

    /*public function team(){
    	includeDropifyAssets();
		if($team = $this->input->post('team')){
			//var_dump($contact);exit;
			setFormValidationRules([
				[
					'name'=>'team[teams]',
					'label'=>'Informatons de contacts',
					'rules'=>'required'
				],

			]);
			if($this->form_validation->run()){
				if(isset($contact['contact_infos']) && !empty($contact['contact_infos'])){
					foreach ($contact['contact_infos'] as $key=> $info){
						if(!maybe_null_or_empty($info, 'label')){
							unset($contact['contact_infos'][$key]);
						}
					}
				}
				$this->option_model->update_all_options($contact);
				get_success_message('Contenus de la page contact mis à jour avec succès');
				pro_redirect('contents/contact-page');
			}else{
				get_error_message();
			}
		}
		$this->data['pageTitle']="Modification du contenu de la page équipe";
		includeJQueryRepeaterAssets();
		$this->render('contents/team');
	}*/


}
