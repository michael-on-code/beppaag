<?php
/**
 * Created by PhpStorm.
 * User: Mike
 * Date: 29/01/2018
 * Time: 13:54
 */
defined('BASEPATH') OR exit('No direct script access allowed');
function getFormSubmit($label, $additionalClass = '', $disabled = false, $class = "btn btn-primary m-l-5")
{
    ?>
    <button type="submit" class="<?= $class . ' ' . $additionalClass ?>" <?= $disabled ? 'disabled' : '' ?>>
        <span><?= $label ?></span>
        <i class="anticon anticon-loading m-l-5"></i>
    </button>
    <?php
}

function googleRecaptchaCurl1(array $data)
{
    //var_dump($data);exit;
    //$json = json_encode($data);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    //curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Content-Length: ' . strlen($json)));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $ret = curl_exec($ch);
    return $ret;
}

function getCountInTable($table, $where = false, $whereArray = [])
{
    $ci =& get_instance();;
    $ci->db->from($table);
    if ($where) {
        $ci->db->where($whereArray);
    }
    return $ci->db->count_all_results();
}

function get_form_error($name)
{
    return form_error($name, '<p class="form-error">', '</p>');
}

function getSpecificImageSizeDimensions($sizeName)
{
    return maybe_null_or_empty(getAllImageSizes(), $sizeName, true);
}

function getUploadedImageBySize($imageFullName, $imageSize = '', $withFullUrl = true)
{
	if(!$imageFullName){
		return '';
	}
    $allSizes = getAllImageSizes();
    if (!($imageSize == '' || !isset($allSizes[$imageSize]))) {
        $info = pathinfo($imageFullName);
        if (!empty($info)) {
            $imageFullName = maybe_null_or_empty($info, 'filename') . '-' . $imageSize . '.' . maybe_null_or_empty($info, 'extension');
        }
    }
    return ($withFullUrl ? get_upload_path() : '') . $imageFullName;
}

function getAllImageSizes()
{
    return [
        '82x75' => [//post-preview-smallest
            'width' => 82,
            'height' => 75,
        ],
        '150x150' => [//flat-icon
            'width' => 150,
            'height' => 150,
        ],
        '263x84' => [//footer-logo
            'width' => 263,
            'height' => 84,
        ],
        '263x200' => [//post-preview-small
            'width' => 263,
            'height' => 200,
        ],
        '360x260' => [//event-preview-small
            'width' => 360,
            'height' => 260,
        ],
        '360x420' => [//special-guest-preview
            'width' => 360,
            'height' => 420,
        ],
		'445x350' => [//director-photo-preview
            'width' => 445,
            'height' => 350,
        ],
		'445x520' => [//team-photo-preview
            'width' => 445,
            'height' => 520,
        ],
        '345x119' => [//logo
            'width' => 345,
            'height' => 119,
        ],
        '640x940' => [//login-image-banner
            'width' => 640,
            'height' => 940,
        ],
        '848x420' => [//event-preview-large
            'width' => 848,
            'height' => 420,
        ],
        '900x420' => [//post-preview-large
            'width' => 900,
            'height' => 420,
        ],
        '1024x649' => [//public-banner
            'width' => 1024,
            'height' => 649,
        ],
		'1920x700' => [//public-slide
            'width' => 1920,
            'height' => 700,
//            'maintain_ratio' => FALSE,
            'master_dim' => 'width',
        ],
		'640x940' => [//public-slide
            'width' => 1920,
            'height' => 700,
//            'maintain_ratio' => FALSE,
            'master_dim' => 'height',
        ],

    ];
}

function upload_data($args, $names, $resize = false, $encryptName = true)
{
    $args['encrypt_name'] = $encryptName;
//    var_dump($args);exit;
    $ci =& get_instance();
    $ci->load->library('upload', $args);
    $data = array();
    if (!empty($names)) {
        foreach ($names as $name) {
            if ($ci->upload->do_upload($name)) {
                $data[$name] = $ci->upload->data();
                if ($resize && $data[$name]['is_image']) {
                    $config2 = [];
                    $config2['image_library'] = 'gd2';
                    $config2['source_image'] = $data[$name]['full_path'];
                    $sizes = getAllImageSizes();
                    if (!empty($sizes)) {
                        foreach ($sizes as $keySize => $size) {
                            $config2['new_image'] = $data[$name]['file_path'] . $data[$name]['raw_name'] . '-' . $keySize . $data[$name]['file_ext'];
                            $config2['maintain_ratio'] =  maybe_null_or_empty($size, 'maintain_ratio', false, TRUE);
                            $config2['master_dim'] = maybe_null_or_empty($size, 'master_dim', false, 'auto');
                            $config2['width'] = $size['width'];
                            $config2['height'] = $size['height'];
                            $ci->load->library('image_lib', $config2);
                            $ci->image_lib->resize();
                            unset($ci->image_lib);
                        }
                    }

                }
            }
        }

    }
    return $data;
}


function get_upload_path($additional = "uploads/")
{
    return base_url($additional);
}

function getFieldInfo($info)
{
    ?>
    <span class="form-text text-muted"><?php echo $info ?></span>
    <?php
}

function get_warning_message($msg = "", $delay = '')
{
    $msg = $msg == "" ? 'Action non authorisée' : $msg;
    set_flashdata($msg, 'warning', $delay);
}

function get_info_message($msg, $delay = '')
{
    set_flashdata($msg, 'info', $delay);
}

function pro_url($url = '')
{
    return site_url("admin/$url");
}

function pro_redirect($uri = '', $method = 'auto', $code = NULL)
{
    if ($uri == '/') {
        $uri == '';
    }
    redirect("admin/$uri", $method, $code);
}


function insertOrUpdateInTable($table, $data, $userID = '')
{
    $ci =& get_instance();
    if ($userID == '') {
        $ci->db->insert($table, $data);
        $userID = $ci->db->insert_id();
    } else {
        $ci->db->update($table, $data, ['id' => $userID]);
    }
    return $userID;
}

function get_error_message($msg = "", $delay = '')
{
    $msg = ($msg != '') ? $msg : 'Veuillez remplir tous les critères';
    set_flashdata($msg, 'danger', $delay);
}

function megaUnset($data, $keys)
{
    foreach ($keys as $key) {
        unset($data[$key]);
    }
}

function get_success_message($msg, $delay = '')
{
    set_flashdata($msg, 'success', $delay);
}

function convert_date_to_english($date, $characterToCheck = '/', $inputFormat = 'd/m/Y', $outputFormat = 'Y-m-d')
{
    if ($date && is_string($date) && strpos($date, $characterToCheck)) {
        return DateTime::createFromFormat($inputFormat, $date)->format($outputFormat);
    }
    return null;
}

function redirect_if_id_is_not_valid($id, $table_name = '', $redirect, $forProInterface = true, $show404 = false, $additionalWhere = [])
{
    if (is_numeric($id) && (int)$id > 0) {
        if ($table_name == '') {
            return true;
        } else {
            $CI = &get_instance();
            $CI->db->select("COUNT(id) AS nombre");
            $CI->db->where(['id' => $id]);
            if (!empty($additionalWhere)) {
                $CI->db->where($additionalWhere);
            }
            $query = $CI->db->get($table_name);
            if ($query->row()->nombre)
                return true;
        }
    }
    if ($forProInterface) {
        get_warning_message('Action non authorisée');
        pro_redirect($redirect);
    }
    if ($show404) {
        show_404('');
    }
    redirect($redirect);
}

function getSlugifyString($string, $toLower = true, $removeBlankSpace = true, $replaceSpaceWithDash = true, $limitToNWords = 40)
{
    $ci = &get_instance();
    $ci->load->helper('text');
    $nonAccentedString = convert_accented_characters($string);
    if ($replaceSpaceWithDash) {
        $nonAccentedString = trim($nonAccentedString);
        $nonAccentedString = str_replace(" ", "-", $nonAccentedString);
    }
    if ($removeBlankSpace) {
        $nonAccentedString = preg_replace('/[^a-zA-Z0-9-_\.]/', '', $nonAccentedString);
    }
    if ($toLower) {
        $nonAccentedString = strtolower($nonAccentedString);
    }
    if ($limitToNWords) {
        $nonAccentedString = substr($nonAccentedString, 0, $limitToNWords);
    }
    return $nonAccentedString;
}

function getIDBySlug($tableName, $slug)
{
    $ci =& get_instance();
    $ci->db->select('id');
    $result = $ci->db->get_where($tableName, ['slug' => $slug])->row();
    return maybe_null_or_empty($result, 'id', true);
}

function getTableByID($tableName, $id, $isArray = true)
{
    $ci =& get_instance();
    $result = $ci->db->get_where($tableName, ['id' => $id]);
    if ($isArray) {
        return $result->row_array();
    }
    return $result->row();
}

function getPostTablesNames()
{
    $tables = new stdClass();
    $tables->posts = 'posts';
    $tables->categories = 'post_categories';
    $tables->meta = 'post_meta';
    $tables->tags = 'post_tags';
    $tables->tag_group = 'post_tag_groups';
    return $tables;
}

function getPaginationConfigAndLink($baseUrl, $perPage, $totalRow, $page)
{

    $ci =& get_instance();
    $ci->load->library('pagination');
    $config['page'] = $page;
    $config['per_page'] = $perPage;
    $config['base_url'] = $baseUrl;
    $config['total_rows'] = $totalRow;
    //$config['uri_segment'] = 3;
    $config['page_query_string'] = TRUE;
    $config['enable_query_strings'] = TRUE;
    $config['full_tag_open'] = '<ul class="pagination">';
    $config['full_tag_close'] = '</ul>';
    $config['first_tag_open'] = '<li>';
    $config['first_tag_close'] = '</li>';
    $config['last_tag_open'] = '<li>';
    $config['last_tag_close'] = ' </li>';
    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = ' </li>';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="active"><a href="#">';
    $config['cur_tag_close'] = '</a></li>';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config['query_string_segment'] = 'page';
    $config['use_page_numbers'] = TRUE;
    $ci->pagination->initialize($config);
    return $ci->pagination->create_links();
}

function getEventTablesNames()
{
    $tables = new stdClass();
    $tables->events = 'events';
    $tables->categories = 'event_categories';
    $tables->meta = 'event_meta';
    $tables->tags = 'event_tags';
    $tables->tag_group = 'event_tag_groups';
    return $tables;
}

function getEvaluationTablesNames()
{
    $tables = new stdClass();
    $tables->evaluations = 'evaluations';
    $tables->sectors = 'evaluation_sectors';
    $tables->temporalities = 'evaluation_temporalities';
    $tables->thematics = 'evaluation_thematics';
    $tables->sector_group = 'evaluation_sector_groups';
    $tables->questions = 'evaluation_questions';
    $tables->thematic_group = 'evaluation_thematic_groups';
    $tables->types = 'evaluation_types';
    $tables->stats = 'evaluation_stats';
    $tables->meta = 'evaluation_meta';
    $tables->leading_authorities = 'evaluation_leading_authorities';
    $tables->contracting_authorities = 'evaluation_contracting_authorities';
    return $tables;
}

function addZeroBeforeNumber($number)
{
    if ($number < 1) {
        return $number;
    }
    return sprintf("%02s", $number);
}

function myWordLimiter($string, $limit = 6)
{
    $ci =& get_instance();
    $ci->load->helper('text');
    return word_limiter($string, $limit);
}

function myCharacterLimiter($string, $limit=100){
	$ci =& get_instance();
	$ci->load->helper('text');
	return character_limiter($string, $limit);
}

function getFullDateInFrench($date, $inputFormat = 'Y-m-d', $returnArray = false, $returnMonthInString = true, $withTime = false, $cutSubstringMonth = false)
{
    $day = DateTime::createFromFormat($inputFormat, $date)->format('d');
    $month = DateTime::createFromFormat($inputFormat, $date)->format('m');
    $year = DateTime::createFromFormat($inputFormat, $date)->format('Y');
    if ($returnArray) {
        $return = [
            'd' => $day,
            'm' => $returnMonthInString ? getFrenchMonths()[(int)$month] : $month,
            'Y' => $year,
        ];
        if ($withTime) {
            $return ['G'] = DateTime::createFromFormat($inputFormat, $date)->format('G');
            $return ['i'] = DateTime::createFromFormat($inputFormat, $date)->format('i');
            $return ['s'] = DateTime::createFromFormat($inputFormat, $date)->format('s');
        }
        return $return;
    }
    $month = getFrenchMonths()[(int)$month];
    if ($cutSubstringMonth) {
        $month = substr($month, 0, 4);
    }
    return "$day " . $month . " $year";
}

function getRecommendationTablesNames()
{
    $tables = new stdClass();
    $tables->recommendations = 'recommendations';
    $tables->activities = 'recommendation_activities';
    $tables->meta = 'recommendation_meta';
    return $tables;
}

function getFrenchMonths()
{
    return [
        1 => 'Janvier',
        2 => 'Février',
        3 => 'Mars',
        4 => 'Avril',
        5 => 'Mai',
        6 => 'Juin',
        7 => 'Juillet',
        8 => 'Août',
        9 => 'Septembre',
        10 => 'Octobre',
        11 => 'Novembre',
        12 => 'Décembre',
    ];
}

function current_full_url(){
	$url = current_url();
	return $_SERVER['QUERY_STRING'] ? $url.'?'.$_SERVER['QUERY_STRING'] : $url;
}

function getAddPaginationToUrl($url='', $page=''){
	if($url==''){
		$url = current_full_url();
	}
	$urlParts = parse_url($url);
	$params= [];
	if(isset($urlParts['query'])){
		parse_str($urlParts['query'], $params);
	}
	unset($params['page']);
	$params['page']=$page;
	$urlParts['query'] = http_build_query($params);
	return $urlParts['scheme'] . '://' . $urlParts['host'] . $urlParts['path'] . '?' . $urlParts['query'];

}

function getAllInTable($tableName, $isArray = true, $order = true, $orderByField = 'id', $orderBy = 'desc',
                       $forSelect2 = false, $keyFieldForSelect2 = 'id', $valueFieldForSelect2 = 'name',
                       $initialBlankValueForSelect2 = true, $specificDBSelect = "*",
                       $defaultSelect2FirstOptionValue = '', $where = [], $whereIn = [], $whereInCheck = 'id', $limit=0)
{
    $ci =& get_instance();
    $ci->db->select($specificDBSelect);
    if ($order) {
        $ci->db->order_by($orderByField, $orderBy);
    }
    if (!empty($where)) {
        $ci->db->where($where);
    }
    if (!empty($whereIn)) {
        $ci->db->where_in($whereInCheck, $whereIn);
    }
    if($limit){
		$ci->db->limit($limit);
	}

    $results = $ci->db->get($tableName);
    if ($isArray) {
        $results = $results->result_array();
    } else {
        $results = $results->result();
    }
    if ($forSelect2) {
        $temp = $initialBlankValueForSelect2 ? ['' => $defaultSelect2FirstOptionValue] : [];
        foreach ($results as $key => $result) {
            $temp[maybe_null_or_empty($result, $keyFieldForSelect2)] = maybe_null_or_empty($result, $valueFieldForSelect2);
        }
        return $temp;
    }
    return $results;
}

function update_meta($id, $key, $value, $table_meta, $table_id_val)
{
    $ci =& get_instance();
    if (!empty($id) && !empty($key)) {
        $query = $ci->db->get_where($table_meta, array(
            $table_id_val => $id,
            'key' => $key,
        ));
        if (empty($query->row())) {
            $ci->db->insert($table_meta, array(
                $table_id_val => $id,
                'key' => $key,
                'value' => $value
            ));
        } else {
            $ci->db->where(array(
                $table_id_val => $id,
                'key' => $key,
            ));
            $ci->db->update($table_meta, array('value' => maybe_serialize($value)));
        }
    }
}

function getRegularDateTimeFormat($inEnglish = true)
{
    if ($inEnglish) {
        return 'Y-m-d G:i:s';
    }
    return 'd/m/Y G:i:s';
}

