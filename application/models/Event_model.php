<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 26/11/2019
 * Time: 08:35
 */

class Event_model extends CI_Model{

    public function __construct()
    {
        parent::__construct();
        $this->_tables = getEventTablesNames();
    }

    private function get_metas_group()
    {
        return array(
            'content',
            'thumbnail',
            'updated_by'//user who created user
        );
    }

    public function getByID($eventID, $onlyTags=true, $withTagName=true, $withTagSlug=false,$returnTagResult=false){
        $table=$this->_tables;
        $this->db->select("$table->events.*, $table->categories.name as category");
        $this->db->join($table->categories, "$table->categories.id = $table->events.category_id");
        $event = $this->db->get_where($this->_tables->events, ["$table->events.id" => $eventID])->row_array();
        if (!empty($event)) {
            $event = $this->getEventMeta($event);
            $event['tag_id'] = $this->getTagsByEventID($event['id'], $onlyTags,$withTagName,$withTagSlug,$returnTagResult);

        }
        return $event;
    }

    public function trash($eventID){
        $this->db->update($this->_tables->events, ['active'=>2], ['id'=>$eventID]);
    }
    public function activate($eventID){
        $this->db->update($this->_tables->events, ['active'=>1], ['id'=>$eventID]);
    }



    public function getAll($onlyActiveOnes=true, $tagsInString=true, $resultInArray=true, $order=true,
						   $orderByField='id', $orderBy='desc', $onlyDeletedOnes=false,
						   $limit=0,$withAuthorImage=false, $page=1, $checkInCategoryList=[],
                           $checkInTagList=[], $eventIDsNotIn=[], $eventTagIn=[],
                           $eventIDsIn=[], $countResult=false, $eventsToComeOnly=false){
        $tables = $this->_tables;
        $this->db->distinct();
        $this->db->select("$tables->events.*, $tables->categories.name as category, users.first_name, users.last_name");
        $this->db->join($tables->categories, "$tables->categories.id = $tables->events.category_id");
        $this->db->join('users', "users.id = $tables->events.created_by");
        if($onlyDeletedOnes){
            $this->db->where(["$tables->events.active"=>2]);
        }elseif($onlyActiveOnes){
            $this->db->where(["$tables->events.active"=>1]);
        }
        if($order){
            $this->db->order_by($orderByField, $orderBy);
        }
        if(!empty($checkInCategoryList)){
            $this->db->where_in("$tables->events.category_id", $checkInCategoryList);
        }
        if(!empty($checkInTagList)){
            $this->db->join($tables->tag_group, "$tables->tag_group.event_id = $tables->events.id");
            $this->db->or_where_in("$tables->tag_group.id", $checkInCategoryList);
        }
        if(!empty($eventTagIn)){
            $this->db->join($tables->tag_group, "$tables->tag_group.event_id = $tables->events.id");
            $this->db->where_in("$tables->tag_group.id", $eventTagIn);
        }

        if(!empty($eventIDsNotIn)){
            $this->db->where_not_in("$tables->events.id", $eventIDsNotIn);
        }
        if(!empty($eventIDsIn)){
            $this->db->where_in("$tables->events.id", $eventIDsIn);
        }
        if($eventsToComeOnly){
			$this->db->where("$tables->events.starts_at >=", date(getRegularDateTimeFormat()));
		}
        if($countResult){
            return $this->db->count_all_results($this->_tables->events);
        }

        if($limit){
            if($page){
                $offset = ($page-1)*$limit;
                $this->db->limit($limit, $offset);
            }else{
                $this->db->limit($limit);
            }

        }
        $events = $this->db->get($this->_tables->events)->result_array();
        if(!empty($events)){
            foreach ($events as $key=>$event){
                $events[$key]=$this->getEventMeta($event);
                $tags = $this->getTagsByEventID($event['id']);
                if ($tagsInString) {
                    $temp = [];
                    foreach ($tags as $tag) {
                        $temp[] = maybe_null_or_empty($tag, 'name');
                    }
                    $tags = implode(' | ', $temp);
                }
                if($withAuthorImage){
                    $this->load->model('user_model');
                    $events[$key]['user_photo']=$this->user_model->get_meta($events[$key]['created_by'], 'user_photo');
                }
                $events[$key]['tag'] = $tags;
                if (!$resultInArray) {
                    $events[$key] = (object)$events[$key];
                }
            }
        }
        return $events;
    }


