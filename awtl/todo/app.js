document.addEventListener("DOMContentLoaded", function () {
    // Check if there are tasks in local storage
    let tasks = localStorage.getItem("tasks");
    if (tasks) {
        tasks = JSON.parse(tasks);
        tasks.forEach((task) => addTaskToDOM(task));
    }
});

function addTask() {
    const newTaskInput = document.getElementById("new-task");
    const taskText = newTaskInput.value.trim();

    if (taskText !== "") {
        // Create task object
        const task = { text: taskText, completed: false };

        // Add task to local storage
        let tasks = localStorage.getItem("tasks");
        if (!tasks) {
            tasks = [];
        } else {
            tasks = JSON.parse(tasks);
        }
        tasks.push(task);
        localStorage.setItem("tasks", JSON.stringify(tasks));

        // Add task to DOM
        addTaskToDOM(task);

        // Clear input
        newTaskInput.value = "";
    }
}

function addTaskToDOM(task) {
    const taskList = document.getElementById("task-list");

    const taskItem = document.createElement("li");
    taskItem.classList.add("task-item");
    if (task.completed) {
        taskItem.classList.add("completed");
    }

    taskItem.addEventListener("click", function () {
        toggleTaskCompletion(taskItem, task);
    });

    const taskText = document.createTextNode(task.text);
    const deleteButton = document.createElement("button");
    deleteButton.innerText = "Delete";
    deleteButton.addEventListener("click", function () {
        deleteTask(taskItem, task);
    });

    taskItem.appendChild(taskText);
    taskItem.appendChild(deleteButton);

    taskList.appendChild(taskItem);
}

function toggleTaskCompletion(taskItem, task) {
    // Toggle completion status in the task object
    task.completed = !task.completed;

    // Update completion status in local storage
    let tasks = localStorage.getItem("tasks");
    if (tasks) {
        tasks = JSON.parse(tasks);
        tasks = tasks.map((t) => (t.text === task.text ? task : t));
        localStorage.setItem("tasks", JSON.stringify(tasks));
    }

    // Toggle completed class in the DOM
    taskItem.classList.toggle("completed");
}

function deleteTask(taskItem, task) {
    // Remove task from local storage
    let tasks = localStorage.getItem("tasks");
    if (tasks) {
        tasks = JSON.parse(tasks);
        tasks = tasks.filter((t) => t.text !== task.text);
        localStorage.setItem("tasks", JSON.stringify(tasks));
    }

    // Remove task from DOM
    taskItem.remove();
}
