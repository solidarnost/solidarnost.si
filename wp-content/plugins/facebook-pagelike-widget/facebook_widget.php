<?php
/**
 * @package Facebook Widget
 * @version 1.0
 */
/*
Plugin Name: Facebook Widget
Plugin URI: http://patelmilap.wordpress.com/
Description: This widget adds a Simple Facebook page Like Widget into your wordpress website sidebar.
Author: Milap Patel
Version: 2.0
Author URI: http://patelmilap.wordpress.com/
*/

if(!defined('FB_WIDGET_PLUGIN_URL'))
	define('FB_WIDGET_PLUGIN_URL', plugin_dir_url( __FILE__ ));

if(!defined('FB_WIDGET_PLUGIN_BASE_URL'))
	define('FB_WIDGET_PLUGIN_BASE_URL',dirname( __FILE__ ));

require_once(FB_WIDGET_PLUGIN_BASE_URL.'/fb_class.php');

require_once(FB_WIDGET_PLUGIN_BASE_URL.'/short_code.php');

?>