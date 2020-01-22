<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 31/10/2019
 * Time: 11:44
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends Public_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $this->data['pageTitle']= $this->data['pageDescription'];
        $this->load->model(['post_model', 'event_model']);
        $this->load->model('recommendation_model');
        $recommendations = $this->recommendation_model->getAll();
        $totalExecutedRecommendation = 0;
        $totalNonExecutedRecommendation = 0;
        $totalInProgressRecommendation = 0;
        if(!empty($recommendations)){
            $this->load->helper('evaluation');
            foreach ($recommendations as $recommendation) {
                $appreciation = getExecutionLevelByRecommendationsFromActivitiesArray(maybe_null_or_empty($recommendation, 'activities', true));
                switch ($appreciation) {
                    case 'Exécuté':
                        $totalExecutedRecommendation++;
                        break;
                    case 'En cours':
                        $totalInProgressRecommendation++;
                        break;
                    default :
                        $totalNonExecutedRecommendation++;
                        break;

                }
            }
        }
        $this->data['totalExecutedRecommendation']=$totalExecutedRecommendation;
        $this->data['totalNonExecutedRecommendation']=$totalNonExecutedRecommendation;
        $this->data['totalInProgressRecommendation']=$totalInProgressRecommendation;
        $this->data['latestPosts']=$this->post_model->getAll(true, true, true, 'true', 'id', 'desc', false, 4, true);
        $this->data['latestEvents']=$this->event_model->getAll(true, true, true, 'true', 'id', 'desc', false, 3, true);
        $this->data['totalPosts']=getCountInTable('posts', true, ['active'=>1]);
        $this->data['totalEvents']=getCountInTable('events', true, ['active'=>1]);
        $this->data['totalEvaluations']=getCountInTable('evaluations', true, ['active'=>1]);
        //var_dump($this->data['totalPosts']);exit;
        $this->render('index');
    }


}
