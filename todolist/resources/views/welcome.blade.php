<!doctype html>
<html lang="en">

<head>
    <title>To Do List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ url('assets/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
</head>

<body>
    <div class="container">
        <div class="app">
            <h1>TO DO LIST</h1>
            <form action="{{url('addtask')}}" method="post">
                @csrf
                <input type="text" name="task" placeholder="Add new task...">
                <button type="submit">&plus;</button>
            </form>
            <ul></ul>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

    <script>
        window.onload = loadTasks;

        // On form submit add task
        document.querySelector("form").addEventListener("submit", e => {
            e.preventDefault();
            addTask();
        });

        function loadTasks() {
            // check if localStorage has any tasks
            // if not then return
            if (localStorage.getItem("tasks") == null) return;

            // Get the tasks from localStorage and convert it to an array
            let tasks = Array.from(JSON.parse(localStorage.getItem("tasks")));

            // Loop through the tasks and add them to the list
            tasks.forEach(task => {
                const list = document.querySelector("ul");
                const li = document.createElement("li");
                li.innerHTML = `<input type="checkbox" onclick="taskComplete(this)" class="check" ${task.completed ? 'checked' : ''}>
          <input type="text" value="${task.task}" class="task ${task.completed ? 'completed' : ''}" onfocus="getCurrentTask(this)" onblur="editTask(this)">
          <i class="fa fa-trash" onclick="removeTask(this)"></i>`;
                list.insertBefore(li, list.children[0]);
            });
        }

        function addTask() {
            const task = document.querySelector("form input");
            const list = document.querySelector("ul");
            // return if task is empty
            if (task.value === "") {
                alert("Please add some task!");
                return false;
            }
            // check is task already exist
            if (document.querySelector(`input[value="${task.value}"]`)) {
                alert("Task already exist!");
                return false;
            }

            // add task to local storage
            localStorage.setItem("tasks", JSON.stringify([...JSON.parse(localStorage.getItem("tasks") || "[]"), {
                task: task.value,
                completed: false
            }]));

            // create list item, add innerHTML and append to ul
            const li = document.createElement("li");
            li.innerHTML = `<input type="checkbox" onclick="taskComplete(this)" class="check">
      <input type="text" value="${task.value}" class="task" onfocus="getCurrentTask(this)" onblur="editTask(this)">
      <i class="fa fa-trash" onclick="removeTask(this)"></i>`;
            list.insertBefore(li, list.children[0]);
            // clear input
            task.value = "";
        }

        function taskComplete(event) {
            let tasks = Array.from(JSON.parse(localStorage.getItem("tasks")));
            tasks.forEach(task => {
                if (task.task === event.nextElementSibling.value) {
                    task.completed = !task.completed;
                }
            });
            localStorage.setItem("tasks", JSON.stringify(tasks));
            event.nextElementSibling.classList.toggle("completed");
        }

        function removeTask(event) {
            let tasks = Array.from(JSON.parse(localStorage.getItem("tasks")));
            tasks.forEach(task => {
                if (task.task === event.parentNode.children[1].value) {
                    // delete task
                    tasks.splice(tasks.indexOf(task), 1);
                }
            });
            localStorage.setItem("tasks", JSON.stringify(tasks));
            event.parentElement.remove();
        }

        // store current task to track changes
        var currentTask = null;

        // get current task
        function getCurrentTask(event) {
            currentTask = event.value;
        }

        // edit the task and update local storage
        function editTask(event) {
            let tasks = Array.from(JSON.parse(localStorage.getItem("tasks")));
            // check if task is empty
            if (event.value === "") {
                alert("Task is empty!");
                event.value = currentTask;
                return;
            }
            // task already exist
            tasks.forEach(task => {
                if (task.task === event.value) {
                    alert("Task already exist!");
                    event.value = currentTask;
                    return;
                }
            });
            // update task
            tasks.forEach(task => {
                if (task.task === currentTask) {
                    task.task = event.value;
                }
            });
            // update local storage
            localStorage.setItem("tasks", JSON.stringify(tasks));
        }
    </script>
</body>

</html>
