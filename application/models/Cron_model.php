<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 07/01/2020
 * Time: 16:39
 */

class Cron_model extends CI_Model{
    public function __construct()
    {
        parent::__construct();
        $this->_tables = 'cron_jobs';
    }

    public function getAll($onlyActiveOnes=true, $onlyExpiredOnes=true){
        if($onlyActiveOnes){
            $this->db->where(['active'=>1]);
        }
        if($onlyExpiredOnes){
            $this->db->where('starts_at <=', 'NOW()');
        }
        return $this->db->get($this->_tables)->result_array();
    }

    public function lockCronByID($cronID){

        $this->db->update($this->_tables, ['id'=>$cronID], ['active'=>2]);
    }

    public function checkCronStatus($cronID){
        $this->db->select('active');
        $result = $this->db->get_where($this->_tables, ['id'=>$cronID])->row();
        return maybe_null_or_empty($result, 'active');
    }

    public function disableCron($cronID){
        $this->db->update($this->_tables, ['id'=>$cronID], ['active'=>0]);
    }

    public function insertBatch($data){
        $this->db->insert_batch($this->_tables, $data);
    }

}