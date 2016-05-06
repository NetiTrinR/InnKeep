@extends('layouts._app')

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Ye Commons</h3>

                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h3>Ye Shit</h3>
                            <ul>
                                <a href="{{ route('character.index') }}" class="btn btn-default">My Characters</a>
                                <a href="{{ url('#') }}" class="btn btn-default">My Campaigns</a>
                                <a href="{{ route('library.journal.index') }}" class="btn btn-default">All Viewable Journals</a>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h3>Ye Scrub</h3>
                            <ul>
                                <li><a href="{{ route('character.create') }}">Make a new Character</a></li>
                                <li><a href="{{-- route('campaign.index') --}}">Join Campaign (Players)</a></li>
                                <li><a href="{{-- route('campaign.create') --}}">Make a Campaign (DMs)</a></li>
                            </ul>
                        </div>
                    </div>
                    <h3>Ye Olde Journal</h3>
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
                    <div class="row">
                        <div class="col-xs-12">
                            @if($journals->count())
                                @each('partials._journalEntry', $journals, 'entry')
                            @else
                                <p class="text-center">
                                    <span class="lead">Ye fiends are away</span><br />
                                    <small>(No new entries for the last two weeks)</small>
                                </p>
                            @endif
                            <div class="text-center">
                                <a href="{{ route('library.journal.index') }}" class="btn btn-default">See More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer.scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#searchlist').btsListFilter('#searchinput', {itemChild: 'span', cancelNode:''});
        });
    </script>
@endsection