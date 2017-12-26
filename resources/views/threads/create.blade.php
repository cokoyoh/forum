@extends('layouts.app')

@section('content')
    <div class = "container">
        <div class = "row">
            <div class = "col-md-8 col-md-offset-2">
                <div class = "panel panel-default">
                    <div class = "panel-heading">Create a New Thread</div>
                    <div class = "panel-body">
                        <form action = "/threads" method="post">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for = "title">Title: </label>
                                <input type = "text" class = "form-control" id="title" name="title" >
                            </div>

                            <div class="form-group">
                                <label for = "title">Title: </label>
                                <textarea name = "body" id = "body" class="form-control" rows = "8"
                                          placeholder="What do you have to say?"></textarea>
                            </div>

                            <div class = "form-group">
                                <button class = "btn btn-primary" type = "submit">Publish</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
