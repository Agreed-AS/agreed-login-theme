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
        register_setting('agreed_login_theme_settings', 'agreed_theme_custom_logo', array(
            'type' => 'string',
            'sanitize_callback' => 'esc_url_raw',
        ));
    }

    //Creates the HTML for the theme menu
    public function render_login_theme_settings() {
        ?>
        <div class="wrap">
        <h1>Agreed Login Theme Settings</h1>
       <!--Setting up the form post for WordPress to handle the options for the plugin-->
        <form method="post" action="options.php">
            <?php
            settings_fields('agreed_login_theme_settings');
            $theme_mode = get_option('agreed_theme_color', 'dark');
            $theme_logo = get_option('agreed_theme_custom_logo', '');
            ?>

             <!--Creates the button/switch used to toggle light/dark mode-->
            <table class="form-table">
                <tr>
                    <th scope="row"><label for="color_switch">Dark background</label></th>
                    <td>
                        <label class="switch">
                            <input type="hidden" name="agreed_theme_color" value="light">
                            <input id="color_switch" type="checkbox" name="agreed_theme_color" value="dark" <?php checked('dark', $theme_mode); ?>>
                            <span class="slider round"></span>
                        </label>
                    </td>
                </tr>
            </table>

            <!--Creates the input for the custom logo URL-->
            <table class="form-table">
                <tr>
                    <th scope="row"><label for="logo-url-input">Custom Logo URL</label></th>
                    <td>
                        <input id="logo-url-input" type="url" name="agreed_theme_custom_logo" value="<?php echo esc_url($theme_logo)?>"></input>
                        
                        <div id="logo-preview-wrap" style="margin-top: 15px; max-width: 300px; padding: 10px; border: 1px dashed #ccc; background: #f9f9f9; display: <?php echo $theme_logo ? 'block' : 'none'; ?>;">
                            <p style="margin-top:0; font-size: 11px; text-transform: uppercase; color: #666;">Preview:</p>
                            <br>
                            <img id="logo-preview-img" src="<?php echo esc_url($theme_logo); ?>" style="max-width: 100%; height: auto; display: block;">
                        </div>
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
        //DEBUG
        echo 'Theme color: ' . get_option('agreed_theme_color');
        echo '<br>';
        echo 'Theme logo: ' . get_option('agreed_theme_custom_logo');
        //END OF DEBUG
    }
}