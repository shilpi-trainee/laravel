<!DOCTYPE html>
<html>
<head>
    <title></title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
</head>
<body>
<div class="row">
    <div class="col-md-12">
        <div align="left" >
            <a href="{{ route('student.index') }}" class="btn btn-default">Back</a>
        </div>
        <br/>
        <h3 aling="center">Add Data</h3>
        <br/>
        @if(\Session::has('success'))
            <div class="alert alert-success">
                <p>{{\Session::get('success') }}</p>
            </div>
        @endif
        <div class="form">
            <form method="post" action="{{url('student')}}">
                {{csrf_field()}}
                <div class="form-group">
                    <label>First-Name</label>
                    <input type="text" name="first_name" class="col-sm-3 control-label" placeholder="Enter First Name"/>
                    @if ($errors->has('first_name'))
                        <span class="text-danger">{{ $errors->first('first_name') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label>Last-Name</label>
                    <input type="text" name="last_name" class="col-sm-3 control-label" placeholder="Enter Last Name"/>
                    @if ($errors->has('last_name'))
                        <span class="text-danger">{{ $errors->first('last_name') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="image" class="col-sm-3 control-label"/>
                    @if ($errors->has('image'))
                        <span class="text-danger">{{ $errors->first('image') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary"/>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