function get_form_upload($data, $extensions = 'png jpg jpeg', $maxSize = "1M", $required = true, $additionalClass = '')
{
    ?>
    <?php
    $attributes = array(
        'data-default-file' => maybe_null_or_empty($data, 'value'),
        'class' => "dropify $additionalClass",
        'id' => 'my_dropify_' . (isset($data['attributes']) ? $data['attributes']['data-target'] : rand(1, 10000)),
        'data-max-file-size' => $maxSize,
        'data-allowed-file-extensions' => $extensions,
        'value' => set_value($data['name'], maybe_null_or_empty($data, 'value'))
    );
    if (isset($data['attributes'])) {
        foreach ($data['attributes'] as $key => $attribute) {
            $attributes[$key] = $attribute;
        }
    }
    if ($required && !maybe_null_or_empty($data, 'value')) {
        $attributes['required'] = '';
    }
    echo form_upload($data['name'], '', $attributes);
}

function maybe_null_or_empty($element, $property, $returnNull = false, $defaultValue = "")
{
    if (!isset($element)) {
        return null;
    }
    if (is_object($element)) {
        $element = (array)$element;
    }
    if (isset($element[$property])) {
        return $element[$property];
    } else {
        if ($returnNull) {
            return null;
        }
        return $defaultValue;
    }
}

function setFormValidationRules($data)
{

    if (!empty($data)) {
        $CI =& get_instance();
        foreach ($data as $datum) {
            $CI->form_validation->set_rules($datum['name'], $datum['label'], $datum['rules'], isset($datum['custom_message']) ? $datum['custom_message'] : []);
        }
    }
}

