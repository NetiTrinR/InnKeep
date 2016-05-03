@extends('layouts._app')

@section('content')
    <div class="row">
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-body">
                    @each('partials._journalEntry', $entries, 'entry')
                </div>
            </div>
        </div>
    </div>
@endsection