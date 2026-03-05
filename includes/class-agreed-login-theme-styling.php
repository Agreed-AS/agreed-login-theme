<?php

 if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class AgreedLoginThemeStyling {
    public function __construct() {
        add_action('login_enqueue_scripts', array($this, 'style_login'));
    }

    public function style_login() {
        //Loads the correct CSS file to style the wp-login.php site
        wp_enqueue_style(
            'agreed-custom-theme',
            PLUGIN_URL . 'public/css/custom-login.css',
            array(),
            '1.0'
        );

        $theme_mode = get_option( 'agreed_theme_color');
        $theme_logo = get_option('agreed_theme_custom_logo');
        //Checks if the option for the theme switcher button is "light". This gets updated when you switch the button in the admin menu 
        if ($theme_mode === 'light' && empty($theme_logo)) {
            //CSS changes which will be overwritten if the value is "light" and NO custom log has been set
            $light_vars = "
                :root {
                    --background_color: #fff !important;
                }
                #login h1 a, .login h1 a {
                    background-image: url('https://media.agreed.no/agreed-t-n-black.png');
                }
            ";
            //Applies the CSS
            wp_add_inline_style( 'agreed-custom-theme', $light_vars );
        } elseif ($theme_mode === 'light' && !empty($theme_logo)) {
            //CSS changes which will be overwritten if the value is "light" and when a custom logo has been set
            $light_vars = "
                :root {
                    --background_color: #fff !important;
                }
            ";
            //Applies the CSS
            wp_add_inline_style( 'agreed-custom-theme', $light_vars );
        };

        //Checks if a custom logo has been set, if it is then make that the active logo
        if (!empty($theme_logo)) {
            $custom_logo = "
                #login h1 a, .login h1 a {
                    --background-image: url($theme_logo);
                }
            ";

            wp_add_inline_style( 'agreed-custom-theme', $custom_logo );
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