function get_flashdata()
{
    $CI = &get_instance();
    if (!empty($CI->session->flashdata('message'))) {
        ?>
        <div class="pos-fixed toast-container t-10 r-10">
            <div class="toast" role="alert" aria-live="assertive" aria-atomic="true"
                 data-delay="<?php echo $CI->session->flashdata('delay') ? $CI->session->flashdata('delay') : 3000 ?>"
                 data-autohide="true">
                <div class="toast-header">
                    <?php switch ($CI->session->flashdata('alert')) {

                        case 'success':
                            ?>
                            <!--            Success Image-->
                            <img width="22"
                                 src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeD0iMHB4IiB5PSIwcHgiIHZpZXdCb3g9IjAgMCA1MDcuMiA1MDcuMiIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNTA3LjIgNTA3LjI7IiB4bWw6c3BhY2U9InByZXNlcnZlIiB3aWR0aD0iNTEycHgiIGhlaWdodD0iNTEycHgiPgo8Y2lyY2xlIHN0eWxlPSJmaWxsOiMzMkJBN0M7IiBjeD0iMjUzLjYiIGN5PSIyNTMuNiIgcj0iMjUzLjYiLz4KPHBhdGggc3R5bGU9ImZpbGw6IzBBQTA2RTsiIGQ9Ik0xODguOCwzNjhsMTMwLjQsMTMwLjRjMTA4LTI4LjgsMTg4LTEyNy4yLDE4OC0yNDQuOGMwLTIuNCwwLTQuOCwwLTcuMkw0MDQuOCwxNTJMMTg4LjgsMzY4eiIvPgo8Zz4KCTxwYXRoIHN0eWxlPSJmaWxsOiNGRkZGRkY7IiBkPSJNMjYwLDMxMC40YzExLjIsMTEuMiwxMS4yLDMwLjQsMCw0MS42bC0yMy4yLDIzLjJjLTExLjIsMTEuMi0zMC40LDExLjItNDEuNiwwTDkzLjYsMjcyLjggICBjLTExLjItMTEuMi0xMS4yLTMwLjQsMC00MS42bDIzLjItMjMuMmMxMS4yLTExLjIsMzAuNC0xMS4yLDQxLjYsMEwyNjAsMzEwLjR6Ii8+Cgk8cGF0aCBzdHlsZT0iZmlsbDojRkZGRkZGOyIgZD0iTTM0OC44LDEzMy42YzExLjItMTEuMiwzMC40LTExLjIsNDEuNiwwbDIzLjIsMjMuMmMxMS4yLDExLjIsMTEuMiwzMC40LDAsNDEuNmwtMTc2LDE3NS4yICAgYy0xMS4yLDExLjItMzAuNCwxMS4yLTQxLjYsMGwtMjMuMi0yMy4yYy0xMS4yLTExLjItMTEuMi0zMC40LDAtNDEuNkwzNDguOCwxMzMuNnoiLz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8L3N2Zz4K"/>
                            <?php
                            break;
                        case 'warning':
                            ?>
                            <!--Warning Image-->
                            <img width="22"
                                 src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMjEuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDUxMiA1MTIiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMiA1MTI7IiB4bWw6c3BhY2U9InByZXNlcnZlIiB3aWR0aD0iNTEycHgiIGhlaWdodD0iNTEycHgiPgo8bGluZWFyR3JhZGllbnQgaWQ9IlNWR0lEXzFfIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjEyNy43MjA3IiB5MT0iMjk2LjQwNDYiIHgyPSI3MDkuNTAwNyIgeTI9Ii0yODUuMzc1NCIgZ3JhZGllbnRUcmFuc2Zvcm09Im1hdHJpeCgxLjAwMzkgMCAwIC0xLjAwMzkgMC4xOTIgNTE2LjU1ODEpIj4KCTxzdG9wIG9mZnNldD0iMCIgc3R5bGU9InN0b3AtY29sb3I6I0ZGQjkyRCIvPgoJPHN0b3Agb2Zmc2V0PSIxIiBzdHlsZT0ic3RvcC1jb2xvcjojRjU5NTAwIi8+CjwvbGluZWFyR3JhZGllbnQ+CjxwYXRoIHN0eWxlPSJmaWxsOnVybCgjU1ZHSURfMV8pOyIgZD0iTTQzNy4yOSw1MTEuOTAzSDc0LjcwN2MtNTUuNDY0LDAtOTEuNTM4LTU4LjM2OS02Ni43MzQtMTA3Ljk3N0wxODkuMjY0LDQxLjM0MSAgYzI3LjQ5Ni01NC45OTIsMTA1Ljk3Mi01NC45OTIsMTMzLjQ2OCwwbDE4MS4yOTEsMzYyLjU4NEM1MjguODI5LDQ1My41MzQsNDkyLjc1NSw1MTEuOTAzLDQzNy4yOSw1MTEuOTAzeiIvPgo8bGluZWFyR3JhZGllbnQgaWQ9IlNWR0lEXzJfIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjIwNC45NTE5IiB5MT0iMjE5LjE3NTciIHgyPSIzODAuMzIxOSIgeTI9IjQzLjgxNTciIGdyYWRpZW50VHJhbnNmb3JtPSJtYXRyaXgoMS4wMDM5IDAgMCAtMS4wMDM5IDAuMTkyIDUxNi41NTgxKSI+Cgk8c3RvcCBvZmZzZXQ9IjAiIHN0eWxlPSJzdG9wLWNvbG9yOiNGRkI5MkQiLz4KCTxzdG9wIG9mZnNldD0iMSIgc3R5bGU9InN0b3AtY29sb3I6I0Y1OTUwMCIvPgo8L2xpbmVhckdyYWRpZW50Pgo8cGF0aCBzdHlsZT0iZmlsbDp1cmwoI1NWR0lEXzJfKTsiIGQ9Ik00MzcuMjksNTExLjkwM0g3NC43MDdjLTU1LjQ2NCwwLTkxLjUzOC01OC4zNjktNjYuNzM0LTEwNy45NzdMMTg5LjI2NCw0MS4zNDEgIGMyNy40OTYtNTQuOTkyLDEwNS45NzItNTQuOTkyLDEzMy40NjgsMGwxODEuMjkxLDM2Mi41ODRDNTI4LjgyOSw0NTMuNTM0LDQ5Mi43NTUsNTExLjkwMyw0MzcuMjksNTExLjkwM3oiLz4KPGxpbmVhckdyYWRpZW50IGlkPSJTVkdJRF8zXyIgZ3JhZGllbnRVbml0cz0idXNlclNwYWNlT25Vc2UiIHgxPSIxOS44NTUyIiB5MT0iMjU5LjU0MDkiIHgyPSI0ODkuNzYxOSIgeTI9IjI1OS41NDA5IiBncmFkaWVudFRyYW5zZm9ybT0ibWF0cml4KDEuMDAzOSAwIDAgLTEuMDAzOSAwLjE5MiA1MTYuNTU4MSkiPgoJPHN0b3Agb2Zmc2V0PSIwIiBzdHlsZT0ic3RvcC1jb2xvcjojRkZGNDY1Ii8+Cgk8c3RvcCBvZmZzZXQ9IjEiIHN0eWxlPSJzdG9wLWNvbG9yOiNGRkU2MDAiLz4KPC9saW5lYXJHcmFkaWVudD4KPHBhdGggc3R5bGU9ImZpbGw6dXJsKCNTVkdJRF8zXyk7IiBkPSJNNDg2LjA2NSw0MTIuOTA0TDMwNC43NzQsNTAuMzJjLTkuNDM4LTE4Ljg3Ni0yNy42NzItMzAuMTQ1LTQ4Ljc3NS0zMC4xNDUgIHMtMzkuMzM3LDExLjI2OS00OC43NzUsMzAuMTQ1TDI1LjkzMiw0MTIuOTA0Yy04LjUxNCwxNy4wMjgtNy42MjIsMzYuODYzLDIuMzg3LDUzLjA1N2MxMC4wMDksMTYuMTk1LDI3LjM1MSwyNS44NjQsNDYuMzg4LDI1Ljg2NCAgaDM2Mi41ODRjMTkuMDM3LDAsMzYuMzc5LTkuNjY5LDQ2LjM4OC0yNS44NjRDNDkzLjY4Nyw0NDkuNzY3LDQ5NC41OCw0MjkuOTMzLDQ4Ni4wNjUsNDEyLjkwNHogTTQ2Ni42LDQ1NS40MDUgIGMtNi4zMjQsMTAuMjMyLTE3LjI4LDE2LjM0MS0yOS4zMDgsMTYuMzQxSDc0LjcwN2MtMTIuMDI4LDAtMjIuOTg1LTYuMTA5LTI5LjMwOC0xNi4zNDFjLTYuMzI0LTEwLjIzMS02Ljg4OC0yMi43NjMtMS41MDgtMzMuNTIyICBMMjI1LjE4Miw1OS4zYzYuMDUyLTEyLjEwNCwxNy4yODMtMTkuMDQ2LDMwLjgxNi0xOS4wNDZzMjQuNzY1LDYuOTQyLDMwLjgxNiwxOS4wNDZsMTgxLjI5MSwzNjIuNTg0ICBDNDczLjQ4Niw0MzIuNjQyLDQ3Mi45MjMsNDQ1LjE3NCw0NjYuNiw0NTUuNDA1eiIvPgo8bGluZWFyR3JhZGllbnQgaWQ9IlNWR0lEXzRfIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjQyMS4zMjY1IiB5MT0iMTA0LjQ1MDQiIHgyPSIxMzcuMjM2NSIgeTI9IjM4OC41NDAzIiBncmFkaWVudFRyYW5zZm9ybT0ibWF0cml4KDEuMDAzOSAwIDAgLTEuMDAzOSAwLjE5MiA1MTYuNTU4MSkiPgoJPHN0b3Agb2Zmc2V0PSIwIiBzdHlsZT0ic3RvcC1jb2xvcjojQkUzRjQ1O3N0b3Atb3BhY2l0eTowIi8+Cgk8c3RvcCBvZmZzZXQ9IjEiIHN0eWxlPSJzdG9wLWNvbG9yOiNCRTNGNDUiLz4KPC9saW5lYXJHcmFkaWVudD4KPHBhdGggc3R5bGU9ImZpbGw6dXJsKCNTVkdJRF80Xyk7IiBkPSJNNDM3LjI4Niw1MTEuODk5aC0yOC41NTFMMjQzLjcwMSwzNDYuODY1Yy00Ljg3OS0yLjM4OS03LjMyOS02LjUxNS03LjMyOS0xMi40MDggIGMwLTIyLjI2Ny0wLjkxNC0zOC4xNDktMi43NDEtODguNTQ2Yy0xLjgyNy01MC4zODctMi43NDEtNjAuNzM3LTIuNzQxLTgzLjAwNGMwLTcuMTA4LDIuNDE5LTEyLjU4OSw3LjI1OC0xNi40NTQgIGM0LjgyOS0zLjg3NSwxMS4wOTMtNS44MDMsMTguNzgzLTUuODAzczEzLjM0MiwyLjAwOCwxNi45MzYsNi4wMzRjMC42OTMsMC43NjMsMTUxLjE0LDE1MS4xNiwyMDMuMDcyLDIwMy4wNzJsMjcuMDg2LDU0LjE3MSAgQzUyOC44MzMsNDUzLjUzMSw0OTIuNzUzLDUxMS44OTksNDM3LjI4Niw1MTEuODk5eiIvPgo8bGluZWFyR3JhZGllbnQgaWQ9IlNWR0lEXzVfIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjMyOS4zMzkyIiB5MT0iMzMuMjkzMSIgeDI9IjIzNi42NjkyIiB5Mj0iMTI1Ljk3MzEiIGdyYWRpZW50VHJhbnNmb3JtPSJtYXRyaXgoMS4wMDM5IDAgMCAtMS4wMDM5IDAuMTkyIDUxNi41NTgxKSI+Cgk8c3RvcCBvZmZzZXQ9IjAiIHN0eWxlPSJzdG9wLWNvbG9yOiNCRTNGNDU7c3RvcC1vcGFjaXR5OjAiLz4KCTxzdG9wIG9mZnNldD0iMSIgc3R5bGU9InN0b3AtY29sb3I6I0JFM0Y0NSIvPgo8L2xpbmVhckdyYWRpZW50Pgo8cGF0aCBzdHlsZT0iZmlsbDp1cmwoI1NWR0lEXzVfKTsiIGQ9Ik0zOTYuOTY5LDUxMS44OTloLTc0LjY3MWwtODUuNjA0LTg1LjYwNGMtNS42OTItNS4wMi04LjU0My0xMC44NzItOC41NDMtMTcuNTY5ICBjMC02Ljk3NywyLjg1MS0xMi45MSw4LjU0My0xNy43ODljNS42OTItNC44NzksMTIuNjA5LTcuMzE5LDIwLjc0MS03LjMxOWM3LjE1OCwwLDEzLjM1MiwyLjQ0LDE4LjU3Miw3LjMxOUwzOTYuOTY5LDUxMS44OTl6Ii8+CjxwYXRoIHN0eWxlPSJmaWxsOiNGRkZGRkY7IiBkPSJNMjI4LjE1NCw0MDguNzIyYzAtNi45NzcsMi44NDYtMTIuOTAzLDguNTM3LTE3Ljc4MWM1LjY5Mi00Ljg4LDEyLjYxLTcuMzI2LDIwLjc0MS03LjMyNiAgYzcuMTYxLDAsMTMuMzUxLDIuNDQ2LDE4LjU3MSw3LjMyNmM1LjIyMSw0Ljg3OCw3Ljg0LDEwLjgwNCw3Ljg0LDE3Ljc4MWMwLDYuNjk2LTIuNjE3LDEyLjU1My03Ljg0LDE3LjU3MyAgYy01LjIyLDUuMDIyLTExLjQxMSw3LjUzMi0xOC41NzEsNy41MzJjLTguMTMyLDAtMTUuMDQ5LTIuNTExLTIwLjc0MS03LjUzMkMyMzEsNDIxLjI3NSwyMjguMTU0LDQxNS40MTksMjI4LjE1NCw0MDguNzIyeiAgIE0yMzAuODkzLDE2Mi45MDhjMC03LjEwNSwyLjQxNy0xMi41OTMsNy4yNTQtMTYuNDU5YzQuODM1LTMuODY2LDExLjA5Ny01LjgwMSwxOC43ODYtNS44MDFzMTMuMzM4LDIuMDEzLDE2Ljk0LDYuMDM1ICBjMy42MDEsNC4wMjIsNS40MDYsOS40MjksNS40MDYsMTYuMjI1YzAsMjIuMjY5LTAuMzg2LDMyLjYxMy0xLjE0MSw4My4wMDhjLTAuNzYzLDUwLjM5Ny0xLjE0LDY2LjI3Ny0xLjE0LDg4LjUzNyAgYzAsNC42NDUtMi4xNzUsOC4yODEtNi41MTksMTAuOTA1Yy00LjM1MSwyLjYyNS04Ljg2NiwzLjkzOS0xMy41NDUsMy45MzljLTEzLjcwNywwLTIwLjU2Mi00Ljk0NC0yMC41NjItMTQuODQ0ICBjMC0yMi4yNi0wLjkxNC0zOC4xNC0yLjczOS04OC41MzdDMjMxLjgwNSwxOTUuNTIsMjMwLjg5MywxODUuMTc2LDIzMC44OTMsMTYyLjkwOHoiLz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPC9zdmc+Cg=="/>
                            <?php
                            break;
                        case 'info':
                            ?>
                            <!--                            Info Image-->
                            <img width="22"
                                 src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDUxMiA1MTIiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMiA1MTI7IiB4bWw6c3BhY2U9InByZXNlcnZlIiB3aWR0aD0iNTEycHgiIGhlaWdodD0iNTEycHgiPgo8bGluZWFyR3JhZGllbnQgaWQ9IlNWR0lEXzFfIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjIzNi45Mzc1IiB5MT0iMzg3Ljg2NzUiIHgyPSIyMzYuOTM3NSIgeTI9IjEwNy4yNDc1IiBncmFkaWVudFRyYW5zZm9ybT0ibWF0cml4KDEuMDY2NyAwIDAgLTEuMDY2NyAzLjI2NjcgNTU3LjUzMzQpIj4KCTxzdG9wIG9mZnNldD0iMCIgc3R5bGU9InN0b3AtY29sb3I6IzAwQTZGOSIvPgoJPHN0b3Agb2Zmc2V0PSIxIiBzdHlsZT0ic3RvcC1jb2xvcjojMDA3MUUyIi8+CjwvbGluZWFyR3JhZGllbnQ+CjxjaXJjbGUgc3R5bGU9ImZpbGw6dXJsKCNTVkdJRF8xXyk7IiBjeD0iMjU2IiBjeT0iMjU2IiByPSIyNTYiLz4KPHJhZGlhbEdyYWRpZW50IGlkPSJTVkdJRF8yXyIgY3g9IjIzNi45Mzc1IiBjeT0iMjgyLjY4NzUiIHI9IjI5NC4xMiIgZ3JhZGllbnRUcmFuc2Zvcm09Im1hdHJpeCgxLjA2NjcgMCAwIC0xLjA2NjcgMy4yNjY3IDU1Ny41MzM0KSIgZ3JhZGllbnRVbml0cz0idXNlclNwYWNlT25Vc2UiPgoJPHN0b3Agb2Zmc2V0PSIwIiBzdHlsZT0ic3RvcC1jb2xvcjojMDBBNkY5Ii8+Cgk8c3RvcCBvZmZzZXQ9IjEiIHN0eWxlPSJzdG9wLWNvbG9yOiMwMDcxRTIiLz4KPC9yYWRpYWxHcmFkaWVudD4KPGNpcmNsZSBzdHlsZT0iZmlsbDp1cmwoI1NWR0lEXzJfKTsiIGN4PSIyNTYiIGN5PSIyNTYiIHI9IjE5NS44NCIvPgo8bGluZWFyR3JhZGllbnQgaWQ9IlNWR0lEXzNfIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjQ0OC4zMjYxIiB5MT0iMTc5LjY3NjEiIHgyPSIxNzIuNzI2MSIgeTI9IjQ1NS4yODYxIiBncmFkaWVudFRyYW5zZm9ybT0ibWF0cml4KDEuMDY2NyAwIDAgLTEuMDY2NyAzLjI2NjcgNTU3LjUzMzQpIj4KCTxzdG9wIG9mZnNldD0iMS4wMDAwMDBlLTAwNCIgc3R5bGU9InN0b3AtY29sb3I6IzAwOEJGMjtzdG9wLW9wYWNpdHk6MCIvPgoJPHN0b3Agb2Zmc2V0PSIxIiBzdHlsZT0ic3RvcC1jb2xvcjojMDA0NkUyIi8+CjwvbGluZWFyR3JhZGllbnQ+CjxwYXRoIHN0eWxlPSJmaWxsOnVybCgjU1ZHSURfM18pOyIgZD0iTTQ0Ni45MjUsMjk5Ljc1Yy0zLjcxMiwxNi4zMzMtOS40ODUsMzEuODk4LTE3LjAyNCw0Ni4zODdMMjM5LjI0NSwxNTUuNDY5ICBjLTQuNjcyLTQuMjg4LTcuMDE0LTkuMjgtNy4wMTQtMTUuMDAyYzAtNS45NjUsMi4zNDItMTEuMDM0LDcuMDE0LTE1LjE5NGM0LjY3Mi00LjE0NywxMC4yNTMtNi4yMzQsMTYuNzU1LTYuMjM0ICBjNi40OSwwLDEyLjA4MywyLjA4NiwxNi43NTUsNi4yMzRMNDQ2LjkyNSwyOTkuNzV6Ii8+CjxsaW5lYXJHcmFkaWVudCBpZD0iU1ZHSURfNF8iIGdyYWRpZW50VW5pdHM9InVzZXJTcGFjZU9uVXNlIiB4MT0iMzczLjM2ODUiIHkxPSIxMDQuNzE4NSIgeDI9Ijk3Ljc1ODUiIHkyPSIzODAuMzI4NSIgZ3JhZGllbnRUcmFuc2Zvcm09Im1hdHJpeCgxLjA2NjcgMCAwIC0xLjA2NjcgMy4yNjY3IDU1Ny41MzM0KSI+Cgk8c3RvcCBvZmZzZXQ9IjEuMDAwMDAwZS0wMDQiIHN0eWxlPSJzdG9wLWNvbG9yOiMwMDhCRjI7c3RvcC1vcGFjaXR5OjAiLz4KCTxzdG9wIG9mZnNldD0iMSIgc3R5bGU9InN0b3AtY29sb3I6IzAwNDZFMiIvPgo8L2xpbmVhckdyYWRpZW50Pgo8cGF0aCBzdHlsZT0iZmlsbDp1cmwoI1NWR0lEXzRfKTsiIGQ9Ik00MjAuNjk4LDM2Mi4wMWMtMjcuMjM4LDQyLjIxNC03MC4yNTksNzMuMjkzLTEyMC43Myw4NC44NzcgIGMtMjAuNjM0LTIwLjU4Mi01OC4yNTMtNTguMTEyLTU4LjM4MS01OC4yMTRjLTMuOTA0LTIuODU0LTUuODUtNS45NzgtNS44NS05LjM1N1YyMjEuNTE3YzAtMy45MDQsMS44ODItNy4wNzgsNS42NDUtOS41NDkgIGMzLjc2My0yLjQ3LDguNjQtMy42OTksMTQuNjE4LTMuNjk5YzUuOTc4LDAsMTAuOTA2LDEuMjI5LDE0LjgxLDMuNjk5TDQyMC42OTgsMzYyLjAxeiIvPgo8cGF0aCBzdHlsZT0iZmlsbDojRkZGRkZGOyIgZD0iTTIzMi4yMzMsMTQwLjQ3YzAtNS45NzEsMi4zMzctMTEuMDM5LDcuMDEyLTE1LjE5NmM0LjY3NS00LjE1MSwxMC4yNTgtNi4yMzQsMTYuNzU1LTYuMjM0ICBjNi40OSwwLDEyLjA4LDIuMDgyLDE2Ljc1NSw2LjIzNGM0LjY3NSw0LjE1Nyw3LjAxMiw5LjIyNSw3LjAxMiwxNS4xOTZjMCw1LjcxNi0yLjMzNywxMC43MTUtNy4wMTIsMTUuMDAyICBjLTQuNjc1LDQuMjg1LTEwLjI2Niw2LjQzLTE2Ljc1NSw2LjQzYy02LjQ5NiwwLTEyLjA4LTIuMTQ1LTE2Ljc1NS02LjQzQzIzNC41NywxNTEuMTg1LDIzMi4yMzMsMTQ2LjE4NywyMzIuMjMzLDE0MC40N3ogICBNMjM1LjczOSwzNzkuMzIyVjIyMS41MTdjMC0zLjg5OSwxLjg4MS03LjA3NSw1LjY1LTkuNTQ3YzMuNzYyLTIuNDY3LDguNjMzLTMuNzAyLDE0LjYxMS0zLjcwMmM1Ljk3MywwLDEwLjkxMSwxLjIzNSwxNC44MDUsMy43MDIgIGMzLjg5NywyLjQ3LDUuODQ0LDUuNjQ4LDUuODQ0LDkuNTQ3djE1Ny44MDVjMCwzLjM3OC0yLjAxNCw2LjQ5Ny02LjAzOCw5LjM1M2MtNC4wMywyLjg2My04LjksNC4yODctMTQuNjExLDQuMjg3ICBjLTUuNzE4LDAtMTAuNTIxLTEuNDI0LTE0LjQxNy00LjI4N0MyMzcuNjg2LDM4NS44MTgsMjM1LjczOSwzODIuNywyMzUuNzM5LDM3OS4zMjJ6Ii8+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+Cjwvc3ZnPgo="/>
                            <?php
                            break;
                        default :
                            ?>
                            <!--            Error Image-->
                            <img width="22"
                                 src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeD0iMHB4IiB5PSIwcHgiIHZpZXdCb3g9IjAgMCA1MDcuMiA1MDcuMiIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNTA3LjIgNTA3LjI7IiB4bWw6c3BhY2U9InByZXNlcnZlIiB3aWR0aD0iNTEycHgiIGhlaWdodD0iNTEycHgiPgo8Y2lyY2xlIHN0eWxlPSJmaWxsOiNGMTUyNDk7IiBjeD0iMjUzLjYiIGN5PSIyNTMuNiIgcj0iMjUzLjYiLz4KPHBhdGggc3R5bGU9ImZpbGw6I0FEMEUwRTsiIGQ9Ik0xNDcuMiwzNjhMMjg0LDUwNC44YzExNS4yLTEzLjYsMjA2LjQtMTA0LDIyMC44LTIxOS4yTDM2Ny4yLDE0OEwxNDcuMiwzNjh6Ii8+CjxwYXRoIHN0eWxlPSJmaWxsOiNGRkZGRkY7IiBkPSJNMzczLjYsMzA5LjZjMTEuMiwxMS4yLDExLjIsMzAuNCwwLDQxLjZsLTIyLjQsMjIuNGMtMTEuMiwxMS4yLTMwLjQsMTEuMi00MS42LDBsLTE3Ni0xNzYgIGMtMTEuMi0xMS4yLTExLjItMzAuNCwwLTQxLjZsMjMuMi0yMy4yYzExLjItMTEuMiwzMC40LTExLjIsNDEuNiwwTDM3My42LDMwOS42eiIvPgo8cGF0aCBzdHlsZT0iZmlsbDojRDZENkQ2OyIgZD0iTTI4MC44LDIxNkwyMTYsMjgwLjhsOTMuNiw5Mi44YzExLjIsMTEuMiwzMC40LDExLjIsNDEuNiwwbDIzLjItMjMuMmMxMS4yLTExLjIsMTEuMi0zMC40LDAtNDEuNiAgTDI4MC44LDIxNnoiLz4KPHBhdGggc3R5bGU9ImZpbGw6I0ZGRkZGRjsiIGQ9Ik0zMDkuNiwxMzMuNmMxMS4yLTExLjIsMzAuNC0xMS4yLDQxLjYsMGwyMy4yLDIzLjJjMTEuMiwxMS4yLDExLjIsMzAuNCwwLDQxLjZMMTk3LjYsMzczLjYgIGMtMTEuMiwxMS4yLTMwLjQsMTEuMi00MS42LDBsLTIyLjQtMjIuNGMtMTEuMi0xMS4yLTExLjItMzAuNCwwLTQxLjZMMzA5LjYsMTMzLjZ6Ii8+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+Cjwvc3ZnPgo="/>
                        <?php

                    } ?>
                    <h6 class="tx-inverse mg-l-10 tx-14 mg-b-0 mg-r-auto">Notification</h6>
                    <small>A l'instant</small>
                    <button type="button" class="ml-2 mb-1 close tx-normal" data-dismiss="toast" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="toast-body">
                    <?php echo $CI->session->flashdata('message') ?>
                </div>
            </div>
        </div>
        <?php
        $CI->session->set_flashdata('message', null);
    }
}

function set_flashdata($message, $alert = 'danger', $delay = 5000)
{
    $CI = &get_instance();
    $CI->session->set_flashdata('message', $message);
    $CI->session->set_flashdata('alert', $alert);
    $CI->session->set_flashdata('delay', $delay ? $delay : 5000);
}

function getImageUrl($additional = "")
{
    return base_url("assets/images/$additional");
}

function maybe_serialize($data)
{
    if (is_array($data) || is_object($data))
        return serialize($data);

    // Double serialization is required for backward compatibility.
    // See https://core.trac.wordpress.org/ticket/12930
    // Also the world will end. See WP 3.6.1.
    if (is_serialized($data, false))
        return serialize($data);

    return $data;
}

/**
 * Unserialize value only if it was serialized.
 *
 * @since 2.0.0
 *
 * @param string $original Maybe unserialized original, if is needed.
 * @return mixed Unserialized data can be any type.
 */
function maybe_unserialize($original)
{
    if (is_serialized($original)) // don't attempt to unserialize data that wasn't serialized going in
        return @unserialize($original);
    return $original;
}

/**
 * Check value to find if it was serialized.
 *
 * If $data is not an string, then returned value will always be false.
 * Serialized data is always a string.
 *
 * @since 2.0.5
 *
 * @param string $data Value to check to see if was serialized.
 * @param bool $strict Optional. Whether to be strict about the end of the string. Default true.
 * @return bool False if not serialized and true if it was.
 */
