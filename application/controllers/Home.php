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
        $this->load->model('evaluation_model');
		$showEvaluationSlide = maybe_null_or_empty($this->data['options'], "show_latest_evaluations", true);
		$showPostSlide = maybe_null_or_empty($this->data['options'], "show_latest_posts", true);
		$showEventSlide = maybe_null_or_empty($this->data['options'], "show_latest_events", true);
		if($showEvaluationSlide || $showEventSlide || $showPostSlide){
			$limit = 4;
			$sliders = [];
			for($i=1; $i<=12; $i++){
				if($slide = maybe_null_or_empty($this->data['options'], "home_slide_$i", true)){
					$sliders[] = $slide;
				}
			}
			if(!empty($sliders)){
				$this->data['sliders']=$sliders;
				$this->data['slidersElements']=[];

				if($showEvaluationSlide){
					$table = getEvaluationTablesNames();
					$latestEvaluations = getAllInTable($table->evaluations, true, true,
						'id', 'desc', false, '', '', '', 'id, title',
						'', ['active'=>1], '', '', $limit);
					if(!empty($latestEvaluations)){
						foreach ($latestEvaluations as $evaluation){
							$this->data['slidersElements'][]=[
								'title'=>$evaluation['title'],
								'link'=>getPermalink($evaluation['id'], 'evaluations'),
								'type'=>'Dernières évaluations',
							];
						}
					}

				}
				if($showPostSlide){
					$table = getPostTablesNames();
					$latestPosts = getAllInTable($table->posts, true, true,
						'id', 'desc', false, '', '', '', 'id, title',
						'', ['active'=>1], '', '', $limit);
					if(!empty($latestPosts)){
						foreach ($latestPosts as $posts){
							$this->data['slidersElements'][]=[
								'title'=>$posts['title'],
								'link'=>getPermalink($posts['id'], 'blog'),
								'type'=>'Dernières actualités',
							];
						}
					}
				}
				if($showEventSlide){
					$table = getEventTablesNames();
					$latestEvents = getAllInTable($table->events, true, true,
						'id', 'desc', false, '', '', '', 'id, title',
						'', ['active'=>1], '', '', $limit);
					if(!empty($latestEvents)){
						foreach ($latestEvents as $event){
							$this->data['slidersElements'][]=[
								'title'=>$event['title'],
								'link'=>getPermalink($event['id'], 'events'),
								'type'=>'Derniers événements',
							];
						}
					}

				}
			}

		}
        $totalExecutedRecommendation = 0;
        $totalNonExecutedRecommendation = 0;
        $totalInProgressRecommendation = 0;
        $this->data['totalExecutedRecommendation']=$totalExecutedRecommendation;
        $this->data['totalNonExecutedRecommendation']=$totalNonExecutedRecommendation;
        $this->data['totalInProgressRecommendation']=$totalInProgressRecommendation;
        $this->data['latestPosts']=$this->post_model->getAll(true, true, true, true, 'id', 'desc', false, 4, false);
        $this->data['latestEvents']=$this->event_model->getAll(true, true, true, true, 'id', 'desc', false, 3, false);
        $this->data['eventsToCome']=$this->event_model->getAll(true, true, true, true, 'id', 'desc', false, 3, false, 1, [], [], [], [], [], false, true);
        $this->data['totalPosts']=getCountInTable('posts', true, ['active'=>1]);
        $this->data['totalEvents']=getCountInTable('events', true, ['active'=>1]);
        $this->data['totalEvaluations']=getCountInTable('evaluations', true, ['active'=>1]);
        //var_dump($this->data['totalPosts']);exit;
        $this->render('index');
    }


}
