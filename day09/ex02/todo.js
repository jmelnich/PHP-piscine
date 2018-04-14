function openModal() {
    let todo = prompt("Please enter your new TODO", "");
    if ((todo.trim()) != "") {
        addTask(todo);
    }
}
	function setCookie(cname, cvalue, exdays) {
	    var d = new Date();
	    d.setTime(d.getTime() + (exdays*24*60*60*1000));
	    var expires = "expires="+ d.toUTCString();
	    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
	}

	function getCookie(cname) {
	    var name = cname + "=";
	    var decodedCookie = decodeURIComponent(document.cookie);
	    var ca = decodedCookie.split(';');
	    for(var i = 0; i <ca.length; i++) {
	        var c = ca[i];
	        while (c.charAt(0) == ' ') {
	            c = c.substring(1);
	        }
	        if (c.indexOf(name) == 0) {
	            return c.substring(name.length, c.length);
	        }
	    }
	    return "";
	}

	window.onload = function () {
		if (getCookie("todo") != ""){
			data.tasks = JSON.parse(getCookie("todo"));
			data.id = data.tasks.length;
			view.render();
		}	
	} 

 //TODO change arr length!
	const data = {
		tasks: [],
		id: 0
	};

	function addTask(text){
		data.tasks.push({
			uid: data.id++,
			text
		});
		view.render();
		setCookie("todo", JSON.stringify(data.tasks), 1);
	}

	let model = {
		getActiveTask: function() {
			let activeTasks = data.tasks;
			return activeTasks;
		},
		removeTask: function(id){
			if (confirm("Do you really want to delete this task?"))
			{
				let elem = data.tasks.map(obj => obj.uid == id);
				let posInArr = elem.indexOf(true);
				data.tasks.splice(posInArr, 1);
				setCookie("todo", JSON.stringify(data.tasks), 1);
				view.render();
			}
		},
	}

	let view = {
		render: function() {
			let list = document.getElementById("ft_list");
			if (data.tasks){
				let taskList = list.querySelector(".task-list");
				taskList.innerHTML = "";
				model.getActiveTask().map(function(task){
					let taskTemplate = document.querySelector("#template").innerHTML;
					taskTemplate = taskTemplate.replace(/{{text}}/g, task.text)
													.replace(/{{id}}/g, task.uid);
				let elem = document.createElement("li");
				elem.className = "task";
				elem.id = task.uid;
				elem.setAttribute('onclick', 'model.removeTask(this.id)');
				elem.innerHTML = taskTemplate;
				taskList.append(elem);
				});
			}
		}
	};
	


