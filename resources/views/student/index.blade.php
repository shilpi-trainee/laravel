@extends('layouts.app')
@section('content')

    <!DOCTYPE html>
<html>
<head>
    <title></title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap Table with Add and Delete Row Feature</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
    <link rel="stylesheet" type="text/css" href="{{asset('css/task.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
<div class="table-wrapper">
    <div class="table-title">
        <div class="row">
            <div class="col-sm-8"><h2>Student Data</h2></div>
            @if($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{$message}}</p>
                </div>
            @endif
            <div class="col-sm-4">
                <a href="{{route('student.create')}}">
                    <button type="button" class="btn btn-info add-new"><i class="fa fa-plus"></i> Add New</button>
                </a>
            </div>
        </div>
    </div>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
        </thead>
        @foreach($students as $row)
            <tr>
                <td>{{$row['first_name']}}</td>
                <td>{{$row['last_name']}}</td>
                <td><img src="{{asset('uploads/employee/'.$row->image)}}" height="50px" width="50px" alt="image"></td>
                <td>
                    <a href="{{action('StudentController@edit', $row['id'])}}" class="edit" title=""
                       data-toggle="tooltip" data-original-title="Edit" style="display: inline-block;"><i
                            class="material-icons"></i></a>
                        {{csrf_field()}}
                        <a href="{{action('StudentController@delete', $row['id'])}}" class="delete" title=""
                           data-toggle="tooltip" data-original-title="delete"><i class="material-icons"></i></a>

{{--                <form method="POST" action="{{ route('student.destroy', ['id' => $row['id']]) }}" class="delete_form">--}}
{{--                    @csrf--}}
{{--                    @method('DELETE')--}}
{{--                    {{csrf_field()}}--}}
{{--                    <button type="submit" class="delete"><i class="material-icons"></i></button>--}}
                </td>
            </tr>

        @endforeach

    </table>
    {{ $students->links() }}
</div>
<script>
    $(document).ready(function () {
        $('.delete_form').on('submit', function () {
            if (confirm("Are you sure you want to delete it?")) {
                return true;
            } else {
                return false;
            }
        });
    });
</script>
</body>
</html>
@endsection
