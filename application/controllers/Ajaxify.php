<?php

/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 07/01/2020
 * Time: 16:29
 */
class Ajaxify extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function setSiteViewCounter(){
		if($this->input->is_ajax_request()){
			$this->load->library('user_agent');
			if($this->agent->is_browser()){
				$count = (int) $this->option_model->get_option($optionKey = 'total_view_count');
				$count++;
				$this->option_model->update_option($optionKey, $count);
				$output = [
					'status' => 1,
				];
			}else{
				$output = [
					'status' => 0,
				];
			}
			echo json_encode($output);
			die();
		}else{
			redirect();
		}

	}

	public function setSingleEvaluationViewCounter(){
		if($this->input->is_ajax_request()){
			$this->load->library('user_agent');
			if($this->agent->is_browser()){
				$evaluationID = $this->input->post('evaluation_id');
				$evaluationTable = getEvaluationTablesNames();
				redirect_if_id_is_not_valid($evaluationID, $evaluationTable->evaluations, site_url(), false, false, ['active'=>1]);
				$this->load->helper('date');
				$arrayToBeInserted = [
					'evaluation_id'=>$evaluationID,
					'ip_adress'=>$this->input->ip_address(),
					'time'=>now(),
					'type'=>'VIEW',
				];
				$this->load->model('evaluation_model');
				$this->evaluation_model->insertEvaluationStat($arrayToBeInserted);
				$count = $this->evaluation_model->getCountEvaluationsView();
				$this->option_model->update_option('total_evaluation_view_count', $count);
				$output = [
					'status' => 1,
				];
			}else{
				$output = [
					'status' => 0,
				];
			}
			echo json_encode($output);
			die();
		}else{
			redirect();
		}

	}


	public function updateNewsletter()
	{
		if ($this->input->is_ajax_request()) {
			$email = $this->input->post('email');
			$fullName = $this->input->post('fullname');
			if ($email && $fullName) {
				$this->load->library('form_validation');
				setFormValidationRules([
					[
						'name' => "fullname",
						'label' => 'Nom complet',
						'rules' => 'trim|required'
					],
					[
						'name' => "email",
						'label' => 'Email',
						'rules' => 'trim|required|valid_email|max_length[45]'
					],
				]);
				if ($this->form_validation->run()) {

					$this->load->model('newsletter_model');
					$data = [
						'email' => $email,
						'name' => $fullName,
					];
					$this->newsletter_model->insertOrUpdate($data);
					echo json_encode([
						'status' => true,
						'message' => "<p>Merci pour votre inscription à notre Newsletter</p>",
					]);
				} else {
					echo json_encode([
						'status' => false,
						'message' => validation_errors()
					]);
				}
			} else {
				echo json_encode([
					'status' => false,
					'message' => "<p>Action non authorisée</p>"
				]);
			}
			die();

		} else {
			redirect();
		}
	}


	public function contactMailer()
	{
		if ($this->input->is_ajax_request()) {
			$email = $this->input->post('email');
			$fullName = $this->input->post('fullname');
			$subject = $this->input->post('subject');
			$message = $this->input->post('message');
			$recaptcha = $this->input->post('g-recaptcha-response');
			if ($email && $fullName && $subject && $message && $recaptcha) {
				$this->load->library('form_validation');
				setFormValidationRules([
					[
						'name' => "fullname",
						'label' => 'Nom complet',
						'rules' => 'trim|required'
					],
					[
						'name' => "email",
						'label' => 'Email',
						'rules' => 'trim|required|valid_email'
					],
					[
						'name' => "subject",
						'label' => 'Sujet',
						'rules' => 'trim|required'
					],
					[
						'name' => "message",
						'label' => 'Message',
						'rules' => 'trim|required'
					],
					[
						'name' => "g-recaptcha-response",
						'label' => 'Google Recaptcha',
						'rules' => 'trim|required'
					],
				]);
				if ($this->form_validation->run()) {
					$successRecaptchaResult = true;
					if (ENVIRONMENT == 'production') {
						//Recaptcha verification working properly
						$recaptChaResult = json_decode(googleRecaptchaCurl1([
							'secret' => maybe_null_or_empty($this->data['options'], 'googleRecaptchaSecretKey'),
							'response' => $recaptcha,
							'remoteip' => $this->input->ip_address()
						]));
						//var_dump($recaptChaResult);exit;
						$successRecaptchaResult = maybe_null_or_empty($recaptChaResult, 'success', true);
					}
					if ($successRecaptchaResult) {
						$elements['Nom'] = $fullName;
						$elements['Email'] = $email;
						$elements['Sujet'] = $subject;
						$elements['Message'] = $message;
						$args['elements'] = $elements;
						$args['title'] = $subject;
						$args['description'] = "Bonjour,<br><br>
                                    Un internaute vient de soumettre au formulaire de contact avec les informations ci-dessous";
						$args['destination'] = $this->option_model->get_option('contact_form_receiver');
						echo json_encode([
							'status' => true,
							'message' => "<p>Merci. Votre Message a été envoyé !</p>",
						]);
						mailSender($args, $email);
					} else {
						echo json_encode([
							'status' => false,
							'message' => "<p>Google Recaptcha n'autorise pas votre connexion <br> Veuillez rééssayer</p>"
						]);
					}

				} else {
					echo json_encode([
						'status' => false,
						'message' => validation_errors()
					]);
				}
			} else {
				echo json_encode([
					'status' => false,
					'message' => "<p>Action non authorisée</p>"
				]);
			}
			die();

		} else {
			redirect();
		}
	}

	public function doCronJobs()
	{
		if ($this->input->is_ajax_request()) {
			$this->load->model('cron_model');
			$availableCrons = $this->cron_model->getAll();
			//echo json_encode($availableCrons);die();
			if (!empty($availableCrons)) {
				foreach ($availableCrons as $cron) {
					if ($this->cron_model->checkCronStatus($cron['id']) == 1) {
						$this->cron_model->lockCronByID($cron['id']);
						$cron['params'] = (array)json_decode($cron['params']);
						if (!empty($cron['params']) && is_array($cron['params'])) {
							$this->caller([$this, $cron['function_to_call']], $cron['params']);
						}
						$this->cron_model->disableCron($cron['id']);
					}
				}
				$output = [
					'status' => 1,
				];
			} else {
				$output = [
					'status' => 0,
				];
			}
			echo json_encode($output);
			die();
		} else {
			redirect();
		}


	}

	private function caller(callable $func, $param = [])
	{
		return call_user_func_array($func, [$param]);
	}

	public function sendNotifications($param)
	{
		mailSender($param);
	}
}
