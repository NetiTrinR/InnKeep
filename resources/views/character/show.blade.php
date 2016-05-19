@extends('layouts._app')

@section('content')
    <div id="vue-container" class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#view" data-toggle="tab">View</a></li>
                    <li><a href="#inventory" data-toggle="tab">Inventory</a></li>
                    <li><a href="#journal" data-toggle="tab">Journal</a></li>
                    <li><a href="#debug" data-toggle="tab">Debug</a></li>
                    <li class="pull-right"><a href="{{ route('character.edit', $character->id) }}">Edit</a></li>
                </ul>
                <div class="panel-body">
                    <div class="tab-content">
                        <div id="view" class="tab-pane active">
                            {{-- <!-- Search_sheet Form Input -->
                            <div class="form-group">
                                <input type="text" name="search_sheet" class="form-control" placeholder="Search" />
                            </div> --}}
                            @include($character->template->bladeInclude)
                        </div>
                        <div id="inventory" class="tab-pane">
                            @stack('inventory')
                        </div>
                        <div id="journal" class="tab-pane">
                            @each('partials._journalEntry', $character->journalsViewable, 'entry')
                        </div>
                        <div id="debug" class="tab-pane">
                            {{-- <pre>{{ print_r($character->items) }}</pre> --}}
                            <pre>@{{ $data | json }}</pre>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer.scripts')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.18/vue.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
    <script type="text/javascript">
        var floor = Math.floor,
            ceil = Math.ceil,
            extract = function(data){
                for(var key in data)
                    window[key] = data[key];
            },
            evalExpression = function(expression){
                return eval(/\$\{(.+)\}/g.exec(expression)[1]);
            };
        Vue.config.debug = true;
        var vm = new Vue({
            el: "#vue-container",
            data: {
                raw: {!! $character->stats !!},
                stats: {}
            },
            ready: function(){
                this.evalExpressions(this.$data);
            },
            methods: {
                evalExpressions: function(data){ // data = {stats: {}}
                    // This is required. Don't remember why.
                    data.stats = {};
                    // Keep looping till all of our calculated stats are calculated
                    while(Object.keys(data.stats).length != Object.keys(data.raw).length){
                        // Loop through each stat
                        for(var key in data.raw){
                            // If we've defined this stat already, skip it
                            if(key in data.stats)
                                continue;
                            // We expect some ReferenceErrors
                            try{
                                // If it isn't an expression, go ahead and set it
                                if(!/\$\{(.*)\}/.test(data.raw[key]))
                                    data.stats[key] = data.raw[key];
                                else // Otherwise evaluate it. Exception will happen within eval if broke.
                                    data.stats[key] = evalExpression(data.raw[key]);
                                extract(data.stats); // Make all of the calculated variables accessible
                            }catch(e){
                                // If the error is a reference error, it means one of our expressions requires another expression that hasn't been calculated yet. Deal with it on the next cycle
                                if(e instanceof ReferenceError)
                                    continue;
                                else{ // If the error isn't a reference error, something broke and I should probably let the error catcher do its thing.
                                    console.log(e);
                                    throw e; // This does work right?
                                }
                            }
                        }
                        // Debug, check how many vars were dependent on something else this cycle
                        // console.log(Object.keys(data.raw).length - Object.keys(data.stats).length, "dependents vars this cycle");
                    }
                    // console.log(data.stats);
                },
                checkProficiency: function(expression){
                    return (expression.indexOf('proficiency') > -1);
                }
            }
        });
        $(document).on('click', '.custom-rc.clickable label', function(){
            var target = $(this).prop('for');
            console.log(target);
            var input = $("input[name="+target+"]");
            input.prop('checked', !input.prop('checked'));
        });
    </script>
@endsection