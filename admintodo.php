<?php 
/*
Plugin Name: Todo Admin
Plugin URI: https://laptrinhtudau.com/
Description: Plugin Todo sử dụng để ghi chú các công việc cần thiết cho admin quản lý website Wordpress.
Version: 1.0.0
Requires at least: 5.0
Requires PHP: 5.2
Author: Chu Minh Nam
Author URI: https://www.facebook.com/namchuminhh/
*/

// Make sure we don't expose any info if called directly
if ( !function_exists( 'add_action' ) ) {
	echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
	exit;
}

//Định nghĩa các thông tin cần thiết cho Plugin
define( 'ADMINTODO_VERSION', '1.0.0' );
define( 'ADMINTODO__MINIMUM_WP_VERSION', '5.0' );
define( 'ADMINTODO__PLUGIN_URL', plugin_dir_url(__FILE__));
define( 'ADMINTODO__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'AKISMET_DELETE_LIMIT', 10000 );
define( 'LOGO_MENU', 'https://cdn-icons-png.flaticon.com/16/3339/3339347.png');


//Nhập các file cần thiết trong thư mục includes
require_once(ADMINTODO__PLUGIN_DIR. 'includes/class.admin-todo-menu.php');


new AdminTodoMenu();