function is_serialized($data, $strict = true)
{
    // if it isn't a string, it isn't serialized.
    if (!is_string($data)) {
        return false;
    }
    $data = trim($data);
    if ('N;' == $data) {
        return true;
    }
    if (strlen($data) < 4) {
        return false;
    }
    if (':' !== $data[1]) {
        return false;
    }
    if ($strict) {
        $lastc = substr($data, -1);
        if (';' !== $lastc && '}' !== $lastc) {
            return false;
        }
    } else {
        $semicolon = strpos($data, ';');
        $brace = strpos($data, '}');
        // Either ; or } must exist.
        if (false === $semicolon && false === $brace)
            return false;
        // But neither must be in the first X characters.
        if (false !== $semicolon && $semicolon < 3)
            return false;
        if (false !== $brace && $brace < 4)
            return false;
    }
    $token = $data[0];
    switch ($token) {
        case 's' :
            if ($strict) {
                if ('"' !== substr($data, -2, 1)) {
                    return false;
                }
            } elseif (false === strpos($data, '"')) {
                return false;
            }
        // or else fall through
        case 'a' :
        case 'O' :
            return (bool)preg_match("/^{$token}:[0-9]+:/s", $data);
        case 'b' :
        case 'i' :
        case 'd' :
            $end = $strict ? '$' : '';
            return (bool)preg_match("/^{$token}:[0-9.E-]+;$end/", $data);
    }
    return false;
}


function get_meta($id, $key, $table_meta, $table_id_val)
{
    $ci =& get_instance();
    if (!empty($id) && !empty($key)) {
        $query = $ci->db->get_where($table_meta, array(
            $table_id_val => $id,
            'key' => $key,
        ))->row();
        $query = maybe_null_or_empty($query, 'value');
        return maybe_unserialize($query);
    }
}

function get_metas($id, $table_meta, $table_id_val)
{
    $ci =& get_instance();
    if (!empty($id) && !empty($table_meta) && !empty($table_id_val)) {
        $query = $ci->db->get_where($table_meta, array(
            $table_id_val => $id,
        ))->result_array();
        $temp = [];
        if (!empty($query)) {
            foreach ($query as $quer) {
                $temp[$quer['key']] = maybe_unserialize(maybe_null_or_empty($quer, 'value'));
            }
        }
        return $temp;
    }
}

function megaMetasInsert(array $metaDatas, $id, $table_id_val)
{
    if (!empty($metaDatas)) {
        $insertionArray = [];
        $counter = 0;
        foreach ($metaDatas as $key => $metaData) {
            $insertionArray[$counter]['key'] = $key;
            $insertionArray[$counter]['value'] = maybe_serialize($metaData);
            $insertionArray[$counter][$table_id_val] = $id;
            $counter++;
        }
        $this->db->insert_batch($this->_tables->meta, $insertionArray);
    }
}


