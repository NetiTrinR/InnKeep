@extends('layouts._app')

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Use a template <small>(Recommended)</small></h3>
                </div>
                <div class="panel-body">
                    {!! Form::open(['route' => 'character.store.template']) !!}
                        <p>
                            Using a template <b>adds all of the fields your character sheet has</b> and sets defaults if defined. <b>You will still need to update values</b> and possibly edit expressions to match your character sheet exactly. This is <b>highly recommended</b>.
                        </p>
                        <!-- Name Form Input -->
                        <div class="form-group">
                            <label for="name" class="control-label">Character Name</label>
                            <input type="text" name="name" class="form-control" />
                        </div>
                        <!-- Template Form Input -->
                        <div class="form-group">
                            <label for="template" class="control-label">Template</label>
                            <select name="template" class="form-control">
                                @foreach($templates as $template)
                                    <option value="{{ $template->id }}">{{ $template->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-xs-11 text-right">
                                <span class="text-right" style="line-height: 46px;">After submitting you will be redirected to the edit character page to set your values.</span>
                            </div>
                            <div class="col-xs-1">
                                <button type="submit" class="btn btn-success pull-right">Create</button>
                            </div>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Custom Character <small>(A New Character Sheet Essentially)</small></h3>
                </div>
                <div class="panel-body">
                    {!! Form::open(['route' => 'character.store']) !!}
                        <p>
                            A custom character <b>requires</b> you <b>create all fields from scratch</b> and <b>write your own expressions</b> for auto completion functionality. This takes much longer and is more difficult. It is recommended you use a template unless you know what you are doing.
                        </p>
                        <!-- Name Form Input -->
                        <div class="form-group">
                            <label for="name" class="control-label">Character Name</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}"/>
                        </div>
                        <!-- Stats Form Input -->
                         <div class="form-group">
                             <label for="stats" class="control-label">Stats</label>
                             <textarea name="stats" rows="10" class="form-control">{{ old('stats') }}</textarea>
                             <p class="help-block">Quotes, and Brakets are required.</p>
                         </div>
                        <button type="submit" class="btn btn-success pull-right">Create</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

    </div>
@endsection

@section('footer.scripts')
    <script  type="text/javascript">
        $(document).on('submit', function(){
            if($('*[name=stats]').val()[0] !== '"' && $('*[name=stats]').val()[0] !== "'"){
                $('*[name=stats]').val('"'+$('*[name=stats]').val()+'"');
            }
        });
    </script>
@endsection