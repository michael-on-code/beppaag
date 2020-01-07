<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 07/01/2020
 * Time: 16:29
 */
class Ajaxify extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('cron_model');
    }

    public function doCronJobs(){
        if($this->input->is_ajax_request()){
            $availableCrons = $this->cron_model->getAll();
            //echo json_encode($availableCrons);die();
            if(!empty($availableCrons)){
                foreach ($availableCrons as $cron){
                    if($this->cron_model->checkCronStatus($cron['id'])==1){
                        $this->cron_model->lockCronByID($cron['id']);
                        $cron['params']= (array) json_decode($cron['params']);
                        if(!empty($cron['params']) && is_array($cron['params'])){
                            $this->caller([$this, $cron['function_to_call']], $cron['params']);
                        }
                        $this->cron_model->disableCron($cron['id']);
                    }
                }
                $output = [
                    'status'=>1,
                ];
            }else{
                $output = [
                    'status'=>0,
                ];
            }
            echo json_encode($output);
            die();
        }else{
            redirect();
        }


    }

    private function caller(callable $func, $param = [])
    {
        return call_user_func_array($func, [$param]);
    }

    public function sendNotifications($param){
        mailSender($param);
    }
}