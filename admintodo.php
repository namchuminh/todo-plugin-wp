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

//Nhập vào file wp-config.php để sử dụng các thông tin cấu hình CSDL như DB_HOST, DB_USER, DB_PASSWORD, DB_NAME
$path = preg_replace( '/wp-content.*$/', '', __DIR__ );
require_once( $path . 'wp-config.php' );

//Định nghĩa các thông tin cần thiết cho Plugin
define( 'ADMINTODO_VERSION', '1.0.0' );
define( 'ADMINTODO__MINIMUM_WP_VERSION', '5.0' );
define( 'ADMINTODO__PLUGIN_URL', plugin_dir_url(__FILE__));
define( 'ADMINTODO__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'AKISMET_DELETE_LIMIT', 10000 );
define( 'LOGO_MENU', 'https://cdn-icons-png.flaticon.com/16/3339/3339347.png');


//Nhập các file cần thiết trong thư mục includes
require_once(ADMINTODO__PLUGIN_DIR. 'includes/class.admin-todo-menu.php');

//Khởi tạo lớp AdminTodoMenu được nhập từ file class.admin-todo-menu.php
new AdminTodoMenu();

//Khi plugin được kích hoạt sẽ thực hiện tạo một bảng mới có tên wp_todo_admin để lưu trữ các bản ghi 
register_activation_hook( __FILE__, function(){
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $sql = "
    	CREATE TABLE wp_todo_admin (
		id INT(6) AUTO_INCREMENT PRIMARY KEY,
		task VARCHAR(255) NOT NULL)
    "; //Bảng chỉ có 2 trường là: id và task
    $conn->query($sql);
    $conn->close();
});

//Khi plugin ngừng kích hoạt sẽ thực hiện xóa bảng wp_todo_admin
register_deactivation_hook( __FILE__, function(){
	$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $sql = "DROP TABLE IF EXISTS wp_todo_admin"; //Xóa bảng
    $conn->query($sql);
    $conn->close();
});
