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
        margin: 0;
        padding: 0;
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
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
                    <ul class="nav nav-tabs" style="margin-bottom: 10px;">
                        <li class="active"><a href="#view" data-toggle="tab">View</a></li>
                        <li><a href="#inventory" data-toggle="tab">Inventory</a></li>
                        <li><a href="#journal" data-toggle="tab">Journal</a></li>
                        <li><a href="#debug" data-toggle="tab">Debug</a></li>
                        <li class="pull-right"><a href="">Edit</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="view" class="tab-pane active">
                            <div class="row" style="margin-bottom: 10px;">
                                <div class="col-md-5">
                                    <h2 class="stat_field"><small>Name:</small> {{ $character->name }}</h2>
                                </div>
                                <div class="col-md-7" style="margin-top: 12px;">
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <div class="stat_field"><small>Level &amp; Class:</small> <span data-toggle="expression" data-key="level"></span> <span data-toggle="expression" data-key="class"></span></div>
                                        </div>
                                        <div class="col-xs-4">
                                            <div class="stat_field"><small>Background:</small> <span data-toggle="expression" data-key="background"></span></div>
                                        </div>
                                        <div class="col-xs-4">
                                            <div class="stat_field"><small>Player:</small> {{ $character->user->name }}</div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <div class="stat_field"><small>Race:</small> {{ $character->race or "" }}</div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="stat_field"><small>Alignment:</small> {{ $character->alignment }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="col-md-3 stats">
                                        Strength
                                        <div class="panel panel-default">
                                            <div class="panel-body">
                                                {{ $character->strength }}
                                            </div>
                                            <div class="panel-footer" data-toggle="expression" data-value="{{ $character->str }}"></div>
                                        </div>
                                        Dexterity
                                        <div class="panel panel-default">
                                            <div class="panel-body">
                                                {{ $character->dexterity }}
                                            </div>
                                            <div class="panel-footer" data-toggle="expression" data-value="{{ $character->dex }}"></div>
                                        </div>
                                        Constitution
                                        <div class="panel panel-default">
                                            <div class="panel-body">
                                                {{ $character->constitution }}
                                            </div>
                                            <div class="panel-footer" data-toggle="expression" data-value="{{ $character->con }}"></div>
                                        </div>
                                        Intellegence
                                        <div class="panel panel-default">
                                            <div class="panel-body">
                                                {{ $character->intellegence }}
                                            </div>
                                            <div class="panel-footer" data-toggle="expression" data-value="{{ $character->int }}"></div>
                                        </div>
                                        Wisdom
                                        <div class="panel panel-default">
                                            <div class="panel-body">
                                                {{ $character->wisdom }}
                                            </div>
                                            <div class="panel-footer" data-toggle="expression" data-value="{{ $character->wis }}"></div>
                                        </div>
                                        Charisma
                                        <div class="panel panel-default">
                                            <div class="panel-body">
                                                {{ $character->charisma }}
                                            </div>
                                            <div class="panel-footer" data-toggle="expression" data-value="{{ $character->cha }}"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">Inspiration</h3>
                                            </div>
                                            <div class="panel-body">
                                                {{ $character->inspiration or 0}}
                                                <div class="pull-right clearfix">
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-minus"></i></button>
                                                        <button type="button" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-plus"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">Proficiency Bonus</h3>
                                            </div>
                                            <div class="panel-body">
                                                {{ $character->proficiency }}
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">Saving Throws</h3>
                                            </div>
                                            <div class="panel-body custom-rc">
                                                <input type="checkbox" name="str_save" data-toggle="proficiency" data-value="{{ $character->str_save }}">
                                                <label for="str_save">
                                                    <span class="stat_field" data-toggle="expression" data-value="{{ $character->str_save }}"></span> Strength
                                                </label>
                                                <input type="checkbox" name="dex_save" data-toggle="proficiency" data-value="{{ $character->dex_save }}">
                                                <label for="dex_save">
                                                    <span class="stat_field" data-toggle="expression" data-value="{{ $character->dex_save }}"></span> Dexterity
                                                </label>
                                                <input type="checkbox" name="con_save" data-toggle="proficiency" data-value="{{ $character->con_save }}">
                                                <label for="con_save">
                                                    <span class="stat_field" data-toggle="expression" data-value="{{ $character->con_save }}"></span> Constitution
                                                </label>
                                                <input type="checkbox" name="int_save" data-toggle="proficiency" data-value="{{ $character->int_save }}">
                                                <label for="int_save">
                                                    <span class="stat_field" data-toggle="expression" data-value="{{ $character->int_save }}"></span> Intellegence
                                                </label>
                                                <input type="checkbox" name="wis_save" data-toggle="proficiency" data-value="{{ $character->wis_save }}">
                                                <label for="wis_save">
                                                    <span class="stat_field" data-toggle="expression" data-value="{{ $character->wis_save }}"></span> Wisdom
                                                </label>
                                                <input type="checkbox" name="cha_save" data-toggle="proficiency" data-value="{{ $character->cha_save }}">
                                                <label for="cha_save">
                                                    <span class="stat_field" data-toggle="expression" data-value="{{ $character->cha_save }}"></span> Charisma
                                                </label >
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">Skills</h3>
                                            </div>
                                            <div class="panel-body custom-rc">
                                                <input type="checkbox" name="acrobatics" data-toggle="proficiency" data-value="{{ $character->acrobatics }}">
                                                <label for="acrobatics">
                                                    <span class="stat_field" data-toggle="expression" data-value="{{ $character->acrobatics }}"></span> Acrobatics
                                                </label>
                                                <input type="checkbox" name="animal_handling" data-toggle="proficiency" data-value="{{ $character->animal_handling }}">
                                                <label for="animal_handling">
                                                    <span class="stat_field" data-toggle="expression" data-value="{{ $character->animal_handling }}"></span> Animal Handling
                                                </label>
                                                <input type="checkbox" name="arcana" data-toggle="proficiency" data-value="{{ $character->arcana }}">
                                                <label for="arcana">
                                                    <span class="stat_field" data-toggle="expression" data-value="{{ $character->arcana }}"></span> Arcana
                                                </label>
                                                <input type="checkbox" name="athletics" data-toggle="proficiency" data-value="{{ $character->athletics }}">
                                                <label for="athletics">
                                                    <span class="stat_field" data-toggle="expression" data-value="{{ $character->athletics }}"></span> Athletics
                                                </label>
                                                <input type="checkbox" name="deception" data-toggle="proficiency" data-value="{{ $character->deception }}">
                                                <label for="deception">
                                                    <span class="stat_field" data-toggle="expression" data-value="{{ $character->deception }}"></span> Deception
                                                </label>
                                                <input type="checkbox" name="history" data-toggle="proficiency" data-value="{{ $character->history }}">
                                                <label for="history">
                                                    <span class="stat_field" data-toggle="expression" data-value="{{ $character->history }}"></span> History
                                                </label>
                                                <input type="checkbox" name="insight" data-toggle="proficiency" data-value="{{ $character->insight }}">
                                                <label for="insight">
                                                    <span class="stat_field" data-toggle="expression" data-value="{{ $character->insight }}"></span> Insight
                                                </label>
                                                <input type="checkbox" name="intimidation" data-toggle="proficiency" data-value="{{ $character->intimidation }}">
                                                <label for="intimidation">
                                                    <span class="stat_field" data-toggle="expression" data-value="{{ $character->intimidation }}"></span> Intimidation
                                                </label>
                                                <input type="checkbox" name="investigation" data-toggle="proficiency" data-value="{{ $character->investigation }}">
                                                <label for="investigation">
                                                    <span class="stat_field" data-toggle="expression" data-value="{{ $character->investigation }}"></span> Investigation
                                                </label>
                                                <input type="checkbox" name="medicine" data-toggle="proficiency" data-value="{{ $character->medicine }}">
                                                <label for="medicine">
                                                    <span class="stat_field" data-toggle="expression" data-value="{{ $character->medicine }}"></span> Medicine
                                                </label>
                                                <input type="checkbox" name="nature" data-toggle="proficiency" data-value="{{ $character->nature }}">
                                                <label for="nature">
                                                    <span class="stat_field" data-toggle="expression" data-value="{{ $character->nature }}"></span> Nature
                                                </label>
                                                <input type="checkbox" name="perception" data-toggle="proficiency" data-value="{{ $character->perception }}">
                                                <label for="perception">
                                                    <span class="stat_field" data-toggle="expression" data-value="{{ $character->perception }}"></span> Perception
                                                </label>
                                                <input type="checkbox" name="performance" data-toggle="proficiency" data-value="{{ $character->performance }}">
                                                <label for="performance">
                                                    <span class="stat_field" data-toggle="expression" data-value="{{ $character->performance }}"></span> Performance
                                                </label>
                                                <input type="checkbox" name="persuasion" data-toggle="proficiency" data-value="{{ $character->persuasion }}">
                                                <label for="persuasion">
                                                    <span class="stat_field" data-toggle="expression" data-value="{{ $character->persuasion }}"></span> Persuasion
                                                </label>
                                                <input type="checkbox" name="religion" data-toggle="proficiency" data-value="{{ $character->religion }}">
                                                <label for="religion">
                                                    <span class="stat_field" data-toggle="expression" data-value="{{ $character->religion }}"></span> Religion
                                                </label>
                                                <input type="checkbox" name="sleight_of_hand" data-toggle="proficiency" data-value="{{ $character->slight_of_hand  }}">
                                                <label for="sleight_of_hand">
                                                    <span class="stat_field" data-toggle="expression" data-value="{{ $character->slight_of_hand }}"></span> Sleight Of Hand
                                                </label>
                                                <input type="checkbox" name="stealth" data-toggle="proficiency" data-value="{{ $character->stealth }}">
                                                <label for="stealth">
                                                    <span class="stat_field" data-toggle="expression" data-value="{{ $character->stealth }}"></span> Stealth
                                                </label>
                                                <input type="checkbox" name="survival" data-toggle="proficiency" data-value="{{ $character->survival }}">
                                                <label for="survival">
                                                    <span class="stat_field" data-toggle="expression" data-value="{{ $character->survival }}"></span> Survival
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title text-center">AC</h3>
                                                </div>
                                                <div class="panel-body text-center" data-toggle="expression" data-value="{{ $character->dex }}"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title text-center">Initiative</h3>
                                                </div>
                                                <div class="panel-body text-center" data-toggle="expression" data-value="{{ $character->dex }}"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title text-center">Speed</h3>
                                                </div>
                                                <div class="panel-body text-center">
                                                    {{ $character->speed }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Hit Points</h3>
                                        </div>
                                        <div class="panel-body">
                                            <!-- Current Hit Points Form Input -->
                                            <div class="form-group">
                                                <label for="current" class="control-label">Current Hit Points</label>
                                                <input type="text" name="current" class="form-control input-sm" />
                                            </div>
                                            <!-- Temporary Hit Points Form Input -->
                                            <div class="form-group">
                                                <label for="temporary" class="control-label">Temporary Hit Points</label>
                                                <input type="text" name="temporary" class="form-control input-sm" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <!-- <label class="control-label">Hit Die</label>
                                            <p class="form-static-control">{{ $character->hit_die }}</p> -->
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">Hit Die</h3>
                                                </div>
                                                <div class="panel-body">
                                                    {{ $character->hit_die }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">Death Saves</h3>
                                                </div>
                                                <div class="panel-body">
                                                    Success:
                                                    <div class="custom-rc inline text-center"> <!-- style="margin-top:0;"> -->
                                                        <input type="checkbox" name="success_1"><label for="success_1"></label>
                                                        <input type="checkbox" name="success_2"><label for="success_2"></label>
                                                        <input type="checkbox" name="success_3"><label for="success_3"></label>
                                                    </div>
                                                    Failures:
                                                    <div class="custom-rc inline text-center"> <!-- style="margin-top:0;"> -->
                                                        <input type="checkbox" name="fail_1"><label for="fail_1"></label>
                                                        <input type="checkbox" name="fail_2"><label for="fail_2"></label>
                                                        <input type="checkbox" name="fail_3"><label for="fail_3"></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">Proficiencies</h3>
                                            </div>
                                            <div class="panel-body">
                                                <!-- Proficiencies Form Input -->
                                                <div class="form-group">
                                                    <textarea name="proficiencies" rows="12" class="form-control"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Weapons</h3>
                                        </div>
                                        <div class="panel-body" style="max-height: 50vh;overflow-y: auto;">
                                            <!-- Weapon Form Input -->
                                            <div class="form-group">
                                                <input type="text" name="weapon" class="form-control input-sm" placeholder="Search"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Items</h3>
                                        </div>
                                        <div class="panel-body" style="max-height: 50vh;overflow-y: auto;">
                                            <!-- Item Form Input -->
                                            <div class="form-group">
                                                <input type="text" name="item" class="form-control input-sm" placeholder="Search"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="inventory" class="tab-pane">
                            <div class="row">
                                <div class="col-md-2">
                                    <!-- Cp Form Input -->
                                    <div class="form-group">
                                        <label for="cp" class="control-label">CP</label>
                                        <input type="text" name="cp" class="form-control" value="{{ $character->cp }}" />
                                    </div>
                                    <!-- Sp Form Input -->
                                    <div class="form-group">
                                        <label for="sp" class="control-label">SP</label>
                                        <input type="text" name="sp" class="form-control" value="{{ $character->sp }}" />
                                    </div>
                                    <!-- Ep Form Input -->
                                    <div class="form-group">
                                        <label for="ep" class="control-label">EP</label>
                                        <input type="text" name="ep" class="form-control" value="{{ $character->ep }}" />
                                    </div>
                                    <!-- Gp Form Input -->
                                    <div class="form-group">
                                        <label for="gp" class="control-label">GP</label>
                                        <input type="text" name="gp" class="form-control" value="{{ $character->gp }}" />
                                    </div>
                                    <!-- Pp Form Input -->
                                    <div class="form-group">
                                        <label for="pp" class="control-label">PP</label>
                                        <input type="text" name="pp" class="form-control" value="{{ $character->pp }}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="journal" class="tab-pane">
                            Journal
                        </div>
                        <div id="debug" class="tab-pane">
                            <pre>{{ print_r(json_decode($character->stats)) }}</pre>
                        </div>
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
        var proficiencies = '*[data-toggle=proficiency]';
        var checkProficiency = function(expression){
            return (expression.indexOf('proficiency') > -1);
        }
        var floor = Math.floor;
        var ceil = Math.ceil;
        var evalExpression = function(expression){
            if(typeof expression !== "string"){
                console.warn("Tried to parse a string on show.blade.php:444\nexpression:",expression);
                return expression;
            }

            expression = expression.replace('\$\{', '');
            expression = expression.replace('\}', '');
            return eval(expression);
        };
        var showExpression = function(input){
            $(input).val($(input).data('value'));
        };
        var hideExpression = function(input){
            getScope();
            $(input).text(evalExpression($(input).data('value')));
        };
        function getScope(){
            var scope = {!! $character->stats !!};
            $('input').each(function(){
                var val = $(this).val();
                if(_.isNumber(parseInt(val)))
                    val = parseInt(val);
                else
                    val = evalExpression(val);
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
            // $(document).on('click', '.custom-rc label', function(){
            //     var target = $(this).prop('for');
            //     console.log(target);
            //     var input = $("input[name="+target+"]");
            //     input.prop('checked', !input.prop('checked'));
            // });
            console.log(proficiencies);
            $(proficiencies).each(function(){
                // console.log($(this).prop('name'), $(this).data('value'), checkProficiency($(this).data('value')));
                if(checkProficiency($(this).data('value'))){
                    $(this).prop('checked', true);
                }
            });
            $(expressions).each(function(){
                hideExpression(this);
            });
            // $('*[data-toggle=match-w').each(function(){
            //     $(this).height($(this).width());
            //     var main = $(this).find('.main');
            //     main.css({top: ($(this).height() / 2) - (main.height() / 2)});
            // });
            // $(document).on('focus', expressions, function(){
            //     showExpression(this);
            // });
            // $(document).on('blur', expressions, function(){
            //     hideExpression(this);
            // });
            // $(document).on('blur', 'input:not('+expressions+')', function(){
            //     $(expressions).each(function(){
            //         hideExpression(this);
            //     });
            // });
        });
    </script>
@endsection