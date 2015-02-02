<?php
/**
 * Plugin Name: Ajax Contacts Widget
 * Description: Simple Ajax powered contact form widget
 * Version: 1.0
 * Author: Prabhu Bhakta
 * Author URI: http://admin.cdpa.edu.np
 * Text Domain: Optional. Plugin's text domain for localization. Example: mytextdomain
 * Domain Path: Optional. Plugin's relative directory path to .mo files. Example: /locale/
 * Network: Optional. Whether the plugin can only be activated network wide. Example: true
 * License: GPL2
 */


//Include JavaScript
function add_scripts(){
	wp_enqueue_script('contact-scripts', plugins_url().'contacts-widget/js/script.js',array('jquery'),'1.0.0',false);
}
//load our function
add_action('wp_enqueue_scripts','add_scripts');

/*
 * Include Class
 */
include('class.contacts-widget.php');

/*
 * Register Widget
 */
function register_contacts_widget(){
	register_widget('Contacts_Widget');
}
add_action('widgets_init','register_contacts_widget');

