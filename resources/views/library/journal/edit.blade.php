@extends('layouts._app')

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Edit Yo Journal</h3>
                </div>
                <div class="panel-body">
                    {!! Form::open(['route' => ['library.journal.update', $entry->id], 'method' => 'PATCH']) !!}
                        <!-- Character Form Input -->
                        <div class="form-group">
                            <label for="character">Character</label>
                            <select name="character" class="form-control">
                                <option></option>
                                @foreach($entry->user->characters as $character)
                                    <option value="{{ $character->id }}" data-campaign="{{ $character->campaign->id }}" {{ $character->id == $entry->character->id? 'selected' : '' }}>{{ $character->name }}</option>
                                @endforeach
                            </select>
                            <div class="help-block">Setting the character field displays the character's name as the author rather than your own.</div>
                        </div>
                        <!-- Campaign Form Input -->
                        <div class="form-group">
                            <label for="campaign">Campaign</label>
                            <select name="campaign" class="form-control">
                                <option></option>
                                @foreach($entry->user->campaigns as $campaign)
                                    <option value="{{ $campaign->id }}" {{$campaign->id ==  $entry->campaign->id ? 'selected' : ''}}>{{ $campaign->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- Entry Form Input -->
                        <div class="form-group">
                            <label for="entry" class="control-label">Entry</label>
                            <textarea name="entry" rows="3" class="form-control">{{ $entry->entry }}</textarea>
                        </div>
                        <div class="row">
                            <!-- Private Form Input -->
                            <div class="form-group">
                                <div class="col-md-6">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="private"> Private Entry
                                        </label>
                                    </div>
                                    <div class="help-block">Making the entry private would restrict the message to you and your DM</div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success pull-right">Update</button>
                    {!! Form::close() !!}
                    {!! Form::open(['route' => ['library.journal.destroy', $entry->id], 'method' => 'DELETE']) !!}
                        <button type="submit" class="btn btn-danger pull-left">Delete</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection