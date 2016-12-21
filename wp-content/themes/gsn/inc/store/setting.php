<?php 
/*
Class GsnProduct

*/
class GsnSetting{
	public $logo,$color_theme;
	public function __construct(){
		
	}
	public function available_theme(){
		global $wpdb;
		$args = array(
		  'numberposts' => -1,
		  'post_type'   => 'theme_color_setting'
		);
		return get_posts($args);
	}
}
global $gsn_settings;
$gsn_settings =new GsnSetting();