<?php 

if ( !function_exists( 'add_action' ) ) {
	echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
	exit;
}

class AdminTodoMenu {
	public function __construct() {
		//Add Menu
		add_action('admin_menu', function() {
			add_menu_page (
				'Admin Todo - Lập lịch công việc cần làm cho admin', //Tiêu đề khi truy cập sử dụng plugin
				'Admin Todo', //Tên của menu hiển thị ở danh sách menu
				'manage_options', //quyền chỉ cho những người admin có thể truy cập Plugin
				'admin-todo-plugin', //slug của plugin
				[$this, 'create_page'], //Phương thức callback sẽ được gọi khi click vào menu Admin Todo, phương thức này sẽ chứa HTML để hiển thị.
				LOGO_MENU, //logo của menu
			);
		});
	}

	public function create_page() {
		//Nhập các đoạn mã HTML vào phương thức, để khi admin click vào Plugin sẽ hiển thị HTML của trang
		require(ADMINTODO__PLUGIN_DIR . 'views/view.admin-todo-menu.php');
	}
}

