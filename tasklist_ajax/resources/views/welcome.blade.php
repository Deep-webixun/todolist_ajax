<!DOCTYPE html>
<html lang="en">

<head>
    <title>To Do Task List</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />


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
                    <form id="form">
                        @csrf
                        <input type="text" name="task" class="form-control" placeholder="Project # To Do" name="" />
                        <div class="add">
                            <button name="submit" type="submit" class="btn btn-success">Add</button>
                        </div>
                    </form>
                </div>

                <br>
                <br>

                <ul class="todo-list">
                    {{-- <li>
                    <div class="left-cont">
                        <input type="checkbox" id="check-1" name="">
                        <label for="check-1"></label>
                        <span>Task-1</span>
                    </div>
                    <span class="remove"><a href="#">
                            <span class="material-symbols-outlined">
                                delete
                            </span>
                        </a></span>
                </li> --}}
                </ul>
            </div>
        </div>
    </div>




    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>



    <script type="text/javascript">
        $(document).ready(function() {
            var count = 0;
            $(".add").click(function() {
                var value = $(".form-control").val();
                if (value != '') {
                    count++;
                    $(".todo-list").append(
                        ' <li> <div class="left-cont"> <input type="checkbox" class="check  ' + count +
                        '" name=""> <label for="check' + count + '"></label><span>' + value +
                        '</span> </div><span class="remove"><a href="#"><span class="material-symbols-outlined"> delete</span></a></span> </li>'
                    );
                }
                $(".form-control").val('');

            });


            $(document).on('click', '.remove', function() {
                $(this).parent().remove();

            });
        });
    </script>
    <script>
        const App = {
            init() {

                $(document).on('click', '.check input[type=checkbox]', App.handleCheckboxClick);
            },
            handleItemCheckboxClick() {
                let selectedData = [];
                $(".todo-container").find("input[type=checkbox]").each(function() {
                    if ($(this).is(':checked'))
                        selectedData.push($(this).val());
                });
                if (!selectedData.length)
                    $('.removeSelected--btn').hide();
                else
                    $('.removeSelected--btn').show();
            },
        }
        App.init();
    </script>
</body>

</html>
