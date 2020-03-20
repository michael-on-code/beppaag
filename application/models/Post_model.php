<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 26/11/2019
 * Time: 08:35
 */

class Post_model extends CI_Model{

    public function __construct()
    {
        parent::__construct();
        $this->_tables = getPostTablesNames();
    }

    private function get_metas_group()
    {
        return array(
            'content',
            'thumbnail',
            'attachment',
            'updated_by'//user who created user
        );
    }


    
    public function getByID($postID, $onlyTags=true, $withTagName=true, $withTagSlug=false,$returnTagResult=false){
        $table=$this->_tables;
        $this->db->select("$table->posts.*, $table->categories.name as category");
        $this->db->join($table->categories, "$table->categories.id = $table->posts.category_id");
        $post = $this->db->get_where($this->_tables->posts, ["$table->posts.id" => $postID])->row_array();
        if (!empty($post)) {
            $post = $this->getPostMeta($post);
            $post['tag_id'] = $this->getTagsByPostID($post['id'], $onlyTags,$withTagName,$withTagSlug,$returnTagResult);

        }
        return $post;
    }

    public function getRelatedPosts($categoryList, $tagList){

    }

    public function trash($postID){
        $this->db->update($this->_tables->posts, ['active'=>2], ['id'=>$postID]);
    }
    public function activate($postID){
        $this->db->update($this->_tables->posts, ['active'=>1], ['id'=>$postID]);
    }



    public function getAll($onlyActiveOnes=true, $tagsInString=true, $resultInArray=true,
                           $order=true, $orderByField='id', $orderBy='desc', $onlyDeletedOnes=false, $limit=0,
                           $withAuthorImage=false, $page=1, $checkInCategoryList=[],
                           $checkInTagList=[], $postIDsNotIn=[], $postTagIn=[],
                           $postIDsIn=[], $countResult=false){
        $tables = $this->_tables;
        $this->db->distinct();
        $this->db->select("$tables->posts.*, $tables->categories.name as category, users.first_name, users.last_name");
        $this->db->join($tables->categories, "$tables->categories.id = $tables->posts.category_id");
        $this->db->join('users', "users.id = $tables->posts.created_by");
        if($onlyDeletedOnes){
            $this->db->where(["$tables->posts.active"=>2]);
        }elseif($onlyActiveOnes){
            $this->db->where(["$tables->posts.active"=>1]);
        }
        if($order){
            $this->db->order_by($orderByField, $orderBy);
        }
        if(!empty($checkInCategoryList)){
            $this->db->where_in("$tables->posts.category_id", $checkInCategoryList);
        }
        if(!empty($checkInTagList)){
            $this->db->join($tables->tag_group, "$tables->tag_group.post_id = $tables->posts.id");
            $this->db->or_where_in("$tables->tag_group.id", $checkInCategoryList);
        }
        if(!empty($postTagIn)){
            $this->db->join($tables->tag_group, "$tables->tag_group.post_id = $tables->posts.id");
            $this->db->where_in("$tables->tag_group.id", $postTagIn);
        }

        if(!empty($postIDsNotIn)){
            $this->db->where_not_in("$tables->posts.id", $postIDsNotIn);
        }
        if(!empty($postIDsIn)){
            $this->db->where_in("$tables->posts.id", $postIDsIn);
        }
        if($countResult){
            return $this->db->count_all_results($this->_tables->posts);
        }

        if($limit){
            if($page){
                $offset = ($page-1)*$limit;
                $this->db->limit($limit, $offset);
            }else{
                $this->db->limit($limit);
            }

        }
        $posts = $this->db->get($this->_tables->posts)->result_array();
        if(!empty($posts)){
            foreach ($posts as $key=>$post){
                $posts[$key]=$this->getPostMeta($post);
                $tags = $this->getTagsByPostID($post['id']);
                if ($tagsInString) {
                    $temp = [];
                    foreach ($tags as $tag) {
                        $temp[] = maybe_null_or_empty($tag, 'name');
                    }
                    $tags = implode(' | ', $temp);
                }
                if($withAuthorImage){
                    $this->load->model('user_model');
                    $posts[$key]['user_photo']=$this->user_model->get_meta($posts[$key]['created_by'], 'user_photo');
                }
                $posts[$key]['tag'] = $tags;
                if (!$resultInArray) {
                    $posts[$key] = (object)$posts[$key];
                }
            }
        }
        return $posts;
    }
    
    public function getTagsByPostID($postID, $onlyTagIDs = false, $withName = true, $withSlug=false, $returnResult=false){
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
        $result = $this->db->get_where($this->_tables->tag_group, ['post_id' => $postID])->result_array();
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

    public function insertOrUpdatePost($post, $postID=''){
        //TODO send $post to logs
        $data = $post;
        $tags = $data['tag_id'];
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
        if($postID==''){
            $data['slug'] = getSlugifyString($data['title'], true, true, true, 40) . uniqid();
            $data['created_by'] = get_current_user_id();
            $data['created_at'] = date(getRegularDateTimeFormat());
            $this->db->insert($this->_tables->posts, $data);
            $postID = $this->db->insert_id();
        }else{
            $data['updated_at'] = date(getRegularDateTimeFormat());
            $this->db->update($this->_tables->posts, $data, ['id' => $postID]);
        }
        $tagToInsert = [];
        if(!empty($tags)){
            foreach ($tags as $key => $tagID) {
                $tagToInsert[$key]['tag_id'] = $tagID;
                $tagToInsert[$key]['post_id'] = $postID;
            }
        }

        if (!empty($meta_datas)) {
            foreach ($meta_datas as $key => $meta_data) {
                $this->update_meta($postID, $key, $meta_data);
            }
        }
        $this->insertOrUpdatePostTagGroup($tagToInsert, 'post_id', $postID);
        return $postID;
    }

    public function insertOrUpdatePostTagGroup($data, $checkField, $checkFieldValue)
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
        update_meta($id, $key, $value, $this->_tables->meta, 'post_id');
    }

    public function get_meta($id, $key)
    {
        return get_meta($id, $key, $this->_tables->meta, 'post_id');
    }

    public function getPostMeta(array $postArrayData)
    {
        if (!empty($postArrayData)) {
            $metas = $this->get_metas_group();
            if (!empty($metas)) {
                foreach ($metas as $meta) {
                    $postArrayData[$meta] = $this->get_meta($postArrayData['id'], $meta);
                }
            }
        }
        return $postArrayData;
    }


}
