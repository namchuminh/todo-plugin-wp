jQuery(document).ready(function($) {

    //Lấy url của website
    const URL = window.location.href.split('wp-admin')[0]

    //Sự kiện khi nhấn vào nút Thêm task
    $('#todobutton').click(function(event){
        event.preventDefault()
        const task = $('#todoinput').val()
        $('#todoinput').val("")

        //Validate trường hợp người dùng nhập vào Task là một chuỗi rỗng
        if(task == "" || task == "undefined"){
            alert("Vui lòng không bỏ trống tên Task!")
        }else{
            //Sử dụng ajax post gửi data đến URL cần xử lý
            $.post(URL + 'wp-content/plugins/admintodo/includes/action.admin-todo-menu.php', {task: task}, function(lastIdAdd){
                $("#todolist").append('<div class="todo" id="todo-'+lastIdAdd+'"><li class="item">'+task+'<button class="trash-btn" value="'+lastIdAdd+'"><i class="fas fa-trash"></i> </button></li></div>')

                //Sự kiện khi nhấn vào nút Xóa task để xóa task vừa được append vào
                $('.trash-btn').click(function(){
                    const taskIndex = $(this).val() //index task cần xóa 
                    //Sử dụng ajax post gửi data đến URL cần xử lý
                    $.post(URL + 'wp-content/plugins/admintodo/includes/action.admin-todo-menu.php', {taskIndex: taskIndex}, function(result){
                        $('#todo-'+taskIndex).remove() 
                    }) 
                })

            })   
        }   
    })


    //Sự kiện khi nhấn vào nút Xóa task để xóa một task đã có trước từ trong CSDL
    $('.trash-btn').click(function(){
        const taskIndex = $(this).val() //index task cần xóa 
        //Sử dụng ajax post gửi data đến URL cần xử lý
        $.post(URL + 'wp-content/plugins/admintodo/includes/action.admin-todo-menu.php', {taskIndex: taskIndex}, function(result){
            $('#todo-'+taskIndex).remove() 
        }) 
    })
});
