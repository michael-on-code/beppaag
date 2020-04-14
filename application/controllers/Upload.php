<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 29/10/2019
 * Time: 11:25
 */

class Upload extends Pro_Controller{

    public function __construct()
    {
        parent::__construct();
		if(!$this->input->is_ajax_request()){
			redirect();
		}
    }

    public function doAjaxUpload(){
        if($this->input->is_ajax_request()){
            $status = false;
            $fileName = null;
            $filez=maybe_null_or_empty($_FILES, $this->input->post('name'));
            if(!empty($filez)){
                if($data = upload_data(array(
                    'upload_path' => FCPATH . 'uploads',
                    'allowed_types' => 'jpg|png|jpeg|pdf|doc|docx|ico',
                    'max_size' => 1024 * 10,
                    'file_name'=>getSlugifyString($filez['name'], false, true, false, 0)
                ), $uploadNames=[$this->input->post('name')], true, false)){
                    foreach ($uploadNames as $name) {
                        if (isset($data[$name]) && maybe_null_or_empty($data[$name], 'raw_name')) {
                            $status = true;
                            $fileName = $data[$name]['raw_name'] . $data[$name]['file_ext'];
                        }
                    }
                }
            }
            echo json_encode([
                'status' => $status,
                'csrf_token_name' => $this->security->get_csrf_token_name(),
                'csrf_hash' => $this->security->get_csrf_hash(),
                'fileName'=>$fileName ,
            ]);
        }
        die();
    }
}
