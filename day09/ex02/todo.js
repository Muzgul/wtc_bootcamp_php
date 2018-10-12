function setCookie(value) {
    document.cookie = value;
}
function getCookie() {
    var value = document.cookie;
    if (value)
        return (value);
    else
        return (null);
}

function loadTodo(){
    var todolist = getCookie();
    if (todolist != null){
        todolist = JSON.parse(todolist);
        todolist.forEach(element => {
            alert(element);
        });
    }
}

function addNew(){
    var item = window.prompt("Enter new todo: ");
    if (item != ""){
        var todolist = getCookie("thetodolist");
        if (todolist != null){
            todolist = JSON.parse(todolist);
        }else
            todolist = [];
        todolist.unshift(item);
        todolist = JSON.stringify(todolist);
        setCookie("thetodolist", todolist, 1);
        alert("Cookie created!");
        alert(getCookie("thetodolist"));
    }
}