<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 29/11/2019
 * Time: 00:53
 */

defined('BASEPATH') OR exit('No direct script access allowed');
class MY_Exceptions extends CI_Exceptions {
    public function __construct()
    {
        parent::__construct();
        $this->CI =&get_instance();
    }

    public function show_404($page = '', $log_error = true)
    {
//        $this->CI->data['pageTitle']='Erreur 404';
//        $this->CI->render('public/404', 'public');
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