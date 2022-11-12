//Selector
const todoInput = document.getElementById("todoinput");
const todoButton = document.getElementById("todobutton");
const todoList = document.getElementById("todolist");
const filterOption = document.getElementById("todoselect")

//Event Listener
todoButton.addEventListener("click", addTodo);
todoList.addEventListener("click", deleteCheck);
filterOption.addEventListener("click", todoFilter);

//Function
function addTodo(event){

    //prevent Default
    event.preventDefault();

    //todo div
    const todoDiv = document.createElement("div");
    todoDiv.classList.add("todo");

    //todo list
    const todoItem = document.createElement("li");
    todoItem.classList.add("item")
    todoItem.innerText = todoInput.value;
    todoDiv.appendChild(todoItem);
    
    //todo trash button
    const todoTrash = document.createElement("button");
    todoTrash.classList.add("trash-btn");
    todoTrash.innerHTML = "<i class = 'fas fa-trash'></i> ";
    todoItem.appendChild(todoTrash);

    //todo check button
    const todoCheck = document.createElement("button");
    todoCheck.classList.add("check-btn");
    todoCheck.innerHTML = "<i class = 'fas fa-check'></i> ";
    todoItem.appendChild(todoCheck);

    //Append Div
    todoList.appendChild(todoDiv);
    todoInput.value = "";

}; 

//Delete Check Operation
function deleteCheck(e){
    //delete
    const targetList = e.target;
    if(targetList.classList[0] === 'trash-btn'){
        const parentList = targetList.parentElement;
        const todo = parentList.parentElement;
        todo.classList.add("fall");
        parentList.addEventListener("transitionend", function(){
            todo.remove();
        })
    }

    //Check
    if(targetList.classList[0] === 'check-btn'){
        const checkParent = targetList.parentElement;
        const todoParent = checkParent.parentElement;
        todoParent.classList.toggle("completed");
    }
};

//Filtering todo
function todoFilter(e){
    const todos = todoList.childNodes;
    todos.forEach(function(todo){
        switch(e.target.value){
            case "all":
                todo.style.display = "flex";
                break;
            case "completed":
                if(todo.classList.contains("completed")){
                    todo.style.display = "flex";
                }else{
                    todo.style.display = "none";
                }
                break;
            case "uncompleted":
                if(!todo.classList.contains("completed")){
                    todo.style.display = "flex";
                }else{
                    todo.style.display = "none";
                }
                break;
        }
    })
};
