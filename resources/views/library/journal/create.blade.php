@extends('layouts._app')

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Write Yo Journal</h3>
                </div>
                <div class="panel-body">
                    {!! Form::open(['route' => 'library.journal.store']) !!}
                        <!-- Character Form Input -->
                        <div class="form-group">
                            <label for="character_id">Character</label>
                            <select name="character_id" class="form-control">
                                <option></option>
                                @foreach(Auth::user()->characters as $character)
                                    <option value="{{ $character->id }}" data-campaign="{{ $character->campaign->id }}">{{ $character->name }}</option>
                                @endforeach
                            </select>
                            <div class="help-block">Setting the character field displays the character's name as the author rather than your own.</div>
                        </div>
                        <!-- Campaign Form Input -->
                        <div class="form-group">
                            <label for="campaign_id">Campaign</label>
                            <select name="campaign_id" class="form-control">
                                <option></option>
                                @foreach(Auth::user()->campaigns as $campaign)
                                    <option value="{{ $campaign->id }}">{{ $campaign->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- Entry Form Input -->
                        <div class="form-group">
                            <label for="entry" class="control-label">Entry</label>
                            <textarea name="entry" rows="3" class="form-control"></textarea>
                        </div>
                        <div class="row">
                            <!-- Entry Form Input -->
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
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-success pull-right">Save</button>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer.javascript')

@endsection