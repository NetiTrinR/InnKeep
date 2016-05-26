@extends('layouts._app')

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">New Campaign</h3>
                </div>
                <div class="panel-body">
                    {!! Form::open(['route' => 'campaign.store']) !!}
                        <!-- Name Form Input -->
                        <div class="form-group">
                            <label for="name" class="control-label">Name</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}"/>
                        </div>
                        <!-- Tags Form Input -->
                        <div class="form-group">
                            <label for="tags">Tags</label>
                            <select name="tags[]" class="form-control chosen-select" data-placeholder="Choose Some Tags" multiple>
                                <option value=""></option>
                                @foreach($tags as $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-xs-11 text-right" style="line-height: 46px;">Text</div>
                            <div class="col-xs-1">
                                <button type="submit" class="btn btn-success pull-right">Create</button>
                            </div>
                        </div>
                        <!-- <button type="submit" class="btn btn-success pull-right">Create</button> -->
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection