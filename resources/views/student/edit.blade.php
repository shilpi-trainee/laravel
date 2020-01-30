<!DOCTYPE html>
<html>
<head>
    <title></title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
</head>
<div class="row">
    <div class="col-md-12">
        <br/>
        <h3>Edit Record</h3>
        <br/>
        @if(count($errors) > 0)

            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
                @endif
                <form method="post" action="{{action('StudentController@update', $id)}}">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="PATCH"/>
                    <div>
                        <div class="form-inline">
                            <input class="form-group mb-2" type="text" name="first_name" class="form-control"
                                   value="{{$student->first_name}}" placeholder="Enter First Name"/>
                        </div>
                        <div class="form-inline">
                            <input class="form-group mb-2" type="text" name="last_name" class="form-control" value="{{$student->last_name}}"
                                   placeholder="Enter Last Name"/>
                        </div>
                        <div class="form-inline">
                            <input class="form-group mb-2" type="file" name="image" class="form-control"
                                   value="{{$student->image}}"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Edit"/>
                    </div>
                </form>
            </div>
    </div>
</div>
