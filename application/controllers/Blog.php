<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 02/11/2019
 * Time: 09:39
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends Public_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->_tables = getPostTablesNames();
        $this->load->model(['event_model', 'post_model']);
        $this->data['categories'] = getAllInTable($this->_tables->categories);
        $this->data['tags'] = getAllInTable($this->_tables->tags);
        $this->data['latestPosts'] = $this->post_model->getAll(true, true, true, 'true', 'id', 'desc', false, 4, true);
        $this->data['latestEvents'] = $this->event_model->getAll(true, true, true, 'true', 'id', 'desc', false, 3, true);
    }

    public function tag($tagSlug){
        $tagID = (int) getIDBySlug($this->_tables->tags, $tagSlug);
        redirect_if_id_is_not_valid($tagID, $this->_tables->tags, 'blog', false, false);
        $tag = getTableByID($this->_tables->tags, $tagID);
        $this->data['pageTitle'] = 'Etiquette '.$tag['name'];
        $page = (int)$this->input->get('page');
        $tagPosts = getAllInTable($this->_tables->tag_group, true, false, '', '',false, '', '', '', '', '', ['tag_id'=>$tagID]);
        $postIDs=[];
        $this->data['posts']=[];
        $totalRow=0;
        if(!empty($tagPosts)){
            foreach ($tagPosts as $tagPost){
                $postIDs[]=$tagPost['post_id'];
            }
            $this->data['posts'] = $this->post_model->getAll(true, true, true, true, 'id', 'desc', false, $limit = 9, true, $page, [], [], [], [], $postIDs);
            $totalRow = $this->post_model->getAll(true, true, true, true, 'id', 'desc', false, $limit = 9, true, $page, [], [], [], [], $postIDs, true);

        }
        $config['base_url'] = site_url('blog');
        $this->data['links'] = getPaginationConfigAndLink(site_url('blog'), $limit, $totalRow, $page);
        $this->render('blog/index');
    }
    public function category($categorySlug){
        $categoryID = (int) getIDBySlug($this->_tables->categories, $categorySlug);
        redirect_if_id_is_not_valid($categoryID, $this->_tables->categories, 'blog', false, false);
        $tag = getTableByID($this->_tables->categories, $categoryID);
        $this->data['pageTitle'] = 'Rubrique '.$tag['name'];
        $page = (int)$this->input->get('page');
        $this->data['posts'] = $this->post_model->getAll(true, true, true, true, 'id', 'desc', false, $limit = 9, true, $page, [$categoryID]);
        $totalRow = $this->post_model->getAll(true, true, true, true, 'id', 'desc', false, $limit = 9, true, $page, [$categoryID], [], [], [], [], true);
        $this->data['links'] = getPaginationConfigAndLink(site_url('blog'),$limit, $totalRow, $page);
        $this->render('blog/index');
    }

    public function index($postSlug = "")
    {

        if (trim($postSlug) == "") {
            $this->data['pageTitle'] = 'Actualités';
            $page = (int)$this->input->get('page');
            $this->data['posts'] = $this->post_model->getAll(true, true, true, 'true', 'id', 'desc', false, $limit = 9, true, $page);
            $this->data['links'] = getPaginationConfigAndLink(site_url('blog'), $limit, getCountInTable($this->_tables->posts, ['active' => 1]), $page);
            $this->render('blog/index');
        } else {
            $postID = (int) getIDBySlug($this->_tables->posts, $postSlug);
            redirect_if_id_is_not_valid($postID, $this->_tables->posts, 'blog', false, false);
            $this->data['post']=$this->post_model->getByID($postID, false, true, true, true);
            $tags=[];
            if($allTags = maybe_null_or_empty($this->data['post'], 'tag_id')){
                foreach ($allTags as $allTag){
                    $tags[]=$allTag['id'];
                }
            }
            $this->data['relatedPosts']=$this->post_model->getAll(true, true, true, true, 'id', 'desc', false, $limit = 3, false, 1, [$this->data['post']['category_id']], $tags, [$this->data['post']['id']]);
            $this->data['pageTitle'] = $this->data['post']['title'];
            $this->render('blog/single');
        }

    }
}