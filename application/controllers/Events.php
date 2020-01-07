<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 31/10/2019
 * Time: 14:47
 */

defined('BASEPATH') OR exit('No direct script access allowed');
class Events extends Public_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->_tables = getEventTablesNames();
        $this->load->model(['event_model', 'post_model']);

    }

    public function tag($tagSlug){
        $tagID = (int) getIDBySlug($this->_tables->tags, $tagSlug);
        redirect_if_id_is_not_valid($tagID, $this->_tables->tags, 'events', false, false);
        $tag = getTableByID($this->_tables->tags, $tagID);
        $this->data['pageTitle'] = 'Etiquette '.$tag['name'];
        $page = (int)$this->input->get('page');
        $tagevents = getAllInTable($this->_tables->tag_group, true, false, '', '',false, '', '', '', '', '', ['tag_id'=>$tagID]);
        $eventIDs=[];
        if(!empty($tagevents)){
            foreach ($tagevents as $tagevent){
                $eventIDs[]=$tagevent['event_id'];
            }
        }
        $this->data['events'] = $this->event_model->getAll(true, true, true, true, 'id', 'desc', false, $limit = 9, true, $page, [], [], [], [], $eventIDs);
        $config['base_url'] = site_url('events');
        $totalRow = $this->event_model->getAll(true, true, true, true, 'id', 'desc', false, $limit = 9, true, $page, [], [], [], [], $eventIDs, true);
        $this->data['links'] = getPaginationConfigAndLink(site_url('events'), $limit, $totalRow, $page);
        $this->render('events/index');
    }
    public function category($categorySlug){
        $categoryID = (int) getIDBySlug($this->_tables->categories, $categorySlug);
        redirect_if_id_is_not_valid($categoryID, $this->_tables->categories, 'events', false, false);
        $tag = getTableByID($this->_tables->categories, $categoryID);
        $this->data['pageTitle'] = 'Rubrique '.$tag['name'];
        $page = (int)$this->input->get('page');
        $this->data['events'] = $this->event_model->getAll(true, true, true, true, 'id', 'desc', false, $limit = 9, true, $page, [$categoryID]);
        $totalRow = $this->event_model->getAll(true, true, true, true, 'id', 'desc', false, $limit = 9, true, $page, [$categoryID], [], [], [], [], true);
        $this->data['links'] = getPaginationConfigAndLink(site_url('events'),$limit, $totalRow, $page);
        $this->render('events/index');
    }

    public function index($eventID = "")
    {

        if (trim($eventID) == "") {
            $this->data['pageTitle'] = 'Evènements';
            $page = (int)$this->input->get('page');
            $this->data['events'] = $this->event_model->getAll(true, true, true, 'true', 'id', 'desc', false, $limit = 6, true, $page);
            //var_dump($this->data['events']);exit;
            $this->data['links'] = getPaginationConfigAndLink(site_url('events'), $limit, getCountInTable($this->_tables->events, ['active' => 1]), $page);
            $this->render('events/index');
        } else {
            //$eventID = (int) getIDBySlug($this->_tables->events, $eventID);
            redirect_if_id_is_not_valid($eventID, $this->_tables->events, 'events', false, false,['active'=>1]);
            $this->data['event']=$this->event_model->getByID($eventID, false, true, true, true);
            $tags=[];
            if($allTags = maybe_null_or_empty($this->data['event'], 'tag_id')){
                foreach ($allTags as $allTag){
                    $tags[]=$allTag['id'];
                }
            }
            $this->data['relatedEvents']=$this->event_model->getAll(true, true, true, true, 'id', 'desc', false, $limit = 3, false, 1, [$this->data['event']['category_id']], $tags, [$this->data['event']['id']]);
//            SEO
            $this->data['pageUrl']=getPermalink($this->data['event']['id'], 'events');
            $this->data['pageDefaultImageUrl']=getUploadedImageBySize($this->data['event']['thumbnail'], '848x420');
            $this->data['pageDescription']=myWordLimiter(strip_tags($this->data['event']['content']), 30);

            $this->data['pageTitle'] = $this->data['event']['title'];


            //SIDEBAR ELEMENTS START
            $postTables = getPostTablesNames();
            $this->data['categories'] = getAllInTable($postTables->categories);
            $this->data['tags'] = getAllInTable($postTables->tags);
            $this->data['latestPosts'] = $this->post_model->getAll(true, true, true, 'true', 'id', 'desc', false, 4, true);
            $this->data['latestEvents'] = $this->event_model->getAll(true, true, true, 'true', 'id', 'desc', false, 3, true);

            //INCLUDE ASSETS
            $this->data['footerJs'][]=$this->data['assetsUrl']."public/js/jquery.prettyPhoto.js";
            $this->data['headerCss'][]=$this->data['assetsUrl']."public/css/prettyPhoto.css";
            $this->data['footerJs'][]=$this->data['assetsUrl']."public/js/jquery.countdown.js?v=1.02";
            $this->render('events/single');
        }

    }

}
