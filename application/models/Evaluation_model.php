<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 16/11/2019
 * Time: 09:17
 */
class Evaluation_model extends CI_Model{

    public function __construct()
    {
        parent::__construct();
        $this->_tables = getEvaluationTablesNames();
    }

    private function get_metas_group()
    {
        return array(
            'cover_photo'
        );
    }



    public function insertorUpdateSector($data, $id=''){
        if($id == ''){
            $this->db->insert($this->_tables->sectors, $data);
            $id = $this->db->insert_id();
        }else{
            $this->db->update($this->_tables->sectors, $data, ['id'=>$id]);
        }
        return $id;
    }

    public function getSectorIDBySlug($sectorSlug){}

    public function insertorUpdateLeadingAuthority($data, $id=''){
        if($id == ''){
            $this->db->insert($this->_tables->leading_authorities, $data);
            $id = $this->db->insert_id();
        }else{
            $this->db->update($this->_tables->leading_authorities, $data, ['id'=>$id]);
        }
        return $id;
    }

    public function insertorUpdateContractingAuthority($data, $id=''){
        if($id == ''){
            $this->db->insert($this->_tables->contracting_authorities, $data);
            $id = $this->db->insert_id();
        }else{
            $this->db->update($this->_tables->contracting_authorities, $data, ['id'=>$id]);
        }
        return $id;
    }

    public function insertorUpdateThematic($data, $id=''){
        if($id == ''){
            $this->db->insert($this->_tables->thematics, $data);
            $id = $this->db->insert_id();
        }else{
            $this->db->update($this->_tables->thematics, $data, ['id'=>$id]);
        }
        return $id;
    }

    public function insertorUpdateTypes($data, $id=''){
        if($id == ''){
            $this->db->insert($this->_tables->types, $data);
            $id = $this->db->insert_id();
        }else{
            $this->db->update($this->_tables->types, $data, ['id'=>$id]);
        }
        return $id;
    }

    public function insertorUpdateTemporalities($data, $id=''){
        if($id == ''){
            $this->db->insert($this->_tables->temporalities, $data);
            $id = $this->db->insert_id();
        }else{
            $this->db->update($this->_tables->temporalities, $data, ['id'=>$id]);
        }
        return $id;
    }

    public function insertOrUpdateEvaluationSectorGroup($data, $checkField='', $checkFieldValue=''){
        if($checkField==''){
            $this->db->insert($this->_tables->sector_group, $data);
        }else{
            $this->db->update($this->_tables->sector_group, $data, [$checkFieldValue=>$checkFieldValue]);
        }
    }

    public function insertOrUpdateEvaluationThematicGroup($data, $checkField='', $checkFieldValue=''){
        if($checkField==''){
            $this->db->insert($this->_tables->thematic_group, $data);
        }else{
            $this->db->update($this->_tables->thematic_group, $data, [$checkFieldValue=>$checkFieldValue]);
        }
    }

    public function getEvaluationMeta(array $evaluationArrayData)
    {
        if (!empty($evaluationArrayData)) {
            $metas = $this->get_metas_group();
            if (!empty($metas)) {
                foreach ($metas as $meta) {
                    $userArrayData[$meta] = $this->get_meta($evaluationArrayData['id'], $meta);
                }
            }
        }
        return $evaluationArrayData;
    }

    public function getAllMetasForEvaluation(array $evaluationArrayData){
        $metas = $this->getAllMetas($evaluationArrayData['id']);
        if(!empty($metas)){
            return array_merge($evaluationArrayData, $metas);
        }
        return $evaluationArrayData;
    }

    public function getAllMetas($id){
        return get_metas($id, $this->_tables->meta, 'evaluation_id');
    }

    public function get_meta($id, $key)
    {
        return get_meta($id, $key, $this->_tables->meta, 'evaluation_id');
    }

    public function update_meta($id, $key, $value)
    {
        update_meta($id, $key, $value, $this->_tables->meta, 'evaluation_id');
    }


}