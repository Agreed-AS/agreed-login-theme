<?php

 if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class AgreedLoginThemeSetting {
    public function __construct() {
        add_action('admin_menu', array($this, 'create_settings_menu'));
        add_action('admin_init', array($this,'init_settings_menu'));
    }

    //Creates the settings menu/page for this plugin. It will be under the default "Settings" menu
    public function create_settings_menu() {
        add_options_page(
            'Agreed Login Theme Settings', //Title for the actual settings page
            'Agreed Login Theme', //Name for the left menu
            'manage_options', //Which permission required to view this page
            'agreed-login-theme', //Settings page slug
            array($this, 'render_login_theme_settings'), //The function to run when this hook runs
            999 //The position in the menu order this item should appear
        );
    }

    public function init_settings_menu() {
        //Creates a option/setting group and name. 
        register_setting('agreed_login_theme_settings', 'agreed_theme_color');
    }

    //Creates the HTML for the theme menu
    public function render_login_theme_settings() {
        ?>
        <div class="wrap">
        <h1>Agreed Login Theme Settings</h1>
        <!--Creates the button/switch used to toggle light/dark mode-->
        <form method="post" action="options.php">
            <?php
            settings_fields('agreed_login_theme_settings');
            $theme_mode = get_option('agreed_theme_color', 'dark');
            ?>
            
            <table class="form-table">
                <tr>
                    <th scope="row">Dark background</th>
                    <td>
                        <label class="switch">
                            <input type="checkbox" name="agreed_theme_color" value="dark" <?php checked('dark', $theme_mode); ?>>
                            <span class="slider round"></span>
                        </label>
                    </td>
                </tr>
            </table>
            
            <?php submit_button(); ?>
        </form>
    </div>
    
    <!--Styling for the button/switch-->
    <style>
    .switch { position: relative; display: inline-block; width: 50px; height: 24px; }
    .switch input { opacity: 0; width: 0; height: 0; }
    .slider { position: absolute; cursor: pointer; top: 0; left: 0; right: 0; bottom: 0; background-color: #ccc; transition: .4s; border-radius: 24px; }
    .slider:before { position: absolute; content: ""; height: 16px; width: 16px; left: 4px; bottom: 4px; background-color: white; transition: .4s; border-radius: 50%; }
    input:checked + .slider { background-color: #2271b1; }
    input:checked + .slider:before { transform: translateX(26px); }
    </style>
        <?php
    }
}