@extends('layouts._app')

@section('header.styles')
<style>
    .stats {
        text-align: center;
    }
    .stat_field{
        border-bottom: 1px solid #97988b;
    }
    .stat_field > small{
        font-weight: normal;
        line-height: 1;
        color: #98978B;
    }
    .custom-rc input[type=radio],
    .custom-rc input[type=checkbox] {
        display:none;
    }
    .custom-rc label {
        display: inline-block;
        cursor: pointer;
        position: relative;
        padding-right: 25px;
        margin-right:15px;
        font-size: 13px;
        font-weight: normal;
        width:100%;
    }
    .custom-rc label:before {
        content:" ";
        display: inline-block;

        width: 16px;
        height: 16px;

        margin-right: 10px;
        position: relative;
        left: 0;
        top: 1px;
        background-color: #aaa;
        box-shadow: inset 0px 2px 3px 0px rgba(0, 0, 0, .3), 0px 1px 0px 0px rgba(255, 255, 255, .8);
        border-radius: 100%;
        text-align: center;
    }
    .custom-rc.inline label{
        cursor: pointer;
        margin: 0;
        padding: 0;
        width:initial;
    }
    .custom-rc input[type=radio]:checked + label:before,
    .custom-rc input[type=checkbox]:checked + label:before{
        content: "\2022";
        color: #f3f3f3;
        font-size: 33px;
        text-align: center;
        line-height: 17px;
    }
</style>
@endsection

@section('content')
    <div id="vue-container" class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <ul class="nav nav-tabs" style="margin-bottom: 10px;">
                    <li class="active"><a href="#view" data-toggle="tab">View</a></li>
                    <li><a href="#inventory" data-toggle="tab">Inventory</a></li>
                    <li><a href="#journal" data-toggle="tab">Journal</a></li>
                    <li><a href="#debug" data-toggle="tab">Debug</a></li>
                    <li class="pull-right"><a href="">Edit</a></li>
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
                stats: {!! $character->stats !!},
                calc: {}
            },
            ready: function(){
                this.evalExpressions(this.$data);
            },
            methods: {
                evalExpressions: function(data){ // data = {stats: {}}
                    // This is required. Don't remember why.
                    data.calc = {};
                    // Keep looping till all of our calculated stats are calculated
                    while(Object.keys(data.calc).length != Object.keys(data.stats).length){
                        // Loop through each stat
                        for(var key in data.stats){
                            // If we've defined this stat already, skip it
                            if(key in data.calc)
                                continue;
                            // We expect some ReferenceErrors
                            try{
                                // If it isn't an expression, go ahead and set it
                                if(!/\$\{(.*)\}/.test(data.stats[key]))
                                    data.calc[key] = data.stats[key];
                                else // Otherwise evaluate it. Exception will happen within eval if broke.
                                    data.calc[key] = evalExpression(data.stats[key]);
                                extract(data.calc); // Make all of the calculated variables accessible
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
                        // console.log(Object.keys(data.stats).length - Object.keys(data.calc).length, "dependents vars this cycle");
                    }
                    // console.log(data.calc);
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