function convert_date_to_french($date, $returnFormat = 'd/m/Y')
{
    if ($date && $date != '0000-00-00' && is_string($date) && strpos($date, '-') && strtotime($date)) {
        return date($returnFormat, strtotime($date));
    }
    return null;
}

function delete_in_table($table_name, $id, $redirect)
{
    $ci =& get_instance();
    $ci->db->delete($table_name, array('id' => $id));
    get_success_message('Suppression avec succès');
    redirect($redirect);
}

function control_unique_on_update($value, $db_field)
{
    $ci = &get_instance();

    $db_field = explode('.', $db_field);
    $table = $db_field[0];
    $target_field = $db_field[1];
    $id_value = $db_field[2];
    //$value = mysqli_real_escape_string($value);
    $ci->db->select('id');
    $query = $ci->db->get_where($table, [$target_field => $value])->row();
    if ($queryId = maybe_null_or_empty($query, 'id')) {
        if ($id_value != $queryId) {
            $ci->form_validation->set_message('is_unique_on_update', "La valeur {field} existe dejà");
            return false;
        }
    }
    return true;
}

function getDateByTime($time, $dateFormat = 'd/m/Y')
{
    if (!$time) {
        return '';
    }
    $time = (int)$time;
    return date($dateFormat, $time);
}

function user_can($group_name)
{
    $ci = &get_instance();
    return $ci->ion_auth->in_group($group_name);
}

function sendMail($default, $args)
{
    ini_set("SMTP", "mail.akasigroup.com");
    $ci =& get_instance();
    $options = $ci->option_model->get_options();
    $message = mailTemplateHtml($args, $options);
    $headers = "MIME-Version: 1.0 \n";

    $headers .= "Content-type: text/html; charset=iso-8859-1 \n";

    $headers .= "From: $default  \n";

    $headers .= "Disposition-Notification-To: $default  \n";
    $headers .= "X-Priority: 1  \n";

    $headers .= "X-MSMail-Priority: High \n";
    @mail($args['destination'], $args['title'], $message, $headers);
    echo $message;
}


