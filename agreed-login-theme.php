<?php
/*
Plugin Name: Agreed Custom Login Theme
Description: Custom login theme for websites made by Agreed AS
Version: 2.0
Author: Agreed AS
Author URI: https://agreed.no
*/

 if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

//Stores the "root" of the plugin for referencing later
define( 'PLUGIN_URL', plugin_dir_url( __FILE__ ));

//Imports the plugin-update-checker library and defines the repo to fetch updates from
require 'plugin-update-checker-5.6/plugin-update-checker.php';
use YahnisElsts\PluginUpdateChecker\v5\PucFactory;

$myUpdateChecker = PucFactory::buildUpdateChecker(
	'https://github.com/Agreed-AS/agreed-login-theme/',
	__FILE__,
	'agreed-login-theme'
);

//Set the branch that contains the stable release.
$myUpdateChecker->setBranch('main');

//Includes different classes
include plugin_dir_path( __FILE__ ) . 'includes/class-agreed-login-theme-settings.php';
include plugin_dir_path( __FILE__ ) . 'includes/class-agreed-login-theme-styling.php';

//Initiates different classes
new AgreedLoginThemeSetting();
new AgreedLoginThemeStyling();