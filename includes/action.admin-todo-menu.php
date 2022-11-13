<?php 

$path = preg_replace( '/wp-content.*$/', '', __DIR__ );
require_once( $path . 'wp-config.php' );

//Nếu tồn tại request post và giá trị của post không rỗng
if(isset($_POST['task']) && !empty($_POST['task'])){
	$task = $_POST['task']; //Gán giá trị được gửi lên request post vào biến task

	//Khởi tạo kết nối CDLD và thêm một bản ghi mới 
	$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	$sql = "INSERT INTO wp_todo_admin (task)
			VALUES ('$task')";
	$conn->query($sql);
	$last_id = $conn->insert_id;
	$conn->close();
	//Trả về id vừa insert của task để phục vụ việc append lại vào html
	echo $last_id;
	 
}

//Nếu tồn tại request post
if(isset($_POST['taskIndex'])){
	$taskIndex = $_POST['taskIndex'];//Gán giá trị được gửi lên request post vào biến taskIndex

	//Khởi tạo kết nối CDLD và thực hiện xóa bản ghi dựa theo biến taskIndex
	$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	$sql = "DELETE FROM wp_todo_admin WHERE id=".$taskIndex;
	$conn->query($sql);
	$conn->close();
}