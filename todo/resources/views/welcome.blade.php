<!doctype html>
<html lang="en">

<head>
    <title>List</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <style>
        .bb {
            padding-top: 10px;
            text-align: center;

        }

        h2 {
            /* text-align: center; */
            /* padding-left: 100px; */
            padding-bottom: 20px;
            font-family: sans-serif;
            font-weight: bold;
        }

        li {
            background-color: #c4edfd;
            font-size: 17.5px;
        }


        .add {
            padding-left: 10px;
        }

        * {
            padding: 0px;
            margin: 0px;
            box-sizing: border-box;
            font-family: 'Poppins';
        }

        body {
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 100vh;
        }

        .todo-container {
            width: 40%;
        }

        .input {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
            align-items: center;
        }

        .input .form-control {
            background: transparent;
            border: none;
            height: 50px;
            border-radius: 5px;
            width: 90%;
            padding: 0px 20px;
            font-size: 16px;
            color: #838284;
        }

        .input .form-control:focus {
            outline: none;
        }

        .todo-list li {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 15px;
            color: #716973;
            border-radius: 5px;
            overflow: hidden;
            margin-top: 15px;
            box-shadow: 0x 5px 10px rgb(0, 0, 0, 0.55);
        }

        .left-cont input {
            /* display: none; */
            cursor: pointer;
        }

        .left-cont label {
            display: relative;
            cursor: pointer;
        }

        .left-cont label:before {
            content: '';
            padding: 11px;
            display: inline-block;
            position: relative;
            vertical-align: middle;
            border-radius: 3px;
        }


        .left-cont input:checked+label:after {
            content: '';
            position: absolute;
            display: inline-block;
            top: 4px;
            left: 8px;
            width: 5px;
            height: 12px;
            border-width: 0px 2px 2px 0px;
            transform: rotate(45deg);
        }

        .aa {
            text-align: center
        }

        .form-check {
            font-size: 22px;
            font-family: sans-serif;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="check1" name="option1" checked>
            <label class="form-check-label" for="check1">Show All Tasks</label>
        </div>
        <br>
        <h2>To Do Task List</h2>
        <div class="aa">
            <div class="todo-container">
                <div class="input">
                    <form id="add_task">
                        @csrf
                        <input type="text" name="task" class="form-control" placeholder="Project # To Do"
                            name="" />
                        <div class="add">
                            <button name="submit" type="submit" class="btn btn-success">Add</button>
                        </div>
                    </form>
                </div>

                <br>
                <br>

                <ul id="task_list" class="todo-list">
                    @foreach ($todos as $todo)
                        <li id="{{ $todo->id }}">
                            <a href="#" class="toggle"></a>
                            <a href="#" onclick="task_done('{{ $todo->id }}')" class="icon-done">Done</a>
                            <span id="span_{{ $todo->id }}">{{ $todo->title }}</span>
                            <a href="#" onclick="edit_task('{{ $todo->id }}','{{ $todo->title }}')"
                                class="icon-edit">Edit</a>
                            <a href="#" onclick="delete_task('{{ $todo->id }}')"
                                class="icon-delete">Delete</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>
