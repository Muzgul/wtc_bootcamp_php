function setCookie(list){
    document.cookie = JSON.stringify(list);
}

function getCookie(){
    return JSON.parse(document.cookie);
}

function loadTodo(){
    var todolist = getCookie();
    if (todolist != null && todolist != ""){
        var ft_list = document.getElementById("ft_list");
        while (ft_list.firstChild)
            ft_list.removeChild(ft_list.firstChild);
        todolist.forEach(element => {
            var div = document.createElement('div');
            div.className = 'ft_item';
            div.innerHTML = element;
            var button = document.createElement('button');
            button.innerText = "X";
            button.addEventListener('click', function (el){
                var list = getCookie();
                var newlist = [];
                list.forEach(element => {
                    if (element + "X" != el.path[1].innerText)
                        newlist.push(element);
                });
                setCookie(newlist);
                ft_list.removeChild(el.path[1]);
                loadTodo();
            });
            div.appendChild(button);
            ft_list.appendChild(div);
        });
    }else
        document.getElementById("ft_list").innerText = "List is empty!";
}

function addNew(){
    var item = window.prompt("Please enter new todo:");
    if (item != null && item != ""){
        var list = getCookie();
        if (list != null && list != ""){
            list.unshift(item);
            setCookie(list);
        }else{
            var todolist = [];
            todolist.push(item);
            setCookie(todolist);
        }
        loadTodo();
    }
}