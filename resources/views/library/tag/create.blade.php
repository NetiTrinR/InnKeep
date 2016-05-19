@extends('layouts._app')

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">New Tag</h3>
                </div>
                <div class="panel-body">
                    {!! Form::open(['route'=>'library.tag.store']) !!}
                        <!-- Name Form Input -->
                        <div class="form-group">
                            <label for="name" class="control-label">Tag Name</label>
                            <input type="text" name="name" class="form-control" />
                        </div>
                        <input type="submit" value="Create" class="btn btn-success pull-right">
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection