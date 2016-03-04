@extends('layouts._app')

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-5">
                            {{ $character->name }}
                        </div>
                        <div class="col-md-7">
                            {{ $character->class or "" }} {{ $character->background or "" }} {{ $character->user->name }}<br />
                            {{ $character->race or "" }} {{ $character->alignment }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="col-md-2">
                                <div>
                                    Strength
                                    {{ $character->strength }}
                                    {{ $character->str }}
                                </div>
                                <div>
                                    Dexterity
                                    {{ $character->dexterity }}
                                    {{ $character->dex }}
                                </div>
                                <div>
                                    Constitution
                                    {{ $character->constitution }}
                                    {{ $character->con }}
                                </div>
                                <div>
                                    Intelligence
                                    {{ $character->intelligence }}
                                    {{ $character->int }}
                                </div>
                                <div>
                                    Wisdom
                                    {{ $character->wisdom }}
                                    {{ $character->wis }}
                                </div>
                                <div>
                                    Charisma
                                    {{ $character->charisma }}
                                    {{ $character->cha }}
                                </div>
                            </div>
                            <div class="col-md-10"></div>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-4">

                                </div>
                                <div class="col-md-4">

                                </div>
                                <div class="col-md-4">

                                </div>
                            </div>
                            stuff
                            <div class="row">
                                <div class="col-md-6"></div>
                                <div class="col-md-6"></div>
                            </div>
                        </div>
                        <div class="col-md-4">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection