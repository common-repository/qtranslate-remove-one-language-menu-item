<?php
/*
Plugin Name: qTranslate remove one language menu item
Plugin URI: http://www.hoojima.com
Description: qTranslate - remove untranslated menu items from menu by simply removing the language string
Version: 0.1
Author: Ronny Sherer
*/
if(!defined('WP_ADMIN'))
	add_filter('wp_setup_nav_menu_item',		'myMenuExits', 5);

function myMenuExits($obj)
{
	if (!function_exists('qtrans_getLanguage'))
		return $obj;

	static $lang = '';
	if (empty($lang)) $lang = qtrans_getLanguage(); // Limit calls to qtrans_getLanguage to 1 call.
	$strings = qtrans_split($obj->title);
	return empty($strings[$lang]) ? null : $obj;
}
?>
