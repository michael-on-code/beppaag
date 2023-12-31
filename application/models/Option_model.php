<?php
/**
 * Created by PhpStorm.
 * User: Mike
 * Date: 29/01/2018
 * Time: 14:16
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Option_model extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }

    public function is_unique_on_update($field_value, $args)
    {
        return control_unique_on_update($field_value, $args);
    }
    public function removeSpacesAndConvertToInt(&$field_value)
    {
        $field_value = (int) getSlugifyString($field_value);
        //var_dump($field_value);exit;
        return true;
    }

    public function convertDateToEnglish(&$date){
        $date = convert_date_to_english($date);
        return true;
    }


    private function get_option_groups()
    {
        return array(
            'siteName',
            'siteDescription',
//            'siteFooterDescription',
            'googleRecaptchaPublicKey',
            'googleRecaptchaSecretKey',
            'googleAnalyticsID',
            'siteFavicon',
            'siteLogo',
            'siteDefaultAvatar',
            'notificationEmails',
            //banners
            'about_banner',
            'evaluation_banner',
            'post_banner',
            'event_banner',
            'contact_banner',
            'other_banner',
            //content general
            'site_main_color',
            'site_secondary_color',
            //footer content
            'footer_background_color',
            'footer_logo',
            'sponsor_logo',
            'site_facebook_url',
            'site_twitter_url',
            'site_youtube_url',
            'site_flickr_url',
            'footer_links',
            //header content
            'site_phone',
            'site_email',
            'site_header_post_cat_submenu',
            'top_header_links',
            //contact content
            'contact_infos',
            'contact_form_receiver',
            'contact_google_map_iframe_html',
			//home content
			'site_director_name',
			'site_director_photo',
			'site_director_phrase',
			'site_team',
			'site_mission',
			//login content
			'site_login_title',
			'site_login_description',
			'site_login_bg_image',
			//slide
			'show_latest_evaluations',
			'show_latest_posts',
			'show_latest_events',
			'home_slide_1',
			'home_slide_2',
			'home_slide_3',
			'home_slide_4',
			'home_slide_5',
			'home_slide_6',
			'home_slide_7',
			'home_slide_8',
			'home_slide_9',
			'home_slide_10',
			'home_slide_11',
			'home_slide_12',
			'total_view_count',
			'total_evaluation_view_count',
			'total_download_count',
			//team content
			//'site_team_members',
        );
    }

    public function update_all_options($data, $checkEmptyValue=true)
    {
        if (!empty($data)) {
            foreach ($data as $key => $value) {
                $this->update_option($key, $value, $checkEmptyValue);
            }
        }
    }

    public function update_option($key, $value, $checkIfValueEmpty=true)
    {
    	$check = !empty($key);
    	if($checkIfValueEmpty){
    		$check = $check && !empty($value);
		}
    	if ($check) {
            $query = $this->db->get_where('options', array('key' => $key));
            if (empty($query->result_array())) {
                $this->db->insert('options', array(
                    'key' => $key,
                    'value' => maybe_serialize($value)
                ));
            } else {
                $this->db->where(array('key' => $key));
                $this->db->update('options', array('value' => maybe_serialize($value)));
            }
        }
    }

    public function get_option($key)
    {
        if (!empty($key)) {
            $query = $this->db->get_where('options', array('key' => $key))->row();
            if ($value=maybe_null_or_empty($query, 'value'))
                return maybe_unserialize($value);
            return false;
        }
    }

    public function get_options()
    {
        $groups = $this->get_option_groups();
        $temp = array();
        if (!empty($groups)) {
            foreach ($groups as $option_key) {
                $temp[$option_key] = $this->get_option($option_key);
            }
        }
        return $temp;
    }
}
