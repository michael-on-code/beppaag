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

    public function getByEvaluationID($evaluationID, $select="*", $withMetas=true){
        $this->db->select($select);
        $recommendations = $this->db->get_where($this->_tables->recommendations, ['evaluation_id'=>$evaluationID])->result_array();
        if($withMetas){
            if(!empty($recommendations)){
                foreach ($recommendations as $key=>$recommendation){
                    $recommendations[$key]=$this->getRecommendationMeta($recommendation);
                    $recommendations[$key]['activities']=$this->getRecommendationActivities($recommendation['id']);
                }
            }
        }
        return $recommendations;
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

    public function updateRecommendationWithActivitiesForEvaluation($evaluationID, $recommendationData){
        if(!empty($recommendationData)){
            $activitiesTable = $this->_tables->activities;
            $recommendationTable = $this->_tables->recommendations;
            $globalActivities = [];
            $this->db->query("DELETE from $activitiesTable where recommendation_id IN (SELECT id from $recommendationTable where evaluation_id = $evaluationID)");
            $this->db->delete($this->_tables->recommendations, ['evaluation_id'=>$evaluationID]);
            foreach ($recommendationData as $key=>$recommendation){
                if(maybe_null_or_empty($recommendation, 'title')==''){
                    continue;
                }
                $activities = maybe_null_or_empty($recommendation, 'activities', true);
                unset($recommendation['activities']);
                $data = $recommendation;
                $data['evaluation_id']=$evaluationID;
                $this->db->insert($this->_tables->recommendations, $data);
                $recommendationID =$this->db->insert_id();
                if(!empty($activities)){
                    foreach ($activities as $key=> $activity){
                        if(maybe_null_or_empty($activity, 'title')==''){
                            continue;
                        }
                        $activities[$key]['recommendation_id']=$recommendationID;
                        $activities[$key]['start_date']=convert_date_to_english($activities[$key]['start_date']);
                        $activities[$key]['end_date']=convert_date_to_english($activities[$key]['end_date']);
                        $globalActivities[] = $activities[$key];
                    }
                }
            }
            if(!empty($globalActivities)){
                $this->db->insert_batch($this->_tables->activities, $globalActivities);
            }
        }
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