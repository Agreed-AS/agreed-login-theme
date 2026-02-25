<?php
/*
Plugin Name: Agreed Custom Login Theme
Description: Custom login theme for websites made by Agreed AS
Version: 1.1
Author: Agreed AS
Author URI: https://agreed.no
*/

require_once plugin_dir_path( __FILE__ ) . 'includes/admin-menu.php';

add_action('login_enqueue_scripts', function() {

	wp_enqueue_style(
		'Agreed Custom Login Theme',
		plugins_url('public/css/custom-login.css', __FILE__),
		array(),
		'1.0'
	);

	wp_enqueue_script(
		'Agreed Custom Login Theme',
		plugins_url('public/js/custom-login.js', __FILE__),
		array('jquery'),
		'1.0',
		true
	);
});

add_filter('login_headerurl', function() {
    return home_url();
});

add_filter('login_headertext', function() {
    return get_bloginfo('name');
});