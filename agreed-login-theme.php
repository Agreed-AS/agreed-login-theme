<?php
/*
Plugin Name: Agreed Custom Login Theme
Description: Custom login theme for websites made by Agreed AS
Version: 1.6
Author: Agreed AS
Author URI: https://agreed.no
*/

 if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

//Stores the "root" of the plugin for referencing later
define( 'PLUGIN_URL', plugin_dir_url( __FILE__ ));

//Includes different classes
include plugin_dir_path( __FILE__ ) . 'includes/class-agreed-login-theme-settings.php';
include plugin_dir_path( __FILE__ ) . 'includes/class-agreed-login-theme-styling.php';

//Initiates different classes
new AgreedLoginThemeSetting();
new AgreedLoginThemeStyling();