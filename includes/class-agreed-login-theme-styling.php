<?php

 if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class AgreedLoginThemeStyling {
    public function __construct() {
        add_action('login_enqueue_scripts', array($this, 'style_login'));
    }

    //Loads the correct CSS file to style the wp-login.php site
    public function style_login() {
        wp_enqueue_style(
            'agreed-custom-theme',
            PLUGIN_URL . 'public/css/custom-login.css',
            array(),
            '1.0'
        );

        $theme_mode = get_option( 'agreed_theme_color');
        if ($theme_mode !== 'dark') {
            $light_vars = "
                :root {
                    --background_color: #fff !important;
                }
            ";
            wp_add_inline_style( 'agreed-custom-theme', $light_vars );
        }

        //Loads the correct JS file to activate some logic for the wp-login.php site
        wp_enqueue_script(
            'agreed-custom-theme',
            PLUGIN_URL . 'public/js/custom-login.js',
            array('jquery'),
            '1.0',
            true
        );

        //Used for changing the URL of the logo on top, defaults to the site homepage
        add_filter('login_headerurl', function() {
            return home_url();
        });

        add_filter('login_headertext', function() {
            return get_bloginfo('name');
        });
    }
}