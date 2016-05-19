@extends('layouts._app')

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Ye Olde Journal</h3>
                </div>
                <div class="panel-body">
                    <!-- Search Form Input -->
                    <div class="row">
                        <div class="col-xs-11">
                            <div id="searchcontainer" class="form-group">
                                <input id="searchinput" type="text" name="search" class="form-control" placeholder="Search Journals..." />
                            </div>
                        </div>
                        <div class="col-xs-1">
                            <a href="{{ route('library.journal.create') }}" class="btn btn-success btn-block" title="Create a new journal entry"><i class="glyphicon glyphicon-plus"></i></a>
                        </div>
                    </div>
                    @each('partials._journalEntry', $entries, 'entry')
                    {!! $entries->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection