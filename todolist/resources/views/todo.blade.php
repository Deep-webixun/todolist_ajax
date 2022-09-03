<!DOCTYPE html>
<html lang="en">

<head>
    <title>To Do List</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .panel-heading {
            font-weight: bold;
        }

        a {
            margin-top: -4.9px;
        }

        .delete {
            border: none;
            background: transparent;
        }

        .show {
            padding-bottom: 8px;
        }
        #msg{
            display: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <div id="items" class="row">
            <div class="col-lg-offset-3 col-lg-6">
                <h2></h2>
                <div class="form-check show">
                    <input class="form-check-input" type="checkbox" id="check1" name="option1"
                        onclick="checkMe()">
                    <label class="form-check-label">Show All Tasks</label>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">ToDo List
                        <a data-toggle="modal" data-target="#mymodel" class="btn btn-success btn-sm pull-right"
                            href="#">Add</a>
                    </div>
                    <div class="panel-body">
                        <ul class="list-group">
                            @foreach ($todos as $data)
                                <li class="list-group-item">
                                    <input class="form-check-input" type="checkbox" id="check" name="option1"
                                        value="1">
                                    {{ $data->task_name }} <button class="delete pull-right"
                                        value="{{ $data->id }}"><i
                                            class="fa-solid fa-trash pull-right"></i></button>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <p id="msg">hello</p>

    <div class="modal" id="mymodel" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Task</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p><input type="text" placeholder="Enter The Task Here" id="addItem" class="form-control"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal" id="AddButton">Add Task</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    {{ csrf_field() }}

    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            $('#AddButton').click(function(e) {
                var text = $('#addItem').val();
                $.post('list', {
                        'text': text,
                        '_token': $('input[name=_token]').val()
                    },
                    function(data) {
                        console.log(data);
                        $('#items').load(location.href + ' #items');
                    });
            });


            $(document).on('click', '.delete', function(e) {
                e.preventDefault();
                var id = $(this).val();
                // console.log(id);
                // alert(id);
                confirm("Are you sure want to delete?");
                $.post('delete', {
                        'id': id,
                        '_token': $('input[name=_token]').val()
                    },
                    function(data) {
                        $('#items').load(location.href + ' #items');
                        console.log(data);
                    });

            });

            // $('#check').click(function(e) {
            //     var tick = $(this).val();
            //     $.post('check', {
            //             'tick': tick,
            //             '_token': $('input[name=_token]').val()
            //         },
            //         function(data) {
            //             console.log(data);
            //             $('#items').load(location.href + ' #items');
            //         });
            // });

            function checkMe() {
                var tick = document.getElementById("check");
                var text = document.getElementById("msg");
                if (tick.checked == true) {
                    text.style.display = "block";
                } else {
                    text.style.display = "none";
                }
            }





        });
    </script>




</body>

</html>
