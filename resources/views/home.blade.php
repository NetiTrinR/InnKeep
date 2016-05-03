@extends('layouts._app')

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Ye Olde Journal</div>
                <div class="panel-body">
                    @forelse($announcements as $announcement)
                        @include('partials._journalEntry', ['entry' => $announcement])
                    @empty
                        <p class="text-center">
                            <span class="lead">Ye fiends are away</span><br />
                            <small>(No new entries for the last two weeks)</small>
                        </p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-5 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Ye Shit</div>
                <div class="panel-body">
                    <ul>
                        <li><a href="{{ route('character.index') }}">My Characters</a></li>
                        <li><a href="{{ url('#') }}">My Campaigns</a></li>
                        <li><a href="{{ url('#') }}">All Viewable Journals</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Ye Scrub
                </div>
                <div class="panel-body">
                    <ul>
                        <li><a href="{{ route('character.create') }}">Make a new Character</a></li>
                        <li><a href="{{ url('#') }}">Join Campaign (Players)</a></li>
                        <li><a href="{{ url('#') }}">Make a Campaign (DMs)</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
