<?php
/*
Plugin Name: Agreed Custom Login Theme
Description: Custom login theme for websites made by Agreed AS
Version: 1.0
Author: Agreed AS
*/

add_action('login_enqueue_scripts', function() {
    ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url('https://media.agreed.no/agreed-t-n-white.png');
            height: 80px;
            width: 320px;
            background-size: contain;
            background-repeat: no-repeat;
	}

        body.login { background: #000; }
	.wp-core-ui .button-primary { background: #0073aa; border-color: #006799; }

	#login-message {
		border-left: 4px solid #264EB5;
	}
	
	.login #login {
		width: 450px;
	}

	#loginform {
		display: flex;
		flex-wrap: wrap;
		border-radius: 10px;
	}

	.user-pass-wrap {
		width: 100%;
	}

	#user_pass:focus, #user_login:focus {
		border-color: #264EB5;
	}

	.dashicons{
		color: #264EB5;
	}
	
	#loginform .submit {
		width: 100%;
	}
	
	#loginform .submit .button {
		width: 100%;
		margin-top: 1rem;
		background: #264EB5;
	}
	
	#loginform .submit .button:hover {
		opacity: 0.9;
	}

	#nav {
		order: 11
	}

	#backtoblog {
		order: 10
	}

	#nav, #backtoblog {
		margin-top: 1rem !important;
	}

	#language-switcher {
		width: 100%;
		display: flex;
		flex-wrap: nowrap;
		align-items: center;
		justify-content: center;
		gap: 0.4rem;
		order: 12;
	}

	#language-switcher select:hover {
		color: #264EB5;
	}

	#language-switcher input {
		border-color: #264EB5;
		color: #264EB5;
	}

    </style>
	<script type="text/javascript">
        	document.addEventListener("DOMContentLoaded", function() {
            		var form = document.getElementById('loginform');
            		var nav = document.getElementById('nav');
            		var back = document.getElementById('backtoblog');
            		var lang = document.getElementById('language-switcher');

            		// Move the links inside the form element at the end
            		if (form && nav) form.appendChild(nav);
            		if (form && back) form.appendChild(back);
            		if (form && lang) form.appendChild(lang);
        	});
    	</script>
    <?php
});

// 2. Change the Logo Link (defaults to WordPress.org)
add_filter('login_headerurl', function() {
    return home_url();
});

// 3. Change the Logo Title (alt text)
add_filter('login_headertext', function() {
    return get_bloginfo('name');
});
