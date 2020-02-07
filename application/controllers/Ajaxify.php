<?php

/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 07/01/2020
 * Time: 16:29
 */
class Ajaxify extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
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
			}else{
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