    public function getTagsByEventID($eventID, $onlyTagIDs = false, $withName = true, $withSlug=false, $returnResult=false){
        $tables = $this->_tables;
        if ($onlyTagIDs) {
            $select = "tag_id";
        } else {
            $select = "$tables->tag_group.*";
            if ($withName || $withSlug) {
                if($withName){
                    $select .= ", $tables->tags.name";
                }
                if ($withSlug) {
                    $select .= ", $tables->tags.slug";
                }
                $this->db->join($tables->tags, "$tables->tags.id = $tables->tag_group.tag_id");
            }
        }
        $this->db->select($select);
        $result = $this->db->get_where($this->_tables->tag_group, ['event_id' => $eventID])->result_array();
        if($returnResult){
            return $result;
        }
        if($onlyTagIDs){
            $temp=[];
            if(!empty($result)){
                foreach ($result as $value){
                    $temp[]=$value['tag_id'];
                }
            }
            return $temp;
        }
        return $result;
    }

    public function insertOrUpdateEvent($event, $eventID=''){
        //TODO send $event to logs
        $data = $event;
        $tags = $data['tag_id'];
        $data['starts_at']=convert_date_to_english($data['starts_at']);
        $data['ends_at']=convert_date_to_english($data['ends_at']);
        unset($data['tag_id']);
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
        if($eventID==''){
            $data['slug'] = getSlugifyString($data['title'], true, true, true, 40) . uniqid();
            $data['created_by'] = get_current_user_id();
            $data['created_at'] = date(getRegularDateTimeFormat());
            $this->db->insert($this->_tables->events, $data);
            $eventID = $this->db->insert_id();
        }else{
            $data['updated_at'] = date(getRegularDateTimeFormat());
            $this->db->update($this->_tables->events, $data, ['id' => $eventID]);
        }
        $tagToInsert = [];
        if(!empty($tags)){
            foreach ($tags as $key => $tagID) {
                $tagToInsert[$key]['tag_id'] = $tagID;
                $tagToInsert[$key]['event_id'] = $eventID;
            }
        }

        if (!empty($meta_datas)) {
            foreach ($meta_datas as $key => $meta_data) {
                $this->update_meta($eventID, $key, $meta_data);
            }
        }
        $this->insertOrUpdateEventTagGroup($tagToInsert, 'event_id', $eventID);
        return $eventID;
    }

    public function insertOrUpdateEventTagGroup($data, $checkField, $checkFieldValue)
    {
        if(!empty($data)){
            $this->db->delete($this->_tables->tag_group, array($checkField => $checkFieldValue));
            $this->db->insert_batch($this->_tables->tag_group, $data);
        }

    }

    public function insertorUpdateCategory($data, $id=''){
        if ($id == '') {
            $this->db->insert($this->_tables->categories, $data);
            $id = $this->db->insert_id();
        } else {
            $this->db->update($this->_tables->categories, $data, ['id' => $id]);
        }
        return $id;
    }
    public function insertorUpdateTag($data, $id=''){
        if ($id == '') {
            $this->db->insert($this->_tables->tags, $data);
            $id = $this->db->insert_id();
        } else {
            $this->db->update($this->_tables->tags, $data, ['id' => $id]);
        }
        return $id;
    }

    public function update_meta($id, $key, $value)
    {
        update_meta($id, $key, $value, $this->_tables->meta, 'event_id');
    }

    public function get_meta($id, $key)
    {
        return get_meta($id, $key, $this->_tables->meta, 'event_id');
    }

    public function getEventMeta(array $eventArrayData)
    {
        if (!empty($eventArrayData)) {
            $metas = $this->get_metas_group();
            if (!empty($metas)) {
                foreach ($metas as $meta) {
                    $eventArrayData[$meta] = $this->get_meta($eventArrayData['id'], $meta);
                }
            }
        }
        return $eventArrayData;
    }


}
