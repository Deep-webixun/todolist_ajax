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

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-offset-3 col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Ajax ToDo List <a href="#" id="addNew" class="pull-right"
                                data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i></a></h3>
                    </div>
                    <div class="panel-body" id="items">
                        <ul class="list-group">
                            @foreach ($items as $item)
                                <li class="list-group-item ourItem" data-toggle="modal" data-target="#myModal"">
                                    {{ $item->item }}
                                    <input type="hidden" id="itemId" value="{{ $item->id }}">
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-offset-3 col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Ajax List 2<a href="#" id="addNew2" class="pull-right"
                                data-toggle="modal" data-target="#myModal2"><button class="btn btn-default btn-xs"><i
                                        class="glyphicon glyphicon-plus glyphicon-lg"> Add</i></button></a></h3>
                    </div>
                    <div class="panel-body" id="items2">
                        <ul class="list-group">
                            @foreach ($items2 as $item)
                                <li class="list-group-item ourItem2">{{ $item->item }}<a href="#"
                                        class="pull-right editNew2" data-toggle="modal" data-target="#myModal2"><input
                                            type="hidden" id="itemId2" value="{{ $item->id }}"><i
                                            class="glyphicon glyphicon-edit fa-lg"></i></a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="title">Add New Item</h4>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" id="id">
                            <p><input type="text" placeholder="Write Item Here" id="addItem" class="form-control">
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning" id="delete" data-dismiss="modal"
                                style="display: none">Delete</button>
                            <button type="button" class="btn btn-primary" id="saveChanges"
                                data-dismiss="modal"style="display: none">Save changes</button>
                            <button type="button" class="btn btn-primary" id="addButton" data-dismiss="modal">Add
                                Item</button>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Modal2 -->
            <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="title2">Add New Item 2</h4>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" id="id2">
                            <p><input type="text" placeholder="Write Item Here 2" id="addItem2"
                                    class="form-control"></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning" id="delete2" data-dismiss="modal"
                                style="display: none">Delete</button>
                            <button type="button" class="btn btn-primary" id="saveChanges2"
                                data-dismiss="modal"style="display: none">Save changes</button>
                            <button type="button" class="btn btn-primary" id="addButton2" data-dismiss="modal">Add
                                Item</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{ csrf_field() }}

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
    </script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name=_token]').attr('content')
                //'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function() {
            $(document).on('click', '.ourItem', function(event) {
                var text = $(this).text();
                var id = $(this).find('#itemId').val();
                $('#title').text('Edit Item');
                var text = $.trim(text);
                $('#addItem').val(text);
                $('#delete').show('400');
                $('#saveChanges').show('400');
                $('#addButton').hide('400');
                $('#id').val(id);
                console.log(text);
            });

            $(document).on('click', '#addNew', function(event) {
                $('#title').text('Add New Item');
                $('#addItem').val("");
                $('#delete').hide('400');
                $('#saveChanges').hide('400');
                $('#addButton').show('400');
            });

            $('#addButton').click(function(event) {
                var text = $('#addItem').val();
                if (text == "") {
                    alert('Please type anything for item');
                } else {
                    $.post("list", {
                        'text': text,
                        '_token': $('input[name="_token"]').val()
                    }, function(data) { // data - we are getting from the Controller
                        console.log(data);
                        $('#items').load(location.href + ' #items'); //refresh the page
                    });
                }
            });

            $('#delete').click(function(event) {
                var id = $("#id").val();
                $.post('delete', {
                    'id': id,
                    '_token': $('input[name="_token"]').val()
                }, function(data) {
                    $('#items').load(location.href + ' #items'); //refresh the page
                    //console.log(id);
                    console.log(data);
                });
            });

            $('#saveChanges').click(function(event) {
                var id = $("#id").val();
                var value = $("#addItem").val();
                if (value == "") {
                    alert('Please type anything for item');
                } else {
                    $.post('update', {
                        'id': id,
                        'value': value,
                        '_token': $('input[name="_token"]').val()
                    }, function(data) {
                        $('#items').load(location.href + ' #items'); //refresh the page
                        //console.log(id);
                        console.log(data);
                    });
                }
            });
        });

        $(document).ready(function() {
            $(document).on('click', '.ourItem2', function(event) {
                var text2 = $(this).text();
                var id2 = $(this).find('#itemId2').val();
                $('#title2').text('Edit Item 2');
                var text2 = $.trim(text2);
                $('#addItem2').val(text2);
                $('#delete2').show('400');
                $('#saveChanges2').show('400');
                $('#addButton2').hide('400');
                $('#id2').val(id2);
                console.log(text2);
            });

            $(document).on('click', '#addNew2', function(event) {
                $('#title2').text('Add New Item 2');
                $('#addItem2').val("");
                $('#delete2').hide('400');
                $('#saveChanges2').hide('400');
                $('#addButton2').show('400');
            });

            $('#addButton2').click(function(event) {
                var text2 = $('#addItem2').val();
                if (text2 == "") {
                    alert('Please type anything for item');
                } else {
                    $.post("list2", {
                        'text2': text2,
                        '_token': $('input[name="_token"]').val()
                    }, function(data2) { // data - we are getting from the Controller
                        console.log(data2);
                        $('#items2').load(location.href + ' #items2'); //refresh the page
                    });
                }
            });

            $('#delete2').click(function(event) {
                var id2 = $("#id2").val();
                $.post('delete2', {
                    'id': id2,
                    '_token': $('input[name="_token"]').val()
                }, function(data) {
                    $('#items2').load(location.href + ' #items2'); //refresh the page
                    //console.log(id);
                    console.log(data);
                });
            });

            $('#saveChanges2').click(function(event) {
                var id2 = $("#id2").val();
                var value2 = $("#addItem2").val();
                if (value2 == "") {
                    alert('Please type anything for item');
                } else {
                    $.post('update2', {
                        'id': id2,
                        'value2': value2,
                        '_token': $('input[name="_token"]').val()
                    }, function(data) {
                        $('#items2').load(location.href + ' #items2'); //refresh the page
                        //console.log(id);
                        console.log(data);
                    });
                }
            });
        });
    </script>

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
</body>

</html>
