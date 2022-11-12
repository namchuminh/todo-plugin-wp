<link rel="stylesheet" href="<?php echo ADMINTODO__PLUGIN_URL . 'assets/css/style.admin-todo-menu.css'; ?>">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Javascript to-do list</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" integrity="sha256-46r060N2LrChLLb5zowXQ72/iKKNiw/lAmygmHExk/o=" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
        <div class="header">
            <h1>Bishal's To-do List</h1>
        </div>
        <div class="todo-area">
            <form action="">
                <input type="text" name="text" id="todoinput" placeholder="Thêm việc cần làm">
                <button id="todobutton" type="submit">
                    <i class="fas fa-plus-square"></i>
                </button>
            </form>
        </div>
        <div class="todo-container">
            <ul id="todolist"></ul>
        </div>




  
   
    </script>
</body>
</html>
<script type="text/javascript" src="<?php echo ADMINTODO__PLUGIN_URL . 'assets/js/script.admin-todo-menu.js'; ?>"></script>