<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 18/11/2019
 * Time: 09:08
 */

class Recommendation_model extends CI_Model{

    public function __construct()
    {
        parent::__construct();
        $this->_tables = getRecommendationTablesNames();
    }

    private function get_metas_group()
    {
        return array(
            'attribution_comment',
        );
    }

    public function getByEvaluationID($evaluationID){
        $recommendation = $this->db->get_where($this->_tables->recommendations, ['evaluation_id'=>$evaluationID])->row_array();
        return $this->getRecommendationMeta($recommendation);
    }

    public function setRecommendationActivities($recommendationID, $activities){
        $date = date(getRegularDateTimeFormat());
        if(!empty($activities)){
            foreach ($activities as $key=>$activity){
                if(trim(maybe_null_or_empty($activity, 'title'))==''){
                    unset($activities[$key]);
                    continue;
                }
                $activities[$key]['recommendation_id']=$recommendationID;
                $activities[$key]['created_at']=$date;
            }
        }
        $this->db->delete($this->_tables->activities, ['recommendation_id'=>$recommendationID]);
        $this->db->insert_batch($this->_tables->activities, $activities);
    }

    public function getFieldByEvaluationID($evaluationID, $field='id'){
        $this->db->select($field);
        $result = $this->db->get_where($this->_tables->recommendations, ['evaluation_id'=>$evaluationID])->row();
        return maybe_null_or_empty($result, $field, true);
    }

    public function getRecommendationActivities($recommendationID/*, $reOrderForRepeater=false*/){
        $results = $this->db->get_where($this->_tables->activities, ['recommendation_id'=>$recommendationID])->result_array();
        /*if(!empty($results) && $reOrderForRepeater){

        }*/
        return $results;
    }

    public function insertOrUpdateRecommendation($data, $recommendationID=''){
        $metas = $this->get_metas_group();
        $meta_datas = [];
        if (!empty($metas)) {
            foreach ($metas as $meta) {
                if (isset($data[$meta])) {
                    $meta_datas[$meta] = $data[$meta];
                    unset($data[$meta]);
                }
            }
        }
        if($recommendationID==''){
            $data['created_at']=date(getRegularDateTimeFormat());
            $this->db->insert($this->_tables->recommendations, $data);
            $recommendationID = $this->db->insert_id();
        }else{
            $data['updated_at']=date(getRegularDateTimeFormat());
            $this->db->insert($this->_tables->recommendations, $data, ['id'=>$recommendationID]);
        }
        if (!empty($meta_datas)) {
            foreach ($meta_datas as $key => $meta_data) {
                $this->update_meta($recommendationID, $key, $meta_data);
            }
        }
        return $recommendationID;
    }


    public function getRecommendationMeta(array $recommendationArrayData)
    {
        if (!empty($recommendationArrayData)) {
            $metas = $this->get_metas_group();
            if (!empty($metas)) {
                foreach ($metas as $meta) {
                    $recommendationArrayData[$meta] = $this->get_meta($recommendationArrayData['id'], $meta);
                }
            }
        }
        return $recommendationArrayData;
    }

    public function get_meta($id, $key)
    {
        return get_meta($id, $key, $this->_tables->meta, 'recommendation_id');
    }

    public function update_meta($id, $key, $value)
    {
        update_meta($id, $key, $value, $this->_tables->meta, 'recommendation_id');
    }
}