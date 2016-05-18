@extends('layouts._app')

@section('content')
    <div id="vue-container" class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
                    {!! Form::open(['route'=> ['character.update', $character->id], 'method'=>'PATCH']) !!}
                        <!-- Name Form Input -->
                        <div class="form-group">
                            <label for="name" class="control-label">Name</label>
                            <input type="text" name="name"  value="{{ old('name') ?? $character->name }}" class="form-control" />
                        </div>
                        @foreach(json_decode($character->stats) as $name => $value)
                            <!-- {{ $name }} Form Input -->
                            <div class="form-group">
                                <label for="{{ $name }}" class="control-label">{{ myTitle_case($name) }}</label>
                                <input type="text" name="{{ $name }}" class="form-control" value="{{ old($name) ?? $value }}" />
                            </div>
                        @endforeach
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection