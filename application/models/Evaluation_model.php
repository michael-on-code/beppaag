<?php

/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 16/11/2019
 * Time: 09:17
 */
class Evaluation_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->_tables = getEvaluationTablesNames();
    }

    public function getDistinctYears($forSelect2=false, $defaultSelect2FirstOptionValue=''){
        $this->db->distinct();
        $this->db->select('year');
        $years = $this->db->get($this->_tables->evaluations)->result_array();
        if($forSelect2){
            $temp=[''=>$defaultSelect2FirstOptionValue];
            if(!empty($years)){
                foreach ($years as $value){
                    $temp[$value['year']]=$value['year'];
                }
            }
            return $temp;
        }
        return $years;
    }

    public function getMinifiedAll($select = '*', $onlyActiveOnes=true, $page=0, $limit=8, $order=true, $orderByField='id', $orderBy='desc'){
        $this->db->select($select);
        $this->db->limit($limit, $page);
        if ($onlyActiveOnes) {
            $this->db->where(['active' => 1]);
        }
        if($order){
            $this->db->order_by($orderByField, $orderBy);
        }
        $evaluations = $this->db->get($this->_tables->evaluations)->result();
        $countResult = count($evaluations);
        $this->db->reset_query();
        $this->db->select('id');
        if ($onlyActiveOnes) {
            $this->db->where(['active' => 1]);
        }
        $data = [
            'evaluations'=>$evaluations,
            'total'=>$this->db->count_all_results($this->_tables->evaluations, TRUE),
            'start'=>($start=$page*$limit)+1,
            'currentOffset'=>$page+1,
            'end'=>$start+$countResult,
            'countResult'=>$countResult
        ];
        $this->db->reset_query();
        return $data;

    }

    public function getAll($onlyActiveOnes = true, $sectorsInString = true, $thematicsInString = true, $resultInArray = true, $order=true, $orderByField='id', $orderBy='desc')
    {
        $tables = $this->_tables;
        $recommendationTables = getRecommendationTablesNames();
        //$this->load->model('recommendation_model');

        //$recommendationsIDs = $this->recommendation_model->getByEvaluationID()
        //$recommendationIDs = implode()
        $this->db->select("$tables->evaluations.*, $tables->types.name as type, $tables->temporalities.name as temporality, 
        $tables->leading_authorities.name as leading_authority, $tables->contracting_authorities.name as contracting_authority, 
       users.first_name, users.last_name, (SELECT COUNT($recommendationTables->activities.execution_level) FROM $recommendationTables->activities 
       where $recommendationTables->activities.execution_level = 'executed' AND $recommendationTables->activities.recommendation_id IN 
       (SELECT $recommendationTables->recommendations.id FROM $recommendationTables->recommendations where evaluation_id = $tables->evaluations.id)) as executed_count, 
       (SELECT COUNT($recommendationTables->activities.execution_level) FROM $recommendationTables->activities 
       where $recommendationTables->activities.recommendation_id IN 
       (SELECT $recommendationTables->recommendations.id FROM $recommendationTables->recommendations where evaluation_id = $tables->evaluations.id)) as total_recommendation_activities_count");
        if ($onlyActiveOnes) {
            $this->db->where(['active' => 1]);
        }
        //$this->db->having(array('executed_count =' => 'My Title', 'id <' => $id));
        $this->db->join($tables->types, "$tables->types.id = $tables->evaluations.type_id");
        $this->db->join($tables->temporalities, "$tables->temporalities.id = $tables->evaluations.temporality_id");
        $this->db->join($tables->leading_authorities, "$tables->leading_authorities.id = $tables->evaluations.leading_authority_id");
        $this->db->join($tables->contracting_authorities, "$tables->contracting_authorities.id = $tables->evaluations.contracting_authority_id");
        $this->db->join('users', "users.id = $tables->evaluations.created_by");
        //$this->db->join($recommendationTables->recommendations, "$recommendationTables->recommendations.evaluation_id = $tables->evaluations.id");
        //$this->db->join($recommendationTables->activities, "$recommendationTables->activities.recommendation_id = $recommendationTables->recommendations.id");
        //$this->db->group_by(["U_recommendation_id"]);
        if($order){
            $this->db->order_by($orderByField, $orderBy);
        }
        $evaluations = $this->db->get($this->_tables->evaluations)->result_array();
        //var_dump($evaluations);exit;
        if (!empty($evaluations)) {
            foreach ($evaluations as $key => $evaluation) {
                $evaluations[$key] = $this->getEvaluationMeta($evaluation);
                $sectors = $this->getSectorsByEvaluationID($evaluation['id']);
                $thematics = $this->getThematicsByEvaluationID($evaluation['id']);
                if ($sectorsInString) {
                    $temp = [];
                    foreach ($sectors as $sector) {
                        $temp[] = maybe_null_or_empty($sector, 'name');
                    }
                    $sectors = implode(' | ', $temp);
                }
                if ($thematicsInString) {
                    $temp = [];
                    foreach ($thematics as $thematic) {
                        $temp[] = maybe_null_or_empty($thematic, 'name');
                    }
                    $thematics = implode(' | ', $temp);
                }
                $evaluations[$key]['sector'] = $sectors;
                $evaluations[$key]['thematic'] = $thematics;
                if (!$resultInArray) {
                    $evaluations[$key] = (object)$evaluations[$key];
                }
            }
        }
        return $evaluations;
    }

    public function getEvaluationMeta(array $evaluationArrayData)
    {
        if (!empty($evaluationArrayData)) {
            $metas = $this->get_metas_group();
            if (!empty($metas)) {
                foreach ($metas as $meta) {
                    $evaluationArrayData[$meta] = $this->get_meta($evaluationArrayData['id'], $meta);
                }
            }
        }
        return $evaluationArrayData;
    }

    private function get_metas_group()
    {
        return array(
            'cover_photo',
            'evaluation_file',
            'objective',
            'description',
            'methodological_approach',
            'recommendation_actor_associated',
            'recommendation_comment',
        );
    }

    public function get_meta($id, $key)
    {
        return get_meta($id, $key, $this->_tables->meta, 'evaluation_id');
    }

    public function getSectorsByEvaluationID($evaluationID, $onlySectorIDs = false, $withName = true)
    {
        $tables = $this->_tables;
        if ($onlySectorIDs) {
            $select = "sector_id";
        } else {
            $select = "$tables->sector_group.*";
            if ($withName) {
                $select .= ", $tables->sectors.name";
                $this->db->join($tables->sectors, "$tables->sectors.id = $tables->sector_group.sector_id");
            }
        }
        $this->db->select($select);
        $result = $this->db->get_where($this->_tables->sector_group, ['evaluation_id' => $evaluationID])->result_array();
        if($onlySectorIDs){
            $temp=[];
            if(!empty($result)){
                foreach ($result as $value){
                    $temp[]=$value['sector_id'];
                }
            }
            return $temp;
        }
        return $result;
    }

    public function getThematicsByEvaluationID($evaluationID, $onlyThematicIDs = false, $withName = true)
    {
        $tables = $this->_tables;
        if ($onlyThematicIDs) {
            $select = "thematic_id";
        } else {
            $select = "$tables->thematic_group.*";
            if ($withName) {
                $select .= ", $tables->thematics.name";
                $this->db->join($tables->thematics, "$tables->thematics.id = $tables->thematic_group.thematic_id");
            }
        }
        $this->db->select($select);
        $result = $this->db->get_where($this->_tables->thematic_group, ['evaluation_id' => $evaluationID])->result_array();
        if($onlyThematicIDs){

            $temp=[];
            if(!empty($result)){
                foreach ($result as $value){
                    $temp[]=$value['thematic_id'];
                }
            }
            return $temp;
        }
        return $result;
    }

    public function getByID($evaluationID)
    {
        $evaluation = $this->db->get_where($this->_tables->evaluations, ['id' => $evaluationID])->row_array();
        if (!empty($evaluation)) {
            $evaluation = $this->getEvaluationMeta($evaluation);
            $evaluation['sector_id'] = $this->getSectorsByEvaluationID($evaluation['id'], true);
            $evaluation['thematic_id'] = $this->getThematicsByEvaluationID($evaluation['id'], true);
            $evaluation['questions'] = $this->getEvaluationQuestions($evaluation['id']);
            $this->load->model('recommendation_model');
            $evaluation['recommendations'] = $this->recommendation_model->getByEvaluationID($evaluation['id']);

        }
        return $evaluation;
    }

    public function updateEvaluationQuestions($evaluationID, $questionsData){
        if(!empty($questionsData)){
            $this->db->delete($this->_tables->questions, ['evaluation_id'=>$evaluationID]);
            foreach ($questionsData as $key=>$question){
                if(maybe_null_or_empty($question, 'title')==''){
                    unset($questionsData[$key]);
                    continue;
                }
                $questionsData[$key]['evaluation_id']=$evaluationID;
            }
            $this->db->insert_batch($this->_tables->questions, $questionsData);
        }

    }

    public function getEvaluationQuestions($evaluationID){
        return $this->db->get_where($this->_tables->questions, ['evaluation_id'=>$evaluationID])->result_array();
    }

    public function insertOrUpdateEvaluation($update=false, $evaluation, $evaluationID = '', $isActorAssociated=true, $questionsData=[], $recommendationsData)
    {
        $this->load->model('recommendation_model');
        //TODO $evaluation for logs
        $data = $evaluation;
        $sectors = $data['sector_id'];
        $thematics = $data['thematic_id'];
        unset($data['sector_id'], $data['thematic_id']);
        $data['recommendation_actor_associated']=(int) maybe_null_or_empty($data, 'recommendation_actor_associated');
        if($isActorAssociated){
            //recommendations
            $data['recommendation_start_date'] = convert_date_to_english($data['recommendation_start_date']);
        }else{
            unset($data['recommendation_actor_id'], $data['recommendation_comment'], $data['recommendation_start_date']);
        }
        //metas
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
        if ($evaluationID == '' && !$update) {
            if(user_can('editor')){
                $data['active']=1;
            }
            $data['slug'] = getSlugifyString($data['title'], true, true, true, 40) . uniqid();
            $data['created_by'] = get_current_user_id();
            $data['created_at'] = date(getRegularDateTimeFormat());
            $this->db->insert($this->_tables->evaluations, $data);
            $evaluationID = $this->db->insert_id();

        } else {
            $data['updated_at'] = date(getRegularDateTimeFormat());
            $this->db->update($this->_tables->evaluations, $data, ['id' => $evaluationID]);
        }
        $sectorToInsert = [];
        foreach ($sectors as $key => $sectorID) {
            $sectorToInsert[$key]['sector_id'] = $sectorID;
            $sectorToInsert[$key]['evaluation_id'] = $evaluationID;
        }
        $thematicToInsert = [];
        foreach ($thematics as $key => $thematicID) {
            $thematicToInsert[$key]['thematic_id'] = $thematicID;
            $thematicToInsert[$key]['evaluation_id'] = $evaluationID;
        }
        if (!empty($meta_datas)) {
            foreach ($meta_datas as $key => $meta_data) {
                $this->update_meta($evaluationID, $key, $meta_data);
            }
        }
        $this->insertOrUpdateEvaluationSectorGroup($sectorToInsert, 'evaluation_id', $evaluationID);
        $this->insertOrUpdateEvaluationThematicGroup($thematicToInsert, 'evaluation_id', $evaluationID);
        $this->updateEvaluationQuestions($evaluationID, $questionsData);
        if(!$isActorAssociated){
            $this->recommendation_model->updateRecommendationWithActivitiesForEvaluation($evaluationID, $recommendationsData);
        }
        return $evaluationID;
    }

    public function update_meta($id, $key, $value)
    {
        update_meta($id, $key, $value, $this->_tables->meta, 'evaluation_id');
    }

    public function insertOrUpdateEvaluationSectorGroup($data, $checkField, $checkFieldValue)
    {
        if(!empty($data)){
            $this->db->delete($this->_tables->sector_group, array($checkField => $checkFieldValue));
            $this->db->insert_batch($this->_tables->sector_group, $data);
        }
    }

    public function insertOrUpdateEvaluationThematicGroup($data, $checkField, $checkFieldValue)
    {
        if(!empty($data)){
            $this->db->delete($this->_tables->thematic_group, array($checkField => $checkFieldValue));
            $this->db->insert_batch($this->_tables->thematic_group, $data);
        }
    }

    public function insertorUpdateSector($data, $id = '')
    {
        if ($id == '') {
            $this->db->insert($this->_tables->sectors, $data);
            $id = $this->db->insert_id();
        } else {
            $this->db->update($this->_tables->sectors, $data, ['id' => $id]);
        }
        return $id;
    }

    public function getSectorIDBySlug($sectorSlug)
    {
    }

    public function insertorUpdateLeadingAuthority($data, $id = '')
    {
        if ($id == '') {
            $this->db->insert($this->_tables->leading_authorities, $data);
            $id = $this->db->insert_id();
        } else {
            $this->db->update($this->_tables->leading_authorities, $data, ['id' => $id]);
        }
        return $id;
    }

    public function insertorUpdateContractingAuthority($data, $id = '')
    {
        if ($id == '') {
            $this->db->insert($this->_tables->contracting_authorities, $data);
            $id = $this->db->insert_id();
        } else {
            $this->db->update($this->_tables->contracting_authorities, $data, ['id' => $id]);
        }
        return $id;
    }

    public function insertorUpdateThematic($data, $id = '')
    {
        if ($id == '') {
            $this->db->insert($this->_tables->thematics, $data);
            $id = $this->db->insert_id();
        } else {
            $this->db->update($this->_tables->thematics, $data, ['id' => $id]);
        }
        return $id;
    }

    public function insertorUpdateTypes($data, $id = '')
    {
        if ($id == '') {
            $this->db->insert($this->_tables->types, $data);
            $id = $this->db->insert_id();
        } else {
            $this->db->update($this->_tables->types, $data, ['id' => $id]);
        }
        return $id;
    }

    public function insertorUpdateTemporalities($data, $id = '')
    {
        if ($id == '') {
            $this->db->insert($this->_tables->temporalities, $data);
            $id = $this->db->insert_id();
        } else {
            $this->db->update($this->_tables->temporalities, $data, ['id' => $id]);
        }
        return $id;
    }

    public function getAllMetasForEvaluation(array $evaluationArrayData)
    {
        $metas = $this->getAllMetas($evaluationArrayData['id']);
        if (!empty($metas)) {
            return array_merge($evaluationArrayData, $metas);
        }
        return $evaluationArrayData;
    }

    public function getAllMetas($id)
    {
        return get_metas($id, $this->_tables->meta, 'evaluation_id');
    }


}