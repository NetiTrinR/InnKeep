@extends('layouts._app')

@section('content')
    <div id="vue-container" class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel with-nav-tabs panel-default">
                <div class="panel-heading">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#view" data-toggle="tab">View</a></li>
                        <li><a href="#inventory" data-toggle="tab">Inventory</a></li>
                        <li><a href="#journal" data-toggle="tab">Journal</a></li>
                        <li><a href="#debug" data-toggle="tab">Debug</a></li>
                        <li class="pull-right"><a href="">Edit</a></li>
                    </ul>
                </div>
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
                            <pre>{{ print_r($character->items) }}</pre>
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
                stats: {!! $character->stats !!},
                calc: {}
            },
            ready: function(){
                this.evalExpressions(this.$data);
            },
            methods: {
                evalExpressions: function(data){ // data = {stats: {}}
                    data.calc = {};
                    // Set all non expressions fields in calculated
                    for(var key in data.stats){
                        if(!/\$\{(.*)\}/.test(data.stats[key])){
                            data.calc[key] = data.stats[key];
                        }
                    }
                    // Make all of the calculated variables local
                    extract(data.calc);
                    // Loop through the expressions, evaluate them, then save them as a local variable
                    for(var key in data.stats){
                        if(/\$\{(.*)\}/.test(data.stats[key]))
                            data.calc[key] = evalExpression(data.stats[key]);
                            window[key] = data.calc[key];
                    }
                    console.log(data.calc);
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