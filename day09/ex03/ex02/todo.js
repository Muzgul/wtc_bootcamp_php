$(document).ready(function(){
    var setCookie = function(list){
        document.cookie = JSON.stringify(list);
    }

    function getCookie(){
        if (document.cookie != "")
            return JSON.parse(document.cookie);
        else
            return "";
    }

    var loadTodo = function(){
        var todolist = getCookie();
        if (todolist != null && todolist != ""){
            $("#ft_list").empty();
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
                    loadTodo();
                });
                div.appendChild(button);
                console.log(element);
                $("#ft_list").append(div);
            });
        }else
            $("#ft_list").html("List is empty!");
    }

    var addNew = function(){
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
    loadTodo();
    $("#addNew").on("click", addNew);
});