function mailTemplateHtml($args, $options)
{
    $path = get_upload_path();
    ob_start();
    ?>

    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//FR"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml"
          style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">

    <head>
        <meta name="viewport" content="width=device-width"/>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <title><?php echo $args['title'] ?></title>


        <style type="text/css">
            img {
                max-width: 100%;
            }

            body {
                -webkit-font-smoothing: antialiased;
                -webkit-text-size-adjust: none;
                width: 100% !important;
                height: 100%;
                line-height: 1.6em;
            }

            body {
                background-color: #f6f6f6;
            }

            @media only screen and (max-width: 640px) {
                body {
                    padding: 0 !important;
                }

                h1 {
                    font-weight: 800 !important;
                    margin: 20px 0 5px !important;
                }

                h2 {
                    font-weight: 800 !important;
                    margin: 20px 0 5px !important;
                }

                h3 {
                    font-weight: 800 !important;
                    margin: 20px 0 5px !important;
                }

                h4 {
                    font-weight: 800 !important;
                    margin: 20px 0 5px !important;
                }

                h1 {
                    font-size: 22px !important;
                }

                h2 {
                    font-size: 18px !important;
                }

                h3 {
                    font-size: 16px !important;
                }

                .container {
                    padding: 0 !important;
                    width: 100% !important;
                }

                .content {
                    padding: 0 !important;
                }

                .content-wrap {
                    padding: 10px !important;
                }

                .invoice {
                    width: 100% !important;
                }
            }
        </style>
    </head>

    <body style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; -webkit-font-smoothing: antialiased; -webkit-text-size-adjust: none; width: 100% !important; height: 100%; line-height: 1.6em; background-color: #f6f6f6; margin: 0;"
          bgcolor="#f6f6f6">

    <table class="body-wrap"
           style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; width: 100%; background-color: #f6f6f6; margin: 0;"
           bgcolor="#f6f6f6">
        <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
            <td style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;"
                valign="top"></td>
            <td class="container" width="600"
                style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto;"
                valign="top">
                <div class="content"
                     style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; max-width: 600px; display: block; margin: 0 auto; padding: 20px;">
                    <table class="main" width="100%" cellpadding="0" cellspacing="0" itemprop="action" itemscope
                           itemtype="http://schema.org/ConfirmAction"
                           style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; border-radius: 3px; margin: 0; border: none;"
                    >
                        <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                            <td class="content-wrap"
                                style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;padding: 30px;border: 3px solid #777edd;border-radius: 7px; background-color: #fff;"
                                valign="top">
                                <meta itemprop="name" content="Confirm Email"
                                      style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;"/>
                                <table width="100%" cellpadding="0" cellspacing="0"
                                       style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                    <tr>
                                        <td style="text-align: center">
                                            <a target="_blank" href="<?= site_url() ?>"
                                               style="display: block;margin-bottom: 10px;"> <img
                                                        src="<?= $path . $options['siteFavicon'] ?>" height="100"
                                                        alt=""/></a> <br/>
                                        </td>
                                    </tr>
                                    <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                        <td class="content-block"
                                            style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;"
                                            valign="top">
                                            <?php echo $args['message'] ?>
                                        </td>
                                    </tr>
                                    <?php echo(isset($args['tableMessage']) ? $args['tableMessage'] : '') ?>
                                    <?php
                                    if (isset($args['btnLink']) && isset($args['btnLabel'])) {
                                        ?>
                                        <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                            <td class="content-block" itemprop="handler" itemscope
                                                itemtype="http://schema.org/HttpActionHandler"
                                                style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;"
                                                valign="top">
                                                <a target="_blank" href="<?= $args['btnLink'] ?>" class="btn-primary"
                                                   itemprop="url"
                                                   style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; color: #FFF; text-decoration: none; line-height: 2em; font-weight: bold; text-align: center; cursor: pointer; display: inline-block; border-radius: 5px; text-transform: capitalize; background-color: #02c0ce; margin: 0; border-color: #02c0ce; border-style: solid; border-width: 8px 16px;"><?= $args['btnLabel'] ?></a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                        <td class="content-block"
                                            style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;"
                                            valign="top">
                                            <b>Equipe</b> <?php echo $options['siteName'] ?>
                                            <br>
                                            AKASI Consulting Group
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                    <div class="footer"
                         style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; width: 100%; clear: both; color: #999; margin: 0; padding: 20px;">
                        <table width="100%"
                               style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                            <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                <td class="aligncenter content-block"
                                    style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 12px; vertical-align: top; color: #999; text-align: center; margin: 0; padding: 0 0 20px;"
                                    align="center" valign="top"><?php echo $options['siteDescription'] ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </td>
            <td style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;"
                valign="top"></td>
        </tr>
    </table>
    </body>
    </html>


    <?php
    return ob_get_clean();
}

function sendNotificationMail($message, $title = '', $tableMessage = '')
{
    $ci = &get_instance();
    $options = $ci->data['options'];
    $siteName = maybe_null_or_empty($options, 'siteName');
    $mail['title'] = $title == '' ? ("Notification - " . $siteName) : $title;
    $mail['message'] = $message;
    $mail['tableMessage'] = $tableMessage;
    $mail['btnLabel'] = "Accéder à " . $siteName;
    $mail['btnLink'] = site_url('/');
    $mail['destination'] = maybe_null_or_empty($options, 'notificationEmails');
    sendMail($siteName . ' <no-reply@akasigroup.com>', $mail);
}

function mailSender($args, $noReply = 'no-reply@akasigroup.com', $smtpDefault = 'mail.akasigroup.com')
{
    //$default = 'no-reply@csti-digital.com';
    ini_set("SMTP", $smtpDefault);
    $ci =& get_instance();
    $options = $ci->option_model->get_options();
    $siteName = maybe_null_or_empty($options, 'siteName');
    $default = $siteName . " <$noReply>";
    $message = notificationTemplateHTML($args, $options);
    //echo $message;exit;
    $headers = "MIME-Version: 1.0 \n";

    $headers .= "Content-type: text/html; charset=iso-8859-1 \n";

    $headers .= "From: $default  \n";

    $headers .= "Disposition-Notification-To: $default  \n";
    $headers .= "X-Priority: 1  \n";

    $headers .= "X-MSMail-Priority: High \n";
    @mail($args['destination'], $args['title'], $message, $headers);
    //echoResponse($ci->email->print_debugger());
//    var_dump($args['destination']);exit;
    //var_dump();exit;
}

function notificationTemplateHTML($args, $options)
{
    //TODO title,
    $path = get_upload_path();
    ob_start();
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= maybe_null_or_empty($args, 'title') ?></title>
        <style>
            html,
            body,
            table,
            tbody,
            tr,
            td,
            div,
            p,
            ul,
            ol,
            li,
            h1,
            h2,
            h3,
            h4,
            h5,
            h6 {
                margin: 0;
                padding: 0;
            }

            body {
                margin: 0;
                padding: 0;
                font-size: 0;
                line-height: 0;
                -ms-text-size-adjust: 100%;
                -webkit-text-size-adjust: 100%;
            }

            table {
                border-spacing: 0;
                mso-table-lspace: 0pt;
                mso-table-rspace: 0pt;
            }

            table td {
                border-collapse: collapse;
            }

            .ExternalClass {
                width: 100%;
            }

            .ExternalClass,
            .ExternalClass p,
            .ExternalClass span,
            .ExternalClass font,
            .ExternalClass td,
            .ExternalClass div {
                line-height: 100%;
            }

            /* Outermost container in Outlook.com */
            .ReadMsgBody {
                width: 100%;
            }

            img {
                -ms-interpolation-mode: bicubic;
            }

            h1,
            h2,
            h3,
            h4,
            h5,
            h6 {
                font-family: Arial;
            }

            h1 {
                font-size: 28px;
                line-height: 32px;
                padding-top: 10px;
                padding-bottom: 24px;
            }

            h2 {
                font-size: 24px;
                line-height: 28px;
                padding-top: 10px;
                padding-bottom: 20px;
            }

            h3 {
                font-size: 20px;
                line-height: 24px;
                padding-top: 10px;
                padding-bottom: 16px;
            }

            p {
                font-size: 16px;
                line-height: 20px;
                font-family: Georgia, Arial, sans-serif;
            }
        </style>
        <style>

            .container600 {
                width: 600px;
                max-width: 100%;
            }

            @media all and (max-width: 599px) {
                .container600 {
                    width: 100% !important;
                }
            }

            .message-content-body tr td {
                vertical-align: middle;
            }

            .message-content-head tr td:first-child {
                width: 37%;
            }

            /*FLag*/
            .flag {
                -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
                line-height: 1.42857143;
                font-size: 14px;
                font-family: 'Lato', sans-serif;
                text-align: center;
                color: #fff;
                box-sizing: border-box;
                margin-top: 0;
                padding: 0;
                height: 100%;
                width: 100%;
                margin-left: auto;
                margin-right: auto;
                list-style-type: none;
                margin-bottom: auto;
            }

            .flag > td {
                -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
                line-height: 1.42857143;
                font-family: 'Lato', sans-serif;
                list-style-type: none;
                font-size: inherit;
                color: inherit;
                height: 100%;
                margin: 0;
                padding: 0;
                width: 33.33%;
                display: inline-block;
                box-sizing: border-box;
                vertical-align: middle;
                float: left;
            }

            .flag > td.green-bg {
                background: #108757!important;
            }

            .flag > td.yellow-bg {
                background: #ffbe00!important;;
                width: 33.34%;
            }

            .flag > td.red-bg {
                background: #eb0000!important;;
            }

            .flag-container {
                -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
                line-height: 1.42857143;
                font-size: 14px;
                font-family: 'Lato', sans-serif;
                text-align: center;
                color: #fff;
                box-sizing: border-box;
                width: 100%;
                height: 8px;
                margin-bottom: 0;
            }
        </style>

        <!--[if gte mso 9]>
        <style>
            .ol {
                width: 100%;
            }
        </style>
        <![endif]-->

    </head>
    <body style="background-color:#F4F4F4;">
    <center>

        <!--[if gte mso 9]>
        <table width="600" cellpadding="0" cellspacing="0">
            <tr>
                <td>
        <![endif]-->
        <table class="container600" cellpadding="0" cellspacing="0" border="0" width="100%"
               style="width:calc(100%);max-width:calc(600px);margin: 0 auto;">
            <tr>
                <td width="100%" style="text-align: left;">

                    <table width="100%" cellpadding="0" cellspacing="0" style="min-width:100%;">
                        <tr>
                            <td style="background-color:#FFFFFF;color:#000000;padding:0px 30px;">
                                <img alt=""
                                     src="<?= getUploadedImageBySize(maybe_null_or_empty($options, 'siteLogo'), '', true) ?>"
                                     width="300"
                                     style="display: block;width: auto;margin: auto;max-width: 300px"/>
                            </td>
                        </tr>
                    </table>
                    <table width="100%" cellpadding="0" cellspacing="0" style="min-width:100%;">
                        <tr>
                            <td style="background-color:#d7e9dd;color:#58585A;padding:30px 30px 0px 30px;">

                                <h1><?= maybe_null_or_empty($args, 'title') ?></h1>
                                <p><!--Dear Akasi Group Members,<br><br>
                                    Une ABE vient d'être publiée sur la plateforme AKASI-ABE-->
                                    <?= maybe_null_or_empty($args, 'description') ?>
                                </p>
                            </td>
                        </tr>
                        <?php
                        if (isset($args['elements']) && !empty($args['elements'])) {
                            ?>
                            <tr>
                                <td style="padding:20px;background-color:#d7e9dd;">
                                    <table width="100%" cellpadding="0" cellspacing="0" style="min-width:100%;">
                                        <thead class="message-content-head">
                                        <tr>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        </thead>
                                        <tbody class=" message-content-body">
                                        <?php
                                        foreach ($args['elements'] as $key => $element) {
                                            ?>
                                            <tr>
                                                <td valign="top"
                                                    style="padding:5px; font-family: Arial,sans-serif; font-size: 16px; line-height:20px;">
                                                    <strong><?= $key ?></strong></td>
                                                <td valign="top"
                                                    style="padding:5px; font-family: Arial,sans-serif; font-size: 16px; line-height:20px;">
                                                    <?= $element ?>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                        </tbody>
                                    </table>


                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                        <?php
                        if (isset($args['btnLink']) && isset($args['btnLabel'])) {
                            ?>
                            <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                <td style="background-color:#d7e9dd;color:#58585A;padding:30px;">
                                    <a target="_blank" href="<?= $args['btnLink'] ?>" class="btn-primary"
                                       itemprop="url"
                                       style="-webkit-tap-highlight-color: rgba(0,0,0,0);
box-sizing: border-box;
background: #d94148;
color: #fff;
font-family: 'Montserrat', sans-serif;
line-height: 42px;
float: left;
font-weight: 500;
font-size: 14px;
padding: 0 20px;
border-radius: 3px;
-webkit-transition: all ease-in-out 0.3s;
background-color: #d94148;
text-decoration: none;"><?= $args['btnLabel'] ?></a>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>

                        <tr>
                            <td style="background-color:#d7e9dd;color:#58585A;padding:0px 30px 30px 30px;">
                                <p>==================== <br>Equipe <?= maybe_null_or_empty($options, 'siteName') ?>
                                    <br><a href="mailto:<?= maybe_null_or_empty($options, 'site_email') ?>"
                                           target="_blank"><?= maybe_null_or_empty($options, 'site_email') ?></a>
                                    <u></u><u></u></p>
                                </p>
                            </td>
                        </tr>
                    </table>
                    <table width="100%" cellpadding="0" cellspacing="0" style="min-width:100%;">
                        <tr>
                            <td width="100%"
                                style="min-width:100%;background-color:#3f5a50;color:#FFFFFF;padding:30px;">
                                <p style="font-size:16px;line-height:20px;font-family:Georgia,Arial,sans-serif;text-align:center;">
                                    <?= maybe_null_or_empty($options, 'siteDescription') ?></p>
                            </td>
                        </tr>
                        <table width="100%" class="flag-container">
                            <tr class="flag">
                                <td class="green-bg"></td>
                                <td class="yellow-bg"></td>
                                <td class="red-bg"></td>
                            </tr>
                            </tr>
                        </table>
                    </table>
                </td>
            </tr>
        </table>

        <!--[if gte mso 9]></td></tr></table>
        <![endif]-->
    </center>
    </body>
    </html>
    <?php
    return ob_get_clean();
}
