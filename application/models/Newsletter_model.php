<?php
class Newsletter_model extends CI_Model{

	public function __construct()
	{
		parent::__construct();
		$this->_tableName = 'newsletter';
	}

	public function insertOrUpdate($data){

		if(!$this->checkEmail($data['email'])){
			//insert
			$this->insert($data);
		}else{
			$this->update($data);
		}
	}

	public function insert($data){
		$this->db->insert($this->_tableName, $data);
	}
	public function update($data){
		$this->db->update($this->_tableName, $data, ['email'=>$data['email']]);
	}


	public function checkEmail($email){
		$this->db->select('COUNT(id) as num');
		return (bool) $this->db->get_where($this->_tableName, ['email'=>$email])->row()->num;
	}
}
