<!doctype html>
<html lang="en">

<head>
    <title>Tasks</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
        .gradient-custom {
            background: rgb(170, 229, 252);
            linear-gradient(121.28deg, #669600 0%, #ff0000 100%),
            linear-gradient(360deg, #0029ff 0%, #8fff00 100%),
            radial-gradient(100% 164.72% at 100% 100%, #6100ff 0%, #00ff57 100%),
            radial-gradient(100% 148.07% at 0% 0%, #fff500 0%, #51d500 100%);
            background-blend-mode: screen, color-dodge, overlay, difference, normal;
        }

        h3 {
            text-align: center;
            padding-bottom: 18px;
            font-family: sans-serif;

        }

        .a {
            margin-top: -30px;
        }

        .del {
            text-align: right;
        }
    </style>

</head>

<body>
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">

                    @if (Session::get('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif

                    @if (Session::get('fail'))
                        <div class="alert alert-danger">
                            {{ Session::get('fail') }}
                        </div>
                    @endif

                    <div class="card">
                        <div class="card-body p-5">
                            <h3>Project To Do</h3>
                            <form id="form" class="d-flex justify-content-center align-items-center mb-4">
                                @csrf
                                <div class="form-outline flex-fill">
                                    <span class="text-danger">
                                        @error('task')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                    <input type="text" name="task" class="form-control" />
                                    <label class="form-label">New task...</label>
                                </div>&nbsp;&nbsp;&nbsp;
                                <button type="submit" id="submit" class="a btn btn-info ms-2">Add</button>
                            </form>

                            <!-- Tabs navs -->
                            <ul class="nav nav-tabs mb-4 pb-2">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="ex1-tab-1" data-mdb-toggle="tab" href="#ex1-tabs-1"
                                        role="tab" aria-controls="ex1-tabs-1" aria-selected="true">All Tasks</a>
                                </li>
                                {{-- <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="ex1-tab-2" data-mdb-toggle="tab" href="#ex1-tabs-2"
                                        role="tab" aria-controls="ex1-tabs-2" aria-selected="false">Active</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="ex1-tab-3" data-mdb-toggle="tab" href="#ex1-tabs-3"
                                        role="tab" aria-controls="ex1-tabs-3" aria-selected="false">Completed</a>
                                </li> --}}
                            </ul>
                            <!-- Tabs navs -->

                            <!-- Tabs content -->
                            <div class="tab-content" id="ex1-content">
                                <div class="tab-pane fade show active" id="ex1-tabs-1" role="tabpanel"
                                    aria-labelledby="ex1-tab-1">
                                    {{-- <ul class="list-group mb-0">
                                        @foreach ($result as $data)
                                            <li class="list-group-item d-flex align-items-center border-0 mb-2 rounded"
                                                style="background-color: #f4f6f7;">
                                                <input class="form-check-input me-2" type="checkbox" value=""
                                                    aria-label="..." checked />
                                                <s>{{ $data->task }}</s>
                                               <div class="del">
                                                <a href="#">
                                                    <span class="glyphicon glyphicon-trash">delete</span>
                                                </a></div>
                                            </li>
                                        @endforeach

                                    </ul> --}}

                                    <table class="table">
                                        <thead class="table-light">
                                            <tr>
                                                <th scope="col">Tasks</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>


                                            {{-- @foreach ($data as $data)
                                            <tr>
                                                <td class="list-group-item d-flex align-items-center border-0 mb-2 rounded"
                                                    style="background-color: #f4f6f7;">{{ $data->task }}
                                                    <div class="del">
                                                        <a onclick="return confirm(' Are You Sure to Delete this')"
                                                            href="delete/{{ $data->id }}">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach --}}
                                        </tbody>
                                    </table>

                                </div>
                                <div class="tab-pane fade" id="ex1-tabs-2" role="tabpanel" aria-labelledby="ex1-tab-2">
                                    <ul class="list-group mb-0">
                                        <li class="list-group-item d-flex align-items-center border-0 mb-2 rounded"
                                            style="background-color: #f4f6f7;">
                                            <input class="form-check-input me-2" type="checkbox" value=""
                                                aria-label="..." />
                                            Morbi leo risus
                                        </li>

                                    </ul>
                                </div>
                                <div class="tab-pane fade" id="ex1-tabs-3" role="tabpanel" aria-labelledby="ex1-tab-3">
                                    <ul class="list-group mb-0">
                                        <li class="list-group-item d-flex align-items-center border-0 mb-2 rounded"
                                            style="background-color: #f4f6f7;">
                                            <input class="form-check-input me-2" type="checkbox" value=""
                                                aria-label="..." checked />
                                            <s>Cras justo odio</s>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Tabs content -->

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>










    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

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
    <script>
        jQuery('#form').submit(function(e) {
            e.preventDefault();
            jQuery.ajax({
                url: "{{ url('add_task') }}",
                data: jQuery('#form').serialize(),
                type: 'post',
                success: function(result) {
                    jQuery('#message').html(result.msg);
                    jQuery('#form')['0'].reset();
                }
            });
        });

        $(document).ready(function() {

            fetch_tasks();

            function fetch_tasks() {
                $.ajax({
                    type: "GET",
                    url: "fetch",
                    dataType: "json",
                    success: function(response) {
                        $.each(response.task, function(key, item) {
                            $('tbody').append('<tr>\
                                    <td>'+item.task+'</td>\
                                            </tr>');
                        });
                    }
                });
            }



        })
    </script>

</body>

</html>
