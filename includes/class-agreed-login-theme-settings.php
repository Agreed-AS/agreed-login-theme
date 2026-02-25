<?php

 if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class AgreedLoginThemeSetting {
    public function __construct() {
        add_action('admin_menu', array($this, 'create_settings_menu'));
    }

    public function create_settings_menu() {
        add_options_page(
            'Agreed Login Theme Settings',
            'Agreed Login Theme',
            'manage_options',
            'agreed-login-theme',
            array($this, 'agreed_login_theme_settings'),
            999
        );
    }

    public function agreed_login_theme_settings() {
        ?>
        <div class="wrap">
            <h1>Agreed Login Theme Settings</h1>
            <p>Something great is coming...</p>
        </div>
        <?php
    }
}