@extends('layouts._app')

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title text-center">Ye Olde Journal</h3>
                </div>
                <div class="panel-body">
                    @each('partials._journalEntry', $entries, 'entry')
                    {!! $entries->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection