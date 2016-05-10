@extends('layouts._app')

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">

                    <!-- Dex Form Input -->
                    <div class="form-group">
                        <label for="dex" class="control-label">Dex</label>
                        <input type="text" name="dex" class="form-control" value="10" />
                    </div>
                    <!-- Dex Mod Form Input -->
                    <div class="form-group">
                        <label for="dex_mod" class="control-label">Dex Mod</label>
                        <input type="text" name="dex_mod" class="form-control" data-toggle="expression" data-value="${Math.floor((dex - 10) / 2)}"/>
                    </div>
                    <!-- Amor Form Input -->
                    <div class="form-group">
                        <label for="armor" class="control-label">Armor</label>
                        <input type="text" name="armor" class="form-control" value="10" />
                    </div>
                    <!-- Ac Form Input -->
                    <div class="form-group">
                        <label for="ac" class="control-label">Armor Class</label>
                        <input type="text" name="ac" class="form-control" data-toggle="expression" data-value="${dex_mod + armor}" />
                    </div>





                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer.scripts')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
    <script type="text/javascript">
        var expressions = '*[data-toggle=expression]';
        var evalExpression = function(expression){
            return eval(/\$\{(.+)\}/g.exec(expression)[1]);
        };
        var showExpression = function(input){
            $(input).val($(input).data('value'));
        };
        var hideExpression = function(input){
            getScope();
            $(input).val(evalExpression($(input).data('value')));
        };
        function getScope(){
            var scope = {};
            $('input').each(function(){
                var val = $(this).val();
                if(_.isNumber(parseInt(val)))
                    val = parseInt(val);
                scope[$(this).attr('name')] = val;
            });
            extract(scope);
        }
        function extract(variable) {
            for (var key in variable) {
                window[key] = variable[key];
            }
        }
        $(document).ready(function(){
            $(expressions).each(function(){
                hideExpression(this);
            });
            $(document).on('focus', expressions, function(){
                showExpression(this);
            });
            $(document).on('blur', expressions, function(){
                hideExpression(this);
            });
            $(document).on('blur', 'input:not('+expressions+')', function(){
                $(expressions).each(function(){
                    hideExpression(this);
                });
            });
        });
    </script>
@endsection