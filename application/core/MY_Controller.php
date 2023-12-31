<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MY_Controller extends CI_Controller
{

    public $data = array();

    public function __construct()
    {
        parent::__construct();
        $this->data['assetsUrl']=base_url('assets/');
        $this->data['options']=$this->option_model->get_options();
        $tables = getPostTablesNames();
        $this->data['header_post_cats']=[];
        if($cats = maybe_null_or_empty($this->data['options'], 'site_header_post_cat_submenu')){
            $this->data['header_post_cats']=getAllInTable($tables->categories, false, false, '', '', false, '', '', '', 'slug, name', '',[], $cats);
        }
        $this->data['uploadPath']=base_url('uploads/');
        $this->data['pageTitle']='';
        $this->data['clientData']['publicAjaxifyUrl'] =site_url('ajaxify/doCronJobs');
        $this->data['clientData']['csrf_token_name'] = $this->security->get_csrf_token_name();
        $this->data['clientData']['csrf_hash'] = $this->security->get_csrf_hash();
        $this->data['pageDescription']=maybe_null_or_empty($this->data['options'], 'siteDescription');
        $this->data['pageDefaultImageUrl']=getUploadedImageBySize($this->data['options']['siteLogo'], '');
        $this->data['pageUrl']=site_url();
		$this->data['bodyClass'] = [];
		//DYNAMICALLY EXCLUDE URIS FROM CSRF
		$csrf_exclude_uris = $this->config->item($excludeKey = 'csrf_exclude_uris');
		$csrf_exclude_uris[] = 'ajaxify/setSiteViewCounter';
		$this->config->set_item($excludeKey, $csrf_exclude_uris);

    }

    protected function render($the_view = NULL, $template = 'home')
    {
        if ($template == 'json' || $this->input->is_ajax_request()) {
            header('Content-Type: application/json');
            echo json_encode($this->data);
        } else {
            $this->data['the_view_content'] = (is_null($the_view)) ? '' : $this->load->view($the_view, $this->data, TRUE);

            $this->load->view('templates/' . $template . '_view', $this->data);
        }
    }
}
class Public_Controller extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        //$this->load->library(['ion_auth', 'session', 'form_validation']);
        $this->load->helper('public');
		$this->load->model('evaluation_model');
		$this->data['clientData']['newsletterUrl']=site_url('ajaxify/updateNewsletter');
		$this->data['clientData']['contactUrl']=site_url('ajaxify/contactMailer');
		$this->data['clientData']['publicStatUrl'] =site_url('ajaxify/setSiteViewCounter');
		$this->data['clientData']['downloadStatUrl'] =site_url('ajaxify/setDownloadCounter');
		$this->data['clientData']['publicEvaluationStatUrl'] =site_url('ajaxify/setSingleEvaluationViewCounter');
		$this->data['header_evaluations'] = $this->evaluation_model->getMinifiedAll('id, title', true, 0, 6, true, 'id', 'desc', false, false);
		$this->data['bodyClass'][] = 'public-view';
		$this->data['clientData']['bodyClass'] = $this->data['bodyClass'];
    }


    protected function render($the_view = NULL, $template = 'public')
    {
        parent:: render("$template/".$the_view, $template);
    }
}

class Login_Controller extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(['ion_auth', 'session', 'form_validation']);
        $this->load->helper('user');
        redirect_if_logged_in('dashboard');
        //$this->data['secretCode']='6Lc6F7sUAAAAAN6_3HU4Fz8SWPNaQ0QtBRU01-zE';
    }


    protected function render($the_view = NULL, $template = 'login')
    {
        parent:: render("$template/".$the_view, $template);
    }
}

class Pro_Controller extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(['ion_auth', 'session', 'form_validation']);
        $this->load->helper(['user', 'pro']);
        redirect_if_not_logged_in('login');
        $this->load->model('user_model');
        $this->data['user']= (object) $this->user_model->get_data_by_id(null, true);
        redirect_if_is_banned();
        $user_groups = $this->ion_auth->get_users_groups()->result();
        if (!empty($user_groups)) {
            $this->data['menus'] = get_user_menu($user_groups);
            //var_dump($this->data['menus']);exit;
            $this->data['userRole']=getUserRolesInString($user_groups);
        }
        $this->data['clientData']['uploadUrl'] =site_url('upload/doAjaxUpload');
        $this->data['clientData']['uploadPath'] = $this->data['uploadPath'];
    }


    protected function render($the_view = NULL, $template = 'pro')
    {
        parent:: render("$template/".$the_view, $template);
    }
}
