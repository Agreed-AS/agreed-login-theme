<?php
require_once plugin_dir_path( __FILE__ ) . 'settings-page.php';

function do_agreed_login_theme_menu() {
    add_options_page(
        'Agreed Login Theme Settings',
        'Agreed Login Theme',
        'manage_options',
        'agreed-login-theme',
        'agreed_login_theme_settings',
        999
    );
}
add_action('admin_menu', 'do_agreed_login_theme_menu');