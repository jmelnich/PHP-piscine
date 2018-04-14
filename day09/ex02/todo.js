function openModal() {
    let todo = prompt("Please enter your new TODO", "");
    if (todo != null) {
        addTask(todo);
    }
}
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
	}

	let model = {
		getActiveTask: function() {
			let activeTasks = data.tasks;
			return activeTasks;
		},
	}

	let view = {
		render: function() {
			//this.taskList = $('.task-list');
			let list = document.getElementById("ft_list");
			let taskList = list.querySelector(".task-list");
			console.log(taskList);
			//taskList.innerHTML(''); clean list
			//this.taskTemplate = $('script[data-template="tasks"]').html(); //target it somehow
			if (data.tasks){
				model.getActiveTask().map(function(task){
					let thisTemplate = taskTemplate.replace(/{{text}}/g, task.text)
													.replace(/{{id}}/g, task.uid);
					taskList.append(thisTemplate);
				});
			}
		}
	};
	


	// let octopus = {
	// 	//addTask function that push new obj to model push it as an object
	// 	addTask: function(text) {
	// 		data.tasks.push({
	// 			uid: data.id++,
	// 			text
	// 		});
	// 		view.render();
	// 	},
	// 	getActiveTask: function() {
	// 		let activeTasks = data.tasks;
	// 		return activeTasks;
	// 	},
	// 	// removeTask: function(id) {
	// 	// 	let elem = data.tasks.map(obj => obj.uid == id);
	// 	// 	let posInArr = elem.indexOf(true);
	// 	// 	data.tasks.splice(posInArr, 1);
	// 	// 	localStorage.setItem("list_tasks",  JSON.stringify(data.tasks));
	// 	// 	view.render();
	// 	// }
	// };

	// let view = {
	// 	init: function() {
	// 		//remove task event handle
	// 		this.taskList = $('.task-list');
 //            this.taskTemplate = $('script[data-template="tasks"]').html();
 //            $('.task-list').on('click', '.remove-task', function(e) {
 //                let taskId = $(this).parents('.task').attr('id');
 //                //let nodeNb = $(this).parents('.task').index();
 //                octopus.removeTask(taskId);
 //                return false;
 //            });

	// 	},
	// 	render: function() {
	// 		this.taskList = $('.task-list');
	// 		let taskList = this.taskList,
	// 		taskTemplate = this.taskTemplate;
	// 		taskList.html('');
	// 		if (data.tasks){
	// 			octopus.getActiveTask().map(function(task){
	// 				let thisTemplate = taskTemplate.replace(/{{text}}/g, task.text)
	// 												.replace(/{{id}}/g, task.uid);
	// 				taskList.append(thisTemplate);
	// 			});
	// 		}
	// 	}
	// };
	// view.init();
	// view.render();

