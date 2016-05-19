@extends('layouts._app')

@section('content')
    <div id="vue-container" class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <ul class="nav nav-tabs">
                    <li><a href="{{ route('character.show', $character->id) }}#view">View</a></li>
                    <li><a href="{{ route('character.show', $character->id) }}#inventory">Inventory</a></li>
                    <li><a href="{{ route('character.show', $character->id) }}#journal">Journal</a></li>
                    <li class="pull-right active"><a>Edit</a></li>
                </ul>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-11">
                            <div id="searchcontainer" class="form-group">
                                <input id="search" type="text" name="search" class="form-control" placeholder="Search Fields..." autocomplete="off" />
                            </div>
                        </div>
                        <div class="col-xs-1">
                            <button type="button" class="btn btn-success btn-block" title="Create a new stat field"><i class="glyphicon glyphicon-plus"></i></button>
                        </div>
                    </div>
                    {!! Form::open(['id'=>'editForm', 'route'=> ['character.update', $character->id], 'method'=>'PATCH']) !!}
                        <div id="field-{{ ++$i }}" class="form-group">
                            <!-- Name Form Input -->
                            <label for="name" class="control-label">Name</label>
                            <input type="text" name="name"  value="{{ old('name') ?? $character->name }}" class="form-control" />
                        </div>
                        @foreach(json_decode($character->stats) as $name => $value)
                            <div id="field-{{ ++$i }}" class="form-group">
                                <!-- {{ $name }} Form Input -->
                                <label for="{{ $name }}" class="control-label">{{ myTitle_case($name) }}</label>
                                <div class="input-group">
                                    <input type="text" name="{{ $name }}" class="form-control json-field" value="{{ old($name) ?? $value }}" />
                                    <span class="input-group-btn">
                                        <button class="btn btn-danger removeField" type="button" title="Remove {{ myTitle_case($name) }} field" data-toggle="confirmation" data-placement="top"><i class="glyphicon glyphicon-remove"></i></button>
                                    </span>
                                </div>
                            </div>
                        @endforeach
                        <a data-href="{{ route('character.destroy', $character->id) }}" class="btn btn-danger" title="Delete Character" data-toggle="confirmation" data-placement="top">Delete</a>
                        <input type="submit" value="save" class="btn btn-success">
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer.scripts')
    <script type="text/javascript" src="https://raw.githubusercontent.com/bgrins/bindWithDelay/master/bindWithDelay.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-confirmation/1.0.5/bootstrap-confirmation.min.js"></script>
    <script>
        $('[data-toggle="confirmation"]').confirmation();
        $(document).on('submit', '#editForm', function(){
            console.log($(this).serializeArray());
            console.log($(this).find('*[name=_method], *[name=_token], *[name=name], input.json-field'), JSON.stringify($(this).find('input.json-field').serializeArray()));
            return false;
        });
        // $(document).on('click', '.removeField', function(){
        //     // $(this).closest(".form-group").remove();
        // });
        $(document).ready(function () {
            var listId = "#editForm";
            var listItems = ".form-group";
            var searchId = "#search";
            var selector = listId+">"+listItems;
            var keys = ["name", "value"];
            var list = $(selector).map(function(){
                var element = $(this).find("input");
                return {id: '#'+$(this).attr('id'), name: element.attr('name'), value: element.val()};
            }).get();
            var fuse = new Fuse(list, {id: "id", keys: keys});
            $(document).bindWithDelay('keyup', searchId, function(e){
                if($(searchId).val().length > 0){
                    var result = fuse.search($(searchId).val());
                    if(result.length > 0 ){
                        $(selector).hide();
                        // console.log(result);
                        for (var i = result.length - 1; i >= 0; i--)
                            $(result[i]).prependTo($(listId)).show();
                        return;
                    }
                }
                for (var i = $(selector).length - 1; i >= 0; i--)
                    $("#field-"+i).prependTo($(listId)).show();
            }, 500);

        });
    </script>
@endsection